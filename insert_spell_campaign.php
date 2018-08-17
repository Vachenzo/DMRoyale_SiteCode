<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

include 'includes/connections.php';
 
$id = $_GET['id'];
$player_name =  $_SESSION['username'];
$spell_name = mysqli_real_escape_string($conn, $_POST['spell_name']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$spell_school = mysqli_real_escape_string($conn, $_POST['spell_school']);
$casting_time = mysqli_real_escape_string($conn, $_POST['casting_time']);
$spell_range = mysqli_real_escape_string($conn, $_POST['range']);
$component_v = mysqli_real_escape_string($conn, $_POST['component_v']);
$component_s = mysqli_real_escape_string($conn, $_POST['component_s']);
$component_m = mysqli_real_escape_string($conn, $_POST['component_m']);
$materials = mysqli_real_escape_string($conn, $_POST['materials']);
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$description = mysqli_real_escape_string($conn, $_POST['description']);

//get the campaign key
$campaigndata = mysql_query("SELECT * FROM campaign WHERE campaign_id = ".$id." AND dungeonmaster = '".$_SESSION['username']."'")    
	or die(mysql_error());
$campaigninfo = mysql_fetch_array( $campaigndata );
$dungeonkey = $campaigninfo['dungeonkey'];


//Add to spell list
$spell_insert_sql = "INSERT INTO pc_custom_spell (name, level, spell_school, casting_time, spell_range, v, s, m, materials, duration, description, campaign_code, player_name) VALUES ('$spell_name', $level, '$spell_school', '$casting_time', '$spell_range', '$component_v', '$component_s', '$component_m', '$materials', '$duration', '$description', '$dungeonkey', '$player_name')";
if ($conn->query($spell_insert_sql) === TRUE) {
	
	}
else{//echo "Error: " . $spell_insert_sql . "<br>" . $conn->error;
	}

		
header("Location: view_campaign.php?id=$id");
die();
$conn->close();
?>
