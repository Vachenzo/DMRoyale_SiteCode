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
	   <!-- JQUERY -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript">
		// JQUERY: Plugin "autoSubmit"
		(function($) {
			$.fn.autoSubmit = function(options) {
				return $.each(this, function() {
					// VARIABLES: Input-specific
					var input = $(this);
					var column = input.attr('name');
		
					// VARIABLES: Form-specific
					var form = input.parents('form');
					var method = form.attr('method');
					var action = form.attr('action');

					// VARIABLES: Where to update in database
					var where_val = form.find('#where').val();
					var where_col = form.find('#where').attr('name');
		
					// ONBLUR: Dynamic value send through Ajax
					input.bind('blur', function(event) {
						// Get latest value
						var value = input.val();
						// AJAX: Send values
						$.ajax({
							url: action,
							type: method,
							data: {
								val: value,
								col: column,
								w_col: where_col,
								w_val: where_val
							},
							cache: false,
							timeout: 10000,
							success: function(data) {
								// Alert if update failed
								if (data) {
									//alert(data);
								}
								// Load output into a P
								else {
									$('#notice').text('Updated');
									$('#notice').fadeOut().fadeIn().fadeOut();
								}
							}
						});
						// Prevent normal submission of form
						return false;
					})
				});
			}
		})(jQuery);
		// JQUERY: Run .autoSubmit() on all INPUT fields within form
		$(function(){
			$('INPUT').autoSubmit();
			$('SELECT').autoSubmit();
			$('#newProficiency').submit(function(event) {
				event.preventDefault();
				$.ajax({
					url: $('#newProficiency').attr('action'),
					type: "POST",
					data: {
						new_proflang_name: $("#new_proflang_name").val()
					},
					cache: false,
					timeout: 10000,
					success: function(data) {
						// Alert if update failed
						try {
							var jsonObject = $.parseJSON(data);
							console.log(jsonObject);
							var characterId = jsonObject.character_id;
							var name        = jsonObject.proflang_name;
							var proflang_id = jsonObject.proflang_id;
							$('#newProficiency').after('\
								<form id="ajax-form" class="autosubmit" method="POST" action="proflang_update.php?id='+characterId+'">\
									<div class="FloatDiv"><input type="text" name="proflang_name" id="proflang_name" value="'+name+'" REQUIRED></div>\
									<div id="Delete" class="FloatDiv"><a href="delete_proflang.php?id=<?PHP echo $id ?>&proflang='+proflang_id+'">Delete?</a></div>\
									<div class="FloatDiv"><input type="hidden" name="proflang_id" id="where" value="'+proflang_id+'"/></div>\
								</form>\
								</br>\
								</br>\
								');
							$('#notice').text('Updated');
							$('#notice').fadeOut().fadeIn().fadeOut();
						} catch(e) {
							alert(e);
						  // handle error
						}
					}
				});

				return false;
			});
		});
		</script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-66739813-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script type="text/JavaScript" src="js/sha512.js"></script> 
       <script type="text/JavaScript" src="js/forms.js"></script> 
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
						<a href="search.php">Search Characters</a>				
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
