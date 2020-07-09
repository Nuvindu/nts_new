<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/usercontroller.php'); ?>


<?php 


	$errors = array();
	$first_name = '';
	$last_name = '';
	$index_no = '';
	$email = '';

	if (isset($_GET['user_index'])) {
		// getting the user information
		$user_index = mysqli_real_escape_string($connection, $_GET['user_index']);
		$_SESSION['user_index'] = $user_index;

		$query = "SELECT * FROM user WHERE index_no = '{$user_index}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
				//$user_id = $result['id'];
				$first_name = $result['first_name'];
				$last_name = $result['last_name'];
				$index_no = $result['index_no'];
				$email = $result['email'];
				if (strlen($_SESSION['index_no']) !=2) {
					if ($user_id != $_SESSION['user_id']) {
						header('Location: index.php');
					}
				}
			} else {
				// user not found
				header('Location: ../operator.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: ../operator.php?err=query_failed');
		}
	}
	

 ?>