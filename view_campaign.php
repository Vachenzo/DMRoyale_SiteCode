<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

include 'header.php';
if (login_check($mysqli) == true) :
include 'campaign_display.php';
else : ?>
 <p>
	<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif;
include 'footer.php';?>	