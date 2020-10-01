<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/result.php'); ?>
<?php include_once('Model/model.php'); ?>

<?php 
	//checking if a user is logged in
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 7){
    header('Location: login.php');
}
else{
	$errors = array();
	$first_year = '';
	$second_year = '';
	$third_year = '';

	$user = Model::viewResults();
	$modules = Result::$modules;
	if($user){
		$allKeys = array_keys($user);
	}
	for ($i=4; $i < 11 ; $i++) { 
		$first_year .= generate_result_table_row($i);
	}

	for ($i=11; $i < 13 ; $i++) { 
		$second_year .= generate_result_table_row($i);
	}

	for ($i=13; $i < 18 ; $i++) { 
		$third_year .= generate_result_table_row($i);
	}
}

