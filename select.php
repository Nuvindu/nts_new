<?php require_once('inc/database_connection.php'); ?>
<?php



//select.php



$query = "SELECT * FROM students ORDER BY index_no ASC";

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

