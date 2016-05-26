-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 22, 2016 at 02:52 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olimpusArm`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `name`) VALUES
(1, 'Нет доступа'),
(2, 'Обслуживающий персонал'),
(3, 'Администратор системы');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `data_rozhd` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients_id`, `fio`, `tel`, `data_rozhd`) VALUES
(1, 'Петров Петр', '891012345678', '1993-06-01'),
(2, 'Сидоров Сидор', '89101233212', '1995-05-22'),
(3, 'Иванов Иван', '89104434582', '1997-05-11'),
(4, 'Петрова Мария', '891012342234', '1994-05-26'),
(5, 'Коржова Екатерина', '891012342244', '1997-07-20'),
(6, 'Иванова Наталья', '89151234333', '0000-00-00'),
(7, 'Черняев Владимир', '89997001234', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders_musics`
--

CREATE TABLE `orders_musics` (
  `orders_musics_id` int(11) NOT NULL,
  `orders_musics_date` date NOT NULL,
  `tel` varchar(255) NOT NULL,
  `name_music` varchar(255) NOT NULL,
  `prim` varchar(255) NOT NULL,
  `datatime_play` datetime NOT NULL,
  `statuses_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL DEFAULT '0',
  `sum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_musics`
--

INSERT INTO `orders_musics` (`orders_musics_id`, `orders_musics_date`, `tel`, `name_music`, `prim`, `datatime_play`, `statuses_id`, `users_id`, `sum`) VALUES
(1, '2016-05-22', '89997001234', 'Сплин - Мы сидели и курили', 'Всем хорошего настроения от Черняева Владимира', '0000-00-00 00:00:00', 2, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `statuses_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`statuses_id`, `name`) VALUES
(1, 'Ожидаем оплату'),
(2, 'В очереди'),
(3, 'Проиграно');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tables_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `count_seats` int(11) NOT NULL,
  `flag_free` enum('1','0','','') NOT NULL DEFAULT '0' COMMENT '1 - занят, 0 - стол свободен'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tables_id`, `name`, `count_seats`, `flag_free`) VALUES
(1, 'Стол круглый (справа)', 3, '0'),
(2, 'Стол квадратный (справа)', 2, '1'),
(3, 'Стол круглый (центр)', 4, '0'),
(4, 'Стол квадратный (центр)', 4, '0'),
(5, 'Стол круглый (слева)', 2, '0'),
(6, 'Стол квадратный (слева)', 2, '0'),
(7, 'Стол с диваном (красный)', 6, '0'),
(8, 'Стол с диваном (зеленый)', 6, '0'),
(9, 'Стол с диваном (синий)', 6, '0'),
(10, 'Стол с диваном (желтый)', 6, '0'),
(11, 'Стол широкий', 10, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_id` enum('1','2','3') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `fio`, `login`, `password`, `access_id`) VALUES
(1, 'Корниенко Дмитрий', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `visits_id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `clients_id` int(11) NOT NULL,
  `visits_type_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `note` text NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`visits_id`, `date_add`, `clients_id`, `visits_type_id`, `sum`, `note`, `users_id`) VALUES
(1, '2016-05-21', 1, 1, 200, '', 1),
(2, '2016-05-21', 2, 1, 200, '', 1),
(3, '2016-05-21', 3, 2, 200, '', 1),
(4, '2016-05-22', 4, 1, 200, '', 1),
(5, '2016-05-22', 5, 2, 200, '', 1),
(6, '2016-05-22', 6, 2, 200, '', 1),
(7, '2016-05-22', 7, 2, 200, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visits_tables`
--

CREATE TABLE `visits_tables` (
  `visits_tables_id` int(11) NOT NULL,
  `clients_id` int(11) NOT NULL,
  `tables_id` int(11) NOT NULL,
  `date_reserv` date NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits_tables`
--

INSERT INTO `visits_tables` (`visits_tables_id`, `clients_id`, `tables_id`, `date_reserv`, `users_id`) VALUES
(1, 7, 2, '2016-05-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visits_type`
--

CREATE TABLE `visits_type` (
  `visits_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visits_type`
--

INSERT INTO `visits_type` (`visits_type_id`, `name`) VALUES
(1, 'Танцпол'),
(2, 'Ресторан');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`);

--
-- Indexes for table `orders_musics`
--
ALTER TABLE `orders_musics`
  ADD PRIMARY KEY (`orders_musics_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`statuses_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tables_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visits_id`);

--
-- Indexes for table `visits_tables`
--
ALTER TABLE `visits_tables`
  ADD PRIMARY KEY (`visits_tables_id`);

--
-- Indexes for table `visits_type`
--
ALTER TABLE `visits_type`
  ADD PRIMARY KEY (`visits_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders_musics`
--
ALTER TABLE `orders_musics`
  MODIFY `orders_musics_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statuses_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tables_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `visits_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `visits_tables`
--
ALTER TABLE `visits_tables`
  MODIFY `visits_tables_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visits_type`
--
ALTER TABLE `visits_type`
  MODIFY `visits_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
