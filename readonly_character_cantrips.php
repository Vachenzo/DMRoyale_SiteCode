<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM cantrips WHERE character_id = " . $id)  
	or die(mysql_error());
$info = mysql_fetch_array( $data );
$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id)  
	or die(mysql_error());
$charinfo = mysql_fetch_array( $chardata );
?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_character.php?id=<?php Print "".$id."";?>">Character</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_story.php?id=<?php Print "".$id ."";?>">Backstory</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$charinfo['character_name'] . "'s Spells and Cantrips";?></h1>
<form action="update_cantrips.php?id=<?php Print "".$id."";?>" method="POST"> 

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
			<input disabled  type="text" name="spellcasting_ability" id="spellcasting_ability"  size="15" value="<?php Print "".$charinfo['spellcasting_ability'] . "";?>">
		</td>
		<td>
			<input disabled  type="text" name="spell_save_dc" id="spell_save_dc"  size="15" value="<?php Print "".$charinfo['spell_save_dc'] . "";?>">
		</td>
		<td>
			<input disabled  type="text" name="spell_attack_bonus" id="spell_attack_bonus" size="15"  value="<?php Print "".$charinfo['spell_attack_bonus'] . "";?>">
		</td>
	</tr>
</table>
</br>
<table>
		<tr>
			<td>
				<h2>Level 1</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl1.php';?>
		<tr>
			<td>
				<h2>Level 2</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl2.php';?>
		<tr>
			<td>
				<h2>Level 3</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl3.php';?>
		<tr>
			<td>
				<h2>Level 4</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl4.php';?>
		<tr>
			<td>
				<h2>Level 5</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl5.php';?>
		<tr>
			<td>
				<h2>Level 6</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl6.php';?>
		<tr>
			<td>
				<h2>Level 7</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl7.php';?>
		<tr>
			<td>
				<h2>Level 8</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl8.php';?>
		<tr>
			<td>
				<h2>Level 9+</h2>
			</td>
			<td>
			</td>
		</tr>
		<?php include 'readonly_get_cantrip_lvl9.php';?>

	</table>
