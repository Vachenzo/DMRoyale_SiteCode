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
	?>
	
	<tr><td><? echo $attack_name;?></td>
	<td><? echo $attack_bonus;?></td>
	<td><? echo $attack_damage_type;?></td>
	<td><? echo $attack_description;?></td>
	</tr>
<?
}
?>