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
    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $telNumber = $_POST['telNumber'];

        $sql = "UPDATE phpdata SET fname = :fname, lname = :lname, email = :email, telNumber = :telNumber WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telNumber', $telNumber);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('location: display-person.php'); // Redirect to the main page
        } else {
            echo "Error updating record: " . $stmt->errorInfo()[2];
        }
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM phpdata WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<form method="post" action="update.php" class="form-update">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>First Name:</label>
    <input type="text" name="fname" value="<?php echo $row['fname']; ?>">
    <label>Last Name:</label>
    <input type="text" name="lname" value="<?php echo $row['lname']; ?>">
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>">
    <label>Phone Number:</label>
    <input type="text" name="telNumber" value="<?php echo $row['telNumber']; ?>">
    <input type="submit" value="Update" class="btn-register">
</form>

<?php
}
require './inc/footer.php';
?>
