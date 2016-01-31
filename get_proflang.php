<?php
$proflang_data = mysql_query("SELECT * FROM proficiency_language WHERE character_id = ".$id." ORDER BY proflang_name")  
	or die(mysql_error());
	
while($proflang = mysql_fetch_array($proflang_data)) { 
	$DBName = $proflang['proflang_name'];
	$proflang_name = htmlspecialchars($DBName, ENT_QUOTES);
	$proflang_id = $proflang['proflang_id'];	
	$update_url = "delete_proflang.php?id=$id&proflang=$proflang_id";
	
	echo "<tr><td><input type='text' name='proflang_name[]' id='proflang_name' value='".$proflang_name."' REQUIRED></td>\n";
	echo "<td id='Delete' ><a href='delete_proflang.php?id=$id&proflang=$proflang_id'>Delete?</a><input type='hidden' name='proflang_id[]' id='proflang_id' value='".$proflang_id."'></td>\n";
	echo "</tr>\n";
}
?>