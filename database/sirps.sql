-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 11:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(11) NOT NULL,
  `namaAdmin` varchar(255) NOT NULL,
  `emailAdmin` varchar(255) NOT NULL,
  `passwordAdmin` varchar(255) NOT NULL,
  `noTelpAdmin` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `namaAdmin`, `emailAdmin`, `passwordAdmin`, `noTelpAdmin`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'qwerty', '082331016638', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `idDosen` int(11) NOT NULL,
  `namaDosen` varchar(255) NOT NULL,
  `gelarDosen` varchar(255) NOT NULL,
  `jenisIdentitas` varchar(255) NOT NULL,
  `nomorIdentitas` varchar(255) NOT NULL,
  `noTelpDosen` varchar(20) NOT NULL,
  `emailDosen` varchar(255) NOT NULL,
  `passwordDosen` varchar(255) NOT NULL,
  `instansiDosen` varchar(255) NOT NULL,
  `programStudi` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`idDosen`, `namaDosen`, `gelarDosen`, `jenisIdentitas`, `nomorIdentitas`, `noTelpDosen`, `emailDosen`, `passwordDosen`, `instansiDosen`, `programStudi`, `status`) VALUES
(3, 'Eric Tohir', 'S.Tr', 'NUPT', '21082010009', '082331016639', 'eric@gmail.com', '123', 'Universitas Pembangunan Negeri', 'Teknik Industri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `idFakultas` int(11) NOT NULL,
  `namaFakultas` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`idFakultas`, `namaFakultas`, `status`) VALUES
(1, 'FAKULTAS KEDOKTERAN', 'Aktif'),
(2, 'FAKULTAS KEDOKTERAN GIGI', 'Aktif'),
(3, 'FAKULTAS HUKUM', 'Aktif'),
(4, 'FAKULTAS ILMU KEPERAWATAN', 'Aktif'),
(5, 'FAKULTAS KEGURUAN & ILMU PENDIDIKAN', 'Aktif'),
(6, 'FAKULTAS EKONOMI', 'Aktif'),
(7, 'FAKULTAS TEKNIK', 'Aktif'),
(8, 'FAKULTAS AGAMA ISLAM', 'Aktif'),
(9, 'FAKULTAS BAHASA & ILMU KOMUNIKASI', 'Aktif'),
(10, 'FAKULTAS FARMASI', 'Aktif'),
(11, 'FAKULTAS TEKNOLOGI INDUSTRI', 'Aktif'),
(12, 'FAKULTAS PSIKOLOGI', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `idJurusan` int(11) NOT NULL,
  `idFakultas` int(11) NOT NULL,
  `programStudi` varchar(100) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`idJurusan`, `idFakultas`, `programStudi`, `jenjang`, `status`) VALUES
(85, 1, 'Kedokteran Umum', 'S1', 'Aktif'),
(86, 1, 'Profesi Dokter', 'S1', 'Aktif'),
(87, 1, 'Kebidanan', 'S1', 'Aktif'),
(88, 1, 'Profesi Bidan', 'S1', 'Aktif'),
(89, 1, 'Magister Biomedik', 'S2', 'Aktif'),
(90, 2, 'Kedokteran Gigi', 'S1', 'Aktif'),
(91, 2, 'Profesi Dokter Gigi', 'S1', 'Aktif'),
(92, 2, 'Magister Ilmu Kedokteran Gigi', 'S2', 'Aktif'),
(93, 3, 'Ilmu Hukum', 'S1', 'Aktif'),
(94, 3, 'Magister Ilmu Hukum', 'S2', 'Aktif'),
(95, 3, 'Magister Kenotariatan', 'S2', 'Aktif'),
(96, 3, 'Doktor Ilmu Hukum', 'S3', 'Aktif'),
(97, 4, 'Ilmu Keperawatan', 'S1', 'Aktif'),
(98, 4, 'Profesi Ners', 'S1', 'Aktif'),
(99, 4, 'Keperawatan', 'S1', 'Aktif'),
(100, 5, 'Pendidikan Matematika', 'S1', 'Aktif'),
(101, 5, 'Pendidikan Bahasa dan Sastra Indonesia', 'S1', 'Aktif'),
(102, 5, 'Pendidikan Guru Sekolah Dasar', 'S1', 'Aktif'),
(103, 5, 'Pendidikan Profesi Guru', 'S1', 'Aktif'),
(104, 6, 'Manajemen', 'S1', 'Aktif'),
(105, 6, 'Akuntansi', 'S1', 'Aktif'),
(106, 6, 'Akuntansi', 'S1', 'Aktif'),
(107, 6, 'Magister Manajemen', 'S2', 'Aktif'),
(108, 6, 'Magister Akuntansi', 'S2', 'Aktif'),
(109, 6, 'Doktor Ilmu Manajemen', 'S3', 'Aktif'),
(110, 7, 'Teknik Sipil', 'S1', 'Aktif'),
(111, 7, 'Perencanaan Wilayah & Kota', 'S1', 'Aktif'),
(112, 7, 'Magister Teknik Sipil', 'S2', 'Aktif'),
(113, 7, 'Doktor Teknik Sipil', 'S3', 'Aktif'),
(114, 8, 'Tarbiyah', 'S1', 'Aktif'),
(115, 8, 'Syari’ah', 'S1', 'Aktif'),
(116, 8, 'Magister Pend. Agama Islam', 'S2', 'Aktif'),
(117, 9, 'Pendidikan Bahasa Inggris', 'S1', 'Aktif'),
(118, 9, 'Sastra Inggris', 'S1', 'Aktif'),
(119, 9, 'Ilmu Komunikasi', 'S1', 'Aktif'),
(120, 10, 'Farmasi', 'S1', 'Aktif'),
(121, 10, 'Profesi Apoteker', 'S1', 'Aktif'),
(122, 11, 'Teknik Elektro', 'S1', 'Aktif'),
(123, 11, 'Teknik Industri', 'S1', 'Aktif'),
(124, 11, 'Teknik Informatika', 'S1', 'Aktif'),
(125, 11, 'Magister Teknik Elektro', 'S2', 'Aktif'),
(126, 12, 'Psikologi', 'S1', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `idMahasiswa` int(11) NOT NULL,
  `namaMahasiswa` varchar(255) NOT NULL,
  `tahunMasuk` int(11) NOT NULL,
  `noTelpMahasiswa` varchar(20) NOT NULL,
  `emailMahasiswa` varchar(255) NOT NULL,
  `passwordMahasiswa` varchar(255) NOT NULL,
  `buktiAktif_pertama` varchar(255) NOT NULL,
  `buktiAktif_kedua` varchar(255) NOT NULL,
  `jurusanMahasiswa` varchar(255) NOT NULL,
  `jenisIdentitas` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`idMahasiswa`, `namaMahasiswa`, `tahunMasuk`, `noTelpMahasiswa`, `emailMahasiswa`, `passwordMahasiswa`, `buktiAktif_pertama`, `buktiAktif_kedua`, `jurusanMahasiswa`, `jenisIdentitas`, `status`) VALUES
(12, 'Muhammad Ulin Nuha Al Firas Manar', 2019, '082331016638', 'afirassmanar11@gmail.com', '123', 'BuktiPertama.jpg', 'BuktiKedua.jpg', 'Teknik Informatika', 'S1', 3),
(14, 'Mutia Dwi Sri', 2018, '08213123123', 'mutia@gmail.com', '123', 'BuktiPertama.jpg', 'BuktiKedua.jpg', 'Kedokteran Umum', 'S1', 3),
(16, 'Abdul Saleh', 2018, '082331016639', 'abdul@gmail.com', '123', 'BuktiPertama.jpg', 'BuktiKedua.jpg', 'Kedokteran Umum', 'S1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mk`
--

CREATE TABLE `tbl_mk` (
  `idMK` int(11) NOT NULL,
  `idFakultas` int(11) NOT NULL,
  `idJurusan` int(11) NOT NULL,
  `kodeMK` varchar(255) NOT NULL,
  `namaMK` varchar(255) NOT NULL,
  `rps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_mk`
--

INSERT INTO `tbl_mk` (`idMK`, `idFakultas`, `idJurusan`, `kodeMK`, `namaMK`, `rps`) VALUES
(8, 4367, 126, 'VWXC31', 'Mempelajari Kejiwaan Manusia', '08 Des 2022 Panduan Kurikulum OBE Prodi Sistem informasi v1.pdf'),
(9, 11, 124, '2N1YHD', 'Analisis Basis Data', '08 Des 2022 Panduan Kurikulum OBE Prodi Sistem informasi v1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelajaran`
--

CREATE TABLE `tbl_pembelajaran` (
  `idPembelajaran` int(11) NOT NULL,
  `idMahasiswa` int(11) NOT NULL,
  `kodeMK` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembelajaran`
--

INSERT INTO `tbl_pembelajaran` (`idPembelajaran`, `idMahasiswa`, `kodeMK`) VALUES
(3, 12, '2N1YHD'),
(6, 16, 'VWXC31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rps`
--

CREATE TABLE `tbl_rps` (
  `idRPS` int(11) NOT NULL,
  `idMK` int(11) NOT NULL,
  `rps` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rps`
--

INSERT INTO `tbl_rps` (`idRPS`, `idMK`, `rps`) VALUES
(1, 8, '08 Des 2022 Panduan Kurikulum OBE Prodi Sistem informasi v1.pdf'),
(2, 9, '08 Des 2022 Panduan Kurikulum OBE Prodi Sistem informasi v1.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`idDosen`);

--
-- Indexes for table `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`idFakultas`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`idJurusan`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`idMahasiswa`);

--
-- Indexes for table `tbl_mk`
--
ALTER TABLE `tbl_mk`
  ADD PRIMARY KEY (`idMK`);

--
-- Indexes for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  ADD PRIMARY KEY (`idPembelajaran`);

--
-- Indexes for table `tbl_rps`
--
ALTER TABLE `tbl_rps`
  ADD PRIMARY KEY (`idRPS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `idDosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `idJurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `idMahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_mk`
--
ALTER TABLE `tbl_mk`
  MODIFY `idMK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pembelajaran`
--
ALTER TABLE `tbl_pembelajaran`
  MODIFY `idPembelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rps`
--
ALTER TABLE `tbl_rps`
  MODIFY `idRPS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
