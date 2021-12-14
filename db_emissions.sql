-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 05:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
(1, 'บริษัทกรุงโซล', 1),
(2, 'บริษัทกรุงทิพ', 1),
(3, 'mayuke.co', 1),
(4, 'ซีเรียส คอมพลีท', 1),
(5, 'ordee', 1);

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
(13, 'การใช้ไฟฟ้า', '121', 1, '2021', '242.0'),
(14, 'การใช้ไฟฟ้า', '15', 3, '2021', '30.0'),
(17, 'การใช้ NG', '151', 1, '2021', '302.0'),
(18, 'การใช้ NG', '55', 3, '2021', '110.0'),
(19, 'การใช้ไฟฟ้า', '15', 2, '2021', '30.0'),
(21, 'การใช้ NG', '555', 5, '2021', '1110.0'),
(23, 'การใช้ไฟฟ้า', '5555', 9, '2021', '11110.0'),
(24, 'การใช้ไฟฟ้า', '1150', 5, '2021', '2300.0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_factors`
--

CREATE TABLE `tb_factors` (
  `factor_id` int(11) NOT NULL,
  `factor_date` varchar(45) DEFAULT NULL,
  `factor_time` varchar(45) DEFAULT NULL,
  `factor_rawmaterial` varchar(45) DEFAULT NULL,
  `factor_weight` varchar(45) DEFAULT NULL,
  `factor_distance` varchar(45) DEFAULT NULL,
  `factor_sum` varchar(45) DEFAULT NULL,
  `factor_company` int(11) NOT NULL,
  `factor_cars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'ข้อมูลสินค้า', '192', 1, 1, '288.0', '150', '300.0', '586.5', 1, '2021', 'ron89', '20'),
(17, 'PET CHIP', '1223', 1, 1, '1834.5', '1223', '2446.0', '4280.5', 5, '2021', '1223', '18'),
(18, 'ข้อมูลสินค้า', '8520', 1, 1, '12780.0', '8520', '17040.0', '29820.0', 12, '2021', '8520', '8'),
(19, 'ข้อมูลสินค้า', '741', 1, 2, '1111.5', '741', '1482.0', '2593.5', 6, '2021', '741', '5'),
(20, 'ข้อมูลสินค้า', '644', 1, 1, '966.0', '3453', '6906.0', '7738.5', 4, '2021', '555', '8'),
(21, 'ข้อมูลสินค้า', '120', 1, 1, '180.0', '10', '4.569', '200.0', 7, '2021', 'tyt25', '8');

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
(23, 'PET CHIP', '55', 1, 2, '82.5', '55', '110.0', '192.5', '01', 10, '2021', '55'),
(26, 'PET CHIP', '100 ', 2, 2, '752', '226', '126', '120', '02', 5, '2021', '2651'),
(27, 'PET CHIP', '1232', 1, 2, '1848.0', '595', '1190.0', '3038.0', '03', 6, '2021', '1356'),
(34, 'PET CHIP', '205', 1, 2, '307.5', '369', '738.0', '1045.5', '04', 12, '2021', '1120'),
(35, 'PET CHIP', '654', 1, 2, '981.0', '321', '642.0', '1623.0', '05', 6, '2021', '1017'),
(36, 'PET CHIP', '2252', 1, 2, '3378.0', '333', '666.0', '4044.0', '07', 4, '2021', '234'),
(37, 'PET CHIP', '286', 1, 1, '429.0', '2238', '4476.0', '5137.5', '07', 7, '2021', '9281'),
(40, 'PET CHIP', '511', 1, 1, '766.5', '324', '648.0', '1414.5', '05', 12, '2021', '1142'),
(41, 'PET CHIP', '2223', 1, 2, '3334.5', '982', '1964.0', '5298.5', '02', 1, '2021', '341'),
(42, 'PET CHIP', '582', 2, 1, '873.0', '293', '586.0', '1459.0', '04', 1, '2021', '1234'),
(43, 'PET CHIP', '120', 1, 1, '180.0', '10', '4.569', '200.0', '08', 7, '2021', 'tr88');

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
  `user_status` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_fullname`, `company_id`, `user_email`, `user_password`, `user_taxpayer`, `user_telephone`, `user_type`, `user_approved`, `user_status`) VALUES
(1, 'suhaira awae', NULL, 'haira@gmail.com', '1234', '11', '0996574451', '4', NULL, '1'),
(2, 'jasmin ma', NULL, 'min42@gmail.com', '1234', '22', '0986656784', '1', NULL, '1'),
(3, 'mayukee', NULL, 'mayukee2010@gmail.com', '12345', '1123', '0936520513', '4', NULL, '1'),
(4, 'สมพร  บนยา', 4, 'mayukee2010@gmail.com', '12345', '11456', '0936520513', '4', NULL, '1'),
(5, 'wddww', 1, 'dwwdd', 'dwwddwdwwddwwddw', NULL, 'dwwddw', '1', NULL, '1'),
(6, 'zaazaz', 2, 'zaaz', 'zazaazaz', NULL, 'zaaz', '2', NULL, '1'),
(7, 'yhhyhy', 2, 'hyhy', 'yhhyhyyh', NULL, 'hyhy', '3', NULL, '1'),
(8, 'mayukee', 2, 'keelala@gmail.com', '1234', NULL, '0936520513', '1', NULL, '1'),
(9, 'or', 5, 'owner@gmail.com', '0936520513', '77266', '0936520513', '4', NULL, '1'),
(10, 'mana', 3, 'manager@gmail.com', '1234', NULL, '093652222', '1', NULL, '1'),
(11, 'super', 3, 'super@gmail.com', '1234', NULL, '0399333', '2', NULL, '1'),
(12, 'reco', 4, 'reco@gmail.com', '1234', NULL, '0936520513', '3', NULL, '1'),
(13, 'ManSuper', 5, 'manSuper', '123', NULL, '0202020202', '2', NULL, '1');

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
  `lpg_weight_eq` int(11) NOT NULL,
  `lpg_distance` int(11) NOT NULL,
  `lpg_distance_eq` int(11) NOT NULL,
  `lpg_total_eq` int(11) NOT NULL,
  `lpg_day` int(11) NOT NULL,
  `lpg_month` int(11) NOT NULL,
  `lpg_year` varchar(255) NOT NULL,
  `lpg_car_codeid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_use_lpg`
--

INSERT INTO `tb_use_lpg` (`lpg_id`, `lpg_name`, `lpg_weight`, `lpg_company_origin`, `lpg_cars`, `lpg_weight_eq`, `lpg_distance`, `lpg_distance_eq`, `lpg_total_eq`, `lpg_day`, `lpg_month`, `lpg_year`, `lpg_car_codeid`) VALUES
(4, 'การใช้LPG', 500, '3', '1', 750, 8474, 16948, 17698, 3, 1, '2021', 'as69'),
(5, 'การใช้LPG', 150, '1', '1', 225, 90, 180, 405, 1, 2, '2021', '12po'),
(6, 'การใช้LPG', 120, '1', '1', 180, 10, 5, 200, 8, 7, '2021', 'yt20'),
(7, 'การใช้LPG', 120, '5', '1', 180, 10, 5, 200, 9, 8, '2021', '85uy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_use_waters`
--

CREATE TABLE `tb_use_waters` (
  `water_id` int(11) NOT NULL,
  `water_cubic` varchar(45) DEFAULT NULL,
  `water_month` int(11) NOT NULL,
  `water_year` int(11) NOT NULL,
  `water_cubic_eq` int(11) NOT NULL,
  `water_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_use_waters`
--

INSERT INTO `tb_use_waters` (`water_id`, `water_cubic`, `water_month`, `water_year`, `water_cubic_eq`, `water_name`) VALUES
(7, '55', 1, 2021, 83, 'การใช้น้ำประปานิคมฯ'),
(8, '1151', 5, 2021, 1727, 'การใช้น้ำประปาอ่อน'),
(9, '8522', 7, 2021, 12783, 'การใช้น้ำประปานิคมฯ'),
(10, '455', 10, 2021, 683, 'การใช้น้ำRO');

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
(2, 'WASTE PET FILM', '700', 1, 1, '1050.0', '50', '100.0', '1150.0', '13', 2, '2021', '1414'),
(3, 'WASTE PET FILM', '150', 1, 2, '225.0', '500', '1000.0', '1270.0', '12', 4, '2021', '0528'),
(4, 'WASTE PET FILM', '78', 2, 2, '117.0', '8888', '17776.0', '17893.0', '11', 4, '2021', '666'),
(5, 'WASTE PET FILM', '500', 1, 2, '750.0', '60', '120.0', '720.0', '08', 10, '2021', 'rt88'),
(6, 'WASTE PET FILM', '80', 1, 2, '120.0', '80', '160.0', '265.0', '05', 3, '2021', 'gg55'),
(7, 'WASTE PET FILM', '150', 2, 1, '225.0', '202', '404.0', '629.0', '03', 3, '2021', '121kk'),
(8, 'WASTE PET FILM', '80', 1, 1, '120.0', '50', '100.0', '220.0', '01', 1, '2021', 'gtr88'),
(9, 'WASTE PET FILM', '50', 1, 1, '75.0', '80', '160.0', '235.0', '02', 1, '2021', 'gtr35'),
(10, 'WASTE PET FILM', '15', 2, 1, '22.5', '567', '1134.0', '1156.5', '27', 11, '2021', 'tyo32'),
(11, 'WASTE PET FILM', '87', 1, 1, '130.5', '78', '156.0', '286.5', '06', 9, '2021', 'rf898'),
(12, 'WASTE PET FILM', '369', 2, 1, '553.5', '150', '68.535', '853.5', '06', 8, '2021', '1po23'),
(13, 'WASTE PET FILM', '120', 1, 1, '180.0', '10', '4.569', '200.0', '08', 7, '2021', 'nr25');

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
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_energy_touse`
--
ALTER TABLE `tb_energy_touse`
  MODIFY `eg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_raw_materials`
--
ALTER TABLE `tb_raw_materials`
  MODIFY `raw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_typecars`
--
ALTER TABLE `tb_typecars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_use_energy`
--
ALTER TABLE `tb_use_energy`
  MODIFY `energy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_use_lpg`
--
ALTER TABLE `tb_use_lpg`
  MODIFY `lpg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_use_waters`
--
ALTER TABLE `tb_use_waters`
  MODIFY `water_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_waste_recycle`
--
ALTER TABLE `tb_waste_recycle`
  MODIFY `waste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
