<?php include_once('inc/dbconnection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['first_name'])) {
		header('Location: index.php');
	}
	$timeTable_list = '';
	$sqlget="SELECT * FROM timeTable WHERE is_deleted=0 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable_list .=  "<tr><td>";
		$timeTable_list .=  $row['Date'];
		$timeTable_list .=  "</td><td>";
		$timeTable_list .=  $row['Time'];
		$timeTable_list .=  "</td><td>";
		$timeTable_list .=  $row['Place'];
		$timeTable_list .=  "</td><td>";
		$timeTable_list .=  $row['Module_name'];
		$timeTable_list .=  "</td><tr>";
	
	
	}
	$timeTable2_list = '';
	$sqlget="SELECT * FROM timeTable2 where is_deleted!=1 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable2_list .=  "<tr><td>";
		$timeTable2_list .=  $row['Date'];
		$timeTable2_list .=  "</td><td>";
		$timeTable2_list .=  $row['Time'];
		$timeTable2_list .=  "</td><td>";
		$timeTable2_list .=  $row['Place'];
		$timeTable2_list .=  "</td><td>";
		$timeTable2_list .=  $row['Module_name'];
		$timeTable2_list .=  "</td><tr>";
	
	
	}

	$timeTable3_list = '';
	$sqlget="SELECT * FROM timetable3 where is_deleted!=1 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable3_list .=  "<tr><td>";
		$timeTable3_list .=  $row['Date'];
		$timeTable3_list .=  "</td><td>";
		$timeTable3_list .=  $row['Time'];
		$timeTable3_list .=  "</td><td>";
		$timeTable3_list .=  $row['Place'];
		$timeTable3_list .=  "</td><td>";
		$timeTable3_list .=  $row['Module_name'];
		$timeTable3_list .=  "</td><tr>";
	
	
	}


?>