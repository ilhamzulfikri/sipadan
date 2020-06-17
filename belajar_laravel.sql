-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2020 at 05:07 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `upi` varchar(255) NOT NULL,
  `ap` varchar(255) NOT NULL,
  `kode_bidang` varchar(255) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_18_133103_create_karyawans_table', 1),
(4, '2019_10_18_133840_create_tes_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notadinas`
--

CREATE TABLE `notadinas` (
  `id` int(10) UNSIGNED NOT NULL,
  `upi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_notadinas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_notadinas` date NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_rab` decimal(19,0) NOT NULL,
  `no_prk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_notadinas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_rab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_justifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notadinas`
--

INSERT INTO `notadinas` (`id`, `upi`, `ap`, `no_notadinas`, `tgl_notadinas`, `pekerjaan`, `sumber_dana`, `nilai_rab`, `no_prk`, `lokasi`, `upload_notadinas`, `upload_rab`, `upload_justifikasi`, `user`, `bidang`, `created_at`, `updated_at`) VALUES
(1, '11', '11SBS', '01/ND/TREN /2019', '2019-12-22', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '100000000', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577000741_Report1.xls', 'upload/1577000741_Report2.xls', NULL, 'Ilham Zulfikri', 'tren', '2019-12-21 17:00:00', '2019-12-21 17:00:00'),
(2, '11', '11SBS', '01/ND/TREN /2019', '2019-12-22', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '778687', 'PRK.6115.19.11.1.300.020', 'BANDA ACEH', 'upload/1577003630_p2tl blocing.xls', 'upload/1577003630_Eviden Medsos Tren UP3 SBS.docx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-21 17:00:00', '2019-12-21 17:00:00'),
(3, '11', '11SBS', '01/ND/TREN /2019', '2019-12-22', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '778687', 'PRK.6115.19.11.1.300.020', 'BANDA ACEH', 'upload/1577003659_p2tl blocing.xls', 'upload/1577003659_Eviden Medsos Tren UP3 SBS.docx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-21 17:00:00', '2019-12-21 17:00:00'),
(4, '11', '11SBS', '01/ND/TREN /2019', '2019-12-22', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '8768', 'PRK.6115.19.11.1.300.020', 'BANDA ACEH', 'upload/1577003773_Monitoring Pembelian Token SPLU SBS.xlsx', 'upload/1577003773_Monitoring Kinerja TE 2018.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-21 17:00:00', '2019-12-21 17:00:00'),
(5, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '123455', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577067985_0. Template 22 Nov 2019.xlsx', 'upload/1577067985_PELANGGAN P2TL BLOKING TOKEN.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(6, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '123455', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577068170_0. Template 22 Nov 2019.xlsx', 'upload/1577068170_PELANGGAN P2TL BLOKING TOKEN.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(7, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89045600', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577068786_Plg P2TL Jatuh Tempo Belum Blocking Token.xlsx', 'upload/1577068786_45a335cd-bca2-4c44-86f9-c796ecd9a737.jfif', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(8, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '23232423', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577069411_0. Template 20 Nov 2019.xlsx', 'upload/1577069411_0. Template 26 Juli 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(9, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '23232423', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577069609_0. Template 20 Nov 2019.xlsx', 'upload/1577069609_0. Template 26 Juli 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(10, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '23423500', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577069897_0_DATA ANGGOTA PERSIT-01 (2).pdf', 'upload/1577069897_p2tl.xls', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(11, '11', '11SBS', '01/ND/TREN /2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '2342342', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070012_45a335cd-bca2-4c44-86f9-c796ecd9a737.jfif', 'upload/1577070012_4cb61078-05f5-46e0-8eb0-2ccf772f6693.jfif', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(12, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89567800', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070361_Monitoring Kinerja TE 2018.xlsx', 'upload/1577070361_Monitoring Kinerja TE 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(13, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89567800', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070390_Monitoring Kinerja TE 2018.xlsx', 'upload/1577070390_Monitoring Kinerja TE 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(14, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89567800', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070517_Monitoring Kinerja TE 2018.xlsx', 'upload/1577070517_Monitoring Kinerja TE 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(15, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89567800', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070568_Monitoring Kinerja TE 2018.xlsx', 'upload/1577070568_Monitoring Kinerja TE 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(16, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '56800000', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070708_0. Template 20 Nov 2019.xlsx', 'upload/1577070708_p2tl blocing.xls', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(17, '11', '11SBS', '01/ND/TREN/2019', '2019-12-23', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '89054000', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577070942_Report1.xls', 'upload/1577070942_Report1.xls', NULL, 'Ilham Zulfikri', 'tren', '2019-12-22 17:00:00', '2019-12-22 17:00:00'),
(18, '11', '11SBS', '02/ND/TREN /2019', '2019-12-30', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '234234632', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577693155_890dccf7-7723-45ba-a41a-8cdcb4d9582e.jpg', 'upload/1577693155_Report2.xls', NULL, 'Ilham Zulfikri', 'tren', '2019-12-30 01:05:55', NULL),
(19, '11', '11SBS', '01/ND/TREN /2019', '2019-12-30', 'Jasa Pemeliharaan APP Tinggi & APP Dalam Bangunan', '03/R/AO-AGA/UIW.ACEH/2019-SBS', '345345', 'PRK.6115.19.11.1.300.020', 'PT. PLN (Persero) UP3 Subulussalam', 'upload/1577693632_Pelanggan Perdesa SBK.xls', 'upload/1577693632_MELCOINDA SBS 14 MAY 2019.xlsx', NULL, 'Ilham Zulfikri', 'tren', '2019-12-30 08:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_jabatan` varchar(20) NOT NULL,
  `pegawai_umur` int(11) NOT NULL,
  `pegawai_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_umur`, `pegawai_alamat`) VALUES
(3, 'rte', 'rte', 30, 'rhrht'),
(4, 'wqeqw', 'qweqw', 23, 'efwer'),
(5, 'wew', 'werw', 23, 'rert'),
(6, 'Joni', 'Web Designer', 25, 'Jl. Panglateh'),
(7, 'Dono Johan Mandala', 'omnis', 33, 'Jln. Industri No. 955, Batam 45595, SumBar'),
(8, 'Galur Prasetyo', 'voluptate', 26, 'Psr. Babakan No. 997, Lubuklinggau 49955, Bali'),
(9, 'Jaeman Winarno', 'asperiores', 32, 'Ds. Bhayangkara No. 40, Mataram 72495, Jambi'),
(10, 'Ian Pratama', 'molestiae', 37, 'Psr. Lembong No. 331, Administrasi Jakarta Utara 17425, Riau'),
(11, 'Chandra Latupono', 'odio', 32, 'Jr. Suharso No. 643, Surakarta 49956, KalSel'),
(12, 'Kayun Tarihoran S.Ked', 'exercitationem', 32, 'Gg. Yap Tjwan Bing No. 87, Ambon 25012, KepR'),
(13, 'Gabriella Oktaviani', 'pariatur', 28, 'Jr. Sutoyo No. 9, Padangsidempuan 49288, SulUt'),
(14, 'Bambang Habibi', 'dolor', 40, 'Ds. Abdullah No. 629, Banda Aceh 97889, KepR'),
(15, 'Zaenab Hasanah', 'quam', 37, 'Ds. Bakti No. 948, Denpasar 69597, KalTeng'),
(16, 'Ulva Ika Melani S.Ked', 'voluptas', 38, 'Jln. Siliwangi No. 277, Kendari 35370, NTT'),
(17, 'Bagya Rajata S.E.I', 'possimus', 37, 'Psr. B.Agam 1 No. 667, Bau-Bau 22863, KalUt'),
(18, 'Salwa Puspita S.Farm', 'qui', 40, 'Kpg. Ters. Pasir Koja No. 573, Padangsidempuan 86656, MalUt'),
(19, 'Ira Elvina Rahimah', 'ipsam', 34, 'Dk. Gardujati No. 59, Kendari 53055, DIY'),
(20, 'Hesti Ami Nurdiyanti', 'adipisci', 36, 'Gg. Basmol Raya No. 695, Cimahi 39709, Riau'),
(21, 'Capa Gunarto M.M.', 'quaerat', 34, 'Jln. Sudirman No. 898, Bogor 66521, KalSel'),
(22, 'Radit Nugraha Latupono M.M.', 'qui', 32, 'Psr. Otista No. 737, Subulussalam 24911, Bali'),
(23, 'Nasab Tamba', 'repellendus', 35, 'Kpg. Badak No. 903, Batu 52327, NTT'),
(24, 'Prabawa Hutasoit', 'velit', 33, 'Ds. Ciwastra No. 703, Surakarta 19754, Aceh'),
(25, 'Yani Suryatmi', 'aut', 32, 'Dk. Pasirkoja No. 85, Madiun 53224, DKI'),
(26, 'Martani Respati Suryono S.Pd', 'eum', 38, 'Gg. Rajawali No. 31, Tomohon 36399, SumBar'),
(27, 'Maman Tamba', 'placeat', 38, 'Psr. Moch. Toha No. 198, Tidore Kepulauan 30113, NTB'),
(28, 'Kenzie Bakiadi Siregar S.Pd', 'repellendus', 34, 'Ki. Dipenogoro No. 202, Bitung 30359, Bali'),
(29, 'Empluk Gandewa Samosir S.Kom', 'reiciendis', 27, 'Jln. Moch. Ramdan No. 583, Palopo 74326, JaTim'),
(30, 'Safina Yulianti', 'eveniet', 27, 'Gg. Yosodipuro No. 866, Medan 48994, Papua'),
(31, 'Usyi Pratiwi', 'et', 26, 'Kpg. Kartini No. 526, Cirebon 47357, KalSel'),
(32, 'Muhammad Samosir S.Sos', 'et', 27, 'Ki. Sumpah Pemuda No. 623, Kotamobagu 80533, Jambi'),
(33, 'Arta Kacung Gunarto S.Gz', 'ut', 36, 'Psr. Sutan Syahrir No. 302, Sawahlunto 51774, BaBel'),
(34, 'Ina Rahmawati S.Ked', 'aut', 36, 'Kpg. Baung No. 864, Jayapura 59589, JaTeng'),
(35, 'Tiara Ghaliyati Laksmiwati', 'officia', 39, 'Ki. Taman No. 738, Administrasi Jakarta Utara 15658, Bali'),
(36, 'Ana Ina Yuniar', 'odit', 35, 'Jr. Adisucipto No. 229, Banjarbaru 76801, DKI'),
(37, 'Okta Gatra Pangestu', 'odit', 26, 'Ds. Radio No. 689, Bau-Bau 70975, Bengkulu'),
(38, 'Labuh Darimin Firmansyah M.Pd', 'sequi', 25, 'Ki. Sumpah Pemuda No. 765, Palu 71001, SulTra'),
(39, 'Dadi Dongoran', 'rem', 28, 'Ds. Krakatau No. 577, Tebing Tinggi 79935, Bali'),
(40, 'Panji Napitupulu S.Pt', 'exercitationem', 38, 'Jln. Urip Sumoharjo No. 840, Pangkal Pinang 35990, JaTim'),
(41, 'Putri Wastuti S.Pd', 'id', 40, 'Dk. Gardujati No. 244, Tarakan 25612, Papua'),
(42, 'Radit Pratama S.T.', 'ut', 37, 'Jr. Basuki No. 690, Pariaman 78852, Lampung'),
(43, 'Mitra Narpati', 'exercitationem', 38, 'Psr. Yoga No. 752, Gorontalo 48521, Gorontalo'),
(44, 'Laila Haryanti', 'amet', 28, 'Gg. Sutarjo No. 457, Pasuruan 17113, KepR'),
(45, 'Wage Bakiman Nashiruddin', 'iure', 27, 'Kpg. Abdul No. 605, Parepare 18843, SulTra'),
(46, 'Malika Anggraini', 'sit', 34, 'Ds. Gedebage Selatan No. 740, Banda Aceh 86995, MalUt'),
(47, 'Banara Dimaz Adriansyah', 'voluptatem', 30, 'Kpg. Tangkuban Perahu No. 858, Blitar 90675, DKI'),
(48, 'Hafshah Novi Aryani S.Psi', 'laudantium', 35, 'Jln. Warga No. 503, Pagar Alam 64609, JaTim'),
(49, 'Oman Mandala', 'culpa', 34, 'Ki. Ronggowarsito No. 551, Palembang 74910, SulUt'),
(50, 'Cakrajiya Waskita S.E.', 'totam', 40, 'Ki. Daan No. 596, Sukabumi 22067, Jambi'),
(51, 'Indah Novitasari', 'at', 34, 'Jr. Pahlawan No. 274, Banjar 99141, KalTim'),
(52, 'Karma Nababan', 'cumque', 25, 'Kpg. Surapati No. 153, Bukittinggi 21234, JaTim'),
(53, 'Rizki Upik Firgantoro S.E.I', 'quis', 35, 'Ds. Bank Dagang Negara No. 639, Banjarbaru 48253, Papua'),
(54, 'Abyasa Irawan', 'ipsam', 36, 'Ds. Cut Nyak Dien No. 911, Salatiga 45111, Aceh'),
(55, 'Michelle Hartati', 'necessitatibus', 39, 'Ds. Veteran No. 524, Padangsidempuan 98847, Lampung'),
(56, 'Michelle Pratiwi', 'a', 34, 'Jln. Arifin No. 407, Batu 22639, SumUt'),
(57, 'Kartika Ciaobella Hariyah', 'aspernatur', 36, 'Jln. Suryo Pranoto No. 134, Batu 99985, Riau'),
(58, 'Dipa Praba Siregar', 'alias', 28, 'Jln. Nakula No. 527, Sibolga 32860, SumSel'),
(60, 'Liman Emas Mangunsong', 'itaque', 28, 'Jr. Bagonwoto  No. 309, Sawahlunto 37136, Gorontalo'),
(61, 'Rahmat Cahya Santoso S.Farm', 'odio', 39, 'Psr. Lumban Tobing No. 426, Mojokerto 75615, Aceh'),
(62, 'Jane Maya Rahayu S.Pd', 'ex', 32, 'Jr. Bawal No. 695, Tidore Kepulauan 73983, SulTeng'),
(63, 'Aisyah Maryati M.Ak', 'quibusdam', 38, 'Dk. Bayan No. 246, Dumai 44313, KepR'),
(64, 'Cakrabuana Suryono', 'doloremque', 31, 'Jln. Ciumbuleuit No. 539, Madiun 10079, KalBar'),
(65, 'Iriana Prastuti', 'excepturi', 31, 'Dk. PHH. Mustofa No. 460, Pagar Alam 35959, DKI'),
(66, 'Titin Nasyiah S.E.', 'nisi', 38, 'Psr. Gremet No. 3, Parepare 70255, Maluku'),
(67, 'Paris Hassanah', 'ab', 31, 'Psr. Wahid No. 796, Tasikmalaya 41544, KepR'),
(68, 'Ayu Hasanah', 'aliquid', 26, 'Jr. Jend. Sudirman No. 768, Bitung 73766, Aceh'),
(69, 'Cahya Oman Kurniawan', 'vero', 32, 'Psr. Sugiyopranoto No. 272, Serang 75226, NTT'),
(70, 'Gina Yuliana Laksmiwati', 'ut', 32, 'Dk. Achmad No. 405, Administrasi Jakarta Pusat 66022, Maluku'),
(71, 'Jayeng Purwa Mansur S.Psi', 'quis', 29, 'Ds. Muwardi No. 333, Tarakan 58839, DKI'),
(72, 'Mulya Indra Ramadan', 'omnis', 28, 'Ki. Sutarjo No. 196, Kendari 46219, Bali'),
(73, 'Yulia Wirda Oktaviani S.Pd', 'ipsam', 30, 'Ds. Baabur Royan No. 831, Administrasi Jakarta Timur 62273, PapBar'),
(74, 'Vega Natsir S.Psi', 'iste', 37, 'Gg. Pasteur No. 603, Depok 46832, SumBar'),
(75, 'Gina Pudjiastuti', 'deserunt', 27, 'Ki. Abdul Rahmat No. 119, Madiun 52328, MalUt'),
(76, 'Kajen Jindra Narpati M.Ak', 'sit', 26, 'Psr. Ujung No. 181, Tanjungbalai 33210, Maluku'),
(77, 'Rangga Anggabaya Prasetyo', 'eligendi', 28, 'Gg. Badak No. 875, Cirebon 75510, SumBar'),
(78, 'Amelia Nuraini', 'corrupti', 40, 'Jln. Cikutra Barat No. 868, Tasikmalaya 51761, Maluku'),
(79, 'Raihan Pradipta M.Pd', 'illo', 36, 'Jln. Yoga No. 8, Tebing Tinggi 40836, SulSel'),
(80, 'Malik Cahyadi Saragih S.Psi', 'aut', 39, 'Dk. Acordion No. 701, Salatiga 10156, Riau'),
(81, 'Harimurti Banawa Firmansyah S.Gz', 'numquam', 29, 'Ds. Sutan Syahrir No. 924, Sorong 91464, SulSel'),
(82, 'Danuja Rajata', 'ut', 30, 'Kpg. Batako No. 474, Subulussalam 25367, SulTra'),
(84, 'Karma Uwais', 'odio', 30, 'Kpg. Dipatiukur No. 873, Manado 32268, SulBar'),
(85, 'Ayu Yuniar', 'deserunt', 35, 'Jr. Abdul Muis No. 972, Metro 11512, KalTim'),
(86, 'Warji Salman Prasetya S.Pt', 'aliquam', 35, 'Jln. Diponegoro No. 598, Subulussalam 39414, KalBar'),
(87, 'Ulva Laila Susanti', 'non', 30, 'Gg. Villa No. 586, Palopo 60361, SulSel'),
(88, 'Najwa Icha Rahayu', 'qui', 36, 'Psr. Padang No. 900, Cilegon 23992, SulSel'),
(89, 'Cornelia Wirda Widiastuti S.Kom', 'sit', 33, 'Jln. Rumah Sakit No. 735, Manado 87236, NTB'),
(90, 'Vega Prasasta S.Kom', 'consequatur', 25, 'Dk. Kebangkitan Nasional No. 9, Sukabumi 79502, JaTeng'),
(91, 'Kasiran Wasita', 'consectetur', 30, 'Kpg. Imam No. 247, Cilegon 69062, NTB'),
(92, 'Sabri Langgeng Hardiansyah', 'eum', 27, 'Gg. Krakatau No. 102, Parepare 82631, Banten'),
(93, 'Iriana Tania Rahimah', 'numquam', 30, 'Gg. Krakatau No. 388, Lhokseumawe 56029, Jambi'),
(94, 'Oman Saptono M.M.', 'voluptatum', 36, 'Jr. Cikutra Barat No. 736, Serang 72188, Lampung'),
(95, 'Mutia Haryanti', 'consequatur', 28, 'Ki. Jambu No. 584, Semarang 35122, JaTim'),
(96, 'Diah Farida', 'nihil', 31, 'Dk. Baranangsiang No. 134, Denpasar 59058, JaTeng'),
(97, 'Panji Darsirah Hutasoit M.M.', 'expedita', 30, 'Jr. Moch. Ramdan No. 997, Depok 14287, SulTra'),
(98, 'Endah Violet Aryani M.Kom.', 'dolorem', 29, 'Gg. Suryo No. 625, Banjar 67717, KalTeng'),
(99, 'Lulut Widodo', 'nisi', 26, 'Ki. Bazuka Raya No. 25, Pagar Alam 89586, KalUt'),
(100, 'Pranawa Hutapea', 'voluptatum', 36, 'Ds. K.H. Wahid Hasyim (Kopo) No. 506, Tidore Kepulauan 68370, SulSel'),
(101, 'Cici Zizi Yolanda', 'et', 37, 'Jr. Krakatau No. 670, Depok 80513, KalUt'),
(102, 'Malika Farah Usamah', 'assumenda', 27, 'Psr. Ronggowarsito No. 628, Balikpapan 54090, BaBel'),
(103, 'Danang Prakasa', 'assumenda', 40, 'Kpg. Suryo No. 220, Medan 91102, Maluku'),
(104, 'Salsabila Puspasari M.TI.', 'laborum', 34, 'Jr. Jend. A. Yani No. 681, Sawahlunto 36526, BaBel'),
(105, 'Sarah Calista Wulandari S.Gz', 'mollitia', 27, 'Psr. Bhayangkara No. 340, Cirebon 95905, KalUt'),
(106, 'Ana Ida Purwanti S.Pt', 'doloribus', 39, 'Jr. Muwardi No. 519, Parepare 35353, PapBar'),
(107, 'GGFH', 'FGHF', 12, 'FHDFH');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Damar Gaduh Wasita', 'Jr. Aceh No. 517, Jambi 25482, DIY', NULL, NULL),
(2, 'Zaenab Palastri S.Kom', 'Gg. Baik No. 80, Administrasi Jakarta Utara 95122, MalUt', NULL, NULL),
(3, 'Xanana Nababan M.Pd', 'Dk. Sam Ratulangi No. 404, Banjarmasin 96812, Banten', NULL, NULL),
(4, 'Ilsa Handayani', 'Dk. Yohanes No. 160, Cimahi 10017, Lampung', NULL, NULL),
(5, 'Jayeng Sitorus S.E.I', 'Psr. Sutarjo No. 435, Pematangsiantar 17432, Maluku', NULL, NULL),
(6, 'Jayadi Hidayat', 'Psr. Badak No. 528, Yogyakarta 32274, KepR', NULL, NULL),
(7, 'Melinda Hasanah', 'Jln. Haji No. 366, Padangpanjang 33289, DKI', NULL, NULL),
(8, 'Zelaya Rahayu', 'Ds. Jakarta No. 497, Jambi 80203, SulTeng', NULL, NULL),
(9, 'Paiman Ardianto S.I.Kom', 'Dk. Jayawijaya No. 755, Bitung 98716, DKI', NULL, NULL),
(10, 'Zizi Kuswandari', 'Jln. Gatot Subroto No. 773, Tebing Tinggi 28680, NTT', NULL, NULL),
(11, 'Edward Oskar Prabowo', 'Jln. Cokroaminoto No. 804, Sabang 45930, MalUt', NULL, NULL),
(12, 'Salsabila Rahayu', 'Dk. Diponegoro No. 241, Binjai 78790, Bali', NULL, NULL),
(13, 'Carla Laksita', 'Dk. Kebangkitan Nasional No. 853, Samarinda 93242, KalBar', NULL, NULL),
(14, 'Uchita Nuraini', 'Gg. Ki Hajar Dewantara No. 284, Surakarta 77943, KalUt', NULL, NULL),
(15, 'Ilsa Wastuti S.T.', 'Jln. Mulyadi No. 808, Dumai 30319, JaTeng', NULL, NULL),
(16, 'Purwadi Gadang Anggriawan M.M.', 'Jr. K.H. Wahid Hasyim (Kopo) No. 820, Tegal 90555, BaBel', NULL, NULL),
(17, 'Nadine Nova Oktaviani', 'Ki. Bakau No. 145, Padang 79282, KepR', NULL, NULL),
(18, 'Kenzie Uwais S.Farm', 'Jr. Achmad Yani No. 166, Tangerang 93946, NTB', NULL, NULL),
(19, 'Cawuk Nugroho', 'Gg. Rajiman No. 528, Tegal 57582, KalUt', NULL, NULL),
(20, 'Nilam Kusmawati', 'Ds. Industri No. 625, Gorontalo 88673, SumUt', NULL, NULL),
(21, 'Umi Citra Utami M.Kom.', 'Psr. Laksamana No. 482, Samarinda 35534, SumBar', NULL, NULL),
(22, 'Gading Sinaga', 'Dk. Salam No. 72, Tebing Tinggi 76983, Jambi', NULL, NULL),
(23, 'Ilyas Ajimat Sihombing', 'Psr. Bak Mandi No. 934, Mataram 64307, SulTeng', NULL, NULL),
(24, 'Darijan Kalim Siregar S.Farm', 'Ki. PHH. Mustofa No. 867, Salatiga 13688, DIY', NULL, NULL),
(25, 'Drajat Megantara', 'Ki. Bakti No. 259, Banda Aceh 16900, KalSel', NULL, NULL),
(26, 'Ciaobella Rahayu Pertiwi M.Kom.', 'Kpg. Sunaryo No. 472, Banjarmasin 35928, Lampung', NULL, NULL),
(27, 'Marwata Nugraha Jailani', 'Ki. Otto No. 603, Magelang 14809, NTB', NULL, NULL),
(28, 'Winda Aurora Safitri M.Pd', 'Jln. Bambu No. 506, Ambon 63330, KalTim', NULL, NULL),
(29, 'Saka Hidayanto', 'Jr. Babah No. 461, Medan 94621, NTB', NULL, NULL),
(30, 'Zahra Laras Suryatmi', 'Ds. Sampangan No. 758, Madiun 37638, DKI', NULL, NULL),
(31, 'Aditya Zulkarnain', 'Jln. R.E. Martadinata No. 341, Tangerang 57413, KalUt', NULL, NULL),
(32, 'Suci Utami', 'Gg. Cut Nyak Dien No. 760, Pagar Alam 34451, Lampung', NULL, NULL),
(33, 'Cahyono Prayoga', 'Dk. Abdul Rahmat No. 145, Pangkal Pinang 74518, MalUt', NULL, NULL),
(34, 'Mustofa Hardiansyah', 'Kpg. Baan No. 570, Administrasi Jakarta Timur 41777, Aceh', NULL, NULL),
(35, 'Setya Nugroho M.Ak', 'Ki. Sugiyopranoto No. 85, Magelang 65438, KalTim', NULL, NULL),
(36, 'Nabila Yuliana Yuniar S.T.', 'Dk. Ki Hajar Dewantara No. 561, Parepare 63484, DIY', NULL, NULL),
(37, 'Shania Maya Hartati', 'Kpg. Pasirkoja No. 116, Surakarta 24686, NTT', NULL, NULL),
(38, 'Rina Astuti', 'Psr. Samanhudi No. 975, Banjar 38732, JaTeng', NULL, NULL),
(39, 'Sarah Sarah Fujiati S.E.', 'Ki. Gading No. 151, Pekalongan 68265, BaBel', NULL, NULL),
(40, 'Mulyono Pradipta S.Farm', 'Kpg. Yap Tjwan Bing No. 565, Serang 64516, KalBar', NULL, NULL),
(41, 'Yunita Halimah', 'Jln. Sukabumi No. 337, Administrasi Jakarta Pusat 46869, NTB', NULL, NULL),
(42, 'Shakila Tari Fujiati', 'Jr. Sampangan No. 191, Sibolga 36950, Papua', NULL, NULL),
(43, 'Umay Kuswoyo', 'Ki. Surapati No. 376, Banjarbaru 16229, KalSel', NULL, NULL),
(44, 'Olivia Zaenab Pratiwi', 'Ki. Haji No. 235, Bandar Lampung 42054, SumBar', NULL, NULL),
(45, 'Luthfi Mariadi Hakim S.Pt', 'Ki. Bayam No. 257, Tual 98235, SumUt', NULL, NULL),
(46, 'Elisa Nilam Wastuti S.Kom', 'Gg. Supomo No. 726, Cimahi 19607, SumSel', NULL, NULL),
(47, 'Ira Novitasari', 'Kpg. Flores No. 27, Cirebon 30680, Bali', NULL, NULL),
(48, 'Shakila Ika Pratiwi S.Pt', 'Ki. Samanhudi No. 258, Pariaman 67086, DIY', NULL, NULL),
(49, 'Kasiran Elvin Suryono', 'Kpg. Ters. Kiaracondong No. 167, Pagar Alam 49614, SumUt', NULL, NULL),
(50, 'Carla Dalima Laksmiwati S.Psi', 'Ds. Jaksa No. 389, Serang 75331, Banten', NULL, NULL),
(51, 'ilham', 'alamat', '2019-12-31 04:51:10', NULL),
(52, 'ilham', 'alamat', '2019-12-31 04:52:57', NULL),
(53, 'ilham', 'alamat', '2019-12-31 04:59:15', NULL),
(54, 'ilham', 'alamat', '2019-12-31 05:16:28', NULL),
(55, 'ilham', 'alamat', '2019-12-30 20:55:39', NULL),
(56, 'ilham', 'alamat', '2019-12-30 20:57:31', NULL),
(57, 'ilham', 'alamat', '2019-12-30 20:57:55', NULL),
(58, 'ilham', 'alamat', '2019-12-30 21:00:07', NULL),
(59, 'ilham', 'alamat', '2019-12-30 22:50:00', NULL),
(60, 'ilham', 'alamat', '2019-12-30 22:50:32', NULL),
(61, 'ilham', 'alamat', '2019-12-30 23:02:15', NULL),
(62, 'ilham', 'alamat', '2019-12-30 23:09:36', NULL),
(63, 'ilham', 'alamat', '2019-12-30 23:16:43', NULL),
(64, 'ilham', 'alamat', '2019-12-30 23:21:40', NULL),
(65, 'ilham', 'alamat', '2019-12-30 23:23:24', NULL),
(66, 'ilham', 'alamat', '2019-12-30 23:23:46', NULL),
(67, 'ilham', 'alamat', '2019-12-30 23:23:52', NULL),
(68, 'ilham', 'alamat', '2019-12-30 23:24:45', NULL),
(69, 'ilham', 'alamat', '2019-12-30 23:25:46', NULL),
(70, 'ilham', 'alamat', '2019-12-30 23:26:46', NULL),
(71, 'ilham', 'alamat', '2019-12-30 23:27:45', NULL),
(72, 'ilham', 'alamat', '2019-12-30 23:28:45', NULL),
(73, 'ilham', 'alamat', '2020-01-09 05:03:53', NULL),
(74, 'ilham', 'alamat', '2020-01-09 05:04:45', NULL),
(75, 'ilham', 'alamat', '2020-01-09 05:05:45', NULL),
(76, 'ilham', 'alamat', '2020-01-09 05:06:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `upi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `upi`, `ap`, `user`, `nama`, `email`, `nohp`, `bidang`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '11', '11SBS', 'admin', 'admin', 'admin@admin.com', '0', 'tren', '$2y$10$dYppRJAW3CMLcMoz/0v26eoEu4.H7YmMYlFU3vZDQUFNWeGL8afN2', 'lZnPoQQqLHBYevsJ4pIMUx3WfhKuumQ2vUaZTTHtV5HCCDQOtfyCwEJ2Qt1E', '2019-10-19 19:47:23', '2019-10-19 19:47:23'),
(2, '11', '11SBS', 'ilham', 'Ilham Zulfikri', 'ilham.zulfikri@pln.co.id', '085277193989', 'tren', '$2y$10$dYppRJAW3CMLcMoz/0v26eoEu4.H7YmMYlFU3vZDQUFNWeGL8afN2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notadinas`
--
ALTER TABLE `notadinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notadinas`
--
ALTER TABLE `notadinas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
