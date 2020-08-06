<?php require_once __DIR__ . "/../Model/userdb.php" ?>
<?php require_once __DIR__ . "/../inc/functions.php" ?>
<?php require_once __DIR__ . "/../Controller/controller.php" ?>
<?php require_once('user.php'); ?>
<?php require_once('result.php'); ?>
<?php require_once('timetable.php'); ?>


<?php 

class Model {
	private User $user;

	public function __construct($user){
		$this->user = $user;
	}

	public static function distributeEmail($index_no,$subject,$email_body){
		global $connection;
		$sql ="SELECT * FROM notifications WHERE index_no = '{$index_no}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($resulttable); // get the record of notifications of the current user
		$finalarray = array();		
		if($result){
			$arraylist = $result['notification']; //get the serialized array of notifications
			$seen = $result['seen'];  //get the count of unread messages
			$array = array('Subject' => $subject, 'Message' => $email_body);
			// var_dump(json_decode($q));	
			$finalarray = unserialize($arraylist);
			$finalarray[sizeof($finalarray)] = $array; //add the notification to the end of the array
			$lenarray = $finalarray;
			$finalarray = serialize($finalarray);
			$seen++;   //mark the unread message
			$query = "UPDATE notifications SET notification = '{$finalarray}' , seen = {$seen} WHERE index_no = $index_no LIMIT 1";
			$result = mysqli_query($connection,$query);	//update the datatbase
			return true;	
		}
		else{
			$finalarray = array('Subject' => $subject, 'Message' => $email_body);  //if the array is empty create a new one
			$finalarray = array($finalarray);
			$finalarray = serialize($finalarray);
			$query = "INSERT INTO notifications (index_no,notification,seen) VALUES ('{$index_no}','{$finalarray}',1)";
			$result = mysqli_query($connection,$query);	//update the datatbase
			return true;	
		}

	}

	public static function undoNotification($id,$index_no,$subject,$message){
		global $connection;
		$sql ="SELECT * FROM notifications WHERE index_no = '{$index_no}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($resulttable);  // get the record of notifications of the current user
		$finalarray = array();		
		if($result){
			$arraylist = $result['notification'];
			$array = array('Subject' => $subject, 'Message' => $message);
			// var_dump(json_decode($q));	
			$finalarray = unserialize($arraylist);
			$finalarray[$id] = $array;  //save the notification on array in its own index
			$lenarray = $finalarray;
			$finalarray = serialize($finalarray);
			$query = "UPDATE notifications SET notification = '{$finalarray}' , seen = 0 WHERE index_no = $index_no LIMIT 1";
			$result = mysqli_query($connection,$query);	//update the datatbase
			return true;	
		}
		else{
			$finalarray = array('Subject' => $subject, 'Message' => $message); //if the array is empty create a new one
			$finalarray = array($finalarray);
			$finalarray = serialize($finalarray);
			$query = "INSERT INTO notifications (index_no,notification,seen) VALUES ('{$index_no}','{$finalarray}',0)";
			$result = mysqli_query($connection,$query);	//update the datatbase
			return true;	
		}

	}

	public static function compareCode($verifycode,$index){    
		global $connection;
		$sql ="SELECT * FROM verifypassword WHERE index_no = '{$index}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($resulttable);
		$table_time_str = $result['request_time'];  // get the code requested time from the table 
		$compare = compareTime($table_time_str); // compare the current time table time and check the difference is less than 10 mins
		if($compare){
			$table_code = $result['code'];  // get the hash code from the table
			if(sha1($verifycode)==$table_code){  
				$_SESSION['fgtpw'] = "true";  //setting a session to access the change password page
				echo "<script>window.location.href = 'changepw-verify.php?user_index={$index}';</script>";
			}
			else{   //count the tries and if it is more than three redirect to index page and blocking the access to the change password page
				
				if(intval($_SESSION['w'])==3){      
					unset($_SESSION['fgtpw']);
					echo "<script>alert('You tried three times.Password change is not accessible!!!');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
				}
				else{
					echo "<script>alert('Verify Code is Invalid');</script>";
				}
				$x = array("1","2","3","4");
				foreach ($x as $alpha) {
					if($_SESSION['w']==$alpha){
						$key = array_search($alpha, $x)+1;
						$_SESSION['w'] = $x[$key];
						// echo $_SESSION['w'];
						break;
					}
				}
				
				
				
				
			}
		}
		else{
			echo "<script>alert('Error Ocurred!!!!');</script>";
		}

	}
	public static function createPasswordTable($code,$time,$index){
		global $connection;
		$query = "INSERT INTO verifypassword (index_no, request_time, code) VALUES ('{$index}','{$time}','{$code}')";
		$record = mysqli_query($connection, $query); //update the database with the code required to change the password
	}
	public static function viewResults(){
		global $connection;
		$query = "SELECT * FROM result WHERE index_no = '{$_SESSION['index_no']}'";
		$record = mysqli_query($connection, $query);

		verify_query($record);

		if (mysqli_num_rows($record) == 1) {
			// valid user found
			$user = mysqli_fetch_assoc($record);
			return $user;

		} else {
			// no record in result table
			$errors[] = 'No Record in Result Table';
			return null;
		}
	}

	public static function addTimeTable($timetable){
		global $connection;
		$query = "INSERT INTO timetable ( ";
		$query .= "Date, Time, Place, Module_name,is_deleted";
		$query .= ") VALUES (";
		$query .= " '{$timetable->getDate()}' , '{$timetable->getTime()}', '{$timetable->getPlace()}',  '{$timetable->getModuleName()}',0";
		$query .= ")";

		$timeTables = mysqli_query($connection,$query);

		if ($timeTables){
			header('Location: add_exam_timetables.php?record_created=true');
		} else {
			//die("Database query failed: ".mysqli_error($connection));
			header('Location:add_exam_timetables.php?err=duplicate_module/module_not_inserted');
			
			
		}
	}
	public static function addTimetable2($timetable){
		global $connection;
		$query = "INSERT INTO timetable2 ( ";
		$query .= "Date, Time, Place,  Module_name,is_deleted";
		$query .= ") VALUES (";
		$query .= " '{$timetable->getDate()}' , '{$timetable->getTime()}', '{$timetable->getPlace()}', '{$timetable->getModuleName()}',0";
		$query .= ")";

		$timeTables = mysqli_query($connection,$query);

		if ($timeTables){
			header('Location: add_exam_timetables.php?record_created=true');
		} else {
			//die("Database query failed: ".mysqli_error($connection));
			header('Location:add_exam_timetables.php?err=duplicate_module/module_not_inserted');
		}
	}
	public static function addTimetable3($timetable){
		global $connection;
		$query = "INSERT INTO timetable3 ( ";
		$query .= "Date, Time, Place,  Module_name,is_deleted";
		$query .= ") VALUES (";
		$query .= " '{$timetable->getDate()}' , '{$timetable->getTime()}', '{$timetable->getPlace()}', '{$timetable->getModuleName()}',0";
		$query .= ")";

		$timeTables = mysqli_query($connection,$query);

		if ($timeTables){
			header('Location: add_exam_timetables.php?record_created=true');
		} else {
			//die("Database query failed: ".mysqli_error($connection));
			header('Location:add_exam_timetables.php?err=duplicate_module/module_not_inserted');
		}
	}



}
 ?>
