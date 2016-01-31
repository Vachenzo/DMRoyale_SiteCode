<?php
include 'includes/connections.php';

$id = $_GET['id'];

$campaign_code = mysqli_real_escape_string($conn, $_POST['campaign_code']);
$check = "SELECT * FROM campaign WHERE dungeonkey = '$campaign_code'";
$Message = "This campaign does not exist. Please verify it with your DM and try again.";

if ($result=mysqli_query($conn,$check))
  {
  $rowcount=mysqli_num_rows($result);
  mysqli_free_result($result);
  }

if ($rowcount > 0){
	$sql1 = "UPDATE character_sheet SET campaign_code='$campaign_code' WHERE character_id = '$id'";
	if ($conn->query($sql1) === TRUE) {
		header("Location: view_settings.php?id=$id");
		die();
	} 
	else {

	}
}
else{
		header("Location: view_settings.php?id=$id&Message=$Message");
		die();
}
$conn->close();
?>
