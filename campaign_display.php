<?php
$id=$_GET['id'];

include 'includes/connections.php';

$data = mysql_query("SELECT * FROM campaign WHERE dungeonmaster = '".$_SESSION['username']."' AND campaign_id = $id")  
	or die(mysql_error());
// puts the "db" info into the $info array  
$info = mysql_fetch_array( $data );


?>
<h1><?php Print "".$info['dungeonmaster']."";?>'s  <?php Print "".$info['campaignname']."";?> Campaign</h1>
<p id='gray'>This campaign's code is <b><?php Print "".$info['dungeonkey']."";?></b>. <a href="mailto:?subject=Join <?php Print "".$info['dungeonmaster']."";?>'s Campaign&body=To join <?php Print "".$info['dungeonmaster']."";?>'s campaign, please copy the following code and enter it into the campaign code field on your DMRoyale.com character sheet: <?php Print "".$info['dungeonkey']."";?>">Share this code with party members</a>. Party members will need to enter it into the campaign code field under the settings menu for their character.</p>
<p id='gray'>Once a character has joined the campaign, you will be able to see their Initiative, AC, Speed and HP in addition to a copy of their character sheet.</p>
<form action="update_campaign.php?id=<?php Print "".$id."";?>" method="POST"> 
<input type="submit" name='submit' value="Update Campaign" >
<h2>Player Characters</h2></br>
	<table>
		<?php include 'get_party.php';?>
	</table>
	<h2>Campaign Notes</h2></br>
	<textarea rows='7' cols='118' maxlength='2000' name='campaign_notes' id='campaign_notes' placeholder='Campaign Notes'><?php Print "".$info['campaign_notes']."";?></textarea>
	<h2>NPCs</h2></br>
	<table>
		<tr>
			<td>
					Name
			</td>
			<td>
					Description
			</td>
		</tr>
		<?php include 'get_npc.php';?>
		<tr>
			<td>
					<input type="text" name="new_npc_name" id="new_npc_name"   size='20' placeholder="Add Name">
			</td>
			<td>
					<textarea rows='4' cols='80' name='new_npc_desc' id='new_npc_desc' placeholder='Add Description'></textarea>
					
			</td>
			<td>
				<input type="submit" name='submit' value="Add NPC" >
			</td>
		</tr>
	</table>	
	</br>
	</br>	
	<input type="submit" name='submit' value="Update Campaign" >
	<script type="text/javascript">
		function AlertIt() {
		var answer = confirm ("Are you sure you want to delete <?php Print $info['campaignname'];?>?")
		if (answer)
		window.location="delete_campaign.php?id=<?php Print $id;?>";
		}
	</script>
	<div id="Delete" style="float:right;padding-right: 10px;">
		<a href="javascript:AlertIt();">Delete Campaign?</a>   
	</div>
</form>
