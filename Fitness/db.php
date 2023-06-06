<?php
$host = 'localhost';
$db   = 'gymdata';
$user = 'root';
$pass = '';  // Add your password here

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
?>