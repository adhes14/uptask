<?php

namespace Model;

class Task extends ActiveRecord {
  protected static $tabla = 'tasks';
  protected static $columnasDB = ['id', 'name', 'estado', 'projectId'];

  public $name;
  public $estado;
  public $projectId;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->estado = $args['estado'] ?? 0;
    $this->projectId = $args['projectId'] ?? '';
  }
}