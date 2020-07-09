<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Service/modify-user-service.php'); ?>


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
		<fieldset>
			<?php display_errors($errors); ?>
		<form action="modify-user.php" method="post" class="userform">
			<input type="hidden" name="user_index" value="<?php echo $user_index; ?>">
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
				<span>******</span> | <a href="change-password.php?user_index=<?php echo $user_index; ?>">Change Password</a>
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