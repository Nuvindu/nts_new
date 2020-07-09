<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php require_once __DIR__ . "/../Controller/usercontroller.php" ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	if (isset($_GET['user_index'])) {
		// getting the user information
		$user_index = mysqli_real_escape_string($connection, $_GET['user_index']);
		$contrl1 = new UserController();
		$contrl1->deleteUser($user_index);
	} else {
		// query unsuccessful
		header('Location: ../operator.php');
	}	

?>