<?php

session_start();


if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header('Location: ./login.php');
  exit(); // Important: stop executing the rest of the script
}



$userId = $_SESSION['UserID'];




// Initialize a response array
$response = [];

try {
    // Verify POST data
    $requiredFields = ['fullName', 'gender', 'weight', 'height', 'age', 'Waist', 'Neck', 'Hip'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            // Add error to response array
            $response['status'] = 'error';
            $response['message'] = 'Missing required field: ' . $field;
            echo json_encode($response);
            exit;
        }
    }

    // Execute SQL query
    $stmt = $pdo->prepare('
        UPDATE `user` SET 
            `Name` = :fullName,
            `Gender` = :gender,
            `Weight` = :weight,
            `Height` = :height,
            `Age` = :age,
            `waist` = :Waist,
            `neck` = :Neck,
            `hip` = :Hip
        WHERE `UserID` = :userId
    ');

    $stmt->execute([
        ':fullName' => $_POST['fullName'],
        ':gender' => $_POST['gender'],
        ':weight' => $_POST['weight'],
        ':height' => $_POST['height'],
        ':age' => $_POST['age'],
        ':Waist' => $_POST['Waist'],
        ':Neck' => $_POST['Neck'],
        ':Hip' => $_POST['Hip'],
        ':userId' => $userId
    ]);

    // Add success to response array
    $response['status'] = 'success';
    $response['message'] = 'User updated successfully';

} catch (PDOException $e) {
    // Add error to response array
    $response['status'] = 'error';
    $response['message'] = 'Database error: ' . $e->getMessage();
}

// Return response as JSON
echo json_encode($response);
?>
