<?php

namespace Controllers;

use Model\Project;

class TaskController {
  public static function index() {
    
  }

  public static function create() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $projectId = $_POST['projectId'];
      $project = Project::where('url', $projectId);

      if (!$project || $project->userId !== $_SESSION['id']) {
        $response = [
          'type' => 'error',
          'message' => 'There was a problem on creating the task'
        ];
      }

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