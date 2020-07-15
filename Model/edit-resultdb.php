<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}
	if (strlen($_SESSION['index_no']) != 4) {
		header('Location: index.php');
	}
	$errors = array();
	$user_id = '';
	$first_name = '';
	$last_name = '';
	$index_no = '';
	$result = '';
	$module_code = '';
	$code = '';
	$year='';

	if (isset($_GET['user_id'])) {
		global $connection;
		// getting the user information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$module_code = mysqli_real_escape_string($connection, $_GET['module_code']);
		$year = substr($module_code, 0,2);		
		$query = "SELECT index_no,first_name,last_name,{$module_code} FROM result WHERE index_no = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				
				// user found
				$record = mysqli_fetch_assoc($result_set);
				$user_id = $record['index_no'];
				$result = $record["{$module_code}"];
				$first_name = $record['first_name'];
				$last_name = $record['last_name'];
				$index_no = $record['index_no'];
				$_SESSION['$user_id']  = $user_id; 
				$_SESSION['$module_code'] = "{$module_code}";

			} else {
				// user not found
				header('Location: results.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: results.php?err=query_failed');
		}
	}


?>