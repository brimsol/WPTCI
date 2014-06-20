-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.15-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4750
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pagetest.test_history
CREATE TABLE IF NOT EXISTS `test_history` (
  `test_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `email_sent` varchar(500) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=incomplete,1=completed',
  `test_id` varchar(50) DEFAULT NULL,
  `test_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table pagetest.test_history: 86 rows
/*!40000 ALTER TABLE `test_history` DISABLE KEYS */;
INSERT INTO `test_history` (`test_history_id`, `user_id`, `url`, `email_sent`, `status`, `test_id`, `test_date`, `created_at`) VALUES
	(5, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 09:27:57', '2014-06-19 12:57:57'),
	(4, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 09:20:31', '2014-06-19 12:50:31'),
	(6, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 11:00:11', '2014-06-19 14:30:11'),
	(7, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 11:19:18', '2014-06-19 14:49:18'),
	(8, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 11:24:47', '2014-06-19 14:54:47'),
	(9, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 11:58:02', '2014-06-19 15:28:02'),
	(10, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:00:15', '2014-06-19 15:30:15'),
	(11, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:01:24', '2014-06-19 15:31:24'),
	(12, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:01:37', '2014-06-19 15:31:37'),
	(13, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:03:43', '2014-06-19 15:33:43'),
	(14, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:03:54', '2014-06-19 15:33:54'),
	(15, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:36:40', '2014-06-19 16:06:40'),
	(16, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:37:30', '2014-06-19 16:07:30'),
	(17, 1, 'http://pagetest.dev/index.php/analyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-19 12:37:44', '2014-06-19 16:07:44'),
	(18, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 06:22:24', '2014-06-20 09:52:24'),
	(19, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 06:25:09', '2014-06-20 09:55:09'),
	(20, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:23:17', '2014-06-20 10:53:17'),
	(21, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:25:22', '2014-06-20 10:55:22'),
	(22, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:26:03', '2014-06-20 10:56:03'),
	(23, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:26:56', '2014-06-20 10:56:56'),
	(24, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:31:48', '2014-06-20 11:01:48'),
	(25, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:38:04', '2014-06-20 11:08:04'),
	(26, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:38:59', '2014-06-20 11:08:59'),
	(27, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:41:20', '2014-06-20 11:11:20'),
	(28, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:42:02', '2014-06-20 11:12:02'),
	(29, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:42:55', '2014-06-20 11:12:55'),
	(30, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:43:22', '2014-06-20 11:13:22'),
	(31, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:51:28', '2014-06-20 11:21:28'),
	(32, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:51:48', '2014-06-20 11:21:48'),
	(33, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:53:09', '2014-06-20 11:23:09'),
	(34, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:53:34', '2014-06-20 11:23:34'),
	(35, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:54:01', '2014-06-20 11:24:01'),
	(36, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 07:54:14', '2014-06-20 11:24:14'),
	(37, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:00:10', '2014-06-20 11:30:10'),
	(38, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:02:57', '2014-06-20 11:32:57'),
	(39, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:03:01', '2014-06-20 11:33:01'),
	(40, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:03:23', '2014-06-20 11:33:23'),
	(41, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:03:39', '2014-06-20 11:33:39'),
	(42, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:06:10', '2014-06-20 11:36:10'),
	(43, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:06:34', '2014-06-20 11:36:34'),
	(44, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:14:43', '2014-06-20 11:44:43'),
	(45, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:17:08', '2014-06-20 11:47:08'),
	(46, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:25:08', '2014-06-20 11:55:08'),
	(47, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:25:40', '2014-06-20 11:55:40'),
	(48, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:29:22', '2014-06-20 11:59:22'),
	(49, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:31:37', '2014-06-20 12:01:37'),
	(50, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:35:36', '2014-06-20 12:05:36'),
	(51, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:36:10', '2014-06-20 12:06:10'),
	(52, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:36:22', '2014-06-20 12:06:22'),
	(53, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:38:24', '2014-06-20 12:08:24'),
	(54, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:43:20', '2014-06-20 12:13:20'),
	(55, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 08:47:16', '2014-06-20 12:17:16'),
	(56, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 08:53:25', '2014-06-20 12:23:25'),
	(57, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 08:54:53', '2014-06-20 12:24:53'),
	(58, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 08:57:55', '2014-06-20 12:27:55'),
	(59, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 08:58:49', '2014-06-20 12:28:49'),
	(60, 1, 'http%3A%2F%2Fsdfsdfsdf.com', 'araruu@yopmail.com', 0, NULL, '2014-06-20 09:06:34', '2014-06-20 12:36:34'),
	(61, 1, 'http%3A%2F%2Fgoogle.com', 'araruu@yopmail.com', 0, NULL, '2014-06-20 09:06:46', '2014-06-20 12:36:46'),
	(62, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:07:29', '2014-06-20 12:37:29'),
	(63, 1, 'http%3A%2F%2Fgoogle.com', 'araruu@yopmail.com', 0, NULL, '2014-06-20 09:08:45', '2014-06-20 12:38:45'),
	(64, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:09:37', '2014-06-20 12:39:37'),
	(65, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:11:06', '2014-06-20 12:41:06'),
	(66, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 09:11:40', '2014-06-20 12:41:40'),
	(67, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:12:02', '2014-06-20 12:42:02'),
	(68, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:12:29', '2014-06-20 12:42:29'),
	(69, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:12:33', '2014-06-20 12:42:33'),
	(70, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:12:56', '2014-06-20 12:42:56'),
	(71, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 09:16:56', '2014-06-20 12:46:56'),
	(72, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:22:15', '2014-06-20 13:52:15'),
	(73, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:25:04', '2014-06-20 13:55:04'),
	(74, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:25:18', '2014-06-20 13:55:18'),
	(75, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:25:28', '2014-06-20 13:55:28'),
	(76, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:25:29', '2014-06-20 13:55:29'),
	(77, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:27:50', '2014-06-20 13:57:50'),
	(78, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:28:04', '2014-06-20 13:58:04'),
	(79, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:28:19', '2014-06-20 13:58:19'),
	(80, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:28:30', '2014-06-20 13:58:30'),
	(81, 1, 'http%3A%2F%2Fgoogle.com', 'admin@digitalmediasync.com', 0, NULL, '2014-06-20 10:28:30', '2014-06-20 13:58:30'),
	(82, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:41:20', '2014-06-20 14:11:20'),
	(83, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:41:25', '2014-06-20 14:11:25'),
	(84, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:41:28', '2014-06-20 14:11:28'),
	(85, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:41:28', '2014-06-20 14:11:28'),
	(86, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:41:29', '2014-06-20 14:11:29'),
	(87, 1, 'http%3A%2F%2Fpagetest.dev%2Findex.php%2Fanalyzer', 'araruu@yopmail.com', 0, NULL, '2014-06-20 10:55:43', '2014-06-20 14:25:43'),
	(88, 1, 'http%3A%2F%2Fgoogle.com', 'araruu@yopmail.com', 0, NULL, '2014-06-20 11:04:10', '2014-06-20 14:34:10'),
	(89, 1, 'http%3A%2F%2Fgoogle.com', 'araruu@yopmail.com', 0, NULL, '2014-06-20 11:08:41', '2014-06-20 14:38:41');
/*!40000 ALTER TABLE `test_history` ENABLE KEYS */;


-- Dumping structure for table pagetest.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '2' COMMENT '1=admin, 2=customer',
  `password` varchar(500) NOT NULL,
  `full_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table pagetest.users: 4 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `user_type`, `password`, `full_name`, `email`, `points`, `created_at`, `deleted`) VALUES
	(1, 'admin', 1, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '', '', 27, '2014-06-11 16:26:36', 0),
	(2, 'cust', 2, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Customer', 'email@customer.com', 36, '2014-06-16 16:16:40', 0),
	(3, 'testt', 2, 'wHpUVGch', 'setset', '', 40, '2014-06-16 16:38:15', 0),
	(4, 'testtest', 2, '51abb9636078defbf888d8457a7c76f85c8f114c', 'setset', '', 10, '2014-06-19 17:26:26', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
