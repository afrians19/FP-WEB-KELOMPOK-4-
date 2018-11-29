-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2018 at 10:40 PM
-- Server version: 8.0.12
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pancongrb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(1, 'Afrians', 'Syah', 'afri@email.com', 'afrians', '$2y$10$dkEZeuMrhHnFP8ucPzszEepKfWUldPnfQIkTE1utpFAslDEhtBvUa');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `visible`, `content`) VALUES
(1, 'Pancong', 1, '<div class=\"item\">\r\n                    <h2>Pancong</h2>\r\n                    <p>Deskripsi.</p>\r\n        \r\n                    <div class=\"info\">\r\n                    <span>Harga: </span>\r\n                    </div>\r\n        \r\n                    <div class=\"order\">\r\n                    <label for=\"pancong\">Jumlah:</label>\r\n                    <input type=\"number\" min=\"0\" id=\"pancong\" size=\"3\" placeholder=\"0\">\r\n                    </div>\r\n                </div>'),
(2, 'Roti Bakar', 1, '<div class=\"item\">\r\n                    <h2>Roti Panggang</h2>\r\n                    <p>Deskripsi.</p>\r\n        \r\n                    <div class=\"info\">\r\n                    <span>Harga: </span>\r\n                    </div>\r\n        \r\n                    <div class=\"order\">\r\n                    <label for=\"roti-panggang\">Jumlah:</label>\r\n                    <input type=\"number\" min=\"0\" id=\"roti-panggang\" size=\"3\" placeholder=\"0\">\r\n                    </div>\r\n                </div>'),
(3, 'Pisang Bakar', 1, '<div class=\"item\">\r\n                    <h2>Pisang Bakar</h2>\r\n                    <p>Deskripsi.</p>\r\n        \r\n                    <div class=\"info\">\r\n                    <span>Harga: </span>\r\n                    </div>\r\n        \r\n                    <div class=\"order\">\r\n                    <label for=\"pisang-bakar\">Jumlah:</label>\r\n                    <input type=\"number\" min=\"0\" id=\"pisang-bakar\" size=\"3\" placeholder=\"0\">\r\n                    </div>\r\n                </div>'),
(4, 'Indomie', 1, '<div class=\"item\">\r\n                    <h2>Pisang Bakar</h2>\r\n                    <p>Deskripsi.</p>\r\n        \r\n                    <div class=\"info\">\r\n                    <span>Harga: </span>\r\n                    </div>\r\n        \r\n                    <div class=\"order\">\r\n                    <label for=\"pisang-bakar\">Jumlah:</label>\r\n                    <input type=\"number\" min=\"0\" id=\"pisang-bakar\" size=\"3\" placeholder=\"0\">\r\n                    </div>\r\n                </div>'),
(5, 'Minuman', 1, '<div class=\"item\">\r\n                    <h2>Minuman</h2>\r\n                    <p>Deskripsi.</p>\r\n        \r\n                    <div class=\"info\">\r\n                    <span>Harga: </span>\r\n                    </div>\r\n        \r\n                    <div class=\"order\">\r\n                    <label for=\"minuman\">Jumlah:</label>\r\n                    <input type=\"number\" min=\"0\" id=\"minuman\" size=\"3\" placeholder=\"0\">\r\n                    </div>\r\n                </div>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `username`, `address`, `phone`, `hashed_password`) VALUES
(1, 'Afrians', 'Syah', 'afri@email.com', 'afrians19', 'jl rasim 9 no 17 jakarta selatan simprug indonesia', '08211223412', '$2y$10$wDJssh4SZE2vEpoNPLjLueP3Bhru9Yw2V3zK3IlpmWCh7lZROKsNC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
