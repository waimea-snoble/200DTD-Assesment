-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1,	'snoble',	'password');

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `person` int NOT NULL,
  `task` int NOT NULL,
  PRIMARY KEY (`person`,`task`),
  KEY `task` (`task`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`person`) REFERENCES `people` (`id`),
  CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bookings` (`person`, `task`) VALUES
(120,	98),
(120,	99),
(120,	100);

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `people` (`id`, `name`, `phone`, `email`) VALUES
(120,	'Scott Noble',	'28174937',	'scott@gmail.com');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`id`, `name`, `date`, `category`, `amount`) VALUES
(98,	'Banana bread',	'2024-09-20',	'Food',	0),
(99,	'Beef lasagna',	'2024-09-20',	'Food',	1),
(100,	'Large popcorn bag',	'2024-09-20',	'Food',	4),
(102,	'Gymnastics Nelson',	'2024-09-20',	'Volunteers',	10),
(103,	'Trafalgar Centre',	'2024-09-21',	'Volunteers',	10),
(104,	'Scoreholder',	'2024-09-21',	'Volunteers',	2),
(106,	'Trailer',	'2024-09-20',	'Moving equipment',	2),
(108,	'Truck',	'2024-09-20',	'Moving equipment',	2),
(110,	'Ipads/tablets',	'2024-09-20',	'Electronics',	5);

-- 2024-09-01 22:50:28
