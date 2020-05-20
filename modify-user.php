<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}
	if (strlen($_SESSION['index_no']) != 2) {
		header('Location: index.php');
	}

	$errors = array();
	$user_id = '';
	$first_name = '';
	$last_name = '';
	$index_no = '';
	$email = '';

	if (isset($_GET['user_id'])) {
		// getting the user information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
				$user_id = $result['id'];
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
				header('Location: operator.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: operator.php?err=query_failed');
		}
	}

	if (isset($_POST['submit'])) {
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$index_no = $_POST['index_no'];
		$email = $_POST['email'];

		// checking required fields
		$req_fields = array('user_id', 'first_name', 'last_name', 'index_no', 'email');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' => 50, 'last_name' =>100, 'index_no' =>6, 'email' => 100);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// verify if a valid index no

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM user WHERE email = '{$email}' AND id != {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		// checking if index_no already exists
		$index_no = mysqli_real_escape_string($connection, $_POST['index_no']);
		$query = "SELECT * FROM user WHERE index_no = '{$index_no}' AND id != {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Index number already exists';
			}
		}

		if (empty($errors)) {
			// no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			// email address is already sanitized

			$query = "UPDATE user SET ";
			$query .= "first_name = '{$first_name}', ";
			$query .= "last_name = '{$last_name}', ";
			$query .= "index_no = '{$index_no}', ";			
			$query .= "email = '{$email}' ";
			$query .= "WHERE id = {$user_id} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: operator.php?user_modified=true');
			} else {
				$errors[] = 'Failed to modify the record.';
			}


		}



	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modify User</title>
	<link rel="stylesheet" href="./style/style-header.css">
	<link rel="stylesheet" href="./css/modify-user.css">
</head>
<body>
	<header>
		<div class="logger">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; padding-top: 20px;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>

	<main>
		<h1>User Modification</h1>
		<div class="back"><span> <a href="operator.php"><< Back to User List</a></span></div>
		

		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
		<fieldset>
		<form action="modify-user.php" method="post" class="userform">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			<p>
				<label for="">First Name:</label>
				<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?>>
			</p>

			<p>
				<label for="">Last Name:</label>
				<input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>>
			</p>

			<p>
				<label for="">Index Number:</label>
				<input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?>>
			</p>

			<p>
				<label for="">Email Address:</label>
				<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>>
			</p>

			<p>
				<label for="">Password:</label>
				<span>******</span> | <a href="change-password.php?user_id=<?php echo $user_id; ?>">Change Password</a>
			</p>

			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Save</button>
			</p>

		</form>
		</fieldset>
		
		
	</main>
</body>
</html>