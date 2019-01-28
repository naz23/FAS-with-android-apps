<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json",true);
include "db_config.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "Select * from sos";
$result = $conn->query($sql);
$array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  $array[] = $row;
  
   }
} else {
    echo "0 results";
}
$conn->close();

echo json_encode($array);
?>