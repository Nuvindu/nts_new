<?php session_start(); ?>
<?php require_once('Service/login-service.php'); ?>
<?php require_once('inc/functions.php') ?>
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
					if (!empty($errors)) {
						display_errors($errors);
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