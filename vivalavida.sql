-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2019 at 09:22 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vivalavida`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_file`
--

DROP TABLE IF EXISTS `image_file`;
CREATE TABLE IF NOT EXISTS `image_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_file`
--

INSERT INTO `image_file` (`id`, `name`, `category`, `path`) VALUES
(1, 'Che room 1', 'Che - Room', '3e53996740.jpeg'),
(2, 'Che room 2', 'Che - Room', 'a28e25e857.jpeg'),
(3, 'Che room 3', 'Che - Room', '0729120775.jpeg'),
(4, 'Che room 4', 'Che - Room', '2d7623b2f3.jpeg'),
(5, 'Cuba room 1', 'Cuba - Room', 'afef518f9a.jpeg'),
(6, 'Cuba room 2', 'Cuba - Room', '0d659e31f1.jpeg'),
(7, 'Cuba room 3', 'Cuba - Room', '2139f6f35d.jpeg'),
(8, 'Granma Room 1', 'Granma Room', '5e26b8f6c2.jpeg'),
(9, 'Granma Room 2', 'Granma Room', 'd864ef1474.jpeg'),
(10, 'Granma Room 3', 'Granma Room', '8e4fdc8124.jpeg'),
(11, 'Granma Room 4', 'Granma Room', 'ac8b874afc.jpeg'),
(12, 'Granma Room 5', 'Granma Room', '8708e7fce4.jpeg'),
(13, 'Home 1', 'Home', '97ff12d997.jpeg'),
(14, 'Home 2', 'Home', '7cb388ccaf.jpeg'),
(15, 'Home 3', 'Home', '57e833c49c.jpeg'),
(16, 'Home 4', 'Home', '0ba5e3b0ad.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191119192158', '2019-11-19 19:22:48'),
('20191119193744', '2019-11-19 19:37:55'),
('20191119193904', '2019-11-19 19:39:10'),
('20191119194652', '2019-11-19 19:46:59'),
('20191119203227', '2019-11-19 20:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci,
  `text_de` longtext COLLATE utf8mb4_unicode_ci,
  `text_es` longtext COLLATE utf8mb4_unicode_ci,
  `position` smallint(6) DEFAULT NULL,
  `price` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `title`, `text_en`, `text_de`, `text_es`, `position`, `price`) VALUES
(1, 'Che', '<p>Spacious bedroom. It has a bathroom and independent entrance.</p>', '<p>Spacious bedroom. It has a bathroom and independent entrance.</p>', '<p>Spacious bedroom. It has a bathroom and independent entrance.</p>', 2, 40),
(2, 'Cuba', '<p>Colorful bedroom with a bed and separate bathroom</p>', '<p>Colorful bedroom with a bed and separate bathroom</p>', '<p>Colorful bedroom with a bed and separate bathroom</p>', 3, 40),
(3, 'Granma', '<p>Colorful bedroom with two beds and independent bathroom.</p>', '<p>Colorful bedroom with two beds and independent bathroom.</p>', '<p>Colorful bedroom with two beds and independent bathroom.</p>', 1, 40),
(4, 'We are Yara & Family', '<p>I am Yara a lover of Cuba and its people. Currently, we live in Havana Vedado and we offer you a colonial house to make your stay in Havana a wonderful and safe adventure.</p>\r\n\r\n<p>The house was built in 1942 and recently restored in 2018. It is very spacious, illuminated and retains its style and characteristics of the time, although we harmonize it with contemporary decorations. It has three spacious rooms, portal, terrace and wifi.</p>\r\n\r\n<p>In addition, you can count on breakfast and food services if you wish.</p>\r\n\r\n<p>We are at your service, likewise, you can rent only one room for a lower price. We invite you to a happy stay, in our house you can live Havana in the style of the 40s.</p>', '<p>I am Yara a lover of Cuba and its people. Currently, we live in Havana Vedado and we offer you a colonial house to make your stay in Havana a wonderful and safe adventure.</p>\r\n\r\n<p>The house was built in 1942 and recently restored in 2018. It is very spacious, illuminated and retains its style and characteristics of the time, although we harmonize it with contemporary decorations. It has three spacious rooms, portal, terrace and wifi.</p>\r\n\r\n<p>In addition, you can count on breakfast and food services if you wish.</p>\r\n\r\n<p>We are at your service, likewise, you can rent only one room for a lower price. We invite you to a happy stay, in our house you can live Havana in the style of the 40s.</p>', '<p>I am Yara a lover of Cuba and its people. Currently, we live in Havana Vedado and we offer you a colonial house to make your stay in Havana a wonderful and safe adventure.</p>\r\n\r\n<p>The house was built in 1942 and recently restored in 2018. It is very spacious, illuminated and retains its style and characteristics of the time, although we harmonize it with contemporary decorations. It has three spacious rooms, portal, terrace and wifi.</p>\r\n\r\n<p>In addition, you can count on breakfast and food services if you wish.</p>\r\n\r\n<p>We are at your service, likewise, you can rent only one room for a lower price. We invite you to a happy stay, in our house you can live Havana in the style of the 40s.</p>', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_image_file`
--

DROP TABLE IF EXISTS `room_image_file`;
CREATE TABLE IF NOT EXISTS `room_image_file` (
  `room_id` int(11) NOT NULL,
  `image_file_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`,`image_file_id`),
  KEY `IDX_4A57AC9254177093` (`room_id`),
  KEY `IDX_4A57AC926DB2EB0` (`image_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_image_file`
--

INSERT INTO `room_image_file` (`room_id`, `image_file_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_image_file`
--
ALTER TABLE `room_image_file`
  ADD CONSTRAINT `FK_4A57AC9254177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4A57AC926DB2EB0` FOREIGN KEY (`image_file_id`) REFERENCES `image_file` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
