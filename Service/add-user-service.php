<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php include_once('Model/model.php'); ?>


<?php

if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
}
else if(strlen($_SESSION['index_no'])!= 2){
    header('Location: login.php');
}
else{
	
	$errors = array();
	$first_name = '';
	$last_name = '';
	$nic='';
	$email = '';
	$password = '';
	$index_no = '';
	$batch = '20';
	$type = '';
	if (isset($_POST['submit'])) {
		$contrl = new UserController();
		$user = (new UserFactory())->newUser();
		$errors = ErrorCheck::userAddingErrorCheck();
		if (empty($errors)){
			$contrl->addUser($user);
		}
	}
	else if (isset($_POST['import'])) {
		$output = '';
		$file = explode(".", $_FILES["excel"]["name"]);
		$extension=end($file); // For getting Extension of selected file
		$allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
		if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
		{
		$file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
		include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
		
		$objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

		$output .= "<label class='text-success'>Data Inserted</label><br />";
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
		{
		$highestRow = $worksheet->getHighestRow();
		for($row=2; $row<=$highestRow; $row++)
		{
				$contrl_excel = new UserController();
				$userExcel = (new UserFactory())->newUserExcel();
			
				$contrl_excel->addUser($userExcel);}
		
	  }
	}

		else
		{
		$output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
		}
	}
	}
?>