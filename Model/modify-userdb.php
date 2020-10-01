<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/usercontroller.php'); ?>


<?php 


	$errors = array();
	$first_name = '';
	$last_name = '';
	$index_no = '';
	$email = '';
	$department = '';
	$year= '';

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

				if (strlen($index_no) ==4) {
					$sql = "SELECT * FROM lecturers WHERE index_no = '{$index_no}' LIMIT 1";
					$rec = mysqli_query($connection, $sql);
					if (mysqli_num_rows($rec) == 1) {
						$new_rec = mysqli_fetch_assoc($rec);
						$dprtmnt = $new_rec['department'];
						$mysql ="SELECT * FROM department WHERE department_code = '{$dprtmnt}' LIMIT 1";
						$myrec = mysqli_query($connection, $mysql);
						$new_rec1 = mysqli_fetch_assoc($myrec);
						$department = $new_rec1['department_name'];
						$department = str_replace(" ", "_", $department);

						$thepost = $new_rec['post'];
						$thedegree = $new_rec['degree'];
						$thetitle = $new_rec['title'];
					}
				}

				else if(strlen($index_no) ==7){
					$sql = "SELECT * FROM students WHERE index_no = '{$index_no}' LIMIT 1";
				    $rec_set = mysqli_query($connection, $sql);
				    $rec = mysqli_fetch_assoc($rec_set);
				    $year = $rec['year'];
				} else if(strlen($index_no) !=2){
				// user not found
					header('Location: ../operator.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: ../operator.php?err=query_failed');
		}
	}
}
	

 ?>