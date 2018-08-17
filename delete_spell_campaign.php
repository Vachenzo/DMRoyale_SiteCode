<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
 include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$spell = $_GET['spell'];
$player_name =  $_SESSION['username'];

//get the campaign key
$get_campaign_key = mysql_query("SELECT dungeonkey FROM campaign WHERE campaign_id = '$id' AND dungeonmaster LIKE '$player_name'")  
	or die(mysql_error());
$campaign_key_array = mysql_fetch_array($get_campaign_key);
$campaign_key = $campaign_key_array['dungeonkey'];




//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "DELETE FROM pc_custom_spell WHERE spell_index = '$spell' AND campaign_code LIKE '$campaign_key' AND player_name LIKE '$player_name'";

if ($conn->query($sql1) === TRUE) {
	//echo "Error: " . $sql1 . "<br>" . $conn->error;
	//echo $campaign_key;
}	

else{
	//echo "error";
	//do nothing
	//echo "Error: " . $sql1 . "<br>" . $conn->error;
	
}

//redirect
header("Location: view_campaign.php?id=$id");
die();

$conn->close();


?>
