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
