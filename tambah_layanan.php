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
    <title>Tambah Layanan</title>
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
                <h1><b>Tambah Layanan Baru</b></h1>
                <hr>
                <table width="700" border="0" cellpadding="2" cellspacing="1">
                    <?php
                    include 'koneksi.php';
                    if (isset($_POST['jenis'])) {
                        $jenis        = $_POST['jenis'];
                        $harga        = $_POST['harga'];
                        $status        = $_POST['status'];

                        $input = mysqli_query($koneksi, "INSERT INTO layanan VALUES('', '$jenis','$harga', '$status')");
                        if ($input) {

                            echo '<div class="alert alert-success alert-dismissable">
                                <button type="input" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah layanan Berhasil!</b></h4>';        //Pesan jika proses tambah sukses
                            echo '
		============================<Br>
		<data><b>Info layanan</b><br>
		Jenis Layanan : <b>' . $jenis . '</b><br>
		Harga/Kg : <b>' . $harga . '</b><br>
		Status : <b>' . $status . '</b><br></data>
		</div>
		
		';
                        } else {

                            echo 'Gagal menambahkan data! ';
                            echo '<a href="tambah_layanan.php">Kembali</a>';
                        }
                    }
                    ?>
                    <form method="post"><data>

                            <div class="form-group">
                                <label><data>Jenis Layanan</data></label>
                                <input type="text" class="form-control" name="jenis" placeholder="Masukan Jenis layanan" required>
                            </div>
                            <div class="form-group">
                                <label><data>Harga/Kg</data></label>
                                <input type="number" class="form-control" name="harga" placeholder="Masukan Harga layanan" required>
                            </div>
                            <div class="form-group">
                                <label><data>Status</data></label>
                                <select class="form-control" name="status" required>
                                    <option value>Masukan Status layanan</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                            <br>
                            <div style="text-align: center">
                                <button type="submit" class="simpan btn btn-success btn-sm">SIMPAN</button>
                                <a type="button" href="halaman_pegawai_layanan.php" class="batal btn btn-danger btn-sm">BATAL</a>
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