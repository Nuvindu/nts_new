<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/module.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="./style/style-header.css">
    <script src="./js/jquery-3.3.1.js"></script>
</head>

<body>
    <div class="logger" style="float: right;padding-right: 5px;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
            href="logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span> </div>

    <br>
    <!-- sidebar -->
    <div class="side-bar" onmouseover="resizeInfoAreaUp()" onmouseout="resizeInfoAreaDown()">
        <span style="
                                    text-align: center;
                                    margin: 0;
                                    height: 50px;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;
                                    /* padding-left: 11px; */
                                "><i class="fas fa-align-justify" aria-hidden="true" style="
                    padding-left: 17px;
                "></i></span>
        <ul>

            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "Model/lecturer-db.php";
                        } else if (strlen($_SESSION['index_no']) == 6) {
                            echo "Model/student-db.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php">
                    <?php
                    if (isset($_SESSION['seen'])) {
                        echo '<i class="far fa-bell"></i>';
                    } else {
                        echo '<i class="fas fa-bell"></i>';
                    }
                    ?>
                    Notifications</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exams</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div>


    <?php
    $url_components = parse_url($_SERVER['REQUEST_URI']);

    // Use parse_str() function to parse the 
    // string passed via URL 
    parse_str($url_components['query'], $params);
    if (isset($_SESSION[$params['moduleName']])) {
    } else {
        header('Location:404.php');
    }
    ?>
    <!-- header -->
    <div class="header">
        <?php include_once('header.php'); ?>
    </div>


    <script>
    function myFunction() {
        if (document.getElementById('navbar').className == 'navbar') {
            document.getElementById('navbar').className = 'navactive';
        } else {
            document.getElementById('navbar').className = 'navbar';
        }
    }
    </script>
    <div class="navbar-icon" onclick="myFunction()">
        <img src="./img/menu-icon-removebg.png" alt="menu-icon" srcset="">
    </div>
    <!-- navbar -->
    <div class="navbar" id="navbar">
        <ul>
            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "Model/lecturer-db.php";
                        } else if (strlen($_SESSION['index_no']) == 6) {
                            echo "Model/student-db.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exams</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div>

    <div class="card" id="info-area" style="padding-bottom: 258px;">
        <!-- module description -->
        <h3 id="name"><?php // Display result 
                        echo $params['moduleName']
                        ?>
        </h3>
        <p style="margin: 20px;border: 1px solid;padding: 15px;border-radius: 15px;">
            <?php echo $_SESSION[$params['moduleName']]; ?></p>


        <table id="file-table" style="width: 85%;">
            <tr>
                <th>Module materials</th>
            </tr>
        </table>
    </div>


    <footer id="footer">
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
    <script src="./js/js-modulepage-upload&retrievefile.js"></script>
    <script>
    function resizeInfoAreaUp() {
        $("#info-area").css("margin-left", "199px");
        // document.getElementById('info-area').style.marginLeft = '199px';
        $("#footer").css("margin-left", "199px");

        // document.getElementById('footer').style.marginLeft = '180px';
    }

    function resizeInfoAreaDown() {
        $("#info-area").css("margin-left", "70px");
        // document.getElementById('info-area').style.marginLeft = '70px';
        $("#footer").css("margin-left", "80px");

        // document.getElementById('').style.marginLeft = '80px';
    }
    </script>
</body>

</html>