<?php session_start(); ?>
<?php include_once('Model/change-passworddb.php'); ?>
<?php include_once('Service/change-password-service.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/change-password.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
	<header>
        <div class="logger">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
        
	</header>
	<div class="header">
            <div class="nts-text" style="margin:0px 0px 5px 0px">
                <div>
                    <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
                </div>
                <div style="flex-grow: 8; padding-top: 20px;">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
	<main>
		<h1>User Modification</h1>
		<div class="back"><span> <a href="operator.php"><< Back to User List</a></span></div>

		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
		 <fieldset>
		<form action="change-password.php" method="post" class="userform">
			<input type="hidden" name="user_index" value="<?php echo $index_no; ?>">
			<p>
				<label for="">First Name:</label>
				<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> disabled>
			</p>

			<p>
				<label for="">Last Name:</label>
				<input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>disabled>
			</p>

			<p>
				<label for="">Index Number:</label>
				<input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?>disabled>
			</p>

			<p>
				<label for="">Email Address:</label>
				<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>disabled>
			</p>

			<p>
				<label for="">Password:</label>
				<input type="password" name="password" id="password">
				<input type="checkbox" name="showpassword" id="showpassword" style="">

			</p>
              
                

			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Update Password</button>
			</p>

		</form>
		</fieldset>

		
		
	</main>

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