<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/result.php'); ?>
<?php require_once('Controller/errorscheck.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 4) {
        header('Location: index.php');
    }
	
	$errors = array();
	$Date = '';
	$Time = '';
	$Place='';
	$Module_code = '';
	$Module_name = '';

    $contrl3b = new Controller();
	if (isset($_POST['submit'])) {
		$errors = ErrorCheck::timeTableErrorCheck();
		if (empty($errors)){
			$contrl3b->addTimeTable3b();
		}

	}



?>
