<?php require_once __DIR__ . "/../Model/notifications-db.php" ?>
<?php require_once __DIR__ . "/../Controller/controller.php" ?>
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php 

if(isset($_GET['id'])){
	$id = $_GET['id'];  //get the index of the notification in the array
	if(!empty($notification)){
		global $connection;
		$originator = new Originator(); 
		$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
		$resulttable = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($resulttable); // get the record of notifications of the current user
		$finalarray = array();		
		if($result){
			$arraylist = $result['notification'];	
			$finalarray = unserialize($arraylist);	
			$originator->setState($id,$finalarray[$id]["Subject"],$finalarray[$id]["Message"],$_SESSION['index_no']); 
			$memento = $originator->saveStateToMemento(); // save the notification state as a memento object
			// $memento = $mementoobj->getState();
			$serializedmem = serialize($memento);
			setcookie("memento",$serializedmem, time() + (600), "/"); //set the cookie with serialized memento object
			unset($finalarray[$id]); //remove the selected notification from the array
			$finalarray = serialize($finalarray);
			$query = "UPDATE notifications SET notification = '{$finalarray}' , seen = 0 WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
			$newresult = mysqli_query($connection,$query);  //update the database
			if($newresult){
				header('Location: ../notifications.php?status=deleted');
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