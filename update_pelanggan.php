<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jeniskelamin = $_POST['jeniskelamin'];
$telp = $_POST['telp'];
$pekerjaan = $_POST['pekerjaan'];

// update data ke database
mysqli_query($koneksi, "update pelanggan set NAMA_PELANGGAN='$nama', ALAMAT_PELANGGAN='$alamat', JK_PELANGGAN='$jeniskelamin', TELP_PELANGGAN='$telp', PEKERJAAN_PELANGGAN='$pekerjaan' where ID_PELANGGAN='$id'");

// mengalihkan halaman kembali
header("location:halaman_pegawai_pelanggan.php");
