-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2022 pada 15.52
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id_histori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Balikpapan', 50000),
(2, 'Loa Janan', 20000),
(3, 'Tenggarong', 35000),
(4, 'Muara Jawa', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_user`, `id_produk`, `id_ongkir`, `jumlah`, `tanggal`, `harga`) VALUES
(1, 1, 1, 2, 4, '2022-11-02', 2500000),
(4, 1, 4, 2, 1, '0000-00-00', 12520000),
(5, 3, 5, 4, 1, '0000-00-00', 6570000),
(6, 1, 3, 1, 2, '2022-11-07', 10050000),
(7, 7, 1, 3, 1, '2022-11-07', 12535000),
(8, 1, 2, 1, 2, '2022-11-08', 4050000),
(9, 8, 5, 4, 2, '2022-11-08', 5070000),
(10, 9, 6, 2, 2, '2022-11-08', 8020000),
(11, 1, 2, 4, 2, '2022-11-08', 17070000),
(15, 8, 2, 3, 2, '2022-11-08', 10035000),
(16, 8, 3, 1, 1, '2022-11-08', 2050000),
(17, 1, 2, 3, 1, '2022-11-08', 5035000),
(18, 7, 2, 2, 5, '2022-11-11', 19020000),
(20, 1, 2, 2, 1, '2022-11-11', 5020000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `stok` varchar(11) NOT NULL,
  `desk` text NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `gambar`, `nama`, `harga`, `stok`, `desk`, `kategori`) VALUES
(1, 'bmx.png', 'sepeda', '2500000', '5', 'Perbaikan', 'Bmx'),
(2, 'bmx.png', 'sepeda', '5000000', '4', 'Tahan dan kuat', 'Bmx'),
(3, 'fixie-polygon.png', 'sepeda', '2000000', '2', 'Keren Pol', 'Fixied-Gear'),
(4, 'polygon.png', 'Sepeda', '1500000', '6', 'Roadbike', 'Cervelo'),
(5, 'brompton.png', 'Sepeda', '3500000', '2', 'Sepeda Gunung', 'Wimcycle'),
(6, 'fixie-polygon.png', 'Sepeda', '4500000', '5', 'Fwd Bike', 'Fixied-Gear');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `psw`, `email`, `tgl`) VALUES
(1, 'adhan', '9d9bbe2d940c060751e74b44b686ec64', 'adhanslv@gmail.com', '11-11-2002'),
(2, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '09-09-2021'),
(3, 'aura', '702f510e28d105b5f33f88e616e1b361', 'aurazifa@gmail.com', '06/11/2022'),
(7, 'joji', 'b88fdc66c35c703f16d31c6941cee414', 'joji@gmail.com', '07/11/2022'),
(8, 'salazar', '2a07e3ff3df21b226d0cd044d4a7cc83', 'salazar@gmail.com', '08/11/2022'),
(9, 'zobari', '2a07e3ff3df21b226d0cd044d4a7cc83', 'zobari@gmail.com', '08/11/2022');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ongkir` (`id_ongkir`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD CONSTRAINT `tb_histori_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_histori_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`id_ongkir`) REFERENCES `tb_ongkir` (`id_ongkir`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
