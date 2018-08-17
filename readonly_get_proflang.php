<?php
$proflang_data = mysql_query("SELECT * FROM proficiency_language WHERE character_id = ".$id." ORDER BY proflang_name")  
	or die(mysql_error());
while($proflang = mysql_fetch_array($proflang_data)) { 
	$proflang_name = $proflang['proflang_name'];
	$proflang_id = $proflang['proflang_id'];
	echo '<b>'.$proflang_name.'</b>:';
	echo $proflang['proflang_description'];
	?>
</br>	
<?
}
?>