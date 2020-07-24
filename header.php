<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-header.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC|Roboto&display=swap" rel="stylesheet">
    <script src="./js/jquery-3.3.1.js"></script>

    <title>Log In</title>
</head>

<body>
    <div class="nts-text">
        <div>
            <img class="logo" src="./img/logo-highres.png" alt="logo">
            <img class="logo-lowres" src="./img/logo-highres.png" alt="logo">

        </div>
        <div style="flex-grow: 8;overflow: hidden;height: 108px;">
            <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 0) {
                    $('.nts-text').addClass('color-change');
                    $('.logo').addClass('logo-change');
                    $('.logo-pp').addClass('logo-pp-change');
                    $('.nts-text-image').addClass('nts-text-image-none');
                    $('.logo-lowres').addClass('logo-lowres-resize');
                    $('.logo-pp').addClass('logo-pp-resize');


                } else {
                    $('.nts-text').removeClass('color-change');
                    $('.logo').removeClass('logo-change');
                    $('.logo-pp').removeClass('logo-pp-change');
                    $('.nts-text-image').removeClass('nts-text-image-none');
                    $('.logo-lowres').removeClass('logo-lowres-resize');
                    $('.logo-pp').removeClass('logo-pp-resize');


                }
            });
            </script>
            <img class="nts-text-image" src="./img/NTS-text.png">
        </div>
        <div>
            <a href="index.php"><img class="logo-pp profile-pic" src="./img/logo-highres.png" alt="logo"
                    id="profile-pic" style="border-radius: 100px;"></a>
        </div>

    </div>
</body>

</html>