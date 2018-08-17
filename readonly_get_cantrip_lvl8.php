<?php
$inventory_data = mysql_query("SELECT * FROM character_spells WHERE character_id = ".$id." AND level = 8")  
	or die(mysql_error());

while($cantrip = mysql_fetch_array($inventory_data)) { 
	

	$spell_list_id = $cantrip['spell_list_id'];

	include 'readonly_spell_display.php';
}
?>