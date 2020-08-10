<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>
<?php session_start(); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
        header('Location: ../login.php');
    }
    else if(strlen($_SESSION['index_no'])!= 4){
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


    $query = "SELECT * FROM lecturers WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    $departmnt = $result['department'];
    if($result['department']==1){
        header('Location: ../lecturer-dep1.php');
    }
    else if($result['department']==2){
        header('Location: ../lecturer-dep2.php');
    }
    else if($result['department']==3){
        header('Location: ../lecturer-dep3.php');
    }
    else if($result['department']==4){
        header('Location: ../lecturer-dep4.php');
    }
    else if($result['department']==5){
        header('Location: ../lecturer-dep5.php');
    }


      


?>