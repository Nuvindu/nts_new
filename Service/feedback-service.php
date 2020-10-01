<?php session_start(); ?>
<?php
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if ((strlen($_SESSION['index_no']) != 4) && (strlen($_SESSION['index_no']) != 7)) {
        header('Location: index.php');
    }
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
			echo "<script>alert('Feedback is successfully sent.');</script>";
		}
	}
?>