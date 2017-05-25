-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 12:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2_basic_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1495699488),
('m140209_132017_init', 1495699494),
('m140403_174025_create_account_table', 1495699497),
('m140504_113157_update_tables', 1495699505),
('m140504_130429_create_token_table', 1495699507),
('m140830_171933_fix_ip_field', 1495699509),
('m140830_172703_change_account_table_name', 1495699509),
('m141222_110026_update_ip_field', 1495699511),
('m141222_135246_alter_username_length', 1495699512),
('m150614_103145_update_social_account_table', 1495699517),
('m150623_212711_fix_username_notnull', 1495699517),
('m151218_234654_add_timezone_to_profile', 1495699519),
('m160929_103127_add_last_login_at_to_user_table', 1495699520);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `detail` text,
  `price` decimal(15,2) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `amount` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `detail`, `price`, `product_type_id`, `amount`) VALUES
(1, 'Iphone', 'ราคาสินค้าดังกล่าวได้รวมภาษีมูลค่าเพิ่มแล้ว และไม่มีค่าธรรมเนียมการจัดส่งสินค้าทุกประเภท\r\nพื้นที่ว่างจะน้อยกว่าที่กำหนดและอาจแตกต่างกันไปอันเนื่องมาจากปัจจัยหลายประการ โดยการกำหนดค่าตามมาตรฐานที่ให้มานั้นจะใช้พื้นที่ประมาณ 4GB ถึง 6GB (รวม iOS และแอพที่มาพร้อมเครื่อง) ทั้งนี้ขึ้นอยู่กับรุ่นและการตั้งค่า\r\nพื้นผิวที่มีความมันเงาสูงของ iPhone 7 สีดำเจ็ทแบล็คนี้ เกิดขึ้นจากกระบวนการชุบผิวและขัดเงาที่มีความแม่นยำถึง 9 ขั้นตอนด้วยกัน ซึ่งผิวสัมผัสนั้นแข็งแกร่งเทียบเท่ากับผลิตภัณฑ์ชุบผิวของ Apple ชิ้นอื่นๆ อย่างไรก็ตามพื้นผิวที่มันเงาสูงนี้อาจเผยให้เห็นรอยขีดข่วนเล็กน้อยเมื่อผ่านการใช้งาน ซึ่งถ้าหากคุณยังเป็นกังวล เราแนะนำให้ใช้เคสที่มีให้เลือกสรรมากมายเพื่อปกป้อง iPhone ของคุณ', '12000.00', 1, 10),
(2, 'LG tv', '', '5000.00', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `title`) VALUES
(1, 'โทรศัพท์'),
(2, 'ทีวี'),
(3, 'เครื่องซักผ้า'),
(4, 'เครื่องเสียง'),
(5, 'เครื่องปรับอากาศ');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'Ahamad Jedu', '', 'ahamad.jedu@gmail.com', 'e611c48e103dc29b71ffe130cdff0b74', '', '', '', 'Pacific/Kiritimati'),
(2, '', '', 'kuakling@gmail.com', '1b73923233a2fce3126bb51a12bf2683', '', '', '', 'Pacific/Kiritimati');

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(2, 'rHKlUu1K8rZ02BzPUqEPDzgz11lIrkFE', 1495706053, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'admin@localhost.com', '$2y$10$uhVz.RGm9UvaVFvvhIqI2ODY.DnuM8/RkxYxCAQWr1wgn29KcPe5K', 'ml8Sa2ZCYDbGw_aiQB3JK7hjnBCGF1PV', 1495699841, NULL, NULL, '::1', 1495699743, 1495699743, 0, 1495706411),
(2, 'kuakling', 'kuakling@gmail.com', '$2y$12$rqUWcmUTiu0WCgk9ef6gje3usYxPZlgRUzM7AJ8ugnXlg63cy223K', 'OY69iZTVoFQ04vxYtOnfDi2HkGGjklMH', NULL, NULL, NULL, '::1', 1495706053, 1495706053, 0, 1495706074);

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `webboard_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `date_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`id`, `topic`, `detail`, `webboard_category_id`, `user_id`, `file`, `view`, `date_post`) VALUES
(1, 'เรียนรู้การใช้งาน Yii2', 'เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2เรียนรู้การใช้งาน Yii2', 1, 0, '', 47, 0),
(2, 'ใช้มือถืออะไรกันบ้าง', 'ใช้มือถืออะไรกันบ้าง', 2, 1, '', 8, 1495700738),
(4, '๊Update file', '๊Update file๊Update file๊Update file๊Update file๊Update file', 3, 1, '', 1, 1495703983),
(5, 'dd', 'ddd', 1, 1, '5926a844660e7.pdf', 11, 1495705668);

-- --------------------------------------------------------

--
-- Table structure for table `webboard_category`
--

CREATE TABLE `webboard_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard_category`
--

INSERT INTO `webboard_category` (`id`, `title`) VALUES
(1, 'ทั่วไป'),
(2, 'ไอที'),
(3, 'ลอกการบ้าน');

-- --------------------------------------------------------

--
-- Table structure for table `webboard_comment`
--

CREATE TABLE `webboard_comment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `webboard_id` int(11) NOT NULL,
  `date_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard_comment`
--

INSERT INTO `webboard_comment` (`id`, `title`, `user_id`, `webboard_id`, `date_comment`) VALUES
(1, 'มั่วๆไปเลย', 1, 1, 0),
(2, '5555+ จริงเหรอ', 1, 1, 0),
(3, 'อยากรู้จัง', 1, 1, 0),
(4, 'เย้ๆๆๆๆ เข้ามาได้แล้ว', 1, 1, 0),
(7, '55556++', 1, 2, 1495702375),
(8, 'คอมเมน', 1, 5, 1495705994),
(9, 'จริงเหรอ', 2, 1, 1495706089);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_id` (`product_type_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `webboard_category_id` (`webboard_category_id`);

--
-- Indexes for table `webboard_category`
--
ALTER TABLE `webboard_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webboard_comment`
--
ALTER TABLE `webboard_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `webboard_id` (`webboard_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `webboard_category`
--
ALTER TABLE `webboard_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webboard_comment`
--
ALTER TABLE `webboard_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `webboard`
--
ALTER TABLE `webboard`
  ADD CONSTRAINT `webboard_ibfk_1` FOREIGN KEY (`webboard_category_id`) REFERENCES `webboard_category` (`id`);

--
-- Constraints for table `webboard_comment`
--
ALTER TABLE `webboard_comment`
  ADD CONSTRAINT `webboard_comment_ibfk_1` FOREIGN KEY (`webboard_id`) REFERENCES `webboard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
