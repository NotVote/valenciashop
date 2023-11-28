-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cidonasi.donasi
CREATE TABLE IF NOT EXISTS `donasi` (
  `donasi_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `jumlah` int DEFAULT NULL,
  `tempat_id` bigint unsigned DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`donasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table cidonasi.donasi: ~1 rows (approximately)
INSERT INTO `donasi` (`donasi_id`, `user_id`, `jumlah`, `tempat_id`, `tanggal`) VALUES
	(2, 1, 300000, 1, '2023-05-25');

-- Dumping structure for table cidonasi.donatur
CREATE TABLE IF NOT EXISTS `donatur` (
  `donatur_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  `NIK` varchar(20) COLLATE armscii8_bin DEFAULT NULL,
  `bank` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`donatur_id`),
  UNIQUE KEY `NIK` (`NIK`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table cidonasi.donatur: ~4 rows (approximately)
INSERT INTO `donatur` (`donatur_id`, `nama`, `NIK`, `bank`, `user_id`) VALUES
	(1, 'bambang', '3423423', '432423', 1),
	(2, 'dua', '4242423', '43242112', 3),
	(8, 'res', '31231', '62342', 5),
	(9, 'resaf', '6556', '85656', 6);

-- Dumping structure for table cidonasi.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `level_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`level_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table cidonasi.levels: ~0 rows (approximately)
INSERT INTO `levels` (`level_id`, `level`) VALUES
	(1, 'Admin');

-- Dumping structure for table cidonasi.tempat
CREATE TABLE IF NOT EXISTS `tempat` (
  `tempat_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_tempat` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  `email_tempat` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  `Bank` varchar(255) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`tempat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table cidonasi.tempat: ~1 rows (approximately)
INSERT INTO `tempat` (`tempat_id`, `nama_tempat`, `email_tempat`, `Bank`) VALUES
	(1, 'Chari', 'char@gmail.com', '231421'),
	(2, 'deaf charity', 'deaf@gmail.com', '432352342');

-- Dumping structure for table cidonasi.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `gmail` varchar(255) COLLATE armscii8_bin NOT NULL,
  `level_id` bigint NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE KEY `gmail` (`gmail`),
  KEY `level_id` (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table cidonasi.users: ~4 rows (approximately)
INSERT INTO `users` (`user_id`, `username`, `password`, `gmail`, `level_id`) VALUES
	(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 1),
	(3, 'durara', '827ccb0eea8a706c4c34a16891f84e7b', 'dur@gmail.com', 1),
	(5, 'reasdasda', '827ccb0eea8a706c4c34a16891f84e7b', 're@gmail.com', 1),
	(6, 'yrue', '827ccb0eea8a706c4c34a16891f84e7b', 'refeaw@gmail.com', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
