<?php

namespace Model;

class Usuario extends ActiveRecord
{
  protected static $tabla = 'usuarios';
  protected static $columnasDB = [
    'id', 'nombre', 'email', 'password', 'token', 'confirmado'
  ];

  public $id;
  public $nombre;
  public $email;
  public $password;
  public $password1;
  public $token;
  public $confirmado;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->password1 = $args['password1'] ?? '';
    $this->token = $args['token'] ?? '';
    $this->confirmado = $args['confirmado'] ?? '';
  }

  // New Accounts Validation
  public function validarNuevaCuenta()
  {
    if(!$this->nombre) {
      self::$alertas['error'][] = 'Nombre Requerido';
    }

    if(!$this->email) {
      self::$alertas['error'][] = 'Email Requerido';
    }

    if(!$this->password) {
      self::$alertas['error'][] = 'Contraseña Requerida';
    } elseif(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La Contraseña debe contener al menos 6 caracteres';
    } elseif($this->password !== $this->password1) {
      self::$alertas['error'][] = 'Los password no coinciden';
    }

    return self::$alertas;
  }
}
