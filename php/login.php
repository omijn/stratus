<?php 
	
	include('connection.php');

	/*	SIGN IN
	*	check if account exists
	*	validate password
	*/	

	

	$email = $_POST['email-si'];
	$password = $_POST['password-si'];
	
	$auth = false;

	$sql = "SELECT * FROM stratusUsers WHERE email = '".$email."';";

	$result = $connection->query($sql);

	$row = $result->fetch_assoc();

	$accountExists = $result->num_rows;

	if($accountExists) {
		if($row['password'] == $password) {

			$auth = true;
			
			session_start();

			$_SESSION['id'] = $row['storage'];
			$_SESSION['email'] = $email;

			echo "logged in";		

			header('location: ../home.php');
		}		
	}

	if($auth == false)
		header('location: ../index.php');

 ?>