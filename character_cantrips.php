<?php
include 'includes/connections.php';

//Check the id in the URL
// Show a particular value.
$id = $_GET['id'];

$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")    
	or die(mysql_error());
// puts the "character_sheet" info into the $info array  
$charinfo = mysql_fetch_array( $chardata );

?>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print $id ."";?>">Backstory</a>   
</div>
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print $id ."";?>">Settings</a>
</div>

<p>&nbsp;</p>
<h1><?php Print $charinfo['character_name'] . "'s Spells and Cantrips";?></h1>
<form action="update_cantrips.php?id=<?php Print $id;?>" method="POST"> 
<p id='gray'>Click "Update Character" to save changes.</p>
<input type="submit" name='submit' value="Update" >
<table>
	<tr>
		<td>
			Spellcasting Ability
		</td>
		<td>
			Spell Save DC
		</td>
		<td>
			Spell Attack Bonus
		</td>
		<td>
			Ki Points
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="spellcasting_ability" id="spellcasting_ability"  size="15" value="<?php Print $charinfo['spellcasting_ability'];?>">
		</td>
		<td>
			<input type="text" name="spell_save_dc" id="spell_save_dc"  size="15" value="<?php Print $charinfo['spell_save_dc'];?>">
		</td>
		<td>
			<input type="text" name="spell_attack_bonus" id="spell_attack_bonus" size="15"  value="<?php Print $charinfo['spell_attack_bonus'];?>">
		</td>
		<td>
			<input type="number" name="ki_points" id="ki_points" size="15"  value="<?php Print $charinfo['ki_points'];?>">
		</td>
	</tr>
</table>
</br>
Select spell to add:</br>
<select name="new_spell">
	<option value="" selected="selected">Select Spell</option> 
	<? include 'spell_options.php'; ?>
</select>
<input type="submit" name='submit' value="Add Spell" ></br>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="add_spell.php?id=<?php Print $id ."";?>">Create Custom Spell</a>
</div>
</br>
</br>

<div id="h2bar">
	<h2>Cantrips</h2>
</div>
</br>
<?php include 'spells/get_cantrip_lvl0.php';?>

</br>
</br>
<div id="h2bar">
	<h2>Level 1</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots1" name="max_slots1" value="<?php Print $charinfo['max_slots1'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots1" name="available_slots1" value="<?php Print $charinfo['available_slots1'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl1.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 2</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots2" name="max_slots2" value="<?php Print $charinfo['max_slots2'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots2" name="available_slots2" value="<?php Print $charinfo['available_slots2'];?>" placeholder="#" style='width:113px'></b>		
<?php include 'spells/get_spell_lvl2.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 3</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots3" name="max_slots3" value="<?php Print $charinfo['max_slots3'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots3" name="available_slots3" value="<?php Print $charinfo['available_slots3'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl3.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 4</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots4" name="max_slots4" value="<?php Print $charinfo['max_slots4'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots4" name="available_slots4" value="<?php Print $charinfo['available_slots4'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl4.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 5</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots5" name="max_slots5" value="<?php Print $charinfo['max_slots5'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots5" name="available_slots5" value="<?php Print $charinfo['available_slots5'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl5.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 6</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots6" name="max_slots6" value="<?php Print $charinfo['max_slots6'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots6" name="available_slots6" value="<?php Print $charinfo['available_slots6'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl6.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 7</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots7" name="max_slots7" value="<?php Print $charinfo['max_slots7'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots7" name="available_slots7" value="<?php Print $charinfo['available_slots7'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl7.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 8</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots8" name="max_slots8" value="<?php Print $charinfo['max_slots8'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots8" name="available_slots8" value="<?php Print $charinfo['available_slots8'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl8.php';?>
</br>
</br>
<div id="h2bar">
	<h2>Level 9+</h2>
</div>
</br>
Max Spell Slots</br>
<input type="number" id="max_slots9" name="max_slots9" value="<?php Print $charinfo['max_slots9'];?>" placeholder="#" style='width:113px'></br>
Available Spell Slots</br>
<input type="number" id="available_slots9" name="available_slots9" value="<?php Print $charinfo['available_slots9'];?>" placeholder="#" style='width:113px'></br>
<?php include 'spells/get_spell_lvl9.php';?></br>
<input type="submit" name='submit' value="Update" >
</form>