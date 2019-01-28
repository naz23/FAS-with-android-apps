<?php

$servername = "mysql13.000webhost.com";
$username = "a2808146_yen";
$password = "senyum23";
$dbname = "a2808146_flood";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>