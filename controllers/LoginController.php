<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
  public static function login(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Login POST';
    }

    $router->render('auth/login', [
      'title' => 'Iniciar Sesión'
    ]);
  }

  public static function logout()
  {
    echo 'Página Logout';
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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Olvidé Contraseña POST';
    }

    $router->render('auth/forget', [
      'title' => 'Recuperar Acceso a la Cuenta'
    ]);
  }

  public static function restore(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Restaurar Contraseña POST';
    }

    $router->render('auth/restore', [
      'title' => 'Restablece Contraseña'
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
    $router->render('auth/confirm', [
      'title' => 'Cuenta Creada con Éxito'
    ]);
  }
}
