<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/Lecturer-service.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" type="text/css" href="css/lecturer.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student-profile.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
</head>
<body>

<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log Out</a> </div>
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

            </div>
        </div>

<div class="wrapper">
        
    <div class="main_content">
        <div class="header">Tutoring Modules</div> 
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
                <li><a href="lecturer.php"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="lecturer-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
                <li><a href="go-to-results.php"><i class="fas fa-project-diagram"></i>Results</a></li>
		        <li><a href="go-to-exam-timeTables.php" id="timetable"><i class="fas fa-project-diagram"></i>Exam Time Table</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>Hostel Info</a></li>
            </ul>
        </div> <!-- side-bar -->

         
        <div id="courses">
            <div class="anatomy">
                <br><br>
                <h3>Anatomy & Physiology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="microbiology">
                <br><br>
                <h3>Microbiology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="pathology">
                <br><br>
                <h3>Pathology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
            <div class="medicalnursing">
                <br><br>
                <h3>Medical Nursing & Medicine</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="medicalpractice">
                <br><br>
                <h3>Medical Nursing Practice</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
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
<?php mysqli_close($connection); ?>
