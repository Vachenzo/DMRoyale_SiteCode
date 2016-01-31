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
<div id='MenuButton'>
	<a href="view_print.php?id=<?php Print "".$id ."";?>" target="_blank">Print</a>
</div>
<p>&nbsp;</p>
<h1><?php Print "".$info['character_name'] . ": Settings";?></h1>
<form action="update_settings.php?id=<?php Print $id;?>" method="POST"> 
	<input type="submit" name='submit' value="Update Character" >

<h2>Campaign Code</h2>
<p id='gray'>Add the campaign code given to you by your DM here. This will add your character to their campaign. DO NOT change this code unless switching campaigns.</p>
<p>Campaign Code: <input type="text" name="campaign_code" id="campaign_code" value="<?php Print "".$info['campaign_code'] . "";?>" ></p>

<h2>Print</h2>
<p id='MenuButton'><a href="view_print.php?id=<?php Print "".$id ."";?>" target="_blank">Print Character Sheet</a></p>

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