<?php
// CORS headers for all API responses
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$servername = "localhost";
$username = "u121643321_nada_aboelenin";
$password = "8ztZvsHtFr!A6t7";
$dbname = "u121643321_nada_aboelenin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
