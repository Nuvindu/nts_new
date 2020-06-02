<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php 
	if (!isset($_SESSION['user_id'])){
		header('Location: login.php');
	}
	if (strlen($_SESSION['index_no']) != 2) {
		header('Location: index.php');
	}
	//if ($_SESSION['admin']!=1){
	//	header('Location: user-page.php');
	//}
	$user_list = '';
	$search = '';
	$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY id";

	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['last_login']}</td>";
		$user_list .= "<td>{$user['type']}</td>";
		$user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
		$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\">Delete</a></td>";
		$user_list .= "</tr>";
		$last_id = $user['id']+1;
	}


 ?>
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
		<div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
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
	<div class="add"><a href="add-user.php?last_id=<?php echo($last_id) ?>">Add New User &gt&gt</a> </br></div>
	<h1>Users</h1>
	<div class="search">
		<form action="operator.php">
			<input type="text" onkeyup="Suggest(this.value)" name="search" placeholder="Search by username" autofocus> <!-- live search input -->
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