<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php 

	if(isset($_POST['submit'])) {

		$contrlr = new UserController();
		$errors = ErrorCheck::editResultErrorCheck();
		if(empty($errors)){
			$contrlr->editResults($_SESSION['$user_id'],$_SESSION['$module_code']);
		}
		unset($_SESSION['$user_id']);
		unset($_SESSION['$module_code']);
	}

?>