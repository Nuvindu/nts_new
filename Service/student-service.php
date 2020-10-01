<?php session_start(); ?>
<?php
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 7){
    header('Location: login.php');
}
?>