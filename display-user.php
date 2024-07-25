<?php
session_start();
require './inc/header.php';

    require './inc/database.php';

    // display the records in the database table
    $sql = "SELECT * FROM phpdata";
    $result = $conn->query($sql);
    echo '<section class="person-row text-center">';
    echo '<table class="table table-striped">
                  <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                  </tr>';

    foreach ($result as $row) {
        echo '<tr>
                      <td>' . $row['fname']  . '</td>
                      <td>' . $row['lname']  . '</td>
                      <td>' . $row['email']  . '</td>
                      <td>' . $row['telNumber']  . '</td>
             </tr>';
    }
    echo '</table>';
    echo '<a class="btn btn-dark mt-5 btn-register" href="add-data.php">Add Data</a>';
    echo '</section>';

require './inc/footer.php';
?>
