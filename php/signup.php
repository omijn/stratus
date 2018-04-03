<?php 
	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	include('connection.php');

	/*	SIGN UP
	*	check whether account already exists
	*	if not, make a new account	
	*/

	$email = $_POST['email-su'];
	$password = $_POST['password-su'];

	$sql = "SELECT * FROM stratusUsers WHERE email = '".$email."';";

	$result = $connection->query($sql);

	$accountExists = $result->num_rows;
	
	if(!$accountExists) {
		$accountExistsMessage = "";

		$sql = "SELECT storage FROM stratusUsers ORDER BY storage DESC LIMIT 1";
		$result = $connection->query($sql);
		$row = $result->fetch_assoc();

		$last_storage = $row['storage'];

		$new_storage = $last_storage + 1;

		$sql = "INSERT INTO stratusUsers VALUES('".$email."', '".$password."', ".$new_storage.")";
		$connection->query($sql);

		session_start();

		$_SESSION['id'] = $new_storage;
		$_SESSION['email'] = $email;

		$path = "../userstorage/".$new_storage."/";
		mkdir($path, 0777);

		header('location:../home.php');
	}

	else {
		echo "This account already exists!";
	}

	

 ?>