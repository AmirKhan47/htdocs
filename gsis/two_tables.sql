-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 14, 2018 at 07:24 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gsis_staging`
--

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE IF NOT EXISTS `challan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `challan_date_created` date NOT NULL,
  `challan_due_date` date NOT NULL,
  `challan_date_submitted` date DEFAULT NULL,
  `challan_amount_submitted` decimal(13,2) DEFAULT NULL,
  `challan_bank_submitted` varchar(50) DEFAULT NULL,
  `challan_admission_fee` decimal(13,2) NOT NULL,
  `challan_registration_fee` decimal(13,2) NOT NULL,
  `challan_security_fee` decimal(13,2) NOT NULL,
  `challan_annual_fee` decimal(13,2) NOT NULL,
  `challan_annual_stationary_fee` decimal(13,2) NOT NULL,
  `challan_house_shirt_fee` decimal(13,2) NOT NULL,
  `challan_monthly_lab_fee` decimal(13,2) NOT NULL,
  `challan_monthly_computer_fee` decimal(13,2) NOT NULL,
  `challan_monthly_security_fee` decimal(13,2) NOT NULL,
  `challan_monthly_fee` decimal(13,2) NOT NULL,
  `challan_exam_fee` decimal(13,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`id`, `student_id`, `challan_date_created`, `challan_due_date`, `challan_date_submitted`, `challan_amount_submitted`, `challan_bank_submitted`, `challan_admission_fee`, `challan_registration_fee`, `challan_security_fee`, `challan_annual_fee`, `challan_annual_stationary_fee`, `challan_house_shirt_fee`, `challan_monthly_lab_fee`, `challan_monthly_computer_fee`, `challan_monthly_security_fee`, `challan_monthly_fee`, `challan_exam_fee`) VALUES
(1, 1, '2018-04-23', '2018-05-03', '2018-05-14', '10000.00', 'ubl bank', '200.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(2, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(3, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(4, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(5, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '300.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(6, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(7, 1, '2018-04-23', '2018-05-03', '2018-05-14', '1000.00', 'asd bank', '100.00', '900.00', '300.00', '600.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(8, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '200.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(9, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(10, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '200.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(11, 1, '2018-04-23', '2018-05-12', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '50000.00', '400.00', '700.00', '600.00', '1100.00'),
(12, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(13, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '100.00', '900.00', '300.00', '500.00', '800.00', '1000.00', '200.00', '400.00', '700.00', '600.00', '1100.00'),
(14, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '123.00', '231.00', '123.00', '123.00', '213.00', '231.00', '123.00', '123.00', '112.00', '3123.00', '123.00'),
(15, 1, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '123.00', '231.00', '123.00', '123.00', '213.00', '231.00', '123.00', '123.00', '112.00', '3123.00', '123.00'),
(16, 1, '2018-04-23', '2018-05-05', NULL, NULL, NULL, '123.00', '231.00', '123.00', '123.00', '213.00', '231.00', '123.00', '123.00', '112.00', '3123.00', '126.00'),
(17, 3, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '111.00', '2323.00', '121.00', '123.00', '1232.00', '233.00', '1212.00', '112.00', '123.00', '133.00', '222.00'),
(18, 3, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '3434.00', '765765.00', '7576.00', '76576.00', '76576.00', '7657657.00', '67576.00', '766.00', '6776576.00', '765.00', '500.00'),
(19, 3, '2018-04-23', '2018-05-03', NULL, NULL, NULL, '6576576.00', '75765.00', '7676765.00', '675765.00', '75675.00', '7567.00', '76576576.00', '765675.00', '765765.00', '765765.00', '555.00'),
(20, 1, '2018-04-26', '2018-05-06', NULL, NULL, NULL, '2520000.00', '444.00', '500.00', '400.00', '44444.00', '444.00', '500.00', '400.00', '444.00', '444.00', '2450.00'),
(21, 37, '2018-05-08', '2018-05-10', NULL, NULL, NULL, '20000.00', '500.00', '5000.00', '8000.00', '15000.00', '500.00', '500.00', '200.00', '100.00', '5000.00', '0.00');

--
-- Triggers `challan`
--
DROP TRIGGER IF EXISTS `challan_update_archived`;
DELIMITER //
CREATE TRIGGER `challan_update_archived` BEFORE UPDATE ON `challan`
 FOR EACH ROW IF OLD.challan_date_submitted IS NOT NULL
AND OLD.challan_amount_submitted IS NOT NULL
AND OLD.challan_bank_submitted IS NOT NULL THEN     

INSERT INTO challan_submit_archive
select id,OLD.challan_date_submitted,OLD.challan_amount_submitted,OLD.challan_bank_submitted
from challan where id=NEW.id;

END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `challan_submit_archive`
--

CREATE TABLE IF NOT EXISTS `challan_submit_archive` (
  `challan_id` int(11) NOT NULL,
  `challan_date_submitted` date DEFAULT NULL,
  `challan_amount_submitted` decimal(13,2) DEFAULT NULL,
  `challan_bank_submitted` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challan_submit_archive`
--

INSERT INTO `challan_submit_archive` (`challan_id`, `challan_date_submitted`, `challan_amount_submitted`, `challan_bank_submitted`) VALUES
(1, '2018-05-14', '2000.00', 'ubl bank'),
(1, '2018-05-14', '1000.00', 'ubl bank');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
