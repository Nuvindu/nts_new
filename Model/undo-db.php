<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php require_once __DIR__ . "/../Model/model.php" ?>
<?php require_once __DIR__ . "/../Model/user.php" ?>
<?php require_once __DIR__ . "/../Controller/controller.php" ?>
<?php 
if(isset($_COOKIE['memento'])){
	$memento = unserialize($_COOKIE['memento']);
	$originator = new Originator();
	$originator->getMemento($memento);
	$state = $originator->getState();
	$id = $state['id'];
	$subject = $state['subject'];
	$message = $state['message'];
	$index_no = $state['index'];

	$x = Model::undoNotification($id,$index_no,$subject,$message);
	if($x){
		setcookie("memento",null, time() + (600), "/"); 
		header('Location: ../notifications.php');
	}
	else{
		setcookie("memento",null, time() + (600), "/");
		header('Location: ../notifications.php?error=could_not_undo');
	}


}
else{
	header('Location: ../notifications.php?error=timed_out');
}


 ?>