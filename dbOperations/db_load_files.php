<?php require_once('../inc/dbconnection.php');


$name = str_replace(" ", "", $_POST['Name']);


$sql = "SELECT * FROM {$name}";


$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error ";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($data, $row);
    }
}
echo json_encode($data);
$connection->close();