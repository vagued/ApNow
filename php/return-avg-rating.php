<?php

require_once('dbConnect.php');

$idapartment = $_REQUEST["q"];

$result = db_query("SELECT AVG(rentings.rating) FROM rentings
		WHERE idapartment=$idapartment");

$avg = mysqli_fetch_assoc($result);

if($avg["AVG(rentings.rating)"]===null)
	echo 0;
else
	echo $avg["AVG(rentings.rating)"];

?>
