-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 13 Feb 2017 pada 11.12
-- Versi Server: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mlggadget`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(2) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nasabah` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nasabah`) VALUES
(5, 'BCA', '0889037332', 'WIKAN ABDILLAH'),
(6, 'BNI ', '088387123', 'WIKAN ABDILLAH'),
(7, 'Mandiri', '9009763278383', 'WIKAN ABDILLAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kd_cus` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kd_cus`, `nama`, `alamat`, `no_telp`, `username`, `password`, `gambar`) VALUES
('000001', 'Wikan Abdillah', 'malang', '085694984803', 'wikan', 'wikan', '../admin/gambar_customer/1.jpg'),
('000002', 'khisan', 'pwd', '056987451232', 'khisan', 'khisan', '../admin/gambar_customer/8.jpg'),
('000003', 'anonim', 'anonim', '0888888888', 'anonim', 'anonim', '../admin/gambar_customer/4.gif'),
('000004', 'halim aruman', 'purwosari', '0888888888', 'halim', 'halim', '../admin/gambar_customer/4.gif'),
('000005', 'ahskjdhkjah', 'khkjahskdhkj', 'hkjahsjkdhkah', 'khkashdkahsdk', 'hkjahskdjhakshd', ''),
('000006', 'wildan48', 'purwosadi', '0888888888', 'wildan48', 'wildan48', ''),
('000007', 'guest123', 'guest123', '0888888888', 'guest123', 'guest123', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(10) NOT NULL,
  `kd_cus` varchar(15) NOT NULL,
  `bayar_via` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status` enum('Bayar','Belum') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `tanggal`, `jumlah`, `bukti_transfer`, `status`) VALUES
(4, '000001', '000001', '0', '2016-02-25', 0, '0', 'Bayar'),
(5, '000002', '000002', 'Mandiri', '2016-02-25', 120000, '../admin/bukti_transfer/9.jpg', 'Bayar'),
(6, '000003', '000003', '0', '2016-11-24', 0, '0', 'Belum'),
(7, '000004', '000004', 'Mandiri', '2017-01-11', 10, '../admin/bukti_transfer/Tulips.jpg', 'Bayar'),
(8, '000006', '000006', '0', '2017-01-11', 0, '0', 'Belum'),
(9, '000007', '000007', '0', '2017-01-11', 0, '0', 'Belum'),
(10, '000007', '000007', '0', '2017-01-11', 0, '0', 'Belum'),
(11, '000007', '000007', '0', '2017-01-11', 0, '0', 'Belum'),
(12, '000007', '000007', '0', '2017-01-11', 0, '0', 'Belum'),
(13, '000007', '000007', '0', '2017-01-11', 0, '0', 'Belum'),
(14, '000007', '000007', '0', '2017-01-12', 0, '0', 'Belum'),
(15, '000008', '000008', '0', '2017-01-12', 0, '0', 'Belum'),
(16, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(17, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(18, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(19, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(20, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(21, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(22, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(23, '000009', '000009', '0', '2017-01-26', 0, '0', 'Belum'),
(24, '000010', '000010', '0', '2017-01-26', 0, '0', 'Belum'),
(25, '000010', '000010', '0', '2017-01-26', 0, '0', 'Belum'),
(26, '000011', '000011', '0', '2017-01-26', 0, '0', 'Belum'),
(27, '000011', '000011', '0', '2017-01-26', 0, '0', 'Belum'),
(28, '000011', '000011', '0', '2017-01-27', 0, '0', 'Belum'),
(29, '000012', '000012', '0', '2017-01-27', 0, '0', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `nopo` varchar(10) NOT NULL,
  `style` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(4) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `tanggalexport` date NOT NULL,
  `status` enum('Proses','Selesai','Terkirim','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(10) NOT NULL,
  `kd_cus` varchar(10) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `style` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `size` varchar(4) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `style`, `color`, `size`, `qty`, `total`) VALUES
(35, '000001', '000001', 2, '2016-02-25', '0', '0', '0', 2, 200000),
(36, '000002', '000002', 2, '2016-02-25', '0', '0', '0', 2, 200000),
(37, '000003', '000003', 3, '2016-11-24', '0', '0', '0', 3, 300000),
(38, '000004', '000004', 3, '2017-01-11', '0', '0', '0', 3, 300000),
(39, '000004', '000004', 0, '2017-01-11', '0', '0', '0', 5, 0),
(40, '000004', '000004', 0, '2017-01-11', '0', '0', '0', 3, 0),
(41, '000007', '000007', 1, '2017-01-12', '0', '0', '0', 1, 0),
(42, '000008', '000008', 1, '2017-01-12', '0', '0', '0', 1, 0),
(43, '000009', '000009', 1, '2017-01-26', '0', '0', '0', 1, 0),
(44, '000010', '000010', 1, '2017-01-26', '0', '0', '0', 1, 0),
(45, '000011', '000011', 2, '2017-01-27', '0', '0', '0', 2, 0),
(46, '000012', '000012', 2, '2017-01-27', '0', '0', '0', 2, 0),
(47, '000012', '000012', 0, '2017-01-27', '0', '0', '0', 2, 0),
(48, '000012', '000012', 0, '2017-01-27', '0', '0', '0', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `jenis`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(10, 'Iphone 4s', 'Handphone', 120000000, 'second', 1, 'gambar_produk/DSC_8559.JPG'),
(11, 'Iphone 5', 'Handphone', 1800000, 'second', 2, 'gambar_produk/DSC_8572.JPG'),
(12, 'Iphone 5s', 'Handphone', 2600000, 'second', 2, 'gambar_produk/DSC_8572.JPG'),
(13, 'Samsung Galaxy Note 3', 'Handphone', 1800000, 'second', 2, 'gambar_produk/DSC_8559.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
('', 'user', 'user', 'user', 'gambar_admin/8.jpg'),
('U001', 'admin', 'admin', 'Administrators', 'gambar_admin/4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indexes for table `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;