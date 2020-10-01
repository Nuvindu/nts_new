<!DOCTYPE html>
<html lang="en">
<?php include_once('Model/DatabaseHandler.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/frontPage.css">
    <script src="js/jquery-3.5.1.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <section id="header">
        <div class="header container" style="background-color:yellow;">
            <div class="logo" >
                <img src="./img/web/ntslogopng.png" alt="Logo">
            </div>
            <div class="nav-bar">

                <div class="brand">
                    <!-- <a href="#home"><h1><span>N</span>urses <span>T</span>raining <span>S</span>chool </h1></a> -->
                    <br>
                    <div class="name">


                    </div>

                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a style="font-size: 20px;" href="index.php" data-after="Home"
                                onclick="topFunction()"><b>Home</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#about" data-after="About"><b>About</b></a></li>                   
                        <li><a style="font-size: 20px;" href="departments.php" data-after="Departments"><b>Departments</b></a>
                        </li>
                        <li><a style="font-size: 20px;" href="" data-after="Gallery"><b>Gallery</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#contact" data-after="Contact"><b>Contact</b></a></li>
                        <li><a style="font-size: 20px;" href="login.php" data-after="Login"><b>Login</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="warpper">


        <span class="arrow_hover" id="left_arrow_head"><i class="fas fa-hand-point-left"></i></span>
        <?php
        $dbHandler = new gallery\DatabaseHandler();
        $rows = $dbHandler->getAllEntries();
        $num = 0;
        foreach ($rows as $row) {
            if ($num < 3) {
                $num++;
                echo '<div class="card card_' . $num . '">';
            } else {
                echo '<div class="card card_back">';
            }
            echo '<div class="card_image"
            style="background-image:url(\'gallery/' . ($row['imageID'] == "" ? 'logo.jpg' : $row['imageID']) . '\')"></div>';
            echo '<div class="card_text">';
            echo '<h4 class="date">' . substr($row['time_stamp'], 0, 4) . '</h4>';
            echo    '<h2>' . $row['name'] . '</h2>';
            echo    '<p>' . $row['description'] . '</p>';

            echo    '</div>';
            echo   '<div class="card_stats">';
            echo  '<div class="stat">';
            echo      '<div class="value" id="clicks_' . $row['name'] . '">' . $row['clicks'] . '</div>';
            echo      '<div class="type">views</div>';
            echo  '</div>';
            echo  '<div class="stat">';
            echo      '<div class="value"></div>';
            echo       '<div class="type"></div>';
            echo   '</div>';
            echo  '<div class="stat">';
            echo       '<div class="value"><a href="gal.php?dir=' . $row['folder_name'] . '" class="button" target="_blank" onclick="UpdateClicks(event,' . "'" . $row['name'] . "'" . ')" >See Album</a> </div>';
            echo      '<div class="type"></div>';
            echo  ' </div>';
            echo '</div>';
            echo '</div>';
        }
        ?>


        <span class="arrow_hover" id="right_arrow_head"><i class="fas fa-hand-point-right"></i></span>
    </div>
    <div></div>
</body>
<!-- <script src="js/anime.min.js"></script> -->
<script src="js/gallery.js"></script>
<script src="js/clicks.js"></script>
<script src="js/frontPage.js"></script>

</html>