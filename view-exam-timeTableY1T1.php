<?php session_start(); ?>
<?php include_once('Model/view-exam-timetableY1T1.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Exam Time Tables</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
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

	<main>
	<h1>View Exam Time Table  <span><a href="student.php"><< Back to Dashboard</a></span></h1>
	
	<center><h1>First Year </h1></center>

	<h2>First Term </h2>
<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module code</th>
			<th>Module name</th>
		</tr>

		<?php echo $timeTable_list; ?>

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
</body>
</html> 