<?php

$username = $_POST['username'];
$password = $_POST['password'];

require_once('dbConnect.php');

// An insertion query. $result will be `true` if successful
$result = db_query("SELECT FROM 'clients' WHERE username=='$username' AND password=='$password'";

$row = mysql_fetch_array($result);

if(empty($row))
{
	echo htmlspecialchars(0);
}
else
{
	echo htmlspecialchars(1);
}
  

if($result === false) {
    $txt = "Fail #1\n";
} else {
    $txt = "Success #2\n";
}

?>