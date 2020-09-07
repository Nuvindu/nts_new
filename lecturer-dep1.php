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
                    <div class="pharmacologyI background">
                        <?php $_SESSION['pharmacologyI'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Pharmacology I</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['pharmacologyI'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=pharmacologyI">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="pharmacologyII background">
                        <?php $_SESSION['pharmacologyII'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Pharmacology II</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['pharmacologyII'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=pharmacologyII">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="nutrition background">
                        <?php $_SESSION['nutrition'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Nutrition</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['nutrition'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=nutrition">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="firstaid background">
                        <?php $_SESSION['firstaid'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>First Aid</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['firstaid'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=firstaid">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="firstaidpractice background">
                        <?php $_SESSION['firstaidpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>First Aid Practice</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['firstaidpractice'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=firstaidpractice">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="fundamentalofnursing background">
                        <?php $_SESSION['fundamentalofnursing'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Fundamental of Nursing</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['fundamentalofnursing'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=fundamentalofnursing">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="fundamentalofnursingpractice background">
                        <?php $_SESSION['fundamentalofnursingpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Fundamental of Nursing Practice</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['fundamentalofnursingpractice'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=fundamentalofnursingpractice">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="psychiatry background">
                        <?php $_SESSION['psychiatry'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Mental Health & Psychiatric Nursing</h3>
                            </div>
                            <div class="para">
                                <p>
                                    <?php echo $_SESSION['psychiatry'] ?>
                                </p>
                            </div>
                            <div class="link">
                                <a href="module.php?moduleName=psychiatry">
                                    <button class="apply">
                                        <img id="arrow-icon"
                                            src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                    </button>
                                </a>
                            </div>
                        </div>




                    </div>
                    <div class="psychiatricpractice background">
                        <?php $_SESSION['psychiatricpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                        <div class="fix">
                            <div class="heading">
                                <h3>Mental Health & Psychiatric Nursing Practice</h3>
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
                <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
                <li><a href="lecturer-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="add_exam_timetables.php" id="timetable"><i class="fas fa-table"></i>Exam Timetables</a></li>
                <li><a href="go-to-results.php"><i class="fas fa-poll"></i>Results</a></li>
                <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
            </ul>
        </div> <!-- side-bar -->
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
        <script src="./js/js-notify-counter.js"></script>
    </body>

</html>
<?php mysqli_close($connection); ?>