<?php require_once('inc/dbconnection.php'); ?>
<?php
//index.php

$query = "SELECT * FROM students ORDER BY index_no ASC";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delete Students</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>
 </head>
 <body style="background-color:rgb(218, 213, 213);">
  <div class="container">
   <br />
   <h3 align="center">Delete Students</h3>
   <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success" style="background-color:black;float:left;">Delete</button><br>
   <div class="add" style="float:right;"><a href="operator.php" style="color:black;">&nbsp&nbsp  Back &gt&gt</a> </div><br>
   <br>
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive">
    <table class="table table-bordered table-striped" >
    
     <tr style="background-color:rgb(133, 128, 128);">
     <th>Select</th>
      <th>Index_number</th>
      <th>Year</th>
      
     </tr>
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["index_no"]; ?>" >
     <td><input type="checkbox" name="index_no[]" class="delete_customer" value="<?php echo $row["index_no"]; ?>" /></td>
      <td><?php echo $row["index_no"]; ?></td>
      <td><?php echo $row["year"]; ?></td>
      
     </tr>
   <?php
    }
   ?>
   
    </table>
   </div>
   <?php
   }
   ?>
   <div align="center">
    
   </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#4CAF50');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>