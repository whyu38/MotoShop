<?php
/**
 * Using mysqli_connect to connect php with mysql
 */

$databaseHost = 'localhost';
$databaseName = 'motorshop';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// check connection
if (!$mysqli) {
    die("Connection Fail: " . mysqli_connect_error());
}

?>