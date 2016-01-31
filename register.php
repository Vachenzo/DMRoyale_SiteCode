<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<?PHP include'header.php'?>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Register for DMRoyale</h1>
		
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
		<p>Here's a few guidelines for creating your account:</p>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A...Z)</li>
                    <li>At least one lower case letter (a...z)</li>
                    <li>At least one number (0...9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form action=""  method="post" name="registration_form">
					<table>
						<tr>
							<td>Username:</td>
							<td><input type='text' name='username' id='username'  placeholder="Username"/></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" id="email"  placeholder="Email"/></td>
						</tr>
						<tr>							
							<td>Password:</td>
							<td><input type="password" name="password"  id="password"  placeholder="Password"/></td>
						</tr>
						<tr>	
							<td>Confirm:</td>
							<td><input type="password" name="confirmpwd" id="confirmpwd"  placeholder="Confirm Password"/></td>
					</table>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
<?PHP include'footer.php'?>