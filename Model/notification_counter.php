<?php require_once __DIR__ . "/../inc/dbconnection.php";?>
<?php 
	session_start();
	global $connection;
	$sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    if($resulttable = mysqli_query($connection, $sql)){
	    $result = mysqli_fetch_assoc($resulttable);
	    if($result){  
	    	$count = $result['seen']; 
	        $_SESSION['count'] = $result['seen'];       
	    }			
	    echo $count;	    	

    }
 ?>