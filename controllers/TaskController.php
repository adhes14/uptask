<?php

namespace Controllers;

use Model\Project;
use Model\Task;

class TaskController {
  public static function index() {
    
  }

  public static function create() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $projectUrl = $_POST['projectUrl'];
      $project = Project::where('url', $projectUrl);

      if (!$project || $project->userId !== $_SESSION['id']) {
        $response = [
          'type' => 'error',
          'message' => 'There was a problem on creating the task'
        ];
      }

      $task = new Task($_POST);
      $task->projectId = $project->id;
      $result = $task->guardar();

      $response = [
        'type' => 'exito',
        'id' => $result['id'],
        'message' => 'Task created succesfully'
      ];

      echo json_encode($response);
    }
  }

  public static function update() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
  }

  public static function delete() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
  }
}