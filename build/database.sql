-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 18, 2023 at 05:28 PM
-- Server version: 10.11.2-MariaDB-1:10.11.2+maria~ubu2204
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview-challenge`
--
CREATE DATABASE IF NOT EXISTS `interview-challenge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `interview-challenge`;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `vehicle_id`, `description`) VALUES
(1, 781, '4 Speakers'),
(2, 781, 'AM/FM radio: SiriusXM'),
(3, 781, 'Radio: Subaru STARLINK Dual 7.0\" Multimedia System'),
(4, 781, 'Air Conditioning'),
(5, 781, 'Automatic temperature control'),
(6, 781, 'Rear window defroster'),
(7, 781, 'Power steering'),
(8, 781, 'Power windows'),
(9, 781, 'Remote keyless entry'),
(10, 781, 'Steering wheel mounted audio controls'),
(11, 781, 'Four wheel independent suspension'),
(12, 781, 'Speed-sensing steering'),
(13, 781, 'Traction control'),
(14, 781, '4-Wheel Disc Brakes'),
(15, 781, 'ABS brakes'),
(16, 781, 'Dual front impact airbags'),
(17, 781, 'Dual front side impact airbags'),
(18, 781, 'Front anti-roll bar'),
(19, 781, 'Knee airbag'),
(20, 781, 'Low tire pressure warning'),
(21, 781, 'Occupant sensing airbag'),
(22, 781, 'Overhead airbag'),
(23, 781, 'Rear anti-roll bar'),
(24, 781, 'Brake assist'),
(25, 781, 'Electronic Stability Control'),
(26, 781, 'Exterior Parking Camera Rear'),
(27, 781, 'Auto High-beam Headlights'),
(28, 781, 'Fully automatic headlights'),
(29, 781, 'Panic alarm'),
(30, 781, 'Security system'),
(31, 781, 'Speed control'),
(32, 781, 'Bumpers: body-color'),
(33, 781, 'Power door mirrors'),
(34, 781, 'Roof rack'),
(35, 781, 'Splash Guards'),
(36, 781, 'Spoiler'),
(37, 781, 'Steering Wheel Paddle Shift Control Switches'),
(38, 781, 'All-Weather Floor Liners'),
(39, 781, 'Driver door bin'),
(40, 781, 'Driver vanity mirror'),
(41, 781, 'Front reading lights'),
(42, 781, 'Illuminated entry'),
(43, 781, 'Outside temperature display'),
(44, 781, 'Overhead console'),
(45, 781, 'Passenger vanity mirror'),
(46, 781, 'Rear seat center armrest'),
(47, 781, 'STARLINK/Apple CarPlay/Android Auto'),
(48, 781, 'Tachometer'),
(49, 781, 'Telescoping steering wheel'),
(50, 781, 'Tilt steering wheel'),
(51, 781, 'Trip computer'),
(52, 781, 'Cloth Upholstery'),
(53, 781, 'Front Bucket Seats'),
(54, 781, 'Split folding rear seat'),
(55, 781, 'Front Center Armrest w/Storage'),
(56, 781, 'Passenger door bin'),
(57, 781, 'Alloy wheels'),
(58, 781, 'Wheels: 17\" x 7J Black Aluminum Alloy'),
(59, 781, 'Rear window wiper'),
(60, 781, 'Variably intermittent wipers'),
(61, 883, 'Air Conditioning'),
(62, 883, 'Automatic temperature control'),
(63, 883, 'Rear window defroster'),
(64, 883, 'Power steering'),
(65, 883, 'Power windows'),
(66, 883, 'Remote keyless entry'),
(67, 883, 'Steering wheel mounted audio controls'),
(68, 883, 'Four wheel independent suspension'),
(69, 883, 'Speed-sensing steering'),
(70, 883, 'Traction control'),
(71, 883, '4-Wheel Disc Brakes'),
(72, 883, 'ABS brakes'),
(73, 883, 'Dual front impact airbags'),
(74, 883, 'Dual front side impact airbags'),
(75, 883, 'Front anti-roll bar'),
(76, 883, 'Knee airbag'),
(77, 883, 'Low tire pressure warning'),
(78, 883, 'Occupant sensing airbag'),
(79, 883, 'Overhead airbag'),
(80, 883, 'Rear anti-roll bar'),
(81, 883, 'Brake assist'),
(82, 883, 'Electronic Stability Control'),
(83, 883, 'Exterior Parking Camera Rear'),
(84, 883, 'Auto High-beam Headlights'),
(85, 883, 'Fully automatic headlights'),
(86, 883, 'Panic alarm'),
(87, 883, 'Security system'),
(88, 883, 'Speed control'),
(89, 883, 'Bumpers: body-color'),
(90, 883, 'Power door mirrors'),
(91, 883, 'Roof rack'),
(92, 883, 'Splash Guards'),
(93, 883, 'Spoiler'),
(94, 883, 'Steering Wheel Paddle Shift Control Switches'),
(95, 883, 'All-Weather Floor Liners'),
(96, 883, 'Driver door bin'),
(97, 883, 'Driver vanity mirror'),
(98, 883, 'Front reading lights'),
(99, 883, 'Illuminated entry'),
(100, 883, 'Outside temperature display'),
(101, 883, 'Overhead console'),
(102, 883, 'Passenger vanity mirror'),
(103, 883, 'Rear seat center armrest'),
(104, 883, 'STARLINK/Apple CarPlay/Android Auto'),
(105, 883, 'Tachometer'),
(106, 883, 'Telescoping steering wheel'),
(107, 883, 'Tilt steering wheel'),
(108, 883, 'Trip computer'),
(109, 883, 'Cloth Upholstery'),
(110, 883, 'Front Bucket Seats'),
(111, 883, 'Split folding rear seat'),
(112, 883, 'Front Center Armrest w/Storage'),
(113, 883, 'Passenger door bin'),
(114, 883, 'Alloy wheels'),
(115, 883, 'Wheels: 17\" x 7J Black Aluminum Alloy'),
(116, 883, 'Rear window wiper'),
(117, 883, 'Variably intermittent wipers'),
(118, 750, 'Front Center Armrest w/Storage'),
(119, 750, 'Passenger door bin'),
(120, 750, 'Alloy wheels'),
(121, 750, 'Wheels: 17\" x 7J Black Aluminum Alloy'),
(122, 750, 'Rear window wiper'),
(123, 750, 'Variably intermittent wipers'),
(124, 750, 'Air Conditioning'),
(125, 750, 'Automatic temperature control'),
(126, 750, 'Rear window defroster'),
(127, 750, 'Power steering'),
(128, 750, 'Power windows'),
(129, 750, 'Remote keyless entry'),
(130, 750, 'Steering wheel mounted audio controls'),
(131, 750, 'Four wheel independent suspension'),
(132, 750, 'Speed-sensing steering'),
(133, 750, 'Traction control'),
(134, 750, '4-Wheel Disc Brakes'),
(135, 750, 'ABS brakes'),
(136, 750, 'Dual front impact airbags'),
(137, 750, 'Dual front side impact airbags'),
(138, 750, 'Front anti-roll bar'),
(139, 750, 'Knee airbag'),
(140, 750, 'Low tire pressure warning'),
(141, 750, 'Occupant sensing airbag'),
(142, 750, 'Overhead airbag'),
(143, 750, 'Rear anti-roll bar'),
(144, 750, 'Brake assist'),
(145, 750, 'Electronic Stability Control'),
(146, 750, 'Exterior Parking Camera Rear'),
(147, 750, 'Auto High-beam Headlights'),
(148, 750, 'Fully automatic headlights'),
(149, 750, 'Panic alarm'),
(150, 750, 'Security system'),
(151, 750, 'Speed control'),
(152, 750, 'Bumpers: body-color'),
(153, 750, 'Power door mirrors'),
(154, 750, 'Roof rack'),
(155, 750, 'Splash Guards'),
(156, 750, 'Spoiler'),
(157, 750, 'Steering Wheel Paddle Shift Control Switches'),
(158, 750, 'All-Weather Floor Liners'),
(159, 750, 'Driver door bin'),
(160, 750, 'Driver vanity mirror'),
(161, 750, 'Front reading lights'),
(162, 750, 'Illuminated entry'),
(163, 750, 'Outside temperature display'),
(164, 750, 'Overhead console'),
(165, 750, 'Passenger vanity mirror'),
(166, 750, 'Rear seat center armrest'),
(167, 750, 'STARLINK/Apple CarPlay/Android Auto'),
(168, 750, 'Tachometer'),
(169, 750, 'Telescoping steering wheel'),
(170, 750, 'Tilt steering wheel'),
(171, 750, 'Trip computer'),
(172, 750, 'Cloth Upholstery'),
(173, 750, 'Front Bucket Seats'),
(174, 750, 'Split folding rear seat');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `vehicle_id`, `image_url`) VALUES
(1, 781, '/images/23_FOR_gallery_ext_01.webp'),
(2, 781, '/images/23_FOR_gallery_int_02.webp'),
(3, 781, '/images/23_FOR_gallery_int_06.webp'),
(4, 781, '/images/23_FOR_gallery_int_07.webp'),
(5, 781, '/images/23_FOR_gallery_ext_10.webp'),
(6, 883, '/images/24_LEG_gallery_ext_01.webp'),
(7, 883, '/images/24_LEG_gallery_ext_05.webp'),
(8, 883, '/images/24_LEG_gallery_ext_08.webp'),
(9, 883, '/images/24_LEG_gallery_int_03.webp'),
(10, 883, '/images/24_LEG_gallery_int_06.webp'),
(11, 750, '/images/23_WRX_gallery_ext_03.webp'),
(12, 750, '/images/23_WRX_gallery_ext_04.webp'),
(13, 750, '/images/23_WRX_gallery_ext_08.webp'),
(14, 750, '/images/23_WRX_gallery_int_07.webp'),
(15, 750, '/images/23_WRX_gallery_int_10.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'picklebrownie', '$2y$10$M8WQgWqmjvAbmm0kqWafuuTRisP0almHCbeJU7vxV1hBs2UvIV1Iy', '2023-06-13 22:41:35'),
(2, 'root', '$2y$10$aQZIP3A.K.jlYXZCF6X1v.j1xhg.fNovdJ40FB/JPM9FGYYkxEYBO', '2023-06-13 22:50:23'),
(3, 'roger', '$2y$10$FpK0lR.vfmPZbXKv65/mrOB837bSWUJmC133ga.RXXcDjBFpyTJme', '2023-06-14 13:04:49'),
(4, 'obiwan', '$2y$10$bL36gRfR27uPeK7N3DgAFupB7vVMDEBwzveQeASOMpwYrRjM7Qz1e', '2023-06-18 01:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `make` varchar(13) NOT NULL,
  `model` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `year` int(4) NOT NULL,
  `vin` varchar(17) NOT NULL,
  `price` int(8) NOT NULL,
  `car_condition` varchar(12) NOT NULL,
  `mileage` int(6) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `color`, `year`, `vin`, `price`, `car_condition`, `mileage`) VALUES
(9, 'BMW', '6 Series', 'Purple', 2018, '5TDBY5G16DS675822', 6085, 'Used', 5067),
(11, 'Mazda', 'Mazda5', 'Red', 2020, 'WAUNE78P18A342660', 23354, 'Used', 14702),
(12, 'Audi', 'Q7', 'Pink', 2022, 'WA1WYBFE2AD448505', 9730, 'New', 5),
(14, 'Volvo', 'C70', 'Red', 2022, 'WAUHGBFC9DN768366', 10807, 'New', 5),
(17, 'Cadillac', 'CTS', 'Pink', 2013, 'WAUVC68E02A369838', 9475, 'Used', 11962),
(18, 'BMW', 'X5 M', 'Mauv', 2022, 'WA1YD54B63N613712', 14233, 'New', 5),
(45, 'Mercedes-Benz', 'Sprinter 3500', 'Maroon', 2021, '2D4JN1AGXBR156369', 21441, 'Used', 61345),
(53, 'Nissan', 'Maxima', 'Purple', 2015, 'WVWED7AJ4DW800765', 11158, 'Used', 75804),
(55, 'Chevrolet', 'Cobalt', 'Pink', 2019, '3GYT4NEF2DG431298', 8066, 'Used', 79658),
(60, 'Ford', 'F250', 'Teal', 2020, '2FMDK3GC4AB714669', 22092, 'Used', 101046),
(62, 'BMW', '645', 'Blue', 2015, 'JN8AZ1MUXEW948606', 7244, 'Used', 99722),
(82, 'Dodge', 'Caravan', 'Green', 2014, 'KNDPB3A20B7837660', 4895, 'Used', 170547),
(98, 'Ford', 'E-Series', 'Violet', 2013, '1N6AD0CU7DN643894', 11467, 'Used', 245833),
(111, 'Toyota', 'Land Cruiser', 'Turquoise', 2015, 'WBAAX13453P006969', 15526, 'Used', 105263),
(112, 'Nissan', 'Frontier', 'Crimson', 2017, 'JM3ER2A59C0692806', 12233, 'Used', 106572),
(118, 'Volvo', 'C70', 'Crimson', 2021, 'WP1AE2A21EL640995', 23101, 'Used', 119883),
(124, 'Mercedes-Benz', 'G-Class', 'Violet', 2020, '19UUA9F59EA395577', 16845, 'Used', 130941),
(125, 'Cadillac', 'Escalade ESV', 'Red', 2021, '1G6KD57958U035977', 22163, 'Used', 133902),
(130, 'Mazda', 'RX-8', 'Blue', 2019, 'WA1LGAFE0DD930636', 7501, 'Used', 142083),
(139, 'Ford', 'Explorer', 'Blue', 2020, 'KNADH4A39B6604962', 19354, 'Used', 164234),
(146, 'Honda', 'CR-Z', 'Blue', 2021, '2HNYD186X3H577070', 12540, 'Used', 179723),
(148, 'Volkswagen', 'Jetta', 'Maroon', 2014, 'SCBBR9ZA5AC141826', 13007, 'Used', 184701),
(152, 'Ford', 'Fusion', 'Blue', 2021, 'WAUHFAFL9AN433164', 22477, 'Used', 196279),
(154, 'Chevrolet', 'TrailBlazer', 'Violet', 2016, 'JA32U2FUXFU470149', 10477, 'Used', 199379),
(156, 'BMW', '3 Series', 'Green', 2016, '4T1BF1FK7CU557535', 5432, 'Used', 203705),
(164, 'Mitsubishi', 'Outlander Sport', 'Red', 2022, '5N1BA0NE2FN501313', 21060, 'New', 5),
(165, 'Ford', 'Fusion', 'Pink', 2020, 'JH4NA21675S735229', 11657, 'Used', 228818),
(177, 'Volkswagen', 'Golf', 'Indigo', 2022, '2HNYD28208H419184', 18341, 'New', 5),
(199, 'Volvo', 'XC90', 'Aquamarine', 2016, '1FTMF1CWXAK431986', 11208, 'Used', 3319),
(200, 'Mitsubishi', 'Eclipse', 'Goldenrod', 2016, 'WAUJT58E82A848968', 9896, 'Used', 3350),
(216, 'Nissan', 'Rogue', 'Puce', 2022, '1FADP5AU2EL186843', 9993, 'New', 5),
(258, 'Lexus', 'IS', 'Indigo', 2013, '1FADP5BU0DL626166', 7374, 'Used', 5559),
(260, 'Toyota', 'Camry', 'Khaki', 2017, '1GYFK43549R109048', 5268, 'Used', 5642),
(266, 'Volkswagen', 'New Beetle', 'Indigo', 2013, 'JN1BJ0HR9FM648305', 5392, 'Used', 5905),
(267, 'Cadillac', 'CTS-V', 'Turquoise', 2019, '1G6DJ577690723608', 18341, 'Used', 5971),
(271, 'BMW', 'M6', 'Teal', 2016, '5N1BA0NCXFN462131', 17825, 'Used', 6150),
(294, 'Mazda', 'Mazdaspeed6', 'Aquamarine', 2017, 'SALFR2BN9BH225387', 15531, 'Used', 7229),
(295, 'Dodge', 'Ram 2500', 'Red', 2017, '5FRYD3H94GB900566', 6339, 'Used', 7263),
(297, 'Mercedes-Benz', 'CLK-Class', 'Maroon', 2015, 'SCBLE47K99C600351', 5247, 'Used', 7359),
(305, 'Ford', 'Expedition EL', 'Puce', 2021, 'WBSCL93411L038854', 13284, 'Used', 7774),
(306, 'Ford', 'Taurus', 'Aquamarine', 2022, '3VW1K7AJ1CM036499', 14504, 'New', 5),
(309, 'Honda', 'Crosstour', 'Red', 2022, 'KNAFK4A65F5958901', 14950, 'New', 5),
(311, 'Cadillac', 'Escalade EXT', 'Puce', 2017, '5FPYK1F29BB593560', 11899, 'Used', 8080),
(319, 'Audi', 'R8', 'Purple', 2022, '1N6AA0CC8CN145041', 9097, 'New', 5),
(320, 'Volkswagen', 'Jetta', 'Maroon', 2021, 'WBAEV53453K254201', 12940, 'Used', 8555),
(324, 'Volvo', 'C70', 'Maroon', 2013, '3VW517AT5EM111228', 5528, 'Used', 8757),
(331, 'Mercedes-Benz', 'SL-Class', 'Orange', 2014, 'WDDPK4HA3DF417621', 3761, 'Used', 9136),
(353, 'Audi', 'S5', 'Blue', 2020, '1GYS3KEF3BR721723', 20444, 'Used', 10418),
(356, 'Chevrolet', 'Tahoe', 'Pink', 2023, 'ML32A3HJ3EH199108', 14447, 'New', 5),
(363, 'Mercedes-Benz', 'S-Class', 'Puce', 2016, '1G6DM8E33D0158719', 16787, 'Used', 11009),
(364, 'Ford', 'Flex', 'Turquoise', 2023, '2C3CDXCT4FH891256', 20650, 'New', 5),
(369, 'Ford', 'Mustang', 'Turquoise', 2013, 'WAUCFAFH2FN157357', 13359, 'Used', 11369),
(395, 'Audi', 'A4', 'Turquoise', 2015, 'WBASN4C54CC609116', 17620, 'Used', 13031),
(397, 'Mercedes-Benz', 'R-Class', 'Violet', 2018, '2B3CJ7DJ6BH863391', 6386, 'Used', 13145),
(402, 'Dodge', 'Caravan', 'Blue', 2021, '1FTEW1E86AF358689', 14476, 'Used', 13491),
(405, 'Toyota', 'FJ Cruiser', 'Puce', 2021, '2C3CA4CD6AH892191', 16376, 'Used', 13696),
(406, 'Mazda', 'RX-8', 'Khaki', 2018, '1FTWW3A52AE915390', 13648, 'Used', 13759),
(409, 'Ford', 'Thunderbird', 'Khaki', 2014, 'WBABN33451J724723', 3625, 'Used', 13946),
(410, 'BMW', '6 Series', 'Goldenrod', 2018, '1G4CW54K554452929', 6202, 'Used', 14019),
(415, 'Toyota', 'Camry', 'Indigo', 2015, 'WAUDF98E68A996749', 5923, 'Used', 14362),
(429, 'Nissan', 'Xterra', 'Blue', 2022, '1GYS3EEJ3BR438714', 9617, 'New', 5),
(436, 'Lexus', 'GS', 'Red', 2013, 'JTDZN3EU5FJ775564', 8193, 'Used', 15855),
(449, 'BMW', '3 Series', 'Crimson', 2013, 'WAUAF68E65A963974', 5157, 'Used', 16809),
(467, 'Lexus', 'CT', 'Blue', 2021, 'JN1AZ4EH7FM973980', 10893, 'Used', 18192),
(470, 'Dodge', 'Avenger', 'Goldenrod', 2019, '5FRYD3H89EB520515', 9862, 'Used', 18425),
(471, 'Volvo', 'XC60', 'Red', 2019, 'WAUDF98E08A450688', 13710, 'Used', 18510),
(488, 'Chevrolet', 'Silverado 3500', 'Pink', 2021, 'WAUGU44D03N723505', 12969, 'Used', 19867),
(523, 'Ford', 'ZX2', 'Pink', 2013, 'WBAVC93568K154881', 12259, 'Used', 22815),
(524, 'Mazda', 'Mazda5', 'Maroon', 2020, 'JH4CL95888C339153', 17138, 'Used', 22910),
(525, 'BMW', 'M5', 'Blue', 2017, '5N1AN0NU0CN637362', 12598, 'Used', 22990),
(533, 'Volkswagen', 'CC', 'Orange', 2022, 'JTHBE1D23F5557751', 14936, 'New', 5),
(538, 'BMW', '6 Series', 'Red', 2019, '1N6AA0CA1CN442537', 8412, 'Used', 24134),
(540, 'Ford', 'F-Series', 'Puce', 2019, '1N4AA5APXDC468001', 10380, 'Used', 24317),
(543, 'Volvo', 'V70', 'Puce', 2018, 'JN1CV6FE7BM341060', 5670, 'Used', 24580),
(550, 'Cadillac', 'XLR', 'Crimson', 2017, 'WBAFU9C55DD499268', 9197, 'Used', 25224),
(551, 'BMW', '645', 'Green', 2015, 'WAULD54B14N525360', 16070, 'Used', 25327),
(563, 'Ford', 'E150', 'Mauv', 2014, 'WBADT53421C643189', 11443, 'Used', 26433),
(577, 'Cadillac', 'CTS', 'Orange', 2015, 'WAUDN94F98N409244', 13495, 'Used', 27767),
(583, 'Nissan', 'Murano', 'Mauv', 2022, '1ZVBP8AM7E5061700', 18087, 'New', 5),
(586, 'Mercedes-Benz', 'CLS-Class', 'Goldenrod', 2018, '3D73Y4EL1BG554815', 16295, 'Used', 28643),
(600, 'Chevrolet', 'Express 1500', 'Aquamarine', 2015, 'WAUBC48H76K761622', 17599, 'Used', 30029),
(601, 'Volkswagen', 'Touareg', 'Khaki', 2016, 'WAUKH78E77A370163', 6323, 'Used', 30111),
(632, 'Toyota', 'TundraMax', 'Crimson', 2017, 'WBASP2C53CC402831', 7187, 'Used', 33297),
(635, 'Mazda', 'MPV', 'Aquamarine', 2014, 'SCBDC3ZAXDC295671', 10780, 'Used', 33620),
(637, 'Toyota', 'Corolla', 'Yellow', 2017, 'WBA4A9C5XFG116734', 6458, 'Used', 33825),
(641, 'Chevrolet', 'Malibu', 'Crimson', 2015, '2G4WS55J631130128', 12495, 'Used', 34261),
(646, 'Chevrolet', 'Express 2500', 'Purple', 2015, '3GYEK63N42G679256', 7902, 'Used', 34790),
(650, 'Mercedes-Benz', 'CLS-Class', 'Teal', 2018, '1C4SDJCT1CC166362', 11188, 'Used', 35227),
(659, 'Honda', 'Insight', 'Red', 2022, '2HNYD18206H571375', 11900, 'New', 5),
(668, 'Dodge', 'Grand Caravan', 'Khaki', 2015, '1GTN2TEHXFZ610895', 10665, 'Used', 37203),
(676, 'Honda', 'Civic Si', 'Puce', 2013, '1GYS4BEFXDR684038', 4740, 'Used', 38089),
(678, 'Lexus', 'LS', 'Khaki', 2017, 'WAUHF98P97A813104', 10149, 'Used', 38324),
(688, 'Mercedes-Benz', 'CL65 AMG', 'Turquoise', 2019, '3TMJU4GN3BM836340', 12483, 'Used', 39466),
(694, 'Mazda', 'B-Series Plus', 'Turquoise', 2013, '5N1BA0NC4FN104734', 10004, 'Used', 40153),
(699, 'Mazda', 'RX-8', 'Violet', 2021, '3VW517ATXFM565203', 10363, 'Used', 40734),
(710, 'Cadillac', 'Escalade', 'Pink', 2013, 'WAUDF78E57A976236', 13927, 'Used', 42032),
(712, 'Ford', 'Fiesta', 'Khaki', 2021, '19XFB4F26DE554449', 11135, 'Used', 42264),
(722, 'Volvo', 'S40', 'Goldenrod', 2016, '1G6AY5SX2F0444674', 12270, 'Used', 43461),
(730, 'Ford', 'E-350 Super Duty Van', 'Fuscia', 2016, '1G6DT57V290896986', 15529, 'Used', 44434),
(733, 'BMW', 'Alpina B7', 'Pink', 2018, '19UUA65685A753468', 9786, 'Used', 44790),
(738, 'Chevrolet', 'Express 1500', 'Blue', 2020, 'JM1CR2W35A0145181', 15977, 'Used', 45414),
(750, 'Subaru', 'Impreza', 'Violet', 2022, 'VNKJTUD37FA403846', 16987, 'New', 5),
(761, 'Audi', 'TT', 'Blue', 2013, '5TFAW5F18FX888836', 6537, 'Used', 48271),
(764, 'Ford', 'E-Series', 'Aquamarine', 2020, '1FTEW1CMXDK048105', 19570, 'Used', 48674),
(767, 'Toyota', 'Avalon', 'Red', 2016, '1G6AL5SX2D0078503', 16761, 'Used', 49052),
(773, 'Audi', 'S4', 'Goldenrod', 2023, '3G5DB03E92S564185', 13703, 'New', 5),
(781, 'Subaru', 'Forester', 'Violet', 2021, 'WAUDF98E67A219194', 19170, 'Used', 50862),
(787, 'Audi', 'TT', 'Puce', 2014, 'WDBWK5EA5AF030272', 5576, 'Used', 51623),
(789, 'Volvo', 'V70', 'Teal', 2015, '3N1CN7AP7EK595483', 11162, 'Used', 51895),
(793, 'Ford', 'F250', 'Blue', 2020, '1YVHZ8BH2D5853948', 13486, 'Used', 52427),
(807, 'Ford', 'F250', 'Red', 2020, '3GYFNEE36CS862531', 9320, 'Used', 54286),
(815, 'Ford', 'Excursion', 'Violet', 2014, 'WBADW3C5XBE750792', 12449, 'Used', 55373),
(830, 'Chevrolet', 'Monte Carlo', 'Aquamarine', 2015, 'WAULT58E53A683312', 17883, 'Used', 57438),
(835, 'Volkswagen', 'Phaeton', 'Khaki', 2016, 'WBAEB5C54AC170167', 17093, 'Used', 58131),
(836, 'Ford', 'Mustang', 'Goldenrod', 2017, '3D73M4CL1AG662655', 6939, 'Used', 58253),
(839, 'Nissan', 'Xterra', 'Maroon', 2016, 'WBAYF4C51FG757907', 15126, 'Used', 58685),
(841, 'Ford', 'F-Series Super Duty', 'Fuscia', 2020, 'WAUFFAFL2BN693611', 13021, 'Used', 58962),
(849, 'Audi', 'A3', 'Crimson', 2019, '1G4GC5ER2DF036443', 10743, 'Used', 60085),
(859, 'BMW', '530', 'Yellow', 2014, 'WBAFA53521L845943', 4105, 'Used', 61497),
(883, 'Subaru', 'Legacy', 'Indigo', 2022, 'WAUAH74F47N572154', 16108, 'New', 5),
(888, 'Lexus', 'LFA', 'Pink', 2022, '1G6DE8E56D0034619', 18267, 'New', 5),
(904, 'Ford', 'Explorer', 'Pink', 2014, '1G6AY5S34F0656621', 10783, 'Used', 68119),
(908, 'Ford', 'GT500', 'Purple', 2019, 'WAUA2AFD4EN948231', 16839, 'Used', 68733),
(922, 'BMW', 'X3', 'Turquoise', 2016, '2LMHJ5AT8EB133200', 9571, 'Used', 70856),
(923, 'Nissan', 'Titan', 'Fuscia', 2020, '5UXFG2C54BL719406', 11043, 'Used', 71012),
(935, 'Volvo', 'C30', 'Green', 2022, 'WA1AV74LX7D896226', 21523, 'New', 5),
(936, 'Audi', 'TT', 'Aquamarine', 2016, '2D4RN6DX1AR379605', 15337, 'Used', 73034),
(945, 'Volvo', 'C30', 'Indigo', 2020, 'NM0GE9F75F1626166', 17903, 'Used', 74449),
(949, 'BMW', 'X5', 'Puce', 2023, 'JN1CV6AP5AM186418', 11077, 'New', 5),
(956, 'Ford', 'E150', 'Mauv', 2017, '5NPDH4AE9BH956675', 9608, 'Used', 76177),
(957, 'Nissan', 'Altima', 'Maroon', 2019, 'YV4960BZ7A1041249', 15946, 'Used', 76347),
(963, 'Toyota', 'Matrix', 'Crimson', 2015, '1D4RE3GGXBC377422', 15726, 'Used', 77307),
(970, 'Volvo', 'XC60', 'Khaki', 2019, 'WDDEJ7EB4DA132500', 8250, 'Used', 78422),
(974, 'Chevrolet', 'Uplander', 'Goldenrod', 2017, 'WVWGU7AN3CE713472', 14796, 'Used', 79081),
(978, 'Ford', 'Escape', 'Khaki', 2014, '3GYFK62887G547222', 8959, 'Used', 79722),
(979, 'Honda', 'CR-V', 'Goldenrod', 2015, '1N6AA0CJ1FN094761', 10398, 'Used', 79887);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
