<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<?PHP include 'header.php'?>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
<?PHP include 'footer.php'?>