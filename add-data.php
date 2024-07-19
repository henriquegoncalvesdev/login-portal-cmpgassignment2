<?php
session_start();
require './inc/header.php';
require './inc/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $telNumber = $_POST['telNumber'];

    try {
        $sql = "INSERT INTO phpdata (fname, lname, email, telNumber) 
        VALUES (:fname, :lname, :email, :telNumber)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telNumber', $telNumber);

        if ($stmt->execute()) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Error: " . $stmt->errorInfo()[2] . "</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<section class="container mt-5 text-center">
    <h2>Add New Data</h2>
    <form method="post" action="add-data.php" class="form-data text-start mt-5">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="form-group">
            <label for="data">Last Name:</label>
            <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telNumber">Phone Number:</label>
            <input type="text" class="form-control" id="telNumber" name="telNumber" required>
        </div>
        <button type="submit" class="btn btn-dark mt-5 btn-register">Submit</button>
    </form>
</section>

<?php
require './inc/footer.php';
?>
