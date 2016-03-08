<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
include 'includes/connections.php';

$id = $_GET['id'];


////////////////////////////////////////Attacks list

//new items escaped
$new_attack_name = mysqli_real_escape_string($conn, $_POST['new_attack_name']);
$new_attack_bonus = mysqli_real_escape_string($conn, $_POST['new_attack_bonus']);
$new_attack_damage_type = mysqli_real_escape_string($conn, $_POST['new_attack_damage_type']);
$new_attack_description = mysqli_real_escape_string($conn, $_POST['new_attack_description']);

//Check if the new item_name field is not empty, then insert the item into the DB
if (!empty($new_attack_name)){
	$sql2 = "INSERT INTO attacks (attack_name, attack_bonus, attack_damage_type, attack_description, character_id) VALUES('$new_attack_name', '$new_attack_bonus', '$new_attack_damage_type', '$new_attack_description' , $id)";
	//Error checking needs to be included in the IF statement or else the page gives an error
	//check that the connection to the table works
	if ($conn->query($sql2) === TRUE) {
	
	}
	//produce error message if something is wrong
	else{
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}


//redirect
header("Location: view_character.php?id=$id#attacks");

?>
