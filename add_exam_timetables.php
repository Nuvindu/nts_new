<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/db-add-exam-timetables.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" href="./style/style-header.css">
    <!-- <link rel="stylesheet" href="./style/style-header.css"> .css">
	<link rel="stylesheet" type="text/css" href="css/">
	<link rel="stylesheet" href="./style/style-header.css"> -->
</head>
<body>

<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>

<div class="header">
        <?php include_once('header.php'); ?>
    </div>

    <!-- navbar -->
    <?php include_once('navbar.php'); ?>
	<div class="side-bar">
        <span style="
                                    text-align: center;
                                    margin: 0;
                                    height: 50px;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;
                                    /* padding-left: 11px; */
                                "><i class="fas fa-align-justify" aria-hidden="true" style="
                    padding-left: 17px;
                "></i></span>
        <ul>
            <li><a href="lecturer-db.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-project-diagram"></i>Exams</a></li>
            <li><a href="results_nav.php"><i class="fas fa-address-card"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-map-pin"></i>Feedback</a></li>
            <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
        </ul>
    </div> <!-- side-bar -->
<!-- <span><a href="lecturer-db.php"><< Back to Dashboard</a></span> -->
	
		<center><h1>Exam Timetables</h1></center>
        
		
		<h1 style="padding-left:4%;">First Year</h1>
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
<h1 style="padding-left:4%;">Second Year</h1>
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

<h1 style="padding-left:4%;">Third Year</h1>
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

