-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ittama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` text DEFAULT NULL,
  `is_showing` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id`, `title`, `body`, `icon`, `link`, `is_showing`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Arsiparis', 'Berikut ini adalah data surat-surat dari arsiparis.', 'fa-solid fa-box-archive', NULL, 1, NULL, NULL, NULL),
(2, 'Data Tindak Lanjut', 'Berikut ini adalah data tindak lanjut auditor.', 'fa-solid fa-shield-alt', 'https://lookerstudio.google.com/u/0/reporting/0e8a43f7-da72-4498-85bb-cc5dab53762f', 1, NULL, '2025-10-13 04:45:25', NULL),
(3, 'Daftar Pegawai Inspektorat Utama', 'Berikut ini adalah daftar pegawai di Inspektorat Utama.', 'fa-solid fa-users-line', NULL, 1, NULL, NULL, NULL),
(4, 'New Docs', 'Test Docs 1234', 'fa-solid fa-adjust', 'https://www.youtube.com/watch?v=tCe5nme9FEs&list=RDtCe5nme9FEs&start_radio=1', 0, '2025-09-14 13:39:08', '2025-09-14 13:39:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` bigint(20) NOT NULL,
  `nama` text NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `golongan_pangkat` varchar(100) DEFAULT NULL,
  `sertifikasi_jfa` varchar(100) DEFAULT NULL,
  `pengalaman_kerja` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `unit`, `nip`, `jabatan`, `golongan_pangkat`, `sertifikasi_jfa`, `pengalaman_kerja`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Saeful Alam, S.E., MAK, Ak., CFrA., CFE., CA., CRMP, QGIA.', 'Inspektorat I', '196612041988031001', 'Inspektur I', 'Pembina Utama Muda (IV/c)', '', 4, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Panji Syahril Maulana, SE', 'Inspektorat I', '19830405 200912 1 002', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Sandhi Wijaya, SE', 'Inspektorat I', '19841103 201012 1 001', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'M. Gary Gautama, SE, MM', 'Inspektorat I', '19850711 201012 1 003', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Madya', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Fristyan Hangga P.C.P.P,S.A', 'Inspektorat I', '19901118 201503 1 000', 'Auditor Ahli Pertama', 'Penata Muda Tk. I (III/b)', 'Auditor Pertama', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Imam Baladin, SE', 'Inspektorat I', '19930822 201903 1 000', 'Auditor Ahli Pertama', 'Penata Muda Tk. I (III/b)', 'Auditor Pertama', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Aditya Imannanto, S.Akun', 'Inspektorat I', '19880318 201503 1 000', ' Auditor Mahir', 'Penata Muda (III/a)', 'Auditor Mahir', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Nurul Firmansyah, S.E', 'Inspektorat I', '19900505 201503 1 000', 'Auditor Ahli Pertama', 'Penata Muda (III/a)', 'Auditor Pertama', 19, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Daryati', 'Inspektorat I', '19790821 200912 2 001', 'Auditor Ahli Pertama', 'Penata Muda Tk. I (III/b)', 'Auditor Pertama', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Dytha Ariestha, A.Md, Ak.', 'Inspektorat I', '19960322 201903 2 003', 'Auditor Terampil', 'Penata Muda (III/a)', 'Auditor Terampil', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Sandy kurniawan, A.Md. Ak', 'Inspektorat I', '20000625 202202 1 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Angel Oridani Putri Mantiri, A.Md. Ak', 'Inspektorat I', '20000919 202202 2 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Anisa Fitriani, A.Md. Ak', 'Inspektorat I', '20001226 202202 2 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Machdar Al Muchdor, A.Md. Ak', 'Inspektorat I', '20000228 202202 1 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Mohammad Hanif Murthada, A.Md. Ak', 'Inspektorat I', '20000517 202202 1 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Muhammad Zakialf Arkan, A.Md. Ak', 'Inspektorat I', '20010126 202202 1 000', 'Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Sufi Suciati, A.Md.Ak.', 'Inspektorat I', '20020227 202506 2 002', 'Auditor Terampil', 'Pengatur (II/c)', 'Belum serfitfikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Ririn Siti Rahmawati, A.Md.Akun. ', 'Inspektorat I', '19970411 202506 2 006', 'Auditor Terampil', 'Pengatur (II/c)', 'Belum serfitfikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Agus Hardja Santana, A.k., M.M., CA., CRMP., CRGP.', 'Inspektorat II', '19690820 198903 1 001', 'Inspektur II', 'Pembina Utama Madya (IV/d)', 'Belum serfitfikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Susilawati, SE', 'Inspektorat II', '19780606 201012 2 001', ' Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Madya', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Roy Marthin, SE', 'Inspektorat II', '19790730 200912 1 001', ' Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Panji Satrio Widagdo, S.E', 'Inspektorat II', '19891123 201503 1 002', ' Auditor Ahli Muda', 'Penata (III/c)', 'Auditor Muda', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Ivanna Yuliati Subanu, S.E', 'Inspektorat II', '19800714 201503 2 002', ' Auditor Ahli Muda', 'Penata (III/c)', 'Auditor Muda', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Fakhrur Rozi Rifka, SE', 'Inspektorat II', '19901212 201903 1 003', ' Auditor Ahli Muda', 'Penata (III/c)', 'Auditor Muda', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Wahyu Dominggo Sinaga, SE', 'Inspektorat II', '19900531 201903 1 002', ' Auditor Ahli Pertama', 'Penata Muda Tk. I (III/b)', 'Auditor Pertama', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Sudarwarawati, S.M', 'Inspektorat II', '19780305 201012 2 001', ' Auditor Ahli Pertama', 'Penata Muda Tk. I (III/b)', 'Auditor Pertama', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Sari Dwi Jayanti, S.E', 'Inspektorat II', '19910621 201012 2 001', ' Auditor Ahli Pertama', 'Penata Muda (III/a)', 'Auditor Pertama', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Eki Rusmanto, S.E', 'Inspektorat II', '19881026 201503 1 006', ' Auditor Ahli Pertama', 'Penata Muda (III/a)', 'Auditor Pertama', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Radhiathul Salma, S.E', 'Inspektorat II', '19931222 201503 2 001', ' Auditor Ahli Pertama', 'Penata Muda (III/a)', 'Auditor Pertama', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Candra Faris Wijanarko, A.Md', 'Inspektorat II', '19890831 201903 1 002', ' Auditor Terampil', 'Pengatur Tk. I (II/d)', 'Auditor Terampil', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Meisti Kurnia, A.Md', 'Inspektorat II', '19950521 201903 2 003', ' Auditor Terampil', 'Penata Muda (III/a)', 'Auditor Terampil', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Agung Prastika Sekti, S.Ak', 'Inspektorat II', '19850102 201903 1 007', ' Auditor Terampil', 'Penata Muda (III/a)', 'Auditor Pertama', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Fahma Rahmawati, A.Md. Ak', 'Inspektorat II', '20000404 202202 2002', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'I Dewa Gede Vrischika Sedanayoga, A.Md. Ak', 'Inspektorat II', '20001115 202202 1001', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Asyrafi Yusuf, A.Md. Ak', 'Inspektorat II', '19990531 202202 1002', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Maharani Apta Candraningtyas, A.Md.Ak.', 'Inspektorat II', '19990422 202202 2001', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Dhiya Salsabila, A.Md.Ak.', 'Inspektorat II', '20000115 202202 2003', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Desna Sasmita Sari. A.Md. ', 'Inspektorat II', '19971227 202506 2 003', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum serfikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Nadira Dwifta Novalyanti. A.Md.Akun. ', 'Inspektorat II', '19961102 202506 2 004', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum serfikasi', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Noor Fath Malika. A.Md ', 'Inspektorat II', '19900811 202506 2 001', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum serfikasi', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Saras Kusumawati, A.Md. ', 'Inspektorat II', '19970227 202506 2 003', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum serfikasi', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Kombes Pol Deden Nurhidayatullah, S.H., S.I.K., M.H., CPHR.', 'Inspektorat III', '78100888', 'Plt. Inspektur III', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Ira Silviana Suseno, S.T., S.E., M.Ak., CA., CRMP., CFrA., CFRMP.,CRGP', 'Inspektorat III', '19790726 200912 2 001', 'Auditor Ahli Madya', 'Pembina (IV/a)', 'Auditor Madya', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Robert Edison Pardosi, SE', 'Inspektorat III', '19770317 200912 1 001', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Pahala Simanjuntak, SE', 'Inspektorat III', '19870726 201012 1 001', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 15, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Khaikal Mulki, S.E', 'Inspektorat III', '19890118 201503 1 002', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Hamza Fansuri S.E', 'Inspektorat III', '19911110 201503 1 003', 'Auditor Ahli Muda', 'Penata Tk. I (III/d)', 'Auditor Muda', 10, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Albertus Prabowo, A.Md', 'Inspektorat III', '19761115 200912 1 001', ' Auditor Mahir', 'Penata Muda Tk. I (III/b)', 'Auditor Mahir', 16, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'Dewi Marintan Tambunan, A.Md', 'Inspektorat III', '19880513 201903 2 002', ' Auditor Terampil', 'Pengatur Tk. I (II/d)', 'Auditor Terampil', 6, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Nurul Qomariah, A.Md. Ak', 'Inspektorat III', '20010811 202202 2001', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Rafi Naufal Arivia, A.Md. Ak', 'Inspektorat III', '20001225 202202 1001', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Alya Nadiasty Suyatno Putri, A.Md. Ak', 'Inspektorat III', '20001023 202202 2004', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'Syabila Fajrin Rahmadina, A.Md. Ak', 'Inspektorat III', '19991201 202202 2001', ' Auditor Terampil', 'Pengatur (II/c)', 'Auditor Terampil', 3, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Dandhi Raga Nata, A.Md', 'Inspektorat III', '20000504 202506 1 002', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum sertifikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Adinda Hilda Widyastuti, A.Md.Akun.', 'Inspektorat III', '20001218 202506 2 005', ' Auditor Terampil', 'Pengatur (II/c)', 'Belum sertifikasi', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Erna Juita, S.E., M.M.', 'Tata Usaha', '19810112 200912 2 002', 'Kepala Bagian Tata Usaha', 'Pembina (IV/a)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Sulistyowati, S.E', 'Tata Usaha', '19750307 200501 2 001', 'Analis Keuangan APBN Ahli Muda', 'Penata Tk. I (III/d)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Rizki Dameria Amelinda, S.K.M', 'Tata Usaha', '19880511 201012 2 003', 'Perencana Ahli Muda', 'Penata Tk. I (III/d)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Regina Anggi, S.Ak.', 'Tata Usaha', '19900129 201503 2 004', 'Penata Layanan Operasional', 'Penata Muda (III/a)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Eliyah, A.Md', 'Tata Usaha', '19810309 201012 2 001', 'Arsiparis Mahir', 'Penata Muda Tk. I (III/b)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Lusiana, A.Md', 'Tata Usaha', '19890510 201503 2 004', 'Pengolah Data dan Informasi', 'Penata Muda (III/a)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Elsy Herzalena, A.Md', 'Tata Usaha', '19850121 200912 2 001', 'Pranata Komputer Terampil', 'Pengatur Tk. I (II/d)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Faiza Anreza, A.Md', 'Tata Usaha', '19950116 202012 2 015', 'Pengolah Data dan Informasi', 'Pengatur Tk. I (II/d)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Praditya Muftiadhi, A.Md.', 'Tata Usaha', '19891025 202012 1 003', 'Pengolah Data dan Informasi', 'Pengatur Tk. I (II/d)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Yuni Astuti, A,Md.MRA. ', 'Tata Usaha', '20000623 202506 2 005', 'Arsiparis Terampil', 'Pengatur (II/c)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Hilmawan Saputra, A.Md', 'Tata Usaha', '19950422 202506 1 001', 'Pranata Komputer Terampil', 'Pengatur (II/c)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Feriandra Aryo Wijaya, A.Md.Kom', 'Tata Usaha', '20020429 202506 1 003', 'Pranata Komputer Terampil', 'Pengatur (II/c)', 'Non JFA', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Citra Kusumah Setyaningrum', 'Tata Usaha', NULL, 'Tenaga Administrasi', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Adolf H.Y. Ondang', 'Tata Usaha', NULL, 'Tenaga Administrasi', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Sulaiman', 'Tata Usaha', NULL, 'Tenaga Administrasi', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Divia Rachmaniza', 'Tata Usaha', NULL, 'Tenaga Administrasi', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Agung Mahardika', 'Tata Usaha', NULL, 'Tenaga Administrasi', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Popy', 'Tata Usaha', NULL, 'Tenaga Pengemudi Operasional', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Muhammad Muslim', 'Tata Usaha', NULL, 'Tenaga Pengemudi Operasional', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Yulianto Dwi Prasetyo', 'Tata Usaha', NULL, 'Tenaga Pengemudi Operasional', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `nama` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `privillage` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `id_pegawai`, `username`, `nama`, `password`, `email`, `privillage`, `is_active`) VALUES
(1, NULL, 'admin', 'Admin', '789f2b43484bed43867a55889bae7f6d811fe45d67fb9ed410881f48996325a2', 'admin@bnpb.go.id', 0, 1),
(3, 2, 'Panji', 'Panji Syahril Maulana, SE', '0bc497eee80a13418ff9af0bc81dccb7de12ef6736dd766a5e0a18057657421a', 'panji@gmail.com', 1, 1),
(4, 13, 'Anisa', 'Anisa Fitriani, A.Md. Ak', '695ca2055a7eaea0ef1f9fb8a19ca1219eb79a6fd6c41fff182462b8cff77b21', 'anisa@gmail.com', 1, 1),
(5, 10, 'Dytha', 'Dytha Ariestha, A.Md, Ak.', '6f4f756ffea0943790a816f0e7ef8be609cb51b07fdfa9f968f9d37c06cd66a2', 'Dytha1234@gmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_akses`
--

CREATE TABLE `tb_user_akses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fitur` enum('pegawai','dokumen','pengguna') DEFAULT NULL,
  `is_create` tinyint(4) DEFAULT NULL,
  `is_update` tinyint(4) DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_akses`
--

INSERT INTO `tb_user_akses` (`id`, `id_user`, `fitur`, `is_create`, `is_update`, `is_read`, `is_delete`) VALUES
(1, 3, 'pegawai', 0, 0, 0, 0),
(2, 3, 'dokumen', 0, 0, 1, 0),
(3, 3, 'pengguna', 0, 0, 0, 0),
(4, NULL, 'dokumen', 0, 0, 0, 0),
(8, 4, 'dokumen', 0, 0, 0, 0),
(9, 4, 'pegawai', 0, 0, 1, 0),
(10, 4, 'pengguna', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_akses`
--
ALTER TABLE `tb_user_akses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user_akses`
--
ALTER TABLE `tb_user_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
