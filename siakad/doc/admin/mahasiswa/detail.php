<?php 
    $patch = "../../../";
	require_once $patch.'config/koneksi.php';
	require_once $patch.'config/encrypt.php';
	$arr = array();
	// $id  = $_REQUEST['idf'];
	$sql = $con2->query("SELECT * FROM prodi a LEFT JOIN fakultas b ON a.id_fakultas=b.id_fakultas LEFT JOIN akademik_konsentrasi c ON c.id_prodi=a.id_prodi WHERE b.id_fakultas='$_REQUEST[idf]'");
	while ($g = $sql->fetch_assoc()){
		$arr[] = $g;
	}
	echo json_encode($arr);
				



 ?>