<?php session_start(); ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 
	$notification = '';
	$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
	$resulttable = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($resulttable); // get the record of notifications of the current user
	if($result){
		$notification = unserialize($result['notification']);	
		$_SESSION['seen'] = 0;		//mark as read
		unset($_SESSION['count']);
	}
	$query = "UPDATE notifications SET seen = 0 WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
	$res = mysqli_query($connection,$query);
?>