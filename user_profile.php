<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();

include 'header.php';
if (login_check($mysqli) == true) :

include 'includes/connections.php';
$id = $_GET['id'];

?>
<h2>Your Characters</h2>
<div id="MenuButton"><a href="create_character.php">Create Character</a></div></br>
<?PHP
$sql="SELECT character_id, character_name, player_name FROM character_sheet WHERE player_name = '" . $_SESSION['username'] ."'";
$result=mysql_query($sql);
$numrows=mysql_num_rows($result);
echo "<p>" .$numrows . " characters saved in the database.</p>"; 
while($row=mysql_fetch_array($result)){
	$character_name =$row['character_name'];
	$player_name=$row['player_name'];
	$character_id=$row['character_id'];
		
	echo "<ul>\n"; 
	echo "<li>" . "<a href=\"view_character.php?id=$character_id\">"  .$character_name . "</a></li>\n";
	echo "</ul>";
}

?>
<h2>Your Campaigns</h2>
<div id="MenuButton"><a href="campaign.php">Create Campaign</a></div></br>
<?PHP
$sql2="SELECT * FROM campaign WHERE dungeonmaster = '" . $_SESSION['username'] ."'";
$result2=mysql_query($sql2);
$numrows2=mysql_num_rows($result2);
echo "<p>" .$numrows2 . " campaigns saved in the database.</p>"; 

while($row2=mysql_fetch_array($result2)){

	$campaignname =$row2['campaignname'];
	$dungeonmaster=$row2['dungeonmaster'];
	$campaign_id=$row2['campaign_id'];

	//-display the result of the array
	echo "<ul>\n"; 
	echo "<li>" . "<a href=\"view_campaign.php?id=$campaign_id\">"  .$campaignname . "</a></li>\n";
	echo "</ul>";
}?>



<? else : ?>
<p>
<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; 
include 'footer.php'?>



