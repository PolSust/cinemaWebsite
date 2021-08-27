-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2021 at 01:30 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_theater`
--

-- --------------------------------------------------------

--
-- Table structure for table `appartenir_users_sessions`
--

DROP TABLE IF EXISTS `appartenir_users_sessions`;
CREATE TABLE IF NOT EXISTS `appartenir_users_sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`,`user_id`),
  KEY `appartenir_users_sessions_users0_FK` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appartenir_users_sessions`
--

INSERT INTO `appartenir_users_sessions` (`session_id`, `user_id`) VALUES
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 12),
(6, 12),
(7, 12),
(9, 12),
(1, 13),
(2, 13),
(1, 14),
(6, 14),
(1, 15),
(8, 15),
(4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_title` varchar(50) NOT NULL,
  `film_description` text NOT NULL,
  `film_picture` varchar(50) NOT NULL,
  `film_lengthMin` int(11) NOT NULL,
  `film_rating` float NOT NULL,
  `film_releaseDate` date NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`film_id`, `film_title`, `film_description`, `film_picture`, `film_lengthMin`, `film_rating`, `film_releaseDate`) VALUES
(6, 'Burning', 'Jong-soo runs into Hae-mi, a girl who once lived in his neighborhood, and she asks him to watch her cat while she\'s out of town. When she returns, she introduces him to Ben, a man she met on the trip. Ben proceeds to tell Jong-soo about his hobby.', 'images/burning.jpg', 45, 7, '2021-08-25'),
(8, 'Hereditary', 'When the matriarch of the Graham family passes away, her daughter and grandchildren begin to unravel cryptic and increasingly terrifying secrets about their ancestry, trying to outrun the sinister fate they have inherited.', 'images/hereditary.jpg', 127, 7, '2021-08-25'),
(9, 'Jojo Rabbit', 'Hitler Youth cadet Jojo Betzler firmly believes in the ideals of Nazism manifested by his imaginary friend, Adolf Hitler. However, his foundations are shaken when he finds a Jewish girl in his house.', 'images/jojoRabit.jpg', 100, 8, '2019-07-25'),
(10, 'Fight Club', 'Discontented with his capitalistic lifestyle, a white-collared insomniac forms an underground fight club with Tyler, a careless soap salesman. The project soon spirals down into something sinister.', 'images/fightClub.jpg', 150, 9, '1999-07-25'),
(11, 'Inglourious Basterds', 'A few Jewish soldiers are on an undercover mission to bring down the Nazi government and put an end to the war. Meanwhile, a woman wants to avenge the death of her family from a German officer.', 'images/inglorious basterds.jfif', 150, 8, '2009-07-16'),
(12, 'Parasite', 'The struggling Kim family sees an opportunity when the son starts working for the wealthy Park family. Soon, all of them find a way to work within the same household and start living a parasitic life.', 'images/parasite.jfif', 132, 8, '2021-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `film_sessions`
--

DROP TABLE IF EXISTS `film_sessions`;
CREATE TABLE IF NOT EXISTS `film_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_dateTime` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `film_sessions_rooms_FK` (`room_id`),
  KEY `film_sessions_films0_FK` (`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_sessions`
--

INSERT INTO `film_sessions` (`session_id`, `session_dateTime`, `room_id`, `film_id`) VALUES
(1, '2021-08-26 12:01:00', 1, 6),
(2, '2021-08-26 12:01:00', 1, 6),
(3, '2021-08-26 12:01:00', 1, 6),
(4, '2021-08-26 12:33:00', 4, 6),
(5, '2021-08-14 17:01:00', 1, 6),
(6, '2021-08-26 18:09:00', 3, 10),
(7, '2021-08-28 19:44:00', 5, 9),
(8, '2021-08-26 21:58:00', 3, 9),
(9, '2021-08-28 13:53:00', 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_number`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_isAdmin` tinyint(1) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_isAdmin`, `user_username`, `user_email`, `user_password`) VALUES
(12, 1, 'pol', 'polsust@gmail.com', '$2y$10$EtvNrIfb0moe55wml9X2SuDTZ6xcQYDUFSormsuOM2os7VL4wvH.S'),
(13, 0, 'pol2', 'polsust2@gmail.com', '$2y$10$eO2svfl5xMANYQg7X7MLGeOHTLB0IRzWevHddSHLAe3Ou9drEXf7.'),
(14, 1, 'pol3', 'polsust3@gmail.com', '$2y$10$mkNJ1ZxgJ3rf9Bof5/TLFeuWSRDCWU3L/TFPG64jGfTsSZC1Ndljm'),
(15, 1, 'TheAdmin', 'admin@gmail.com', '$2y$10$abJcZ1X.NemzNW4fD.oc8OBn96N/wPYtlBONzsMj9HGQgbaSHrMrm'),
(16, 0, 'TheUser', 'user@gmail.com', '$2y$10$hmp8ZHJkoKWQoQJhGwHk3eK71inuFfjBoo0za57iVaPlOomSJ8Zu.'),
(17, 1, 'ttgt', 'polsust@gmail.com5', '$2y$10$DkdEpZioWAaZbAeCUEMkIO3WeDUv/E/pJCkfHCkZWoWaAQqAhPwEC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartenir_users_sessions`
--
ALTER TABLE `appartenir_users_sessions`
  ADD CONSTRAINT `appartenir_users_sessions_film_sessions_FK` FOREIGN KEY (`session_id`) REFERENCES `film_sessions` (`session_id`),
  ADD CONSTRAINT `appartenir_users_sessions_users0_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `film_sessions`
--
ALTER TABLE `film_sessions`
  ADD CONSTRAINT `film_sessions_films0_FK` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`),
  ADD CONSTRAINT `film_sessions_rooms_FK` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
