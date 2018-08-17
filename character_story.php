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
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_cantrips.php?id=<?php Print $id ."";?>">Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print $id ."";?>">Settings</a>
</div>

<p>&nbsp;</p>
<h1><?php Print $charinfo['character_name']."'s Backstory";?></h1>

<form action="update_story.php?id=<?php Print $id;?>" method="POST" enctype="multipart/form-data"> 
<p id='gray'>Click "Update Character" to save changes.</p>
<input type="submit" name='submit' value="Update Character" >
	</br>
	</br>
	<div id="h2bar">
		<h2>Physical Attributes</h2>	
	</div>
	</br>
	<table>
		<tr>
			<td>
				Age</br>
				<input type="text" name="age" id="age" value="<?php Print $info['age'];?>" >
			</td>
			<td>
				Height</br>
				<input type="text" name="height" id="height" value="<?php Print $info['height']. "";?>" >
			</td>
			<td>
				Weight</br>
				<input type="text" name="weight" id="weight" value="<?php Print $info['weight']. "";?>" >
			</td>
		</tr>
		<tr>
			<td>
				Eye Color</br>
				<input type="text" name="eyes" id="eyes" value="<?php Print $info['eyes'];?>">
			</td>
			<td>
				Skin</br>
				<input type="text" name="skin" id="skin" value="<?php Print $info['skin'];?>" >
			</td>
			<td>
				Hair</br>
				<input type="text" name="hair" id="hair" value="<?php Print $info['hair'];?>" >
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="hidden" name="img_url" id="img_url" placeholder="Link to character image">
			</td>
		</tr>
	</table>
	</br>

<!--END ATTRIBUTES-->
<div id="h2bar">
	<h2>Character Photos</h2>
</div>
</br>
<?PHP
	$e = $_GET['e'];
	if ($e == 1){
		echo "<p style='color:red;'><b>Sorry, file already exists.</b></p>";
	}
	if ($e == 2){
		echo "<p style='color:red;'><b>Sorry, your file is too large.</b></p>";
	}
	if ($e == 3){
		echo "<p style='color:red;'><b>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</b></p>";
	}

?>
<?php

	include 'includes/connections.php';

	$id = $_GET['id'];

	$image_data = mysql_query("SELECT * FROM character_images WHERE character_id = ".$id." ORDER BY image_id")  
		or die(mysql_error());

	while($image = mysql_fetch_array($image_data)) { 
		
		$img_file_name = $image['img_file_name'];
		$image_id = $image['image_id'];
		$update_image_url = "delete_image.php?id=$id&image=$image_id";
	?>
		
		<div class="img">
			<a target="_blank" href="<? echo $img_file_name; ?>" class="thumbnail">
			<img class="photo" style="background-image: url(<? echo $img_file_name; ?>)"></a>
			<div id="Delete" class="desc">
				<a href='delete_image.php?id=<?PHP echo $id ?>&&image=<?PHP echo $image_id ?>'>Delete?</a>
			</div>
		</div>

	<?PHP
	}
?>
<?PHP
$image_count = "SELECT * FROM character_images WHERE character_id = $id";

if ($result=mysqli_query($conn, $image_count)) {
	$rowcount=mysqli_num_rows($result);
	//echo $rowcount;
		}
if ($rowcount < 5){
?>
	<br>
	<p id='gray' style="clear: both;">New images must be JPG, JPEG, PNG or GIF and have a file size less than 300KB.</p>
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
<?
}
?>

<?
if ($rowcount > 4){
?>
	<p id='gray' style="clear: both;">Only 5 images are allowed per character. To upload another, please remove an existing one.</p>
<?
}
?>

</br>
</br>
<!--BEGIN PARTY-->
<div id="h2bar">
	<h2>Party</h2>
</div>
</br>
	<ul>
		<?php
		$party_data = mysql_query("SELECT * FROM character_sheet WHERE campaign_code = '".$charinfo['campaign_code']."'")  
			or die(mysql_error());
			
		while($campaign = mysql_fetch_array($party_data)) { 
			$campaign_id = $campaign['character_id'];
			$campaign_character_name = $campaign['character_name'];
			?>			
			<a href='readonly_view_character.php?id=<?PHP echo $campaign_id?>'><?PHP print $campaign_character_name?></a></br>
		<?PHP
		}
		?>
	</ul>

<!--END PARTY-->
</br>
<!--BEGIN ALLIES-->
<div id="h2bar">
	<h2>Allies</h2>
</div>
</br>
	<?php
		$inventory_data = mysql_query("SELECT * FROM allies WHERE character_id = ".$id." ORDER BY ally_name")  
			or die(mysql_error());

		while($ally = mysql_fetch_array($inventory_data)) { 
			
			$DBName = $ally['ally_name'];
			$ally_name =  htmlspecialchars($DBName, ENT_QUOTES);
			$ally_id = $ally['ally_id'];
			$DBName2 = $ally['notes'];
			$ally_notes =  htmlspecialchars($DBName2, ENT_QUOTES);
			$update_url = "delete_ally.php?id=$id&ally=$ally_id";
		?>
		
			<div class='FloatDiv'><input type='text' name='ally_name[]' size='40' value='<?PHP print $ally_name ?>' REQUIRED></div>
			<div class='FloatDiv'><input type='text' name='notes[]' size='60' placeholder='Notes' value='<?PHP print $ally_notes ?>'></div>
			<div id='Delete' class='FloatDiv'><input type='hidden' name='ally_id[]' value='<?PHP echo $ally_id ?>'>
			<a href='delete_ally.php?id=<?PHP echo $id ?>&&ally=<?PHP echo $ally_id ?>'>Delete?</a></div></br></br>
			
		<?PHP
		}
		?>
		<div class='FloatDiv'><input type="text" name="new_ally_name" size="40" placeholder="New Ally Name"></div>
		<div class='FloatDiv'><input type="submit" name='submit' value="Add Ally" ></div>
		</br>
		</br>	
<!--END ALLIES-->

<!--BEGIN TRAITS-->
<div id="h2bar">
	<h2>Character Traits</h2>
</div>
</br>
	<div style='padding-left:5px;'>
		Personality</br>
		<textarea rows="10" name="personality" placeholder="Enter Text"><?php Print $info['personality'];?></textarea></br>
		Ideals</br>
		<textarea rows="10" name="ideals" placeholder="Enter Text"><?php Print $info['ideals'];?></textarea></br>
		Bonds</br>
		<textarea rows="10"  name="bonds" placeholder="Enter Text"><?php Print $info['bonds'];?></textarea></br>
		Flaws</br>
		<textarea rows="10" name="flaws" placeholder="Enter Text"><?php Print $info['flaws'];?></textarea>
	</div>
	</br>
	</br>
	
<!--END TRAITS-->

<!--BEGIN BACKSTORY-->
<div id="h2bar">
	<h2>Backstory</h2>
</div>
</br>
	<div style='padding-left:5px;'>
		<textarea rows="10" name="backstory_text" placeholder="Enter Text"><?php Print $info['backstory_text'];?></textarea>
	</div>
	</br>
	
<!--END BACKSTORY-->


	<input type="submit" name='submit' value="Update Character" >
</form>