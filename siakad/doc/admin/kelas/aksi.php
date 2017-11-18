<?php 
	$patch = "../../../";
	require_once $patch.'config/koneksi.php';
	require_once $patch.'config/encrypt.php';
	require_once $patch.'config/tgl.php';
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
		}else{
			echo "<script>document.location='../../../Login'</script>";
		}
	}else{
		echo "<script>document.location='../../../Login'</script>";
	}

	if (isset($_GET['aksi'])) {
		switch ($_GET['aksi']) {
			case 'lihat':
				$arr = array();
				$no  = 1;
				$sql = $con2->query("SELECT * FROM kelas");
				while ($g = $sql->fetch_assoc()){
					array_push($arr, array(
										 'no'=>$no++,
										 'id_kelas'=>$g['id_kelas'],
										 'jenis_kelas'=>$g['jenis_kelas'],
										 'kuota'=>$g['kuota'])
								);
				}
				echo json_encode(array("data"=>$arr));
				break;
			case 'TambahKelas':
				$carikode = mysqli_query($con2, "SELECT max(id_kelas) FROM kelas") or die (mysqli_error());
				  // menjadikannya array
				  $datakode = mysqli_fetch_array($carikode);
				  // jika $datakode
				  if ($datakode) {
				   $nilaikode = substr($datakode[0], 1);
				   // menjadikan $nilaikode ( int )
				   $kode = (int) $nilaikode;
				   // setiap $kode di tambah 1
				   $kode = $kode + 1;
				   $kode_otomatis = "K".str_pad($kode, 2, "0", STR_PAD_LEFT);
				  } else {
				   $kode_otomatis = "K01";
				  }
				$nama = $_POST['nama_kelas'];
				$isi  = $_POST['isi_kelas'];
				$pesan = array('sukses' =>false);
				$Simpan = $con2->query("INSERT INTO `kelas`(
															`id_kelas`, 
															`jenis_kelas`, 
															`kuota`) 
															VALUES (
															'$kode_otomatis',
															'$nama',
															'$isi')");
				if ($Simpan) {
					$pesan['sukses']= true;
				}else{
					$pesan['sukses']=false;
				}
				echo json_encode($pesan);
				break;
		}
	}

 ?>