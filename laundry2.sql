-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2021 pada 19.41
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `ID_LAYANAN` int(11) NOT NULL,
  `NAMA_LAYANAN` varchar(50) DEFAULT NULL,
  `HARGA_LAYANAN` int(11) DEFAULT NULL,
  `STATUS_LAYANAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`ID_LAYANAN`, `NAMA_LAYANAN`, `HARGA_LAYANAN`, `STATUS_LAYANAN`) VALUES
(2, 'Setrika', 8000, 'Tersedia'),
(3, 'Cuci Kering (Pakaian)', 7000, 'Tersedia'),
(4, 'Cuci Basah (Pakaian)', 6000, 'Tersedia'),
(5, 'Cuci Setrika (Pakaian)', 10000, 'Tersedia'),
(6, 'Sprei', 15000, 'Tersedia'),
(7, 'Selimut', 15000, 'Tersedia'),
(8, 'Bed Cover', 25000, 'Tersedia'),
(9, 'Boneka', 20000, 'Tidak Tersedia'),
(10, 'Gordyn', 15000, 'Tidak Tersedia'),
(11, 'Karpet', 25000, 'Tidak Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` int(11) NOT NULL,
  `NAMA_PELANGGAN` varchar(50) DEFAULT NULL,
  `ALAMAT_PELANGGAN` varchar(50) DEFAULT NULL,
  `JK_PELANGGAN` varchar(15) DEFAULT NULL,
  `TELP_PELANGGAN` varchar(15) NOT NULL,
  `PEKERJAAN_PELANGGAN` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT_PELANGGAN`, `JK_PELANGGAN`, `TELP_PELANGGAN`, `PEKERJAAN_PELANGGAN`) VALUES
(1, 'Budi', 'Sidoarjo', 'Laki-laki', '085723456121', 'Dosen'),
(2, 'Lani', 'Surabaya', 'Perempuan', '081234567890', 'Ibu Rumah Tangga'),
(3, 'Rizka', 'Sidoarjo', 'Perempuan', '085732165498', 'Karyawan Swasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_PELANGGAN` int(11) DEFAULT NULL,
  `ID_LAYANAN` int(11) DEFAULT NULL,
  `TANGGAL_TRANSAKSI` datetime DEFAULT NULL,
  `BERAT_TRANSAKSI` int(11) DEFAULT NULL,
  `TOTAL_TRANSAKSI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_PELANGGAN`, `ID_LAYANAN`, `TANGGAL_TRANSAKSI`, `BERAT_TRANSAKSI`, `TOTAL_TRANSAKSI`) VALUES
(1, 1, 2, '2021-06-08 00:00:00', 3, 24000),
(4, 2, 5, '2021-06-12 00:00:00', 4, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(50) DEFAULT NULL,
  `USERNAME_USER` varchar(50) DEFAULT NULL,
  `PASSWORD_USER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `USERNAME_USER`, `PASSWORD_USER`) VALUES
(1, 'ferry', 'ferry', 'ferry'),
(2, 'anisa', 'anisa', 'anisa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`ID_LAYANAN`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `FK_MEMILIKI` (`ID_PELANGGAN`),
  ADD KEY `FK_MENGGUNAKAN` (`ID_LAYANAN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `ID_LAYANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID_PELANGGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
