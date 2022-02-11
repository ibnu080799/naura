-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_skripsi
CREATE DATABASE IF NOT EXISTS `db_skripsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_skripsi`;

-- Dumping structure for table db_skripsi.tb_mitra
CREATE TABLE IF NOT EXISTS `tb_mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `npwp` char(250) DEFAULT NULL,
  `jenis_perusahaan` varchar(250) DEFAULT NULL,
  `no_perusahaan` int(11) DEFAULT NULL,
  `email_perusahaan` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_mitra: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_mitra` DISABLE KEYS */;
INSERT INTO `tb_mitra` (`id`, `nama`, `npwp`, `jenis_perusahaan`, `no_perusahaan`, `email_perusahaan`, `username`, `password`, `file_name`, `status`) VALUES
	(1, 'alim', '00911`', 'Food', 123, 'sada', 'alim', '3ea6277babd0570c650fca3d17ec4bc5', 'da', 1),
	(2, 'mujur', '001122', 'Drink', 234, 'Mujur', 'mujur', '08ae20c3acd8bf38e56116bc732c4c99', 'mjr', 1);
/*!40000 ALTER TABLE `tb_mitra` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_pelamar
CREATE TABLE IF NOT EXISTS `tb_pelamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `jkl` char(50) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `no_hp` char(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `file_name` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_pelamar: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_pelamar` DISABLE KEYS */;
INSERT INTO `tb_pelamar` (`id`, `nama`, `jkl`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `file_name`, `username`, `password`, `status`) VALUES
	(1, 'naura', 'P', 'mkm', '2022-01-10', 'asdsa', '09876', 'adsa', 'oih', 'nor', '57c7d11cd49333e3f722204c63016da9', 1);
/*!40000 ALTER TABLE `tb_pelamar` ENABLE KEYS */;

-- Dumping structure for table db_skripsi.tb_profil
CREATE TABLE IF NOT EXISTS `tb_profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_profil: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_profil` DISABLE KEYS */;
INSERT INTO `tb_profil` (`id`, `nama`, `email`, `username`, `password`, `status`) VALUES
	(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);
/*!40000 ALTER TABLE `tb_profil` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
