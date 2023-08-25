<?php

namespace Controllers;

use MVC\Router;
use Classes\Email;
use Model\Usuario;

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
      $usuario->token = null;
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
