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
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>
    </div>
    <div class="middle">
        <div class="dash"><span><a href="lecturer-db.php">
                    << Back to Dashboard</a> </span> </div>
        <div class="login">

            <form action="results.php" method="post">

                <fieldset>
                    <legend>
                        <h1> Select Module </h1>
                    </legend>

                    <p>
                        <label for="">Batch:</label>
                        <select name="batch" id="batch">
                            <option></option>
                            <?php $year = date("Y");
										for ($i = $year - 3; $i <= $year + 1; $i++) {
											echo "<option value = {$i}>{$i}</option>";
										}

										?>
                        </select>
                    </p>
                    <p>
                        <label for="">Year:</label>
                        <select name="year" id="year">
                            <option></option>
                            <?php for ($i = 1; $i <= 3; $i++) {
											echo "<option value = {$i}>{$i}</option>";
										}

										?>
                        </select>
                    </p>
                    <p>
                        <label for="">Module:</label>
                        <select name="module" id="module">
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
$(document).ready(function() {
    $("#year").change(function() {
        $("#module").find('option').remove().end();
        var year = $("option:selected", this).val();
        if (year == 1) {
            var yaerOneModules = {
                "Fundamentals of Nursing": "1Y01",
                "Anatomy and Physiology": "1Y02",
                "History and Trends in Nursing": "1Y03",
                "Psychology and Sociology": "1Y04",
                "Pharmacology and Microbiology": "1Y05",
                "English": "1Y06",
                "Practical Exam": "1Y07"
            };

            var $el = $("#module");
            $.each(yaerOneModules, function(key, value) {
                $el.append($("<option></option>")
                    .attr("value", value).text(key));
            });
        } else if (year == 2) {
            var yaerTwoModules = {
                "Combined Paper (Nursing)": "2Y01",
                "Practical Exam": "2Y02"
            };

            var $el = $("#module");
            $.each(yaerTwoModules, function(key, value) {
                $el.append($("<option></option>")
                    .attr("value", value).text(key));
            });
        } else {
            var yaerThreeModules = {
                "Fundamentals of Nursing": "3Y01",
                "Medicine and Medical Nursing": "3Y02",
                "Surgery and Surgical Nursing": "3Y03",
                "Paediatric/Gynecology and Obstetric Nursing": "3Y04",
                "Practical Exam": "3Y05"
            };

            var $el = $("#module");
            $.each(yaerThreeModules, function(key, value) {
                $el.append($("<option></option>")
                    .attr("value", value).text(key));
            });
        }
    });
});
</script>

</html>
<?php mysqli_close($connection) ?>