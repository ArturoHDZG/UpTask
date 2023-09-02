<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;

class DashboardController
{
  public static function index(Router $router)
  {
    session_start();
    isAuth();

    $router->render('dashboard/index', [
      'title' => 'Proyectos'
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
        header('Location: /proyecto?id='.$proyecto->url);
      }
    }

    $router->render('dashboard/new', [
      'title' => 'Nuevo Proyecto',
      'alertas' => $alertas
    ]);
  }

  public static function profile(Router $router)
  {
    session_start();
    isAuth();

    $router->render('dashboard/profile', [
      'title' => 'Perfil'
    ]);
  }
}
