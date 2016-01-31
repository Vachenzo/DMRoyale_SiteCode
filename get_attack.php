<?php

$attack_data = mysql_query("SELECT * FROM attacks WHERE character_id = " . $id)  
	or die(mysql_error());
	
while($attack = mysql_fetch_array($attack_data)) { 
	$DBName = $attack['attack_name'];
	$attack_name = htmlspecialchars($DBName, ENT_QUOTES);
	$attack_bonus = $attack['attack_bonus'];
	$attack_damage_type = $attack['attack_damage_type'];
	$DBName2 = $attack['attack_description'];
	$attack_description = htmlspecialchars($DBName2, ENT_QUOTES);
	$attack_id=$attack['attack_id'];	
	$update_url = "delete_attack.php?id=$id&attack=$attack_id";
	
	echo "<tr><td><input type='text' name='attack_name[]' id='attack_name'  value='".$attack_name."' REQUIRED></td>\n";
	echo "<td><input type='text' name='attack_bonus[]' id='attack_bonus' size='10' value='".$attack_bonus."' ></td>\n";
	echo "<td><input type='text' name='attack_damage_type[]' id='attack_damage_type' size='15' value='".$attack_damage_type."' ></td>\n";
	echo "<td><input type='text' maxlength='120'name='attack_description[]' id='attack_description' size='40' value='".$attack_description."' ></td>\n";
	echo "<td  id='Delete' ><a href='delete_attack.php?id=$id&attack=$attack_id'>Delete?</a><input type='hidden' name='attack_id[]' id='attack_id' value='".$attack_id."'></td>\n";
	echo "</tr>\n";
}
?>