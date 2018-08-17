<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
include 'includes/connections.php';

//get the id's
$id = $_GET['id'];
$image_id = $_GET['image'];

$image_data = mysql_query("SELECT * FROM character_images WHERE image_id = $image_id")  
		or die(mysql_error());
$image = mysql_fetch_array($image_data);

$image_file_name = $image['img_file_name'];

unlink ($image_file_name);


//Delete query
$sql1 = "DELETE FROM character_images WHERE image_id = '$image_id'";

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
header("Location: view_story.php?id=$id");
die();

$conn->close();
?>
