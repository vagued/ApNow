<?php

require_once('dbConnect.php');

$result = db_query("SELECT idapartment, title FROM apartments");

$rows = mysqli_num_rows($result);

if($rows==0)
	echo 'No apartments for the selected location.';
else
{
	$data=array(1,"asd");
  while($row = mysqli_fetch_array($result))
  {
     array_merge(data, array(
      "idapartment" => $row['idapartment'],
      "title" => $row['title']
    ));
  }
	echo json_encode(data);
}

// var data = {};
// if (responseText.indexOf("NOT A VALID") == -1) {
//     data = JSON.parse(responseText);
// }
// // Check the values or just place an empty string if undefined
// document.getElementById("whse" + userNumber).innerHTML = data.warehouse || '';
// document.getElementById("txtHint" + userNumber).innerHTML = data.description || '';
// document.getElementById("su" + userNumber).innerHTML = data.sellingunits || '';
// document.getElementById("suqty" + userNumber).innerHTML = data.suqty || '';
// document.getElementById("category" + userNumber).innerHTML = data.category || '';

?>
