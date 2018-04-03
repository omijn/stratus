<?php 

	session_start();

	unlink("../userstorage/".$_SESSION['id']."/".$_POST['item']);

	header('location: ../home.php');

 ?>