<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Service/add-timetable-rowY1T1-service.php'); ?>

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
	<?php if (!empty($errors)) {($errors);}?>
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
	