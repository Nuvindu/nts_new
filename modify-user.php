<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php include_once('Service/modify-user-service.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Modify User</title>
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="./css/modify-user.css">
</head>

<body>
    <header>
        <div class="logger">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="logout.php">Log Out</a></div>
    </header>
    <div class="container">

        <!-- header -->
        <div class="header">
            <?php include_once('header.php'); ?>
        </div>
    </div>

    <main>
        <h1>User Modification</h1>
        <div class="back"><span> <a href="operator.php">
                    << Back to User List</a> </span> </div>
        <fieldset>
            <?php display_errors($errors); ?>
            <form action="modify-user.php" method="post" class="userform">
                <input type="hidden" name="user_index" value="<?php echo $user_index; ?>">
                <p>
                    <label for="">First Name:</label>
                    <input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?>>
                </p>

                <p>
                    <label for="">Last Name:</label>
                    <input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>>
                </p>

                <p>
                    <label for="">Index Number:</label>
                    <input type="text" name="index_no" <?php echo 'value="' . $index_no . '"'; ?>>
                </p>

                <p>
                    <label for="">Email Address:</label>
                    <input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>>
                </p>

                <p <?php if (strlen($index_no) != 4) {
									echo "style = display:none; ";
								} ?>>
                    <label for="">Department:</label>
                    <select name="department" id="department"
                        style="border: black;border-radius: 3px;padding: 5px;padding-right: 20px;">
                        <?php $departments = array('Fundamentals_of_Nursing', 'Medical_Nursing', 'Surgical_Nursing', 'Maternal_&_Child_Care_Nursing', 'Management_&_Research');
									foreach ($departments as $dep) {
										$x = str_replace("_", " ", $dep);
										if ($department == $dep) {
											echo "<option value = {$dep} selected>{$x}</option>";
										} else {
											echo "<option value = {$dep}>{$x}</option>";
										}
									}
									?>
                    </select>
                    <br><br>
                    <label for="">Post:</label>
                    <select name="post" id="post"
                        style="border: black;border-radius: 3px;padding: 5px;padding-right: 20px;">

                        <?php $posts = array('The_Principal', 'Senior_Lecturer', 'Lecturer', 'Assistant_Lecturer');
                        // $thepost = 'Lecturer';
                                    foreach ($posts as $post) {
                                        $y = str_replace("_", " ", $post);
                                        if ($thepost == $y) {
                                            echo "<option value = {$post} selected>{$y}</option>";
                                        } else {
                                            echo "<option value = {$post}>{$y}</option>";
                                        }
                                    }
                                    ?>
                    </select>
                    <br><br>
                    <label for="">Title:</label>
                    <select name="title" id="title"
                        style="border: black;border-radius: 3px;padding: 5px;padding-right: 20px;">

                        <?php $titles = array('Mr','Mrs','Ms');
                        // $thetitle = 'Mr';
                                    foreach ($titles as $title) {
                                        if ($thetitle == $title) {
                                            echo "<option value = {$title} selected>{$title}</option>";
                                        } else {
                                            echo "<option value = {$title}>{$title}</option>";
                                        }
                                    }
                                    ?>
                    </select>
                    <br><br>
                    <label for="">Degree:</label>
                    <input type="text" name="degree" <?php echo 'value="' . $thedegree . '"'; ?>>
                </p>
                <p <?php if (strlen($index_no) != 7) {
									echo "style = display:none; ";
								} ?>>
                    <label for="">Year:</label>
                    <select name="year" id="year"
                        style="border: black;border-radius: 3px;padding: 5px;padding-right: 20px;">
                        <?php $years = array('1', '2', '3');
									// echo "<option value = {$year} >  {$year}</option>";
									foreach ($years as $i) {
										if ($year == $i) {
											echo "<option value = {$i} selected> {$i} </option>";
										} else {
											echo "<option value = {$i}> {$i} </option>";
										}
									} ?>
                    </select>
                </p>
                <p>
                    <label for="">Password:</label>
                    <span>******</span> | <a href="change-password.php?user_index=<?php echo $user_index; ?>">Change
                        Password</a>
                </p>

                <p>
                    <label for="">&nbsp;</label>
                    <button type="submit" name="submit">Save</button>
                </p>

            </form>
        </fieldset>


    </main>
</body>

</html>