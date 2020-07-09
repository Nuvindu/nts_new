<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php include_once('Model/model.php'); ?>


<?php 

$errors = array();
$first_name = '';
$last_name = '';
$nic='';
$email = '';
$password = '';
$index_no = '';
$batch = '20';
$type = '';
if (isset($_POST['submit'])) {
	$contrl = new UserController();
	$user = (new UserFactory())->newUser();
	$errors = ErrorCheck::userAddingErrorCheck();
	if (empty($errors)){
		$contrl->addUser($user);
	}
}

?>