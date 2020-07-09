<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php include_once('Model/dbGoToResults.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Module Selection</title>
	<link rel="stylesheet" type="text/css" href="css/go-to-results.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
	<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
	<div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php">
                    <img class="logo" src="./img/logo-0.png" alt="logo">
                    </a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
    <div class="middle">
    <div class="dash"><span><a href="lecturer.php"><< Back to Dashboard</a></span> </div>
	<div class="login">

		<form action="results.php" method="post">
			
			<fieldset>
				<legend><h1>&nbspSelect Module&nbsp</h1></legend>

				<p>
					<label for="">Batch:</label>            
					<select name="batch" id = "batch">
					<?php $year = date("Y");
						for ($i=$year-3; $i <= $year+1 ; $i++) { 
							echo "<option value = {$i}>{$i}</option>";
						}
					
					?>
             		</select>
   				</p>
				<p>
					<label for="">Term:</label>            
					<select name="term" id = "term">
					<?php 	for ($i=1; $i <= 9 ; $i++) { 
								echo "<option value = {$i}>{$i}</option>";
							}
					
					?>
             		</select>
   				</p>
				<p>
					<label for="">Module:</label>            
					<select name="module" id = "module">
               			<?php $modules = array('English', 'Psychology', 'Sociology', 'Anatomy & Physiology', 'Micro Biology', 'Pathology', 'Pharmacology I', 'Pharmacology II', 'Nutrition', 'General Science', 'Community Health', 'Community Health Practice', 'First Aid', 'First Aid Practice', 'Fundamental of Nursing', 'Fundamental of Nursing Practice', 'Gynecologycal Nursing', 'Gynecologycal Nursing Practice', 'History of Nursing', 'Medical Surgical Nursing', 'Medical Surgical Nursing Practice', 'Mental Health & Psychiatric Nursing', 'Mental Health & Psychiatric Nursing Practice', 'Obstetric Nursing', 'Obstetric Nursing Practice','Paediatric Nursing', 'Paediatric Practice', 'Professional Adjustment', 'Ward Management', 'Ward Management Practice', 'Work Shop', 'Research in Nursing');

               				foreach ($modules as $module) {
               					echo "<option value = {$module}>{$module}</option>";
               				}
 


               			 ?>
             		</select>
   				</p>
				<p>
					<button type="submit" name="submit">Add/Modify Results</button>
				</p>

			</fieldset>
		</form>
	</div> <!-- .login -->

	
        </div>

        <footer>
            <div class="column clearfix">
            <h3>Contact Us</h3>
            <ul>
                <div class="icon1"><img src="img/location.ico" width="22" height="22"></div>
                <li>Nurses Training School, Mahamodara, Galle, Sri Lanka</li>
                <div class="icon1"><img src="img/at.ico" width="20" height="20"></div>
                <li>Email - nts-galle@gov.lk</li>
                <div class="icon1"><img src="img/tele.ico" width="20" height="20"></div>
                <li>Telephone Number - 0912234452</li>
            </ul>
            </div>
        </footer>
</body>
</html>
<?php mysqli_close($connection) ?>