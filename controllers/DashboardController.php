<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Usuario;

class DashboardController
{
  public static function index(Router $router)
  {
    session_start();
    isAuth();

    $id = $_SESSION['id'];
    $proyectos = Proyecto::belongsTo('propietarioId', $id);

    $router->render('dashboard/index', [
      'title' => 'Proyectos',
      'proyectos' => $proyectos
    ]);
  }

  public static function new(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $proyecto = new Proyecto($_POST);
      $alertas = $proyecto->validarProyecto();

      if(empty($alertas)) {
        // Generate unique URL
        $hash = md5(uniqid());
        $proyecto->url = $hash;

        // Save creator's ID
        $proyecto->propietarioId = $_SESSION['id'];

        $proyecto->guardar();
        header('Location: /project?id='.$proyecto->url);
      }
    }

    $router->render('dashboard/new', [
      'title' => 'Nuevo Proyecto',
      'alertas' => $alertas
    ]);
  }

  public static function project(Router $router)
  {
    session_start();
    isAuth();
    $url = $_GET['id'];

    if (!$url) {
      header("Location: /dashboard");
    }

    $proyecto = Proyecto::where('url', $url);

    if ($proyecto->propietarioId !== $_SESSION['id']) {
      header("Location: /dashboard");
    }

    $router->render('dashboard/project', [
      'title' => $proyecto->proyecto
    ]);
  }

  public static function profile(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];

    $usuario = Usuario::find($_SESSION['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario->sincronizar($_POST);
      $alertas = $usuario->validarPerfil();

      if (empty($alertas)) {
        $existeUsuario = Usuario::where('email', $usuario->email);

        if ($existeUsuario && $existeUsuario->id !== $usuario->id) {
          Usuario::setAlerta('error', 'Email inválido o ya registrado');
          $alertas = $usuario->getAlertas();

        } else {
          $usuario->guardar();

          Usuario::setAlerta('success', 'Cambios Guardados con Éxito');
          $alertas = $usuario->getAlertas();

          $_SESSION['nombre'] = $usuario->nombre;
        }
      }
    }

    $router->render('dashboard/profile', [
      'title' => 'Perfil',
      'usuario' => $usuario,
      'alertas' => $alertas
    ]);
  }

  public static function password(Router $router)
  {
    session_start();
    isAuth();
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = Usuario::find($_SESSION['id']);
      $usuario->sincronizar($_POST);
      $alertas = $usuario->NuevoPass();

      if (empty($alertas)) {
        $resultado = $usuario->comprobarPassword();

        if ($resultado) {
          $usuario->password = $usuario->passNuevo;

          unset($usuario->passActual);
          unset($usuario->passNuevo);
          unset($usuario->password1);

          $usuario->hashPassword();
          $resultado = $usuario->guardar();

          if ($resultado) {
            Usuario::setAlerta('success', 'Contraseña Guardada');
            $alertas = $usuario->getAlertas();
          }
        } else {
          Usuario::setAlerta('error', 'Contraseña Incorrecta');
          $alertas = $usuario->getAlertas();
        }
      }
    }

    $router->render('dashboard/password',[
      'title' => 'Cambiar Contraseña',
      'alertas' => $alertas
    ]);
  }
}
