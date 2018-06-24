<?php

require_once('dbConnect.php');

$idclient = $_REQUEST["q"];

$result = db_query("SELECT title, rentings.checkin, rentings.checkout
	FROM apartments, rentings
	WHERE rentings.idclient=$idclient
		AND rentings.idapartment=apartments.idapartment
		AND rentings.checkin>='" . date("Y/m/d") . "'");

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
