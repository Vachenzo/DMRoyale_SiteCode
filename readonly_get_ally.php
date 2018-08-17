<?php
		$inventory_data = mysql_query("SELECT * FROM allies WHERE character_id = ".$id." ORDER BY ally_name")  
			or die(mysql_error());

		while($ally = mysql_fetch_array($inventory_data)) { 
			
			$DBName = $ally['ally_name'];
			$ally_name =  htmlspecialchars($DBName, ENT_QUOTES);
			$ally_id = $ally['ally_id'];
			$DBName2 = $ally['notes'];
			$ally_notes =  htmlspecialchars($DBName2, ENT_QUOTES);
			$update_url = "delete_ally.php?id=$id&ally=$ally_id";
		?>
		
			<li><b><?PHP print $ally_name ?>:</b> <?PHP print $ally_notes ?></li>
			
		<?PHP
		}
		?>