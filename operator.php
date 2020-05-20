<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
	if (strlen($_SESSION['index_no']) != 2) {
		header('Location: index.php');
	}
	//if ($_SESSION['admin']!=1){
	//	header('Location: user-page.php');
	//}
	$user_list = '';
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY id";
	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['last_login']}</td>";
		$user_list .= "<td>{$user['type']}</td>";
		$user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
		$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\">Delete</a></td>";
		$user_list .= "</tr>";
		$last_id = $user['id']+1;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
	</header>
	<div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; text-align: center;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
	<div class="add"><a href="add-user.php?last_id=<?php echo($last_id) ?>">Add New User &gt&gt</a> </br></div>
	<h1>Users</h1>

	<table class="masterlist">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Last Login</th>
			<th>Type</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<?php echo $user_list; ?>

	</table>
</body>
</html>
<?php mysqli_close($connection); ?>