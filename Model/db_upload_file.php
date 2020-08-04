<?php
// include_once "/db_load_files.php";
include_once "../inc/connection.php";

/**
 * uploading file to the server storage
 * and setting up the file name
 */
$name = str_replace(" ", "", $_POST['moduleName']); //to identify module
$date = $_POST['date'];
$extension = pathinfo($_FILES['docTypeFile']['name'], PATHINFO_EXTENSION); //get the file extension
$file_tmp = $_FILES['docTypeFile']['tmp_name']; // directory that file store temporary "xampp/tmp"
$fileName = basename($_FILES['docTypeFile']['name']);
$isFileStored = move_uploaded_file($file_tmp, '../data/' . $fileName);

// The mysqli_stmt_init() function initializes a statement and returns an object suitable for mysqli_stmt_prepare().
$stmt = mysqli_stmt_init($connection);

//checking the table
$sql = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = ?";

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo mysqli_stmt_prepare($stmt, $sql);
    printf("fatal error x.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        echo $isFileStored;
        insertFileDetail($name, date("Y-m-d"), $fileName, $stmt);
    } else {
        echo 'creating table' . $name;
        createTable($name, $stmt);
        insertFileDetail($name, $date, $fileName, $stmt);
    }
    $row = mysqli_fetch_array($result);
}

// inserting file details in to databse
function insertFileDetail($tablename, $date, $fileUrl, $stmt)
{
    $sql = "INSERT INTO ";
    $sql .= "{$tablename} (date,fileUrl) ";
    $sql .= "VALUES (?,?)";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sql statement error";
        printf("fatal error.please contact Admin immideately");
        exit();
    } else {
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $date, $fileUrl);
        mysqli_stmt_execute($stmt);
    }
}

// creating database table
function createTable($tablename, $stmt)
{
    $sql = "CREATE TABLE ";
    $sql .= "{$tablename} (date DATE,fileUrl VARCHAR(255)) ";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "sql statement error";
        printf("fatal error.please contact Admin immideately");
        exit();
    } else {
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
    }
}
$connection->close();