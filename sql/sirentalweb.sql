-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
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


-- Dumping database structure for sirentalweb
CREATE DATABASE IF NOT EXISTS `sirentalweb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sirentalweb`;

-- Dumping structure for table sirentalweb.car
CREATE TABLE IF NOT EXISTS `car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `car_plate` varchar(15) NOT NULL,
  `car_brand` varchar(20) NOT NULL,
  `car_type` varchar(10) NOT NULL DEFAULT '0',
  `car_capacity` int(11) NOT NULL DEFAULT 0,
  `car_transmission` char(1) NOT NULL DEFAULT '0',
  `car_year` int(11) NOT NULL DEFAULT 0,
  `car_price` double NOT NULL,
  `car_status` int(11) NOT NULL,
  PRIMARY KEY (`car_id`),
  KEY `FK_car_users` (`user_id`),
  CONSTRAINT `FK_car_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirentalweb.car: ~0 rows (approximately)

-- Dumping structure for table sirentalweb.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(16) NOT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_gender` char(50) DEFAULT NULL,
  `user_level` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirentalweb.users: ~4 rows (approximately)
INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phone`, `user_gender`, `user_level`) VALUES
	(1, 'admin', 'admin@gmail.com', 'admin123', 'unknown', '0000', 'X', 0),
	(2, 'ben', 'ben@gmail.com', 'ben123', 'Batam', '0895366665217', 'M', 1),
	(3, 'hilmy', 'hilmy@gmail.com', 'hilmy123', 'Bandung', '081394627188', 'M', 2),
	(4, 'ripa', 'ripa@gmail.com', 'ripa123', 'Tangerang', '085884606215', 'F', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
