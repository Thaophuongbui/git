-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 01, 2018 lúc 07:23 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffeedb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coffee`
--

DROP TABLE IF EXISTS `coffee`;
CREATE TABLE IF NOT EXISTS `coffee` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Price` double NOT NULL,
  `Roast` varchar(10) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Image` text NOT NULL,
  `Review` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `coffee`
--

INSERT INTO `coffee` (`ID`, `Name`, `Type`, `Price`, `Roast`, `Country`, `Image`, `Review`) VALUES
(3, 'Peppermint White Chocolate Mocha', 'Espresso', 3.25, 'Medium', 'Italy', 'images/2.jpg', 'Espresso with white chocolate and peppermint flavor..'),
(2, 'Cafe Americano', 'Espresso', 3.25, 'Medium', 'Italy', 'images/3.jpg', 'Similar in strength and taste to Americano-style ..'),
(1, 'CafeAuLait', 'Classic', 2.25, 'Medium', 'France', 'images/aulait.jpg', 'A coffee beverage consisting strong or bold coffee'),
(15, '5', '%', 2.68, '4', 'gbj', 'images/hat-cafe.png', 'jkk'),
(14, 'Cake', '%', 2, 'No', 'France', 'images/5.jpg', 'Delicious');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
