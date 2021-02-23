-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 08:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salespage`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_sale`
--

CREATE TABLE `category_sale` (
  `id` int(11) NOT NULL,
  `username_id` int(11) NOT NULL,
  `name_id` int(11) NOT NULL,
  `namesale` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_sale`
--

INSERT INTO `category_sale` (`id`, `username_id`, `name_id`, `namesale`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'test', '2021-02-16 08:27:12', '2021-02-16 08:27:12'),
(2, 0, 0, 'sapzapp', '2021-02-16 08:28:43', '2021-02-16 08:28:43'),
(3, 0, 0, 'ยังไงไหนเล่า', '2021-02-16 08:39:15', '2021-02-16 08:39:15'),
(4, 0, 0, 'heartbeat', '2021-02-16 08:39:25', '2021-02-16 08:39:25'),
(5, 0, 0, 'loveu', '2021-02-16 08:39:33', '2021-02-16 08:39:33'),
(6, 0, 0, 'ascard', '2021-02-16 08:39:39', '2021-02-16 08:39:39'),
(7, 0, 0, 'singsong', '2021-02-16 08:39:47', '2021-02-16 08:39:47'),
(8, 0, 0, '', '2021-02-18 03:22:51', '2021-02-18 03:22:51'),
(9, 0, 0, 'testtttttt', '2021-02-19 06:17:12', '2021-02-19 06:17:12'),
(10, 0, 0, '', '2021-02-19 12:13:27', '2021-02-19 12:13:27'),
(11, 0, 0, '', '2021-02-19 12:13:50', '2021-02-19 12:13:50'),
(12, 0, 0, '1234', '2021-02-19 12:13:54', '2021-02-19 12:13:54'),
(13, 0, 0, '', '2021-02-19 12:15:47', '2021-02-19 12:15:47'),
(14, 0, 0, 'อาการเป็นยังไงบอกหมอมา', '2021-02-19 12:16:05', '2021-02-19 12:16:05'),
(15, 0, 0, '', '2021-02-19 12:33:36', '2021-02-19 12:33:36'),
(16, 0, 0, '', '2021-02-19 12:34:01', '2021-02-19 12:34:01'),
(17, 0, 0, 'ฟหกฟหก', '2021-02-19 12:35:33', '2021-02-19 12:35:33'),
(18, 0, 0, '1234444444', '2021-02-19 12:58:29', '2021-02-19 12:58:29'),
(19, 0, 0, '', '2021-02-19 13:07:49', '2021-02-19 13:07:49'),
(20, 0, 0, '', '2021-02-22 05:06:10', '2021-02-22 05:06:10'),
(21, 0, 0, 'testBoss', '2021-02-22 07:20:05', '2021-02-22 07:20:05'),
(22, 0, 0, '', '2021-02-22 13:28:36', '2021-02-22 13:28:36'),
(23, 11, 0, 'test_boss', '2021-02-22 06:32:47', '2021-02-22 06:32:47'),
(24, 11, 0, 'Hello_boss', '2021-02-22 06:33:10', '2021-02-22 06:33:10'),
(25, 13, 0, 'sales_test', '2021-02-22 11:10:34', '2021-02-22 11:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `category_sale_id` int(11) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `category_sale_id`, `image_name`, `sort`, `created_at`, `updated_at`) VALUES
(23, 23, '161400455517789655822pic.jpg', NULL, '2021-02-22 07:35:55', '2021-02-22 07:35:55'),
(24, 25, '16140183142099324112pic.jpg', 2, '2021-02-22 11:25:14', '2021-02-22 11:25:14'),
(25, 25, '161401850817067930734pic.jpg', 1, '2021-02-22 11:28:28', '2021-02-22 11:28:28'),
(27, 25, '16140228915866526334pic.jpg', 4, '2021-02-22 12:41:31', '2021-02-22 12:41:31'),
(28, 25, '16140229553107169582pic.jpg', 3, '2021-02-22 12:42:35', '2021-02-22 12:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `username_login` varchar(60) NOT NULL,
  `name_package` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `username_login`, `name_package`, `price`, `created_at`, `updated_at`) VALUES
(2, 'testt@gmail.com', 'โปร 1500 บาท', 1500, '2021-02-16 02:54:37', '2021-02-16 02:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `social_token`
--

CREATE TABLE `social_token` (
  `id` int(11) NOT NULL,
  `username_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `line_token` varchar(255) NOT NULL,
  `facebook_pixel` varchar(255) NOT NULL,
  `tiktok_pixel` varchar(255) NOT NULL,
  `line_tag` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bankname`
--

CREATE TABLE `tb_bankname` (
  `bankName_ID` int(11) NOT NULL,
  `bankName_name` varchar(127) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bankname`
--

INSERT INTO `tb_bankname` (`bankName_ID`, `bankName_name`) VALUES
(1, 'ธนาคารกรุงเทพ'),
(2, 'ธนาคารกสิกรไทย'),
(3, 'ธนาคารกรุงไทย'),
(4, 'ธนาคารทหารไทย'),
(5, 'ธนาคารไทยพาณิชย์'),
(6, 'ธนาคารกรุงศรีอยุธยา'),
(7, 'ธนาคารเกียรตินาคิน'),
(8, 'ธนาคารซีไอเอ็มบีไทย'),
(9, 'ธนาคารทิสโก้'),
(10, 'ธนาคารธนชาต'),
(11, 'ธนาคารยูโอบี'),
(12, 'ธนาคารไทยเครดิตเพื่อรายย่อย'),
(13, 'ธนาคารแลนด์ แอนด์ เฮาส์'),
(14, 'ธนาคารไอซีบีซี (ไทย)'),
(15, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย'),
(16, 'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร'),
(17, 'ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย'),
(18, 'ธนาคารออมสิน'),
(19, 'ธนาคารอาคารสงเคราะห์'),
(20, 'ธนาคารอิสลามแห่งประเทศไทย'),
(21, 'ธนาคารเมกะ สากลพาณิชย์'),
(22, 'ธนาคารแห่งประเทศจีน (ไทย)'),
(23, 'ธนาคารเอเอ็นแซด (ไทย)'),
(24, 'ธนาคารซูมิโตโม มิตซุย ทรัสต์ (ไทย)'),
(25, 'ธนาคารซิตี้แบงค์');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username_login` varchar(60) NOT NULL COMMENT 'user',
  `password` varchar(255) NOT NULL COMMENT 'password',
  `name_lastname` varchar(80) NOT NULL COMMENT 'ชื่อ - นามสกุล',
  `phone_number` varchar(60) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `is_admin` enum('0','1','','') NOT NULL COMMENT 'ไม่เป็น admin = 0 , admin = 1',
  `package_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='user_login';

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username_login`, `password`, `name_lastname`, `phone_number`, `is_admin`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 'testt@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ทองเหม็น', 'มีมากมาย', '0', 0, '2021-02-16 02:24:19', '2021-02-16 02:24:19'),
(2, 'locwfr@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ทองเหม็น มีมากมาย', '0851484745', '0', 0, '2021-02-16 02:25:43', '2021-02-16 02:25:43'),
(3, 'polsi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'test test', '0849251846', '0', 0, '2021-02-16 02:27:26', '2021-02-16 02:27:26'),
(4, 'losdwi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sdawr dsda', '0846958174', '0', 0, '2021-02-16 02:37:48', '2021-02-16 02:37:48'),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 0, '2021-02-16 02:39:05', '2021-02-16 02:39:05'),
(6, 'httyf@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sdwad dsad', '084715487', '0', 0, '2021-02-16 02:39:27', '2021-02-16 02:39:27'),
(7, 'sapappsth.biz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'apinya', '0123456789', '0', 0, '2021-02-19 12:15:20', '2021-02-19 12:15:20'),
(8, 'aaaa@aaaa', '74b87337454200d4d33f80c4663dc5e5', 'aaaa', 'aaaa', '0', 0, '2021-02-19 12:58:12', '2021-02-19 12:58:12'),
(9, 'hello@gmail.com', '9a84ee41aa72de59c63006aad670bcce', 'Theerawat', '0912345678', '0', 0, '2021-02-22 07:25:12', '2021-02-22 07:25:12'),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 0, '2021-02-22 07:31:30', '2021-02-22 07:31:30'),
(11, 'boss@sapapps.com', '$2y$10$GvNcQfz96lnP8komIL5ZieY9bGDfgyBCJ0cK0y7ew7J0.F8YRos1y', 'Boss', '0912345678', '0', 0, '2021-02-22 04:20:25', '2021-02-22 04:20:25'),
(12, 'theerawat.w@sapapps.com', '$2y$10$yGH/K6NBgBZSzx27ABTAKeZKu61OVzIwJnBoxw8MNp8AvUa94jCn2', 'Boss', '0912345678', '0', 0, '2021-02-22 04:26:51', '2021-02-22 04:26:51'),
(13, 'boss@sapapp.com', '$2y$10$8U8mCQVo9j2yyhnfwTpCUusOFv6NCfYSZPFvsnz3Xd3Utfxj9IGjG', 'boss25', '091-234-5678', '0', 2, '2021-02-22 10:23:15', '2021-02-22 10:23:15'),
(14, 'boss@sapapps2.com', '$2y$10$6.49a3QKBQ1pLQNx25a6H.lgHcMfJlFlhUhjHamaq.ycpCC/jTp7u', 'boss_register', '0987654321', '0', 0, '2021-02-22 11:08:22', '2021-02-22 11:08:22'),
(15, 'trw@boss.com', '$2y$10$8edjlm8BUuh9SSth0YW4DOayVH8nKHNfybvcokfmyvZd9ieexAcqe', 'testAgain', '0876542345', '0', NULL, '2021-02-22 12:47:17', '2021-02-22 12:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_sale`
--
ALTER TABLE `category_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_token`
--
ALTER TABLE `social_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bankname`
--
ALTER TABLE `tb_bankname`
  ADD PRIMARY KEY (`bankName_ID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_sale`
--
ALTER TABLE `category_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_token`
--
ALTER TABLE `social_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bankname`
--
ALTER TABLE `tb_bankname`
  MODIFY `bankName_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
