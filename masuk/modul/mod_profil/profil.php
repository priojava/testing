<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href=../css/style.css rel=stylesheet type=text/css>";
	echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
}else{

$aksi="modul/mod_profil/aksi_profil.php";
$aksi_satuan = "masuk/modul/mod_profil/aksi_profil.php";

switch($_GET[act]){
	
	default:
    
    break;
	

	case "ubah":
	
		$edit=mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$_SESSION[id_admin]'");
		$r=mysqli_fetch_array($edit);
				
		echo"
			<div class='x_panel'>
				<div class='x_title'>
					<h2>Profile</h2>
					<div class='clearfix'></div>
				</div>
				<div class='x_content'>
					<br />
					<form method='POST' action='$aksi?module=profil&act=ubah_profil' class='form-horizontal form-label-left'>
					
						<input type=hidden name='id' value='$r[id_admin]'>

						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Nama Lengkap</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='nama_admin' value='$r[nama_admin]' required='required'>
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>No Handphone</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='tlp_admin' value='$r[tlp_admin]'>
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Username</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='username' value='$r[username]' readonly='readonly'>
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Password</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='password'>
								* Apabila password tidak diubah, dikosongkan saja.
							</div>
						</div>

						<div class='ln_solid'></div>
						<div class='form-group'>
							<div class='col-md-9 col-sm-9  offset-md-3'>
								<button type='submit' class='btn btn-success btn-sm'>Ubah</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		";
    break;


}
}
?>