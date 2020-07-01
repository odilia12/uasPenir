<?php
header("Access-Control-Allow-Origin: *");

require_once('database.php');
require_once('functions.php');

$sql = $conn->query("
	SELECT k.id as id, 
		k.kebutuhan as kebutuhan, 
		k.deskripsi as deskripsi, 
		k.satuan as satuan, 
		k.nilai as nilai, 
		IFNULL((SELECT sum(nilai) from detail_donasi where id_kebutuhan = k.id),0) as progress 
	FROM kebutuhan k left join detail_donasi d on k.id=d.id_kebutuhan
	group by id;
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
		$datas['datas'][$i]['progress'] = $res['progress'];
		$i++;
	}
	echo json_encode($datas);
}
else{
		echo -1;
}