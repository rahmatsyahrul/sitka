-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 10, 2021 at 12:40 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitka`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `tmk` int(11) NOT NULL,
  `tbtt` int(11) NOT NULL,
  `tl_1` int(11) NOT NULL,
  `tl_2` int(11) NOT NULL,
  `tl_3` int(11) NOT NULL,
  `tl_4` int(11) NOT NULL,
  `psw_1` int(11) NOT NULL,
  `psw_2` int(11) NOT NULL,
  `psw_3` int(11) NOT NULL,
  `psw_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id`, `bulan`, `nama_pegawai`, `nip`, `tmk`, `tbtt`, `tl_1`, `tl_2`, `tl_3`, `tl_4`, `psw_1`, `psw_2`, `psw_3`, `psw_4`) VALUES
(126, '012021', 'Drs. H. SALIHIN, M.A.', '196401141994031001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, '012021', 'FITRIANSYAH RAMADHAN', '198605232019031003', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, '012021', 'KHAIRUL HUDA, S.H.I.', '198105252005011008', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0),
(129, '012021', 'MISBAHUL MAKRUF, S.Kom', '199401012020121006', 9, 8, 7, 6, 5, 4, 3, 2, 1, 9),
(130, '012021', 'RAHMAT HIDAYAT, S.Kom.', '198806302020121002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, '022021', 'Drs. H. SALIHIN, M.A.', '196401141994031001', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(132, '022021', 'FITRIANSYAH RAMADHAN', '198605232019031003', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(133, '022021', 'KHAIRUL HUDA, S.H.I.', '198105252005011008', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(134, '022021', 'MISBAHUL MAKRUF, S.Kom', '199401012020121006', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(135, '022021', 'RAHMAT HIDAYAT, S.Kom.', '198806302020121002', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(136, '092021', 'Drs. H. SALIHIN, M.A.', '196401141994031001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, '092021', 'FITRIANSYAH RAMADHAN', '198605232019031003', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, '092021', 'KHAIRUL HUDA, S.H.I.', '198105252005011008', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, '092021', 'MISBAHUL MAKRUF, S.Kom', '199401012020121006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, '092021', 'RAHMAT HIDAYAT, S.Kom.', '198806302020121002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, '102021', 'Drs. H. SALIHIN, M.A.', '196401141994031001', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, '102021', 'FITRIANSYAH RAMADHAN', '198605232019031003', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(143, '102021', 'KHAIRUL HUDA, S.H.I.', '198105252005011008', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, '102021', 'MISBAHUL MAKRUF, S.Kom', '199401012020121006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, '102021', 'RAHMAT HIDAYAT, S.Kom.', '198806302020121002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `statuswp` varchar(50) NOT NULL,
  `no_sk` varchar(50) NOT NULL,
  `tgl_sk` varchar(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `kelas_jabatan` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `gaji` varchar(100) NOT NULL,
  `tpg` varchar(100) NOT NULL,
  `pkp` bigint(20) NOT NULL,
  `tptukin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pegawai`
--

INSERT INTO `data_pegawai` (`id`, `nama_pegawai`, `pangkat`, `nip`, `npwp`, `status`, `statuswp`, `no_sk`, `tgl_sk`, `nama_jabatan`, `kelas_jabatan`, `bank`, `rekening`, `gaji`, `tpg`, `pkp`, `tptukin`) VALUES
(6, 'RAHMAT HIDAYAT, S.Kom.', 'III.a', '198806302020121002', '828281386104000', 'CPNS', 'K/2', '01', '2021-08-21', 'Pranata Komputer Ahli Pertama', 8, 'Bank Aceh Syariah', '09002410193814', '5000000', '12000', 32328000, 134700),
(7, 'MISBAHUL MAKRUF, S.Kom', 'III.a', '199401012020121006', '814884862101000', 'CPNS', 'TK/0', '01', '2021-08-21', 'AHLI PERTAMA - PRANATA KOMPUTER', 8, 'Bank Aceh Syariah', '09002410193851', '5000000', '0', 45828000, 190950),
(8, 'KHAIRUL HUDA, S.H.I.', 'III.c', '198105252005011008', '159024058101000', 'PNS', 'K/2', '0', '2021-08-23', 'Ka. Subbag TU', 9, 'Bank Aceh Syariah', '09002036408170', '5000000', '0', 37872000, 157800),
(9, 'Drs. H. SALIHIN, M.A.', 'IV.b', '196401141994031001', '140519315106000', 'PNS', 'K/2', '1', '2021-08-23', 'Kepala Kantor', 13, 'Bank Syariah Indonesia', '1049168717', '10000000', '0', 155244000, 1940550),
(10, 'FITRIANSYAH RAMADHAN', 'III.a', '198605232019031003', '880067293101000', 'PNS', 'K/1', '1', '2021-08-23', 'BARJAS', 8, 'Bank Syariah Indonesia', '7001765978', '5000000', '0', 36828000, 153450);

-- --------------------------------------------------------

--
-- Table structure for table `data_pejabat`
--

CREATE TABLE `data_pejabat` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pejabat`
--

INSERT INTO `data_pejabat` (`id`, `nip`, `nama_pegawai`, `jabatan`) VALUES
(3, '198806302020121002', 'Rahmat Hidayat, S.Kom', 'PPTK'),
(4, '197408301999011003', 'Agussalim,S.I.P.', 'Bendahara'),
(5, '1234567891', 'Ridha Fahlefi. A', 'PPK');

-- --------------------------------------------------------

--
-- Table structure for table `data_pkp`
--

CREATE TABLE `data_pkp` (
  `id` int(11) NOT NULL,
  `pkp_awal` bigint(20) NOT NULL,
  `pkp_akhir` bigint(20) NOT NULL,
  `pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_pkp`
--

INSERT INTO `data_pkp` (`id`, `pkp_awal`, `pkp_akhir`, `pajak`) VALUES
(1, 0, 50000000, 5),
(2, 50000000, 250000000, 15),
(3, 2500000000, 5000000000, 25),
(4, 500000000, 1000000000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `data_ptkp`
--

CREATE TABLE `data_ptkp` (
  `id` int(11) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `tarif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_ptkp`
--

INSERT INTO `data_ptkp` (`id`, `golongan`, `tarif`) VALUES
(2, 'TK/3', '67500000'),
(4, 'TK/2', '63000000'),
(5, 'TK/1', '58500000'),
(7, 'K/1', '63000000'),
(8, 'K/2', '67500000'),
(9, 'K/3', '72000000'),
(10, 'K/I/0', '112500000'),
(11, 'TK/0', '54000000'),
(12, 'K/0', '58500000'),
(13, 'K/I/1', '117000000'),
(14, 'K/I/2', '121500000'),
(15, 'K/I/3', '126000000');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'user', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jabatan`
--

CREATE TABLE `kelas_jabatan` (
  `id` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tukin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas_jabatan`
--

INSERT INTO `kelas_jabatan` (`id`, `kelas`, `tukin`) VALUES
(9, 6, '2702000'),
(11, 5, '2493000'),
(12, 1, '1968000'),
(13, 2, '2089000'),
(14, 4, '2350000'),
(15, 7, '2928000'),
(16, 8, '3319000'),
(17, 3, '2216000'),
(18, 9, '3781000'),
(19, 10, '4551000'),
(20, 11, '5183000'),
(21, 12, '7271000'),
(22, 13, '8562000'),
(23, 14, '11670000'),
(24, 15, '14721000'),
(25, 16, '20695000'),
(26, 17, '29085000');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nomor` varchar(11) NOT NULL,
  `satker` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nomor`, `satker`, `alamat`) VALUES
(1, '', 'SEKRETARIAT JENDERAL KANTOR KEMENTERIAN AGAMA KAB ACEH BARAT DAYA', 'Blangpidie');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_pegawai`, `username`, `pass`, `password`, `hak_akses`) VALUES
(1, 'Rahmat Hidayat', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Misbahul Makruf', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2),
(4, 'Agussalim', 'agus', 'agus', 'fdf169558242ee051cca1479770ebac3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pejabat`
--
ALTER TABLE `data_pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pkp`
--
ALTER TABLE `data_pkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ptkp`
--
ALTER TABLE `data_ptkp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_jabatan`
--
ALTER TABLE `kelas_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_pejabat`
--
ALTER TABLE `data_pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_ptkp`
--
ALTER TABLE `data_ptkp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_jabatan`
--
ALTER TABLE `kelas_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
