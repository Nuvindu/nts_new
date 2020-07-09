<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/db-add-exam-timetableY1T1.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/exam-timetable.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
	</header>
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
        <div class="add"><a href="add-timeTable-rowY1T1.php">Add Time Table row &gt&gt</a> </br></div>
	<h1>Exam Time Table</h1>

	<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module code</th>
			<th>Module name</th>
			<th>Delete</th>
		</tr>

		<?php echo $timeTable_list; ?>

	</table>
</body>
</html>
<?php mysqli_close($connection); ?>
