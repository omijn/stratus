<?php 	

	session_start();

	$target = "../userstorage/".$_SESSION['id']."/";

	$target_file = $target.basename($_FILES['userfile']['name']);

	// echo $target_file."<br>";

	// echo filesize($target_file);

	// echo $_FILES['userfile']['tmp_name'];

	if(move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file))
		$upload = true;
	else
		$upload = false;

	// echo $upload;	

	header('location: ../home.php');
 ?>