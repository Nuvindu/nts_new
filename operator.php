<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/operator-db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/user.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script> //to make a live search 
		function Suggest(str) {
		     if (str.length == 0) { 
		         document.getElementById("hint").innerHTML = "";	
		         document.getElementById("table").style.visibility = "visible";
		         //the whole table is visible when there is no input      
		         return;
		     } else {
		     	document.getElementById("table").style.visibility = "hidden";
		     	//the whole table is hidden when there is inputs
		         var xmlhttp = new XMLHttpRequest();
		         xmlhttp.onreadystatechange = function() {
		             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		                 document.getElementById("hint").innerHTML = xmlhttp.responseText;
		             }
		         }
		         xmlhttp.open("GET", "suggest.php?q="+str, true);
		         xmlhttp.send();
		     }
		}
	</script>
</head>
<body bgcolor="#b3ffff">
	
	<header>
		<div class="icon"><img src="img/home.ico" width="22" height="22"></div>
		<div class="top"><a href="index.php">Home</a></div>
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log Out</a> </div>
	</header>
	<div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; text-align: center;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
	<div class="add"><a href="add-user.php">Add New User &gt&gt</a> </br></div>
	<h1>Users</h1>
	<div class="search">
		<form action="operator.php">
			<input type="text" onkeyup="Suggest(this.value)" name="search" placeholder="Search by Username or Type" autofocus> <!-- live search input -->
			<a href="operator.php"><i class="fas fa-times-circle 5x"></i></a>
		</form>
		<span id="hint"></span>
	</div>
	<table class="masterlist" id = "table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Last Login</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php echo $user_list; ?>
</table>

	</table>
</body>
</html>
<?php mysqli_close($connection); ?>