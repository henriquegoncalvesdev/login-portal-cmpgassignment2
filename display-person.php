<?php
session_start();
require './inc/header.php';

// check for authentication before we show any data
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset();     // Unset all session variables
    session_destroy();
    header('location: login.php');
} else {
    // connect to db
    require './inc/database.php';

    // set up query
    $sql = "SELECT * FROM phpdata";

    // run the query and store the results
    $result = $conn->query($sql);

    // start our table
    echo '<section class="person-row text-center">';
    echo '<table class="table table-striped">
                  <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>CRUD</th>
                      <th>Operations</th>
                  </tr>';

    foreach ($result as $row) {
        echo '<tr>
                      <td>' . $row['fname']  . '</td>
                      <td>' . $row['lname']  . '</td>
                      <td>' . $row['email']  . '</td>
                      <td>' . $row['telNumber']  . '</td>
                      <td><a class="btn btn-primary" href="update.php?id=' . $row['id'] . '">Update</a></td>
                      <td><a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a></td>
             </tr>';
    }

    // close the table
    echo '</table>';

    // Display the username from the session variable if available
    
        $fname = $_COOKIE['firstname'];
		$lname = $_COOKIE['lastname'];
        echo '<p>Welcome, ' . $fname .' '.$lname. '!</p>';
    

    echo '<a class="btn btn-warning" href="logout.php">Logout</a>';
    echo '</section>';

   
}

require './inc/footer.php';
?>
