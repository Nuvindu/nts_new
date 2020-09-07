<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 
	$sql="SELECT * FROM modules";
	$records=mysqli_query($connection,$sql);

	if (isset($_GET['del'])) {
		// getting the timeTable information
		
		$del= mysqli_real_escape_string($connection, $_GET['del']);
		// delete row
		$query="DELETE FROM modules WHERE module_name='{$del}'";
		$res=mysqli_query($connection,$query);
		echo "<meta http-equiv='refresh' content='0;url=../add_modules_details.php'>";

		}
		
	else {
		// query unsuccessful
		header('Location: operator.php');
	}

		
	

?>
