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
$sql = "Select * from river JOIN monitoring where river.id=monitoring.id";
$result = $conn->query($sql);
$array = array();
echo "<br><table border='1'>
<tr>
<th>River name</th>
<th>City name</th>
<th>Increase</th>
<th>Warning</th>
<th>Danger</th>
<th>Date</th>
<th>Time</th>


</tr>";
$count = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	   echo "<tr>";
       echo "<td>" . $row['River_name'] . "</td>";
	   echo "<td>" . $row['City_name'] . "</td>";
	   echo "<td>" . $row['increase'] . "</td>";
	   echo "<td>" . $row['warning'] . "</td>";
	   echo "<td>" . $row['danger'] . "</td>";
	   echo "<td>" . $row['created_date'] . "</td>";
           echo "<td>" . $row['created_time'] . "</td>";
       echo "</tr>";
	   
	   
   }
   echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

  
?>