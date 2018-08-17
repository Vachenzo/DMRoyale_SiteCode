<?php
		//Run query to get inventory
		$inventory_data = mysql_query("SELECT * FROM items WHERE character_id = ".$id)  
		or die(mysql_error());
		// iterate through each item
		while($item = mysql_fetch_array($inventory_data)) { 
		//make sure the name contains [] to signify it's in the array
		?>
		<tr>	
			<td><?PHP echo $item['item_count']; ?></td>
			<td><?PHP print $item['item_name']; ?></td>
			<td><?PHP print $item['item_weight']; ?></td>
		</tr>
		<?php 
		//close the PHP WHILE statement
		} 
		//then add in the new item code below
		?>	