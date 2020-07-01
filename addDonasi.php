<?php
header("Access-Control-Allow-Origin: *");

require_once('database.php');
require_once('functions.php');

$RET = array('hasil' => 'ERR');

$email = sanitize($_POST['email']);
$tanggal = date("Y-m-d h:i:s");
$id_kebutuhan = $_POST['id_kebutuhan'];
$nilai = $_POST['nilai'];

$query = "INSERT INTO donasi (tanggal, email_user) VALUES ('$tanggal','$email')";
$sql = $conn->query($query);

if ($sql) {
	$query2 = "	SELECT id FROM donasi WHERE tanggal = '$tanggal' AND email_user = '$email'	";
	$sql2 = $conn->query($query2);

	if($sql2){ 	
		$datas = array();
		$i = 0;
		while ($res = $sql2->fetch_assoc()) {
			$datas['datas'][$i]['id'] = $res['id'];
			$i++;
		}
		
		$id_donasi = $datas['datas'][0]['id'];

		$query3 = "INSERT INTO detail_donasi (id_donasi, id_kebutuhan, nilai) 
			VALUES ('$id_donasi','$id_kebutuhan','$nilai')";
		$sql3 = $conn->query($query3);

		if($sql3){
			$RET = array('hasil' => 'SUC');
		}
	}
}

echo json_encode($RET);
?>