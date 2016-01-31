<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
 
include 'includes/connections.php'; 

//define the character_sheet values as variables so they can be called in the SQL injection
$character_name = mysqli_real_escape_string($conn, $_POST['charactername']);
//Grab the player name from the current session
$player_name = $_SESSION['username'];
//Inject the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "INSERT INTO character_sheet (character_name, player_name) VALUES ('$character_name', '$player_name')"; 

//check that the connection to each of the tables works and produce the success message
if ($conn->query($sql1) === TRUE) {
	//redirect
	header("Location: user_profile.php");
	die();
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$conn->close();
?>
