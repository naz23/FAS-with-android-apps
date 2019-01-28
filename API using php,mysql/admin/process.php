<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json",true);
include "db_config.php";

$id = $_POST['id'];
$data = $_POST['data'];
$tempIn = "no";
$tempWar = "no";
$tempDan = "no";

if($data == "100"){
 $tempIn = "2m";
 $tempWar = "";
 $tempDan = "";
}

    
if($data == "110"){
  $tempIn = "2m";
  $tempWar = "2.5m";
  $tempDan = "";
}

  
if($data == "111"){
   $tempIn = "2m";
   $tempWar = "2.5m";
   $tempDan = "3m";
}
date_default_timezone_set("Malaysia/Kuala_Lumpur");

$date = date("Y-m-d");
$time = date("h:i:sa");



$sql = "UPDATE monitoring SET increase='$tempIn',warning = '$tempWar' ,danger = '$tempDan ',created_date ='$date',created_time ='$time' WHERE id='$id'";


if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>