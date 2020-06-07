<?php

date_default_timezone_set('Asia/Jakarta');

/**
 * @param STRING $ENVIRONMENT <'development' for trial, 'production' for final>
 * @param STRING $PLATFORM <'' for all, 'website' for website only, 'mobile' for mobile only>
 * @param OBJECT $conn <use this to connect to website database>
 * @param OBJECT $conn7 <use this to connect to mobile database>
 */

$conn = new mysqli("localhost", "root", "", "donasiku");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

?>