-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 07:51 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerajinan_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`, `email`, `level`) VALUES
(1, 'SIlvy', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'silvy@yahoo.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(5) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nm_rekening` varchar(50) NOT NULL,
  `gambar_bank` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nm_bank`, `no_rekening`, `nm_rekening`, `gambar_bank`) VALUES
(1, 'BNI', '4224444444444', 'fcv fvfsvfdv', 'bni.png'),
(2, 'BCA', '232323', 'rerere', 'bca.png'),
(4, 'NISP', '434343', 'esefesdfesfcs', 'ocbc.png'),
(5, 'BRI', '4333333', 'rtgretete', 'bri.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(10) NOT NULL,
  `nm_banner` varchar(50) NOT NULL,
  `ket_banner` text NOT NULL,
  `gambar_banner` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `nm_banner`, `ket_banner`, `gambar_banner`) VALUES
(3, 'adsdddddddddddddddd', 'daaaaaaaaaaaaaaaaaaaa', 'slide1.png'),
(2, 'sdcf', 'assssssss', 'slide2.png'),
(5, 'sdcf', 'assssssss', 'slide3.png'),
(4, 'sdcf', 'assssssss', 'Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cara_belanja`
--

CREATE TABLE `cara_belanja` (
  `id_cara_belanja` int(10) NOT NULL,
  `nm_cara_belanja` varchar(100) NOT NULL,
  `ket_cara_belanja` text NOT NULL,
  `gambar_cara_belanja` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_belanja`
--

INSERT INTO `cara_belanja` (`id_cara_belanja`, `nm_cara_belanja`, `ket_cara_belanja`, `gambar_cara_belanja`) VALUES
(1, 'we', 'The connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi The connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi The connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi	\n', 'cara belanja.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(10) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `harga_item` double NOT NULL,
  `qty` int(11) NOT NULL,
  `sub` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_order`, `id_produk`, `id_user`, `harga_item`, `qty`, `sub`) VALUES
(81, 'INV-201607300001', 'PROD-0008', 'aa@yahoo.c', 100000, 1, 100000),
(80, 'INV-201607300001', 'PROD-0016', 'aa@yahoo.c', 100000, 1, 100000),
(82, 'INV-201609190002', 'PROD-0003', 'aldi@yahoo', 100000, 1, 100000),
(83, 'INV-201609190002', 'PROD-0008', 'aldi@yahoo', 100000, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar` int(10) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `gambar_produk` text NOT NULL,
  `gambar_default` text NOT NULL,
  `tgl_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar`, `id_produk`, `gambar_produk`, `gambar_default`, `tgl_upload`) VALUES
(1, 'PROD-0001', 'tas rajut3.jpg', 'gambar1.jpg', '2016-01-12 05:01:13'),
(2, 'PROD-0002', 'tas plastik1.jpg', 'gambar2.jpg', '2016-01-12 05:01:13'),
(3, 'PROD-0002', '6.jpg', 'gambar3.jpg', '2016-01-12 05:01:13'),
(4, 'PROD-0003', 'dompet-owel-8rb.jpg', 'gambar4.jpg', '2016-01-12 05:01:13'),
(6, 'PROD-0002', 'd7.jpg', 'gambar6.jpg', '2016-01-12 05:01:13'),
(20, 'PROD-0007', '5.jpg', 'gambar10.jpg', '2016-01-12 05:01:13'),
(21, 'PROD-0016', '4.jpg', 'gambar10.jpg', '2016-01-12 05:01:13'),
(22, 'PROD-0008', 'g2.jpg', 'gambar10.jpg', '2016-01-12 05:01:13'),
(23, 'PROD-0009', 'g3.jpg', 'gambar10.jpg', '2016-01-12 05:01:13'),
(24, 'PROD-0010', 'gel1.jpg', 'gel1.jpg', '2016-01-12 05:01:13'),
(25, 'PROD-0011', 'gel2.jpg', 'gel1.jpg', '2016-01-12 05:01:13'),
(26, 'PROD-0012', 'gel3.jpg', 'gel1.jpg', '2016-01-12 05:01:13'),
(27, 'PROD-0013', 'miniatr3.jpg', 'gel1.jpg', '2016-01-12 05:01:13'),
(28, 'PROD-0014', 'miniatur1.jpg', 'gel1.jpg', '2016-01-12 05:01:13'),
(29, 'PROD-0003', 'd7.jpg', 'gambar4.jpg', '2016-01-12 05:01:13'),
(38, 'PROD-0001', 'tas rajut3.jpg', 'tas rajut3.jpg', '2016-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `ket_kategori` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nm_kategori`, `ket_kategori`) VALUES
(1, 'Tas', 'Kerajinan satu'),
(2, 'Dompet', 'Kerajinan dua'),
(3, 'Gantungan Kunci', 'Kerajinan tiga'),
(4, 'Gelang', 'Kerajinan tiga'),
(5, 'Miniatur', 'Kerajinan tiga');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_bayar`
--

CREATE TABLE `konfirmasi_bayar` (
  `id_konfirmasi` int(10) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `bank_transfer` varchar(20) NOT NULL,
  `bank_tujuan` varchar(22) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_rekening` int(20) NOT NULL,
  `jumlah_transfer` double NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_bayar`
--

INSERT INTO `konfirmasi_bayar` (`id_konfirmasi`, `id_order`, `id_pelanggan`, `id_admin`, `bank_transfer`, `bank_tujuan`, `atas_nama`, `no_rekening`, `jumlah_transfer`, `tgl_konfirmasi`) VALUES
(5, 'INV-201606130002', 'budi@yahoo.com', 0, 'bca', 'bca', 'rere', 556565, 9999, '2016-06-13 18:40:20'),
(6, 'INV-201606140004', 'rafles@yahoo.com', 0, 'mandiri', 'bri', 'rafles', 5454545, 500000, '2016-06-14 20:40:13'),
(7, 'INV-201606160005', 'rafles@yahoo.com', 0, 'bca', 'bca', 'fhdfhd', 432324, 4000000, '2016-06-16 07:38:59'),
(8, 'INV-201606240007', 'aa@yahoo.com', 0, 'mandiri', 'mandiri', 'aaaa', 2147483647, 2000000, '2016-06-24 09:02:20'),
(9, 'INV-201606240008', 'aa@yahoo.com', 0, 'bca', 'bca', '53535355', 54545, 33434343, '2016-06-24 09:29:45'),
(10, 'INV-201607300001', 'aa@yahoo.com', 0, 'bca', 'bca', 'rafles', 2147483647, 206000, '2016-07-30 22:22:47'),
(11, 'INV-201609190002', 'aldi@yahoo.com', 0, 'bca', 'bca', 'aldi', 1231312, 220000, '2016-09-19 19:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(10) NOT NULL,
  `nm_kontak` varchar(50) NOT NULL,
  `ket_kontak` varchar(300) NOT NULL,
  `gambar_kontak` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nm_kontak`, `ket_kontak`, `gambar_kontak`) VALUES
(2, 'bbm', '43535', 'bbm2.png'),
(3, 'email', 'admin@yahoo.com', 'email.png'),
(4, 'instagram', 'instagram', 'insta.png'),
(5, 'telpon', '4545454545', 'phone.png');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nm_kota` varchar(50) NOT NULL,
  `ket_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nm_kota`, `ket_kota`) VALUES
(1, 'semarang', 'semarang'),
(2, 'Jakarta', 'Jakarta'),
(3, 'Medan', 'Medan'),
(4, 'Jogyakarta', 'Jogyakarta'),
(5, 'surabaya', 'surabaya'),
(11, 'Lampung', 'Lampung'),
(12, 'tegal', '<p>tegal</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL,
  `nm_kurir` varchar(50) NOT NULL,
  `gambar_kurir` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nm_kurir`, `gambar_kurir`) VALUES
(1, 'JNE', 'LogoJNE.png'),
(2, 'TIKI', 'logotiki.png');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(10) NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `nm_tarif` enum('Yes','Reguler') NOT NULL,
  `harga_tarif` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_kurir`, `id_kota`, `nm_tarif`, `harga_tarif`) VALUES
(1, 1, 4, 'Reguler', 14000),
(3, 1, 1, 'Reguler', 6000),
(4, 1, 1, 'Yes', 12000),
(6, 2, 2, 'Reguler', 20000),
(7, 1, 5, 'Reguler', 4545),
(8, 1, 12, 'Reguler', 5000),
(9, 1, 12, 'Yes', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nm_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(32) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `propinsi` varchar(36) NOT NULL,
  `kota_pelanggan` varchar(100) NOT NULL,
  `kd_pos` varchar(6) NOT NULL,
  `telpon_pelanggan` varchar(13) NOT NULL,
  `daftar_pelanggan` datetime NOT NULL,
  `status_belanja` tinyint(1) NOT NULL,
  `active` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nm_pelanggan`, `email_pelanggan`, `password_pelanggan`, `alamat_pelanggan`, `propinsi`, `kota_pelanggan`, `kd_pos`, `telpon_pelanggan`, `daftar_pelanggan`, `status_belanja`, `active`) VALUES
(5, 'rafles', 'rafles@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Loremipsum dolor sit amet Loremipsum dolor sit amet', 'dki', '1', '343434', '53434', '0000-00-00 00:00:00', 0, ''),
(4, 'budi', 'budi@yahoo.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'acscdsfc', 'dki jakarta', '1', '442', '1231', '0000-00-00 00:00:00', 0, ''),
(6, 'aa', 'aa@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '32', '23', '1', 'grgerg', '32', '0000-00-00 00:00:00', 0, ''),
(7, 'aldy', 'aldi@yahoo.com', '202cb962ac59075b964b07152d234b70', 'jakarta', 'dki', '2', '55443', '123', '0000-00-00 00:00:00', 0, ''),
(8, 'rafles', 'rafles@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Loremipsum dolor sit amet Loremipsum dolor sit amet', 'dki', '1', '343434', '53434', '0000-00-00 00:00:00', 0, ''),
(9, 'rafles', 'rafles@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Loremipsum dolor sit amet Loremipsum dolor sit amet', 'dki', '1', '343434', '53434', '0000-00-00 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nm_produk` varchar(100) CHARACTER SET latin1 NOT NULL,
  `harga_produk` double NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `ket_produk` text CHARACTER SET latin1 NOT NULL,
  `tgl_simpan` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nm_produk`, `harga_produk`, `stok_produk`, `ket_produk`, `tgl_simpan`) VALUES
('PROD-0001', 2, 'apa sajaccccccc', 200000, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0002', 1, 'Tas 01', 100000, 37, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0003', 2, 'dompet ku', 100000, 40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0004', 1, 'asdasda', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0005', 1, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0006', 1, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0007', 2, 'dompet bagus', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0008', 3, 'apa saja', 100000, 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0009', 3, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0010', 4, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0011', 4, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0012', 4, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0013', 5, 'apa saja', 100000, 48, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0014', 5, 'apa saja', 100000, 47, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0015', 3, 'apa saja', 100000, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0016', 2, 'dompprt laj', 100000, 41, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0017', 1, 'apa saja', 100000, 42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2016-01-12 05:01:13'),
('PROD-0018', 2, 'merek asalan', 23, 31, 'Lore psu door sit aamet sdmsakfcsafcsacas zvsvsd', '2016-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(10) NOT NULL,
  `nm_profil` varchar(50) NOT NULL,
  `ket_profil` text NOT NULL,
  `gambar_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nm_profil`, `ket_profil`, `gambar_profil`) VALUES
(1, 'Profil kami', 'The connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi\nThe connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi\nThe connection to the server was reset while the page was loading. The page you are trying to view cannot be shown because the authenticity of the received data could not be verified. Please contact the websi', 'aboutus.png');

-- --------------------------------------------------------

--
-- Table structure for table `tr_order`
--

CREATE TABLE `tr_order` (
  `id_order` varchar(20) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_ongkir` int(10) NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `harga_ongkir` double NOT NULL,
  `tgl_order` datetime NOT NULL,
  `total_order` double NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `status_order` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_order`
--

INSERT INTO `tr_order` (`id_order`, `id_user`, `id_ongkir`, `id_kurir`, `harga_ongkir`, `tgl_order`, `total_order`, `no_resi`, `status_order`) VALUES
('INV-201607300001', 'aa@yahoo.com', 6000, 1, 6000, '2016-07-30 22:04:09', 200000, '', 2),
('INV-201609190002', 'aldi@yahoo.com', 20000, 2, 20000, '2016-09-19 00:00:00', 200000, '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `cara_belanja`
--
ALTER TABLE `cara_belanja`
  ADD PRIMARY KEY (`id_cara_belanja`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD UNIQUE KEY `id_order` (`id_order`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tr_order`
--
ALTER TABLE `tr_order`
  ADD PRIMARY KEY (`id_order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cara_belanja`
--
ALTER TABLE `cara_belanja`
  MODIFY `id_cara_belanja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  MODIFY `id_konfirmasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
