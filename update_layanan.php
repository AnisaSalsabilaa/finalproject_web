<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$status = $_POST['status'];

// update data ke database
mysqli_query($koneksi,"update layanan set NAMA_LAYANAN='$jenis', HARGA_LAYANAN='$harga', STATUS_LAYANAN='$status' where ID_LAYANAN='$id'");

// mengalihkan halaman kembali
header("location:halaman_pegawai_layanan.php");

?>