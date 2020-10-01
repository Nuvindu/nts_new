<?php session_start(); ?>
<?php include_once('inc/dbconnection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php 
	//checking if a user is logged in
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 7){
    header('Location: login.php');
}
else{
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

	$timeTable_listB = '';
	$sqlget="SELECT * FROM timeTable1b WHERE is_deleted=0 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable_listB .=  "<tr><td>";
		$timeTable_listB .=  $row['Date'];
		$timeTable_listB .=  "</td><td>";
		$timeTable_listB .=  $row['Time'];
		$timeTable_listB .=  "</td><td>";
		$timeTable_listB .=  $row['Place'];
		$timeTable_listB .=  "</td><td>";
		$timeTable_listB .=  $row['Module_name'];
		$timeTable_listB .=  "</td><tr>";
	
	
	}
	$timeTable2_listB = '';
	$sqlget="SELECT * FROM timeTable2b where is_deleted!=1 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable2_listB .=  "<tr><td>";
		$timeTable2_listB .=  $row['Date'];
		$timeTable2_listB .=  "</td><td>";
		$timeTable2_listB .=  $row['Time'];
		$timeTable2_listB .=  "</td><td>";
		$timeTable2_listB .=  $row['Place'];
		$timeTable2_listB .=  "</td><td>";
		$timeTable2_listB .=  $row['Module_name'];
		$timeTable2_listB .=  "</td><tr>";
	
	
	}

	$timeTable3_listB = '';
	$sqlget="SELECT * FROM timetable3b where is_deleted!=1 ORDER BY Date,Time";
	$sqldata=mysqli_query($connection, $sqlget) or die("error getting");
	
	while ($row =mysqli_fetch_array($sqldata,MYSQLI_ASSOC)){
		$timeTable3_listB .=  "<tr><td>";
		$timeTable3_listB .=  $row['Date'];
		$timeTable3_listB .=  "</td><td>";
		$timeTable3_listB .=  $row['Time'];
		$timeTable3_listB .=  "</td><td>";
		$timeTable3_listB .=  $row['Place'];
		$timeTable3_listB .=  "</td><td>";
		$timeTable3_listB .=  $row['Module_name'];
		$timeTable3_listB .=  "</td><tr>";
	
	
	}

}
?>
