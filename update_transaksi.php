<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$tp = mysqli_query($koneksi, "SELECT * FROM layanan  WHERE ID_LAYANAN = '".$_POST['layanan']."'");
while ($r = mysqli_fetch_array($tp)) {
	$harga = $r['HARGA_LAYANAN']
?>
<?php } 
$id             = $_POST['id'];
$tanggal        = $_POST['tanggal'];
$pelanggan      = $_POST['pelanggan'];
$layanan        = $_POST['layanan'];
$berat          = $_POST['berat'];
$total			= $_POST['berat'] * $harga;

// update data ke database
mysqli_query($koneksi, "update transaksi set ID_PELANGGAN='$pelanggan', ID_LAYANAN='$layanan', TANGGAL_TRANSAKSI='$tanggal', BERAT_TRANSAKSI='$berat', TOTAL_TRANSAKSI='$total' where ID_TRANSAKSI='$id'");

// mengalihkan halaman kembali
header("location:transaksi.php");
