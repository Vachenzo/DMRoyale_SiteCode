<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id)  
	or die(mysql_error());
$info = mysql_fetch_array( $data );
?>
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Character</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_story.php?id=<?php Print "".$id ."";?>">Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_cantrips.php?id=<?php Print "".$id ."";?>">Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$info['character_name'] . "'s Character Sheet";?></h1>
 
	Player Name:</br>
				<input type="hidden" name="playername" id="playername" value="<?php Print "".$info['player_name'] . "";?>">
				<?php Print "".$info['player_name'] . "";?>
	<table>
		<tr>

			<td>
				Character Name:</br>
				<input disabled type="text" name="charactername" id="charactername" value="<?php Print "".$info['character_name'] . "";?>">
			</td>
			<td>
				Level:</br>
				<input  disabled type="number" name="level" id="level" value="<?php Print "".$info['level'] . "";?>" required>
			</td>
			<td>
				Experience:</br>
				<input  disabled type="number" name="experience" id="experience" value="<?php Print "".$info['experience'] . "";?>" required>
			</td>
			<td>
				Inspiration:</br>
				<input disabled  type="number" name="inspiration" id="inspiration" value="<?php Print "".$info['inspiration'] . "";?>" required>
			</td>
			
		</tr>
		<tr>
			<td>
				Class:</br>
				<input  disabled type="text" name="classlevel" id="classlevel" value="<?php Print "".$info['class_level'] . "";?>" required>
			</td>
			<td>
				Background:</br>
				<input disabled  type="text" name="background" id="background" value="<?php Print "".$info['background'] . "";?>" required>
			</td>
			<td>
				Race:</br>
				<input disabled  type="text" name="race" id="race" value="<?php Print "".$info['race'] . "";?>">
			</td>
			<td>
				Alignment:</br>
				<input  disabled type="text" name="alignment" id="alignment" value="<?php Print "".$info['alignment'] . "";?>">
			</td>
		</tr>
		<tr>
			<td>
				Max HP</br>
				<input  disabled type="number" name="max_hp" id="max_hp" value="<?php Print "".$info['max_hp'] . "";?>" required>
			</td>
			<td>
				Current HP</br>
				<input  disabled type="number" name="current_hp" id="current_hp" value="<?php Print "".$info['current_hp'] . "";?>" required>
			</td>
			<td>
				Hit Dice</br>
				<input  disabled type="text" name="hit_dice" id="hit_dice" value="<?php Print "".$info['hit_dice'] . "";?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Death Save Successes:</br>
				<select  disabled name="death_success" id="death_success">
					<option value="<?php Print "".$info['death_success'] . "";?>"><?php Print "".$info['death_success'] . "";?></option>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</td>
			<td>
				Death Save Failures:</br>
				<select  disabled name="death_fail" id="death_fail">
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
				<input  disabled type="number" name="armor" id="armor" value="<?php Print "".$info['armor'] . "";?>" required>
			</td>
			<td>
				Speed</br>
				<input disabled  type="number" name="speed" id="speed" value="<?php Print "".$info['speed'] . "";?>" required>
			</td>
			<td>
				Initiative:</br>
				<input  disabled type="number" name="initiative" id="initiative" value="<?php Print "".$info['initiative'] . "";?>" >
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
				<input disabled  type="number" name="str_skill" id="str_skill" required style="width:110px" value="<?php Print "".$info['str_skill'] . "";?>">
			</td>
			<td>
				Dexterity:</br>
				<input disabled  type="number" name="dex_skill" id="dex_skill" required style="width:110px" value="<?php Print "".$info['dex_skill'] . "";?>">
			</td>
			<td>
				Constitution:</br>
				<input disabled  type="number" name="con_skill" id="con_skill" required style="width:110px" value="<?php Print "".$info['con_skill'] . "";?>">
			</td>
			<td>
				Intelligence:</br>
				<input disabled  type="number" name="int_skill" id="int_skill" required style="width:110px" value="<?php Print "".$info['int_skill'] . "";?>">
			</td>
			<td>
				Wisdom:</br>
				<input disabled  type="number" name="wis_skill" id="wis_skill" required style="width:110px" value="<?php Print "".$info['wis_skill'] . "";?>">
			</td>
			<td>
				Charisma:</br>
				<input disabled  type="number" name="chr_skill" id="chr_skill" required style="width:110px" value="<?php Print "".$info['chr_skill'] . "";?>">
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
				<input disabled  type="checkbox" name="Athletics" value="1" <?php if($info['Athletics'] == 1){Print "CHECKED";}else{}?>>Athletics</br>
			</td>
			<td>
				<input disabled  type="checkbox" name="Acrobatics" value="1" <?php if($info['Acrobatics'] == 1){Print "CHECKED";}else{}?> >Acrobatics</br>
				<input disabled  type="checkbox" name="Slight_of_Hand" value="1" <?php if($info['Slight_of_Hand'] == 1){Print "CHECKED";}else{}?>>Slight of Hand</br>
				<input disabled  type="checkbox" name="Stealth"value="1" <?php if($info['Stealth'] == 1){Print "CHECKED";}else{}?>>Stealth</br>
			</td>
			<td>				
				
			</td>
			<td>				
				<input disabled  type="checkbox" name="Arcana" value="1" <?php if($info['Arcana'] == 1){Print "CHECKED";}else{}?>>Arcana</br>
				<input disabled  type="checkbox" name="History"value="1" <?php if($info['History'] == 1){Print "CHECKED";}else{}?>>History</br>
				<input disabled  type="checkbox" name="Investigation" value="1" <?php if($info['Investigation'] == 1){Print "CHECKED";}else{}?>>Investigation</br>
				<input disabled  type="checkbox" name="Nature" value="1" <?php if($info['Nature'] == 1){Print "CHECKED";}else{}?>>Nature</br>
				<input disabled  type="checkbox" name="Religion" value="1" <?php if($info['Religion'] == 1){Print "CHECKED";}else{}?>>Religion</br>		
			</td>
			<td>				
				<input disabled  type="checkbox" name="Animal_Handling" value="1" <?php if($info['Animal_Handling'] == 1){Print "CHECKED";}else{}?>>Animal Handling</br>
				<input disabled  type="checkbox" name="Insight" value="1" <?php if($info['Insight'] == 1){Print "CHECKED";}else{}?>>Insight</br>
				<input disabled  type="checkbox" name="Medicine" value="1" <?php if($info['Medicine'] == 1){Print "CHECKED";}else{}?>>Medicine</br>
				<input disabled  type="checkbox" name="Perception" value="1" <?php if($info['Perception'] == 1){Print "CHECKED";}else{}?>>Perception</br>
				<input disabled  type="checkbox" name="Survival" value="1" <?php if($info['Survival'] == 1){Print "CHECKED";}else{}?>>Survival</br>
			</td>
			<td>
				<input disabled  type="checkbox" name="Deception" value="1" <?php if($info['Deception'] == 1){Print "CHECKED";}else{}?>>Deception</br>
				<input disabled  type="checkbox" name="Intimidation" value="1" <?php if($info['Intimidation'] == 1){Print "CHECKED";}else{}?>>Intimidation</br>
				<input disabled  type="checkbox" name="Persuasion" value="1" <?php if($info['Persuasion'] == 1){Print "CHECKED";}else{}?>>Persuasion</br>
				<input disabled  type="checkbox" name="Performance" value="1" <?php if($info['Performance'] == 1){Print "CHECKED";}else{}?>>Performance</br>
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
		<?php include 'readonly_get_proflang.php';?>
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
		</tr>
		<?php include 'readonly_get_attack.php';?>
	</table>
	<h2>Currency</h2>
	<table>
		<tr>
			<td>
				SP:</br>
				<input disabled  type="number" name="sp" id="sp" required style="width:110px" value="<?php Print "".$info['sp_count'] . "";?>">
			</td>
			<td>
				CP:</br>
				<input disabled  type="number" name="cp" id="cp" required style="width:110px" value="<?php Print "".$info['cp_count'] . "";?>">
			</td>
			<td>
				EP:</br>
				<input disabled  type="number" name="ep" id="ep" required style="width:110px" value="<?php Print "".$info['ep_count'] . "";?>">
			</td>
			<td>
				GP:</br>
				<input disabled  type="number" name="gp" id="gp" required style="width:110px" value="<?php Print "".$info['gp_count'] . "";?>">
			</td>
			<td>
				PP:</br>
				<input disabled  type="number" name="pp" id="pp" required style="width:110px" value="<?php Print "".$info['pp_count'] . "";?>">
			</td>
			<td>
				
			</td>
		</tr>
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
		</tr>
		<?php include 'readonly_get_item.php';?>
		
	</table>
	</br>