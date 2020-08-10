<?php require_once('inc/dbconnection.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 4) {
        header('Location: index.php');
    }

	if (isset($_GET['err'])) {
		echo"<script>alert('Invalid module for the year or no students registered.');</script>";
	}
	if (isset($_GET['error'])) {
		$x = str_replace("_"," ","{$_GET['error']}");
		echo"<script>alert('{$x}');</script>";
	} 
?>