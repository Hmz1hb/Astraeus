<?php
session_start();

// Make sure to sanitize the input to prevent SQL injection
$exerciseId = intval($_POST['id']);

// Connect to your database. Replace the following with your actual database connection details
$db = new PDO('mysql:host=localhost;dbname=gymdata;charset=utf8', 'root', '');

// Check if the exercise ID is saved for the user
$userId = $_SESSION['user_id'];
$query = $db->prepare('SELECT Exercies FROM user WHERE UserID = ?');
$query->execute([$userId]);
$result = $query->fetch(PDO::FETCH_ASSOC);

// Now we need to decode the JSON array from the database
$exercises = isset($result['Exercies']) ? json_decode($result['Exercies'], true) : [];

if ($exercises !== null && in_array($exerciseId, $exercises)) {
  // Exercise ID exists, remove it from the array
  $updatedExercises = array_diff($exercises, [$exerciseId]);

  // Now we need to reindex the array to ensure it starts from 0
  $updatedExercises = array_values($updatedExercises);

  // Now we need to encode the updated array back to JSON and save it in the database
  $jsonExercises = json_encode($updatedExercises);
  $query = $db->prepare('UPDATE user SET Exercies = ? WHERE UserID = ?');
  $query->execute([$jsonExercises, $userId]);

  // Send a response back to the JavaScript
  echo 'Deleted exercise with ID ' . $exerciseId;
} else {
  // Exercise ID not found in the saved exercises
  echo 'Exercise with ID ' . $exerciseId . ' is not saved.';
}
?>
