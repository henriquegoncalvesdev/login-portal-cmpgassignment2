<?php
session_start();
require './inc/header.php';
require './inc/database.php';

// check if user is logged in and session is active
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset();
    session_destroy();
    header('location: login.php');
} else {
    // check if the ID is set
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // try and catch to handle exceptions
        try {
            // sql query to delete the record based on the id
            $sql = "DELETE FROM phpdata WHERE id = :id";
            $stmt = $conn->prepare($sql);
            //bind id parameter to sql query
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            //executes query and checks if successful
            if ($stmt->execute()) {
                header('location: display-person.php');
            } else {
            //displays an error message if query fails
                echo "Error deleting record: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            //displays an error message if an exception is caught
            echo "Error: " . $e->getMessage();
        }
    } else {
        // displays error message if no ID is specified
        echo "No ID specified for deletion.";
    }
}

require './inc/footer.php';
?>
