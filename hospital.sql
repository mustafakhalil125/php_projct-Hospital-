-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 12:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin login`
--

CREATE TABLE `admin login` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin login`
--

INSERT INTO `admin login` (`id`, `email`, `password`, `name`, `image`) VALUES
(0, 'admin@gmail.com', 'admin', 'Mustafa Khalil', 'IMG_20240421_201851_351 (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `dr name` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `department`, `dr name`, `name`, `number`, `time`, `date`, `email`) VALUES
(0, 'opop', 'dr,name', 'ryrsu6h', '03351256817', '04:37:00', '2024-09-26', 'karachi@gmail.com'),
(33, 'OPO', 'Dr. Abdul Qadeer Khan', 'moizkhan', '03351256817', '11:55:00', '2024-09-19', 'abdul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `docter_reg`
--

CREATE TABLE `docter_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `kind` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `docter_reg`
--

INSERT INTO `docter_reg` (`id`, `name`, `kind`, `email`, `password`, `description`, `image`) VALUES
(20, 'Dr. Abdul Qadeer Khan', 'Neurologists', 'abdul@gmail.com', 'abdul12345', 'Although primarily known for his contributions to nuclear science and technology, Dr. Khan has been involved in various medical research initiatives and has supported medical infrastructure in Pakistan.', 'download.webp');

-- --------------------------------------------------------

--
-- Table structure for table `pateint reg`
--

CREATE TABLE `pateint reg` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pateint reg`
--

INSERT INTO `pateint reg` (`id`, `email`, `name`, `password`, `image`) VALUES
(12, 'karachi@gmail.com', 'Mustafa Khalil', '12345678', 'IMG_20240421_201851_351 (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `service` varchar(200) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `doctor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `service`, `detail`, `doctor`) VALUES
(1, 'doctor-checking-patient-hospital.jpg', 'Emergency Services', 'Emergency Room (ER): Immediate care for urgent and life-threatening conditions.\r\nTrauma Care: Specialized treatment for severe injuries.\r\nAmbulance Services: Transport for patients requiring urgent me', 'Dr. Abdul Qadeer Khan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin login`
--
ALTER TABLE `admin login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docter_reg`
--
ALTER TABLE `docter_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pateint reg`
--
ALTER TABLE `pateint reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin login`
--
ALTER TABLE `admin login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `docter_reg`
--
ALTER TABLE `docter_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pateint reg`
--
ALTER TABLE `pateint reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
