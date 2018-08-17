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
$duration = mysqli_real_escape_string($conn, $_POST['duration']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$materials = mysqli_real_escape_string($conn, $_POST['materials']);

//Add to spell list
$spell_insert_sql = "INSERT INTO pc_custom_spell (name, level, spell_school, casting_time, spell_range, v, s, m, duration, description, materials, character_id, player_name) VALUES ('$spell_name', $level, '$spell_school', '$casting_time', '$spell_range', '$component_v', '$component_s', '$component_m', '$duration', '$description', '$materials', $id, '$player_name')";
if ($conn->query($spell_insert_sql) === TRUE) {
	
	}
else{//echo "Error: " . $spell_insert_sql . "<br>" . $conn->error;
	}

//get the max id for the character spells
$get_max_id= mysql_query("SELECT MAX(spell_index) FROM pc_custom_spell WHERE character_id = $id")  
	or die(mysql_error());
//$max_id = mysql_fetch_array($get_max_id);
$row = mysql_fetch_row($get_max_id);
$max_id = $row[0];

//echo $max_id;

//Add reference ids to character spell list
$character_spell_insert_sql = "INSERT INTO character_spells (character_id, player_name, spell_list_id, level) VALUES ($id, '$player_name', $max_id, $level)";
if ($conn->query($character_spell_insert_sql) === TRUE) {
	
	}
else{
	}
		
header("Location: view_cantrips.php?id=$id");
die();

$conn->close();
?>
