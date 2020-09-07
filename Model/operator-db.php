<?php require_once('inc/dbconnection.php'); ?>
<?php 
	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
	if (strlen($_SESSION['index_no']) != 2) {
		header('Location: index.php');
	}
	// if(isset($_SESSION['lecturer_modified'])){
	// 	if($_SESSION['lecturer_modified']==false){
	// 		echo '<script>alert("Invalid.")</script>';
	// 	}
	// }
	$user_list = '';
	$search = '';
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY index_no ASC";
	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['index_no']}</td>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['last_login']}</td>";
		$user_list .= "<td>{$user['type']}</td>";
		$user_list .= "<td><a href=\"modify-user.php?user_index={$user['index_no']}\">Edit</a></td>";
		$user_list .= "<td><a href=\"Service/delete-user.php?user_index={$user['index_no']}\">Delete</a></td>";
		$user_list .= "</tr>";
	}


 ?>