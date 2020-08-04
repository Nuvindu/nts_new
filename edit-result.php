<?php session_start(); ?>
<?php require_once('Model/edit-resultdb.php'); ?>
<?php require_once('Service/edit-result-service.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View / Modify User</title>
    <link rel="stylesheet" href="css/edit-result.css">
    <link rel="stylesheet" href="./style/style-header.css">
</head>

<body>
    <div class="logger">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
    <div class="header">
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>
    </div>

    <main>
        <h1>Add/Modify Result<span> <a href="Model/lecturer-db.php">
                    << Back to Dashboard</a> </span> </h1> <?php

															if (!empty($errors)) {
																display_errors($errors);
															}

															?> <form action="edit-result.php" method="post" class="userform">

            <p>
                <label for="">Index Number:</label>
                <input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?> readonly>
            </p>

            <p>
                <label for="">First Name:</label>
                <input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> readonly>
            </p>

            <p>
                <label for="">Last Name:</label>
                <input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?> readonly>
            </p>

            <p>
                <label for="">Grade/Marks:</label>
                <input type="text" name="result" <?php echo 'value="' . $result . '"'; ?>>
            </p>

            <p>
                <label for="">&nbsp;</label>
                <button type="submit" name="submit">Modify Result</button>
            </p>

        </form>

    </main>

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

</html>