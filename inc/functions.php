<?php

	function verify_query($result_set) {

		global $connection;

		if (!$result_set) {
			die("Database query failed: " . mysqli_error($connection));
		}

	}
	function getTime(){  //get the current time string according to the time zone
		date_default_timezone_set("Asia/Colombo");
		$time = strval(date("Y")).strval(date("m")).strval(date("d")).strval(date("H")).strval(date("i")).strval(date("s"));
		return $time;
	}
	function compareTime($table_time_str){   //compare time difference
		$new_time_str = getTime();
		$new_time_int = intval($new_time_str);
		$table_time_int = intval($table_time_str);
		$compare= true;	
		for($i=0;$i<8;$i++){
			if($table_time_str[$i]!=$new_time_str[$i]){  // compare the the date is similar in both codes
				$compare= false;
				return false;
			}
		}
		if($compare){
			if(substr($table_time_str,8,2)!=substr($new_time_str,8,2)){
				if(($new_time_int-$table_time_int)<5000){  // check the time difference is less than 10 mins
					return true;
				}
				else{
					return false;
				}
			}
			else if(($new_time_int-$table_time_int)<1000){  // check the time difference is less than 10 mins
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function check_req_fields($req_fields) {
		// checks required fields
		$errors = array();
		
		foreach ($req_fields as $field) {
			if (empty(trim($_POST[$field]))) {
				$errors[] = $field . ' is required';
			}
		}
		return $errors;
	}

	function check_max_len($max_len_fields) {
		// checks max length
		$errors = array();

		foreach ($max_len_fields as $field => $max_len) {
			if (strlen(trim($_POST[$field])) > $max_len) {
				$errors[] = $field . ' must be less than ' . $max_len . ' characters';
			}
		}
		return $errors;
	}

	function display_errors($errors) {
		// format and displays form errors
		if (!empty($errors)){
			echo '<div class="errmsg">';
			foreach ($errors as $error) {
				$error = ucfirst(str_replace("_", " ", $error));
				echo "<b>  $error </b>". '<br>';
			}
			echo '</div>';
		}
	}

	function is_email($email)
	{
		return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
	}

	function generate_result_table_row($i){

		$table_data = '';

		global $allKeys;
		global $modules;
		global $user;
		$module_code = $allKeys[$i];
		$module_name = $modules[$module_code];
		$grade = $user[$module_code]; if (strtolower($grade) == 'null' ) {
			$grade = 'Pending';
		}

		$table_data .= "<tr>"; 
		$table_data .= "<td>{$module_name}</td>";
		$table_data .= "<td>{$grade}</td>";
		$table_data .= "</tr>"; 

		return $table_data;
	}
	function startsWith ($string, $startString) 
	{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
	} 
  
?>