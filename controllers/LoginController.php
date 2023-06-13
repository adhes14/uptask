<?php

namespace Controllers;

use Classes\Email;
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

      if (empty($alertas)) {
        $existeUsuario = Usuario::where('email', $usuario->email);
  
        if ($existeUsuario) {
          Usuario::setAlerta('error', 'This user is already created');
          $alertas = Usuario::getAlertas();
        } else {
          // Hash password
          $usuario->hashPassword();

          // Remove password2
          unset($usuario->password2);

          // Generate token
          $usuario->crearToken();

          // Create user
          $resultado = $usuario->guardar();

          // Send email
          $email = new Email($usuario->email, $usuario->name, $usuario->token);
          
          $email->enviarConfirmacion();

          if ($resultado) {
            header('Location: /message');
          }
        }
      }
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
    $token = s($_GET['token']);
    if (!$token) header('Location: /');

    $usuario = Usuario::where('token', $token);
    if (empty($usuario)) Usuario::setAlerta('error', 'Invalid token');
    else {
      $usuario->confirm = 1;
      $usuario->token = null;
      unset($usuario->password2);
      $usuario->guardar();

      Usuario::setAlerta('exito', 'User confirmed succesfully');
    }

    $alertas = Usuario::getAlertas();

    $router->render('auth/confirm', [
      'tittle' => 'Confirm',
      'alertas' => $alertas
    ]);
  }
}
