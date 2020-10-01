<?php session_start(); ?>
<?php require_once('Service/login-service.php'); ?>
<?php require_once('inc/functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>NTS Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="icon" style="float:right;padding-right:1%;"><img src="img/home.ico" width="22" height="22"></div>
<div class="top" style="float:right;font-size:3rem"><a href="index.php">Home</a></div>

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/n4.jpg">
		</div>
		<div class="login-content">
			<form action="login.php" method="post">

			<h2 style="font-size:1.5rem;">College of Nursing<br>Galle</h2>
			
				<img src="img/logo-0.png">
				<h2 style="font-size:1.5rem;">Welcome</h2>

        <div class="errors" style="color: red;">
              <?php 
                if (!empty($errors)) {
                  display_errors($errors);
                }
              ?>  
        </div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text"  name="index_no" id="" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password"  name="password" id="" class="input">
            	   </div>
            	</div>
            	<a href="forgotpassword.php">Forgot Password?</a>
            	<input type="submit" class="btn" name="submit" value="Login">
            <!-- </form> -->
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>
