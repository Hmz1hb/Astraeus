<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./login.php');
    exit();
}

$userId = $_SESSION['user_id'];

$host = 'localhost';
$db   = 'gymdata';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$response = [];

try {
    $requiredFields = ['fullName', 'weight', 'height', 'Waist', 'Neck', 'Hip', 'gender'];
    $inputData = [];
    foreach ($requiredFields as $field) {
        $inputData[$field] = isset($_POST[$field]) && $_POST[$field] !== '' ? $_POST[$field] : null;
    }

    $stmt = $pdo->prepare('
        UPDATE `user` SET 
            `Name` = :fullName,
            `Weight` = :weight,
            `Height` = :height,
            `waist` = :Waist,
            `neck` = :Neck,
            `hip` = :Hip,
            `Gender` = :gender
        WHERE `UserID` = :userId
    ');

    $stmt->execute([
        ':fullName' => $inputData['fullName'],
        ':weight' => $inputData['weight'],
        ':height' => $inputData['height'],
        ':Waist' => $inputData['Waist'],
        ':Neck' => $inputData['Neck'],
        ':Hip' => $inputData['Hip'],
        ':gender' => $inputData['gender'],
        ':userId' => $userId
    ]);

    $response['status'] = 'success';
    $response['message'] = 'User updated successfully';

} catch (PDOException $e) {
    $response['status'] = 'error';
    $response['message'] = 'Database error: ' . $e->getMessage();
}

echo json_encode($response);

?>
