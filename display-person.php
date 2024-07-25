<?php
session_start();
require './inc/header.php';

// check for authentication before showing data 
if (!isset($_SESSION['user_id']) || (time() > $_SESSION['timeout'])) {
    session_unset(); 
    session_destroy();
    header('location: login.php');
} else {
    //show the data
    require './inc/database.php';
    $sql = "SELECT * FROM phpdata";
    $result = $conn->query($sql);
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

   
    //personalized welcome message
        $fname = $_COOKIE['firstname'];
		$lname = $_COOKIE['lastname'];
        echo '<p>Welcome, ' . $fname .' '.$lname. '!</p>';
    

    echo '<a class="btn btn-warning" href="logout.php">Logout</a>';
    echo '</section>';

   
}

require './inc/footer.php';
?>
