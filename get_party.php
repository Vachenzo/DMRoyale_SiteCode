<?php
$party_data = mysql_query("SELECT * FROM character_sheet WHERE campaign_code = '".$info['dungeonkey']."' ORDER BY initiative")  
	or die(mysql_error());
	
while($campaign = mysql_fetch_array($party_data)) { 
	$info_id = $campaign['character_id'];
	$info_character_name = $campaign['character_name'];
	$info_initiative = $campaign['initiative'];
	$info_armor = $campaign['armor'];
	$info_speed = $campaign['speed'];
	$info_current_hp = $campaign['current_hp'];
	$info_character_notes = $campaign['character_notes'];
	
	echo "<tr><td>";
		echo "<table><tr><td><a href='readonly_view_character.php?id=".$info_id."'>".$info_character_name."</a><input type='hidden' name='character_id[]' id='character_id' value='".$info_id."' REQUIRED></td>\n";
		echo "</tr>\n";
			echo "<tr><td>Initiative:</td><td><input type='number' name='initiative[]' id='initiative' maxlength='2' size='4' value='".$info_initiative."'></td></tr>";
			echo "<tr><td>AC:</td><td>".$info_armor."</td></tr>";
			echo "<tr><td>Speed:</td><td>".$info_speed."</td></tr>";
			echo "<tr><td>HP:</td><td>".$info_current_hp."<p>&nbsp;</p></td></tr>";
		echo "</table>";
	echo "</td>";
	echo "<td id='Delete'>";
		echo "<textarea rows='7' cols='100' name='character_notes[]' id='character_notes' placeholder='Notes on ".$info_character_name."'>".$info_character_notes."</textarea></br>";
		echo "<div style;'float:right'><a href='delete_party.php?id=$id&party=$info_id'>Remove Party Member</a></div>";
	echo "</td></tr>";
}
?>

