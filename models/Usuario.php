<?php

namespace Model;

class Usuario extends ActiveRecord {
  protected static $tabla = 'users';
  protected static $columnasDB = ['id', 'name', 'email', 'password', 'token', 'confirm'];
  public $name;
  public $email;
  public $password;
  public $password2;
  public $token;
  public $confirm;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->password2 = $args['password2'] ?? '';
    $this->token = $args['token'] ?? '';
    $this->confirm = $args['confirm'] ?? 0;
  }

  public function validarLogin() {
    if (!$this->email) {
      self::$alertas['error'][] = 'Email is mandatory';
    }

    if (!$this->password) {
      self::$alertas['error'][] = 'Password cannot be empty';
    }

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'Invalid email';
    }

    return self::$alertas;
  }

  public function validarNuevaCuenta() {
    if (!$this->name) {
      self::$alertas['error'][] = 'User name is mandatory';
    }

    if (!$this->email) {
      self::$alertas['error'][] = 'Email is mandatory';
    }

    if (!$this->password) {
      self::$alertas['error'][] = 'Password cannot be empty';
    }

    if (strlen($this->password) < 6) {
      self::$alertas['error'][] = 'Password must be at least 6 characters long';
    }
    
    if ($this->password !== $this->password2) {
      self::$alertas['error'][] = 'Passwords are not the same';
    }
  
    return self::$alertas;
  }

  public function validarEmail() {
    if (!$this->email) {
      self::$alertas['error'][] = 'Email is mandatory';
    }

    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      self::$alertas['error'][] = 'Invalid email';
    }

    return self::$alertas;
  }

  public function validarPassword() {
    if (!$this->password) {
      self::$alertas['error'][] = 'Password cannot be empty';
    }

    if (strlen($this->password) < 6) {
      self::$alertas['error'][] = 'Password must be at least 6 characters long';
    }
    
    if ($this->password !== $this->password2) {
      self::$alertas['error'][] = 'Passwords are not the same';
    }
  
    return self::$alertas;
  }

  public function hashPassword() {
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function crearToken() {
    $this->token = uniqid();
    
    // another way more random with 32 characteres
    // $this->token = md5(uniqid());
  }
}