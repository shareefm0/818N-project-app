<?php
require_once '../config.php';

// Create a new MySQLi connection using variables from config.php
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
