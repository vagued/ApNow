<?php

require_once('dbConnect.php');

$idrenting = $_REQUEST["idrenting"];

$result = db_query("INSERT INTO clients (username, password, firstname, lastname, email)
  VALUES ('$username','$password','$firstname','$lastname','$email')");

if($result === false)
    echo "Failed to insert\n";

?>
