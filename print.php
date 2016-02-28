<?php
include 'includes/connections.php';

$id = $_GET['id']; 
$data = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")  
	or die(mysql_error());
$info = mysql_fetch_array( $data );
?>

<h1><?php Print "".$info['character_name'] . "'s Character Sheet";?></h1>
Player Name:</br>
				<h2><?php Print "".$info['player_name'] . "";?></h2>
	<table width="100%">
		<tr>
			<td>
				Character Name:</br>
				<?php Print "".$info['character_name'] . "";?>
			</td>
			<td>
				Level:</br>
				<?php Print "".$info['level'] . "";?>
			</td>
			<td>
				Experience:</br>
				<?php Print "".$info['experience'] . "";?>
			</td>
			<td>
				Inspiration:</br>
				<?php Print "".$info['inspiration'] . "";?>
			</td>
			
		</tr>
		<tr>
			<td>
				Class:</br>
				<?php Print "".$info['class_level'] . "";?>
			</td>
			<td>
				Background:</br>
				<?php Print "".$info['background'] . "";?>
			</td>
			<td>
				Race:</br>
				<?php Print "".$info['race'] . "";?>
			</td>
			<td>
				Alignment:</br>
				<?php Print "".$info['alignment'] . "";?>
			</td>
		</tr>
		<tr>
			<td>
				Max HP:</br>
				<?php Print "".$info['max_hp'] . "";?>
			</td>
			<td>
				Current HP:</br>
				<?php Print "".$info['current_hp'] . "";?>
			</td>
			<td>
				Hit Dice:</br>
				<?php Print "".$info['hit_dice'] . "";?>
			</td>
		</tr>
		<tr>
			<td>
				Death Save Successes:</br>
				<input type="checkbox">
				<input type="checkbox">
				<input type="checkbox">
			</td>
			<td>
				Death Save Failures:</br>
				<input type="checkbox">
				<input type="checkbox">
				<input type="checkbox">
			</td>
		</tr>
		<tr>
			<td>
				Armor Class:</br>
				<?php Print "".$info['armor'] . "";?>
			</td>
			<td>
				Speed:</br>
				<?php Print "".$info['speed'] . "";?>
			</td>
			<td>
				Initiative:</br>
				
			</td>
		</tr>
		<tr>
			
		</tr>
	</table>
	
	<h2>Skills</h2>
	<table>
		<tr>
			<td>
				Strength: <?php Print "".$info['str_skill'] . "";?></br>
				<?php
					$str = $info['str_skill'];
					$strSub = $str - 10;
					$strSubDiv = $strSub / 2;
					$floorStr = floor($strSubDiv);
					$strNumber = sprintf("%+.0f",$floorStr);
					echo("Str Modifier: ".$strNumber."");
				?></br>
				<input type="checkbox" name="Athletics" value="1" <?php if($info['Athletics'] == 1){Print "CHECKED";}else{}?>>Athletics</br>
			</td>
			<td>
				Dexterity: <?php Print "".$info['dex_skill'] . "";?></br>
				<?php
					$dex= $info['dex_skill'];
					$dexSub = $dex - 10;
					$dexSubDiv = $dexSub / 2;
					$floorDex= floor($dexSubDiv);
					$dexNumber = sprintf("%+.0f",$floorDex);
					echo("Dex Modifier: ".$dexNumber."");
				?></br>
				<input type="checkbox" name="Acrobatics" value="1" <?php if($info['Acrobatics'] == 1){Print "CHECKED";}else{}?> >Acrobatics</br>
				<input type="checkbox" name="Slight_of_Hand" value="1" <?php if($info['Slight_of_Hand'] == 1){Print "CHECKED";}else{}?>>Slight of Hand</br>
				<input type="checkbox" name="Stealth"value="1" <?php if($info['Stealth'] == 1){Print "CHECKED";}else{}?>>Stealth</br>
			</td>
			<td>
				Constitution: <?php Print "".$info['con_skill'] . "";?></br>
				<?php
					$con = $info['con_skill'];
					$conSub = $con - 10;
					$conSubDiv = $conSub / 2;
					$floorCon = floor($conSubDiv);
					$conNumber = sprintf("%+.0f",$floorCon);
					echo("Con Modifier: ".$conNumber."");
				?>
			</td>
			<td>
				Intelligence: <?php Print "".$info['int_skill'] . "";?></br>
				<?php
					$int= $info['int_skill'];
					$intSub = $int - 10;
					$intSubDiv = $intSub / 2;
					$floorInt= floor($intSubDiv);
					$intNumber = sprintf("%+.0f",$floorInt);
					echo("Int Modifier: ".$intNumber."");
				?></br>
				<input type="checkbox" name="Arcana" value="1" <?php if($info['Arcana'] == 1){Print "CHECKED";}else{}?>>Arcana</br>
				<input type="checkbox" name="History"value="1" <?php if($info['History'] == 1){Print "CHECKED";}else{}?>>History</br>
				<input type="checkbox" name="Investigation" value="1" <?php if($info['Investigation'] == 1){Print "CHECKED";}else{}?>>Investigation</br>
				<input type="checkbox" name="Nature" value="1" <?php if($info['Nature'] == 1){Print "CHECKED";}else{}?>>Nature</br>
				<input type="checkbox" name="Religion" value="1" <?php if($info['Religion'] == 1){Print "CHECKED";}else{}?>>Religion</br>		
			</td>
			<td>
				Wisdom: <?php Print "".$info['wis_skill'] . "";?></br>
				<?php
					$wis = $info['wis_skill'];
					$wisSub = $wis - 10;
					$wiSubDiv = $wisSub / 2;
					$floorWis = floor($wisSubDiv);
					$wisNumber = sprintf("%+.0f",$floorWis);
					echo("Wis Modifier: ".$wisNumber."");
				?></br>
				<input type="checkbox" name="Animal_Handling" value="1" <?php if($info['Animal_Handling'] == 1){Print "CHECKED";}else{}?>>Animal Handling</br>
				<input type="checkbox" name="Insight" value="1" <?php if($info['Insight'] == 1){Print "CHECKED";}else{}?>>Insight</br>
				<input type="checkbox" name="Medicine" value="1" <?php if($info['Medicine'] == 1){Print "CHECKED";}else{}?>>Medicine</br>
				<input type="checkbox" name="Perception" value="1" <?php if($info['Perception'] == 1){Print "CHECKED";}else{}?>>Perception</br>
				<input type="checkbox" name="Survival" value="1" <?php if($info['Survival'] == 1){Print "CHECKED";}else{}?>>Survival</br>
			</td>
			<td>
				Charisma:<?php Print "".$info['chr_skill'] . "";?></br>
				<?php
					$chr= $info['Chr_skill'];
					$chrSub = $chr - 10;
					$chrSubDiv = $chrSub / 2;
					$floorChr= floor($chrSubDiv);
					$chrNumber = sprintf("%+.0f",$floorChr);
					echo("Chr Modifier: ".$chrNumber."");
				?></br>
				<input type="checkbox" name="Deception" value="1" <?php if($info['Deception'] == 1){Print "CHECKED";}else{}?>>Deception</br>
				<input type="checkbox" name="Intimidation" value="1" <?php if($info['Intimidation'] == 1){Print "CHECKED";}else{}?>>Intimidation</br>
				<input type="checkbox" name="Persuasion" value="1" <?php if($info['Persuasion'] == 1){Print "CHECKED";}else{}?>>Persuasion</br>
				<input type="checkbox" name="Performance" value="1" <?php if($info['Performance'] == 1){Print "CHECKED";}else{}?>>Performance</br>
			</td>
		<tr>
			<td>
				Proficiency Bonus: 
				<?PHP
					$level = $info['level'];

					if ($level <= 4){
						echo "+2";
						$bonus = 2;
					}
					else if ($level <= 8 && $level >= 5){
						echo "+3";
						$bonus = 3;
					}
					else if ($level <= 12 && $level >= 9){
						echo "+4";
						$bonus = 4;
					}
					else if ($level <= 16 && $level >= 13){
						echo "+5";
						$bonus = 5;
					}
					else if ($level >= 17){
						echo "+6";
						$bonus = 6;
					}
					else{
						echo "error";
					}
				?>
			</td>
			<td>
				Passive Wisdom: 
				<?PHP
					if ($info['Perception'] == 1){
						$PassiveWisdom = 10 + $wisNumber + $bonus;
					}
					else{
						$PassiveWisdom = 10 + $wisNumber;
					}
					echo $PassiveWisdom;
				?>
			</td>
		</tr>
	</table>
	<h2>Proficiencies & Languages</h2>
	<ul>
		<?php
		//All this mysql code is gonna have to be replaced with mysqli eventually
		$proflang_data = mysql_query("SELECT * FROM proficiency_language WHERE character_id = ".$id." ORDER BY proflang_name")  
			or die(mysql_error());
		//loop to get every proflang for that character
		while($proflang = mysql_fetch_array($proflang_data)) { 
			$proflang_name = $proflang['proflang_name'];
			$proflang_id = $proflang['proflang_id'];
			$update_url = "delete_proflang.php?id=$id&proflang=$proflang_id";	
			//echo the html into the existing table and add [] to the name which will make it part of an array somehow
			echo "<li>".$proflang_name."<input type='hidden' name='proflang_id[]' id='proflang_id' value='".$proflang_id."'></li>\n";
		}?>
	</ul>
	<h2>Attacks and Spellcasting</h2>
	<table>
		<tr>
			<td>
					<b>Name</b>
			</td>
			<td>
					<b>Attack Bonus</b>
			</td>
			<td>
					<b>Damage/Type</b>
			</td>
			<td>
					<b>Description</b>
			</td>
		</tr>
		<?php
			$attack_data = mysql_query("SELECT * FROM attacks WHERE character_id = " . $id)  
				or die(mysql_error());
				
			//loop to get every attack for that character
			while($attack = mysql_fetch_array($attack_data)) { 
				$attack_name = $attack['attack_name'];
				$attack_bonus = $attack['attack_bonus'];
				$attack_damage_type = $attack['attack_damage_type'];
				$attack_description = $attack['attack_description'];
				$attack_id=$attack['attack_id'];
				$update_url = "delete_attack.php?id=$id&attack=$attack_id";
				
				//echo the html into the existing table and add [] to the name which will make it part of an array somehow
				echo "<tr><td>".$attack_name."</td>\n";
				echo "<td>".$attack_bonus."</td>\n";
				echo "<td>".$attack_damage_type."</td>\n";
				echo "<td width='600px'>".$attack_description."<input type='hidden' name='attack_id[]' id='attack_id' value='".$attack_id."'></td>\n";
				echo "</tr>\n";}
			?>
			<tr><td></br></td><td></td><td></td><td></td></tr>
			<tr><td></br></td><td></td><td></td><td></td></tr>
			<tr><td></br></td><td></td><td></td><td></td></tr>
	</table>
	<h2>Currency</h2>
	<table>
		<tr>
			<td>SP:</td><td width="200px"><?php Print "".$info['sp_count'] . "";?></td></tr>
			<td>CP:</td><td><?php Print "".$info['cp_count'] . "";?></td></tr>
			<td>EP:</td><td><?php Print "".$info['ep_count'] . "";?></td></tr>
			<td>GP:</td><td><?php Print "".$info['gp_count'] . "";?></td></tr>
			<td>PP:</td><td><?php Print "".$info['pp_count'] . "";?></td></tr>
	</table>
	</br>
	<h2>Inventory</h2>
	<table>
		<tr>
			<td>
				<b>Item Count</b>
			</td>
			<td>
				<b>Item Name</b>
			</td>
			<td>
				<b>Item Weight</b>
			</td>
		</tr>
		<?php
			//All this mysql code is gonna have to be replaced with mysqli eventually
			$inventory_data = mysql_query("SELECT * FROM items WHERE character_id = " . $id)  
				or die(mysql_error());
				
			//loop to get every item for that character
			while($item = mysql_fetch_array($inventory_data)) { 
				$item_name = $item['item_name'];
				$item_count = $item['item_count'];
				$item_weight= $item['item_weight'];
				$item_id = $item['item_id'];				
				$update_url = "delete_item.php?id=$id&item=$item_id";
				
				//echo the html into the existing table and add [] to the name which will make it part of an array somehow
				echo "<tr><td>".$item_count."</td>\n";
				echo "<td width='300px'>".$item_name."</td>\n";
				echo "<td>".$item_weight."<input type='hidden' name='inv_item_id[]' id='inv_item_id' value='".$item_id."'></td>\n";
				echo "</tr>\n";}
			?>
		<tr><td></br></td><td></td><td></td></tr>
		<tr><td></br></td><td></td><td></td></tr>
		<tr><td></br></td><td></td><td></td></tr>
	</table>
	</br>
<?php
// Connects to your Database  
mysql_connect($servername, $username, $password) 
	or die(mysql_error());

//Select the DB
mysql_select_db($dbname) 
	or die(mysql_error());

//Check the id in the URL
// Show a particular value.


// Collects data from "cantrips" table  
$data2 = mysql_query("SELECT * FROM cantrips WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")  
	or die(mysql_error());
// puts the "cantrips" info into the $info array  
$info2 = mysql_fetch_array( $data2 );


?>
<h1>Cantrips</h1>

<table>
	<tr>
		<td>
			Spellcasting Ability</br>
			<?php Print "".$charinfo['spellcasting_ability'] . "";?>
		</td>
		<td>
			Spell Save DC</br>
			<?php Print "".$charinfo['spell_save_dc'] . "";?>
		</td>
		<td>
			Spell Attack Bonus</br>
			<?php Print "".$charinfo['spell_attack_bonus'] . "";?>
		</td>
	</tr>
</table>
</br>
<h2>Level 1-</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level <= 1  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 2</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 2  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 3</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 3  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 4</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 4  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 5</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 5  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 6</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 6  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 7</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 7  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 8</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level = 8  AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<h2>Level 9+</h2>
<ul>
<?php
//All this mysql code is gonna have to be replaced with mysqli eventually
$inventory_data = mysql_query("SELECT * FROM cantrips WHERE character_id = ".$id." AND cantrip_level >= 9 AND player_name='".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
	
//loop to get every cantrip for that character
while($cantrip = mysql_fetch_array($inventory_data)) { 
	$cantrip_level = $cantrip['cantrip_level'];
	$cantrip_name = $cantrip['cantrip_name'];
	$cantrip_id = $cantrip['cantrip_list_id'];
	$del_id = $cantrip['del'];
	$update_url = "delete_cantrip.php?id=$id&cantrip=$cantrip_id";	
	
	//echo the html into the existing table and add [] to the name which will make it part of an array somehow
	echo "<li>".$cantrip_name."<input type='hidden' name='cantrip_id[]' id='cantrip_id' value='".$cantrip_id."'></li>\n";}
?>
</ul>
</br>
<?php


// Collects data from "backstory" table  
$data3 = mysql_query("SELECT * FROM backstory WHERE character_id = " . $id." AND player_name ='".$_SESSION['username']."'")  
	or die(mysql_error());
	// puts the "backstory" info into the $info array  
$info3 = mysql_fetch_array( $data3 );


?>

<h1>Backstory</h1>
<h2>Physical Attributes</h2>
	<table>
		<tr>
			<td width="200">
				Age</br>
				<?php Print "".$info3['age'] . "";?>
			</td>
			<td width="200">
				Height</br>
				<?php Print "".$info3['height'] . "";?>
			</td>
			<td width="200">
				Weight</br>
				<?php Print "".$info3['weight'] . "";?>
			</td>
		</tr>
		<tr>
			<td>
				Eye Color</br>
				<?php Print "".$info3['eyes'] . "";?>
			</td>
			<td>
				Skin</br>
				<?php Print "".$info3['skin'] . "";?>
			</td>
			<td>
				Hair</br>
				<?php Print "".$info3['hair'] . "";?>
			</td>
		</tr>
	</table>
	</br>
	<h2>Character Traits</h2>
	<table>
		<tr width="100%">
			<td>
				Personality</br>
				<p><?php Print "".$info3['personality'] . "";?></p>
				<p>&nbsp;</p>
			</td>
			<td>
				Ideals</br>
				<p><?php Print "".$info3['ideals'] . "";?></p>
				<p>&nbsp;</p>
			</td>
		</tr>
		<tr width="100%">
			<td>
				Bonds</br>
				<p><?php Print "".$info3['bonds'] . "";?></p>
				<p>&nbsp;</p>
			</td>
			<td>
				Flaws</br>
				<p><?php Print "".$info3['flaws'] . "";?></p>
				<p>&nbsp;</p>
			</td>
		</tr>
	</table>
	<h2>Backstory</h2>
	<table>
		<tr>
			<td>				
				<p><?php Print "".$info3['backstory_text'] . "";?></p>
				<p>&nbsp;</p>
			</td>
		</tr>
	</table>
	</br>
	<h2>Party</h2>
	<ul>
		<?php include 'get_party_CS.php';?>
	</ul>
	<h2>Allies</h2>
	<ul>
	<?php

		//All this mysql code is gonna have to be replaced with mysqli eventually

		$inventory_data = mysql_query("SELECT * FROM allies WHERE character_id = ".$id." ORDER BY ally_name")  
			or die(mysql_error());
			
		//loop to get every ally for that character
		while($ally = mysql_fetch_array($inventory_data)) { 
			$ally_name = $ally['ally_name'];
			$ally_id = $ally['ally_id'];
			
			$update_url = "delete_ally.php?id=$id&ally=$ally_id";
			
			//echo the html into the existing table and add [] to the name which will make it part of an array somehow
			echo "<li>".$ally_name."<input type='hidden' name='ally_id[]' id='ally_id' value='".$ally_id."'></li>\n";			
		}
		?>
		</ul>