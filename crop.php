<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Image</title>
	<link rel="stylesheet" type="text/css" href="css/student-profile.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css">
</head>
<body>
	<div class="profile-img">
		<h2>Select Your Image</h2> 
		<div class="form">
			<input type="file" name="img_file" id="img_file">
		</div>
		<div class="crop">
			<h2>Crop</h2>
			<canvas id="canvas">
				Not Support
			</canvas>
		</div>
		<h2>Upload</h2>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js"></script>
</body>
</html>