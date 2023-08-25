<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
  protected $email;
  protected $nombre;
  protected $token;

  public function __construct($email, $nombre, $token)
  {
    $this->email = $email;
    $this->nombre = $nombre;
    $this->token = $token;
  }

  // Send verification token to registered email
  public function sendEmail()
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $_ENV['EMAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Port = $_ENV['EMAIL_PORT'];
    $mail->Username = $_ENV['EMAIL_USER'];
    $mail->Password = $_ENV['EMAIL_PASS'];

    $mail->setFrom('accounts@uptask.com');
    $mail->addAddress('admin@uptask.com', 'uptask.com');
    $mail->Subject = 'Activa tu cuenta';
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    // Body HTML Message
    $content = "<html>";
    $content .= "<p><strong>Hola " . $this->nombre . "</strong></p>";
    $content .= "<p>Confirma el registro de tu cuenta en UpTask</p>";
    $content .= "<p>haciendo click en el siguiente enlace:
     <a href='" . $_ENV['APP_URL'] . "/confirm?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
     $content .= "<p>Si no has realizado este registro, por favor ignora este mensaje</p>";

    $mail->Body = $content;
    $mail->send();
  }

  public function sendInstructions()
  {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $_ENV['EMAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Port = $_ENV['EMAIL_PORT'];
    $mail->Username = $_ENV['EMAIL_USER'];
    $mail->Password = $_ENV['EMAIL_PASS'];

    $mail->setFrom('accounts@uptask.com');
    $mail->addAddress('admin@uptask.com', 'uptask.com');
    $mail->Subject = 'Restaurar Contraseña';
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    // Body HTML Message
    $content = "<html>";
    $content .= "<p><strong>Hola " . $this->nombre . "</strong></p>";
    $content .= "<p>Para recuperar el acceso a tu cuenta has click</p>";
    $content .= "<p>En el siguiente enlace:
     <a href='" . $_ENV['APP_URL'] . "/restore?token=" . $this->token . "'>Restaurar Contraseña</a></p>";
     $content .= "<p>Si no has solicitado este servicio, por favor ignora este mensaje</p>";

    $mail->Body = $content;
    $mail->send();
  }
}
