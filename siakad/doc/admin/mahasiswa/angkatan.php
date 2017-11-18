<?php 
    $patch = "../../../";
	require_once $patch.'config/koneksi.php';
	$arr = array();
	$tnj = $_POST['thn_a'];
	$sql = $con2->query("SELECT * FROM tahun_angkatan WHERE id_tahun_angkatan='$tnj'");
	while ($g = $sql->fetch_assoc()){
		$arr[] = $g;
	}
	echo json_encode($arr);
				



 ?>