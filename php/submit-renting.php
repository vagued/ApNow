<?php

require_once('dbConnect.php');

$idapartment = $_GET["ida"];
$idclient = $_GET["idc"];
$checkin = date('Y-m-d', strtotime($_GET["cin"]));
$checkout = date('Y-m-d', strtotime($_GET["cout"]));

$result1 = db_query("
  SELECT apartments.checkin <= '$checkin' AND apartments.checkout >= '$checkout' " .
  "FROM apartments " .
  "WHERE apartments.idapartment=$idapartment");

$result2 = db_query("
  SELECT IF" .
  "(" .
    "(SELECT count(*) FROM rentings " .
    "WHERE rentings.idapartment=$idapartment " .
    "AND rentings.checkin <= '$checkin' " .
    "AND rentings.checkout >= '$checkout'" .
  ")=0," .
  "'1', '0')"
);

if($result1 === false)
    echo "Failed to insert #1\n";

if($result2 === false)
    echo "Failed to insert #2\n";

mysqli_data_seek($result1,1);
$row=mysqli_fetch_row($result1);
$r1=$row[0];

mysqli_data_seek($result2,1);
$row=mysqli_fetch_row($result2);
$r2=$row[0];

// echo $r1;
// echo $r2;

if($r1&&$r2)
{
  echo 1;

  $result3 = db_query("" .
    "INSERT INTO rentings (idclient, idapartment, checkin, checkout)
      VALUES ('$idclient','$idapartment','$checkin','$checkout')");

  if($result3 === false)
      echo "Failed to insert #3\n";
}
else
{
  echo 0;
}

?>
