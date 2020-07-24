<?php session_start(); ?>
<?php include_once('Service/change-password-service.php'); ?>
<?php 
if(!isset($_SESSION['fgtpw'])){
	header('Location: index.php');
}
unset($_SESSION['w']);
$index_no = '';
	global $connection;
	if (isset($_GET['user_index'])) {
		// getting the user information
		$user_index = mysqli_real_escape_string($connection, $_GET['user_index']);
		$query = "SELECT * FROM user WHERE index_no = '{$user_index}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				// user found
				$result = mysqli_fetch_assoc($result_set);
				$index_no = $result['index_no'];
				$sql = "DELETE from verifypassword WHERE index_no = {$user_index} LIMIT 1";
				$del = mysqli_query($connection,$sql);
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/change-password.css">
	<link rel="stylesheet" href="./style/style-header.css">
</head>
<body>
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
				<label for="">Password:</label>
				<input type="password" name="password" id="password">
				<input type="checkbox" name="showpassword" id="showpassword" style="">

			</p>
			<p>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Change Password</button>
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