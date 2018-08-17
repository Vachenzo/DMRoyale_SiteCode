<ul>
<?php
$party_data = mysql_query("SELECT * FROM character_sheet WHERE campaign_code = '".$charinfo['campaign_code']."'")  
	or die(mysql_error());
	
while($campaign = mysql_fetch_array($party_data)) { 
	$campaign_id = $campaign['character_id'];
	$campaign_character_name = $campaign['character_name'];
	?>			
	<a href='readonly_view_character.php?id=<?PHP echo $campaign_id?>'><?PHP print $campaign_character_name?></a></br>
<?PHP
}
?>
</ul>