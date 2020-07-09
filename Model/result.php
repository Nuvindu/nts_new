<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php 
class Result{
	private $first_name = '';
	private $last_name = '';
	private $index_no = '';
	private $term = '';
	private $batch = '';
	private $module_code = '';
	private $result = '';
	private $module = '';
	public static $modules = array('1100'=>'English', '1200'=>'Psychology', '1300'=>'Sociology', '2110'=>'Anatomy & Physiology', '2120'=>'Micro Biology', '2130'=>'Pathology', '2140'=>'Pharmacology I', '2150'=>'Pharmacology II', '2160'=>'Nutrition', '2170'=>'General Science', '2310'=>'Community Health', '2320'=>'Community Health Practice', '2230'=>'First Aid', '2240'=>'First Aid Practice', '2250'=>'Fundamental of Nursing', '2260'=>'Fundamental of Nursing Practice', '2270'=>'Gynecologycal Nursing', '2280'=>'Gynecologycal Nursing Practice', '2290'=>'History of Nursing', '2210'=>'Medical Surgical Nursing', '2211'=>'Medical Surgical Nursing Practice', '2212'=>'Mental Health & Psychiatric Nursing', '2213'=>'Mental Health & Psychiatric Nursing Practice', '2214'=>'Obstetric Nursing', '2215'=>'Obstetric Nursing Practice', '2216'=>'Paediatric Nursing', '2217'=>'Paediatric Practice', '2218'=>'Professional Adjustment', '2219'=>'Ward Management', '2220'=>'Ward Management Practice', '2221'=>'Work Shop', '3100'=>'Research in Nursing');


	public function __construct($first_name, $last_name, $index_no,$module_code,$result){
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->index_no = $index_no;
		$this->module_code = $module_code;
		$this->batch = '20'.substr($index_no, 0,2) ;
		$this->term = substr($module_code, 0,1);
		$modules = Result::$modules;
		$this->module = $modules[substr($module_code, 2)];
		$this->result = $result;

	}

	public function getModuleCode(){
		return $this->module_code;
	}

	public function getResult(){
		return $this->result;
	}
	public function getBatch(){
		return $this->batch;
	}
	public function getTerm(){
		return $this->term;
	}
	public function getModule(){
		return $this->module;
	}




}




 ?>