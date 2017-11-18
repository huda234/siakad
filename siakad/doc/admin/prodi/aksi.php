<?php 
	$vee = '../../..';
	require_once $vee.'/config/koneksi.php';
	require_once $vee.'/config/encrypt.php';
	session_start();
	$ksn = $_SESSION['Aw23Vg'];
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
	
	if (isset($_GET['act'])) {
		switch ($_GET['act']) {
			case 'save':
				if ($_POST['aksi']=='tambah') {
					$valid = array('success' => false, 'messages' =>array());
					$fakultas     = $_POST['fakultas'];
					$nama_prodi   = $_POST['nama_prodi'];
					$nama_kaprodi = $_POST['nama_kaprodi'];
					$jenjang      = $_POST['jenjang'];

					$Simpan = $con2->query("INSERT INTO `prodi`(
																`id_prodi`, 
																`id_fakultas`, 
																`nama_prodi`, 
																`nama_kaprodi`) 
																VALUES (
																'',
																'$fakultas',
																'$nama_prodi',
																'$nama_kaprodi')");
					if ($Simpan) {
						$valid['success'] = true;
						$valid['messages'] = 'Data Berhasil disimpan';
					}else{
						$valid['success'] = false;
						$valid['messages'] = 'Data Gagal disimpan';
					}
					echo json_encode($valid);
				}
				break;
				case 'ambilprodi':
					$fb = array();
					$gn = $con2->query("SELECT * FROM prodi AS a LEFT JOIN fakultas AS b ON a.id_fakultas=b.id_fakultas WHERE a.id_prodi='$_GET[id_o]'");
					$bh = mysqli_fetch_assoc($gn);
					$fb[] = $bh;
					echo json_encode($fb);
				break;
				case 'lihat':
				$b = array();
				$no = 1;
				$sql = $con2->query("SELECT * FROM prodi AS a LEFT JOIN fakultas AS b ON a.id_fakultas=b.id_fakultas");
				while ($data = $sql->fetch_assoc()) {
					$edit = '<a href="#" class="btn btn-warning" onclick= ambilprodiId("'.$data['id_prodi'].'")><i class="material-icons">create</i></a>';
					array_push($b, array(
										 'no'=>$no++,
										 'id_prodi'=>$data['id_prodi'],
										 'id_fakultas'=>$data['id_fakultas'],
										 'nama_prodi'=>$data['nama_prodi'],
										 'nama_fakultas'=>$data['nama_fakultas'],
										 'nama_kaprodi'=>$data['nama_kaprodi'],
										 'Aksi'=>$edit)

						       );
					
				}
				echo json_encode(array("data"=>$b));
				break;

				case 'ambilfakultas':
					$arr = array();
					$sdn = $con2->query("SELECT * FROM fakultas");
					while ($vb = $sdn->fetch_assoc()) {
						$arr[] = $vb;
					}
					echo json_encode($arr);
					break;

				case 'updateprodi1':
					if ($_POST['aksi']=='updateprodi') {
						$gh = array("sukses"=>false);
						$id            = $_POST['id'];
						$id_fakultas   = $_POST['fv'];
						$nama_prodi    = $_POST['nama_prodi1'];
						$nama_kaprodi1 = $_POST['nama_kaprodi1'];

						$u =$con2->query("UPDATE `prodi` SET
															`id_fakultas`='$id_fakultas',
															`nama_prodi`='$nama_prodi',
															`nama_kaprodi`='$nama_kaprodi1' 
														  WHERE 
														  	`id_prodi`='$id'");
						if ($u) {
							$gh['sukses'] = true;
						}else{
							$gh['sukses'] = false;
						}
						echo json_encode($gh);
					}
					break;
		}
	}



 ?>