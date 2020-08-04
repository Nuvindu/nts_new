<?php 

$pass = "password";
$hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>16));
$h = sha1($pass);
$options = array('cost'=>11);
echo $hash;
echo "<br>";
echo $h;
echo "<br>";
if(password_verify($pass, $hash)){
	echo "Valid";
}
else{
	echo "Invalid";
}

if(password_needs_rehash($hash, PASSWORD_DEFAULT, $options)){
	$newHash = password_hash($hash, PASSWORD_DEFAULT, $options);
	echo "<br>";
	echo $newHash;
}


?>