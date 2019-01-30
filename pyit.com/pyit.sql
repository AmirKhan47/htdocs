-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 12:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyit`
--

-- --------------------------------------------------------

--
-- Table structure for table `pyit_files`
--

CREATE TABLE `pyit_files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_category` varchar(80) NOT NULL,
  `file_description` text,
  `file_attachment` varchar(255) DEFAULT NULL,
  `file_created_by` varchar(20) DEFAULT NULL,
  `file_status` int(1) NOT NULL DEFAULT '1',
  `file_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pyit_files`
--

INSERT INTO `pyit_files` (`file_id`, `file_name`, `file_category`, `file_description`, `file_attachment`, `file_created_by`, `file_status`, `file_created_at`, `file_updated_at`) VALUES
(1, 'Privacy Policy', 'Confidential ', 'Privacy policy of our company', 'Advt__No_9-2018_1.pdf', NULL, 0, '2019-01-14 17:40:55', '0000-00-00 00:00:00'),
(2, 'Privacy Policy', 'Confidential ', 'Privacy policy of our company', '11985.pdf', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Privacy Policy', 'Confidential ', 'Privacy policy of our company', 'Advt__No_9-2018_11.pdf', 'Haseeb', 0, '2019-01-14 17:52:49', '2019-01-18 07:09:07'),
(4, 'Privacy Policy', 'Confidential ', 'Privacy policy of our company', '119851.pdf', 'Haseeb', 1, '2019-01-14 17:54:23', '0000-00-00 00:00:00'),
(5, 'ABC', 'xyz', 'important', 'aswec.pdf', 'Haseeb', 0, '2019-01-14 17:57:14', '2019-01-17 11:23:43'),
(6, 'XYZ', 'Confidential ', 'Privacy policy of our company', 'CS101x_S030_Internet_Technologies_IIT_Bombay.pdf', 'Ijlal', 0, '2019-01-14 20:56:26', '2019-01-17 11:24:05'),
(7, 'Secuity Policy', 'Confidential', 'Some confidential data', 'aswec1.pdf', 'Haseeb', 0, '2019-01-17 11:49:44', '2019-01-17 11:50:38'),
(8, 'Secuity Policy', 'Confidential', 'Some confidential data', 'aswec2.pdf', 'Ijlal', 0, '2019-01-18 07:08:39', '2019-01-18 07:08:48'),
(9, 'Secuity Policy', 'Confidential', 'Some confidential data', 'aswec3.pdf', 'Ijlal', 1, '2019-01-18 07:09:02', '0000-00-00 00:00:00'),
(10, 'sample', 'test', 'this is a test pdf file', 'sample.pdf', 'basit', 1, '2019-01-23 05:29:47', '0000-00-00 00:00:00'),
(11, 'word sample ', 'word file', 'this is test word file', 'wd-spectools-word-sample-04.doc', 'basit', 1, '2019-01-23 05:31:05', '0000-00-00 00:00:00'),
(12, 'jpg sample ', 'jpg formate', 'this is sampel jpg formate ', 'download.jpg', 'basit', 1, '2019-01-23 05:33:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pyit_news`
--

CREATE TABLE `pyit_news` (
  `news_id` int(11) NOT NULL,
  `news_headline` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_status` int(1) NOT NULL DEFAULT '1',
  `news_created_by` varchar(20) NOT NULL,
  `news_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pyit_news`
--

INSERT INTO `pyit_news` (`news_id`, `news_headline`, `news_description`, `news_status`, `news_created_by`, `news_created_at`, `news_updated_at`) VALUES
(1, 'Currency Changed', 'News Description is updated!<br>', 0, 'Haseeb', '2019-01-23 10:16:14', '0000-00-00 00:00:00'),
(2, 'Some Headline Here', 'News Description goes here and is now updated!<br>', 0, 'Haseeb', '2019-01-18 07:05:41', '0000-00-00 00:00:00'),
(3, 'Test', '<b>News Description </b>is <i>italic </i>now. <u>this is underlined</u><br><br><br><br>', 0, 'Haseeb', '2019-01-17 12:14:58', '0000-00-00 00:00:00'),
(4, 'Fault in Google Search engine', '<p><u>Fault </u>in <b>google </b>Search <i>engine </i>about <small>currency </small><br></p>', 0, 'Ijlal', '2019-01-17 19:43:15', '0000-00-00 00:00:00'),
(5, 'Error in Google Search Engine', '<p>An <i>error </i>was just found about the currency rates in the <b>google </b><small>search </small><u>engine</u><br></p>', 1, 'Ijlal', '2019-01-17 19:45:05', '0000-00-00 00:00:00'),
(6, 'Test Headline', '<p>This is some dummy text and is <b>edited</b>!<br></p><br>', 1, 'Ijlal', '2019-01-22 05:58:29', '0000-00-00 00:00:00'),
(7, 'Dummy Headline', '<p>lorem ipsum dolor<br></p>', 1, 'Ijlal', '2019-01-22 05:58:51', '0000-00-00 00:00:00'),
(8, 'How to Write a Newspaper', '<h4><u></u>This is a dummy content we are test the content of the website.</h4>', 1, 'basit', '2019-01-23 05:41:38', '0000-00-00 00:00:00'),
(9, 'New test news', '<p>\r\n\r\n</p><div>... annotation is challenging for several reasons. Most news articles refer to multiple events. Moreover, sentences that refer to the same event are usually scattered through the article with no simple sequential pattern. Fig. 1 shows a sample article that demonstrates these ...</div><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.researchgate.net/publication/221397442_Clustering_Sentences_for_Discovering_Events_in_News_Articles\">View</a>\r\n\r\n<br><p></p>', 1, 'ghasif', '2019-01-23 05:51:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pyit_slider_images`
--

CREATE TABLE `pyit_slider_images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `image_created_by` varchar(20) DEFAULT NULL,
  `image_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pyit_slider_images`
--

INSERT INTO `pyit_slider_images` (`image_id`, `image_name`, `image_created_by`, `image_created_at`, `image_updated_at`) VALUES
(1, 'img-slide-311.jpg', 'Ijlal', '2019-01-16 11:38:37', '2019-01-16 12:19:22'),
(2, 'img-slide-1111.jpg', 'Ijlal', '2019-01-16 11:40:35', '2019-01-18 07:15:34'),
(3, 'pexels-photo-1188532.jpeg', 'Ijlal', '2019-01-16 11:40:42', '2019-01-17 19:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `pyit_users`
--

CREATE TABLE `pyit_users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(15) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_full_name` varchar(30) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_created_by` varchar(15) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pyit_users`
--

INSERT INTO `pyit_users` (`user_id`, `user_username`, `user_password`, `user_full_name`, `user_email`, `user_role`, `user_status`, `user_created_by`, `user_created_at`, `user_updated_at`) VALUES
(1, 'Haseeb', 'abcdef', 'Haseeb Badnaam', 'haseeb@pgstudio.com', 'Editor', 1, 'System', '2019-01-11 21:19:50', '2019-01-17 11:10:57'),
(2, 'Ijlal', 'abcdef', 'Muhammad Ijlal Nasir', 'ijlal@ijlal.info', 'Editor', 1, 'Haseeb', '2019-01-14 20:27:59', '2019-01-22 05:56:17'),
(3, 'Ali', 'abcdef', NULL, NULL, 'Editor', 1, 'Haseeb', '2019-01-14 20:49:30', '2019-01-23 10:17:04'),
(4, 'Aqib', 'abcdef', NULL, NULL, 'Editor', 0, 'Ijlal', '2019-01-14 20:58:00', '2019-01-23 10:16:57'),
(5, 'Faraz', 'abcdef', NULL, 'faraz@mail.com', 'Editor', 1, 'Ijlal', '2019-01-17 20:01:13', '2019-01-17 20:10:21'),
(6, 'Wasil', 'abcdef', NULL, 'wasil@mail.com', 'Editor', 1, 'Ijlal', '2019-01-17 20:35:40', '2019-01-17 21:02:31'),
(7, 'Basit', '123123', NULL, 'basit_sal@hotmail.com', 'Editor', 1, 'ijlal', '2019-01-22 15:11:18', '0000-00-00 00:00:00'),
(8, 'Ghasif', '123123', NULL, 'ghasif_sheikh13@outlook.com', 'Editor', 1, 'basit', '2019-01-23 05:43:21', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pyit_files`
--
ALTER TABLE `pyit_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `pyit_news`
--
ALTER TABLE `pyit_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `pyit_slider_images`
--
ALTER TABLE `pyit_slider_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `pyit_users`
--
ALTER TABLE `pyit_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pyit_files`
--
ALTER TABLE `pyit_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pyit_news`
--
ALTER TABLE `pyit_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pyit_slider_images`
--
ALTER TABLE `pyit_slider_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pyit_users`
--
ALTER TABLE `pyit_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
