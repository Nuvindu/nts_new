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
	private $post = '';
	private $degree = '';
	private $title = '';
	private $year= '';
	private Controller $controller;

	public function __construct($first_name, $last_name, $nic, $email, $password, $index_no){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->nic = $nic;
		$this->email = $email;
		$this->password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>14));
		$this->index_no = $index_no;
		$this->batch = "20".substr($index_no,0,3);
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
	public function getBatch(){
		return $this->batch;
	}
	public function setBatch($batch){
		$this->batch = $batch;
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

	public abstract function distributeEmail($mediator,$subject,$message);

	public function setController($controller){
		$this->controller = $controller;
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
	public function distributeEmail($mediator,$subject,$message){  //mediator design pattern
		return $mediator->distributeEmail($this->type,$subject,$message);
	}
}

class Operator extends User{
	private $type = "Operator";

	public function __construct($first_name, $last_name, $nic, $email, $password, $index_no){
		parent::__construct($first_name, $last_name, $nic, $email, $password, $index_no);
	}
	public function getType(){
		return $this->type;
	}
	public function distributeEmail($mediator,$subject,$message){
		return false;
	}

}

class Lecturer extends User{
	private $type = "Lecturer";

	public function __construct($first_name, $last_name, $nic, $email, $password, $index_no){
		parent::__construct($first_name, $last_name, $nic, $email, $password, $index_no);
	}

	public function distributeEmail($mediator,$subject,$message){  //mediator design pattern
		return $mediator->distributeEmail($this->type,$subject,$message);
	}	

	public function getType(){
		return $this->type;
	}
	public function setDepartment($department){
		$this->department = $department;
	}
	public function getDepartment(){
		return $this->department;
	}
	public function setPost($post){
		$this->post = $post;
	}
	public function getPost(){
		return $this->post;
	}
	public function setDegree($degree){
		$this->degree = $degree;
	}
	public function getDegree(){
		return $this->degree;
	}	
	public function setTitle($title){
		$this->title = $title;
	}
	public function getTitle(){
		return $this->title;
	}
}

