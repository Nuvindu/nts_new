<?php


require_once('db_upload.php');

$upload = new gallery\Upload();

$upload->uploadToDatabase($_POST['name'], $_POST['description'], $_POST['folder_name'], $_POST['clicks'], $_POST['image']);