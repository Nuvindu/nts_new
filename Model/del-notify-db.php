<?php require_once __DIR__ . "/../Model/notifications-db.php" ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 

if(isset($_GET['id'])){
	$id = $_GET['id'];
	if(!empty($notification)){
		global $connection;
		$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($resulttable);
		$finalarray = array();		
		if($result){
			$arraylist = $result['notification'];	
			$finalarray = unserialize($arraylist);			
			unset($finalarray[$id]);
			$finalarray = serialize($finalarray);
			$query = "UPDATE notifications SET notification = '{$finalarray}' , seen = 0 WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
			$newresult = mysqli_query($connection,$query);
			if($newresult){
				header('Location: ../notifications.php');
			}	
			else{
				header('Location: ../notifications.php?error=could_not_delete_notification');
			}
		}
	}
	else{
		header('Location: ../notifications.php?error=could_not_delete_notification');
	}
}
else{
	header('Location: ../notifications.php?error=could_not_delete_notification');
}




?>