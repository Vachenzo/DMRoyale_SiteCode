<?php
include 'includes/connections.php';
//Check the id in the URL
// Show a particular value.
$id = $_GET['id'];

// Collects data from "character_sheet" table  
$data = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")  
	or die(mysql_error());
	


// puts the "character_sheet" info into the $info array  
$info = mysql_fetch_array( $data );


?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_combat.php?id=<?php Print $id;?>">Combat</a>   
</div>
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Character</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print "".$id ."";?>">Backstory</a>   
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
<h1><?php Print "".$info['character_name'] . "'s Character Sheet";?></h1>
<p id='gray'>Click "Update Character" to save changes.</p>
<form action="update.php?id=<?php Print $id;?>" method="POST"> 
	<input type="submit" name='submit' value="Update Character" ></br></br>
		Player Name:</br>
		<b><?php Print "".$info['player_name'] . "";?></b>
		<table>
			<tr>
				<td>
					Character Name:</br>
					<input type="text" name="charactername" id="charactername" value="<?php Print "".$info['character_name'] . "";?>" required>
				</td>
				<td>
					Level:</br>
					<input type="number" name="level" id="level" value="<?php Print "".$info['level'] . "";?>" required>
				</td>
				<td>
					Experience:</br>
					<input type="number" name="experience" id="experience" value="<?php Print "".$info['experience'] . "";?>" required>
				</td>
				<td>
					Inspiration:</br>
					<input type="number" name="inspiration" id="inspiration" value="<?php Print "".$info['inspiration'] . "";?>" required>
				</td>
				
			</tr>
			<tr>
				<td>
					Class:</br>
					<input type="text" name="classlevel" id="classlevel" value="<?php Print "".$info['class_level'] . "";?>" required>
				</td>
				<td>
					Background:</br>
					<input type="text" name="background" id="background" value="<?php Print "".$info['background'] . "";?>" >
				</td>
				<td>
					Race:</br>
					<input type="text" name="race" id="race" value="<?php Print "".$info['race'] . "";?>">
				</td>
				<td>
					Alignment:</br>
					<input type="text" name="alignment" id="alignment" value="<?php Print "".$info['alignment'] . "";?>">
				</td>
			</tr>
			<tr>
				<td>
					Max HP</br>
					<input type="number" name="max_hp" id="max_hp" value="<?php Print "".$info['max_hp'] . "";?>" required>
				</td>
				<td>
					Current HP</br>
					<input type="number" name="current_hp" id="current_hp" value="<?php Print "".$info['current_hp'] . "";?>" required>
				</td>
				<td>
					Hit Dice</br>
					<input type="text" name="hit_dice" id="hit_dice" value="<?php Print "".$info['hit_dice'] . "";?>" >
				</td>
			</tr>
			<tr>
				<td>
					Death Save Successes:</br>
					<select name="death_success" id="death_success">
						<option value="<?php Print "".$info['death_success'] . "";?>"><?php Print "".$info['death_success'] . "";?></option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td>
				<td>
					Death Save Failures:</br>
					<select name="death_fail" id="death_fail">
						<option value="<?php Print "".$info['death_fail'] . "";?>"><?php Print "".$info['death_fail'] . "";?></option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Armor Class</br>
					<input type="number" name="armor" id="armor" value="<?php Print "".$info['armor'] . "";?>" required>
				</td>
				<td>
					Speed</br>
					<input type="number" name="speed" id="speed" value="<?php Print "".$info['speed'] . "";?>" required>
				</td>
				<td>
					Initiative:</br>
					<b><?php Print "".$info['initiative'] . "";?></b>
				</td>
			</tr>
			<tr>
				
			</tr>
		</table>
		<h2>Skills</h2>
		<table>
			<tr>
				<td>
					Strength:</br>
					<input type="number" name="str_skill" id="str_skill"  style="width:110px" value="<?php Print "".$info['str_skill'] . "";?>" required>
				</td>
				<td>
					Dexterity:</br>
					<input type="number" name="dex_skill" id="dex_skill"  style="width:110px" value="<?php Print "".$info['dex_skill'] . "";?>" required>
				</td>
				<td>
					Constitution:</br>
					<input type="number" name="con_skill" id="con_skill"  style="width:110px" value="<?php Print "".$info['con_skill'] . "";?>" required>
				</td>
				<td>
					Intelligence:</br>
					<input type="number" name="int_skill" id="int_skill"  style="width:110px" value="<?php Print "".$info['int_skill'] . "";?>" required>
				</td>
				<td>
					Wisdom:</br>
					<input type="number" name="wis_skill" id="wis_skill"  style="width:110px" value="<?php Print "".$info['wis_skill'] . "";?>" required>
				</td>
				<td>
					Charisma:</br>
					<input type="number" name="chr_skill" id="chr_skill"  style="width:110px" value="<?php Print "".$info['chr_skill'] . "";?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						$str = $info['str_skill'];
						$strSub = $str - 10;
						$strSubDiv = $strSub / 2;
						$floorStr = floor($strSubDiv);
						$strNumber = sprintf("%+.0f",$floorStr);
						echo("Str Modifier: <b>".$strNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$dex= $info['dex_skill'];
						$dexSub = $dex - 10;
						$dexSubDiv = $dexSub / 2;
						$floorDex= floor($dexSubDiv);
						$dexNumber = sprintf("%+.0f",$floorDex);
						echo("Dex Modifier: <b>".$dexNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$con = $info['con_skill'];
						$conSub = $con - 10;
						$conSubDiv = $conSub / 2;
						$floorCon = floor($conSubDiv);
						$conNumber = sprintf("%+.0f",$floorCon);
						echo("Con Modifier: <b>".$conNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$int= $info['int_skill'];
						$intSub = $int - 10;
						$intSubDiv = $intSub / 2;
						$floorInt= floor($intSubDiv);
						$intNumber = sprintf("%+.0f",$floorInt);
						echo("Int Modifier: <b>".$intNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$wis = $info['wis_skill'];
						$wisSub = $wis - 10;
						$wisSubDiv = $wisSub / 2;
						$floorWis = floor($wisSubDiv);
						$wisNumber = sprintf("%+.0f",$floorWis);
						echo("Wis Modifier: <b>".$wisNumber."</b>");
						
					?>
				</td>
				<td>
					<?php
						$chr= $info['chr_skill'];
						$chrSub = $chr - 10;
						$chrSubDiv = $chrSub / 2;
						$floorChr= floor($chrSubDiv);
						$chrNumber = sprintf("%+.0f",$floorChr);
						echo("Chr Modifier: <b>".$chrNumber."</b></br>");
					?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="Athletics" value="1" <?php if($info['Athletics'] == 1){Print "CHECKED";}else{}?>>Athletics</br>
				</td>
				<td>
					<input type="checkbox" name="Acrobatics" value="1" <?php if($info['Acrobatics'] == 1){Print "CHECKED";}else{}?> >Acrobatics</br>
					<input type="checkbox" name="Slight_of_Hand" value="1" <?php if($info['Slight_of_Hand'] == 1){Print "CHECKED";}else{}?>>Slight of Hand</br>
					<input type="checkbox" name="Stealth"value="1" <?php if($info['Stealth'] == 1){Print "CHECKED";}else{}?>>Stealth</br>
				</td>
				<td>				
					
				</td>
				<td>				
					<input type="checkbox" name="Arcana" value="1" <?php if($info['Arcana'] == 1){Print "CHECKED";}else{}?>>Arcana</br>
					<input type="checkbox" name="History"value="1" <?php if($info['History'] == 1){Print "CHECKED";}else{}?>>History</br>
					<input type="checkbox" name="Investigation" value="1" <?php if($info['Investigation'] == 1){Print "CHECKED";}else{}?>>Investigation</br>
					<input type="checkbox" name="Nature" value="1" <?php if($info['Nature'] == 1){Print "CHECKED";}else{}?>>Nature</br>
					<input type="checkbox" name="Religion" value="1" <?php if($info['Religion'] == 1){Print "CHECKED";}else{}?>>Religion</br>		
				</td>
				<td>				
					<input type="checkbox" name="Animal_Handling" value="1" <?php if($info['Animal_Handling'] == 1){Print "CHECKED";}else{}?>>Animal Handling</br>
					<input type="checkbox" name="Insight" value="1" <?php if($info['Insight'] == 1){Print "CHECKED";}else{}?>>Insight</br>
					<input type="checkbox" name="Medicine" value="1" <?php if($info['Medicine'] == 1){Print "CHECKED";}else{}?>>Medicine</br>
					<input type="checkbox" name="Perception" value="1" <?php if($info['Perception'] == 1){Print "CHECKED";}else{}?>>Perception</br>
					<input type="checkbox" name="Survival" value="1" <?php if($info['Survival'] == 1){Print "CHECKED";}else{}?>>Survival</br>
				</td>
				<td>
					<input type="checkbox" name="Deception" value="1" <?php if($info['Deception'] == 1){Print "CHECKED";}else{}?>>Deception</br>
					<input type="checkbox" name="Intimidation" value="1" <?php if($info['Intimidation'] == 1){Print "CHECKED";}else{}?>>Intimidation</br>
					<input type="checkbox" name="Persuasion" value="1" <?php if($info['Persuasion'] == 1){Print "CHECKED";}else{}?>>Persuasion</br>
					<input type="checkbox" name="Performance" value="1" <?php if($info['Performance'] == 1){Print "CHECKED";}else{}?>>Performance</br>
				</td>
			</tr>
			<tr>
				<td>
					Proficiency Bonus:</br>
					<b><?PHP
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
					?></b>
				</td>
				<td>
					Passive Wisdom:</br>
					<b><?PHP
						if ($info['Perception'] == 1){
							$PassiveWisdom = 10 + $wisNumber + $bonus;
						}
						else{
							$PassiveWisdom = 10 + $wisNumber;
						}
						echo $PassiveWisdom;
					?></b>
				</td>
			</tr>
		</table>

	<h2>Proficiencies & Languages</h2>
	<table>
		<?php include 'get_proflang.php';?>
		<tr>
			<td>
				<input type="text" name="new_proflang_name" id="new_proflang_name"   placeholder="Add Prof/Lang">
			</td>
			<td>
				<input type="submit" name='submit' value="Update Profs/Langs" ></br>
			</td>
		</tr>
	</table>
	<h2>Attacks and Spellcasting</h2>
	<table>
		<tr>
			<td>
					Name
			</td>
			<td>
					Attack Bonus
			</td>
			<td>
					Damage/Type
			</td>
			<td>
					Description
			</td>
		</tr>
		<?php include 'get_attack.php';?>
		<tr>
			<td>
				<input type="text" name="new_attack_name" id="new_attack_name"   size='20' placeholder="Add Name">
			</td>
			<td>
				<input type="text" name="new_attack_bonus" id="new_attack_bonus"   size="10" placeholder="Add Bonus">
			</td>
			<td>
				<input type="text" name="new_attack_damage_type" id="new_attack_damage_type"  size='15'  placeholder="Add Damage/Type">
			</td>
			<td>
				<input type="text" name="new_attack_description" id="new_attack_description"  size='40'  placeholder="Add Description">
			</td>
			<td>
				<input type="submit" name='submit' value="Update Attacks/Spells" ></br>
			</td>
		</tr>
	</table>
	<h2>Currency</h2>
	<table>
		<tr>
			<td>CP:</td><td><input type="number" name="cp" id="cp"  style="width:110px" value="<?php Print "".$info['cp_count'] . "";?>" required></td></tr>
			<td>SP:</td><td><input type="number" name="sp" id="sp"  style="width:110px" value="<?php Print "".$info['sp_count'] . "";?>" required></td></tr>
			<td>EP:</td><td><input type="number" name="ep" id="ep"  style="width:110px" value="<?php Print "".$info['ep_count'] . "";?>" required></td></tr>
			<td>GP:</td><td><input type="number" name="gp" id="gp"  style="width:110px" value="<?php Print "".$info['gp_count'] . "";?>" required></td></tr>
			<td>PP:</td><td><input type="number" name="pp" id="pp"  style="width:110px" value="<?php Print "".$info['pp_count'] . "";?>" required></td></tr>
	</table>
	</br>
	<h2>Inventory</h2>
	<table>
		<tr>
			<td>
				Item Count:
			</td>
			<td>
				Item Name:
			</td>
			<td>
				Item Weight:
			</td>
		</tr>
		<?php include 'get_item.php';?>
		<tr>
			<td>
				<input type="number" name="item_count" id="item_count"  style="width:110px" placeholder="Add Count">
			</td>
			<td>
				<input type="text" name="item_name" id="item_name"  size="40" placeholder="Add Name">
			</td>
			<td>
				<input type="text" name="item_weight" id="item_weight" size="10" placeholder="Add Weight">
			</td>
			<td>
				<input type="submit" name='submit' value="Update Items" ></br>
			</td>
		</tr>
			
	</table>
	</br>
	
	<input type="submit" name='submit' value="Update Character" >
</form>
<script>
	function updatenotice() {
		alert("Character Information Updated");
	}
</script>