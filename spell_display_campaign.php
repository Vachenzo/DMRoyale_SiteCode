<?PHP
//echo $dungeonkey;

$spell_display = mysql_query("SELECT * FROM pc_custom_spell WHERE campaign_code = '$dungeonkey' ORDER BY name")  
	or die(mysql_error());

while($spell_info = mysql_fetch_array($spell_display)) {
	?> 
	
	<h3><? echo $spell_info['name'];?></h3>
	<b>Spell School:</b> <? echo $spell_info['spell_school'];?></br>
	<b>Casting Time:</b> <? echo $spell_info['casting_time'];?></br>
	<b>Range:</b> <? echo $spell_info['range'];?></br>
	<b>Components:</b> <? echo $spell_info['v'];?> <? echo $spell_info['s'];?> <? echo $spell_info['m'];?> - <?echo $spell_info['materials'];?>
	</br>
	<b>Duration:</b> <? echo $spell_info['duration'];?></br>
	<p><? echo $spell_info['description'];?></p>
	</p><? echo $spell_info['upgrade'];?></p>
	<div  id='Delete' ></br><a href='delete_spell_campaign.php?id=<?PHP echo $id;?>&spell=<?PHP echo $spell_info['spell_index'];?>'>Remove <? echo $spell_info['name'];?>?</a></div>	
<?}
?>
