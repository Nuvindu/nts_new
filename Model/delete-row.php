<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 
	$y=$_GET['variable'];
	$sql="SELECT * FROM $y";
	$records=mysqli_query($connection,$sql);

	if (isset($_GET['del'])) {
		// getting the timeTable information
		
		$del= mysqli_real_escape_string($connection, $_GET['del']);
		// delete row
		$query="DELETE FROM $y WHERE module_name='{$del}'";
		$res=mysqli_query($connection,$query);
		echo "<meta http-equiv='refresh' content='0;url=../add_exam_timetables.php'>";

		}
		
	else {
		// query unsuccessful
		header('Location: lecturer-db.php');
	}

		
	

?>
