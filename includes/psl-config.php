<?php
/**
 * These are the database login details
 */  
 
include "connections.php";
 
define("HOST", $servername);     // The host you want to connect to.
define("USER", $username);    // The database username. 
define("PASSWORD", $password);    // The database password. 
define("DATABASE", $dbname);    // The database name.
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
 
define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
?>