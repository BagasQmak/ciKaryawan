-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 06:14 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ess`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '10406c1d7b7421b1a56f0d951e952a95');

-- --------------------------------------------------------

--
-- Table structure for table `db_absensi`
--

CREATE TABLE `db_absensi` (
  `id_absen` bigint(20) NOT NULL,
  `kode_absen` varchar(100) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `shift` int(1) NOT NULL,
  `nipeg` varchar(20) NOT NULL,
  `tgl_absen` varchar(125) NOT NULL,
  `jam_masuk` varchar(13) NOT NULL,
  `jam_pulang` varchar(13) NOT NULL,
  `status_pegawai` int(1) NOT NULL,
  `keterangan_absen` varchar(100) NOT NULL,
  `maps_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_absensi`
--

INSERT INTO `db_absensi` (`id_absen`, `kode_absen`, `nama`, `shift`, `nipeg`, `tgl_absen`, `jam_masuk`, `jam_pulang`, `status_pegawai`, `keterangan_absen`, `maps_absen`) VALUES
(4, 'absen_20220941013', 'Qmak', 0, '9725310361540', 'Jumat, 9 September 2022', '21:42:57', '00:00:00', 0, '1', '-6.93029, 107.64217775'),
(5, 'absen_20220971447', 'wati', 0, '8144931236752', 'Jumat, 9 September 2022', '22:06:35', '00:00:00', 0, '2', '-6.930249177264876, 107.64218344163133'),
(6, 'absen_20220961246', 'Qmak', 0, '9725310361540', 'Sabtu, 10 September 2022', '17:41:45', '00:00:00', 0, '4', '-6.930244020758202, 107.64217446367314'),
(7, 'absen_20220970023', 'wati', 0, '8144931236752', 'Sabtu, 10 September 2022', '17:45:00', '00:00:00', 0, '3', '-6.930249177264876, 107.64218344163133'),
(8, 'absen_20220987816', 'Qmak', 0, '9725310361540', 'Senin, 12 September 2022', '09:01:02', '00:00:00', 0, '1', '-6.938159473181485, 107.606603519471'),
(10, 'absen_20220917856', 'Qmak', 0, '9725310361540', 'Senin, 12 September 2022', '10:36:53', '00:00:00', 0, '1', '-6.938132641440118, 107.606603519471'),
(12, 'absen_20220993766', 'Qmak', 0, '9725310361540', 'Senin, 12 September 2022', '10:50:21', '00:00:00', 0, '1', '-6.938151, 107.60657598923343'),
(13, 'absen_20220912372', 'Qmak', 0, '9725310361540', 'Senin, 12 September 2022', '11:03:48', '00:00:00', 2, '1', '-6.93822196289493, 107.6066197597355'),
(14, 'absen_20220945951', 'Qmak', 0, '9725310361540', 'Senin, 12 September 2022', '11:12:46', '00:00:00', 2, '1', '-6.938142526818517, 107.60656609625276'),
(15, 'absen_20220988783', 'Qmak', 1, '9725310361540', 'Senin, 12 September 2022', '11:22:50', '00:00:00', 2, '1', '-6.938151, 107.60663599999998'),
(16, 'absen_20220930380', 'Qmak', 1, '9725310361540', 'Selasa, 13 September 2022', '08:55:47', '00:00:00', 1, '1', '-6.938117029699257, 107.60657862587148'),
(17, 'absen_20220926477', 'wati', 1, '8144931236752', 'Selasa, 13 September 2022', '08:57:10', '00:00:00', 1, '3', '-6.938113410815635, 107.60658548236319'),
(18, 'absen_20220991401', 'Qmak', 2, '9725310361540', 'Selasa, 13 September 2022', '08:59:20', '00:00:00', 1, '2', '-6.9381544139696745, 107.60658252144646');

-- --------------------------------------------------------

--
-- Table structure for table `db_setting`
--

CREATE TABLE `db_setting` (
  `status_setting` int(1) NOT NULL DEFAULT 0,
  `nama_instansi` varchar(255) NOT NULL,
  `jumbotron_lead_set` varchar(125) NOT NULL,
  `nama_app_absensi` varchar(20) NOT NULL DEFAULT 'Absensi Online',
  `logo_instansi` varchar(255) NOT NULL,
  `timezone` varchar(35) NOT NULL,
  `absen_mulai` varchar(13) NOT NULL,
  `absen_mulai_to` varchar(13) NOT NULL,
  `absen_pulang` varchar(13) NOT NULL,
  `maps_use` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_setting`
--

INSERT INTO `db_setting` (`status_setting`, `nama_instansi`, `jumbotron_lead_set`, `nama_app_absensi`, `logo_instansi`, `timezone`, `absen_mulai`, `absen_mulai_to`, `absen_pulang`, `maps_use`) VALUES
(1, 'PT. INTI PERSERO', 'Absen Digital', 'Absensi Digital', 'a0d85aaea2e056bb3773eef264dc17d3.jpg', 'Asia/Jakarta', '08:00:00', '09:00:00', '16:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendapatan`
--

CREATE TABLE `tabel_pendapatan` (
  `no` int(11) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_pendapatan`
--

INSERT INTO `tabel_pendapatan` (`no`, `nominal`, `keterangan`, `tanggal`) VALUES
(1, '230000', 'Penjualan Modem Router', '2022-08-23'),
(3, '300000', 'Jual Komponen PC', '2022-08-04'),
(4, '520000', 'Jual 8 Chipset', '2022-08-16'),
(7, '200000', 'Jual Komponen PC', '2022-08-05'),
(9, '375000', 'Komponen PC', '2022-08-01'),
(10, '760000', 'Komponen PC', '2022-08-03'),
(11, '100000', 'Jual Komponen PC', '2022-08-16'),
(12, '100067', 'Jual Komponen PC', '2022-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id` int(11) NOT NULL,
  `nipeg` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id`, `nipeg`, `nama`, `tanggallahir`, `jabatan`, `bagian`, `divisi`, `username`, `password`, `email`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, '10', 'Ranti  ', '2005-11-08', 'CO', 'Analisis', 'IT', '', '', '', '', 0, 0, 0),
(2, '11', 'Putri Handayani', '2001-01-31', 'Direktur', 'Marketing', 'Human Resource', '', '', '', '', 0, 0, 0),
(3, '12334', 'Steven', '2003-04-29', 'CFO', 'Financial', 'IT', '', '', '', '', 0, 0, 0),
(4, '12341', 'Bagasqmak', '2022-08-17', 'CTO', 'Mengoding', 'IT', '', '', '', '', 0, 0, 0),
(6, '1423', 'Johannes', '2004-01-04', 'Direktur', 'Development', 'IT', '', '', '', '', 0, 0, 0),
(7, '200', 'Careline', '2000-02-14', 'Karyawati', 'Marketing', 'Human Resource', '', '', '', '', 0, 0, 0),
(12, '4539372896241', 'Sentosa Jaya', '0000-00-00', 'Karyawan', 'IT', 'IT', '', '', '', 'default.jpg', 2, 1, 1662433739),
(13, '9725310361540', 'Qmak', '2003-10-12', 'CCO', 'IT', 'IT', 'qmak', '$2y$10$s2H.LxqInN1wkMpCgHY/8uK1eMmjRzVNRe98HNJM09kcA58OtthoS', 'qmaktampan@gmail.com', 'QmakLogo.png', 1, 1, 1662434517),
(14, '2881506724139', 'Budi Saep', '0000-00-00', 'Karyawan', 'IT', 'IT', 'budiaja', '$2y$10$s2H.LxqInN1wkMpCgHY/8uK1eMmjRzVNRe98HNJM09kcA58OtthoS', '', 'default.png', 1, 1, 1662437238),
(15, '8144931236752', 'wati', '2004-04-07', 'karyawati', 'IT', 'IT', 'wati', '$2y$10$NaKRI9A2L1PVVOuVMlzfSenw/ecaT5Bj0LKOZxhX.bb6d9IiZCHkq', 'watisusilawati@gmail.com', 'default1.png', 2, 1, 1662476045),
(16, '4915002358432', 'budi', '0000-00-00', 'CTO', 'IT', 'IT', 'budibudi', '$2y$10$U55jW11OcXhHdlx/g7SxLeg0aBOLSHWd3Gy6fi0n1lkGBRXcnWAee', '', 'default.jpg', 2, 1, 1662714370);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin', 'dilan@gmail.com', 'default.jpg', '$2y$10$8ov0y4Ykp8qnQahwx8lAOOwALiQ8YoeX0A/GLZxJEsS0/DmljJX1O', 1, 1, 1660622965),
(2, 'AZER', 'reza@gmail.com', 'QmakLogo3.png', '$2y$10$V7PnnzQe1VXdjCfJLKokXO1rtcRJ/72S5pvwm41HzIV8/3gdZDM9O', 2, 1, 1660788583),
(3, 'bagasqmak', 'bagasqmak@gmail.com', 'QmakLogo2.png', '$2y$10$ydOWvRBIQywi67wEZN8DG.JkgH9K597vBknCjujoK2dnAAg1j1bqq', 2, 1, 1661060807);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(5, 1, 'Data Pegawai', 'crud', 'fas fa-fw fa-users', 1),
(6, 1, 'Data Pendapatan', 'pendapatan', 'fas fa-fw fa-dollar-sign', 1),
(7, 5, 'Menu Manajemen', 'menu', 'fas fa-fw fa-folder', 1),
(8, 5, 'SubMenu Manajemen', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'Data Absensi', 'admin/rekapAbsen', 'fas fa-fw fa-clock', 1),
(10, 2, 'Menu Absensi', 'user/absen', 'fas fa-fw fa-table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_absensi`
--
ALTER TABLE `db_absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tabel_pendapatan`
--
ALTER TABLE `tabel_pendapatan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_absensi`
--
ALTER TABLE `db_absensi`
  MODIFY `id_absen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tabel_pendapatan`
--
ALTER TABLE `tabel_pendapatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
