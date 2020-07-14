<?php require_once('inc/dbconnection.php'); ?>
<?php  
    $query = "SELECT * FROM lecturers WHERE index_no = '{$_SESSION['index_no']}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    $result = mysqli_fetch_assoc($result_set);
    $departmnt = $result['department'];
    $sql = "SELECT * FROM modules WHERE department = '{$departmnt}'";
    $record_set = mysqli_query($connection, $sql);
    $record = mysqli_fetch_all($record_set);
    
?>