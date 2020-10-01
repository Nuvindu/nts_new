<?php require_once __DIR__ . "/../inc/database_connection.php" ?>
<?php

$batch = $_GET['batch'];
$module_code = $_GET['module_code'];



$query = "SELECT index_no,first_name,last_name,{$module_code} FROM result WHERE batch='{$batch}' and is_deleted=0 ORDER BY index_no";

$statement = $connect->prepare($query);

if($statement->execute())
{
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }

 echo json_encode($data);

}


?>