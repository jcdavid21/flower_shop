-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2025 at 03:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(11) NOT NULL,
  `ac_email` varchar(255) NOT NULL,
  `ac_password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `account_status_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`account_id`, `ac_email`, `ac_password`, `role_id`, `account_status_id`) VALUES
(1, 'jcdavid@gmail.com', '$2y$10$Nf6TJqPlMAIFlBEEoJ2n4OG.42jdz6zbEtbUfO.6a20CETTMoQLAi', 1, 1),
(2, 'golden@gmail.com', '$2y$10$92lKJT/9e9JSzuGmEZ1N8.cPldvOQexUuU2k97F5GykS0rP4l5tqq', 1, 1),
(3, 'johnerick@gmail.com', '$2y$10$OZIIZnjXfRrVNX5G389R3.emX0dGaTb35PIQAbOqKhEB6qYWnoAuC', 2, 1),
(4, 'lugo@gmail.com', '$2y$10$m5gg4RhBizZnqOJXR6IFIemRMw/0bex4eY4mxCNpgys2aQDRr.auq', 2, 1),
(6, 'admin@gmail.com', '$2y$10$t3.cWIceqWE/cDo9lNYXAuK2fSFiRplX6QHlbuTR8TlGJU1cRtkA6', 2, 1),
(7, 'cashier@gmail.com', '$2y$10$oxj3kjSVZEBHBEFS5EkT8OgwTkRezxKytLTgdov6Vs8qhCmOPPe9K', 2, 1),
(8, 'cashier2@gmail.com', '$2y$10$kxW2vsZVDHzuZg.oHujg7OQUWUrr77JZ9tDMhY1GYojPNliEi3cnC', 2, 1),
(9, 'lugs@gmail.com', '$2y$10$Sgyb8CATbHXkScwxoZmHtOMypd5SCn/fB1jgZ/elykNOe02fN/X0m', 1, 1),
(10, 'jc.david@gmail.com', '$2y$10$nyGPsjX/.61ru7G2mZBrguQXH4/Kca7Y/T1UYioBVbxmAosIEAMHS', 1, 1),
(12, 'miral@gmail.com', '$2y$10$qks3Gm9YKtAM1GPeXkD8POfuDjyFT8e90vxjmIxpTWeuf9qcwvMAm', 1, 1),
(15, 'elmer@gmail.com', '$2y$10$8g.3i3JbwOKGyPRZqbAFQuec/5DT20DEOkFozaOdcJ..y6wxlQ24W', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_details`
--

CREATE TABLE `tbl_account_details` (
  `account_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account_details`
--

INSERT INTO `tbl_account_details` (`account_id`, `first_name`, `middle_name`, `last_name`, `contact`, `address`) VALUES
(1, 'Jc', 'Domingo', 'David', '09565535401', 'Montecillo subd'),
(2, 'Golden', '', 'Miral', '09565535401', 'Bayan Glori'),
(3, 'John Erick', '', 'Llanita', '09565535401', 'Quezon City'),
(4, 'Christian', '', 'Lugo', '09512847442', 'Bayan Glori'),
(6, 'Jc', '', 'David', '09565535401', 'Bayan Glori'),
(7, 'Juan', '', 'David', '09565535401', 'Cielito Caloocan'),
(8, 'jhy', '', 'mariano', '09512847442', 'Bayan Glori'),
(9, 'Christian', '', 'Lugo', '09565535401', 'Bayan Glori'),
(10, 'Juan Carlo', 'Domingo', 'David', '09565535401', 'Montecillo subd'),
(12, 'Christian', '', 'Miral', '09512847442', 'Caloocan'),
(15, 'Elmer', '', 'Caburao', '09512847442', 'Bayan Glori');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_status`
--

CREATE TABLE `tbl_account_status` (
  `account_status_id` int(11) NOT NULL,
  `account_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account_status`
--

INSERT INTO `tbl_account_status` (`account_status_id`, `account_status`) VALUES
(1, 'Active'),
(2, 'Deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_log`
--

CREATE TABLE `tbl_audit_log` (
  `log_user_id` int(11) DEFAULT NULL,
  `log_username` varchar(50) DEFAULT NULL,
  `log_user_type` varchar(50) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_audit_log`
--

INSERT INTO `tbl_audit_log` (`log_user_id`, `log_username`, `log_user_type`, `log_date`) VALUES
(7, 'Juan  David', '3', '2024-10-24 11:07:35'),
(12, 'Christian  Miral', '1', '2024-10-24 11:10:20'),
(6, 'Jc  David', '2', '2024-10-24 15:49:15'),
(6, 'Jc  David', '2', '2024-11-15 02:41:56'),
(6, 'Jc  David', '2', '2024-11-15 08:20:55'),
(6, 'Jc  David', '2', '2024-11-15 08:21:19'),
(6, 'Jc  David', '2', '2024-11-15 09:23:06'),
(1, 'Jc Domingo David', '1', '2024-11-18 11:37:34'),
(1, 'Jc Domingo David', '1', '2024-11-18 11:42:06'),
(6, 'Jc  David', '2', '2024-11-18 12:52:17'),
(1, 'Jc Domingo David', '1', '2024-11-18 12:54:03'),
(6, 'Jc  David', '2', '2024-11-18 13:01:35'),
(6, 'Jc  David', '2', '2024-11-18 13:06:00'),
(1, 'Jc Domingo David', '1', '2024-11-19 02:10:47'),
(6, 'Jc  David', '2', '2024-11-19 02:39:26'),
(6, 'Jc  David', '2', '2024-11-19 14:55:59'),
(1, 'Jc Domingo David', '1', '2024-11-19 15:21:20'),
(12, 'Christian  Miral', '1', '2024-11-19 15:23:18'),
(1, 'Jc Domingo David', '1', '2024-11-21 10:33:02'),
(1, 'Jc Domingo David', '1', '2025-01-19 06:28:29'),
(7, 'Juan  David', '2', '2025-01-19 07:21:45'),
(1, 'Jc Domingo David', '1', '2025-04-27 10:00:56'),
(4, 'Christian  Lugo', '2', '2025-04-27 12:59:31'),
(1, 'Jc Domingo David', '1', '2025-04-27 13:01:09'),
(1, 'Jc Domingo David', '1', '2025-04-27 13:04:13'),
(4, 'Christian  Lugo', '2', '2025-04-27 13:10:21'),
(1, 'Jc Domingo David', '1', '2025-04-27 13:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trail`
--

CREATE TABLE `tbl_audit_trail` (
  `trail_user_id` int(11) DEFAULT NULL,
  `trail_username` varchar(50) DEFAULT NULL,
  `trail_activity` varchar(50) DEFAULT NULL,
  `trail_user_type` varchar(50) DEFAULT NULL,
  `trail_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_audit_trail`
--

INSERT INTO `tbl_audit_trail` (`trail_user_id`, `trail_username`, `trail_activity`, `trail_user_type`, `trail_date`) VALUES
(6, 'Jc David', 'Updated Product ID: 4', 'Admin', '2024-11-18 12:52:36'),
(6, 'Jc David', 'Updated Product ID: 4', 'Admin', '2024-11-18 12:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_best_seller`
--

CREATE TABLE `tbl_best_seller` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_type` int(11) NOT NULL,
  `prod_stocks` int(11) NOT NULL,
  `prod_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_best_seller`
--

INSERT INTO `tbl_best_seller` (`prod_id`, `prod_name`, `prod_price`, `prod_type`, `prod_stocks`, `prod_img`) VALUES
(4, 'Charm', 500, 1, 50, 'charm.png'),
(6, 'Bliss', 1500, 1, 50, 'bliss.png'),
(12, 'Enchanting', 3500, 1, 50, 'enchanting.png'),
(16, 'Finesse', 1200, 1, 50, 'finesse.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `item_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qnty` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `item_check` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`item_id`, `prod_id`, `prod_qnty`, `order_date`, `status_id`, `receiver`, `sender`, `message`, `account_id`, `item_check`) VALUES
(26, 4, 1, '2025-04-27', 2, 'Elmer', 'Jovs', 'labyu', 1, 1),
(27, 6, 1, '2025-04-27', 5, 'Elmer', 'Jovs', 'labyu ulit', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_feedback`
--

CREATE TABLE `tbl_item_feedback` (
  `fd_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `fd_comment` varchar(255) NOT NULL,
  `fd_date` date NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item_feedback`
--

INSERT INTO `tbl_item_feedback` (`fd_id`, `prod_id`, `fd_comment`, `fd_date`, `account_id`) VALUES
(4, 1, 'Quality', '2024-11-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_type`
--

CREATE TABLE `tbl_order_type` (
  `order_type_id` int(11) NOT NULL,
  `order_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_type`
--

INSERT INTO `tbl_order_type` (`order_type_id`, `order_type_name`) VALUES
(1, 'Deliver'),
(2, 'Reserve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_type` int(11) NOT NULL,
  `prod_stocks` int(11) NOT NULL,
  `prod_description` varchar(255) DEFAULT NULL,
  `prod_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_name`, `prod_price`, `prod_type`, `prod_stocks`, `prod_description`, `prod_img`) VALUES
(1, 'A life remembered', 2000, 2, 50, 'None', 'A life remembered.png'),
(2, 'Beaming', 1400, 2, 50, '', 'beaming.png'),
(3, 'Beautiful Farewell', 2500, 2, 50, '', 'Beautiful Farewell.png'),
(4, 'Bliss', 1500, 1, 47, 'edit the product description', 'bliss.png'),
(5, 'Charm', 500, 1, 50, '', 'charm.png'),
(6, 'Clarity', 900, 1, 50, '', 'clarity.png'),
(7, 'Comfort of Bereaved', 5000, 2, 50, '', 'Comfort of Bereaved.png'),
(8, 'Dazzle', 1600, 1, 50, '', 'dazzle.png'),
(9, 'Deepest Sympathy', 2000, 2, 50, '', 'Deepest Sympathy.png'),
(10, 'Desire', 900, 1, 50, '', 'Desire.png'),
(11, 'Devotion', 1500, 1, 50, '', 'devotion.png'),
(12, 'Enchanting', 3500, 1, 50, '', 'enchanting.png'),
(13, 'Epiphany', 1500, 1, 50, '', 'epiphany.png'),
(14, 'Excellence', 900, 1, 50, '', 'excellence.png'),
(15, 'Extravagant', 1600, 1, 50, '', 'extravagant.png'),
(16, 'Finesse', 1200, 1, 50, '', 'finesse.png'),
(17, 'Flourish', 900, 1, 50, '', 'Flourish.png'),
(18, 'Harmony', 1300, 1, 50, '', 'harmony.png'),
(19, 'Heavenly', 1200, 1, 50, '', 'heavenly.png'),
(20, 'Honor', 900, 1, 47, '', 'honor.png'),
(21, 'Rejoice', 1100, 1, 50, '', 'rejoice.png'),
(22, 'Sincerity', 3000, 2, 50, '', 'Sincerity.png'),
(23, 'Stunning', 2000, 1, 50, '', 'stunning.png'),
(24, 'Touch of Heaven', 2500, 2, 50, '', 'Touch of Heaven.png'),
(26, 'Flower1', 200, 2, 50, NULL, 'receipt.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `prod_type_id` int(11) NOT NULL,
  `prod_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`prod_type_id`, `prod_type_name`) VALUES
(1, 'Flowers'),
(2, 'Farewell Flowers'),
(3, 'Solo Flower');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt`
--

CREATE TABLE `tbl_receipt` (
  `receipt_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `receipt_img` varchar(255) NOT NULL,
  `receipt_number` varchar(50) NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `uploaded_date` date NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_receipt`
--

INSERT INTO `tbl_receipt` (`receipt_id`, `account_id`, `receipt_img`, `receipt_number`, `deposit_amount`, `uploaded_date`, `sender_name`, `sender_address`) VALUES
(34, 1, '680e1e0170f40.jpeg', '2134214213111', 2400, '2025-04-27', 'Jc David', 'Bayan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reports`
--

CREATE TABLE `tbl_reports` (
  `report_id` int(11) NOT NULL,
  `rp_name` varchar(50) NOT NULL,
  `rp_email` varchar(150) NOT NULL,
  `rp_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reports`
--

INSERT INTO `tbl_reports` (`report_id`, `rp_name`, `rp_email`, `rp_message`) VALUES
(3, 'Josh', 'jcdavid123c@gmail.com', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`) VALUES
(1, 'PENDING'),
(2, 'DELIVERED'),
(3, 'PROCESS'),
(4, 'OUT FOR DELIVERY'),
(5, 'CANCELLED'),
(6, 'RESERVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `user_activity` varchar(100) NOT NULL,
  `activity_date` date NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`user_id`, `user_name`, `user_type`, `user_activity`, `activity_date`, `item_id`) VALUES
(7, 'juan', '3', 'Claimed item ', '2024-10-11', 10),
(7, 'juan', '3', 'Claimed item ', '2024-10-11', 11),
(7, 'juan', '3', 'Claimed item ', '2024-10-23', 14),
(7, 'juan', '3', 'Claimed item ', '2024-10-23', 14),
(7, 'juan', '3', 'Claimed item ', '2024-10-23', 14),
(7, 'juan', '3', 'Claimed item ', '2024-10-23', 14),
(7, 'juan', '3', 'Claimed item ', '2024-10-23', 17),
(7, 'juan', '3', 'Claimed item NewJeans - NJ Supernatural Photocard SET 1', '2024-10-23', 17),
(7, 'Juan David', '3', 'Claimed item Honor', '2024-10-24', 19),
(6, 'Jc David', '2', 'Claimed item Honor', '2024-11-15', 19),
(1, 'Jc David', '1', 'Claimed item Bliss', '2025-04-27', 26),
(1, 'Jc David', '1', 'Claimed item Bliss', '2025-04-27', 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tbl_account_status`
--
ALTER TABLE `tbl_account_status`
  ADD PRIMARY KEY (`account_status_id`);

--
-- Indexes for table `tbl_best_seller`
--
ALTER TABLE `tbl_best_seller`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_item_feedback`
--
ALTER TABLE `tbl_item_feedback`
  ADD PRIMARY KEY (`fd_id`);

--
-- Indexes for table `tbl_order_type`
--
ALTER TABLE `tbl_order_type`
  ADD PRIMARY KEY (`order_type_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`prod_type_id`);

--
-- Indexes for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_account_status`
--
ALTER TABLE `tbl_account_status`
  MODIFY `account_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_best_seller`
--
ALTER TABLE `tbl_best_seller`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_item_feedback`
--
ALTER TABLE `tbl_item_feedback`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_type`
--
ALTER TABLE `tbl_order_type`
  MODIFY `order_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `prod_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_reports`
--
ALTER TABLE `tbl_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
