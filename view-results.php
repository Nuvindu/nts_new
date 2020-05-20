<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['first_name'])) {
		header('Location: index.php');
	}

	$first_term = '';
	$second_term = '';
	$third_term = '';
	$fourth_term = '';
	$fifth_term = '';
	$sixth_term = '';
	$seventh_term = '';
	$eighth_term = '';
	$ninth_term = '';


	// getting the user record from result table
	$query = "SELECT * FROM result WHERE index_no = '{$_SESSION['index_no']}'";
	$record = mysqli_query($connection, $query);

	verify_query($record);

	if (mysqli_num_rows($record) == 1) {
		// valid user found
		$user = mysqli_fetch_assoc($record);

	} else {
		// no record in result table
		$errors[] = 'No Record in Result Table';
	}

	$modules = array('1100'=>'English', '1200'=>'Psychology', '1300'=>'Sociology', '2110'=>'Anatomy & Physiology', '2120'=>'Micro Biology', '2130'=>'Pathology', '2140'=>'Pharmacology I', '2150'=>'Pharmacology II', '2160'=>'Nutrition', '2170'=>'General Science', '2310'=>'Community Health', '2320'=>'Community Health Practice', '2230'=>'First Aid', '2240'=>'First Aid Practice', '2250'=>'Fundamental of Nursing', '2260'=>'Fundamental of Nursing Practice', '2270'=>'Gynecologycal Nursing', '2280'=>'Gynecologycal Nursing Practice', '2290'=>'History of Nursing', '2210'=>'Medical Surgical Nursing', '2211'=>'Medical Surgical Nursing Practice', '2212'=>'Mental Health & Psychiatric Nursing', '2213'=>'Mental Health & Psychiatric Nursing Practice', '2214'=>'Obstetric Nursing', '2215'=>'Obstetric Nursing Practice', '2216'=>'Paediatric Nursing', '2217'=>'Paediatric Practice', '2218'=>'Professional Adjustment', '2219'=>'Ward Management', '2220'=>'Ward Management Practice', '2221'=>'Work Shop', '3100'=>'Research in Nursing');

	$allKeys = array_keys($user);

	for ($i=5; $i < 13 ; $i++) { 
		$first_term .= generate_result_table_row($i);
	}

	for ($i=13; $i < 21 ; $i++) { 
		$second_term .= generate_result_table_row($i);
	}

	for ($i=21; $i < 28 ; $i++) { 
		$third_term .= generate_result_table_row($i);
	}

	for ($i=28; $i < 34 ; $i++) { 
		$fourth_term .= generate_result_table_row($i); 
	}

	for ($i=34; $i < 40 ; $i++) { 
		$fifth_term .= generate_result_table_row($i);
	}

	for ($i=40; $i < 44 ; $i++) { 
		$sixth_term .= generate_result_table_row($i);
	}

	for ($i=44; $i < 49 ; $i++) { 
		$seventh_term .= generate_result_table_row($i);
	}

	for ($i=49; $i < 52 ; $i++) { 
		$eighth_term .= generate_result_table_row($i);
	}

	for ($i=52; $i < 55 ; $i++) { 
		$ninth_term .= generate_result_table_row($i);
	}


?>
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