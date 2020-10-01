
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student-profile.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/jquery-3.3.1.js"></script>
</head>

<body>
    <!-- navbaricon -->
    <script>
    function myFunction() {
        if (document.getElementById('navbar').className == 'navbar') {
            document.getElementById('navbar').className = 'navactive';
        } else {
            document.getElementById('navbar').className = 'navbar';
        }
    }
    </script>
    <div class="navbar-icon" onclick="myFunction()">
        <img src="./img/menu-icon-removebg.png" alt="menu-icon" srcset="">
    </div>
    <!-- navbar -->
    <div class="navbar" id="navbar">
        <ul>

            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "Model/lecturer-db.php";
                        } else if (strlen($_SESSION['index_no']) == 7) {
                            echo "Model/student-db.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php"><i class="fas fa-bell"></i>Notifications</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exam_timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
            
        </ul>
    </div>
</body>

</html>