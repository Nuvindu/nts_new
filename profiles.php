<?php require_once('inc/dbconnection.php'); ?>
<?php session_start(); ?>
<?php 

	if (isset($_SESSION['index_no'])) {
		if (strlen($_SESSION['index_no']) == 7) {
			header('Location: student-profile.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: operator.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: lecturer-profile.php');
		}
	}
	else{
		header('Location: login.php');
	}


 ?>