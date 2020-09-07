<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/user.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php 
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 2){
    header('Location: login.php');
}

$control = new Controller();
$x =true;
if(isset($_POST['submit'])) {
	global $connection;
	$type = mysqli_real_escape_string($connection, $_POST['receiver']);
	$subject  = mysqli_real_escape_string($connection, $_POST['subject']);
	$message  = mysqli_real_escape_string($connection, $_POST['message']);
	if($type=='Student'){
		$user = new Student('','','','','','');
		$user->setType($type);
		$x = $user->distributeEmail($control,$subject,$message);
	}
	else if($type=='Lecturer'){
		$user = new Lecturer('','','','','','');
		$user->setType($type);
		$x = $user->distributeEmail($control,$subject,$message);
	}

	if($x==false){
		echo "<script>alert('Error Occurred.');</script>";
		return;
	}
    if($x){
    	echo "<script>alert('Notifications are sent to all {$type}s.');</script>";
    	return;
    }
}

 ?>