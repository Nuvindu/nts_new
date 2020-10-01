<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/operator-service.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php

$outputYears = '';
if(isset($_POST["import"]))
{
 $file = explode(".", $_FILES["excel"]["name"]);
 $extension=end($file); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
 
 $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $outputYears .= "<label class='text-success'>Data Inserted</label><br />";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $outputYears .= "<tr>";
    $index_no = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $year = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
   
   
    
    
   // $query = "update students set (index_no, year) VALUES ('".$index_no."','".$year."')";
   $query = "UPDATE students SET ";
   
   $query .= "index_no = '".$index_no."', ";			
   $query .= "year = '".$year."' ";
   $query .= "WHERE index_no = '".$index_no."'";

    $result = mysqli_query($connection,$query);
    $outputYears .= '<td>'.$index_no.'</td>';
    $outputYears .= '<td>'.$year.'</td>';
  
    $outputYears .= '</tr>';}

   }	
}	
 else
 {
  $outputYears = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>Import Excel Students Sheet to Mysql</title>
  
  <link rel="stylesheet" href="./style/style-header.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
  


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:70%;
   border:1px solid black;
   background-color:#fff;
   border-radius:5px;
   margin-top:100px;
  }
  
  </style>
 </head>
 <body>
 <header>
<!-- 	<div class="back" style="float:right;"><a href="operator.php">&gt&gtBack</a></div>
    <div class="icon"><img src="img/home.ico" width="22" height="22"><a href="index.php">Home</a></div> -->    
        <div class="logger" style="padding-top: 5px;float: right;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
                href="Service/logout.php">Log Out</a> </div>  
               
    </header>
   	<br>
   	<br>
	<!-- header -->
 <div class="header">
            <?php include_once('header.php'); ?>

    </div>
    <div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>


  <div class="container box">
   <h3 align="center">Modify Years via Excel</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel Students File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
    
   </form>
   <br />
   <br />
  

  
   <!-- <div class="table-responsive" > -->
   <table class="table table-bordered table-striped">
	 <thead style="background-color:rgb(133, 128, 128);">

	
        <th width="30%">Index Number</th>
		<th  width="10%">Year</th>
		
	</thead>
<tbody>
	<?php echo $outputYears; ?>
</tbody>
</table>
<!-- </div> -->


  </div>
 </body>
</html>