<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Model/model.php'); ?>
<?php require_once('Controller/controller.php'); ?>
<?php
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 2) {
        header('Location: index.php');
    }
	$modules_list = '';
	$mysql ="SELECT * FROM user WHERE type = 'Lecturer'"; 
	$lectable = mysqli_query($connection, $mysql); 
	$k = 0;
	$leclist = [];
	$lecname = [];
	while($lect = mysqli_fetch_array($lectable)){ //get the array of a user of type 'Lecturer'
		$leclist[$k] =  $lect['index_no'];
		$lecname[$lect['index_no']] = $lect['first_name'].' '.$lect['last_name'];  //add the fullname to an array
		$k++;
	}

	$sql ="SELECT * FROM department";
	$heads = mysqli_query($connection, $sql);
	$head_array = [];
	while($header = mysqli_fetch_array($heads)){
		$head_array[$header['department_code']] = $header['department_head']; //get the index of the department head into an array
	}
	



	for($i=1;$i<=5;$i++){
		$query = "SELECT * FROM department WHERE department_code={$i}";
		$module= mysqli_query($connection, $query);
		if ($module){	
			while ($modules = mysqli_fetch_assoc($module)) { //code for creating table row for index and the fullname of the department head
				$modules_list .= "<tr>";
				$modules_list .= "<td>{$modules['department_name']}</td>";
				$modules_list .= "<td><select onchange='myFunction()' name='dep{$i}' id='dep{$i}' style='border-radius: 6px;padding: 2px;padding-right:20px;'>";
				for($j=0;$j<count($leclist);$j++){
					// $tutor = str_replace(" ", "_", $leclist[$j]);
					if($head_array[$i]==$leclist[$j]){
						$name = $lecname[$leclist[$j]];
						$modules_list .= "<option value = {$leclist[$j]} selected>{$leclist[$j]}</option>";						
					}
					else{
						// $name = $lecname[$leclist[$j]];
						$modules_list .= "<option value = {$leclist[$j]}>{$leclist[$j]}</option>";						
					}

				}
				$modules_list .= "</select></td>";
				$modules_list .= "<td id='names{$i}'>{$name}</td>";
				$modules_list .= "</tr>";
			}
		}
		else{
			echo "database query failed";	
		}
	}


	