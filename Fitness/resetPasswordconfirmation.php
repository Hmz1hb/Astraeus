<?php
include "db.php";

function validate_password($password) {
    if (strlen($password) < 8) return false;
    if (!preg_match('/[A-Z]/', $password)) return false;
    if (!preg_match('/[a-z]/', $password)) return false;
    if (!preg_match('/\d/', $password)) return false;
    if (!preg_match('/[^a-zA-Z\d]/', $password)) return false;
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $token = $_POST['token'];
  $password = $_POST['password'];

  if (!validate_password($password)) {
    echo 'Password does not meet the requirements.';
    error_log('Password does not meet the requirements');
    return;
  }

  $decoded_token = urldecode($token);

  $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE Token = :token");
  $stmt->execute(['token' => $decoded_token]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($row) {
    $userID = $row['UserID'];

    // Update the user's password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE user SET Password = :password WHERE UserID = :userID");
    $stmt->execute(['password' => $hashedPassword, 'userID' => $userID]);

    // Delete the token from the password_resets table
    $stmt = $pdo->prepare("DELETE FROM password_resets WHERE Token = :token");
    $stmt->execute(['token' => $decoded_token]); // Use the decoded token

    echo 'Password reset successful';
    error_log('Password reset successful'); // Log success message
  } else {
    echo 'Invalid or expired token';
    error_log('Invalid or expired token'); // Log error message
  }
}
?>
