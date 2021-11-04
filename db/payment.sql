-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 03:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_button`
--

CREATE TABLE `action_button` (
  `id_actionbutton` int(11) NOT NULL,
  `call_action_button` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action_button`
--

INSERT INTO `action_button` (`id_actionbutton`, `call_action_button`) VALUES
(1, 'Saya Ingin Ini'),
(2, 'Order Sekarang'),
(3, 'Beli Sekarang');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created_user` date NOT NULL,
  `is_active` int(1) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `image`, `email`, `phone`, `password`, `date_created_user`, `is_active`, `id_role`) VALUES
(4, 'Admin Korpora', 'default.png', 'admin@korpora.com', '085217116035', '$2y$10$oLcqzDlwm/bu2aDFOa9QhO064hr9jjojBJ4g.VeuKX4n.vwWobB8i', '2021-10-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_product`
--

CREATE TABLE `event_product` (
  `id_events` int(11) NOT NULL,
  `slug_event` varchar(255) NOT NULL,
  `image_events` varchar(255) NOT NULL,
  `nama_events` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link_event` text NOT NULL,
  `link_credit` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_events` date NOT NULL,
  `start_at` time NOT NULL,
  `start_end` time NOT NULL,
  `price` int(11) NOT NULL,
  `date_created_events` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_actionbutton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_product`
--

INSERT INTO `event_product` (`id_events`, `slug_event`, `image_events`, `nama_events`, `description`, `link_event`, `link_credit`, `quantity`, `date_events`, `start_at`, `start_end`, `price`, `date_created_events`, `id_user`, `id_actionbutton`) VALUES
(11, 'test', '', 'Test', 'sdfsdfsd', '', '', 1, '2021-10-30', '10:53:00', '00:00:00', 500000, '2021-10-26 01:54:18', 4, 3),
(12, 'selasa', '', 'Selasa', 'asdasfdasf', '', '', 1, '2021-10-30', '03:07:00', '10:07:00', 350000, '2021-10-26 02:07:46', 5, 3),
(13, 'df', '', 'Df', '', '', '', 1, '2021-10-26', '15:28:00', '15:30:00', 30000, '2021-10-26 10:29:01', 4, 3),
(14, 'program-coaching', '', 'Program Coaching', 'hanya test', '', '', 2, '2021-10-28', '14:27:00', '20:33:00', 350000, '2021-10-28 09:28:08', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `histori_pesanan`
--

CREATE TABLE `histori_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `transaction_time` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `va_number` varchar(255) DEFAULT NULL,
  `pdf_url` text DEFAULT NULL,
  `status_code` varchar(255) NOT NULL,
  `nama_customer` text NOT NULL,
  `email_customer` varchar(200) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_events` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori_pesanan`
--

INSERT INTO `histori_pesanan` (`id_pesanan`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `nama_customer`, `email_customer`, `no_telp`, `date_created`, `id_events`) VALUES
(20, '664095349', 500000, 'bank_transfer', '2021-10-26 08:55:16', 'bca', '33339553006', 'https://app.midtrans.com/snap/v1/transactions/1a7d5848-be2d-4a5d-b386-8329dab4e5b9/pdf', '200', 'asdsads', 'henks.tim@gmail.com', '087887217027', '2021-10-26 01:55:19', 11);

-- --------------------------------------------------------

--
-- Table structure for table `link_url`
--

CREATE TABLE `link_url` (
  `id_link` int(11) NOT NULL,
  `slug_link` varchar(255) NOT NULL,
  `icon_code_link` varchar(60) NOT NULL,
  `judul_link` varchar(255) NOT NULL,
  `url_link` text NOT NULL,
  `image_link` text NOT NULL,
  `date_created_linkurl` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_actionbutton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date_created_user` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `phone`, `date_created_user`) VALUES
(4, 'Admin Korpora', 'admin@korpora.com', '085217116035', '2021-10-01'),
(5, 'Icha', 'icha@coba.com', '085217116035', '2021-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'TEST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_button`
--
ALTER TABLE `action_button`
  ADD PRIMARY KEY (`id_actionbutton`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `Role User` (`id_role`) USING BTREE;

--
-- Indexes for table `event_product`
--
ALTER TABLE `event_product`
  ADD PRIMARY KEY (`id_events`);

--
-- Indexes for table `histori_pesanan`
--
ALTER TABLE `histori_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `Event Product` (`id_events`);

--
-- Indexes for table `link_url`
--
ALTER TABLE `link_url`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_button`
--
ALTER TABLE `action_button`
  MODIFY `id_actionbutton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_product`
--
ALTER TABLE `event_product`
  MODIFY `id_events` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `histori_pesanan`
--
ALTER TABLE `histori_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `link_url`
--
ALTER TABLE `link_url`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
