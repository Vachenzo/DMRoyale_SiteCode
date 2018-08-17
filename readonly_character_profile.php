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
	<a href="readonly_view_story.php?id=<?php Print $id ."";?>">Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_cantrips.php?id=<?php Print $id ."";?>">Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print $info['character_name']."'s Character Sheet";?></h1>
 	<p><b>Player:</b>
	<?php Print $info['player_name'];?></p>
	<p><b>Character Name:</b>
	<?php Print $info['character_name'];?></p>
	<p><b>Level:</b>
	<?php Print $info['level'];?></p>
	<p><b>Armor Class:</b>
	<?php Print $info['armor'];?></p>
	<p><b>Speed:</b>
	<?php Print $info['speed'];?></p>
	<p><b>Initiative:</b>
	<?php Print $info['initiative'];?></p>
	<p><b>Experience:</b>
	<?php Print $info['experience'];?></p>
	<p><b>Inspiration:</b>
	<?php Print $info['inspiration'];?></p>
	<p><b>Class:</b>
	<?php Print $info['class_level'];?></p>
	<p><b>Background:</b>
	<?php Print $info['background'];?></p>
	<p><b>Race:</b>
	<?php Print $info['race'];?></p>
	<p><b>Alignment:</b>
	<?php Print $info['alignment'];?></p>
	<p><b>Max HP:</b>
	<?php Print $info['max_hp'];?></p>
	<p><b>Current HP:</b>
	<?php Print $info['current_hp'];?></p>
	<p><b>Hit Dice:</b>
	<?php Print $info['hit_dice'];?></p>
	<p><b>Death Save Successes:</b>
	<?php Print $info['death_success'];?></p>
	<p><b>Death Save Failures:</b>
	<?php Print $info['death_fail'];?></p>
	<p><b>Initiative:</b>
	<?php 
	if ($info['campaign_code'] != null){
	echo $info['initiative'] ;	
	}
	else{
		$dex= $info['dex_skill'];
		$dexSub = $dex - 10;
		$dexSubDiv = $dexSub / 2;
		$floorDex= floor($dexSubDiv);
		$dexNumber = sprintf("%+.0f",$floorDex);
		echo $info['initiative'] + $floorDex;
	}
	?>

	<h2>Skills</h2>
	<table>
		<tr>
			<td>
				<b>Strength:</b> <?php Print $info['str_skill'];?>
			</td>
			<td>
				<b>Dexterity:</b> <?php Print $info['dex_skill'];?>
			</td>
			<td>
				<b>Constitution:</b> <?php Print $info['con_skill'];?>
			</td>
			<td>
				<b>Intelligence:</b><?php Print $info['int_skill'];?>
			</td>
			<td>
				<b>Wisdom:</b> <?php Print $info['wis_skill'];?>
			</td>
			<td>
				<b>Charisma:</b> <?php Print $info['chr_skill'];?>
			</td>
		</tr>
		<tr>
			<td>
				<b>Str Modifier:</b>
				<?php
					$str = $info['str_skill'];
					$strSub = $str - 10;
					$strSubDiv = $strSub / 2;
					$floorStr = floor($strSubDiv);
					$strNumber = sprintf("%+.0f",$floorStr);
					echo $strNumber;
				?>
			</td>
			<td>
				<b>Dex Modifier: </b>
				<?php
					$dex= $info['dex_skill'];
					$dexSub = $dex - 10;
					$dexSubDiv = $dexSub / 2;
					$floorDex= floor($dexSubDiv);
					$dexNumber = sprintf("%+.0f",$floorDex);
					echo $dexNumber;
				?>
			</td>
			<td>
				<b>Con Modifier: </b>
				<?php
					$con = $info['con_skill'];
					$conSub = $con - 10;
					$conSubDiv = $conSub / 2;
					$floorCon = floor($conSubDiv);
					$conNumber = sprintf("%+.0f",$floorCon);
					echo $conNumber;
				?>
			</td>
			<td>
				<b>Int Modifier: </b>
				<?php
					$int= $info['int_skill'];
					$intSub = $int - 10;
					$intSubDiv = $intSub / 2;
					$floorInt= floor($intSubDiv);
					$intNumber = sprintf("%+.0f",$floorInt);
					echo $intNumber;
				?>
			</td>
			<td>
				<b>Wis Modifier: </b>
				<?php
					$wis = $info['wis_skill'];
					$wisSub = $wis - 10;
					$wisSubDiv = $wisSub / 2;
					$floorWis = floor($wisSubDiv);
					$wisNumber = sprintf("%+.0f",$floorWis);
					echo $wisNumber;
					
				?>
			</td>
			<td>
				<b>Chr Modifier: </b>
				<?php
					$chr= $info['chr_skill'];
					$chrSub = $chr - 10;
					$chrSubDiv = $chrSub / 2;
					$floorChr= floor($chrSubDiv);
					$chrNumber = sprintf("%+.0f",$floorChr);
					echo $chrNumber;
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
					<b>Attack Name:</b>
			</td>
			<td>
					<b>Attack Bonus:</b>
			</td>
			<td>
					<b>Damage/Type:</b>
			</td>
			<td>
					<b>Description:</b>
			</td>
		</tr>
		<?php include 'readonly_get_attack.php';?>
	</table>
	<h2>Currency</h2>
	<b>SP:</b> <?php Print $info['sp_count'];?></br>
	<b>CP:</b> <?php Print $info['cp_count'];?></br>
	<b>EP:</b> <?php Print $info['ep_count'];?></br>
	<b>GP:</b> <?php Print $info['gp_count'];?></br>
	<b>PP:</b> <?php Print $info['pp_count'];?></br>
	</br>
	<h2>Inventory</h2>
	<table>
		<tr>
			<td>
					<b>Quantity:</b>
			</td>
			<td>
					<b>Item Name:</b>
			</td>
			<td>
					<b>Weight:</b>
			</td>
		</tr>
		<?php include 'readonly_get_item.php';?>
	</table>
	</br>