<?php
include 'includes/connections.php';

$id = $_GET['id'];
$data = mysql_query("SELECT * FROM cantrips WHERE character_id = " . $id)  
	or die(mysql_error());
$info = mysql_fetch_array( $data );
$chardata = mysql_query("SELECT * FROM character_sheet WHERE character_id = " . $id)  
	or die(mysql_error());
$charinfo = mysql_fetch_array( $chardata );
?>
<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_character.php?id=<?php Print $id;?>">Character</a>   
</div>

<div id="MenuButton" style="float:left;padding-right: 10px;">
	<a href="readonly_view_story.php?id=<?php Print $id ;?>">Backstory</a>   
</div>

<div id="MenuButton2" style="float:left;padding-right: 10px;">
	<a>Spells</a>
</div>
<p>&nbsp;</p>
<h1><?php Print $charinfo['character_name'] . "'s Spells and Cantrips";?></h1>
<p><b>Spellcasting Ability:</b> <?php Print $charinfo['spellcasting_ability'];?></p>
<p><b>Spell Save DC:</b> <?php Print $charinfo['spell_save_dc'];?>
<p><b>Spell Attack Bonus:</b> <?php Print $charinfo['spell_attack_bonus'];?></p>
<p><b>Ki Points:</b> <?php Print $charinfo['ki_points'];?></p>

<h2>Cantrips</h2>
<?php include 'readonly_get_cantrip_lvl0.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 1</h2>
<?php include 'readonly_get_cantrip_lvl1.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 2</h2>
<?php include 'readonly_get_cantrip_lvl2.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 3</h2>
<?php include 'readonly_get_cantrip_lvl3.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 4</h2>
<?php include 'readonly_get_cantrip_lvl4.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 5</h2>
<?php include 'readonly_get_cantrip_lvl5.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 6</h2>
<?php include 'readonly_get_cantrip_lvl6.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 7</h2>
<?php include 'readonly_get_cantrip_lvl7.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 8</h2>
<?php include 'readonly_get_cantrip_lvl8.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>
<h2>Level 9+</h2>
<?php include 'readonly_get_cantrip_lvl9.php';?>
<div align="center"><img src="images/linebreak.png" height="25%" width="25%"></div>