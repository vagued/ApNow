<?php

require_once('dbConnect.php');

$result = db_query("SELECT idapartment, title FROM apartments");

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

	// $data=array(1,"asd");
  // while($row = mysqli_fetch_array($result))
  // {
  //    array_merge(data, array(
  //     "idapartment" => $row['idapartment'],
  //     "title" => $row['title']
  //   ));
  // }
	// echo json_encode(data);
}
?>
