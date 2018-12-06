-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 04:37 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universal_open_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_amount` int(20) NOT NULL,
  `act_no` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `paid_amount` int(20) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `interest` int(20) NOT NULL,
  `duration` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `bank_name`, `user_id`, `loan_amount`, `act_no`, `type`, `paid_amount`, `due_amount`, `interest`, `duration`) VALUES
(1, 'IOB', 1, 250000, '123456789123456', 'car loan', 200000, 50000, 12, '42 months'),
(2, 'SBI', 3, 320000, '5673456789024', 'housing loan', 100000, 310000, 20, '54 months'),
(3, 'HDFC', 4, 900000, '6743590870015', 'bike loan', 800000, 100000, 15, '14 months');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `act_no` varchar(20) NOT NULL,
  `transaction` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `act_no`, `transaction`, `date`, `type`) VALUES
(1, 1, '123456789123456', 500, '2018-11-28 14:25:56', 'credit'),
(2, 1, '123456789123456', 40, '2018-11-28 14:25:56', 'debit'),
(3, 1, '123456789123456', 10000, '2018-11-28 14:26:44', 'credit'),
(4, 1, '123456789123456', 450, '2018-11-28 14:26:44', 'debit'),
(5, 1, '123456789123456', 10000, '2018-11-28 14:26:50', 'credit'),
(6, 1, '123456789123456', 450, '2018-11-28 14:26:50', 'debit'),
(7, 2, '679546346865145', 3000, '2018-11-28 14:28:06', 'credit'),
(8, 2, '679546346865145', 5675, '2018-11-28 14:28:06', 'credit'),
(9, 2, '679546346865145', 8764, '2018-11-28 14:29:09', 'debit'),
(10, 2, '679546346865145', 76600, '2018-11-28 14:29:09', 'credit'),
(11, 2, '679546346865145', 8764, '2018-11-28 14:29:12', 'debit'),
(12, 2, '679546346865145', 76600, '2018-11-28 14:29:12', 'credit'),
(13, 3, '5673456789024', 1029, '2018-11-28 14:32:06', 'credit'),
(14, 4, '6743590870015', 6000, '2018-11-28 14:32:06', 'debit'),
(15, 4, '6743590870015', 59222, '2018-11-28 14:32:06', 'credit'),
(16, 3, '5673456789024', 87643, '2018-11-28 14:32:06', 'credit'),
(17, 3, '5673456789024', 4333, '2018-11-28 14:32:06', 'debit'),
(18, 3, '5673456789024', 1029, '2018-11-28 14:32:11', 'credit'),
(19, 4, '6743590870015', 6000, '2018-11-28 14:32:11', 'debit'),
(20, 4, '6743590870015', 59222, '2018-11-28 14:32:11', 'credit'),
(21, 3, '5673456789024', 87643, '2018-11-28 14:32:11', 'credit'),
(22, 3, '5673456789024', 4333, '2018-11-28 14:32:11', 'debit'),
(23, 5, '123456789123457', 30006, '2018-11-29 03:32:51', 'debit'),
(24, 5, '123456789123457', 56758, '2018-11-29 03:32:51', 'credit'),
(25, 3, '5673456789024', 100, '2018-11-29 04:37:05', 'credit'),
(26, 3, '5673456789024', 100, '2018-11-29 04:37:51', 'credit'),
(27, 7, '679546323456890', 765, '2018-11-29 09:32:30', 'debit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `act_no` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `ifsc` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `act_no`, `bank_name`, `ifsc`, `mobile_no`, `balance`) VALUES
(1, 'Shajahan U P', '123456789123456', 'IOB', 'ZXCSD12345643', '9567805190', 38000),
(2, 'Amal Mohammed', '679546346865145', 'SBI', 'GTRDT67456234', '7736360361', 700),
(3, 'Anjoom Sahil K', '5673456789024', 'SBI', 'TYREI53245671', '6753425689', 50300),
(4, 'Binoy C Darvin', '6743590870015', 'HDFC', 'RTYUD75312345', '7902204114', 240000),
(5, 'Shajahan U P', '123456789123457', 'SBI', 'SDERT653489iO', '9567805190', 380000),
(6, 'Shajahan U P', '7895423458167', 'UBI', 'TYUDG7635TY89', '9567805190', 300000),
(7, 'Binoy C Darvin', '679546323456890', 'TRUTH', 'MNLPT67456078', '9576081509', 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
