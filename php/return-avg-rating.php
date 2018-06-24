<?php

require_once('dbConnect.php');

$idapartment = $_REQUEST["q"];

$result = db_query("SELECT AVG(rentings.rating) FROM rentings
		WHERE idapartment=$idapartment");

$sum = mysqli_fetch_assoc($result);

if($sum["AVG(rentings.rating)"]===null)
	echo 0;
else
	echo $sum["AVG(rentings.rating)"];

?>
