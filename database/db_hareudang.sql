-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Des 2021 pada 04.24
-- Versi server: 5.7.24
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hareudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `qty`) VALUES
(1, 'INV0001', 'PROD005', 1),
(2, 'INV0001', 'PROD001', 1),
(3, 'INV0001', 'PROD003', 1),
(4, 'INV0002', 'PROD009', 1),
(5, 'INV0002', 'PROD015', 1),
(6, 'INV0002', 'PROD012', 1),
(7, 'INV0003', 'PROD004', 1),
(8, 'INV0004', 'PROD004', 1),
(9, 'INV0005', 'PROD004', 1),
(10, 'INV0006', 'PROD009', 1),
(11, 'INV0007', 'PROD004', 2),
(12, 'INV0008', 'PROD009', 2),
(13, 'INV0008', 'PROD004', 1),
(14, 'INV0009', 'PROD009', 1),
(15, 'INV0010', 'PROD004', 2),
(16, 'INV0011', 'PROD004', 1),
(17, 'INV0012', 'PROD004', 2),
(18, 'INV0013', 'PROD001', 1),
(19, 'INV0014', 'PROD005', 1),
(20, 'INV0015', 'PROD002', 1),
(21, 'INV0015', 'PROD008', 1),
(22, 'INV0016', 'PROD007', 1),
(23, 'INV0017', 'PROD009', 2),
(24, 'INV0018', 'PROD004', 1),
(25, 'INV0019', 'PROD004', 1),
(26, 'INV0020', 'PROD004', 1),
(27, 'INV0021', 'PROD004', 2),
(28, 'INV0022', 'PROD004', 1),
(29, 'INV0023', 'PROD009', 1),
(30, 'INV0023', 'PROD015', 1),
(31, 'INV0024', 'PROD002', 3),
(32, 'INV0025', 'PROD004', 1),
(33, 'INV0026', 'PROD009', 1),
(34, 'INV0027', 'PROD004', 1),
(35, 'INV0028', 'PROD004', 2),
(36, 'INV0029', 'PROD004', 1),
(37, 'INV0030', 'PROD004', 1),
(38, 'INV0031', 'PROD002', 2),
(39, 'INV0031', 'PROD009', 1),
(40, 'INV0031', 'PROD012', 1),
(41, 'INV0032', 'PROD006', 1),
(42, 'INV0033', 'PROD003', 1),
(43, 'INV0034', 'PROD003', 1),
(44, 'INV0034', 'PROD002', 1),
(45, 'INV0035', 'PROD007', 1),
(46, 'INV0036', 'PROD002', 1),
(47, 'INV0037', 'PROD004', 1),
(48, 'INV0038', 'PROD004', 1),
(49, 'INV0039', 'PROD004', 1),
(51, 'INV0040', 'PROD004', 1),
(52, 'INV0041', 'PROD004', 1),
(53, 'INV0042', 'PROD004', 1),
(54, 'INV0043', 'PROD001', 1),
(55, 'INV0043', 'PROD016', 1),
(56, 'INV0044', 'PROD004', 1),
(57, 'INV0045', 'PROD002', 1),
(58, 'INV0046', 'PROD003', 1),
(59, 'INV0046', 'PROD002', 1),
(60, 'INV0046', 'PROD009', 1),
(61, 'INV0046', 'PROD014', 1),
(62, 'INV0047', 'PROD004', 1),
(63, 'INV0048', 'PROD004', 1),
(64, 'INV0048', 'PROD008', 1),
(65, 'INV0049', 'PROD005', 1),
(66, 'INV0050', 'PROD004', 1),
(67, 'INV0051', 'PROD004', 1),
(68, 'INV0052', 'PROD011', 1),
(69, '0001', 'PROD006', 1),
(70, '0002', 'PROD002', 1),
(71, '0003', 'PROD001', 1),
(72, '0004', 'PROD009', 1),
(73, '0005', 'PROD004', 1),
(74, '0006', 'PROD004', 4),
(75, '0007', 'PROD009', 1),
(76, '0008', 'PROD002', 1),
(77, '0009', 'PROD009', 1),
(78, '0010', 'PROD013', 1),
(79, '0011', 'PROD002', 2),
(80, '0012', 'PROD009', 1),
(81, '0013', 'PROD009', 1),
(82, '0014', 'PROD009', 2),
(83, '0015', 'PROD009', 2),
(84, '0015', 'PROD005', 1),
(85, '0015', 'PROD004', 1),
(86, '0016', 'PROD002', 1),
(87, '0016', 'PROD014', 1),
(88, '0016', 'PROD009', 1),
(89, '0016', 'PROD015', 2),
(90, '0017', 'PROD001', 1),
(91, '0017', 'PROD003', 1),
(92, '0017', 'PROD004', 5),
(93, '0017', 'PROD012', 1),
(94, '0017', 'PROD015', 2),
(98, '0001', 'PROD004', 3),
(99, '0001', 'PROD009', 2),
(100, '0001', 'PROD002', 2),
(101, '0002', 'PROD004', 1),
(102, '0003', 'PROD013', 1),
(105, '0004', 'PROD002', 1),
(106, '0005', 'PROD003', 1),
(107, '0005', 'PROD002', 1),
(108, '0005', 'PROD017', 1),
(109, '0005', 'PROD009', 1),
(110, '0005', 'PROD014', 1),
(111, '0006', 'PROD002', 1),
(112, '0006', 'PROD009', 1),
(113, '0007', 'PROD002', 1),
(114, '0007', 'PROD008', 1),
(115, '0008', 'PROD009', 2),
(116, '0009', 'PROD004', 1),
(117, '0010', 'PROD004', 1),
(118, '0011', 'PROD001', 1),
(119, '0011', 'PROD002', 1),
(120, '0012', 'PROD004', 5),
(121, '0013', 'PROD005', 1),
(122, '0013', 'PROD001', 1),
(123, '0001', 'PROD009', 1),
(124, '0002', 'PROD004', 2),
(125, '0003', 'PROD004', 1),
(126, '0004', 'PROD014', 1),
(127, '0005', 'PROD004', 4),
(128, '0006', 'PROD004', 1),
(129, '0007', 'PROD004', 1),
(130, '0008', 'PROD004', 1),
(131, '0009', 'PROD004', 1),
(132, '0010', 'PROD004', 1),
(133, '0010', 'PROD009', 1),
(134, '0010', 'PROD005', 1),
(135, '0010', 'PROD017', 1),
(136, '0011', 'PROD004', 2),
(137, '0011', 'PROD001', 1),
(138, '0012', 'PROD001', 1),
(139, '0012', 'PROD006', 1),
(140, '0013', 'PROD004', 1),
(141, '0014', 'PROD004', 1),
(142, '0015', 'PROD004', 4),
(143, '0015', 'PROD009', 1),
(144, '0016', 'PROD002', 1),
(145, '0001', 'PROD005', 1),
(146, '0001', 'PROD004', 2),
(147, '0001', 'PROD003', 1),
(148, '0001', 'PROD016', 1),
(149, '0001', 'PROD013', 1),
(150, '0002', 'PROD004', 1),
(151, '0003', 'PROD004', 1),
(152, '0004', 'PROD004', 1),
(153, '0004', 'PROD007', 1),
(154, '0005', 'PROD004', 1),
(155, '0006', 'PROD004', 1),
(156, '0007', 'PROD009', 2),
(157, '0007', 'PROD004', 1),
(158, '0008', 'PROD007', 1),
(159, '0001', 'PROD004', 3),
(160, '0001', 'PROD007', 2),
(161, '0001', 'PROD009', 1),
(162, '0001', 'PROD019', 6),
(163, '0002', 'PROD004', 1),
(164, '0002', 'PROD005', 1),
(165, '0002', 'PROD009', 1),
(166, '0003', 'PROD019', 1),
(167, '0004', 'PROD004', 1),
(168, '0004', 'PROD009', 1),
(169, '0005', 'PROD002', 1),
(170, '0006', 'PROD019', 1),
(171, '0007', 'PROD004', 1),
(172, '0001', 'PROD004', 1),
(173, '0002', 'PROD004', 2),
(174, '0003', 'PROD002', 1),
(177, '0004', 'PROD002', 1),
(178, '0004', 'PROD005', 1),
(179, '0001', 'PROD004', 1),
(180, '0002', 'PROD002', 1),
(181, '0003', 'PROD004', 1),
(182, '0003', 'PROD005', 1),
(183, '0004', 'PROD004', 3),
(184, '0005', 'PROD005', 1),
(185, '0006', 'PROD004', 1),
(186, '0007', 'PROD001', 1),
(187, '0008', 'PROD017', 1),
(188, '0009', 'PROD004', 2),
(189, '0009', 'PROD017', 1),
(190, '0009', 'PROD011', 3),
(191, '0001', 'PROD004', 1),
(192, '0002', 'PROD004', 2),
(193, '0003', 'PROD004', 1),
(194, '0004', 'PROD004', 1),
(195, '0005', 'PROD004', 1),
(196, '0001', 'PROD004', 1),
(197, '0002', 'PROD019', 1),
(198, '0003', 'PROD011', 1),
(199, '0003', 'PROD019', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'minuman'),
(3, 'Topping');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_belanja` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `nama_kasir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pelanggan`, `tanggal`, `total_belanja`, `cash`, `kembalian`, `nama_kasir`) VALUES
('0001', ' ', '2020-08-01 00:00:00', 10000, 10000, 0, 'Lalan'),
('0002', ' ', '2020-08-01 00:00:00', 10000, 10000, 0, 'Lalan'),
('0003', ' ', '2020-08-01 00:00:00', 10000, 10000, 0, 'Lalan'),
('0004', ' ', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0005', ' ', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0006', '', '2020-08-01 00:00:00', 20000, 20000, 0, 'Lalan'),
('0007', '', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0008', '', '2020-08-01 00:00:00', 10000, 10000, 0, 'Lalan'),
('0009', '', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0010', '', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0011', '', '2020-08-01 00:00:00', 20000, 20000, 0, 'Lalan'),
('0012', '', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0013', '', '2020-08-01 00:00:00', 5000, 5000, 0, 'Lalan'),
('0014', '', '2020-08-01 00:00:00', 10000, 10000, 0, 'Lalan'),
('0015', '', '2020-08-01 00:00:00', 25000, 25000, 0, 'Lalan'),
('0016', '', '2020-08-01 00:00:00', 33000, 33000, 0, 'Lalan'),
('0017', '', '2020-08-01 00:00:00', 67000, 67000, 0, 'Lalan'),
('INV0001', 'mayora', '2020-07-31 00:00:00', 30000, 50000, 20000, 'Lalan'),
('INV0002', 'opik', '2020-07-31 00:00:00', 22000, 22000, 0, 'Lalan'),
('INV0003', 'opik', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0004', '', '2020-07-31 00:00:00', 5000, 5000, 0, 'Tedi S'),
('INV0005', 'ririn', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0006', 'pisangan', '2020-07-31 00:00:00', 5000, 10000, 5000, 'Lalan'),
('INV0007', 'raka', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0008', '', '2020-07-31 00:00:00', 15000, 20000, 5000, 'Lalan'),
('INV0009', 'h.hana kasep', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0010', 'amel', '2020-07-31 00:00:00', 10000, 100000, 90000, 'Lalan'),
('INV0011', 'ajril', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0012', 'amel cantik banget', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0013', 'husnul bin rt salim', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0014', 'alpin doang', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0015', 'arya prayuda', '2020-07-31 00:00:00', 20000, 30000, 10000, 'Lalan'),
('INV0016', 'mefsi', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0017', 'raka', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0018', 'pia', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0019', 'tatun', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0020', 'roji', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0021', 'safira', '2020-07-31 00:00:00', 10000, 50000, 40000, 'Lalan'),
('INV0022', 'lea', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0023', 'arya', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0024', 'sabila pintar', '2020-07-31 00:00:00', 30000, 50000, 20000, 'Lalan'),
('INV0025', 'arya', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0026', 'azril', '2020-07-31 00:00:00', 5000, 6000, 1000, 'Lalan'),
('INV0027', 'pia', '2020-07-31 00:00:00', 5000, 10000, 5000, 'Lalan'),
('INV0028', 'amel', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0029', 'arya', '2020-07-31 00:00:00', 5000, 100000, 95000, 'Lalan'),
('INV0030', 'amel cantik', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0031', 'agus5', '2020-07-31 00:00:00', 37000, 50000, 13000, 'Lalan'),
('INV0032', 'uda kaos', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0033', 'nurdin', '2020-07-31 00:00:00', 10000, 50000, 40000, 'Lalan'),
('INV0034', 'ilham', '2020-07-31 00:00:00', 20000, 20000, 0, 'Lalan'),
('INV0035', 'iik', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0036', ' ', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0037', 'dewi', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0038', 'amel sayang', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0039', 'dede yah ayo ngaku', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0040', 'iik', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0041', ' ', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0042', 'teteh sunda', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0043', 'septian hadi', '2020-07-31 00:00:00', 20000, 20000, 0, 'Lalan'),
('INV0044', 'teteh sunda 2', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0045', 'eko', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0046', '', '2020-07-31 00:00:00', 33000, 50000, 17000, 'Lalan'),
('INV0047', 'bayu n anggi', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0048', 'teh devi', '2020-07-31 00:00:00', 15000, 15000, 0, 'Lalan'),
('INV0049', '', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('INV0050', 'erik', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0051', 'dewi', '2020-07-31 00:00:00', 5000, 5000, 0, 'Lalan'),
('INV0052', 'ririn', '2020-07-31 00:00:00', 10000, 10000, 0, 'Lalan'),
('0001', 'bi ikit', '2020-08-02 00:00:00', 45000, 50000, 5000, 'Lalan'),
('0002', 'anggi', '2020-08-02 00:00:00', 5000, 5000, 0, 'Lalan'),
('0003', 'cing ita', '2020-08-02 00:00:00', 5000, 5000, 0, 'Lalan'),
('0004', 'ibnu', '2020-08-02 00:00:00', 10000, 10000, 0, 'Lalan'),
('0005', 'awang', '2020-08-02 00:00:00', 38000, 38000, 0, 'Lalan'),
('0006', 'reza', '2020-08-02 00:00:00', 15000, 50000, 35000, 'Lalan'),
('0007', 'labib', '2020-08-02 00:00:00', 20000, 20000, 0, 'Lalan'),
('0008', 'bapak', '2020-08-02 00:00:00', 10000, 10000, 0, 'Lalan'),
('0009', '', '2020-08-02 00:00:00', 5000, 5000, 0, 'Lalan'),
('0010', '', '2020-08-02 00:00:00', 5000, 5000, 0, 'Lalan'),
('0011', 'sahrul', '2020-08-02 00:00:00', 20000, 20000, 0, 'Lalan'),
('0012', ' ', '2020-08-02 00:00:00', 25000, 25000, 0, 'Lalan'),
('0013', '', '2020-08-02 00:00:00', 20000, 20000, 0, 'Lalan'),
('0001', 'ajril', '2020-08-03 00:00:00', 5000, 10000, 5000, 'Lalan'),
('0002', '', '2020-08-03 00:00:00', 10000, 10000, 0, 'Lalan'),
('0003', '', '2020-08-03 00:00:00', 5000, 5000, 0, 'Lalan'),
('0004', 'cing ita', '2020-08-03 00:00:00', 8000, 8000, 0, 'Lalan'),
('0005', '', '2020-08-03 00:00:00', 20000, 20000, 0, 'Lalan'),
('0006', '', '2020-08-03 00:00:00', 5000, 50000, 45000, 'Lalan'),
('0007', '', '2020-08-03 00:00:00', 5000, 5000, 0, 'Lalan'),
('0008', '', '2020-08-03 00:00:00', 5000, 5000, 0, 'Lalan'),
('0009', '', '2020-08-03 00:00:00', 5000, 10000, 5000, 'Lalan'),
('0010', '', '2020-08-03 00:00:00', 25000, 25000, 0, 'Lalan'),
('0011', '', '2020-08-03 00:00:00', 20000, 20000, 0, 'Lalan'),
('0012', '', '2020-08-03 00:00:00', 20000, 20000, 0, 'Lalan'),
('0013', 'mefsy', '2020-08-03 00:00:00', 5000, 5000, 0, 'Lalan'),
('0014', '', '2020-08-03 00:00:00', 5000, 5000, 0, 'Lalan'),
('0015', 'pia', '2020-08-03 00:00:00', 25000, 25000, 0, 'Lalan'),
('0016', 'ilham', '2020-08-03 00:00:00', 10000, 10000, 0, 'Lalan'),
('0001', '', '2020-08-04 00:00:00', 45000, 100000, 55000, 'Lalan'),
('0002', 'sabila', '2020-08-04 00:00:00', 5000, 5000, 0, 'Lalan'),
('0003', '', '2020-08-04 00:00:00', 5000, 5000, 0, 'Lalan'),
('0004', '', '2020-08-04 00:00:00', 15000, 20000, 5000, 'Lalan'),
('0005', '', '2020-08-04 00:00:00', 5000, 5000, 0, 'Lalan'),
('0006', '', '2020-08-04 00:00:00', 5000, 5000, 0, 'Lalan'),
('0007', '', '2020-08-04 00:00:00', 15000, 15000, 0, 'Lalan'),
('0008', 'ilham', '2020-08-04 00:00:00', 10000, 10000, 0, 'Lalan'),
('0001', '', '2020-08-05 00:00:00', 58000, 100000, 42000, 'Lalan'),
('0002', '', '2020-08-05 00:00:00', 20000, 20000, 0, 'Lalan'),
('0003', 'mamah lalan', '2020-08-05 00:00:00', 3000, 3000, 0, 'Lalan'),
('0004', '', '2020-08-05 00:00:00', 10000, 10000, 0, 'Lalan'),
('0005', '', '2020-08-05 00:00:00', 10000, 10000, 0, 'Lalan'),
('0006', '', '2020-08-05 00:00:00', 3000, 3000, 0, 'Lalan'),
('0007', '', '2020-08-05 00:00:00', 5000, 5000, 0, 'Lalan'),
('0001', '', '2020-08-06 00:00:00', 5000, 5000, 0, 'Lalan'),
('0002', '', '2020-08-06 00:00:00', 10000, 10000, 0, 'Lalan'),
('0003', '', '2020-08-06 00:00:00', 10000, 10000, 0, 'Lalan'),
('0004', '', '2020-08-06 00:00:00', 20000, 20000, 0, 'Lalan'),
('0001', 'lalan', '2020-08-07 00:00:00', 5000, 5000, 0, 'Lalan'),
('0002', 'mama', '2020-08-07 00:00:00', 10000, 10000, 0, 'Lalan'),
('0003', '', '2020-08-07 00:00:00', 15000, 50000, 35000, 'Lalan'),
('0004', 'bocah', '2020-08-07 00:00:00', 15000, 15000, 0, 'Lalan'),
('0005', '', '2020-08-07 00:00:00', 10000, 10000, 0, 'Lalan'),
('0006', '', '2020-08-07 00:00:00', 5000, 5000, 0, 'Lalan'),
('0007', '', '2020-08-07 00:00:00', 10000, 10000, 0, 'Lalan'),
('0008', '', '2020-08-07 00:00:00', 3500, 3500, 0, 'Lalan'),
('0009', '', '2020-08-07 00:00:00', 43500, 43500, 0, 'Lalan'),
('0001', '', '2020-08-08 00:00:00', 5000, 5000, 0, 'Lalan'),
('0002', '', '2020-08-08 00:00:00', 10000, 10000, 0, 'Lalan'),
('0003', '', '2020-08-08 00:00:00', 5000, 5000, 0, 'Lalan'),
('0004', '', '2020-08-08 00:00:00', 5000, 5000, 0, 'Lalan'),
('0005', 'mefsy', '2020-08-08 00:00:00', 5000, 5000, 0, 'Lalan'),
('0001', '', '2020-08-11 00:00:00', 5000, 5000, 0, 'Lalan'),
('0002', '', '2020-08-11 00:00:00', 5000, 5000, 0, 'Lalan'),
('0003', '', '2020-08-11 00:00:00', 10000, 10000, 0, 'Lalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(30) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `status`) VALUES
('PROD001', 2, 'thai tea taro besar', 10000, 1),
('PROD002', 2, 'thai tea taro kecil', 5000, 1),
('PROD003', 2, 'green tea besar', 10000, 1),
('PROD004', 2, 'green tea kecil', 5000, 1),
('PROD005', 2, 'thai tea coklat besar', 10000, 1),
('PROD006', 2, 'thai tea coklat kecil', 5000, 1),
('PROD007', 2, 'thai tea ovaltine besar', 10000, 1),
('PROD008', 2, 'thai tea ovaltine kecil', 5000, 1),
('PROD010', 2, 'thai tea besar', 10000, 1),
('PROD011', 2, 'thai tea kecil', 5000, 1),
('PROD012', 2, 'thai tea oreo besar', 10000, 1),
('PROD013', 2, 'thai tea oreo kecil', 5000, 1),
('PROD014', 2, 'thai tea coffe besar', 10000, 1),
('PROD015', 2, 'thai tea coffe kecil', 5000, 1),
('PROD016', 1, 'roti isi daging', 3500, 1),
('PROD017', 1, 'kentang goreng', 5000, 1),
('PROD018', 1, 'sosis bakar', 2000, 1),
('PROD019', 2, 'pop es blender', 5000, 1),
('PROD020', 3, 'boba', 2000, 1),
('PROD021', 3, 'chesse', 2000, 1),
('PROD022', 3, 'oreo', 2000, 1),
('PROD023', 3, 'koko krunch', 2000, 1),
('PROD024', 3, 'meises', 2000, 1),
('PROD025', 3, 'choco chip', 2000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_in`
--

CREATE TABLE `stok_in` (
  `id_pembelian` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_in`
--

INSERT INTO `stok_in` (`id_pembelian`, `nama_barang`, `unit`, `qty`, `harga`, `tanggal`) VALUES
(1, 'es batu', 'balok', 1, 5000, '2020-07-31'),
(2, 'es batu', 'bal', 2, 36000, '2020-07-31'),
(3, 'susu carnation', 'kaleng', 3, 30000, '2020-07-31'),
(4, 'telor ayam', 'butir', 2, 4000, '2020-07-31'),
(5, 'es batu', 'balok', 1, 10000, '2020-08-06'),
(6, 'telur', 'butir', 3, 6000, '2020-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','kasir') NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`, `status`) VALUES
(2, 'admin', '$2y$10$VWP12dA/ofklN8Cv54v9buREuxF9ESCEbGjldqvCJI.mfLOFOWTSS', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_in`
--
ALTER TABLE `stok_in`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
