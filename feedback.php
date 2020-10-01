<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/feedback-service.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Feedback About This Website</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
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

   
	<div class="container" style="padding-bottom:5%;">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Feedback About This Website</h2>
				<form action="feedback.php" method="post" class="userform">
				<input type="text" class="field" placeholder="Subject (optional)" name="subject">
				<!-- <input type="text" class="field" placeholder="Your Email"> -->
				<!-- <input type="text" class="field" placeholder="Phone"> -->
				<textarea placeholder="Feedback (required)" class="field" name="feedback" required></textarea>
				<button name="submit" class="btn">Send</button>
			</form>
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
		<ul>

            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "Model/lecturer-db.php";
                        } else if (strlen($_SESSION['index_no']) == 7) {
                            echo "Model/student-db.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="#"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div> <!-- side-bar -->
    <br><br><br><br><br>
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
    <script src="./js/js-notify-counter.js"></script>
</body>
</html>
