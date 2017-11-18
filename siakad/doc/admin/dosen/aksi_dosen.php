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
		}else{
			echo "<script>document.location='../../../Login'</script>";
		}
	}else{
		echo "<script>document.location='../../../Login'</script>";
	}
	
	if (isset($_GET['act'])) {
		switch ($_GET['act']) {
			case 'lihat':
				$b = array();
				$no = 1;
				$sql = $con2->query("SELECT * FROM dosen AS a LEFT JOIN bidang_keilmuan AS b ON a.id_bidang=b.id_bidang");
				while ($data = $sql->fetch_assoc()) {
					$id = base64_encode($data['id_dosen']);
					$fg = str_replace("=", "", $id);
					$edit = '<a href="#" class="btn btn-warning btn-circle-lg waves-effect waves-circle waves-float" onclick= ambildosenId("'.$data['id_dosen'].'")><i class="material-icons">create</i></a>';
					$detail = '<a href="DetailDosen='.$fg.'" class="btn btn-info"><i class="material-icons">search</i></a>';
					array_push($b, array(
										 'no'=>$no++,
										 'id_dosen'=>$data['id_dosen'],
										 'nidn'=>$data['nidn'],
										 'nama'=>$data['nama'],
										 'jk'=>$data['jk'],
										 'agama'=>$data['agama'],
										 'tempat'=>$data['tempat'],
										 'tgl_lahir'=>$data['tgl_lahir'],
										 'id_b'=>$data['id_bidang'],
										 'nama_b'=>$data['nama_keilmuan'],
										 'Aksi'=>$edit.' '.$detail)
						       );
					
				}
				echo json_encode(array("data"=>$b));
				break;

				case 'simpan':
					if ($_POST['aksi']=="tambah") {
						$pesan  = array("sukses"=>false);
						$id     = $_POST['id_dosen'];
						$nip    = $_POST['nidn'];
						$nama   = $_POST['nama'];
						$agama  = $_POST['agama'];
						$jk     = $_POST['group1'];
						$lahir  = $_POST['tmp_lahir'];
						$tgl    = $_POST['tgl_lahir'];
						$bidang = $_POST['bidang'];
						$pass   = md5(enkripsi($_POST['password'],$Kunci));
						$Simpan = $con2->query("INSERT INTO `dosen`(
																	`id_dosen`, 
																	`nidn`, 
																	`nama`, 
																	`jk`, 
																	`agama`,
																	`tempat`,
																	`tgl_lahir`,
																	`id_bidang`
																	)VALUES(
																	'$id',
																	'$nip',
																	'$nama',
																	'$jk',
																	'$agama',
																	'$lahir',
																	'$tgl',
																	'$bidang')");
						$Simpan = $con2->query("INSERT INTO `login`(
																	`username`, 
																	`password`, 
																	`level`, 
																	`status`) 
																	VALUES (
																	'$id',
																	'$pass',
																	'dosen',
																	'A')");
						if ($Simpan) {
							$pesan['sukses'] = true;
						}else{
							$pesan['sukses'] = false;
						}
						echo json_encode($pesan);
					}
					break;
					case 'keilmuan':
						$bn = array();
						$dk = $con2->query("SELECT * FROM bidang_keilmuan");
						while ($f = $dk->fetch_assoc()) {
							$bn[] = $f; 
						}
						echo json_encode($bn);
					break;

					case 'ambil':
						$t  = array();
						$query = $con2->query("SELECT * FROM bidang_keilmuan AS a LEFT JOIN dosen AS b ON a.id_bidang=b.id_bidang WHERE b.id_dosen='$_GET[id]'");
						$ry = $query->fetch_assoc();
						$t[] = $ry;
						echo json_encode($t);
					break;
		}
	}


 ?>