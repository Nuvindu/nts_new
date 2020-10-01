
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/notifications-db.php'); ?>

<!DOCTYPE html>

<html>
<head>
    <title>Notifications</title>
    <link rel="stylesheet" type="text/css" href="css/notifications.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/js-notifications.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <script>
        // var xmlhttp = new XMLHttpRequest();
        // xmlhttp.open("GET", "notifications.php?status=" + str, true);
        // xmlhttp.send();


    </script>
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


    <div class="container">
        <h1 style="font-size:36px;">Notifications</h1>
        <?php
        
        
        if(isset($_COOKIE["memento"])){ //undo link works only when the cookie is set
            echo '<div class="undo" id = "undo" style="float: right;font-size:18px;margin-top: -22px;margin-right: 18px;"><a href="Model/undo-db.php">undo</a></div>';
        }
        if(!empty($notification)){
            $count=0;
            $i=50;
            while($i>=0){
                if(isset($notification[$i])){ //display the notification if it is not empty
                    $count+=1;
                    echo 
                    "<fieldset>
                        <legend style = 'font-weight:bold;font-size:24px;padding:8px;'>{$notification[$i]["Subject"]}</legend>
                        <a href='Model/del-notify-db.php?id={$i}' id = 'd' style = 'float:right;' ><i class='fas fa-trash-alt fa-1x'></i></a>  
                        <br>
                        <div class='message'>{$notification[$i]["Message"]}</div>
                                         
                    </fieldset>"; 
                    // if($count==4){  // to make sure only displaying four notifications
                    //     break;
                    // }
                }
                $i--;
            }         
        }
        ?>
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
        <ul>

            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "Model/lecturer-db.php";
                        } else if (strlen($_SESSION['index_no']) == 7) {
                            echo "Model/student-db.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="#"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
            <!-- <li><a href="notifications.php"><i class="fas fa-bell"></i>Notifications</a></li> -->
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exam TimeTables</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>

        </ul>
    </div> <!-- side-bar -->

    <footer>
        <div class="column clearfix" style="padding-top:8%;">
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
