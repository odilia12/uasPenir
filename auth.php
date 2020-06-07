<?php
header("Access-Control-Allow-Origin: *");

require_once('database.php');
require_once('functions.php');

	$RET = array('hasil' => 'ERR');

	$email = sanitize($_POST['email']);
	$password = sanitize($_POST['password']);

	$sql = $conn->query("
		SELECT password FROM user WHERE email='$email'
		");
	
	if($sql->num_rows > 0 && $sql->fetch_assoc()['password'] == $password){
		$sqlId = $conn->query("
			SELECT email, nama, no_hp FROM user WHERE email='$email'
			");
		$resId = $sqlId->fetch_assoc();
		$RET = array('hasil' => 'SUC', 
			'email' =>  $resId['email'],
			'nama' => $resId['nama'],
			'no_hp' => $resId['no_hp']);
	}
	
	echo json_encode($RET);
