-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 09:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '5c428d8875d2948607f3e3fe134d71b4', '2023-05-25 12:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(20) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `driverid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`, `driverid`) VALUES
(3, 437759901, 'sample123@gmail.com', 13, '2023-05-15', '2023-05-16', 'hello test123', 2, '2023-05-15 08:11:53', '2023-06-02 00:54:33', ''),
(4, 477903820, 'sample123@gmail.com', 14, '2023-05-18', '2023-05-19', 'test123', 1, '2023-05-15 08:19:34', '2023-06-02 03:02:51', ''),
(5, 505130688, 'sample123@gmail.com', 9, '2023-05-16', '2023-05-17', 'hello', 2, '2023-05-16 13:52:44', '2023-06-02 02:57:28', ''),
(6, 672265161, 'greg@test.com', 11, '2023-05-21', '2023-05-21', 'testing', 1, '2023-05-19 11:49:51', '2023-05-19 11:50:45', ''),
(7, 563946827, 'greg@test.com', 12, '2023-05-23', '2023-05-24', 'For tomorrow', 1, '2023-05-23 12:39:47', '2023-06-01 12:31:30', ''),
(8, 406098074, 'alex.ang@kodego.ph', 9, '2023-05-25', '2023-05-27', 'sample', 2, '2023-05-25 11:48:38', '2023-06-01 13:05:46', ''),
(9, 229332238, 'sample123@gmail.com', 0, '2023-05-27', '2023-05-28', 'test', 0, '2023-05-26 22:09:43', NULL, 'Surety_Logo1.png'),
(10, 212601144, 'sample123@gmail.com', 11, '2023-06-02', '2023-06-03', 'sample', 0, '2023-06-02 03:00:05', NULL, 'kimjayson_web_developer_1d6f8941-a0c0-47fb-95f1-219c738303ff.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(8, 'Yamaha', '2023-05-15 07:55:39', NULL),
(9, 'Suzuki', '2023-05-15 07:55:42', NULL),
(10, 'Kawasaki', '2023-05-15 07:55:45', NULL),
(11, 'Honda', '2023-05-15 07:55:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(2, '145 M. L. Quezon St, Taguig, 1632 Metro Manila', 'info@suretymotorental.com', '09876543210');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'kim ', 'kim@gmail.com', '0987765432', 'hello test123', '2023-05-15 08:06:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '																														<h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">TERMS AND CONDITIONS</span></h2><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\">Surety Motorbikes – commercial trademark propriety of SuretyMotorbikes ou (Reg.Code:143444789) (hereinafter referred to as the Company or ‘we\' or ‘us\') is presenting to you the terms and conditions. They may be amended from time to time, and they apply to all our services directly or indirectly (through our partners) made available online. By accessing, browsing, or using our website, you are assumed to have read and understood the terms and conditions set out below.</p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p><h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">PAYMENT DEPOSIT, DRIVER\'S LICENSE, PASSPORT, AND LIMITATIONS</span></h2><p align=\"justify\"><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">1. Most rental owner/company requires a deposit for the motorbike such as cash, your ID, or passport, at the start of the rental to cover the liability excess, any charges incurred during the rental, and in some cases, fuel.</span><br><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">2. Every driver must be at the legal age of 18 and above and have a valid driving license and passport before renting. Expired licenses will not be accepted. Get your license checked at a local police station before riding the motorbike. You must always carry your original driving license with you.</span><br><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">3. Some rental owner/company requires that you return the rented vehicle with a full tank. Please confirm this with the rental owner/company first before renting.</span><br><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">4. Occasionally, it may be necessary for changes to be made to your booking (after acceptance) by us or by the rental owner/company. In case of any changes, we will advise you as reasonably as possible before pick up. However, in such circumstances, we shall have no additional liability in respect of any direct or indirect losses you may suffer as a result of such changes.</span><br><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">5. Restrictions may apply when taking a&nbsp; motorbike to a different city, or province. Before taking the vehicle to a different city, or province, ask the rental owner/company.</span><br><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\">6. The rental owner/company has a complete right to refuse in lending the vehicle to any person who is considered unfit to drive or does not meet eligibility requirements. We will not be held liable for the completion of travel arrangements, refunds, compensation, damages, or any other costs you, the renter, may have to pay in such a case.</span></p><div><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\"><br></span></div><div><span style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\"><br></span></div><div><h3 class=\"jsx-3588498993\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-weight: bold; font-size: x-large;\">The vehicle renter must not:</span></h3><div><section id=\"deposit_license_limit\" class=\"jsx-3588498993\" style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><ol class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px;\"><li class=\"jsx-3588498993\">1. Use the vehicle for any illegal purposes.</li><li class=\"jsx-3588498993\">2. Overload the vehicle.</li><li class=\"jsx-3588498993\">3. Use the vehicle if he/she may reasonably be considered unfit to drive.</li><li class=\"jsx-3588498993\">4. Use the vehicle whilst under the influence of alcohol or drugs.</li><li class=\"jsx-3588498993\">5. Use the vehicle for racing, speed testing, or teaching to drive.</li><li class=\"jsx-3588498993\">6. Use the vehicle off-road or on racetracks.</li><li class=\"jsx-3588498993\">7. Use the vehicle for carrying fare-paying passengers.</li></ol><div style=\"font-size: 16px;\"><br></div><div style=\"font-size: 16px;\">If you are dissatisfied in any way with your rental, please inform the rental owner/company as soon as possible. You may also file a complaint to our Customer Service team<br></div><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px;\"><br></p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px;\"><br></p><h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">RENTER RESPONSIBILITIES</span></h2><div><span style=\"font-size: x-large; font-weight: bold;\"><br></span></div><ol class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px;\"><li class=\"jsx-3588498993\">1. To avoid theft, the renter must look after the vehicle and the keys to the vehicle at all times. The renter shall leave the vehicle only in secured parking areas and must use all security devices fitted to and supplied with the vehicle.</li><li class=\"jsx-3588498993\">2. The renter must always protect the vehicle against bad weather, which can cause damage.</li><li class=\"jsx-3588498993\">3. The renter should avoid riding the vehicle near or by the beach as the salty water can cause rust and damage to the vehicle.</li><li class=\"jsx-3588498993\">4. The renter must make sure to use the correct fuel and engine oil for the vehicle.</li><li class=\"jsx-3588498993\">5. The renter must not sell, rent or dispose of the vehicle or any of its parts.</li><li class=\"jsx-3588498993\">6. The renter must let Book2Wheel know without delay and no later than 24 hours when he/she becomes aware of a fault in the vehicle. The vehicle renter must not let anyone work on the vehicle without the permission of the owner/company and Book2Wheel. If the owner/company gives the renter permission, a refund can be acknowledged if the renter has a valid receipt for the work. Failure to comply shall engage the responsibility of the renter for any expenses required to repair the vehicle or bring the vehicle into compliance with legal regulations.</li><li class=\"jsx-3588498993\">7. For rental periods over a week or 2000 km, the renter shall conduct basic checks every 500 km (i.e. oil &amp; coolant level, tire pressure, chain tension &amp; grease).</li><li class=\"jsx-3588498993\">8. If you are renting a bicycle, check if it has two brakes and front/back lights, check if the tires are not flat before you leave the owner\'s location, and if the chain has good tension on it.</li><li class=\"jsx-3588498993\">9. The renter must comply with national traffic laws and regulations.</li><li class=\"jsx-3588498993\">10. The renter must carry his/her motorbike driving license with him at all times.&nbsp;</li></ol></section><section id=\"owner_resp\" class=\"jsx-3588498993\" style=\"color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 16px;\"></section></div><div><span style=\"font-size: x-large; font-weight: bold;\"><br></span></div><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p></div><p align=\"justify\"><span style=\"font-size: x-large; font-family: helvetica;\"></span></p>\r\n\r\n\r\n										\r\n										\r\n										'),
(2, 'Privacy Policy', 'policy', '																														<h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">test</span></h2><h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">WE PROTECT YOU AND THE SURETYMOTORBIKES COMMUNITY</span></h2><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\">We do our best to keep you safe by reviewing messages on the SuretyMotorbikes platform. We will block potentially dangerous messages that contain words or numbers that might include contact information or references to other sites, including external links. You can help. If you get a suspicious message, let us know by reporting it or flagging it in your inbox.</p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p><h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">UPLOADING IMAGES ON SURETYMOTORBIKES</span></h2><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\">By uploading your vehicle on SuretyMotorbikes you give the right to SuretyMotorbikes to publish images on social media and create ads.</p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\">You must only upload an actual image of your motorcycle which should not be copied from the Internet. If you have shared another person\'s image and violated the privacy laws you will face legal consequences.</p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p><h2 class=\"jsx-3588498993 header-anchor h4 text-uppercase\" style=\"font-family: Roboto, sans-serif; line-height: 1.2; color: rgb(33, 37, 41); margin-top: 0px; margin-bottom: 0.5rem;\"><span style=\"font-size: x-large; font-weight: bold;\">ANALYZING YOUR COMMUNICATIONS</span></h2><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\">We may review, scan, or analyze your communications on the SuretyMotorbikes Platform for reasons outlined in the \'Processing personal data\' section of this policy, including fraud prevention, risk assessment, regulatory compliance, investigation, product development, research, analytics, enforcing our Terms of Service, and customer support purposes. For example, as part of our fraud prevention efforts, we scan and analyze messages to mask contact information and references to other sites. In some cases, we may also scan, review, or analyze messages to debug, improve, and expand product offerings. We use automated methods where reasonably possible. Occasionally we may need to manually review communications, such as for fraud investigations and customer support, or to assess and improve the functionality of these automated tools. We will not review, scan, or analyze your messaging communications to send third-party marketing messages to you and we will not sell reviews or analyses of these communications.</p><p class=\"jsx-3588498993\" style=\"margin-bottom: 1rem; font-size: 16px; color: rgb(33, 37, 41); font-family: Roboto, sans-serif;\"><br></p>\r\n										\r\n										'),
(3, 'About Us ', 'aboutus', '<div><span style=\"color: rgb(85, 85, 85); font-family: Ruda, sans-serif; font-size: large;\">Welcome to Surety Motorbikes, a motorcycle rental company that offers the best bikes for your riding pleasure. Our motorcycles are well-maintained and of high quality, ensuring that you have a safe and enjoyable ride. At Surety Motorbikes, we believe that riding is not just a means of transportation, but a way of life. We offer a wide range of motorcycles to cater to your individual needs and preferences. Whether you are a seasoned rider or a beginner, we have the perfect bike for you.</span><span style=\"color: rgb(52, 52, 52); font-family: Arial, Helvetica, sans-serif;\"><br></span></div>\r\n										'),
(11, 'FAQs', 'faqs', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(6, 'sample123@gmail.com', '2023-05-15 08:06:50');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(2, 'sample123@gmail.com', 'Hello test123', '2023-05-15 07:55:00', 0),
(3, 'nick@email.com', 'Easy pick-up/drop-off. Motorcycle in good condition, full luggage options.', '2023-05-18 09:32:37', 1),
(4, 'martin@email.com', 'Everything went smoothly and without any problems. The service in Suretymotorbike was great. I will certainly contact you again for my next booking.', '2023-05-18 09:34:52', 1),
(5, 'maciej@email.com', 'Thank you very much for the rental, the staff is very communicative and speaks English, I recommend it', '2023-05-18 09:37:47', 1),
(6, 'herbert@email.com', 'Excellent service, fast and uncomplicated. Multilingual, very friendly, and professional staff.', '2023-05-18 09:40:15', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(2, 'kim', 'sample123@gmail.com', 'a141c47927929bc2d1fb6d336a256df4', '0987654321-', '', '145 M. L. Quezon St, Taguig, 1632 Metro Manila', 'Taguig', NULL, '2023-05-15 07:54:15', '2023-05-15 07:54:41'),
(3, 'test123', 'test@gmail.com', 'a141c47927929bc2d1fb6d336a256df4', '0987654321', NULL, NULL, NULL, NULL, '2023-05-15 08:12:37', NULL),
(4, 'gegie ', 'ggdd06112008@gmail.com', '7c10954bd46173e10386cdc10e1a5490', '9271887671', NULL, NULL, NULL, NULL, '2023-05-16 17:40:10', NULL),
(5, 'nick', 'nick@email.com', 'a141c47927929bc2d1fb6d336a256df4', '9876543210', NULL, NULL, NULL, NULL, '2023-05-18 09:31:51', NULL),
(6, 'martin', 'martin@email.com', 'a141c47927929bc2d1fb6d336a256df4', '9876543211', NULL, NULL, NULL, NULL, '2023-05-18 09:33:22', NULL),
(7, 'maciej', 'maciej@email.com', 'a141c47927929bc2d1fb6d336a256df4', '9876543212', NULL, NULL, NULL, NULL, '2023-05-18 09:36:32', NULL),
(8, 'herbert', 'herbert@email.com', 'a141c47927929bc2d1fb6d336a256df4', '9876543216', NULL, NULL, NULL, NULL, '2023-05-18 09:39:32', NULL),
(9, 'John Paolo Condes Florano', 'johnpaoloflorano@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9196760589', NULL, NULL, NULL, NULL, '2023-05-19 09:23:46', NULL),
(10, 'Greg A', 'greg@test.com', '098f6bcd4621d373cade4e832627b4f6', '0906235434', NULL, NULL, NULL, NULL, '2023-05-19 11:43:06', NULL),
(12, 'Alex', 'alex.ang@kodego.ph', '827ccb0eea8a706c4c34a16891f84e7b', '82134194', NULL, NULL, NULL, NULL, '2023-05-25 11:47:01', NULL),
(13, 'admin', 'admin@email.com', '0192023a7bbd73250516f069df18b500', '09999999999', NULL, NULL, NULL, NULL, '2023-05-31 08:44:06', NULL),
(14, 'admin', 'admin@gmail.com', '66d4aaa5ea177ac32c69946de3731ec0', 'admin', NULL, NULL, NULL, NULL, '2023-06-01 13:23:32', NULL);

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
  `ModelYear` int(11) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `helmet` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `raincoat` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `phoneholder` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `phonecharger` int(11) DEFAULT NULL,
  `ndhelmet` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `ndraincoat` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `helmet`, `PowerDoorLocks`, `raincoat`, `BrakeAssist`, `phoneholder`, `DriverAirbag`, `PassengerAirbag`, `phonecharger`, `ndhelmet`, `CentralLocking`, `CrashSensor`, `ndraincoat`, `RegDate`, `UpdationDate`) VALUES
(9, 'CBR 150R', 11, 'Honda CBR 150R', 1000, 'Manual', 2023, 2, 'Honda CBR150R.jpeg', 'honda cbr150r - 1.jpg', 'honda cbr150r - 2.jpg', 'honda cbr150r - 3.jpg', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-15 07:06:31', '2023-05-30 04:46:04'),
(10, 'ZX-10R', 10, 'Kawasaki ZX-10R', 2500, 'Manual', 2023, 2, 'Kawasaki Ninja ZX-10R.jpg', 'Kawasaki Ninja ZX-10R - 1.jpg', 'Kawasaki Ninja ZX-10R - 2.jpg', 'Kawasaki Ninja ZX-10R - 3.jpg', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-15 07:09:26', '2023-05-28 09:29:56'),
(11, 'Burgman Street', 9, 'Suzuki Burgman Street', 500, 'Automatic', 2023, 2, 'Suzuki Burgman Street.png', 'Suzuki Burgman - 1.png', 'Suzuki Burgman - 2.png', 'Suzuki Burgman - 3.png', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2023-05-15 07:16:13', '2023-05-28 09:30:15'),
(12, 'Nmax', 8, 'Yamaha Nmax', 500, 'Automatic', 2023, 2, 'Yamaha NMAX.jpg', 'Yamaha NMAX - 1.jpg', 'Yamaha NMAX - 2.png', 'Yamaha NMAX - 3.png', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-05-15 07:16:59', '2023-05-28 09:30:35'),
(13, 'TMAX', 8, 'Yamaha TMAX', 2000, 'Automatic', 2023, 2, 'Yamaha TMAX.jpg', 'Yamaha TMAX - 1.jpg', 'Yamaha TMAX - 2.jpg', 'Yamaha TMAX - 3.jpg', NULL, 1, NULL, 1, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, 1, '2023-05-15 07:18:10', '2023-05-28 09:31:02'),
(14, 'Xmax', 8, 'Yamaha Xmax', 1000, 'Automatic', 2023, 2, 'Yamaha XMAX.png', 'Yamaha XMAX - 1.jpg', 'Yamaha XMAX - 2.jpg', 'Yamaha XMAX - 3.jpg', NULL, 1, NULL, 1, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-05-15 07:19:07', '2023-05-28 09:31:21'),
(15, 'barako', 10, 'kawasaki barako', 1000, 'Manual', 2023, 2, 'Kawasaki Barako II.png', 'kawasaki barako II - 1.jpg', 'kawasaki barako II - 2.jpg', 'kawasaki barako II - 3.jpg', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-05-25 11:39:02', '2023-05-28 09:31:43'),
(16, 'Suzuki Avenis ', 9, 'Suzuki Avenis is very Fuel-efficient (54 KM/L) and offers *** rides with wide and soft seats for your road trips. Lots of storage space and optional 45l Top-box. The requirement for Foreign nationals is only a deposit. I prefer 2 days minimum if it\'s a long weekend. Units are always serviced to ensure good running condition.', 1000, 'Automatic', 2023, 2, 'suzuki avenis 125.jpg', 'suzuki avenis 1.jpg', 'suzuki avenis 2.jpg', 'suzuki avenis 3.jpg', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-01 10:58:10', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
