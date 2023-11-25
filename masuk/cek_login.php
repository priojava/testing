<?php
include "../configurasi/koneksi.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login = mysqli_query ($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu = mysqli_num_rows($login);
$r=mysqli_fetch_array($login);


// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  include "timeout.php";

  $_SESSION['id_admin'] = $r['id_admin'];
  $_SESSION['username'] = $r['username'];
  $_SESSION['nama_admin'] = $r['nama_admin'];
  $_SESSION['password'] = $r['password'];
  $_SESSION['level'] = $r['level'];

  // session timeout
  $_SESSION['login'] = 1;
  timer();

	$sid_lama = session_id();

	session_regenerate_id();

	$sid_baru = session_id();
	
	header('location:media_admin.php?module=home');
  
} else {
   echo "<link href=css/style.css rel=stylesheet type=text/css>";
   echo "<div class='error msg'>Login Gagal, Username atau Password salah, atau account anda sedang di blokir. ";
   echo "<a href=index.php><b>ULANGI LAGI</b></a></center></div>";
}

?>
