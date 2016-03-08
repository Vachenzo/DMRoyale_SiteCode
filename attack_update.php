<?php

/*
 * DATABASE CONNECTION
 */

// DATABASE: Connection variables
include "includes/connections.php";

// DATABASE: Try to connect
if (!$conn = mysql_connect($servername, $username, $password))
	die('Unable to connect to MySQL.');
if (!$db_select = mysql_select_db($dbname, $conn))
	die('Unable to select database');

// DATABASE: Clean data before use
function clean($value)
{
	return mysql_real_escape_string($value);
}

/*
 * FORM PARSING
 */

// FORM: Variables were posted
if (count($_POST))
{
	// Prepare form variables for database
	foreach($_POST as $column => $value)
		${$column} = clean($value);

	// Perform MySQL UPDATE
	$result = mysql_query("UPDATE attacks SET ".$col."='".$val."'
		WHERE attack_id ='".$w_val."'")
		//or die ('Unable to update row.');
		or die (mysql_error());

}

?>