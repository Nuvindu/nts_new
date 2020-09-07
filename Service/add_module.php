<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/result.php'); ?>
<?php require_once('Controller/errorscheck.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 2) {
        header('Location: index.php');
    }
	
	$errors = array();
	$module_code = '';
	$module_name= '';
	$year='';
	$department = '';

    $contrlm= new Controller();
	if (isset($_POST['submit'])) {
		$errors = ErrorCheck::addModuleCheck();
		if (empty($errors)){
			$contrlm->addModule();
		}

	}



?>
