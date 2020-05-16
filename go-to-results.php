<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>

<?php 
    if (!isset($_SESSION['user_id'])){
            header('Location: login.php');
        }
?>

<?php if (isset($_GET['err'])) {
		echo"<script>alert('Invalid module for the term or no students registered.');</script>";
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Module Selection</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<header>

	<div class="loggedin">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
	</header>
	<div class="login">
		<form action="results.php" method="post">
			
			<fieldset>
				<legend><h1>Select Module<span><a href="lecturer.php">< Back to Dashboard</a></span></h1></legend>

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
</body>
</html>
<?php mysqli_close($connection) ?>