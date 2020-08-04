
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
				<input type="password" name="password" placeholder="New Password" id="password" class="field">
				<input type="checkbox" name="showpassword" id="showpassword" style="">

			</p>
			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit" class="btn">Change Password</button>
			</p>

		</form>
		<!-- </fieldset> -->

		
		
	<!-- </main> -->

    <script src="js/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function(){
            $('#showpassword').click(function(){
                if($('#showpassword').is(':checked')){
                    $('#password').attr('type','text');
                } else{
                    $('#password').attr('type','password');

                }
            })

        });
    </script>
</body>
</html>