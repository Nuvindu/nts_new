<?php require_once('Model/forgotpassword-db.php'); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Forgot Password</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/forgotpassword.js"></script>
	<link rel="stylesheet" type="text/css" href="css/forgotpw.css">
</head>
<body>
	<div class="sendindex" id="sendindex" style="align-content:center;">
		<form id="subform" autocomplete="off">
			<label id = "submitlabel" class="enterIndex" style="align-self:center;">Enter Index Number</label>
			<br>
			<input type="text" name="verifycode" id="verifycode" class="verifycode" style="align-items:center;font-size:15px;">
			<br>
			<button type="submit" class="verifybtn" style="font-size:15px;"><center>Submit</center></button>
		</form>
	</div>
	<div class="progress" style="display: none;">
		<h2>Verifying...</h2>
		<img src="img/ajax-loader.gif" style ="padding-left: 47px;">
	</div>
	<br><br>
	<div class="verify" id = "verify" style="display: none;" >
		<form id="verifyform" autocomplete="off">
			<label id= "verifylabel">Verify Code</label>
			<br>
			<input type="Number" name="entercode" id="entercode" class="entercode" >
			<br>
			<button type="submit" class="enterbtn">Verify</button>
		</form>
	
	</div>
	<br><br>
	<p id="test"></p>
	<p id="test1"></p>
</body>
</html>
