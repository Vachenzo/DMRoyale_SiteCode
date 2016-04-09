<?PHP

if (isset($_POST['current_hp']) === true && empty($_POST['current_hp']) === false){
	
	//add the DB connections
	require '../includes/connections.php';	
	
	//the update script
	$query = "
		UPDATE character_sheet
		SET current_hp = '" . mysql_real_escape_string(trim($_POST['current_hp'])) . "'
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