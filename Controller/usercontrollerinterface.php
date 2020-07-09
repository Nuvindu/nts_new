<?php 

interface IUserController{
	public function addUser(User $user);
	public function changePassword();
	public function updateUser($user_index);
	public function deleteUser($user_index);
	public function userLogin($index_no,$password);
}


 ?>