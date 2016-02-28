<?php

$servername = "localhost";
$username = "dmroyale";
$password = "U2Ac1m4y7g";
$dbname = "dmroyale_test";

// Create connection and check error - for queries
mysql_connect($servername, $username, $password) 
	or die(mysql_error());
mysql_select_db($dbname) 
	or die(mysql_error());

// Create connection and check error - for updates
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>