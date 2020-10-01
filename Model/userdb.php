<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php require_once __DIR__ . "/../inc/functions.php" ?>

<?php require_once('user.php'); ?>
<?php require_once('result.php'); ?>
<?php require_once('model.php'); ?>
<?php require_once('userdbinterface.php'); ?>

<?php 
class UserDB extends Model implements IUserDB{ 

	public function __construct($user){
		parent::__construct($user);
	}

	public function addUser($user){
		global $connection;
		$query = "INSERT INTO user (first_name, last_name, NIC, index_no, type, email, password, batch, is_deleted) VALUES ('{$user->getFirstName()}','{$user->getLastName()}','{$user->getNIC()}','{$user->getIndexNo()}','{$user->getType()}','{$user->getEmail()}','{$user->getPassword()}','{$user->getBatch()}',0)";

		$result = mysqli_query($connection,$query);

		if ($result){
			// check if a student 
		
			if (strlen($user->getIndexNo()) == 7) {
				// create record in the result table
				$query = "INSERT INTO result (index_no, first_name, last_name, batch, 1Y01, 1Y02, 1Y03, 1Y04, 1Y05, 1Y06, 1Y07, 2Y01, 2Y02, 3Y01, 3Y02, 3Y03, 3Y04, 3Y05, is_deleted) VALUES ('{$user->getIndexNo()}', '{$user->getFirstName()}', '{$user->getLastName()}', '{$user->getBatch()}','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null', 0)";
				$result = mysqli_query($connection, $query);

				if ($result) {
					$update = mysqli_query($connection,"INSERT INTO students (index_no,year) VALUES ('{$user->getIndexNo()}','1')");}
					/*if($update){
						// query successful... redirecting to users page
						header('Location: add-user-responsive.php?user_added=true&result_created=true&student_added=true');}
					else{
						header('Location: add-user-responsive.php?user_added=true&result_created=true');
					}
				} else {
					die("Database query failed: ".mysqli_error($connection));
					header('Location: add-user-responsive.php?user_added=true&result_created=false');
				}*/
			} 
			else if(strlen($user->getIndexNo()) == 4){
				$update = mysqli_query($connection,"INSERT INTO lecturers (index_no,department) VALUES ('{$user->getIndexNo()}','1')");
				/*if($update){
					// query successful... redirecting to users page
					header('Location: add-user-responsive.php?user_added=true&lecturer_added=true');
				}
				else{
					header('Location: add-user-responsive.php?user_added=true');
				}
			}
			else {
				header('Location: add-user-responsive.php?user_added=true');
			}

		} else{
			$errors[] = 'Failed to add the new record';
		*/}
	}
}
	public static function changePassword($user_index,$password){
		global $connection;
		$query = "UPDATE user SET ";
		$query .= "password = '{$password}' ";
		$query .= "WHERE index_no = '{$user_index}' LIMIT 1";

		$result = mysqli_query($connection, $query);

		if ($result) {
			// query successful... redirecting to users page
			header("Location: operator.php?user_modified=true");
		} else {
			$errors[] = 'Failed to update the password.';
		}

	}

	public static function deleteUser($user_index){
		global $connection;
		$query = "UPDATE user SET is_deleted = 1 WHERE index_no = '{$user_index}' LIMIT 1 ";
		$result = mysqli_query($connection,$query);
		if($result){
			if(strlen($user_index)==7){
				$sql = "DELETE from result WHERE index_no = '{$user_index}' LIMIT 1";
				$del = mysqli_query($connection,$sql);
				if($del){
					$delete = mysqli_query($connection,"DELETE from students WHERE index_no = '{$user_index}' LIMIT 1");
					if($delete){header('Location: ../operator.php?msg=student_user_deleted&result_is_removed');}
					else{header('Location: ../operator.php?msg=student_user_deleted');}
					
				}
			}
			else if(strlen($user_index)==4){
				$delete = mysqli_query($connection,"DELETE from lecturers WHERE index_no = '{$user_index}' LIMIT 1");
				if($delete){header('Location: ../operator.php?msg=lecture_user_deleted&department_is_removed');}
				else{header('Location: ../operator.php?msg=student_user_deleted');}
			}
			else{
				header('Location: ../operator.php?msg=user_deleted');
			}
			

		}else{
			header('Location: ../operator.php?err=delete_failed');
		}

	}

	public static function modifyUser($user,$user_index){
		global $connection;

		$query = "UPDATE user SET ";
		$query .= "first_name = '{$user->getFirstName()}', ";
		$query .= "last_name = '{$user->getLastName()}', ";
		$query .= "index_no = '{$user->getIndexNo()}', ";			
		$query .= "email = '{$user->getEmail()}' ";
		$query .= "WHERE index_no = '{$user_index}' LIMIT 1";

		$result = mysqli_query($connection, $query);

		if ($result) {
			if(strlen($user->getIndexNo())==7){
				$sql = "UPDATE result SET ";
				$sql .= "index_no = '{$user->getIndexNo()}', ";	
				$sql .= "first_name = '{$user->getFirstName()}', ";
				$sql .= "last_name = '{$user->getLastName()}' ";		
				$sql .= "WHERE index_no = '{$user_index}' LIMIT 1";
				
				$resulttable = mysqli_query($connection, $sql);
				if ($resulttable) {
					$update = mysqli_query($connection,"UPDATE students SET index_no = '{$user->getIndexNo()}', year = '{$user->getYear()}' WHERE index_no = '{$user_index}' LIMIT 1");
					if($update){// query successful... redirecting to users page
						header('Location: operator.php?user_modified=true&true&true');}
		 			
				} else {
					$errors[] = 'Failed to modify the record.';
				}


			}
			else if(strlen($user->getIndexNo())==4){
				$sql ="SELECT * FROM department WHERE department_name = '{$user->getDepartment()}' LIMIT 1";
				$resulttable = mysqli_query($connection, $sql);
				$result = mysqli_fetch_assoc($resulttable);
				$department_code = $result['department_code'];
				if($department_code!=0){
					$mysql = "UPDATE lecturers SET ";
					$mysql .= "index_no = '{$user->getIndexNo()}', ";	
					$mysql .= "department = '{$department_code}', ";	
					$mysql .= "post = '{$user->getPost()}', ";	
					$mysql .= "degree = '{$user->getDegree()}', ";	
					$mysql .= "title = '{$user->getTitle()}' ";	
					$mysql .= "WHERE index_no = '{$user_index}' LIMIT 1";
					$res = mysqli_query($connection, $mysql); 

					header('Location: operator.php?lecturer_modified=true&true');
				}
				else{
					// $_SESSION['lecturer_modified'] = false;
					header('Location: operator.php?lecturer_modified=false');
				}
			}
			else{
	 			// query successful... redirecting to users page
				header('Location: operator.php?user_modified=true');
			}
		} else {
			$errors[] = 'Failed to modify the record.';
		}

		

	}

	public static function userLogin($index_no,$password){
		global $connection;
		$query = "SELECT * FROM user 
						WHERE index_no = '{$index_no}' AND is_deleted = 0 
						LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		verify_query($result_set);

		if (mysqli_num_rows($result_set) == 1) {
			// valid user found
			$user = mysqli_fetch_assoc($result_set);
			if(password_verify($password, $user['password'])){
				$_SESSION['user_id'] = $user['index_no'];
				$_SESSION['first_name'] = $user['first_name'];
				$_SESSION['index_no'] = $user['index_no'];

				// updating last login
				$query = "UPDATE user SET last_login = NOW() ";
				$query .= "WHERE index_no = '{$_SESSION['user_id']}' LIMIT 1";

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

				if (strlen($_SESSION['index_no']) == 7) {
					header('Location: Model/student-db.php');
				} elseif (strlen($_SESSION['index_no']) == 2) {
					header('Location: operator.php');
				}elseif (strlen($_SESSION['index_no']) == 4) {
					$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
				    $resulttable = mysqli_query($connection, $sql);
				    if($resulttable){
					    $result = mysqli_fetch_assoc($resulttable);
					    if($result){  
					        $_SESSION['count'] = $result['seen'];       
					    }				    	
				    }
					header('Location: Model/lecturer-db.php');
				}
				return 0;
			}
			else{
				$errors[] = 'Invalid Username / Password';
				return $errors;				
			}
		} else {
			// user name and password invalid
			$errors[] = 'Invalid Username / Password';
			return $errors;
		}
	}

	}

 ?>
