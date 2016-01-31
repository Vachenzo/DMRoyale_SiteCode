<?php include 'header.php';
if (login_check($mysqli) == true) :
include 'add_character.php';
else : ?>
<p>
	<span class="error">You must have an account to create a character.</span> Please <a href="index.php">login</a> to continue.
</p>
<?php endif;
include 'footer.php';?>