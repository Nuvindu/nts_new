<?php include_once('Model/view-exam-timetables.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Exam Timetables</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/notificationbar.css">
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" href="./style/style-header.css">
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
            <li><a href="Model/student-db.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
            <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href=""><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="view-results.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>

        </ul>
    </div> <!-- side-bar -->
	<h1 style="padding-left:4%;">View Exam Timetables<span></h1>
	
	<center><h1>First Year-Batch A </h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable_list; ?>

	</table>
	<br><br><br>

    <center><h1>First Year-Batch B </h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable_listB; ?>

	</table>
	<br><br><br>
    
    <center><h1>Second Year-Batch A </h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable2_list; ?>

	</table>
    <br><br><br>
    
    <center><h1>Second Year-Batch B </h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable2_listB; ?>

	</table>

	<br><br><br><center><h1>Third Year-Batch A</h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable3_list; ?>

	</table>
	
	<br><br><center><h1>Third Year-Batch B</h1></center>

<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable3_listB; ?>

	</table>
	
	
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
	<script src="./js/js-notify-counter.js"></script>
</body>
</html> 
