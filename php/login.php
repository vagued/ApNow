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
	echo 'Invalid credidentials, please try again.';
	echo '\nReloading...';

	echo '<script>';

	// echo 'var start = new Date().getTime();';
	// echo '  for (var i = 0; i < 1e7; i++) {';
	// echo 'if ((new Date().getTime() - start) > 2000){';
  //     	echo 'break;}}';

	echo 'window.location.href = "../html/login.html?retry";';
	echo '</script>';
}
else
{
	echo '<!DOCTYPE HTML><html><body>Logged in. Redirecting...';
	echo '<script>';
	echo 'sessionStorage.idClient = ' . json_encode($row[0]) . ';';
	echo 'sessionStorage.username = ' . json_encode($row[1]) . ';';
	echo 'sessionStorage.firstName = ' . json_encode($row[3]) . ';';
	echo 'sessionStorage.lastName = ' . json_encode($row[4]) . ';';
	echo 'sessionStorage.email = ' . json_encode($row[5]) . ';';
	echo 'sessionStorage.extension = ' . json_encode($row[6]) . ';';
	echo 'sessionStorage.login = 1;';
	echo 'window.location.href = "../html/homepage.html";';
	echo '</script></body></html>';
	// echo "works";
}

?>
