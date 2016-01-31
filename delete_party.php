<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$party=$_GET['party'];

$query = "SELECT * FROM campaign WHERE campaign_id = $id";
$result = mysql_query($query)  or die(mysql_error());
$array = mysql_fetch_array( $result );
$dungeonkey = $array['dungeonkey'];

$sql1 =  "UPDATE character_sheet SET campaign_code=NULL WHERE character_id=$party AND campaign_code='$dungeonkey'";

//verify that user name is correct
if ($array['dungeonmaster'] == $_SESSION['username']){
	if ($conn->query($sql1) === TRUE) {}	
	else{echo mysqli_error($conn);}
}
else{
}

//redirect
header("Location: view_campaign.php?id=$id");
die();

$conn->close();
?>
