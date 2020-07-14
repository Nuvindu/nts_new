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
</head>
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
            <div class="english">
                <br><br>
                <h3>  English</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course is designed to help students appreciate the normal structure of the human body and apply this knowledge in nursing. The students will be exposed to the cell structure, embryology, the circulatory, respiratory and digestive systems.  Students will also be exposed to preserved body structures to aid understanding. Diagrams of anatomical structures will also be presented as part of the course. There will be concurrent practical sessions. </p>
            </div>
            <div class="psychology">
                <br><br>
                <h3>Psychology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course is designed to give students in-depth knowledge in the general function and physiological processes of the normal human body. Students will study the functions and specific biophysiochemical properties of organs in the circulatory, respiratory and digestive systems as well as metabolisms. There will be concurrent practical sessions.</p>
                
            </div>
            <div class="sociology">
                <br><br>
                <h3>Sociology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
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
            <div class="pharmacologyI">
                <br><br>
                <h3>Pharmacology I</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="pharmacologyII">
                <br><br>
                <h3>Pharmacology II</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="nutrition">
                <br><br>
                <h3>Nutrition</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
            <div class="anatomy">
                <br><br>
                <h3>Anatomy & Physiology</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="it">
                <br><br>
                <h3>IT</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="firstaid">
                <br><br>
                <h3>First Aid</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
            <div class="fundamentalofnursing">
                <br><br>
                <h3>Fundamental of Nursing</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="fundamentalofnursingpractice">
                <br><br>
                <h3>Fundamental of Nursing Practice</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive health assessment. Students will be taken through the physical assessment of the human body in relation to the various body systems. They will gain competency in determining normal and abnormal functioning of organs and systems. The course will consist of classroom teaching and skills demonstration.</p>
                
            </div>
            <div class="historyofnursing">
                <br><br>
                <h3>History of Nursing</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>This course introduces students to the history, processes and methods of community health nursing. Students will also discuss the concept of health, personal and environmental health. They will develop competencies in promoting health in the community and managing home accidents. The students will be expected to select a community or group and examine their environmental health practices.</p>
               
            </div>
            <div class="medicalnursing">
                <br><br>
                <h3>Medical Nursing & Medicine</h3>
                <a href="#"><button class="apply">Go to this module</button></a>
                <p>The course introduces students to the various types of trauma and their management. It will also equip the students with knowledge and skills that can be utilized to provide safety / emergency care to individuals in the community.  The course would include practical sessions in the laboratory and students would be expected to do return demonstration on competencies demonstrated.</p>
               
            </div>
            <div class="ethics">
                <br><br>
                <h3>Ethics and Professional Adjustment</h3>
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


