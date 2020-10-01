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
	public static function changeDepHead($depnum,$index){
		global $connection;
		$query = "UPDATE department SET department_head = '{$index}' WHERE department_code = '{$depnum}' LIMIT 1"; //query for changing the department head
		$result = mysqli_query($connection,$query);	
		if(!$result){
			alert('Error Occurred.Update Failed.');
		}
		else{
			header('Location: department-head.php'); 
		}
			
	}
	public static function departmentHead($dep_num){
		global $connection;
		$sql ="SELECT * FROM department WHERE department_code = '{$dep_num}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_array($resulttable); // get the record of selected department
		if($result){
			$dep_head = $result['department_head'];  
			return $dep_head;	
		}

	}
	public static function assignedLecturers($dep_num,$department_head){
		global $connection;
		$sql ="SELECT * FROM lecturers WHERE department = '{$dep_num}'";
		$resulttable = mysqli_query($connection, $sql);
		// $result = mysqli_fetch_assoc($resulttable); // get the record of selected department
		$assigned = array();
		while($row = mysqli_fetch_array($resulttable))
		{
			if($row['index_no'] != $department_head){
				$assigned[] = $row['index_no'];
				// print_r($row['index_no']);	
			}
		}
		return $assigned;

	}

	public static function getLecDetails(){
		global $connection;
		$mysql ="SELECT * FROM user WHERE type = 'Lecturer'";
		$lectable = mysqli_query($connection, $mysql);
		$all_details = array('index' => '', 'data' => '');	
		while($lect = mysqli_fetch_array($lectable)){
			$data = array();
			$name = $lect['first_name'].' '.$lect['last_name'];
			$index = $lect['index_no'];
			$sql ="SELECT * FROM lecturers WHERE index_no = '{$index}' LIMIT 1";
			$resulttable = mysqli_query($connection, $sql);
			$result = mysqli_fetch_assoc($resulttable); 
			if($result){
				$post = $result['post'];
				$degree = $result['degree'];
				$title = $result['title'];
			}
			$data = array('name' => $name,'post' => $post, 'degree' => $degree,'title' => $title);
			$all_details[$index] = $data;	
		}
		
		return $all_details;
	}
	public static function getEmailList($type){
		global $connection;
		$query = "SELECT email FROM user WHERE type = '{$type}'";
		$check = mysqli_query($connection, $query); //get all emails of the users of requested type
		$email_list = array();
		if($check){
			$i=0;
			while($result = mysqli_fetch_assoc($check)){
				$email_list[$i] = $result['email']; //add emails into an array
				$i++;
			}				
		}	
		return $email_list;

	}
	public static function distributeEmail($type,$subject,$email_body){
		global $connection;
		$no_error = true;
		$sql ="SELECT * FROM notifications WHERE index_no IN (SELECT index_no FROM user WHERE type = '{$type}')";
		$finalarray = array();
		$resulttable = mysqli_query($connection, $sql);
		while($result = mysqli_fetch_assoc($resulttable)){
			$arraylist = $result['notification']; //get the serialized array of notifications
			$seen = $result['seen'];  //get the count of unread messages
			$array = array('Subject' => $subject, 'Message' => $email_body);
			// var_dump(json_decode($q));	
			$finalarray = unserialize($arraylist);
			$finalarray[sizeof($finalarray)] = $array; //add the notification to the end of the array
			$lenarray = $finalarray;
			$finalarray = serialize($finalarray);
			$seen++;   //mark the unread message
			$query ="UPDATE notifications SET notification = '{$finalarray}' , seen = {$seen} WHERE index_no = '{$result['index_no']}' LIMIT 1";
			$result = mysqli_query($connection,$query);	//update the datatbase
			if(!$result){
				$no_error = false;
			}
		}	
		$finalarray = array('Subject' => $subject, 'Message' => $email_body);  //if the array is empty create a new one
		$finalarray = array($finalarray);
		$finalarray = serialize($finalarray);
		$final_query = "INSERT INTO notifications (index_no,notification,seen) SELECT index_no,'{$finalarray}',1 FROM user WHERE index_no NOT IN (SELECT index_no FROM notifications) AND type = '{$type}'";
		$final_result = mysqli_query($connection, $final_query);
		if(($final_result) && ($no_error)){
			return true;
		}
		else{
			return false;
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
			$query = "UPDATE notifications SET notification = '{$finalarray}' , seen = 0 WHERE index_no = '{$index_no}' LIMIT 1";
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
		$resulttable = mysqli_query($connection, $sql); //get the hashed code from the table
		$result = mysqli_fetch_assoc($resulttable);
		if(!$result){
			$x = array("1","2","3","4");
			foreach ($x as $alpha) { //code block for counting how many tries the user has done
				if($_SESSION['counting']==$alpha){
					$key = array_search($alpha, $x)+1;
					$_SESSION['counting'] = $x[$key];
					// echo $_SESSION['counting'];
					break;
				}
			}
			echo "<script>alert('Verify Code is Invalid');</script>";
			return;
		}
		else{
			$table_time_str = $result['request_time'];  // get the code requested time from the table 
			// $compare = compareTime($table_time_str); // compare the current time table time and check the difference is less than 10 mins
			if($table_time_str){ // (added an event to auto delete the row after certain time)
				$table_code = $result['code'];  // get the hash code from the table
				if(password_verify($verifycode, $table_code)){ 
					$_SESSION['fgtpw'] = "true";  //setting a session to access the change password page
					$_SESSION['request_index'] = "{$index}";
					echo "<script>window.location.href = 'changepw-verify.php';</script>";
				}
				else{   //count the tries and if it is more than three redirect to index page and blocking the access to the change password page
					
					if(intval($_SESSION['counting'])==3){      
						unset($_SESSION['fgtpw']);
						unset($_SESSION['verifyindex']);
						echo "<script>alert('You tried three times.Password change is not accessible!!!');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
					else{
						unset($_SESSION['fgtpw']);
						echo "<script>alert('Verify Code is Invalid');</script>";
					}
					$x = array("1","2","3","4");
					foreach ($x as $alpha) {
						if($_SESSION['counting']==$alpha){
							$key = array_search($alpha, $x)+1;
							$_SESSION['counting'] = $x[$key];
							// echo $_SESSION['counting'];
							break;
						}
					}
						
				}
			}
			else{
				unset($_SESSION['fgtpw']);
				unset($_SESSION['verifyindex']);
				echo "<script>alert('Error Ocurred!!!!');</script>";
				return;
			}

		}

	}
	public static function createPasswordTable($code,$time,$index){
		global $connection;
		$query = "INSERT INTO verifypassword (index_no, request_time, code) VALUES ('{$index}',NOW(),'{$code}')";
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
	public static function addTimeTable1b($timetable){
		global $connection;
		$query = "INSERT INTO timetable1b ( ";
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
	public static function addTimetable2b($timetable){
		global $connection;
		$query = "INSERT INTO timetable2b ( ";
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
	public static function addTimetable3b($timetable){
		global $connection;
		$query = "INSERT INTO timetable3b ( ";
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

	public static function addModule($module){
		global $connection;
		$query = "INSERT INTO modules ( ";
		$query .= "module_code, module_name, year, department";
		$query .= ") VALUES (";
		$query .= " '{$module->getmodule_code()}' , '{$module->getModuleName()}', '{$module->getyear()}',  '{$module->getdepartment()}'";
		$query .= ")";

		$moduleList = mysqli_query($connection,$query);

		if ($moduleList){
			header('Location: add_modules_details.php?record_created=true');
		} else {
			//die("Database query failed: ".mysqli_error($connection));
			header('Location:add_module_details.php?err=duplicate_module/module_not_inserted');
			
			
		}
	}


}
 ?>
