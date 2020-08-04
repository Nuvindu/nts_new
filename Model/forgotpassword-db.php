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