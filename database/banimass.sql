-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2020 at 01:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banimass`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_ma`
--

CREATE TABLE `absen_ma` (
  `id_absen` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tunjab` varchar(255) NOT NULL,
  `total_jam` varchar(255) NOT NULL,
  `jam_1` varchar(255) NOT NULL,
  `jam_2` varchar(255) NOT NULL,
  `jam_3` varchar(255) NOT NULL,
  `jam_4` varchar(255) NOT NULL,
  `jam_5` varchar(255) NOT NULL,
  `jam_6` varchar(255) NOT NULL,
  `jam_7` varchar(255) NOT NULL,
  `jam_8` varchar(255) NOT NULL,
  `guru_ma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_ma`
--

INSERT INTO `absen_ma` (`id_absen`, `tanggal`, `id`, `nama`, `jabatan`, `tunjab`, `total_jam`, `jam_1`, `jam_2`, `jam_3`, `jam_4`, `jam_5`, `jam_6`, `jam_7`, `jam_8`, `guru_ma`) VALUES
(1, '2020-11-16', 1, 'ma', 'guru', '200000', '4', '1', '2', '3', '4', '', '', '', '', 'Guru_Ma'),
(2, '2020-11-18', 1, 'ma', 'guru', '200000', '2', '', '', '', '', '', '', '7', '8', 'Guru_Ma'),
(3, '2020-11-18', 3, 'ma mts', 'kepala sekolah', '300000', '4', '1', '2', '3', '4', '', '', '', '', 'Guru_Ma'),
(4, '2020-11-18', 4, 'masruki', 'guru', '0', '3', '1', '2', '3', '', '', '', '', '', 'Guru_Ma'),
(5, '2020-11-18', 6, 'ndas', 'kepala tu', '200000', '2', '1', '2', '', '', '', '', '', '', 'Guru_Ma');

-- --------------------------------------------------------

--
-- Table structure for table `absen_mts`
--

CREATE TABLE `absen_mts` (
  `id_absen` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tunjab` varchar(255) NOT NULL,
  `total_jam` varchar(255) NOT NULL,
  `jam_1` varchar(255) NOT NULL,
  `jam_2` varchar(255) NOT NULL,
  `jam_3` varchar(255) NOT NULL,
  `jam_4` varchar(255) NOT NULL,
  `jam_5` varchar(255) NOT NULL,
  `jam_6` varchar(255) NOT NULL,
  `jam_7` varchar(255) NOT NULL,
  `jam_8` varchar(255) NOT NULL,
  `guru_mts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_mts`
--

INSERT INTO `absen_mts` (`id_absen`, `tanggal`, `id`, `nama`, `jabatan`, `tunjab`, `total_jam`, `jam_1`, `jam_2`, `jam_3`, `jam_4`, `jam_5`, `jam_6`, `jam_7`, `jam_8`, `guru_mts`) VALUES
(1, '2020-11-17', 2, 'mts', 'guru', '0', '2', '', '', '', '', '5', '6', '', '', 'Guru_Mts'),
(2, '2020-11-18', 2, 'mts', 'guru', '0', '4', '1', '2', '', '', '', '', '7', '8', 'Guru_Mts'),
(3, '2020-11-18', 3, 'ma mts', 'kepala sekolah', '300000', '2', '', '', '', '', '', '', '7', '8', 'Guru_Mts'),
(4, '2020-11-18', 6, 'ndas', 'kepala tu', '200000', '2', '', '', '', '4', '5', '', '', '', 'Guru_Mts');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`, `level`) VALUES
(1, 'aris@gmail.com', 'aris', '$2y$10$LbbtLRvxw.k9LCLqNLSkTegAmossXgOOhTbLAKnvjgipJ4cqeIGCC', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_pegawai` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tunjab` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `guru_ma` varchar(255) NOT NULL,
  `guru_mts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama`, `nomor_pegawai`, `username`, `password`, `jabatan`, `tunjab`, `foto`, `guru_ma`, `guru_mts`) VALUES
(1, 'ma', '52872865874', 'ma', 'ma', 'guru', '200000', '5fb45ddb2e4b3.jpg', 'Guru_Ma', ''),
(2, 'mts', '65675757657', 'mts', 'mts', 'guru', '0', '5fb46ece2c184.png', '', 'Guru_Mts'),
(3, 'ma mts', '87687578677', 'ma mts', 'ma mts', 'kepala sekolah', '300000', '5fb45f2dca902.jpg', 'Guru_Ma', 'Guru_Mts'),
(4, 'masruki', '86576576556', 'masruki', 'masruki', 'guru', '0', '5fb45f5f901c2.jpg', 'Guru_Ma', ''),
(5, 'alika mts', '76576575756', 'alika', 'alika', 'guru', '100000', '5fb45fc2eebf4.jpg', '', 'Guru_Mts'),
(6, 'ndas', '76576575756', 'ndas', 'ndas', 'kepala tu', '200000', '5fb45ff29cce8.jpg', 'Guru_Ma', 'Guru_Mts');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_ma`
--

CREATE TABLE `jurnal_ma` (
  `id_jurnal` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `jam_1` varchar(255) NOT NULL,
  `jam_2` varchar(255) NOT NULL,
  `jam_3` varchar(255) NOT NULL,
  `jam_4` varchar(255) NOT NULL,
  `jam_5` varchar(255) NOT NULL,
  `jam_6` varchar(255) NOT NULL,
  `jam_7` varchar(255) NOT NULL,
  `jam_8` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `materi_10` varchar(255) NOT NULL,
  `materi_11` varchar(255) NOT NULL,
  `materi_12` varchar(255) NOT NULL,
  `guru_ma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_ma`
--

INSERT INTO `jurnal_ma` (`id_jurnal`, `tanggal`, `id`, `nama`, `mapel`, `jam_1`, `jam_2`, `jam_3`, `jam_4`, `jam_5`, `jam_6`, `jam_7`, `jam_8`, `status`, `materi_10`, `materi_11`, `materi_12`, `guru_ma`) VALUES
(1, '2020-11-16', 1, 'ma', 'Al Quran Hadits', '1', '2', '', '', '', '', '', '', 'Guru Pengajar', '', 'quran', '', 'Guru_Ma'),
(2, '2020-11-16', 1, 'ma', 'Akidah Akhlak', '', '', '3', '4', '', '', '', '', 'Guru Pengganti', '', '', 'akidah', 'Guru_Ma'),
(3, '2020-11-18', 1, 'ma', 'Nahwu Shorof', '', '', '', '', '', '', '7', '8', 'Guru Pengajar', 'nahwu', '', '', 'Guru_Ma'),
(4, '2020-11-18', 3, 'ma mts', 'Matematika', '1', '2', '', '', '', '', '', '', 'Guru Pengajar', '', 'diskrit', '', 'Guru_Ma'),
(5, '2020-11-18', 3, 'ma mts', 'Seni Budaya', '', '', '3', '4', '', '', '', '', 'Guru Pengajar', '', '', 'patung dari kertas', 'Guru_Ma'),
(6, '2020-11-18', 4, 'masruki', 'Bahasa Arab', '1', '2', '3', '', '', '', '', '', 'Guru Pengganti', '', '', 'arabian capucino', 'Guru_Ma'),
(7, '2020-11-18', 6, 'ndas', 'SEJARAH', '1', '2', '', '', '', '', '', '', 'Guru Pengganti', '', '', 'sejarah telukan', 'Guru_Ma');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_mts`
--

CREATE TABLE `jurnal_mts` (
  `id_jurnal` int(200) NOT NULL,
  `tanggal` date NOT NULL,
  `id` int(200) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `jam_1` varchar(255) NOT NULL,
  `jam_2` varchar(255) NOT NULL,
  `jam_3` varchar(255) NOT NULL,
  `jam_4` varchar(255) NOT NULL,
  `jam_5` varchar(255) NOT NULL,
  `jam_6` varchar(255) NOT NULL,
  `jam_7` varchar(255) NOT NULL,
  `jam_8` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `materi_7` varchar(255) NOT NULL,
  `materi_8` varchar(255) NOT NULL,
  `materi_9` varchar(255) NOT NULL,
  `guru_mts` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurnal_mts`
--

INSERT INTO `jurnal_mts` (`id_jurnal`, `tanggal`, `id`, `nama`, `mapel`, `jam_1`, `jam_2`, `jam_3`, `jam_4`, `jam_5`, `jam_6`, `jam_7`, `jam_8`, `status`, `materi_7`, `materi_8`, `materi_9`, `guru_mts`) VALUES
(1, '2020-11-17', 2, 'mts', 'Prakarya', '', '', '', '', '5', '6', '', '', 'Guru Pengganti', '', 'kerajinan tangan', '', 'Guru_Mts'),
(2, '2020-11-18', 2, 'mts', 'Fikih', '1', '2', '', '', '', '', '', '', 'Guru Pengganti', 'wudhu', '', '', 'Guru_Mts'),
(3, '2020-11-18', 3, 'ma mts', 'Bahasa Inggris', '', '', '', '', '', '', '7', '8', 'Guru Pengganti', 'greetings', '', '', 'Guru_Mts'),
(4, '2020-11-18', 6, 'ndas', 'IPA', '', '', '', '4', '5', '', '', '', 'Guru Pengajar', '', 'alat reproduksi laki - laki', '', 'Guru_Mts'),
(5, '2020-11-18', 2, 'mts', 'IPS', '', '', '', '', '', '', '7', '8', 'Guru Pengganti', '', '', 'sosialita', 'Guru_Mts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_ma`
--
ALTER TABLE `absen_ma`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `absen_mts`
--
ALTER TABLE `absen_mts`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_ma`
--
ALTER TABLE `jurnal_ma`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `jurnal_mts`
--
ALTER TABLE `jurnal_mts`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_ma`
--
ALTER TABLE `absen_ma`
  MODIFY `id_absen` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `absen_mts`
--
ALTER TABLE `absen_mts`
  MODIFY `id_absen` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurnal_ma`
--
ALTER TABLE `jurnal_ma`
  MODIFY `id_jurnal` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurnal_mts`
--
ALTER TABLE `jurnal_mts`
  MODIFY `id_jurnal` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
