<?php
	// connection
	require './inc/database.php';
	// variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	// validate inputs
	$ok = true;
	require './inc/header.php';

		if ($password != $confirm) {
			echo '<p>Invalid password</p>';
			$ok = false;
		}

		

	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO phpusers (first_name, last_name, username, password) 
		VALUES ('$first_name', '$last_name', '$username', '$password');";
		$conn->exec($sql);
		header("Location: login.php"); 	
	}
	?>
<?php require './inc/footer.php'; ?>