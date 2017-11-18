<?php 
	$patch = "../../../";
	require_once $patch.'config/koneksi.php';
	require_once $patch.'config/encrypt.php';
	session_start();
	$arr = deskripsi($_SESSION['Aw23Vg'], $Kunci);
	$r   = explode("-", $arr);
	if (ISSET($r[0])) {
		$dc = $con2->query("SELECT * FROM login WHERE username='".$r[0]."'");
		$jml = mysqli_num_rows($dc);
		if ($jml > 0) {
			while ($r = $dc->fetch_array()) {
				$username = $r['username'];
				$pass     = $r['password'];
				$level    = $r['level'];
			}	
		}else{echo "<script>document.location='../../../Login'</script>";}
	}else{echo "<script>document.location='../../../Login'</script>";}
		if (isset($_GET['aksi'])) {
		switch ($_GET['aksi']) {
			case 'lihat':
				$arr = array();
				$no  = 1;
				$sql = $con2->query("SELECT * FROM ruang");
				while ($g = $sql->fetch_assoc()){
					array_push($arr, array(
										 'no'=>$no++,
										 'id_ruang'=>$g['id_ruang'],
										 'nama_ruang'=>$g['nama_ruang'])
								);
				}
				echo json_encode(array("data"=>$arr));
				break;
			case 'TambahRuang':
				$carikode = mysqli_query($con2, "SELECT max(id_ruang) FROM ruang") or die (mysqli_error());
				  // menjadikannya array
				  $datakode = mysqli_fetch_array($carikode);
				  // jika $datakode
				  if ($datakode) {
				   $nilaikode = substr($datakode[0], 1);
				   // menjadikan $nilaikode ( int )
				   $kode = (int) $nilaikode;
				   // setiap $kode di tambah 1
				   $kode = $kode + 1;
				   $kode_otomatis = "R".str_pad($kode, 2, "0", STR_PAD_LEFT);
				  } else {
				   $kode_otomatis = "R01";
				  }
				$nama = $_POST['nama_ruang'];
				$pesan = array('sukses' =>false);
				$Simpan = $con2->query("INSERT INTO `ruang`(
															`id_ruang`, 
															`nama_ruang`) 
															VALUES (
															'$kode_otomatis',
															'$nama')");
				if ($Simpan) {
					$pesan['sukses']= true;
				}else{
					$pesan['sukses']=false;
				}
				echo json_encode($pesan);
				break;
			case 'UpdateRuang':
				$id = $_POST['id'];
				$r  = $_POST['ruang'];
				$pesan = array('berhasil'=>false);
				$Update = $con2->query("UPDATE `ruang` SET `nama_ruang`='$r' 
													   WHERE 
													   		`id_ruang`='$id'");
				if ($Update) {
					$pesan['berhasil'] = true;
				}else{
					$pesan['berhasil'] = true;
				}
				echo json_encode($pesan);
				break;
		}
	}
 ?>