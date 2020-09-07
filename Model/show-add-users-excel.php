
<?php require_once('inc/dbconnection.php'); ?>
<?php require_once('Service/operator-service.php'); ?>
<?php
$output = '';
if(isset($_POST["import"]))
{
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
    $output .= "<tr>";
		$index_no = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
		//$type = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
		//$first_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
		//$last_name = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		$nic = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
		//$batch = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
		$email = mysqli_real_escape_string($connection, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
		$output .= '<td>'.$index_no.'</td>';
		$output .= '<td>'.$NIC.'</td>';
		$output .= '<td>'.$email.'</td>';
		$output .= '</tr>';
		
	}
} 
 }
else
{
$output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
}
}
	

?>
