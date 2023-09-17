<?php

namespace Controllers;

use Model\Proyecto;

class TareaController
{
  public static function index()
  {}

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
      } else {
        $respuesta = [
          'tipo' => 'success',
          'mensaje' => 'Tarea agregada correctamente'
        ];
        echo json_encode($respuesta);
      }
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
