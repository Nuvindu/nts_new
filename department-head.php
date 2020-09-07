<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/department-head-service.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Department Heads</title>
	<link rel="stylesheet" type="text/css" href="css/department-head.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="./style/style-header.css"> .css">
	<link rel="stylesheet" type="text/css" href="css/">
	<link rel="stylesheet" href="./style/style-header.css"> -->
</head>
<body>

<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>
        <div class="header">
        <?php include_once('header.php'); ?>
    </div>

	<br>
	<div class="back" style="float:right;padding-right: 35px;font-size: 18px;font-weight: bold;"><a href="operator.php"><i class="fas fa-angle-double-left fa-2x"></i></a></div>	
	<br><br>
	

		<center><h1>DEPARTMENT HEADS</h1></center>
        
		
	<div class="table-responsive" >
		<form action="department-head.php" method="post" class="userform">
			<table class="masterlist">
				<tr style="background-color:#e8fb22;">
					<th>Department</th>
					<th scope="col" colspan="2">Department Head</th>
				<?php echo $modules_list; ?>

				</tr>
				<td style="color: transparent;"></td><td colspan="2"><button class="submit" type="submit" name="submit">Save</button></td>
			</table>
		</form>
</div>

<script>
function myFunction() {
	var x = document.getElementById("dep1").value;  // get the value of the index when the user select from dropdown
	var tempArray = <?php echo json_encode($lecname); ?>; //get the php array as javascript array
	document.getElementById("names1").innerHTML = tempArray[x];  // show the fullname of the department head

	var x = document.getElementById("dep2").value;
	var tempArray = <?php echo json_encode($lecname); ?>;
	document.getElementById("names2").innerHTML = tempArray[x];

	var x = document.getElementById("dep3").value;
	var tempArray = <?php echo json_encode($lecname); ?>;
	document.getElementById("names3").innerHTML = tempArray[x];

	var x = document.getElementById("dep4").value;
	var tempArray = <?php echo json_encode($lecname); ?>;
	document.getElementById("names4").innerHTML = tempArray[x];

	var x = document.getElementById("dep5").value;
	var tempArray = <?php echo json_encode($lecname); ?>;
	document.getElementById("names5").innerHTML = tempArray[x];


}
</script>
</body>
</html>

