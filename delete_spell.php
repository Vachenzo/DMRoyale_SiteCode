<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
 include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$spell = $_GET['spell'];
$player_name =  $_SESSION['username'];

//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "DELETE FROM character_spells WHERE spell_list_id = '$spell' AND character_id = $id AND player_name LIKE '$player_name'";

if ($conn->query($sql1) === TRUE) {
	//echo "Error: " . $sql1 . "<br>" . $conn->error;
}	

else{
	//do nothing
	//echo "Error: " . $sql1 . "<br>" . $conn->error;
	
}

//redirect
header("Location: view_cantrips.php?id=$id");
die();

$conn->close();
?>
