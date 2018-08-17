<?PHP
$spell_display = mysql_query("SELECT * FROM spell_list WHERE spell_index = ".$spell_list_id." ORDER BY name")  
	or die(mysql_error());
	
while($spell_info = mysql_fetch_array($spell_display)) {
	?>
	
	<h3><? echo $spell_info['name'];?></h3>
	<b>Spell School:</b> <? echo $spell_info['spell_school'];?></br>
	<b>Casting Time:</b> <? echo $spell_info['casting_time'];?></br>
	<b>Range:</b> <? echo $spell_info['range'];?></br>
	<b>Components:</b> <? echo $spell_info['v'];?> <? echo $spell_info['s'];?> <? echo $spell_info['m'];?> - <?echo $spell_info['m_components'];?>
	
	
	</br>
	<b>Duration:</b> <? echo $spell_info['duration'];?></br>
	<p><? echo $spell_info['description'];?></p>
	</p><? echo $spell_info['upgrade'];?></p>
<?}
?>

<?PHP
$custom_spell_display = mysql_query("SELECT * FROM pc_custom_spell WHERE spell_index = ".$spell_list_id." ORDER BY name")  
	or die(mysql_error());
	
while($spell_info2 = mysql_fetch_array($custom_spell_display)) {
	?>
	
	<h3><? echo $spell_info2['name'];?> (Custom Spell)</h3>
	<b>Spell School:</b> <? echo $spell_info2['spell_school'];?></br>
	<b>Casting Time:</b> <? echo $spell_info2['casting_time'];?></br>
	<b>Range:</b> <? echo $spell_info2['spell_range'];?></br>
	<b>Components:</b> <? echo $spell_info2['v'];?> <? echo $spell_info2['s'];?> <? echo $spell_info2['m'];?> - <? echo $spell_info2['materials'];?></br>
	<b>Duration:</b> <? echo $spell_info2['duration'];?></br>
	<p><? echo $spell_info2['description'];?></p>
	
<?}
?>
