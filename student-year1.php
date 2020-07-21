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
            <div class="english">
                <br><br>
                <h3>  English</h3>
                <a href="module.php?moduleName=english"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['english'] = "This course is designed to give students in-depth knowledge in english. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['english'] ?></p>
            </div>
            <div class="psychology">
                <br><br>
                <h3>Psychology</h3>
                <a href="module.php?moduleName=psychology"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['psychology'] = "This course is designed to give students in-depth knowledge in psychology. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['psychology'] ?></p>
                
            </div>
            <div class="sociology">
                <br><br>
                <h3>Sociology</h3>
                <a href="module.php?moduleName=sociology"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['sociology'] = "This course is designed to give students in-depth knowledge in sociology. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['sociology'] ?></p>
               
            </div>
            <div class="anatomy">
                <br><br>
                <h3>Anatomy & Physiology</h3>
                <a href="module.php?moduleName=anatomy"><button class="apply">Go to this
                        module</button></a>
                <?php $_SESSION['anatomy'] = "This course is designed to help students appreciate the normal structure of the human body and apply this knowledge in nursing. The students will be exposed to the cell structure, embryology, the circulatory, respiratory and digestive systems. Students will also be exposed to preserved body structures to aid understanding. Diagrams of anatomical structures will also be presented as part of the course. There will be concurrent practical sessions. " ?>
                <p><?php echo $_SESSION['anatomy'] ?></p>
            </div>
            <div class="microbiology">
                <br><br>
                <h3>Microbiology</h3>
                <a href="module.php?moduleName=microbiology"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['microbiology'] = "This course is designed to give students in-depth knowledge in microbiology. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['microbiology'] ?></p>
                
            </div>
            <div class="pathology">
                <br><br>
                <h3>Pathology</h3>
                <a href="module.php?moduleName=pathology"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['pathology'] = "This course is designed to give students in-depth knowledge in pathology. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['pathology'] ?></p>
               
            </div>
            <div class="pharmacologyI">
                <br><br>
                <h3>Pharmacology I</h3>
                <a href="module.php?moduleName=pharmacologyI"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['pharmacologyI'] = "This course is designed to give students in-depth knowledge in pharmacologyI. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['pharmacologyI'] ?></p>
               
            </div>
            <div class="pharmacologyII">
                <br><br>
                <h3>Pharmacology II</h3>
                <a href="module.php?moduleName=pharmacologyII"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['pharmacologyII'] = "This course is designed to give students in-depth knowledge in pharmacologyII. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['pharmacologyII'] ?></p>
                
            </div>
            <div class="nutrition">
                <br><br>
                <h3>Nutrition</h3>
                <a href="module.php?moduleName=nutrition"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['nutrition'] = "This course is designed to give students in-depth knowledge in nutrition. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['nutrition'] ?></p>
               
            </div>
            <div class="it">
                <br><br>
                <h3>IT</h3>
                <a href="module.php?moduleName=it"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['it'] = "This course is designed to give students in-depth knowledge in it. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['it'] ?></p>
                
            </div>
            <div class="firstaid">
                <br><br>
                <h3>First Aid</h3>
                <a href="module.php?moduleName=firstaid"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['firstaid'] = "This course is designed to give students in-depth knowledge in firstaid. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['firstaid'] ?></p>
               
            </div>
            <div class="fundamentalofnursing">
                <br><br>
                <h3>Fundamental of Nursing</h3>
                <a href="module.php?moduleName=fundamentalofnursing"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['fundamentalofnursing'] = "This course is designed to give students in-depth knowledge in fundamental of nursing. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['fundamentalofnursing'] ?></p>
               
            </div>
            <div class="fundamentalofnursingpractice">
                <br><br>
                <h3>Fundamental of Nursing Practice</h3>
                <a href="module.php?moduleName=fundamentalofnursingpractice"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['fundamentalofnursingpractice'] = "This course is designed to give students in-depth knowledge in fundamental of nursing practice. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['fundamentalofnursingpractice'] ?></p>
                
            </div>
            <div class="historyofnursing">
                <br><br>
                <h3>History of Nursing</h3>
                <a href="module.php?moduleName=historyofnursing"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['historyofnursing'] = "This course is designed to give students in-depth knowledge in history of nursing. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['historyofnursing'] ?></p>
               
            </div>
            <div class="medicalnursing">
                <br><br>
                <h3>Medical Nursing & Medicine</h3>
                <a href="module.php?moduleName=medicalnursing"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['medicalnursing'] = "This course is designed to give students in-depth knowledge in medical nursing. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['medicalnursing'] ?></p>
               
            </div>
            <div class="ethics">
                <br><br>
                <h3>Ethics and Professional Adjustment</h3>
                <a href="module.php?moduleName=ethics"><button class="apply">Go to this module</button></a>
                <?php $_SESSION['ethics'] = "This course is designed to give students in-depth knowledge in ethics. There will be concurrent practical sessions." ?>
                <p><?php echo $_SESSION['ethics'] ?></p>
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


