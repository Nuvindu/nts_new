<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php session_start(); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
        header('Location: ../login.php');
    }

    $sql ="SELECT * FROM notifications WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $resulttable = mysqli_query($connection, $sql);
    if($resulttable){
        $result = mysqli_fetch_assoc($resulttable);
        if($result){  
            if($result['seen']!=0){
                $_SESSION['count'] = $result['seen'];      
                unset($_SESSION['seen']); 
           } 
        }                   
    }



    $query = "SELECT * FROM students WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    if($result['year']==1){
        header('Location: ../student-year1.php');
    }
    else if($result['year']==2){
        header('Location: ../student-year2.php');
    }
    else if($result['year']==3){
        header('Location: ../student-year3.php');
    }
?>