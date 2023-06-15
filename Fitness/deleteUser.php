<?php
require_once 'db.php';

try {
  $pdo = new PDO($dsn, $user, $pass, $options);

  $userID = $_POST['UserID'];

  $stmt = $pdo->prepare("DELETE FROM user WHERE UserID = :UserID");
  $stmt->execute(['UserID' => $userID]);

  echo 'Success';

} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
