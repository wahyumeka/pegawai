-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2013 at 04:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(18) NOT NULL DEFAULT '',
  `nama` varchar(30) NOT NULL DEFAULT '',
  `tgllahir` date NOT NULL DEFAULT '0000-00-00',
  `jenkel` enum('0','1') NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `namafoto` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`nip`),
  UNIQUE KEY `nim` (`nip`),
  KEY `nim_2` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `tgllahir`, `jenkel`, `alamat`, `namafoto`) VALUES
('131414141112344141', 'Wendra', '1987-03-05', '0', 'jln', 'Bat.gif'),
('131414141112344142', 'Arjo', '1986-09-06', '0', 'dwdd', 'kcg.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
