<?php session_start(); ?>
<?php include_once('Service/add-user-service.php'); ?>
<?php require_once('inc/functions.php'); ?>
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
    <div class="container box" style="width: 90%;">
    <h3 align="center">Add Users via Excel</h3><br />
    <form method="post" enctype="multipart/form-data">
    <label>Select Excel File</label>
    <input type="file" name="excel" />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Import" />
    
   </form>
  
  

  
   <table class="table table-bordered table-striped">
	 <thead style="background-color:rgb(133, 128, 128);">
      <th width="5%">Index Number</th>
  		<th width="5%">First Name</th>
  		<th width="5%">Last Name</th>
      <th width="5%">NIC</th>
      <th width="5%">Email</th>
		
	</thead>
  <tbody>
    <?php 
    global $output;
    echo $output; ?>
</tbody>
</table>
</div>


  </div>
 </body>
</html>