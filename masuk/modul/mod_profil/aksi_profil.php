<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	
	include "../../../configurasi/koneksi.php";

	$module=$_GET['module'];
	$act=$_GET['act'];
	

	//=========ubah==========//
	if ($module=='profil' AND $act=='ubah_profil'){
		 
		if (empty($_POST['password'])) {
  
			$usernamenya = $_POST['username'];

			if(!preg_match("/^[a-zA-Z0-9]*$/", $usernamenya)){
				echo "<script type='text/javascript'>alert('Ubah Username hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
			}else{
		 
				mysqli_query($koneksi, "UPDATE admin SET 
				nama_admin = '$_POST[nama_admin]',
				tlp_admin = '$_POST[tlp_admin]'
				WHERE id_admin = '$_POST[id]'");
				
				header('location:../../media_admin.php?module='.$module.'&act=ubah');
											
			}
			
		// Apabila password diubah
		}else{
			
			$usernamenya = $_POST['username'];
			$passwordnya = $_POST['password'];

			if(!preg_match("/^[a-zA-Z0-9]*$/", $usernamenya)){
				echo "<script type='text/javascript'>alert('Ubah Username hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
			}else{
			 
			if(!preg_match("/^[a-zA-Z0-9]*$/", $passwordnya)){
				echo "<script type='text/javascript'>alert('Ubah Password hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
			}else{
			 
					$pass=md5($_POST['password']);
					mysqli_query($koneksi, "UPDATE admin SET 
					password = '$pass',
					nama_admin = '$_POST[nama_admin]',
					tlp_admin = '$_POST[tlp_admin]'
					WHERE id_admin = '$_POST[id]'");
					
				header('location:../../media_admin.php?module='.$module.'&act=ubah');
				
			}}
			
		}
		
	}

}
?>
