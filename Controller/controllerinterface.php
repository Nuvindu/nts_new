<?php 

interface IController{
	public function compareCode($verifycode,$index);
	public function sendMail($email,$code,$index);
	public function distributeEmail($index_no,$email,$subject,$email_body);
	public function addTimeTable();
	public function addTimetable2();
	public function addTimetable3();
}


 ?>