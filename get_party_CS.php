<?php
$party_data = mysql_query("SELECT * FROM character_sheet WHERE campaign_code = '".$charinfo['campaign_code']."'")  
	or die(mysql_error());
	
while($campaign = mysql_fetch_array($party_data)) { 
	$campaign_id = $campaign['character_id'];
	$campaign_character_name = $campaign['character_name'];
	$campaign_initiative = $campaign['initiative'];
	$campaign_armor = $campaign['armor'];
	$campaign_speed = $campaign['speed'];
	$campaign_current_hp = $campaign['current_hp'];
	
	echo "<li><td><a href='readonly_view_character.php?id=".$campaign_id."'>".$campaign_character_name."</a><input type='hidden' name='character_id[]' id='character_id' style='width:110px' value='".$campaign_id."' REQUIRED></li>\n";
}
?>