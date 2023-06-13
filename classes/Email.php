<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
  protected $email;
  protected $name;
  protected $token;

  public function __construct($email, $name, $token)
  {
    $this->email = $email;
    $this->name = $name;
    $this->token = $token;
  }

  public function enviarConfirmacion() {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Username = 'adhemartest708@gmail.com';
    $mail->Password = 'javhzrjrjurctnie';

    $mail->setFrom('cuentas@uptask.com');
    $mail->addAddress('adhemarduran@gmail.com');
    $mail->Subject = 'Confirm your account';

    $mail->isHTML(TRUE);
    $mail->CharSet = 'UTF-8';

    $contenido = '<html>';
    $contenido .= '<p><strong>Hello ' . $this->name . '</strong>You have created a new account in Uptask. You only have to confirm it with the following link:</p>';
    $contenido .= '<p>Click here: <a href="http://localhost:3000/confirm?token=' . $this->token . '">Confirm account</a></p>';
    $contenido .= '</html>';

    $mail->Body = $contenido;

    $mail->send();
  }
}