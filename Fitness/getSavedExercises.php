<?php
session_start();

header("Header always set Access-Control-Allow-Origin *");

$db = new PDO('mysql:host=localhost;dbname=gymdata;charset=utf8', 'root', '');

$userId = $_SESSION['user_id'];
$query = $db->prepare('SELECT Exercies FROM user WHERE UserID = ?');
$query->execute([$userId]);
$result = $query->fetch(PDO::FETCH_ASSOC);

// Get the exercise IDs and echo them
$exerciseIds = isset($result['Exercies']) ? json_decode($result['Exercies'], true) : [];
echo json_encode($exerciseIds);
?>
