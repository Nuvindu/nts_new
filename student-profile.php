<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/student-profile-db.php'); ?>
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
    <link rel="stylesheet" href="./css/student-profile.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
</head>

<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
    <div class="container">

        <!-- header -->
        <div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
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

                <li><a href=<?php if (strlen($_SESSION['index_no'])==4) {echo "lecturer.php";} else if(strlen($_SESSION['index_no'])==6){echo "student.php";}?> ><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="exams.php"><i class="fas fa-project-diagram"></i>Exams</a></li>
                <li><a href="view-results.php"><i class="fas fa-address-card"></i>Results</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-map-pin"></i>Student Details</a></li>
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
                    <div class="profile-img">
                        <img src="" alt="profile-picture" style="
                        height: 145px;
                        width: 145px;
                        padding:13px;
                    " id="profile-pic">
                        <!-- change profile picture -->

                        <button class="change-btn" id="change-pp">change</button>

                        <div id="modal-pp" class="modal">
                            <!-- modalpp content -->

                            <div class="modal-content" style="display: block;">
                                <form action="" method="post" enctype="multipart/form-data" id="myform">
                                    Enter image file here(.jpg,.jpeg,.png):
                                    <input type="file" name="image-file" id="image-file" accept=".jpg,.jpeg,.png">
                                    <button class="change-btn" id="save-img">Save</button>
                                </form>


                            </div>

                        </div>


                    </div>
                    <div class="profile-info">
                        <span id="name-html"></span>
                        <span id="NIC-html"></span>
                        <span id="id-html"><?php echo $_SESSION['index_no']; ?></span>
                        <span id="email-html"></span>


                        <!-- change profile info -->
                        <button class="change-btn" id="change-Info">change Info</button>
                        <div id="modal-Info" class="modal">
                            <!-- modalinfo content -->
                            <div class="modal-content">
                                <div class="info">
                                    Name : <input type="text" id="name" value="" required>
                                    NIC : <input type="text" id="NIC" value="" required>
                                    email : <input type="email" id="email" value="" required>
                                </div>
                                <button class="change-btn" type="submit" id="save"
                                    style="width: 100%;margin:20px 0px;">save</button>
                            </div>
                        </div>

                        <button class="change-btn" id="change-password">Change
                            password</button>
                        <!-- modal for change password -->
                        <div id="modal-password" class="modal">
                            <!-- modalinfo content -->
                            <div class="modal-content" style="display: block;">
                                <div class="password-reset-content" id="password-reset">
                                    <label class="lable" for="password" style="color:black">Current Password</label>
                                    <input id="current_password" name="password" type="password">
                                    <label class="lable" for="password" style="color:black;">New Password</label>
                                    <input id="new_password" name="newpassword" type="password">
                                    <span id="error" class="error">include 8
                                        characters,at lest one highercase letter,at least onelowercase letter and at
                                        least one special character</span><br>
                                    <label class="lable" for="confirmpassword" style="color:black;">Confirm
                                        Password</label>
                                    <input id="reent_new_password" name="confirmpassword" type="password">
                                    <button class="change-btn" id="password-reset-abort"
                                        style="width: 100%;margin: 20px 0px;">Cancel</button>
                                    <button class="change-btn" id="change_pass"
                                        style="width: 100%;margin: 20px 0px;">Confirm</button>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- courses information tab -->
                <div id="courses-tab" class="tabContent" style="display: none;">
                    <div>
                        <h1 class="heading">Enrolled Courses</h1>
                        <?php foreach ($record as $rec) {
                            echo $rec[1];
                            echo "<br>";
                        } ?>
                    </div>
                     
                    
                </div>

            </div>
        </div>
    </div>
    <footer style="
    margin-left: 80px;
    margin-right: 8px;
" id="footer">
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


</body>

</html>