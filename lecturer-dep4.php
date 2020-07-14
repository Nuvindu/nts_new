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
                <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="lecturer-profile.php"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
                <li><a href="go-to-results.php"><i class="fas fa-project-diagram"></i>Results</a></li>
		<li><a href="add_exam_timetables.php" id="timetable"><i class="f=fa fa-book"></i>Exam Timetables</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>Hostel Info</a></li>
            </ul>
        </div> <!-- side-bar -->

         
        <div id="courses">
            <div class="gynecology">
                <br><br>
                <h3>Gynecological Nursing & Gynecology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course is designed to give students in-depth knowledge in the general function and physiological processes of the normal human body. Students will study the functions and specific biophysiochemical properties of organs in the circulatory, respiratory and digestive systems as well as metabolisms. There will be concurrent practical sessions.</p>
                
            </div>
            <div class="gynecologypractice">
                <br><br>
                <h3>Gynecological Nursing Practice</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
            <div class="obstetric">
                <br><br>
                <h3>Obstetric Nursing & Obstetric</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="obstetricpractice">
                <br><br>
                <h3>Obstetric Nursing Practice</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="paediatric">
                <br><br>
                <h3>Paediatric Nursing & Paediatric</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="paediatric">
                <br><br>
                <h3>Paediatric Practice</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
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
