-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 12:58 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `med_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `med_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `med_id`, `qty`) VALUES
('itibera5@gmail.com', 'MED1629808397', '3');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `composition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uses` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `side_effects` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `name`, `company`, `quantity`, `price`, `composition`, `images`, `uses`, `type`, `category`, `side_effects`, `description`) VALUES
('MED1629808397', 'Ecosprin 75mg Strip Of 14 Tablets', 'USV PVT LTD', '14 Tablet in Strip', '5.00', 'Aspirin, Acetyl Salicylic Acid (75 mg)', 'ecosprin-75mg-strip-of-14-tablets-box-front-1-1607336525.jpg', 'For prevention of heart attack, clot-related stroke (ischemic), heart conditions like stable or unstable angina (chest pain).', 'Anti-platelet', 'Tablet', 'Indigestion\r\nNausea\r\nVomiting\r\nDiarrhoea\r\nIncreased risk of bleeding', 'Ecosprin 75 tablet is an antiplatelet medicine (blood thinner). Ecosprin 75 contains aspirin as its active ingredient. It is used to prevent the risk of heart attacks, stroke and angina by interfering with blood clot formation. It works by slowing down blood clotting and hence prevents the formation of blood clots within blood vessels. Before initiating treatment with the Ecosprin 75 tablet inform your doctor about your complete medical and medication history. The dose and duration of the treatment will be decided by the treating doctor. It\'s best to take this medicine with food so it doesn\'t upset your stomach. Avoid missing any dose of the Ecosprin 75 tablet. While taking this medicine you can incorporate certain lifestyle modifications to boost your health such as quitting smoking, limiting alcohol consumption, regular exercise and eating a healthy balanced diet.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`med_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
