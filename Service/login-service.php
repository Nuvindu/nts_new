<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>	
<?php include_once('Controller/usercontroller.php'); ?>	
<?php include_once('Controller/errorscheck.php'); ?>	
<?php 
	if (isset($_SESSION['user_id'])) {
		if (strlen($_SESSION['index_no']) == 7) {
			header('Location: Model/student-db.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: operator.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: Model/lecturer-db.php');
		}
	}
	unset($_SESSION['w']);
	unset($_SESSION['fgtpw']);

	// check for form submission
	if (isset($_POST['submit'])) {
		$controller = new UserController();
		$errors = ErrorCheck::userLoginErrorCheck($_POST['index_no'],$_POST['password']);
		if (empty($errors)) {
			$errors = $controller->userLogin($_POST['index_no'],$_POST['password']);
		}
	}
?>