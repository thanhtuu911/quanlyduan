-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 08:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `created_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `created_id`) VALUES
(3, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `check_in_date` varchar(255) NOT NULL,
  `check_out_date` varchar(255) NOT NULL,
  `total_money` int(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `numberphone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `product_id`, `check_in_date`, `check_out_date`, `total_money`, `full_name`, `email`, `address`, `numberphone`) VALUES
(27, 2, 53, '2022-12-27', '2022-12-27', 2000, 'Xuân Thuỷ', 'thuytxph26691@fpt.edu.vn', '12', '98765321'),
(28, 2, 15, '2022-12-27', '2022-12-29', 8997, 'Xuân Thuỷ', 'thuytxph26691@fpt.edu.vn', '12', '98765321'),
(29, 2, 54, '2023-03-29', '2023-03-31', 6000, 'Abc', 'thuytxph26691@fpt.edu.vn', 'HN', '098782123'),
(30, 2, 56, '2023-03-29', '2023-03-31', 8997, 'thuy', 'thuytxph26691@fpt.edu.vn', 'HN', '98782123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_id`, `created_at`) VALUES
(2, 'Phòng đơn', '1 giường đơn hoặc 1 giường đôi', 1, '2022-11-18 12:19:15'),
(3, 'Phòng tình nhân', '1 giường đôi cỡ lớn', 1, '2022-11-18 12:19:45'),
(6, 'Phòng đôi', '2 giường đơn hoặc 1 giường đôi', 1, '2022-11-18 12:19:30'),
(8, 'Phòng  cạnh hồ bơi', 'có bể bơi\r\n', 1, '2022-12-05 00:52:43'),
(10, 'Phòng có ban công', 'có ban công', 1, '2022-12-05 00:53:00'),
(12, 'phòng gia đình', '', 1, '2022-11-22 19:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `created_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_id`, `product_id`, `description`, `created_at`) VALUES
(1, 14, 8, 'abc', '2022-11-25 06:36:14'),
(2, 1, 55, 'ưqewq', '2022-12-06 07:29:39'),
(3, 1, 55, 'ok nha', '2022-12-06 07:29:45'),
(4, 1, 53, 'xịn xò con bò', '2022-12-06 07:29:57'),
(8, 2, 56, 'alo', '2023-03-29 00:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `category_id`, `created_id`, `name`, `title`, `image`, `count`, `price`, `description`, `thumb`, `status`, `created_at`, `views`) VALUES
(8, 2, 1, 'A002-Phòng đơn', '', './upload/phòng đơn1.jpg', 3, 2000, '*Trong nhà bếp riêng của bạn:\r\nTủ lạnh\r\nLò vi sóng\r\nMáy pha Cà phê\r\nẤm đun nước điện\r\nĐồ bếp\r\nBàn ăn\r\n*Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nÁo choàng tắm\r\nNhà vệ sinh\r\nBồn tắm hoặc Vòi sen\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc', '', 1, '2022-11-30 12:44:20', 0),
(10, 2, 1, 'A003-Phòng Đơn', '', './upload/phòng đơn 2.jpg', 2, 1999, '*Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nÁo choàng tắm\r\nNhà vệ sinh\r\nBồn tắm hoặc Vòi sen\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\n*Hướng tầm nhìn:\r\nNhìn ra biển\r\n*Tiện nghi phòn', '', 1, '2023-03-29 05:25:10', 81),
(12, 2, 1, 'A005-Phòng Đơn', '', './upload/phòng đơn 4.jpg', 3, 2000, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-11-30 12:45:15', 20),
(13, 6, 1, 'A006-Phòng Đơn', '', './upload/phòng đơn.webp', 2, 2199, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-12-27 04:20:07', 32),
(14, 8, 1, 'A007-Phòng Đơn', '', './upload/hb1.jpg', 2, 2000, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-12-05 00:56:47', 50),
(15, 6, 1, 'B001-Phòng Đôi', '', './upload/phòng đôi.jpg', 1, 2999, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-12-27 04:23:12', 1),
(16, 6, 1, 'B002-Phòng Đôi', '', './upload/phòng đôi 2.jpg', 3, 2999, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-12-05 00:51:31', 0),
(17, 6, 1, 'B003-Phòng Đôi', '', './upload/phòng đôi1.jpg', 3, 2899, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-11-30 12:49:45', 0),
(18, 6, 1, 'B004-Phòng Đôi', '', './upload/phòng đôi.jpg', 2, 2699, 'Trong phòng tắm riêng của bạn:\r\nĐồ vệ sinh cá nhân miễn phí\r\nVòi sen\r\nChậu rửa vệ sinh (bidet)\r\nNhà vệ sinh\r\nKhăn tắm\r\nDép\r\nMáy sấy tóc\r\nKhăn tắm/Bộ khăn trải giường (có thu phí)\r\nGiấy vệ sinh\r\nHướng tầm nhìn:\r\nNhìn ra thành phố\r\nTiện nghi phòng: ​', '', 1, '2022-11-30 12:50:02', 0),
(41, 3, 1, 'D001-Phòng Tình Nhân', '', './upload/phòng tình nhân (1) (1).jpg', 2, 2000, '', '', 1, '2022-11-30 13:12:34', 0),
(43, 12, 1, 'C001-Phòng Gia Đình', '', './upload/gd1.jpg', 2, 2999, '', '', 1, '2022-12-05 00:45:51', 0),
(44, 12, 1, 'C002-Phòng Gia Đình', '', './upload/gd2.jpg', 2, 2999, '', '', 1, '2022-12-05 00:45:59', 0),
(45, 12, 1, 'C003-Phòng Gia Đình', '', './upload/gd3.jpg', 2, 2999, '', '', 1, '2022-12-05 00:46:06', 0),
(46, 3, 1, 'D002-Phòng Tình Nhân', '', './upload/tn1.jpg', 2, 2000, '', '', 1, '2022-12-04 18:46:55', 0),
(47, 3, 1, 'D003-Phòng Tình Nhân', '', './upload/tn3.jpg', 3, 2000, '', '', 1, '2022-12-04 18:48:57', 0),
(48, 3, 1, 'D004-Phòng Tình Nhân', '', './upload/tn4.jpg', 2, 2000, '', '', 1, '2022-12-04 18:50:09', 0),
(49, 8, 1, 'A008-Phòng có Hồ bơi', '', './upload/bh4.jpg', 2, 2999, '', '', 1, '2022-12-05 01:00:09', 0),
(50, 8, 1, 'A009-Phòng có Hồ bơi', '', './upload/hb5.jpg', 1, 2999, '', '', 1, '2022-12-04 19:01:53', 0),
(51, 10, 1, 'B005-Phòng có Ban Công', '', './upload/bc1.jpg', 2, 2000, '', '', 1, '2022-12-05 01:03:22', 0),
(52, 10, 1, 'B006-Phòng có Ban Công', '', './upload/bc2.jpg', 2, 2999, '', '', 1, '2022-12-04 19:04:17', 0),
(53, 8, 1, 'A0010-Phòng cạnh Hồ Bơi', '', './upload/hb4.jpg', 2, 2000, '', '', 1, '2022-12-27 04:21:49', 8),
(54, 10, 1, 'C005-Phòng có Ban Công', '', './upload/bc3.jpg', 2, 2000, '', '', 1, '2023-03-29 05:27:46', 9),
(55, 10, 1, 'C007-Phòng có Ban Công', '', './upload/bc5.jpg', 2, 2999, '', '', 1, '2022-12-27 04:22:56', 34),
(56, 10, 1, 'D007-Phòng có Ban Công', '', './upload/bc6.jpg', 2, 2999, '*Tiện nghi khách sạn \r\n-Bãi đỗ xe          -  Internet tốc độ miễn phí (WiFi)\r\n-Phòng có tủ để đồ ở trung tâm thể dục thẩm mỹ / spa       -Bữa sáng miễn phí\r\n-Trông trẻ                      -Cho phép vật nuôi ( Cho phép chó / vật nuôi )\r\n-Xe đưa đón ', '', 1, '2023-03-29 05:36:09', 47);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `created_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `created_id`, `name`, `price`, `description`, `created_at`, `image`) VALUES
(1, 1, 'Ăn uống', 231231, 'zxczczxc', '2022-11-25 11:37:29', './upload/hamburger.webp'),
(3, 1, 'Gym', 324123, 'xzczxc', '2022-11-25 11:37:46', './upload/gym.png'),
(4, 1, 'Bar', 32423423, 'dfcdzcxz', '2022-11-25 11:37:54', './upload/bar.png'),
(5, 1, 'Giặt ủi', 2354234, '24234', '2022-11-25 05:38:41', './upload/giat.png'),
(6, 1, 'Massage', 324234, 'xczxcz', '2022-11-25 05:39:27', './upload/massage.png'),
(7, 1, 'Dọn dẹp', 3432423, 'czxczx', '2022-11-25 05:39:46', './upload/clean.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numberphone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(10) NOT NULL DEFAULT 1 COMMENT '1: Người Dùng 2: Quản trị viên',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cmnd` int(20) NOT NULL,
  `gender` int(10) NOT NULL COMMENT '1:Nam  2: Nữ',
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `numberphone`, `password`, `role`, `created_at`, `cmnd`, `gender`, `address`) VALUES
(1, 'Quản trị viên', 'admin@gmail.com', '366897934', 'admin', 2, '2022-12-05 15:46:32', 1203000689, 1, ''),
(2, 'Trịnh Xuân Thuỷ', 'thuytxph26691@fpt.edu.vn', '12312414', '123', 1, '2022-12-05 16:39:29', 124124124, 1, ''),
(14, 'Nguyễn Năng Tuyền', 'tuyennnph26714@fpt.edu.vn', '0366897934', '123', 1, '2022-12-05 15:46:42', 0, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_fk0` (`created_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_fk0` (`bill_id`),
  ADD KEY `bill_details_fk1` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_fk0` (`created_id`),
  ADD KEY `comment_fk1` (`product_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productions_fk0` (`category_id`),
  ADD KEY `productions_fk1` (`created_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_fk0` (`created_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_fk0` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_fk0` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_details_fk1` FOREIGN KEY (`product_id`) REFERENCES `productions` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_fk0` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_fk1` FOREIGN KEY (`product_id`) REFERENCES `productions` (`id`);

--
-- Constraints for table `productions`
--
ALTER TABLE `productions`
  ADD CONSTRAINT `productions_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productions_fk1` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_fk0` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
