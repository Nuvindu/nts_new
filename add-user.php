<?php session_start(); ?>
<?php include_once('Service/add-user-service.php'); ?>
<?php require_once('inc/functions.php'); ?>

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
		<?php display_errors($errors); ?>
	<form action="add-user.php" method="post" class="userform">
		<p>
			<label for="">First Name</label>
			<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> >
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
			<input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?> >
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
