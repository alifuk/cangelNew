<?php


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "cangel");

/*

$servername = "c058um.forpsi.com";
$username = "f67399";
$password = "559tH2E";

// Create connection
$conn = new mysqli($servername, $username, $password, "f67399");
*/

/*
$servername = "mysql.brambor.net";
$username = "792tm9bb";
$password = "hda6v66p";

// Create connection
$conn = new mysqli($servername, $username, $password, "CSPOHAR_CZ");

*/

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";





?>