<?php
$npc_data = mysql_query("SELECT * FROM npc WHERE campaign_id = " . $id)  
	or die(mysql_error());
	
while($npc = mysql_fetch_array($npc_data)) { 
	$npc_name = $npc['npc_name'];
	$npc_desc = $npc['npc_desc'];
	$npc_id=$npc['npc_id'];
	
	echo "<tr><td><input type='text' name='npc_name[]' id='npc_name'  value='".$npc_name."' REQUIRED></td>\n";
	echo "<td><textarea rows='4' cols='80' maxlength='2000' name='npc_desc[]' id='npc_desc' placeholder='Notes on ".$npc_name."'>".$npc_desc."</textarea></td>\n";
	echo "<td id='Delete'><a href='delete_npc.php?id=$id&npc=$npc_id'>Delete?</a><input type='hidden' name='npc_id[]' id='npc_id' value='".$npc_id."'></td>\n";
}
?>