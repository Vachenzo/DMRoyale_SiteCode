<?php
$inventory_data = mysql_query("SELECT * FROM allies WHERE character_id = ".$id." ORDER BY ally_name")  
	or die(mysql_error());

while($ally = mysql_fetch_array($inventory_data)) { 
	
	$DBName = $ally['ally_name'];
	$ally_name =  htmlspecialchars($DBName, ENT_QUOTES);
	$ally_id = $ally['ally_id'];
	$DBName2 = $ally['notes'];
	$ally_notes =  htmlspecialchars($DBName2, ENT_QUOTES);
	$update_url = "delete_ally.php?id=$id&ally=$ally_id";
	
	echo "<tr><td><input type='text' name='ally_name[]' id='ally_name' size='40' value='".$ally_name."' REQUIRED></td>\n";
	echo "<td id='Delete' ><input type='text' name='notes[]' id='notes' size='60' placeholder='Notes' value='".$ally_notes."'><input type='hidden' name='ally_id[]' id='ally_id' value='".$ally_id."'> <a href='delete_ally.php?id=".$id."&&ally=".$ally_id."'>Delete?</a></td>\n";
	echo "</tr>\n";
}
?>