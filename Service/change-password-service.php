<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>


<?php 
	
	if (isset($_POST['submit'])) {
		$contrl = new UserController();
		$errors = ErrorCheck::changePasswordErrorCheck();
		if (empty($errors)) {
			$contrl->changePassword();
		}
	}
?>
