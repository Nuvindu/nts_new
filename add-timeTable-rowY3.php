
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php require_once('Service/add-timetable-rowY3-service.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exam Time Table</title>
    <link rel="stylesheet" type="text/css" href="css/addTimetable.css">
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="./css/notificationbar.css">
</head>

<body>
<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>

<div class="header">
        <?php include_once('header.php'); ?>
    </div>

    <!-- navbar -->
    <?php include_once('navbar.php'); ?>
    <div class="side-bar">
        <span style="
                                    text-align: center;
                                    margin: 0;
                                    height: 50px;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;
                                    /* padding-left: 11px; */
                                "><i class="fas fa-align-justify" aria-hidden="true" style="
                    padding-left: 17px;
                "></i></span>
        <ul>
            <li><a href="Model/lecturer-db.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
            <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="add_exam_timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="go-to-results.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div> <!-- side-bar -->
    <!-- <div class="add" style="text-align:right"><a href="add_exam_timetables.php">Back &gt&gt</a> </br></div> -->
    <h2 style="padding-left:4%">Third Year-Batch A</h2>
    <table class="masterlist">
    <thead>
			<th>Date </th>
            <th>Time </th>
			<th>Place</th>
			<th>Module name</th>
			<th>Submit</th>
		</thead>
		<form action="add-timeTable-rowY3.php" method="post" class="userform">
		<tbody>
		<tr>
			<td data-label="Date"><input type="date" name="Date" <?php echo 'value="' . $Date . '"'; ?> required ></td>
			<td data-label="Time"><input type="time" name="Time" <?php echo 'value="' . $Time . '"'; ?>required></td>
			<td data-label="Place"><input type="text" name="Place" <?php echo 'value="' . $Place . '"'; ?>required></td>
			<td data-label="Module name"><input type="text" name="Module_name" <?php echo 'value="' . $Module_name . '"'; ?>required></td>
			<td data-label="Submit"><button type="submit" name="submit">Save</button></td>
		</tr>
	</tbody>
    <script src="./js/js-notify-counter.js"></script>
</body>

</html>
<?php mysqli_close($connection); ?>
