<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from user where USERNAME_USER='$username' and PASSWORD_USER='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Pegawai";
		// alihkan ke halaman dashboard admin
		header("location:halaman_pegawai.php");

} else {
	header("location:index.php?pesan=gagal");
}
