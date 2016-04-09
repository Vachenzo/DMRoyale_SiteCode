<?PHP

if (isset($_POST['charactername']) === true && empty($_POST['charactername']) === false){
	
	//add the DB connections
	require '../includes/connections.php';	
	
	//the update script
	$query_name = "
		UPDATE character_sheet
		SET character_name = '" . mysql_real_escape_string(trim($_POST['charactername'])) . "'
		WHERE character_id = " . $_POST['id'] . "
	";
	
	//check that the update script ran
	if ($conn->query($query_name) === TRUE) {
		echo 'updated';
	} 
	else {
		//display an error if problems arise
		echo "Error: " . $query_name . "<br>" . $conn->error;
	}
}

	
?>