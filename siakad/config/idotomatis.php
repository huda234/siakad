<?php
	include "koneksi.php";
	$SQL = "SELECT ID2 FROM id_oto";
	$Proses = mysqli_query($con,$SQL);
	while ($z = mysqli_fetch_array($Proses)) { 
	    $idotomatis = $z["ID2"];
	}
?>