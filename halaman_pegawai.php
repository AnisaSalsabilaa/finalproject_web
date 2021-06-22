<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
	<link rel="stylesheet" type="text/css" href="sidebar.css">
	<link rel="icon" href="logo_1.png">
	<script src="bootstrap.min.js"></script>
	<script src="jquery-1.11.1.min.js"></script>
	<title>Home</title>
	<script>
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =
				h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i
			}; // add zero in front of numbers < 10
			return i;
		}
	</script>
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

		.info.light.bordered {
			border: none;
		}

		.info.light {
			padding: 12px 20px 15px;
			background-color: #fff;
		}

		.info.bordered {
			border-left: none;
		}

		.info {
			margin-top: 0;
			margin-bottom: 25px;
		}

		h1 {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: #2aa7e2;
			font-weight: 900;
		}

		h3 {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: black;
			font-weight: 900;
		}

		h4 {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: black;
			font-weight: 900;
			text-align: center;
		}

		b {
			text-transform: uppercase;
		}

		a {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			color: black;
			font-size: 23px;
			font-weight: 500;
		}

		data {
			font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
			font-size: 17px;
			font-weight: 500;
		}
	</style>

</head>

<body onload="startTime()">
	<?php
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if ($_SESSION['level'] == "") {
		header("location:index.php?pesan=gagal");
	}

	?>

	<div class="navigasi">
		<a href="halaman_pegawai.php">Home</a>
		<a href="halaman_pegawai_pelanggan.php">Pelanggan</a>
		<a href="halaman_pegawai_layanan.php">Layanan</a>
		<a href="transaksi.php">Transaksi</a>
		<a href="halaman_pegawai_laporan.php">Laporan</a>

	</div>
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="account.png" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle"><data>
							<div class="profile-usertitle-name"><b>
									<?php echo $_SESSION['username']; ?> </b></div>
							<div class="profile-usertitle-job">
								<?php echo $_SESSION['level']; ?> </div>
						</data></div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">
						<a type="button" href="edit_profil.php" class="btn btn-success btn-sm">Edit</a>
						<a href="logout.php" type="button" onclick="return confirm('ANDA YAKIN AKAN KELUAR ...')" class="btn btn-danger btn-sm">logout</a>
					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<span class="profile-desc-text"> &nbsp; </span>
					<!-- END MENU -->

					<div class="info light bordered"><data>
							<!-- STAT -->
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
						</data></div>
				</div>
				<!-- END STAT -->
				<div>
					<h4 class="profile-desc-title">Informasi Waktu</h4>
					<data><span class="profile-desc-text">
							<?php date_default_timezone_set('Asia/Jakarta');
							echo date('l, d-M-Y'); ?>
						</span></data>
					<div id="txt" class="profile-desc-title">23:32:36</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Page Content -->
	<div id="page-content-wrapper">
	</div>
	<div class="col">
		<div class="content">
			<h3>Selamat Datang</h3>
			<hr>
			<?php
			include 'koneksi.php';
			?>
			<p align="left">
				<data>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</data>
				<br>
				<br>
				<marquee direction="left">   <img src="logo_1.png">   <img src="logo_1.png">   <img src="logo_1.png"></marquee>
		</div>
	</div>
	</div>
	<script type="text/javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>


	</div>
</body>

</html>