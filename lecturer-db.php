<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
        header('Location: login.php');
    }

    $query = "SELECT * FROM lecturers WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    $departmnt = $result['department'];
    if($result['department']==1){
        header('Location: lecturer-dep1.php');
    }
    else if($result['department']==2){
        header('Location: lecturer-dep2.php');
    }
    else if($result['department']==3){
        header('Location: lecturer-dep3.php');
    }
    else if($result['department']==4){
        header('Location: lecturer-dep4.php');
    }
    else if($result['department']==5){
        header('Location: lecturer-dep5.php');
    }


      


?>