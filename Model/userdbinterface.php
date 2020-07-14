<?php 
interface IUserDB{

	public function addUser($user);
	public static function changePassword($user_index,$hashed_password);
	public static function modifyUser($user,$user_index);
	public static function deleteUser($user_index);
	public static function userLogin($index_no,$password);
}




 ?>