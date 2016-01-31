<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

include 'includes/connections.php';
 
$id = $_GET['id'];

$player_name =  $_SESSION['username'];
$spellcasting_ability = mysqli_real_escape_string($conn, $_POST['spellcasting_ability']);
$spell_save_dc = mysqli_real_escape_string($conn, $_POST['spell_save_dc']);
$spell_attack_bonus = mysqli_real_escape_string($conn, $_POST['spell_attack_bonus']);

$sql1 = "UPDATE character_sheet SET spellcasting_ability='$spellcasting_ability',  spell_save_dc='$spell_save_dc',  spell_attack_bonus='$spell_attack_bonus' WHERE character_id = '$id' AND player_name = '$player_name'";

if ($conn->query($sql1) === TRUE) {
	} 
else {
	}

//new cantrip
$insert_spells = mysqli_real_escape_string($conn, $_POST['insert_spells']);

if (!empty($insert_spells)){
	for($n=0; $n<$insert_spells; $n++){
		$sql2 = "INSERT INTO cantrips (character_id, player_name) VALUES($id, '$player_name')";
		if ($conn->query($sql2) === TRUE) {
			}
		else{
			}
		}
	}

//update cantrips
$cantrip_level = $_POST['cantrip_level'];
$cantrip_name =  $_POST['cantrip_name'];
$cantrip_id = $_POST['cantrip_id'];
$description = $_POST['description'];

for($i = 0; $i < count($cantrip_id); $i++){
	$cantrip_level_array = mysqli_real_escape_string($conn, $cantrip_level[$i]);
	$cantrip_name_array = mysqli_real_escape_string($conn, $cantrip_name[$i]);
	$cantrip_id_array =mysqli_real_escape_string($conn, $cantrip_id[$i]);
	$description_array =mysqli_real_escape_string($conn, $description[$i]);
	$sql3 ="UPDATE cantrips SET cantrip_level=$cantrip_level_array, cantrip_name='$cantrip_name_array', character_id=$id, description='$description_array' WHERE cantrip_list_id = '$cantrip_id_array'";
	if ($conn->query($sql3) === TRUE) {	
	}
	else{
	}
}

header("Location: view_cantrips.php?id=$id");
die();

$conn->close();
?>
