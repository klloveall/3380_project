-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2015 at 05:23 PM
-- Server version: 5.5.42-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `3380project`
--

-- --------------------------------------------------------

--
-- Table structure for table `balls`
--

CREATE TABLE IF NOT EXISTS `balls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `manufacurer_id` int(11) DEFAULT NULL,
  `data_filepath` varchar(100) DEFAULT NULL,
  `core_symmetric` tinyint(1) DEFAULT NULL,
  `rg` float DEFAULT NULL,
  `differential` float DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `cover_stock` enum('plastic','urethane','reactive_resin','solid_reactive','pearl_reactive','hybrid_reactive','particle') DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `balls_users`
--

CREATE TABLE IF NOT EXISTS `balls_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ball_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `drill_pattern_filename` varchar(100) DEFAULT NULL,
  `custom_name` varchar(50) DEFAULT NULL,
  `surface_type_id` int(11) DEFAULT NULL,
  `pearlized` tinyint(1) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`ball_id`),
  KEY `surface_idx` (`surface_type_id`),
  KEY `ball_idx` (`ball_id`),
  KEY `user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE IF NOT EXISTS `centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `frames`
--

CREATE TABLE IF NOT EXISTS `frames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `lane` int(11) DEFAULT NULL,
  `frame_number` int(11) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `pattern_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `b1_ball_id` int(11) DEFAULT NULL,
  `b1_release` enum('left_3_finger','right_3_finger','left_2_finger','right_2_finger','left_2_hand','right_2_hand') DEFAULT NULL,
  `b1_gutter` tinyint(1) DEFAULT NULL,
  `b1_foul` tinyint(1) DEFAULT NULL,
  `b1_p1` tinyint(1) NOT NULL,
  `b1_p2` tinyint(1) NOT NULL,
  `b1_p3` tinyint(1) NOT NULL,
  `b1_p4` tinyint(1) NOT NULL,
  `b1_p5` tinyint(1) NOT NULL,
  `b1_p6` tinyint(1) NOT NULL,
  `b1_p7` tinyint(1) NOT NULL,
  `b1_p8` tinyint(1) NOT NULL,
  `b1_p9` tinyint(1) NOT NULL,
  `b1_p10` tinyint(1) NOT NULL,
  `b2_ball_id` int(11) DEFAULT NULL,
  `b2_release` enum('left_3_finger','right_3_finger','left_2_finger','right_2_finger','left_2_hand','right_2_hand') DEFAULT NULL,
  `b2_gutter` tinyint(1) DEFAULT NULL,
  `b2_foul` tinyint(1) DEFAULT NULL,
  `b2_p1` tinyint(1) DEFAULT NULL,
  `b2_p2` tinyint(1) DEFAULT NULL,
  `b2_p3` tinyint(1) DEFAULT NULL,
  `b2_p4` tinyint(1) DEFAULT NULL,
  `b2_p5` tinyint(1) DEFAULT NULL,
  `b2_p6` tinyint(1) DEFAULT NULL,
  `b2_p7` tinyint(1) DEFAULT NULL,
  `b2_p8` tinyint(1) DEFAULT NULL,
  `b2_p9` tinyint(1) DEFAULT NULL,
  `b2_p10` tinyint(1) DEFAULT NULL,
  `b3_ball_id` int(11) DEFAULT NULL,
  `b3_release` enum('left_3_finger','right_3_finger','left_2_finger','right_2_finger','left_2_hand','right_2_hand') DEFAULT NULL,
  `b3_gutter` tinyint(1) DEFAULT NULL,
  `b3_foul` tinyint(1) DEFAULT NULL,
  `b3_p1` tinyint(1) DEFAULT NULL,
  `b3_p2` tinyint(1) DEFAULT NULL,
  `b3_p3` tinyint(1) DEFAULT NULL,
  `b3_p4` tinyint(1) DEFAULT NULL,
  `b3_p5` tinyint(1) DEFAULT NULL,
  `b3_p6` tinyint(1) DEFAULT NULL,
  `b3_p7` tinyint(1) DEFAULT NULL,
  `b3_p8` tinyint(1) DEFAULT NULL,
  `b3_p9` tinyint(1) DEFAULT NULL,
  `b3_p10` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_id`),
  KEY `game_idx` (`game_id`),
  KEY `center_idx` (`center_id`),
  KEY `pattern_idx` (`pattern_id`),
  KEY `ball1_idx` (`b1_ball_id`),
  KEY `ball2_idx` (`b2_ball_id`),
  KEY `ball3_idx` (`b3_ball_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_id` int(11) DEFAULT NULL,
  `game_number` int(11) NOT NULL,
  `time_bowled` timestamp NULL DEFAULT NULL,
  `baker` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `scrore` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `set_idx` (`set_id`),
  KEY `user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE IF NOT EXISTS `pattern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `filepath` varchar(100) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE IF NOT EXISTS `sets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `center_id` int(11) DEFAULT NULL,
  `pattern_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `center_idx` (`center_id`),
  KEY `pattern_idx` (`pattern_id`),
  KEY `event_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surface_types`
--

CREATE TABLE IF NOT EXISTS `surface_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_idx` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams_users`
--

CREATE TABLE IF NOT EXISTS `teams_users` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`team_id`,`user_id`),
  KEY `user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `preferred_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `cell_phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` blob,
  `psid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `psid_UNIQUE` (`psid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balls_users`
--
ALTER TABLE `balls_users`
  ADD CONSTRAINT `ball` FOREIGN KEY (`ball_id`) REFERENCES `balls` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surface` FOREIGN KEY (`surface_type_id`) REFERENCES `surface_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `frames`
--
ALTER TABLE `frames`
  ADD CONSTRAINT `ball1` FOREIGN KEY (`b1_ball_id`) REFERENCES `balls_users` (`id`),
  ADD CONSTRAINT `ball2` FOREIGN KEY (`b2_ball_id`) REFERENCES `balls_users` (`id`),
  ADD CONSTRAINT `ball3` FOREIGN KEY (`b3_ball_id`) REFERENCES `balls_users` (`id`),
  ADD CONSTRAINT `center1` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `game1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `pattern1` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`id`),
  ADD CONSTRAINT `user3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `set` FOREIGN KEY (`set_id`) REFERENCES `sets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `center` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pattern` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `users` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teams_users`
--
ALTER TABLE `teams_users`
  ADD CONSTRAINT `team` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
