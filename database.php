<?php

date_default_timezone_set('Asia/Jakarta');

$conn = new mysqli("localhost", "root", "", "donasiku");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

?>