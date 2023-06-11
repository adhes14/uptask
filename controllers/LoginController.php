<?php

namespace Controllers;

use Model\Usuario;
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
    $usuario = new Usuario;
    $alertas = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario->sincronizar($_POST);
      $alertas = $usuario->validarNuevaCuenta();
    }

    $router->render('auth/create', [
      'tittle' => 'Create your account',
      'usuario' => $usuario,
      'alertas' => $alertas
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

  public static function message(Router $router) {
    $router->render('auth/message', [
      'tittle' => 'Message'
    ]);
  }

  public static function confirm(Router $router) {
    $router->render('auth/confirm', [
      'tittle' => 'Confirm'
    ]);
  }
}
