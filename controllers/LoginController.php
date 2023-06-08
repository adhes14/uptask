<?php

namespace Controllers;

use MVC\Router;

class LoginController {
  public static function login(Router $router) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
    }

    $router->render('auth/login', [
      'tittle' => 'Log In'
    ]);
  }

  public static function logout() {
    echo 'From Logout';
  }

  public static function create(Router $router) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }

    $router->render('auth/create', [
      'tittle' => 'Create your account'
    ]);
  }

  public static function forgot(Router $router) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }

    $router->render('auth/forgot', [
      'tittle' => 'Recover your password'
    ]);
  }

  public static function recover(Router $router) {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }

    $router->render('auth/recover', [
      'tittle' => 'Recover your password'
    ]);
  }

  public static function message() {
    echo 'From Logout';
  }

  public static function confirm() {
    echo 'From Logout';
  }
}
