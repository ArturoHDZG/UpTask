<?php

namespace Controllers;

use Model\Tarea;
use Model\Proyecto;

class TareaController
{
  public static function index()
  {
    $proyectoId = $_GET['id'];

    if(!$proyectoId) {
      header("Location: /dashboard");
    }

    $proyecto = Proyecto::where('url', $proyectoId);
    session_start();

    if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
      header("Location: /404");
    }

    $tareas = Tarea::belongsTo('proyectoId', $proyecto->id);
    echo json_encode(['tareas' => $tareas]);
  }

  public static function new()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      session_start();

      $proyectoId = $_POST['proyectoId'];
      $proyecto = Proyecto::where('url', $proyectoId);

      if(!$proyecto || $proyecto->propietarioId !== $_SESSION['id']) {
        $respuesta = [
          'tipo' => 'error',
          'mensaje' => 'Error al agregar la tarea'
        ];
        echo json_encode($respuesta);
        return;
      }

      $tarea = new Tarea($_POST);
      $tarea->proyectoId = $proyecto->id;
      $resultado = $tarea->guardar();
      $respuesta = [
        'tipo' => 'success',
        'id' => $resultado['id'],
        'mensaje' => 'Tarea agregada correctamente'
      ];
      echo json_encode($respuesta);
    }
  }

  public static function edit()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {}
  }

  public static function delete()
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {}
  }
}
