-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2023 at 02:34 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_cars`
--

CREATE TABLE `added_cars` (
  `car_id` varchar(255) NOT NULL,
  `car_model` varchar(255) NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `capacity` int(255) NOT NULL,
  `rent` int(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `added_cars`
--

INSERT INTO `added_cars` (`car_id`, `car_model`, `car_number`, `capacity`, `rent`, `availability`, `added_by`) VALUES
('6428ff981fed1', 'Toyota Fortuner', '78541', 20, 2000, 'no', 'agency1@gmail.com'),
('6429790f2e366', 'Skoda Kushaq', '4523', 5, 2000, 'no', 'agency1@gmail.com'),
('6429792788c39', 'BMW X3', '7845', 2, 4000, 'yes', 'agency1@gmail.com'),
('64297ceb9b007', 'Mahindra XUV700', '784512', 5, 5000, 'no', 'agency2@gmail.com'),
('64297d10b3d6e', 'Tata Harrier', '124332', 8, 8000, 'no', 'agency2@gmail.com'),
('64297d235a8b8', 'Maruti Baleno', '7845', 20, 20000, 'no', 'agency2@gmail.com'),
('64297d40b76b4', 'Maruti Alto 800', '1245', 6, 6500, 'yes', 'agency2@gmail.com'),
('642a3643aef3e', 'Land Rover Defender', '4578', 6, 10000, 'no', 'agency3@gmail.com'),
('642a376077f47', 'Mercedes-Benz GLA', '12345', 3, 3000, 'yes', 'agency3@gmail.com'),
('642a377c94a2d', 'Jeep Wrangler', '2004', 6, 3000, 'yes', 'agency3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `sno` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_ques` varchar(255) NOT NULL,
  `security_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`sno`, `email`, `password`, `security_ques`, `security_ans`) VALUES
(8, 'agency1@gmail.com', '123456', 'Your Pet name', 'snoopy'),
(10, 'agency2@gmail.com', '123456', 'Your Nickname', 'agency2'),
(11, 'agency3@gmail.com', 'agency3', 'Your Pet name', 'ku');

-- --------------------------------------------------------

--
-- Table structure for table `booked_cars`
--

CREATE TABLE `booked_cars` (
  `car_id` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `no_of_days` int(255) NOT NULL,
  `booked_customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_cars`
--

INSERT INTO `booked_cars` (`car_id`, `start_date`, `no_of_days`, `booked_customer`) VALUES
('6429790f2e366', '2023-04-02', 5, 'test@gmail.com'),
('6428ff981fed1', '2023-04-02', 2, 'test@gmail.com'),
('64297d235a8b8', '2023-04-02', 4, 'test@gmail.com'),
('64297d10b3d6e', '2023-04-02', 2, 'test@gmail.com'),
('64297ceb9b007', '2023-04-03', 11, 'test@gmail.com'),
('642a3643aef3e', '2023-04-03', 3, 'customer1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `sno` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_ques` varchar(255) NOT NULL,
  `security_ans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`sno`, `email`, `password`, `security_ques`, `security_ans`) VALUES
(6, 'test@gmail.com', '123456', 'Your Nickname', 'test'),
(8, 'customer1@gmail.com', 'customer1', 'Your Favourite place', 'Kerala');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
