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
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print "".$id ."";?>">Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_cantrips.php?id=<?php Print "".$id ."";?>">Spells</a>
</div>
<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Settings</a>
</div>

<p>&nbsp;</p>
<h1><?php Print "".$info['character_name'] . ": Settings";?></h1>
<form action="update_settings.php?id=<?php Print $id;?>" method="POST"> 
	<input type="submit" name='submit' value="Update Character" >

<h2>Campaign Code</h2>
<p id='gray'>Add the campaign code given to you by your DM here. This will add your character to their campaign. DO NOT change this code unless switching campaigns.</p>
<p>Campaign Code: <input type="text" name="campaign_code" id="campaign_code" value="<?php Print "".$info['campaign_code'] . "";?>" ></p>

<h2>Get Printable Character Sheet</h2>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_character.php?id=<?php echo $id;?>">Print Character Sheet</a>
</div>
</br></br>

<h2>Recover Spells and Cantrips from the Old Spell System</h2>
<p>On September 18th, 2016 the Spell and Cantrip system for DM Royale were replaced with a new system designed to be much more robust and readable. This system provided a better method for creating custom new spells as well as adding old favorites from 5e. Additionally, DMs were given the power to create their own custom spells and have them show up in the possible spell list for their player characters. If you signed up before 9-18-16, click the button below to get a list of the spells you had prior to the update.</p>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="recover_old_spells.php?id=<?php echo $id;?>">Recover Spell List</a>
</div>
</br></br>

<h2>Delete Character</h2>
<p id='Delete'>Done with this character?</br></br>

<script type="text/javascript">
	function AlertIt() {
	var answer = confirm ("Are you sure you want to delete <?php Print $info['character_name'];?>?")
	if (answer)
	window.location="delete_character.php?id=<?php Print $id;?>";
	}
</script>
<a href="javascript:AlertIt();">Delete Character</a></p>

</form>