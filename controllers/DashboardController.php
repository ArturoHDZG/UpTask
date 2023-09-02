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

    $router->render('dashboard/profile', [
      'title' => 'Perfil'
    ]);
  }
}
