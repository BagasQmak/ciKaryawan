-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 03:26 PM
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
  `nama_pegawai` varchar(125) NOT NULL,
  `id_pegawai` varchar(125) NOT NULL,
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

INSERT INTO `db_absensi` (`id_absen`, `kode_absen`, `nama_pegawai`, `id_pegawai`, `tgl_absen`, `jam_masuk`, `jam_pulang`, `status_pegawai`, `keterangan_absen`, `maps_absen`) VALUES
(1, 'absen_20220897549', 'Budi', '640619835538220', 'Rabu, 31 Agustus 2022', '10:38:15', '', 1, 'Bekerja Di Kantor', '-6.938106053699836, 107.60656109697985'),
(2, 'absen_20220914941', 'Budi', '640619835538220', 'Kamis, 1 September 2022', '08:33:21', '', 1, 'Bekerja Di Kantor', 'No Location');

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
(13, '9725310361540', 'Qmak', '0000-00-00', 'CCO', 'IT', 'IT', 'qmakqmak', '$2y$10$VTN5mR5SxUWPRKbwKHoGMuzi5Q/EiIYTwoXT8HCZvi3XgprZnrGOW', '', 'default.jpg', 1, 1, 1662434517),
(14, '2881506724139', 'Budi Saep', '0000-00-00', 'Karyawan', 'IT', 'IT', 'budiaja', '$2y$10$s2H.LxqInN1wkMpCgHY/8uK1eMmjRzVNRe98HNJM09kcA58OtthoS', '', 'default.png', 2, 1, 1662437238);

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
(9, 1, 'Data Absensi', 'absensi_admin', 'fas fa-fw fa-clock', 1),
(10, 2, 'Menu Absensi', 'absensi_user', 'fas fa-fw fa-table', 1);

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
  MODIFY `id_absen` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_pendapatan`
--
ALTER TABLE `tabel_pendapatan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
