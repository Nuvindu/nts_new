<?php require_once('inc/dbconnection.php'); ?>
<?php
    if (!isset($_SESSION['index_no'])){
        header('Location: login.php');
    }
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
		$timeTable_list .= "<td>{$timeTable['Module_name']}</td>";
		$timeTable_list .= "<td><a href=\"delete-row.php?variable=timetable&del=$timeTable[Module_name]\">Delete</a></td>";
		$timeTable_list .= "</tr>";
	}
}

		//echo "database query failed";
	
		
		 
	$timeTable2_list = '';
	$query = "SELECT * FROM timeTable2 ORDER BY Date,Time";
	$timeTables= mysqli_query($connection, $query);
	if ($timeTables){	while ($timeTable2 = mysqli_fetch_assoc($timeTables)) {
		$timeTable2_list .= "<tr>";
		$timeTable2_list .= "<td>{$timeTable2['Date']}</td>";
		$timeTable2_list .= "<td>{$timeTable2['Time']}</td>";
		$timeTable2_list .= "<td>{$timeTable2['Place']}</td>";
		$timeTable2_list .= "<td>{$timeTable2['Module_name']}</td>";
		$timeTable2_list .= "<td><a href=\"delete-row.php?variable=timetable2&del=$timeTable2[Module_name]\">Delete</a></td>";
		$timeTable2_list .= "</tr>";
		}
	}
	else{
		echo "database query failed";
		
	}
	$timetable3_list = '';
	$query = "SELECT * FROM timetable3 ORDER BY Date,Time";
	$timeTables= mysqli_query($connection, $query);
	if ($timeTables){	while ($timetable3 = mysqli_fetch_assoc($timeTables)) {
		$timetable3_list .= "<tr>";
		$timetable3_list .= "<td>{$timetable3['Date']}</td>";
		$timetable3_list .= "<td>{$timetable3['Time']}</td>";
		$timetable3_list .= "<td>{$timetable3['Place']}</td>";
		$timetable3_list .= "<td>{$timetable3['Module_name']}</td>";
		$timetable3_list .= "<td><a href=\"delete-row.php?variable=timetable3&del=$timetable3[Module_name]\">Delete</a></td>";
		$timetable3_list .= "</tr>";
		}
	}
	else{
		echo "database query failed";
	}
	if (isset($_GET['err'])) {
		echo  "<script> alert('Duplicate module/row not inserted.'); </script>";
} 
 ?>
