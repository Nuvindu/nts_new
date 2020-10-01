<?php include_once('Service/change-password-service.php'); ?>
<?php include_once('Model/changepw-verify-db.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="css/change-password.css">
    <link rel="stylesheet" type="text/css" href="css/feedback.css">
    <link rel="stylesheet" href="./style/style-header.css">
</head>

<body>
    <!-- header -->
    <div class="header">
        <?php include_once('header.php'); ?>
    </div>

    <!-- <main> -->

    <?php

	if (!empty($errors)) {
		display_errors($errors);
	}

	?>
    <!-- <fieldset> -->
    <div class="container" style="padding-bottom:5%;">
        <div class="contact-box">

            <div class="left"></div>
            <div class="right">
                <h2>Change Password</h2>
                <form action="change-password.php" method="post" class="userform">
                    <input type="hidden" name="user_index" value="<?php echo $index_no; ?>">
                    <p>
                        <!-- <label for="">New Password:</label> -->
                        <input type="password" name="password" placeholder="New Password" id="new_password"
                            class="field">
                        <span id="error" class="error">include 8
                            characters,at lest one highercase letter,at least onelowercase letter and at
                            least one special character</span>
                        <input type="checkbox" name="showpassword" id="showpassword" style="">

                    </p>
                    <p>
                        <label for="">&nbsp;</label>
                        <button type="submit" name="submit" class="btn" id="submit">Change Password</button>
                    </p>

                </form>
                <!-- </fieldset> -->



                <!-- </main> -->

                <script src="js/jquery-3.3.1.js"></script>
                <script>
                $(document).ready(function() {
                    $('#showpassword').click(function() {
                        if ($('#showpassword').is(':checked')) {
                            $('#new_password').attr('type', 'text');
                        } else {
                            $('#new_password').attr('type', 'password');

                        }
                    })

                });
                </script>
                <script src="./js/js-student-profile-changePassword.js"></script>

</body>

</html>