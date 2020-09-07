<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/db-add-modules.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Add Modules</title>
	<link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="./style/style-header.css"> .css">
	<link rel="stylesheet" type="text/css" href="css/">
	<link rel="stylesheet" href="./style/style-header.css"> -->
</head>
<body>

<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>

	<br>
	<div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>	
	<br><br>
	

		<center><h1>Departments</h1></center>
        
		<div class="add" style="text-align:right;"><a href="add-module.php"><b>Add New Module</b></a> </div>
		<h2 style="padding-left:4%;">Fundamentals of Nursing</h2>
		
<div class="table-responsive" >
<table class="masterlist">
	<tr style="background-color:lightblue;">
		<th>Module_code</th>
		<th>Module Name</th>
	    <th>Year</th>
		<th>Delete</th>
	</tr>

	<?php echo $modules_list; ?>

</table>
</div>
<br><br>
<h2 style="padding-left:4%;">Medical Nursing</h2>
		
<div class="table-responsive" >
<table class="masterlist">
	<tr style="background-color:lightblue;">
    <th>Module_code</th>
		<th>Module Name</th>
	    <th>Year</th>
		<th>Delete</th>
	</tr>

	<?php echo $modules_listB; ?>

</table>
</div>
<br><br>
<h2 style="padding-left:4%;">Surgical Nursing</h2>

<div class="table-responsive" >
<table class="masterlist">
	<tr style="background-color:lightblue;">
    <th>Module_code</th>
		<th>Module Name</th>
	    <th>Year</th>
		<th>Delete</th>
	</tr>

	<?php echo $modules2_list; ?>

</table>
</div>
<br><br>
<h2 style="padding-left:4%;">Mental And Child Care Nursing</h2>
		
<div class="table-responsive" >
<table class="masterlist">
	<tr style="background-color:lightblue;">
    <th>Module_code</th>
		<th>Module Name</th>
	    <th>Year</th>
		<th>Delete</th>
	</tr>

	<?php echo $modules2_listB; ?>

</table>
</div>
<br><br>
<h2 style="padding-left:4%;">Management And Research</h2>
<div class="table-responsive" >
<table class="masterlist">
	<tr style="background-color:lightblue;">
    <th>Module_code</th>
		<th>Module Name</th>
	    <th>Year</th>
		<th>Delete</th>
	</tr>

	<?php echo $modules3_list; ?>

</table>
</div>
<br><br>

</main>

</body>
</html>

