-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 07:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicine`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, '01', 'crocin', 'Muscle ache (like generalized body pain, back pain, neck pain, shoulder pain etc.)\r\n\r\nMusculoskeletal pain.\r\n\r\nJoint Pain.\r\n\r\nToothache', 'crocin.jpg', '10.00'),
(2, '02', 'Eno', 'Eno is the leader in antacid category as it is taken to provide instant relief from acidity, gastric discomfort and heartburn. The fast acting effervescent fruit salts, used as an antacid and reliever for bloating, flatulence, stomach gas, upset. Eno is a', 'eno.jpg', '7.00'),
(3, '03', 'paracetemol', 'Paracetamol (acetaminophen) is a pain reliever and a fever reducer. \r\nThe exact mechanism of action of is not known. \r\nParacetamol is used to treat many conditions such as headache, muscle aches, arthritis, backache, toothaches, colds, and fevers.', 'paracetemol.jpg', '50.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
