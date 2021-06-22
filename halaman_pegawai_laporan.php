<?php include 'koneksi.php'; ?>
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
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <title>Laporan</title>
    <style>
        .content {
            padding: 5%;
            height: 95%;
            background: #fff;
            min-height: 100%;
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

        a {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 23px;
            font-weight: 500;
        }

        d {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-decoration: underline;
            text-align: right;
            font-size: 18px;
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

        .cetak {
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
                <h1><b>Grafik Laporan</b></h1>
                <hr>
                <h3>Grafik Data Pelanggan <a href="halaman_pegawai_pelanggan.php" style="text-align: right">
                        <d>lihat detail</d>
                    </a></h3>

                <div style="width: 90%;margin: 0% auto;">
                    <canvas id="jkpelanggan"></canvas>
                </div>
                <script>
                    var ctx = document.getElementById("jkpelanggan").getContext('2d');
                    var jkpelanggan = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["Laki-laki", "Perempuan"],
                            datasets: [{
                                label: '',
                                data: [
                                    <?php
                                    $jumlah_laki = mysqli_query($koneksi, "select * from pelanggan where JK_PELANGGAN='Laki-laki'");
                                    echo mysqli_num_rows($jumlah_laki);
                                    ?>,
                                    <?php
                                    $jumlah_perempuan = mysqli_query($koneksi, "select * from pelanggan where JK_PELANGGAN='Perempuan'");
                                    echo mysqli_num_rows($jumlah_perempuan);
                                    ?>
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 99, 132, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255,99,132,1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script><br><br>
                <div>
                    <a type="button" href="laporan_pelanggan.php" style="align-self: center; text-align: center" class="cetak btn btn-success btn-sm">CETAK DATA PELANGGAN</a><br><br>
                </div>

                <h3>Grafik Data Layanan <a href="halaman_pegawai_layanan.php" style="text-align: right">
                        <d>lihat detail</d>
                    </a></h3>

                <div style="width: 90%;margin: 0% auto;">
                    <canvas id="statlayanan"></canvas>
                </div>
                <script>
                    var ctx = document.getElementById("statlayanan").getContext('2d');
                    var statlayanan = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["Tersedia", "Tidak Tersedia"],
                            datasets: [{
                                label: '',
                                data: [
                                    <?php
                                    $jumlah_laki = mysqli_query($koneksi, "select * from layanan where STATUS_LAYANAN='Tersedia'");
                                    echo mysqli_num_rows($jumlah_laki);
                                    ?>,
                                    <?php
                                    $jumlah_perempuan = mysqli_query($koneksi, "select * from layanan where STATUS_LAYANAN='Tidak Tersedia'");
                                    echo mysqli_num_rows($jumlah_perempuan);
                                    ?>
                                ],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 99, 132, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255,99,132,1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script><br><br>
                <div>
                    <a type="button" href="laporan_layanan.php" style="align-self: center; text-align: center" class="cetak btn btn-success btn-sm">CETAK DATA LAYANAN</a><br><br>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap.min.js."></script>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>


</div>
</body>

</html>