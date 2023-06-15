<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['adminID'])) {
        $adminID = $_POST['adminID'];

        $stmt = $pdo->prepare("DELETE FROM admin WHERE AdminID = :adminID");
        $stmt->execute(['adminID' => $adminID]);

        if ($stmt->rowCount()) {
            echo 'Admin deleted successfully';
        } else {
            echo 'Failed to delete admin';
        }
    }
}
?>
