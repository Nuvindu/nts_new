<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['user_id'])) {
		header('Location: login.php');
	}

	$errors = array();
	$first_name = '';
	$last_name = '';
	$nic='';
	$email = '';
	$password = '';
	$index_no = '';
	$batch = '20';
	$last_id = 0;
	$type = '';

	if(isset($_GET['last_id'])){
		$last_id = $_GET['last_id'];
	}

	if (isset($_POST['submit'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$nic= $_POST['nic'];
		$index_no = $_POST['index_no'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_confirm = $_POST['password_confirm'];
		$last_id = $_POST['last_id'];

		// checking required fields
		$req_fields = array('first_name', 'last_name', 'nic', 'index_no', 'email', 'password');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}

		// checking max length
		$max_len_fields = array('first_name' => 50, 'last_name' =>100, 'nic' =>10, 'index_no' =>6, 'email' => 100, 'password' => 40);

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}

		if (strlen($index_no)==6) {
			$batch .= substr($index_no,0, 2);
			$batch = intval($batch);
			$type = "Student";
		} elseif (strlen($index_no)==4) {
			$batch = 1111;
			$type = "Lecturer";
		} elseif (strlen($index_no)==2) {
			$batch = 9999;
			$type = "Operator";
		}

		// checking email address
		//if (!is_email($_POST['email'])) {
			//$errors[] = 'Email address is invalid.';
		//}
		
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "Email address already exists.";
			}
		}

		$index_no = mysqli_real_escape_string($connection, $_POST['index_no']);
		$query = "SELECT * FROM user WHERE index_no = '{$index_no}' LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "Index number already exists.";
			}
		}

		$nic = mysqli_real_escape_string($connection, $_POST['nic']);
		$query = "SELECT * FROM user WHERE NIC = '{$nic}' LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "NIC already used.";
			}
		}

		if ($password!=$password_confirm){
			$errors[]= "Password confirmation is unsuccessful.";
		}

		if (empty($errors)){
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			$password= mysqli_real_escape_string($connection, $_POST['password']);
			$index_no= mysqli_real_escape_string($connection, $_POST['index_no']);
			$hashed_password = sha1($password);

			$query = "INSERT INTO user ( ";
			$query .= "first_name, last_name, NIC, index_no, type, email, password, batch, is_deleted";
			$query .= ") VALUES (";
			$query .= " '{$first_name}' , '{$last_name}', '{$nic}', '{$index_no}', '{$type}', '{$email}', '{$hashed_password}', {$batch},0";
			$query .= ")";

			$result = mysqli_query($connection,$query);

			if ($result){
				// check if a student 
				echo strlen($index_no);
				if (strlen($index_no) == 6) {
					// create record in the result table
					$query = "INSERT INTO result (id, index_no, first_name, last_name, batch, 1T1100, 1T1200, 1T1300, 1T2110, 1T2120, 1T2250, 1T2260, 1T2290, 2T1100, 2T2110, 2T2140, 2T2160, 2T2170, 2T2250, 2T2260, 2T2218, 3T2130, 3T2150, 3T2160, 3T2230, 3T2250, 3T2260, 3T2210, 4T2240, 4T2260, 4T2270, 4T2210, 4T2211, 4T2217, 5T2280, 5T2210, 5T2211, 5T2214, 5T2216, 5T2217, 6T2310, 6T2211, 6T2215, 6T2217, 7T2320, 7T2211, 7T2212, 7T2213, 7T2217, 8T2211, 8T2217, 8T2219, 9T2211, 9T2219, 9T2220, is_deleted) VALUES ({$last_id}, '{$index_no}', '{$first_name}', '{$last_name}', {$batch},'Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null', 0)";
					$result = mysqli_query($connection, $query);

					if ($result) {
						header('Location: operator.php?user_added=true&result_created=true');
					} else {
						die("Database query failed: ".mysqli_error($connection));
						header('Location: operator.php?user_added=true&result_created=false');
					}
				} else {
					header('Location: operator.php?user_added=true');
				}

			} else{
				$errors[] = 'Failed to add the new record';
			}

		}

	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/add-user.css">
</head>
<body>
	
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>

	</header>
	<div class="bg-image">
	<span><a href="operator.php"> User Account &gt&gt</a></span>
	<h1>Add New User </h1>

	<fieldset>
		<?php 

			if (!empty($errors)) {
				echo '<div class="errmsg">';
				echo '<b>There were error(s) on your form.</b><br>';
				foreach ($errors as $error) {
					$error = ucfirst(str_replace("_", " ", $error));
					echo "<b> - $error </b>". '<br>';
				}
				echo '</div>';
			}

		 ?>
	<form action="add-user.php" method="post" class="userform">
		<input type="hidden" name="last_id" value="<?php echo $last_id; ?>">
		<p>
			<label for="">First Name</label>
			<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?>>
		</p>
		<p>
			<label for="">Last Name</label>
			<input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>>
		</p>
		<p>
			<label for="">NIC Number</label>
			<input type="text" name="nic" <?php echo 'value="' . $nic . '"'; ?>>
		</p>
		<p>
			<label for="">Index Number</label>
			<input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?>>
		</p>
		<p>
			<label for="">Email Address</label>
			<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>>
		</p>
		<p>
			<label for="">New Password</label>
			<input type="password" name="password" >
		</p>
		<p>
			<label for="">Confirm Password</label>
			<input type="password" name="password_confirm" >
		</p>
		<p>
			<label for=""></label>
			<button type="submit" name="submit">Submit</button>
		</p>
	</form>
	</fieldset>
	</div>
</body>

</html>
<?php mysqli_close($connection); ?>