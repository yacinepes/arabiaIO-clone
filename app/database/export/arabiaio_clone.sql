-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2014 at 09:48 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arabiaio_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sumvotes` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `post_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_parent_id_index` (`parent_id`),
  KEY `comments_lft_index` (`lft`),
  KEY `comments_rgt_index` (`rgt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE IF NOT EXISTS `communities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `creator_id` int(10) unsigned NOT NULL,
  `createdbyuser` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `communities_slug_unique` (`slug`),
  UNIQUE KEY `communities_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`id`, `slug`, `name`, `description`, `creator_id`, `createdbyuser`, `created_at`, `updated_at`) VALUES
(1, 'webdev', 'تطوير الويب', 'مجتمع خاص بمناقشة وطرح المواضيع والقضايا العامة المتعلقة بتطوير الويب ولغاتها المختلفة', 1, 0, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(2, 'programming', 'برمجة عامة', 'بإمكانك طرح المواضيع والنقاشات المتعلقة بالبرمجة بشكل عام او لغات البرمجة التي لايوجد لها مجتمعات فرعية.', 1, 0, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(3, 'design', 'التصميم وقابلية الاستخدام', 'بإمكانك طرح المواضيع والنقاشات المتعلقة بالبرمجة بشكل عام او لغات البرمجة التي لايوجد لها مجتمعات فرعية.', 1, 0, '2014-03-23 16:13:55', '2014-03-23 16:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_02_23_133401_create_users_table', 1),
('2014_02_23_143305_create_communities_table', 1),
('2014_02_27_202847_create_posts_table', 1),
('2014_03_01_111852_create_comments_table', 1),
('2014_03_01_112814_create_votes_table', 1),
('2014_03_27_194031_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `event_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `properties` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sumvotes` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `community_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_community_id_foreign` (`community_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=100 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `content`, `link`, `sumvotes`, `user_id`, `community_id`, `created_at`, `updated_at`) VALUES
(1, 'موضوع-رقم-51', 'موضوع رقم 51', 'محتوى الموضوع رقم 51', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(2, 'موضوع-رقم-52', 'موضوع رقم 52', 'محتوى الموضوع رقم 52', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(3, 'موضوع-رقم-53', 'موضوع رقم 53', 'محتوى الموضوع رقم 53', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(4, 'موضوع-رقم-54', 'موضوع رقم 54', 'محتوى الموضوع رقم 54', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(5, 'موضوع-رقم-55', 'موضوع رقم 55', 'محتوى الموضوع رقم 55', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(6, 'موضوع-رقم-56', 'موضوع رقم 56', 'محتوى الموضوع رقم 56', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(7, 'موضوع-رقم-57', 'موضوع رقم 57', 'محتوى الموضوع رقم 57', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(8, 'موضوع-رقم-58', 'موضوع رقم 58', 'محتوى الموضوع رقم 58', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(9, 'موضوع-رقم-59', 'موضوع رقم 59', 'محتوى الموضوع رقم 59', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(10, 'موضوع-رقم-60', 'موضوع رقم 60', 'محتوى الموضوع رقم 60', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(11, 'موضوع-رقم-61', 'موضوع رقم 61', 'محتوى الموضوع رقم 61', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(12, 'موضوع-رقم-62', 'موضوع رقم 62', 'محتوى الموضوع رقم 62', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(13, 'موضوع-رقم-63', 'موضوع رقم 63', 'محتوى الموضوع رقم 63', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(14, 'موضوع-رقم-64', 'موضوع رقم 64', 'محتوى الموضوع رقم 64', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(15, 'موضوع-رقم-65', 'موضوع رقم 65', 'محتوى الموضوع رقم 65', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(16, 'موضوع-رقم-66', 'موضوع رقم 66', 'محتوى الموضوع رقم 66', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(17, 'موضوع-رقم-67', 'موضوع رقم 67', 'محتوى الموضوع رقم 67', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(18, 'موضوع-رقم-68', 'موضوع رقم 68', 'محتوى الموضوع رقم 68', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(19, 'موضوع-رقم-69', 'موضوع رقم 69', 'محتوى الموضوع رقم 69', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(20, 'موضوع-رقم-70', 'موضوع رقم 70', 'محتوى الموضوع رقم 70', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(21, 'موضوع-رقم-71', 'موضوع رقم 71', 'محتوى الموضوع رقم 71', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(22, 'موضوع-رقم-72', 'موضوع رقم 72', 'محتوى الموضوع رقم 72', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(23, 'موضوع-رقم-73', 'موضوع رقم 73', 'محتوى الموضوع رقم 73', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(24, 'موضوع-رقم-74', 'موضوع رقم 74', 'محتوى الموضوع رقم 74', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(25, 'موضوع-رقم-75', 'موضوع رقم 75', 'محتوى الموضوع رقم 75', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(26, 'موضوع-رقم-76', 'موضوع رقم 76', 'محتوى الموضوع رقم 76', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(27, 'موضوع-رقم-77', 'موضوع رقم 77', 'محتوى الموضوع رقم 77', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(28, 'موضوع-رقم-78', 'موضوع رقم 78', 'محتوى الموضوع رقم 78', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(29, 'موضوع-رقم-79', 'موضوع رقم 79', 'محتوى الموضوع رقم 79', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(30, 'موضوع-رقم-80', 'موضوع رقم 80', 'محتوى الموضوع رقم 80', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(31, 'موضوع-رقم-81', 'موضوع رقم 81', 'محتوى الموضوع رقم 81', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(32, 'موضوع-رقم-82', 'موضوع رقم 82', 'محتوى الموضوع رقم 82', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:56', '2014-03-23 16:13:56'),
(33, 'موضوع-رقم-83', 'موضوع رقم 83', 'محتوى الموضوع رقم 83', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(34, 'موضوع-رقم-84', 'موضوع رقم 84', 'محتوى الموضوع رقم 84', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(35, 'موضوع-رقم-85', 'موضوع رقم 85', 'محتوى الموضوع رقم 85', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(36, 'موضوع-رقم-86', 'موضوع رقم 86', 'محتوى الموضوع رقم 86', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(37, 'موضوع-رقم-87', 'موضوع رقم 87', 'محتوى الموضوع رقم 87', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(38, 'موضوع-رقم-88', 'موضوع رقم 88', 'محتوى الموضوع رقم 88', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(39, 'موضوع-رقم-89', 'موضوع رقم 89', 'محتوى الموضوع رقم 89', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(40, 'موضوع-رقم-90', 'موضوع رقم 90', 'محتوى الموضوع رقم 90', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(41, 'موضوع-رقم-91', 'موضوع رقم 91', 'محتوى الموضوع رقم 91', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(42, 'موضوع-رقم-92', 'موضوع رقم 92', 'محتوى الموضوع رقم 92', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(43, 'موضوع-رقم-93', 'موضوع رقم 93', 'محتوى الموضوع رقم 93', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(44, 'موضوع-رقم-94', 'موضوع رقم 94', 'محتوى الموضوع رقم 94', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(45, 'موضوع-رقم-95', 'موضوع رقم 95', 'محتوى الموضوع رقم 95', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(46, 'موضوع-رقم-96', 'موضوع رقم 96', 'محتوى الموضوع رقم 96', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(47, 'موضوع-رقم-97', 'موضوع رقم 97', 'محتوى الموضوع رقم 97', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(48, 'موضوع-رقم-98', 'موضوع رقم 98', 'محتوى الموضوع رقم 98', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(49, 'موضوع-رقم-99', 'موضوع رقم 99', 'محتوى الموضوع رقم 99', 'http://www.youtube.com/watch?v=YrWAK4ny0F8', 0, 4, 3, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(50, 'موضوع-رقم0', ' موضوع رقم0', ' محتوى الموضوع رقم0', '', 0, 1, 1, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(51, 'موضوع-رقم1', ' موضوع رقم1', ' محتوى الموضوع رقم1', '', 0, 1, 1, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(52, 'موضوع-رقم2', ' موضوع رقم2', ' محتوى الموضوع رقم2', '', 0, 1, 1, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(53, 'موضوع-رقم3', ' موضوع رقم3', ' محتوى الموضوع رقم3', '', 0, 1, 1, '2014-03-23 16:13:57', '2014-03-23 16:13:57'),
(54, 'موضوع-رقم4', ' موضوع رقم4', ' محتوى الموضوع رقم4', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(55, 'موضوع-رقم5', ' موضوع رقم5', ' محتوى الموضوع رقم5', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(56, 'موضوع-رقم6', ' موضوع رقم6', ' محتوى الموضوع رقم6', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(57, 'موضوع-رقم7', ' موضوع رقم7', ' محتوى الموضوع رقم7', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(58, 'موضوع-رقم8', ' موضوع رقم8', ' محتوى الموضوع رقم8', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(59, 'موضوع-رقم9', ' موضوع رقم9', ' محتوى الموضوع رقم9', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(60, 'موضوع-رقم10', ' موضوع رقم10', ' محتوى الموضوع رقم10', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(61, 'موضوع-رقم11', ' موضوع رقم11', ' محتوى الموضوع رقم11', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(62, 'موضوع-رقم12', ' موضوع رقم12', ' محتوى الموضوع رقم12', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(63, 'موضوع-رقم13', ' موضوع رقم13', ' محتوى الموضوع رقم13', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(64, 'موضوع-رقم14', ' موضوع رقم14', ' محتوى الموضوع رقم14', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(65, 'موضوع-رقم15', ' موضوع رقم15', ' محتوى الموضوع رقم15', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(66, 'موضوع-رقم16', ' موضوع رقم16', ' محتوى الموضوع رقم16', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(67, 'موضوع-رقم17', ' موضوع رقم17', ' محتوى الموضوع رقم17', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(68, 'موضوع-رقم18', ' موضوع رقم18', ' محتوى الموضوع رقم18', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(69, 'موضوع-رقم19', ' موضوع رقم19', ' محتوى الموضوع رقم19', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(70, 'موضوع-رقم20', ' موضوع رقم20', ' محتوى الموضوع رقم20', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(71, 'موضوع-رقم21', ' موضوع رقم21', ' محتوى الموضوع رقم21', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(72, 'موضوع-رقم22', ' موضوع رقم22', ' محتوى الموضوع رقم22', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(73, 'موضوع-رقم23', ' موضوع رقم23', ' محتوى الموضوع رقم23', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(74, 'موضوع-رقم24', ' موضوع رقم24', ' محتوى الموضوع رقم24', '', 0, 1, 1, '2014-03-23 16:13:58', '2014-03-23 16:13:58'),
(75, 'موضوع-رقم25', ' موضوع رقم25', ' محتوى الموضوع رقم25', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(76, 'موضوع-رقم26', ' موضوع رقم26', ' محتوى الموضوع رقم26', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(77, 'موضوع-رقم27', ' موضوع رقم27', ' محتوى الموضوع رقم27', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(78, 'موضوع-رقم28', ' موضوع رقم28', ' محتوى الموضوع رقم28', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(79, 'موضوع-رقم29', ' موضوع رقم29', ' محتوى الموضوع رقم29', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(80, 'موضوع-رقم30', ' موضوع رقم30', ' محتوى الموضوع رقم30', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(81, 'موضوع-رقم31', ' موضوع رقم31', ' محتوى الموضوع رقم31', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(82, 'موضوع-رقم32', ' موضوع رقم32', ' محتوى الموضوع رقم32', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(83, 'موضوع-رقم33', ' موضوع رقم33', ' محتوى الموضوع رقم33', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(84, 'موضوع-رقم34', ' موضوع رقم34', ' محتوى الموضوع رقم34', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(85, 'موضوع-رقم35', ' موضوع رقم35', ' محتوى الموضوع رقم35', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(86, 'موضوع-رقم36', ' موضوع رقم36', ' محتوى الموضوع رقم36', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(87, 'موضوع-رقم37', ' موضوع رقم37', ' محتوى الموضوع رقم37', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(88, 'موضوع-رقم38', ' موضوع رقم38', ' محتوى الموضوع رقم38', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(89, 'موضوع-رقم39', ' موضوع رقم39', ' محتوى الموضوع رقم39', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(90, 'موضوع-رقم40', ' موضوع رقم40', ' محتوى الموضوع رقم40', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(91, 'موضوع-رقم41', ' موضوع رقم41', ' محتوى الموضوع رقم41', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(92, 'موضوع-رقم42', ' موضوع رقم42', ' محتوى الموضوع رقم42', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(93, 'موضوع-رقم43', ' موضوع رقم43', ' محتوى الموضوع رقم43', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(94, 'موضوع-رقم44', ' موضوع رقم44', ' محتوى الموضوع رقم44', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(95, 'موضوع-رقم45', ' موضوع رقم45', ' محتوى الموضوع رقم45', '', 0, 1, 1, '2014-03-23 16:13:59', '2014-03-23 16:13:59'),
(96, 'موضوع-رقم46', ' موضوع رقم46', ' محتوى الموضوع رقم46', '', 0, 1, 1, '2014-03-23 16:14:00', '2014-03-23 16:14:00'),
(97, 'موضوع-رقم47', ' موضوع رقم47', ' محتوى الموضوع رقم47', '', 0, 1, 1, '2014-03-23 16:14:00', '2014-03-23 16:14:00'),
(98, 'موضوع-رقم48', ' موضوع رقم48', ' محتوى الموضوع رقم48', '', 0, 1, 1, '2014-03-23 16:14:00', '2014-03-23 16:14:00'),
(99, 'موضوع-رقم49', ' موضوع رقم49', ' محتوى الموضوع رقم49', '', 0, 1, 1, '2014-03-23 16:14:00', '2014-03-23 16:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_temp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reputation` int(11) NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `photo`, `fullname`, `username`, `website`, `password`, `password_temp`, `code`, `reputation`, `bio`, `active`, `is_admin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'user1@gmail.com', NULL, 'هشام محمد', 'hichem', 'http://www.arabia.io', '$2y$10$VdkKKHIk25cY5.IoG6CyXu0X/bQmHjDAl4i1o3ijQU5s2pD8XE0hm', '', '', 0, 'good guy', 1, 0, NULL, '2014-03-23 16:13:54', '2014-03-23 16:13:54'),
(2, 'user2@gmail.com', NULL, 'أم كلثوم', 'kolthoum', '', '$2y$10$lbmoCzxvfJ.4iln.zT2XFOd3ECNp4.h7z4PWSFM994rsw5gVEMByO', '', '', 0, 'good singer', 1, 0, NULL, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(3, 'user3@gmail.com', NULL, 'أبو الحروف', 'abo.7oroof', '', '$2y$10$0XPOk5Gww/309k0Jfj4OdejUagBmr7w4yd7xQCBfTX5OVafgwTtp2', '', '', 0, '', 1, 0, NULL, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(4, 'user4@gmail.com', NULL, '', 'ahmed', '', '$2y$10$g1ZTgL0Owal98vnxVQ.chONIfgn3RGyPCJK/fF7DtJNHSwJz6afxa', '', '', 0, '', 1, 0, NULL, '2014-03-23 16:13:55', '2014-03-23 16:13:55'),
(5, 'user5@gmail.com', NULL, '', 'Mohamed', '', '$2y$10$4XpGAu6t1tQg8kXIxptBVuPTSacWTh8tkoDoIU675nIbRus7UkQbm', '', '', 0, '', 1, 0, NULL, '2014-03-23 16:13:55', '2014-03-23 16:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `target_id` int(10) unsigned NOT NULL DEFAULT '0',
  `target_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vote` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `votes_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
