<?PHP

if (isset($_POST['classlevel']) === true && empty($_POST['classlevel']) === false){
	
	//add the DB connections
	require '../includes/connections.php';	
	
	//the update script
	$query_location = "
		UPDATE character_sheet
		SET class_level = '" . mysql_real_escape_string(trim($_POST['classlevel'])) . "'
		WHERE character_id = " . $_POST['id'] . "
	";
	
	//check that the update script ran
	if ($conn->query($query_location) === TRUE) {
		echo 'updated';
	} 
	else {
		//display an error if problems arise
		echo "Error: " . $query_location . "<br>" . $conn->error;
	}
}

	
?>