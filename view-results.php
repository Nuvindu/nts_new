<?php include_once('inc/dbconnection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php require_once('Controller/view-results-cont.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Results</title>
	<link rel="stylesheet" type="text/css" href="css/viewResultsRes.css">
	<link rel="stylesheet" type="text/css" href="css/view-results.css">
	<link rel="stylesheet" type="text/css" href="css/notificationbar.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="view-exam-timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href=""><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div> <!-- side-bar -->

	<main>
	<h1 style="padding-left:4%;">View Academic Results</h1>

	<h2 id="year" style="padding-left:4%;">First Year </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade</th>
		</tr>
		<?php echo $first_year; ?>
	</table>
		
	<h2 id="year" style="padding-left:4%;">Second Year </h2>	
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade</th>
		</tr>
		<?php echo $second_year; ?>
	</table>
		
	<h2 id="year" style="padding-left:4%;">Third Year </h2>		
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade</th>
		</tr>
		<?php echo $third_year; ?>
	</table><br><br><br>
						
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