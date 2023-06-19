<?php

namespace Controllers;

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