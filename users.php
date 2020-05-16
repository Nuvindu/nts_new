<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
	if ($_SESSION['admin']!=1){
		header('Location: user-page.php');
	}
	$user_list = '';
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['last_login']}</td>";
		$user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
		$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\">Delete</a></td>";
		$user_list .= "</tr>";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
</head>
<body bgcolor="#b3ffff">
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
	</header>
	<div class="add"><a href="add-user.php">Add New User &gt&gt</a> </br></div>
	<h1>Users</h1>

	<table class="masterlist">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Last Login</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<?php echo $user_list; ?>

	</table>
</body>
</html>
<?php mysqli_close($connection); ?>