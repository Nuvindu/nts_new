<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/operator-service.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php

$output = '';
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

  $output .= "<label class='text-success'>Data Inserted</label><br />";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    $index_no = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $type = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $first_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $last_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $NIC = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $batch = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $email = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    if (strlen($index_no) == 6) {
    $hashed_password = password_hash("password", PASSWORD_BCRYPT, array('cost'=>14));}
    if (strlen($index_no) == 4) {
      $hashed_password = password_hash("password", PASSWORD_BCRYPT, array('cost'=>14));}
		
    echo $index_no,$type,$first_name,$last_name,$NIC,$batch,$email;
    return;
    
    $query = "INSERT INTO user (first_name, last_name, NIC, index_no, type, email, password, batch, is_deleted) VALUES ('".$first_name."','".$last_name."','".$NIC."','".$index_no."','".$type."', '".$email."','".$hashed_password."','".$batch."',0)";

    $result = mysqli_query($connection,$query);
    $output .= '<td>'.$index_no.'</td>';
    $output .= '<td>'.$first_name.'</td>';
    $output .= '<td>'.$last_name.'</td>';
    $output .= '<td>'.$NIC.'</td>';
    $output .= '<td>'.$email.'</td>';

    $output .= '</tr>';

		if ($result){
			// check if a student 
		
			if (strlen($index_no) == 6) {
        //return new Lecturer($first_name, $last_name, $nic, $email, $password, $index_no);
				// create record in the result table
				$query = "INSERT INTO result (index_no, first_name, last_name, batch, 1Y01, 1Y02, 1Y03, 1Y04, 1Y05, 1Y06, 1Y07, 2Y01, 2Y02, 3Y01, 3Y02, 3Y03, 3Y04, 3Y05, is_deleted) VALUES ('".$index_no."','".$first_name."' , '".$last_name."', '".$batch."','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null','Null', 0)";
				$result = mysqli_query($connection, $query);

				if ($result) {
					$update = mysqli_query($connection,"INSERT INTO students (index_no,year) VALUES ('".$index_no."','1')");
					/*if($update){
						// query successful... redirecting to users page
						header('Location: add-user-responsive.php?user_added=true&result_created=true&student_added=true');}
					else{
						header('Location: add-user-responsive.php?user_added=true&result_created=true');
					}
				} else {
					die("Database query failed: ".mysqli_error($connection));
					header('Location: add-user-responsive.php?user_added=true&result_created=false');
				}*/
      } 
    }
			else if(strlen($index_no) == 4){
				$update = mysqli_query($connection,"INSERT INTO lecturers (index_no,department) VALUES ('".$index_no."','1')");
				/*if($update){
					// query successful... redirecting to users page
					header('Location: add-user-responsive.php?user_added=true&lecturer_added=true');
				}
				else{
					header('Location: add-user-responsive.php?user_added=true');
				}*/
			}
			
    }
	
    
   }
  } 
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>

<html>
 <head>
  <title>Import Excel User Sheet to Mysql</title>
  
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
   width:700px;
   border:1px solid #ccc;
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
    <div class="table-responsive" >    
  <div class="container box">
   <h3 align="center">Newly Added Excel Users</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
    
   </form>
   <br />
   <br />
  

  
<table class="table table-bordered">
	<tr>
        <th width="5%">Index Number</th>
		<th width="8%">NIC </th>
		<th width="10%">Email </th>
		
	</tr>

	<?php echo $output; ?>

</table>
</div>


  </div>
 </body>
</html>