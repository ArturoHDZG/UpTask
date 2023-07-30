<?php

namespace Controllers;

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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Crear POST';
    }

    $router->render('auth/create', [
      'title' => 'Crea tu Cuenta en UpTask'
    ]);
  }

  public static function forget()
  {
    echo 'Página Olvidé Contraseña';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Olvidé Contraseña POST';
    }
  }

  public static function restore()
  {
    echo 'Página Restaurar Contraseña';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Restaurar Contraseña POST';
    }
  }

  public static function message()
  {
    echo 'Página Mensaje';
  }

  public static function confirm()
  {
    echo 'Página Mensaje Confirmación';
  }
}
