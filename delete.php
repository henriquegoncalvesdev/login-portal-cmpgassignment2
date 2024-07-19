<?php
session_start();
require './inc/header.php';
require './inc/database.php';

// Check if user is authenticated
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            $sql = "DELETE FROM phpdata WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header('location: index.php'); // Redirect to the main page
            } else {
                echo "Error deleting record: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "No ID specified for deletion.";
    }
}

require './inc/footer.php';
?>
