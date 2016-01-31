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
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Combat</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
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
<h1><?php Print "".$info['character_name'] . "'s Combat Sheet";?></h1>
<p id='gray'>This page provides a condensed character sheet which is easy to use in combat scenarios.</p>
<p id='gray'>Click "Update Character" to save changes.</p>
<form action="update_combat.php?id=<?php Print $id;?>" method="POST"> 
	<input type="submit" name='submit' value="Update Character"></br></br>
	<table>
		<tr>
			<td>
				Initiative:</br>
				<b><?php Print "".$info['initiative'] . "";?></b>
			</td>
			<td>
				Armor Class</br>
				<b><?php Print "".$info['armor'] . "";?></b>
			</td>
			<td>
				Speed</br>
				<b><?php Print "".$info['speed'] . "";?></b>
			</td>
			
		</tr>
		<tr>
			<td>
				Current HP</br>
				<input type="number" name="current_hp" id="current_hp" value="<?php Print "".$info['current_hp'] . "";?>" required>
			</td>
			<td>
				Max HP</br>
				<b><?php Print "".$info['max_hp'] . "";?></b>
			</td>
			<td>
				Hit Dice</br>
				<b><?php Print "".$info['hit_dice'] . "";?></b>
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
				Experience:</br>
				<input type="number" name="experience" id="experience" value="<?php Print "".$info['experience'] . "";?>" required>
			</td>
			<td>
				Level:</br>
				<b><?php Print "".$info['level'] . "";?></b>
			</td>
			<td>
				Inspiration:</br>
				<b><?php Print "".$info['Inspiration'] . "";?></b>
			</td>
		</tr>
	</table>
	
	
	<h2>Skills</h2>
	<table>
		<tr>
			<td>
				Strength:</br>
				<b><?php Print "".$info['str_skill'] . "";?></b>
			</td>
			<td>
				Dexterity:</br>
				<b><?php Print "".$info['dex_skill'] . "";?></b>
			</td>
			<td>
				Constitution:</br>
				<b><?php Print "".$info['con_skill'] . "";?></b>
			</td>
			<td>
				Intelligence:</br>
				<b><?php Print "".$info['int_skill'] . "";?></b>
			</td>
			<td>
				Wisdom:</br>
				<b><?php Print "".$info['wis_skill'] . "";?></b>
			</td>
			<td>
				Charisma:</br>
				<b><?php Print "".$info['chr_skill'] . "";?></b>
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
				<?php 
				if($info['Athletics'] == 1){
					Print "<input type='checkbox' name='Athletics' value='1' CHECKED DISABLED> Athletics</br>";}
				else{}?>
			</td>
			<td>
				<?php 
					if($info['Acrobatics'] == 1){
						Print "<input type='checkbox' name='Acrobatics' value='1' CHECKED DISABLED> Acrobatics</br>";}
					else{}
					if($info['Slight_of_Hand'] == 1){
						Print "<input type='checkbox' name='Slight_of_Hand' value='1' CHECKED DISABLED> Sleight of Hand</br>";}
					else{}
					if($info['Stealth'] == 1){
						Print "<input type='checkbox' name='Stealth' value='1' CHECKED DISABLED> Stealth</br>";}
					else{}?>
			</td>
			<td>				
				
			</td>
			<td>				
				<?php 
				if($info['Arcana'] == 1){
					Print "<input type='checkbox' name='Arcana' value='1' CHECKED DISABLED> Arcana</br>";}
				else{}
				if($info['History'] == 1){
					Print "<input type='checkbox' name='History' value='1' CHECKED DISABLED> History</br>";}
				else{}
				if($info['Investigation'] == 1){
					Print "<input type='checkbox' name='Investigation' value='1' CHECKED DISABLED> Investigation</br>";}
				else{}
				if($info['Nature'] == 1){
					Print "<input type='checkbox' name='Nature' value='1' CHECKED DISABLED> Nature</br>";}
				else{}
				if($info['Religion'] == 1){
					Print "<input type='checkbox' name='Religion' value='1' CHECKED DISABLED> Religion</br>";}
				else{}?>	
			</td>
			<td>	
				<?php 
					if($info['Animal_Handling'] == 1){
						Print "<input type='checkbox' name='Animal_Handling' value='1' CHECKED DISABLED> Animal Handling</br>";}
					else{}
					if($info['Insight'] == 1){
						Print "<input type='checkbox' name='Insight' value='1' CHECKED DISABLED> Insight</br>";}else{}
					if($info['Medicine'] == 1){Print "<input type='checkbox' name='Medicine' value='1' CHECKED DISABLED> Medicine</br>";}
					else{}
					if($info['Perception'] == 1){
						Print "<input type='checkbox' name='Perception' value='1' CHECKED DISABLED> Perception</br>";}
					else{}
					if($info['Survival'] == 1){
						Print "<input type='checkbox' name='Survival' value='1' CHECKED DISABLED> Survival</br>";}
					else{}?>
			</td>
			<td>
				<?php 
					if($info['Deception'] == 1){
						Print "<input type='checkbox' name='Deception' value='1' CHECKED DISABLED> Deception</br>";}
					else{}
					if($info['Intimidation'] == 1){
						Print "<input type='checkbox' name='Intimidation' value='1' CHECKED DISABLED> Intimidation</br>";}
					else{}
					if($info['Persuasion'] == 1){
						Print "<input type='checkbox' name='Persuasion' value='1' CHECKED DISABLED> Persuasion</br>";}
					else{}
					if($info['Performance'] == 1){
						Print "<input type='checkbox' name='Performance' value='1' CHECKED DISABLED> Performance</br>";}
					else{}?>
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
	<h2>Attacks and Spellcasting</h2>
	<table>
		<tr>
			<td>
					Name&nbsp;&nbsp;
			</td>
			<td>
					Attack Bonus&nbsp;&nbsp;
			</td>
			<td>
					Damage/Type&nbsp;&nbsp;
			</td>
			<td>
					Description&nbsp;&nbsp;
			</td>
		</tr>
		<?php
			$attack_data = mysql_query("SELECT * FROM attacks WHERE character_id = " . $id)  
				or die(mysql_error());
				
			//loop to get every attack for that character
			while($attack = mysql_fetch_array($attack_data)) { 
				$DBName = $attack['attack_name'];
				$attack_name = htmlspecialchars($DBName, ENT_QUOTES);
				$attack_bonus = $attack['attack_bonus'];
				$attack_damage_type = $attack['attack_damage_type'];
				$DBName2 = $attack['attack_description'];
				$attack_description = htmlspecialchars($DBName2, ENT_QUOTES);
				$attack_id=$attack['attack_id'];
					
				//echo the html into the existing table and add [] to the name which will make it part of an array somehow
				echo "<tr><td><b>".$attack_name."&nbsp;&nbsp;</b></td>\n";
				echo "<td><b>".$attack_bonus."&nbsp;&nbsp;</b></td>\n";
				echo "<td>".$attack_damage_type."&nbsp;&nbsp;</td>\n";
				echo "<td>".$attack_description."&nbsp;&nbsp;<input type='hidden' name='attack_id[]' id='attack_id' value='".$attack_id."'></td>\n";
				echo "</tr>\n";
			}
			?>
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
		<?php include 'get_item_combat.php';?>
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