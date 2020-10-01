<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 
class Result{
	private $first_name = '';
	private $last_name = '';
	private $index_no = '';
	private $year = '';
	private $batch = '';
	private $module_code = '';
	private $result = '';
	private $module = '';
	public static $modules = array('1Y01'=>'Fundamentals of Nursing(FirstYear)', '1Y02'=>'Anatomy&nbspand&nbspPhysiology', '1Y03'=>'History&nbspand&nbspTrends&nbspin&nbspNursing', '1Y04'=>'Psychology&nbspand&nbspSociology', '1Y05'=>'Pharmacology&nbspand&nbspMicrobiology', '1Y06'=>'English', '1Y07'=>'Practical&nbspExam(FirstYear)', '2Y01'=>'Combined&nbspPaper(Nursing)', '2Y02'=>'Practical&nbspExam(SecondYear)', '3Y01'=>'Fundamentals&nbspof&nbspNursing(ThirdYear)', '3Y02'=>'Medicine&nbspand&nbspMedical&nbspNursing', '3Y03'=>'Surgery&nbspand&nbspSurgical&nbspNursing', '3Y04'=>'Paediatric/Gynecology&nbspand&nbspObstetric&nbspNursing', '3Y05'=>'Practical&nbspExam(ThirdYear)');


	public function __construct($first_name, $last_name, $index_no,$module_code,$result,$year){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->index_no = $index_no;
		$this->module_code = $module_code;
		$this->batch = '20'.substr($index_no, 0,3) ;
		$this->year = substr($module_code, 0,1);
		$modules = Result::$modules;
		$this->result = $result;
		$this->module = $modules[$module_code];

	}

	public function getModuleCode(){
		return $this->module_code;
	}
	
	public function getModule(){
		return $this->module;
	}
	
	public function getResult(){
		return $this->result;
	}
	public function getBatch(){
		return $this->batch;
	}
	public function getYear(){
		return $this->year;
	}



}




 ?>