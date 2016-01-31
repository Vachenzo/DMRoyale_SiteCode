<?php
$attack_data = mysql_query("SELECT * FROM attacks WHERE character_id = " . $id)  
	or die(mysql_error());
	
while($attack = mysql_fetch_array($attack_data)) { 
	$attack_name = $attack['attack_name'];
	$attack_bonus = $attack['attack_bonus'];
	$attack_damage_type = $attack['attack_damage_type'];
	$attack_description = $attack['attack_description'];
	$attack_id=$attack['attack_id'];
	
	$update_url = "delete_attack.php?id=$id&attack=$attack_id";
	
	echo "<tr><td><input  disabled type='text' name='attack_name[]' id='attack_name'  value='".$attack_name."' REQUIRED></td>\n";
	echo "<td><input  disabled type='text' name='attack_bonus[]' id='attack_bonus' size='10' value='".$attack_bonus."' ></td>\n";
	echo "<td><input  disabled type='text' name='attack_damage_type[]' id='attack_damage_type' size='15' value='".$attack_damage_type."' ></td>\n";
	echo "<td><input  disabled type='text' name='attack_description[]' id='attack_description' size='40' value='".$attack_description."' ></td>\n";
	echo "</tr>\n";	
}
?>