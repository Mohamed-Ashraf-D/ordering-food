<?php


//main connection file for both admin & front end
$servername = "html-db-1"; //server
$username = "root"; //username
$password = "12345"; //password
$dbname = "online_rest";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
mysqli_set_charset($db, 'utf8mb4');

if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>