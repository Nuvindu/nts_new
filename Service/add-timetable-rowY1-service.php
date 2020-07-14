<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/result.php'); ?>
<?php require_once('Controller/errorscheck.php'); ?>
<?php 
	
	$errors = array();
	$Date = '';
	$Time = '';
	$Place='';
	$Module_code = '';
	$Module_name = '';

    $contrl = new Controller();
	if (isset($_POST['submit'])) {
		$errors = ErrorCheck::timeTableErrorCheck();
		if (empty($errors)){
			$contrl->addTimeTable();
		}

	}



?>
