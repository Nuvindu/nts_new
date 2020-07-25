<?php
	if(isset($_POST['submit'])) {
		$subject = $_POST['subject'];
		$feedback = $_POST['feedback'];
		$to = 'feed.back12569@gmail.com';
		$mail_subject = 'Feedback for the Website';
		// $email_body = "From: Anonymous <br>";
		$email_body = "<b>Subject: </b> {$subject} <br>";
		$email_body .= "<b>Message: </b> <br>".nl2br(strip_tags($feedback));
		$header = "Content-Type: text/html;";
		$sending = mail($to,$mail_subject,$email_body,$header);
		if(!$sending){
			echo "<script>alert('Error ocurred in sending the feedback');</script>";
		}
		else{
			header('Location: login.php');
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
	<link href='https://fonts.googleapis.com/css?family=Cabin Sketch' rel='stylesheet'>
</head>
<body>
	<h2>Feedback</h2>
	<form action="feedback.php" method="post" class="userform">
		<label for="">Subject</label>
		<input type="text" class = "subject" name="subject">
		<br><br>
		<label for="" class="feedlabel">Feedback</label>
		<br>
		<textarea type="text" class = "feedback" name="feedback"></textarea>
		<br>
		<button name="submit">Submit</button>
	</form>




</body>
</html>