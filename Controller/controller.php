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
			// $hashed_code = sha1($code); //hash the entered code
			$hashed_code = password_hash($code, PASSWORD_BCRYPT, array('cost'=>14));
			$time = getTime();	
			return Model::createPasswordTable($hashed_code,$time,$index); 
		}
	}
	public function distributeEmail($index_no,$email,$subject,$email_body){
		$email_body .= ' ';
		$email = 'feed.back12569@gmail.com';
		$header = "Content-Type: text/html;";
		// $sending = mail($email,$subject,$email_body,$header);
		$sending = true;
		if(!$sending){
			echo "<script>alert('Error ocurred in sending email.');</script>";
		}
		else{	
			return Model::distributeEmail($index_no,$subject,$email_body);
			
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

class Originator{            // memento design pattern
	private $state;
	private Memento $memento;

	public function setState($id,$subject,$message,$index_no){
		$this->state = array('id' => $id, 'index' => $index_no, 'subject' => $subject, 'message' => $message);
	}
	public function getState(){
		return $this->state;
	}
	public function saveStateToMemento(){
		return new Memento($this->state);
	}

	public function getMemento($memento){
		$this->state = $memento->getState();
	}

}

class Memento{
	private $state;

	public function __construct($state){
		$this->state = $state;
	}

	public function getState(){
		return $this->state;
	}
}
?>




 
