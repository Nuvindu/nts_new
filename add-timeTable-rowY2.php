<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Service/add-timetable-rowY2-service.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
<header>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
		<div class="header clearfix">
            <div class="nts-text" style="">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
	</header>
		
        <div class="add" style="text-align:right"><a href="add_exam_timetables.php">Back &gt&gt</a> </br></div>
	<h1>Add Second Year Exam Timetable</h1>
	<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
			<th>Submit</th>
		</tr>
		<form action="add-timeTable-rowY2.php" method="post" class="userform">
		<tr>
			<td><input type="date" name="Date" <?php echo 'value="' . $Date . '"'; ?>required></td>
			<td><input type="time" name="Time" <?php echo 'value="' . $Time . '"'; ?>required></td>
			<td><input type="text" name="Place" <?php echo 'value="' . $Place . '"'; ?>required></td>
			<td><input type="text" name="Module_name" <?php echo 'value="' . $Module_name . '"'; ?>required></td>
			<td><button type="submit" name="submit">Save</button></td>
		</tr>
		</form>
	</table>
</body>
</html>
<?php mysqli_close($connection); ?>
	