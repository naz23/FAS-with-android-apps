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
$sql = "Select * from river JOIN monitoring where river.city_name = 'Kuala Lumpur' and river.id=monitoring.id";
$result = $conn->query($sql);
$array = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Name: " . $row["River_name"]."<br>"."City: " . $row["City_name"]."<br>"."Increase: " . $row["increase"]."<br>"."Warning: " . $row["warning"]. "<br>"."Danger :" . $row["danger"]."<br>";
  $array = $row;
   }
} else {
    echo "0 results";
}
$conn->close();
echo json_encode($array);

?>