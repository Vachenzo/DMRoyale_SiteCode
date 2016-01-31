<?php
include 'includes/connections.php';

$id = $_GET['id'];

$experience = mysqli_real_escape_string($conn, $_POST['experience']);
$current_hp = mysqli_real_escape_string($conn, $_POST['current_hp']);
$death_success = mysqli_real_escape_string($conn, $_POST['death_success']);
$death_fail = mysqli_real_escape_string($conn, $_POST['death_fail']);
$cp_count = mysqli_real_escape_string($conn, $_POST['cp']);
$sp_count = mysqli_real_escape_string($conn, $_POST['sp']);
$ep_count = mysqli_real_escape_string($conn, $_POST['ep']);
$gp_count = mysqli_real_escape_string($conn, $_POST['gp']);
$pp_count = mysqli_real_escape_string($conn, $_POST['pp']);

$sql1 = "UPDATE character_sheet SET experience=$experience, current_hp=$current_hp, death_success=$death_success, death_fail=$death_fail, cp_count=$cp_count, sp_count=$sp_count, ep_count=$ep_count, gp_count=$gp_count, pp_count=$pp_count WHERE character_id = '$id'";

if ($conn->query($sql1) === TRUE) {
	
} 
else {
	echo "Error: " . $sql1 . "<br>" . $conn->error;
}

////////////////////////////////////////Item Inventory

//items escaped
$item_count = mysqli_real_escape_string($conn, $_POST['item_count']);
$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$item_weight = mysqli_real_escape_string($conn, $_POST['item_weight']);

if (!empty($item_name)){
	$sql2 = "INSERT INTO items (item_count, item_name, item_weight, character_id) VALUES($item_count, '$item_name', '$item_weight', $id)";
	if ($conn->query($sql2) === TRUE) {
	}
	else{
		echo "Error: " . $sql2 . "<br>" . $conn->error;
	}
}

$item_count2 = $_POST['inv_item_count'];
$item_name2 =  $_POST['inv_item_name'];
$item_weight2 =  $_POST['inv_item_weight'];
$item_id2 = $_POST['inv_item_id'];

for($i = 0; $i < count($item_id2); $i++){
	$item_count_array = mysqli_real_escape_string($conn, $item_count2[$i]);
	$item_name_array = mysqli_real_escape_string($conn, $item_name2[$i]);
	$item_id_array =mysqli_real_escape_string($conn, $item_id2[$i]);
	$item_weight_array =mysqli_real_escape_string($conn, $item_weight2[$i]);
	
	$sql3 ="UPDATE items SET item_count=$item_count_array, item_name='$item_name_array', item_weight='$item_weight_array' WHERE item_id = '$item_id_array'";

	if ($conn->query($sql3) === TRUE) {	
	$del_sql = "DELETE FROM items WHERE del='delete'";
		if ($conn->query($del_sql) === TRUE) {	
		}
		else{
		}
	
	}
	else{
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
}

header("Location: view_combat.php?id=$id");
die();

$conn->close();
?>
