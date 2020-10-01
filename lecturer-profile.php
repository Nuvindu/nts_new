<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/lecturer-profile-db.php'); ?>
<?php
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/lecturer-profile.css">
    <link rel="stylesheet" href="./css/notificationbar.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
</head>

<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a><span
            id="index-no" style="display: none;"> </div>
    <div class="container">

        <!-- header -->
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>

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
                            } else if (strlen($_SESSION['index_no']) == 7) {
                                echo "Model/student-db.php";
                            } ?>><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exam TimeTables</a></li>
                <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
                <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
            </ul>
        </div>





        <!-- navbaricon -->
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
                            } else if (strlen($_SESSION['index_no']) == 7) {
                                echo "Model/student-db.php";
                            } ?>><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="notifications.php"><?php
                                                if (isset($_SESSION['seen'])) {
                                                    echo '<i class="far fa-bell"></i>';
                                                } else {
                                                    echo '<i class="fas fa-bell"></i>';
                                                }
                                                ?>Notifications</a></li>
                <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exams</a></li>
                <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
                <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
            </ul>
        </div>

        <!-- info-tab -->
        <div class="info-tab" id="info-tab">
            <!-- navigation tab -->
            <div class="tab">
                <button class="tablink active" onclick="showContent(event,'profile-tab')">Info</button>
                <button class="tablink" onclick="showContent(event,'courses-tab')">Courses</button>
            </div>
            <div class="tab-wrapper">
                <!-- profile information tab -->
                <div id="profile-tab" class="tabContent" style="display: flex;flex-wrap: wrap;">
                    <h1 class="heading">Profile information</h1>
                    <div class="profile-img profile-img-mobile">
                        <div style="
    height: 145px;
    top: 24px;
    position: relative;
">
                            <div style="
    height: 145px;
    width: 145px;
    z-index: 1;
    background-color: #0a0e104f;
    position: relative;
    text-align: center;
    /* align-items: center; */
    /* align-content: center; */
    top: -32px;
">
                                <img id="change-pp" src="./img/camera.png" style="
    height: 50px;
    top: 56px;
    position: relative;
">
                            </div>

                            <img src="./img/empty-pp.png" alt="profile-picture" style="
                        height: 143px;
                        width: 145px;
                        padding: 0;
                        position: relative;
                        bottom: 175px;
                    " class="profile-pic">
                        </div>



                    </div>
                    <div class="profile-info">
                        <div style="display: flex;width: 100%;"><img src="./img/name.png" alt=""
                                style="height: 20px;top: 8px;position: relative;"><span class="info"
                                id="name-html"></span></div>
                        <div style="display: flex;width: 100%;"><img src="./img/staff.png" alt=""
                                style="height: 20px;top: 8px;position: relative;"><span class="info"
                                id="NIC-html"></span></div>
                        <div style="display: flex;width: 100%;"><img src="./img/license.png" alt=""
                                style="height: 20px;top: 8px;position: relative;"><span class="info"
                                id="id-html"><?php echo $_SESSION['index_no']; ?></span></div>
                        <div style="display: flex;width: 100%;"><img src="./img/mail.png" alt=""
                                style="height: 20px;top: 8px;position: relative;"><span class="info"
                                id="email-html"></span></div>


                        <!-- change profile info -->
                        <button class="change-btn" id="change-Info">change info</button>


                        <button class="change-btn" id="change-password">change
                            password</button>

                    </div>

                </div>
                <!-- courses information tab -->
                <div id="courses-tab" class="tabContent" style="display: none;">
                    <div style="
    width: 100%;
">
                        <h1 class="heading">Lecturing Modules</h1>
                        <?php foreach ($record as $rec) {
                            echo $rec[1];
                            echo "<br>";
                        } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- change profile picture -->

    <!-- <button class="change-btn" id="change-pp">change</button> -->

    <div id="modal-pp" class="modal">
        <!-- modalpp content -->

        <div class="modal-content" style="display: block;">
            <button style="width: 28px;height: 18px;background: red;color: white;border: none;"
                onclick="document.getElementById('modal-pp').style.display='none';" class="close-confirm-modal"
                title="Close Modal" style="float: right;">X</button>
            <form action="" method="post" enctype="multipart/form-data" id="myform">
                Enter image file here(.jpg,.jpeg,.png):
                <input type="file" name="image-file" id="image-file" accept=".jpg,.jpeg,.png">
                <button class="change-btn" id="save-img">Save</button>
            </form>


        </div>

    </div>
    <!-- change profile info -->
    <div id="modal-Info" class="modal">
        <!-- modalinfo content -->
        <div class="modal-content">
            <button style="width: 28px;height: 18px;background: red;color: white;border: none;"
                onclick="document.getElementById('modal-Info').style.display='none';" class="close-confirm-modal"
                title="Close Modal" style="float: right;">X</button>
            <div class="info">
                First Name : <input type="text" id="name" value="" required>
                Last Name : <input type="text" id="lname" value="" required>
                NIC : <input type="text" id="NIC" value="" required>
                email : <input type="email" id="email" value="" required>
            </div>
            <button class="change-btn" type="submit" id="save" style="width: 100%;margin:20px 0px;">save</button>
        </div>
    </div>
    <!-- modal for change password -->
    <div id="modal-password" class="modal">
        <!-- modalinfo content -->
        <div class="modal-content" style="display: block;">
            <button style="width: 28px;height: 18px;background: red;color: white;border: none;"
                onclick="document.getElementById('modal-password').style.display='none';" class="close-confirm-modal"
                title="Close Modal" style="float: right;">X</button>
            <div class="password-reset-content" id="password-reset">
                <label class="lable" for="password" style="color:black">Current Password</label>
                <input id="current_password" name="password" type="password">
                <br>
                <label class="lable" for="password" style="color:black;">New Password</label>
                <input id="new_password" name="newpassword" type="password">
                <span id="error" class="error">include 8
                    characters,at lest one highercase letter,at least onelowercase letter and at
                    least one special character</span><br>
                <label class="lable" for="confirmpassword" style="color:black;">Confirm
                    Password</label>
                <input id="reent_new_password" name="confirmpassword" type="password">
                <button class="change-btn" id="reset-abort" style="width: 100%;margin: 20px 0px;"
                    onclick="document.getElementById('modal-password').style.display='none';">Cancel</button>
                <button class="change-btn" id="change_pass" style="width: 100%;margin: 20px 0px;">Confirm</button>
            </div>

        </div>

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

    <script src="./js/js-student-profile-sidebar.js"></script>
    <script src="./js/js-student-profile-modals.js"></script>
    <script src="./js/js-student-profile-updateInfo.js"></script>
    <script src="./js/js-student-profile-updateAvatar.js"></script>
    <script src="./js/js-student-profile-changePassword.js"></script>
    <script src="./js/js-notify-counter.js"></script>

</body>

</html>