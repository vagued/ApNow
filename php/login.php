<?php

if (isset($_POST))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
}
else {
	echo "No POST made";
}

// $username = "asd";
// $password = "asd";

require_once('dbConnect.php');

// An insertion query. $result will be `true` if successful
$result = db_query("SELECT * FROM clients WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($result);

if(empty($row))
{
	echo "Invalid credidentials, please try again.";
	echo "\nReloading...";
	sleep(2);
	echo '<script>';
	echo 'window.location.href = "../html/login.html";';
	echo '</script>';
}

else
{
	echo '<!DOCTYPE html><html><body><script>';
	echo 'var sessionStorage.idClient = ' . json_encode($row[0]) . ';';
	echo 'var sessionStorage.firstName = ' . json_encode($row[3]) . ';';
	echo 'var sessionStorage.lastName = ' . json_encode($row[4]) . ';';
	echo 'var sessionStorage.email = ' . json_encode($row[5]) . ';';
	echo 'window.location.href = "../html/homepage.html";';
	echo '</script></body></html>';
	// echo "works";
}

?>
