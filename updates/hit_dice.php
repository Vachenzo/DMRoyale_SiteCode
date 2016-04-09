<?PHP

if (isset($_POST['hit_dice']) === true && empty($_POST['hit_dice']) === false){
	
	//add the DB connections
	require '../includes/connections.php';	
	
	//the update script
	$query = "
		UPDATE character_sheet
		SET hit_dice = '" . mysql_real_escape_string(trim($_POST['hit_dice'])) . "'
		WHERE character_id = " . $_POST['id'] . "
	";
	
	//check that the update script ran
	if ($conn->query($query) === TRUE) {
		echo 'updated';
	} 
	else {
		//display an error if problems arise
		echo "Error: " . $query . "<br>" . $conn->error;
	}
}

	
?>