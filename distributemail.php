<?php require_once('Service/distributemail-service.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Notifications</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script>
		function myFunction(event){
			var x = event.keyCode;
			if (x == 13){
				document.getElementById('submit').click();
				$("#message").prop('disabled', true);
			}
		}
	</script>
</head>
<body>
<header>
	
   <!--  <div class="icon"><img src="img/home.ico" width="22" height="22"><a href="index.php">Home</a></div> -->
    <div class="logger" style="padding-top: 5px;float: right;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
            href="Service/logout.php">Log Out</a> </div>  
        
    </header>
   <br>
   <br>
	<!-- header -->
    <div class="header">
            <?php include_once('header.php'); ?>
    </div>
    <br>
    <div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>
     <div class="container" style="padding-bottom:10%;">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Send Notifications</h2>
				<form action="distributemail.php" method="post" class="userform" id="form">
				<select name="receiver" id="receiver" input type="text" class="field" placeholder="Receiver" >
					<option value = 'Lecturer'> Lecturers </option>
     				<option value = 'Student' selected> Students </option>
        		</select>
				<input type="text" class="field" placeholder="Subject" name="subject" required>
				<textarea placeholder="Message" class="field" name="message" id="message" onkeypress="myFunction(event)" required></textarea>
				<button name="submit" class="btn" id="submit">Send</button>
			</form>
			</div>
			
		</div>
	</div>
	</body>
</html>
