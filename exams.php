<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Exams</title>
    <link rel="stylesheet" type="text/css" href="css/exams.css">
    <link rel="stylesheet" href="./style/style-header.css">
</head>

<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
    <div class="header">
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>
    </div>
    <div class="back">
        <div class="section">
            <h2>Exam Time Tables</h2>
        </div>
        <div id="courses">
            <div class="year1">
                <center>
                    <h1>First Year </h1>
                </center>
                <h2>First Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="view-exam-timeTableY1T1.php"><button class="view ">View exam time table</button></a>
                <h2>Second Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
                <h2>Third Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
            </div>
            <div class="year2 ">
                <center>
                    <h1>Second Year </h1>
                </center>
                <h2>First Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
                <h2>Second Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
                <h2>Third Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
            </div>
            <div class="year3">
                <center>
                    <h1>Third Year </h1>
                </center>
                <h2>First Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
                <h2>Second Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
                <h2>Third Term </h2>
                <img src="img/hea.jfif" width="15%" alt="results">

                <a href="#"><button class="view ">View exam time table</button></a>
            </div>
        </div>
    </div>
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
</body>

</html>
<?php mysqli_close($connection); ?>