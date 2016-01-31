<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<link rel="icon" type="image/ico" href="uploads/rook-chess-piece.ico">
	<meta charset="utf-8">
	  <meta name="author" content="Created by Ryan Vachon">
	   <meta name="description" content="DM Royale is an online Dungeons & Dragons 5e character sheet and campaign manager. The online character sheet is fast, flexible and intuitive. The campaign manager provides party stats and quick links to party member's character sheets. DM Royale is not affiliated with Wizards of the Coast or Hasbro.">
	  <title>DM Royale - The Online D&D 5e Character Sheet</title>
	  <link rel="stylesheet" href="style.css" type="text/css" />
	  <link href='http://fonts.googleapis.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
	   <script type="text/JavaScript" src="js/sha512.js"></script> 
       <script type="text/JavaScript" src="js/forms.js"></script> 
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="title" align="right"><h1><a href="index.php">DM Royale</a></h1>
				<h3 style="color:white;">The Online D&D 5e Character Sheet</h3></div>
			</div>
			</br>	
<?php if (login_check($mysqli) == true) :
include 'print.php';
else : ?>
 <p>
	<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; 
include 'footer.php';?>				