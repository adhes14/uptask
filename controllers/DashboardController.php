<?php

namespace Controllers;

use Model\Project;
use MVC\Router;

class DashboardController {
  public static function index(Router $router) {
    session_start();
    isAuth();

    $id = $_SESSION['id'];
    $projects = Project::belongsTo('userId', $id);

    $router->render('dashboard/index', [
      'tittle' => 'Projects',
      'proyectos' => $projects
    ]);
  }

  public static function create_project(Router $router) {
    session_start();
    isAuth();
    $alertas = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $project = new Project($_POST);

      $alertas = $project->validarProyecto();

      if (empty($alertas)) {
        $project->url = md5(uniqid());

        $project->userId = $_SESSION['id'];

        $project->guardar();

        header('Location: /project?url=' . $project->url);
      }
    }

    $router->render('dashboard/create-project', [
      'tittle' => 'Create Project',
      'alertas' => $alertas
    ]);
  }

  public static function project(Router $router) {
    session_start();
    isAuth();

    $url = $_GET['url'];
    if (!$url) header('Location: /dashboard');

    // Ensure the project if from the owner
    $project = Project::where('url', $url);
    if ($project->userId !== $_SESSION['id']) {
      header('Location: /dashboard');
    }

    $router->render('dashboard/project', [
      'tittle' => $project->project
    ]);
  }

  public static function profile(Router $router) {
    session_start();
    isAuth();

    $router->render('dashboard/profile', [
      'tittle' => 'Profile'
    ]);
  }
}