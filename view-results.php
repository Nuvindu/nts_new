<?php session_start(); ?>
<?php include_once('inc/dbconnection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php require_once('Controller/view-results-cont.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Results</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/view-results.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
	<header>
		<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
		<div class="header clearfix">
            <div class="nts-text" >
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
	<h1>View Academic Results  <span><a href="student.php"><< Back to Dashboard</a></span></h1>

	<h2>First Year </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $first_year; ?>
	</table>
		
	<h2>Second Year </h2>	
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $second_year; ?>
	</table>
		
	<h2>Third Year </h2>		
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
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
</body>
</html> 