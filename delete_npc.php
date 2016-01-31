<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$npc = $_GET['npc'];

//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "DELETE FROM npc WHERE npc_id = '$npc'";

//query the username
$query = "SELECT * FROM campaign WHERE campaign_id = $id";
//run query
$result = mysql_query($query)  or die(mysql_error());

//put results into array
$array = mysql_fetch_array( $result );

//verify that user name is correct
if ($array['dungeonmaster'] == $_SESSION['username']){
	if ($conn->query($sql1) === TRUE) {
	}	
}
else{
	//do nothing

}

//redirect
header("Location: view_campaign.php?id=$id");
die();

$conn->close();
?>
