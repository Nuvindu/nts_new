<?php session_start(); ?>
<?php include_once('Service/add-user-service.php'); ?>
<?php require_once('inc/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New User</title>
	<link rel="stylesheet" type="text/css" href="css/addUserRes.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
	<header>
<!-- 	<div class="back" style="float:right;"><a href="operator.php">&gt&gtBack</a></div>
    <div class="icon"><img src="img/home.ico" width="22" height="22"><a href="index.php">Home</a></div> -->    
        <div class="logger" style="padding-top: 5px;float: right;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
                href="Service/logout.php">Log Out</a> </div>  
               
    </header>
   	<br>
   	<br>
	<!-- header -->
    <div class="header">
            <?php include_once('header.php'); ?>

    </div>
    
    <div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>
        <br>
        <br>
        
     <div class="container" style="padding-bottom:10%;">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Add New User</h2>
                <?php display_errors($errors); ?>
				<form action="add-user-responsive.php" method="post" class="userform">
				<p>
			<!-- <label for="">First Name</label> -->
			<input type="text" class="field" placeholder="First Name" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> >
		</p>
		<p>
			<!-- <label for="">Last Name</label> -->
			<input type="text" class="field" placeholder="Last Name" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>>
		</p>
		<p>
			<!-- <label for="">NIC Number</label> -->
			<input type="text"class="field" placeholder="NIC" name="nic" <?php echo 'value="' . $nic . '"'; ?>>
		</p>
		<p>
			<!-- <label for="">Index Number</label> -->
			<input type="text"class="field" placeholder="Index Number" name="index_no" <?php echo 'value="' . $index_no . '"'; ?> >
		</p>
		<p>
			<!-- <label for="">Email Address</label> -->
			<input type="text" class="field" placeholder="Email" name="email" <?php echo 'value="' . $email . '"'; ?>>
		</p>
		<p>
			<!-- <label for="">New Password</label> -->
			<input type="password" class="field" placeholder="Password" name="password" >
		</p>
		<p>
			<!-- <label for="">Confirm Password</label> -->
			<input type="password" class="field" placeholder="Confirm Password" name="password_confirm" >
		</p>
		<p>
			<!-- <label for=""></label> -->
			<button type="submit" class="btn" name="submit">Submit</button>
		</p>
		</form>
			
			
		</div>
    </div>
    
	</body>
</html>