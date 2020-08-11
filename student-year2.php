<?php require_once('Service/student-service.php'); ?>
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
    <link rel="stylesheet" href="./css/student-profile.css">
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
        <?php include_once('header.php'); ?>
    </div>
    <!-- navbar -->
    <?php include_once('navbar.php'); ?>
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
                    if (isset($_SESSION['seen'])) {
                        echo '<i class="far fa-bell"></i>';
                    } else {
                        echo '<i class="fas fa-bell"></i>';
                    }
                    ?><span class="num numberCircle" style=<?php if (!isset($_SESSION['count'])) {
                                                            echo "display:none;";
                                                        } ?>><?php echo $_SESSION["count"]; ?></span>Notifications</a>
            </li>
            <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="view-exam-timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="view-results.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div> <!-- side-bar -->
    <div class="wrapper">

        <div class="main_content">
            <div class="header">Semester Modules</div>



            <div id="courses">
                <div class="firstaidpractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>First Aid Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['firstaidpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['firstaidpractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=firstaidpractice">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="gynecology background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Gynecological Nursing & Gynecology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['gynecology'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['gynecology'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=gynecology">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="gynecologypractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Gynecological Nursing Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['gynecologypractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['gynecologypractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=gynecologypractice">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>

                <div class="medicalpractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Medical Nursing Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['medicalpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>

                            <p>
                                <?php echo $_SESSION['medicalpractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=medicalpractice">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>



                </div>
                <div class="obstetric background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Obstetric Nursing & Obstetric</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['obstetric'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['obstetric'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=obstetric">
                                <button class=" apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="obstetricpractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Obstetric Nursing Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['obstetricpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['obstetricpractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=obstetricpractice">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="paediatric background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Paediatric Nursing & Paediatric</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['paediatric'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['paediatric'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=paediatric">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="paediatricpractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Paediatric Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['paediatricpractice'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['paediatricpractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=paediatricpractice">
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
</body>

</html>