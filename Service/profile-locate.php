<?php session_start(); ?>
<?php 

if (!isset($_SESSION['index_no'])){
    header('Location: ../login.php');
}
else{
    if (strlen($_SESSION['index_no']) == 4) {
        header('Location: ../lecturer-profile.php');
    }
    else if (strlen($_SESSION['index_no']) == 7) {
        header('Location: ../student-profile.php');
    }	
    else{
    	header('Location: ../login.php');
    }
}





 ?>