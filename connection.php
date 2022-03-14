<?php

$databaseHost = '127.0.0.1';
$databaseName = 'dbvote'; 
$databaseUsername = 'root';
$databasePassword = ''; 

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(!$conn)
{
    echo 'connection error' . mysqli_connect_error();
}
?>