-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_skripsi
CREATE DATABASE IF NOT EXISTS `db_skripsi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_skripsi`;

-- Dumping structure for table db_skripsi.tb_kebutuhan
CREATE TABLE IF NOT EXISTS `tb_kebutuhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mitra` char(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_kebutuhan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kebutuhan` DISABLE KEYS */;
INSERT INTO `tb_kebutuhan` (`id`, `id_mitra`, `judul`, `deskripsi`) VALUES
	(4, '1', 'Sopir', 'Dsess');
/*!40000 ALTER TABLE `tb_kebutuhan` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_skripsi.tb_pelamar: ~7 rows (approximately)
/*!40000 ALTER TABLE `tb_pelamar` DISABLE KEYS */;
INSERT INTO `tb_pelamar` (`id`, `nama`, `jkl`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `email`, `file_name`, `username`, `password`, `status`) VALUES
	(1, 'naura', 'P', 'mkm', '2022-01-10', 'asdsa', '09876', 'adsa', 'oih', 'nor', '57c7d11cd49333e3f722204c63016da9', 1),
	(2, 'Amru', 'L', 'Makassar', '2022-02-16', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 10-36-50-cover.pdf', 'amru', 'amru', 0),
	(3, 'Amru', 'L', 'Makassar', '2022-02-16', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 10-38-30-cover.pdf', 'amru', 'amru', 0),
	(4, 'Amru', 'L', 'Makassar', '2022-02-16', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 10-40-44-cover.pdf', 'amru', 'amru', 0),
	(5, 'Amru', 'L', 'Makassar', '2022-02-13', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 10-41-29-cover.pdf', 'amru', 'amru', 0),
	(6, 'Dina', 'P', 'Msaka', '2001-02-02', 'Makassar', '08229312321', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 10-42-40-cover.pdf', 'amru', 'amru', 0),
	(7, 'Amru', 'L', 'Makassar', '2022-02-11', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 'amrufauzihk@gmail.com', 'assets/filedata/file-2022-02-13 11-05-50-cover.pdf', 'amru', '5890b9947c43786471fc0cbd4d5f00f1', 1);
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

-- Dumping data for table db_skripsi.tb_profil: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_profil` DISABLE KEYS */;
INSERT INTO `tb_profil` (`id`, `nama`, `email`, `username`, `password`, `status`) VALUES
	(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);
/*!40000 ALTER TABLE `tb_profil` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
