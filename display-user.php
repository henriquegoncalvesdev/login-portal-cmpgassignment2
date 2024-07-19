<?php
session_start();
require './inc/header.php';

// check for authentication before we show any data
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
