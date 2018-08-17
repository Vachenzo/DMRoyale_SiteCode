<?php
include 'includes/connections.php';

$id = $_GET['id'];

$image_count = "SELECT * FROM character_images WHERE character_id = $id";

if ($result=mysqli_query($conn, $image_count)) {
	$rowcount=mysqli_num_rows($result);
	//echo $rowcount;
		}

//echo $rowcount;
/////IMAGE UPLOADER
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if ($rowcount <= 4){
	// Check if image file is a actual image or fake image
	if(isset($_POST["fileToUpload"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		$file_error = 1;
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 300000) {
		//echo "Sorry, your file is too large.";
		$file_error = 2;
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$file_error = 3;
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	   //echo "Sorry, your file was not uploaded.";
		$file_error = 4;
	// if everything is ok, try to upload file
	} else {
		//change the filename
		$newfilename = round(microtime(true)) . '.';
		$target_file = $target_dir.$newfilename.$imageFileType;
		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$img_sql = "INSERT INTO character_images (img_file_name, character_id) VALUES('$target_file', $id)";
			if ($conn->query($img_sql) === TRUE) {
			}
			else{
				echo "Error: " . $img_sql . "<br>" . $conn->error;
			}
			
			
		} else {
			//echo "Sorry, there was an error uploading your file.";
			$file_error = 5;
		}
	}
}

if ($rowcount > 4){
	$file_error = 6;
}
/////END IMAGE UPLOADER

////ADD IMAGE TO DB
/*
if(isset $target_file){
	
}*/

////STORY UPDATES
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



header("Location: view_story.php?id=$id&&e=$file_error");
die();

$conn->close();
?>
