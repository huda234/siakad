<?php      
require_once __DIR__.'/../config/koneksi.php'; 
require_once __DIR__.'/../config/cek_login.php'; 
require_once __DIR__.'/../config/tgl.php';
session_start();
date_default_timezone_set("Asia/Jakarta");
if ($ed[2] = ""){echo "<script>document.location='../Login'</script>";}
    $page = (!empty($_GET['page'])) ? $_GET['page'] : "Home"; 
		include "layout/header.php";
		include "layout/isi.php";
		if ($hak == "admin") {
			switch ($page) {
				case 'Home'	: include "admin/home.php";
					break;
				case 'Fakultas': include "admin/fakultas/fakultas.php";
					break;
				case 'Prodi' : include "admin/prodi/prodi.php";
					break;
				case 'Kelas': include "admin/kelas/kelas.php";
					break;
				case 'Ruang': include "admin/ruang/ruang.php";
					break;
				case 'Dosen1': include "admin/dosen/dosen.php";
					break;
				case 'DetailDosen': include "admin/dosen/detail_dosen.php";
					break;
				case 'Mahasiswa1': include "admin/mahasiswa/mahasiswa.php";
					break;
				case 'Detail': include "admin/mahasiswa/detail.php";
					break;
			}
		}
		else if($hak == "mahasiswa"){
			switch ($page) {
				case 'Home': include "mahasiswa/home.php";
					break;
				case 'DataPribadi': include "mahasiswa/data_pribadi.php";
					break;
				case 'KRS': include "mahasiswa/krs/krs.php";
					break;
			}
		}else{
			switch ($page) {
				case 'Home': include "mahasiswa/home.php";
					break;
			}
		}
	include_once __DIR__.'/layout/footer.php';
 ?>