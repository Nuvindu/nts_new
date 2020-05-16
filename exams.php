<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Exams</title>
        <link rel="stylesheet" type="text/css" href="css/exams.css">
        <link rel="stylesheet" href="./style/style-header.css">
    </head>
<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a> </div>
    <div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
    <div class="back">
    <div class="section">
        <h2>Exam Time Tables</h2>
    </div>
    <div id="courses">
    <div class="Semester1 results">
        <h2>Semester 1 </h2>
        <img src="img/hea.jfif" width="15%" alt="results">
        
        <a href="#"><button class="view ">View exam time table</button></a>
    </div>
    <div class="Semester2 results">
        <h2>Semester 2 </h2>
        <img src="img/hea.jfif" width="15%" alt="results">
        
        <a href="#"><button class="view ">View exam time table</button></a>
    </div>
    <div class="Semester3 results">
            <h2>Semester 3 </h2>
            <img src="img/hea.jfif" width="15%" alt="results">
            
            <a href="#"><button class="view ">View exam time table</button></a>
    </div>
    <div class="Semester4 results">
        <h2>Semester 4 </h2>
        <img src="img/hea.jfif" width="15%" alt="results">
        
        <a href="#"><button class="view ">View exam time table</button></a>
        </div>
        <div class="Semester5 results">
            <h2>Semester 5 </h2>
            <img src="img/hea.jfif" width="15%" alt="results">
            
            <a href="#"><button class="view ">View exam time table</button></a>
        </div>
        <div class="Semester6 results">
                <h2>Semester 6 </h2>
                <img src="img/hea.jfif" width="15%" alt="results">
                
                <a href="#"><button class="view">View exam time table</button></a>
        </div>
    </div>
    </div>
</body>
</html>
<?php mysqli_close($connection); ?>