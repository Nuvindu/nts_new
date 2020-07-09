<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/modify-userdb.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>

<?php 
if (!isset($_SESSION['index_no'])) {
		header('Location: index.php');
	}
if (strlen($_SESSION['index_no']) != 2) {
	header('Location: index.php');
}

if(isset($_POST['submit'])) {
	$contrl1 = new UserController();
	$errors = Errorcheck::userUpdateErrorCheck();
	if (empty($errors)){
		$contrl1->updateUser($_SESSION['user_index']);
	}
	
}


 ?>