<?php
$proflang_data = mysql_query("SELECT * FROM proficiency_language WHERE character_id = ".$id." ORDER BY proflang_name")  
	or die(mysql_error());
while($proflang = mysql_fetch_array($proflang_data)) { 
	$proflang_name = $proflang['proflang_name'];
	$proflang_id = $proflang['proflang_id'];
	echo "<tr><td><input disabled type='text' name='proflang_name[]' id='proflang_name' value='".$proflang_name."' REQUIRED></td>\n";
	echo "<td><input disabled type='hidden' name='proflang_id[]' id='proflang_id' value='".$proflang_id."'></div></td>\n";
	echo "</tr>\n";	
}
?>