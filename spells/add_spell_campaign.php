<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include 'includes/connections.php';
 
sec_session_start();
include 'header.php';
if (login_check($mysqli) == true) :

$id = $_GET['id'];

$campaigndata = mysql_query("SELECT * FROM campaign WHERE campaign_id = ".$id." AND dungeonmaster = '".$_SESSION['username']."'")    
	or die(mysql_error());
// puts the "character_sheet" info into the $info array  
$campaigninfo = mysql_fetch_array( $campaigndata );
?>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
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
<h1><?php Print "Add Custom Spell to the Campaign ".$campaigninfo['campaignname'];?></h1>
<form action="insert_spell_campaign.php?id=<?php Print $id;?>" method="POST"> 
<table>
	<tr>
		<td>
			<b>Spell Name: </b>
		</td>
		<td>
			<input type="text" name="spell_name" maxlength="120" required>
		</td>
	</tr>
	<tr>
		<td>
			<b>Spell Level: </b>
		</td>
		<td>
			<input type="number" name="level" required>
		</td>
	</tr>
	<tr>
		<td>
			<b>Spell School: </b>
		</td>
		<td>
			<input type="text" name="spell_school" maxlength="120">
		</td>
	</tr>
	<tr>
		<td>
			<b>Casting Time: </b>
		</td>
		<td>
			<input type="text" name="casting_time" maxlength="120">
		</td>
	</tr>
	<tr>
		<td>
			<b>Range: </b>
		</td>
		<td>
			<input type="text" name="range" maxlength="120">
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<b>Components:</b>
		</td>
	</tr>
	<tr>
		<td>
			<b>V</b>
		</td>
		<td>
			<input type="checkbox" name="component_v" value="V">
		</td>
	</tr>
	<tr>
		<td>
			<b>S</b>
		</td>
		<td>
			<input type="checkbox" name="component_s" value="S">
		</td>
	</tr>
	<tr>
		<td>
			<b>M</b>
		</td>
		<td>
			<input type="checkbox" name="component_m" value="M">
		</td>
	</tr>
	<tr>
		<td>
			<b>Materials</b>
		</td>
		<td>
			<input type="text" name="materials">
		</td>
	</tr>
	<tr>
		<td>
			<b>Duration:</b>
		</td>
		<td>
			<input type="text" name="duration" maxlength="120">
		</td>
	</tr>
	<tr>
		<td>
			<b>Description:</b>
		</td>
		<td>
			<textarea rows="10" cols="50" name="description" placeholder="Enter Description" required></textarea>
		</td>
	</tr>
</table>
<input type="submit" name='submit' value="Save Spell" >


</form>
<? else : ?>
 <p>
	<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif;
include 'footer.php';?>			