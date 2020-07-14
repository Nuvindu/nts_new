<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>	
<?php include_once('Controller/usercontroller.php'); ?>	
<?php include_once('Controller/errorscheck.php'); ?>	
<?php 
	if (isset($_SESSION['user_id'])) {
		if (strlen($_SESSION['index_no']) == 6) {
			header('Location: student.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: operator.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: lecturer.php');
		}
	}

	// check for form submission
	if (isset($_POST['submit'])) {
		$controller = new UserController();
		$errors = ErrorCheck::userLoginErrorCheck($_POST['index_no'],$_POST['password']);
		if (empty($errors)) {
			$errors = $controller->userLogin($_POST['index_no'],$_POST['password']);
		}
	}
?>