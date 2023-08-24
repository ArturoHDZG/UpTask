<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
  public $email;
  public $nombre;
  public $token;

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
    $mail->Subject = 'Activate Your Account';
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    // Body HTML Message
    $content = "<html>";
    $content .= "<p><strong>Hi " . $this->nombre . "</strong></p>";
    $content .= "<p>Confirm your email address by clicking the following link</p>";
    $content .= "<p>to activate your Account:</p>";
    $content .= "<p>Follow next link:
     <a href='" . $_ENV['APP_URL'] . "/confirm?token=" . $this->token . "'>Confirm Account</a></p>";
     $content .= "<p>If you did not request registration for this account, please ignore this message.</p>";

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
    $mail->Subject = 'Restore Password';
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    // Body HTML Message
    $content = "<html>";
    $content .= "<p><strong>Hi " . $this->nombre . "</strong></p>";
    $content .= "<p>Restore your password by clicking the following link</p>";
    $content .= "<p>Follow next link:
     <a href='" . $_ENV['APP_URL'] . "/restore?token=" . $this->token . "'>Restore Password</a></p>";
     $content .= "<p>If you did not request this action, please ignore this message.</p>";

    $mail->Body = $content;
    $mail->send();
  }
}
