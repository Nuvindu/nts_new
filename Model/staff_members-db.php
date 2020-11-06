<?php require_once('inc/dbconnection.php'); ?>
<?php 

	$user_list = '';
	$search = '';
	$query = "SELECT * FROM lecturers ORDER BY index_no";
	$users = mysqli_query($connection, $query);
	while ($user = mysqli_fetch_assoc($users)) {

		//getting each lecturer's data from lecturer database
		$index_no = $user['index_no'];
    	$title = $user['title'];
    	$post = $user['post'];
    	$degree = $user['degree'];

		//second query to get each lecturer's data which are not in the lecturer database but in the user database 
	 	$query = "SELECT * FROM user WHERE index_no = '{$index_no}' LIMIT 1";
    	$results = mysqli_query($connection, $query);
    	$result = mysqli_fetch_assoc($results);

		$first_name = $result['first_name'];
		$last_name = $result['last_name'];
		$profile_picture_dir = $result['profile_picture_dir'];
		$email = $result['email'];

		$user_list .= "<div class=tile clearfix>";

		if(file_exists("profile-pictures/" . "{$profile_picture_dir}")){
			$user_list .= "<img src=profile-pictures/" . "{$profile_picture_dir} alt={$first_name} width=\"200\" height=\"220\" class=photo><br>";
		}
		else{
			$user_list .= "<img src='img/empty-pp.png' alt={$first_name} width=\"200\" height=\"220\" class=photo><br>";
		}


		$user_list .= "<div class=details>";

		$user_list .= "<div class=post>" . $post . "</div><br>" ;
		$user_list .= "<div class=name>" . $title . "." . $first_name . " " . $last_name ."</div><br>";
		$user_list .= "<div class=degree>".$degree . "</div><br>";
		$user_list .= "<div class=email>email:  ";
		$user_list .= $email . "</div><br>";
		$user_list .= "</div>";  //details

		$user_list .= "</div><br>";  //tile


	}


 ?>