<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
include 'includes/connections.php';

//get the id's
$id = $_GET['id'];

//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 =  "UPDATE campaign SET dungeonmaster=NULL WHERE campaign_id = $id";

//query the username
$query = "SELECT * FROM campaign WHERE campaign_id = $id";
//run query
$result = mysql_query($query)  or die(mysql_error());

//put results into array
$array = mysql_fetch_array( $result );

//get the code
$dungeonkey = $array['dungeonkey'] ;

//update character sheets
$sql2 =  "UPDATE character_sheet SET campaign_code=NULL WHERE campaign_code='$dungeonkey'";

//verify that user name is correct
if ($array['dungeonmaster'] == $_SESSION['username']){
	if ($conn->query($sql1) === TRUE) {
		//remove DM from campaign
	}	
	if ($conn->query($sql2) === TRUE) {
		//remove campaign from characters
	}	
	else{
		}
	}
else{
	}

//redirect
header("Location: user_profile.php");
die();

$conn->close();
?>
