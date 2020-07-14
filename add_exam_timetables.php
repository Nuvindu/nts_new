<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/db-add-exam-timetables.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" type="text/css" href="css/">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
<header>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
		
            <div class="nts-text" style="">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
      
	</header>
<main>
<span><a href="lecturer.php"><< Back to Dashboard</a></span>
	
		<center><h1>Exam Timetables</h1></center>
        
		
		<h1>First Year</h1>
		<div class="add" style="text-align:right;"><a href="add-timeTable-rowY1.php">Add Timetable row &gt&gt</a> </div>

<table class="masterlist">
	<tr>
		<th>Date </th>
		<th>Time </th>
		<th>Place</th>
		<th>Module name</th>
		<th>Delete</th>
	</tr>

	<?php echo $timeTable_list; ?>

</table>
<br><br>
<h1>Second Year</h1>
<div class="add" style="text-align:right;"><span><a href="add-timeTable-rowY2.php">Add Timetable row &gt&gt</a></span></div>
<table class="masterlist">
	<tr>
		<th>Date </th>
		<th>Time </th>
		<th>Place</th>
		<th>Module name</th>
		<th>Delete</th>
	</tr>

	<?php echo $timeTable2_list; ?>

</table><br><br>

<h1>Third Year</h1>
<div class="add" style="text-align:right;"><a href="add-timeTable-rowY3.php">Add Timetable row &gt&gt</a> </div>
<table class="masterlist">
	<tr>
		<th>Date </th>
		<th>Time </th>
		<th>Place</th>
		<th>Module name</th>
		<th>Delete</th>
	</tr>

	<?php echo $timetable3_list; ?>

</table><br><br>
</main>
<footer>
	<div class="column clearfix">
        <h3>Contact Us</h3>
        <ul>
            <div class="icon1"><img src="img/location.ico" width="24" height="24"></div>
            <li>Nurses Training School, Mahamodara, Galle, Sri Lanka</li>
            <div class="icon1"><img src="img/at.ico" width="20" height="20"></div>
            <li>Email - nts-galle@gov.lk</li>
            <div class="icon1"><img src="img/tele.ico" width="18" height="18"></div>
            <li>Telephone Number - 0912234452</li>
        </ul>
    </div>
	</footer>
</body>
</html>

