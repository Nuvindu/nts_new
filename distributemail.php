<?php require_once('Service/distributemail-service.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Notifications</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
<header>
	<div class="back" style="float:right;"><a href="operator.php">&gt&gtBack</a></div>
    <div class="icon"><img src="img/home.ico" width="22" height="22"><a href="index.php">Home</a></div>
        
        
    </header>
   
	<!-- header -->
    <div class="header">
            <?php include_once('header.php'); ?>
    </div>
     
     <div class="container" style="padding-bottom:10%;">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Send Notifications</h2>
				<form action="distributemail.php" method="post" class="userform">
				<select name="receiver" id="receiver" input type="text" class="field" placeholder="Receiver" >
					<option value = 'Lecturer'> Lecturers </option>
     				<option value = 'Student' selected> Students </option>
        		</select>
				<input type="text" class="field" placeholder="Subject" name="subject">
				<textarea placeholder="Feedback" class="field" name="message"></textarea>
				<button name="submit" class="btn">Send</button>
			</form>
			</div>
			
		</div>
	</div>
	</body>
</html>
