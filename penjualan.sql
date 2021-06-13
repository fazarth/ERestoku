-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2018 pada 06.30
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tezza Fazar Tri Hidayat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `nomor_meja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `nomor_meja`) VALUES
(1, 'Meja 1'),
(2, 'Meja 2'),
(3, 'Meja 3'),
(4, 'Meja 4'),
(5, 'Meja 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Demak', 20000),
(2, 'Cirebon', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'reval@zarth.com', 'reval', 'Revaldi Adha', '081222297568'),
(2, 'whina@zarth.com', 'whina', 'Whina Jasmine', '081222297568');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_meja`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 0, '2018-05-02', 100000),
(2, 0, '2018-05-01', 120000),
(3, 0, '2018-05-15', 45000),
(4, 0, '2018-05-15', 45000),
(5, 0, '2018-05-15', 45000),
(6, 0, '2018-05-15', 50000),
(7, 0, '2018-05-15', 45000),
(8, 0, '2018-05-15', 45000),
(9, 0, '2018-05-15', 95000),
(10, 0, '2018-05-15', 90000),
(11, 0, '2018-05-15', 90000),
(12, 0, '2018-05-15', 90000),
(13, 0, '2018-05-15', 90000),
(14, 0, '2018-05-15', 90000),
(15, 0, '2018-05-15', 90000),
(16, 0, '2018-05-15', 90000),
(17, 0, '2018-05-15', 90000),
(18, 0, '2018-05-15', 80000),
(19, 0, '2018-05-15', 75000),
(20, 0, '2018-05-15', 70000),
(21, 0, '2018-05-16', 70000),
(22, 0, '2018-05-16', 50000),
(23, 0, '2018-05-16', 45000),
(24, 0, '2018-05-16', 45000),
(25, 0, '2018-05-16', 0),
(26, 0, '2018-05-16', 0),
(27, 0, '2018-05-16', 70000),
(28, 1, '2018-05-01', 200000),
(29, 2, '2018-05-15', 120000),
(30, 0, '2018-05-16', 60000),
(31, 0, '2018-05-16', 45000),
(32, 0, '2018-05-17', 30000),
(33, 0, '2018-05-17', 45000),
(34, 0, '2018-05-17', 30000),
(35, 0, '2018-05-17', 15000),
(36, 0, '2018-05-17', 30000),
(37, 0, '2018-05-17', 45000),
(38, 0, '2018-05-17', 25000),
(39, 0, '2018-05-17', 65000),
(40, 0, '2018-05-17', 45000),
(41, 0, '2018-05-17', 25000),
(42, 0, '2018-05-17', 30000),
(43, 0, '2018-05-17', 30000),
(44, 0, '2018-05-17', 0),
(45, 0, '2018-05-17', 15000),
(46, 0, '2018-05-17', 55000),
(47, 0, '2018-05-17', 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 18, 7, 1),
(4, 18, 12, 1),
(5, 18, 10, 1),
(6, 19, 7, 1),
(7, 19, 12, 1),
(8, 19, 10, 1),
(9, 20, 7, 1),
(10, 20, 8, 1),
(11, 21, 10, 1),
(12, 21, 12, 2),
(13, 0, 7, 1),
(14, 0, 7, 1),
(15, 0, 12, 1),
(16, 0, 7, 1),
(17, 22, 9, 1),
(18, 23, 7, 1),
(19, 24, 8, 1),
(20, 0, 9, 1),
(21, 0, 9, 1),
(22, 37, 0, 1),
(23, 37, 0, 2),
(24, 38, 0, 1),
(25, 39, 13, 1),
(26, 39, 7, 2),
(27, 40, 12, 1),
(28, 40, 16, 2),
(29, 41, 7, 1),
(30, 42, 9, 1),
(31, 43, 14, 1),
(32, 43, 12, 1),
(33, 45, 10, 1),
(34, 46, 7, 1),
(35, 46, 12, 1),
(36, 46, 16, 1),
(37, 47, 14, 1),
(38, 47, 12, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(9, 'Sop Kambing Sedap', 30000, 19, 'photo_1.jpg', ''),
(10, 'Bakso', 15000, 100, 'images.jpg', ''),
(12, 'Mie Ayam', 15000, 100, '15-mie-ayam-bakso.jpg', ''),
(13, 'Milkshake Melon', 15000, 100, 'photo_9.jpg', 'Segar'),
(14, 'Jus Jeruk', 15000, 70, 'Jus Jeruk.jpg', ''),
(15, 'Melon Squash', 15000, 100, 'melon squash.png', ''),
(16, 'Lemon Squash Manis Asem', 15000, 102, 'midori-lemon+squash.jpg', ''),
(17, 'Cendol', 20000, 99, 'jus-strawberry-susu.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
