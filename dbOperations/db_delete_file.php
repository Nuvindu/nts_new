<?php
include_once('../inc/connection.php');

$db = $connection;





$filename = $_POST["fileName"];
$name = str_replace(" ", "", $_POST['Name']);
echo $_POST['Name'];
$sql = "DELETE FROM {$name}";
$sql .= " WHERE ";
$sql .= "fileUrl=?";


$stmt = mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $filename);
    mysqli_stmt_execute($stmt);
    printf("rows updated: %d\n", mysqli_stmt_affected_rows($stmt));
}

$db->close();