<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php include_once('Model/model.php'); ?>


<?php

if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 2){
    header('Location: login.php');
}
else{
	//$errors = array();
	$first_name = '';
	$last_name = '';
	$nic='';
	$email = '';
	$password = '';
	$index_no = '';
	$batch = '20';
	$type = '';
	if (isset($_POST['submit'])) {
		$contrlexcel = new UserController();
		$user = (new UserFactory())->newUser();
		$errors = ErrorCheck::userAddingErrorCheck();
		if (empty($errors)){
			$contrlexcel->addUser($user);
		}
	}
}
?>