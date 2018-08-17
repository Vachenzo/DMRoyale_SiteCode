<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
	} 
else {
    $logged = 'out';
	}
include 'header.php';
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
	}
if (login_check($mysqli) == true) {} 
else {}
?>     

<h3>DM Royale is an online character sheet and campaign manager for Dungeons & Dragons 5th edition. </h3>
<p>It has been designed to be fast and flexible, allowing for quick character updates, making character information easier to share and access than ever. </p>
<table >
	<tr>
		<td>
		<?php
        if (login_check($mysqli) == true) {
            echo "<h2 id='BigMenuButton' align='center'><a href='create_character.php'>Create Character</a></h2>";
			} 
		else {
			}
		?>   
			<p align="center"><img src="images/d20.png" height="25%" width="25%"></p>
		</td>
		<td><?php
        if (login_check($mysqli) == true) {
                        echo "<h2 id='BigMenuButton' align='center'><a href='campaign.php'>Create Campaign</a></h2>";
        } 
		else {
			}
		?>   
			<p align="center"><img src="images/pencil.png" height="25%" width="25%"></p>
		</td>
	</tr>
		<tr>
		<td>
				<p>Create your D&D 5e character without the hassle of reams of paper. DM Royale's online character sheet is easy to use, making character management a breeze!</p>
		</td>
		<td>
				<p>Manage your D&D 5e campaign with ease. Just share your campaign's unique invite code and you'll have access to the party's stats and character sheets right at your fingertips.</p>
		</td>
	</tr>
</table> 
<h1>Here's the latest news from DMRoyale</h1>
<?PHP 
include 'news/10142016.php';
echo "<div align='center'><img src='images/linebreak.png' height='25%' width='25%'></div>";
include 'news/10132016.php';
echo "<div align='center'><img src='images/linebreak.png' height='25%' width='25%'></div>";
include 'news/09222016.php';
echo "<div align='center'><img src='images/linebreak.png' height='25%' width='25%'></div>";
?>

<?PHP include 'footer.php'?>