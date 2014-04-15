-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2014 at 04:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amonitro`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `artikel_id` bigint(12) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` longtext NOT NULL,
  `deskripsi` text NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `tag` text NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`artikel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `judul`, `isi`, `deskripsi`, `keyword`, `tag`, `status`, `tanggal`, `image`) VALUES
(107, 'test oes', '<p>test</p>', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            													                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', '', '', 'publish', '2014-04-12 18:53:30', '3a5a439b226d8ff0fe9e4f5a49363c72.jpg'),
(108, 'test edit', '<p>test edit</p>', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    													                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ', '', '', 'sampah', '2014-04-13 12:08:57', '029c6358bf5f620939ac69163096d8f9.png'),
(109, 'dsfsfdsf', '<p>fdsfdsfsfsfdsdfsfsdfsfsdf</p>', '													', '', '', 'sampah', '2014-04-13 16:27:13', NULL),
(110, 'kampret', '<p>gdfgdfgdgfdgdf</p>', '                                                        													                                                ', '', '', 'sampah', '2014-04-13 16:27:40', '4cb398baca1bcc2e0447226b6c39c010.jpg'),
(111, 'gdfgdgdgdfhgh35', '<p>hghdhdhdghgd</p>', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        													                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '', '', 'sampah', '2014-04-13 16:28:07', ''),
(112, 'asuw', '<p>lorem</p>', '                                                                                                                                                                                                                                                                                                                                                                            													                                                                                                                                                                                                                                                                                                                        ', '', '', 'sampah', '2014-04-15 15:25:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `halaman_id` bigint(12) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `isi` longtext NOT NULL,
  `deskripsi` text NOT NULL,
  `tag` text NOT NULL,
  `status` varchar(8) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`halaman_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(12) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(250) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'uncategorized'),
(2, 'Ipsum'),
(3, 'Dolor'),
(4, 'Consectetur'),
(5, 'Adipisicing'),
(6, 'test'),
(7, 'Lorem');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE IF NOT EXISTS `kategori_artikel` (
  `kategori_artikel_id` int(12) NOT NULL AUTO_INCREMENT,
  `artikel_id` bigint(12) NOT NULL,
  `kategori_id` int(12) NOT NULL,
  PRIMARY KEY (`kategori_artikel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`kategori_artikel_id`, `artikel_id`, `kategori_id`) VALUES
(151, 111, 1),
(163, 0, 1),
(165, 110, 1),
(166, 0, 1),
(183, 112, 2),
(184, 112, 5),
(185, 112, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `last_login`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2014-04-04 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
