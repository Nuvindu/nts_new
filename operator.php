<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/operator-db.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/view-exam-timeTables.css"> -->
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    //to make a live search 
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
            xmlhttp.open("GET", "suggest.php?q=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
</head>

<body>

    <header>       
        <div class="logger" style="padding-top: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
                href="Service/logout.php">Log Out</a> </div>
    </header>
    <div class="container">

        <!-- header -->
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>

        <?php include "dropdown.php" ?>

        <div class="add"><a href="add-user-responsive.php">Add New User</a> </br></div>
        <div class="distribute" style="padding-bottom: 16px;padding-top: 16px;"><a href="distributemail.php">Send Notifications</a> </br></div>
        <h1>Users</h1>
        <div class="search">
            <form action="operator.php">
                <input type="text" onkeyup="Suggest(this.value)" name="search" placeholder="Search by Username or Type"
                    autofocus> <!-- live search input -->
                <a href="operator.php"><i class="fas fa-times-circle 5x"></i></a>
            </form>
            <span id="hint"></span>
        </div>
        <table class="masterlist" id="table">
            <tr>
                <th>Index Number</th>
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
</html>
<?php mysqli_close($connection); ?>
