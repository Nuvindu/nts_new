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

	public function editResults($user_id,$results){
		global $connection;
		$query = "UPDATE result SET ";		
		$query .= "{$results->getModuleCode()} = '{$results->getResult()}' ";    // module code
		$query .= "WHERE index_no = {$user_id} LIMIT 1";

		$result = mysqli_query($connection, $query);

		if ($result) {
			// query successful... redirecting to users page
			header("Location: results.php?user_modified=true&batch={$results->getBatch()}&term={$results->getTerm()}&module={$results->getModule()}");
		} else {
			$errors[] = 'Failed to modify the record.';
		}
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
		$query .= "Date, Time, Place, Module_code, Module_name,is_deleted";
		$query .= ") VALUES (";
		$query .= " '{$timetable->getDate()}' , '{$timetable->getTime()}', '{$timetable->getPlace()}', '{$timetable->getModuleCode()}', '{$timetable->getModuleName()}',0";
		$query .= ")";

		$timeTables = mysqli_query($connection,$query);

		if ($timeTables){
			header('Location: add_exam_timeTableY1T1.php?timeTable_added=true&result_created=true');
		} else {
			die("Database query failed: ".mysqli_error($connection));
			header('Location:add_exam_timeTableY1T1 .php?timeTable_added=true&result_created=false');
		}
	}


}
 ?>