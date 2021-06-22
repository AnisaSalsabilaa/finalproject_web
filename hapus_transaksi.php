<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from transaksi where ID_TRANSAKSI ='$id'");

// mengalihkan halaman kembali
header("location:transaksi.php");

?>