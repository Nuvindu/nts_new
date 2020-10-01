<?php require_once __DIR__ . "/../Model/userdb.php" ?>
<?php require_once __DIR__ . "/../inc/functions.php" ?>
<?php require_once('controller.php'); ?>
<?php require_once('usercontrollerinterface.php'); ?>


<?php 

class UserController extends Controller implements IUserController{

	private $first_name = '';
	private $last_name = '';
	private $nic='';
	private $email = '';
	private $password = '';
	private $password_confirm = '';
	private $index_no = '';
	private $batch = '20';
	private $type = '';

	public function __construct(){
		parent::__construct();
	}

	public function addUser(User $user){
		if($user!=null){
			$this->model = new UserDB($user);
			return $this->model->addUser($user);
		}
		else{
			return null;
		}
	}
	public function changePassword(){
		global $connection;
		$user_index = mysqli_real_escape_string($connection, $_POST['user_index']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$hashed_password=password_hash($password, PASSWORD_BCRYPT, array('cost'=>14));
		return UserDB::changePassword($user_index,$hashed_password);
	}

	public function updateUser($user_index){
		global $connection;		
		// $department = "Fundamentals of Nursing";
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$index_no = mysqli_real_escape_string($connection, $_POST['index_no']);
		$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
		$user = (new UserFactory())->newUser();
		if(strlen($index_no)==4){
			$d = str_replace('_',' ' , $_POST['department']);
			$department = mysqli_real_escape_string($connection, $d);
			$pst = str_replace('_',' ' , $_POST['post']);
			$post = mysqli_real_escape_string($connection, $pst);

			$title = mysqli_real_escape_string($connection, $_POST['title']);

			$degree = mysqli_real_escape_string($connection, $_POST['degree']);

			$user->setDepartment($department); 
			$user->setPost($post); 
			$user->setTitle($title); 
			$user->setDegree($degree); 

		}
		else if(strlen($index_no)==7){
			$year = mysqli_real_escape_string($connection,$_POST['year']);
			$user->setYear($year);
		}
		return UserDB::modifyUser($user,$user_index);	
	}

	public function deleteUser($user_index){
		if ($user_index == $_SESSION['index_no']){
			header('Location: operator.php?err=cannot_delete_current_user');
		}
		else{
			return UserDB::deleteUser($user_index);
		}
		
	
	}

	public function userLogin($index_no,$password){
			global $connection;		
			// save username and password into variables
			$index_no 	= mysqli_real_escape_string($connection, $_POST['index_no']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>14));
			return UserDB::userLogin($index_no,$password);
			

	}


}


abstract class Factory {
	abstract protected function newUser();
}

class UserFactory extends Factory{      //factory design pattern

	public function newUser(){
		global $connection;
		$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
		$password= mysqli_real_escape_string($connection, $_POST['password']);
		$index_no= mysqli_real_escape_string($connection, $_POST['index_no']);
		$nic= mysqli_real_escape_string($connection, $_POST['nic']);
		$email= mysqli_real_escape_string($connection, $_POST['email']);
		$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>14));
		if (strlen($index_no)==4) {
			return new Lecturer($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else if (strlen($index_no)==7) {
			return new Student($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else if (strlen($index_no)==2) {
			return new Operator($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else{
			return null;
		}
	}

	public function newUserExcel(){
		global $connection;
		
		global $row;
		global $worksheet;
		global $output;
		$output .= "<tr>";
		$index_no = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
		//$type = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
		$first_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
		$last_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
		$nic = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		//$batch = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
		$email = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
		if (strlen($index_no) == 2) {
			$password="password";
			}
		if (strlen($index_no) == 7) {
		$password="password";
		}
		if (strlen($index_no) == 4) {
		  $password = "password";}
		$hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>14));
		$output .= '<td>'.$index_no.'</td>';
		$output .= '<td>'.$first_name.'</td>';
		$output .= '<td>'.$last_name.'</td>';
		$output .= '<td>'.$nic.'</td>';
		$output .= '<td>'.$email.'</td>';
		$output .= '</tr>';
		
		if (strlen($index_no)==4) {
			return new Lecturer($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else if (strlen($index_no)==7) {
			return new Student($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else if (strlen($index_no)==2) {
			return new Operator($first_name, $last_name, $nic, $email, $password, $index_no);
		}
		else{
			return null;
		}
	
	}
}
?>