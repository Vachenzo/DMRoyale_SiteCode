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
	   <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-66739813-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="title" align="left"><h1><a href="index.php">DM Royale</a></h1>
				<h3 style="color:white;"> The Online D&D 5e Character Sheet</h3></div>			
				 <?php if (login_check($mysqli) == true) : ?>
					<div id="MenuButton">	
						<a href="user_profile.php"><?php echo $_SESSION['username']; ?></a>
						<a href="create_character.php">Create Character</a>	
						<a href="campaign.php">Create Campaign</a>
						<a href="news.php">News</a>
						<a href="includes/logout.php">Log out</a>
					</div>
				<?php else : ?>
				<table>
						<tr>
							<td><?php  include 'includes/login.php';?></td>
							<td><div id="MenuButton">
								<a href='register.php'>Register</a>
								<a href="search.php">Search Characters</a>	
								<a href="news.php">News</a>								
								</div>
							</td>
						</tr>
					</table>
				<?php endif; ?>
			</div>
			</br>			
