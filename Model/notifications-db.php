<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 
	$notification = '';
	$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
	$resulttable = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($resulttable);
	if($result){
		$notification = unserialize($result['notification']);	
		$seen = $result['seen'];		
	}
		

?>