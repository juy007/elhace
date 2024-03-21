-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2024 pada 11.44
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elhace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `username`, `password`) VALUES
(3, 'Jul Ujang', 'julistiasyafari95@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_otp`
--

CREATE TABLE `admin_otp` (
  `id_otp` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_otp`
--

INSERT INTO `admin_otp` (`id_otp`, `id_admin`, `code`, `date`, `time`) VALUES
(19, 3, '1044', '2022-05-12', '13:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_message`
--

CREATE TABLE `email_message` (
  `id_message` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `ip` varchar(70) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `create` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `email_message`
--

INSERT INTO `email_message` (`id_message`, `name`, `email`, `message`, `ip`, `browser`, `os`, `create`, `time`) VALUES
(46, 'aaaaaaaaa', '', '', '', '', '', '0000-00-00', ''),
(47, 'aaa', 'ddad', 'dadad', '', '', '', '0000-00-00', ''),
(48, 'fhrgh', 'esgsrgrf', 'gsregthtdh', '', '', '', '0000-00-00', ''),
(49, 'adwfe', '', '', '', '', '', '0000-00-00', ''),
(50, 'adwfe', 'rhrht', '', '', '', '', '0000-00-00', ''),
(51, 'adwfe', 'rhrht', 'trhyrjyj', '', '', '', '0000-00-00', ''),
(52, 'adwfe', 'rhrht', 'trhyrjyj', '::1', '', '', '0000-00-00', ''),
(53, 'adwfe', 'rhrht', 'trhyrjyj', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '17:30'),
(54, 'ujang', 'qqqq@mail.com', 'halo sedang apa om??', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '17:33'),
(55, 'Juy', 'jul_syaf@outlook.com', 'Halo gimana', '114.122.73.96', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '17:53'),
(56, 'Juy', 'jul@outlook.com', 'halo mas?', '114.122.73.96', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '17:55'),
(57, '1111', '1111', '11111', '114.122.73.96', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '17:56'),
(58, 'Asep', 'asep@gmail.com', 'go mas biar sukses', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '23:36'),
(59, 'aaa', 'aaaa@aaaa.com', 'aaaaa', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '23:38'),
(60, 'aaaa', 'juuu@mail.com', 'halo', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '09:50'),
(61, 'aa', 'ss@aaa.com', 'sssss', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '10:21'),
(62, 'oceh', 'kkkkk@kkk.co.id', 'halo mas?', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '10:29'),
(63, 'sssssssss', 'sss@sss.com', 'ssss', '114.122.100.71', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '10:41'),
(64, 'ccc', 'ccc@vvv.ccc', 'adaad', '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '10:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_history`
--

CREATE TABLE `login_history` (
  `id_history` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `access_date` date NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_history`
--

INSERT INTO `login_history` (`id_history`, `id_admin`, `ip`, `access_date`, `time`) VALUES
(1, 3, '::1', '2022-04-26', '21:55:34'),
(2, 3, '::1', '2022-04-26', '21:56:56'),
(3, 3, '::1', '2022-04-27', '04:42:38'),
(4, 3, '::1', '2022-04-27', '08:34:53'),
(5, 3, '::1', '2022-04-27', '15:06:01'),
(6, 3, '::1', '2022-04-27', '16:30:56'),
(7, 3, '::1', '2022-04-27', '16:33:35'),
(8, 3, '::1', '2022-04-27', '20:30:52'),
(9, 3, '::1', '2022-04-27', '20:37:28'),
(10, 3, '::1', '2022-04-27', '20:38:58'),
(11, 3, '::1', '2022-04-28', '08:51:28'),
(12, 3, '::1', '2022-04-28', '11:02:22'),
(13, 3, '::1', '2022-05-06', '10:52:59'),
(14, 3, '::1', '2022-05-12', '12:00:19'),
(15, 3, '::1', '2022-05-15', '17:33:04'),
(16, 3, '::1', '2022-05-16', '11:10:03'),
(17, 3, '::1', '2022-05-16', '15:33:42'),
(18, 3, '::1', '2022-05-16', '18:27:09'),
(19, 3, '::1', '2022-05-17', '08:50:00'),
(20, 3, '::1', '2022-05-17', '15:39:39'),
(21, 3, '::1', '2022-05-18', '08:46:38'),
(22, 3, '::1', '2022-05-19', '11:59:10'),
(23, 3, '::1', '2022-06-18', '22:36:02'),
(24, 3, '::1', '2022-06-20', '05:52:01'),
(25, 3, '::1', '2022-06-21', '00:22:15'),
(26, 3, '::1', '2022-06-22', '09:56:44'),
(27, 3, '::1', '2022-06-23', '21:59:04'),
(28, 3, '::1', '2022-07-06', '10:29:07'),
(29, 3, '::1', '2022-12-16', '16:20:04'),
(30, 3, '::1', '2022-12-16', '16:33:01'),
(31, 3, '::1', '2022-12-16', '16:58:01'),
(32, 3, '::1', '2022-12-16', '17:17:05'),
(33, 3, '::1', '2022-12-16', '20:38:59'),
(34, 3, '::1', '2022-12-17', '12:45:34'),
(35, 3, '::1', '2022-12-17', '12:59:43'),
(36, 3, '::1', '2022-12-17', '13:38:26'),
(37, 3, '::1', '2023-06-13', '23:51:53'),
(38, 3, '::1', '2023-08-18', '22:48:31'),
(39, 3, '::1', '2023-08-18', '23:33:55'),
(40, 3, '::1', '2023-08-19', '15:52:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_news` int(10) UNSIGNED NOT NULL,
  `id_news_category` int(11) NOT NULL,
  `number_news` varchar(50) NOT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `news_title` varchar(250) DEFAULT NULL,
  `news_text` longtext DEFAULT NULL,
  `news_views` int(11) DEFAULT 0,
  `create_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `news_status` varchar(20) NOT NULL,
  `news_folder` varchar(100) NOT NULL,
  `url_slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `id_news_category`, `number_news`, `meta_description`, `meta_keyword`, `news_title`, `news_text`, `news_views`, `create_date`, `updated_date`, `news_status`, `news_folder`, `url_slug`) VALUES
(10, 0, '', 'detikINET Bagi-bagi THR HP 5G & Voucher untuk Lebaran!  Baca artikel detikinet, ', 'detikINET Bagi-bagi THR HP 5G & Voucher untuk Lebaran!  Baca artikel detikinet, ', 'detikINET Bagi-bagi THR HP 5G & Voucher untuk Lebaran!  Baca artikel detikinet, ', '<p><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Jakarta - Hari Raya Idul Fitri adalah momen penuh kebahagiaan. Tentunya akan lebih bahagia lagi jika dapat hadiah ponsel dan lain-lain untuk Lebaran.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Momen Lebaran adalah saatnya memberi. Anak-anak mendapat hadiah dari orang tua karena tamat berpuasa. Nah, detikINET juga tidak mau ketinggalan memberi hadiah istimewa untuk pembaca semua.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Kali ini, detikINET akan memberikan Giveaway HP 5G & Voucher untuk Lebaran. Kita akan bagi-bagi smartphone 5G, aksesoris, voucher dan kartu perdana. Ini dijamin akan bikin momen Lebaran kamu jadi lebih istimewa.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Baca artikel detikinet, \"detikINET Bagi-bagi THR HP 5G & Voucher untuk Lebaran!\" selengkapnya </span><a href=\"https://inet.detik.com/cyberlife/d-6041532/detikinet-bagi-bagi-thr-hp-5g--voucher-untuk-lebaran\" style=\"background: rgb(255, 255, 255); color: rgb(0, 0, 0); transition: all 0.3s ease-in-out 0s; font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">https://inet.detik.com/cyberlife/d-6041532/detikinet-bagi-bagi-thr-hp-5g--voucher-untuk-lebaran</a><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Download Apps Detikcom Sekarang https://apps.detik.com/detik/</span><br></p>', 0, '2022-04-25', '2022-04-27', 'yes', '20220425103648', 'detikinet-bagi-bagi-thr-hp-5g-voucher-untuk-lebaran-baca-artikel-detikinet'),
(11, 0, '', 'iPhone Gerogoti Pasar Android', 'iPhone Gerogoti Pasar Android', 'iPhone Gerogoti Pasar Android', '<p><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Jakarta - Pangsa pasar Android selama lima tahun ke belakang, sejak 2018 sampai sekarang, terus menurun. Dari 77,32% pada 2018 menjadi 69,74% pada Januari 2022, yang merupakan data dari Statista.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Meskipun pangsa pasarnya masih jauh unggul dari iOS, pasar Android terus digerogoti oleh sistem operasi iPhone tersebut, yang selama periode sama pasarnya naik dari 19,4% menjadi 25,49%, demikian dikutip detikINET dari Phone Arena.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Android dan iOS bisa dibilang hampir menguasai 100% pasar ponsel. Meski ada juga sejumlah sistem operasi lain yang ada di paling bawah. Seperti KaiOS, platform feature phone berbasis Linux, Windows Phone, Nokia Series 40, Tizen, dan lainnya.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">ADVERTISEMENT</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">SCROLL TO RESUME CONTENT</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">   </span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">360p geselecteerd als afspeelkwaliteit</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Perlu diingat, ini adalah data secara global, karena data per negaranya bisa berbanding terbalik. Misalnya pasar Amerika Serikat dikuasai oleh iOS, dan pasar negara berkembang dikuasai oleh Android.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Baca juga:</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Tablet Murah Realme Pad Mini Lolos TKDN, Rilis di Indonesia Makin Dekat</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Contohnya market share Android mencapai 81% dan di Amerika Selatan lebih tinggi lagi, yaitu 90%. Salah satu meningkatnya pangsa pasar iOS adalah Apple mulai bisa bergerilya ke pasar negara berkembang lewat iPhone SE.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Namun sejauh ini penjualan iPhone SE, setidaknya menurut analis kenamaan Apple Ming-Chi Kuo, masih mengecewakan. Padahal dua iPhone SE sebelumnya terbilang cukup sukses.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Tentu saja ada juga aspek kemampuan ekonomi, tepatnya daya beli di regional tertentu berdampak pada pangsa pasar Android vs iOS. Di Africa misalnya, pangsa pasar Android adalah 84% sementara iOS hanya 14%. Sementara itu di Eropa, pasar Android -- meski masih unggul -- mulai merosot, yaitu 69,32% dibanding iOS yang mencapai 30%.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Sementara itu di negeri asalnya, iOS memang menguasai meski tak terlalu dominan. Di Amerika Serikat pangsa pasar iOS adalah 54% melawan Android yang pangsa pasarnya 45%.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Kecuali Apple tiba-tiba mendiskon harga iPhone secara drastis atau pendapatan perkapita di negara-negara berkembang meningkat drastis, posisi iOS ini mungkin tak akan berubah dalam jumlah banyak. Kemungkinannya hanya meningkat sedikit demi sedikit seperti yang terjadi saat ini.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Baca artikel detikinet, \"iPhone Gerogoti Pasar Android\" selengkapnya </span><a href=\"https://inet.detik.com/consumer/d-6049219/iphone-gerogoti-pasar-android\" style=\"background: rgb(255, 255, 255); color: rgb(0, 0, 0); transition: all 0.3s ease-in-out 0s; font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">https://inet.detik.com/consumer/d-6049219/iphone-gerogoti-pasar-android</a><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica-FF, Arial, Tahoma, sans-serif;\">Download Apps Detikcom Sekarang https://apps.detik.com/detik/</span><br></p>', 0, '2022-04-25', '2022-04-27', 'yes', '20220425104420', 'iphone-gerogoti-pasar-android'),
(12, 0, '', 'aaa', 'aaa', 'aaa', '<p>aaa</p>', 0, '2022-04-25', NULL, 'yes', '20220425104643', ''),
(14, 0, '', 'Bagaimana mengontrol kecepatan VLC Media Player', 'Bagaimana mengontrol kecepatan VLC Media Player', 'Bagaimana mengontrol kecepatan VLC Media Player', '<div class=\"rec_content\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; color: rgb(102, 102, 102); font-family: Lato, Arial, Helvetica, sans-serif;\"><div class=\"article_newCss container\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-size-adjust: none; width: 1000px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none;\"><h2 style=\"margin: 25px 0px; padding: 0px; text-size-adjust: none; font-size: 22px; font-weight: bold; line-height: 1.2em;\">Bagian 1: Bagaimana menggunakan VLC media player untuk mengontrol kecepatan pada windows?</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Seperti itu adalah open source software, Anda dapat mengunduh VLC dari <a href=\"http://www.videolan.org/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">videolan.org</a> atau dari sumber yang dapat dipercaya seperti <a href=\"http://www.cnet.com/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">cnet.com</a> atau <a href=\"http://www.softonic.com/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">softonic.com.</a> Download versi Mac itu. Ikuti langkah berikut untuk mengontrol kecepatan video menggunakan VLC.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">1. Jalankan VLC media player dan membuka video file dari media tab atau hanya dengan mengklik ganda file.</p><p class=\"ac\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; text-align: center; line-height: 1.6em;\"><img src=\"http://images.wondershare.com/images/video-and-audio/controlspeed-1.jpg\" title=\"controlspeed\" alt=\"controlspeed\" width=\"399\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">2. sekarang pergi ke pemutaran dan navigasikan ke kecepatan. Ada empat pilihan lebih cepat, lebih cepat (baik), normal kecepatan, lambat dan lambat (denda). Memilih lebih lambat atau lebih lambat, properti kecepatan sesuai dengan kenyamanan Anda sendiri.</p><p class=\"ac\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; text-align: center; line-height: 1.6em;\"><img src=\"http://images.wondershare.com/images/video-and-audio/controlspeed-2.jpg\" title=\"controlspeed\" alt=\"controlspeed\" width=\"317\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Sekarang bermain video oleh pemanasan spasi atau mengklik tombol play. Ini memakan waktu hanya dua langkah untuk mengontrol kecepatan. Gunakan langkah ruang untuk mendapatkan kembali kecepatan normal tetapi pilihan kecepatan normal dari menu kecepatan.</p><div class=\"line_dash\" style=\"margin: 0px; padding: 15px 0px; text-size-adjust: none; border-bottom: 1px dashed rgb(212, 220, 224);\"></div></div></div><div class=\"rec_content\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; color: rgb(102, 102, 102); font-family: Lato, Arial, Helvetica, sans-serif;\"><div class=\"article_newCss container\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-size-adjust: none; width: 1000px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none;\"><iframe allowtransparency=\"true\" scrolling=\"no\" frameborder=\"0\" framespacing=\"0\" width=\"728\" height=\"90\" src=\"about:blank\"></iframe><h2 style=\"margin: 25px 0px; padding: 0px; text-size-adjust: none; font-size: 22px; font-weight: bold; line-height: 1.2em;\"><a name=\"part2\" style=\"color: rgb(50, 164, 231);\"></a>Bagian 2: Bagaimana mengontrol kecepatan-menggunakan VLC pada Mac?</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Anda dapat mengontrol kecepatan pemutaran video Anda di VLC. Jika Anda dapat mengontrol kecepatan pemutaran, itu berarti bahwa Anda dapat menonton salah satu video dalam gerakan lambat atau hanya memiliki bermain dengan cepat, sebanyak yang Anda butuhkan.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Situs <a href=\"http://www.videolan.org/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">videolan.org</a> adalah sumber yang baik untuk men-download VLC media player. Download versi Mac VLC dari website. Namun, Anda juga dapat mengunduh dari sumber-sumber seperti download. <a href=\"http://www.cnet.com/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">CNET.com</a> dan <a href=\"http://www.softonic.com/\" target=\"_blank\" style=\"color: rgb(50, 164, 231);\">softonic.com</a>. Ikuti langkah-langkah berikut untuk mengontrol kecepatan video Anda.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">1. peluncuran video menggunakan VLC media player atau Anda dapat membuka menu Media menggunakan pilihan buka File.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">2. sekarang, navigasikan ke pemutaran dan membuka pilihan dari kecepatan. Anda akan dua variasi kecepatan lambat dan cepat. Menggunakan yang Anda suka dan memutar video.</p><p class=\"ac\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; text-align: center; line-height: 1.6em;\"><img src=\"http://images.wondershare.com/images/video-and-audio/controlspeed-3.jpg\" title=\"controlspeed\" alt=\"controlspeed\" width=\"545\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; border: 0px; max-width: 100%;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Anda mungkin menemukan sedikit gangguan jika Anda bermain video format berat yang memiliki ukuran file dalam GBs. Anda dapat selalu bermain biasanya dengan pergi ke opsi kecepatan dan memilih kecepatan normal.</p><div class=\"line_dash\" style=\"margin: 0px; padding: 15px 0px; text-size-adjust: none; border-bottom: 1px dashed rgb(212, 220, 224);\"></div></div></div><div class=\"rec_content\" style=\"margin: 0px; padding: 0px; text-size-adjust: none; color: rgb(102, 102, 102); font-family: Lato, Arial, Helvetica, sans-serif;\"><div class=\"article_newCss container\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; text-size-adjust: none; width: 1000px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: none;\"><iframe allowtransparency=\"true\" scrolling=\"no\" frameborder=\"0\" framespacing=\"0\" width=\"728\" height=\"90\" src=\"about:blank\"></iframe><h2 style=\"margin: 25px 0px; padding: 0px; text-size-adjust: none; font-size: 22px; font-weight: bold; line-height: 1.2em;\"><a name=\"part3\" style=\"color: rgb(50, 164, 231);\"></a>Bagian 3: Menggunakan gerakan lambat hotkey</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 10px 0px 24px; text-size-adjust: none; line-height: 1.6em;\">Jika Anda tidak ingin untuk berhenti sejenak dan pergi ke menu untuk memperlambat video, Anda dapat menggunakan hotkeys untuk memperlambat video dengan mudah. HotKeys menawarkan banyak lebih baik kontrol atas kecepatan karena memiliki banyak variasi ketika datang untuk memperlambat kecepatan. Anda dapat memperlambat video dari normal 1.0 x untuk rendah sebagai sebagai .03x dan terdapat 10</p></div></div>', 0, '2022-04-25', '2022-04-27', 'yes', '20220425105147', 'bagaimana-mengontrol-kecepatan-vlc-media-player'),
(15, 0, '', 'Australia’s Drupal website design, development & hosting experts', 'Australia’s Drupal website design, development & hosting experts', 'Australia’s Drupal website design, development & hosting experts', '<div class=\"spacing--after-l views-row\" style=\"margin-bottom: 48px; color: rgb(255, 255, 255); font-family: Rational, Helvetica, Arial, sans-serif; font-size: 18px; background-color: rgb(22, 27, 89);\"><article><h3 style=\"margin-bottom: 16px; max-width: 688px; font-weight: 700; font-size: 1.33333rem; line-height: 1.77778rem;\"><a href=\"https://www.previousnext.com.au/blog/hux-alternative-to-hooks\" hreflang=\"en\" style=\"color: inherit;\">A modern alternative to Hooks</a></h3><div class=\"author author--short\" style=\"font-size: 0.88889rem; line-height: 1.33333rem; margin-top: 16px; margin-bottom: 16px; align-items: center;\">by <a href=\"https://www.previousnext.com.au/about/team/danielphin\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">daniel.phin</a> / <time datetime=\"Wed, 04/27/2022 - 11:22Z\">27 April 2022</time></div><div class=\"text--no-summary spacing--after-xs\" style=\"margin-bottom: 16px;\"><p style=\"margin-bottom: 0px; max-width: 688px;\"><span style=\"font-weight: 700;\">This post introduces a completely new way of implementing Drupal hooks. You can finally get rid of your </span><code style=\"font-family: \"Fira Mono\", monospace, monospace; font-size: 0.88889rem; line-height: 1.33333rem; color: rgb(180, 182, 213);\"><span style=\"font-weight: 700;\">.module</span></code><span style=\"font-weight: 700;\"> files, eliminating many calls to </span><code style=\"font-family: \"Fira Mono\", monospace, monospace; font-size: 0.88889rem; line-height: 1.33333rem; color: rgb(180, 182, 213);\"><span style=\"font-weight: 700;\">\\Drupal</span></code><span style=\"font-weight: 700;\"> with dependency injection in hooks.</span></p></div><a href=\"https://www.previousnext.com.au/blog/hux-alternative-to-hooks\" hreflang=\"en\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Read the full post</a></article></div><div class=\"spacing--after-l views-row\" style=\"margin-bottom: 48px; color: rgb(255, 255, 255); font-family: Rational, Helvetica, Arial, sans-serif; font-size: 18px; background-color: rgb(22, 27, 89);\"><article><h3 style=\"margin-bottom: 16px; max-width: 688px; font-weight: 700; font-size: 1.33333rem; line-height: 1.77778rem;\"><a href=\"https://www.previousnext.com.au/blog/previousnext-sets-new-path-employee-ownership\" hreflang=\"en\" style=\"color: inherit;\">PreviousNext sets a new path with Employee Ownership</a></h3><div class=\"author author--short\" style=\"font-size: 0.88889rem; line-height: 1.33333rem; margin-top: 16px; margin-bottom: 16px; align-items: center;\">by <a href=\"https://www.previousnext.com.au/about/team/owen-lansbury\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Owen Lansbury</a> / <time datetime=\"Mon, 02/28/2022 - 16:13Z\">28 February 2022</time></div><div class=\"text--no-summary spacing--after-xs\" style=\"margin-bottom: 16px;\"><p style=\"margin-bottom: 0px; max-width: 688px;\">As we enter our 14th year of operations in 2022, PreviousNext is taking a bold step into employee ownership, utilising a groundbreaking approach that’s only recently become possible in Australia.</p></div><a href=\"https://www.previousnext.com.au/blog/previousnext-sets-new-path-employee-ownership\" hreflang=\"en\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Read the full post</a></article></div><div class=\"spacing--after-l views-row\" style=\"margin-bottom: 48px; color: rgb(255, 255, 255); font-family: Rational, Helvetica, Arial, sans-serif; font-size: 18px; background-color: rgb(22, 27, 89);\"><article><h3 style=\"margin-bottom: 16px; max-width: 688px; font-weight: 700; font-size: 1.33333rem; line-height: 1.77778rem;\"><a href=\"https://www.previousnext.com.au/blog/introducing-search-api-opensearch\" hreflang=\"en\" style=\"color: inherit;\">Introducing Search API OpenSearch</a></h3><div class=\"author author--short\" style=\"font-size: 0.88889rem; line-height: 1.33333rem; margin-top: 16px; margin-bottom: 16px; align-items: center;\">by <a href=\"https://www.previousnext.com.au/about/team/kim-pepper\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">kim.pepper</a> / <time datetime=\"Wed, 12/08/2021 - 12:57Z\">8 December 2021</time></div><div class=\"text--no-summary spacing--after-xs\" style=\"margin-bottom: 16px;\"><p style=\"margin-bottom: 24px; max-width: 688px;\">This year a fork of <a href=\"https://www.elastic.co/elasticsearch/\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Elasticsearch</a> was created called <a href=\"https://opensearch.org/\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">OpenSearch</a>. The reasons behind it are varied, and I\'m not going to get into that side of things other than to say there are <a href=\"https://www.elastic.co/what-is/opensearch\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">two</a> <a href=\"https://aws.amazon.com/blogs/opensource/introducing-opensearch/\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">sides</a> to every story, and it didn\'t end well.</p><p style=\"margin-top: 24px; margin-bottom: 24px; max-width: 688px;\">Our <a href=\"https://www.skpr.com.au/\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Skpr</a> hosting platform offers a <a href=\"https://www.skpr.com.au/blog/elasticsearch-overview\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">managed AWS Elasticsearch service</a>. As a result of the split, AWS has deprecated Elasticsearch and is migrating all of its managed services to OpenSearch.</p><p style=\"margin-top: 24px; margin-bottom: 24px; max-width: 688px;\">This left us in a bit of a difficult situation.</p><p style=\"margin-top: 24px; margin-bottom: 0px; max-width: 688px;\">In this blog post, we explain our rationale for choosing to fork <a href=\"https://www.drupal.org/project/elasticsearch_connector\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Elasticsearch Connector</a> and create a new <a href=\"https://www.drupal.org/project/search_api_opensearch\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Search API OpenSearch</a> module.</p></div><a href=\"https://www.previousnext.com.au/blog/introducing-search-api-opensearch\" hreflang=\"en\" style=\"color: rgb(200, 241, 255); text-decoration-line: underline;\">Read the full post</a></article></div>', 0, '2022-05-06', '2022-05-06', 'yes', '20220506105306', 'australias-drupal-website-design-development-hosting-experts'),
(16, 0, '', 'aaa_aaaa-aa_fdwf_fw_fwef.efef.qe.wf', 'aaa_aaaa-aa_fdwf_fw_fwef.efef.qe.wf', 'aaa_aaaa-aa_fdwf_fw_fwef.efef.qe.wf', '<p>ahhhh&nbsp; masa</p>', 0, '2022-05-16', NULL, 'yes', '20220516153608', 'aaa-aaaa-aa-fdwf-fw-fwef-efef-qe-wf'),
(17, 0, '', 'coba embed', 'coba embed', 'coba embed', '<p>&lt;a class=\"twitter-timeline\" href=\"https://twitter.com/ibods?ref_src=twsrc%5Etfw\"&gt;Tweets by ibods&lt;/a&gt; &lt;script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"&gt;&lt;/script&gt;<br></p>', 0, '2022-05-19', NULL, 'yes', '20220519115918', 'coba-embed'),
(18, 0, 'news20220519132459', 'Tips pintar', 'Tips pintar', 'Tips pintar', '<h2 style=\"-webkit-tap-highlight-color: transparent; font-family: Tahoma, Geneva, sans-serif; font-weight: 700; line-height: 1.618; color: rgb(51, 51, 51); margin-right: 0px; margin-bottom: 15px; margin-left: 0px; font-size: 33px; letter-spacing: 0.1px;\">Contoh Program Codeigniter Mengunakan Kondisi Where dan Where in</h2><p style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.618; color: rgb(51, 51, 51); font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.1px;\">1. Buatlah Database “indonetsource” di phpmyadmin. (Silahkan buat database dengan nama lain atau gunakan database yang sudah ada</p><p style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.618; color: rgb(51, 51, 51); font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.1px;\">2. Buatlah tabel karyawan pada database</p><p class=\"has-cyan-bluish-gray-background-color has-background\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 1.25em 2.375em; background-color: rgb(171, 184, 195); line-height: 1.618; color: rgb(51, 51, 51); font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.1px;\">CREATE TABLE `karyawan` (<br style=\"-webkit-tap-highlight-color: transparent;\">&nbsp;`id` int(11) NOT NULL AUTO_INCREMENT,<br style=\"-webkit-tap-highlight-color: transparent;\">&nbsp;`nama` varchar(50) NOT NULL,<br style=\"-webkit-tap-highlight-color: transparent;\">&nbsp;`jenis_kelamin` enum(‘Laki-laki’,’Perempuan’) NOT NULL,<br style=\"-webkit-tap-highlight-color: transparent;\">&nbsp;`alamat` varchar(100) NOT NULL,<br style=\"-webkit-tap-highlight-color: transparent;\">&nbsp;PRIMARY KEY (`id`)<br style=\"-webkit-tap-highlight-color: transparent;\">) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1</p><p style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.618; color: rgb(51, 51, 51); font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.1px;\">.3.&nbsp;<a href=\"https://www.indonetsource.com/instalasi-codeigniter-dan-menghilangkan-index-php-untuk-mempersingkat-url/\" target=\"_blank\" rel=\"noreferrer noopener\" style=\"-webkit-tap-highlight-color: transparent; color: rgb(32, 114, 247); transition: all 0.3s ease 0s;\">Instalasi codeigniter</a>&nbsp;pada komputer dan lakukan config database untuk koneksi database ke codeigniter project.</p><p style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.618; color: rgb(51, 51, 51); font-family: Georgia, serif; font-size: 18px; letter-spacing: 0.1px;\">4. Selesaikan script pada Model, Controller dan View</p>', 0, '2022-05-19', NULL, 'yes', '20220519132445', 'tips-pintar'),
(19, 0, 'news20220519134719', 'coba tag', 'coba tag', 'coba tag', '<p>name=\"tag\" value=\"\" placeholder=\"tag 1, tag 2, tag 3\"<br></p>', 0, '2022-05-19', NULL, 'yes', '20220519134617', 'coba-tag'),
(20, 1, 'news20220619002005', 'coab', 'coab', 'coab', '<p style=\"text-align: center; \"><b><span style=\"font-size: 36px;\"><font color=\"#ff0000\">halo</font></span></b></p><p style=\"text-align: center; \">hahahahahahha<img src=\"http://localhost/elhace/back/upload_file/news/20220619001906/WhatsApp_Image_2022-06-06_at_09_03_05.jpeg\" style=\"width: 678px;\"></p>', 0, '2022-06-19', NULL, 'yes', '20220619001906', 'coab'),
(21, 1, 'news20220619003631', 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', '<p>wfwfwfw</p>', 0, '2022-06-08', '0000-00-00', 'yes', '20220619003613', 'xxxxxxxxx'),
(22, 1, 'news20220619003729', 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzz', 'zzzzzzzzzzzzz', '<p>adfwfwfwf</p>', 0, '2022-06-04', NULL, 'no', '20220619003711', 'zzzzzzzzzzzzz'),
(23, 1, 'news20220619003917', 'ddddd', 'ddddd', 'ddddd', '<p>kjbmjjjk</p>', 0, '2022-06-18', '2022-06-19', 'yes', '20220619003806', 'ddddd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_category`
--

CREATE TABLE `news_category` (
  `id_news_category` int(11) NOT NULL,
  `news_category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news_category`
--

INSERT INTO `news_category` (`id_news_category`, `news_category_name`) VALUES
(1, 'Techno'),
(4, 'Komedi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_tag`
--

CREATE TABLE `news_tag` (
  `id_tag` int(11) NOT NULL,
  `number_news` varchar(50) NOT NULL,
  `tagar` varchar(200) NOT NULL,
  `tag_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news_tag`
--

INSERT INTO `news_tag` (`id_tag`, `number_news`, `tagar`, `tag_slug`) VALUES
(1, 'news20220519134719', 'cobatag', 'cobatag'),
(2, 'news20220519134719', 'lagi_tag', 'lagi-tag'),
(3, 'news20220519134719', 'coba_aja', 'coba-aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_view`
--

CREATE TABLE `news_view` (
  `id_news_view` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `ip` varchar(70) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `access_date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news_view`
--

INSERT INTO `news_view` (`id_news_view`, `id_news`, `ip`, `browser`, `os`, `access_date`, `time`) VALUES
(45, 11, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:21'),
(46, 11, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:22'),
(47, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:36'),
(48, 14, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:59'),
(49, 14, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:09'),
(50, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:15'),
(51, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:16'),
(52, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:17'),
(53, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:17'),
(54, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:18'),
(55, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:18'),
(56, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:18'),
(57, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:23'),
(58, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:24'),
(59, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:25'),
(60, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:27'),
(61, 16, '::1', 'Chrome', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', '2022-05-16', '21:28'),
(62, 16, '::1', 'Chrome', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', '2022-05-16', '21:30'),
(63, 16, '::1', 'Chrome', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', '2022-05-16', '21:32'),
(64, 16, '::1', 'Chrome', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', '2022-05-16', '21:34'),
(65, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:35'),
(66, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:35'),
(67, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:36'),
(68, 10, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:41'),
(69, 10, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:42'),
(70, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:42'),
(71, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:43'),
(72, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:45'),
(73, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:45'),
(74, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:46'),
(75, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:47'),
(76, 10, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:48'),
(77, 10, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:00'),
(78, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:03'),
(79, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:04'),
(80, 15, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:12'),
(81, 11, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:13'),
(82, 16, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:13'),
(83, 15, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:21'),
(84, 17, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-19', '12:00'),
(85, 19, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '18:54'),
(86, 19, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '18:54'),
(87, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:48'),
(88, 21, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:50'),
(89, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:50'),
(90, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:51'),
(91, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:52'),
(92, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:55'),
(93, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:56'),
(94, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:57'),
(95, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:58'),
(96, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:59'),
(97, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '00:59'),
(98, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '01:00'),
(99, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '01:01'),
(100, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '01:18'),
(101, 21, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '01:19'),
(102, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:49'),
(103, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:50'),
(104, 23, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', '2023-06-19', '19:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `create_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `portfolio_status` varchar(20) NOT NULL,
  `url_slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `id_category`, `meta_description`, `meta_keyword`, `title`, `image`, `description`, `create_date`, `updated_date`, `portfolio_status`, `url_slug`) VALUES
(1, 2, '', '', '', '51-bodro-bilowo-elhace-what_makes_a_legend.jpg', '', '2022-04-25', '0000-00-00', 'yes', '51-bodro-bilowo-elhace-what-makes-a-legend-jpg'),
(4, 5, '', '', '', '1247-bodro-bilowo-elhace-52-bodro-bilowo-elhace-lamacat.jpg', '', '2022-04-27', '0000-00-00', 'yes', '1247-bodro-bilowo-elhace-52-bodro-bilowo-elhace-lamacat-jpg'),
(5, 5, '', '', '', 'bodro-bilowo-elhace-c21f9789-be9c-4754-9d77-cd77e3f27cfb_169.jpeg', '', '2022-04-27', '0000-00-00', 'yes', 'bodro-bilowo-elhace-c21f9789-be9c-4754-9d77-cd77e3f27cfb-69-jpeg'),
(7, 5, 'abc 1ff fefef ll vv - ini abc1', 'abc 1ff fefef ll vv', 'abc 1ff fefef ll vv', 'bodro-bilowo-elhace-Untitled-1.jpg', 'ini abc1', '2022-05-12', '2022-06-25', 'yes', 'bodro-bilowo-elhace-untitled-1-jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portfolio_category`
--

INSERT INTO `portfolio_category` (`id_category`, `category_name`) VALUES
(2, 'Lamacat NFT'),
(5, 'Ilustration');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio_view`
--

CREATE TABLE `portfolio_view` (
  `id_portfolio_view` int(11) NOT NULL,
  `id_portfolio` int(11) NOT NULL,
  `ip` varchar(70) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `access_date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portfolio_view`
--

INSERT INTO `portfolio_view` (`id_portfolio_view`, `id_portfolio`, `ip`, `browser`, `os`, `access_date`, `time`) VALUES
(1, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:26'),
(2, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:28'),
(3, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '15:34'),
(4, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '19:53'),
(5, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '20:50'),
(6, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '21:14'),
(7, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:00'),
(8, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:01'),
(9, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:01'),
(10, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:01'),
(11, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:01'),
(12, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:01'),
(13, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:02'),
(14, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:02'),
(15, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:03'),
(16, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:03'),
(17, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:03'),
(18, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:18'),
(19, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:19'),
(20, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:19'),
(21, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:19'),
(22, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:19'),
(23, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:20'),
(24, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:20'),
(25, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '22:20'),
(26, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '15:39'),
(27, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '13:27'),
(28, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '13:27'),
(29, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '13:27'),
(30, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-22', '13:43'),
(31, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-19', '01:26'),
(32, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:05'),
(33, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:06'),
(34, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:44'),
(35, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:46'),
(36, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:47'),
(37, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:48'),
(38, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:48'),
(39, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:50'),
(40, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:51'),
(41, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:51'),
(42, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:51'),
(43, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:51'),
(44, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:51'),
(45, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:52'),
(46, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:52'),
(47, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:52'),
(48, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:52'),
(49, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:52'),
(50, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:53'),
(51, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:53'),
(52, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:54'),
(53, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:55'),
(54, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:55'),
(55, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:55'),
(56, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:56'),
(57, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:56'),
(58, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:57'),
(59, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:57'),
(60, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:58'),
(61, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:58'),
(62, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:59'),
(63, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:00'),
(64, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:01'),
(65, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:10'),
(66, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:12'),
(67, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:13'),
(68, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:17'),
(69, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:17'),
(70, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:20'),
(71, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:21'),
(72, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:26'),
(73, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:26'),
(74, 8, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:26'),
(75, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:26'),
(76, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:33'),
(77, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '02:58'),
(78, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '03:07'),
(79, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '03:26'),
(80, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '08:58'),
(81, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '09:49'),
(82, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '09:50'),
(83, 9, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '09:54'),
(84, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '11:19'),
(85, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:33'),
(86, 4, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:35'),
(87, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:35'),
(88, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:45'),
(89, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:46'),
(90, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:56'),
(91, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:56'),
(92, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '12:59'),
(93, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:00'),
(94, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:00'),
(95, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:00'),
(96, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:05'),
(97, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:08'),
(98, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:10'),
(99, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:10'),
(100, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:14'),
(101, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:14'),
(102, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:19'),
(103, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:19'),
(104, 1, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '13:20'),
(105, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:51'),
(106, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:51'),
(107, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:51'),
(108, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:52'),
(109, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:52'),
(110, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:52'),
(111, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:52'),
(112, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:52'),
(113, 5, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:53'),
(114, 7, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '11:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `traffic`
--

CREATE TABLE `traffic` (
  `id_traffic` int(11) NOT NULL,
  `ip` varchar(70) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `access_date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `traffic`
--

INSERT INTO `traffic` (`id_traffic`, `ip`, `browser`, `os`, `access_date`, `time`) VALUES
(35, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.5', '2022-05-12', '09:20'),
(36, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '00:43'),
(37, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '00:46'),
(38, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '00:47'),
(39, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '00:53'),
(40, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '00:53'),
(41, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-14', '01:21'),
(42, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-15', '17:29'),
(44, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-16', '13:57'),
(45, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-17', '08:09'),
(46, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-18', '17:41'),
(47, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-19', '12:00'),
(48, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-20', '12:53'),
(49, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.6', '2022-05-21', '15:15'),
(50, '::1', 'Chrome', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome', '2022-05-22', '05:46'),
(51, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.6', '2022-06-03', '23:10'),
(52, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-16', '17:52'),
(53, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-18', '22:17'),
(54, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '00:22'),
(55, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '01:05'),
(56, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-21', '03:15'),
(57, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-22', '08:36'),
(58, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-23', '19:11'),
(59, '127.0.0.1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:27'),
(60, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Sa', '2022-06-28', '10:46'),
(61, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Sa', '2022-07-06', '10:41'),
(62, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Sa', '2022-08-01', '09:14'),
(63, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', '2023-06-19', '18:42'),
(64, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Sa', '2023-07-30', '12:27'),
(65, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-08-25', '23:48'),
(66, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:20'),
(67, '::2', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:22'),
(68, '0', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(69, '5', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(70, '2', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(71, '3', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(72, '4', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(73, '1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(74, '6', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(75, '7', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(76, '8', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(77, '9', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-11', '11:25'),
(78, '::1', 'Chrome', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Sa', '2023-09-15', '09:14'),
(79, '0000000', 'tor0', 'PENTAGON0', '2023-09-15', '09:19'),
(80, '0000001', 'tor1', 'PENTAGON1', '2023-09-15', '09:19'),
(81, '0000003', 'tor3', 'PENTAGON3', '2023-09-15', '09:19'),
(82, '0000004', 'tor4', 'PENTAGON4', '2023-09-15', '09:19'),
(83, '0000005', 'tor5', 'PENTAGON5', '2023-09-15', '09:19'),
(84, '0000006', 'tor6', 'PENTAGON6', '2023-09-15', '09:19'),
(85, '0000002', 'tor2', 'PENTAGON2', '2023-09-15', '09:19'),
(86, '0000007', 'tor7', 'PENTAGON7', '2023-09-15', '09:19'),
(87, '0000008', 'tor8', 'PENTAGON8', '2023-09-15', '09:19'),
(88, '0000009', 'tor9', 'PENTAGON9', '2023-09-15', '09:19'),
(89, '0000902', 'tor2', 'PENTAGON2', '2023-09-15', '09:22'),
(90, '0000900', 'tor0', 'PENTAGON0', '2023-09-15', '09:22'),
(91, '0000903', 'tor3', 'PENTAGON3', '2023-09-15', '09:22'),
(92, '0000901', 'tor1', 'PENTAGON1', '2023-09-15', '09:22'),
(93, '0000904', 'tor4', 'PENTAGON4', '2023-09-15', '09:22'),
(94, '0000905', 'tor5', 'PENTAGON5', '2023-09-15', '09:22'),
(95, '0000906', 'tor6', 'PENTAGON6', '2023-09-15', '09:22'),
(96, '0000907', 'tor7', 'PENTAGON7', '2023-09-15', '09:22'),
(97, '0000908', 'tor8', 'PENTAGON8', '2023-09-15', '09:22'),
(98, '0000909', 'tor9', 'PENTAGON9', '2023-09-15', '09:22'),
(99, 'fuckyou2', 'Mek2', 'meki2', '2023-09-15', '09:26'),
(100, 'fuckyou1', 'Mek1', 'meki1', '2023-09-15', '09:26'),
(101, 'fuckyou4', 'Mek4', 'meki4', '2023-09-15', '09:26'),
(102, 'fuckyou3', 'Mek3', 'meki3', '2023-09-15', '09:26'),
(103, 'fuckyou0', 'Mek0', 'meki0', '2023-09-15', '09:26'),
(104, 'fuckyou5', 'Mek5', 'meki5', '2023-09-15', '09:26'),
(105, 'fuckyou7', 'Mek7', 'meki7', '2023-09-15', '09:26'),
(106, 'fuckyou6', 'Mek6', 'meki6', '2023-09-15', '09:26'),
(107, 'fuckyou8', 'Mek8', 'meki8', '2023-09-15', '09:26'),
(108, 'fuckyou9', 'Mek9', 'meki9', '2023-09-15', '09:26'),
(109, 'fuckyou10', 'Mek10', 'meki10', '2023-09-15', '09:26'),
(110, 'fuckyou11', 'Mek11', 'meki11', '2023-09-15', '09:26'),
(111, 'fuckyou14', 'Mek14', 'meki14', '2023-09-15', '09:26'),
(112, 'fuckyou13', 'Mek13', 'meki13', '2023-09-15', '09:26'),
(113, 'fuckyou12', 'Mek12', 'meki12', '2023-09-15', '09:26'),
(114, 'fuckyou15', 'Mek15', 'meki15', '2023-09-15', '09:26'),
(115, 'fuckyou16', 'Mek16', 'meki16', '2023-09-15', '09:26'),
(116, 'fuckyou17', 'Mek17', 'meki17', '2023-09-15', '09:26'),
(117, 'fuckyou18', 'Mek18', 'meki18', '2023-09-15', '09:26'),
(118, 'fuckyou20', 'Mek20', 'meki20', '2023-09-15', '09:26'),
(119, 'fuckyou19', 'Mek19', 'meki19', '2023-09-15', '09:26'),
(120, 'fuckyou21', 'Mek21', 'meki21', '2023-09-15', '09:26'),
(121, 'fuckyou23', 'Mek23', 'meki23', '2023-09-15', '09:26'),
(122, 'fuckyou22', 'Mek22', 'meki22', '2023-09-15', '09:26'),
(123, 'fuckyou24', 'Mek24', 'meki24', '2023-09-15', '09:26'),
(124, 'fuckyou26', 'Mek26', 'meki26', '2023-09-15', '09:26'),
(125, 'fuckyou25', 'Mek25', 'meki25', '2023-09-15', '09:26'),
(126, 'fuckyou27', 'Mek27', 'meki27', '2023-09-15', '09:26'),
(127, 'fuckyou28', 'Mek28', 'meki28', '2023-09-15', '09:26'),
(128, 'fuckyou29', 'Mek29', 'meki29', '2023-09-15', '09:26'),
(129, 'fuckyou30', 'Mek30', 'meki30', '2023-09-15', '09:26'),
(130, 'fuckyou32', 'Mek32', 'meki32', '2023-09-15', '09:26'),
(131, 'fuckyou33', 'Mek33', 'meki33', '2023-09-15', '09:26'),
(132, 'fuckyou31', 'Mek31', 'meki31', '2023-09-15', '09:26'),
(133, 'fuckyou36', 'Mek36', 'meki36', '2023-09-15', '09:26'),
(134, 'fuckyou34', 'Mek34', 'meki34', '2023-09-15', '09:26'),
(135, 'fuckyou35', 'Mek35', 'meki35', '2023-09-15', '09:26'),
(136, 'fuckyou38', 'Mek38', 'meki38', '2023-09-15', '09:26'),
(137, 'fuckyou37', 'Mek37', 'meki37', '2023-09-15', '09:26'),
(138, 'fuckyou39', 'Mek39', 'meki39', '2023-09-15', '09:26'),
(139, 'fuckyou40', 'Mek40', 'meki40', '2023-09-15', '09:26'),
(140, 'fuckyou42', 'Mek42', 'meki42', '2023-09-15', '09:26'),
(141, 'fuckyou43', 'Mek43', 'meki43', '2023-09-15', '09:26'),
(142, 'fuckyou41', 'Mek41', 'meki41', '2023-09-15', '09:26'),
(143, 'fuckyou47', 'Mek47', 'meki47', '2023-09-15', '09:26'),
(144, 'fuckyou44', 'Mek44', 'meki44', '2023-09-15', '09:26'),
(145, 'fuckyou48', 'Mek48', 'meki48', '2023-09-15', '09:26'),
(146, 'fuckyou46', 'Mek46', 'meki46', '2023-09-15', '09:26'),
(147, 'fuckyou45', 'Mek45', 'meki45', '2023-09-15', '09:26'),
(148, 'fuckyou49', 'Mek49', 'meki49', '2023-09-15', '09:26'),
(149, 'fuckyou52', 'Mek52', 'meki52', '2023-09-15', '09:26'),
(150, 'fuckyou53', 'Mek53', 'meki53', '2023-09-15', '09:26'),
(151, 'fuckyou51', 'Mek51', 'meki51', '2023-09-15', '09:26'),
(152, 'fuckyou55', 'Mek55', 'meki55', '2023-09-15', '09:26'),
(153, 'fuckyou50', 'Mek50', 'meki50', '2023-09-15', '09:26'),
(154, 'fuckyou54', 'Mek54', 'meki54', '2023-09-15', '09:26'),
(155, 'fuckyou57', 'Mek57', 'meki57', '2023-09-15', '09:26'),
(156, 'fuckyou56', 'Mek56', 'meki56', '2023-09-15', '09:26'),
(157, 'fuckyou58', 'Mek58', 'meki58', '2023-09-15', '09:26'),
(158, 'fuckyou59', 'Mek59', 'meki59', '2023-09-15', '09:26'),
(159, 'fuckyou60', 'Mek60', 'meki60', '2023-09-15', '09:26'),
(160, 'fuckyou61', 'Mek61', 'meki61', '2023-09-15', '09:26'),
(161, 'fuckyou63', 'Mek63', 'meki63', '2023-09-15', '09:26'),
(162, 'fuckyou64', 'Mek64', 'meki64', '2023-09-15', '09:26'),
(163, 'fuckyou66', 'Mek66', 'meki66', '2023-09-15', '09:26'),
(164, 'fuckyou65', 'Mek65', 'meki65', '2023-09-15', '09:26'),
(165, 'fuckyou62', 'Mek62', 'meki62', '2023-09-15', '09:26'),
(166, 'fuckyou68', 'Mek68', 'meki68', '2023-09-15', '09:26'),
(167, 'fuckyou69', 'Mek69', 'meki69', '2023-09-15', '09:26'),
(168, 'fuckyou67', 'Mek67', 'meki67', '2023-09-15', '09:26'),
(169, 'fuckyou70', 'Mek70', 'meki70', '2023-09-15', '09:26'),
(170, 'fuckyou72', 'Mek72', 'meki72', '2023-09-15', '09:26'),
(171, 'fuckyou73', 'Mek73', 'meki73', '2023-09-15', '09:26'),
(172, 'fuckyou71', 'Mek71', 'meki71', '2023-09-15', '09:26'),
(173, 'fuckyou74', 'Mek74', 'meki74', '2023-09-15', '09:26'),
(174, 'fuckyou77', 'Mek77', 'meki77', '2023-09-15', '09:26'),
(175, 'fuckyou75', 'Mek75', 'meki75', '2023-09-15', '09:26'),
(176, 'fuckyou78', 'Mek78', 'meki78', '2023-09-15', '09:26'),
(177, 'fuckyou76', 'Mek76', 'meki76', '2023-09-15', '09:26'),
(178, 'fuckyou79', 'Mek79', 'meki79', '2023-09-15', '09:26'),
(179, 'fuckyou82', 'Mek82', 'meki82', '2023-09-15', '09:26'),
(180, 'fuckyou81', 'Mek81', 'meki81', '2023-09-15', '09:26'),
(181, 'fuckyou80', 'Mek80', 'meki80', '2023-09-15', '09:26'),
(182, 'fuckyou84', 'Mek84', 'meki84', '2023-09-15', '09:26'),
(183, 'fuckyou83', 'Mek83', 'meki83', '2023-09-15', '09:26'),
(184, 'fuckyou86', 'Mek86', 'meki86', '2023-09-15', '09:26'),
(185, 'fuckyou90', 'Mek90', 'meki90', '2023-09-15', '09:26'),
(186, 'fuckyou89', 'Mek89', 'meki89', '2023-09-15', '09:26'),
(187, 'fuckyou85', 'Mek85', 'meki85', '2023-09-15', '09:26'),
(188, 'fuckyou88', 'Mek88', 'meki88', '2023-09-15', '09:26'),
(189, 'fuckyou87', 'Mek87', 'meki87', '2023-09-15', '09:26'),
(190, 'fuckyou91', 'Mek91', 'meki91', '2023-09-15', '09:26'),
(191, 'fuckyou92', 'Mek92', 'meki92', '2023-09-15', '09:26'),
(192, 'fuckyou93', 'Mek93', 'meki93', '2023-09-15', '09:26'),
(193, 'fuckyou94', 'Mek94', 'meki94', '2023-09-15', '09:26'),
(194, 'fuckyou97', 'Mek97', 'meki97', '2023-09-15', '09:26'),
(195, 'fuckyou96', 'Mek96', 'meki96', '2023-09-15', '09:26'),
(196, 'fuckyou95', 'Mek95', 'meki95', '2023-09-15', '09:26'),
(197, 'fuckyou98', 'Mek98', 'meki98', '2023-09-15', '09:26'),
(198, 'fuckyou99', 'Mek99', 'meki99', '2023-09-15', '09:26'),
(199, 'fuckyou100', 'Mek100', 'meki100', '2023-09-15', '09:27'),
(200, 'fuckyou101', 'Mek101', 'meki101', '2023-09-15', '09:27'),
(201, 'fuckyou102', 'Mek102', 'meki102', '2023-09-15', '09:27'),
(202, 'fuckyou105', 'Mek105', 'meki105', '2023-09-15', '09:27'),
(203, 'fuckyou104', 'Mek104', 'meki104', '2023-09-15', '09:27'),
(204, 'fuckyou103', 'Mek103', 'meki103', '2023-09-15', '09:27'),
(205, 'fuckyou106', 'Mek106', 'meki106', '2023-09-15', '09:27'),
(206, 'fuckyou107', 'Mek107', 'meki107', '2023-09-15', '09:27'),
(207, 'fuckyou108', 'Mek108', 'meki108', '2023-09-15', '09:27'),
(208, 'fuckyou109', 'Mek109', 'meki109', '2023-09-15', '09:27'),
(209, 'fuckyou110', 'Mek110', 'meki110', '2023-09-15', '09:27'),
(210, 'fuckyou113', 'Mek113', 'meki113', '2023-09-15', '09:27'),
(211, 'fuckyou111', 'Mek111', 'meki111', '2023-09-15', '09:27'),
(212, 'fuckyou114', 'Mek114', 'meki114', '2023-09-15', '09:27'),
(213, 'fuckyou115', 'Mek115', 'meki115', '2023-09-15', '09:27'),
(214, 'fuckyou116', 'Mek116', 'meki116', '2023-09-15', '09:27'),
(215, 'fuckyou112', 'Mek112', 'meki112', '2023-09-15', '09:27'),
(216, 'fuckyou117', 'Mek117', 'meki117', '2023-09-15', '09:27'),
(217, 'fuckyou118', 'Mek118', 'meki118', '2023-09-15', '09:27'),
(218, 'fuckyou120', 'Mek120', 'meki120', '2023-09-15', '09:27'),
(219, 'fuckyou119', 'Mek119', 'meki119', '2023-09-15', '09:27'),
(220, 'fuckyou121', 'Mek121', 'meki121', '2023-09-15', '09:27'),
(221, 'fuckyou122', 'Mek122', 'meki122', '2023-09-15', '09:27'),
(222, 'fuckyou123', 'Mek123', 'meki123', '2023-09-15', '09:27'),
(223, 'fuckyou124', 'Mek124', 'meki124', '2023-09-15', '09:27'),
(224, 'fuckyou127', 'Mek127', 'meki127', '2023-09-15', '09:27'),
(225, 'fuckyou125', 'Mek125', 'meki125', '2023-09-15', '09:27'),
(226, 'fuckyou126', 'Mek126', 'meki126', '2023-09-15', '09:27'),
(227, 'fuckyou128', 'Mek128', 'meki128', '2023-09-15', '09:27'),
(228, 'fuckyou129', 'Mek129', 'meki129', '2023-09-15', '09:27'),
(229, 'fuckyou131', 'Mek131', 'meki131', '2023-09-15', '09:27'),
(230, 'fuckyou130', 'Mek130', 'meki130', '2023-09-15', '09:27'),
(231, 'fuckyou132', 'Mek132', 'meki132', '2023-09-15', '09:27'),
(232, 'fuckyou135', 'Mek135', 'meki135', '2023-09-15', '09:27'),
(233, 'fuckyou133', 'Mek133', 'meki133', '2023-09-15', '09:27'),
(234, 'fuckyou134', 'Mek134', 'meki134', '2023-09-15', '09:27'),
(235, 'fuckyou136', 'Mek136', 'meki136', '2023-09-15', '09:27'),
(236, 'fuckyou138', 'Mek138', 'meki138', '2023-09-15', '09:27'),
(237, 'fuckyou137', 'Mek137', 'meki137', '2023-09-15', '09:27'),
(238, 'fuckyou140', 'Mek140', 'meki140', '2023-09-15', '09:27'),
(239, 'fuckyou142', 'Mek142', 'meki142', '2023-09-15', '09:27'),
(240, 'fuckyou141', 'Mek141', 'meki141', '2023-09-15', '09:27'),
(241, 'fuckyou139', 'Mek139', 'meki139', '2023-09-15', '09:27'),
(242, 'fuckyou143', 'Mek143', 'meki143', '2023-09-15', '09:27'),
(243, 'fuckyou144', 'Mek144', 'meki144', '2023-09-15', '09:27'),
(244, 'fuckyou146', 'Mek146', 'meki146', '2023-09-15', '09:27'),
(245, 'fuckyou148', 'Mek148', 'meki148', '2023-09-15', '09:27'),
(246, 'fuckyou145', 'Mek145', 'meki145', '2023-09-15', '09:27'),
(247, 'fuckyou147', 'Mek147', 'meki147', '2023-09-15', '09:27'),
(248, 'fuckyou149', 'Mek149', 'meki149', '2023-09-15', '09:27'),
(249, 'fuckyou153', 'Mek153', 'meki153', '2023-09-15', '09:27'),
(250, 'fuckyou154', 'Mek154', 'meki154', '2023-09-15', '09:27'),
(251, 'fuckyou152', 'Mek152', 'meki152', '2023-09-15', '09:27'),
(252, 'fuckyou150', 'Mek150', 'meki150', '2023-09-15', '09:27'),
(253, 'fuckyou151', 'Mek151', 'meki151', '2023-09-15', '09:27'),
(254, 'fuckyou155', 'Mek155', 'meki155', '2023-09-15', '09:27'),
(255, 'fuckyou157', 'Mek157', 'meki157', '2023-09-15', '09:27'),
(256, 'fuckyou156', 'Mek156', 'meki156', '2023-09-15', '09:27'),
(257, 'fuckyou159', 'Mek159', 'meki159', '2023-09-15', '09:27'),
(258, 'fuckyou158', 'Mek158', 'meki158', '2023-09-15', '09:27'),
(259, 'fuckyou161', 'Mek161', 'meki161', '2023-09-15', '09:27'),
(260, 'fuckyou160', 'Mek160', 'meki160', '2023-09-15', '09:27'),
(261, 'fuckyou162', 'Mek162', 'meki162', '2023-09-15', '09:27'),
(262, 'fuckyou165', 'Mek165', 'meki165', '2023-09-15', '09:27'),
(263, 'fuckyou167', 'Mek167', 'meki167', '2023-09-15', '09:27'),
(264, 'fuckyou163', 'Mek163', 'meki163', '2023-09-15', '09:27'),
(265, 'fuckyou164', 'Mek164', 'meki164', '2023-09-15', '09:27'),
(266, 'fuckyou166', 'Mek166', 'meki166', '2023-09-15', '09:27'),
(267, 'fuckyou168', 'Mek168', 'meki168', '2023-09-15', '09:27'),
(268, 'fuckyou169', 'Mek169', 'meki169', '2023-09-15', '09:27'),
(269, 'fuckyou170', 'Mek170', 'meki170', '2023-09-15', '09:27'),
(270, 'fuckyou172', 'Mek172', 'meki172', '2023-09-15', '09:27'),
(271, 'fuckyou171', 'Mek171', 'meki171', '2023-09-15', '09:27'),
(272, 'fuckyou173', 'Mek173', 'meki173', '2023-09-15', '09:27'),
(273, 'fuckyou174', 'Mek174', 'meki174', '2023-09-15', '09:27'),
(274, 'fuckyou175', 'Mek175', 'meki175', '2023-09-15', '09:27'),
(275, 'fuckyou176', 'Mek176', 'meki176', '2023-09-15', '09:27'),
(276, 'fuckyou177', 'Mek177', 'meki177', '2023-09-15', '09:27'),
(277, 'fuckyou179', 'Mek179', 'meki179', '2023-09-15', '09:27'),
(278, 'fuckyou178', 'Mek178', 'meki178', '2023-09-15', '09:27'),
(279, 'fuckyou181', 'Mek181', 'meki181', '2023-09-15', '09:27'),
(280, 'fuckyou180', 'Mek180', 'meki180', '2023-09-15', '09:27'),
(281, 'fuckyou184', 'Mek184', 'meki184', '2023-09-15', '09:27'),
(282, 'fuckyou185', 'Mek185', 'meki185', '2023-09-15', '09:27'),
(283, 'fuckyou182', 'Mek182', 'meki182', '2023-09-15', '09:27'),
(284, 'fuckyou183', 'Mek183', 'meki183', '2023-09-15', '09:27'),
(285, 'fuckyou186', 'Mek186', 'meki186', '2023-09-15', '09:27'),
(286, 'fuckyou189', 'Mek189', 'meki189', '2023-09-15', '09:27'),
(287, 'fuckyou187', 'Mek187', 'meki187', '2023-09-15', '09:27'),
(288, 'fuckyou188', 'Mek188', 'meki188', '2023-09-15', '09:27'),
(289, 'fuckyou191', 'Mek191', 'meki191', '2023-09-15', '09:27'),
(290, 'fuckyou190', 'Mek190', 'meki190', '2023-09-15', '09:27'),
(291, 'fuckyou193', 'Mek193', 'meki193', '2023-09-15', '09:27'),
(292, 'fuckyou192', 'Mek192', 'meki192', '2023-09-15', '09:27'),
(293, 'fuckyou196', 'Mek196', 'meki196', '2023-09-15', '09:27'),
(294, 'fuckyou195', 'Mek195', 'meki195', '2023-09-15', '09:27'),
(295, 'fuckyou194', 'Mek194', 'meki194', '2023-09-15', '09:27'),
(296, 'fuckyou197', 'Mek197', 'meki197', '2023-09-15', '09:27'),
(297, 'fuckyou198', 'Mek198', 'meki198', '2023-09-15', '09:27'),
(298, 'fuckyou202', 'Mek202', 'meki202', '2023-09-15', '09:27'),
(299, 'fuckyou203', 'Mek203', 'meki203', '2023-09-15', '09:27'),
(300, 'fuckyou200', 'Mek200', 'meki200', '2023-09-15', '09:27'),
(301, 'fuckyou199', 'Mek199', 'meki199', '2023-09-15', '09:27'),
(302, 'fuckyou201', 'Mek201', 'meki201', '2023-09-15', '09:27'),
(303, 'fuckyou205', 'Mek205', 'meki205', '2023-09-15', '09:27'),
(304, 'fuckyou204', 'Mek204', 'meki204', '2023-09-15', '09:27'),
(305, 'fuckyou206', 'Mek206', 'meki206', '2023-09-15', '09:27'),
(306, 'fuckyou207', 'Mek207', 'meki207', '2023-09-15', '09:27'),
(307, 'fuckyou209', 'Mek209', 'meki209', '2023-09-15', '09:27'),
(308, 'fuckyou208', 'Mek208', 'meki208', '2023-09-15', '09:27'),
(309, 'fuckyou212', 'Mek212', 'meki212', '2023-09-15', '09:27'),
(310, 'fuckyou210', 'Mek210', 'meki210', '2023-09-15', '09:27'),
(311, 'fuckyou211', 'Mek211', 'meki211', '2023-09-15', '09:27'),
(312, 'fuckyou213', 'Mek213', 'meki213', '2023-09-15', '09:27'),
(313, 'fuckyou216', 'Mek216', 'meki216', '2023-09-15', '09:27'),
(314, 'fuckyou217', 'Mek217', 'meki217', '2023-09-15', '09:27'),
(315, 'fuckyou215', 'Mek215', 'meki215', '2023-09-15', '09:27'),
(316, 'fuckyou214', 'Mek214', 'meki214', '2023-09-15', '09:27'),
(317, 'fuckyou218', 'Mek218', 'meki218', '2023-09-15', '09:27'),
(318, 'fuckyou222', 'Mek222', 'meki222', '2023-09-15', '09:27'),
(319, 'fuckyou220', 'Mek220', 'meki220', '2023-09-15', '09:27'),
(320, 'fuckyou219', 'Mek219', 'meki219', '2023-09-15', '09:27'),
(321, 'fuckyou221', 'Mek221', 'meki221', '2023-09-15', '09:27'),
(322, 'fuckyou223', 'Mek223', 'meki223', '2023-09-15', '09:27'),
(323, 'fuckyou226', 'Mek226', 'meki226', '2023-09-15', '09:27'),
(324, 'fuckyou224', 'Mek224', 'meki224', '2023-09-15', '09:27'),
(325, 'fuckyou225', 'Mek225', 'meki225', '2023-09-15', '09:27'),
(326, 'fuckyou227', 'Mek227', 'meki227', '2023-09-15', '09:27'),
(327, 'fuckyou228', 'Mek228', 'meki228', '2023-09-15', '09:27'),
(328, 'fuckyou229', 'Mek229', 'meki229', '2023-09-15', '09:27'),
(329, 'fuckyou231', 'Mek231', 'meki231', '2023-09-15', '09:27'),
(330, 'fuckyou230', 'Mek230', 'meki230', '2023-09-15', '09:27'),
(331, 'fuckyou236', 'Mek236', 'meki236', '2023-09-15', '09:27'),
(332, 'fuckyou235', 'Mek235', 'meki235', '2023-09-15', '09:27'),
(333, 'fuckyou233', 'Mek233', 'meki233', '2023-09-15', '09:27'),
(334, 'fuckyou234', 'Mek234', 'meki234', '2023-09-15', '09:27'),
(335, 'fuckyou232', 'Mek232', 'meki232', '2023-09-15', '09:27'),
(336, 'fuckyou237', 'Mek237', 'meki237', '2023-09-15', '09:27'),
(337, 'fuckyou239', 'Mek239', 'meki239', '2023-09-15', '09:27'),
(338, 'fuckyou240', 'Mek240', 'meki240', '2023-09-15', '09:27'),
(339, 'fuckyou238', 'Mek238', 'meki238', '2023-09-15', '09:27'),
(340, 'fuckyou241', 'Mek241', 'meki241', '2023-09-15', '09:27'),
(341, 'fuckyou242', 'Mek242', 'meki242', '2023-09-15', '09:27'),
(342, 'fuckyou243', 'Mek243', 'meki243', '2023-09-15', '09:27'),
(343, 'fuckyou244', 'Mek244', 'meki244', '2023-09-15', '09:27'),
(344, 'fuckyou245', 'Mek245', 'meki245', '2023-09-15', '09:27'),
(345, 'fuckyou247', 'Mek247', 'meki247', '2023-09-15', '09:27'),
(346, 'fuckyou248', 'Mek248', 'meki248', '2023-09-15', '09:27'),
(347, 'fuckyou246', 'Mek246', 'meki246', '2023-09-15', '09:27'),
(348, 'fuckyou251', 'Mek251', 'meki251', '2023-09-15', '09:27'),
(349, 'fuckyou249', 'Mek249', 'meki249', '2023-09-15', '09:27'),
(350, 'fuckyou250', 'Mek250', 'meki250', '2023-09-15', '09:27'),
(351, 'fuckyou253', 'Mek253', 'meki253', '2023-09-15', '09:27'),
(352, 'fuckyou252', 'Mek252', 'meki252', '2023-09-15', '09:27'),
(353, 'fuckyou256', 'Mek256', 'meki256', '2023-09-15', '09:27'),
(354, 'fuckyou255', 'Mek255', 'meki255', '2023-09-15', '09:27'),
(355, 'fuckyou254', 'Mek254', 'meki254', '2023-09-15', '09:27'),
(356, 'fuckyou257', 'Mek257', 'meki257', '2023-09-15', '09:27'),
(357, 'fuckyou259', 'Mek259', 'meki259', '2023-09-15', '09:27'),
(358, 'fuckyou260', 'Mek260', 'meki260', '2023-09-15', '09:27'),
(359, 'fuckyou258', 'Mek258', 'meki258', '2023-09-15', '09:27'),
(360, 'fuckyou261', 'Mek261', 'meki261', '2023-09-15', '09:27'),
(361, 'fuckyou262', 'Mek262', 'meki262', '2023-09-15', '09:27'),
(362, 'fuckyou263', 'Mek263', 'meki263', '2023-09-15', '09:27'),
(363, 'fuckyou264', 'Mek264', 'meki264', '2023-09-15', '09:27'),
(364, 'fuckyou265', 'Mek265', 'meki265', '2023-09-15', '09:27'),
(365, 'fuckyou267', 'Mek267', 'meki267', '2023-09-15', '09:27'),
(366, 'fuckyou268', 'Mek268', 'meki268', '2023-09-15', '09:27'),
(367, 'fuckyou266', 'Mek266', 'meki266', '2023-09-15', '09:27'),
(368, 'fuckyou270', 'Mek270', 'meki270', '2023-09-15', '09:27'),
(369, 'fuckyou269', 'Mek269', 'meki269', '2023-09-15', '09:27'),
(370, 'fuckyou271', 'Mek271', 'meki271', '2023-09-15', '09:27'),
(371, 'fuckyou272', 'Mek272', 'meki272', '2023-09-15', '09:27'),
(372, 'fuckyou273', 'Mek273', 'meki273', '2023-09-15', '09:27'),
(373, 'fuckyou274', 'Mek274', 'meki274', '2023-09-15', '09:27'),
(374, 'fuckyou275', 'Mek275', 'meki275', '2023-09-15', '09:27'),
(375, 'fuckyou278', 'Mek278', 'meki278', '2023-09-15', '09:27'),
(376, 'fuckyou276', 'Mek276', 'meki276', '2023-09-15', '09:27'),
(377, 'fuckyou277', 'Mek277', 'meki277', '2023-09-15', '09:27'),
(378, 'fuckyou279', 'Mek279', 'meki279', '2023-09-15', '09:27'),
(379, 'fuckyou282', 'Mek282', 'meki282', '2023-09-15', '09:27'),
(380, 'fuckyou280', 'Mek280', 'meki280', '2023-09-15', '09:27'),
(381, 'fuckyou285', 'Mek285', 'meki285', '2023-09-15', '09:27'),
(382, 'fuckyou281', 'Mek281', 'meki281', '2023-09-15', '09:27'),
(383, 'fuckyou284', 'Mek284', 'meki284', '2023-09-15', '09:27'),
(384, 'fuckyou283', 'Mek283', 'meki283', '2023-09-15', '09:27'),
(385, 'fuckyou288', 'Mek288', 'meki288', '2023-09-15', '09:27'),
(386, 'fuckyou287', 'Mek287', 'meki287', '2023-09-15', '09:27'),
(387, 'fuckyou286', 'Mek286', 'meki286', '2023-09-15', '09:27'),
(388, 'fuckyou291', 'Mek291', 'meki291', '2023-09-15', '09:27'),
(389, 'fuckyou289', 'Mek289', 'meki289', '2023-09-15', '09:27'),
(390, 'fuckyou290', 'Mek290', 'meki290', '2023-09-15', '09:27'),
(391, 'fuckyou292', 'Mek292', 'meki292', '2023-09-15', '09:27'),
(392, 'fuckyou294', 'Mek294', 'meki294', '2023-09-15', '09:27'),
(393, 'fuckyou296', 'Mek296', 'meki296', '2023-09-15', '09:27'),
(394, 'fuckyou297', 'Mek297', 'meki297', '2023-09-15', '09:27'),
(395, 'fuckyou295', 'Mek295', 'meki295', '2023-09-15', '09:27'),
(396, 'fuckyou293', 'Mek293', 'meki293', '2023-09-15', '09:27'),
(397, 'fuckyou298', 'Mek298', 'meki298', '2023-09-15', '09:27'),
(398, 'fuckyou299', 'Mek299', 'meki299', '2023-09-15', '09:27'),
(399, 'fuckyou301', 'Mek301', 'meki301', '2023-09-15', '09:27'),
(400, 'fuckyou300', 'Mek300', 'meki300', '2023-09-15', '09:27'),
(401, 'fuckyou302', 'Mek302', 'meki302', '2023-09-15', '09:27'),
(402, 'fuckyou303', 'Mek303', 'meki303', '2023-09-15', '09:27'),
(403, 'fuckyou304', 'Mek304', 'meki304', '2023-09-15', '09:27'),
(404, 'fuckyou307', 'Mek307', 'meki307', '2023-09-15', '09:27'),
(405, 'fuckyou305', 'Mek305', 'meki305', '2023-09-15', '09:27'),
(406, 'fuckyou306', 'Mek306', 'meki306', '2023-09-15', '09:27'),
(407, 'fuckyou312', 'Mek312', 'meki312', '2023-09-15', '09:27'),
(408, 'fuckyou311', 'Mek311', 'meki311', '2023-09-15', '09:27'),
(409, 'fuckyou310', 'Mek310', 'meki310', '2023-09-15', '09:27'),
(410, 'fuckyou313', 'Mek313', 'meki313', '2023-09-15', '09:27'),
(411, 'fuckyou308', 'Mek308', 'meki308', '2023-09-15', '09:27'),
(412, 'fuckyou309', 'Mek309', 'meki309', '2023-09-15', '09:27'),
(413, 'fuckyou314', 'Mek314', 'meki314', '2023-09-15', '09:27'),
(414, 'fuckyou315', 'Mek315', 'meki315', '2023-09-15', '09:27'),
(415, 'fuckyou316', 'Mek316', 'meki316', '2023-09-15', '09:27'),
(416, 'fuckyou317', 'Mek317', 'meki317', '2023-09-15', '09:27'),
(417, 'fuckyou320', 'Mek320', 'meki320', '2023-09-15', '09:27'),
(418, 'fuckyou318', 'Mek318', 'meki318', '2023-09-15', '09:27'),
(419, 'fuckyou322', 'Mek322', 'meki322', '2023-09-15', '09:27'),
(420, 'fuckyou321', 'Mek321', 'meki321', '2023-09-15', '09:27'),
(421, 'fuckyou319', 'Mek319', 'meki319', '2023-09-15', '09:27'),
(422, 'fuckyou323', 'Mek323', 'meki323', '2023-09-15', '09:27'),
(423, 'fuckyou324', 'Mek324', 'meki324', '2023-09-15', '09:27'),
(424, 'fuckyou325', 'Mek325', 'meki325', '2023-09-15', '09:27'),
(425, 'fuckyou326', 'Mek326', 'meki326', '2023-09-15', '09:27'),
(426, 'fuckyou329', 'Mek329', 'meki329', '2023-09-15', '09:27'),
(427, 'fuckyou327', 'Mek327', 'meki327', '2023-09-15', '09:27'),
(428, 'fuckyou328', 'Mek328', 'meki328', '2023-09-15', '09:27'),
(429, 'fuckyou330', 'Mek330', 'meki330', '2023-09-15', '09:27'),
(430, 'fuckyou332', 'Mek332', 'meki332', '2023-09-15', '09:27'),
(431, 'fuckyou331', 'Mek331', 'meki331', '2023-09-15', '09:27'),
(432, 'fuckyou334', 'Mek334', 'meki334', '2023-09-15', '09:27'),
(433, 'fuckyou333', 'Mek333', 'meki333', '2023-09-15', '09:27'),
(434, 'fuckyou335', 'Mek335', 'meki335', '2023-09-15', '09:27'),
(435, 'fuckyou336', 'Mek336', 'meki336', '2023-09-15', '09:27'),
(436, 'fuckyou338', 'Mek338', 'meki338', '2023-09-15', '09:27'),
(437, 'fuckyou337', 'Mek337', 'meki337', '2023-09-15', '09:27'),
(438, 'fuckyou339', 'Mek339', 'meki339', '2023-09-15', '09:27'),
(439, 'fuckyou340', 'Mek340', 'meki340', '2023-09-15', '09:27'),
(440, 'fuckyou341', 'Mek341', 'meki341', '2023-09-15', '09:27'),
(441, 'fuckyou346', 'Mek346', 'meki346', '2023-09-15', '09:27'),
(442, 'fuckyou342', 'Mek342', 'meki342', '2023-09-15', '09:27'),
(443, 'fuckyou344', 'Mek344', 'meki344', '2023-09-15', '09:27'),
(444, 'fuckyou345', 'Mek345', 'meki345', '2023-09-15', '09:27'),
(445, 'fuckyou343', 'Mek343', 'meki343', '2023-09-15', '09:27'),
(446, 'fuckyou348', 'Mek348', 'meki348', '2023-09-15', '09:27'),
(447, 'fuckyou349', 'Mek349', 'meki349', '2023-09-15', '09:27'),
(448, 'fuckyou350', 'Mek350', 'meki350', '2023-09-15', '09:27'),
(449, 'fuckyou347', 'Mek347', 'meki347', '2023-09-15', '09:27'),
(450, 'fuckyou351', 'Mek351', 'meki351', '2023-09-15', '09:27'),
(451, 'fuckyou352', 'Mek352', 'meki352', '2023-09-15', '09:27'),
(452, 'fuckyou353', 'Mek353', 'meki353', '2023-09-15', '09:27'),
(453, 'fuckyou357', 'Mek357', 'meki357', '2023-09-15', '09:27'),
(454, 'fuckyou354', 'Mek354', 'meki354', '2023-09-15', '09:27'),
(455, 'fuckyou355', 'Mek355', 'meki355', '2023-09-15', '09:27'),
(456, 'fuckyou356', 'Mek356', 'meki356', '2023-09-15', '09:27'),
(457, 'fuckyou358', 'Mek358', 'meki358', '2023-09-15', '09:27'),
(458, 'fuckyou361', 'Mek361', 'meki361', '2023-09-15', '09:27'),
(459, 'fuckyou360', 'Mek360', 'meki360', '2023-09-15', '09:27'),
(460, 'fuckyou363', 'Mek363', 'meki363', '2023-09-15', '09:27'),
(461, 'fuckyou359', 'Mek359', 'meki359', '2023-09-15', '09:27'),
(462, 'fuckyou362', 'Mek362', 'meki362', '2023-09-15', '09:27'),
(463, 'fuckyou365', 'Mek365', 'meki365', '2023-09-15', '09:27'),
(464, 'fuckyou367', 'Mek367', 'meki367', '2023-09-15', '09:27'),
(465, 'fuckyou364', 'Mek364', 'meki364', '2023-09-15', '09:27'),
(466, 'fuckyou366', 'Mek366', 'meki366', '2023-09-15', '09:27'),
(467, 'fuckyou368', 'Mek368', 'meki368', '2023-09-15', '09:27'),
(468, 'fuckyou370', 'Mek370', 'meki370', '2023-09-15', '09:27'),
(469, 'fuckyou369', 'Mek369', 'meki369', '2023-09-15', '09:27'),
(470, 'fuckyou372', 'Mek372', 'meki372', '2023-09-15', '09:27'),
(471, 'fuckyou371', 'Mek371', 'meki371', '2023-09-15', '09:27'),
(472, 'fuckyou373', 'Mek373', 'meki373', '2023-09-15', '09:27'),
(473, 'fuckyou374', 'Mek374', 'meki374', '2023-09-15', '09:27'),
(474, 'fuckyou375', 'Mek375', 'meki375', '2023-09-15', '09:27'),
(475, 'fuckyou376', 'Mek376', 'meki376', '2023-09-15', '09:27'),
(476, 'fuckyou378', 'Mek378', 'meki378', '2023-09-15', '09:27'),
(477, 'fuckyou377', 'Mek377', 'meki377', '2023-09-15', '09:27'),
(478, 'fuckyou379', 'Mek379', 'meki379', '2023-09-15', '09:27'),
(479, 'fuckyou381', 'Mek381', 'meki381', '2023-09-15', '09:27'),
(480, 'fuckyou383', 'Mek383', 'meki383', '2023-09-15', '09:27'),
(481, 'fuckyou382', 'Mek382', 'meki382', '2023-09-15', '09:27'),
(482, 'fuckyou380', 'Mek380', 'meki380', '2023-09-15', '09:27'),
(483, 'fuckyou384', 'Mek384', 'meki384', '2023-09-15', '09:27'),
(484, 'fuckyou385', 'Mek385', 'meki385', '2023-09-15', '09:27'),
(485, 'fuckyou386', 'Mek386', 'meki386', '2023-09-15', '09:27'),
(486, 'fuckyou389', 'Mek389', 'meki389', '2023-09-15', '09:27'),
(487, 'fuckyou388', 'Mek388', 'meki388', '2023-09-15', '09:27'),
(488, 'fuckyou390', 'Mek390', 'meki390', '2023-09-15', '09:27'),
(489, 'fuckyou387', 'Mek387', 'meki387', '2023-09-15', '09:27'),
(490, 'fuckyou393', 'Mek393', 'meki393', '2023-09-15', '09:27'),
(491, 'fuckyou395', 'Mek395', 'meki395', '2023-09-15', '09:27'),
(492, 'fuckyou396', 'Mek396', 'meki396', '2023-09-15', '09:27'),
(493, 'fuckyou392', 'Mek392', 'meki392', '2023-09-15', '09:27'),
(494, 'fuckyou391', 'Mek391', 'meki391', '2023-09-15', '09:27'),
(495, 'fuckyou394', 'Mek394', 'meki394', '2023-09-15', '09:27'),
(496, 'fuckyou398', 'Mek398', 'meki398', '2023-09-15', '09:27'),
(497, 'fuckyou397', 'Mek397', 'meki397', '2023-09-15', '09:27'),
(498, 'fuckyou400', 'Mek400', 'meki400', '2023-09-15', '09:27'),
(499, 'fuckyou399', 'Mek399', 'meki399', '2023-09-15', '09:27'),
(500, 'fuckyou402', 'Mek402', 'meki402', '2023-09-15', '09:27'),
(501, 'fuckyou401', 'Mek401', 'meki401', '2023-09-15', '09:27'),
(502, 'fuckyou403', 'Mek403', 'meki403', '2023-09-15', '09:27'),
(503, 'fuckyou404', 'Mek404', 'meki404', '2023-09-15', '09:27'),
(504, 'fuckyou405', 'Mek405', 'meki405', '2023-09-15', '09:27'),
(505, 'fuckyou406', 'Mek406', 'meki406', '2023-09-15', '09:27'),
(506, 'fuckyou408', 'Mek408', 'meki408', '2023-09-15', '09:27'),
(507, 'fuckyou409', 'Mek409', 'meki409', '2023-09-15', '09:27'),
(508, 'fuckyou407', 'Mek407', 'meki407', '2023-09-15', '09:27'),
(509, 'fuckyou411', 'Mek411', 'meki411', '2023-09-15', '09:27'),
(510, 'fuckyou410', 'Mek410', 'meki410', '2023-09-15', '09:27'),
(511, 'fuckyou412', 'Mek412', 'meki412', '2023-09-15', '09:27'),
(512, 'fuckyou413', 'Mek413', 'meki413', '2023-09-15', '09:27'),
(513, 'fuckyou415', 'Mek415', 'meki415', '2023-09-15', '09:27'),
(514, 'fuckyou414', 'Mek414', 'meki414', '2023-09-15', '09:27'),
(515, 'fuckyou416', 'Mek416', 'meki416', '2023-09-15', '09:27'),
(516, 'fuckyou417', 'Mek417', 'meki417', '2023-09-15', '09:27'),
(517, 'fuckyou421', 'Mek421', 'meki421', '2023-09-15', '09:27'),
(518, 'fuckyou420', 'Mek420', 'meki420', '2023-09-15', '09:27'),
(519, 'fuckyou422', 'Mek422', 'meki422', '2023-09-15', '09:27'),
(520, 'fuckyou418', 'Mek418', 'meki418', '2023-09-15', '09:27'),
(521, 'fuckyou419', 'Mek419', 'meki419', '2023-09-15', '09:27'),
(522, 'fuckyou424', 'Mek424', 'meki424', '2023-09-15', '09:27'),
(523, 'fuckyou423', 'Mek423', 'meki423', '2023-09-15', '09:27'),
(524, 'fuckyou425', 'Mek425', 'meki425', '2023-09-15', '09:27'),
(525, 'fuckyou427', 'Mek427', 'meki427', '2023-09-15', '09:27'),
(526, 'fuckyou426', 'Mek426', 'meki426', '2023-09-15', '09:27'),
(527, 'fuckyou431', 'Mek431', 'meki431', '2023-09-15', '09:27'),
(528, 'fuckyou429', 'Mek429', 'meki429', '2023-09-15', '09:27'),
(529, 'fuckyou428', 'Mek428', 'meki428', '2023-09-15', '09:27'),
(530, 'fuckyou430', 'Mek430', 'meki430', '2023-09-15', '09:27'),
(531, 'fuckyou432', 'Mek432', 'meki432', '2023-09-15', '09:27'),
(532, 'fuckyou433', 'Mek433', 'meki433', '2023-09-15', '09:27'),
(533, 'fuckyou435', 'Mek435', 'meki435', '2023-09-15', '09:27'),
(534, 'fuckyou434', 'Mek434', 'meki434', '2023-09-15', '09:27'),
(535, 'fuckyou437', 'Mek437', 'meki437', '2023-09-15', '09:27'),
(536, 'fuckyou439', 'Mek439', 'meki439', '2023-09-15', '09:27'),
(537, 'fuckyou438', 'Mek438', 'meki438', '2023-09-15', '09:27'),
(538, 'fuckyou436', 'Mek436', 'meki436', '2023-09-15', '09:27'),
(539, 'fuckyou441', 'Mek441', 'meki441', '2023-09-15', '09:27'),
(540, 'fuckyou442', 'Mek442', 'meki442', '2023-09-15', '09:27'),
(541, 'fuckyou440', 'Mek440', 'meki440', '2023-09-15', '09:27'),
(542, 'fuckyou443', 'Mek443', 'meki443', '2023-09-15', '09:27'),
(543, 'fuckyou448', 'Mek448', 'meki448', '2023-09-15', '09:27'),
(544, 'fuckyou445', 'Mek445', 'meki445', '2023-09-15', '09:27'),
(545, 'fuckyou447', 'Mek447', 'meki447', '2023-09-15', '09:27'),
(546, 'fuckyou444', 'Mek444', 'meki444', '2023-09-15', '09:27'),
(547, 'fuckyou446', 'Mek446', 'meki446', '2023-09-15', '09:27'),
(548, 'fuckyou449', 'Mek449', 'meki449', '2023-09-15', '09:27'),
(549, 'fuckyou450', 'Mek450', 'meki450', '2023-09-15', '09:27'),
(550, 'fuckyou451', 'Mek451', 'meki451', '2023-09-15', '09:27'),
(551, 'fuckyou452', 'Mek452', 'meki452', '2023-09-15', '09:27'),
(552, 'fuckyou453', 'Mek453', 'meki453', '2023-09-15', '09:27'),
(553, 'fuckyou454', 'Mek454', 'meki454', '2023-09-15', '09:27'),
(554, 'fuckyou457', 'Mek457', 'meki457', '2023-09-15', '09:27'),
(555, 'fuckyou456', 'Mek456', 'meki456', '2023-09-15', '09:27'),
(556, 'fuckyou455', 'Mek455', 'meki455', '2023-09-15', '09:27'),
(557, 'fuckyou459', 'Mek459', 'meki459', '2023-09-15', '09:27'),
(558, 'fuckyou458', 'Mek458', 'meki458', '2023-09-15', '09:27'),
(559, 'fuckyou460', 'Mek460', 'meki460', '2023-09-15', '09:27'),
(560, 'fuckyou461', 'Mek461', 'meki461', '2023-09-15', '09:27'),
(561, 'fuckyou462', 'Mek462', 'meki462', '2023-09-15', '09:27'),
(562, 'fuckyou463', 'Mek463', 'meki463', '2023-09-15', '09:27'),
(563, 'fuckyou464', 'Mek464', 'meki464', '2023-09-15', '09:27'),
(564, 'fuckyou467', 'Mek467', 'meki467', '2023-09-15', '09:27'),
(565, 'fuckyou466', 'Mek466', 'meki466', '2023-09-15', '09:27'),
(566, 'fuckyou465', 'Mek465', 'meki465', '2023-09-15', '09:27'),
(567, 'fuckyou469', 'Mek469', 'meki469', '2023-09-15', '09:27'),
(568, 'fuckyou471', 'Mek471', 'meki471', '2023-09-15', '09:27'),
(569, 'fuckyou470', 'Mek470', 'meki470', '2023-09-15', '09:27'),
(570, 'fuckyou468', 'Mek468', 'meki468', '2023-09-15', '09:27'),
(571, 'fuckyou473', 'Mek473', 'meki473', '2023-09-15', '09:27'),
(572, 'fuckyou472', 'Mek472', 'meki472', '2023-09-15', '09:27'),
(573, 'fuckyou476', 'Mek476', 'meki476', '2023-09-15', '09:27'),
(574, 'fuckyou474', 'Mek474', 'meki474', '2023-09-15', '09:27'),
(575, 'fuckyou477', 'Mek477', 'meki477', '2023-09-15', '09:27'),
(576, 'fuckyou479', 'Mek479', 'meki479', '2023-09-15', '09:27'),
(577, 'fuckyou475', 'Mek475', 'meki475', '2023-09-15', '09:27'),
(578, 'fuckyou478', 'Mek478', 'meki478', '2023-09-15', '09:27'),
(579, 'fuckyou481', 'Mek481', 'meki481', '2023-09-15', '09:27'),
(580, 'fuckyou480', 'Mek480', 'meki480', '2023-09-15', '09:27'),
(581, 'fuckyou484', 'Mek484', 'meki484', '2023-09-15', '09:27'),
(582, 'fuckyou483', 'Mek483', 'meki483', '2023-09-15', '09:27'),
(583, 'fuckyou482', 'Mek482', 'meki482', '2023-09-15', '09:27'),
(584, 'fuckyou487', 'Mek487', 'meki487', '2023-09-15', '09:27'),
(585, 'fuckyou486', 'Mek486', 'meki486', '2023-09-15', '09:27'),
(586, 'fuckyou485', 'Mek485', 'meki485', '2023-09-15', '09:27'),
(587, 'fuckyou488', 'Mek488', 'meki488', '2023-09-15', '09:27'),
(588, 'fuckyou489', 'Mek489', 'meki489', '2023-09-15', '09:27'),
(589, 'fuckyou490', 'Mek490', 'meki490', '2023-09-15', '09:27'),
(590, 'fuckyou491', 'Mek491', 'meki491', '2023-09-15', '09:27'),
(591, 'fuckyou492', 'Mek492', 'meki492', '2023-09-15', '09:27'),
(592, 'fuckyou493', 'Mek493', 'meki493', '2023-09-15', '09:27'),
(593, 'fuckyou494', 'Mek494', 'meki494', '2023-09-15', '09:27'),
(594, 'fuckyou495', 'Mek495', 'meki495', '2023-09-15', '09:27'),
(595, 'fuckyou496', 'Mek496', 'meki496', '2023-09-15', '09:27'),
(596, 'fuckyou499', 'Mek499', 'meki499', '2023-09-15', '09:27'),
(597, 'fuckyou497', 'Mek497', 'meki497', '2023-09-15', '09:27'),
(598, 'fuckyou498', 'Mek498', 'meki498', '2023-09-15', '09:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` int(11) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `email_link` varchar(100) NOT NULL,
  `facebook_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footer` varchar(100) NOT NULL,
  `embed_twitter` longtext NOT NULL,
  `embed_instagram` longtext NOT NULL,
  `embed_map` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id_website`, `meta_description`, `meta_keyword`, `email_link`, `facebook_link`, `twitter_link`, `instagram_link`, `logo`, `footer`, `embed_twitter`, `embed_instagram`, `embed_map`) VALUES
(1, 'elahche ok tea', 'el ha che', 'brajamusti570@gmail.com', 'https://fb.com/elhacep', 'https://twitter.com/ibods', 'https://www.instagram.com/elhace/', '', 'Bodro Bilowo all rights reserved', '<a class=\"twitter-timeline\" href=\"https://twitter.com/ibods?ref_src=twsrc%5Etfw\">Tweets by ibods</a> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>', '<script src=\"https://apps.elfsight.com/p/platform.js\" defer></script>\r\n<div class=\"elfsight-app-fd7552c8-9119-4cef-91bd-5af1a0702bf3\"></div>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.461145960621!2d106.85260591436152!3d-6.334257463739358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edadb4d452c5%3A0xbed2b72813e4e1fb!2sJl.%20Jaha%2C%20Kalisari%2C%20Kec.%20Ps.%20Rebo%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013790!5e0!3m2!1sid!2sid!4v1652753070949!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `admin_otp`
--
ALTER TABLE `admin_otp`
  ADD PRIMARY KEY (`id_otp`);

--
-- Indeks untuk tabel `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indeks untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indeks untuk tabel `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id_news_category`);

--
-- Indeks untuk tabel `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `news_view`
--
ALTER TABLE `news_view`
  ADD PRIMARY KEY (`id_news_view`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indeks untuk tabel `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `portfolio_view`
--
ALTER TABLE `portfolio_view`
  ADD PRIMARY KEY (`id_portfolio_view`);

--
-- Indeks untuk tabel `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id_traffic`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin_otp`
--
ALTER TABLE `admin_otp`
  MODIFY `id_otp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `email_message`
--
ALTER TABLE `email_message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id_news_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `news_view`
--
ALTER TABLE `news_view`
  MODIFY `id_news_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `portfolio_view`
--
ALTER TABLE `portfolio_view`
  MODIFY `id_portfolio_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id_traffic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=599;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
