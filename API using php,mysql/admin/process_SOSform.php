<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json",true);
include "db_config.php";


$name = $_POST['name'];
$Total_member = $_POST['total_member'];
$Lat = $_POST['latitude'];
$long = $_POST['longitude'];
$date = date("Y-m-d");
date_default_timezone_set("Malaysia/Kuala_lumpur");
$time = date("h:i:sa");

$sql = "INSERT INTO sos(Name,Total_members,latitude,longitude,created_date,Created_time) Values('$name','$Total_member','$Lat','$long','$date','$time')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>