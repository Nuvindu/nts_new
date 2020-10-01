<?php require_once('controller.php'); ?>
<?php require_once('usercontrollerinterface.php'); ?>

<?php 

class ErrorCheck extends Controller{

	public static function userAddingErrorCheck(){
		global $connection;
		$errors = array();
		$req_fields = array('first_name', 'last_name', 'nic', 'index_no', 'email', 'password');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}
		if (!empty($errors)) {
			return $errors;
		}

		$max_len_fields = array('first_name' => 50, 'last_name' =>100, 'nic' =>10, 'index_no' =>7, 'email' => 100, 'password' => 40);

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}



		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";
		if(!is_email($email)){
			$errors[] = "Email address is invalid.";
		}
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "Email address already exists.";
			}
		}

		$index_no = mysqli_real_escape_string($connection, $_POST['index_no']);
		$query = "SELECT * FROM user WHERE index_no = '{$index_no}' LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "Index number already exists.";
			}
		}

		$nic = mysqli_real_escape_string($connection, $_POST['nic']);
		if(strlen($nic)<10){
			$errors[] = "NIC is invalid.";
		}
		$query = "SELECT * FROM user WHERE NIC = '{$nic}' LIMIT 1";
		$result_set = mysqli_query($connection,$query);

		if ($result_set) {
			if (mysqli_num_rows($result_set)==1){
				$errors[] = "NIC already used.";
			}
		}

		$password= mysqli_real_escape_string($connection, $_POST['password']);
		$password_confirm= mysqli_real_escape_string($connection, $_POST['password_confirm']);
		if ($password!=$password_confirm){
			$errors[]= "Password confirmation is unsuccessful.";
		}

		return $errors;

			
	}

	public static function userUpdateErrorCheck(){
		global $connection;
		$errors = array();
		$req_fields = array('first_name', 'last_name', 'index_no', 'email');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}
		if(!isset($user_index)){
			echo "<script>
				alert('User updating failed.Please try again...');
				window.location.href='operator.php?user_update_failed';
				</script>";
		}
		if (!empty($errors)) {
			return $errors;
		}
			// getting the user information
		//$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$index_no = $_POST['index_no'];
		$email = $_POST['email'];

		if(strlen($index_no)==4){
			$req_fields = array('first_name', 'last_name', 'index_no', 'email','department','post','title','degree');
			foreach ($req_fields as $field) {
				if (empty(trim($_POST[$field]))) {
					$errors[] = $field . ' is required';
				}
			}	
			if (!empty($errors)) {
				return $errors;
			}		
			$department = $_POST['department'];
			$post = $_POST['post'];
			$title = $_POST['title'];
			$degree = $_POST['degree'];	
		}

		// checking required fields
		//$req_fields = array( 'first_name', 'last_name', 'index_no', 'email');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' => 50, 'last_name' =>100, 'index_no' =>6, 'email' => 100);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// verify if a valid index no

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM user WHERE email = '{$email}' AND index_no != {$user_index} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		// checking if index_no already exists
		$index_no = mysqli_real_escape_string($connection, $_POST['index_no']);
		$query = "SELECT * FROM user WHERE index_no = '{$index_no}' AND index_no != {$user_index} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Index number already exists';
			}
		}

		return $errors;
		

	}


	public static function userLoginErrorCheck($index_no,$password){
		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['index_no']) || strlen(trim($index_no)) < 1 ) {
			$errors[] = 'Username is Required';
		}

		if (!isset($_POST['password']) || strlen(trim($password)) < 1 ) {
			$errors[] = 'Password is Required';
		}

		// check if there are any errors in the form
		return $errors;
	}

	public static function changePasswordErrorCheck(){
		$errors = array();
		$user_index = $_POST['user_index'];
		$password = $_POST['password'];
		
		// checking required fields
		$req_fields = array( 'password');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('password' => 40);
		$errors = array_merge($errors, check_max_len($max_len_fields));
		return $errors;
	}

	public static function editResultErrorCheck(){
		global $connection;
		$errors = array();
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$index_no = $_POST['index_no'];
		$result = $_POST['result'];

		// checking required fields
		$req_fields = array('result');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('result' => 4);
		$errors = array_merge($errors, check_max_len($max_len_fields));
		// verify if a valid result
		return $errors;
	}

	public static function timeTableErrorCheck(){
		$errors = array();
		$Date = $_POST['Date'];
		$Time = $_POST['Time'];
		$Place= $_POST['Place'];
		$Module_name= $_POST['Module_name'];
		

		$string1="(";
		$string2=")";
		$string3="<";
		$string4=">";
		$string5=";";
		//check whether place contains <> or () or ;
		if(strpos($Place,$string1)==true or strpos($Place,$string2)==true or strpos($Place,$string3)==true or strpos($Place,$string4)==true or strpos($Place,$string5)==true){
			$errors[]='should not contain unnecessary characters in'.$Place;
			header('Location: add_exam_timetables.php?record_created=false');
		}
		//check whether name contains <> or () or ;
		if(strpos($Module_name,$string1)==true or strpos($Module_name,$string2)==true or strpos($Module_name,$string3)==true or strpos($Module_name,$string4)==true or strpos($Module_name,$string5)==true){
			$errors[]='should not contain unnecessary characters in'.$Module_name;
			header('Location: add_exam_timetables.php?record_created=false');
		}



		// checking required fields
		$req_fields = array('Date', 'Time', 'Place',  'Module_name');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}

		// checking max length
		$max_len_fields = array('Date' => 50, 'Time' =>100, 'Place' =>100,  'Module_name' => 100);

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}

		return $errors;
	}
	
	public static function addModuleCheck(){
		$errors = array();
		$module_code = $_POST['module_code'];
		$year= $_POST['year'];
		$department= $_POST['department'];
		$module_name= $_POST['module_name'];

		
		$string1="(";
		$string2=")";
		$string3="<";
		$string4=">";
		$string5=";";
		
		//check whether name contains <> or () or ;
		if(strpos($module_name,$string1)==true or strpos($module_name,$string2)==true or strpos($module_name,$string3)==true or strpos($module_name,$string4)==true or strpos($module_name,$string5)==true){
			$errors[]='should not contain unnecessary characters in'.$module_name;
			header('Location: add_modules_details.php?record_created=false');
		}



		// checking required fields
		$req_fields = array('module_name', 'module_code', 'year',  'department');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}

		// checking max length
		$max_len_fields = array('module_name' => 70, 'module_code' =>5, 'year' =>2,  'department' => 2);

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}

		return $errors;
	}




}




 ?>
