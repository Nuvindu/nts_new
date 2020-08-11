
<?php require_once __DIR__ . "/../inc/dbconnection.php" ?>

<?php
//delete.php

if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query1 = "DELETE FROM students WHERE index_no = '".$id."'";
  $res=mysqli_query($connection, $query1);
  if ($res){
    $query2 = "UPDATE user SET is_deleted = 1 WHERE index_no = '".$id."'  ";
		
    $result2 = mysqli_query($connection,$query2);
    if($result2){
        
            $sql = "DELETE from result WHERE index_no ='".$id."' ";
            printf($sql);
            
            
            $del = mysqli_query($connection,$sql);
        }
    }
 }
}
?>