<?php include_once('Controller/usercontroller.php'); ?>
<?php include_once('Controller/controller.php'); ?>
<?php include_once('Controller/errorscheck.php'); ?>
<?php include_once('Model/model.php'); ?>
<?php session_start(); ?>
<?php 

if(!isset($lecs)){

		// $depcontroller = (new Controller())->departmentLecturers(2);
		// print_r($depcontroller['department']);	
		// echo "<br>";
		$fund = (new Controller())->departmentLecturers(1);
		$med = (new Controller())->departmentLecturers(2);
		$surg = (new Controller())->departmentLecturers(3);
		$maternal = (new Controller())->departmentLecturers(4);
		$research = (new Controller())->departmentLecturers(5);

		$all_details = (new Controller())->getLecDetails();

}
 ?>