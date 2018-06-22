<?php

require_once('dbConnect.php');

$idclient = $_REQUEST["q"];

$result = db_query("SELECT title, checkin, checkout FROM apartments
	WHERE apartments.idclient='$idclient'");

$rows = mysqli_num_rows($result);
$myArray = array();

if($rows==0)
	echo 'There was an error';
else
{
	while($row = mysqli_fetch_array($result))
	{
  	$myArray[] = $row;
	}
	echo json_encode($myArray);
}
?>
