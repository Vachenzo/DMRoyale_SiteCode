<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
 
 include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$attack = $_GET['attack'];

//update the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "DELETE FROM attacks WHERE attack_id = '$attack'";

//query the username
$query = "SELECT * FROM character_sheet WHERE character_id = $id";
//run query
$result = mysql_query($query)  or die(mysql_error());

//put results into array
$array = mysql_fetch_array( $result );

/*
if ($conn->query($sql1) === TRUE) {
	}	
*/

//verify that user name is correct
if ($array['player_name'] == $_SESSION['username']){
	if ($conn->query($sql1) === TRUE) {
	}	
}
else{
	//do nothing

}

//redirect
header("Location: view_character.php?id=$id#attacks");
die();

$conn->close();
?>
