<?php
include 'db.php';

$stmt = $pdo->prepare("SELECT * FROM admin WHERE Is_confirmed = 0");
$stmt->execute();
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($admins);
?>
