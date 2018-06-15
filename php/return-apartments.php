<?php

require_once('dbConnect.php');

$result = db_query("SELECT idapartment, title FROM apartments");

$rows = mysql_num_rows($result);

if($rows==0)
	echo 'No apartments for the selected location.';
else
{
  while($row = mysql_fetch_array($result))
  {
    echo json_encode( array(
      "idapartment" => $row['idapartment'],
      "title" => $row['title']
    ));
  }
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
