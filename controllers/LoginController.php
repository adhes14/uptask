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

  public static function forgot() {
    echo 'From forgot password';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
  }

  public static function recover() {
    echo 'From recover password';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
  }

  public static function message() {
    echo 'From Logout';
  }

  public static function confirm() {
    echo 'From Logout';
  }
}
