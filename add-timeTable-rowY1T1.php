<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	
	$errors = array();
	$Date = '';
	$Time = '';
	$Place='';
	$Module_code = '';
	$Module_name = '';

    
	if (isset($_POST['submit'])) {
		
		$Date = $_POST['Date'];
		$Time = $_POST['Time'];
		$Place= $_POST['Place'];
		$Module_code = $_POST['Module_code'];
		$Module_name= $_POST['Module_name'];

		// checking required fields
		$req_fields = array('Date', 'Time', 'Place', 'Module_code', 'Module_name');

		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}

		// checking max length
		$max_len_fields = array('Date' => 50, 'Time' =>100, 'Place' =>100, 'Module_code' =>6, 'Module_name' => 100);

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}

	
	
		if (empty($errors)){
			$Date= mysqli_real_escape_string($connection, $_POST['Date']);
			$Time = mysqli_real_escape_string($connection, $_POST['Time']);
			$Place= mysqli_real_escape_string($connection, $_POST['Place']);
			$Module_code= mysqli_real_escape_string($connection, $_POST['Module_code']);
			$Module_name= mysqli_real_escape_string($connection, $_POST['Module_name']);

			$query = "INSERT INTO timeTable ( ";
			$query .= "Date, Time, Place, Module_code, Module_name,is_deleted";
			$query .= ") VALUES (";
			$query .= " '{$Date}' , '{$Time}', '{$Place}', '{$Module_code}', '{$Module_name}',0";
			$query .= ")";

			$timeTables = mysqli_query($connection,$query);

			if ($timeTables){
	
				echo strlen($Module_code);
				if (strlen($Module_code) == 6) {
					// create record 
					$query = "INSERT INTO timeTable (Date, Time, Place, Module_code, Module_name , 0)";
					$timeTables = mysqli_query($connection, $query);

					if ($timeTables) {
						header('Location: add_exam_timeTableY1T1.php?timeTable_added=true&result_created=true');
					} else {
						die("Database query failed: ".mysqli_error($connection));
						header('Location:add_exam_timeTableY1T1 .php?timeTable_added=true&result_created=false');
					}
				} else {
					header('Location: add_exam_timeTableY1T1.php?timeTable_added=true');
				}

			} else{
				$errors[] = 'Failed to add the new record';
			}

		}

	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table Row</title>
	<link rel="stylesheet" type="text/css" href="css/add-user.css">
</head>
<body>
	
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>

	</header>
	<div class="bg-image">
	<span><a href="add_exam_timeTableY1T1.php"> Back &gt&gt</a></span>
	<h1>Add New Row </h1>

	<fieldset>
		<?php 

			if (!empty($errors)) {
				echo '<div class="errmsg">';
				echo '<b>There were error(s) on your form.</b><br>';
				foreach ($errors as $error) {
					$error = ucfirst(str_replace("_", " ", $error));
					echo "<b> - $error </b>". '<br>';
				}
				echo '</div>';
			}

		 ?>
	<form action="add-timeTable-rowY1T1.php" method="post" class="userform">
		<p>
			<label for="">Date</label>
			<input type="Text" name="Date" <?php echo 'value="' . $Date . '"'; ?>>
		</p>
		<p>
			<label for="">Time</label>
			<input type="Text" name="Time" <?php echo 'value="' . $Time . '"'; ?>>
		</p>
		<p>
			<label for="">Place</label>
			<input type="text" name="Place" <?php echo 'value="' . $Place . '"'; ?>>
		</p>
		<p>
			<label for="">Module_code</label>
			<input type="text" name="Module_code" <?php echo 'value="' . $Module_code . '"'; ?>>
		</p>
		<p>
			<label for="">Module_name</label>
			<input type="text" name="Module_name" <?php echo 'value="' . $Module_name . '"'; ?>>
		</p>
		<p>
			<label for=""></label>
			<button type="submit" name="submit">Save</button>
		</p>
	</form>
	</fieldset>
	</div>
</body>

</html>
<?php mysqli_close($connection); ?>