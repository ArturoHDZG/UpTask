<?php

namespace Controllers;

class LoginController
{
  public static function login()
  {
    echo 'Página Login';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Login POST';
    }
  }

  public static function logout()
  {
    echo 'Página Logout';
  }

  public static function create()
  {
    echo 'Página Crear';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      echo 'Crear POST';
    }
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
