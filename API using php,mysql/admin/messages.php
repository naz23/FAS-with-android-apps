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
echo "<br><table border='1'>
<tr>
<th>Name</th>
<th>total members</th>
<th>latitude</th>
<th>longitude</th>
<th>Date</th>
<th>time</th>
</tr>";
$count = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          echo "<tr>";
           echo "<td>" . $row['Name'] . "</td>";
	   echo "<td>" . $row['Total_members'] . "</td>";
	   echo "<td>" . $row['latitude'] . "</td>";
	   echo "<td>" . $row['longitude'] . "</td>";
           echo "<td>" . $row['created_date'] . "</td>";
           echo "<td>" . $row['Created_time'] . "</td>";
	   echo "</tr>";
	   
	   
   }
   echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
function getAddress($lat, $lon){
   $url  = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".
            $lat.",".$lon."&sensor=false";
   $json = @file_get_contents($url);
   $data = json_decode($json);
   $status = $data->status;
   $address = '';
   if($status == "OK"){
      $address = $data->results[0]->formatted_address;
    }
   return $address;
  }
  
?>