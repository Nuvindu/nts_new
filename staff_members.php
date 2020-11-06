<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/staff_members-db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Staff Members</title>
	<link rel="stylesheet" type="text/css" href="css/staff-members.css">
    <link rel="stylesheet" href="./css/front-style.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

</head>
<body>
    <?php if(isset($_SESSION['first_name'])){
        echo '<div class="logger">Welcome ';
        echo $_SESSION["first_name"];
        echo '!&nbsp <a href="Service/logout.php">Log
                    Out</a><span id="index-no" style="display: none;">';
        echo $_SESSION["index_no"];
        echo '</span></div>';
    } ?>
    <section id="header">
        <div class="header container" style="background-color:yellow;">
            <div class="logo" style="float:left;width: 688px;
    height: 211px;padding-left:20px;">
                <img src="./img/web/ntslogopng.png" alt="Logo" style="width:35%;">
            </div>
            <div class="nav-bar">

                <div class="brand">
                    <!-- <a href="#home"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool </h1></a> -->
                    <br>
                    <div class="name">


                    </div>

                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a style="font-size: 20px;" href="index.php" data-after="Home" onclick="topFunction()"><b>Home</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#about" data-after="About"><b>About</b></a></li>                 
                        <li><a style="font-size: 20px;" href="" data-after="Departments"><b>Departments</b></a></li>
                        <li><a style="font-size: 20px;" href="gallery.php" data-after="Gallery"><b>Gallery</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#contact" data-after="Contact"><b>Contact</b></a></li>
                        <li><a style="font-size: 20px;" href="login.php" data-after="Login"><b>Login</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="wrapper">
    <?php if(isset($_SESSION['first_name'])){
        echo '<div class="logger">Welcome ';
        echo $_SESSION["first_name"];
        echo '!&nbsp <a href="Service/logout.php">Log Out</a><span id="index-no" style="display: none;">';
        echo $_SESSION["index_no"];
        echo '</span></div>';
    } ?>
    <div class="tiles">
			 <?php echo $user_list; ?>
    </div> <!-- tiles -->
    </div> <!-- wrapper -->

    <script src="js/frontPage.js"></script> 
</body>
</html>