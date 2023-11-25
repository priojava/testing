<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "arss3525_koperasi";
set_time_limit(1800);
$koneksi = mysqli_connect($server, $user, $password, $database);
 
//cek koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
}
	
?>
