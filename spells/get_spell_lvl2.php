<?php
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 2 AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$DBName = $cantrip['cantrip_name'];
	$cantrip_name = htmlspecialchars($DBName, ENT_QUOTES);
	$cantrip_id = $cantrip['cantrip_list_id'];
	$description = $cantrip['description'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	include 'spell_display.php';	
}
?>