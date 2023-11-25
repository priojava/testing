<script>
	function confirmdelete(delUrl) {
		if (confirm("Anda yakin ingin menghapus?")) {
			document.location = delUrl;
		}
	}
</script>
<?php
include "../configurasi/koneksi.php";
include "../configurasi/fungsi_indotgl.php";
include "../configurasi/fungsi_rupiah.php";

// Bagian Home
if ($_GET['module'] == 'home') {

	

	?>

	<div class="row x_title">
		<div class="col-md-6">
			<h2>DASHBOARD</h2>
		</div>
	</div>
	<!-- top tiles -->
	<div class="row  col-md-12 col-sm-12" style="display: inline-block;">
		<div class="tile_count">

			<div class="col-md-3 col-sm-4  tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total </span>
				<div class="count" align="center">
					<?php echo 0 ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-4  tile_stats_count">
				<span class="count_top"><i class="fa fa-clock-o"></i> Jumlah </span>
				<div class="count" align="center">
					<?php echo 0 ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-4  tile_stats_count">
				<span class="count_top"><i class="fa fa-line-chart"></i> Total </span>
				<div class="count green" align="center">
					<?php echo 0 ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-4  tile_stats_count">
				<span class="count_top"><i class="fa fa-money"></i> Total </span>
				<div class="count red" align="center">
					<?php echo 0 ?>
				</div>
			</div>

		</div>
	</div>

	<?php

	//<!-- /top tiles -->	
}
// Bagian pengguna
elseif ($_GET['module'] == 'pengguna') {
	include "modul/mod_pengguna/pengguna.php";
}

// Bagian profil
elseif ($_GET['module'] == 'profil') {
	include "modul/mod_profil/profil.php";
}


?>