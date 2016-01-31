<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 sec_session_start();

 include 'header.php';?>

<h1>Get the latest info on DMRoyale</h1>

<?PHP 
include 'news/10092015.php';
echo "<div align='center'><img src='uploads/linebreak.png' height='25%' width='25%'></div>";
include 'news/09292015.php';
echo "<div align='center'><img src='uploads/linebreak.png' height='25%' width='25%'></div>";
include 'news/09252015.php';
echo "<div align='center'><img src='uploads/linebreak.png' height='25%' width='25%'></div>";
include 'news/09062015.php';
include 'footer.php';
?>