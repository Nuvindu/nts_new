<?php require_once('inc/dbconnection.php'); ?>
<?php 
    if (!isset($_SESSION['user_id'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 4) {
        header('Location: index.php');
    }
?>