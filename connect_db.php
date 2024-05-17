<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "careconnect";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8 (optional)
$conn->set_charset("utf8");
// You can use $conn for your database queries

?>
