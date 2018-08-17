<?PHP
$dungeonkey = $charinfo['campaign_code'];

$DMspell_options = mysql_query("SELECT * FROM pc_custom_spell WHERE campaign_code LIKE '$dungeonkey' ORDER BY name")  
	or die(mysql_error());
	
while($DMspell_options_array = mysql_fetch_array($DMspell_options)) {
	?>
	<option value="<? echo $DMspell_options_array['spell_index']; ?>">Campaign Spell: <? echo $DMspell_options_array['name']; ?> Lvl <? echo $DMspell_options_array['level']; ?></option>

<?}

$spell_options = mysql_query("SELECT * FROM spell_list ORDER BY name")  
	or die(mysql_error());
	
while($spell_options_array = mysql_fetch_array($spell_options)) {
	?>
	<option value="<? echo $spell_options_array['spell_index']; ?>"><? echo $spell_options_array['name']; ?> Lvl <? echo $spell_options_array['level']; ?></option>
<?}
?>
