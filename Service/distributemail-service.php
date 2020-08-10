<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/user.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php 
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 2){
    header('Location: login.php');
}
if(isset($_POST['submit'])) {
	global $connection;
	$type = mysqli_real_escape_string($connection, $_POST['receiver']);
    $sql = "SELECT * FROM user WHERE type = '{$type}'";
	$record_set = mysqli_query($connection, $sql);
	$record = mysqli_fetch_all($record_set);
	$x = false;
	$controller = new Controller();
	foreach ($record as $rec) {
		$emailval = $rec[6];
		$index_no = $rec[0];
		if($type=='Lecturer'){
			$subject  = mysqli_real_escape_string($connection, $_POST['subject']);
			$message  = mysqli_real_escape_string($connection, trim($_POST['message']));
			// $message.=' '.$index_no;  
			$user =  new Lecturer('','','','','',$index_no);
			$user->setEmail($emailval);
			$user->setController($controller);
			$x = $user->distributeEmail($subject,$message,$index_no);
		}
		else if($type=='Student'){
			$subject  = mysqli_real_escape_string($connection, $_POST['subject']);
			$message  = mysqli_real_escape_string($connection, trim($_POST['message']));
			// $message.=' '.$index_no;  
			$user =  new Student('','','','','',$index_no);
			$user->setEmail($emailval);
			$user->setController($controller);
			$x = $user->distributeEmail($subject,$message,$index_no);
		}
		if($x==false){
			echo "Error";
			return;
		}

    }
    if($x){
    	echo "<script>alert('Notifications are sent to all {$type}s.');</script>";
    	return;
    }

}

 ?>