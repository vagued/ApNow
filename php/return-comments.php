<?php

require_once('dbConnect.php');

$idapartment = $_REQUEST["q"];

$result = db_query("SELECT comment, username, rentings.idclient, clients.extension FROM rentings, clients
		WHERE rentings.comment IS NOT NULL
		AND rentings.idapartment=$idapartment
		AND rentings.idclient=clients.idclient");

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
