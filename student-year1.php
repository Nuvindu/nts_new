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
            <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
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
                <div class="english background">
                    <div class="fix">
                        <div class="heading">
                            <h3>English</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['english'] = "This course is designed to give students in-depth knowledge in english. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['english'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=english">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="psychology background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Psychology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['psychology'] = "This course is designed to give students in-depth knowledge in psychology. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['psychology'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=psychology">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="sociology background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Sociology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['sociology'] = "This course is designed to give students in-depth knowledge in sociology. There will be concurrent practical sessions." ?>

                            <p>
                                <?php echo $_SESSION['sociology'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=sociology">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>



                </div>
                <div class="anatomy background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Anatomy & Physiology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['anatomy'] = "This course is designed to give students in-depth knowledge in microbiology. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['anatomy'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=anatomy">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="microbiology background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Microbiology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['microbiology'] = "This course is designed to give students in-depth knowledge in microbiology. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['microbiology'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=microbiology">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="pathology background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Pathology</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['pathology'] = "This course is designed to give students in-depth knowledge in pathology. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['pathology'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=pathology">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="pharmacologyI background">
                    <div class="fix">
                        <div class="heading">
                            <h3>PharmacologyI</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['pharmacologyI'] = "This course is designed to give students in-depth knowledge in pharmacologyI. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['pharmacologyI'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=pharmacologyI">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="pharmacologyII background">
                    <div class="fix">
                        <div class="heading">
                            <h3>PharmacologyII</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['pharmacologyII'] = "This course is designed to give students in-depth knowledge in pharmacologyII. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['pharmacologyII'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=pharmacologyII">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="nutrition background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Nutrition</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['nutrition'] = "This course is designed to give students in-depth knowledge in research. There will be concurrent practical sessions." ?>

                            <p>
                                <?php echo $_SESSION['nutrition'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=nutrition">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>



                </div>
                <div class="it background">
                    <div class="fix">
                        <div class="heading">
                            <h3>IT</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['it'] = "This course is designed to give students in-depth knowledge in it. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['it'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=it">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="firstaid background">
                    <div class="fix">
                        <div class="heading">
                            <h3>First Aid</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['firstaid'] = "This course is designed to give students in-depth knowledge in firstaid. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['firstaid'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=firstaid">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="fundamentalofnursing background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Fundamental of Nursing</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['fundamentalofnursing'] = "This course is designed to give students in-depth knowledge in fundamental of nursing. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['fundamentalofnursing'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=fundamentalofnursing">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="fundamentalofnursingpractice background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Fundamental of Nursing Practice</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['fundamentalofnursingpractice'] = "This course is designed to give students in-depth knowledge in fundamental of nursing practice. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['fundamentalofnursingpractice'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=fundamentalofnursingpractice">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="historyofnursing background">
                    <div class="fix">
                        <div class="heading">
                            <h3>History of Nursing</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['historyofnursing'] = "This course is designed to give students in-depth knowledge in firstaid. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['historyofnursing'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=historyofnursing">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="medicalnursing background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Medical Nursing & Medicine</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['medicalnursing'] = "This course is designed to give students in-depth knowledge in fundamental of nursing. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['medicalnursing'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=medicalnursing">
                                <button class="apply">
                                    <img id="arrow-icon"
                                        src="https://img.icons8.com/fluent/48/000000/long-arrow-right.png" />
                                </button>
                            </a>
                        </div>
                    </div>




                </div>
                <div class="ethics background">
                    <div class="fix">
                        <div class="heading">
                            <h3>Ethics and Professional Adjustment</h3>
                        </div>
                        <div class="para">
                            <?php $_SESSION['ethics'] = "This course is designed to give students in-depth knowledge in fundamental of nursing practice. There will be concurrent practical sessions." ?>
                            <p>
                                <?php echo $_SESSION['ethics'] ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="module-student.php?moduleName=ethics">
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
    <script src="./js/js-notify-counter.js"></script>
</body>

</html>