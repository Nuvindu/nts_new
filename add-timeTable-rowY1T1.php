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

			$query = "INSERT INTO timetable ( ";
			$query .= "Date, Time, Place, Module_code, Module_name,is_deleted";
			$query .= ") VALUES (";
			$query .= " '{$Date}' , '{$Time}', '{$Place}', '{$Module_code}', '{$Module_name}',0";
			$query .= ")";

			$timeTables = mysqli_query($connection,$query);

			if ($timeTables){
				header('Location: add_exam_timeTableY1T1.php?timeTable_added=true&result_created=true');
			} else {
				die("Database query failed: ".mysqli_error($connection));
				header('Location:add_exam_timeTableY1T1 .php?timeTable_added=true&result_created=false');
			}

		}

	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/add-timetable.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
	</header>
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
	<div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; text-align: center;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
        <div class="add"><a href="add_exam_timeTableY1T1.php">Back &gt&gt</a> </br></div>
	<h1>Exam Time Table</h1>
	<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module code</th>
			<th>Module name</th>
			<th>Submit</th>
		</tr>
		<form action="add-timeTable-rowY1T1.php" method="post" class="userform">
		<tr>
			<td><input type="date" name="Date" <?php echo 'value="' . $Date . '"'; ?>></td>
			<td><input type="time" name="Time" <?php echo 'value="' . $Time . '"'; ?>></td>
			<td><input type="text" name="Place" <?php echo 'value="' . $Place . '"'; ?>></td>
			<td><input type="text" name="Module_code" <?php echo 'value="' . $Module_code . '"'; ?>></td>
			<td><input type="text" name="Module_name" <?php echo 'value="' . $Module_name . '"'; ?>></td>
			<td><button type="submit" name="submit">Save</button></td>
		</tr>
		</form>
	</table>
</body>
</html>
<?php mysqli_close($connection); ?>
	