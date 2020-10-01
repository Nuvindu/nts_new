<?php


require_once('db_upload.php');
$upload = new gallery\Upload();
$upload->UploadToDirectory($_FILES['photos'], $_GET['dir']);