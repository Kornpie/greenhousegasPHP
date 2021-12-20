-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 09:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'Admin', '1234'),
(2, 'Chawakorn', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`company_id`, `company_name`, `status`) VALUES
(7, 'Nom.co', 1),
(8, 'ChaiyoCrop.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_energy_touse`
--

CREATE TABLE `tb_energy_touse` (
  `eg_id` int(11) NOT NULL,
  `eg_name` varchar(255) NOT NULL,
  `eg_unit` varchar(255) NOT NULL,
  `eg_month` int(255) NOT NULL,
  `eg_year` varchar(255) NOT NULL,
  `eg_unit_eq` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_energy_touse`
--

INSERT INTO `tb_energy_touse` (`eg_id`, `eg_name`, `eg_unit`, `eg_month`, `eg_year`, `eg_unit_eq`) VALUES
(28, 'การใช้ไฟฟ้า', '50', 1, '2021', '24.995'),
(29, 'การใช้ไฟฟ้า', '43', 2, '2021', '21.4957'),
(30, 'การใช้ไฟฟ้า', '63', 3, '2021', '31.4937'),
(31, 'การใช้ไฟฟ้า', '74', 4, '2021', '36.9926'),
(32, 'การใช้ไฟฟ้า', '96', 5, '2021', '47.9904'),
(33, 'การใช้ไฟฟ้า', '36', 6, '2021', '17.9964'),
(34, 'การใช้ไฟฟ้า', '88', 7, '2021', '43.9912'),
(35, 'การใช้ไฟฟ้า', '54', 8, '2021', '26.994600000000002'),
(36, 'การใช้ไฟฟ้า', '150', 9, '2021', '74.985'),
(37, 'การใช้ไฟฟ้า', '140', 10, '2021', '69.986'),
(38, 'การใช้ไฟฟ้า', '97', 11, '2021', '48.4903'),
(39, 'การใช้ไฟฟ้า', '32', 12, '2021', '15.9968'),
(40, 'การใช้ NG', '231', 1, '2021', '12.9822'),
(41, 'การใช้ NG', '96', 2, '2021', '5.3952'),
(42, 'การใช้ NG', '120', 3, '2021', '6.744'),
(43, 'การใช้ NG', '400', 4, '2021', '22.48'),
(44, 'การใช้ NG', '230', 5, '2021', '12.926'),
(45, 'การใช้ NG', '425', 6, '2021', '23.885'),
(46, 'การใช้ NG', '950', 7, '2021', '53.39'),
(47, 'การใช้ NG', '351', 8, '2021', '19.7262'),
(48, 'การใช้ NG', '562', 9, '2021', '31.5844'),
(49, 'การใช้ NG', '652', 10, '2021', '36.6424'),
(50, 'การใช้ NG', '320', 11, '2021', '17.984'),
(51, 'การใช้ NG', '230', 12, '2021', '12.926');

-- --------------------------------------------------------

--
-- Table structure for table `tb_factors`
--

CREATE TABLE `tb_factors` (
  `factor_id` int(11) NOT NULL,
  `factor_name` varchar(45) NOT NULL,
  `factor_value` float NOT NULL,
  `factor_fullname` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_factors`
--

INSERT INTO `tb_factors` (`factor_id`, `factor_name`, `factor_value`, `factor_fullname`) VALUES
(1, 'RawEQ', 2.8854, 'Emision Factor วัตถุดิบ'),
(2, 'ProductEq', 0.5751, 'Emision Factor ฟิล์มโพลี เอทิลีน'),
(3, 'WasteEq', 0.5751, 'Emision Factor ฟิล์มโพลี เอทิลีน(ของเสีย)'),
(4, 'ElecEq', 0.4999, 'Emision Factor ไฟฟ้า'),
(5, 'LpgEq', 3.1988, 'Emision Factor LPG'),
(6, 'NgEq', 0.0562, 'Emision Factor NG'),
(7, 'tapwater-1', 0.2575, 'Emision Factor การใช้น้ำประปานิคม'),
(8, 'tapwater-2', 0.9697, 'Emision Factor การใช้น้ำอ่อน'),
(9, 'tapwater-RO', 2.0676, 'Emision Factor การใช้น้ำRO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_month`
--

CREATE TABLE `tb_month` (
  `mon_id` int(11) NOT NULL,
  `mon_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_month`
--

INSERT INTO `tb_month` (`mon_id`, `mon_name`) VALUES
(1, 'มกราคม'),
(2, 'กุมภาพันธ์'),
(3, 'มีนาคม'),
(4, 'เมษายน'),
(5, 'พฤษภาคม'),
(6, 'มิถุนายน'),
(7, 'กรกฎาคม'),
(8, 'สิงหาคม'),
(9, 'กันยายน'),
(10, 'ตุลาคม'),
(11, 'พฤศจิกายน'),
(12, 'ธันวาคม');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pollution`
--

CREATE TABLE `tb_pollution` (
  `pollution_id` int(11) NOT NULL,
  `pollution_water` varchar(45) DEFAULT NULL,
  `pollution_industrial` varchar(45) DEFAULT NULL,
  `pollution_weather` varchar(45) DEFAULT NULL,
  `pollution_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(55) DEFAULT NULL,
  `product_weight` varchar(55) DEFAULT NULL,
  `product_company_origin` int(11) NOT NULL,
  `product_cars` int(11) NOT NULL,
  `product_weight_eq` varchar(10) NOT NULL,
  `product_distance` varchar(10) NOT NULL,
  `product_distance_eq` varchar(10) NOT NULL,
  `product_total_eq` varchar(10) NOT NULL,
  `product_month` int(10) NOT NULL,
  `product_year` varchar(10) NOT NULL,
  `product_car_codeid` varchar(10) NOT NULL,
  `product_day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`product_id`, `product_name`, `product_weight`, `product_company_origin`, `product_cars`, `product_weight_eq`, `product_distance`, `product_distance_eq`, `product_total_eq`, `product_month`, `product_year`, `product_car_codeid`, `product_day`) VALUES
(23, 'PET FILM', '100', 7, 1, '57.5099999', '150', '68.535', '126.045', 1, '2021', 'gtr33', '1'),
(24, 'PET FILM', '260', 7, 2, '149.525999', '80', '39.36', '188.886', 2, '2021', 'uyt78', '1'),
(25, 'PET FILM', '500', 7, 3, '287.549999', '80', '49.608', '337.158', 3, '2021', 'fgg25', '1'),
(26, 'PET FILM', '400', 7, 2, '230.039999', '90', '44.28', '274.32', 4, '2021', 'ty85', '1'),
(27, 'PET FILM', '200', 7, 1, '115.019999', '50', '22.845', '137.865', 5, '2021', 'bn25', '1'),
(28, 'PET FILM', '502', 7, 2, '288.7002', '140', '68.88', '357.5802', 6, '2021', 'vfc5', '1'),
(29, 'PET FILM', '230', 7, 1, '132.273', '70', '31.983', '164.256', 7, '2021', 'nm14', '1'),
(30, 'PET FILM', '400', 7, 3, '230.039999', '25', '15.5025', '245.5425', 8, '2021', 'trt32', '1'),
(31, 'PET FILM', '600', 7, 2, '345.059999', '100', '49.2', '394.26', 9, '2021', 'fgf2', '1'),
(32, 'PET FILM', '143', 7, 1, '82.2392999', '135', '61.6815', '143.9208', 10, '2021', '2bv5', '1'),
(33, 'PET FILM', '800', 7, 3, '460.079999', '50', '31.005', '491.085', 11, '2021', 'gf255', '1'),
(34, 'PET FILM', '305', 7, 2, '175.4055', '60', '29.52', '204.9255', 12, '2021', 'yut85', '1'),
(35, 'PET FILM', '126', 8, 2, '72.4626', '36', '17.712', '90.1746', 1, '2021', 'fg52', '2'),
(36, 'PET FILM', '153', 8, 1, '87.9902999', '52', '23.7588', '111.7491', 2, '2021', 'gf52', '2'),
(37, 'PET FILM', '892', 8, 1, '512.9892', '32', '14.6208', '527.61', 3, '2021', 'hg65', '2'),
(38, 'PET FILM', '638', 8, 3, '366.9138', '51', '31.6251', '398.5389', 4, '2021', 'fgh6', '2'),
(39, 'PET FILM', '623', 8, 1, '358.287299', '19', '8.6811', '366.9684', 5, '2021', 'jhg65', '2'),
(40, 'PET FILM', '516', 8, 3, '296.7516', '25', '15.5025', '312.2541', 6, '2021', 'cfvb3', '2'),
(41, 'PET FILM', '266', 8, 1, '152.9766', '62', '28.3278', '181.3044', 7, '2021', 'cg26', '2'),
(42, 'PET FILM', '978', 8, 2, '562.447799', '52', '25.584', '588.0318', 8, '2021', 'dfg29', '2'),
(43, 'PET FILM', '854', 8, 1, '491.135399', '69', '31.5261', '522.6615', 9, '2021', 'g2f6', '2'),
(44, 'PET FILM', '549', 8, 1, '315.7299', '16', '7.3104', '323.0403', 10, '2021', 'fdg125', '2'),
(45, 'PET FILM', '894', 8, 3, '514.139399', '96', '59.5296', '573.669', 11, '2021', 'gf55', '2'),
(46, 'PET FILM', '185', 8, 2, '106.393499', '59', '29.028', '135.4215', 12, '2021', 'sd52', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_raw_materials`
--

CREATE TABLE `tb_raw_materials` (
  `raw_id` int(11) NOT NULL,
  `raw_name` varchar(55) DEFAULT NULL,
  `raw_weight` varchar(55) DEFAULT NULL,
  `raw_company_origin` int(11) NOT NULL,
  `raw_cars` int(11) NOT NULL,
  `raw_weight_eq` varchar(10) NOT NULL,
  `raw_distance` varchar(10) NOT NULL,
  `raw_distance_eq` varchar(10) NOT NULL,
  `raw_total_eq` varchar(10) NOT NULL,
  `raw_date` varchar(2) NOT NULL,
  `raw_month` int(2) NOT NULL,
  `raw_yaer` varchar(4) NOT NULL,
  `raw_car_codeid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_raw_materials`
--

INSERT INTO `tb_raw_materials` (`raw_id`, `raw_name`, `raw_weight`, `raw_company_origin`, `raw_cars`, `raw_weight_eq`, `raw_distance`, `raw_distance_eq`, `raw_total_eq`, `raw_date`, `raw_month`, `raw_yaer`, `raw_car_codeid`) VALUES
(45, 'PET CHIP', '100', 7, 1, '288.54', '150', '68.535', '357.075', '01', 1, '2021', 'gtr32'),
(46, 'PET CHIP', '200', 7, 2, '577.08', '140', '68.88', '645.96', '01', 2, '2021', 'qw56'),
(47, 'PET CHIP', '60', 7, 1, '173.124000', '70', '31.983', '205.107', '01', 3, '2021', 'op89'),
(48, 'PET CHIP', '700', 7, 3, '2019.78000', '69', '42.7869', '2062.5669', '01', 4, '2021', 'bh89'),
(49, 'PET CHIP', '500', 7, 1, '1442.7', '40', '18.276', '1460.976', '01', 5, '2021', 'ec25'),
(50, 'PET CHIP', '230', 7, 2, '663.642', '50', '24.6', '688.242', '01', 6, '2021', 'nf97'),
(51, 'PET CHIP', '160', 7, 3, '461.664000', '60', '37.206', '498.87', '01', 7, '2021', 'we25'),
(52, 'PET CHIP', '100', 7, 1, '288.54', '50', '22.845', '311.385', '01', 8, '2021', 'nb22'),
(53, 'PET CHIP', '502', 7, 2, '1448.4708', '30', '14.76', '1463.2308', '01', 9, '2021', 'vb25'),
(54, 'PET CHIP', '80', 7, 2, '230.832000', '60', '29.52', '260.352', '01', 10, '2021', 'gvf25'),
(55, 'PET CHIP', '500', 7, 3, '1442.7', '10', '6.201', '1448.901', '01', 11, '2021', 'gio42'),
(56, 'PET CHIP', '150', 7, 1, '432.81', '70', '31.983', '464.793', '01', 12, '2021', 'kl36'),
(57, 'PET CHIP', '500', 8, 1, '1442.7', '10', '4.569', '1447.269', '02', 1, '2021', 'fd21'),
(58, 'PET CHIP', '400', 8, 2, '1154.16', '90', '44.28', '1198.44', '02', 2, '2021', 'rtg1'),
(59, 'PET CHIP', '900', 8, 3, '2596.86', '70', '43.407', '2640.267', '02', 3, '2021', 'hj63'),
(60, 'PET CHIP', '600', 8, 1, '1731.24', '60', '27.414', '1758.654', '02', 4, '2021', 'er87'),
(61, 'PET CHIP', '463', 8, 2, '1335.9402', '96', '47.232', '1383.1722', '02', 5, '2021', 'oik2'),
(62, 'PET CHIP', '215', 8, 1, '620.361', '48', '21.9312', '642.2922', '02', 6, '2021', 'df36'),
(63, 'PET CHIP', '623', 8, 3, '1797.60420', '89', '55.1889', '1852.7931', '02', 7, '2021', 'fg52'),
(64, 'PET CHIP', '510', 8, 1, '1471.554', '26', '11.8794', '1483.4334', '02', 8, '2021', 'df25'),
(65, 'PET CHIP', '632', 8, 3, '1823.57280', '96', '59.5296', '1883.1024', '02', 9, '2021', 'ds23'),
(66, 'PET CHIP', '562', 8, 3, '1621.5948', '39', '24.1839', '1645.7787', '02', 10, '2021', 'gh51'),
(67, 'PET CHIP', '165', 8, 2, '476.091', '32', '15.744', '491.835', '02', 11, '2021', 'fd53'),
(68, 'PET CHIP', '651', 8, 2, '1878.3954', '21', '10.332', '1888.7274', '02', 12, '2021', 'gf54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_typecars`
--

CREATE TABLE `tb_typecars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(255) DEFAULT NULL,
  `car_eq` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_typecars`
--

INSERT INTO `tb_typecars` (`car_id`, `car_name`, `car_eq`) VALUES
(1, 'บรรทุก 4 ล้อ ', 0.4569),
(2, 'บรรทุก 6 ล้อ ', 0.492),
(3, 'บรรทุก 10 ล้อ ', 0.6201);

-- --------------------------------------------------------

--
-- Table structure for table `tb_typeoil`
--

CREATE TABLE `tb_typeoil` (
  `typeoil_id` int(11) NOT NULL,
  `typeoil_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(55) DEFAULT NULL,
  `company_id` int(12) DEFAULT NULL,
  `user_email` varchar(55) DEFAULT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `user_taxpayer` varchar(55) DEFAULT NULL,
  `user_telephone` varchar(10) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `user_approved` varchar(45) DEFAULT NULL,
  `user_status` varchar(45) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_fullname`, `company_id`, `user_email`, `user_password`, `user_taxpayer`, `user_telephone`, `user_type`, `user_approved`, `user_status`) VALUES
(16, 'Chawakorn', 7, 'korn', '1234', '1150', '0852741963', '4', NULL, '1'),
(17, 'macha', 7, 'mkorn', '1234', NULL, '0852741963', '1', NULL, '1'),
(18, 'super', 7, 'skorn', '1234', NULL, '0852741963', '2', NULL, '1'),
(19, 'pualo', 7, 'rkorn', '1234', NULL, '0852741963', '3', NULL, '1'),
(20, 'chatree', 8, 'owner', '1234', '1112', '0852741963', '4', NULL, '1'),
(21, 'Katana', 8, 'manager', '1234', NULL, '0852741963', '1', NULL, '1'),
(22, 'Rucha', 8, 'super', '1234', NULL, '0852741963', '2', NULL, '1'),
(23, 'Ratree', 8, 'reco', '1234', NULL, '0852741963', '3', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_use_energy`
--

CREATE TABLE `tb_use_energy` (
  `energy_id` int(11) NOT NULL,
  `energy_gas` varchar(55) DEFAULT NULL,
  `energy_electric` varchar(55) DEFAULT NULL,
  `energy_oil` varchar(55) DEFAULT NULL,
  `energy_typeoil` int(11) NOT NULL,
  `energt_company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_use_lpg`
--

CREATE TABLE `tb_use_lpg` (
  `lpg_id` int(11) NOT NULL,
  `lpg_name` varchar(255) NOT NULL,
  `lpg_weight` int(11) NOT NULL,
  `lpg_company_origin` varchar(255) NOT NULL,
  `lpg_cars` varchar(255) NOT NULL,
  `lpg_weight_eq` float NOT NULL,
  `lpg_distance` float NOT NULL,
  `lpg_distance_eq` float NOT NULL,
  `lpg_total_eq` float NOT NULL,
  `lpg_day` int(11) NOT NULL,
  `lpg_month` int(11) NOT NULL,
  `lpg_year` varchar(255) NOT NULL,
  `lpg_car_codeid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_use_lpg`
--

INSERT INTO `tb_use_lpg` (`lpg_id`, `lpg_name`, `lpg_weight`, `lpg_company_origin`, `lpg_cars`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq`, `lpg_day`, `lpg_month`, `lpg_year`, `lpg_car_codeid`) VALUES
(13, 'การใช้LPG', 150, '7', '1', 479.82, 92, 42.0348, 521.855, 1, 1, '2021', 'gf523'),
(14, 'การใช้LPG', 520, '7', '2', 1663.38, 70, 34.44, 1697.82, 1, 2, '2021', 'gf451'),
(15, 'การใช้LPG', 410, '7', '3', 1311.51, 60, 37.206, 1348.71, 1, 3, '2021', 'we52'),
(16, 'การใช้LPG', 741, '7', '3', 2370.31, 56, 34.7256, 2405.04, 1, 4, '2021', 'sd62'),
(17, 'การใช้LPG', 500, '7', '2', 1599.4, 96, 47.232, 1646.63, 1, 5, '2021', 'sd52'),
(18, 'การใช้LPG', 485, '7', '1', 1551.42, 65, 29.6985, 1581.12, 1, 6, '2021', 'ds236'),
(19, 'การใช้LPG', 741, '7', '2', 2370.31, 125, 61.5, 2431.81, 1, 7, '2021', 'ok62'),
(20, 'การใช้LPG', 652, '7', '1', 2085.62, 26, 11.8794, 2097.5, 1, 8, '2021', 'c5s2'),
(21, 'การใช้LPG', 320, '7', '2', 1023.62, 59, 29.028, 1052.64, 1, 9, '2021', 'gh15'),
(22, 'การใช้LPG', 450, '7', '2', 1439.46, 85, 41.82, 1481.28, 1, 10, '2021', 'gh25'),
(23, 'การใช้LPG', 325, '7', '1', 1039.61, 78, 35.6382, 1075.25, 1, 11, '2021', 'df20'),
(24, 'การใช้LPG', 259, '7', '3', 828.489, 86, 53.3286, 881.818, 1, 12, '2021', '25ed'),
(25, 'การใช้LPG', 852, '8', '1', 2725.38, 64, 29.2416, 2754.62, 2, 1, '2021', 'gf22'),
(26, 'การใช้LPG', 789, '8', '3', 2523.85, 95, 58.9095, 2582.76, 2, 2, '2021', 'nbv56'),
(27, 'การใช้LPG', 396, '8', '2', 1266.72, 68, 33.456, 1300.18, 2, 3, '2021', 's25'),
(28, 'การใช้LPG', 676, '8', '1', 2162.39, 54, 24.6726, 2187.06, 2, 4, '2021', 'cd325'),
(29, 'การใช้LPG', 324, '8', '1', 1036.41, 98, 44.7762, 1081.19, 2, 5, '2021', 'er35'),
(30, 'การใช้LPG', 985, '8', '2', 3150.82, 38, 18.696, 3169.51, 2, 6, '2021', 'gf65'),
(31, 'การใช้LPG', 742, '8', '3', 2373.51, 98, 60.7698, 2434.28, 2, 7, '2021', 'dg29'),
(32, 'การใช้LPG', 923, '8', '2', 2952.49, 83, 40.836, 2993.33, 2, 8, '2021', 'hj52'),
(33, 'การใช้LPG', 354, '8', '1', 1132.38, 97, 44.3193, 1176.69, 2, 9, '2021', 'df23'),
(34, 'การใช้LPG', 654, '8', '1', 2092.02, 64, 29.2416, 2121.26, 2, 10, '2021', 'vb26'),
(35, 'การใช้LPG', 956, '8', '3', 3058.05, 44, 27.2844, 3085.34, 2, 11, '2021', '25kk'),
(36, 'การใช้LPG', 325, '8', '1', 1039.61, 98, 44.7762, 1084.39, 2, 12, '2021', 'gh42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_use_waters`
--

CREATE TABLE `tb_use_waters` (
  `water_id` int(11) NOT NULL,
  `water_cubic` varchar(45) DEFAULT NULL,
  `water_month` int(11) NOT NULL,
  `water_year` int(11) NOT NULL,
  `water_cubic_eq` float NOT NULL,
  `water_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_use_waters`
--

INSERT INTO `tb_use_waters` (`water_id`, `water_cubic`, `water_month`, `water_year`, `water_cubic_eq`, `water_name`) VALUES
(24, '25', 1, 2021, 6.4375, 'การใช้น้ำประปานิคมฯ'),
(25, '48', 2, 2021, 12.36, 'การใช้น้ำประปานิคมฯ'),
(26, '56', 3, 2021, 14.42, 'การใช้น้ำประปานิคมฯ'),
(27, '87', 4, 2021, 22.4025, 'การใช้น้ำประปานิคมฯ'),
(28, '96', 5, 2021, 24.72, 'การใช้น้ำประปานิคมฯ'),
(29, '36', 6, 2021, 9.27, 'การใช้น้ำประปานิคมฯ'),
(30, '76', 7, 2021, 19.57, 'การใช้น้ำประปานิคมฯ'),
(31, '100', 8, 2021, 25.75, 'การใช้น้ำประปานิคมฯ'),
(32, '45', 9, 2021, 11.5875, 'การใช้น้ำประปานิคมฯ'),
(33, '82', 10, 2021, 21.115, 'การใช้น้ำประปานิคมฯ'),
(34, '65', 11, 2021, 16.7375, 'การใช้น้ำประปานิคมฯ'),
(35, '78', 12, 2021, 20.085, 'การใช้น้ำประปานิคมฯ'),
(36, '32', 1, 2021, 31.0304, 'การใช้น้ำประปาอ่อน'),
(37, '74', 2, 2021, 71.7578, 'การใช้น้ำประปาอ่อน'),
(38, '95', 3, 2021, 92.1215, 'การใช้น้ำประปาอ่อน'),
(39, '74', 4, 2021, 71.7578, 'การใช้น้ำประปาอ่อน'),
(40, '97', 5, 2021, 94.0609, 'การใช้น้ำประปาอ่อน'),
(41, '100', 6, 2021, 96.97, 'การใช้น้ำประปาอ่อน'),
(42, '53', 7, 2021, 51.3941, 'การใช้น้ำประปาอ่อน'),
(43, '120', 8, 2021, 116.364, 'การใช้น้ำประปาอ่อน'),
(44, '130', 9, 2021, 126.061, 'การใช้น้ำประปาอ่อน'),
(45, '99', 10, 2021, 96.0003, 'การใช้น้ำประปาอ่อน'),
(46, '87', 11, 2021, 84.3639, 'การใช้น้ำประปาอ่อน'),
(47, '103', 12, 2021, 99.8791, 'การใช้น้ำประปาอ่อน'),
(48, '105', 1, 2021, 217.098, 'การใช้น้ำRO'),
(49, '14', 2, 2021, 28.9464, 'การใช้น้ำRO'),
(50, '32', 3, 2021, 66.1632, 'การใช้น้ำRO'),
(51, '95', 4, 2021, 196.422, 'การใช้น้ำRO'),
(52, '97', 5, 2021, 200.557, 'การใช้น้ำRO'),
(53, '124', 6, 2021, 256.382, 'การใช้น้ำRO'),
(54, '68', 7, 2021, 140.597, 'การใช้น้ำRO'),
(55, '158', 8, 2021, 326.681, 'การใช้น้ำRO'),
(56, '35', 9, 2021, 72.366, 'การใช้น้ำRO'),
(57, '65', 10, 2021, 134.394, 'การใช้น้ำRO'),
(58, '78', 11, 2021, 161.273, 'การใช้น้ำRO'),
(59, '98', 12, 2021, 202.625, 'การใช้น้ำRO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waste_recycle`
--

CREATE TABLE `tb_waste_recycle` (
  `waste_id` int(11) NOT NULL,
  `waste_name` varchar(55) DEFAULT NULL,
  `waste_weight` varchar(55) DEFAULT NULL,
  `waste_company_destination` int(11) NOT NULL,
  `waste_cars` int(11) NOT NULL,
  `waste_eq` varchar(255) NOT NULL,
  `waste_distance` varchar(255) NOT NULL,
  `waste_distance_eq` varchar(255) NOT NULL,
  `waste_total_eq` varchar(255) NOT NULL,
  `waste_day` varchar(255) NOT NULL,
  `waste_month` int(255) NOT NULL,
  `waste_year` varchar(255) NOT NULL,
  `waste_car_codeid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_waste_recycle`
--

INSERT INTO `tb_waste_recycle` (`waste_id`, `waste_name`, `waste_weight`, `waste_company_destination`, `waste_cars`, `waste_eq`, `waste_distance`, `waste_distance_eq`, `waste_total_eq`, `waste_day`, `waste_month`, `waste_year`, `waste_car_codeid`) VALUES
(15, 'WASTE PET FILM', '120', 7, 1, '69.012', '120', '54.828', '123.84', '01', 1, '2021', 'yu52'),
(16, 'WASTE PET FILM', '150', 7, 1, '86.26499999999999', '40', '18.276', '104.541', '01', 2, '2021', '25lp'),
(17, 'WASTE PET FILM', '800', 7, 3, '460.0799999999999', '60', '37.206', '497.286', '01', 3, '2021', 'klp8'),
(18, 'WASTE PET FILM', '400', 7, 2, '230.03999999999996', '50', '24.6', '254.64', '01', 4, '2021', 'uy85'),
(19, 'WASTE PET FILM', '140', 7, 1, '80.514', '80', '36.552', '117.066', '01', 5, '2021', '26lk'),
(20, 'WASTE PET FILM', '203', 7, 1, '116.74529999999999', '70', '31.983', '148.7283', '01', 6, '2021', '59lk'),
(21, 'WASTE PET FILM', '900', 7, 3, '517.5899999999999', '30', '18.603', '536.193', '01', 7, '2021', 'gg36'),
(22, 'WASTE PET FILM', '523', 7, 2, '300.77729999999997', '70', '34.44', '335.2173', '01', 8, '2021', 'gf36'),
(23, 'WASTE PET FILM', '621', 7, 2, '357.1371', '64', '31.488', '388.6251', '01', 9, '2021', 'g5h3'),
(24, 'WASTE PET FILM', '412', 7, 1, '236.94119999999998', '65', '29.6985', '266.6397', '01', 10, '2021', 'yu84'),
(25, 'WASTE PET FILM', '465', 7, 2, '267.4215', '86', '42.312', '309.7335', '01', 11, '2021', 'ww53'),
(26, 'WASTE PET FILM', '350', 7, 1, '201.28499999999997', '56', '25.5864', '226.8714', '01', 12, '2021', 'jk59'),
(27, 'WASTE PET FILM', '786', 8, 1, '452.0286', '89', '40.6641', '492.6927', '02', 1, '2021', 'gh41'),
(28, 'WASTE PET FILM', '987', 8, 3, '567.6237', '69', '42.7869', '610.4106', '02', 2, '2021', 'vb26'),
(29, 'WASTE PET FILM', '168', 8, 2, '96.61679999999998', '98', '48.216', '144.8328', '02', 3, '2021', 'bc16'),
(30, 'WASTE PET FILM', '196', 8, 1, '112.71959999999999', '49', '22.3881', '135.1077', '02', 4, '2021', 'vc96'),
(31, 'WASTE PET FILM', '732', 8, 1, '420.97319999999996', '98', '44.7762', '465.7494', '02', 5, '2021', 'df26'),
(32, 'WASTE PET FILM', '498', 8, 2, '286.39979999999997', '32', '15.744', '302.1438', '02', 6, '2021', 'rfg6'),
(33, 'WASTE PET FILM', '396', 8, 2, '227.73959999999997', '65', '31.98', '259.7196', '02', 7, '2021', 'gfd2'),
(34, 'WASTE PET FILM', '489', 8, 3, '281.22389999999996', '63', '39.0663', '320.2902', '02', 8, '2021', 'fd52'),
(35, 'WASTE PET FILM', '898', 8, 1, '516.4398', '59', '26.9571', '543.3969', '02', 9, '2021', 'fg6'),
(36, 'WASTE PET FILM', '234', 8, 2, '134.5734', '65', '31.98', '166.5534', '02', 10, '2021', 'xc36'),
(37, 'WASTE PET FILM', '196', 8, 2, '112.71959999999999', '28', '13.776', '126.4956', '02', 11, '2021', 'ng56'),
(38, 'WASTE PET FILM', '988', 8, 1, '568.1987999999999', '98', '44.7762', '612.975', '02', 12, '2021', 'cv96');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_energy_touse`
--
ALTER TABLE `tb_energy_touse`
  ADD PRIMARY KEY (`eg_id`);

--
-- Indexes for table `tb_factors`
--
ALTER TABLE `tb_factors`
  ADD PRIMARY KEY (`factor_id`);

--
-- Indexes for table `tb_month`
--
ALTER TABLE `tb_month`
  ADD PRIMARY KEY (`mon_id`);

--
-- Indexes for table `tb_pollution`
--
ALTER TABLE `tb_pollution`
  ADD PRIMARY KEY (`pollution_id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tb_raw_materials`
--
ALTER TABLE `tb_raw_materials`
  ADD PRIMARY KEY (`raw_id`);

--
-- Indexes for table `tb_typecars`
--
ALTER TABLE `tb_typecars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `tb_typeoil`
--
ALTER TABLE `tb_typeoil`
  ADD PRIMARY KEY (`typeoil_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_use_energy`
--
ALTER TABLE `tb_use_energy`
  ADD PRIMARY KEY (`energy_id`);

--
-- Indexes for table `tb_use_lpg`
--
ALTER TABLE `tb_use_lpg`
  ADD PRIMARY KEY (`lpg_id`);

--
-- Indexes for table `tb_use_waters`
--
ALTER TABLE `tb_use_waters`
  ADD PRIMARY KEY (`water_id`);

--
-- Indexes for table `tb_waste_recycle`
--
ALTER TABLE `tb_waste_recycle`
  ADD PRIMARY KEY (`waste_id`),
  ADD UNIQUE KEY `waste_id` (`waste_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_energy_touse`
--
ALTER TABLE `tb_energy_touse`
  MODIFY `eg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_factors`
--
ALTER TABLE `tb_factors`
  MODIFY `factor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_raw_materials`
--
ALTER TABLE `tb_raw_materials`
  MODIFY `raw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_typecars`
--
ALTER TABLE `tb_typecars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_use_energy`
--
ALTER TABLE `tb_use_energy`
  MODIFY `energy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_use_lpg`
--
ALTER TABLE `tb_use_lpg`
  MODIFY `lpg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_use_waters`
--
ALTER TABLE `tb_use_waters`
  MODIFY `water_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_waste_recycle`
--
ALTER TABLE `tb_waste_recycle`
  MODIFY `waste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
