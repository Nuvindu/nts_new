<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 4) {
        header('Location: index.php');
    }
?>