<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Model/result.php'); ?>
<?php include_once('Model/model.php'); ?>

<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['first_name'])) {
		header('Location: index.php');
	}
	$errors = array();
	$first_term = '';
	$second_term = '';
	$third_term = '';
	$fourth_term = '';
	$fifth_term = '';
	$sixth_term = '';
	$seventh_term = '';
	$eighth_term = '';
	$ninth_term = '';

	$user = Model::viewResults();
	$modules = Result::$modules;
	if($user){
		$allKeys = array_keys($user);
	}
	for ($i=4; $i < 12 ; $i++) { 
		$first_term .= generate_result_table_row($i);
	}

	for ($i=12; $i < 20 ; $i++) { 
		$second_term .= generate_result_table_row($i);
	}

	for ($i=20; $i < 27 ; $i++) { 
		$third_term .= generate_result_table_row($i);
	}

	for ($i=27; $i < 33 ; $i++) { 
		$fourth_term .= generate_result_table_row($i); 
	}

	for ($i=33; $i < 39 ; $i++) { 
		$fifth_term .= generate_result_table_row($i);
	}

	for ($i=39; $i < 43 ; $i++) { 
		$sixth_term .= generate_result_table_row($i);
	}

	for ($i=43; $i < 48 ; $i++) { 
		$seventh_term .= generate_result_table_row($i);
	}

	for ($i=48; $i < 51 ; $i++) { 
		$eighth_term .= generate_result_table_row($i);
	}

	for ($i=51; $i < 54 ; $i++) { 
		$ninth_term .= generate_result_table_row($i);
	}

