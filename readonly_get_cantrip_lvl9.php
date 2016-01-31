<?php
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level >= 9 ORDER BY cantrip_name")  
	or die(mysql_error());
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	echo "<tr><td><input  disabled type='number' name='cantrip_level[]' id='cantrip_level' style='width:110px' value='".$cantrip_level."' REQUIRED></td>\n";
	echo "<td><input  disabled type='text' name='cantrip_name[]' id='cantrip_name' size='40' value='".$cantrip_name."' REQUIRED></td>\n";
	echo "<td><input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></td>\n";
	echo "</tr>\n";	
}
?>
