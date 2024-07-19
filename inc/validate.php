<?php
// store the user inputs in variables and hash the password
$username = $_POST['username'];
$password = hash('sha512', $_POST['password']);

// connect to db
require 'database.php';

// set up and run the query
$sql = "SELECT user_id, username,first_name,last_name FROM phpusers 
        WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// store the number of results in a variable
$count = $result->rowCount();

// check if any matches found
if ($count == 1) {
    $row = $result->fetch();

    // access the existing session created automatically by the server
    session_start();
    $_SESSION['timeout'] = time() + 600;//seconds

    // take the user's id from the database and store it in a session variable
    $_SESSION['user_id'] = $row['user_id'];
    $fname = $row['first_name'];
	$lname = $row['last_name'];

    // Set cookie
    setcookie('firstname', $fname, time() + 1 * 60, '/');//seconds
	setcookie('lastname', $lname, time() + 2 * 60, '/');

    // redirect the user
    header('Location: ../display-person.php');
} else {
    echo 'Invalid Login';
}
$conn = null;
?>
