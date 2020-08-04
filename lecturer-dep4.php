<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/Lecturer-service.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" type="text/css" href="css/user-page.css">
    <link rel="stylesheet" href="./css/student.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student-profile.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
</head>
</head>

<body>

    <body>
        <span id="index-no" style="display: none;"><?php echo $_SESSION["index_no"]; ?></span>
        <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
                Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
        </div>
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>
        <?php include_once('navbar.php'); ?>
        <div class="wrapper">

            <div class="main_content">
                <div class="header">Tutoring Modules</div>



                <div id="courses">
                    <div class="gynecology background">
                        <?php $_SESSION['gynecology'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Gynecological Nursing & Gynecology</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['gynecology'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=gynecology">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

                    </div>
                    <div class="gynecologypractice background">
                        <?php $_SESSION['gynecologypractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Gynecological Nursing Practice</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['gynecologypractice'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=gynecologypractice">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

                    </div>
                    <div class="obstetric background">
                        <?php $_SESSION['obstetric'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Obstetric Nursing & Obstetric</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['obstetric'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=obstetric">
                                    <button class=" apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

                    </div>
                    <div class="obstetricpractice background">
                        <?php $_SESSION['obstetricpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Obstetric Nursing Practice</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['obstetricpractice'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=obstetricpractice">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

                    </div>
                    <div class="paediatric background">
                        <?php $_SESSION['paediatric'] = "This course is designed to give students in-depth knowledge in psychiatric practice. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Paediatric Nursing & Paediatric</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['paediatric'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=paediatric">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

                    </div>
                    <div class="psychiatricpractice background">
                        <?php $_SESSION['psychiatricpractice'] = "This course is designed to give students in-depth knowledge in psychiatric practice. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Paediatric Practice</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['psychiatricpractice'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=psychiatricpractice">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>


                        

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
        <div class="side-bar">
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
                <li><a href="notifications.php">
                    <?php 
                        if(isset($_SESSION['seen'])){echo '<i class="far fa-bell"></i>';}
                        else{echo '<i class="fas fa-bell"></i>';}
                    ?>
                    Notifications</a></li>
                <li><a href="lecturer-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
                <li><a href="go-to-results.php"><i class="fas fa-project-diagram"></i>Results</a></li>
                <li><a href="add_exam_timetables.php" id="timetable"><i class="fas fa-book"></i>Exam
                        Timetables</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>Hostel Info</a></li>
            </ul>
        </div> <!-- side-bar -->

        <script>
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: '/nts_new/Model/db_load_profilePicture.php',
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