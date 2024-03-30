-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2024 pada 15.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_perusahaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `name`, `username`, `email`, `password`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', '$2y$10$oa5JzeaWLygRQXyL5zk2peaxjFWvMH7ovNkugaxvItbau05ilLzAu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jenis_ongkir` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `produk` varchar(255) NOT NULL,
  `metode_beli` varchar(255) NOT NULL,
  `total_bayar` int(100) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama_persediaan` varchar(255) NOT NULL,
  `jumlah_masuk` int(255) NOT NULL,
  `jumlah_keluar` int(255) NOT NULL,
  `stok` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id`, `tanggal`, `jenis`, `nama_persediaan`, `jumlah_masuk`, `jumlah_keluar`, `stok`) VALUES
(3, '2024-03-27', 'Padat', 'Batu', 12, 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `produk_terjual` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `tanggal`, `nama_produk`, `harga`, `stok`, `produk_terjual`, `deskripsi`, `foto`) VALUES
(3, '2024-03-28', 'Shampoo', 10000, 164, 1, '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL,
  `produk_id` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bahan_id` int(100) NOT NULL,
  `jumlah_bahan` int(100) NOT NULL,
  `jumlah_produksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id`, `produk_id`, `tanggal`, `bahan_id`, `jumlah_bahan`, `jumlah_produksi`) VALUES
(10, 3, '2024-03-29', 3, 15, 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
