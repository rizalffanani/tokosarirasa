-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 07:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbunmer`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `id_assignment` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`id_assignment`, `id_aunt`, `item_name`, `user_id`, `created_at`) VALUES
(1, 1, 'Admin', '1', '0000-00-00 00:00:00'),
(2, 2, 'Kasir', '2', NULL),
(3, 2, 'Kasir', '3', NULL),
(4, 2, 'Kasir', '4', NULL),
(5, 3, 'User', '9', '2020-08-23 21:51:43'),
(6, 2, 'Kasir', '10', '2020-08-23 22:13:02'),
(7, 2, 'Kasir', '12', '2020-09-09 11:20:29'),
(8, 6, 'siswa', '13', '2020-10-01 09:14:38'),
(9, 3, 'User', '14', '2021-04-22 15:26:32'),
(10, 3, 'User', '2', '2021-04-27 12:51:34'),
(11, 3, 'User', '3', '2021-06-19 13:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `id_aunt` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`id_aunt`, `name`, `tipe`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'hak akses admin', NULL, NULL),
(2, 'Kasir', 1, 'hak akses kasir', NULL, NULL),
(3, 'User', 1, 'Hak akses diatas admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `idc` int(11) NOT NULL,
  `id_aunt` int(11) NOT NULL,
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`idc`, `id_aunt`, `parent`, `child`) VALUES
(1, 1, 'Admin', '15'),
(2, 1, 'Admin', '22'),
(3, 1, 'Admin', '33'),
(4, 1, 'Admin', '13'),
(16, 1, 'Admin', '48'),
(28, 1, 'Admin', '40'),
(42, 1, 'Admin', '41'),
(43, 2, 'Kasir', '12'),
(45, 1, 'Admin', '49'),
(46, 1, 'Admin', '50'),
(47, 1, 'Admin', '51'),
(48, 1, 'Admin', '52'),
(50, 1, 'Admin', '54'),
(51, 1, 'Admin', '56'),
(52, 1, 'Admin', '55'),
(53, 1, 'Admin', '57'),
(58, 1, 'Admin', '70'),
(68, 2, 'Kasir', '61'),
(69, 2, 'Kasir', '62'),
(70, 2, 'Kasir', '63'),
(77, 1, 'Admin', '78'),
(79, 1, 'Admin', '79'),
(80, 6, 'siswa', '12'),
(88, 1, 'Admin', '47'),
(90, 3, 'User', '61'),
(91, 3, 'User', '62'),
(92, 3, 'User', '63'),
(93, 1, 'Admin', '74'),
(95, 3, 'User', '82'),
(98, 1, 'Admin', '63'),
(101, 3, 'User', '87'),
(102, 1, 'Admin', '80'),
(103, 1, 'Admin', '81'),
(104, 1, 'Admin', '83'),
(105, 1, 'Admin', '84'),
(107, 1, 'Admin', '86'),
(108, 1, 'Admin', '88');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nama_web` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `wa` varchar(18) NOT NULL,
  `logo_web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `nama_web`, `tentang`, `slogan`, `alamat`, `email`, `wa`, `logo_web`) VALUES
(1, 'TOKO SARI RASA', 'SISTEM INFORMASI  PENJUALAN KERIPIK\r\nDI  TOKO SARI RASA BERBASIS WEB', 'TOKO SARI RASA', 'Jl. Sanan Gg. III No.168, <br> Purwantoro, Kec. Blimbing, Kota Malang, <br> Jawa Timur 65126', 'tokosarirasa@gmail.com', '0813-3378-2544', '1file_19062021102040.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Soevenir'),
(4, 'Snack'),
(5, 'Lain - Lain'),
(6, 'Aneka Kripik'),
(7, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `listmenu`
--

CREATE TABLE `listmenu` (
  `id_menu` int(20) NOT NULL,
  `nama_menu` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `foto_menu` varchar(200) NOT NULL,
  `status` enum('ready','habis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listmenu`
--

INSERT INTO `listmenu` (`id_menu`, `nama_menu`, `harga`, `id_kategori`, `deskripsi_menu`, `foto_menu`, `status`) VALUES
(39, 'Kripik Mangga', '8000', 4, '', '870file_19062021095540.jpg', 'ready'),
(40, 'Kripik Rambutan', '6000', 4, '', '774file_19062021095518.jpg', 'ready'),
(41, 'Keripik Salak', '1000', 4, '', '128file_19062021095456.jpg', 'ready'),
(42, 'Kripik Nanas', '1000', 4, '', '294file_19062021095439.jpg', 'ready'),
(43, 'Kripik Mangga', '2500', 5, '', '879file_19062021095414.jpg', 'ready'),
(44, 'Keripik Tempe Coklat', '2500', 5, '', '319file_19062021095346.jpg', 'ready'),
(45, 'Kripik Nangka', '2500', 5, '', '435file_19062021095330.jpg', 'ready'),
(46, 'Kripik Tempe Sagu', '2500', 5, '', '245file_19062021095314.jpg', 'ready'),
(47, 'Kripik Tempe Sagu', '3000', 5, '', '714file_19062021095300.jpg', 'ready'),
(48, 'Kripik Tempe Original', '7500', 6, '', '646file_19062021095247.jpg', 'ready'),
(49, 'Kripik Nangka', '7000', 5, '', '452file_19062021095234.jpg', 'ready'),
(50, 'Aneka Keripik Buah', '13000', 6, '', '41file_19062021095220.jpg', 'habis'),
(51, 'Keripik Tempe Coklat', '13000', 6, '', '459file_19062021095212.jpg', 'ready'),
(52, 'Kripik Tempe Sagu', '13000', 6, '', '766file_19062021095203.jpg', 'ready'),
(53, 'tes', '900', 7, 'hgffghbfvfbfj', '928file_19062021134343.jpg', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `deskrip` text NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `tipe` enum('menu','link','pager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `deskrip`, `icon`, `is_active`, `is_parent`, `tipe`) VALUES
(12, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(13, 'Admin', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(15, 'menu management', 'admin/menu', 'hak akses penuh Controler menu/*', 'fa fa-list-alt', 1, 13, 'menu'),
(22, 'GENERATOR', 'harviacode', 'hak akses penuh Controler harviacode/*', 'fa fa-laptop', 1, 13, 'menu'),
(40, 'data', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(41, 'Setting', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(47, 'Auth item', 'admin/auth_item', 'hak akses penuh Controler Auth_item/*', 'fa fa-laptop', 1, 13, 'menu'),
(48, 'Auth detail', 'admin/auth_item_child', 'hak akses penuh Controler Auth_item_child/*', 'fa fa-laptop', 1, 13, 'menu'),
(52, 'Info Web', 'admin/info', 'hak akses Info', 'fa fa-list-alt', 1, 41, 'menu'),
(61, 'users/update', 'admin/users/update', 'hak akses aksi users/update/', 'fa fa-laptop', 1, 0, 'pager'),
(62, 'users/update_pass', 'admin/users/update_pass', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(63, 'users/read', 'admin/users/read', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(70, 'data user', 'admin/users', 'Data users', 'fa fa-laptop', 1, 40, 'menu'),
(73, 'admin', 'admin', 'routing', '1', 1, 0, 'pager'),
(74, 'Dashboard', 'admin/dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(78, 'tema', 'admin/tema', 'hak akses', 'fa fa-list-alt', 1, 41, 'link'),
(80, 'kategori', 'admin/kategori', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(81, 'Produk', 'admin/listmenu', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(82, 'checkout', 'web/checkout', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(83, 'Pesanan', 'admin/pesanantamu', 'fungsi data Pesanan Tamu', 'fa fa-laptop', 1, 0, 'menu'),
(84, 'Laporan', 'admin/kas', 'Laporan Transaksi', 'fa fa-pencil', 1, 0, 'menu'),
(86, 'slider', 'admin/slider', 'hak akses', 'fa fa-laptop', 1, 40, 'link'),
(87, 'logorder', 'web/logorder', 'hak akses', 'fa fa-laptop', 1, 0, 'link'),
(88, 'page', 'admin/page', 'hak akses', 'fa fa-laptop', 1, 40, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_order`, `status`) VALUES
(1, 1, 'terkonfirmasi'),
(2, 1, 'dikirim'),
(3, 2, 'terkonfirmasi'),
(4, 2, 'dikirim'),
(5, 5, 'terkonfirmasi'),
(6, 4, 'terkonfirmasi'),
(7, 3, 'terkonfirmasi'),
(8, 5, 'dikirim'),
(9, 5, 'diterima'),
(10, 4, 'dikirim'),
(11, 4, 'diterima'),
(12, 3, 'dikirim'),
(13, 3, 'diterima'),
(14, 7, 'terkonfirmasi'),
(15, 8, 'terkonfirmasi'),
(16, 6, 'terkonfirmasi'),
(17, 8, 'dikirim'),
(18, 8, 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(20) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL DEFAULT '0',
  `total_harga` varchar(200) NOT NULL,
  `bayar` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `waktu` time NOT NULL,
  `transaksi` enum('terkonfirmasi','dikirim','diterima','selesai','masuk','') NOT NULL,
  `id_kasir` int(20) DEFAULT NULL,
  `nama_kasir` varchar(200) DEFAULT NULL,
  `metode` enum('tunai','debit') NOT NULL,
  `status` enum('belum bayar','lunas') NOT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `diskon`, `total_harga`, `bayar`, `date`, `waktu`, `transaksi`, `id_kasir`, `nama_kasir`, `metode`, `status`, `id_lokasi`, `lokasi`, `catatan`) VALUES
(1, '2', '', '26000', '26000', '2021-05-05', '12:10:22', 'diterima', 1, 'admin1', 'tunai', 'lunas', 8, 'Fakultas Pendidikan', 'baik'),
(2, '2', '', '13000', '13000', '2021-05-05', '12:39:04', 'dikirim', 1, 'admin1', 'tunai', 'lunas', 14, ' Perpustakaan UM', 'sdfsdf'),
(3, '2', '', '26000', '26000', '2021-06-19', '10:26:02', 'diterima', 1, 'admin1', 'tunai', 'lunas', 0, NULL, ''),
(4, '2', '', '13000', '13000', '2021-06-19', '11:03:15', 'diterima', 1, 'admin1', 'tunai', 'lunas', 0, NULL, 'hgfhdfgh'),
(5, '2', '', '13000', '13000', '2021-06-19', '11:05:23', 'diterima', 1, 'admin1', 'tunai', 'lunas', 0, NULL, 'cxczv'),
(6, '2', '', '13000', '13000', '2021-06-19', '11:11:12', 'terkonfirmasi', 1, 'admin1', 'tunai', 'lunas', 0, NULL, 'gfdgdfg'),
(7, '2', '', '7500', '7500', '2021-06-19', '12:34:02', 'terkonfirmasi', 1, 'admin1', 'tunai', 'lunas', 0, NULL, ''),
(8, '3', '', '46500', '46500', '2021-06-19', '13:40:05', 'diterima', 1, 'admin1', 'tunai', 'lunas', 0, NULL, 'fdgdfg'),
(9, '2', '0', '13000', '0', '2021-06-20', '22:59:46', 'masuk', NULL, NULL, 'tunai', 'belum bayar', 0, NULL, 'Perum Bamban Samudra B06 Malang');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_menu`, `nama_menu`, `id_kategori`, `nama_kategori`, `qty`, `harga`, `total_harga`, `gambar`) VALUES
(1, 1, 51, 'Nasi Goreng Jawa + Es Teh', 6, 'Paket Hemat', 1, 13000, 13000, '84file_05052021093232.jpg'),
(2, 1, 50, 'Nasi Ayam Penyet + Es Teh', 6, 'Paket Hemat', 1, 13000, 13000, '221file_05052021092929.jpg'),
(3, 2, 50, 'Nasi Ayam Penyet + Es Teh', 6, 'Paket Hemat', 1, 13000, 13000, '221file_05052021092929.jpg'),
(4, 3, 50, 'Aneka Keripik Buah', 6, 'Aneka Kripik', 2, 13000, 26000, '41file_19062021095220.jpg'),
(5, 4, 50, 'Aneka Keripik Buah', 6, 'Aneka Kripik', 1, 13000, 13000, '41file_19062021095220.jpg'),
(6, 5, 50, 'Aneka Keripik Buah', 6, 'Aneka Kripik', 1, 13000, 13000, '41file_19062021095220.jpg'),
(7, 6, 50, 'Aneka Keripik Buah', 6, 'Aneka Kripik', 1, 13000, 13000, '41file_19062021095220.jpg'),
(8, 7, 48, 'Kripik Tempe Original', 6, 'Aneka Kripik', 1, 7500, 7500, '646file_19062021095247.jpg'),
(9, 8, 51, 'Keripik Tempe Coklat', 6, 'Aneka Kripik', 3, 13000, 39000, '459file_19062021095212.jpg'),
(10, 8, 48, 'Kripik Tempe Original', 6, 'Aneka Kripik', 1, 7500, 7500, '646file_19062021095247.jpg'),
(11, 9, 50, 'Aneka Keripik Buah', 6, 'Aneka Kripik', 1, 13000, 13000, '41file_19062021095220.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `judul` varchar(1000) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `enum` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `link`, `judul`, `deskripsi`, `foto`, `enum`) VALUES
(1, 'profil', 'profil', 'customer ingin melakukan pemesanan, maka pembeli harus melakukan login\r\nSetelah berhasil login, pembeli dapat memilih produk yang akan dipesan.\r\nSetelah memilih produk web sistem informasi akan menampilkan keranjang belanja yang berisi jenis, jumlah dan harga total barang dipilih.\r\nSetelah mengisi keranjang belanja, customer dapat memilih detail transaksi.\r\nSetelah mendapatkan  detail total transaksi, pembeli  dapat konfirmasi pesanan.', 'dfgfdg', 'y'),
(2, 'kontak', 'kontak', '0813-3378-2544\r\nJl. Sanan Gg. III No.168,\r\nPurwantoro, Kec. Blimbing, Kota Malang,\r\nJawa Timur 65126', 'dfgfdg', 'y'),
(3, 'bantuan', 'bantuan', 'Sistem informasi penjualan dapat diartikan sebagai suatu pembuatan pembuatan pernyataan penjualan, kegiatan akan dijelaskan melalui prosedur-prosedur yang meliputi urutan kegiatan sejak diterimanya  pesanan dari pembeli, pengecekan barang ada atau tidak ada  dan diteruskan dengan pengiriman barang yang disertai dengan pembuatan faktur dan mengadakan pencatatan atas penjualan yang berlaku.', 'dsdfdsg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `deskripsi`, `images`) VALUES
(1, 'Selamat datang', 'di website toko sari rasa <br>\r\nsilahkan pesan pada menu di bawah ini !', '110file_19062021102427.jpg'),
(2, 'Selamat datang', 'di website toko sari rasa <br>\r\nsilahkan pesan pada menu di bawah ini ! gdgdfgdfgd', '584file_19062021134913.png');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `navbar_bg_color` varchar(100) NOT NULL,
  `navbar_font_color` varchar(100) NOT NULL,
  `sidebar_bg_color` varchar(50) NOT NULL,
  `sidebar_font_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id_tema`, `navbar_bg_color`, `navbar_font_color`, `sidebar_bg_color`, `sidebar_font_color`) VALUES
(1, 'blue', 'dark', 'dark', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nokartuidentitas` varchar(30) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nokartuidentitas`, `first_name`, `last_name`, `alamat`, `phone`, `foto`, `active`) VALUES
(1, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '', 'admin1', NULL, NULL, '083834558876', '1file_09092020122247.png', 1),
(2, 'joni2', 'e10adc3949ba59abbe56e057f20f883e', 'joni@gmail.com', NULL, 'joni', NULL, NULL, '082139121467', 'default.png', 1),
(3, 'tes1', 'e10adc3949ba59abbe56e057f20f883e', 'tes@gmail.com', NULL, 'tes', NULL, NULL, '082138483289', 'default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `ip_address`, `activation_code`, `forgotten_password_time`, `created_on`, `last_login`) VALUES
(1, '109.109.109.109', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, '::1', NULL, NULL, '2021-04-27 12:51:34', NULL),
(3, '::1', NULL, NULL, '2021-06-19 13:40:01', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_akses`
-- (See below for the actual view)
--
CREATE TABLE `view_akses` (
`id` int(11) unsigned
,`username` varchar(100)
,`first_name` varchar(50)
,`name_level` varchar(64)
,`id_aunt` int(11)
,`id_child` int(11)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_active` int(1)
,`is_parent` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_auth_child`
-- (See below for the actual view)
--
CREATE TABLE `view_auth_child` (
`idc` int(11)
,`parent` varchar(64)
,`child` varchar(64)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_parent` int(1)
,`is_active` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hk`
-- (See below for the actual view)
--
CREATE TABLE `view_hk` (
`id` int(11) unsigned
,`username` varchar(100)
,`id_assignment` int(11)
,`id_aunt` int(11)
,`item_name` varchar(64)
,`created_at` datetime
,`idc` int(11)
,`child` varchar(64)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_notif`
-- (See below for the actual view)
--
CREATE TABLE `view_notif` (
`id_notifikasi` int(11)
,`sts` varchar(100)
,`id_order` int(20)
,`id_user` varchar(100)
,`diskon` varchar(100)
,`total_harga` varchar(200)
,`bayar` varchar(100)
,`date` date
,`waktu` time
,`transaksi` enum('terkonfirmasi','dikirim','diterima','selesai','masuk','')
,`id_kasir` int(20)
,`nama_kasir` varchar(200)
,`metode` enum('tunai','debit')
,`status` enum('belum bayar','lunas')
,`id_lokasi` int(11)
,`lokasi` varchar(100)
,`catatan` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_akses`
--
DROP TABLE IF EXISTS `view_akses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`first_name` AS `first_name`,`auth_item`.`name` AS `name_level`,`auth_item`.`id_aunt` AS `id_aunt`,`menu`.`id` AS `id_child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_active` AS `is_active`,`menu`.`is_parent` AS `is_parent`,`menu`.`tipe` AS `tipe` from ((((`users` join `auth_assignment` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item` on(`auth_item`.`id_aunt` = `auth_assignment`.`id_aunt`)) join `auth_item_child` on(`auth_item`.`id_aunt` = `auth_item_child`.`id_aunt`)) join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_auth_child`
--
DROP TABLE IF EXISTS `view_auth_child`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_auth_child`  AS  select `auth_item_child`.`idc` AS `idc`,`auth_item_child`.`parent` AS `parent`,`auth_item_child`.`child` AS `child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_parent` AS `is_parent`,`menu`.`is_active` AS `is_active`,`menu`.`tipe` AS `tipe` from (`auth_item_child` join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_hk`
--
DROP TABLE IF EXISTS `view_hk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hk`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`auth_assignment`.`id_assignment` AS `id_assignment`,`auth_assignment`.`id_aunt` AS `id_aunt`,`auth_assignment`.`item_name` AS `item_name`,`auth_assignment`.`created_at` AS `created_at`,`auth_item_child`.`idc` AS `idc`,`auth_item_child`.`child` AS `child` from ((`auth_assignment` join `users` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item_child` on(`auth_item_child`.`id_aunt` = `auth_assignment`.`id_aunt`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_notif`
--
DROP TABLE IF EXISTS `view_notif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_notif`  AS  select `notifikasi`.`id_notifikasi` AS `id_notifikasi`,`notifikasi`.`status` AS `sts`,`order`.`id_order` AS `id_order`,`order`.`id_user` AS `id_user`,`order`.`diskon` AS `diskon`,`order`.`total_harga` AS `total_harga`,`order`.`bayar` AS `bayar`,`order`.`date` AS `date`,`order`.`waktu` AS `waktu`,`order`.`transaksi` AS `transaksi`,`order`.`id_kasir` AS `id_kasir`,`order`.`nama_kasir` AS `nama_kasir`,`order`.`metode` AS `metode`,`order`.`status` AS `status`,`order`.`id_lokasi` AS `id_lokasi`,`order`.`lokasi` AS `lokasi`,`order`.`catatan` AS `catatan` from (`order` join `notifikasi` on(`order`.`id_order` = `notifikasi`.`id_order`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`id_assignment`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`id_aunt`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `listmenu`
--
ALTER TABLE `listmenu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id_aunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `listmenu`
--
ALTER TABLE `listmenu`
  MODIFY `id_menu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
