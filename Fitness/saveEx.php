<?php

 session_start();
 
 
 if (!isset($_SESSION['user_id'])) {
   // Redirect to login page
   header('Location: ./login.php');
   exit(); // Important: stop executing the rest of the script
 }
 


// Make sure to sanitize the input to prevent SQL injection
$exerciseId = intval($_POST['id']);

// Connect to your database. Replace the following with your actual database connection details
$db = new PDO('mysql:host=localhost;dbname=gymdata;charset=utf8', 'root', '');

// Fetch data from the API
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://musclewiki.p.rapidapi.com/exercises",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "x-rapidapi-host: musclewiki.p.rapidapi.com",
    "x-rapidapi-key: 3ec250bf1cmsh6ba74139d7fb301p1de1eejsn7dbf4db26f0c"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $exerciseData = json_decode($response, true); // convert the JSON response to an array

  // Check if the exercise ID is already saved for the user
  $userId = $_SESSION['user_id'];
  $query = $db->prepare('SELECT Exercies FROM user WHERE UserID = ?');
  $query->execute([$userId]);
  $result = $query->fetch(PDO::FETCH_ASSOC);

  // Now we need to decode the JSON array from the database
  $exercises = isset($result['Exercies']) ? json_decode($result['Exercies'], true) : [];

  if ($exercises !== null && in_array($exerciseId, $exercises)) {
    // Exercise ID already exists, no need to save again
    echo 'Exercise with ID ' . $exerciseId . ' is already saved.';
  } else {
    // Iterate over the exercise data to check if the id from AJAX is present
    foreach ($exerciseData as $exercise) {
      if ($exercise['id'] == $exerciseId) {
        // If the id matches, insert it into the user's exercise column in the database

        // Add the new exercise id to the array
        $exercises[] = $exerciseId;

        // Now we need to encode the array back to JSON and save it in the database
        $jsonExercises = json_encode($exercises);
        $query = $db->prepare('UPDATE user SET Exercies = ? WHERE UserID = ?');
        $query->execute([$jsonExercises, $userId]);

        // Send a response back to the JavaScript
        echo 'Saved exercise with ID ' . $exerciseId;
        break;
      }
    }
  }
}
?>