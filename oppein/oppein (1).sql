-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 08:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oppein`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_acheive`
--

CREATE TABLE `ci_acheive` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acheive_amount` varchar(255) NOT NULL,
  `acheive_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin`
--

CREATE TABLE `ci_admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin`
--

INSERT INTO `ci_admin` (`id`, `Name`, `email`, `username`, `password`, `status`, `created_date`) VALUES
(1, 'Sufian Rizvi', 'sufian.rizvi@gmail.com', 'admin', '42OhuZzdV0ziY', 1, '2018-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `ci_admin_authentication`
--

CREATE TABLE `ci_admin_authentication` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_admin_authentication`
--

INSERT INTO `ci_admin_authentication` (`id`, `user_id`, `token`, `expired_at`, `updated_date`, `created_date`) VALUES
(1, 1, '$1$8Z4.v0/.$J2XxhrPlX5gvSdM9Swfpr0', '2018-05-31 10:40:36', '2018-05-31 10:20:36', '2018-05-31 10:20:35'),
(4, 1, '$1$K.3.Lq5.$t3OttzQsir5RgPAZpFezu0', '2018-05-31 10:43:24', '2018-05-31 10:23:24', '2018-05-31 10:23:24'),
(6, 1, '$1$xI0.m20.$SmZUkvWkj6p7jbYj1.oEF0', '2018-05-31 11:31:08', '2018-05-31 11:11:08', '2018-05-31 11:10:46'),
(7, 1, '$1$u1/.fO/.$wDOqx/coob.sImmT01zxR0', '2018-05-31 11:36:16', '2018-05-31 11:16:16', '2018-05-31 11:13:28'),
(9, 1, '$1$/y1.aU..$Obcz.cSuD.k4pgC90oGUA0', '2018-05-31 13:33:19', '2018-05-31 13:13:19', '2018-05-31 12:23:26'),
(10, 1, '$1$492.585.$nh5z2mtW7Q3HubpcQxHnU.', '2018-05-31 13:58:36', '2018-05-31 13:38:36', '2018-05-31 13:33:48'),
(11, 1, '$1$VE2.4/2.$SqjU4nstT/4JbA8azjsa/0', '2018-06-01 08:32:53', '2018-06-01 08:12:53', '2018-06-01 08:07:39'),
(12, 1, '$1$TW3.gr3.$XmVQ4H2jsPgOshERcVpvR.', '2018-06-01 08:33:44', '2018-06-01 08:13:44', '2018-06-01 08:13:40'),
(13, 1, '$1$yy/.TU/.$vRxtcWomNaqaTyMajRXVG.', '2018-06-01 10:18:54', '2018-06-01 09:58:54', '2018-06-01 08:15:08'),
(14, 1, '$1$j22.wA2.$zhDorXC/HiS.YRFhSCc2v0', '2018-06-01 12:29:36', '2018-06-01 12:09:36', '2018-06-01 12:09:35'),
(15, 1, '$1$y70.TD2.$GEd3w3OgrNGcF.fBKxpFi1', '2018-06-02 11:32:44', '2018-06-02 11:12:44', '2018-06-02 10:58:04'),
(16, 1, '$1$Oh1.944.$vEe7tXNKsLdZBHThtOBeX.', '2018-06-04 10:59:57', '2018-06-04 10:39:57', '2018-06-04 10:31:52'),
(17, 1, '$1$sv4.Fz5.$1V2KMxjB6y0fFScq6669Y.', '2018-06-04 13:03:51', '2018-06-04 12:43:51', '2018-06-04 12:21:56'),
(18, 1, '$1$Dx2.QP..$BeKvRKmOE/QT5ygvpT7i.1', '2018-06-05 09:33:33', '2018-06-05 09:13:33', '2018-06-05 09:13:33'),
(19, 1, '$1$Xj3.Ub5.$K5wcGkzEHtTrrfh3xQo5J1', '2018-06-06 08:40:44', '2018-06-06 08:20:44', '2018-06-06 08:08:15'),
(20, 1, '$1$zA3.AE3.$ooA.6t7nBDymPgIpZKxsZ1', '2018-06-06 09:24:13', '2018-06-06 09:04:13', '2018-06-06 08:42:39'),
(25, 1, '$1$Ly4.2K1.$MCZIubaoSTb1kfHyQs3XI1', '2018-06-06 12:41:54', '2018-06-06 12:21:54', '2018-06-06 12:21:49'),
(26, 1, '$1$Ov1.9w3.$OhZNSpJ5SwKKKIacZ6PVw.', '2018-06-06 13:47:39', '2018-06-06 13:27:39', '2018-06-06 13:20:48'),
(27, 1, '$1$6o0.Vm2.$MYt.XsFEPWlPkZAqCMMpz1', '2018-06-06 13:51:43', '2018-06-06 13:31:43', '2018-06-06 13:30:51'),
(29, 1, '$1$if4.Di1.$AfMCObvWzdMZaNLjFp6Yb/', '2018-06-07 09:25:06', '2018-06-07 09:05:06', '2018-06-07 08:42:31'),
(30, 1, '$1$TF0.gu/.$8fNfITr7f3GX0uvUFFvt6/', '2018-06-07 09:45:31', '2018-06-07 09:25:31', '2018-06-07 09:25:26'),
(31, 1, '$1$GA1.Xf4.$DPSN0R5caTWndzSHEOT4T/', '2018-06-07 11:33:53', '2018-06-07 11:13:53', '2018-06-07 10:31:14'),
(32, 1, '$1$QM5.Z6..$4A3jfU6RDg/x8dZedByOf/', '2018-06-07 14:41:06', '2018-06-07 14:21:06', '2018-06-07 13:40:55'),
(33, 1, '$1$W63.nG..$zGyhn7bVVikzTqpd0BdKJ.', '2018-06-08 10:06:59', '2018-06-08 09:46:59', '2018-06-08 08:17:27'),
(34, 1, '$1$/d3.aj4.$QA9AVha2bR9PBxOIWJtOt1', '2018-06-08 10:39:58', '2018-06-08 10:19:58', '2018-06-08 10:14:40'),
(35, 1, '$1$ID1.xZ3.$PRM8Yvwk7EvPVNrCxwvq00', '2018-06-08 11:36:16', '2018-06-08 11:16:16', '2018-06-08 11:16:13'),
(37, 1, '$1$BH4.04/.$V7l9iK0xr7Z.tovCU68o8/', '2018-06-08 14:42:26', '2018-06-08 14:22:26', '2018-06-08 12:41:19'),
(38, 1, '$1$lT5.Kz0.$Otbv6TsaEUpq9mcBx7sEE1', '2018-06-08 20:33:18', '2018-06-08 20:13:18', '2018-06-08 20:10:30'),
(39, 1, '$1$6J5.Vz..$11lAbHli9hWj3Eh0/iBBY0', '2018-06-09 11:26:56', '2018-06-09 11:06:56', '2018-06-09 10:58:36'),
(40, 1, '$1$5D5.or/.$xhgX.Mqn9SD.5YxEjA4i8.', '2018-06-09 13:13:30', '2018-06-09 12:53:30', '2018-06-09 11:52:11'),
(41, 1, '$1$TT4.gk3.$H/wpmklYH6yF74QUEl.1g0', '2018-06-10 15:21:41', '2018-06-10 15:01:41', '2018-06-10 14:24:59'),
(42, 1, '$1$ta5.y54.$jpC0/yc..vI76NF4Dsni00', '2018-06-10 15:50:14', '2018-06-10 15:30:14', '2018-06-10 15:26:41'),
(44, 1, '$1$J73.eF0.$0rAeKUXFWZZ8fTQOp7hQn/', '2018-06-10 20:40:21', '2018-06-10 20:20:21', '2018-06-10 20:19:52'),
(45, 1, '$1$qF3.rd/.$hMh/bkUgTm1c0.dn0/IUb0', '2018-06-11 09:57:45', '2018-06-11 09:37:45', '2018-06-11 09:37:21'),
(46, 1, '$1$t55.yI/.$efM77oAWnnfgZMDmRfXdN/', '2018-06-11 11:30:45', '2018-06-11 11:10:45', '2018-06-11 11:09:10'),
(47, 1, '$1$8I2.v30.$5czawf.MrNTfVM5Z6YPyX.', '2018-06-11 11:52:40', '2018-06-11 11:32:40', '2018-06-11 11:32:31'),
(48, 1, '$1$Ud..Ng3.$z4S8R.lx5SHQ1G9rgOLfh.', '2018-06-12 11:11:19', '2018-06-12 10:51:19', '2018-06-12 10:48:17'),
(49, 1, '$1$eD3.PP1.$0./59tYTPbBO30Gj96Ass1', '2018-06-12 14:05:03', '2018-06-12 13:45:03', '2018-06-12 13:00:21'),
(50, 1, '$1$It1.x53.$JPlx60l/qnTcMIELS.REY0', '2018-06-13 09:20:40', '2018-06-13 09:00:40', '2018-06-13 08:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `ci_assign`
--

CREATE TABLE `ci_assign` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `assign_ro` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_assign`
--

INSERT INTO `ci_assign` (`id`, `lead_id`, `assign_ro`, `created_by`, `created_date`, `is_read`) VALUES
(1, 6, 2, 1, '2018-06-05 14:05:42', 1),
(2, 5, 2, 1, '2018-06-06 08:09:16', 0),
(3, 4, 3, 1, '2018-06-06 08:52:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_customer`
--

CREATE TABLE `ci_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `designation_id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_customer`
--

INSERT INTO `ci_customer` (`id`, `name`, `phone`, `created_date`, `designation_id`, `title`, `address`) VALUES
(1, 'Ali Imran', '03020202', '2018-06-04', 1, 1, 'tench bhatta Rawalpindi\r\ntench bhatta Rawalpindi'),
(2, 'Waqar Nasim', '3030030', '2018-06-05', 1, 1, 'tench bhatta Rawalpindi\r\ntench bhatta Rawalpindi'),
(3, 'Amir Khan', '003303003030', '2018-06-05', 2, 3, 'F9 Islamabad'),
(4, 'Kamal Khan', '30202030', '2018-06-05', 3, 1, 'E11 Islamabad'),
(5, 'Akhtar Ali', '203030330', '2018-06-05', 4, 3, 'G11 Islamabad'),
(6, 'Salman Ali', '394949494', '2018-06-05', 4, 5, 'tench bhatta Rawalpindi\r\ntench bhatta Rawalpindi'),
(7, 'Aqib Hussain', '03030', '2018-06-12', 1, 1, 'tench bhatta Rawalpindi\r\ntench bhatta Rawalpindi');

-- --------------------------------------------------------

--
-- Table structure for table `ci_customer_images`
--

CREATE TABLE `ci_customer_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_customer_images`
--

INSERT INTO `ci_customer_images` (`id`, `image`, `customer_id`, `created_date`) VALUES
(1, '5c82a309d215361c4da8d7994a9748a6.jpg', 1, '2018-06-04'),
(2, 'e73a03fcf936314ce41734885ecb4df0.jpg', 2, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `ci_customer_leads`
--

CREATE TABLE `ci_customer_leads` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `lead_site_address` varchar(255) NOT NULL,
  `stage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_customer_leads`
--

INSERT INTO `ci_customer_leads` (`id`, `customer_id`, `user_id`, `priority`, `created_date`, `updated_date`, `lead_site_address`, `stage_id`) VALUES
(1, 1, 1, 1, '2018-06-04 12:20:44', '2018-06-04 12:20:44', '', 1),
(2, 2, 1, 2, '2018-06-05 10:19:52', '2018-06-05 10:19:52', '', 2),
(3, 3, 1, 3, '2018-06-05 10:22:08', '2018-06-05 10:22:08', '', 3),
(4, 4, 1, 3, '2018-06-05 10:28:14', '2018-06-05 10:28:14', '', 11),
(5, 5, 1, 4, '2018-06-05 10:30:46', '2018-06-05 10:30:46', '', 10),
(6, 6, 1, 3, '2018-06-05 10:31:39', '2018-06-05 10:31:39', '', 13),
(7, 7, 6, 1, '2018-06-12 13:17:44', '2018-06-12 13:17:44', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ci_designation`
--

CREATE TABLE `ci_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_designation`
--

INSERT INTO `ci_designation` (`id`, `name`, `created_date`) VALUES
(1, 'Owner', '2018-05-25'),
(2, 'Contractor', '2018-05-25'),
(3, 'Builder', '2018-05-25'),
(4, 'Architect', '2018-05-25'),
(5, 'site staff', '2018-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `ci_roles`
--

CREATE TABLE `ci_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_roles`
--

INSERT INTO `ci_roles` (`id`, `role_name`, `created_date`) VALUES
(1, 'BDM', '2018-05-22'),
(2, 'RO', '2018-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `ci_stage`
--

CREATE TABLE `ci_stage` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `stage_name_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `result` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_stage`
--

INSERT INTO `ci_stage` (`id`, `lead_id`, `assign_id`, `stage_name_id`, `created_date`, `end_date`, `result`) VALUES
(1, 1, 0, 1, '2018-06-04 12:20:44', '0000-00-00 00:00:00', 1),
(2, 2, 0, 1, '2018-06-05 10:19:52', '0000-00-00 00:00:00', 1),
(3, 3, 0, 1, '2018-06-05 10:22:08', '0000-00-00 00:00:00', 1),
(4, 4, 0, 1, '2018-06-05 10:28:14', '2018-06-06 08:52:59', 1),
(5, 5, 0, 1, '2018-06-05 10:30:46', '2018-06-06 08:09:16', 1),
(6, 6, 0, 1, '2018-06-05 10:31:39', '2018-06-05 14:05:42', 1),
(9, 6, 1, 2, '2018-06-05 14:05:42', '2018-06-13 11:17:36', 1),
(10, 5, 2, 2, '2018-06-06 08:09:16', '0000-00-00 00:00:00', 1),
(11, 4, 3, 2, '2018-06-06 08:52:59', '0000-00-00 00:00:00', 1),
(12, 7, 0, 1, '2018-06-12 13:17:44', '0000-00-00 00:00:00', 1),
(13, 6, 1, 3, '2018-06-13 11:17:36', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_stage_name`
--

CREATE TABLE `ci_stage_name` (
  `id` int(11) NOT NULL,
  `stage_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_stage_name`
--

INSERT INTO `ci_stage_name` (`id`, `stage_name`) VALUES
(1, 'Registered'),
(2, 'Unchecked'),
(3, 'Visit'),
(4, 'Work in progress'),
(5, 'Review'),
(6, 'Presentation'),
(7, 'Success'),
(8, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `ci_target`
--

CREATE TABLE `ci_target` (
  `id` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_assign` varchar(255) NOT NULL,
  `target_achieve` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_target`
--

INSERT INTO `ci_target` (`id`, `user_id`, `target_assign`, `target_achieve`) VALUES
(1, 2, '2.0', ''),
(2, 3, '', ''),
(3, 4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `Name`, `email`, `username`, `password`, `role`, `status`, `created_date`) VALUES
(1, 'Sufian Rizvi', 'sufian.rizvi@gmail.com', 'sufiandev', '42OhuZzdV0ziY', 1, 1, '2018-05-22'),
(2, 'Amir Imran', 'amir@gmail.com', 'amir201', 'e1y.tuEXKZRRE', 2, 1, '2018-05-22'),
(3, 'Basit saleem', 'basitsaleem60@gmail.com', 'basit201', '42OhuZzdV0ziY', 2, 1, '2018-06-04'),
(4, 'Ali Imran', 'ali@gmail.com', 'ali201', '42OhuZzdV0ziY', 2, 1, '2018-06-04'),
(5, 'Ahmed Ali', 'ahmed@gmail.com', 'ahmed201', '42OhuZzdV0ziY', 1, 1, '2018-06-07'),
(6, 'Zamman Ali', 'zma@gmail.com', 'zma201', '42OhuZzdV0ziY', 1, 1, '2018-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users_authentication`
--

CREATE TABLE `ci_users_authentication` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_users_authentication`
--

INSERT INTO `ci_users_authentication` (`id`, `user_id`, `token`, `expired_at`, `updated_date`, `created_date`) VALUES
(1, 1, '$1$8b5.vQ/.$wI//A6Jx4pAMBrZRj5Dfs0', '2018-06-01 12:34:00', '2018-06-01 12:14:00', '2018-06-01 12:13:49'),
(2, 1, '$1$Gf/.XS/.$B8A4EYJY9tPb3.l8a6x1k.', '2018-06-01 13:47:53', '2018-06-01 13:27:53', '2018-06-01 13:27:53'),
(3, 1, '$1$vn0.M23.$f2FMInCJYls5IUZ8eXjam1', '2018-06-02 09:55:32', '2018-06-02 09:35:32', '2018-06-02 09:35:27'),
(4, 1, '$1$EJ/.7B0.$yXPJX21fUykkN4wnTL2eS0', '2018-06-02 13:42:17', '2018-06-02 13:22:17', '2018-06-02 12:56:07'),
(5, 1, '$1$CV4.jp3.$38zVoKSvR4f6sVtbW7GW81', '2018-06-04 09:03:42', '2018-06-04 08:43:42', '2018-06-04 08:40:53'),
(7, 1, '$1$JU/.eQ3.$tfMJgQmMnSJxhpsFQxPKN/', '2018-06-04 12:16:43', '2018-06-04 11:56:43', '2018-06-04 11:56:43'),
(8, 1, '$1$Lb3.295.$7sywUuS5hnQrAhwb5FINV1', '2018-06-05 10:51:40', '2018-06-05 10:31:40', '2018-06-05 10:18:47'),
(11, 2, '$1$EX4.711.$f.FOwZv8OdzaBJUBg68Kb0', '2018-06-06 11:07:13', '2018-06-06 10:47:13', '2018-06-06 10:43:33'),
(14, 1, '$1$Eg/.7M/.$8fEe9XaX3V/wVU1ePXbob/', '2018-06-06 12:43:43', '2018-06-06 12:23:43', '2018-06-06 12:23:39'),
(19, 2, '$1$oG/.RX3.$SvdGNJHWt8x/ogST2R8cF/', '2018-06-07 14:08:52', '2018-06-07 13:48:52', '2018-06-07 13:10:35'),
(23, 6, '$1$FF3.qG2.$DMigsd6aioYugni9kPmuP1', '2018-06-12 13:37:45', '2018-06-12 13:17:45', '2018-06-12 13:16:40'),
(24, 2, '$1$bk..Iv1.$xIOzv3ZyTuygeTw8UZAH10', '2018-06-13 10:31:03', '2018-06-13 10:11:03', '2018-06-13 09:44:16'),
(25, 2, '$1$KL5.L//.$/4xh7iRc1lcd8wygMf9T/1', '2018-06-13 11:38:56', '2018-06-13 11:18:56', '2018-06-13 11:17:27'),
(26, 2, '$1$eh4.PV1.$u38SKLO8M.npDoN5xUckN.', '2018-06-13 12:29:32', '2018-06-13 12:09:32', '2018-06-13 12:09:20'),
(27, 2, '$1$rw5.Ym/.$VHS335pTW1fHSkCjDq0rS0', '2018-06-13 13:06:51', '2018-06-13 12:46:51', '2018-06-13 12:36:00'),
(28, 2, '$1$t1/.yU2.$D4iPwCEG1kkvyp8y3HzXZ/', '2018-06-13 13:34:12', '2018-06-13 13:14:12', '2018-06-13 13:14:01'),
(29, 2, '$1$v85.MD..$9FB5nQr9dOzDXyPeqSPno0', '2018-06-13 13:35:21', '2018-06-13 13:15:21', '2018-06-13 13:15:17'),
(30, 2, '$1$2C2.hR0.$PDQta.JJQZgUbpM9HFdTD.', '2018-06-13 14:17:04', '2018-06-13 13:57:04', '2018-06-13 13:15:46'),
(31, 2, '$1$ah3.bu0.$yG17s1YrvRSIrUPXoUTMc.', '2018-06-14 08:48:29', '2018-06-14 08:28:29', '2018-06-14 08:24:54'),
(32, 2, '$1$f03.6A0.$pMUUkHqvhufJJD/Img.ko0', '2018-06-14 09:59:23', '2018-06-14 09:39:23', '2018-06-14 09:07:40'),
(33, 2, '$1$.I4.t21.$CaFaFTT.rErFCQHmpfwY9/', '2018-06-14 10:43:02', '2018-06-14 10:23:02', '2018-06-14 10:07:11'),
(34, 2, '$1$M72.ly1.$zwKQdV47s85NwKvOQPB/a/', '2018-06-14 12:23:39', '2018-06-14 12:03:39', '2018-06-14 11:41:22'),
(35, 2, '$1$kF3.dD2.$5BpDfxYGqbkta0qb.yg5R0', '2018-06-14 14:10:26', '2018-06-14 13:50:26', '2018-06-14 13:21:22'),
(36, 2, '$1$Ir5.xh3.$yLHlBrlXILojhhrBqKepv0', '2018-06-19 09:07:15', '2018-06-19 08:47:15', '2018-06-19 08:15:51'),
(37, 2, '$1$941.c70.$rBFC51XQW3bh/UgQYaFv./', '2018-06-19 10:47:24', '2018-06-19 10:27:24', '2018-06-19 09:29:57'),
(38, 2, '$1$fG..6Q2.$2avupj0FjYuCSGS0f4Mfn0', '2018-06-19 14:00:18', '2018-06-19 13:40:18', '2018-06-19 13:05:45'),
(39, 2, '$1$XW4.US4.$r6dz.UscJin.4Ygf5nkj./', '2018-06-20 08:21:42', '2018-06-20 08:01:42', '2018-06-20 08:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users_log`
--

CREATE TABLE `ci_users_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` time NOT NULL,
  `login_date` date NOT NULL,
  `logout_time` time NOT NULL,
  `logout_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_users_log`
--

INSERT INTO `ci_users_log` (`id`, `user_id`, `login_time`, `login_date`, `logout_time`, `logout_date`, `status`) VALUES
(1, 2, '12:57:45', '2018-06-07', '01:04:59', '2018-06-07', 1),
(2, 2, '01:08:08', '2018-06-07', '04:10:08', '2018-06-07', 1),
(3, 2, '04:10:35', '2018-06-07', '00:00:00', '0000-00-00', 2),
(4, 2, '05:28:35', '2018-06-10', '05:28:40', '2018-06-10', 1),
(5, 2, '10:57:17', '2018-06-10', '11:01:07', '2018-06-10', 1),
(6, 2, '12:44:16', '2018-06-13', '02:17:00', '2018-06-13', 2),
(7, 2, '02:17:28', '2018-06-13', '03:09:06', '2018-06-13', 2),
(8, 2, '03:09:20', '2018-06-13', '03:35:21', '2018-06-13', 2),
(9, 2, '03:36:01', '2018-06-13', '04:13:44', '2018-06-13', 2),
(10, 2, '04:14:01', '2018-06-13', '00:00:00', '0000-00-00', 0),
(11, 2, '04:15:17', '2018-06-13', '00:00:00', '0000-00-00', 0),
(12, 2, '04:15:47', '2018-06-13', '00:00:00', '0000-00-00', 0),
(13, 2, '11:24:54', '2018-06-14', '12:07:19', '2018-06-14', 2),
(14, 2, '12:07:41', '2018-06-14', '01:07:00', '2018-06-14', 2),
(15, 2, '01:07:11', '2018-06-14', '02:36:52', '2018-06-14', 2),
(16, 2, '02:41:22', '2018-06-14', '04:21:06', '2018-06-14', 2),
(17, 2, '04:21:22', '2018-06-14', '00:00:00', '0000-00-00', 0),
(18, 2, '11:15:51', '2018-06-19', '12:29:42', '2018-06-19', 2),
(19, 2, '12:29:58', '2018-06-19', '02:05:03', '2018-06-19', 2),
(20, 2, '04:05:46', '2018-06-19', '00:00:00', '0000-00-00', 0),
(21, 2, '11:01:02', '2018-06-20', '00:00:00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_event_logs`
--

CREATE TABLE `ci_user_event_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_acheive`
--
ALTER TABLE `ci_acheive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_admin`
--
ALTER TABLE `ci_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_admin_authentication`
--
ALTER TABLE `ci_admin_authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_assign`
--
ALTER TABLE `ci_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_customer`
--
ALTER TABLE `ci_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_customer_images`
--
ALTER TABLE `ci_customer_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_customer_leads`
--
ALTER TABLE `ci_customer_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_designation`
--
ALTER TABLE `ci_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_roles`
--
ALTER TABLE `ci_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_stage`
--
ALTER TABLE `ci_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_stage_name`
--
ALTER TABLE `ci_stage_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_target`
--
ALTER TABLE `ci_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users_authentication`
--
ALTER TABLE `ci_users_authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_users_log`
--
ALTER TABLE `ci_users_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_user_event_logs`
--
ALTER TABLE `ci_user_event_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_acheive`
--
ALTER TABLE `ci_acheive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ci_admin`
--
ALTER TABLE `ci_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_admin_authentication`
--
ALTER TABLE `ci_admin_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ci_assign`
--
ALTER TABLE `ci_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_customer`
--
ALTER TABLE `ci_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ci_customer_images`
--
ALTER TABLE `ci_customer_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_customer_leads`
--
ALTER TABLE `ci_customer_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ci_designation`
--
ALTER TABLE `ci_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ci_roles`
--
ALTER TABLE `ci_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ci_stage`
--
ALTER TABLE `ci_stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ci_stage_name`
--
ALTER TABLE `ci_stage_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ci_target`
--
ALTER TABLE `ci_target`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ci_users_authentication`
--
ALTER TABLE `ci_users_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ci_users_log`
--
ALTER TABLE `ci_users_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ci_user_event_logs`
--
ALTER TABLE `ci_user_event_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
