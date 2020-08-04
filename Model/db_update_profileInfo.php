<?php
include_once('../inc/connection.php');

$db = $connection;

$name = $_POST['name'];
$email = $_POST['email'];
$NIC = $_POST['NIC'];
$UserSessionName = $_POST['UserSessionName'];



$sql = "UPDATE user";
$sql .= " SET ";
$sql .= "first_name=?,";
$sql .= "email=?,";
$sql .= "NIC=?";
$sql .= " WHERE ";
$sql .= "index_no=?";

$stmt = mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $NIC, $UserSessionName);
    mysqli_stmt_execute($stmt);
    printf("rows updated: %d\n", mysqli_stmt_affected_rows($stmt));
}

$db->close();