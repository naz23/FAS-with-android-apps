<?php
$servername = "localhost";
$username = "yen";
$password = "senyum";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$increase = $_POST['increase'];
$danger = $_POST['danger'];
$warning = $_POST['warning'];




$sql = "Insert INTO testing (increase,warning,danger) Values('$increase','$warning','$danger')";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>