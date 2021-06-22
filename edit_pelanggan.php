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
    <title>Edit Pelanggan</title>
    <style>
        .content {
            padding: 5%;
            height: 95%;
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

        data {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 17px;
            font-weight: 500;
        }

        .table1 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            border: none;
            border-collapse: collapse;
            width: 100%;
            height: 80%
        }

        .table1 tr th {
            background: #35A9DB;
            font-weight: 700;
        }

        .table1,
        th,
        td {
            padding: 1% 1%;
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
                <h1><b>Edit Data Pelanggan</b></h1>
                <hr>
                <table width="auto" border="0" cellpadding="2" cellspacing="1">

                    <?php
                    include 'koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "select * from pelanggan where ID_PELANGGAN='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <form method="post" action="update_pelanggan.php"><data>
                                <table class="table1">
                                    <tbody>
                                        <tr>
                                            <td><data>Nama</data></td>
                                            <td><data>
                                                    <input type="hidden" name="id" value="<?php echo $d['ID_PELANGGAN']; ?>">
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $d['NAMA_PELANGGAN']; ?>">
                                                </data></td>
                                        </tr>
                                        <tr>
                                            <td><data>Alamat</data></td>
                                            <td><data>
                                                    <textarea type="textarea" name="alamat" class="form-control" style="resize: none;"><?php echo $d['ALAMAT_PELANGGAN']; ?></textarea>
                                                </data></td>
                                        </tr>
                                        <tr>
                                            <td><data>Jenis Kelamin</data></td>
                                            <td>
                                                <input type="radio" name="jeniskelamin" value="Laki-laki" <?php if ($d['JK_PELANGGAN'] == 'Laki-laki') echo 'checked' ?>> Laki-laki<br>
                                                <input type="radio" name="jeniskelamin" value="Perempuan" <?php if ($d['JK_PELANGGAN'] == 'Perempuan') echo 'checked' ?>> Perempuan<br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><data>Telp</data></td>
                                            <td><data>
                                                    <input type="text" class="form-control" name="telp" value="<?php echo $d['TELP_PELANGGAN']; ?>">
                                                </data></td>
                                        </tr>
                                        <tr>
                                            <td><data>Pekerjaan</data></td>
                                            <td><data>
                                                    <input type="text" class="form-control" name="pekerjaan" value="<?php echo $d['PEKERJAAN_PELANGGAN']; ?>">
                                                </data></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center"><a type="button" href="halaman_pegawai_pelanggan.php" class="batal btn btn-danger btn-sm">BATAL</a></td>
                                            <td style="text-align: center"><input type="submit" value="SIMPAN" class="simpan btn btn-success btn-sm"></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </data></form>
                    <?php
                    }
                    ?>
                    </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap.min.js."></script>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>


</div>
</body>

</html>