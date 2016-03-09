<?php

$id = $_GET['id'];

/*
 * DATABASE CONNECTION
 */

// DATABASE: Connection variables
include "includes/connections.php";

// DATABASE: Try to connect
if (!$conn = mysql_connect($servername, $username, $password))
	die('Unable to connect to MySQL.');
if (!$db_select = mysql_select_db($dbname, $conn))
	die('Unable to select database');

/*
 * DATABASE QUERY
 */

// DATABASE: Get current row
$result = mysql_query("SELECT * FROM character_sheet WHERE character_id= ".$id);
$row = mysql_fetch_assoc($result);

?>
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Character</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print $id ."";?>">Backstory</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_cantrips.php?id=<?php Print $id ."";?>">Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print $id ."";?>">Settings</a>
</div>
<p>&nbsp;</p>
<h1><?php echo $row['character_name'] . "'s Character Sheet";?></h1>
<p id="notice"></p>
<p id='gray'>Click "Update Character" to save changes.</p>
<form id="ajax-form" class="autosubmit" method="POST" action="./character_update.php">
	
	<table>
		<tr>
			<td>
				Character Name:</br>
				<input type="text" name="character_name" value="<?php echo $row['character_name'];?>" required>
			</td>
			<td>
				Level:</br>
				<input type="number" name="level" value="<?php echo $row['level'];?>" required>
			</td>
			<td>
				Experience:</br>
				<input type="number" name="experience" value="<?php echo $row['experience'];?>" required>
			</td>
			<td>
				Inspiration:</br>
				<input type="number" name="inspiration" value="<?php echo $row['inspiration'];?>" required>
			</td>
		</tr>
		<tr>
				<td>
					Class:</br>
					<input type="text" name="class_level" value="<?php echo $row['class_level'];?>" required>
				</td>
				<td>
					Background:</br>
					<input type="text" name="background" value="<?php echo $row['background'];?>" >
				</td>
				<td>
					Race:</br>
					<input type="text" name="race" value="<?php echo $row['race'];?>">
				</td>
				<td>
					Alignment:</br>
					<input type="text" name="alignment" value="<?php echo $row['alignment'];?>">
				</td>
			</tr>
			<tr>
				<td>
					Max HP</br>
					<input type="number" name="max_hp" value="<?php echo $row['max_hp'];?>" required>
				</td>
				<td>
					Current HP</br>
					<input type="number" name="current_hp" value="<?php echo $row['current_hp'];?>" required>
				</td>
				<td>
					Hit Dice</br>
					<input type="text" name="hit_dice" value="<?php echo $row['hit_dice'];?>" >
				</td>
			</tr>
			<tr>
				<td>
					Death Save Successes:</br>
					<select name="death_success">
						<option value="<?php echo $row['death_success'];?>"><?php echo $row['death_success'];?></option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td>
				<td>
					Death Save Failures:</br>
					<select name="death_fail">
						<option value="<?php echo $row['death_fail'];?>"><?php echo $row['death_fail'];?></option>
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
					<input type="number" name="armor"  value="<?php echo $row['armor'];?>" required>
				</td>
				<td>
					Speed</br>
					<input type="number" name="speed"  value="<?php echo $row['speed'];?>" required>
				</td>
				<td>
					Initiative:</br>
					<b><?php echo $row['initiative'];?></b>
				</td>
			</tr>
	</table>
	<h2>Skills</h2>
		<table>
			<tr>
				<td>
					Strength:</br>
					<input type="number" name="str_skill" style="width:110px" value="<?php echo $row['str_skill'];?>" required>
				</td>
				<td>
					Dexterity:</br>
					<input type="number" name="dex_skill" style="width:110px" value="<?php echo $row['dex_skill'];?>" required>
				</td>
				<td>
					Constitution:</br>
					<input type="number" name="con_skill" style="width:110px" value="<?php echo $row['con_skill'];?>" required>
				</td>
				<td>
					Intelligence:</br>
					<input type="number" name="int_skill" style="width:110px" value="<?php echo $row['int_skill'];?>" required>
				</td>
				<td>
					Wisdom:</br>
					<input type="number" name="wis_skill" style="width:110px" value="<?php echo $row['wis_skill'];?>" required>
				</td>
				<td>
					Charisma:</br>
					<input type="number" name="chr_skill" style="width:110px" value="<?php echo $row['chr_skill'];?>" required>
				</td>
			</tr>
			<tr>
				<td>
					<?php
						$str = $row['str_skill'];
						$strSub = $str - 10;
						$strSubDiv = $strSub / 2;
						$floorStr = floor($strSubDiv);
						$strNumber = sprintf("%+.0f",$floorStr);
						echo("Str Modifier: <b>".$strNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$dex= $row['dex_skill'];
						$dexSub = $dex - 10;
						$dexSubDiv = $dexSub / 2;
						$floorDex= floor($dexSubDiv);
						$dexNumber = sprintf("%+.0f",$floorDex);
						echo("Dex Modifier: <b>".$dexNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$con = $row['con_skill'];
						$conSub = $con - 10;
						$conSubDiv = $conSub / 2;
						$floorCon = floor($conSubDiv);
						$conNumber = sprintf("%+.0f",$floorCon);
						echo("Con Modifier: <b>".$conNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$int= $row['int_skill'];
						$intSub = $int - 10;
						$intSubDiv = $intSub / 2;
						$floorInt= floor($intSubDiv);
						$intNumber = sprintf("%+.0f",$floorInt);
						echo("Int Modifier: <b>".$intNumber."</b>");
					?>
				</td>
				<td>
					<?php
						$wis = $row['wis_skill'];
						$wisSub = $wis - 10;
						$wisSubDiv = $wisSub / 2;
						$floorWis = floor($wisSubDiv);
						$wisNumber = sprintf("%+.0f",$floorWis);
						echo("Wis Modifier: <b>".$wisNumber."</b>");
						
					?>
				</td>
				<td>
					<?php
						$chr= $row['chr_skill'];
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
					<input type="checkbox" name="Athletics" value="1" <?php if($row['Athletics'] == 1){echo "CHECKED";}else{}?>>Athletics</br>
				</td>
				<td>
					<input type="checkbox" name="Acrobatics" value="1" <?php if($row['Acrobatics'] == 1){echo "CHECKED";}else{}?> >Acrobatics</br>
					<input type="checkbox" name="Slight_of_Hand" value="1" <?php if($row['Slight_of_Hand'] == 1){echo "CHECKED";}else{}?>>Slight of Hand</br>
					<input type="checkbox" name="Stealth"value="1" <?php if($row['Stealth'] == 1){echo "CHECKED";}else{}?>>Stealth</br>
				</td>
				<td>				
					
				</td>
				<td>				
					<input type="checkbox" name="Arcana" value="1" <?php if($row['Arcana'] == 1){echo "CHECKED";}else{}?>>Arcana</br>
					<input type="checkbox" name="History"value="1" <?php if($row['History'] == 1){echo "CHECKED";}else{}?>>History</br>
					<input type="checkbox" name="Investigation" value="1" <?php if($row['Investigation'] == 1){echo "CHECKED";}else{}?>>Investigation</br>
					<input type="checkbox" name="Nature" value="1" <?php if($row['Nature'] == 1){echo "CHECKED";}else{}?>>Nature</br>
					<input type="checkbox" name="Religion" value="1" <?php if($row['Religion'] == 1){echo "CHECKED";}else{}?>>Religion</br>		
				</td>
				<td>				
					<input type="checkbox" name="Animal_Handling" value="1" <?php if($row['Animal_Handling'] == 1){echo "CHECKED";}else{}?>>Animal Handling</br>
					<input type="checkbox" name="Insight" value="1" <?php if($row['Insight'] == 1){echo "CHECKED";}else{}?>>Insight</br>
					<input type="checkbox" name="Medicine" value="1" <?php if($row['Medicine'] == 1){echo "CHECKED";}else{}?>>Medicine</br>
					<input type="checkbox" name="Perception" value="1" <?php if($row['Perception'] == 1){echo "CHECKED";}else{}?>>Perception</br>
					<input type="checkbox" name="Survival" value="1" <?php if($row['Survival'] == 1){echo "CHECKED";}else{}?>>Survival</br>
				</td>
				<td>
					<input type="checkbox" name="Deception" value="1" <?php if($row['Deception'] == 1){echo "CHECKED";}else{}?>>Deception</br>
					<input type="checkbox" name="Intimidation" value="1" <?php if($row['Intimidation'] == 1){echo "CHECKED";}else{}?>>Intimidation</br>
					<input type="checkbox" name="Persuasion" value="1" <?php if($row['Persuasion'] == 1){echo "CHECKED";}else{}?>>Persuasion</br>
					<input type="checkbox" name="Performance" value="1" <?php if($row['Performance'] == 1){echo "CHECKED";}else{}?>>Performance</br>
				</td>
			</tr>
			<tr>
				<td>
					Proficiency Bonus:</br>
					<b><?PHP
						$level = $row['level'];

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
						if ($row['Perception'] == 1){
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
		<input id="where" type="hidden" name="character_id" value="<?php echo $row['character_id'] ?>" />
	</form>
<!-- END TOP OF CHARACTER SHEET-->	

<h2 id="proflang">Proficiencies & Languages</h2>
<form method="POST" id="newProficiency" action="./new_proflang.php?id=<?PHP echo $id ?>">
	<div class="FloatDiv"><input type="text" name="new_proflang_name" id="new_proflang_name"   placeholder="Add Prof/Lang"></div>
	<div class="FloatDiv"><input type="submit" name='submit' value="Add Prof/Lang" ></div>
	</br>
	</br>
</form>
<?php
/*
 * DATABASE QUERY
 */
// DATABASE: Get current row
$p_result = mysql_query("SELECT * FROM proficiency_language WHERE character_id =".$id)
	or die(mysql_error());

while($p_array = mysql_fetch_array($p_result)) { 
?>
	<form id="ajax-form" class="autosubmit" method="POST" action="proflang_update.php?id=<?PHP echo $id ?>">
		<div class="FloatDiv"><input type='text' name='proflang_name' id='proflang_name' value='<?php echo htmlspecialchars($p_array['proflang_name'], ENT_QUOTES) ?>' REQUIRED></div>
		<div id="Delete" class="FloatDiv"><a href='delete_proflang.php?id=<?PHP echo $id ?>&proflang=<?php echo $p_array['proflang_id'] ?>'>Delete?</a></div>
		<div class="FloatDiv"><input type='hidden' name='proflang_id' id='where' value='<?php echo $p_array['proflang_id'] ?>'/></div>
	</form>
	</br>
	</br>
<?php } ?>		


<h2 id="attacks">Attacks and Spellcasting</h2>

<form method="POST" id="newProficiency" action="new_attack.php?id=<?PHP echo $id ?>">
	<div class="FloatDiv"><input type="text" name="new_attack_name" id="new_attack_name"   size='20' placeholder="Add Name"></div>
	<div class="FloatDiv"><input type="text" name="new_attack_bonus" id="new_attack_bonus"  placeholder="Add Bonus"></div>
	<div class="FloatDiv"><input type="text" name="new_attack_damage_type" id="new_attack_damage_type"  size='15'  placeholder="Add Damage/Type"></div>
	<div class="FloatDiv"><input type="text" name="new_attack_description" id="new_attack_description"  size='40'  placeholder="Add Description"></div>
	<div class="FloatDiv"><input type="submit" name='submit' value="Add Attack" ></div>
</form>
</br>
</br>
<?php
/*
 * DATABASE QUERY
 */

// DATABASE: Get current row
$a_result = mysql_query("SELECT * FROM attacks WHERE character_id =".$id)
	or die(mysql_error());

while($a_array = mysql_fetch_array($a_result)) { 
	//$a_row = mysql_fetch_assoc($a_array); 
?>
		
<form id="ajax-form" class="autosubmit" method="POST" action="./attack_update.php">
	<div class="FloatDiv"><input type='text' name='attack_name' value='<?php echo htmlspecialchars($a_array['attack_name'], ENT_QUOTES) ?>' REQUIRED></div>
	<div class="FloatDiv"><input type='text' name='attack_bonus' value='<?php echo htmlspecialchars($a_array['attack_bonus'], ENT_QUOTES) ?>' ></div>
	<div class="FloatDiv"><input type='text' name='attack_damage_type' size='15' value='<?php echo htmlspecialchars($a_array['attack_damage_type'], ENT_QUOTES) ?>' ></div>
	<div class="FloatDiv"><input type='text' maxlength='120'name='attack_description' size='40' value='<?php echo htmlspecialchars($a_array['attack_description'], ENT_QUOTES)?>' ></div>
	<div class="FloatDiv"><input type='hidden' name='attack_id' id='where' value='<?php echo $a_array['attack_id'] ?>'/></div>
</form>
<div id="Delete" class="FloatDiv"><a href="delete_attack.php?id=<?PHP echo $id ?>&attack=<?PHP echo $a_array['attack_id'] ?>">Delete?</a></div>
</br>
</br>
	
<?php } ?>
	

<h2>Currency</h2>
<form id="ajax-form" class="autosubmit" method="POST" action="./character_update.php">
	<input type="number" name="cp_count" id="cp"  style="width:110px" value="<?php Print $row['cp_count'];?>" required>CP</br></br>
	<input type="number" name="sp_count" id="sp"  style="width:110px" value="<?php Print $row['sp_count'];?>" required>SP</br></br>
	<input type="number" name="ep_count" id="ep"  style="width:110px" value="<?php Print $row['ep_count'];?>" required>EP</br></br>
	<input type="number" name="gp_count" id="gp"  style="width:110px" value="<?php Print $row['gp_count'];?>" required>GP</br></br>
	<input type="number" name="pp_count" id="pp"  style="width:110px" value="<?php Print $row['pp_count'];?>" required>PP</br></br>
	<input id="where" type="hidden" name="character_id" value="<?php echo $row['character_id'] ?>" />
</form>
</br>
</br>
<h2>Inventory</h2>
<?php
		/*
		 * DATABASE QUERY
		 */
		// DATABASE: Get current row
		$i_result = mysql_query("SELECT * FROM items WHERE character_id =".$id)
			or die(mysql_error());

		while($i_array = mysql_fetch_array($i_result)) { 
		?>
			<form id="ajax-form" class="autosubmit" method="POST" action="./item_update.php">
				<input type='number' name='item_count' value="<?PHP echo $i_array['item_count']?>" REQUIRED>
				<input type='text' name='item_name' value='<?PHP echo $i_array['item_name']?>' REQUIRED>
				<input type='text' name='item_weight' value='<?PHP echo $i_array['item_weight']?>'>
				<td id='Delete'><a href='delete_item.php?id=<?PHP echo $id ?>&item=<?php echo $i_array['item_id'] ?>'>Delete?</a>
				<input type='hidden' name='item_id' id='where' value='<?php echo $i_array['item_id'] ?>'/>
			</form>
			</br>
			</br>
		<?php } ?>	
	<!--
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
		<?php //include 'get_item.php';?>
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
-->
