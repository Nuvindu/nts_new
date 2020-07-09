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
		$timeTable_list .=  $row['Module_code'];
		$timeTable_list .=  "</td><td>";
		$timeTable_list .=  $row['Module_name'];
		$timeTable_list .=  "</td><tr>";
	
	
	}
?>