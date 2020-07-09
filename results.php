<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php include_once('Model/dbResults.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Add/Modify Results</title>
	<link rel="stylesheet" href="./style/style-header.css">
	<link rel="stylesheet" type="text/css" href="css/results.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<header>

	<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
	<div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php">
                    <img class="logo" src="./img/logo-0.png" alt="logo">
                    </a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
	</header>
	<div class="middle">
	<div class="dash"><span><a href="lecturer.php"><< Back to Dashboard</a></span> </div>
	<main>

	<h1><?php echo $module; ?> Results <div class="change"><span><a href="go-to-results.php"> Change Module</a></span></div></h1>
	<!-- <div class="search">
		<form action="results.php">
			<input type="text" name="search" placeholder="Search by username" autofocus> live search input
			<a href="results.php"><i class="fas fa-times-circle 5x"></i></a>
		</form>
		<span id="hint"></span>
	</div> -->
	<table class="masterlist" id = "table">
		<tr>
			<th>Index Number</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Grade/Marks</th>
			<th>Edit</th>
		</tr>

		<?php echo $user_list; ?>

	</table>
	
	<footer>
            <div class="column clearfix">
            <h3>Contact Us</h3>
            <ul>
                <div class="icon1"><img src="img/location.ico" width="22" height="22"></div>
                <li>Nurses Training School, Mahamodara, Galle, Sri Lanka</li>
                <div class="icon1"><img src="img/at.ico" width="20" height="20"></div>
                <li>Email - nts-galle@gov.lk</li>
                <div class="icon1"><img src="img/tele.ico" width="20" height="20"></div>
                <li>Telephone Number - 0912234452</li>
            </ul>
            </div>
        </footer>
        </div>
        </div>
	</main>



</body>
</html>

<?php mysqli_close($connection); ?>
