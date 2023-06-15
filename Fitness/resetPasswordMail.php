<?php
// Include the PHPMailer files
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include "db.php";

// Generate a random hashed password
$randomPassword = substr(md5(uniqid(rand(), true)), 0, 10); // Change length as needed

// Get the user's email and ID from the request
$userID = $_POST['userID'];
$email = $_POST['email'];

// Insert user info into password_resets table
$token = password_hash($randomPassword, PASSWORD_DEFAULT);
$tokenExpire = date('Y-m-d H:i:s', strtotime('+10 minutes')); // Token expiration in 10 minutes

$stmt = $pdo->prepare("INSERT INTO password_resets (UserID, Email, Token, TokenExpire) VALUES (:userID, :email, :token, :tokenExpire)");
$stmt->execute([
  'userID' => $userID,
  'email' => $email,
  'token' => $token,
  'tokenExpire' => $tokenExpire
]);

// Send email with password reset link
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'lachehab.el.hilali.hamza.solicode@gmail.com';
$mail->Password = 'wxnwzyqccezrtcfr';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->setFrom('Astraeus.contact@gmail.com', 'Astraeus');
$mail->addAddress($email); // Recipient email
$mail->isHTML(true);
$mail->Subject = 'Reset Your Password';
$mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  :root
  {
      --primary-color: #f9ef23;   /*--- Yellow color ----*/
      --secondry-color: #141414;  /*--- Black color ----*/
      --third-color: #ffffff;     /*--- White color ----*/
  }
    body {
      font-family: #f9ef23;
      background-color: var(--secondry-color);
      color: #ffffff;
      padding: 20px;
    }
    .logo {
      color: #ffffff;
      font-size: 24px;
      font-weight: bold;
      text-decoration: none;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
    }
    .btn {
      display: inline-block;
      background-color: #f9ef23;
      color: #ffffff;
      text-decoration: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
    }
    .btn:hover
    {
        transform: scale(1.1);
        cursor: pointer;
    }
    
    .btn a
    {
        color: var(--secondry-color);
        text-decoration: none;
        font-size: 0.9rem;
        text-transform: uppercase;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="text-center">
      <a class="logo" href="#"><span>Astraeus</span></a>
    </div>
    <hr>
    <h2>Password Reset</h2>
    <p>Dear User,</p>
    <p>We have received a request to reset your password. To proceed with resetting your password, please click the button below:</p>
    <p><a class="btn btn-primary" href="http://localhost/Fit%20with%20us/Fitness/resetpassword.php?token='. rawurlencode($token) . '">Reset Password</a></p>
    <p>If you did not request a password reset, please ignore this email.</p>
    <p>Regards,</p>
    <p>The Astraeus Team</p>
  </div>
</body>
</html>';

if ($mail->send()) {
  error_log('Email sent successfully'); // Console log message
  echo 'Email sent successfully';
} else {
  error_log('Email could not be sent'); // Console log message
  echo 'Email could not be sent';
}
?>
