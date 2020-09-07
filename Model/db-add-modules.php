<?php session_start(); ?>
<?php require_once('inc/dbconnection.php'); ?>
<?php
    if (!isset($_SESSION['index_no'])){
            header('Location: login.php');
        }
    if (strlen($_SESSION['index_no']) != 2) {
        header('Location: index.php');
    }
	$modules_list = '';
	$query = "SELECT * FROM modules WHERE department=1";
	$module= mysqli_query($connection, $query);
	if ($module){	while ($modules = mysqli_fetch_assoc($module)) {
		$modules_list .= "<tr>";
		$modules_list .= "<td>{$modules['module_code']}</td>";
		$modules_list .= "<td>{$modules['module_name']}</td>";
		$modules_list .= "<td>{$modules['year']}</td>";
		$modules_list .= "<td><a href=\"Model/delete_module_row.php?del=$modules[module_name]\">Delete</a></td>";
		$modules_list .= "</tr>";
		}
	}
	else{
		echo "database query failed";
		
	}
		
	$modules_listB = '';
	$query = "SELECT * FROM modules WHERE department=2";
	$module= mysqli_query($connection, $query);
	if ($module){	while ($modules= mysqli_fetch_assoc($module)) {
		$modules_listB .= "<tr>";
		$modules_listB .= "<td>{$modules['module_code']}</td>";
	    $modules_listB .= "<td>{$modules['module_name']}</td>";
        $modules_listB .= "<td>{$modules['year']}</td>";
		$modules_listB .= "<td><a href=\"Model/delete_module_row.php?del=$modules[module_name]\">Delete</a></td>";
		$modules_listB .= "</tr>";
		}
	}
	else{
		echo "database query failed";
		
	}
		
		 
	$modules2_list = '';
	$query = "SELECT * FROM modules where department=3";
	$module= mysqli_query($connection, $query);
	if ($module){	while ($modules = mysqli_fetch_assoc($module)) {
		$modules2_list .= "<tr>";
        $modules2_list .= "<td>{$modules['module_code']}</td>";
        $modules2_list .= "<td>{$modules['module_name']}</td>";
		$modules2_list .= "<td>{$modules['year']}</td>";
		
		$modules2_list .= "<td><a href=\"Model/delete_module_row.php?del=$modules[module_name]\">Delete</a></td>";
		$modules2_list .= "</tr>";
		}
	}
	else{
		echo "database query failed";
		
	}
	$modules2_listB = '';
	$query = "SELECT * FROM modules WHERE department=4";
	$module= mysqli_query($connection, $query);
	if ($module){	while ($modules = mysqli_fetch_assoc($module)) {
		$modules2_listB .= "<tr>";
		$modules2_listB .= "<td>{$modules['module_code']}</td>";
		$modules2_listB .= "<td>{$modules['module_name']}</td>";
		$modules2_listB .= "<td>{$modules['year']}</td>";
		
		$modules2_listB .= "<td><a href=\"Model/delete_module_row.php?del=$modules[module_name]\">Delete</a></td>";
		$modules2_listB .= "</tr>";
		}
	}
	else{
		echo "database query failed";
		
	}
	$modules3_list = '';
	$query = "SELECT * FROM modules where department=5";
	$module= mysqli_query($connection, $query);
	if ($module){	while ($modules= mysqli_fetch_assoc($module)) {
		$modules3_list .= "<tr>";
		$modules3_list .= "<td>{$modules['module_code']}</td>";
		$modules3_list .= "<td>{$modules['module_name']}</td>";
		$modules3_list .= "<td>{$modules['year']}</td>";
		
		$modules3_list .= "<td><a href=\"Model/delete_module_row.php?del=$modules[module_name]\">Delete</a></td>";
		$modules3_list .= "</tr>";
		}
	}
	else{
		echo "database query failed";
	}

	
	if (isset($_GET['err'])) {
		echo  "<script> alert('Duplicate module/row not inserted.'); </script>";
} 
 ?>
