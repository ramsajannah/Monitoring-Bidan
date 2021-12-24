-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 05:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `databidang`
--

CREATE TABLE `databidang` (
  `id_komentar` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `id_berita` tinytext DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `tampil` varchar(10) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databidang`
--

INSERT INTO `databidang` (`id_komentar`, `nama_lengkap`, `isi_komentar`, `id_berita`, `tgl`, `jam`, `tampil`) VALUES
(6, 'Data ibu hamil', '', '35', '2017-03-29', '08:17:20', 'Public'),
(30, 'Data ibu melahirkan', NULL, NULL, NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `data_akseptor_kb`
--

CREATE TABLE `data_akseptor_kb` (
  `id_akseptor` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `bb_tb` varchar(100) NOT NULL,
  `tekanan_darah` varchar(100) NOT NULL,
  `pernafasan` varchar(100) NOT NULL,
  `nadi` varchar(100) NOT NULL,
  `suhu` varchar(100) NOT NULL,
  `kesadaran` varchar(100) NOT NULL,
  `muka` varchar(100) NOT NULL,
  `mata` varchar(100) NOT NULL,
  `telinga` varchar(100) NOT NULL,
  `hidung` varchar(100) NOT NULL,
  `gigi_mulut` varchar(100) NOT NULL,
  `kelenjar_gondok` varchar(100) NOT NULL,
  `pmb_klj_limfa` varchar(100) NOT NULL,
  `pvj` varchar(10) NOT NULL,
  `simetris` varchar(5) NOT NULL,
  `pembesaran` varchar(5) NOT NULL,
  `tumor` varchar(100) NOT NULL,
  `pengeluaran` varchar(100) NOT NULL,
  `kebutuhan` varchar(100) NOT NULL,
  `ronchi` varchar(100) NOT NULL,
  `mur_mur` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_akseptor_kb`
--

INSERT INTO `data_akseptor_kb` (`id_akseptor`, `kategori`, `nama_desa`, `nik`, `bb_tb`, `tekanan_darah`, `pernafasan`, `nadi`, `suhu`, `kesadaran`, `muka`, `mata`, `telinga`, `hidung`, `gigi_mulut`, `kelenjar_gondok`, `pmb_klj_limfa`, `pvj`, `simetris`, `pembesaran`, `tumor`, `pengeluaran`, `kebutuhan`, `ronchi`, `mur_mur`, `created_at`, `create_by`, `username`) VALUES
(1, 'Data ibu hamil', 'RBM', '6635627288', '23 gram', 'Normal', 'normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', 'Normal', '', '2020-11-25', '5', 'Nur'),
(2, 'Data ibu hamil', 'Kampung Baru', '8354826538', '23 gram', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', 'Normal', '', '2020-11-25', '5', 'Nur'),
(5, 'Data ibu hamil', 'RBM', '7382548728', '23 gram', 'Normal', 'normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', 'Normal', '', '2020-11-24', '24', 'Nurjanah'),
(6, 'Data ibu melahirkan', 'RBM', '7382548728', '23 gram', 'Normal', 'normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', 'Normal', '', '2020-11-24', '24', 'Nurjanah'),
(7, 'Data ibu melahirkan', 'Pematang', '936986', '23 gram', 'Positif', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'normal', 'norma', 'norma', 'normal', 'normal', 'normal', 'normal', '', '2020-11-24', '24', 'madmin'),
(8, 'Ibu Hamil', 'Pasar Muara Tembesi', '6635627288', '23 Gram', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', 'Normal', '', '2020-11-28', '5', 'Vita');

-- --------------------------------------------------------

--
-- Table structure for table `data_bayi`
--

CREATE TABLE `data_bayi` (
  `id_bayi` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nm_desa` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `no_induk` varchar(255) NOT NULL,
  `hml_ke` varchar(5) NOT NULL,
  `jari_tangan` varchar(100) NOT NULL,
  `jari_kaki` varchar(100) NOT NULL,
  `posisi_dan_bentuk` varchar(100) NOT NULL,
  `pergerakan` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `bak_pertama` varchar(100) NOT NULL,
  `bab_pertama` varchar(100) NOT NULL,
  `menghisap` varchar(100) NOT NULL,
  `menggengam` varchar(100) NOT NULL,
  `reflek_kaki` varchar(100) NOT NULL,
  `reflek_moro` varchar(100) NOT NULL,
  `berat_badan` varchar(100) NOT NULL,
  `tinggi_badan` varchar(100) NOT NULL,
  `lingkar_kepala` varchar(10) NOT NULL,
  `lingkar_dada` varchar(5) NOT NULL,
  `lila` varchar(5) NOT NULL,
  `diagnosa` varchar(100) NOT NULL,
  `masalah` varchar(100) NOT NULL,
  `kebutuhan` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bayi`
--

INSERT INTO `data_bayi` (`id_bayi`, `kategori`, `nm_desa`, `nama_ibu`, `no_induk`, `hml_ke`, `jari_tangan`, `jari_kaki`, `posisi_dan_bentuk`, `pergerakan`, `jenis_kelamin`, `bak_pertama`, `bab_pertama`, `menghisap`, `menggengam`, `reflek_kaki`, `reflek_moro`, `berat_badan`, `tinggi_badan`, `lingkar_kepala`, `lingkar_dada`, `lila`, `diagnosa`, `masalah`, `kebutuhan`, `created_at`, `create_by`, `username`) VALUES
(1, 'Bayi Lahir', 'Pasar Muara Tembesi', 'Julenda', '101010', '1', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '23 gram', '20 cm', '5 cm', '20 cm', '23', 'neonetanus cukup bulan sesuai kehamilan 1 jam', 'Tidak Ada', 'Tidak Ada', '2020-11-26', '5', 'Vita'),
(2, 'Bayi Lahir', 'Kampung Baru', 'Yanti', '101010', '2', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '2', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', '2020-11-26', '24', 'Nurjanah'),
(3, 'Ibu Hamil', 'Kampung Baru', 'Yanti', '1234', '3', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Tidak ada', 'Normal', 'Normal', '2020-11-27', '24', 'Nurjanah'),
(13, 'Bayi Lahir', 'Kampung Baru', 'Yanti', '1234', '1', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '2', 'Normal', 'Normal', 'Norma', 'Norma', 'Normal', 'Normal', 'Normal', '2020-11-26', '24', 'Nurjanah'),
(14, 'Ibu Hamil', 'Kampung Baru', 'Yanti', '1234', '2', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Norma', 'Norma', 'Tidak ada', 'Normal', 'Normal', '2020-11-27', '24', 'Nurjanah'),
(16, 'Bayi Lahir', 'Sukaramai', 'Riska Wati', '6635627288', '1', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '23 Gram', '12 cm', '5 cm', '12 cm', '1', 'Normal', 'Tidak ada', 'Tidak ada', '2020-11-27', '18', 'Pertiwi'),
(17, 'Ibu Hamil', 'Pasar Muara Tembesi', 'Julenda', '101010', '2', 'Normal', 'Normal', 'Normal', 'Normal', 'Perempuan', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '(+)Positif', '23 Gram', '12 cm', '12 cm', '12 cm', '22', 'Normal', 'Tidak ada', 'Tidak ada', '2020-11-27', '5', 'Vita'),
(18, 'Bayi Lahir', 'Muara Jangga', 'Test', '111', '1', 'Normal', 'Normal', 'Normal', 'Normal', 'Laki-Laki', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '23 Gram', '23 cm', '12 cm', '12', '1', 'Tidak ada', 'Tidak ada', 'Tidak ada', '2020-11-28', '32', 'Fitriyani');

-- --------------------------------------------------------

--
-- Table structure for table `data_ibu_hamil`
--

CREATE TABLE `data_ibu_hamil` (
  `id_berita` int(11) NOT NULL,
  `ttl` varchar(10000) NOT NULL,
  `kategori_bumil` varchar(50) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `hamil_ke` int(10) NOT NULL,
  `lingkar_lila` varchar(100) NOT NULL,
  `uksi` varchar(10) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ibu_hamil`
--

INSERT INTO `data_ibu_hamil` (`id_berita`, `ttl`, `kategori_bumil`, `nama_desa`, `nama_ibu`, `nik`, `usia`, `nama_suami`, `hamil_ke`, `lingkar_lila`, `uksi`, `created_at`, `username`, `create_by`) VALUES
(235, 'Jakarta,22-Agustus-1995', 'Ibu Hamil', 'Sukaramai', 'Riska Wati', '6635627288', '25', 'Maulan Putra', 1, '1', '1', '2020-11-27', 'Pertiwi', '18'),
(233, 'Jambi,27-Juli-1995', 'Ibu Hamil', 'Kampung Baru', 'Yanti', '1234', '25', 'Khaidir', 2, '2', '3 Bulan', '2020-11-26', 'Nurjanah', '24'),
(226, 'Muara Tembesi, 12-Juli-1995', 'Ibu Hamil', 'Kampung Baru', 'Sukmawati', '101010', '25', 'Solihin', 1, '1', '3 Bulan', '2020-11-25', 'Nurjanah', '24'),
(236, 'Terusan,21-Oktober-1995', 'Ibu Hamil', 'Pasar Muara Tembesi', 'Irma Kumalasari', '8354826538', '25', 'AJI PANGESTU', 1, '1', '3 Bulan', '2020-11-27', 'Vita', '5'),
(234, 'Jambi, 12-Maret-1977', 'Ibu Hamil', 'Kampung Baru', 'Julenda', '111', '25', 'Wildan', 1, '1', '3 Bulan', '2020-11-26', 'Nurjanah', '24'),
(232, 'Jambi, 12-Maret-1995', 'Ibu Hamil', 'Pematang Lima Suku', 'Maimunah', '1343', '25', 'Yanto', 2, '2', '3', '2020-11-25', 'Vita', '5'),
(231, 'Jambi, 12-Maret-1995', 'Ibu Hamil', 'Pematang Lima Suku', 'Lia Danniaty', '1111', '20', 'Jupri', 2, '2', '3 Bulan', '2020-11-25', 'Vita', '5'),
(237, 'Ma Jangga,12-September-1996', 'Ibu Hamil', 'Muara Jangga', 'Dea Kumalasari', '856843', '26', 'Alfarisi', 1, '1', '1 Bulan', '2020-11-28', 'Fitriyani', '32');

-- --------------------------------------------------------

--
-- Table structure for table `data_imunisasi`
--

CREATE TABLE `data_imunisasi` (
  `id_imunisasi` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `laki_laki` int(100) NOT NULL,
  `perempuan` int(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_imunisasi`
--

INSERT INTO `data_imunisasi` (`id_imunisasi`, `kategori`, `desa`, `laki_laki`, `perempuan`, `created_at`, `create_by`) VALUES
(2, 'Data ibu hamil', 'Sukaramai', 5, 165, '', '24'),
(3, 'Ibu Hamil', 'Pematang Lima Suku', 280, 1340, '2020-11-27', '5'),
(5, 'Ibu Hamil', '', 882, 8628, '2020-11-28', '5'),
(6, 'Ibu Hamil', '', 22, 22, '2020-11-28', '32'),
(8, 'Ibu Hamil', 'Muara Jangga', 1, 1, '2020-11-28', '32');

-- --------------------------------------------------------

--
-- Table structure for table `data_wanita_subur`
--

CREATE TABLE `data_wanita_subur` (
  `id_wanita` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `date_input_at` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_wanita_subur`
--

INSERT INTO `data_wanita_subur` (`id_wanita`, `kategori`, `desa`, `nik`, `nama`, `keterangan`, `date_input_at`, `create_by`) VALUES
(3, 'Wanita Subur', 'Kampung Baru', '101010', 'Yanti', 'Normal', '2020-11-27', '5'),
(4, 'Wanita Subur', '-', '111', 'Noname', 'Normal', '2020-11-27', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_berita` int(11) NOT NULL,
  `capaian` varchar(10000) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `kategori`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Bukit Paku'),
(5, 'Vita', 'Vita', '202cb962ac59075b964b07152d234b70', 'User', 'Pasar Muara Tembesi'),
(18, 'Pertiwi', 'Pertiwi', '698d51a19d8a121ce581499d7b701668', 'User', 'Sukaramai'),
(24, 'Nurjanah', 'Nurjanah', '202cb962ac59075b964b07152d234b70', 'User', 'Kampung Baru'),
(30, 'Yulianti', 'Yulianti', '202cb962ac59075b964b07152d234b70', 'User', 'Pematang Lima Suku'),
(32, 'Fitriyani', 'Fitriyani', '202cb962ac59075b964b07152d234b70', 'User', 'Muara Jangga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databidang`
--
ALTER TABLE `databidang`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `data_akseptor_kb`
--
ALTER TABLE `data_akseptor_kb`
  ADD PRIMARY KEY (`id_akseptor`);

--
-- Indexes for table `data_bayi`
--
ALTER TABLE `data_bayi`
  ADD PRIMARY KEY (`id_bayi`);

--
-- Indexes for table `data_ibu_hamil`
--
ALTER TABLE `data_ibu_hamil`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  ADD PRIMARY KEY (`id_imunisasi`);

--
-- Indexes for table `data_wanita_subur`
--
ALTER TABLE `data_wanita_subur`
  ADD PRIMARY KEY (`id_wanita`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databidang`
--
ALTER TABLE `databidang`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `data_akseptor_kb`
--
ALTER TABLE `data_akseptor_kb`
  MODIFY `id_akseptor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_bayi`
--
ALTER TABLE `data_bayi`
  MODIFY `id_bayi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_ibu_hamil`
--
ALTER TABLE `data_ibu_hamil`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  MODIFY `id_imunisasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_wanita_subur`
--
ALTER TABLE `data_wanita_subur`
  MODIFY `id_wanita` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
