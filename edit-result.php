<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	$errors = array();
	$user_id = '';
	$first_name = '';
	$last_name = '';
	$index_no = '';
	$result = '';

	if (isset($_GET['user_id'])) {
		// getting the user information
		$user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
		$module_code = mysqli_real_escape_string($connection, $_GET['module_code']);		
		$query = "SELECT id,index_no,first_name,last_name,{$module_code} FROM result WHERE id = {$user_id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$record = mysqli_fetch_assoc($result_set);
				$user_id = $record['id'];
				$result = $record["{$module_code}"];
				$first_name = $record['first_name'];
				$last_name = $record['last_name'];
				$index_no = $record['index_no'];
				if (strlen($_SESSION['index_no']) !=4) {
					header('Location: index.php');
				}
			} else {
				// user not found
				header('Location: results.php?err=user_not_found');	
			}
		} else {
			// query unsuccessful
			header('Location: results.php?err=query_failed');
		}
	}

	if (isset($_POST['submit'])) {
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$index_no = $_POST['index_no'];
		$module_code = $_POST['module_code'];
		$result = $_POST['result'];

		// checking required fields
		$req_fields = array('result');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('result' => 4);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// verify if a valid result

		// get data to go back if this process completes
		$batch = '20'.substr($index_no, 0,2) ;
		$term = substr($module_code, 0,1);
		$modules = array('1100'=>'English', '1200'=>'Psychology', '1300'=>'Sociology', '2110'=>'Anatomy & Physiology', '2120'=>'Micro Biology', '2130'=>'Pathology', '2140'=>'Pharmacology I', '2150'=>'Pharmacology II', '2160'=>'Nutrition', '2170'=>'General Science', '2310'=>'Community Health', '2320'=>'Community Health Practice', '2230'=>'First Aid', '2240'=>'First Aid Practice', '2250'=>'Fundamental of Nursing', '2260'=>'Fundamental of Nursing Practice', '2270'=>'Gynecologycal Nursing', '2280'=>'Gynecologycal Nursing Practice', '2290'=>'History of Nursing', '2210'=>'Medical Surgical Nursing', '2211'=>'Medical Surgical Nursing Practice', '2212'=>'Mental Health & Psychiatric Nursing', '2213'=>'Mental Health & Psychiatric Nursing Practice', '2214'=>'Obstetric Nursing', '2215'=>'Obstetric Nursing Practice', '2216'=>'Paediatric Nursing', '2217'=>'Paediatric Practice', '2218'=>'Professional Adjustment', '2219'=>'Ward Management', '2220'=>'Ward Management Practice', '2221'=>'Work Shop', '3100'=>'Research in Nursing');
		$module = $modules[substr($module_code, 2)];
		// done

		if (empty($errors)) {
			// no errors found... modifying result

			$result = mysqli_real_escape_string($connection, $_POST['result']);

			$query = "UPDATE result SET ";		
			$query .= "{$module_code} = '{$result}' ";    // module code
			$query .= "WHERE id = {$user_id} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header("Location: results.php?user_modified=true&batch={$batch}&term={$term}&module={$module}");
			} else {
				$errors[] = 'Failed to modify the record.';
			}


		}



	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View / Modify User</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<header>
		<div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
	</header>

	<main>
		<h1>Add/Modify Result<span> <a href="results.php">< Back to Result Set</a></span></h1>

		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>

		<form action="edit-result.php" method="post" class="userform">
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			<input type="hidden" name="module_code" value="<?php echo $module_code; ?>">

			<p>
				<label for="">Index Number:</label>
				<input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?> readonly>
			</p>

			<p>
				<label for="">First Name:</label>
				<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> readonly>
			</p>

			<p>
				<label for="">Last Name:</label>
				<input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?> readonly>
			</p>

			<p>
				<label for="">Grade/Marks:</label>
				<input type="text" name="result" <?php echo 'value="' . $result . '"'; ?>>
			</p>

			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Modify Result</button>
			</p>

		</form>

		
		
	</main>
</body>
</html>