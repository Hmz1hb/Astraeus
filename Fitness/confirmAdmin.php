<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adminID'])) {
        $adminID = $_POST['adminID'];

        $stmt = $pdo->prepare("UPDATE admin SET Is_confirmed = 1 WHERE AdminID = :adminID");
        $stmt->execute(['adminID' => $adminID]);

        if ($stmt->rowCount()) {
            echo 'Admin confirmed successfully';
        } else {
            echo 'Failed to confirm admin';
        }
    }
}
?>
