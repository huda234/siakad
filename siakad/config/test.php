<?php
	include "encrypt.php";
	session_start();
	echo $_SESSION["VkfgY-6u"];
	echo "<br>";
	echo deskripsi($_SESSION["VkfgY-6u"],"3e:4a:2a:66:69:0");
	echo "<br>";
	//echo $_SESSION["z"];
	echo md5(enkripsi("12345","3e:4a:2a:66:69:0"));
?>