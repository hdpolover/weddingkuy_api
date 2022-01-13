-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 07:48 AM
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
-- Database: `momenkami_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'randika', 'randika');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_tamu` int(11) NOT NULL,
  `id_pengantin` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_scan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_tamu`, `id_pengantin`, `nama`, `tgl_scan`) VALUES
(9, 'EC15s3un', 'Rodli Fadel', '2022-01-13 11:05:09'),
(10, 'EC15s3un', 'Achmad Kholifatullah', '2022-01-13 11:06:23'),
(11, 'EC15s3un', 'Raja Safirul Muluk', '2022-01-13 11:06:36'),
(12, 'EC15s3un', 'Anggito Abimanyu', '2022-01-13 11:07:00'),
(13, 'EC15s3un', 'M. Yasin', '2022-01-13 11:07:10'),
(14, 'EC15s3un', 'Pratu Novan', '2022-01-13 13:37:36'),
(15, 'EC15s3un', 'Fauzi ', '2022-01-13 13:38:15'),
(16, 'EC15s3un', 'Fauzi ', '2022-01-13 13:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tempat`
--

CREATE TABLE `lokasi_tempat` (
  `id_lokasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL COMMENT 'Wedding Organizer (WO), Fotografi, Souvenir',
  `alamat` varchar(100) NOT NULL,
  `akun_ig` varchar(50) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_tempat`
--

INSERT INTO `lokasi_tempat` (`id_lokasi`, `nama`, `jenis`, `alamat`, `akun_ig`, `no_wa`, `foto`, `latitude`, `longitude`) VALUES
(4, 'Oppie wedding organizer', 'Wedding Organizer (WO)', 'Malang, Mojolangu, Lowokwaru, Malang, Jawa Timur 65142', '@oppie_wedding_organizer', ' 085236147366', 'oppie.jpg', '-7.9323014', '112.6238407'),
(5, 'Taman Manten organizer', 'Wedding Organizer (WO)', 'Jl. Taman Bunga Merak I No.29, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '@tamanmanten_organizer', '08981826316', 'taman.jpg', '-7.9492421', '112.6206659'),
(6, 'Extraordinary Organizer', 'Wedding Organizer (WO)', 'Bakalankrajan, Sukun, Malang, Java Timur', '@extraordinary_wo', '08990379580', 'extra.png', '-8.002257', '112.6020998'),
(7, 'Midodaren Organizer', 'Wedding Organizer (WO)', 'Losawi, Tanjungtirto, Singosari, Malang, Jawa Timur', '@midodaren.wo', '081357233775', 'mido.jpg', '-7.9181302', '112.6409434'),
(8, ' Eleanoore Wedding Organizer', 'Wedding Organizer (WO)', 'Jl. MT. Haryono Gg. 13, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', '@eleanooreorganizer', '081357010132', 'el.jpg', '-7.9404329', '112.6097243'),
(9, 'Omah Visual Kamera Photography', 'Fotografi', 'Jl. Urip Sumoharjo No.37, Kesatrian, Kec. Blimbing, Kota Malang, Jawa Timur 65126', '@omahvisualkamera', '082330682323', 'omah.png', '-7.9762632', '112.6417786'),
(10, 'Souvenir Production (Souvenir Dzikir Pagi dan Petang)', 'Souvenir', 'Jl. Bantaran Barat I No.34, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '@souvenir.production', '085806576800', 'souvenir.jpg', '-7.9473021', '112.6333762 '),
(11, 'Fathania Souvenir', 'Souvenir', 'Jl. Tlogo Indah 5-40, Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '@fathaniasouvenir', '081336287835', 'fathania.jpg', '-7.9366212', '112.6027111'),
(12, 'Princess Souvenir & Card', 'Souvenir', 'Malang, Bunulrejo, Blimbing, Malang, Java Timur 65126', '@princess.souvenir', '081333550555', 'princess.jpg', '-7.9669223', '112.644842'),
(13, 'Ima Souvenir', 'Souvenir', 'Malang, Arjowinangun, Kedungkandang, Malang, Jawa Timur 65132', '@ima_souvenir', '085655934060', 'ima.jpg', '-8.0352239', '112.6375621'),
(14, 'Rita Souvenir Malang', 'Souvenir', 'Malang, Dinoyo, Lowokwaru, Malang, Jawa Timur 65144', '@ritasouvenir', '085655934060', 'rita.jpg', '-7.9417958', '112.6088031'),
(15, 'Ferenoa Photography', 'Fotografi', 'Jl. Sendang Biru, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '@ferenoa', '081336009085', 'ferenoa.JPG', '-7.9596683', '112.6304127'),
(16, 'Antz Creator', 'Fotografi', 'Jl. Sudimoro No.28, RT.05/RW.07, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', '@antzcreator', '081220536999', 'antz.jpg', '-7.9355367', '112.6258861'),
(17, 'DNproSTUDIO', 'Fotografi', 'Malang, Dinoyo, Lowokwaru, Malang, Jawa Timur 65145', '@dnprostudio', '082244433379', 'dnprostudio.JPG', '-7.9452618', '112.6105358'),
(18, 'Ameltria Photographie', 'Fotografi', 'Mojolangu, Lowokwaru, Malang, Jawa Timur 65142', '@ameltrias.photographie', '082299994052', 'ameltria.JPG', '-7.9434683', '112.6330907');

-- --------------------------------------------------------

--
-- Table structure for table `pengantin`
--

CREATE TABLE `pengantin` (
  `id_pengantin` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengantin`
--

INSERT INTO `pengantin` (`id_pengantin`, `nama`) VALUES
('5a8zjJLD', 'Atta & Aurel'),
('EC15s3un', 'Adam & Hawa'),
('pQg1AOEG', 'Fulan & Fulana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD KEY `fk_id_p` (`id_pengantin`);

--
-- Indexes for table `lokasi_tempat`
--
ALTER TABLE `lokasi_tempat`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pengantin`
--
ALTER TABLE `pengantin`
  ADD PRIMARY KEY (`id_pengantin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lokasi_tempat`
--
ALTER TABLE `lokasi_tempat`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD CONSTRAINT `fk_id_p` FOREIGN KEY (`id_pengantin`) REFERENCES `pengantin` (`id_pengantin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
