<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

	include "../../../configurasi/koneksi.php";

	$module = $_GET['module'];
	$act = $_GET['act'];



	// =========input============//
	if ($module == 'pengguna' and $act == 'input_pengguna') {

		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$jabatan = $_POST['jabatan'];

		mysqli_query($koneksi, "INSERT INTO Pegawai 
						(id,
						nip,
						nama,
						jabatan
						) 
						VALUES(
						'$nip',
						'$nama',
						'$jabatan'				
						)");

		$response = array(
			'status' => 'ok',
			'msg' => "berhasil disimpan"
		);
		echo json_encode($response);
		//echo "<script type='text/javascript'>alert('Data berhasil ditambahkan !');window.location='../../media_admin.php?module=".$module."'</script>";
		header('location:../../media_admin.php?module=' . $module);

	}

	//=========ubah==========//
	elseif ($module == 'pengguna' and $act == 'ubah_pengguna') {

		if (empty($_POST['password'])) {

			$usernamenya = $_POST['username'];

			if (!preg_match("/^[a-zA-Z0-9]*$/", $usernamenya)) {
				echo "<script type='text/javascript'>alert('Ubah Username hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
			} else {

				mysqli_query($koneksi, "UPDATE admin SET 
				username = '$_POST[username]',
				nama_admin = '$_POST[nama_admin]',
				tlp_admin = '$_POST[tlp_admin]',
				blokir = '$_POST[blokir]',
				m_pengguna = '$m_pengguna',
				m_kordinator = '$m_kordinator',
				m_investor = '$m_investor',
				m_jenis = '$m_jenis',
				m_item = '$m_item',
				m_kategori = '$m_kategori',
				m_anggota = '$m_anggota',
				tr_simpanan = '$tr_simpanan',
				tr_penarikan = '$tr_penarikan',
				tr_pengajuan_peminjaman = '$tr_pengajuan_peminjaman',
				tr_peminjaman = '$tr_peminjaman',
				tr_pembayaran = '$tr_pembayaran',
				list_tagihan = '$list_tagihan',
				tr_keuangan = '$tr_keuangan',
				tr_pembelian = '$tr_pembelian',
				km_target_komisi = '$km_target_komisi',
				km_riwayat_komisi = '$km_riwayat_komisi',
				km_bagi_hasil = '$km_bagi_hasil',
				km_riwayat_bagi_hasil = '$km_riwayat_bagi_hasil',
				lp_pengadaan = '$lp_pengadaan',
				lp_penggunaan = '$lp_penggunaan',
				lp_simpanan = '$lp_simpanan',
				lp_penarikan = '$lp_penarikan',
				lp_pinjaman = '$lp_pinjaman',
				lp_angsuran = '$lp_angsuran',
				lp_tagihan = '$lp_tagihan',
				lp_keuangan = '$lp_keuangan',
				lp_rekap = '$lp_rekap'
				WHERE id_admin = '$_POST[id]'");

				header('location:../../media_admin.php?module=' . $module);

			}

			// Apabila password diubah
		} else {

			$usernamenya = $_POST['username'];
			$passwordnya = $_POST['password'];

			if (!preg_match("/^[a-zA-Z0-9]*$/", $usernamenya)) {
				echo "<script type='text/javascript'>alert('Ubah Username hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
			} else {

				if (!preg_match("/^[a-zA-Z0-9]*$/", $passwordnya)) {
					echo "<script type='text/javascript'>alert('Ubah Password hanya huruf dan angka yang diijinkan, dan tidak boleh menggunakan spasi ...!');history.go(-1);</script>";
				} else {

					$pass = md5($_POST['password']);
					mysqli_query($koneksi, "UPDATE admin SET 
					password = '$pass',
					username = '$_POST[username]',
					nama_admin = '$_POST[nama_admin]',
					tlp_admin = '$_POST[tlp_admin]',
					blokir = '$_POST[blokir]',
					m_pengguna = '$m_pengguna',
					m_kordinator = '$m_kordinator',
					m_investor = '$m_investor',
					m_jenis = '$m_jenis',
					m_item = '$m_item',
					m_kategori = '$m_kategori',
					m_anggota = '$m_anggota',
					tr_simpanan = '$tr_simpanan',
					tr_penarikan = '$tr_penarikan',
					tr_pengajuan_peminjaman = '$tr_pengajuan_peminjaman',
					tr_peminjaman = '$tr_peminjaman',
					tr_pembayaran = '$tr_pembayaran',
					list_tagihan = '$list_tagihan',
					tr_keuangan = '$tr_keuangan',
					tr_pembelian = '$tr_pembelian',
					km_target_komisi = '$km_target_komisi',
					km_riwayat_komisi = '$km_riwayat_komisi',
					km_bagi_hasil = '$km_bagi_hasil',
					km_riwayat_bagi_hasil = '$km_riwayat_bagi_hasil',
					lp_pengadaan = '$lp_pengadaan',
					lp_penggunaan = '$lp_penggunaan',
					lp_simpanan = '$lp_simpanan',
					lp_penarikan = '$lp_penarikan',
					lp_pinjaman = '$lp_pinjaman',
					lp_angsuran = '$lp_angsuran',
					lp_tagihan = '$lp_tagihan',
					lp_keuangan = '$lp_keuangan',
					lp_rekap = '$lp_rekap'
					WHERE id_admin = '$_POST[id]'");

					header('location:../../media_admin.php?module=' . $module);

				}
			}

		}

	}

	//=========hapus=========//
	elseif ($module == 'pengguna' and $act == 'hapus_pengguna') {

		//cek apakah data sudah terkait
		$ceklah1 = mysqli_query($koneksi, "SELECT * FROM tr_simpanan WHERE id_admin_simpanan='$_GET[id]'");
		$ketemulah1 = mysqli_num_rows($ceklah1);
		if ($ketemulah1 > 0) {
			echo "<script type='text/javascript'>alert('Data tidak bisa dihapus, terdapat data terkait !');window.location='../../media_admin.php?module=" . $module . "'</script>";
		} else {
			$ceklah2 = mysqli_query($koneksi, "SELECT * FROM tr_pengambilan WHERE id_admin_pengambilan='$_GET[id]'");
			$ketemulah2 = mysqli_num_rows($ceklah2);
			if ($ketemulah2 > 0) {
				echo "<script type='text/javascript'>alert('Data tidak bisa dihapus, terdapat data terkait !');window.location='../../media_admin.php?module=" . $module . "'</script>";
			} else {
				$ceklah3 = mysqli_query($koneksi, "SELECT * FROM tr_peminjaman WHERE id_admin_peminjaman='$_GET[id]'");
				$ketemulah3 = mysqli_num_rows($ceklah3);
				if ($ketemulah3 > 0) {
					echo "<script type='text/javascript'>alert('Data tidak bisa dihapus, terdapat data terkait !');window.location='../../media_admin.php?module=" . $module . "'</script>";
				} else {
					mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$_GET[id]'");
					//echo "<script type='text/javascript'>alert('Data berhasil dihapus !');window.location='../../media_admin.php?module=".$module."'</script>";
					header('location:../../media_admin.php?module=' . $module);
				}

			}

		}


	}

}
?>