<?php

 session_start();

 if (!isset($_SESSION['user_id'])) {
   // Redirect to login page
   header('Location: ./login.php');
   exit(); // Important: stop executing the rest of the script
 }
 

require_once 'db.php';


$userID = $_SESSION['user_id'];

$query = "SELECT Name as fullName, Gender as gender, Weight as weight, Height as height, Age as age, waist as Waist, neck as Neck, hip as Hip, phone as phone, email as email
FROM user 
WHERE UserID = :userID
";
$stmt = $pdo->prepare($query);
$stmt->execute(['userID' => $userID]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($result);
?>

