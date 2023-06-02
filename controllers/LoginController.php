<?php

namespace Controllers;

class LoginController {
  public static function login() {
    echo 'From Login';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      
    }
  }

  public static function logout() {
    echo 'From Logout';
  }

  public static function create() {
    echo 'From create';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

    }
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
