<?php session_start(); ?>
<?php 
if(!isset($_SESSION['fgtpw'])){
	header('Location: index.php');
}
unset($_SESSION['w']);
unset($_SESSION['fgtpw']);
$index_no = '';
	global $connection;
	if (isset($_GET['user_index'])) {
		// getting the user information
		$user_index = mysqli_real_escape_string($connection, $_GET['user_index']);
		$query = "SELECT * FROM user WHERE index_no = '{$user_index}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
				$index_no = $result['index_no'];
				$sql = "DELETE from verifypassword WHERE index_no = {$user_index} LIMIT 1";
				$del = mysqli_query($connection,$sql);
			}
		}
	}
 ?>