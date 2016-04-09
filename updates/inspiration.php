<?PHP

if (isset($_POST['inspiration']) === true && empty($_POST['inspiration']) === false){
	
	//add the DB connections
	require '../includes/connections.php';	
	
	//the update script
	$query = "
		UPDATE character_sheet
		SET inspiration = '" . mysql_real_escape_string(trim($_POST['inspiration'])) . "'
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