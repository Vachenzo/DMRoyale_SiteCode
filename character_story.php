<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM backstory WHERE character_id = " . $id." AND player_name ='".$_SESSION['username']."'")  
	or die(mysql_error());
$info = mysql_fetch_array( $data );
$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id. " AND player_name ='".$_SESSION['username']."'")    
	or die(mysql_error());
$charinfo = mysql_fetch_array( $chardata );
?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_combat.php?id=<?php Print $id;?>">Combat</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_cantrips.php?id=<?php Print "".$id ."";?>">Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print "".$id ."";?>">Settings</a>
</div>
<div id='MenuButton'>
	<a href="view_print.php?id=<?php Print "".$id ."";?>" target="_blank">Print</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$charinfo['character_name']."'s Backstory";?></h1>

<form action="update_story.php?id=<?php Print $id;?>" method="POST"> 
<p id='gray'>Click "Update Character" to save changes.</p>
<input type="submit" name='submit' value="Update Character" >
	<h2>Physical Attributes</h2>
	
	<table>
		<tr>
			<td>
				Age</br>
				<input type="text" name="age" id="age" value="<?php Print "".$info['age'] . "";?>" >
			</td>
			<td>
				Height</br>
				<input type="text" name="height" id="height" value="<?php Print "".$info['height']. "";?>" >
			</td>
			<td>
				Weight</br>
				<input type="text" name="weight" id="weight" value="<?php Print "".$info['weight']. "";?>" >
			</td>
		</tr>
		<tr>
			<td>
				Eye Color</br>
				<input type="text" name="eyes" id="eyes" value="<?php Print "".$info['eyes'] . "";?>">
			</td>
			<td>
				Skin</br>
				<input type="text" name="skin" id="skin" value="<?php Print "".$info['skin'] . "";?>" >
			</td>
			<td>
				Hair</br>
				<input type="text" name="hair" id="hair" value="<?php Print "".$info['hair'] . "";?>" >
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="img_url" id="img_url" placeholder="Link to character image">
			</td>
		</tr>
	</table>
	</br>
	<h2>Character Traits</h2>
	<table>
		<tr>
			<td>
				Personality</br>
				<textarea rows="10" cols="60" maxlength='2000' name="personality" id="personality" placeholder="Enter Text"><?php Print "".$info['personality'] . "";?></textarea>
			</td>
			<td>
				Ideals</br>
				<textarea rows="10" cols="60" maxlength='2000' name="ideals" id="ideals" placeholder="Enter Text"><?php Print "".$info['ideals'] . "";?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Bonds</br>
				<textarea rows="10" cols="60" maxlength='2000' name="bonds" id="bonds" placeholder="Enter Text"><?php Print "".$info['bonds'] . "";?></textarea>
			</td>
			<td>
				Flaws</br>
				<textarea rows="10" cols="60" maxlength='2000' name="flaws" id="flaws" placeholder="Enter Text"><?php Print "".$info['flaws'] . "";?></textarea>
			</td>
		</tr>
	</table>
	<h2>Backstory</h2>
	<table>
		<tr>
			<td>				
				<textarea rows="10" cols="124" maxlength='2000' name="backstory_text" id="backstory_text" placeholder="Enter Text"><?php Print "".$info['backstory_text'] . "";?></textarea>
			</td>
		</tr>
	</table>
	</br>
	<h2>Party</h2>
	<ul>
		<?php include 'get_party_CS.php';?>
	</ul>
	<h2>Allies</h2>
	<table>
		<?php include 'get_ally.php';?>
		<tr>
			<td>
				<input type="text" name="new_ally_name" id="new_ally_name"  size="40" placeholder="New Ally Name">
			</td>
			<td>
				<input type="submit" name='submit' value="Add Ally" >
			</td>
		</tr>
	</table>

	
	<input type="submit" name='submit' value="Update Character" >
</form>
	
<script>
	function updatenotice() {
		alert("Character Information Updated");
	}
</script>