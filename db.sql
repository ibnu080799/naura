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


-- Dumping database structure for perpus
CREATE DATABASE IF NOT EXISTS `perpus` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `perpus`;

-- Dumping structure for table perpus.ref_anggota
CREATE TABLE IF NOT EXISTS `ref_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.ref_anggota: ~3 rows (approximately)
/*!40000 ALTER TABLE `ref_anggota` DISABLE KEYS */;
INSERT INTO `ref_anggota` (`id`, `status`) VALUES
	(1, 'Dosen'),
	(2, 'Karyawan'),
	(3, 'Mahasiswa');
/*!40000 ALTER TABLE `ref_anggota` ENABLE KEYS */;

-- Dumping structure for table perpus.ref_kategori
CREATE TABLE IF NOT EXISTS `ref_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.ref_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `ref_kategori` DISABLE KEYS */;
INSERT INTO `ref_kategori` (`id`, `kode`, `kategori`) VALUES
	(1, '001', 'Novel'),
	(2, '002', 'Kamus');
/*!40000 ALTER TABLE `ref_kategori` ENABLE KEYS */;

-- Dumping structure for table perpus.ref_kelas
CREATE TABLE IF NOT EXISTS `ref_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.ref_kelas: ~2 rows (approximately)
/*!40000 ALTER TABLE `ref_kelas` DISABLE KEYS */;
INSERT INTO `ref_kelas` (`id`, `kelas`) VALUES
	(1, '1'),
	(2, '2');
/*!40000 ALTER TABLE `ref_kelas` ENABLE KEYS */;

-- Dumping structure for table perpus.ref_penerbit
CREATE TABLE IF NOT EXISTS `ref_penerbit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penerbit` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.ref_penerbit: ~1 rows (approximately)
/*!40000 ALTER TABLE `ref_penerbit` DISABLE KEYS */;
INSERT INTO `ref_penerbit` (`id`, `penerbit`) VALUES
	(1, 'Tiga Serangkai'),
	(3, 'Buku33');
/*!40000 ALTER TABLE `ref_penerbit` ENABLE KEYS */;

-- Dumping structure for table perpus.ref_rak_buku
CREATE TABLE IF NOT EXISTS `ref_rak_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rak` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.ref_rak_buku: ~2 rows (approximately)
/*!40000 ALTER TABLE `ref_rak_buku` DISABLE KEYS */;
INSERT INTO `ref_rak_buku` (`id`, `kode_rak`) VALUES
	(3, 'R001'),
	(4, 'R002');
/*!40000 ALTER TABLE `ref_rak_buku` ENABLE KEYS */;

-- Dumping structure for table perpus.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `id_rak_buku` int(11) DEFAULT NULL,
  `no_buku` char(50) DEFAULT NULL,
  `tahun` char(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` char(50) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `isi_ringkas` text DEFAULT NULL,
  `file_name` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.tb_buku: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
INSERT INTO `tb_buku` (`id`, `id_kategori`, `id_rak_buku`, `no_buku`, `tahun`, `pengarang`, `judul`, `kota`, `id_penerbit`, `tahun_terbit`, `jumlah`, `isi_ringkas`, `file_name`) VALUES
	(1, 2, 3, '090201', '2015', 'Agung', 'Dendeng', 'Makassar', 3, '2020', 100, '123', 'assets/cover/file-2021-11-01 20-57-32-cover.jpg'),
	(14, 2, 3, '0023', '2021', 'Bebas1', 'adakag1', 'Makassar2', 1, '2000', 29, 'taufik Orang', 'assets/cover/file-2021-11-01 21-09-00-cover.jpg'),
	(15, 2, 3, '0821', '2021', 'taufik', 'taufik', 'sad', 1, '2001', 21, 'adakah', 'assets/cover/file-2021-11-01 21-33-18-cover.jpg'),
	(16, 1, 3, '1233', '2019', 'Bebas', 'Tes', 'Makassar', 1, '2003', 21, 'dd', 'assets/cover/file-2021-11-01 21-43-01-cover.jpg'),
	(20, 1, 3, '001-22', '2015', 'Tes', 'xzxZXZc', 'Makassar2', 3, '2003', 2, 'ee', 'assets/cover/file-2021-11-10 06-32-43-cover.jpg');
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table perpus.tb_pinjam
CREATE TABLE IF NOT EXISTS `tb_pinjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_real` date DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.tb_pinjam: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_pinjam` DISABLE KEYS */;
INSERT INTO `tb_pinjam` (`id`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_real`, `keterangan`, `status`) VALUES
	(1, 1, 2, '2021-10-24', '2021-10-24', '2021-10-24', 'j', 0),
	(4, 1, 14, '2021-11-22', '2021-11-29', '2021-11-22', 'Mantap', 3);
/*!40000 ALTER TABLE `tb_pinjam` ENABLE KEYS */;

-- Dumping structure for table perpus.tb_riwayat_pinjam
CREATE TABLE IF NOT EXISTS `tb_riwayat_pinjam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_real` date DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.tb_riwayat_pinjam: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_riwayat_pinjam` DISABLE KEYS */;
INSERT INTO `tb_riwayat_pinjam` (`id`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_real`, `keterangan`, `status`) VALUES
	(2, 3, 1, '2021-11-01', '2021-11-03', '2021-11-01', 'sss', 1),
	(3, 1, 1, '2021-11-15', '2021-11-17', '2021-11-22', 'Tess Denda : 2500', 1);
/*!40000 ALTER TABLE `tb_riwayat_pinjam` ENABLE KEYS */;

-- Dumping structure for table perpus.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `nisn` char(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jkel` char(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `status_anggota` int(11) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `create` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpus.tb_users: ~9 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`id`, `nama`, `nisn`, `kelas`, `jkel`, `alamat`, `no_telp`, `status_anggota`, `username`, `password`, `email`, `status`, `create`) VALUES
	(1, 'admin', '182360', '1', 'L', 'Bps', '081247352852', 2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2, NULL),
	(3, 'user1', '123', '2', 'P', 'Makassar', '08525508373', 3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 1, NULL),
	(4, 'Thea', '182351', '3 Braille', 'P', 'Sudiang Raya', '085255059701', 3, 'thea', '929492861a8c2f3e64f2882a7f167207', 'thea@gmail.com', 1, NULL),
	(5, 'Tami', '172332', '2', 'P', 'BTP', '081235142612', 1, 'tami', 'a2a0ac851d64e96e659198bdef179228', 'tami@gmail.com', 1, NULL),
	(6, 'MUH. AMRU FAUZI H. K', '121332', '2', 'L', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 3, 'amru', '5890b9947c43786471fc0cbd4d5f00f1', 'amrufauzihk@gmail.com', 1, NULL),
	(7, 'Tess', '1231331', '2', 'L', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 3, 'amruu', 'eac4caa1d0d802e0e6b95fa90f50b838', 'amrufauzihk@gmail.com', 1, NULL),
	(17, 'Ancha', '18111', '1', 'L', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 3, 'ancha1', '202cb962ac59075b964b07152d234b70', 'ancha@gmail.com', 1, '2021-11-07 17:22:49'),
	(18, 'Fitri', '182311', '2', 'L', 'BPS', '081231222', 1, 'ancha', 'ss', 'sda', 0, '2021-11-07 17:36:27'),
	(19, 'ammar', '121332', '2', 'L', 'Bumi Permata Sudiang Blok A2 No 14,', '+6281247352852', 3, 'ammar', 'fed5de04cbba88aae4fa4b1d370dde5c', 'ammar@gmail.com', 1, '2021-11-07 17:43:21');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for trigger perpus.xttrg_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `xttrg_after_delete` BEFORE DELETE ON `tb_pinjam` FOR EACH ROW BEGIN
  INSERT INTO tb_riwayat_pinjam
  SELECT * FROM tb_pinjam WHERE id = OLD.id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
