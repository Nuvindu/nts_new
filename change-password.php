<?php session_start(); ?>
<?php include_once('Model/change-passworddb.php'); ?>
<?php include_once('Service/change-password-service.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/change-password.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
	<header>
        <div class="logger">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
        
	</header>
	<!-- header -->
	<div class="header">
            <?php include_once('header.php'); ?>
        </div>
	<main>
	<div class="add" style="text-align:right;"><a href="operator.php">Back &gt&gt</a> </div>
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