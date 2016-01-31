<?php
$inventory_data = mysql_query("SELECT * FROM items WHERE character_id = " . $id)  
	or die(mysql_error());
	
while($item = mysql_fetch_array($inventory_data)) { 
	$item_name = $item['item_name'];
	$item_count = $item['item_count'];
	$item_weight= $item['item_weight'];
	$item_id = $item['item_id'];	
	$update_url = "delete_item.php?id=$id&item=$item_id";
	
	echo "<tr><td><input type='number' name='inv_item_count[]' id='inv_item_count' style='width:110px'  value='".$item_count."' REQUIRED></td>\n";
	echo "<td><input type='text' name='inv_item_name[]' id='inv_item_name' size='40' value='".$item_name."' REQUIRED></td>\n";
	echo "<td><input type='text' name='inv_item_weight[]' id='inv_item_weight' size='10' value='".$item_weight."'></td>\n";
	echo "<td id='Delete'><a href='delete_item.php?id=$id&item=$item_id'>Delete?</a><input type='hidden' name='inv_item_id[]' id='inv_item_id' value='".$item_id."'></td>\n";
	echo "</tr>\n";	
}
?>