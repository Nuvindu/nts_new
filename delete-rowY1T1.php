<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	$sql="SELECT * FROM timetable";
	$records=mysqli_query($connection,$sql);


	if (isset($_GET['del'])) {
		// getting the timeTable information
		//$id=$_GET['del'];
		$del= mysqli_real_escape_string($connection, $_GET['del']);
		$query = "UPDATE timetable SET is_deleted = 1 WHERE module_code = '{$del}' LIMIT 1 ";
		$sql="DELETE FROM timetable WHERE module_code='{$del}'";
		$res=mysqli_query($connection,$query);
		echo "<meta http-equiv='refresh' content='0;url=add_exam_timeTableY1T1.php'>";

		}
		
	else {
		// query unsuccessful
		header('Location: lecturer.php');
	}

		
	

?>