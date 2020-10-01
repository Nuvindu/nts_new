<?php require_once('Model/forgotpassword-db.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Forgot Password</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script src="js/jquery-3.3.1.js"></script>
	<link rel="stylesheet" type="text/css" href="css/forgotpw.css">
	<link rel="stylesheet" type="text/css" href="css/forgot-pw-header.css">
</head>
<body>
    <section id="header">
        <div class="header container" style="background-color:yellow;">
            <div class="logo" >
                <img src="./img/web/ntslogopng.png" alt="Logo" >
            </div>
            <div class="nav-bar">

                <div class="brand">
                    <!-- <a href="#home"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool </h1></a> -->
                    <br>
                    <div class="name">


                    </div>

                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a style="font-size: 20px;" href="index.php" data-after="Home"
                                onclick="topFunction()"><b>Home</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#about" data-after="About"><b>About</b></a></li>                   
                        <li><a style="font-size: 20px;" href="departments.php" data-after="Departments"><b>Departments</b></a>
                        </li>
                        <li><a style="font-size: 20px;" href="gallery.php" data-after="Gallery"><b>Gallery</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#contact" data-after="Contact"><b>Contact</b></a></li>
                        <li><a style="font-size: 20px;" href="login.php" data-after="Login"><b>Login</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
	<div class="sendindex" id="sendindex" style="align-content:center;">
		<form id="subform" autocomplete="off">
			<label id = "submitlabel" class="enterIndex" style="align-self:center;" >Enter Index Number</label>
			<br>
			<input type="text" name="verifycode" id="verifycode" class="verifycode" placeholder="Index Number" style="align-items:center;font-size:15px;">
			<br>
			<button type="submit" class="verifybtn" style="font-size:15px;"><center>Submit</center></button>
		</form>
	</div>
	<div class="progress" style="display: none;">
		<h2 style="font-weight: bold;">Verifying...</h2>
		<img src="img/ajax-loader.gif" style ="padding-left: 47px;">
	</div>
	<br><br>
	<div class="verify" id = "verify" style="display: none;" >
		<form id="verifyform" autocomplete="off">
			<label id= "verifylabel" style="text-align: center;">Verify Code</label>
			<br>
			<input type="text" name="entercode" id="entercode" class="entercode" >
			<br>
			<button type="submit" class="enterbtn" id="enterbtn" style="text-align: center;">Verify</button>
					<br><br>
		<div class="warning" style="color: gold;padding-left: 45px;font-size:12px;">*You must enter the code before 10 minutes</div>
		</form>

	
	</div>
	<br><br>
	<p id="test"></p>
	<p id="test1"></p>
	<script src="js/forgotpassword.js"></script>
</body>
</html>
