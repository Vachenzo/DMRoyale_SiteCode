<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM backstory WHERE character_id = " . $id)  
	or die(mysql_error());
$info = mysql_fetch_array( $data );	
$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id)  
	or die(mysql_error());  
$charinfo = mysql_fetch_array( $chardata );
?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_character.php?id=<?php Print "".$id ."";?>">Character</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_cantrips.php?id=<?php Print "".$id ."";?>">Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$charinfo['character_name']."'s Backstory";?></h1>


	<h2>Physical Attributes</h2>
	<table>
		<tr>
			<td>
				Age</br>
				<input disabled  type="text" name="age" id="age" value="<?php Print "".$info['age'] . "";?>" >
			</td>
			<td>
				Height</br>
				<input disabled  type="text" name="height" id="height" value="<?php Print "".$info['height'] . "";?>" >
			</td>
			<td>
				Weight</br>
				<input disabled  type="text" name="weight" id="weight" value="<?php Print "".$info['weight'] . "";?>" >
			</td>
		</tr>
		<tr>
			<td>
				Eye Color</br>
				<input disabled  type="text" name="eyes" id="eyes" value="<?php Print "".$info['eyes'] . "";?>">
			</td>
			<td>
				Skin</br>
				<input disabled  type="text" name="skin" id="skin" value="<?php Print "".$info['skin'] . "";?>" >
			</td>
			<td>
				Hair</br>
				<input disabled  type="text" name="hair" id="hair" value="<?php Print "".$info['hair'] . "";?>" >
			</td>
		</tr>
	</table>
	</br>
	<h2>Character Traits</h2>
	<table>
		<tr>
			<td>
				Personality</br>
				<textarea disabled  rows="10" cols="60" name="personality" id="personality" placeholder="Enter Text"><?php Print "".$info['personality'] . "";?></textarea>
			</td>
			<td>
				Ideals</br>
				<textarea disabled  rows="10" cols="60" name="ideals" id="ideals" placeholder="Enter Text"><?php Print "".$info['ideals'] . "";?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Bonds</br>
				<textarea disabled  rows="10" cols="60" name="bonds" id="bonds" placeholder="Enter Text"><?php Print "".$info['bonds'] . "";?></textarea>
			</td>
			<td>
				Flaws</br>
				<textarea disabled  rows="10" cols="60" name="flaws" id="flaws" placeholder="Enter Text"><?php Print "".$info['flaws'] . "";?></textarea>
			</td>
		</tr>
	</table>
	<h2>Backstory</h2>
	<table>
		<tr>
			<td>				
				<textarea disabled  rows="10" cols="124" name="backstory_text" id="backstory_text" placeholder="Enter Text"><?php Print "".$info['backstory_text'] . "";?></textarea>
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
		<?php include 'readonly_get_ally.php';?>
		
	</table>
	