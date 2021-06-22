<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from pelanggan where ID_PELANGGAN='$id'");

// mengalihkan halaman kembali
header("location:halaman_pegawai_pelanggan.php");

?>