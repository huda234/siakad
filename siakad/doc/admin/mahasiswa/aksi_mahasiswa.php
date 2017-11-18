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
				$sql = $con2->query("SELECT * FROM mahasiswa a LEFT JOIN tahun_angkatan b ON a.id_tahun_angkatan=b.id_tahun_angkatan LEFT JOIN login c ON c.username=a.Nim");
				while ($g = $sql->fetch_assoc()){
					$f = base64_encode($g['Nim']);
					$r = str_replace("=", "", $f);
					$arr[] = $g;
				}
				echo json_encode($arr);
				break;
			case 'fak':
				$v = array();
				$sql = $con2->query("SELECT * FROM fakultas");
				while ($t = $sql->fetch_assoc()) {
					$v[] = $t;
				}
				echo json_encode($v);
				break;
			case 'prodi':
				$v = array();
				$sql = $con2->query("SELECT * FROM prodi");
				while ($t = $sql->fetch_assoc()) {
					$m[] = $t;
				}
				echo json_encode($m);
				break;
			case 'tahun_angkatan':
				$v = array();
				$sql = $con2->query("SELECT * FROM tahun_angkatan");
				while ($t = $sql->fetch_assoc()) {
					$m[] = $t;
				}
				echo json_encode($m);
				break;
			case 'Simpan':
				  	$arr    = array("sukses"=>false);
					$fak    = $_POST['idf'];
					$prodi  = $_POST['pd'];
					$thn    = $_POST['thn_a'];
					$thn_a  = substr($_POST['thn_angk'], 2);
					$id_kon = $_POST['id_kon'];
					$nama   = $_POST['nama'];
					$jkq    = $_POST['jkq'];
					$alamat = $_POST['alamat'];
					$tempat = $_POST['tempat'];
					$tgl    = $_POST['tgl'];
				  	$nim    = $fak.$prodi.$thn_a

				  	$Simpan = $con2->query("INSERT INTO `mahasiswa`(
				  													`Nim`, 
				  													`id_tahun_angkatan`, 
				  													`id_konsentrasi`, 
				  													`Nama`, 
				  													`JenisKelamin`, 
				  													`Alamat`, 
				  													`Tempat`, 
				  													`Tgl_lahir`) 
				  													VALUES (
				  													'$nim',
				  													'$thn',
				  													'$id_kon',
				  													'$nama',
				  													'$jkq',
				  													'$alamat',
				  													'$tempat',
				  													'$tgl')");
				  	if ($Simpan) {
				  		$arr['sukses'] = true;
				  	}else{
				  		$arr['sukses'] = false;
				  	}
				  	echo json_encode($arr);
				break;
		}
	}

 ?>