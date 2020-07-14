<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 

abstract class User{
	private $id='';
	private $first_name = '';
	private $last_name = '';
	private $nic='';
	private $email = '';
	private $password = '';
	private $index_no = '';
	private $type = '';
	private $batch = '';
	private $department = '';
	private $year= '';

	public function __construct($first_name, $last_name, $nic, $email, $password, $index_no){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->nic = $nic;
		$this->email = $email;
		$this->password = sha1($password);
		$this->index_no = $index_no;
	}

	public function getFirstName(){
		return $this->first_name;
	}
	public function setFirstName($first_name){
		$this->first_name = $first_name;
	}

	public function getLastName(){
		return $this->last_name;
	}
	public function setLastName($last_name){
		$this->last_name = $last_name;
	}

	public function getNIC(){
		return $this->nic;
	}
	public function setNIC($nic){
		$this->nic = $nic;
	}

	public function getEmail(){
		return $this->email;
	}
	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}
	public function setPassword($password){
		$this->password = $password;
	}

	public function getIndexNo(){
		return $this->index_no;
	}
	public function setIndexNo($index_no){
		$this->index_no = $index_no;
	}

	abstract public function getType();
	public function setType($type){
		$this->type = $type;
	}

}

class Student extends User{
	private $type = "Student";
	private $batch;

	public function __construct($first_name, $last_name, $nic, $email, $password, $index_no){
		parent::__construct($first_name, $last_name, $nic, $email, $password, $index_no);
	}
	public function getType(){
		return $this->type;
	}
	public function setYear($year){
		$this->year = $year;
	}
	public function getYear(){
		return $this->year;
	}

}

class Operator extends User{
	public $type = "Operator";

	public function getType(){
		return $this->type;
	}

}

class Lecturer extends User{
	public $type = "Lecturer";

	public function getType(){
		return $this->type;
	}
	public function setDepartment($department){
		$this->department = $department;
	}
	public function getDepartment(){
		return $this->department;
	}

}

