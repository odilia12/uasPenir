<?php
header("Access-Control-Allow-Origin: *");

require_once('database.php');
require_once('functions.php');

$sql = $conn->query("
	SELECT id, kebutuhan, deskripsi, satuan, nilai FROM kebutuhan
	");

if($sql){ 	
	$datas = array();
	$i = 0;
	while ($res = $sql->fetch_assoc()) {
		$datas['datas'][$i]['id'] = $res['id'];
		$datas['datas'][$i]['kebutuhan'] = $res['kebutuhan'];
		$datas['datas'][$i]['deskripsi'] = $res['deskripsi'];
		$datas['datas'][$i]['satuan'] = $res['satuan'];
		$datas['datas'][$i]['nilai'] = $res['nilai'];
		$i++;
	}
	echo json_encode($datas);
}
else{
		echo -1;
}