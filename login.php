<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>	
<?php 
	if (isset($_SESSION['user_id'])) {
		if (strlen($_SESSION['index_no']) == 6) {
			header('Location: student.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: operator.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: lecturer.php');
		}
	}

	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['index_no']) || strlen(trim($_POST['index_no'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$index_no 		= mysqli_real_escape_string($connection, $_POST['index_no']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM user 
						WHERE index_no = '{$index_no}' 
						AND password = '{$hashed_password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				// valid user found
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['first_name'] = $user['first_name'];
				$_SESSION['index_no'] = $user['index_no'];

				// updating last login
				$query = "UPDATE user SET last_login = NOW() ";
				$query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

				if (strlen($_SESSION['index_no']) == 6) {
					header('Location: student.php');
				} elseif (strlen($_SESSION['index_no']) == 2) {
					header('Location: operator.php');
				}elseif (strlen($_SESSION['index_no']) == 4) {
					header('Location: lecturer.php');
				}
			} else {
				// user name and password invalid
				$errors[] = 'Invalid Username / Password';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/log.css">
</head>
<body background="img/green.jpg">
	<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
	<div class="top"><a href="index.php">Home</a></div>
	<div class="mid clearfix">
		<h3>&nbsp;&nbsp;Login &nbsp;&nbsp;</h3>
		<div class="mid-right clearfix">
			<form action="login.php" method="post">
			<?php 
					if (isset($errors) && !empty($errors)) {
						echo '<p class="error">Invalid Username / Password</p>';
					}
			?>	
			<input type="text" name="index_no" id="" placeholder="Index Number">
			<br/>
			<br/>
			<input type="password" name="password" id="" placeholder="Password"><br/><br/>
			<button type="submit" name="submit">Log In</button>
		</div>
	</div>
</body>
</html>

<?php mysqli_close($connection); ?>