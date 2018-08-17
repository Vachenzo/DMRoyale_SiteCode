<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
include 'header.php';
if (login_check($mysqli) == true) :
?>

<?php
include 'includes/connections.php';

//Check the id in the URL
// Show a particular value.
$id = $_GET['id'];

// Collects data from "cantrips" table  
$data = mysql_query("SELECT * FROM cantrips WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."' ORDER BY cantrip_name")  
	or die(mysql_error());
// puts the "cantrips" info into the $info array  


$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id." AND player_name = '".$_SESSION['username']."'")    
	or die(mysql_error());
// puts the "character_sheet" info into the $info array  
$charinfo = mysql_fetch_array( $chardata );

?>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_character.php?id=<?php Print $id;?>">Character</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_story.php?id=<?php Print $id ."";?>">Backstory</a>   
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_cantrips.php?id=<?php Print "".$id ."";?>">Spells</a>
</div>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="view_settings.php?id=<?php Print $id ."";?>">Settings</a>
</div>

<p>&nbsp;</p>
<h1><?php Print $charinfo['character_name'] . "'s Old Spells and Cantrips";?></h1>

<?PHP

while($spell_info = mysql_fetch_array( $data )) { 
	?>
	
	<h3><? echo $spell_info['cantrip_name'];?></h3>
	<b>Level:</b> <? echo $spell_info['cantrip_level'];?></br>
	<b>Range:</b> <? echo $spell_info['spell_range'];?></br>
	<b>Description:</b> <? echo $spell_info['description'];?></br>
	
<?}
?>



<? else : ?>
 <p>
	<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif;
include 'footer.php';?>			