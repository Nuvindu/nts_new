<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php include_once('Model/dbGoToResults.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"> 
	<title>Module Selection</title>
	<link rel="stylesheet" type="text/css" href="css/go-to-results.css">
	<link rel="stylesheet" href="./style/style-header.css">
	<script src="./js/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
	<div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php">
                    <img class="logo" src="./img/logo-0.png" alt="logo">
                    </a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
    <div class="middle">
    <div class="dash"><span><a href="lecturer.php"><< Back to Dashboard</a></span> </div>
	<div class="login">

		<form action="results.php" method="post">
			
			<fieldset>
				<legend><h1>&nbspSelect Module&nbsp</h1></legend>

				<p>
					<label for="">Batch:</label>            
					<select name="batch" id = "batch">
						<option></option>						
					<?php $year = date("Y");
						for ($i=$year-3; $i <= $year+1 ; $i++) { 
							echo "<option value = {$i}>{$i}</option>";
						}
					
					?>
             		</select>
   				</p>
				<p>
					<label for="">Year:</label>            
					<select name="year" id = "year">
						<option></option>
					<?php 	for ($i=1; $i <= 3 ; $i++) { 
								echo "<option value = {$i}>{$i}</option>";
							}
					
					?>
             		</select>
   				</p>
				<p>
					<label for="">Module:</label>            
					<select name="module" id = "module">
						<option></option>
             		</select>
   				</p>
				<p>
					<button type="submit" name="submit">Add/Modify Results</button>
				</p>

			</fieldset>
		</form>
	</div> <!-- .login -->

	
        </div>

        <footer>
            <div class="column clearfix">
            <h3>Contact Us</h3>
            <ul>
                <div class="icon1"><img src="img/location.ico" width="22" height="22"></div>
                <li>Nurses Training School, Mahamodara, Galle, Sri Lanka</li>
                <div class="icon1"><img src="img/at.ico" width="20" height="20"></div>
                <li>Email - nts-galle@gov.lk</li>
                <div class="icon1"><img src="img/tele.ico" width="20" height="20"></div>
                <li>Telephone Number - 0912234452</li>
            </ul>
            </div>
        </footer>
</body>
<script>
$(document).ready(function(){
	$("#year").change(function(){
		$("#module").find('option').remove().end();
		var year = $("option:selected",this).val();
		if(year == 1){
            var yaerOneModules = {
            	"Fundamentals&nbspof&nbspNursing(FirstYear)":"1Y01",
            	"Anatomy&nbspand&nbspPhysiology":"1Y02",
            	"History&nbspand&nbspTrends&nbspin&nbspNursing":"1Y03",
            	"Psychology&nbspand&nbspSociology":"1Y04",
            	"Pharmacology&nbspand&nbspMicrobiology":"1Y05",
            	"English":"1Y06",
            	"Practical&nbspExam(FirstYear)":"1Y07"
            }; 

            var $el = $("#module");
            $.each(yaerOneModules,function(key,value){
            	$el.append($("<option></option>")
            		.attr("value",value).text(key));
            });
		}else if (year ==2) {
            var yaerTwoModules = {
            	"Combined&nbspPaper(Nursing)":"2Y01",
            	"Practical&nbspExam(SecondYear)":"2Y02"
            }; 

            var $el = $("#module");
            $.each(yaerTwoModules,function(key,value){
            	$el.append($("<option></option>")
            		.attr("value",value).text(key));
            });
		}else{
            var yaerThreeModules = {
            	"Fundamentals&nbspof&nbspNursing(ThirdYear)":"3Y01",
            	"Medicine&nbspand&nbspMedical&nbspNursing":"3Y02",
            	"Surgery&nbspand&nbspSurgical&nbspNursing":"3Y03",
            	"Paediatric/Gynecology&nbspand&nbspObstetric&nbspNursing":"3Y04",
            	"Practical&nbspExam(ThirdYear)":"3Y05"            	
            }; 

            var $el = $("#module");
            $.each(yaerThreeModules,function(key,value){
            	$el.append($("<option></option>")
            		.attr("value",value).text(key));
            });
		}
	});
});	

</script>

</html>
<?php mysqli_close($connection) ?>