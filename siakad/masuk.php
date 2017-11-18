<?php 
	require_once __DIR__.'/config/koneksi.php';
	require_once __DIR__.'/config/encrypt.php';
	session_start();
	if (ISSET($_SESSION['Aw23Vg'])) {
		$des = deskripsi($_SESSION['Aw23Vg'], $Kunci);
		$ed  = explode("-", $des);
		$sql = $con2->query("SELECT * FROM login WHERE username='".$ed[0]."' AND password='".$ed[1]."'");
		$jumlah = mysqli_num_rows($sql);
		if ($jumlah > 0) {
			while ($fg  = $sql->fetch_array()) {
				$user   = $fg['username'];
				$hak    = $fg['level'];
				$status = $fg['status'];
			}
			echo "<script>document.location='doc/Home'</script>";
		}else{echo "<script>document.location='Login'</script>";}
	 }else{echo "<script>document.location='Login'</script>";}

 ?>