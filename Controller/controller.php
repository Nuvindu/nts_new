<?php require_once __DIR__ . "/../inc/functions.php" ?>
<?php require_once __DIR__ . "/../Model/model.php" ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 

class Controller {

	private Model $model;

	public function __construct(){
	}

	public function editResults($user_id,$module_code){
		global $connection;
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$index_no = $_POST['index_no'];
		$result = $_POST['result'];
		$result = mysqli_real_escape_string($connection, $_POST['result']);
		$results = new Result($first_name, $last_name, $index_no,$module_code,$result);
		return Model::editResults($user_id,$results);
	}

	public function addTimeTable(){
		global $connection;
		$Date= mysqli_real_escape_string($connection, $_POST['Date']);
		$Time = mysqli_real_escape_string($connection, $_POST['Time']);
		$Place= mysqli_real_escape_string($connection, $_POST['Place']);
		$Module_code= mysqli_real_escape_string($connection, $_POST['Module_code']);
		$Module_name= mysqli_real_escape_string($connection, $_POST['Module_name']);

		$timetable =  new TimeTable($Time,$Date,$Place,$Module_code,$Module_name);

		return Model::addTimeTable($timetable);


	}
}

?>




 