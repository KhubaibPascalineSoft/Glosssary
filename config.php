<?php
$servername = "192.168.0.21";
$username = "root";
$password = "Adm1n123";
$database = "glossarydb";

// Create connection
$link = new mysqli($servername, $username, $password, $database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>
