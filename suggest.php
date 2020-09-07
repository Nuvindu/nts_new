<?php session_start(); ?>
<?php require_once('Model/suggest-db.php'); ?>


<!DOCTYPE html>
<html lang="en">
<body>
<table class="masterlist" id="table">
        <tr>
        	<th>Index Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Last Login</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php echo $user_list; ?>
</table>
</body>
</html>
<?php mysqli_close($connection); ?>