
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Service/add_module.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add module</title>
    <link rel="stylesheet" type="text/css" href="css/addTimetable.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <!-- <link rel="stylesheet" href="./style/style-header.css"> -->
</head>

<body>
<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>

<div class="header">
        <?php include_once('header.php'); ?>
    </div>

    <div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>
	<br><br>
    <h2 style="padding-left:4%">Add Module</h2>
    <table class="masterlist">
    <thead>
			<th>Module Code</th>
            <th>Module Name</th>
			<th>Year</th>
			<th>Department</th>
			<th>Save</th>
		</thead>
		<form action="add-module.php" method="post" class="userform">
		<tbody>
		<tr>
			<td data-label="module_code"><input type="int" name="module_code" <?php echo 'value="' . $module_code . '"'; ?> required ></td>
			<td data-label="module_name"><input type="text" name="module_name" <?php echo 'value="' . $module_name . '"'; ?>required></td>
			<td data-label="year">
                <select name="year" id="year"
                    style="border-radius: 6px;padding: 2px;padding-right: 20px;">
                    <?php $years = array('1', '2', '3');
								// echo "<option value = {$year} >  {$year}</option>";
								foreach ($years as $i) {
									echo "<option value = {$i}> {$i} </option>";
								} ?>
                </select>				
			</td>
			<td data-label="department">
			    <select name="department" id="department" style="border-radius: 6px;padding: 2px;padding-right: 20px;">
                    <?php $departments = array('Fundamentals_of_Nursing', 'Medical_Nursing', 'Surgical_Nursing', 'Maternal_&_Child_Care_Nursing', 'Management_&_Research');
								foreach ($departments as $dep) {
									$x = str_replace("_", " ", $dep);
									$element = array_search($dep,$departments,true)+1;

									echo "<option value = {$element}>{$x}</option>";
								}

					?>
                </select>
			</td>
			<td data-label="Submit"><button type="submit" name="submit">Save</button></td>
		</tr>
	</tbody>
</body>

</html>
<?php mysqli_close($connection); ?>
