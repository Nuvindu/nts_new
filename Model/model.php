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
		$record = mysqli_query($connection, $query);
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
