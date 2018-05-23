<?php

// $username = $_POST['username'];
// $password = $_POST['password'];

$username = "asd";
$password = "asd";

require_once('dbConnect.php');

// An insertion query. $result will be `true` if successful
$result = db_query("SELECT * FROM 'clients' WHERE username=='$username' AND password=='$password'");

$row = mysqli_fetch_array($result);

if(empty($row))
{
	// echo '<script>';
	// echo 'selectElementById("msg").innerHTML = "Invalid credidentials";';
	// echo '</script>';
	echo "nah";
}

else
{

	// echo '<script>';
	// echo 'var sessionStorage.idClient = ' . json_encode($row[0]) . ';';
	// echo 'var sessionStorage.firstName = ' . json_encode($row[3]) . ';';
	// echo 'var sessionStorage.lastName = ' . json_encode($row[4]) . ';';
	// echo 'var sessionStorage.email = ' . json_encode($row[5]) . ';';
	// echo '</script>';

	echo "works";
}

?>
