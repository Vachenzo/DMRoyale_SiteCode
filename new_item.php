<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
include 'includes/connections.php';

//get the id's
$id = $_GET['id'];

//new proflang escaped
$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$item_count = mysqli_real_escape_string($conn, $_POST['item_count']);
$item_weight = mysqli_real_escape_string($conn, $_POST['item_weight']);

//Check if the new item_name field is not empty, then insert the item into the DB
if (!empty($new_item_name)){
	$sql2 = "INSERT INTO items (item_name, character_id, item_count, item_weight) VALUES('$item_name', $id, $item_count, $item_weight)";	
	//check that the connection to the table works
	if ($conn->query($sql2) === TRUE) {	
			//echo json_encode([
  			//"character_id"  => $id,
  			//"proflang_name" => $new_proflang_name,
  			//"proflang_id"   => mysqli_insert_id($conn)
  			//]);
		//If the connection is successful, redirect
		header("Location: view_character.php?id=$id#items");
  		die();
	}
	//produce error message if something is wrong
	else{
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}


//redirect
//header("Location: view_character.php?id=$id#proflang");
//die();

$conn->close();
?>
