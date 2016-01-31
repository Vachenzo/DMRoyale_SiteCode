<?php if (login_check($mysqli) == true) : ?>
<form action="action_page_campaign.php" method="POST"> 
	<h2>Create a Campaign</h2>
	<p>Every good adventure needs a name.</p>
	Campaign Name:</br>
	<input type="text" name="campaignname" id="campaignname" required>
	</br>
	</br>
	<input type="submit" value="Add Campaign">
</form>
<?php else : ?>
	<p>
		<span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
	</p>
<?php endif; ?>