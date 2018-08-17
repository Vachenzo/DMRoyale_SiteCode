<?php
$inventory_data = mysql_query("SELECT * FROM character_spells WHERE character_id = ".$id." AND player_name='".$_SESSION['username']."' AND level = 6")  
	or die(mysql_error());

while($cantrip = mysql_fetch_array($inventory_data)) { 
	

	$spell_list_id = $cantrip['spell_list_id'];

	include 'spell_display.php';
}
?>