<?php require_once __DIR__ . "/../inc/functions.php" ?>
<?php require_once __DIR__ . "/../Model/model.php" ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php require_once('controllerinterface.php'); ?>
<?php 

class Controller implements IController{

	private Model $model;

	public function __construct(){
	}

	public function compareCode($verifycode,$index){
		return Model::compareCode($verifycode,$index);
	}

	public function sendMail($email,$code,$index){      // send the verify code to the index mail
		$subject = "Account Verification";
		$email = 'feed.back12569@gmail.com';
		$mail_subject = 'Account Verification';
		// $email_body = "From: Anonymous <br>";
		$email_body = "Your password verification code is {$code}";
		$header = "Content-Type: text/html;";
		$sending = mail($email,$mail_subject,$email_body,$header);
		if(!$sending){
			echo "<script>alert('Error ocurred in sending email.');</script>";
		}
		else{
			$hashed_code = sha1($code); //hash the entered code
			$time = getTime();	
			return Model::createPasswordTable($hashed_code,$time,$index); 
		}
	}
	public function distributeEmail($email,$subject,$email_body){
		$email_body .= ' '.$email;
		$email = 'feed.back12569@gmail.com';
		$header = "Content-Type: text/html;";
		$sending = mail($email,$subject,$email_body,$header);
		if(!$sending){
			echo "<script>alert('Error ocurred in sending email.');</script>";
		}
		else{
			return true;
		}
	}	

	public function addTimeTable(){
		global $connection;
		$Date= mysqli_real_escape_string($connection, $_POST['Date']);
		$Time = mysqli_real_escape_string($connection, $_POST['Time']);
		$Place= mysqli_real_escape_string($connection, $_POST['Place']);
		$Module_name= mysqli_real_escape_string($connection, $_POST['Module_name']);

		$timetable =  new TimeTable($Time,$Date,$Place,$Module_name);

		return Model::addTimeTable($timetable);


	}
	public function addTimetable2(){
		global $connection;
		$Date= mysqli_real_escape_string($connection, $_POST['Date']);
		$Time = mysqli_real_escape_string($connection, $_POST['Time']);
		$Place= mysqli_real_escape_string($connection, $_POST['Place']);
		$Module_name= mysqli_real_escape_string($connection, $_POST['Module_name']);

		$timetable =  new TimeTable($Time,$Date,$Place,$Module_name);

		return Model::addTimetable2($timetable);


	}
	public function addTimetable3(){
		global $connection;
		$Date= mysqli_real_escape_string($connection, $_POST['Date']);
		$Time = mysqli_real_escape_string($connection, $_POST['Time']);
		$Place= mysqli_real_escape_string($connection, $_POST['Place']);
		$Module_name= mysqli_real_escape_string($connection, $_POST['Module_name']);

		$timetable =  new TimeTable($Time,$Date,$Place,$Module_name);

		return Model::addTimetable3($timetable);


	}
}

?>




 
