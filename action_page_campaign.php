<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();

include 'includes/connections.php';

$campaignname = mysqli_real_escape_string($conn, $_POST['campaignname']);
$dungeonmaster = $_SESSION['username'];
$dungeonkey = md5(microtime().rand());

//Inject the values from the form into the database, the queries need to have different names, or only one of them will insert data into their table
$sql1 = "INSERT INTO campaign (campaignname, dungeonmaster, dungeonkey) VALUES ('$campaignname', '$dungeonmaster', '$dungeonkey')"; 



//check that the connection to each of the tables works and produce the success message
if ($conn->query($sql1) === TRUE) {
	//redirect
	header("Location: user_profile.php");
	die();	
} else {
}


	
$conn->close();
?>

