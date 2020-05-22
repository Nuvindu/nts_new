<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php

	//if ($_SESSION['admin']!=1){
	//	header('Location: user-page.php');
	//}
	$timeTable_list = '';
	$query = "SELECT * FROM timeTable";
	$query = "SELECT * FROM timeTable WHERE is_deleted=0 ORDER BY Date,Time";
	$timeTables= mysqli_query($connection, $query);
	if ($timeTables){	while ($timeTable = mysqli_fetch_assoc($timeTables)) {
		$timeTable_list .= "<tr>";
		$timeTable_list .= "<td>{$timeTable['Date']}</td>";
		$timeTable_list .= "<td>{$timeTable['Time']}</td>";
		$timeTable_list .= "<td>{$timeTable['Place']}</td>";
        $timeTable_list .= "<td>{$timeTable['Module_code']}</td>";
		$timeTable_list .= "<td>{$timeTable['Module_name']}</td>";
		$timeTable_list .= "<td><a href=\"modify-user.php?timeTable_Place={$timeTable['Place']}\">Edit</a></td>";
		$timeTable_list .= "<td><a href=\"delete-rowY1T1.php?del=$timeTable[Module_code]\">Delete</a></td>";
		$timeTable_list .= "</tr>";
	}
}
	else{
		echo "database query failed";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exam Time Table</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body bgcolor="#b3ffff">
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
	</header>
	<div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; text-align: center;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
        <div class="add"><a href="add-timeTable-rowY1T1.php">Add Time Table row &gt&gt</a> </br></div>
	<h1>Exam Time Table</h1>

	<table class="masterlist">
		<tr>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module code</th>
			<th>Module name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>

		<?php echo $timeTable_list; ?>

	</table>
</body>
</html>
<?php mysqli_close($connection); ?>