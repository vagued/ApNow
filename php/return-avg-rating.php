<?php

require_once('dbConnect.php');

$idapartment = $_REQUEST["q"];

$result = db_query("SELECT AVG(rentings.rating) FROM rentings
		WHERE idapartment=$idapartment");

$sum = mysqli_fetch_assoc($result);

if($sum==null)
	echo 'No ratings';
else
	echo $sum;

?>
