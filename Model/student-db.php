<?php require_once('inc/dbconnection.php'); ?>
<?php 
    if (!isset($_SESSION['index_no'])){
        header('Location: login.php');
    }

    $query = "SELECT * FROM students WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    if($result['year']==1){
        header('Location: student-year1.php');
    }
    else if($result['year']==2){
        header('Location: student-year2.php');
    }
    else if($result['year']==3){
        header('Location: student-year3.php');
    }


      


?>