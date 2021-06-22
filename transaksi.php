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
	<title>Riwayat Transaksi</title>
	<style>
		.header {
			overflow: hidden;
			background-color: #00a3cc;
			padding-left: 10%;
		}

		.header a {
			float: left;
			font-size: 16px;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		.content {
			padding: 5%;
			background: #fff;
			min-height: 460px;
		}

		.table1 {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: #444;
			border: 1px solid #f2f5f7;
			border-collapse: collapse;
			width: 100%;
			height: 80%
		}

		.table1 tr th {
			background: #35A9DB;
			color: #fff;
			font-weight: 700;
		}

		.table1,
		th,
		td {
			padding: 1% 1%;
		}

		.table1 tr:hover {
			background-color: #f5f5f5;
		}

		.table1 tr:nth-child(even) {
			background-color: #f2f2f2;
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
				<h1><b>Riwayat Transaksi</b></h1>
				<hr>
				<table width="100%" border="0" cellpadding="2" cellspacing="1">

					<tbody>
						<tr>
							<td colspan="2"><a href="tambah_transaksi.php" target="_self"><img src="add.png"> Tambah Transaksi</a></td>
							<td colspan="2"><a href="laporan_transaksi.php" target="_self"><img src="add.png"> Laporan Transaksi</a></td>
							<td colspan="2"><a href="import_excel.php?bagian=transaksi" target="_self"><img src="add.png"> Laporan Excel</a></td>
						</tr>
						<div class='panel panel-border panel-primary'>
							<div class='panel-body'>
								<table id='datatable' class='table1'>
									<thead>
										<tr>
											<th>No</th>
											<th style="text-align:center">Tanggal</th>
											<th style="text-align:center">Pelanggan</th>
											<th style="text-align:center">Layanan</th>
											<th>Berat</th>
											<th>Total Harga</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										include 'koneksi.php';
										$tp = mysqli_query($koneksi, "SELECT * FROM transaksi t JOIN pelanggan p ON t.ID_PELANGGAN = p.ID_PELANGGAN JOIN layanan l ON t.ID_LAYANAN = l.ID_LAYANAN ORDER BY t.TANGGAL_TRANSAKSI DESC  ");
										while ($r = mysqli_fetch_array($tp)) {
										?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo date("d - M - Y", strtotime($r['TANGGAL_TRANSAKSI']))?></td>
												<td><?php echo $r['NAMA_PELANGGAN']; ?></td>
												<td><?php echo $r['NAMA_LAYANAN']; ?></td>
												<td><?php echo $r['BERAT_TRANSAKSI']; ?> Kg</td>
												<td>Rp. <?php echo $r['TOTAL_TRANSAKSI']; ?></td>
												<td style="align-items: center">
													
													<a href="struk_transaksi.php?id=<?php echo $r['ID_TRANSAKSI']; ?>"> CETAK </a>
													<a href="edit_transaksi.php?id=<?php echo $r['ID_TRANSAKSI']; ?>"><img src="edit.png"> </a>
													<a href="hapus_transaksi.php?id=<?php echo $r['ID_TRANSAKSI']; ?>" onclick="return confirm('Yakin Hapus?')""><img src="delete.png"> </a>
												</td>
											</tr>
											<?php $i = $i + 1; ?>
										<?php } 
										if (!$tp) {
    printf("Error: %s\n", mysqli_error($koneksi));
    exit();
}?>
									</tbody>
								</table>
							</div><!-- /.box-body -->
						</div><!-- /.box -->
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>


</div>
</body>

</html>