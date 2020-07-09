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
	
	<center><h1>First Year </h1></center>

	<h2>First Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $first_term; ?>
	</table>
		
	<h2>Second Term </h2>	
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $second_term; ?>
	</table>
		
	<h2>Third Term </h2>		
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $third_term; ?>
	</table><br><br><br>
		
	<center><h1>Second Year </h1></center>

	<h2>First Term </h2>	
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $fourth_term; ?>
	</table>

	<h2>Second Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $fifth_term; ?>
	</table>
		
	<h2>Third Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $sixth_term; ?>
	</table><br><br><br>

	<center><h1>Third Year </h1></center>

	<h2>First Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $seventh_term; ?>
	</table>

	<h2>Second Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $eighth_term; ?>
	</table>

	<h2>Third Term </h2>
	<table class="sem_result">
		<tr>
			<th class="module_name">Module Name</th>
			<th class="grade">Grade/Mark</th>
		</tr>
		<?php echo $ninth_term; ?>
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