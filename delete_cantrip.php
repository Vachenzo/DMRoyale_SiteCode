<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
 include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$cantrip = $_GET['cantrip'];

//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "DELETE FROM cantrips WHERE cantrip_list_id = '$cantrip'";

//query the username
$query = "SELECT * FROM character_sheet WHERE character_id = $id";
//run query
$result = mysql_query($query)  or die(mysql_error());

//put results into array
$array = mysql_fetch_array( $result );

//verify that user name is correct
if ($array['player_name'] == $_SESSION['username']){
	if ($conn->query($sql1) === TRUE) {
	}	
}
else{
	//do nothing

}

//redirect
header("Location: view_cantrips.php?id=$id");
die();

$conn->close();
?>
