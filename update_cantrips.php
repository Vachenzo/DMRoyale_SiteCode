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
$ki_points = mysqli_real_escape_string($conn, $_POST['ki_points']);

$sql1 = "UPDATE character_sheet SET spellcasting_ability='$spellcasting_ability',  spell_save_dc='$spell_save_dc',  spell_attack_bonus='$spell_attack_bonus', max_slots1=$max_slots1, available_slots1=$available_slots1, max_slots2=$max_slots2, available_slots2=$available_slots2, max_slots3=$max_slots3, available_slots3=$available_slots3, max_slots4=$max_slots4, available_slots4=$available_slots4, max_slots5=$max_slots5, available_slots5=$available_slots5, max_slots6=$max_slots6, available_slots6=$available_slots6, max_slots7=$max_slots7, available_slots7=$available_slots7, max_slots8=$max_slots8, available_slots8=$available_slots8, max_slots9=$max_slots9, available_slots9=$available_slots9, ki_points=$ki_points WHERE character_id = '$id' AND player_name = '$player_name'";

 
if ($conn->query($sql1) === TRUE) {
	} 
else {
	}

	
$new_spell = mysqli_real_escape_string($conn, $_POST['new_spell']);


if (!empty($new_spell)){
	
	if ($new_spell < 1000){
		$spell_level_lookup = mysql_query("SELECT * FROM spell_list WHERE spell_index = $new_spell")  
		or die(mysql_error());
		// puts the info into the $info array  
		$level_array = mysql_fetch_array( $spell_level_lookup );

		$level = $level_array['level'];

		//echo $level;
			
		$spell_insert_sql = "INSERT INTO character_spells (character_id, spell_list_id, player_name, level) VALUES ($id, '$new_spell', '$player_name', $level)";
		if ($conn->query($spell_insert_sql) === TRUE) {
			//echo $spell_insert_sql;
			}
		else{//echo "Error: " . $spell_insert_sql . "<br>" . $conn->error;
			}
	}
	if ($new_spell > 1000){
		$spell_level_lookup = mysql_query("SELECT * FROM pc_custom_spell WHERE spell_index = $new_spell")  
		or die(mysql_error());
		// puts the info into the $info array  
		$level_array = mysql_fetch_array( $spell_level_lookup );

		$level = $level_array['level'];

		//echo $level;
			
		$spell_insert_sql = "INSERT INTO character_spells (character_id, spell_list_id, player_name, level) VALUES ($id, '$new_spell', '$player_name', $level)";
		if ($conn->query($spell_insert_sql) === TRUE) {
			//echo $spell_insert_sql;
			}
		else{//echo "Error: " . $spell_insert_sql . "<br>" . $conn->error;
			}
		}			
	}	

header("Location: view_cantrips.php?id=$id");
die();

$conn->close();
?>
