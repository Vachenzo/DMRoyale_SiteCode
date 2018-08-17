<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM backstory WHERE character_id = " . $id)  
	or die(mysql_error());
$info = mysql_fetch_array( $data );	
$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id)  
	or die(mysql_error());  
$charinfo = mysql_fetch_array( $chardata );
?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_character.php?id=<?php Print $id ."";?>">Character</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Backstory</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_cantrips.php?id=<?php Print $id ."";?>">Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print $charinfo['character_name']."'s Backstory";?></h1>


<h2>Physical Attributes</h2>
<p><b>Age: </b><?php Print $info['age'];?></p>
<p><b>Height:</b> <?php Print $info['height'];?></p>
<p><b>Weight:</b> <?php Print $info['weight'];?></p>
<p><b>Eye Color:</b> <?php Print $info['eyes'];?></p>
<p><b>Skin:</b> <?php Print $info['skin'];?></p>
<p><b>Hair:</b> <?php Print $info['hair'];?></p>
</br>
<h2>Character Photos</h2>
<?php
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
	</div>

<?PHP
}
?>

<h2 style="clear: both;">Character Traits</h2>
<b>Personality:</b></br>
<p><?php Print nl2br($info['personality']);?></p>
<b>Ideals:</b></br>
<p><?php Print nl2br($info['ideals']);?></p>
<b>Bonds:</b></br>
<p><?php Print nl2br($info['bonds']);?></p>
<b>Flaws:</b></br>
<p><?php Print nl2br($info['flaws']);?></p>

<h2>Backstory</h2>				
<p><?php Print nl2br($info['backstory_text']);?></p>

<h2>Party</h2>

<?php include 'get_party_CS.php';?>


<h2>Allies</h2>
<ul>
	<?php include 'readonly_get_ally.php';?>
</ul>
	