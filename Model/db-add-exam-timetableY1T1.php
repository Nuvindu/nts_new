<?php require_once('inc/dbconnection.php'); ?>
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
		$timeTable_list .= "<td><a href=\"delete-rowY1T1.php?del=$timeTable[Module_code]\">Delete</a></td>";
		$timeTable_list .= "</tr>";
	}
}
	else{
		echo "database query failed";
	}
 ?>