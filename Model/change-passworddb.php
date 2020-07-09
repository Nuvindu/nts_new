<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>


<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['index_no'])) {
		header('Location: index.php');
	}
	if (strlen($_SESSION['index_no']) != 2) {
		header('Location: index.php');
	}

	$errors = array();
	$user_index = '';
	$first_name = '';
	$last_name = '';
	$email = '';
	$index_no = '';

	if (isset($_GET['user_index'])) {
		// getting the user information
		$user_index = mysqli_real_escape_string($connection, $_GET['user_index']);
		$query = "SELECT * FROM user WHERE index_no = '{$user_index}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
				$first_name = $result['first_name'];
				$last_name = $result['last_name'];
				$email = $result['email'];
				$index_no = $result['index_no'];
			} else {
				// user not found
				header('Location: operator.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: operator.php?err=query_failed');
		}
	}

?>
