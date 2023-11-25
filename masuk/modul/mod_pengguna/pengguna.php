<?php
session_start();
if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
	echo "<link href=../css/style.css rel=stylesheet type=text/css>";
	echo "<div class='error msg'>Untuk mengakses Modul anda harus login.</div>";
} else {

	$aksi = "modul/mod_pengguna/aksi_pengguna.php";
	$aksi_satuan = "masuk/modul/mod_pengguna/aksi_pengguna.php";

	switch ($_GET[act]) {

		default:


			//  $tampil_data = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id_admin ASC");
			$url = "http://corenet.usadi.co.id/BaseAPI/Pegawai";
			$data = file_get_contents($url);
			# parsing variabel $data ke dalam array
			$tampil = json_decode($data);
			?>

			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data Pegawai</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-box table-responsive">
									<a type="button" class="btn btn-success btn-sm" href="?module=pengguna&act=tambah">Tambah</a>
									<div class="ln_solid"></div>
									<table id="datatable" class="table table-hover table-sm table-bordered jambo_table">
										<thead>
											<tr>
												<th>No</th>
												<th>Nip</th>
												<th>Nama </th>
												<th>Jabatan</th>
												<th>Aksi</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$no = 1;
											//while ($r=mysqli_fetch_array($tampil_data)){
											foreach ($tampil->rows as $berita) {

												echo "
											
												<tr>
													<td>$no</td>           
													<td>{$berita->nip}</td>
													<td>{$berita->nama}</td>
													<td>{$berita->jabatan}</td>
													<td align='center'>
													
														<a href='?module=pengguna&act=ubah&id={$berita->id}' title='Ubah'><i class='fa fa-edit'></i> &nbsp</a> 
														<a href=javascript:confirmdelete('$aksi?module=pengguna&act=hapus_pengguna&id=$r[id]') title='Hapus'><i class='fa fa-trash-o'></i></a>
														
													</td>
												</tr>
											";
												$no++;
											}
											echo "
								</tbody>
							</table>
							";
											?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php
			require_once(__DIR__ . '../../../vendor/autoload.php');

			$uuidString1 = str(uuid . uuid4());
			echo $uuidString1;

			break;

		case "tambah":
			echo "
			<div class='x_panel'>
				<div class='x_title'>
					<h2>Tambah Data</h2>
					<div class='clearfix'></div>
				</div>
				<div class='x_content'>
					<br/>
					<form method='POST' action='$aksi?module=pengguna&act=input_pengguna' enctype='multipart/form-data' class='form-horizontal form-label-left'>

							
						
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Nip</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='nip' >
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Nama</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='nama' required='required' >
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Jabatan</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='jabatan' required='required' >
							</div>
						</div>
						
					
						
						

						<div class='ln_solid'></div>
						<div class='form-group'>
							<div class='col-md-9 col-sm-9  offset-md-3'>
								<button type='submit' class='btn btn-success btn-sm'>Simpan</button>
								<button type='button' class='btn btn-secondary btn-sm' onclick=self.history.back()>Kembali</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		";
			break;


		case "ubah":

			$edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$_GET[id]'");
			$r = mysqli_fetch_array($edit);

			echo "
			<div class='x_panel'>
				<div class='x_title'>
					<h2>Ubah Data</h2>
					<div class='clearfix'></div>
				</div>
				<div class='x_content'>
					<br />
					<form method='POST' action='$aksi?module=pengguna&act=ubah_pengguna' class='form-horizontal form-label-left'>
					
						<input type=hidden name='id' value='$r[id]'>

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
								<input type='text' class='form-control' name='username' value='$r[username]' required='required'>
							</div>
						</div>
						
						<div class='form-group row '>
							<label class='control-label col-md-3 col-sm-3 '>Password</label>
							<div class='col-md-9 col-sm-9 '>
								<input type='text' class='form-control' name='password'>
								<small>Apabila password tidak diubah, dikosongkan saja.</small>
							</div>
						</div>
						
						
						<div class='ln_solid'></div>
						<div class='form-group'>
							<div class='col-md-9 col-sm-9  offset-md-3'>
								<button type='submit' class='btn btn-success btn-sm'>Ubah</button>
								<button type='button' class='btn btn-secondary btn-sm' onclick=self.history.back()>Kembali</button>
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