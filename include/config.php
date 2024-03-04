<!-- Purpose: Configuration file for the database connection -->
<?php
$db_host = "localhost";
$db_name = "portfolio1" ; // name of the database 
// by default the username is root and password is empty
$db_pass = ""; 
$db_user = "root";

// creating a connection to the database and putting it in a variable called $con
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

