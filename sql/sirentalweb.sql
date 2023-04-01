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
  `car_type` varchar(10) NOT NULL,
  `car_capacity` int(11) NOT NULL,
  `car_transmission` char(1) NOT NULL,
  `car_year` int(11) NOT NULL,
  `car_price` double NOT NULL,
  `car_status` int(11) NOT NULL,
  `car_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `FK_car_users` (`user_id`),
  CONSTRAINT `FK_car_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirentalweb.car: ~6 rows (approximately)
INSERT INTO `car` (`car_id`, `user_id`, `car_plate`, `car_brand`, `car_type`, `car_capacity`, `car_transmission`, `car_year`, `car_price`, `car_status`, `car_image`) VALUES
	(1000, 2, 'D1111GTR', 'Nissan Skyline GT-R', 'Sedan', 4, 'M', 2000, 250, 1, 'gtr.jpg'),
	(1001, 2, 'D4444SPR', 'Toyota Supra MK4', 'Sedan', 4, 'M', 1995, 300, 1, 'mk4.jpg'),
	(1002, 2, 'D991PRS', 'Porsche Cayman', 'Sedan', 4, 'M', 2005, 200, 1, 'cayman.jpg'),
	(1003, 6, 'B7777MWX', 'BMW X7', 'SUV', 6, 'A', 2022, 400, 1, 'x7.jpg'),
	(1004, 6, 'B1661ALP', 'Toyota Alphard', 'MPV', 8, 'A', 2023, 500, 1, 'alphard.jpg'),
	(1005, 2, 'D4646HYD', 'Hyundai Staria', 'MPV', 8, 'A', 2023, 600, 1, 'staria.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sirentalweb.users: ~5 rows (approximately)
INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `user_phone`, `user_gender`, `user_level`) VALUES
	(1, 'admin', 'admin@gmail.com', 'admin123', 'unknown', '0000', 'X', 0),
	(2, 'Bennart Dem Gunawan', 'ben@gmail.com', 'ben123', 'Bandung', '0895366665217', 'M', 1),
	(3, 'Hilmy Aiman', 'hilmy@gmail.com', 'hilmy123', 'Bandung', '08123123123123', 'M', 2),
	(5, 'ripa', 'ripa@gmail.com', 'ripa123', 'Bojong Koneng', '08123123123123', 'F', 2),
	(6, 'Fahri Aqila', 'fahri@gmail.com', 'fahri123', 'Subang', '085951712344', 'M', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
