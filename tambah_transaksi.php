<?php
include 'koneksi.php';
?>
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
    <title>Tambah Transaksi</title>
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
                <h1><b>Tambah Transaksi Baru</b></h1>
                <hr>
                <table width="700" border="0" cellpadding="2" cellspacing="1">
                    <?php

                    if (isset($_POST['tanggal'])) {
                    $hasil = mysqli_query($koneksi, "SELECT * FROM layanan WHERE `ID_LAYANAN` = '".$_POST['layanan']."'");
                    while ($hasil1 = mysqli_fetch_array($hasil)) {
                    $harga = $hasil1['HARGA_LAYANAN'];
                    $nama_layanan  = $hasil1['NAMA_LAYANAN'];
                    }
                    $hasil_nama = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE `ID_PELANGGAN` = '".$_POST['pelanggan']."'");
                    while ($hasil2 = mysqli_fetch_array($hasil_nama)) {
                    $nama_pelanggan  = $hasil2['NAMA_PELANGGAN'];

                    }
                        $tanggal        = $_POST['tanggal'];
                        $pelanggan      = $_POST['pelanggan'];
                        $layanan        = $_POST['layanan'];
                        $berat          = $_POST['berat'];
                        $total          = $_POST['berat'] * $harga;


                        $input = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('', '$pelanggan','$layanan', '$tanggal', '$berat','$total')");
                        if ($input) {

                            echo '<div class="alert alert-success alert-dismissable">
                                <button type="input" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah transaksi Berhasil!</b></h4>';        //Pesan jika proses tambah sukses
                            echo '
		                        ============================<Br>
		                        <data><b>Info layanan</b><br>
		                        Tanggal Transaksi : <b>' . $tanggal . '</b><br>
                                Pelanggan : <b>' . $nama_pelanggan . '</b><br>
                                Jenis Layanan : <b>' . $nama_layanan . '</b><br>
                                Berat : <b>' . $berat . ' Kg</b><br>
                                Total Harga : Rp. <b>' . $total . ' Kg</b><br></data>
		                        </div>
		                        ';
                        } else {

                            echo 'Gagal menambahkan data! ' . mysqli_error($koneksi);
                            echo '<a href="tambah_transaksi.php">Kembali</a>';
                        }
                    }
                    ?>
                    <form method="post"><data>

                            <div class="form-group">
                                <label><data>Tanggal</data></label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Masukan Tanggal Transaksi" required>
                            </div>
                            <div class="form-group">
                                <label><data>Nama Pelanggan</data></label>
                                <select class="form-control" name="pelanggan" required>
                                    <option value>Masukan Nama Pelanggan</option>
                                    <?php
                                    $tp = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY NAMA_PELANGGAN ASC");
                                    while ($r = mysqli_fetch_array($tp)) {
                                    ?>
                                        <option value="<?php echo $r['ID_PELANGGAN']; ?>"><?php echo $r['NAMA_PELANGGAN']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><data>Layanan</data></label>
                                <select class="form-control" name="layanan" required>
                                    <option value>Masukan Jenis Layanan</option>
                                    <?php
                                    $tp = mysqli_query($koneksi, "SELECT * FROM layanan WHERE `STATUS_LAYANAN` =       'Tersedia' ORDER BY NAMA_LAYANAN ASC");
                                    while ($r = mysqli_fetch_array($tp)) {
                                    ?>
                                        <option value="<?php echo $r['ID_LAYANAN']; ?>"><?php echo $r['NAMA_LAYANAN']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><data>Berat Cucian</data></label>
                                <input type="number" class="form-control" name="berat" placeholder="Masukan Berat Cucian" required>
                            </div>
                            <br> 
                            <div style="text-align: center">
                                <button type="submit" class="simpan btn btn-success btn-sm">SIMPAN</button>
                                <a type="button" href="transaksi.php" class="batal btn btn-danger btn-sm">BATAL</a>
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