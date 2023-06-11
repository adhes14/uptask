<?php

namespace Model;

class Usuario extends ActiveRecord {
  protected static $tabla = 'users';
  protected static $columnasDB = ['id', 'name', 'email', 'password', 'token', 'confirm'];
  protected static $name;
  protected static $email;
  protected static $password;
  protected static $token;
  protected static $confirm;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->token = $args['token'] ?? '';
    $this->confirm = $args['confirm'] ?? '';
  }
}