<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photos</title>
    <link rel="stylesheet" href="css/gal.css">
    <link rel="stylesheet" href="css/frontPage.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/PACE.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <section id="header">
        <div class="header container" style="background-color:yellow;">
            <div class="logo">
                <img src="./img/web/ntslogopng.png" alt="Logo" style="width:35%;">
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
                        <li><a style="font-size: 20px;" href="departments.php" data-after="About"><b>Departments</b></a>
                        </li>
                        <li><a style="font-size: 20px;" href="gallery.php" data-after="About"><b>Gallery</b></a></li>
                        <li><a style="font-size: 20px;" href="index.php#contact" data-after="Contact"><b>Contact</b></a></li>
                        <li><a style="font-size: 20px;" href="login.php"><b>Login</b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <?php
        $fileName = $_GET['dir'];
        if (filter_has_var(INPUT_GET, 'dir')) {
            // checking dir cariablae is present
            $dir = getcwd() . "/gallery/" . filter_var($fileName, FILTER_SANITIZE_STRING)  . "/";
        } else {
            // redirect to 404 not found
        }
        // Open a directory, and read its contents
        try {
            //code...
            if (is_dir($dir)) {
                $x = 0;
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        if ($x < 2) {
                            $x++;
                            continue;
                        }
                        echo "<div class='photo'>";
                        echo "<a href='./gallery/" . $_GET['dir'] . "/" . $file . "'><img class='lazyload' data-src='./gallery/" . $_GET['dir'] . "/" . $file . "' alt='" . $file . "' src='./gallery/logo.jpg' srcset=''></a>";
                        echo "</div>";
                    }
                    closedir($dh);
                }
            } else {
                throw new Exception("Error Processing Request - may be gallery directory missing from the server.", 1);
                // redirect to 404 not found
            }
        } catch (\Throwable $th) {
            echo $th->getmessage();
        }        ?>
        <!-- <div class='photo' id='' select="loadPhoto()">
            <a href='gallery/'>
                <img id="test" src='agesg' data-src=" gallery/img/bg-999.jpg">
            </a>
        </div> -->
    </div>
</body>
<script src="js/loadingPhotos.js"></script>
<script src="js/frontPage.js"></script>

</html>