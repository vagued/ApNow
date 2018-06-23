<?php

require_once('dbConnect.php');

$idrenting = $_REQUEST["idr"];
$rating = $_REQUEST["rating"];
$comment = $_REQUEST["comment"];

if(empty($comment))
{
  $result = db_query("UPDATE rentings
    SET rating=$rating
    WHERE idrenting=$idrenting");
}

else {
  $result = db_query("UPDATE rentings
    SET rating=$rating, comment=$comment
    WHERE idrenting=$idrenting");
}

if($result === false)
  echo 0;
else
  echo 1;

?>
