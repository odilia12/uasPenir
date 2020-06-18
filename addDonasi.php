<?php
header("Access-Control-Allow-Origin: *");

require_once('database.php');
require_once('functions.php');

$username = sanitize($_POST['username']);
$tanggal = date("Y-m-d");
$id_kebutuhan = $_POST['id_kebutuhan'];
$nilai = $_POST['nilai'];

$query = "INSERT INTO donasi (tanggal, email_user) 
		VALUES ('$tanggal','$username')";

$sql = $conn7->query($query);

if ($sql) {
	$sql2 = $conn->query("
	SELECT id FROM donasi WHERE tanggal = '$tanggal' AND email_user = '$username'
	");
	if($sql){ 	
		$datas = array();
		$i = 0;
		while ($res = $sql->fetch_assoc()) {
			$datas['datas'][$i]['id'] = $res['id'];
			$i++;
		}
		echo json_encode($datas);

		$id_donasi = $datas['datas'][0]['id'];

		$query3 = "INSERT INTO detail_donasi (id_donasi, id_kebutuhan, nilai) 
			VALUES ('$id_donasi','$id_kebutuhan','$nilai')";

		$sql3 = $conn7->query($query2);

		if($sql3){
			echo json_encode("SUC");
		}
		else{
			echo "gagal menambah donasi";
		}
	}
	else{
		echo "gagal menambah donasi";
	}
} 
else{
		echo "gagal menambah donasi";
}
?>