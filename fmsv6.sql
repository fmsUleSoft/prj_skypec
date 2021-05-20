-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 12:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmsv6`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IATAcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ICAOcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `deleted_at`, `created_at`, `updated_at`, `IATAcode`, `ICAOcode`, `name`, `area`, `IsActive`) VALUES
(1, NULL, '2021-01-11 10:24:13', '2021-01-16 21:08:48', 'HAN', 'VVNB', 'Sân bay Quốc tế Nội Bài', 'Miền Bắc', 1),
(2, NULL, '2021-01-11 10:28:35', '2021-01-14 19:14:00', 'DAD', 'VVDN', 'Sân bay Quốc tế Đà Nẵng', 'Miền Trung', 1),
(3, NULL, '2021-01-11 11:40:17', '2021-01-14 19:14:07', 'SGN', 'VVTS', 'Sân bay Quốc tế Tân Sơn Nhất', 'Miền Nam', 1),
(4, NULL, '2021-01-13 20:07:53', '2021-01-14 19:14:28', 'HPH', 'VVCI', 'Sân bay Quốc tế Cát Bi', 'Miền Bắc', 1),
(5, NULL, '2021-01-13 20:08:39', '2021-01-14 19:14:36', 'DIN', 'VVDB', 'Sân bay Điện Biên Phủ', 'Miền Bắc', 0),
(6, NULL, '2021-01-13 20:09:15', '2021-01-14 19:14:43', 'THD', 'VVTX', 'Sân bay Thọ Xuân', 'Miền Bắc', 1),
(7, NULL, '2021-01-13 21:49:13', '2021-01-14 19:14:53', 'VII', 'VVVH', 'Sân bay Quốc tế Vinh', 'Miền Bắc', 1),
(8, NULL, '2021-01-13 21:50:36', '2021-01-14 19:15:00', 'VDH', 'VVDH', 'Sân bay Đồng Hới', 'Miền Bắc', 1),
(9, NULL, '2021-01-13 21:53:30', '2021-01-14 19:28:13', 'HUI', 'VVPB', 'Sân bay Quốc tế Phú Bài', 'Miền Trung', 1),
(10, NULL, '2021-01-13 21:54:22', '2021-01-14 19:30:18', 'VCL', 'VVCL', 'Sân bay Quốc tế Chu Lai', 'Miền Trung', 1),
(11, NULL, '2021-01-13 21:55:21', '2021-01-14 19:30:01', 'UIH', 'VVPC', 'Sân bay Phù Cát', 'Miền Trung', 1),
(12, NULL, '2021-01-13 21:56:06', '2021-01-14 19:28:33', 'TBB', 'VVTH', 'Sân bay Tuy Hòa', 'Miền Trung', 1),
(13, NULL, '2021-01-13 21:56:57', '2021-01-14 19:30:50', 'CXR', 'VVCR', 'Sân bay Quốc tế Cam Ranh', 'Miền Trung', 1),
(14, NULL, '2021-01-13 21:57:55', '2021-01-14 19:33:11', 'BMV', 'VVBM', 'Sân bay Buôn Ma Thuật', 'Miền Nam', 1),
(15, NULL, '2021-01-13 21:58:39', '2021-01-14 19:32:44', 'DLI', 'VVDL', 'Sân bay Liên Khương', 'Miền Nam', 1),
(16, NULL, '2021-01-13 21:59:15', '2021-01-14 19:29:15', 'PXU', 'VVPK', 'Sân bay Pleiku', 'Miền Trung', 1),
(17, NULL, '2021-01-13 21:59:58', '2021-01-14 19:33:24', 'CAH', 'VVCM', 'Sân bay Cà Mau', 'Miền Nam', 0),
(18, NULL, '2021-01-13 22:01:00', '2021-01-14 19:33:32', 'VCS', 'VVCS', 'Sân bay Côn Đảo', 'Miền Nam', 0),
(19, NULL, '2021-01-13 22:01:48', '2021-01-14 19:32:06', 'VCA', 'VVCT', 'Sân bay Quốc tế Cần Thơ', 'Miền Nam', 1),
(20, NULL, '2021-01-13 22:02:21', '2021-01-14 19:33:41', 'VKG', 'VVRG', 'Sân bay Rạch Giá', 'Miền Nam', 0),
(21, NULL, '2021-01-13 22:03:16', '2021-01-14 19:31:35', 'PQC', 'VVPQ', 'Sân bay Quốc tế Phú Quốc', 'Miền Nam', 1),
(22, NULL, '2021-01-13 22:03:44', '2021-01-14 19:15:17', 'VDO', 'VVVD', 'Sân bay Quốc tế Vân Đồn', 'Miền Bắc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `backup_size` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customergroups`
--

CREATE TABLE `customergroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customergroups`
--

INSERT INTO `customergroups` (`id`, `deleted_at`, `created_at`, `updated_at`, `code`, `name`, `description`, `IsActive`) VALUES
(1, NULL, '2021-01-24 04:28:45', '2021-01-24 04:42:49', 'D', 'Đại lý', '', 1),
(2, NULL, '2021-01-24 04:29:34', '2021-01-24 04:43:08', 'H', 'Hãng hàng không', '', 1),
(3, NULL, '2021-01-24 04:30:14', '2021-01-24 04:43:24', 'K', 'Ngoài hàng không', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerlocals`
--

CREATE TABLE `customerlocals` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customerlocals`
--

INSERT INTO `customerlocals` (`id`, `deleted_at`, `created_at`, `updated_at`, `code`, `name`, `description`, `IsActive`) VALUES
(1, NULL, '2021-01-24 04:58:48', '2021-01-24 04:58:48', 'N', 'Nội địa', '', 1),
(2, NULL, '2021-01-24 05:02:01', '2021-01-24 05:02:01', 'Q', 'Quốc tế', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `taxcode` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `group` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `local` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `contract` tinyint(1) NOT NULL DEFAULT 0,
  `contractnumber` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `expirationdate` date DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `currency` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `agency` int(10) UNSIGNED DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `nameinvoice` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `deleted_at`, `created_at`, `updated_at`, `code`, `name`, `address`, `taxcode`, `group`, `local`, `contract`, `contractnumber`, `expirationdate`, `unit`, `currency`, `agency`, `IsActive`, `airport`, `nameinvoice`) VALUES
(1, NULL, '2021-01-25 01:13:23', '2021-02-23 13:21:45', 'VN', 'Vietnam Airlines', 'Số 200, Phố Nguyễn Sơn, Phường Bồ Đề, Quận Long Biên, Thành phố Hà Nội, Việt Nam', '0100107518', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'TỔNG CÔNG TY HÀNG KHÔNG VIỆT NAM - CTCP'),
(2, NULL, NULL, NULL, 'AEROFUELS', 'Aerofuels Overseas', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AEROFUELS OVERSEAS LIMITED'),
(3, NULL, NULL, NULL, 'AML', 'AML Global', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AML GLOBAL LIMITED'),
(4, NULL, NULL, NULL, 'AURORA', 'Aurora Jet Fuel', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AURORA JET FUEL DMCC'),
(5, NULL, NULL, NULL, 'CLICK', 'Click Aviation Network', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CLICK AVIATION NETWORK'),
(6, NULL, NULL, NULL, 'DHT', 'DHT Aviation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'DHT AVIATION INC'),
(7, NULL, NULL, NULL, 'CALTEX', 'GS Caltex Corporation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'GS CALTEX CORPORATION'),
(8, NULL, NULL, NULL, 'HAV', 'HAV Aviation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'HAV AVIATION INC'),
(9, NULL, NULL, NULL, 'HYUNDAI', 'Hyundai Corporation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'HYUNDAI CORPORATION'),
(10, NULL, NULL, NULL, 'JETEX', 'Jetex FZE', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'JETEX FZE'),
(11, NULL, NULL, NULL, 'SINOPEC', 'Sinopec Aviation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'SINOPEC AVIATION CO.,LTD'),
(12, NULL, NULL, NULL, 'SUCCESS', 'Success Aviation Services', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'SUCCESS AVIATION SERVICES'),
(13, NULL, NULL, NULL, 'T&T', 'T&T', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'T&T CO.,LTD'),
(14, NULL, NULL, NULL, 'UAS', 'United Aviation Services', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'UNITED AVIATION SERVICES'),
(15, NULL, NULL, NULL, 'UVAIR', 'Universal Weather & Aviation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'UNIVERSAL WEATHER & AVIATION, INC'),
(16, NULL, NULL, NULL, 'VIETSKY', 'Vietsky Support Company', '', '', 1, 1, 1, '', NULL, '2', 2, NULL, 1, 1, 'VIETSKY SUPPORT COMPANY'),
(17, NULL, NULL, NULL, 'WFS', 'World Fuel Services', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'WORLD FUEL SERVICES'),
(18, NULL, NULL, '2021-02-25 19:55:37', 'VSM', 'VietStar Airlines', '286 Hoàng Hoa Thám, Phường 12, Quận Tân Bình, Thành phố Hồ Chí Minh', '0309967025', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY CỔ PHẦN HÀNG KHÔNG LƯỠNG DỤNG NGÔI SAO VIỆT'),
(19, NULL, NULL, '2021-02-28 01:05:04', 'QH', 'Bamboo Airways', 'Khu số 4, Khu du lịch biển Nhơn Lý - Cát Tiến, Xã Nhơn Lý, Thành phố Quy Nhơn, Tỉnh Bình Định, Việt Nam', '0107867370', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY CỔ PHẦN HÀNG KHÔNG TRE VIỆT'),
(20, NULL, NULL, '2021-02-25 14:07:40', 'VJ', 'VietJetAir', '302/3 Phố Kim Mã, Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội, Việt Nam', '0102325399', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY CỔ PHẦN HÀNG KHÔNG VIETJET'),
(21, NULL, NULL, NULL, '0V', 'VASCO', 'B114 Đường Bạch Đằng, Phường 2, Quận Tân Bình, Thành Phố Hồ Chí Minh, Việt Nam', '0100107518-014', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CHI NHÁNH TỔNG CÔNG TY HÀNG KHÔNG VIỆT NAM - CTCP - CÔNG TY BAY DỊCH VỤ HÀNG KHÔNG'),
(22, NULL, NULL, NULL, 'HAI', 'Haiau Aviation', 'Tầng 9, Số 70-72 Bà Triệu, Phường Hàng Bài, Quận Hoàn Kiếm, Thành Phố Hà Nội, Việt Nam', '4201293113', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY CỔ PHẦN HÀNG KHÔNG HẢI ÂU'),
(23, NULL, NULL, NULL, 'BL', 'Pacific Airlines', '112 Hồng Hà, Phường 2, Quận Tân Bình, Thành Phố Hồ Chí Minh, Việt Nam', '0301103030', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY CỔ PHẦN HÀNG KHÔNG PACIFIC AIRLINES'),
(24, NULL, NULL, NULL, 'VU', 'Vietravel Airlines', 'Số 17 Lê Quý Đôn, Phường Phú Hội, Thành phố Huế, Tỉnh Thừa Thiên Huế', '3301644331', 2, 1, 1, '', NULL, '1', 1, NULL, 1, 1, 'CÔNG TY TNHH HÀNG KHÔNG LỮ HÀNH VIỆT NAM'),
(25, NULL, NULL, NULL, 'HABERT', 'Habert Company Limited', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'HABERT COMPANY LIMITED'),
(26, NULL, NULL, NULL, 'MIXJET', 'Mixjet Flight Support FZE', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'MIXJET FLIGHT SUPPORT FZE'),
(27, NULL, NULL, NULL, 'TRIPLE', 'Triple Star Aviation', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'TRIPLE STAR AVIATION'),
(28, NULL, NULL, NULL, 'ASM', 'Aviation Service Management', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AVIATION SERVICE MANAGEMENT'),
(29, NULL, NULL, NULL, 'AEROPEARL', 'Aeropearl', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AEROPEARL'),
(30, NULL, NULL, NULL, 'ISTANBUL', 'Istanbul', '', '', 1, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'ISTANBUL'),
(31, NULL, NULL, '2021-02-28 18:44:47', '2P', 'Philippines Airlines', '', '', 2, 2, 1, '', '0000-00-00', '2', 2, 17, 1, 1, 'PHILIPPINES AIRLINES'),
(32, NULL, NULL, NULL, '3K', 'Jetstar Asia Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'JETSTAR ASIA AIRWAYS'),
(33, NULL, NULL, NULL, '3Q', 'China Yunnan Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'CHINA YUNNAN AIRLINES'),
(34, NULL, NULL, NULL, '3S', 'AeroLogic GMBH Cargo', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AEROLOGIC GMBH CARGO'),
(35, NULL, NULL, NULL, '3U', 'Sichuan Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SICHUAN AIRLINES'),
(36, NULL, NULL, NULL, '5J', 'Cebu Pacific Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'CEBU PACIFIC AIRWAYS'),
(37, NULL, NULL, NULL, '5Y', 'Atlas Air', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'ATLAS AIR'),
(38, NULL, NULL, NULL, '7C', 'Jeju Air', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'JEJU AIR'),
(39, NULL, NULL, NULL, '7L', 'Silk Way West Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SILK WAY WEST AIRLINES'),
(40, NULL, NULL, NULL, '8L', 'Lucky Air', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'LUCKY AIR'),
(41, NULL, NULL, NULL, '9C', 'Spring Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 12, 1, 1, 'SPRING AIRLINES'),
(42, NULL, NULL, NULL, 'ADB', 'Antonov Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'ANTONOV AIRLINES'),
(43, NULL, NULL, NULL, 'AE', 'Mandarin Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'MANDARIN AIRLINES'),
(44, NULL, NULL, NULL, 'AK', 'AirAsia', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'AIR ASIA BERHAD CO.,LTD'),
(45, NULL, NULL, NULL, 'AX', 'Global Africa UK Cargo', '', '', 2, 2, 1, '', NULL, '2', 2, 10, 1, 1, 'GLOBAL AFRICA UK CARGO'),
(46, NULL, NULL, NULL, 'AY', 'Finnair OYJ', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'FINNAIR OYJ'),
(47, NULL, NULL, NULL, 'B7', 'UNI Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'UNI AIRWAYS CORPORATION'),
(48, NULL, NULL, NULL, 'BI', 'Royal Brunei Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'ROYAL BRUNEI AIRLINES SDN BHD'),
(49, NULL, NULL, NULL, 'BK', 'Okay Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'OKAY AIRWAYS'),
(50, NULL, NULL, NULL, 'BR', 'EVA Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'EVA AIRWAYS'),
(51, NULL, NULL, NULL, 'BX', 'Air Busan', '', '', 2, 2, 1, '', NULL, '2', 2, 9, 1, 1, 'AIR BUSAN'),
(52, NULL, NULL, NULL, 'BY', 'Thomson Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'THOMSON AIRWAYS'),
(53, NULL, NULL, NULL, 'CA', 'Air China', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'AIR CHINA'),
(54, NULL, NULL, NULL, 'CI', 'China Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CHINA AIRLINES'),
(55, NULL, NULL, NULL, 'CK', 'China Cargo Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CHINA CARGO AIRLINES'),
(56, NULL, NULL, NULL, 'CV', 'Cargolux', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CARGOLUX AIRLINES INTERNATIONAL'),
(57, NULL, NULL, NULL, 'CX', 'Cathay Pacific', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CATHAY PACIFIC AIRWAYS'),
(58, NULL, NULL, NULL, 'CZ', 'China Southern Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'CHINA SOUTHERN AIRLINES'),
(59, NULL, NULL, NULL, 'DD', 'Nok Air', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'NOK AIRLINES'),
(60, NULL, NULL, NULL, 'DK', 'Thomas Cook Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'THOMAS COOK AIRLINES'),
(61, NULL, NULL, NULL, 'DR', 'Ruili Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'RUILI AIRLINES'),
(62, NULL, NULL, NULL, 'DZ', 'Donghai Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'DONGHAI AIRLINES'),
(63, NULL, NULL, NULL, 'EK', 'Emirates', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'EMIRATES'),
(64, NULL, NULL, NULL, 'ET', 'Ethiopian Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'ETHIOPIAN AIRLINES'),
(65, NULL, NULL, NULL, 'FD', 'Thai AirAsia', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'THAII AIRASIA CO., LTD'),
(66, NULL, NULL, NULL, 'FM', 'Shanghai Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'SHANGHAI AIRLINES'),
(67, NULL, NULL, NULL, 'FX', 'FedEx', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'FEDERAL EXPRESS CORPORATION'),
(68, NULL, NULL, NULL, 'GAA', 'Global Africa', '', '', 2, 2, 1, '', NULL, '2', 2, 12, 1, 1, 'GLOBAL AFRICA'),
(69, NULL, NULL, NULL, 'GI', 'Longhao Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'CHINA CENTRAL LONGHAO AIRLINES CO., LTD'),
(70, NULL, NULL, NULL, 'GJ', 'Loong Air', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'ZHEJIANG LOONG AIRLINES'),
(71, NULL, NULL, NULL, 'GK', 'Jetstar Japan', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'JETSTAR JAPAN'),
(72, NULL, NULL, NULL, 'GX', 'Guangxi Beibu Gulf Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'GUANGXI BEIBU GULF AIRLINES'),
(73, NULL, NULL, NULL, 'HS', 'Hinson Corporate Flight Services', '', '', 2, 2, 1, '', NULL, '2', 2, 14, 1, 1, 'HINSON CORPORATE FLIGHT SERVICES, INC'),
(74, NULL, NULL, NULL, 'HU', 'Hainan Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 9, 1, 1, 'HAINAN AIRLINES'),
(75, NULL, NULL, NULL, 'HX', 'Hong Kong Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'HONGKONG AIRLINES'),
(76, NULL, NULL, NULL, 'IK', 'Air Kiribati', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AIR KIRIBATI'),
(77, NULL, NULL, NULL, 'IO', 'IrAero', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'IRAERO'),
(78, NULL, NULL, NULL, 'IT', 'Tigerair Taiwan', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'TIGERAIR TAIWAN'),
(79, NULL, NULL, NULL, 'JD', 'Beijing Capital Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'BEIJING CAPITAL AIRLINES'),
(80, NULL, NULL, NULL, 'JQ', 'Jetstar Airways', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'JETSTAR AIRWAYS PTY LIMITED'),
(81, NULL, NULL, NULL, 'JX', 'Starlux Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'STARLUX AIRLINES'),
(82, NULL, NULL, NULL, 'K6', 'Cambodia Angkor Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'CAMBODIA ANGKOR AIR'),
(83, NULL, NULL, NULL, 'KA', 'Hongkong Dragon Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'HONGKONG DRAGON AIRLINES'),
(84, NULL, NULL, NULL, 'KE', 'Korean Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'KOREAN AIRLINES'),
(85, NULL, NULL, NULL, 'KJ', 'Air Incheon', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'AIR INCHEON'),
(86, NULL, NULL, NULL, 'KQ', 'Kenya Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'KENYA AIRWAYS'),
(87, NULL, NULL, NULL, 'LD', 'Air Hong Kong', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AIR HONG KONG LIMITED'),
(88, NULL, NULL, NULL, 'LH', 'Lufthansa', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'LUFTHANSA'),
(89, NULL, NULL, NULL, 'LJ', 'Jin Air', '', '', 2, 2, 1, '', NULL, '2', 2, 7, 1, 1, 'JIN AIR (LJ)'),
(90, NULL, NULL, NULL, 'LO', 'LOT Polish Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'LOT POLISH AIRLINES'),
(91, NULL, NULL, NULL, 'MF', 'Xiamen Air', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'XIAMEN AIRLINES'),
(92, NULL, NULL, NULL, 'MH', 'Malaysia Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'MALAYSIA AIRLINES BERHAD'),
(93, NULL, NULL, NULL, 'MI', 'SilkAir', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SILKAIR'),
(94, NULL, NULL, NULL, 'MU', 'China Eastern Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'CHINA EASTERN AIRLINES'),
(95, NULL, NULL, NULL, 'N4', 'Nordwind Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'NORDWIND AIRLINES'),
(96, NULL, NULL, NULL, 'NH', 'All Nippon Airways', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'ALL NIPPON AIRWAYS'),
(97, NULL, NULL, NULL, 'NX', 'Air Macau', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AIR MACAU COMPANY LTD'),
(98, NULL, NULL, NULL, 'NZ', 'Air New Zealand', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'AIR NEW ZEALAND LIMITED'),
(99, NULL, NULL, NULL, 'O3', 'SF Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'SF AIRLINES'),
(100, NULL, NULL, NULL, 'OQ', 'Chongqing Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'CHONGQING AIRLINES'),
(101, NULL, NULL, NULL, 'OS', 'Austrian Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'AUSTRIAN AIRLINES'),
(102, NULL, NULL, NULL, 'OZ', 'Asiana Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 9, 1, 1, 'ASIANA AIRLINES'),
(103, NULL, NULL, NULL, 'P3', 'CargoLogicAir', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'CARGOLOGICAIR'),
(104, NULL, NULL, NULL, 'PG', 'Bangkok Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'BANGKOK AIRWAYS'),
(105, NULL, NULL, NULL, 'PO', 'Polar Air Cargo', '', '', 2, 2, 1, '', NULL, '2', 2, 14, 1, 1, 'POLAR AIR CARGO'),
(106, NULL, NULL, NULL, 'QF', 'Qantas', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'QANTAS AIRWAYS'),
(107, NULL, NULL, NULL, 'QR', 'Qatar Airways', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'QATAR AIRWAYS GROUP Q.C.S.C'),
(108, NULL, NULL, NULL, 'QV', 'Lao Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'LAO AIRLINES'),
(109, NULL, NULL, NULL, 'QW', 'Qingdao Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'QINGDAO AIRLINES'),
(110, NULL, NULL, NULL, 'RH', 'Hong Kong Air Cargo', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'HONGKONG AIR CARGO'),
(111, NULL, NULL, NULL, 'RL', 'Royal Flight', '', '', 2, 2, 1, '', NULL, '2', 2, 30, 1, 1, 'ROYAL FLIGHT'),
(112, NULL, NULL, NULL, 'RS', 'Air Seoul', '', '', 2, 2, 1, '', NULL, '2', 2, 9, 1, 1, 'AIR SEOUL'),
(113, NULL, NULL, NULL, 'RU', 'AirBridgeCargo Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'AIRBRIDGECARGO AIRLINES'),
(114, NULL, NULL, NULL, 'S7', 'S7 Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'S7 AIRLINES'),
(115, NULL, NULL, NULL, 'SC', 'Shandong Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SHANGDONG AIRLINES'),
(116, NULL, NULL, NULL, 'SL', 'Thai Lion Air', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'THAI LION AIR'),
(117, NULL, NULL, NULL, 'SQ', 'Singapore Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SINGAPORE AIRLINES'),
(118, NULL, NULL, NULL, 'SQC', 'Singapore Airlines Cargo', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'SINGAPORE AIRLINES CARGO'),
(119, NULL, NULL, '2021-05-14 22:52:31', 'SU', 'Aeroflot', '', '', 2, 2, 1, '', '2001-11-30', '2', 2, 3, 1, 1, 'AEROFLOT'),
(120, NULL, NULL, NULL, 'SV', 'Saudi Arabian Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SAUDI ARABIAN AIRLINES'),
(121, NULL, NULL, NULL, 'TG', 'Thai Airways', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'THAI AIRWAYS INTERNATIONAL'),
(122, NULL, NULL, NULL, 'TH', 'Raya Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'RAYA AIRWAYS'),
(123, NULL, NULL, NULL, 'TK', 'Turkish Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'TURKISH AIRLINES'),
(124, NULL, NULL, NULL, 'TR', 'Tiger Airways', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'TIGER AIRWAYS'),
(125, NULL, NULL, NULL, 'TW', 'T\'way Air', '', '', 2, 2, 1, '', NULL, '2', 2, 7, 1, 1, 'T\'WAY AIRLINES'),
(126, NULL, NULL, NULL, 'U6', 'Ural Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 2, 1, 1, 'URAL AIRLINES'),
(127, NULL, NULL, NULL, 'UO', 'Hong Kong Express', '', '', 2, 2, 1, '', NULL, '2', 2, 11, 1, 1, 'HONG KONG EXPRESS'),
(128, NULL, NULL, NULL, 'UW', 'Uni-Top Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'UNI-TOP AIRLINES'),
(129, NULL, NULL, NULL, 'V8', 'Atran Cargo Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'ATRAN CARGO AIRLINES'),
(130, NULL, NULL, NULL, 'VI', 'Volga-Dnepr Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'VOLGA-DNEPR AIRLINES'),
(131, NULL, NULL, NULL, 'VZ', 'Thai Vietjet Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'THAI VIETJET AIR'),
(132, NULL, NULL, NULL, 'WK', 'Edelweiss Air', '', '', 2, 2, 1, '', NULL, '2', 2, NULL, 1, 1, 'EDELWEISS AIR'),
(133, NULL, NULL, NULL, 'YG', 'YTO Cargo Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'YTO CARGO AIRLINES'),
(134, NULL, NULL, NULL, 'ZA', 'Sky Angkor Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'SKY ANGKOR AIRLINES'),
(135, NULL, NULL, NULL, 'ZE', 'Eastar Jet', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'EASTAR JET'),
(136, NULL, NULL, NULL, 'ZF', 'Azur Air', '', '', 2, 2, 1, '', NULL, '2', 2, 6, 1, 1, 'AZUR AIR'),
(137, NULL, NULL, NULL, 'ZH', 'Shenzhen Airlines', '', '', 2, 2, 1, '', NULL, '2', 2, 17, 1, 1, 'SHENZHEN AIRLINES');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `tags`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '[]', '#000', NULL, '2020-12-30 05:53:06', '2020-12-30 05:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `designation` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `airport` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_birth` date NOT NULL DEFAULT '1990-01-01',
  `date_hire` date NOT NULL,
  `date_left` date NOT NULL DEFAULT '1990-01-01',
  `salary_cur` decimal(15,3) NOT NULL DEFAULT 0.000,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `gender`, `mobile`, `airport`, `email`, `dept`, `city`, `address`, `about`, `date_birth`, `date_hire`, `date_left`, `salary_cur`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lê Hồng Quân', '[\"Qu\\u1ea3n tr\\u1ecb h\\u1ec7 th\\u1ed1ng\"]', 'Nam', '0983638389', '[\"1\",\"4\",\"6\",\"7\",\"8\",\"22\"]', 'lequan.vinapco@gmail.com', 1, 'Pune', 'Karve nagar, Pune 411030', 'About user / biography', '1989-09-30', '2020-12-30', '2020-12-30', '0.000', NULL, '2020-12-30 05:53:20', '2021-02-17 13:32:16'),
(2, 'Lê Minh Hoàng', '[\"Qu\\u1ea3n tr\\u1ecb h\\u1ec7 th\\u1ed1ng\"]', 'Nam', '9999999999', '[\"1\"]', 'hoanglm.cnmb@skypec.com.vn', 1, '', '', '', '1990-01-01', '1970-01-01', '1990-01-01', '0.000', NULL, '2021-01-20 10:07:32', '2021-01-20 10:07:32'),
(3, 'Bùi Văn Tuyến', '[\"Qu\\u1ea3n tr\\u1ecb h\\u1ec7 th\\u1ed1ng\"]', 'Nam', '7777777777', '[\"1\"]', 'tuyenbv.cnmb@skypec.com.vn', 1, '', '', '', '1990-01-01', '1970-01-01', '1990-01-01', '0.000', NULL, '2021-01-20 10:01:36', '2021-01-20 10:01:36'),
(4, 'Trần Đức Tỉnh', '[\"Qu\\u1ea3n tr\\u1ecb h\\u1ec7 th\\u1ed1ng\"]', 'Nam', '7777777777', '[\"1\"]', 'tinhtd.cnmb@skypec.com.vn', 1, '', '', '', '1990-01-01', '1970-01-01', '1990-01-01', '0.000', NULL, '2021-01-20 10:01:36', '2021-01-20 10:01:36'),
(5, 'Phạm Anh Tú', '[\"\\u0110i\\u1ec1u h\\u00e0nh\"]', 'Nam', '0000000000', '[\"1\"]', 'tupa.cnmb@skypec.com.vn', 1, '', '', '', '1990-01-01', '1970-01-01', '1990-01-01', '0.000', NULL, '2021-01-20 10:35:44', '2021-01-20 10:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `la_configs`
--

CREATE TABLE `la_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_configs`
--

INSERT INTO `la_configs` (`id`, `key`, `section`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sitename', '', 'FMS Delivery', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(2, 'sitename_part1', '', 'FMS', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(3, 'sitename_part2', '', 'Delivery', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(4, 'sitename_short', '', 'LA', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(5, 'site_description', '', 'LaraAdmin is a open-source Laravel Admin Panel for quick-start Admin based applications and boilerplate for CRM or CMS systems.', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(6, 'sidebar_search', '', '1', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(7, 'show_messages', '', '1', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(8, 'show_notifications', '', '1', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(9, 'show_tasks', '', '1', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(10, 'show_rightsidebar', '', '1', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(11, 'skin', '', 'skin-blue', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(12, 'layout', '', 'sidebar-mini', '2020-12-30 05:53:06', '2021-01-13 23:50:27'),
(13, 'default_email', '', 'test@example.com', '2020-12-30 05:53:06', '2021-01-13 23:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `la_menus`
--

CREATE TABLE `la_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_menus`
--

INSERT INTO `la_menus` (`id`, `name`, `display_name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị hệ thống', '', '#', 'fa-group', 'custom', 0, 6, '2020-12-30 05:53:06', '2021-02-28 23:21:07'),
(9, 'Màn hình điều hành', '', 'http://', 'fa-laptop', 'custom', 0, 1, '2021-01-09 19:40:53', '2021-01-20 12:40:14'),
(10, 'Kế hoạch tra nạp', '', 'refuelingplanbooks', 'fa-calendar', 'custom', 13, 5, '2021-01-09 19:42:38', '2021-02-15 11:13:32'),
(11, 'Báo cáo', '', '#', 'fa-table', 'custom', 0, 5, '2021-01-09 19:43:12', '2021-02-15 04:27:02'),
(12, 'Quản lý danh mục', '', '#', 'fa-archive', 'custom', 1, 1, '2021-01-09 19:43:44', '2021-02-28 23:22:13'),
(13, 'Quản lý tra nạp', '', '#', 'fas fa-gas-pump', 'custom', 0, 2, '2021-01-09 19:44:19', '2021-02-15 04:27:02'),
(14, 'Cấu hình', '', 'http://', 'fa-gears', 'custom', 1, 2, '2021-01-09 19:44:45', '2021-02-28 23:22:13'),
(20, 'Phân quyền người dùng', '', 'roles', 'fa-magic', 'custom', 1, 3, '2021-01-14 23:14:20', '2021-02-28 23:22:15'),
(25, 'Employees', 'Người sử dụng', 'employees', 'fa-group', 'module', 1, 4, '2021-01-20 11:01:20', '2021-02-28 23:22:15'),
(26, 'Shifts', 'Ca làm việc', 'shifts', 'fas fa-business-time', 'module', 13, 3, '2021-01-20 12:37:35', '2021-02-08 11:38:11'),
(27, 'Airports', 'Sân bay', 'airports', 'fa-deviantart', 'module', 12, 1, '2021-01-20 12:39:45', '2021-01-20 12:40:10'),
(28, 'Trucks', 'Xe tra nạp', 'trucks', 'fa-truck', 'module', 13, 1, '2021-01-20 12:39:51', '2021-02-08 11:38:11'),
(29, 'Quản lý kho', '', '#', 'fas fa-database', 'custom', 0, 4, '2021-01-20 12:52:01', '2021-02-15 04:27:02'),
(30, 'Quản lý khách hàng', '', '#', 'fas fa-handshake', 'custom', 0, 3, '2021-01-24 02:45:42', '2021-02-15 04:27:02'),
(31, 'CustomerGroups', 'Nhóm khách hàng', 'customergroups', 'fa fas fa-layer-group', 'module', 12, 2, '2021-01-24 04:28:11', '2021-02-28 23:21:58'),
(32, 'CustomerLocals', 'Địa phương', 'customerlocals', 'fa fas fa-globe-europe', 'module', 12, 3, '2021-01-24 04:57:10', '2021-02-28 23:22:00'),
(33, 'Customers', 'Khách hàng', 'customers', 'fa fas fa-mug-hot', 'module', 30, 1, '2021-01-24 05:50:01', '2021-02-28 23:21:55'),
(34, 'PaymentUnits', 'Đơn vị thanh toán', 'paymentunits', 'fa fas fa-balance-scale', 'module', 12, 4, '2021-01-25 00:30:32', '2021-02-28 23:22:03'),
(35, 'PaymentCurrencys', 'Tiền tệ', 'paymentcurrencys', 'fa fas fa-donate', 'module', 12, 5, '2021-01-25 00:33:44', '2021-02-28 23:22:05'),
(36, 'Staffs', 'Nhân viên tra nạp', 'staffs', 'fa fas fa-address-book', 'module', 13, 2, '2021-02-08 11:36:28', '2021-02-08 11:38:11'),
(37, 'TruckAssigns', 'Phân công xe', 'truckassigns', 'fa fas fa-briefcase', 'module', 13, 4, '2021-02-15 11:12:45', '2021-02-15 11:13:32'),
(38, 'TemporaryPrices', 'Giá bán tạm tính', 'temporaryprices', 'fa fas fa-hand-holding-usd', 'module', 30, 2, '2021-02-28 23:32:39', '2021-02-28 23:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_26_050000_create_modules_table', 1),
('2014_05_26_055000_create_module_field_types_table', 1),
('2014_05_26_060000_create_module_fields_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_12_01_000000_create_uploads_table', 1),
('2016_05_26_064006_create_departments_table', 1),
('2016_05_26_064007_create_employees_table', 1),
('2016_05_26_064446_create_roles_table', 1),
('2016_07_05_115343_create_role_user_table', 1),
('2016_07_06_140637_create_organizations_table', 1),
('2016_07_07_134058_create_backups_table', 1),
('2016_07_07_134058_create_menus_table', 1),
('2016_09_10_163337_create_permissions_table', 1),
('2016_09_10_163520_create_permission_role_table', 1),
('2016_09_22_105958_role_module_fields_table', 1),
('2016_09_22_110008_role_module_table', 1),
('2016_10_06_115413_create_la_configs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_db` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `view_col` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `is_gen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `name_db`, `view_col`, `model`, `controller`, `fa_icon`, `is_gen`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'Users', 'users', 'name', 'User', 'UsersController', 'fa-group', 1, '2020-12-30 05:53:04', '2020-12-30 05:53:06'),
(2, 'Uploads', 'Uploads', 'uploads', 'name', 'Upload', 'UploadsController', 'fa-files-o', 1, '2020-12-30 05:53:04', '2020-12-30 05:53:06'),
(3, 'Departments', 'Departments', 'departments', 'name', 'Department', 'DepartmentsController', 'fa-tags', 1, '2020-12-30 05:53:04', '2020-12-30 05:53:06'),
(4, 'Employees', 'Employees', 'employees', 'name', 'Employee', 'EmployeesController', 'fa-group', 1, '2020-12-30 05:53:04', '2021-01-14 21:17:26'),
(5, 'Roles', 'Roles', 'roles', 'name', 'Role', 'RolesController', 'fa-magic', 1, '2020-12-30 05:53:05', '2020-12-30 05:53:06'),
(6, 'Organizations', 'Organizations', 'organizations', 'name', 'Organization', 'OrganizationsController', 'fa-university', 1, '2020-12-30 05:53:05', '2020-12-30 05:53:06'),
(7, 'Backups', 'Backups', 'backups', 'name', 'Backup', 'BackupsController', 'fa-hdd-o', 1, '2020-12-30 05:53:05', '2020-12-30 05:53:06'),
(8, 'Permissions', 'Permissions', 'permissions', 'name', 'Permission', 'PermissionsController', 'fa-magic', 1, '2020-12-30 05:53:05', '2020-12-30 05:53:07'),
(9, 'Airports', 'Airports', 'airports', 'name', 'Airport', 'AirportsController', 'fa-deviantart', 1, '2021-01-09 19:48:08', '2021-02-20 08:32:27'),
(10, 'Trucks', 'Trucks', 'trucks', 'name', 'Truck', 'TrucksController', 'fa-truck', 1, '2021-01-14 00:49:44', '2021-02-08 10:17:57'),
(11, 'RefuelingPlanBooks', 'RefuelingPlanBooks', 'refuelingplanbooks', 'date', 'RefuelingPlanBook', 'RefuelingPlanBooksController', 'fa-calendar', 1, '2021-01-16 10:26:04', '2021-01-16 10:31:44'),
(12, 'Shifts', 'Shifts', 'shifts', 'name', 'Shift', 'ShiftsController', 'fas fa-business-time', 1, '2021-01-17 04:58:15', '2021-01-19 06:13:24'),
(13, 'CustomerGroups', 'CustomerGroups', 'customergroups', 'name', 'CustomerGroup', 'CustomerGroupsController', 'fas fa-layer-group', 1, '2021-01-24 04:24:58', '2021-01-24 04:28:11'),
(14, 'CustomerLocals', 'CustomerLocals', 'customerlocals', 'name', 'CustomerLocal', 'CustomerLocalsController', 'fas fa-globe-europe', 1, '2021-01-24 04:55:44', '2021-01-24 04:57:10'),
(15, 'Customers', 'Customers', 'customers', 'name', 'Customer', 'CustomersController', 'fas fa-mug-hot', 1, '2021-01-24 05:42:00', '2021-01-24 05:50:01'),
(16, 'PaymentUnits', 'PaymentUnits', 'paymentunits', 'name', 'PaymentUnit', 'PaymentUnitsController', 'fas fa-balance-scale', 1, '2021-01-25 00:28:36', '2021-01-25 00:30:32'),
(17, 'PaymentCurrencys', 'PaymentCurrencys', 'paymentcurrencys', 'name', 'PaymentCurrency', 'PaymentCurrencysController', 'fas fa-donate', 1, '2021-01-25 00:32:50', '2021-01-25 00:33:44'),
(18, 'Staffs', 'Staffs', 'staffs', 'name', 'Staff', 'StaffsController', 'fas fa-address-book', 1, '2021-02-08 11:18:22', '2021-02-08 11:36:28'),
(19, 'TruckAssigns', 'TruckAssigns', 'truckassigns', 'date', 'TruckAssign', 'TruckAssignsController', 'fas fa-briefcase', 1, '2021-02-13 17:02:07', '2021-02-15 11:12:45'),
(20, 'TemporaryPrices', 'TemporaryPrices', 'temporaryprices', 'airport', 'TemporaryPrice', 'TemporaryPricesController', 'fas fa-hand-holding-usd', 1, '2021-02-28 23:26:05', '2021-02-28 23:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `colname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(10) UNSIGNED NOT NULL,
  `field_type` int(10) UNSIGNED NOT NULL,
  `unique` tinyint(1) NOT NULL DEFAULT 0,
  `defaultvalue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minlength` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `maxlength` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `popup_vals` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `colname`, `label`, `module`, `field_type`, `unique`, `defaultvalue`, `minlength`, `maxlength`, `required`, `popup_vals`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Name', 1, 16, 0, '', 5, 250, 1, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(2, 'context_id', 'Context', 1, 13, 0, '0', 0, 0, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(3, 'email', 'Email', 1, 8, 1, '', 0, 250, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(4, 'password', 'Password', 1, 17, 0, '', 6, 250, 1, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(5, 'type', 'User Type', 1, 7, 0, 'Employee', 0, 0, 0, '[\"Employee\",\"Client\"]', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(6, 'name', 'Name', 2, 16, 0, '', 5, 250, 1, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(7, 'path', 'Path', 2, 19, 0, '', 0, 250, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(8, 'extension', 'Extension', 2, 19, 0, '', 0, 20, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(9, 'caption', 'Caption', 2, 19, 0, '', 0, 250, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(10, 'user_id', 'Owner', 2, 7, 0, '1', 0, 0, 0, '@users', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(11, 'hash', 'Hash', 2, 19, 0, '', 0, 250, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(12, 'public', 'Is Public', 2, 2, 0, '0', 0, 0, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(13, 'name', 'Name', 3, 16, 1, '', 1, 250, 1, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(14, 'tags', 'Tags', 3, 20, 0, '[]', 0, 0, 0, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(15, 'color', 'Color', 3, 19, 0, '', 0, 50, 1, '', 0, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(16, 'name', 'Họ và tên', 4, 16, 0, '', 5, 250, 1, '', 1, '2020-12-30 05:53:04', '2021-01-14 21:15:06'),
(17, 'designation', 'Chức danh', 4, 15, 0, '', 0, 50, 1, '[\"Qu\\u1ea3n tr\\u1ecb h\\u1ec7 th\\u1ed1ng\",\"Qu\\u1ea3n l\\u00fd\",\"\\u0110i\\u1ec1u h\\u00e0nh\",\"L\\u00e1i xe\",\"Th\\u1ee3 b\\u01a1m\"]', 7, '2020-12-30 05:53:04', '2021-01-14 22:20:52'),
(18, 'gender', 'Giới tính', 4, 18, 0, 'Male', 0, 0, 1, '[\"Nam\",\"N\\u1eef\"]', 3, '2020-12-30 05:53:04', '2021-01-14 21:21:27'),
(19, 'mobile', 'Mobile', 4, 14, 0, '', 10, 20, 0, '', 5, '2020-12-30 05:53:04', '2021-01-14 22:26:12'),
(20, 'airport', 'Sân bay', 4, 15, 0, '', 0, 0, 1, '@airports', 6, '2020-12-30 05:53:04', '2021-01-20 07:36:19'),
(21, 'email', 'Email', 4, 8, 1, '', 5, 250, 1, '', 4, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(22, 'dept', 'Department', 4, 7, 0, '0', 0, 0, 0, '@departments', 8, '2020-12-30 05:53:04', '2021-01-14 22:23:06'),
(23, 'city', 'City', 4, 19, 0, '', 0, 50, 0, '', 9, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(24, 'address', 'Address', 4, 1, 0, '', 0, 1000, 0, '', 10, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(25, 'about', 'About', 4, 19, 0, '', 0, 0, 0, '', 11, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(26, 'date_birth', 'Ngày sinh', 4, 4, 0, '1990-01-01', 0, 0, 0, '', 2, '2020-12-30 05:53:04', '2021-01-14 21:18:36'),
(27, 'date_hire', 'Hiring Date', 4, 4, 0, 'date(\'Y-m-d\')', 0, 0, 0, '', 12, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(28, 'date_left', 'Resignation Date', 4, 4, 0, '1990-01-01', 0, 0, 0, '', 13, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(29, 'salary_cur', 'Current Salary', 4, 6, 0, '0.0', 0, 2, 0, '', 14, '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(30, 'name', 'Tên', 5, 16, 1, '', 1, 250, 1, '', 0, '2020-12-30 05:53:05', '2021-01-14 23:25:09'),
(31, 'display_name', 'Tên hiển thị', 5, 19, 0, '', 0, 250, 1, '', 0, '2020-12-30 05:53:05', '2021-01-14 23:25:19'),
(32, 'description', 'Mô tả', 5, 21, 0, '', 0, 1000, 0, '', 0, '2020-12-30 05:53:05', '2021-01-14 23:25:28'),
(33, 'parent', 'Nhóm quyền cha', 5, 7, 0, '1', 0, 0, 0, '@roles', 0, '2020-12-30 05:53:05', '2021-01-14 23:25:39'),
(35, 'name', 'Name', 6, 16, 1, '', 5, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(36, 'email', 'Email', 6, 8, 1, '', 0, 250, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(37, 'phone', 'Phone', 6, 14, 0, '', 0, 20, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(38, 'website', 'Website', 6, 23, 0, 'http://', 0, 250, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(39, 'assigned_to', 'Assigned to', 6, 7, 0, '0', 0, 0, 0, '@employees', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(40, 'connect_since', 'Connected Since', 6, 4, 0, 'date(\'Y-m-d\')', 0, 0, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(41, 'address', 'Address', 6, 1, 0, '', 0, 1000, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(42, 'city', 'City', 6, 19, 0, '', 0, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(43, 'description', 'Description', 6, 21, 0, '', 0, 1000, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(44, 'profile_image', 'Profile Image', 6, 12, 0, '', 0, 250, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(45, 'profile', 'Company Profile', 6, 9, 0, '', 0, 250, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(46, 'name', 'Name', 7, 16, 1, '', 0, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(47, 'file_name', 'File Name', 7, 19, 1, '', 0, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(48, 'backup_size', 'File Size', 7, 19, 0, '0', 0, 10, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(49, 'name', 'Name', 8, 16, 1, '', 1, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(50, 'display_name', 'Display Name', 8, 19, 0, '', 0, 250, 1, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(51, 'description', 'Description', 8, 21, 0, '', 0, 1000, 0, '', 0, '2020-12-30 05:53:05', '2020-12-30 05:53:05'),
(52, 'IATAcode', 'IATA Code', 9, 16, 1, '', 0, 3, 1, '', 0, '2021-01-09 19:56:13', '2021-01-09 19:56:13'),
(53, 'ICAOcode', 'ICAO Code', 9, 16, 1, '', 0, 4, 1, '', 0, '2021-01-09 19:56:56', '2021-01-09 19:56:56'),
(54, 'name', 'Tên sân bay', 9, 16, 1, '', 0, 256, 1, '', 0, '2021-01-09 19:57:37', '2021-02-20 08:25:47'),
(55, 'area', 'Khu vực', 9, 7, 0, '', 0, 0, 1, '[\"Mi\\u1ec1n B\\u1eafc\",\"Mi\\u1ec1n Trung\",\"Mi\\u1ec1n Nam\"]', 0, '2021-01-09 19:58:07', '2021-02-20 08:26:09'),
(56, 'IsActive', 'Đang hoạt động', 9, 2, 0, '', 0, 0, 0, '', 0, '2021-01-09 19:58:42', '2021-01-09 19:58:42'),
(57, 'airport', 'Sân bay', 10, 7, 0, '', 0, 0, 1, '@airports', 0, '2021-01-14 00:54:18', '2021-02-08 10:06:32'),
(58, 'name', 'Biển kiểm soát', 10, 16, 1, '', 0, 256, 1, '', 0, '2021-01-14 00:56:11', '2021-02-08 10:10:27'),
(59, 'mark', 'Hãng sản xuất', 10, 16, 0, '', 0, 256, 0, '', 0, '2021-01-14 00:57:37', '2021-02-08 10:10:35'),
(60, 'ssid', 'SSID', 10, 16, 0, '', 0, 256, 1, '', 0, '2021-01-14 00:58:02', '2021-02-08 09:32:33'),
(61, 'password', 'Mật khẩu', 10, 16, 0, '', 0, 256, 1, '', 0, '2021-01-14 00:58:23', '2021-02-22 21:47:56'),
(62, 'chassisnumber', 'Số khung', 10, 16, 0, '', 0, 256, 0, '', 0, '2021-01-14 00:59:00', '2021-02-08 10:10:49'),
(63, 'enginenumber', 'Số máy', 10, 16, 0, '', 0, 256, 0, '', 0, '2021-01-14 00:59:21', '2021-02-08 10:11:00'),
(64, 'usedyear', 'Năm sử dụng', 10, 13, 0, '', 0, 11, 0, '', 0, '2021-01-14 01:00:21', '2021-02-08 10:11:11'),
(65, 'capacity', 'Dung tích', 10, 13, 0, '', 0, 11, 0, '', 0, '2021-01-14 01:00:59', '2021-02-08 10:11:21'),
(66, 'unit', 'Đơn vị tính', 10, 7, 0, '', 0, 0, 0, '[\"U.S gallon (gal)\",\"U.K gallon (gal)\",\"Litre (l)\",\"Cubic metre (m3)\",\"Cubic foot (ft3)\",\"Barrel (bbl)\"]', 0, '2021-01-14 01:13:56', '2021-02-08 10:11:31'),
(67, 'IsActive', 'Đang hoạt động', 10, 2, 0, '', 0, 0, 0, '', 0, '2021-01-14 01:15:05', '2021-02-08 10:14:24'),
(68, 'IsActive', 'Đang hoạt động', 5, 2, 0, '', 0, 0, 0, '', 0, '2021-01-14 23:46:47', '2021-01-14 23:49:02'),
(69, 'airport', 'Sân bay', 11, 7, 0, '', 0, 0, 1, '@airports', 0, '2021-01-16 10:27:47', '2021-01-16 10:27:47'),
(70, 'date', 'Ngày kế hoạch', 11, 4, 0, '', 0, 0, 1, '', 0, '2021-01-16 10:29:20', '2021-01-16 10:29:20'),
(71, 'status', 'Trạng thái', 11, 13, 0, '', 0, 11, 0, '', 0, '2021-01-16 10:31:33', '2021-01-16 13:44:09'),
(72, 'airport', 'Sân bay', 12, 7, 0, '', 0, 0, 1, '@airports', 0, '2021-01-17 04:59:20', '2021-01-17 04:59:20'),
(73, 'name', 'Tên hiển thị', 12, 16, 0, '', 0, 256, 1, '', 0, '2021-01-17 05:01:28', '2021-01-17 05:01:28'),
(74, 'time_start', 'Giờ bắt đầu', 12, 13, 0, '', 0, 256, 1, '', 0, '2021-01-17 05:03:11', '2021-01-18 14:37:30'),
(75, 'time_end', 'Giờ kết thúc', 12, 13, 0, '', 0, 256, 1, '', 0, '2021-01-17 05:04:52', '2021-01-18 14:37:43'),
(76, 'nextday', 'Ngày hôm sau', 12, 2, 0, '', 0, 0, 0, '', 0, '2021-01-17 05:10:41', '2021-02-07 20:55:55'),
(77, 'code', 'Mã', 13, 16, 1, '', 0, 256, 1, '', 0, '2021-01-24 04:26:03', '2021-01-24 04:40:56'),
(78, 'name', 'Tên hiển thị', 13, 16, 1, '', 0, 256, 1, '', 0, '2021-01-24 04:27:24', '2021-01-24 04:41:20'),
(79, 'description', 'Mô tả', 13, 21, 0, '', 0, 0, 0, '', 0, '2021-01-24 04:28:01', '2021-01-24 04:41:53'),
(80, 'IsActive', 'Đang hoạt động', 13, 2, 0, '', 0, 0, 0, '', 0, '2021-01-24 04:42:19', '2021-01-24 04:42:19'),
(81, 'code', 'Mã', 14, 16, 1, '', 0, 256, 1, '', 0, '2021-01-24 04:56:06', '2021-01-24 04:56:06'),
(82, 'name', 'Tên hiển thị', 14, 16, 1, '', 0, 256, 1, '', 0, '2021-01-24 04:56:29', '2021-01-24 04:56:29'),
(83, 'description', 'Mô tả', 14, 21, 0, '', 0, 0, 0, '', 0, '2021-01-24 04:56:46', '2021-01-24 04:56:46'),
(84, 'IsActive', 'Đang hoạt động', 14, 2, 0, '', 0, 0, 0, '', 0, '2021-01-24 04:57:00', '2021-01-24 04:57:00'),
(85, 'code', 'Mã khách hàng', 15, 16, 0, '', 0, 256, 1, '', 0, '2021-01-24 05:44:26', '2021-02-25 13:15:28'),
(86, 'name', 'Tên khách hàng', 15, 16, 0, '', 0, 256, 1, '', 0, '2021-01-24 05:44:50', '2021-02-25 13:15:37'),
(87, 'address', 'Địa chỉ', 15, 16, 0, '', 0, 256, 0, '', 0, '2021-01-24 05:46:57', '2021-01-24 05:46:57'),
(88, 'taxcode', 'Mã số thuế', 15, 16, 0, '', 0, 256, 0, '', 0, '2021-01-24 05:47:37', '2021-01-24 05:47:37'),
(89, 'group', 'Nhóm khách hàng', 15, 7, 0, '', 0, 0, 0, '@customergroups', 0, '2021-01-24 05:48:46', '2021-01-24 05:48:46'),
(90, 'local', 'Loại khách hàng', 15, 7, 0, '', 0, 0, 0, '@customerlocals', 0, '2021-01-24 05:49:30', '2021-03-01 01:45:59'),
(91, 'contract', 'Hợp đồng', 15, 2, 0, '', 0, 0, 1, '', 0, '2021-01-24 18:53:48', '2021-01-24 18:53:48'),
(92, 'contractnumber', 'Số hợp đồng', 15, 16, 0, '', 0, 256, 0, '', 0, '2021-01-24 18:54:44', '2021-01-24 18:54:44'),
(93, 'expirationdate', 'Hiệu lực', 15, 4, 0, '', 0, 0, 0, '', 0, '2021-01-24 18:56:04', '2021-01-24 18:56:04'),
(94, 'unit', 'Đơn vị thanh toán', 15, 7, 0, '', 0, 0, 0, '@paymentunits', 0, '2021-01-24 18:56:50', '2021-01-25 00:56:42'),
(95, 'currency', 'Tiền tệ', 15, 7, 0, '', 0, 0, 0, '@paymentcurrencys', 0, '2021-01-24 18:57:35', '2021-01-25 00:57:29'),
(96, 'agency', 'Thanh toán qua', 15, 7, 0, '', 0, 0, 0, '@customers', 0, '2021-01-24 18:58:35', '2021-01-24 18:58:35'),
(97, 'name', 'Tên hiển thị', 16, 16, 1, '', 0, 256, 1, '', 0, '2021-01-25 00:28:49', '2021-01-25 00:29:04'),
(98, 'description', 'Mô tả', 16, 21, 0, '', 0, 0, 0, '', 0, '2021-01-25 00:30:04', '2021-01-25 00:30:04'),
(99, 'IsActive', 'Đang hoạt động', 16, 2, 0, '', 0, 0, 0, '', 0, '2021-01-25 00:30:24', '2021-01-25 00:30:24'),
(100, 'name', 'Tên hiển thị', 17, 16, 1, '', 0, 256, 1, '', 0, '2021-01-25 00:33:08', '2021-01-25 00:33:08'),
(101, 'description', 'Mô tả', 17, 21, 0, '', 0, 0, 0, '', 0, '2021-01-25 00:33:22', '2021-01-25 00:33:22'),
(102, 'IsActive', 'Đang hoạt động', 17, 2, 0, '', 0, 0, 0, '', 0, '2021-01-25 00:33:37', '2021-01-25 00:33:37'),
(103, 'description', 'Mô tả:', 12, 21, 0, '', 0, 0, 0, '', 0, '2021-02-07 20:59:32', '2021-02-07 20:59:32'),
(104, 'IsActive', 'Đang hoạt động', 12, 2, 0, '', 0, 0, 0, '', 0, '2021-02-07 21:00:01', '2021-02-07 21:00:01'),
(105, 'excelid', 'Danh định trên Excel', 10, 16, 0, '', 0, 256, 1, '', 0, '2021-02-08 09:30:53', '2021-02-23 05:46:54'),
(106, 'employee_code', 'Mã nhân viên', 18, 16, 1, '', 0, 256, 1, '', 0, '2021-02-08 11:22:04', '2021-02-08 11:22:04'),
(107, 'name', 'Tên nhân viên', 18, 16, 0, '', 0, 256, 1, '', 0, '2021-02-08 11:22:35', '2021-02-08 11:24:13'),
(108, 'airport', 'Sân bay', 18, 7, 0, '', 0, 0, 0, '@airports', 0, '2021-02-08 11:25:39', '2021-02-20 08:32:15'),
(109, 'email', 'Email', 18, 8, 1, '', 0, 256, 1, '', 0, '2021-02-08 11:28:43', '2021-02-13 03:16:32'),
(110, 'password', 'Mật khẩu', 18, 17, 0, '', 6, 250, 1, '', 0, '2021-02-08 11:34:43', '2021-02-20 08:19:30'),
(111, 'idqlhh', 'ID.QLHH', 18, 16, 0, '', 0, 256, 0, '', 0, '2021-02-13 00:56:23', '2021-02-13 00:56:23'),
(112, 'driver', 'Lái xe', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 00:57:06', '2021-02-13 00:57:06'),
(113, 'technicaler', 'Thợ bơm', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 00:58:11', '2021-02-15 04:15:57'),
(114, 'create', 'Tạo kế hoạch', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 01:01:27', '2021-02-13 01:01:27'),
(115, 'edit', 'Sửa kế hoạch', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 01:02:09', '2021-02-13 01:02:09'),
(116, 'delete', 'Xóa kế hoạch', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 01:02:30', '2021-02-13 01:02:30'),
(117, 'IsActive', 'Đang hoạt động', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-13 02:26:49', '2021-02-13 03:03:13'),
(118, 'airport', 'Sân bay', 19, 7, 0, '', 0, 0, 1, '@airports', 0, '2021-02-15 11:06:14', '2021-02-15 11:06:14'),
(119, 'date', 'Ngày kế hoạch', 19, 4, 0, '', 0, 0, 1, '', 0, '2021-02-15 11:07:08', '2021-02-15 11:07:08'),
(120, 'shift', 'Ca', 19, 7, 0, '', 0, 0, 1, '@shifts', 0, '2021-02-15 11:09:55', '2021-02-15 11:09:55'),
(121, 'truck', 'Xe tra nạp', 19, 7, 0, '', 0, 0, 1, '@trucks', 0, '2021-02-15 11:10:54', '2021-02-15 11:10:54'),
(122, 'driver', 'Lái xe', 19, 7, 0, '', 0, 0, 1, '@staffs', 0, '2021-02-15 11:12:03', '2021-02-15 11:12:03'),
(123, 'technicaler', 'Thợ bơm', 19, 7, 0, '', 0, 0, 1, '@staffs', 0, '2021-02-15 11:12:34', '2021-02-15 11:12:34'),
(124, 'create1', 'Tạo khách hàng', 18, 2, 0, '', 0, 0, 0, '', 0, '2021-02-20 08:21:35', '2021-02-20 08:21:35'),
(125, 'IsActive', 'Đang hoạt động', 15, 2, 0, '', 0, 0, 0, '', 0, '2021-02-23 06:33:22', '2021-02-23 06:33:22'),
(126, 'airport', 'Sân bay', 15, 7, 0, '', 0, 0, 0, '@airports', 0, '2021-02-23 11:38:17', '2021-02-23 11:38:17'),
(127, 'nameinvoice', 'Tên viết Hóa đơn', 15, 16, 0, '', 0, 256, 1, '', 0, '2021-02-25 13:15:04', '2021-02-25 13:15:04'),
(128, 'airport', 'Sân bay', 20, 7, 0, '', 0, 0, 1, '@airports', 0, '2021-02-28 23:26:54', '2021-02-28 23:26:54'),
(129, 'month', 'Tháng', 20, 13, 0, '', 0, 11, 1, '', 0, '2021-02-28 23:29:50', '2021-02-28 23:29:50'),
(130, 'year', 'Năm', 20, 13, 0, '', 0, 11, 1, '', 0, '2021-02-28 23:30:38', '2021-02-28 23:30:38'),
(133, 'customerlocal', 'Loại khách hàng', 20, 7, 0, '', 0, 0, 0, '@customerlocals', 0, '2021-03-01 00:32:08', '2021-03-02 00:13:19'),
(134, 'contract', 'Hợp đồng', 20, 2, 0, '', 0, 0, 0, '', 0, '2021-03-01 00:32:34', '2021-03-01 00:32:34'),
(135, 'routetype', 'Chặng bay', 20, 7, 0, '', 0, 0, 0, '@customerlocals', 0, '2021-03-01 00:35:41', '2021-03-02 22:33:17'),
(136, 'unit', 'Đơn vị thanh toán', 20, 7, 0, '', 0, 0, 0, '@paymentunits', 0, '2021-03-01 00:36:47', '2021-03-01 00:36:47'),
(137, 'currency', 'Tiền tệ', 20, 7, 0, '', 0, 0, 0, '@paymentcurrencys', 0, '2021-03-01 00:37:14', '2021-03-01 00:37:14'),
(138, 'unitprice', 'Đơn giá', 20, 6, 0, '', 0, 11, 1, '', 0, '2021-03-01 00:37:58', '2021-03-01 00:37:58'),
(139, 'time_start', 'Thời gian bắt đầu', 19, 13, 0, '', 0, 11, 1, '', 0, '2021-03-07 08:39:40', '2021-03-07 08:40:47'),
(140, 'time_end', 'Thời gian kết thúc', 19, 13, 0, '', 0, 11, 1, '', 0, '2021-03-07 08:40:35', '2021-03-07 08:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `module_field_types`
--

CREATE TABLE `module_field_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_field_types`
--

INSERT INTO `module_field_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Address', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(2, 'Checkbox', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(3, 'Currency', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(4, 'Date', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(5, 'Datetime', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(6, 'Decimal', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(7, 'Dropdown', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(8, 'Email', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(9, 'File', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(10, 'Float', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(11, 'HTML', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(12, 'Image', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(13, 'Integer', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(14, 'Mobile', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(15, 'Multiselect', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(16, 'Name', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(17, 'Password', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(18, 'Radio', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(19, 'String', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(20, 'Taginput', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(21, 'Textarea', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(22, 'TextField', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(23, 'URL', '2020-12-30 05:53:04', '2020-12-30 05:53:04'),
(24, 'Files', '2020-12-30 05:53:04', '2020-12-30 05:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://',
  `assigned_to` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `connect_since` date NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` int(11) NOT NULL,
  `profile` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentcurrencys`
--

CREATE TABLE `paymentcurrencys` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentcurrencys`
--

INSERT INTO `paymentcurrencys` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `description`, `IsActive`) VALUES
(1, NULL, '2021-01-25 00:51:44', '2021-03-04 05:55:17', 'VNĐ', 'Sử dụng thanh toán cho khách hàng nội địa', 1),
(2, NULL, '2021-01-25 00:53:22', '2021-03-04 05:56:54', 'USD', 'Sử dụng thanh toán cho khách hàng quốc tế', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentunits`
--

CREATE TABLE `paymentunits` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymentunits`
--

INSERT INTO `paymentunits` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `description`, `IsActive`) VALUES
(1, NULL, '2021-01-25 00:40:51', '2021-01-25 00:42:16', 'Kg', 'Sử dụng thanh toán cho khách hàng hàng không nội địa', 1),
(2, NULL, '2021-01-25 00:42:32', '2021-01-25 00:44:41', 'Gallon', 'Sử dụng thanh toán cho khách hàng hàng không quốc tế', 1),
(3, NULL, '2021-01-25 00:46:07', '2021-01-25 00:46:07', 'Lit', 'Sử dụng thanh toán cho khách hàng ngoài hàng không', 1),
(4, NULL, '2021-01-25 00:46:54', '2021-01-25 00:46:54', 'Lit15', 'Sử dụng thanh toán cho khách hàng ngoài hàng không', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', 'Admin Panel Permission', NULL, '2020-12-30 05:53:06', '2020-12-30 05:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `refuelingplanbooks`
--

CREATE TABLE `refuelingplanbooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT '1970-01-01',
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `parent`, `deleted_at`, `created_at`, `updated_at`, `IsActive`) VALUES
(1, 'SUPER_ADMIN', 'Super Admin', 'Full Access Role', 1, NULL, '2020-12-30 05:53:06', '2020-12-30 05:53:06', 1),
(2, 'LOCAL_ADMIN', 'Local Admin', '', 1, NULL, '2021-01-20 05:29:36', '2021-01-20 05:29:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `acc_view` tinyint(1) NOT NULL,
  `acc_create` tinyint(1) NOT NULL,
  `acc_edit` tinyint(1) NOT NULL,
  `acc_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `acc_view`, `acc_create`, `acc_edit`, `acc_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(2, 1, 2, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(3, 1, 3, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(4, 1, 4, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(5, 1, 5, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(6, 1, 6, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(7, 1, 7, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(8, 1, 8, 1, 1, 1, 1, '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(9, 1, 9, 1, 1, 1, 1, '2021-01-09 19:59:29', '2021-01-09 19:59:29'),
(10, 1, 10, 1, 1, 1, 1, '2021-01-14 01:15:48', '2021-01-14 01:15:48'),
(11, 1, 11, 1, 1, 1, 1, '2021-01-16 10:31:44', '2021-01-16 10:31:44'),
(12, 1, 12, 1, 1, 1, 1, '2021-01-17 05:05:27', '2021-01-17 05:05:27'),
(13, 2, 1, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(14, 2, 2, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(15, 2, 3, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(16, 2, 4, 0, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(17, 2, 5, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(18, 2, 6, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(19, 2, 7, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(20, 2, 8, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(21, 2, 9, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(22, 2, 10, 1, 0, 0, 0, '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(23, 2, 11, 1, 0, 0, 0, '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(24, 2, 12, 1, 0, 0, 0, '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(25, 1, 13, 1, 1, 1, 1, '2021-01-24 04:28:11', '2021-01-24 04:28:11'),
(26, 1, 14, 1, 1, 1, 1, '2021-01-24 04:57:10', '2021-01-24 04:57:10'),
(27, 1, 15, 1, 1, 1, 1, '2021-01-24 05:50:01', '2021-01-24 05:50:01'),
(28, 1, 16, 1, 1, 1, 1, '2021-01-25 00:30:32', '2021-01-25 00:30:32'),
(29, 1, 17, 1, 1, 1, 1, '2021-01-25 00:33:44', '2021-01-25 00:33:44'),
(30, 1, 18, 1, 1, 1, 1, '2021-02-08 11:36:28', '2021-02-08 11:36:28'),
(31, 2, 13, 0, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(32, 2, 14, 0, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(33, 2, 15, 0, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(34, 2, 16, 0, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(35, 2, 17, 0, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(36, 2, 18, 1, 0, 0, 0, '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(37, 1, 19, 1, 1, 1, 1, '2021-02-15 11:12:45', '2021-02-15 11:12:45'),
(38, 1, 20, 1, 1, 1, 1, '2021-02-28 23:32:39', '2021-02-28 23:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_module_fields`
--

CREATE TABLE `role_module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `access` enum('invisible','readonly','write') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module_fields`
--

INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(2, 1, 2, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(3, 1, 3, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(4, 1, 4, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(5, 1, 5, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(6, 1, 6, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(7, 1, 7, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(8, 1, 8, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(9, 1, 9, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(10, 1, 10, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(11, 1, 11, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(12, 1, 12, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(13, 1, 13, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(14, 1, 14, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(15, 1, 15, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(16, 1, 16, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(17, 1, 17, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(18, 1, 18, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(19, 1, 19, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(20, 1, 20, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(21, 1, 21, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(22, 1, 22, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(23, 1, 23, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(24, 1, 24, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(25, 1, 25, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(26, 1, 26, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(27, 1, 27, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(28, 1, 28, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(29, 1, 29, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(30, 1, 30, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(31, 1, 31, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(32, 1, 32, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(33, 1, 33, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(35, 1, 35, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(36, 1, 36, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(37, 1, 37, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(38, 1, 38, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(39, 1, 39, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(40, 1, 40, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(41, 1, 41, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(42, 1, 42, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(43, 1, 43, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(44, 1, 44, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(45, 1, 45, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(46, 1, 46, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(47, 1, 47, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(48, 1, 48, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(49, 1, 49, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(50, 1, 50, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(51, 1, 51, 'write', '2020-12-30 05:53:06', '2020-12-30 05:53:06'),
(52, 1, 52, 'write', '2021-01-09 19:56:13', '2021-01-09 19:56:13'),
(53, 1, 53, 'write', '2021-01-09 19:56:56', '2021-01-09 19:56:56'),
(54, 1, 54, 'write', '2021-01-09 19:57:37', '2021-01-09 19:57:37'),
(55, 1, 55, 'write', '2021-01-09 19:58:07', '2021-01-09 19:58:07'),
(56, 1, 56, 'write', '2021-01-09 19:58:42', '2021-01-09 19:58:42'),
(57, 1, 57, 'write', '2021-01-14 00:54:18', '2021-01-14 00:54:18'),
(58, 1, 58, 'write', '2021-01-14 00:56:11', '2021-01-14 00:56:11'),
(59, 1, 59, 'write', '2021-01-14 00:57:37', '2021-01-14 00:57:37'),
(60, 1, 60, 'write', '2021-01-14 00:58:02', '2021-01-14 00:58:02'),
(61, 1, 61, 'write', '2021-01-14 00:58:23', '2021-01-14 00:58:23'),
(62, 1, 62, 'write', '2021-01-14 00:59:01', '2021-01-14 00:59:01'),
(63, 1, 63, 'write', '2021-01-14 00:59:21', '2021-01-14 00:59:21'),
(64, 1, 64, 'write', '2021-01-14 01:00:21', '2021-01-14 01:00:21'),
(65, 1, 65, 'write', '2021-01-14 01:00:59', '2021-01-14 01:00:59'),
(66, 1, 66, 'write', '2021-01-14 01:13:56', '2021-01-14 01:13:56'),
(67, 1, 67, 'write', '2021-01-14 01:15:06', '2021-01-14 01:15:06'),
(68, 1, 68, 'write', '2021-01-14 23:46:47', '2021-01-14 23:46:47'),
(69, 1, 69, 'write', '2021-01-16 10:27:47', '2021-01-16 10:27:47'),
(70, 1, 70, 'write', '2021-01-16 10:29:20', '2021-01-16 10:29:20'),
(71, 1, 71, 'write', '2021-01-16 10:31:33', '2021-01-16 10:31:33'),
(72, 1, 72, 'write', '2021-01-17 04:59:20', '2021-01-17 04:59:20'),
(73, 1, 73, 'write', '2021-01-17 05:01:28', '2021-01-17 05:01:28'),
(74, 1, 74, 'write', '2021-01-17 05:03:44', '2021-01-17 05:03:44'),
(75, 1, 75, 'write', '2021-01-17 05:05:08', '2021-01-17 05:05:08'),
(76, 1, 76, 'write', '2021-01-17 05:10:41', '2021-01-17 05:10:41'),
(77, 2, 1, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(78, 2, 2, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(79, 2, 3, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(80, 2, 4, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(81, 2, 5, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(82, 2, 6, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(83, 2, 7, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(84, 2, 8, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(85, 2, 9, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(86, 2, 10, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(87, 2, 11, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(88, 2, 12, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(89, 2, 13, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(90, 2, 14, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(91, 2, 15, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(92, 2, 16, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(93, 2, 26, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(94, 2, 18, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(95, 2, 21, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(96, 2, 19, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(97, 2, 20, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(98, 2, 17, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(99, 2, 22, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(100, 2, 23, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(101, 2, 24, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(102, 2, 25, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(103, 2, 27, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(104, 2, 28, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(105, 2, 29, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(106, 2, 30, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(107, 2, 31, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(108, 2, 32, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(109, 2, 33, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(110, 2, 68, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(111, 2, 35, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(112, 2, 36, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(113, 2, 37, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(114, 2, 38, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(115, 2, 39, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(116, 2, 40, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(117, 2, 41, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(118, 2, 42, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(119, 2, 43, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(120, 2, 44, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(121, 2, 45, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(122, 2, 46, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(123, 2, 47, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(124, 2, 48, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(125, 2, 49, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(126, 2, 50, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(127, 2, 51, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(128, 2, 52, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(129, 2, 53, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(130, 2, 54, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(131, 2, 55, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(132, 2, 56, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(133, 2, 57, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(134, 2, 58, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(135, 2, 59, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(136, 2, 60, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(137, 2, 61, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(138, 2, 62, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(139, 2, 63, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(140, 2, 64, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(141, 2, 65, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(142, 2, 66, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(143, 2, 67, 'readonly', '2021-01-20 05:29:36', '2021-01-20 05:29:36'),
(144, 2, 69, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(145, 2, 70, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(146, 2, 71, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(147, 2, 72, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(148, 2, 73, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(149, 2, 74, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(150, 2, 75, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(151, 2, 76, 'readonly', '2021-01-20 05:29:37', '2021-01-20 05:29:37'),
(152, 1, 77, 'write', '2021-01-24 04:26:03', '2021-01-24 04:26:03'),
(153, 1, 78, 'write', '2021-01-24 04:27:24', '2021-01-24 04:27:24'),
(154, 1, 79, 'write', '2021-01-24 04:28:01', '2021-01-24 04:28:01'),
(155, 1, 80, 'write', '2021-01-24 04:42:19', '2021-01-24 04:42:19'),
(156, 1, 81, 'write', '2021-01-24 04:56:06', '2021-01-24 04:56:06'),
(157, 1, 82, 'write', '2021-01-24 04:56:29', '2021-01-24 04:56:29'),
(158, 1, 83, 'write', '2021-01-24 04:56:46', '2021-01-24 04:56:46'),
(159, 1, 84, 'write', '2021-01-24 04:57:00', '2021-01-24 04:57:00'),
(160, 1, 85, 'write', '2021-01-24 05:44:26', '2021-01-24 05:44:26'),
(161, 1, 86, 'write', '2021-01-24 05:44:50', '2021-01-24 05:44:50'),
(162, 1, 87, 'write', '2021-01-24 05:46:57', '2021-01-24 05:46:57'),
(163, 1, 88, 'write', '2021-01-24 05:47:37', '2021-01-24 05:47:37'),
(164, 1, 89, 'write', '2021-01-24 05:48:46', '2021-01-24 05:48:46'),
(165, 1, 90, 'write', '2021-01-24 05:49:30', '2021-01-24 05:49:30'),
(166, 1, 91, 'write', '2021-01-24 18:53:48', '2021-01-24 18:53:48'),
(167, 1, 92, 'write', '2021-01-24 18:54:44', '2021-01-24 18:54:44'),
(168, 1, 93, 'write', '2021-01-24 18:56:04', '2021-01-24 18:56:04'),
(169, 1, 94, 'write', '2021-01-24 18:56:50', '2021-01-24 18:56:50'),
(170, 1, 95, 'write', '2021-01-24 18:57:35', '2021-01-24 18:57:35'),
(171, 1, 96, 'write', '2021-01-24 18:58:35', '2021-01-24 18:58:35'),
(172, 1, 97, 'write', '2021-01-25 00:28:50', '2021-01-25 00:28:50'),
(173, 1, 98, 'write', '2021-01-25 00:30:04', '2021-01-25 00:30:04'),
(174, 1, 99, 'write', '2021-01-25 00:30:24', '2021-01-25 00:30:24'),
(175, 1, 100, 'write', '2021-01-25 00:33:08', '2021-01-25 00:33:08'),
(176, 1, 101, 'write', '2021-01-25 00:33:22', '2021-01-25 00:33:22'),
(177, 1, 102, 'write', '2021-01-25 00:33:37', '2021-01-25 00:33:37'),
(178, 1, 103, 'write', '2021-02-07 20:59:32', '2021-02-07 20:59:32'),
(179, 1, 104, 'write', '2021-02-07 21:00:01', '2021-02-07 21:00:01'),
(180, 1, 105, 'write', '2021-02-08 09:30:53', '2021-02-08 09:30:53'),
(181, 1, 106, 'write', '2021-02-08 11:22:04', '2021-02-08 11:22:04'),
(182, 1, 107, 'write', '2021-02-08 11:22:35', '2021-02-08 11:22:35'),
(183, 1, 108, 'write', '2021-02-08 11:25:39', '2021-02-08 11:25:39'),
(184, 1, 109, 'write', '2021-02-08 11:28:43', '2021-02-08 11:28:43'),
(185, 1, 110, 'write', '2021-02-08 11:34:43', '2021-02-08 11:34:43'),
(186, 2, 105, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(187, 2, 103, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(188, 2, 104, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(189, 2, 77, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(190, 2, 78, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(191, 2, 79, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(192, 2, 80, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(193, 2, 81, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(194, 2, 82, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(195, 2, 83, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(196, 2, 84, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(197, 2, 85, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(198, 2, 86, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(199, 2, 87, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(200, 2, 88, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(201, 2, 89, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(202, 2, 90, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(203, 2, 91, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(204, 2, 92, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(205, 2, 93, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(206, 2, 94, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(207, 2, 95, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(208, 2, 96, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(209, 2, 97, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(210, 2, 98, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(211, 2, 99, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(212, 2, 100, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(213, 2, 101, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(214, 2, 102, 'invisible', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(215, 2, 106, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(216, 2, 107, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(217, 2, 108, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(218, 2, 109, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(219, 2, 110, 'readonly', '2021-02-08 12:16:04', '2021-02-08 12:16:04'),
(220, 1, 111, 'write', '2021-02-13 00:56:23', '2021-02-13 00:56:23'),
(221, 1, 112, 'write', '2021-02-13 00:57:06', '2021-02-13 00:57:06'),
(222, 1, 113, 'write', '2021-02-13 00:58:11', '2021-02-13 00:58:11'),
(223, 1, 114, 'write', '2021-02-13 01:01:27', '2021-02-13 01:01:27'),
(224, 1, 115, 'write', '2021-02-13 01:02:09', '2021-02-13 01:02:09'),
(225, 1, 116, 'write', '2021-02-13 01:02:30', '2021-02-13 01:02:30'),
(226, 1, 117, 'write', '2021-02-13 02:26:49', '2021-02-13 02:26:49'),
(227, 2, 111, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(228, 2, 112, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(229, 2, 113, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(230, 2, 114, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(231, 2, 115, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(232, 2, 116, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(233, 2, 117, 'readonly', '2021-02-13 12:11:54', '2021-02-13 12:11:54'),
(234, 1, 118, 'write', '2021-02-15 11:06:14', '2021-02-15 11:06:14'),
(235, 1, 119, 'write', '2021-02-15 11:07:08', '2021-02-15 11:07:08'),
(236, 1, 120, 'write', '2021-02-15 11:09:55', '2021-02-15 11:09:55'),
(237, 1, 121, 'write', '2021-02-15 11:10:54', '2021-02-15 11:10:54'),
(238, 1, 122, 'write', '2021-02-15 11:12:03', '2021-02-15 11:12:03'),
(239, 1, 123, 'write', '2021-02-15 11:12:34', '2021-02-15 11:12:34'),
(240, 1, 124, 'write', '2021-02-20 08:21:35', '2021-02-20 08:21:35'),
(241, 1, 125, 'write', '2021-02-23 06:33:22', '2021-02-23 06:33:22'),
(242, 1, 126, 'write', '2021-02-23 11:38:17', '2021-02-23 11:38:17'),
(243, 1, 127, 'write', '2021-02-25 13:15:04', '2021-02-25 13:15:04'),
(244, 1, 128, 'write', '2021-02-28 23:26:54', '2021-02-28 23:26:54'),
(245, 1, 129, 'write', '2021-02-28 23:29:50', '2021-02-28 23:29:50'),
(246, 1, 130, 'write', '2021-02-28 23:30:38', '2021-02-28 23:30:38'),
(249, 1, 133, 'write', '2021-03-01 00:32:08', '2021-03-01 00:32:08'),
(250, 1, 134, 'write', '2021-03-01 00:32:34', '2021-03-01 00:32:34'),
(251, 1, 135, 'write', '2021-03-01 00:35:41', '2021-03-01 00:35:41'),
(252, 1, 136, 'write', '2021-03-01 00:36:47', '2021-03-01 00:36:47'),
(253, 1, 137, 'write', '2021-03-01 00:37:14', '2021-03-01 00:37:14'),
(254, 1, 138, 'write', '2021-03-01 00:37:58', '2021-03-01 00:37:58'),
(255, 1, 139, 'write', '2021-03-07 08:39:40', '2021-03-07 08:39:40'),
(256, 1, 140, 'write', '2021-03-07 08:40:35', '2021-03-07 08:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(59, 2, 2, NULL, NULL),
(61, 2, 3, NULL, NULL),
(62, 2, 4, NULL, NULL),
(63, 2, 5, NULL, NULL),
(67, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time_start` int(10) UNSIGNED DEFAULT 0,
  `time_end` int(10) UNSIGNED DEFAULT 0,
  `nextday` tinyint(1) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `deleted_at`, `created_at`, `updated_at`, `airport`, `name`, `time_start`, `time_end`, `nextday`, `description`, `IsActive`) VALUES
(1, NULL, '2021-01-18 06:29:38', '2021-02-08 02:58:15', 1, 'Ca ngày', 27000, 70140, 0, '12H: Bắt đầu từ 07:30 đến 19:29 ngày làm việc', 1),
(2, NULL, '2021-01-18 06:34:48', '2021-02-08 02:55:32', 1, 'Ca tối', 70200, 26940, 1, '12H: Bắt đầu từ 19:30 đến 07:29 ngày hôm sau', 1),
(3, NULL, '2021-01-18 12:02:55', '2021-02-08 02:54:14', 1, 'Ca 24H', 27000, 26940, 1, '24H: Bắt đầu từ 07:30 đến 07:29 ngày hôm sau', 0),
(4, NULL, '2021-01-20 14:02:23', '2021-01-20 14:03:55', 4, 'Ca ngày', 27000, 70140, 0, '12H: Bắt đầu từ 07:30 đến 19:29 ngày làm việc', 1),
(5, NULL, '2021-01-20 14:05:00', '2021-02-08 01:24:19', 4, 'Ca tối', 70200, 26940, 1, '12H: Bắt đầu từ 19:30 đến 07:29 ngày hôm sau', 1),
(6, NULL, '2021-01-20 14:05:46', '2021-02-08 01:24:30', 4, 'Ca 24H', 27000, 26940, 1, '24H: Bắt đầu từ 07:30 đến 07:29 ngày hôm sau', 0),
(7, NULL, '2021-02-08 03:08:35', '2021-02-08 03:08:35', 6, 'Ca sáng', 27000, 70140, 0, '12H: Bắt đầu từ 07:30 đến 19:29 ngày làm việc	', 1),
(8, NULL, '2021-02-08 03:09:21', '2021-02-08 03:09:21', 6, 'Ca tối', 70200, 26940, 1, '12H: Bắt đầu từ 19:30 đến 07:29 ngày hôm sau', 1),
(9, NULL, '2021-02-08 03:10:09', '2021-02-08 03:10:09', 6, 'Ca 24H', 27000, 26940, 1, '24H: Bắt đầu từ 07:30 đến 07:29 ngày hôm sau	', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `idqlhh` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `driver` tinyint(1) NOT NULL DEFAULT 0,
  `technicaler` tinyint(1) NOT NULL DEFAULT 0,
  `create` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0,
  `create1` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `deleted_at`, `created_at`, `updated_at`, `employee_code`, `name`, `airport`, `email`, `password`, `idqlhh`, `driver`, `technicaler`, `create`, `edit`, `delete`, `IsActive`, `create1`) VALUES
(1, NULL, '2021-02-13 02:15:41', '2021-02-20 08:54:22', '199307014', 'Nguyễn Văn Đông', 1, 'dongnv.cnmb@skypec.com.vn', '$2y$10$tt4xLAiDoMkl3iF2eZDxw.1Lk29PsECYcauI2J4h5X0sZZKPyym3q', 'DONGNV', 1, 1, 1, 1, 1, 1, 1),
(2, NULL, '2021-02-13 02:23:24', '2021-02-13 02:34:20', '199311002', 'Nguyễn Xuân Hội', 1, 'hoinx.cnmb@skypec.com.vn', '$2y$10$Y/SpRaYr9tg1bRLy/jHDuenBdkFcAvBUN7J7CRDtMNGql1xvLE1Ta', 'HOINX', 1, 1, 1, 1, 1, 1, 1),
(3, NULL, '2021-02-13 04:12:23', '2021-02-13 04:12:23', '200505005', 'Nguyễn Ngọc Phia', 1, 'phiann.cnmb@skypec.com.vn', '$2y$10$857Bk5rZK8c8NGOdPyEIiugrH.3PWisiA4DrTOOJDaEczcKNYx8DK', 'PHIANN', 1, 1, 1, 1, 1, 1, 1),
(4, NULL, '2021-02-13 05:43:31', '2021-02-13 05:47:25', '201203005', 'Nguyễn Văn Hưng', 1, 'hungnva.cnmb@skypec.com.vn', '$2y$10$O.wKsyOwgMF4xuCM1JJ.Ku2qvMkRoDMqFSiUDj/HSrHrObPNAab8S', 'HUNGNVA', 0, 1, 1, 1, 1, 1, 1),
(5, NULL, '2021-02-13 05:44:27', '2021-02-13 05:48:26', '201201002', 'Nguyễn Hồng Hà', 1, 'hanh.cnmb@skypec.com.vn', '$2y$10$mFb2qAFP/46Ad7yzYDE/NO7m49SBG7qB/d5AuLMn0JTkh0ShkOgkO', 'HANH', 0, 1, 1, 1, 1, 1, 1),
(6, NULL, '2021-02-13 05:45:12', '2021-02-13 05:49:32', '201106004', 'Nguyễn Văn Sáu', 1, 'saunv.cnmb@skypec.com.vn', '$2y$10$sQOz9RU4kKxWWZod5Jf13.FrjjgiqvNbPr0Qq1KUpBKP4aqf.jEtm', 'SAUNV', 0, 1, 1, 1, 1, 1, 1),
(7, NULL, NULL, NULL, '201105019', 'Nguyễn Thành Được', 1, 'duocnt.cnmb@skypec.com.vn', '$2y$10$xcyqjSN0IrmNgz7CtEZwDu/.cCObG0LIbJ3.V4UvE4YjYmJ9R19/S', 'DUOCNT', 0, 1, 1, 1, 1, 1, 1),
(8, NULL, NULL, NULL, '201105005', 'Trần Đình Quang', 1, 'quangtd.cnmb@skypec.com.vn', '$2y$10$3QrdpfMlN.phaZLA8eEvaetdZGYezLuCN8jVs8Y7.x2t5ECpexcL.', 'QUANGTD', 0, 1, 1, 1, 1, 1, 1),
(9, NULL, NULL, NULL, '199307030', 'Lê Sỹ Tuyền', 1, 'tuyenls.cnmb@skypec.com.vn', '$2y$10$9T1exonJBQxm3YJNVGuWb.2Syoa583yzaIlXTviDSAeXD85gU5Jkm', 'TUYENLS', 0, 1, 1, 1, 1, 1, 1),
(10, NULL, NULL, NULL, '199805002', 'Phí Quang Trừng', 1, 'trungpq.cnmb@skypec.com.vn', '$2y$10$W5ADzT6bcubbiy6AKG6.Yu3H2IUqhVVcm7PwKTNir7KPZLE7FejtW', 'TRUNGPQ', 0, 1, 1, 1, 1, 1, 1),
(11, NULL, NULL, NULL, '199712004', 'Đoàn Văn Cảnh', 1, 'canhdv.cnmb@skypec.com.vn', '$2y$10$WN7.d2HI8zahG5YNV7p7XOLbxiHq7arBb9Rxr4brf0Eys6WMplZQa', 'CANHDV', 0, 1, 1, 1, 1, 1, 1),
(12, NULL, NULL, NULL, '199612001', 'Nguyễn Minh Huấn', 1, 'huannm.cnmb@skypec.com.vn', '$2y$10$q/5QCOHNs6xZ7mCKJeHwTOa5o/tNn4yXnCN7iSWFExx1Anskvd3WS', 'HUANNM', 0, 1, 1, 1, 1, 1, 1),
(13, NULL, NULL, NULL, '200409009', 'Lê Hùng Cường', 1, 'cuonglh.cnmb@skypec.com.vn', '$2y$10$Aeq8g.Wzg8utkMXSVwG1F.cNOIAUPGXFHXDZLtb6L7wCE92F/p09m', 'CUONGLH', 0, 1, 1, 1, 1, 1, 1),
(14, NULL, NULL, NULL, '200112006', 'Phạm Quang Thoại', 1, 'thoaipq.cnmb@skypec.com.vn', '$2y$10$CQ32ih1IQuGLSanC6fa5meIB3ZLT/y.Y9AZzpUUlXC1LjvfiAmda6', 'THOAIPQ', 0, 1, 1, 1, 1, 1, 1),
(15, NULL, NULL, NULL, '201912037', 'Chu Văn Hải', 1, 'haicv.cnmb@skypec.com.vn', '$2y$10$u8hSuifQKDPbK7iXAu2Ws.JGWSFA5Hk4crNg8/fzY33w6ssImeJGu', 'HAICV', 1, 1, 1, 1, 1, 1, 1),
(16, NULL, NULL, NULL, '201912036', 'Lê Quang Hào', 1, 'haolq.cnmb@skypec.com.vn', '$2y$10$gFZkP9Kd7/yMupyihYBq5ONcxdiBo/s.zRgW4JJynEOKChNuugjB6', 'HAOLQ', 1, 1, 1, 1, 1, 1, 1),
(17, NULL, NULL, NULL, '201912034', 'Lương Văn Vương', 1, 'vuonglv.cnmb@skypec.com.vn', '$2y$10$9L2PYH/7vP.QAcgxumn/zOsIJGMJB5QJTCuj1CXGcbYfGlVCFmSZe', 'VUONGLV', 1, 1, 1, 1, 1, 1, 1),
(18, NULL, NULL, NULL, '201912033', 'Nguyễn Tuấn Anh', 1, 'anhnt@skypec.com.vn', '$2y$10$cbvm94qiG0vmpTZixoLSweGbZI/eCHgb94ibs1pSu2svU3Z/rEPM6', 'ANHNT', 1, 1, 1, 1, 1, 1, 1),
(19, NULL, NULL, NULL, '201912032', 'Nguyễn Văn Thiện', 1, 'thiennv.cnmb@skypec.com.vn', '$2y$10$n6ZqL2bnzBwXnSLKAB8i8ew2DOEIjkVzOu0vXavz/me0svV387Wie', 'THIENNV', 1, 1, 1, 1, 1, 1, 1),
(20, NULL, NULL, NULL, '201912029', 'Đào Văn Phi', 1, 'phidv.cnmb@skypec.com.vn', '$2y$10$Xb00Gs4n1vCYbExAAAyGeuWnu9hI4XBEVuHVmUWCEBvXNhPA7d0ri', 'PHIDV', 1, 1, 1, 1, 1, 1, 1),
(21, NULL, NULL, NULL, '201912028', 'Trần Đức Cường', 1, 'cuongtd.cnmb@skypec.com.vn', '$2y$10$qtOtefOWJg5xYEYQngTXO.D59GyzRVkSPi/8dZbIPdF9EFlStNXo.', 'CUONGTD', 1, 1, 1, 1, 1, 1, 1),
(22, NULL, NULL, NULL, '201912025', 'Cao Văn Đạt', 1, 'datcv.cnmb@skypec.com.vn', '$2y$10$cXHiC6E/SWlVIwlbzvQKIeYUcTjuLy0T14IS4zm6CH43ukVoDCyvW', 'DATCV', 1, 1, 1, 1, 1, 1, 1),
(23, NULL, NULL, NULL, '201912023', 'Dương Quốc Hội', 1, 'hoidq.cnmb@skypec.com.vn', '$2y$10$s4Q4cPZIdvwo1YSa5U0gsudA0VBkQOMQJX3trYGV6JZi1.sIekfzO', 'HOIDQ', 1, 1, 1, 1, 1, 1, 1),
(24, NULL, NULL, NULL, '201801010', 'Lương Văn Tiếp', 1, 'tieplv.cnmb@skypec.com.vn', '$2y$10$I7zIFPKf1LIRdA//CASJz.7SjSn/hu30dP.Jqxu7MkioarJmo5GGi', 'TIEPLV', 1, 1, 1, 1, 1, 1, 1),
(25, NULL, NULL, NULL, '201801008', 'Dương Văn Thành', 1, 'thanhdv.cnmb@skypec.com.vn', '$2y$10$NPMqEJjdTTrIvcvUV.Z3wurxZyUv5E5jKezkUVnMvKV4oCGWtVuKW', 'THANHDV', 1, 1, 1, 1, 1, 1, 1),
(26, NULL, NULL, NULL, '201706003', 'Nguyễn Văn Long', 1, 'longnv.cnmb@skypec.com.vn', '$2y$10$WNI2X22s2msSN.ePszVB1ObKI1j6d5I4LVcCwmKfDT9ZiByAEnyfG', 'LONGNV', 1, 1, 1, 1, 1, 1, 1),
(27, NULL, NULL, NULL, '201109001', 'Lê Nam Hưng', 1, 'hungln.cnmb@skypec.com.vn', '$2y$10$NPrvnt8ilY0vB/vYgGRJ1ux6a311Epmw43hM5xXFOt3ngSkB7pBfm', 'HUNGLN', 1, 1, 1, 1, 1, 1, 1),
(28, NULL, NULL, NULL, '201105018', 'Dương Thành Minh', 1, 'minhdt.cnmb@skypec.com.vn', '$2y$10$oXGAzhDzmJFIh1HaCrHqM.5Y3pq/0ktwoC8iYh1khgXFjikSdf1TK', 'MINHDT', 1, 1, 1, 1, 1, 1, 1),
(29, NULL, NULL, NULL, '201105013', 'Nguyễn Đình Hùng', 1, 'hungndi.cnmb@skypec.com.vn', '$2y$10$AxI1r4g8ZaGd0dSPXRD6Huph/qN5UlBpGi.XBnlpcPwBrDJsgq/py', 'HUNGNDI', 1, 1, 1, 1, 1, 1, 1),
(30, NULL, NULL, NULL, '201105009', 'Lê Văn Huỳnh', 1, 'huynhlv.cnmb@skypec.com.vn', '$2y$10$nfQdwSL0bifIN7/HDqBOiuDP5VJ0sa0pZoEV.UWnlwGWQbaDr357e', 'HUYNHLV', 1, 1, 1, 1, 1, 1, 1),
(31, NULL, NULL, NULL, '201105008', 'Cao Việt Long', 1, 'longcv.cnmb@skypec.com.vn', '$2y$10$J2E8BWIvpzYf5QZtdljwjejOelGKWuPHlCaQmZh1HlsmWJ2TMGxYO', 'LONGCV', 1, 1, 1, 1, 1, 1, 1),
(32, NULL, NULL, NULL, '201105007', 'Trần Trung Dũng', 1, 'dungtt.cnmb@skypec.com.vn', '$2y$10$c5amr1gTTohv3Aq5jD25IuUZIKvU/yA8/3Y/hFuJfpNYe49ITuKYS', 'DUNGTT', 1, 1, 1, 1, 1, 1, 1),
(33, NULL, NULL, NULL, '201105006', 'Nguyễn Đăng Vân', 1, 'vannd.cnmb@skypec.com.vn', '$2y$10$uDpKXMVu6VcnuDq3ueNYCuSeZJggxeVNFUvgR83K1QLU60pFblNny', 'VANND', 1, 1, 1, 1, 1, 1, 1),
(34, NULL, NULL, NULL, '201011003', 'Đỗ Thế Kiên', 1, 'kiendt.cnmb@skypec.com.vn', '$2y$10$7OEdS1a0HSi9UR9GoNwfJeb5/FDddJyzqReL6AYRkF259N/ESwJLy', 'KIENDT', 1, 1, 1, 1, 1, 1, 1),
(35, NULL, NULL, NULL, '199307020', 'Bùi Văn Hán', 1, 'hanbv.cnmb@skypec.com.vn', '$2y$10$dciPndHvEaMFK4WkCPOqDu2DRsHNWcOsicIQwnZFtG3iPFYLjHZ9u', 'HANBV', 1, 1, 1, 1, 1, 1, 1),
(36, NULL, NULL, NULL, '199810003', 'Đinh Xuân Thùy', 1, 'thuydx.cnmb@skypec.com.vn', '$2y$10$jy5M9ol4enaXA95KVsgjzerFX160g2OIS0kJU6IwSY1ZL7frgScje', 'THUYDX', 1, 1, 1, 1, 1, 1, 1),
(37, NULL, NULL, NULL, '199605002', 'Nguyễn Văn Nghĩa', 1, 'nghianv.cnmb@skypec.com.vn', '$2y$10$RgcBPzla0xUEzVfNUQhLueUz5fb0A5fbRa/QKFUsuZ/4oR20YK/Km', 'NGHIANV', 1, 1, 1, 1, 1, 1, 1),
(38, NULL, NULL, NULL, '199307089', 'Nguyễn Đình Thắng', 1, 'thangnd.cnmb@skypec.com.vn', '$2y$10$GVDl9H7glQ2uPMRUkt/N/OuNkxWYyI69U8fm2K31fg04udIuIjLGi', 'THANGND', 1, 1, 1, 1, 1, 1, 1),
(39, NULL, NULL, NULL, '201006005', 'Đào Quang Huy', 1, 'huydq.cnmb@skypec.com.vn', '$2y$10$42ZEjldhfeNaJ4tyu9BOuuOwJ4HHP1B6EolaPfcx4XXcSX.Y7v10S', 'HUYDQ', 1, 1, 1, 1, 1, 1, 1),
(40, NULL, NULL, NULL, '201006002', 'Nguyễn Thanh Hải', 1, 'haint.cnmb@skypec.com.vn', '$2y$10$aOi1m7vnTGnzf9polx0niu2hWUhRwM2UNdYv3p4zFU/Mn5PG5wtMG', 'HAINT', 1, 1, 1, 1, 1, 1, 1),
(41, NULL, NULL, NULL, '200604003', 'Lương Hữu Kiên', 1, 'kienlhu.cnmb@skypec.com.vn', '$2y$10$T2TG.NEbT4yV7l4xEo27K.KNSU18QZUabhzAUBbQoQ808rFcVRZPS', 'KIENLHU', 1, 1, 1, 1, 1, 1, 1),
(42, NULL, NULL, NULL, '200505004', 'Ngô Đức Thắng', 1, 'thangndu.cnmb@skypec.com.vn', '$2y$10$PZiOaNg1F9GT56nZaL3q/u8mssihu4U0fiLVPHt9X1rKc10b9v8bq', 'THANGNDU', 1, 1, 1, 1, 1, 1, 1),
(43, NULL, NULL, NULL, '200505003', 'Nguyễn Đình Thân', 1, 'thannd.cnmb@skypec.com.vn', '$2y$10$EwlkimNtMbjCchlWUJXJP.fR8q5aIoSv0ImvKV/pxw3vfRZr4TLk.', 'THANND', 1, 1, 1, 1, 1, 1, 1),
(44, NULL, '2021-02-13 12:36:32', '2021-02-13 12:38:51', '201101010', 'Phạm Đức Trung', 4, 'trungpd.cnmb@skypec.com.vn', '', 'TRUNGPD', 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temporaryprices`
--

CREATE TABLE `temporaryprices` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `month` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `year` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `customerlocal` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `contract` tinyint(1) NOT NULL DEFAULT 0,
  `routetype` int(10) UNSIGNED DEFAULT 1,
  `unit` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `currency` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `unitprice` decimal(15,3) NOT NULL DEFAULT 0.000
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temporaryprices`
--

INSERT INTO `temporaryprices` (`id`, `deleted_at`, `created_at`, `updated_at`, `airport`, `month`, `year`, `customerlocal`, `contract`, `routetype`, `unit`, `currency`, `unitprice`) VALUES
(1, NULL, NULL, NULL, 1, 1, 2021, 1, 0, NULL, 1, 1, '10000.000'),
(2, NULL, NULL, NULL, 1, 1, 2021, 2, 0, 2, 2, 2, '2.530'),
(3, NULL, NULL, NULL, 1, 1, 2021, 2, 1, 2, 2, 2, '2.530'),
(4, NULL, NULL, NULL, 1, 1, 2021, 2, 0, 1, 2, 2, '2.530'),
(5, NULL, NULL, NULL, 1, 1, 2021, 2, 1, 1, 2, 2, '2.530');

-- --------------------------------------------------------

--
-- Table structure for table `truckassigns`
--

CREATE TABLE `truckassigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `date` date NOT NULL DEFAULT '1970-01-01',
  `shift` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `truck` int(10) UNSIGNED DEFAULT NULL,
  `driver` int(10) UNSIGNED DEFAULT NULL,
  `technicaler` int(10) UNSIGNED DEFAULT NULL,
  `time_start` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `time_end` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `truckassigns`
--

INSERT INTO `truckassigns` (`id`, `deleted_at`, `created_at`, `updated_at`, `airport`, `date`, `shift`, `truck`, `driver`, `technicaler`, `time_start`, `time_end`) VALUES
(1, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(2, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(3, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(4, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(5, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(6, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(7, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '1970-01-01', 1, NULL, NULL, NULL, 0, 0),
(8, NULL, '2021-03-07 10:38:02', '2021-03-11 23:07:10', 1, '2021-03-07', 1, 1, 24, 22, 1615077000, 1615120140),
(9, NULL, '2021-03-07 10:38:02', '2021-03-11 23:06:52', 1, '2021-03-07', 1, 2, 28, 41, 1615077000, 1615120140),
(10, NULL, '2021-03-07 10:38:02', '2021-03-11 23:07:10', 1, '2021-03-07', 1, 3, 36, 17, 1615077000, 1615120140),
(11, NULL, '2021-03-07 10:38:02', '2021-03-11 23:06:52', 1, '2021-03-07', 1, 4, 27, 15, 1615077000, 1615120140),
(12, NULL, '2021-03-07 10:38:02', '2021-03-11 23:06:52', 1, '2021-03-07', 1, 5, 32, 12, 1615077000, 1615120140),
(13, NULL, '2021-03-07 10:38:02', '2021-03-11 23:06:52', 1, '2021-03-07', 1, 6, 43, 10, 1615077000, 1615120140),
(14, NULL, '2021-03-07 10:38:02', '2021-03-07 10:38:02', 1, '2021-03-07', 1, 7, NULL, NULL, 1615077000, 1615120140),
(15, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:07', 1, '2021-03-07', 2, 1, 24, 22, 1615120200, 1615163340),
(16, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:07', 1, '2021-03-07', 2, 2, 28, 41, 1615120200, 1615163340),
(17, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:35', 1, '2021-03-07', 2, 4, 27, 15, 1615120200, 1615163340),
(18, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:35', 1, '2021-03-07', 2, 3, 36, 17, 1615120200, 1615163340),
(19, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:07', 1, '2021-03-07', 2, 5, 32, 12, 1615120200, 1615163340),
(20, NULL, '2021-03-07 11:24:36', '2021-03-12 10:11:07', 1, '2021-03-07', 2, 6, 43, 10, 1615120200, 1615163340),
(21, NULL, '2021-03-07 11:24:36', '2021-03-07 11:24:36', 1, '2021-03-07', 2, 7, NULL, NULL, 1615120200, 1615163340);

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airport` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mark` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ssid` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `chassisnumber` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `enginenumber` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `usedyear` int(10) UNSIGNED NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IsActive` tinyint(1) NOT NULL DEFAULT 0,
  `excelid` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `deleted_at`, `created_at`, `updated_at`, `airport`, `name`, `mark`, `ssid`, `password`, `chassisnumber`, `enginenumber`, `usedyear`, `capacity`, `unit`, `IsActive`, `excelid`) VALUES
(1, NULL, '2021-02-08 09:45:39', '2021-03-07 12:21:02', 1, 'HAN3-207001', 'GarSite', 'HAN3-207001', '123456', 'RF10RD-1/1192', '46273921', 2004, 10000, 'U.S gallon (gal)', 1, '1'),
(2, NULL, '2021-02-08 09:57:34', '2021-02-22 22:14:50', 1, 'HAN3-207002', 'GarSite', 'HAN3-207002', '123456', 'RF10RD-1/1036', ' 45232615', 1996, 10000, 'U.S gallon (gal)', 1, '2'),
(3, NULL, '2021-02-08 09:59:54', '2021-02-22 22:15:12', 1, 'HAN3-207003', 'GarSite', 'HAN3-207003', '123456', 'RF10RD-1/1038', '45246177', 1996, 10000, 'U.S gallon (gal)', 1, '3'),
(4, NULL, '2021-02-08 10:20:43', '2021-02-22 22:16:02', 1, 'HAN3-207004', 'GarSite', 'HAN3-207004', '123456', 'RF10RD-1/1339', '46688286', 2007, 10000, 'U.S gallon (gal)', 1, '4'),
(5, NULL, '2021-02-08 10:22:43', '2021-02-22 22:18:01', 1, 'HAN3-207005', 'GarSite', 'HAN3-207005', '123456', 'RF10RD-1/1238', '46677393', 2007, 10000, 'U.S gallon (gal)', 1, '5'),
(6, NULL, '2021-02-08 10:25:30', '2021-02-22 22:18:24', 1, 'HAN3-207006', 'GarSite', 'HAN3-207006', '123456', 'RF10RD-1-1C/1302', ' 6901', 2011, 10000, 'U.S gallon (gal)', 1, '6'),
(7, NULL, '2021-02-08 10:26:48', '2021-02-22 22:19:10', 1, 'HAN3-207008', 'GarSite', 'HAN3-207008', '123456', '', '', 2012, 10000, 'U.S gallon (gal)', 1, '8');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `context_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Employee',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lê Hồng Quân', 1, 'lequan.vinapco@gmail.com', '$2y$10$NzmI45d1qmFF9gRr.QYXH.DXf/VfPFTzo91NunjSuendw4CpY83FO', 'Employee', 'psC5IQ3FuvOgyqIrWIYnMLBDfvEKw7ilLzU0zy9Ils5IKfX6O10yHcwSdkTZ', NULL, '2020-12-30 05:53:20', '2021-01-20 09:47:05'),
(2, 'Lê Minh Hoàng', 2, 'hoanglm.cnmb@skypec.com.vn', '$2y$10$5T1yz5hMJzlSgLZpRZcrLeCC7uCK/b4p9Tk8iSyx05OVzGK/qP/Ka', 'Employee', 'W7gDCU7avr4DGS96RvFXzx3E0PL7ijdMRnLH5eiKukutsWG5Oz2r5VovOE19', NULL, '2021-01-20 10:07:32', '2021-01-20 10:40:25'),
(3, 'Bùi Văn Tuyến', 3, 'tuyenbv.cnmb@skypec.com.vn', '$2y$10$024w7s90vPy8.YlF6Sxa7.EjEcp6JhFYjr0TUF4HFojnwpiT1D3Xi', 'Employee', 'bS12Y2cZqd83PHPsPsvPym4YUkaVdtBKNTGtYhyP0KWtNY0kqKxEbTJs5lnT', NULL, '2021-01-20 10:01:36', '2021-01-20 10:33:59'),
(4, 'Trần Đức Tỉnh', 4, 'tinhtd.cnmb@skypec.com.vn', '$2y$10$/1P0Se/PhjOsIxHX2JBCPOX.b.nqwAeQX0xEuS1AhnbC76t4RzWk6', 'Employee', 'fAyZkrNigQJA4SjMF9ErTe8t2lbi86vFXQ2reiT85bcwO4QQnuHbToWmurTo', NULL, '2021-01-20 10:07:32', '2021-01-20 10:33:38'),
(5, 'Phạm Anh Tú', 5, 'tupa.cnmb@skypec.com.vn', '$2y$10$KdBwTX4miBdT.s9op0n5ZOhZrYc1rZzXKNWDUHbdWuuq7qE978Ura', 'Employee', NULL, NULL, '2021-01-20 10:35:44', '2021-01-20 10:35:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airports_iatacode_unique` (`IATAcode`),
  ADD UNIQUE KEY `airports_icaocode_unique` (`ICAOcode`);

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backups_name_unique` (`name`),
  ADD UNIQUE KEY `backups_file_name_unique` (`file_name`);

--
-- Indexes for table `customergroups`
--
ALTER TABLE `customergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerlocals`
--
ALTER TABLE `customerlocals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_group_foreign` (`group`),
  ADD KEY `customers_agency_foreign` (`agency`),
  ADD KEY `customers_airport_foreign` (`airport`),
  ADD KEY `customers_local_foreign` (`local`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_dept_foreign` (`dept`);

--
-- Indexes for table `la_configs`
--
ALTER TABLE `la_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_menus`
--
ALTER TABLE `la_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_foreign` (`module`),
  ADD KEY `module_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `module_field_types`
--
ALTER TABLE `module_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizations_name_unique` (`name`),
  ADD UNIQUE KEY `organizations_email_unique` (`email`),
  ADD KEY `organizations_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paymentcurrencys`
--
ALTER TABLE `paymentcurrencys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentunits`
--
ALTER TABLE `paymentunits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `refuelingplanbooks`
--
ALTER TABLE `refuelingplanbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refuelingplanbooks_airport_foreign` (`airport`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_parent_foreign` (`parent`),
  ADD KEY `roles_dept_foreign` (`IsActive`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_role_id_foreign` (`role_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_fields_role_id_foreign` (`role_id`),
  ADD KEY `role_module_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_airport_foreign` (`airport`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffs_airport_foreign` (`airport`);

--
-- Indexes for table `temporaryprices`
--
ALTER TABLE `temporaryprices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temporaryprices_airport_foreign` (`airport`),
  ADD KEY `temporaryprices_local_foreign` (`customerlocal`),
  ADD KEY `temporaryprices_unit_foreign` (`unit`),
  ADD KEY `temporaryprices_currency_foreign` (`currency`),
  ADD KEY `temporaryprices_routetype_foreign` (`routetype`);

--
-- Indexes for table `truckassigns`
--
ALTER TABLE `truckassigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truckassigns_airport_foreign` (`airport`),
  ADD KEY `truckassigns_shift_foreign` (`shift`),
  ADD KEY `truckassigns_truck_foreign` (`truck`),
  ADD KEY `truckassigns_driver_foreign` (`driver`),
  ADD KEY `truckassigns_technicaler_foreign` (`technicaler`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trucks_airport_foreign` (`airport`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customergroups`
--
ALTER TABLE `customergroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerlocals`
--
ALTER TABLE `customerlocals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `la_configs`
--
ALTER TABLE `la_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `la_menus`
--
ALTER TABLE `la_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `module_field_types`
--
ALTER TABLE `module_field_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentcurrencys`
--
ALTER TABLE `paymentcurrencys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paymentunits`
--
ALTER TABLE `paymentunits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refuelingplanbooks`
--
ALTER TABLE `refuelingplanbooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `temporaryprices`
--
ALTER TABLE `temporaryprices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `truckassigns`
--
ALTER TABLE `truckassigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_agency_foreign` FOREIGN KEY (`agency`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customers_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`),
  ADD CONSTRAINT `customers_group_foreign` FOREIGN KEY (`group`) REFERENCES `customergroups` (`id`),
  ADD CONSTRAINT `customers_local_foreign` FOREIGN KEY (`local`) REFERENCES `customerlocals` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`);

--
-- Constraints for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD CONSTRAINT `module_fields_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `module_field_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_fields_module_foreign` FOREIGN KEY (`module`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `employees` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `refuelingplanbooks`
--
ALTER TABLE `refuelingplanbooks`
  ADD CONSTRAINT `refuelingplanbooks_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_module`
--
ALTER TABLE `role_module`
  ADD CONSTRAINT `role_module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD CONSTRAINT `role_module_fields_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `module_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_fields_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`);

--
-- Constraints for table `temporaryprices`
--
ALTER TABLE `temporaryprices`
  ADD CONSTRAINT `temporaryprices_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`),
  ADD CONSTRAINT `temporaryprices_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `paymentcurrencys` (`id`),
  ADD CONSTRAINT `temporaryprices_local_foreign` FOREIGN KEY (`customerlocal`) REFERENCES `customerlocals` (`id`),
  ADD CONSTRAINT `temporaryprices_routetype_foreign` FOREIGN KEY (`routetype`) REFERENCES `customerlocals` (`id`),
  ADD CONSTRAINT `temporaryprices_unit_foreign` FOREIGN KEY (`unit`) REFERENCES `paymentunits` (`id`);

--
-- Constraints for table `truckassigns`
--
ALTER TABLE `truckassigns`
  ADD CONSTRAINT `truckassigns_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`),
  ADD CONSTRAINT `truckassigns_driver_foreign` FOREIGN KEY (`driver`) REFERENCES `staffs` (`id`),
  ADD CONSTRAINT `truckassigns_shift_foreign` FOREIGN KEY (`shift`) REFERENCES `shifts` (`id`),
  ADD CONSTRAINT `truckassigns_technicaler_foreign` FOREIGN KEY (`technicaler`) REFERENCES `staffs` (`id`),
  ADD CONSTRAINT `truckassigns_truck_foreign` FOREIGN KEY (`truck`) REFERENCES `trucks` (`id`);

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `trucks_airport_foreign` FOREIGN KEY (`airport`) REFERENCES `airports` (`id`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
