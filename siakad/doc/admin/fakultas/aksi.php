<?php 
	$patch = '../../..';
	require_once $patch.'/config/koneksi.php';
	require_once $patch.'/config/encrypt.php';
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
	
	if (isset($_GET['act'])) {
		switch ($_GET['act']) {
			case 'tampil':
			    $g   = array();
				$sql = $con2->query("SELECT * FROM fakultas");
				while ($de = $sql->fetch_assoc()) {
					$g[] = $de;
				}
				echo json_encode($g);
				break;
			case 'simpan':
				if ($_POST['aksi']=='tambah') {
					$pesan = array('sukses' =>false);
					$nama_fakultas = $_POST['nama_fakultas'];
					$nama_dekan    = $_POST['nama_dekan'];
					$Simpan = $con2->query("INSERT INTO `fakultas`(
																   `id_fakultas`, 
																   `nama_fakultas`, 
																   `nama_dekan`) 
																   VALUES (
																   '',
																   '$nama_fakultas',
																   '$nama_dekan')");
				
					if ($Simpan) {
						$pesan['sukses'] = true;
					}else{
						$pesan['sukses'] = false;
					}
					echo json_encode($pesan);
				}

				if ($_POST['aksi']=='update') {
					$id     = $_POST['id_fakultas'];
					$nama_f = $_POST['nama_fakultas'];
					$nama_d = $_POST['nama_dekan'];

					$update = $con2->query("UPDATE fakultas SET
															   nama_fakultas='$nama_f',
															   nama_dekan='$nama_d'
															WHERE
															   id_fakultas='$id'");
					if ($update) {
						echo "Data Berhasil Diubah";
					}else{
						echo "Data Gagal Diubah";
					}
				}
				break;
			case 'edit':
				$d   = array();
				$sql = $con2->query("SELECT * FROM fakultas WHERE id_fakultas='$_GET[id]'");
				$fb  = mysqli_fetch_assoc($sql);
				$d[] = $fb;
				echo json_encode($d);
				break;

			case 'hapus':
				$pesan = array();
				$pid = intval($_POST['delete']);
				$delete = $con2->query("DELETE FROM fakultas WHERE id_fakultas='$pid'");
				if ($delete) {
					$pesan['status'] = 'success';
				}else{
					$pesan['satatus'] = 'error';
				}
				echo json_encode($pesan);
				break;

		}
	}

 ?>