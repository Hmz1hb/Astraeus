<?php
require_once 'db.php';

try {
  $pdo = new PDO($dsn, $user, $pass, $options);

  $stmt = $pdo->query("SELECT UserID, Name, Email, Phone, Age, Gender, Exercies, TicketID FROM user");
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  echo json_encode($users);

} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
