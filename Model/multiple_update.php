<?php require_once __DIR__ . "/../inc/database_connection.php" ?>
<?php

//multiple_update.php



if (isset($_POST['hidden_id'])) {
    $index_no = $_POST['index_no'];
    $year = $_POST['year'];
    $id = $_POST['hidden_id'];
    for ($count = 0; $count < count($id); $count++) {
        $data = array(
            ':index_no'   => $index_no[$count],
            ':year'   => $year[$count],
            ':id'   => $index_no[$count]
        );
        $query = "
  UPDATE students
  SET index_no = :index_no, year = :year
  WHERE index_no = :index_no
  ";
        $statement = $connect->prepare($query);
        $statement->execute($data);
    }
}

?>