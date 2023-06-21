<?php

namespace Controllers;

use Model\Project;
use MVC\Router;

class DashboardController {
  public static function index(Router $router) {
    session_start();
    isAuth();

    $router->render('dashboard/index', [
      'tittle' => 'Projects'
    ]);
  }

  public static function project(Router $router) {
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

    $router->render('dashboard/project', [
      'tittle' => 'Create Project',
      'alertas' => $alertas
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