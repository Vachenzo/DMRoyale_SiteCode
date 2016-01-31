<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

include 'includes/connections.php';

$id = $_GET['id'];
$dungeonmaster =  $_SESSION['username'];

//////Party Notes
$char_id = $_POST['character_id'];
$character_notes = $_POST['character_notes'];
$character_initiative = $_POST['initiative'];

for($i = 0; $i < count($char_id); $i++){
	$char_id_array = mysqli_real_escape_string($conn, $char_id[$i]);
	$character_notes_array = mysqli_real_escape_string($conn, $character_notes[$i]);
	$character_initiative_array = mysqli_real_escape_string($conn, $character_initiative[$i]);
	$sql3 ="UPDATE character_sheet SET initiative=$character_initiative_array, character_notes='$character_notes_array' WHERE character_id = '$char_id_array'";

	if ($conn->query($sql3) === TRUE) {
	}
	else{
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
}

//////Campaign Notes
$campaign_notes = mysqli_real_escape_string($conn, $_POST['campaign_notes']);
$sql_CN ="UPDATE campaign SET campaign_notes = '$campaign_notes' WHERE campaign_id = '$id' AND dungeonmaster = '$dungeonmaster'";
if ($conn->query($sql_CN) === TRUE) {	
}
else{
	echo "Error: " . $sql_CN . "<br>" . $conn->error;
}

//////NPC
//New NPC
$new_npc_name = mysqli_real_escape_string($conn, $_POST['new_npc_name']);
$new_npc_desc = mysqli_real_escape_string($conn, $_POST['new_npc_desc']);
if (!empty($new_npc_name)){
	$new_npc = "INSERT INTO npc (npc_name, npc_desc, campaign_id) VALUES('$new_npc_name', '$new_npc_desc', $id)";
	if ($conn->query($new_npc) === TRUE) {

	}
	else{
		echo "Error: " . $new_npc . "<br>" . $conn->error;
	}
}

//update NPC
$npc_name = $_POST['npc_name'];
$npc_desc =  $_POST['npc_desc'];
$npc_id = $_POST['npc_id'];
$del_npc = $_POST['del_npc'];

for($i = 0; $i < count($npc_id); $i++){
	$npc_name_array = mysqli_real_escape_string($conn, $npc_name[$i]);
	$npc_desc_array = mysqli_real_escape_string($conn, $npc_desc[$i]);
	$npc_id_array =mysqli_real_escape_string($conn, $npc_id[$i]);
	$del_npc_array = mysqli_real_escape_string($conn, $del_npc[$i]);
	$update_npc ="UPDATE npc SET npc_name='$npc_name_array',  npc_desc='$npc_desc_array', del='$del_npc_array' WHERE  npc_id='$npc_id_array'";
	if ($conn->query($update_npc) === TRUE) {	
		$del_sql = "DELETE FROM npc WHERE del='delete'";
		if ($conn->query($del_sql) === TRUE) {	
			//echo "true";
		}
		else{
		}
	}
	else{
	}

}

header("Location: view_campaign.php?id=$id");
die();
$conn->close();
?>