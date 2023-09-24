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
  public $passActual;
  public $passNuevo;
  public $token;
  public $confirmado;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->password1 = $args['password1'] ?? '';
    $this->passActual = $args['passActual'] ?? '';
    $this->passNuevo = $args['passNuevo'] ?? '';
    $this->token = $args['token'] ?? '';
    $this->confirmado = $args['confirmado'] ?? 0;
  }

  // LLogin Validation
  public function validarLogin()
  {
    if (!$this->email) {
      self::$alertas['error'][] = 'Email Requerido';
    } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'Email No Valido';
    }

    if (!$this->password) {
      self::$alertas['error'][] = 'Contraseña Requerida';
    } elseif(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La Contraseña debe contener al menos 6 caracteres';
    }

    return self::$alertas;
  }

  // New Accounts Validation
  public function validarNuevaCuenta()
  {
    if (!$this->nombre) {
      self::$alertas['error'][] = 'Nombre Requerido';
    }

    if (!$this->email) {
      self::$alertas['error'][] = 'Email Requerido';
    }

    if (!$this->password) {
      self::$alertas['error'][] = 'Contraseña Requerida';
    } elseif(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La Contraseña debe contener al menos 6 caracteres';
    } elseif($this->password !== $this->password1) {
      self::$alertas['error'][] = 'Las contraseñas no coinciden';
    }

    return self::$alertas;
  }

  // Email Validation
  public function validarEmail()
  {
    if (!$this->email) {
      self::$alertas['error'][] = 'Email Requerido';
    } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'Email No Valido';
    }

    return self::$alertas;
  }

  // Password Validation
  public function validarPassword()
  {
    if (!$this->password) {
      self::$alertas['error'][] = 'Contraseña Requerida';
    } elseif(strlen($this->password) < 6) {
      self::$alertas['error'][] = 'La Contraseña debe contener al menos 6 caracteres';
    }

    return self::$alertas;
  }

  // Validate Profile
  public function validarPerfil()
  {
    if (!$this->nombre) {
      self::$alertas['error'][] = 'El Nombre es Obligatorio';
    }

    if (!$this->email) {
      self::$alertas['error'][] = 'El Email es Obligatorio';
    }

    return self::$alertas;
  }

  // Validate Change Password
  public function nuevoPass() :array
  {
    if (!$this->passActual) {
      self::$alertas['error'][] = 'La contraseña actual es requerida';
    }

    if (!$this->passNuevo) {
      self::$alertas['error'][] = 'La contraseña nueva es requerida';
    } elseif (strlen($this->passNuevo) < 6) {
      self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
    }

    return self::$alertas;
  }

  // Validate Old Password
  public function comprobarPassword() :bool
  {
    return password_verify($this->passActual, $this->password);
  }

  // Hash Password
  public function hashPassword() :void
  {
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  // Generate Confirmation Token
  public function crearToken() :void
  {
    $this->token = uniqid();
  }
}
