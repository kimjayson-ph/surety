-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 03:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `suretymotorental`
--

-- --------------------------------------------------------
--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`)
VALUES (
    1,
    'admin',
    '5c428d8875d2948607f3e3fe134d71b4',
    '2017-06-18 04:22:38'
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `uploadid` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (
    `id`,
    `BookingNumber`,
    `userEmail`,
    `VehicleId`,
    `FromDate`,
    `ToDate`,
    `message`,
    `Status`,
    `PostingDate`,
    `LastUpdationDate`,
    `uploadid`
  )
VALUES (
    3,
    273619088,
    'sample123@gmail.com',
    9,
    '2023-05-16',
    '2023-05-17',
    'hello',
    0,
    '2023-05-16 12:40:31',
    NULL,
    ''
  ),
  (
    4,
    297976347,
    'sample123@gmail.com',
    11,
    '2023-05-18',
    '2023-05-19',
    'hi',
    0,
    '2023-05-17 19:23:21',
    NULL,
    ''
  ),
  (
    5,
    245691100,
    'sample123@gmail.com',
    12,
    '2023-05-18',
    '2023-05-19',
    'hii',
    0,
    '2023-05-17 19:30:17',
    NULL,
    ''
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (
    `id`,
    `BrandName`,
    `CreationDate`,
    `UpdationDate`
  )
VALUES (8, 'Yamaha', '2023-05-15 07:05:15', NULL),
  (9, 'Suzuki', '2023-05-15 07:05:17', NULL),
  (10, 'Kawasaki', '2023-05-15 07:05:20', NULL),
  (11, 'Honda', '2023-05-15 07:05:22', NULL);
-- --------------------------------------------------------
--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`)
VALUES (
    1,
    '145 M. L. Quezon St, Taguig, 1632 Metro Manila',
    'info@suretymotorental.com',
    '09876543210'
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
-- --------------------------------------------------------
--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`)
VALUES (
    1,
    'Terms and Conditions',
    'terms',
    '																														<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\"><strong style=\"\"><font color=\"#990000\" style=\"\">(1) ACCEPTANCE OF TERMS</font></strong></span></p></blockquote><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\"><strong style=\"\"><br></strong></span></p></blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\">Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <a href=\"http://in.docs.yahoo.com/info/terms/\" style=\"\">http://in.docs.yahoo.com/info/terms/</a>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </span></p></blockquote></blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <a href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</a>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </span></p></blockquote></blockquote><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <a href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</a>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </span></p></blockquote></blockquote></blockquote><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\"></span></p>\r\n\r\n\r\n										\r\n										\r\n										'
  ),
  (
    2,
    'Privacy Policy',
    'policy',
    '																																																		<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\"><span style=\"color: rgb(0, 0, 0); text-align: justify; font-size: x-large; font-family: helvetica;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span></div></blockquote></blockquote>																				\r\n										\r\n										\r\n										\r\n										\r\n										'
  ),
  (
    3,
    'About Us ',
    'aboutus',
    '																																																																																<div><span style=\"color: rgb(85, 85, 85); font-family: Ruda, sans-serif; font-size: large;\">Welcome to Surety Motorbikes, a motorcycle rental company that offers the best bikes for your riding pleasure. Our motorcycles are well-maintained and of high quality, ensuring that you have a safe and enjoyable ride. At Surety Motorbikes, we believe that riding is not just a means of transportation, but a way of life. We offer a wide range of motorcycles to cater to your individual needs and preferences. Whether you are a seasoned rider or a beginner, we have the perfect bike for you.</span><br></div>\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'
  ),
  (
    11,
    'FAQs',
    'faqs',
    '																																																																						<blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><blockquote style=\"margin: 0 0 0 40px; border: none; padding: 0px;\"><div style=\"text-align: left;\"><span style=\"font-size: xx-large; font-family: helvetica;\">FAQ:</span></div><div style=\"text-align: left;\"><span style=\"color: rgb(32, 33, 36); white-space: pre-wrap; font-size: x-large; font-family: helvetica;\">How can I ensure that my motorbike/car will not get stolen or broken by renter?</span><br></div></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										\r\n										'
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`)
VALUES (6, 'sample123@gmail.com', '2023-05-15 07:04:48');
-- --------------------------------------------------------
--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (
    `id`,
    `UserEmail`,
    `Testimonial`,
    `PostingDate`,
    `status`
  )
VALUES (
    2,
    'sample123@gmail.com',
    'Hello test123',
    '2023-05-15 07:02:37',
    1
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (
    `id`,
    `FullName`,
    `EmailId`,
    `Password`,
    `ContactNo`,
    `dob`,
    `Address`,
    `City`,
    `Country`,
    `RegDate`,
    `UpdationDate`
  )
VALUES (
    2,
    'kim',
    'sample123@gmail.com',
    'a141c47927929bc2d1fb6d336a256df4',
    '09876543210',
    '',
    '145 M. L. Quezon St, Taguig, 1632 Metro Manila',
    'Taguig',
    NULL,
    '2023-05-15 07:01:47',
    '2023-05-15 07:02:11'
  ),
  (
    3,
    'kim jayson bron sebastian',
    'kim@gmail.com',
    'a141c47927929bc2d1fb6d336a256df4',
    '9218688410',
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-16 12:52:53',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;
--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (
    `id`,
    `VehiclesTitle`,
    `VehiclesBrand`,
    `VehiclesOverview`,
    `PricePerDay`,
    `FuelType`,
    `ModelYear`,
    `SeatingCapacity`,
    `Vimage1`,
    `Vimage2`,
    `Vimage3`,
    `Vimage4`,
    `Vimage5`,
    `AirConditioner`,
    `PowerDoorLocks`,
    `AntiLockBrakingSystem`,
    `BrakeAssist`,
    `PowerSteering`,
    `DriverAirbag`,
    `PassengerAirbag`,
    `PowerWindows`,
    `CDPlayer`,
    `CentralLocking`,
    `CrashSensor`,
    `LeatherSeats`,
    `RegDate`,
    `UpdationDate`
  )
VALUES (
    9,
    'CBR 150R',
    11,
    'Honda CBR 150R',
    500,
    NULL,
    2023,
    NULL,
    'Honda CBR150R.jpeg',
    'honda cbr150r - 1.jpg',
    'honda cbr150r - 2.jpg',
    'honda cbr150r - 3.jpg',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:06:31',
    '2023-05-17 19:34:10'
  ),
  (
    10,
    'ZX-10R',
    10,
    'Kawasaki ZX-10R',
    500,
    NULL,
    2023,
    NULL,
    'Kawasaki Ninja ZX-10R.jpg',
    'Kawasaki Ninja ZX-10R - 1.jpg',
    'Kawasaki Ninja ZX-10R - 2.jpg',
    'Kawasaki Ninja ZX-10R - 3.jpg',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:09:26',
    NULL
  ),
  (
    11,
    'Burgman Street',
    9,
    'Suzuki Burgman Street',
    500,
    NULL,
    2023,
    NULL,
    'Suzuki Burgman Street.png',
    'Suzuki Burgman - 1.png',
    'Suzuki Burgman - 2.png',
    'Suzuki Burgman - 3.png',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:16:13',
    NULL
  ),
  (
    12,
    'Nmax',
    8,
    'Yamaha Nmax',
    500,
    NULL,
    2023,
    NULL,
    'Yamaha NMAX.jpg',
    'Yamaha NMAX - 1.jpg',
    'Yamaha NMAX - 2.png',
    'Yamaha NMAX - 3.png',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:16:59',
    NULL
  ),
  (
    13,
    'TMAX',
    8,
    'Yamaha TMAX',
    1000,
    NULL,
    2023,
    NULL,
    'Yamaha TMAX.jpg',
    'Yamaha TMAX - 1.jpg',
    'Yamaha TMAX - 2.jpg',
    'Yamaha TMAX - 3.jpg',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:18:10',
    NULL
  ),
  (
    14,
    'Xmax',
    8,
    'Yamaha Xmax',
    1000,
    NULL,
    2023,
    NULL,
    'Yamaha XMAX.png',
    'Yamaha XMAX - 1.jpg',
    'Yamaha XMAX - 2.jpg',
    'Yamaha XMAX - 3.jpg',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '2023-05-15 07:19:07',
    NULL
  );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);
--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 22;
--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;