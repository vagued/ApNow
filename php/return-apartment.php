<?php

require_once('dbConnect.php');

$id = $_REQUEST["q"];

$result = db_query("SELECT * FROM apartments WHERE idapartment=$id");

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
