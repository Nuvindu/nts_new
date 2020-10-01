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
    <script src="./js/upload.js"></script>
    <link rel="stylesheet" type="text/css" href="css/xl.css">


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
        <div class="distribute" style="float:left;" ><a href="add_modules_details.php">Add Modules</a></div>
        <div class="distribute" style="float:left;"><a href="department-head.php">Department Head</a></div>
        <div class="distribute" style="float:left;"><a href="UploadPhotos.php">Update Gallery</a></div>
        <div class="distribute" style="float:right;" id="xlsheet-upload"><a href="resultUploadXlSheet.php">Upload
                Result(excel)</a> </br></div>
        <?php include "dropdown.php" ?>

        <!-- <div class="add"></br></div> -->
        <!-- <a href="add_users_excel-mvc.php">Add User Excel</a>  -->
        <div class="distribute2"><a href="distributemail.php">Send Notifications</a> </br></div>
        <?php include "dropdown-adduser.php" ?>
        <br>
        <h1><!-- Users --></h1>
        <div class="search">
            <form action="operator.php">
                <input type="text" onkeyup="Suggest(this.value)" name="search" placeholder="Search by Username or Type"
                    autofocus> <!-- live search input -->
                <a href="operator.php"><i class="fas fa-times-circle 5x"></i></a>
            </form>
            <span id="hint"></span>
        </div>
        <div class="table-responsive" >
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

       </div>

       <div id="model_result_xl_sheet_upload" style="display:none;">
            <div id="wrap-form">
                <span id="close">x</span>
                <div class="form">

                    <div class="input-field">
                        <input type="file" name="input-file" id="input-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        <button id="save-file">Save</button>
                    </div>
                    <span id="uploadStatus">

                        <div class="progressbar"></div>
                    </span>
                    <span class="import-status-uploading" id="import-status-uploading">
                    </span>
                </div>
            </div>
        </div>
</body>
<script>
    document.getElementById("xlsheet-upload").addEventListener("click", function() {
        document.getElementById("model_result_xl_sheet_upload").style.display = 'flex';
    });
    document.getElementById("close").addEventListener("click", function() {
        document.getElementById("model_result_xl_sheet_upload").style.display = 'none';
    });
</script>
<footer>
    <div class="column clearfix" style="padding-top:5%;padding-left:0;">
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
