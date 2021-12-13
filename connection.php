<?php

// Identifiants connection a la base de donnée 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
         
if(!$conn ) {
    die('Could not connect: ' . mysqli_error($conn));
 }
 // echo 'Connected successfully<br />';
 $retval = mysqli_select_db( $conn, 'gestion_cours' );

 if(! $retval ) {
    die('Could not select database: ' . mysqli_error($conn));
 }
 // echo "Database gestion_cours selected successfully\n";
// $mysqli->close();


?>