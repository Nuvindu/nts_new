<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/user.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php 
if(isset($_POST['submit'])) {
	global $connection;
	$type = mysqli_real_escape_string($connection, $_POST['receiver']);
    $sql = "SELECT * FROM user WHERE type = '{$type}'";
	$record_set = mysqli_query($connection, $sql);
	$record = mysqli_fetch_all($record_set);
	$x = false;
	$controller = new Controller();
	foreach ($record as $rec) {
		$emailval = $rec[6];
		$index_no = $rec[0];
		if($type=='Lecturer'){
			$subject  = mysqli_real_escape_string($connection, $_POST['subject']);
			$message  = mysqli_real_escape_string($connection, $_POST['message']);
			$message.=' '.$index_no;  
			$user =  new Lecturer('','','','','',$index_no);
			$user->setEmail($emailval);
			$user->setController($controller);
			$x = $user->distributeEmail($subject,$message);
		}
		else if($type=='Student'){
			$subject  = mysqli_real_escape_string($connection, $_POST['subject']);
			$message  = mysqli_real_escape_string($connection, $_POST['message']);
			$message.=' '.$index_no;  
			$user =  new Student('','','','','',$index_no);
			$user->setEmail($emailval);
			$user->setController($controller);
			$x = $user->distributeEmail($subject,$message);
		}
		if($x==false){
			echo "Error";
			return;
		}

    }

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Send Notifications</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/distributeemail.css">
	<link href='https://fonts.googleapis.com/css?family=Cabin Sketch' rel='stylesheet'>
</head>
<body>
	<h2>Send Notifications</h2>
	<form action="distributemail.php" method="post" class="userform">
        <label for="">Send To:</label>
        <select name="receiver" id="receiver"style="border: black;border-radius: 3px;padding: 5px;padding-right: 20px;">
        	<option value = 'Lecturer' selected> Lecturers </option>
        	<option value = 'Student'> Students </option>
        </select>
		<br><br>
		<label for="">Subject</label>
		<input type="text" class = "subject" name="subject">
		<br><br>
		<label for="" class="messagelabel">Message</label>
		<br>
		<textarea type="text" class = "message" name="message"></textarea>
		<br>
		<button name="submit">Submit</button>
	</form>




</body>
</html>