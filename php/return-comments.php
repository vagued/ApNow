<?php

require_once('dbConnect.php');

$idapartment = $_REQUEST["q"];

$result = db_query("SELECT comment FROM rentings
		WHERE rentings.idapartment=$idapartment");

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
