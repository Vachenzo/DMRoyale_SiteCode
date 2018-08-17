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
$max_slots1 = mysqli_real_escape_string($conn, $_POST['max_slots1']);
$available_slots1 = mysqli_real_escape_string($conn, $_POST['available_slots1']);
$max_slots2 = mysqli_real_escape_string($conn, $_POST['max_slots2']);
$available_slots2 = mysqli_real_escape_string($conn, $_POST['available_slots2']);
$max_slots3 = mysqli_real_escape_string($conn, $_POST['max_slots3']);
$available_slots3 = mysqli_real_escape_string($conn, $_POST['available_slots3']);
$max_slots4 = mysqli_real_escape_string($conn, $_POST['max_slots4']);
$available_slots4 = mysqli_real_escape_string($conn, $_POST['available_slots4']);
$max_slots5 = mysqli_real_escape_string($conn, $_POST['max_slots5']);
$available_slots5 = mysqli_real_escape_string($conn, $_POST['available_slots5']);
$max_slots6 = mysqli_real_escape_string($conn, $_POST['max_slots6']);
$available_slots6 = mysqli_real_escape_string($conn, $_POST['available_slots6']);
$max_slots7 = mysqli_real_escape_string($conn, $_POST['max_slots7']);
$available_slots7 = mysqli_real_escape_string($conn, $_POST['available_slots7']);
$max_slots8 = mysqli_real_escape_string($conn, $_POST['max_slots8']);
$available_slots8 = mysqli_real_escape_string($conn, $_POST['available_slots8']);
$max_slots9 = mysqli_real_escape_string($conn, $_POST['max_slots9']);
$available_slots9 = mysqli_real_escape_string($conn, $_POST['available_slots9']);

$sql1 = "UPDATE character_sheet SET spellcasting_ability='$spellcasting_ability',  spell_save_dc='$spell_save_dc',  spell_attack_bonus='$spell_attack_bonus', max_slots1=$max_slots1, available_slots1=$available_slots1, max_slots2=$max_slots2, available_slots2=$available_slots2, max_slots3=$max_slots3, available_slots3=$available_slots3, max_slots4=$max_slots4, available_slots4=$available_slots4, max_slots5=$max_slots5, available_slots5=$available_slots5, max_slots6=$max_slots6, available_slots6=$available_slots6, max_slots7=$max_slots7, available_slots7=$available_slots7, max_slots8=$max_slots8, available_slots8=$available_slots8, max_slots9=$max_slots9, available_slots9=$available_slots9 WHERE character_id = '$id' AND player_name = '$player_name'";

 
if ($conn->query($sql1) === TRUE) {
	} 
else {
	}

	
$new_spell = mysqli_real_escape_string($conn, $_POST['new_spell']);

if (!empty($new_spell)){
	
	$spell_level_lookup = mysql_query("SELECT level FROM spell_list WHERE spell_index = $new_spell")  
	or die(mysql_error());
	// puts the info into the $info array  
	$level_array = mysql_fetch_array( $spell_level_lookup );
	
	$level = $level_array['level'];
	
	echo $level;
		
	$spell_insert_sql = "INSERT INTO character_spells (character_id, spell_list_id, player_name, level) VALUES ($id, '$new_spell', '$player_name', $level)";
	if ($conn->query($spell_insert_sql) === TRUE) {
		//echo "true";
		}
	else{echo "Error: " . $spell_insert_sql . "<br>" . $conn->error;
		}
	}	
	
	
/*  COMMENTED OUT, USE FOR CUSTOM SPELLS LATER ON
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
$spell_range = $_POST['spell_range'];
$description = $_POST['description'];

$prepared = $_POST['prepared'];




for($i = 0; $i < count($cantrip_id); $i++){
	$cantrip_level_array = mysqli_real_escape_string($conn, $cantrip_level[$i]);
	$cantrip_name_array = mysqli_real_escape_string($conn, $cantrip_name[$i]);
	$cantrip_id_array =mysqli_real_escape_string($conn, $cantrip_id[$i]);
	$spell_range_array =mysqli_real_escape_string($conn, $spell_range[$i]);
	$description_array =mysqli_real_escape_string($conn, $description[$i]);
	$prepared_array =mysqli_real_escape_string($conn, $prepared[$i]);
	$sql3 ="UPDATE cantrips SET cantrip_level=$cantrip_level_array, cantrip_name='$cantrip_name_array', spell_range='$spell_range_array', character_id=$id, description='$description_array', prepared=$prepared_array WHERE cantrip_list_id = '$cantrip_id_array'";
	if ($conn->query($sql3) === TRUE) {	
	}
	else{
	}
}-*/

//header("Location: view_cantrips.php?id=$id");
//die();

$conn->close();
?>
