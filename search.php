<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
include 'header.php';
?>	

<h2>Search for any Character</h2>
<p>You may search for any character using either the character or player names.</p>
<form method="post" action="search.php?go" id="searchform">
	<input type="text" name="name">
	<input type="submit" name="submit" value="Search">
</form>

<?php

if(isset($_POST['submit'])){
	if(isset($_GET['go'])){
		if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
		$name=$_POST['name'];
		include 'includes/connections.php';
		$sql="SELECT character_id, character_name, player_name FROM character_sheet WHERE character_name LIKE '%" . $name . "%' OR player_name LIKE '%" . $name ."%'";
		$result=mysql_query($sql);
		$numrows=mysql_num_rows($result);
		echo "<p>" .$numrows . " results found for " . stripslashes($name) . "</p>"; 
		while($row=mysql_fetch_array($result)){
			$character_name =$row['character_name'];
			$player_name=$row['player_name'];
			$character_id=$row['character_id'];
			echo "<ul>\n"; 
			echo "<li>" . "<a href=\"readonly_view_character.php?id=$character_id\">".$character_name . "</a>; " . $player_name . "'s character.</li>\n";
			echo "</ul>";
			}
		}
	else{
		echo "<p>Please enter a name.</p>";
		}
	}
}
include 'footer.php';?>	