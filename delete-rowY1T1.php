<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	
	mysqli_select_db($connection,'userdb');
	$sql="SELECT * FROM timeTable";
	$records=mysqli_query($connection,$query);


	if (isset($_GET['del'])) {
		// getting the timeTable information
		//$id=$_GET['del'];
		$del= mysqli_real_escape_string($connection, $_GET['del']);
		$sql="DELETE FROM timeTable WHERE module_code={$del}";
		$query = "UPDATE timeTable SET is_deleted = 1 WHERE module_code = {$del} LIMIT 1 ";
		$res=mysqli_query($connection,$sql) or die("failed".mysqli_connect_error());
		echo "<meta http-equiv='refresh' content='0;url=add_exam_timeTableY1T1.php'>";

		}
		
	else {
		// query unsuccessful
		header('Location: lecturer.php');
	}

		
	

?>