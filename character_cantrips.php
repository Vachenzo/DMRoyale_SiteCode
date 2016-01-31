<?php
include 'includes/connections.php';

//Check the id in the URL
// Show a particular value.
$id = $_GET['id'];

// Collects data from "cantrips" table  
$data = mysql_query("SELECT * FROM cantrips WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")  
	or die(mysql_error());
// puts the "cantrips" info into the $info array  
$info = mysql_fetch_array( $data );

$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")    
	or die(mysql_error());
// puts the "character_sheet" info into the $info array  
$charinfo = mysql_fetch_array( $chardata );

?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_combat.php?id=<?php Print $id;?>">Combat</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print "".$id ."";?>">Backstory</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print "".$id ."";?>">Settings</a>
</div>
<div id='MenuButton'>
	<a href="view_print.php?id=<?php Print "".$id ."";?>" target="_blank">Print</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$charinfo['character_name'] . "'s Spells and Cantrips";?></h1>
<form action="update_cantrips.php?id=<?php Print $id;?>" method="POST"> 
<p id='gray'>Click "Update Character" to save changes.</p>
<input type="submit" name='submit' value="Update Spells" >
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
	</tr>
	<tr>
		<td>
			<input type="text" name="spellcasting_ability" id="spellcasting_ability"  size="15" value="<?php Print "".$charinfo['spellcasting_ability'] . "";?>">
		</td>
		<td>
			<input type="text" name="spell_save_dc" id="spell_save_dc"  size="15" value="<?php Print "".$charinfo['spell_save_dc'] . "";?>">
		</td>
		<td>
			<input type="text" name="spell_attack_bonus" id="spell_attack_bonus" size="15"  value="<?php Print "".$charinfo['spell_attack_bonus'] . "";?>">
		</td>
	</tr>
</table>
</br>
How many spells do you want to add?</br>
<input type='number' name='insert_spells' id='insert_spells' placeholder='Add Spells' max='10'>
<table>
		<tr>
			<td>
				<h2>Cantrips</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_cantrip_lvl0.php';?>
		<tr>
			<td>
				<h2>Level 1</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl1.php';?>
		<tr>
			<td>
				<h2>Level 2</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl2.php';?>
		<tr>
			<td>
				<h2>Level 3</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl3.php';?>
		<tr>
			<td>
				<h2>Level 4</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl4.php';?>
		<tr>
			<td>
				<h2>Level 5</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl5.php';?>
		<tr>
			<td>
				<h2>Level 6</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl6.php';?>
		<tr>
			<td>
				<h2>Level 7</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl7.php';?>
		<tr>
			<td>
				<h2>Level 8</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl8.php';?>
		<tr>
			<td>
				<h2>Level 9+</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'spells/get_spell_lvl9.php';?>
		<tr>
			<td>
				<input type="submit" name='submit' value="Update Spells" >
			</td>
		</tr>
	</table>
</form>