<?php
$koneksi = mysqli_connect("localhost", "id17053507_root", "O|H[Ot5Rpx98e\U/", "id17053507_laundry");

// memeriksa koneksi
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
