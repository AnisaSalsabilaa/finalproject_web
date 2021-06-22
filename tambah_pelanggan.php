<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
	<link rel="stylesheet" type="text/css" href="sidebar.css">
	<link rel="icon" href="logo_1.png">
	<script src="bootstrap.min.js"></script>
	<script src="jquery-1.11.1.min.js"></script>
	<title>Tambah Pelanggan</title>
	<style>
		.content {
			padding: 5%;
			background: #fff;
			min-height: 460px;
		}

		h1 {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: #2aa7e2;
			font-weight: 900;
		}

		a {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 23px;
			font-weight: 500;
		}

		.simpan {
			background-color: #4CAF50;
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}

		.batal {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}

		data {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 17px;
			font-weight: 500;
		}

		l {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 17px;
			font-weight: 400;
		}
	</style>
</head>

<div class="navigasi">
	<a href="halaman_pegawai.php">Home</a>
	<a href="halaman_pegawai_pelanggan.php">Pelanggan</a>
	<a href="halaman_pegawai_layanan.php">Layanan</a>
	<a href="transaksi.php">Transaksi</a>
	<a href="halaman_pegawai_laporan.php">Laporan</a>

</div>
<div class="container">
	<div class="row profile">

		<!-- Page Content -->
		<div id="page-content-wrapper">
		</div>
		<div class="col">
			<div class="content">
				<h1><b>Tambah Pelanggan Baru</b></h1>
				<hr>
				<table width="700" border="0" cellpadding="2" cellspacing="1">
					<?php
					include 'koneksi.php';
					if (isset($_POST['nama'])) {
						$nama = $_POST['nama'];
						$alamat = $_POST['alamat'];
						$jeniskelamin = $_POST['jeniskelamin'];
						$telp = $_POST['telp'];
						$pekerjaan = $_POST['pekerjaan'];

						$input = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('', '$nama','$alamat','$jeniskelamin','$telp','$pekerjaan')");
						if ($input) {

							echo '<div class="alert alert-success alert-dismissable">
                                <button type="input" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah pelanggan Berhasil!</b></h4>';		//Pesan jika proses tambah sukses
							echo '
		============================<Br>
		<data><b>Info pelanggan</b><br>
		Nama : <b>' . $nama . '</b><br>
		Alamat : <b>' . $alamat . '</b><br>
		Jenis Kelamin : <b>' . $jeniskelamin . '</b><br>
		Telp : <b>' . $telp . '</b><br>
		Pekerjaan : <b>' . $pekerjaan . '</b><br></data>
		</div>
		
		';
						} else {

							echo 'Gagal menambahkan data! ';
							echo '<a href="tambah_pelanggan.php">Kembali</a>';
						}
					}
					?>
					<form method="post"><data>

							<div class="form-group">
								<label><data>Nama</data></label>
								<input type="text" class="form-control" name="nama" placeholder="Masukan Nama pelanggan" required>
							</div>
							<div class="form-group">
								<label><data>Alamat</data></label>
								<textarea type="text" class="form-control" name="alamat" placeholder="Masukan Alamat pelanggan" required style="resize: none;"></textarea>
							</div>
							<div class="form-group">
								<label><data>Jenis Kelamin</data></label><br>
								<input type="radio" name="jeniskelamin" value="Laki-laki" checked>
								<l> Laki-laki</l><br>
								<input type="radio" name="jeniskelamin" value="Perempuan">
								<l> Perempuan</l><br>
							</div>
							<div class="form-group">
								<label><data>Telp</data></label>
								<input type="text" class="form-control" name="telp" placeholder="Masukan No. Telepon pelanggan" required>
							</div>
							<div class="form-group">
								<label><data>Pekerjaan</data></label>
								<input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan pelanggan" required>
							</div>
							<br>
							<div style="text-align: center">
								<button type="submit" class="simpan btn btn-success btn-sm">SIMPAN</button>
								<a type="button" href="halaman_pegawai_pelanggan.php" class="batal btn btn-danger btn-sm">BATAL</a>
							</div>
						</data></form>
			</div>

		</div>


	</div>
</div>
</div>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>


</div>
</body>

</html>