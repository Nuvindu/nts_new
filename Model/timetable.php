<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 
class TimeTable{
	private $time;
	private $date;
	private $place;
	private $module_code;
	private $module_name;

	public function __construct($time,$date,$place,$module_name){
		$this->time = $time;
		$this->date = $date;
		$this->place = $place;
		$this->module_name = $module_name;
	}

	public function getTime(){
		return $this->time;
	}

	public function getDate(){
		return $this->date;
	}
	public function getPlace(){
		return $this->place;
	}

	public function getModuleName(){
		return $this->module_name;
	}



}



 ?>
