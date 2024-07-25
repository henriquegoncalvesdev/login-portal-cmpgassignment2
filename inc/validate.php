<?php
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

require 'database.php';

// sqk query to check if the user exists with the provided username and password
$sql = "SELECT user_id, username,first_name,last_name FROM phpusers 
        WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// get number of rows
$count = $result->rowCount();

if ($count == 1) { 
    // if a match is found get user data
    $row = $result->fetch();

    // set session variables
    session_start();
    $_SESSION['timeout'] = time() + 600;
    $_SESSION['user_id'] = $row['user_id'];
    $fname = $row['first_name'];
	$lname = $row['last_name'];

    // set cookies for first and last name
    setcookie('firstname', $fname, time() + 1 * 60, '/');
	setcookie('lastname', $lname, time() + 1 * 60, '/');

    
    header('Location: ../display-person.php');
} else {
    echo 'Invalid Login';
}
$conn = null;
?>
