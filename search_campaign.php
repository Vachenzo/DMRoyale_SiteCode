<?php include 'header.php';?>	
<h2>Search for Campaign</h2>
<p>You may search either by campaign name or dungeon master name</p>
<form method="post" action="search_campaign.php?go" id="searchform">
	<input type="text" name="name">
	<input type="submit" name="submit" value="Search">
</form>
<?php
if(isset($_POST['submit'])){
	if(isset($_GET['go'])){
		if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
		$name=$_POST['name'];

		//connect to the database
		$db=mysql_connect ("localhost", "dmroyale", "U2Ac1m4y7g") or die ('I cannot connect to the database because: ' . mysql_error()); 

		//-select the database to use
		$mydb=mysql_select_db("dmroyale_dd_site");

		//-query the database table
		$sql="SELECT * FROM campaign WHERE campaignname LIKE '%" . $name . "%' OR dungeonmaster LIKE '%" . $name ."%'";

		//-run the query against the mysql query function
		$result=mysql_query($sql);

		//-count results

		$numrows=mysql_num_rows($result);

		echo "<p>" .$numrows . " results found for " . stripslashes($name) . "</p>"; 

		//-create while loop and loop through result set
		while($row=mysql_fetch_array($result)){
			$campaignname =$row['campaignname'];
			$dungeonmaster=$row['dungeonmaster'];
			$campaign_id=$row['campaign_id'];
			echo "<ul>\n"; 
			echo "<li>" . "<a href=\"view_campaign.php?id=$campaign_id\">"  .$campaignname . " -- " . $dungeonmaster . "</a></li>\n";
			echo "</ul>";
			}
		}
		else{
		echo "<p>Please enter a search query</p>";
			}
		}
	}

	include 'footer.php';?>	
