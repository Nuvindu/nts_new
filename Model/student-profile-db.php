<?php require_once('inc/dbconnection.php'); ?>
<?php  
    $query = "SELECT * FROM students WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    $year = $result['year'];
    $sql = "SELECT * FROM modules WHERE year = '{$year}'";
    $record_set = mysqli_query($connection, $sql);
    $record = mysqli_fetch_all($record_set);
    
?>