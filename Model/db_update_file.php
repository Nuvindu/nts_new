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
$oldFileName = $_POST['oldFileName'];

// The mysqli_stmt_init() function initializes a statement and returns an object suitable for mysqli_stmt_prepare().
$stmt = mysqli_stmt_init($connection);

//checking the table
$sql = "UPDATE {$name} ";
$sql .= "SET fileUrl = ? ";
$sql .= "WHERE fileUrl=?";

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo $sql;
    echo mysqli_stmt_prepare($stmt, $sql);
    printf("fatal error x.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $fileName, $oldFileName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$connection->close();