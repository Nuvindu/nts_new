<?php require_once('inc/dbconnection.php'); ?>
<?php
if (!isset($_SESSION['index_no'])) {
	header('Location: login.php');
}
if (strlen($_SESSION['index_no']) != 4) {
	header('Location: index.php');
}
?>
<?php
if (isset($_POST['submit']) || isset($_GET['batch'])) {
	if (((isset($_POST['batch']) && isset($_POST['year']) && $_POST['module'])) || ((isset($_GET['batch']) && isset($_GET['year']) && $_GET['module']))) {
		if (isset($_POST['submit'])) {
			$batch = $_POST['batch'];
			$year = $_POST['year'];
			$module_code = $_POST['module'];
		} else {
			$batch = $_GET['batch'];
			$year = $_GET['year'];
			$module_code = $_GET['module'];
		}
		// generating module code

		$modules = array('1Y01' => 'Fundamentals&nbspof&nbspNursing', '1Y02' => 'Anatomy&nbspand&nbspPhysiology', '1Y03' => 'History&nbspand&nbspTrends&nbspin&nbspNursing', '1Y04' => 'Psychology&nbspand&nbspSociology', '1Y05' => 'Pharmacology&nbspand&nbspMicrobiology', '1Y06' => 'English', '1Y07' => 'Practical&nbspExam', '2Y01' => 'Combined&nbspPaper', '2Y02' => 'Practical&nbspExam', '3Y01' => 'Fundamentals&nbspof&nbspNursing', '3Y02' => 'Medicine&nbspand&nbspMedical&nbspNursing', '3Y03' => 'Surgery&nbspand&nbspSurgical&nbspNursing', '3Y04' => 'Paediatric/Gynecology&nbspand&nbspObstetric&nbspNursing', '3Y05' => 'Practical&nbspExam');

		$module = $modules[$module_code];
		//$module_code = $year. 'Y'. array_search($module,$modules);

		//if (strlen($module)==4){
		//	$module_code = $module;
		//}else{
		//	$module_code = array_search($module,$modules);
		//}

		// checking the validity of the module code

		$module_codes = array('1Y01', '1Y02', '1Y03', '1Y04', '1Y05', '1Y06', '1Y07', '2Y01', '2Y02', '3Y01', '3Y02', '3Y03', '3Y04', '3Y05');
		if (in_array($module_code, $module_codes)) {
			// valid module code
			$user_list = '';

			// getting result list
			$query = "SELECT index_no,first_name,last_name,{$module_code} FROM result WHERE batch='{$batch}' and is_deleted=0 ORDER BY index_no";
			$users = mysqli_query($connection, $query);

			if (!$users) {
				header('Location: go-to-results.php?error=parameters_not_set');
				exit();
			}
			verify_query($users);

			if (mysqli_num_rows($users) == 0) {
				header('Location: go-to-results.php?err=invalid_module_for_term_or_no_students_registered');
			}

			while ($user = mysqli_fetch_assoc($users)) {
				$user_list .= "<tr>";
				$user_list .= "<td>{$user['index_no']}</td>";
				$user_list .= "<td>{$user['first_name']}</td>";
				$user_list .= "<td>{$user['last_name']}</td>";
				$user_list .= "<td >{$user["{$module_code}"]}</td>";
				$user_list .= "<td><a href=\"edit-result.php?user_id={$user['index_no']}&module_code={$module_code}\">Edit</a></td>";
				$user_list .= "</tr>";
			}
		} else {
			// invalid module code
			// header('Location: go-to-results.php?err=invalid_module_code');
		}
	} else {
		// echo "<script>alert('Parameters are not set.');</script>";
		header('Location: go-to-results.php?error=parameters_are_not_set');
		exit;
	}
}
if(!isset($year) || !isset($module)){
	header('Location: go-to-results.php?error=parameters_are_not_set');
	exit;	
}
?>