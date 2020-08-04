<?php require_once('inc/dbconnection.php'); ?>
<?php
//index.php

$query = "SELECT * FROM students ORDER BY index_no ASC";
$result = mysqli_query($connection, $query);
?>