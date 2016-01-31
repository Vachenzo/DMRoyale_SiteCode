<?php
include 'includes/connections.php';

$id = $_GET['id'];

$age = mysqli_real_escape_string($conn, $_POST['age']);
$height = mysqli_real_escape_string($conn, $_POST['height']);
$weight = mysqli_real_escape_string($conn, $_POST['weight']);
$eyes = mysqli_real_escape_string($conn, $_POST['eyes']);
$skin = mysqli_real_escape_string($conn, $_POST['skin']);
$hair = mysqli_real_escape_string($conn, $_POST['hair']);
$personality = mysqli_real_escape_string($conn, $_POST['personality']);
$ideals = mysqli_real_escape_string($conn, $_POST['ideals']);
$bonds = mysqli_real_escape_string($conn, $_POST['bonds']);
$flaws = mysqli_real_escape_string($conn, $_POST['flaws']);
$backstory_text = mysqli_real_escape_string($conn, $_POST['backstory_text']);

$sql1 = "UPDATE backstory SET age='$age', height='$height', weight='$weight', eyes='$eyes', skin='$skin', hair='$hair', personality='$personality', ideals='$ideals', bonds='$bonds', flaws='$flaws', backstory_text='$backstory_text'  WHERE character_id = '$id'";

if ($conn->query($sql1) === TRUE) {
	
} 

$new_ally_name = mysqli_real_escape_string($conn, $_POST['new_ally_name']);

if (!empty($new_ally_name)){
	$sql2 = "INSERT INTO allies (ally_name, character_id) VALUES('$new_ally_name', $id)";

	if ($conn->query($sql2) === TRUE) {
	}
	else{
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}

$ally_name =  $_POST['ally_name'];
$ally_id = $_POST['ally_id'];
$ally_notes = $_POST['notes'];

for($i = 0; $i < count($ally_id); $i++){
	$ally_name_array = mysqli_real_escape_string($conn, $ally_name[$i]);
	$ally_id_array =mysqli_real_escape_string($conn, $ally_id[$i]);
	$ally_notes_array =mysqli_real_escape_string($conn, $ally_notes[$i]);
	$sql3 ="UPDATE allies SET ally_name='$ally_name_array', character_id=$id, notes='$ally_notes_array' WHERE ally_id = '$ally_id_array'";
	
	if ($conn->query($sql3) === TRUE) {	
	}
	else{
	}
}

header("Location: view_story.php?id=$id");
die();

$conn->close();
?>
