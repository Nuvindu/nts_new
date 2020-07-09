<?php

require_once('../inc/dbconnection.php');


$UserSessionName = $_POST['UserSessionName'];

$sql = "SELECT profile_picture_dir FROM user";
$sql .= " WHERE ";
$sql .= " index_no=? ";

$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $UserSessionName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
}

$connection->close();
echo json_encode($row);