<?php

namespace Model;

class Project extends ActiveRecord {
  protected static $tabla = 'projects';
  protected static $columnasDB = ['id', 'project', 'url', 'userId'];
  public $project;
  public $url;
  public $userId;

  public function __construct($args = [])
  {
    $this->id = $args['id'] ?? null;
    $this->project = $args['project'] ?? '';
    $this->url = $args['url'] ?? '';
    $this->userId = $args['userId'] ?? '';
  }

  public function validarProyecto() {
    if (!$this->project) {
      self::$alertas['error'][] = 'Project name is mandatory';
    }

    return self::$alertas;
  }
}