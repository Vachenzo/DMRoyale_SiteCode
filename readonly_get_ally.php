<?php
$inventory_data = mysql_query("SELECT * FROM allies WHERE character_id = ".$id." ORDER BY ally_name")  
	or die(mysql_error());
while($ally = mysql_fetch_array($inventory_data)) { 
	$ally_name = $ally['ally_name'];
	$ally_id = $ally['ally_id'];
	$update_url = "delete_ally.php?id=$id&ally=$ally_id";
	echo "<tr><td><input type='text' name='ally_name[]' id='ally_name' size='40' value='".$ally_name."' disabled></td></tr>\n";
}
?>
