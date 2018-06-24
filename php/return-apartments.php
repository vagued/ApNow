<?php

require_once('dbConnect.php');

$location = $_REQUEST["q"];

if($location=="All")
	$result = db_query("SELECT idapartment, title, extension FROM apartments");

else
	$result = db_query('SELECT idapartment, title, extension FROM apartments
		WHERE location="' . $location . '"');

$rows = mysqli_num_rows($result);
$myArray = array();

if($rows==0)
	echo 0;
else
{
	while($row = mysqli_fetch_array($result))
	{
  	$myArray[] = $row;
	}
	echo json_encode($myArray);
}
?>
