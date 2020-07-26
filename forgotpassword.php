<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Model/model.php'); ?>
<?php 
	if(!isset($_SESSION['w'])){
		$_SESSION['w'] = 1;
	}
	$index = '';
	$contrl = new Controller(); //creating a new controller object
	if(isset($_POST['verifycode'])){
		$index = mysqli_real_escape_string($connection, $_POST['verifycode']);
		global $connection;
		$query = "SELECT * FROM user WHERE index_no = '{$index}'"; 
		$record = mysqli_query($connection, $query);
		if (mysqli_num_rows($record) == 1) {   //verifying the index is valid
			// valid user found
			$_SESSION['verifyindex'] = $index ; // session the index that input
			$user = mysqli_fetch_assoc($record);
			$email = $user['email'];  // get the email of the user
			$code = mt_rand(100001,999999);  // create a 6-digit random code
			// echo $email;
			// echo sha1(366487);
			$time = intval(getTime());  // get the current time
			// echo $time;
			$contrl->sendMail($email,$code,$index); // send the code to the email and update the verification table
			exit;
		}
		else{
			exit;
		}
	}
	else if(isset($_POST['entercode'])){   // execute only when the verify button is submitted
		$verifycode = mysqli_real_escape_string($connection, $_POST['entercode']);
		$index = $_SESSION['verifyindex'];  // get the index in the session 
		// $table_time_str = "20200723195221";
		// $compare = compareTime($table_time_str);
		$contrl->compareCode($verifycode,$index);  //compare the time difference is less than 10 mins and it is true, then allow to change the password

		exit;
		
		
	}


 ?>
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
