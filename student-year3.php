<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" type="text/css" href="css/user-page.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
</head>
<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>
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
            <div>
                <a href="student-profile.php"><img class="logo profile-pic" src="" alt="logo" id="profile-pic"
                        style="border-radius: 100px;"></a>
            </div>
        </div>
    </div>

<div class="wrapper">
        
    <div class="main_content">
        <div class="header">Semester Modules</div> 
    	<div class="side-bar" >
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
                <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="view-exam-timetables.php"><i class="fa fa-graduation-cap"></i>Exam Timetables</a></li>
                <li><a href="view-results.php"><i class="fas fa-address-card"></i>Results</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>Hostel Info</a></li>
                <li><a href="#"><i class="fas fa-map-pin"></i>Student Details</a></li>
            </ul>
        </div> <!-- side-bar -->


        <div id="courses">
            <div class="psychiatry">
                <br><br>
                <h3>Mental Health & Psychiatric Nursing</h3>
                <a href="module.php?moduleName=psychiatry"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['psychiatry'] = "This course is designed to give students in-depth knowledge in psychiatry. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['psychiatry'] ?></p>
            </div>
            <div class="psychiatricpractice">
                <br><br>
                <h3> Mental Health & Psychiatric Nursing Practice</h3>
                <a href="module.php?moduleName=psychiatricpractice"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['psychiatricpractice'] = "This course is designed to give students in-depth knowledge in psychiatric practice. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['psychiatricpractice'] ?></p>
                
            </div>
            <div class="wardmanagement">
                <br><br>
                <h3>Ward Management</h3>
                <a href="module.php?moduleName=wardmanagement"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['wardmanagement'] = "This course is designed to give students in-depth knowledge in ward management. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['wardmanagement'] ?></p>
               
            </div>
            <div class="wardmanagementpractice">
                <br><br>
                <h3>Ward Management Practice</h3>
                <a href="module.php?moduleName=wardmanagementpractice"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['wardmanagementpractice'] = "This course is designed to give students in-depth knowledge in ward management practice. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['wardmanagementpractice'] ?></p>
               
            </div>
            <div class="research">
                <br><br>
                <h3>Research in Nursing</h3>
                <a href="module.php?moduleName=research"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['research'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['research'] ?></p>
                
            </div>
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
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: '/nts/dbOperations/db_load_profilePicture.php',
            data: {
                // send this variable to server to identify user to database manipulate
                UserSessionName: document.getElementById('index-no').textContent
            },
            dataType: 'JSON',
            success: function(data) {
                var profPicDir = data[0];
                if (profPicDir == '') {
                    // $('img').attr('src', './img/empty-pp.png');
                    document.getElementById('profile-pic').setAttribute('src',
                        './img/empty-pp.png');
                } else {

                    document.getElementById('profile-pic').setAttribute('src',
                        './profile-pictures/' + profPicDir);

                }
            }
        });


    })
    </script>
</body>
</html>
<?php mysqli_close($connection); ?>


