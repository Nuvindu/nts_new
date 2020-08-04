<?php

$name = $_POST['UserSessionName']; //to identify user
$extension = pathinfo($_FILES['imageFile']['name'], PATHINFO_EXTENSION); //get the image extension
$file_tmp = $_FILES['imageFile']['tmp_name']; // directory that file store temporary "xampp/tmp"
$imageFileName = $name . ".png";
$isFileStored = move_uploaded_file($file_tmp, '../profile-pictures/' . $name . '.png'); // store file in /nts_galle-master/profile-pictures


// sending file name to data base to identify user when loggin
include_once('../inc/dbconnection.php');

$db = $connection;

$sql = "UPDATE user";
$sql .= " SET ";
$sql .= "profile_picture_dir=?";
$sql .= " WHERE ";
$sql .= "index_no=?";

$stmt = mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $imageFileName, $name);
    mysqli_stmt_execute($stmt);
}

$db->close();
echo './profile-pictures/' . $name . '.png';