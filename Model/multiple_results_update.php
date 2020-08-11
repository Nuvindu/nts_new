<?php require_once __DIR__ . "/../inc/database_connection.php" ?>
<?php

//multiple_update.php



$module_code = $_GET['module_code'];

if(isset($_POST['hidden_id'])){
  $grade = $_POST['grade'];
  $id = $_POST['hidden_id'];
  for($count = 0; $count < count($id); $count++){
    $data = array(
   ':grade'  => $grade[$count],
   ':id'   => $id[$count]
    );
    $query = "
    UPDATE result 
    SET {$module_code} = :grade 
    WHERE index_no = :id
    ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
  }
}

// if you remove {index_no = :index_no, first_name = :first_name, last_name = :last_name,} this part from line 25 lecture will only be able to update the grade 
?>