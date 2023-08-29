<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;

class LoginController
{
  public static function login(Router $router)
  {
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = new Usuario($_POST);
      $alertas = $usuario->validarLogin();

      if (empty($alertas)) {
        $usuario = Usuario::where('email', $usuario->email);

        if (!$usuario || !$usuario->confirmado) {
          Usuario::setAlerta('error', 'Usuario no encontrado o no esta confirmado');
        } else {

          if (password_verify($_POST['password'], $usuario->password)) {
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['login'] = true;

            header("Location: /dashboard");
          } else {
            Usuario::setAlerta('error', 'Contraseña Incorrecta');
          }
        }
      }
    }

    $alertas = Usuario::getAlertas();

    $router->render('auth/login', [
      'title' => 'Iniciar Sesión',
      'alertas' => $alertas
    ]);
  }

  public static function logout()
  {
    session_start();
    $_SESSION = [];
    header("Location: /");
  }

  public static function create(Router $router)
  {
    $usuario = new Usuario;
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario->sincronizar($_POST);
      $alertas = $usuario->validarNuevaCuenta();

      if (empty($alertas)) {
        $existeUsuario = Usuario::where('email', $usuario->email);

        if ($existeUsuario) {
          Usuario::setAlerta('error', 'El correo ya se encuentra registrado');
          $alertas = Usuario::getAlertas();
        } else {
          $usuario->hashPassword();
          $usuario->crearToken();
          unset($usuario->password1);
          $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
          $email-> sendEmail();
          $resultado = $usuario->guardar();

          if($resultado){
            header("Location: /message");
          }
        }
      }
    }

    $router->render('auth/create', [
      'title' => 'Crea tu Cuenta en UpTask',
      'usuario' => $usuario,
      'alertas' => $alertas
    ]);
  }

  public static function forget(Router $router)
  {
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = new Usuario($_POST);
      $alertas = $usuario->validarEmail();

      if(empty($alertas)) {
        $usuario = Usuario::where('email', $usuario->email);
      }

      if($usuario && $usuario->confirmado) {
        unset($usuario->password1);
        $usuario->crearToken();
        $usuario->guardar();
        $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
        $email-> sendInstructions();
        Usuario::setAlerta('success', 'Se han Enviado Instrucciones al Correo Registrado para Recuperar la Contraseña');
      } else {
        Usuario::setAlerta('error', 'El Usuario no existe o no esta confirmado');
      }
    }

    $alertas = Usuario::getAlertas();

    $router->render('auth/forget', [
      'title' => 'Recuperar Acceso a la Cuenta',
      'alertas' => $alertas
    ]);
  }

  public static function restore(Router $router)
  {
    $token = s($_GET['token']);
    $mostrar = true;

    if (!$token) {
      header("Location:/");
    }

    $usuario = Usuario::where('token', $token);

    if (empty($usuario)) {
      Usuario::setAlerta('error', 'Token Inválido');
      $mostrar = false;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      unset($usuario->password1);
      $usuario->sincronizar($_POST);
      $alertas = $usuario->validarPassword();

      if (empty($alertas)) {
        $usuario->hashPassword();
        $usuario->token = "";
        $resultado = $usuario->guardar();

        if ($resultado) {
          header("Location:/");
        }
      }
    }

    $alertas = Usuario::getAlertas();

    $router->render('auth/restore', [
      'title' => 'Restablece la Contraseña',
      'alertas' => $alertas,
      'mostrar' => $mostrar
    ]);
  }

  public static function message(Router $router)
  {
    $router->render('auth/message', [
      'title' => 'Cuenta Creada con Éxito'
    ]);
  }

  public static function confirm(Router $router)
  {
    $token = s($_GET['token']);

    if (!$token) {
      header("Location: /");
    }

    $usuario = Usuario::where('token', $token);

    if (empty($usuario)) {
      Usuario::setAlerta('error', 'Token Inválido');
    } else {
      unset($usuario->password1);
      $usuario->confirmado = 1;
      $usuario->token = "";
      $usuario->guardar();
      Usuario::setAlerta('success', 'Cuenta Confirmada con Éxito');
    }

    $alertas = Usuario::getAlertas();

    $router->render('auth/confirm', [
      'title' => 'Cuenta Creada con Éxito',
      'alertas' => $alertas
    ]);
  }
}
