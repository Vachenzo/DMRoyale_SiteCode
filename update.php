<?php
include 'includes/connections.php';

$id = $_GET['id'];

//grab the details from POST
$character_name = mysqli_real_escape_string($conn, $_POST['charactername']);
$level = mysqli_real_escape_string($conn, $_POST['level']);
$experience = mysqli_real_escape_string($conn, $_POST['experience']);
$inspiration = mysqli_real_escape_string($conn, $_POST['inspiration']);
$class_level = mysqli_real_escape_string($conn, $_POST['classlevel']);
$background = mysqli_real_escape_string($conn, $_POST['background']);
$race = mysqli_real_escape_string($conn, $_POST['race']);
$alignment = mysqli_real_escape_string($conn, $_POST['alignment']);
$alignment = mysqli_real_escape_string($conn, $_POST['alignment']);
$max_hp = mysqli_real_escape_string($conn, $_POST['max_hp']);
$current_hp = mysqli_real_escape_string($conn, $_POST['current_hp']);
$armor = mysqli_real_escape_string($conn, $_POST['armor']);
$speed = mysqli_real_escape_string($conn, $_POST['speed']);
$hit_dice = mysqli_real_escape_string($conn, $_POST['hit_dice']);
$death_success = mysqli_real_escape_string($conn, $_POST['death_success']);
$death_fail = mysqli_real_escape_string($conn, $_POST['death_fail']);
$initiative = mysqli_real_escape_string($conn, $_POST['initiative']);

//grab the skills from POST
$str_skill = mysqli_real_escape_string($conn, $_POST['str_skill']);
$dex_skill = mysqli_real_escape_string($conn, $_POST['dex_skill']);
$con_skill = mysqli_real_escape_string($conn, $_POST['con_skill']);
$int_skill = mysqli_real_escape_string($conn, $_POST['int_skill']);
$wis_skill = mysqli_real_escape_string($conn, $_POST['wis_skill']);
$chr_skill = mysqli_real_escape_string($conn, $_POST['chr_skill']);

//grab the currency from POST
$cp_count = mysqli_real_escape_string($conn, $_POST['cp']);
$sp_count = mysqli_real_escape_string($conn, $_POST['sp']);
$ep_count = mysqli_real_escape_string($conn, $_POST['ep']);
$gp_count = mysqli_real_escape_string($conn, $_POST['gp']);
$pp_count = mysqli_real_escape_string($conn, $_POST['pp']);

//grab the proficiencies from POST
$Athletics = mysqli_real_escape_string($conn, $_POST['Athletics']);
if ($Athletics == null) { $Athletics = 0;}
$Acrobatics = mysqli_real_escape_string($conn, $_POST['Acrobatics']);
if ($Acrobatics == null) { $Acrobatics = 0;}
$Slight_of_Hand = mysqli_real_escape_string($conn, $_POST['Slight_of_Hand']);
if ($Slight_of_Hand == null) { $Slight_of_Hand = 0;}
$Stealth = mysqli_real_escape_string($conn, $_POST['Stealth']);
if ($Stealth == null) { $Stealth = 0;}
$Arcana = mysqli_real_escape_string($conn, $_POST['Arcana']);
if ($Arcana == null) { $Arcana = 0;}
$History = mysqli_real_escape_string($conn, $_POST['History']);
if ($History == null) { $History = 0;}
$Investigation = mysqli_real_escape_string($conn, $_POST['Investigation']);
if ($Investigation == null) { $Investigation = 0;}
$Nature = mysqli_real_escape_string($conn, $_POST['Nature']);
if ($Nature == null) { $Nature = 0;}
$Religion = mysqli_real_escape_string($conn, $_POST['Religion']);
if ($Religion == null) { $Religion = 0;}
$Animal_Handling = mysqli_real_escape_string($conn, $_POST['Animal_Handling']);
if ($Animal_Handling == null) { $Animal_Handling = 0;}
$Insight = mysqli_real_escape_string($conn, $_POST['Insight']);
if ($Insight == null) { $Insight = 0;}
$Medicine = mysqli_real_escape_string($conn, $_POST['Medicine']);
if ($Medicine == null) { $Medicine = 0;}
$Perception = mysqli_real_escape_string($conn, $_POST['Perception']);
if ($Perception == null) { $Perception = 0;}
$Survival = mysqli_real_escape_string($conn, $_POST['Survival']);
if ($Survival == null) { $Survival = 0;}
$Deception = mysqli_real_escape_string($conn, $_POST['Deception']);
if ($Deception == null) { $Deception = 0;}
$Intimidation = mysqli_real_escape_string($conn, $_POST['Intimidation']);
if ($Intimidation == null) { $Intimidation = 0;}
$Performance = mysqli_real_escape_string($conn, $_POST['Performance']);
if ($Performance == null) { $Performance = 0;}
$Persuasion = mysqli_real_escape_string($conn, $_POST['Persuasion']);
if ($Persuasion == null) { $Persuasion = 0;}

//Update the fields listed above
$sql1 = "UPDATE character_sheet SET character_name='$character_name', level=$level, inspiration=$inspiration, experience=$experience, class_level='$class_level', background='$background', race='$race', alignment='$alignment', max_hp=$max_hp, current_hp=$current_hp, armor=$armor, speed=$speed, hit_dice='$hit_dice', death_success=$death_success, death_fail=$death_fail, initiative=$initiative, str_skill=$str_skill, dex_skill=$dex_skill, con_skill=$con_skill, int_skill=$int_skill, wis_skill=$wis_skill, chr_skill=$chr_skill, cp_count=$cp_count, sp_count=$sp_count, ep_count=$ep_count, gp_count=$gp_count, pp_count=$pp_count, Athletics='$Athletics', Acrobatics='$Acrobatics', Slight_of_Hand='$Slight_of_Hand', Stealth='$Stealth', Arcana='$Arcana', History='$History', Investigation='$Investigation', Nature='$Nature', Religion='$Religion', Animal_Handling='$Animal_Handling', Insight='$Insight', Medicine='$Medicine', Perception='$Perception', Survival='$Survival', Deception='$Deception', Intimidation='$Intimidation', Persuasion='$Persuasion', Performance='$Performance'  WHERE character_id = '$id'";

if ($conn->query($sql1) === TRUE) {
	} 
else {
	//display an error if problems arise
	echo "Error: " . $sql1 . "<br>" . $conn->error;
}

/*END CHARACTER DETAILS*/

/*BEGIN ITEMS*/

//grab the new items from POST
$item_count = mysqli_real_escape_string($conn, $_POST['new_item_count']);
$item_name = mysqli_real_escape_string($conn, $_POST['new_item_name']);
$item_weight = mysqli_real_escape_string($conn, $_POST['new_item_weight']);

//If the item name field is not empty, run the insert script
if (!empty($item_name)){
	$sql2 = "INSERT INTO items (item_count, item_name, item_weight, character_id) VALUES($item_count, '$item_name', '$item_weight', $id)";
	if ($conn->query($sql2) === TRUE) {
		}
	else{
		//display an error if problems arise
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}



//grab the existing items from POST
$item_count2 = $_POST['item_count'];
$item_name2 =  $_POST['item_name'];
$item_weight2 =  $_POST['item_weight'];
$item_id2 = $_POST['item_id'];

//count the number of id's submitted in the array
for($i = 0; $i < count($item_id2); $i++){
	//escape everything
	$item_count_array = mysqli_real_escape_string($conn, $item_count2[$i]);
	$item_name_array = mysqli_real_escape_string($conn, $item_name2[$i]);
	$item_id_array =mysqli_real_escape_string($conn, $item_id2[$i]);
	$item_weight_array =mysqli_real_escape_string($conn, $item_weight2[$i]);
	
	//run the Update script
	$sql3 ="UPDATE items SET item_count=$item_count_array, item_name='$item_name_array', item_weight='$item_weight_array' WHERE item_id = '$item_id_array'";

	if ($conn->query($sql3) === TRUE) {	
		}
	else{
		//display an error if problems arise
		echo "Error: " . $sql3 . "<br>" . $conn->error;
		}
	}

/*END ITEMS*/

/*BEGIN ATTACKS*/
	
//new attacks escaped
$new_attack_name = mysqli_real_escape_string($conn, $_POST['new_attack_name']);
$new_attack_bonus = mysqli_real_escape_string($conn, $_POST['new_attack_bonus']);
$new_attack_damage_type = mysqli_real_escape_string($conn, $_POST['new_attack_damage_type']);
$new_attack_description = mysqli_real_escape_string($conn, $_POST['new_attack_description']);

//Check if the new item_name field is not empty, then insert the attack into the DB
if (!empty($new_attack_name)){
	$sql2 = "INSERT INTO attacks (attack_name, attack_bonus, attack_damage_type, attack_description, character_id) VALUES('$new_attack_name', '$new_attack_bonus', '$new_attack_damage_type', '$new_attack_description' , $id)";

	if ($conn->query($sql2) === TRUE) {
	
	}
	else{
		//display an error if problems arise
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}

//grab the existing attacks from POST
$attack_name = $_POST['attack_name'];
$attack_bonus =  $_POST['attack_bonus'];
$attack_damage_type = $_POST['attack_damage_type'];
$attack_id = $_POST['attack_id'];
$attack_description = $_POST['attack_description'];

//Check the number of attacks and assign them a temporary number while the loop goes an updates each line by line
for($i = 0; $i < count($attack_id); $i++){
	//escape the strings and assign $i
	$attack_name_array = mysqli_real_escape_string($conn, $attack_name[$i]);
	$attack_bonus_array = mysqli_real_escape_string($conn, $attack_bonus[$i]);
	$attack_damage_type_array = mysqli_real_escape_string($conn, $attack_damage_type[$i]);
	$attack_id_array =mysqli_real_escape_string($conn, $attack_id[$i]);
	$attack_description_array =mysqli_real_escape_string($conn, $attack_description[$i]);
	
	//Run the update
	$sql3 ="UPDATE attacks SET attack_name='$attack_name_array', attack_bonus='$attack_bonus_array', attack_damage_type='$attack_damage_type_array', attack_description='$attack_description_array' WHERE attack_id = '$attack_id_array'";

	if ($conn->query($sql3) === TRUE) {	
		$del_sql = "DELETE FROM attacks WHERE del='delete'";
		if ($conn->query($del_sql) === TRUE) {	
		}
		else{
		}
	}
	else{
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
}

/*END ATTACKS*/

/*BEGIN PROFLANGS*/

//new proflang escaped
$new_proflang_name = mysqli_real_escape_string($conn, $_POST['new_proflang_name']);
$new_proflang_description = mysqli_real_escape_string($conn, $_POST['new_proflang_description']);

//Check if the new proflang_name field is not empty, then insert the item into the DB
if (!empty($new_proflang_name)){
	$sql2 = "INSERT INTO proficiency_language (proflang_name, character_id, proflang_description) VALUES('$new_proflang_name',  $id, '$new_proflang_description')";

	if ($conn->query($sql2) === TRUE) {
	}
	else{
		//produce error message if something is wrong
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}

//define the variables 
$proflang_name = $_POST['proflang_name'];
$proflang_description = $_POST['proflang_description'];
$proflang_id = $_POST['proflang_id'];


//Check the number of proflang and assign them a temporary number while the loop goes an updates each line by line
for($i = 0; $i < count($proflang_id); $i++){
	//escape the strings and assign $i
	$proflang_name_array = mysqli_real_escape_string($conn, $proflang_name[$i]);
	$proflang_description_array = mysqli_real_escape_string($conn, $proflang_description[$i]);
	$proflang_id_array =mysqli_real_escape_string($conn, $proflang_id[$i]);

	//Run the update
	$sql3 ="UPDATE proficiency_language SET proflang_name='$proflang_name_array', proflang_description='$proflang_description_array' WHERE proflang_id = '$proflang_id_array'";
	
	if ($conn->query($sql3) === TRUE) {	
	}
	else{
		//produce error message if something is wrong
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
}

//redirect back to the page
header("Location: view_character.php?id=$id");
die();

$conn->close();
?>
