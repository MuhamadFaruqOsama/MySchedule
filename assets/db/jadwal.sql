-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 12:28 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_subschedule` int(11) NOT NULL,
  `jadwal` varchar(80) NOT NULL,
  `jam_1` varchar(15) NOT NULL,
  `jam_2` varchar(15) NOT NULL,
  `desc_short` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_type`, `id_subschedule`, `jadwal`, `jam_1`, `jam_2`, `desc_short`) VALUES
(46, 12, 13, 'Upacara', '07:00', '08:00', ''),
(47, 12, 13, 'PKKWU', '08:00', '09:00', ''),
(49, 12, 14, 'Bahasa Jawa', '07:00', '08:20', ''),
(50, 12, 14, 'PBO', '08:20', '09:40', ''),
(51, 12, 14, 'PWPB', '09:40', '15:30', ''),
(57, 12, 14, 'meeting', '07:00', '08:00', ''),
(58, 12, 14, '', '', '', ''),
(59, 12, 14, '', '', '', ''),
(60, 12, 14, '', '', '', ''),
(66, 13, 22, 'Ziaroh', '07:00', '08:00', ''),
(67, 13, 22, '', '', '', ''),
(70, 14, 25, 'Ngumpul di srambi masjid', '07:00', '07:30', ''),
(71, 14, 25, 'Berangkat ziaroh ke jogja, perjalanan kurang lebih 2-3 jam', '07:30', '10:30', ''),
(72, 14, 25, 'Piknik ke pantai sepulangnya dari tempat ziaroh', '10:30', '12:00', ''),
(73, 14, 25, 'Piknik ke tempat lain selepas pulangnya dari pantai', '12:00', '14:00', ''),
(74, 14, 25, 'Makan terus pulang', '14:00', '17:00', ''),
(79, 13, 27, 'Bahasa Indonesia', '07:30', '09:00', 'pengawas : Pak wir'),
(80, 13, 27, 'Bahasa Jepang', '09:30', '11:00', 'pengawas : Bu Erlis'),
(83, 13, 29, 'Matematika', '07:30', '09:00', 'pengawas : Pak panggah'),
(84, 13, 29, 'PBO', '09:30', '11:00', 'pengawas : Uti heri'),
(85, 15, 30, 'bahasa Indonesia', '07:00', '08:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_type`
--

CREATE TABLE `schedule_type` (
  `id_type` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `desc_short` varchar(80) NOT NULL,
  `bg_color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_type`
--

INSERT INTO `schedule_type` (`id_type`, `title`, `desc_short`, `bg_color`) VALUES
(13, 'Jadwal PAS', 'tahun ajaran 2022/2023', '#563d7c'),
(14, 'Jadwal piknik akhir tahun', 'iuran 250.000', '#003c61'),
(15, 'jadwal PAS kelas XII RPL ', 'tahun ajaran 2022/2023', '#0237a2');

-- --------------------------------------------------------

--
-- Table structure for table `subschedule`
--

CREATE TABLE `subschedule` (
  `id_subschedule` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `desc_short` varchar(150) NOT NULL,
  `bg_color` varchar(50) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subschedule`
--

INSERT INTO `subschedule` (`id_subschedule`, `id_type`, `title`, `desc_short`, `bg_color`, `date`) VALUES
(25, 14, 'Agenda piknik', 'diharapkan membawa peralatan yang diperlukan saja dan tentunya uang saku  ', '#4d7000', '23-12-2022'),
(27, 13, 'Senin euy', '\r\n', '#850000', '05-12-2022'),
(29, 13, 'Selasa', '', '#563d7c', '06-12-2022'),
(30, 15, 'senin', 'bismillah', '#318321', '24-12-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `schedule_type`
--
ALTER TABLE `schedule_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `subschedule`
--
ALTER TABLE `subschedule`
  ADD PRIMARY KEY (`id_subschedule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `schedule_type`
--
ALTER TABLE `schedule_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subschedule`
--
ALTER TABLE `subschedule`
  MODIFY `id_subschedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
