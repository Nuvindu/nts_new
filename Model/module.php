<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 
class Module{
	private $module_code;
	private $year;
	private $department;
	private $module_name;

	public function __construct($module_code,$module_name,$year,$department){
		$this->module_code = $module_code;
		$this->year = $year;
		$this->department = $department;
		$this->module_name = $module_name;
	}

	public function getmodule_code(){
		return $this->module_code;
	}

	public function getyear(){
		return $this->year;
	}
	public function getdepartment(){
		return $this->department;
	}

	public function getModuleName(){
		return $this->module_name;
	}



}



 ?>
