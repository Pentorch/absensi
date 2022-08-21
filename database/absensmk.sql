-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 02:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(5) NOT NULL,
  `nis` int(10) NOT NULL,
  `id_guru` int(20) NOT NULL,
  `id_sem` int(3) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_jur` int(10) NOT NULL,
  `id_jam` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `absen` varchar(10) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `nis`, `id_guru`, `id_sem`, `id_kelas`, `id_jur`, `id_jam`, `tanggal`, `absen`, `ket`) VALUES
(37, 112345, 12345, 1, 1, 2, 18, '2018-02-02 07:38:01', 'Hadir', ''),
(38, 123456, 12345, 1, 1, 2, 18, '2018-02-02 07:38:01', 'Hadir', ''),
(39, 1111, 1001, 1, 2, 1, 16, '2018-02-03 01:39:57', 'Hadir', ''),
(40, 12345, 1001, 1, 2, 1, 16, '2018-02-03 01:39:57', 'Sakit', ''),
(41, 54321, 1001, 1, 2, 1, 16, '2018-02-03 01:39:57', 'Hadir', '');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(20) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `bid_studi` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `ttl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jabatan`, `bid_studi`, `alamat`, `foto`, `no_hp`, `jk`, `ttl`) VALUES
(1001, 'Rika Pertiwi, S.Pd', 'Guru', 'Produktif TI', '<p>Palapa Saiyo Blok A8 no.3</p>', 'biru.jpg', '085274716041', '', ''),
(12345, 'Yurike Yastin Wandani, S.Pd', 'Guru ', 'Produktif TI', '<p>parit malintang</p>', 'sintoga21.png', '', 'Perempuan', 'Parit Malintang, 18 januari 1990'),
(1234567, 'Bonita Marselina, S.Pd', 'Guru ', 'Produktif TI', '<p>Pariaman</p>', 'sintoga1.png', '0852xxxxxx', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(30) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_guru` int(50) NOT NULL,
  `id_jur` int(10) NOT NULL,
  `id_jam` int(20) NOT NULL,
  `id_mapel` int(20) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_guru`, `id_jur`, `id_jam`, `id_mapel`, `hari`) VALUES
(1, 1, 1001, 2, 1, 1, 'senin'),
(2, 2, 1001, 1, 16, 2, 'Kamis'),
(4, 2, 1234567, 1, 19, 3, 'Senin'),
(5, 1, 12345, 2, 18, 4, 'Senin');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `durasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`, `durasi`) VALUES
(2, '2', ''),
(3, '3', ''),
(4, '4', ''),
(5, '5', ''),
(6, '6', ''),
(7, '7', ''),
(8, '8', ''),
(9, '9', ''),
(10, '10', ''),
(11, '11', ''),
(12, '12', ''),
(13, '1', '07.30 - 08.15'),
(14, '1-2', '07.30 - 09.00'),
(15, '1-3', '07.30 - 09.45'),
(16, '1-4', '07.30 - 10.30'),
(17, '1-5', '07.30 - 11.35'),
(18, '2-3', ''),
(19, '2-4', ''),
(20, '2-5', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Komputer dan Jaringan'),
(3, 'Tata Boga'),
(4, 'Akomodasi Perhotelan'),
(5, 'Teknik Sepeda Motor');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(5) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_jur` int(10) NOT NULL,
  `id_guru` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_jur`, `id_guru`) VALUES
(1, 'XII - 2', 2, 1001),
(2, 'XII - 3', 1, 1234567);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jam` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `hari` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_guru`, `id_jam`, `mapel`, `hari`) VALUES
(2, 1001, 16, 'Membuat Program Basis Data', ''),
(3, 1234567, 20, 'Pemograman Web Berbasis JSP', ''),
(4, 12345, 14, 'Web Design', '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_sem` int(5) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_sem`, `semester`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `nisn` int(30) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_jur` int(10) NOT NULL,
  `tgl_masuk` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `anak_ke` int(5) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(20) NOT NULL,
  `umur` int(5) NOT NULL,
  `no_ijazah` varchar(30) NOT NULL,
  `th_ijazah` int(10) NOT NULL,
  `no_skhu` varchar(30) NOT NULL,
  `th_skhu` int(10) NOT NULL,
  `asal_sklh` varchar(30) NOT NULL,
  `alamat_asal_sklh` text NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `pkj_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pkj_ibu` varchar(30) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `nohp_ortu` varchar(15) NOT NULL,
  `wali` varchar(30) NOT NULL,
  `tlp_wali` varchar(30) NOT NULL,
  `alamat_wali` text NOT NULL,
  `pkj_wali` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nisn`, `id_kelas`, `id_jur`, `tgl_masuk`, `nama`, `ttl`, `jk`, `agama`, `anak_ke`, `alamat`, `foto`, `umur`, `no_ijazah`, `th_ijazah`, `no_skhu`, `th_skhu`, `asal_sklh`, `alamat_asal_sklh`, `nama_ayah`, `pkj_ayah`, `nama_ibu`, `pkj_ibu`, `alamat_ortu`, `nohp_ortu`, `wali`, `tlp_wali`, `alamat_wali`, `pkj_wali`, `no_hp`) VALUES
(1111, 999, 2, 1, '', 'Rozi', 'Pariaman / 2 juni 1999', 'Laki - Laki', 'Islam', 0, '', 'sintoga22.png', 0, '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12345, 999, 2, 1, '12 juli 2015', 'Afrika Yunita', 'Pariaman / 2 juni 1999', 'P', 'Islam', 2, 'Pariaman', 'sintoga15.png', 18, '', 2015, '', 2015, 'SMP', 'Pariaman', 'Udin', 'Petani', 'Marni', 'Ibu Rumah Tangga', 'Pariaman', '0852xxxxx', '', '', '', '', '0852xxxxxx'),
(54321, 0, 2, 1, '', 'Melani', '', 'Laki - Laki', 'Islam', 0, '', 'sintoga19.png', 0, '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(112345, 999, 1, 2, '', 'Sinta', 'Pariaman / 2 juni 1999', 'Perempuan', 'Islam', 0, '', 'sintoga18.png', 0, '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(123456, 999, 1, 2, '', 'Alerian', 'Pariaman / 2 juni 1999', 'Laki - Lak', 'Islam', 1, '', 'sintoga16.png', 18, '', 0, '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Piket', 'piket', 'piket'),
(4, 'guru', 'guru', 'guru'),
(5, 'wakil', 'wakil', 'wakil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_sem` (`id_sem`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_jur` (`id_jur`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jur` (`id_jur`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_sem`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_sem` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`id_sem`) REFERENCES `semester` (`id_sem`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_jur`) REFERENCES `jurusan` (`id_jur`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jur`) REFERENCES `jurusan` (`id_jur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
