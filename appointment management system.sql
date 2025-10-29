-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2022 at 10:30 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u834843299_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT 0,
  `sub_location_id` varchar(155) DEFAULT '0',
  `date` date NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `group_booking` varchar(155) DEFAULT '0',
  `total_person` varchar(155) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `pay_info` int(11) DEFAULT 2,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `business_type` int(11) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `thumb` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `enable_gallery` varchar(255) DEFAULT '1',
  `enable_staff` varchar(255) NOT NULL DEFAULT '1',
  `is_primary` int(11) DEFAULT NULL,
  `template_style` int(11) NOT NULL DEFAULT 1,
  `curr_locate` varchar(155) DEFAULT '0',
  `num_format` varchar(155) DEFAULT '0',
  `color` varchar(255) NOT NULL DEFAULT '#546af1',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `date_format` varchar(255) DEFAULT 'd M Y',
  `time_format` varchar(255) DEFAULT 'hh',
  `time_interval` varchar(255) DEFAULT '30',
  `interval_type` varchar(255) DEFAULT 'minute',
  `interval_settings` varchar(155) DEFAULT '2',
  `enable_category` varchar(155) DEFAULT '0',
  `enable_rating` varchar(155) DEFAULT '0',
  `enable_location` varchar(155) DEFAULT '0',
  `enable_group` varchar(155) DEFAULT '0',
  `total_person` varchar(155) DEFAULT '5',
  `enable_payment` varchar(155) DEFAULT '1',
  `enable_onsite` varchar(155) DEFAULT '1',
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `uid`, `user_id`, `name`, `slug`, `details`, `type`, `title`, `country`, `address`, `email`, `phone`, `category`, `business_type`, `logo`, `image`, `thumb`, `status`, `enable_gallery`, `enable_staff`, `is_primary`, `template_style`, `curr_locate`, `num_format`, `color`, `facebook`, `twitter`, `instagram`, `whatsapp`, `qr_code`, `date_format`, `time_format`, `time_interval`, `interval_type`, `interval_settings`, `enable_category`, `enable_rating`, `enable_location`, `enable_group`, `total_person`, `enable_payment`, `enable_onsite`, `created_at`) VALUES
(1, '91456', 2, 'user1', 'user1', '', 1, NULL, 178, NULL, 'user1@gmail.com', NULL, '3', NULL, NULL, NULL, NULL, 1, '1', '1', NULL, 1, '0', '0', '#546af1', NULL, NULL, NULL, NULL, NULL, 'd M Y', 'hh', '30', 'minute', '2', '0', '0', '0', '0', '5', '1', '1', '2022-05-21 16:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `business_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `business_id`, `name`, `slug`, `details`, `status`) VALUES
(1, '2343', 'Sport & Gym', 'sport-gym', '', 1),
(2, '4355', 'Beauty and wellness', 'beauty-and-wellness', '', 1),
(3, '5645', 'Medical', 'medical', '', 1),
(4, '8990', 'Educations', 'educations', '', 1),
(5, '2345', 'Events and entertainment', 'events-and-entertainment', '', 1),
(6, NULL, 'Law & Consultancy', 'law-consultancy', '', 1),
(7, NULL, 'Personal meetings and services', 'personal-meetings-and-services', '', 1),
(8, NULL, 'Other', 'other', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `dial_code` varchar(5) NOT NULL,
  `currency_name` varchar(20) NOT NULL,
  `currency_symbol` varchar(20) NOT NULL,
  `currency_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`) VALUES
(1, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR'),
(2, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED'),
(3, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN'),
(4, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD'),
(5, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD'),
(6, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL'),
(7, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD'),
(8, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA'),
(9, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS'),
(10, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR'),
(11, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD'),
(12, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG'),
(13, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN'),
(14, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD'),
(15, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT'),
(16, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR'),
(17, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF'),
(18, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN'),
(19, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD'),
(20, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF'),
(21, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF'),
(22, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD'),
(23, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL'),
(24, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN'),
(25, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP'),
(26, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR'),
(27, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD'),
(28, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD'),
(29, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF'),
(30, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF'),
(31, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD'),
(32, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP'),
(33, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF'),
(34, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY'),
(35, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP'),
(36, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC'),
(37, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC'),
(38, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE'),
(39, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR'),
(40, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK'),
(41, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR'),
(42, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF'),
(43, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK'),
(44, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD'),
(45, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP'),
(46, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD'),
(47, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD'),
(48, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR'),
(49, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP'),
(50, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN'),
(51, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR'),
(52, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB'),
(53, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR'),
(54, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD'),
(55, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK'),
(56, 'France', 'FR', '+33', 'Euro', '€', 'EUR'),
(57, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF'),
(58, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP'),
(59, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD'),
(60, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL'),
(61, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP'),
(62, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS'),
(63, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP'),
(64, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF'),
(66, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR'),
(67, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ'),
(68, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF'),
(69, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD'),
(70, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD'),
(71, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL'),
(72, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK'),
(73, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG'),
(74, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF'),
(75, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR'),
(76, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR'),
(77, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS'),
(78, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP'),
(79, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR'),
(80, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD'),
(81, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK'),
(82, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR'),
(83, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP'),
(84, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD'),
(85, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD'),
(86, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY'),
(87, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES'),
(88, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS'),
(89, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR'),
(90, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD'),
(91, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF'),
(92, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD'),
(93, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD'),
(94, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT'),
(95, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK'),
(96, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP'),
(97, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD'),
(98, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF'),
(99, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR'),
(100, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD'),
(101, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL'),
(102, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR'),
(103, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR'),
(104, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR'),
(105, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD'),
(106, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR'),
(107, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL'),
(108, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR'),
(109, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA'),
(110, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD'),
(111, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF'),
(112, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK'),
(113, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT'),
(114, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO'),
(115, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD'),
(116, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR'),
(117, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR'),
(118, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR'),
(119, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK'),
(120, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN'),
(121, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR'),
(122, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN'),
(123, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD'),
(124, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF'),
(125, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF'),
(126, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN'),
(127, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO'),
(128, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR'),
(129, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK'),
(130, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR'),
(131, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD'),
(132, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD'),
(133, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD'),
(134, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR'),
(135, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB'),
(136, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN'),
(137, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF'),
(138, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK'),
(139, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP'),
(140, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR'),
(141, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN'),
(142, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR'),
(143, 'Palau', 'PW', '+680', 'Palauan dollar', '$', ''),
(144, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG'),
(145, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR'),
(146, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON'),
(147, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD'),
(148, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB'),
(149, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF'),
(150, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR'),
(151, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD'),
(152, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR'),
(153, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG'),
(154, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK'),
(155, 'Singapore', 'SG', '+65', 'Brunei dollar', '$', 'BND'),
(156, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR'),
(157, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR'),
(158, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL'),
(159, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR'),
(160, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF'),
(161, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS'),
(162, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD'),
(163, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD'),
(164, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL'),
(165, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF'),
(166, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF'),
(167, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB'),
(168, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS'),
(169, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT'),
(170, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND'),
(171, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP'),
(172, 'Turkey', 'TR', '+90', 'Turkish lira', '', 'TRY'),
(173, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD'),
(174, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD'),
(175, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD'),
(176, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH'),
(177, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX'),
(178, 'United States', 'US', '+1', 'United States dollar', '$', 'USD'),
(179, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU'),
(180, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS'),
(181, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND'),
(182, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV'),
(183, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF'),
(184, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST'),
(185, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER'),
(186, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR'),
(187, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW'),
(188, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `once_per_customer` int(11) DEFAULT 0,
  `usages_limit` varchar(255) DEFAULT NULL,
  `used` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_apply`
--

CREATE TABLE `coupons_apply` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'customer',
  `gender` varchar(255) DEFAULT NULL,
  `last_appointment` date DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `image` text DEFAULT NULL,
  `thumb` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dialing_codes`
--

CREATE TABLE `dialing_codes` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `iso_code` varchar(2) NOT NULL,
  `isd_code` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dialing_codes`
--

INSERT INTO `dialing_codes` (`id`, `name`, `iso_code`, `isd_code`) VALUES
(1, 'Afghanistan', 'AF', '93'),
(2, 'Albania', 'AL', '355'),
(3, 'Algeria', 'DZ', '213'),
(4, 'American Samoa', 'AS', '1-684'),
(5, 'Andorra', 'AD', '376'),
(6, 'Angola', 'AO', '244'),
(7, 'Anguilla', 'AI', '1-264'),
(8, 'Antarctica', 'AQ', '672'),
(9, 'Antigua and Barbuda', 'AG', '1-268'),
(10, 'Argentina', 'AR', '54'),
(11, 'Armenia', 'AM', '374'),
(12, 'Aruba', 'AW', '297'),
(13, 'Australia', 'AU', '61'),
(14, 'Austria', 'AT', '43'),
(15, 'Azerbaijan', 'AZ', '994'),
(16, 'Bahamas', 'BS', '1-242'),
(17, 'Bahrain', 'BH', '973'),
(18, 'Bangladesh', 'BD', '880'),
(19, 'Barbados', 'BB', '1-246'),
(20, 'Belarus', 'BY', '375'),
(21, 'Belgium', 'BE', '32'),
(22, 'Belize', 'BZ', '501'),
(23, 'Benin', 'BJ', '229'),
(24, 'Bermuda', 'BM', '1-441'),
(25, 'Bhutan', 'BT', '975'),
(26, 'Bolivia', 'BO', '591'),
(27, 'Bosnia and Herzegowina', 'BA', '387'),
(28, 'Botswana', 'BW', '267'),
(29, 'Bouvet Island', 'BV', '47'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'Brunei Darussalam', 'BN', '673'),
(33, 'Bulgaria', 'BG', '359'),
(34, 'Burkina Faso', 'BF', '226'),
(35, 'Burundi', 'BI', '257'),
(36, 'Cambodia', 'KH', '855'),
(37, 'Cameroon', 'CM', '237'),
(38, 'Canada', 'CA', '1'),
(39, 'Cape Verde', 'CV', '238'),
(40, 'Cayman Islands', 'KY', '1-345'),
(41, 'Central African Republic', 'CF', '236'),
(42, 'Chad', 'TD', '235'),
(43, 'Chile', 'CL', '56'),
(44, 'China', 'CN', '86'),
(45, 'Christmas Island', 'CX', '61'),
(46, 'Cocos (Keeling) Islands', 'CC', '61'),
(47, 'Colombia', 'CO', '57'),
(48, 'Comoros', 'KM', '269'),
(49, 'Congo Democratic Republic of', 'CG', '242'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Cote D\'Ivoire', 'CI', '225'),
(53, 'Croatia', 'HR', '385'),
(54, 'Cuba', 'CU', '53'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Denmark', 'DK', '45'),
(58, 'Djibouti', 'DJ', '253'),
(59, 'Dominica', 'DM', '1-767'),
(60, 'Dominican Republic', 'DO', '1-809'),
(61, 'Timor-Leste', 'TL', '670'),
(62, 'Ecuador', 'EC', '593'),
(63, 'Egypt', 'EG', '20'),
(64, 'El Salvador', 'SV', '503'),
(65, 'Equatorial Guinea', 'GQ', '240'),
(66, 'Eritrea', 'ER', '291'),
(67, 'Estonia', 'EE', '372'),
(68, 'Ethiopia', 'ET', '251'),
(69, 'Falkland Islands (Malvinas)', 'FK', '500'),
(70, 'Faroe Islands', 'FO', '298'),
(71, 'Fiji', 'FJ', '679'),
(72, 'Finland', 'FI', '358'),
(73, 'France', 'FR', '33'),
(75, 'French Guiana', 'GF', '594'),
(76, 'French Polynesia', 'PF', '689'),
(77, 'French Southern Territories', 'TF', NULL),
(78, 'Gabon', 'GA', '241'),
(79, 'Gambia', 'GM', '220'),
(80, 'Georgia', 'GE', '995'),
(81, 'Germany', 'DE', '49'),
(82, 'Ghana', 'GH', '233'),
(83, 'Gibraltar', 'GI', '350'),
(84, 'Greece', 'GR', '30'),
(85, 'Greenland', 'GL', '299'),
(86, 'Grenada', 'GD', '1-473'),
(87, 'Guadeloupe', 'GP', '590'),
(88, 'Guam', 'GU', '1-671'),
(89, 'Guatemala', 'GT', '502'),
(90, 'Guinea', 'GN', '224'),
(91, 'Guinea-bissau', 'GW', '245'),
(92, 'Guyana', 'GY', '592'),
(93, 'Haiti', 'HT', '509'),
(94, 'Heard Island and McDonald Islands', 'HM', '011'),
(95, 'Honduras', 'HN', '504'),
(96, 'Hong Kong', 'HK', '852'),
(97, 'Hungary', 'HU', '36'),
(98, 'Iceland', 'IS', '354'),
(99, 'India', 'IN', '91'),
(100, 'Indonesia', 'ID', '62'),
(101, 'Iran (Islamic Republic of)', 'IR', '98'),
(102, 'Iraq', 'IQ', '964'),
(103, 'Ireland', 'IE', '353'),
(104, 'Israel', 'IL', '972'),
(105, 'Italy', 'IT', '39'),
(106, 'Jamaica', 'JM', '1-876'),
(107, 'Japan', 'JP', '81'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Korea, Democratic People\'s Republic of', 'KP', '850'),
(113, 'South Korea', 'KR', '82'),
(114, 'Kuwait', 'KW', '965'),
(115, 'Kyrgyzstan', 'KG', '996'),
(116, 'Lao People\'s Democratic Republic', 'LA', '856'),
(117, 'Latvia', 'LV', '371'),
(118, 'Lebanon', 'LB', '961'),
(119, 'Lesotho', 'LS', '266'),
(120, 'Liberia', 'LR', '231'),
(121, 'Libya', 'LY', '218'),
(122, 'Liechtenstein', 'LI', '423'),
(123, 'Lithuania', 'LT', '370'),
(124, 'Luxembourg', 'LU', '352'),
(125, 'Macao', 'MO', '853'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', '389'),
(127, 'Madagascar', 'MG', '261'),
(128, 'Malawi', 'MW', '265'),
(129, 'Malaysia', 'MY', '60'),
(130, 'Maldives', 'MV', '960'),
(131, 'Mali', 'ML', '223'),
(132, 'Malta', 'MT', '356'),
(133, 'Marshall Islands', 'MH', '692'),
(134, 'Martinique', 'MQ', '596'),
(135, 'Mauritania', 'MR', '222'),
(136, 'Mauritius', 'MU', '230'),
(137, 'Mayotte', 'YT', '262'),
(138, 'Mexico', 'MX', '52'),
(139, 'Micronesia, Federated States of', 'FM', '691'),
(140, 'Moldova', 'MD', '373'),
(141, 'Monaco', 'MC', '377'),
(142, 'Mongolia', 'MN', '976'),
(143, 'Montserrat', 'MS', '1-664'),
(144, 'Morocco', 'MA', '212'),
(145, 'Mozambique', 'MZ', '258'),
(146, 'Myanmar', 'MM', '95'),
(147, 'Namibia', 'NA', '264'),
(148, 'Nauru', 'NR', '674'),
(149, 'Nepal', 'NP', '977'),
(150, 'Netherlands', 'NL', '31'),
(151, 'Netherlands Antilles', 'AN', '599'),
(152, 'New Caledonia', 'NC', '687	'),
(153, 'New Zealand', 'NZ', '64'),
(154, 'Nicaragua', 'NI', '505'),
(155, 'Niger', 'NE', '227'),
(156, 'Nigeria', 'NG', '234'),
(157, 'Niue', 'NU', '683'),
(158, 'Norfolk Island', 'NF', '672'),
(159, 'Northern Mariana Islands', 'MP', '1-670'),
(160, 'Norway', 'NO', '47'),
(161, 'Oman', 'OM', '968'),
(162, 'Pakistan', 'PK', '92'),
(163, 'Palau', 'PW', '680'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787'),
(173, 'Qatar', 'QA', '974'),
(174, 'Reunion', 'RE', '262'),
(175, 'Romania', 'RO', '40'),
(176, 'Russian Federation', 'RU', '7'),
(177, 'Rwanda', 'RW', '250'),
(178, 'Saint Kitts and Nevis', 'KN', '1-869'),
(179, 'Saint Lucia', 'LC', '1-758'),
(180, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(181, 'Samoa', 'WS', '685'),
(182, 'San Marino', 'SM', '378'),
(183, 'Sao Tome and Principe', 'ST', '239'),
(184, 'Saudi Arabia', 'SA', '966'),
(185, 'Senegal', 'SN', '221'),
(186, 'Seychelles', 'SC', '248'),
(187, 'Sierra Leone', 'SL', '232'),
(188, 'Singapore', 'SG', '65'),
(189, 'Slovakia (Slovak Republic)', 'SK', '421'),
(190, 'Slovenia', 'SI', '386'),
(191, 'Solomon Islands', 'SB', '677'),
(192, 'Somalia', 'SO', '252'),
(193, 'South Africa', 'ZA', '27'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', '500'),
(195, 'Spain', 'ES', '34'),
(196, 'Sri Lanka', 'LK', '94'),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '290'),
(198, 'St. Pierre and Miquelon', 'PM', '508'),
(199, 'Sudan', 'SD', '249'),
(200, 'Suriname', 'SR', '597'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', '47'),
(202, 'Swaziland', 'SZ', '268'),
(203, 'Sweden', 'SE', '46'),
(204, 'Switzerland', 'CH', '41'),
(205, 'Syrian Arab Republic', 'SY', '963'),
(206, 'Taiwan', 'TW', '886'),
(207, 'Tajikistan', 'TJ', '992'),
(208, 'Tanzania, United Republic of', 'TZ', '255'),
(209, 'Thailand', 'TH', '66'),
(210, 'Togo', 'TG', '228'),
(211, 'Tokelau', 'TK', '690'),
(212, 'Tonga', 'TO', '676'),
(213, 'Trinidad and Tobago', 'TT', '1-868'),
(214, 'Tunisia', 'TN', '216'),
(215, 'Turkey', 'TR', '90'),
(216, 'Turkmenistan', 'TM', '993'),
(217, 'Turks and Caicos Islands', 'TC', '1-649'),
(218, 'Tuvalu', 'TV', '688'),
(219, 'Uganda', 'UG', '256'),
(220, 'Ukraine', 'UA', '380'),
(221, 'United Arab Emirates', 'AE', '971'),
(222, 'United Kingdom', 'GB', '44'),
(223, 'United States', 'US', '1'),
(224, 'United States Minor Outlying Islands', 'UM', '246'),
(225, 'Uruguay', 'UY', '598'),
(226, 'Uzbekistan', 'UZ', '998'),
(227, 'Vanuatu', 'VU', '678'),
(228, 'Vatican City State (Holy See)', 'VA', '379'),
(229, 'Venezuela', 'VE', '58'),
(230, 'Vietnam', 'VN', '84'),
(231, 'Virgin Islands (British)', 'VG', '1-284'),
(232, 'Virgin Islands (U.S.)', 'VI', '1-340'),
(233, 'Wallis and Futuna Islands', 'WF', '681'),
(234, 'Western Sahara', 'EH', '212'),
(235, 'Yemen', 'YE', '967'),
(236, 'Serbia', 'RS', '381'),
(238, 'Zambia', 'ZM', '260'),
(239, 'Zimbabwe', 'ZW', '263'),
(240, 'Aaland Islands', 'AX', '358'),
(241, 'Palestine', 'PS', '970'),
(242, 'Montenegro', 'ME', '382'),
(243, 'Guernsey', 'GG', '44-1481'),
(244, 'Isle of Man', 'IM', '44-1624'),
(245, 'Jersey', 'JE', '44-1534'),
(247, 'CuraÃ§ao', 'CW', '599'),
(248, 'Ivory Coast', 'CI', '225'),
(249, 'Kosovo', 'XK', '383');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `details`) VALUES
(1, 'How does the free trial work?', 'Our 14 day trial is 100% free and does not require any credit card information to start. If at the end of your trial you would like to upgrade, great. If not, your plan will automatically be downgraded to the free plan.'),
(2, 'Do I need to choose a plan now?', 'No. You get the full featured, unlimited version of our service completely free for 14 days. Once you\'re ready to upgrade, you may choose a plan which suits your needs.'),
(3, 'What is an online booking system?', 'What is an online booking system? In short, an online booking system is an online interface which enables customers to book the services that you offer in the form an appointment.\r\nWith an online booking system, businesses and professionals alike are in control of the services and available slots that are bookable by clients. Setting buffer time and configuring recurring appointments is also possible with many systems.\r\nAdvanced booking systems such as the Aoxio online booking system will also allow for booking pages to be customised and branded.'),
(4, 'What is an online appointment?', 'An online appointment typically refers to exactly that, a booking for a service made via an online booking system. An online appointment could be for a service, such as a dental appointment, for example, a meeting, or any number of reasons. While the booking for the appointment is made online, the actual appointment may take place over the phone, or in person at a later time and date as agreed at the point of booking.'),
(5, 'How do I set up an online booking?', 'If you want to set up and offer an online booking service for your clients, then you can do that with the help of a free online scheduling tool. You’ll benefit from an online booking page which you can customize with your own branding. Furthermore, with a good online booking system, you will be able to seamlessly integrate and offer an online booking facility via your own website.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `is_limit` int(11) NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `standared` int(11) DEFAULT NULL,
  `premium` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `slug`, `is_limit`, `basic`, `standared`, `premium`) VALUES
(1, 'Customers', 'customers', 1, -1, 200, -1),
(2, 'Staffs', 'staffs', 1, 100000000, 20, -1),
(3, 'Services', 'services', 1, 2147483647, 20, 200),
(4, 'Appointments', 'appointments', 1, 2147483647, 20, -1),
(5, 'Gallery', 'gallery', 0, NULL, NULL, NULL),
(6, 'Get Online Payments', 'get-online-payments', 0, NULL, NULL, NULL),
(7, 'Zoom Meeting', 'zoom-meeting', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature_assaign`
--

CREATE TABLE `feature_assaign` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feature_assaign`
--

INSERT INTO `feature_assaign` (`id`, `package_id`, `feature_id`) VALUES
(68, 3, 7),
(69, 3, 6),
(70, 3, 5),
(71, 3, 4),
(72, 3, 3),
(73, 3, 2),
(74, 3, 1),
(120, 2, 7),
(121, 2, 6),
(122, 2, 5),
(123, 2, 4),
(124, 2, 3),
(125, 2, 2),
(126, 2, 1),
(127, 1, 7),
(128, 1, 6),
(129, 1, 5),
(130, 1, 4),
(131, 1, 3),
(132, 1, 2),
(133, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `text_direction` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `slug`, `short_name`, `code`, `text_direction`, `status`) VALUES
(1, 'English', 'english', 'en', '', 'ltr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lang_values`
--

CREATE TABLE `lang_values` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `label` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `english` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang_values`
--

INSERT INTO `lang_values` (`id`, `type`, `label`, `keyword`, `english`) VALUES
(1, 'admin', 'Language', 'language', 'Language'),
(2, 'admin', 'Edit frontend values', 'edit-frontend-values', 'Translate Frontend'),
(3, 'admin', 'Edit admin values', 'edit-admin-values', 'Translate Admin Panel'),
(4, 'admin', 'Edit user values', 'edit-user-values', 'Translate User Panel'),
(5, 'admin', 'Update language for', 'update-language-for', 'Update language for'),
(6, 'admin', 'Frontend', 'frontend', 'Frontend'),
(7, 'admin', 'Admin', 'admin', 'Admin'),
(8, 'admin', 'User', 'user', 'User'),
(9, 'admin', 'Add New Language ', 'add-new-language', 'Add New Language '),
(10, 'admin', 'Manage Language', 'manage-language', 'Manage Language'),
(11, 'admin', 'Update values', 'update-values', 'Update values'),
(12, 'admin', 'Your Password has been changed Successfully', 'password-reset-success-msg', 'Your Password has been changed Successfully'),
(13, 'admin', 'Oops', 'oops', 'Oops'),
(14, 'admin', 'Your Confirm Password doesn\'t Match', 'confirm-pass-not-match-msg', 'Your Confirm Password doesn\'t Match'),
(15, 'admin', 'Your Old Password doesn\'t Match', 'old-password-doesnt-match', 'Your Old Password doesn\'t Match'),
(16, 'admin', 'Sorry', 'sorry', 'Sorry!'),
(17, 'admin', 'Something wrong', 'something-wrong', 'Something wrong'),
(18, 'admin', 'Success', 'success', 'Success!'),
(19, 'admin', 'Setup successfully', 'setup-successfully', 'Setup successfully'),
(20, 'admin', 'Send successfully', 'send-successfully', 'Send successfully'),
(21, 'admin', 'Are you sure', 'are-you-sure', 'Are you sure?'),
(22, 'admin', 'Converted successfully', 'converted-successfully', 'Converted successfully'),
(23, 'admin', 'Data limit has been over', 'data-limit-over', 'Data limit has been over'),
(24, 'admin', 'Sending failed', 'sending-failed', 'Sending failed'),
(25, 'admin', 'Approved Successfully', 'approved-successfully', 'Approved Successfully'),
(26, 'admin', 'You will not be able to recover this file', 'not-recover-file', 'You will not be able to recover this file'),
(27, 'admin', 'Deleted successfully', 'deleted-successfully', 'Deleted successfully'),
(28, 'admin', 'Approve this invoice', 'approve-this-invoice', 'Approve this invoice'),
(29, 'admin', 'Set as your primary chamber', 'set-as-your-primary-chamber', 'Set as your primary chamber'),
(30, 'admin', 'Want to set', 'want-to-set', 'Want to set'),
(31, 'admin', 'You have made some changes and it\'s not saved?', 'made-changes-not-saved', 'You have made some changes and it\'s not saved?'),
(32, 'admin', 'Your account has been suspended', 'account-suspend-msg', 'Your account has been suspended!'),
(33, 'front', 'This email already exist, try another one', 'email-exist', 'This email already exist, try another one'),
(34, 'front', 'Your account is not active', 'account-not-active', 'Your account is not active'),
(35, 'front', 'Sorry your username or password is not correct!', 'wrong-username-password', 'Sorry your username or password is not correct!'),
(36, 'front', 'Your email is not verified, Please verify your email', 'email-not-verified', 'Your email is not verified, Please verify your email'),
(37, 'front', 'We\'ve sent a password to your email address. Please check your inbox', 'password-sent-to-email', 'We\'ve sent a password to your email address. Please check your inbox'),
(38, 'front', 'Password Reset Successfully !', 'password-reset-successfully', 'Password Reset Successfully !'),
(39, 'front', 'You are not a valid user', 'not-a-valid-user', 'You are not a valid user'),
(40, 'admin', 'Set default language', 'set-default-language', 'Set default language'),
(41, 'admin', 'Short Form', 'short-form', 'Short Form'),
(42, 'admin', 'Text direction', 'text-direction', 'Text direction'),
(44, 'admin', 'Set Trial Days', 'set-trial-days', 'Set trial days'),
(45, 'front', 'Start', 'start', 'Start'),
(46, 'front', 'days trial', 'days-trial', 'days trial'),
(47, 'admin', 'Delete', 'delete', 'Delete'),
(48, 'admin', 'Activate', 'activate', 'Activate'),
(49, 'admin', 'Deactivate', 'deactivate', 'Deactivate'),
(50, 'admin', 'Dashboard', 'dashboard', 'Dashboard'),
(51, 'admin', 'Save', 'save', 'Save'),
(52, 'front', 'Home', 'home', 'Home'),
(53, 'front', 'Pricing', 'pricing', 'Pricing'),
(54, 'front', 'Blogs', 'blogs', 'Blogs'),
(55, 'front', 'Faqs', 'faqs', 'FAQs'),
(56, 'front', 'Contact', 'contact', 'Contact'),
(57, 'front', 'Pages', 'pages', 'Pages'),
(58, 'front', 'Sign In', 'sign-in', 'Sign In'),
(59, 'front', 'Sign Out', 'sign-out', 'Sign Out'),
(60, 'front', 'Get Started', 'get-started', 'Get Started'),
(61, 'front', 'Workflow', 'workflow', 'Workflow'),
(62, 'front', 'Look at a glance how our system works', 'workflow-title', 'Look at a glance how our system works'),
(63, 'front', 'Choose Plan', 'choose-plan', 'Choose Plan'),
(64, 'front', 'Choose your confortable plan', 'choose-your-confortable-plan', 'Choose your confortable plan'),
(65, 'front', 'Get Paid', 'get-paid', 'Get Paid'),
(66, 'front', 'Get Paid title', 'get-paid-title', 'Paid via paypal/stripe payment method'),
(67, 'front', 'Start Working', 'start-working', 'Start Working'),
(68, 'front', 'Start Working title', 'start-working-title', 'Start Using and explore the featuers'),
(69, 'front', 'Start using', 'start-using', 'Start using'),
(70, 'front', 'account', 'account', 'account'),
(71, 'front', 'Our online registration process makes it easy for you to sign up for an free or pro account.', 'home-intro-desc', 'Our online registration process makes it easy for you to sign up for an free or pro account.'),
(72, 'front', 'Services', 'services', 'Services'),
(73, 'front', 'All rights reserved', 'all-rights-reserved', 'All rights reserved'),
(74, 'front', 'Small Business — friendly Pricing', 'pricing-title', 'Small Business — friendly Pricing'),
(75, 'front', 'We\'re offering a generous Free Plan and affordable Standard & Premium pricing plans that will help you to grow with', 'pricing-desc', 'We\'re offering a generous Free Plan and affordable Standard & Premium pricing plans that will help you to grow with'),
(76, 'front', 'Monthly', 'monthly', 'Monthly'),
(77, 'front', 'Yearly', 'yearly', 'Yearly'),
(78, 'front', 'Per Year', 'per-year', 'Per Year'),
(79, 'front', 'Per Month', 'per-month', 'Per Month'),
(80, 'front', 'Select Plan', 'select-plan', 'Select Plan'),
(81, 'front', 'Experts', 'experts', 'Experts'),
(82, 'front', 'Meet our experienced experts and book your appoinment in online.', 'expert-title', 'Meet our experienced experts and book your appoinment in online.'),
(83, 'front', 'Select Departments', 'select-departments', 'Select Departments'),
(84, 'front', 'Select Experiences', 'select-experiences', 'Select Experiences'),
(85, 'front', 'Search by name', 'search-by-name', 'Search by name'),
(86, 'front', 'Book Appointment', 'book-appointment', 'Book Appointment'),
(87, 'front', 'No data found!', 'no-data-found', 'No data found!'),
(88, 'front', 'Blog & News', 'blog-news', 'Blog & News'),
(89, 'front', 'Learn More & Empower Yourself', 'learn-more-empower-yourself', 'Learn More & Empower Yourself'),
(90, 'front', 'Search blog posts', 'search-blog-posts', 'Search blog posts'),
(91, 'front', 'Tags', 'tags', 'Tags'),
(92, 'front', 'Leave a reply', 'leave-a-reply', 'Leave a reply'),
(93, 'front', 'Name', 'name', 'Name'),
(94, 'front', 'Address', 'address', 'Address'),
(95, 'front', 'Comment', 'comment', 'Comment'),
(96, 'front', 'Submit', 'submit', 'Submit'),
(97, 'front', 'Frequently Asked Questions', 'frequently-asked-questions', 'Frequently Asked Questions'),
(98, 'front', 'Get In Touch', 'get-in-touch', 'Get In Touch'),
(99, 'front', 'Message', 'message', 'Message'),
(100, 'front', 'Sign in to your', 'sign-in-to-your', 'Sign in to your'),
(101, 'front', 'Username', 'username', 'Username'),
(102, 'front', 'Password', 'password', 'Password'),
(103, 'front', 'Forgot password?', 'forgot-password', 'Forgot password?'),
(104, 'front', 'Don\'t have an account yet?', 'an-account-yet', 'Don\'t have an account yet?'),
(105, 'front', 'Select Your Role', 'select-your-role', 'Select Your Role'),
(106, 'front', 'Enter your email', 'enter-your-email', 'Enter your email'),
(107, 'front', ' Back', 'back', ' Back'),
(108, 'front', 'Email', 'email', 'Email'),
(109, 'front', 'Your full name', 'your-full-name', 'Your full name'),
(110, 'front', 'Your email address', 'your-email-address', 'Your email'),
(111, 'front', 'Your password', 'your-password', 'Your password'),
(112, 'front', 'I have read and understood the', 'i-have-read-and-understood-the', 'I have read and understood the'),
(113, 'front', 'Terms and Conditions', 'terms-and-conditions', 'Terms and Conditions'),
(114, 'front', 'Privacy Policy', 'privacy-policy', 'Privacy Policy'),
(115, 'front', 'and', 'and', 'and'),
(116, 'front', 'of this site', 'of-this-site', 'of this site'),
(117, 'front', 'Already have an account?', 'already-have-an-account', 'Already have an account?'),
(118, 'front', 'Register', 'register', 'Register'),
(119, 'front', 'Privacy', 'privacy', 'Privacy'),
(120, 'front', 'Terms', 'terms', 'Terms'),
(121, 'front', 'Error', 'error', 'Error'),
(122, 'front', 'Warning', 'warning', 'Warning'),
(123, 'front', 'Appointment type is required', 'appointment-type-is-required', 'Appointment type is required'),
(124, 'front', 'Booking date is required', 'booking-date-is-required', 'Booking date is required'),
(125, 'front', 'Booking time is required', 'booking-time-is-required', 'Booking time is required'),
(126, 'front', 'Processing', 'processing', 'Processing'),
(127, 'front', 'Appointment booked successfully', 'appointment-booked-successfully', 'Appointment booked successfully'),
(128, 'front', 'Incorrect username or password', 'incorrect-username-or-password', 'Incorrect username or password'),
(129, 'front', 'Please enter a valid date', 'please-enter-a-valid-date', 'Please enter a valid date'),
(130, 'front', 'Recaptcha is required', 'recaptcha-is-required', 'Recaptcha is required'),
(131, 'front', 'Signing In', 'signing-in', 'Signing In'),
(132, 'front', 'Your account is not active', 'your-account-is-not-active', 'Your account is not active'),
(133, 'front', 'Your account has been suspended', 'your-account-has-been-suspended', 'Your account has been suspended'),
(134, 'front', 'Your email is not verified, Please verify your email', 'your-email-is-not-verified-please-verify-your-email', 'Your email is not verified, Please verify your email'),
(135, 'front', 'Registared successfully!', 'registared-successfully', 'Registered successfully!'),
(136, 'front', 'Please wait we are preparing environment for you...', 'preparing-environment', 'Please wait we are preparing environment for you...'),
(137, 'front', 'This email already used, please try another one', 'email-exitsts', 'This email already used, please try another one'),
(138, 'front', 'Something wrong !, Failed to send code in your email.', 'something-wrong', 'Something wrong !, Failed to send code in your email.'),
(139, 'front', 'We\'ve sent a password to your email address. Please check your inbox', 'email-send-notify', 'We\'ve sent a password to your email address. Please check your inbox'),
(140, 'front', 'You are not a valid user', 'you-are-not-a-valid-user', 'You are not a valid user'),
(141, 'front', 'Try Again', 'try-again', 'Try Again'),
(142, 'front', 'Your account verified successfully!', 'your-account-verified-successfully', 'Your account verified successfully!'),
(143, 'front', 'Verify code is not matched', 'verify-code-is-not-matched', 'Verify code is not matched'),
(144, 'front', 'Experience Years', 'experience-years', 'Experience Years'),
(145, 'front', 'Patients', 'patients', 'Patients'),
(146, 'front', 'Visited Patient\'s', 'visited-patients', 'Visited Patient\'s'),
(147, 'front', 'Before booked an appointment check the availability', 'booking-availability', 'Before booked an appointment check the availability'),
(148, 'front', 'Appointment Type', 'appointment-type', 'Appointment Type'),
(149, 'front', 'Select Type', 'select-type', 'Select Type'),
(150, 'front', 'Date ', 'date', 'Date '),
(151, 'front', 'Time', 'time', 'Time'),
(152, 'front', 'Consultation Fee', 'consultation-fee', 'Consultation Fee'),
(153, 'front', 'Continue', 'continue', 'Continue'),
(154, 'front', ' New Registration', 'new-registration', ' New Registration'),
(155, 'front', ' Already have account?', 'already-have-account', ' Already have account?'),
(156, 'front', 'Close', 'close', 'Close'),
(157, 'front', 'Powered by', 'powered-by', 'Powered by'),
(158, 'admin', 'Settings', 'settings', 'Settings'),
(159, 'admin', 'Payment Settings', 'payment-settings', 'Payment Settings'),
(160, 'admin', 'Plans', 'plans', 'Plans'),
(161, 'admin', 'Departments', 'departments', 'Departments'),
(162, 'admin', 'Add Category', 'add-category', 'Add Category'),
(163, 'admin', 'Blog Posts', 'blog-posts', 'Blog Posts'),
(164, 'admin', 'Change Password', 'change-password', 'Change Password'),
(165, 'admin', 'Logout', 'logout', 'Logout'),
(166, 'admin', 'Verified', 'verified', 'Verified'),
(167, 'admin', 'Pending', 'pending', 'Pending'),
(168, 'admin', 'Expired', 'expired', 'Expired'),
(169, 'admin', 'Last 12 months Income', 'last-12-months-income', 'Last 12 months Income'),
(170, 'admin', 'Income', 'income', 'Income'),
(171, 'admin', 'Recently joined Users', 'recently-joined-users', 'Recently joined Users'),
(172, 'admin', 'a week ago', 'a-week-ago', 'a week ago'),
(173, 'admin', 'Net Income', 'net-income', 'Net Income'),
(174, 'admin', 'Fiscal year', 'fiscal-year', 'Fiscal year'),
(175, 'admin', 'Fiscal year start is January 01', 'fiscal-year-title', 'Fiscal year start is January 01'),
(176, 'admin', 'Version', 'version', 'Version'),
(177, 'admin', 'Plans by user', 'plans-by-user', 'Plans by user'),
(178, 'admin', 'Manage Settings', 'manage-settings', 'Manage Settings'),
(179, 'admin', ' Website Settings', 'website-settings', ' Website Settings'),
(180, 'admin', 'Upload Favicon', 'upload-favicon', 'Upload Favicon'),
(181, 'admin', 'Upload Logo', 'upload-logo', 'Upload Logo'),
(182, 'admin', 'Upload home image', 'upload-home-image', 'Upload home image'),
(183, 'admin', 'Application Name', 'application-name', 'Application Name'),
(184, 'admin', 'Application Title', 'application-title', 'Application Title'),
(185, 'admin', 'Keywords', 'keywords', 'Keywords'),
(186, 'admin', 'Description', 'description', 'Description'),
(187, 'admin', 'Footer About', 'footer-about', 'Footer About'),
(188, 'admin', 'Admin Email', 'admin-email', 'Admin Email'),
(189, 'admin', 'Copyright', 'copyright', 'Copyright'),
(190, 'admin', 'This email will used for your site from mail', 'settings-email-info', 'This email will used for your site from mail'),
(191, 'admin', 'Zoom Settings', 'zoom-settings', 'Zoom Settings'),
(192, 'admin', 'Preferences', 'preferences', 'Preferences'),
(193, 'admin', 'Registration System', 'registration-system', 'Registration System'),
(194, 'admin', 'Enable to allow sign up users to your site.', 'registration-title', 'Enable to allow sign up users to your site.'),
(195, 'admin', 'Enable reCaptcha for all open froms (Sign up, contact, comments)', 'recaptcha-title', 'Enable reCaptcha for all open froms (Sign up, contact, comments)'),
(196, 'admin', 'Email Verification', 'email-verification', 'Email Verification'),
(197, 'admin', 'Enable to allow email verification for registered users.', 'email-verify-title', 'Enable to allow email verification for registered users.'),
(198, 'admin', 'Enable to show users option in frontend', 'users-title', 'Enable to show users option in frontend'),
(199, 'admin', 'Enable to show blog option in frontend', 'blogs-title', 'Enable to show blog option in frontend'),
(200, 'admin', 'Enable to show faqs option in frontend', 'faq-title', 'Enable to show faqs option in frontend'),
(201, 'admin', 'Enable to show home page workflow section in frontend', 'workflow-enable', 'Enable to show home page workflow section in frontend'),
(202, 'admin', 'Email Settings', 'email-settings', 'Email Settings'),
(203, 'admin', 'If you are using gmail smtp please make sure you have set below settings before sending mail', 'mail-info-title', 'If you are using gmail smtp please make sure you have set below settings before sending mail'),
(204, 'admin', 'Two factor authentication off', 'two-factor-off', 'Two factor authentication off'),
(205, 'admin', 'Less secure app on', 'less-secure-app-on', 'Less secure app on'),
(206, 'admin', 'Mail Type', 'mail-type', 'Mail Type'),
(207, 'admin', 'Mail Title', 'mail-title', 'Mail Title'),
(208, 'admin', 'Mail Host', 'mail-host', 'Mail Host'),
(209, 'admin', 'Mail Port', 'mail-port', 'Mail Port'),
(210, 'admin', 'Mail Username', 'mail-username', 'Mail Username'),
(211, 'admin', 'Mail Password', 'mail-password', 'Mail Password'),
(212, 'admin', 'Mail Encryption', 'mail-encryption', 'Mail Encryption'),
(213, 'admin', '  SSL is used for port 465/25, TLS is used for port 587', 'mail-port-help', '  SSL is used for port 465/25, TLS is used for port 587'),
(214, 'admin', 'Send Test Mail', 'send-test-mail', 'Send Test Mail'),
(215, 'admin', 'Social Settings', 'social-settings', 'Social Settings'),
(216, 'admin', 'Set default', 'set-default', 'Set default'),
(217, 'admin', 'Update', 'update', 'Update'),
(218, 'admin', 'Direction', 'direction', 'Direction'),
(219, 'admin', 'Status', 'status', 'Status'),
(220, 'admin', 'Action', 'action', 'Action'),
(221, 'admin', 'Currency', 'currency', 'Currency'),
(222, 'admin', 'Paypal mode', 'paypal-mode', 'Paypal mode'),
(223, 'admin', 'Paypal Account', 'paypal-account', 'Paypal Account'),
(224, 'admin', 'Publish key', 'publish-key', 'Publish key'),
(225, 'admin', 'Secret key', 'secret-key', 'Secret key'),
(226, 'admin', 'Add Offline Payment', 'add-offline-payment', 'Add Offline Payment'),
(227, 'admin', 'Select User', 'select-user', 'Select User'),
(228, 'admin', 'Subscription type', 'subscription-type', 'Subscription type'),
(229, 'admin', 'Payment Status', 'payment-status', 'Payment Status'),
(230, 'admin', 'Manage Plans', 'manage-plans', 'Manage Plans'),
(231, 'admin', 'Show', 'show', 'Show'),
(232, 'admin', 'Hide', 'hide', 'Hide'),
(233, 'admin', 'Disable to hide this plan', 'disable-to-hide-this-plan', 'Disable to hide this plan'),
(234, 'admin', 'Active', 'active', 'Active'),
(235, 'admin', 'Edit Plan', 'edit-plan', 'Edit Plan'),
(236, 'admin', 'Update plan', 'update-plan', 'Update plan'),
(237, 'admin', 'Manage your plan settings here', 'manage-your-plan', 'Manage your plan settings here'),
(238, 'admin', 'Plan Settings', 'plan-settings', 'Plan Settings'),
(239, 'admin', 'Plan', 'plan', 'Plan'),
(240, 'admin', 'Choose which features you want to add in this plan', 'choose-which-features', 'Choose which features you want to add in this plan'),
(241, 'admin', 'Plan Name', 'plan-name', 'Plan Name'),
(242, 'admin', 'Monthly Price', 'monthly-price', 'Monthly Price'),
(243, 'admin', 'Yearly Price', 'yearly-price', 'Yearly Price'),
(244, 'admin', 'Set 0 price for free package', 'set-0-price-for-free-package', 'Set 0 price for free package'),
(245, 'admin', 'Online Consultation & get payments', 'online-consultation-get-payments', 'Online Consultation & get payments'),
(260, 'admin', 'Set limit -1 for unlimited', 'set-limit-1-for-unlimited', 'Set limit -1 for unlimited'),
(261, 'admin', 'Add New Department', 'add-new-department', 'Add New Department'),
(262, 'admin', 'All Users', 'all-users', 'All Users'),
(263, 'admin', 'Sort by Packages', 'sort-by-packages', 'Sort by Packages'),
(264, 'admin', 'Sort by Status', 'sort-by-status', 'Sort by Status'),
(265, 'admin', 'Avatar', 'avatar', 'Avatar'),
(266, 'admin', 'Account Status', 'account-status', 'Account Status'),
(267, 'admin', 'Joined', 'joined', 'Joined'),
(268, 'admin', 'All category', 'all-category', 'All category'),
(269, 'admin', ' Add new Category', 'add-new-category', ' Add new Category'),
(270, 'admin', 'Category Name', 'category-name', 'Category Name'),
(271, 'admin', 'Edit', 'edit', 'Edit'),
(272, 'admin', 'All Blog posts', 'all-blog-posts', 'All Blog posts'),
(273, 'admin', 'Thumb', 'thumb', 'Thumb'),
(274, 'admin', 'Title', 'title', 'Title'),
(275, 'admin', 'Details', 'details', 'Details'),
(276, 'admin', 'Add new blog', 'add-new-blog', 'Add new blog'),
(277, 'admin', 'Category ', 'category', 'Category '),
(278, 'admin', 'Slug', 'slug', 'Slug'),
(279, 'admin', 'Inactive', 'inactive', 'Inactive'),
(280, 'admin', 'All Services', 'all-services', 'All Services'),
(281, 'admin', 'Add new Services', 'add-new-services', 'Add new Services'),
(282, 'admin', 'Upload Image', 'upload-image', 'Upload Image'),
(283, 'admin', 'Order', 'order', 'Order'),
(284, 'admin', 'Add New service', 'add-new-service', 'Add New service'),
(285, 'admin', 'Add new page', 'add-new-page', 'Add new page'),
(286, 'admin', 'Page title', 'page-title', 'Page title'),
(287, 'admin', 'Page slug', 'page-slug', 'Page slug'),
(288, 'admin', 'Page description', 'page-description', 'Page description'),
(289, 'admin', 'All Faqs', 'all-faqs', 'All Faqs'),
(290, 'admin', 'Add New FAQ', 'add-new-faq', 'Add New FAQ'),
(291, 'admin', 'Old Password', 'old-password', 'Old Password'),
(292, 'admin', 'New Password', 'new-password', 'New Password'),
(293, 'admin', 'Confirm New Password', 'confirm-new-password', 'Confirm New Password'),
(294, 'front', 'Resources', 'resources', 'Resources'),
(295, 'front', 'Users', 'users', 'Users'),
(296, 'front', 'The better way to manage your chambers, prescriptions, appointments & patients', 'feature-home-title', 'The better way to manage your chambers, prescriptions, appointments & patients'),
(297, 'front', 'account you can easily manage chamber wise prescriptions, patients, appointments and many more features.', 'feature-home-desc', 'account you can easily manage chamber wise prescriptions, patients, appointments and many more features.'),
(298, 'front', 'Using', 'using', 'Using'),
(299, 'front', 'Features not selected !', 'features-not-selected', 'Features not selected !'),
(300, 'front', 'years experience', 'years-experience', 'years experience'),
(301, 'front', 'View Profile', 'view-profile', 'View Profile'),
(302, 'front', 'Explore our features', 'explore-our-features', 'Explore our features'),
(303, 'front', 'Read More', 'read-more', 'Read More'),
(304, 'front', 'Appointment schedule is not setted.', 'schedule-is-not-setted', 'Appointment schedule is not setted.'),
(305, 'front', 'Online Consultation', 'online-consultation', 'Online Consultation'),
(306, 'front', 'Offline', 'offline', 'Offline'),
(307, 'front', 'Email or Mobile', 'email-or-mobile', 'Email or Mobile'),
(308, 'front', 'Phone', 'phone', 'Phone'),
(309, 'front', 'Educations', 'educations', 'Educations'),
(310, 'front', 'Experiences', 'experiences', 'Experiences'),
(311, 'front', 'This profile is currently not available', 'profile-not-available', 'This profile is currently not available'),
(312, 'front', 'Upgrade your plan', 'upgrade-your-plan', 'Upgrade your plan'),
(313, 'front', 'Back to Home', 'back-to-home', 'Back to Home'),
(314, 'front', 'The resource requested could not be found on this site!', 'error-404', 'The resource requested could not be found on this site!'),
(315, 'front', 'Verify Account', 'verify-account', 'Verify Account'),
(316, 'front', 'We have sent a link to your registered email address, please click this link to verify your account', 'verify-email-sent-link', 'We have sent a link to your registered email address, please click this link to verify your account'),
(317, 'front', 'Email verification failed!', 'email-verification-failed', 'Email verification failed!'),
(318, 'front', 'Congratulation\'s', 'congratulations', 'Congratulation\'s'),
(319, 'front', 'Your account successfully verified', 'your-account-successfully-verified', 'Your account successfully verified'),
(320, 'front', 'Logout Successfully !', 'logout-successfully-', 'Logout Successfully !'),
(321, 'front', 'Recover password', 'recover-password', 'Recover password'),
(322, 'front', 'Admin/Doctors', 'admindoctors', 'Admin/Doctors'),
(323, 'front', 'Staff', 'staff', 'Staff'),
(324, 'front', 'Patient', 'patient', 'Patient'),
(325, 'front', 'Enter username', 'enter-username', 'Enter username'),
(326, 'front', 'Enter password', 'enter-password', 'Enter password'),
(327, 'front', 'Registration system is disabled !', 'registration-system-is-disabled-', 'Registration system is disabled !'),
(328, 'front', 'Contact Admin', 'contact-admin', 'Contact Admin'),
(329, 'front', 'Get started with a', 'get-started-with-a', 'Get started with a'),
(330, 'admin', 'Subscription', 'subscription', 'Subscription'),
(331, 'admin', 'Consultation Settings', 'consultation-settings', 'Consultation Settings'),
(332, 'admin', 'Live Consultations', 'live-consultations', 'Live Consultations'),
(333, 'admin', 'Prescription', 'prescription', 'Prescription'),
(334, 'admin', 'Prescriptions', 'prescriptions', 'Prescriptions'),
(335, 'admin', 'Create New', 'create-new', 'Create New'),
(336, 'admin', 'Lists', 'lists', 'Lists'),
(337, 'admin', 'Set Schedule', 'set-schedule', 'Set Schedule'),
(338, 'admin', 'Drugs', 'drugs', 'Drugs'),
(339, 'admin', 'Personal Info', 'personal-info', 'Personal Info'),
(340, 'admin', 'Manage Education', 'manage-education', 'Manage Education'),
(341, 'admin', 'Manage Experiences', 'manage-experiences', 'Manage Experiences'),
(342, 'admin', 'Profile', 'profile', 'Profile'),
(343, 'admin', 'Blog', 'blog', 'Blog'),
(344, 'admin', 'Today\'s Appointment', 'todays-appointment', 'Today\'s Appointment'),
(345, 'admin', 'Serial No', 'serial-no', 'Serial No'),
(346, 'admin', 'Upcoming Appointment\'s', 'upcoming-appointments', 'Upcoming Appointment\'s'),
(347, 'admin', 'Mr. No', 'mr.-no', 'Mr. No'),
(348, 'admin', 'Doctor Info', 'doctor-info', 'Doctor Info'),
(349, 'admin', 'Schedule Info', 'schedule-info', 'Schedule Info'),
(350, 'admin', 'Consultation type', 'consultation-type', 'Consultation type'),
(351, 'admin', 'Online', 'online', 'Online'),
(352, 'admin', 'Offline (Chamber)', 'offline-chamber', 'Offline (Chamber)'),
(353, 'admin', 'See all Users', 'see-all-users', 'See all Users'),
(354, 'admin', 'Save Changes', 'save-changes', 'Save Changes'),
(355, 'admin', 'mode', 'mode', 'mode'),
(356, 'admin', 'Add Payment', 'add-payment', 'Add Payment'),
(357, 'admin', 'Select Plans', 'select-plans', 'Select Plans'),
(358, 'admin', 'Enable to active this plan', 'enable-to-active-this-plan', 'Enable to active this plan'),
(359, 'admin', 'Hidden', 'hidden', 'Hidden'),
(360, 'admin', 'Enable access to', 'enable-access-to', 'Enable access to'),
(361, 'admin', 'feature in this plan', 'feature-in-this-plan', 'feature in this plan'),
(362, 'admin', 'Chambers', 'chambers', 'Chambers'),
(363, 'admin', 'Package', 'package', 'Package'),
(364, 'admin', 'Days left', 'days-left', 'Days left'),
(365, 'admin', 'Disabled', 'disabled', 'Disabled'),
(366, 'admin', 'All Categories', 'all-categories', 'All Categories'),
(367, 'admin', 'Add New Post', 'add-new-post', 'Add New Post'),
(368, 'admin', 'Enter your tags', 'enter-your-tags', 'Enter your tags'),
(369, 'admin', 'Accounts', 'accounts', 'Accounts'),
(486, 'admin', 'Insert your translate value here', 'insert-your-translate-value-here', 'Insert your translate value here'),
(487, 'front', 'Code resend successfully', 'email-resend-successfully', 'Code resend successfully'),
(490, 'front', 'Verify Code', 'verify-code', 'Verify Code'),
(491, 'admin', 'Prescription created successfully', 'prescription-created-successfully', 'Prescription created successfully'),
(492, 'admin', 'You are ready to start a live consultation with your patient', 'ready-to-start-a-live', 'You are ready to start a live consultation with your patient'),
(493, 'admin', 'Yes, Start It', 'yes-start', 'Yes, Start It'),
(494, 'admin', 'Set this chamber as a default', 'set-this-chamber-default', 'Set this chamber as a default'),
(495, 'admin', 'Cancel this user serial', 'cancel-this-user-serial', 'Cancel this user serial'),
(496, 'admin', 'Serial cancel successfully', 'serial-cancel-success', 'Serial cancel successfully'),
(498, 'admin', 'Inserted Successfully !', 'inserted-successfully', 'Inserted Successfully !'),
(499, 'admin', 'Updated Successfully !', 'updated-successfully', 'Updated Successfully !'),
(509, 'front', 'days free trial', 'days-free-trial', 'days free trial'),
(510, 'admin', 'Multilingual System', 'multilingual-system', 'Multilingual System'),
(511, 'admin', 'Enable to allow multilingual system', 'enable-multilingual', 'Enable to allow multilingual system'),
(527, 'admin', 'Set 0 to hide trial option', 'set-trial-info', 'Set 0 to disable trial option'),
(528, 'admin', 'Label', 'label', 'Label'),
(529, 'admin', 'keyword', 'keyword', 'keyword'),
(530, 'admin', 'Type', 'type', 'Type'),
(531, 'admin', 'Value', 'value', 'Value'),
(532, 'front', 'Companies', 'companies', 'Companies'),
(533, 'front', 'Company Lists', 'company-lists', 'Company Lists'),
(534, 'front', 'All Countries', 'all-countries', 'All Countries'),
(535, 'front', 'View Page', 'view-page', 'View Page'),
(536, 'front', 'Customers', 'customers', 'Customers'),
(537, 'front', 'Staffs', 'staffs', 'Staffs'),
(538, 'front', 'Appointments', 'appointments', 'Appointments'),
(539, 'front', 'Gallery', 'gallery', 'Gallery'),
(540, 'front', 'Get Online Payments', 'get-online-payments', 'Get Online Payments'),
(541, 'front', 'Zoom Meeting', 'zoom-meeting', 'Zoom Meeting'),
(542, 'front', 'Book Now', 'book-now', 'Book Now'),
(543, 'front', 'About', 'about', 'About'),
(544, 'front', 'Business Days', 'business-days', 'Business Days'),
(545, 'front', 'Sort by Staffs', 'sort-by-staffs', 'Sort by Staffs'),
(546, 'front', 'Duration', 'duration', 'Duration'),
(547, 'front', 'Price', 'price', 'Price'),
(548, 'front', 'No image found!', 'no-image-found', 'No image found!'),
(549, 'front', 'Select Service', 'select-service', 'Select Service'),
(550, 'front', 'Select Staff', 'select-staff', 'Select Staff'),
(551, 'front', 'Select Date & Time', 'select-date-time', 'Select Date & Time'),
(552, 'front', 'Schedule not available', 'schedule-not-available', 'Schedule not available'),
(553, 'front', 'Pick Appointment Time For', 'pick-time-for', 'Pick Appointment Time For'),
(554, 'front', 'Easy step by step appointment booking', 'easy-step-booking-title', 'Easy step by step appointment booking'),
(555, 'front', 'Choose staff, schedule date & time to booking your services.', 'easy-step-booking-details', 'Choose staff, schedule date & time to booking your services.'),
(556, 'front', 'Phone Number', 'phone-number', 'Phone Number'),
(557, 'front', 'Select Country', 'select-country', 'Select Country'),
(558, 'front', 'Confirm Booking Details', 'confirm-booking-details', 'Confirm Booking Details'),
(559, 'front', 'You are almost done!', 'you-are-almost-done', 'You are almost done!'),
(560, 'front', 'Booking Number', 'booking-number', 'Booking Number'),
(561, 'front', 'Booking Info', 'booking-info', 'Booking Info'),
(562, 'front', 'Customer Info', 'customer-info', 'Customer Info'),
(563, 'front', 'Payment Info', 'payment-info', 'Payment Info'),
(564, 'front', 'Discount', 'discount', 'Discount'),
(565, 'front', 'Total Cost', 'total-cost', 'Total Cost'),
(566, 'front', 'Add Coupon', 'add-coupon', 'Add Coupon'),
(567, 'front', 'Code here', 'code-here', 'Code here'),
(568, 'front', 'Apply', 'apply', 'Apply'),
(569, 'front', 'Pay Now', 'pay-now', 'Pay Now'),
(570, 'front', 'Pay On Site', 'pay-on-site', 'Pay On Site'),
(571, 'front', 'All transactions are secure and encrypted. Credit card information is never stored.', 'secure-and-encrypted', 'All transactions are secure and encrypted. Credit card information is never stored.'),
(572, 'front', 'Confirm Booking', 'confirm-booking', 'Confirm Booking'),
(573, 'front', 'Customer Panel', 'customer-panel', 'Customer Panel'),
(574, 'front', 'Staff Panel', 'staff-panel', 'Staff Panel'),
(575, 'front', 'Approved', 'approved', 'Approved'),
(576, 'front', 'Completed', 'completed', 'Completed'),
(577, 'front', 'Register your company', 'register-your-company', 'Register your company'),
(578, 'front', 'Basic information, You can add more later', 'basic-information-you-can-add-more-later', 'Basic information, You can add more later'),
(579, 'front', 'Company Slug (Related to url & cannot be changed)', 'company-slug-restrict', 'Company Slug (Related to url & cannot be changed)'),
(580, 'front', 'Company Name', 'company-name', 'Company Name'),
(581, 'front', 'Categories', 'categories', 'Categories'),
(582, 'front', 'Country', 'country', 'Country'),
(583, 'front', 'Select Code', 'select-code', 'Select Code'),
(584, 'front', 'This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies', 'accept_cookies', 'This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies'),
(585, 'front', 'Accept', 'accept', 'Accept'),
(586, 'front', 'Staff Not found!', 'staff-not-found', 'Staff Not found!'),
(587, 'front', 'Card Details', 'card-details', 'Card Details'),
(588, 'front', 'Card Number', 'card-number', 'Card Number'),
(589, 'front', 'Cardholder\'s Name', 'cardholders-name', 'Cardholder\'s Name'),
(590, 'front', 'Loading', 'loading', 'Loading'),
(591, 'front', 'One Platform For any Business', 'one-platform-for-any-business', 'One Platform For any Business'),
(592, 'front', 'Smart booking tool to grow your online business', 'smart-booking-tool-to-grow-your-online-business', 'Smart booking tool to grow your online business'),
(593, 'front', 'The best solution to start your online business <br> with powerful features', 'the-best-solution-to-start', 'The best solution to start your online business <br> with powerful features'),
(594, 'front', 'Booking Website', 'booking-website', 'Booking Website'),
(595, 'front', 'You will get a ready to use booking site after signup in', 'booking-website-title', 'You will get a ready to use booking site after signup in'),
(596, 'front', 'Accept online bookings', 'accept-online-bookings', 'Accept online bookings'),
(597, 'front', 'Accept bookings from your clients using your own booking site', 'accept-online-bookings-title', 'Accept bookings from your clients using your own booking site'),
(598, 'front', 'Staff & Client Portal', 'staff-client-portal', 'Staff & Client Portal'),
(599, 'front', 'Your Staffs & Clients will get access to their own portal', 'staff-client-portal-title', 'Your Staffs & Clients will get access to their own portal'),
(600, 'front', 'Accept Payments', 'accept-payments', 'Accept Payments'),
(601, 'front', 'Accept Online / Offline payments from your clients', 'accept-payments-title', 'Accept Online / Offline payments from your clients'),
(602, 'front', 'Customize your appointment schedule and booking page', 'customize-your-appointment-schedule-and-booking-page', 'Customize your appointment schedule and booking page'),
(603, 'front', 'Share your personal booking page with your customers & prospects', 'share-your-personal-booking-page', 'Share your personal booking page with your customers & prospects'),
(604, 'front', 'Your customers & prospects book an available time with you', 'your-customers-prospects-book-an-available-time-with-you', 'Your customers & prospects book an available time with you'),
(605, 'front', 'Sign up for our 14-day trial with all features. No credit card required', 'sign-up-for-our-14-day-trial-with-all-features', 'Sign up for our 14-day trial with all features. No credit card required'),
(606, 'front', 'Write more details', 'write-more-details', 'Write more details'),
(607, 'front', 'Features not selected !', 'features-not-selected-', 'Features not selected !'),
(608, 'front', 'year', 'year', 'year'),
(609, 'front', 'month', 'month', 'month'),
(610, 'front', 'Admin/User', 'adminuser', 'Admin/User'),
(611, 'front', 'Customer', 'customer', 'Customer'),
(612, 'front', 'Enter email or username', 'enter-email-or-username', 'Enter email or username'),
(613, 'front', 'Name of your company', 'name-of-your-company', 'Name of your company'),
(614, 'front', 'Select', 'select', 'Select'),
(615, 'front', 'This name is already taken, try another one', 'name-is-already-taken', 'This name is already taken, try another one'),
(616, 'front', 'Name is available', 'name-is-available', 'Name is available'),
(617, 'front', 'We have send a verification code in your', 'we-have-send-a-verification-code-in-your', 'We have send a verification code in your'),
(618, 'front', 'Enter Code here', 'enter-code-here', 'Enter Code here'),
(619, 'front', 'Resend', 'resend', 'Resend'),
(620, 'front', 'Open', 'open', 'Open'),
(621, 'front', 'Free', 'free', 'Free'),
(622, 'front', 'Booking is temporary unavailable!', 'booking-is-temporary-unavailable', 'Booking is temporary unavailable!'),
(623, 'front', 'Capacity', 'capacity', 'Capacity'),
(624, 'front', 'Service', 'service', 'Service'),
(625, 'front', 'Invalid code', 'invalid-code', 'Invalid code'),
(626, 'front', 'You have already applied this code', 'already-applied-code', 'You have already applied this code'),
(627, 'front', 'Coupon applied successfully!', 'coupon-applied-successfully', 'Coupon applied successfully!'),
(628, 'front', 'off', 'off', 'off'),
(629, 'front', 'Edit Appointment', 'edit-appointment', 'Edit Appointment'),
(630, 'front', 'Rejected', 'rejected', 'Rejected'),
(631, 'front', 'Start Time', 'start-time', 'Start Time'),
(632, 'front', 'End Time', 'end-time', 'End Time'),
(633, 'front', 'Cancelled', 'cancelled', 'Cancelled'),
(634, 'front', 'Complete your payment', 'complete-your-payment', 'Complete your payment'),
(635, 'front', 'Cancel Appointment', 'cancel-appointment', 'Cancel Appointment'),
(636, 'front', 'Zoom Meeting Link', 'zoom-meeting-link', 'Zoom Meeting Link'),
(637, 'front', 'Booking Confirmation', 'booking-confirmation', 'Booking Confirmation'),
(638, 'front', 'Please complete your payment to confirm the booking', 'confirm-the-booking', 'Please complete your payment to confirm the booking'),
(639, 'admin', 'View Site', 'view-site', 'View Site'),
(640, 'admin', 'Manage Profile', 'manage-profile', 'Manage Profile'),
(641, 'admin', 'License', 'license', 'License'),
(642, 'admin', 'Transactions', 'transactions', 'Transactions'),
(643, 'admin', 'Features', 'features', 'Features'),
(644, 'admin', 'Contacts', 'contacts', 'Contacts'),
(645, 'admin', 'Info', 'info', 'Info'),
(646, 'user', 'Company Settings', 'company-settings', 'Company Settings'),
(647, 'user', 'Working Hours', 'working-hours', 'Working Hours'),
(648, 'admin', 'Latest Users', 'latest-users', 'Latest Users'),
(649, 'admin', 'Joining date', 'joining-date', 'Joining date'),
(650, 'admin', 'Packages by User', 'packages-by-user', 'Packages by User'),
(651, 'admin', 'Charts', 'charts', 'Charts'),
(652, 'admin', 'SMS Settings', 'sms-settings', 'SMS Settings'),
(653, 'admin', 'Subscription Tax', 'subscription-tax', 'Subscription Tax'),
(654, 'admin', 'For better view please use logo size 300 ✕ 150', 'logo-suggestions', 'For better view please use logo size 300 ✕ 150'),
(655, 'admin', 'Upload hero image', 'upload-hero-image', 'Upload hero image'),
(656, 'admin', 'Set 0 to disable the trial option', 'set-0-to-disable-the-trial-option', 'Set 0 to disable the trial option'),
(657, 'admin', 'Preferences', 'prefrences', 'Preferences'),
(658, 'admin', 'Enable to active payment options for users subscription', 'payment-title', 'Enable to active payment options for users subscription'),
(659, 'admin', 'SMS Verification', 'sms-verification', 'SMS Verification'),
(660, 'admin', 'Enable to allow sms verification for registered users.', 'sms-title1', 'Enable to allow sms verification for registered users.'),
(661, 'admin', 'Note: If you want to enable sms verification please make sure you have disabled the email verification', 'sms-title2', 'Note: If you want to enable sms verification please make sure you have disabled the email verification'),
(662, 'admin', 'Company List', 'company-list', 'Company List'),
(663, 'admin', 'Enable to show company list in frontend', 'company-list-title', 'Enable to show company list in frontend'),
(664, 'admin', 'Features Intro', 'features-intro', 'Features Intro'),
(665, 'admin', 'Enable to show home page feature intro section in frontend', 'features-intro-title', 'Enable to show home page feature intro section in frontend'),
(666, 'admin', 'Select Income Chart Style', 'select-income-chart-style', 'Select Income Chart Style'),
(667, 'admin', 'Bar Chart', 'bar-chart', 'Bar Chart'),
(668, 'admin', 'Line Chart', 'line-chart', 'Line Chart'),
(669, 'admin', 'Area Line Chart', 'area-line-chart', 'Area Line Chart'),
(670, 'admin', 'Area Shape Chart', 'area-shape-chart', 'Area Shape Chart'),
(671, 'admin', 'Account SID', 'account-sid', 'Account SID'),
(672, 'admin', 'Auth Token', 'auth-token', 'Auth Token'),
(673, 'admin', 'Sender Number (Twillo)', 'sender-number-tw', 'Sender Number (Twillo)'),
(674, 'admin', 'Tax Name', 'tax-name', 'Tax Name'),
(675, 'admin', 'Tax Amount', 'tax-amount', 'Tax Amount'),
(676, 'admin', 'Gmail Smtp', 'gmail-smtp', 'Gmail Smtp'),
(677, 'admin', 'Two factor authentication off ', 'two-factor-authentication-off', 'Two factor authentication off '),
(678, 'admin', 'Captcha Site key', 'captcha-site-key', 'Captcha Site key'),
(679, 'admin', 'Captcha Secret key', 'captcha-secret-key', 'Captcha Secret key'),
(680, 'admin', 'Payment', 'payment', 'Payment'),
(681, 'admin', 'This currency will used to receive your subscription payments', 'currency-title', 'This currency will used to receive your subscription payments'),
(682, 'admin', 'Setup Your Paypal Account to Accept Payments', 'paypal-title', 'Setup Your Paypal Account to Accept Payments'),
(683, 'admin', 'Setup Your Stripe Account to Accept Payments', 'stripe-title', 'Setup Your Stripe Account to Accept Payments'),
(684, 'admin', 'Offline Payment', 'offline-payment', 'Offline Payment'),
(685, 'admin', 'Setup Your Bank Info to receive offline payment directly to your bank account', 'offline-payment-title', 'Setup Your Bank Info to receive offline payment directly to your bank account'),
(686, 'admin', 'Offline Payment Instructions', 'offline-payment-instructions', 'Offline Payment Instructions'),
(687, 'admin', 'Your customer will see this instruction before submit payment', 'offline-payment-suggestions', 'Your customer will see this instruction before submit payment'),
(688, 'admin', 'License Info', 'license-info', 'License Info'),
(689, 'admin', 'License Type', 'license-type', 'License Type'),
(690, 'admin', 'Regular', 'regular', 'Regular'),
(691, 'admin', 'Extended', 'extended', 'Extended'),
(692, 'admin', 'If you want to upgrade your license from regular to extended please send email to us', 'license-upgrade-info', 'If you want to upgrade your license from regular to extended please send email to us'),
(693, 'admin', 'Click to Send Mail', 'click-to-send-mail', 'Click to Send Mail'),
(694, 'admin', 'Disable', 'disable', 'Disable'),
(695, 'admin', 'Approve Payment', 'approve-payment', 'Approve Payment'),
(696, 'admin', 'View Proof', 'view-proof', 'View Proof'),
(697, 'admin', 'View Invoice', 'view-invoice', 'View Invoice'),
(698, 'admin', 'Billing Cycle', 'billing-cycle', 'Billing Cycle'),
(699, 'admin', 'Posts', 'posts', 'Posts'),
(700, 'admin', 'Filters', 'filters', 'Filters'),
(701, 'admin', 'Informations', 'informations', 'Informations'),
(702, 'admin', 'Booking Page', 'booking-page', 'Booking Page'),
(703, 'admin', 'Expire', 'expire', 'Expire'),
(704, 'admin', 'Record Payment', 'record-payment', 'Record Payment'),
(705, 'admin', 'All', 'all', 'All'),
(706, 'admin', 'Image', 'image', 'Image'),
(707, 'admin', 'Example', 'example', 'Example'),
(708, 'user', 'Latest Appointments', 'latest-appointments', 'Latest Appointments'),
(709, 'user', 'Time & Date', 'time-date', 'Time & Date'),
(710, 'user', 'Created', 'created', 'Created'),
(711, 'user', 'Last Billing', 'last-billing', 'Last Billing'),
(712, 'user', 'Your Selected Plan', 'your-selected-plan', 'Your Selected Plan'),
(713, 'user', 'Upgrade', 'upgrade', 'Upgrade'),
(714, 'user', 'Are you sure want to upgrade your plan?', 'sure-upgrade', 'Are you sure want to upgrade your plan?'),
(715, 'user', 'Yes Continue', 'yes-continue', 'Yes Continue'),
(716, 'user', 'Embedded Code', 'embedded-code', 'Embedded Code'),
(717, 'user', 'QR Code', 'qr-code', 'QR Code'),
(718, 'user', 'Upload Company Logo', 'upload-company-logo', 'Upload Company Logo'),
(719, 'user', 'Banner image', 'banner-image', 'Banner image'),
(720, 'user', 'Company  Title', 'company-title', 'Company  Title'),
(721, 'user', 'Date Format', 'date-format', 'Date Format'),
(722, 'user', 'Enable Gallery', 'enable-gallery', 'Enable Gallery'),
(723, 'user', 'Enable to show gallery option in booking page', 'enable-gallery-title', 'Enable to show gallery option in booking page'),
(724, 'user', 'Sunday', 'sunday', 'Sunday'),
(725, 'user', 'Monday', 'monday', 'Monday'),
(726, 'user', 'Tuesday', 'tuesday', 'Tuesday'),
(727, 'user', 'Wednesday', 'wednesday', 'Wednesday'),
(728, 'user', 'Thursday', 'thursday', 'Thursday'),
(729, 'user', 'Friday', 'friday', 'Friday'),
(730, 'user', 'Satarday', 'satarday', 'Saturday'),
(731, 'user', 'Add new time', 'add-new-time', 'Add new time'),
(732, 'user', 'Enable Booking Confirmation SMS', 'enable-booking-confirmation-sms', 'Enable Booking Confirmation SMS'),
(733, 'user', 'Enable to send booking notification message to your customers, after make a appointment', 'enable-booking-con-title', 'Enable to send booking notification message to your customers, after make a appointment'),
(734, 'user', 'Enable Booking Reminder Alert', 'enable-booking-reminder-alert', 'Enable Booking Reminder Alert'),
(735, 'user', 'Enable to send booking reminder alert to your users before booking expire', 'enable-booking-alert-title', 'Enable to send booking reminder alert to your users before booking expire'),
(736, 'user', 'Paypal', 'paypal', 'Paypal'),
(737, 'user', 'Stripe', 'stripe', 'Stripe'),
(738, 'user', 'Sandbox', 'sandbox', 'Sandbox'),
(739, 'user', 'Live', 'live', 'Live'),
(740, 'user', 'Your payment has been completed Successfully', 'payment-completed-successfully', 'Your payment has been completed Successfully'),
(741, 'user', 'Your payment has been failed', 'your-payment-has-been-failed', 'Your payment has been failed'),
(742, 'user', 'Copy below code to show your booking page in another site', 'embed-code-copy', 'Copy below code to show your booking page in another site'),
(743, 'user', 'Share your business page using QR Code', 'share-qr-code', 'Share your business page using QR Code'),
(744, 'user', 'Preview', 'preview', 'Preview'),
(745, 'user', 'Download', 'download', 'Download'),
(746, 'user', 'New Appointment', 'new-appointment', 'New Appointment'),
(747, 'user', 'Notify Customers', 'notify-customers', 'Notify Customers'),
(748, 'user', 'Booking date', 'booking-date', 'Booking date'),
(749, 'user', 'Today', 'today', 'Today'),
(750, 'user', 'Tomorrow', 'tomorrow', 'Tomorrow'),
(751, 'user', 'Next 7 days', 'next-7-days', 'Next 7 days'),
(752, 'user', 'Next 15 days', 'next-15-days', 'Next 15 days'),
(753, 'user', 'Date & Time', 'date-time', 'Date & Time'),
(754, 'user', 'Reset', 'reset', 'Reset'),
(755, 'user', 'Enter email for username', 'enter-email-for-username', 'Enter email for username'),
(756, 'user', 'Set or reset password', 'set-or-reset-password', 'Set or reset password'),
(757, 'user', 'Create New Category', 'create-new-category', 'Create New Category'),
(758, 'user', 'Create New Service', 'create-new-service', 'Create New Service'),
(759, 'user', 'Service Name', 'service-name', 'Service Name'),
(760, 'user', 'Service Image', 'service-image', 'Service Image'),
(761, 'user', 'Assign Staffs', 'assign-staffs', 'Assign Staffs'),
(762, 'user', 'Set 0 for free', 'set-0-for-free', 'Set 0 for free'),
(763, 'user', 'Person', 'person', 'Person'),
(764, 'user', 'Set -1 for unlimited', 'set-1-for-unlimited', 'Set -1 for unlimited'),
(765, 'user', 'Minutes', 'minutes', 'Minutes'),
(766, 'user', 'Allow Zoom Meeting', 'allow-zoom-meeting', 'Allow Zoom Meeting'),
(767, 'user', 'Zoom Invitation Link', 'zoom-invitation-link', 'Zoom Invitation Link'),
(768, 'user', 'Not found', 'not-found', 'Not found'),
(769, 'user', 'Select staffs', 'select-staffs', 'Select staffs'),
(770, 'user', 'New Coupon', 'new-coupon', 'New Coupon'),
(771, 'user', 'Coupons', 'coupons', 'Coupons'),
(772, 'user', 'Limit', 'limit', 'Limit'),
(773, 'user', 'Once per customer', 'once-per-customer', 'Once per customer'),
(774, 'user', 'Code', 'code', 'Code'),
(775, 'user', 'Yes', 'yes', 'Yes'),
(776, 'user', 'No', 'no', 'No'),
(777, 'user', 'Start Date', 'start-date', 'Start Date'),
(778, 'user', 'End Date', 'end-date', 'End Date'),
(779, 'user', 'Image Title', 'image-title', 'Image Title'),
(780, 'user', 'Galleries', 'galleries', 'Galleries'),
(781, 'user', 'Upload Payment Proof', 'upload-payment-proof', 'Upload Payment Proof'),
(782, 'user', 'Please select a valid date', 'select-a-valid-date', 'Please select a valid date'),
(783, 'user', 'Downloaded Successfully', 'downloaded-successfully', 'Downloaded Successfully'),
(784, 'front', 'Appointment date is required', 'appointment-date-is-required', 'Appointment date is required'),
(785, 'user', 'Appointment time is required', 'appointment-time-is-required', 'Appointment time is required'),
(786, 'front', 'Want to cancel this appointment', 'want-to-cancel-this-appointment', 'Want to cancel this appointment'),
(787, 'front', 'Canceled Successfully', 'canceled-successfully', 'Canceled Successfully'),
(788, 'user', 'Company', 'company', 'Company'),
(789, 'admin', 'Translate Language', 'translate-language', 'Translate Language'),
(790, 'user', 'Calendars', 'calendars', 'Calendars'),
(791, 'user', 'Item', 'item', 'Item'),
(792, 'user', 'Total', 'total', 'Total'),
(793, 'user', 'Sub Total', 'sub-total', 'Sub Total'),
(794, 'user', 'Order No', 'order-no', 'Order No'),
(795, 'user', 'Invoice', 'invoice', 'Invoice'),
(796, 'user', 'Time Format', 'time-format', 'Time Format'),
(797, 'user', 'Hours', 'hours', 'Hours'),
(798, 'user', 'Time interval', 'time-interval', 'Time interval'),
(799, 'user', 'Are you sure send a sms notification to customer?', 'confirm-sms-notify', 'Send a sms notification to customer.'),
(800, 'user', 'Actions are disabled for demo purposes', 'action-off', 'Actions are disabled for demo purposes'),
(801, 'user', 'Enable Staff', 'enable-staff', 'Enable Staff'),
(802, 'user', 'If you enable this your customer must need add at least one staff while booking', 'enable-staff-title', 'If you enable this your customers must need add at least one staff while booking'),
(803, 'admin', 'You have reached the maximum limit! Please upgrade your plan.', 'reached-maximum-limit', 'You have reached the maximum limit! Please upgrade your plan'),
(804, 'user', 'Enable Category', 'enable-category', 'Enable Category'),
(805, 'user', 'Disable Category', 'disable-category', 'Disable Category'),
(806, 'user', 'Location', 'location', 'Location'),
(807, 'user', 'Locations', 'locations', 'Locations'),
(808, 'user', 'Sub location', 'sub-location', 'Sub location');
INSERT INTO `lang_values` (`id`, `type`, `label`, `keyword`, `english`) VALUES
(809, 'user', 'Sub locations', 'sub-locations', 'Sub locations'),
(810, 'user', 'Currency location', 'currency-location', 'Currency location'),
(811, 'user', 'Number format', 'number-format', 'Number format'),
(812, 'user', 'Currency Position', 'currency-position', 'Currency Position'),
(813, 'user', 'Paid', 'paid', 'Paid'),
(814, 'user', 'Minute', 'minute', 'Minute'),
(815, 'user', 'Hour', 'hour', 'Hour'),
(816, 'user', 'Send SMS Reminder', 'send-sms-reminder', 'Send SMS Reminder'),
(817, 'user', 'Review', 'review', 'Review'),
(818, 'user', 'Reviews', 'reviews', 'Reviews'),
(819, 'user', 'Customer Feedback', 'customer-feedback', 'Customer Feedback'),
(820, 'user', 'Average Rating', 'average-rating', 'Average Rating'),
(821, 'user', 'Ratings Summary', 'ratings-summary', 'Ratings Summary'),
(822, 'user', 'Ratings', 'ratings', 'Ratings'),
(823, 'user', 'Service Ratings', 'service-ratings', 'Service Ratings'),
(824, 'user', 'Enable Ratings', 'enable-ratings', 'Enable Ratings'),
(825, 'user', 'Enable to publicly visible service ratings, Until complete 3 ratings it will be hidden', 'enable-ratings-title', 'Enable to publicly visible service ratings, Until complete 3 ratings it will be hidden'),
(826, 'user', 'Learn more', 'learn-more', 'Learn more'),
(827, 'user', 'Write your review', 'write-review', 'Write your review'),
(828, 'user', 'January', 'january', 'January'),
(829, 'user', 'February', 'february', 'February'),
(830, 'user', 'March', 'march', 'March'),
(831, 'user', 'April', 'april', 'April'),
(832, 'user', 'May', 'may', 'May'),
(833, 'user', 'June', 'june', 'June'),
(834, 'user', 'July', 'july', 'July'),
(835, 'user', 'August', 'august', 'August'),
(836, 'user', 'September', 'september', 'September'),
(837, 'user', 'October', 'october', 'October'),
(838, 'user', 'November', 'november', 'November'),
(839, 'user', 'December', 'december', 'December'),
(840, 'user', 'Su', 'su', 'Su'),
(841, 'user', 'Mo', 'mo', 'Mo'),
(842, 'user', 'Tu', 'tu', 'Tu'),
(843, 'user', 'We', 'we', 'We'),
(844, 'user', 'Th', 'th', 'Th'),
(845, 'user', 'Fr', 'fr', 'Fr'),
(846, 'user', 'Sa', 'sa', 'Sa'),
(847, 'user', 'Days', 'days', 'Days'),
(848, 'user', 'Day', 'day', 'Day'),
(849, 'user', 'Kay Id', 'kay-id', 'Key Id'),
(850, 'user', 'Key Secret', 'key-secret', 'Key Secret'),
(851, 'user', 'Setup your Razorpay account to accept payments', 'razorpay-title', 'Setup your Razorpay account to accept payments'),
(852, 'user', 'Razorpay ', 'razorpay', 'Razorpay '),
(853, 'user', 'Opening Hour', 'opening-hour', 'Opening Hour'),
(854, 'user', 'End Hour', 'end-hour', 'End Hour'),
(855, 'user', 'Branches', 'branches', 'Branches'),
(856, 'user', 'Enable Locations', 'enable-locations', 'Enable Locations'),
(857, 'user', 'Disable Locations', 'disable-locations', 'Disable Locations'),
(858, 'user', 'Enable to allow locations in booking page', 'enable-location-title', 'Enable to allow locations in booking page'),
(859, 'user', 'Disable to hide locations in booking page', 'disable-location-title', 'Disable to hide locations in booking page'),
(860, 'user', 'Any special notes?', 'any-special-notes', 'Any special notes?'),
(861, 'user', 'Write your notes here', 'write-your-notes-here', 'Write your notes here'),
(862, 'user', 'Enable Frontend', 'enable-frontend', 'Enable Frontend'),
(863, 'user', 'Enable to show frontend site', 'enable-to-show-frontend-site', 'Enable to show frontend site'),
(864, 'user', 'View Details', 'view-details', 'View Details'),
(865, 'user', 'Total Appointments', 'total-appointments', 'Total Appointments'),
(866, 'user', 'Total Services', 'total-services', 'Total Services'),
(867, 'user', 'Last Appointment', 'last-appointment', 'Last Appointment'),
(868, 'user', 'Add Breaks', 'add-breaks', 'Add Breaks'),
(869, 'user', 'This phone number will used for as username', 'phone-as-username', 'This phone number will used for as username'),
(870, 'user', 'Search', 'search', 'Search'),
(871, 'user', 'Search Value', 'search-value', 'Search Value'),
(872, 'user', ' Twillo SMS Settings', 'twillo-sms-settings', ' Twillo SMS Settings'),
(873, 'user', 'Cancel', 'cancel', 'Cancel'),
(874, 'user', 'Phone already exist', 'phone-exist', 'Phone already exist'),
(875, 'user', 'Persons', 'persons', 'Persons'),
(876, 'user', 'Bringing anyone with you?', 'bringing-anyone-with-you', 'Bringing anyone with you?'),
(877, 'user', 'Additional Persons:', 'additional-persons', 'Additional Persons:'),
(878, 'user', 'General Settings', 'general-settings', 'General Settings'),
(879, 'user', 'Enable Group Booking', 'enable-group-booking', 'Enable Group Booking'),
(880, 'user', 'Enable to allow group booking for your customers', 'enable-group-title', 'Enable to allow group booking for your customers'),
(881, 'user', 'Maximum allowed additional persons', 'max-allowed-persons', 'Maximum allowed additional persons'),
(882, 'user', 'Group Booking', 'group-booking', 'Group Booking'),
(883, 'user', 'Payments', 'payments', 'Payments'),
(884, 'user', 'just now', 'just-now', 'just now'),
(885, 'user', 'one minute ago', 'one-minute-ago', 'one minute ago'),
(886, 'user', 'minutes ago', 'minutes-ago', 'minutes ago'),
(887, 'user', 'an hour ago', 'an-hour-ago', 'an hour ago'),
(888, 'user', 'hours ago', 'hours-ago', 'hours ago'),
(889, 'user', 'yesterday', 'yesterday', 'yesterday'),
(890, 'user', 'days ago', 'days-ago', 'days ago'),
(891, 'user', 'weeks ago', 'weeks-ago', 'weeks ago'),
(892, 'user', 'a month ago', 'a-month-ago', 'a month ago'),
(893, 'user', 'months ago', 'months-ago', 'months ago'),
(894, 'user', 'one year ago', 'one-year-ago', 'one year ago'),
(895, 'user', 'years ago', 'years-ago', 'years ago'),
(896, 'user', 'Jan', 'jan', 'Jan'),
(897, 'user', 'Feb', 'feb', 'Feb'),
(898, 'user', 'Mar', 'mar', 'Mar'),
(899, 'user', 'Apr', 'apr', 'Apr'),
(900, 'user', 'Jun', 'jun', 'Jun'),
(901, 'user', 'Jul', 'jul', 'Jul'),
(902, 'user', 'Aug', 'aug', 'Aug'),
(903, 'user', 'Sep', 'sep', 'Sep'),
(904, 'user', 'Oct', 'oct', 'Oct'),
(905, 'user', 'Nov', 'nov', 'Nov'),
(906, 'user', 'Dec', 'dec', 'Dec'),
(907, 'user', 'Facebook', 'facebook', 'Facebook'),
(908, 'user', 'Twitter', 'twitter', 'Twitter'),
(909, 'user', 'Instagram', 'instagram', 'Instagram'),
(910, 'user', 'WhatsApp', 'whatsapp', 'WhatsApp'),
(911, 'user', 'LinkedIn', 'linkedin', 'LinkedIn'),
(912, 'user', 'Google Analytics', 'google-analytics', 'Google Analytics'),
(913, 'user', 'reCaptcha', 'recaptcha', 'reCaptcha'),
(914, 'user', 'Total Persons', 'total-persons', 'Total Persons'),
(915, 'user', 'Apply service duration to generate booking time slots', 'generate-booking-time-slots', 'Apply service duration to generate booking time slots'),
(916, 'user', 'Apply fixed duration to generate booking time slots', 'fixed-booking-time-slots', 'Apply fixed duration to generate booking time slots'),
(917, 'user', 'Enable Online Payments', 'enable-online-payment', 'Enable Online Payments'),
(918, 'user', 'Enable to active only payment methods to receive booking payments', 'enable-online-title', 'Enable to active online payment methods to receive booking payments'),
(919, 'user', 'Enable offline payment', 'enable-offline-payment', 'Enable offline payment'),
(920, 'user', 'Enable to active onsite payment option', 'enable-offline-title', 'Enable to active onsite payment option');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `service_id` varchar(155) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `monthly_price` decimal(10,2) DEFAULT NULL,
  `bill_type` varchar(255) DEFAULT NULL,
  `is_special` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `slug`, `price`, `monthly_price`, `bill_type`, `is_special`, `status`) VALUES
(1, 'Free', 'basic', '0.00', '0.00', 'year', 0, 1),
(2, 'Standard', 'standared', '35.99', '19.50', 'year', 1, 2),
(3, 'Premium', 'premium', '999.00', '150.00', 'year', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `status`, `created_at`) VALUES
(1, 'Terms and Conditions', 'terms-of-service', 'Terms and Conditions', NULL, '0000-00-00 00:00:00'),
(2, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', 1, '2021-07-06 22:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `puid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` varchar(255) DEFAULT NULL,
  `billing_type` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `expire_on` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `proof` text DEFAULT NULL,
  `tax` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `puid`, `user_id`, `package_id`, `billing_type`, `amount`, `status`, `created_at`, `expire_on`, `payment_method`, `proof`, `tax`) VALUES
(1, '32975', 2, '1', 'monthly', '0.00', 'expired', '2022-05-21', '2022-06-21', NULL, NULL, '0'),
(2, '02465', 2, '1', 'monthly', '0.00', 'verified', '2022-05-21', '2022-06-21', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment_user`
--

CREATE TABLE `payment_user` (
  `id` int(11) NOT NULL,
  `puid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `orders` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`id`, `name`, `details`, `image`, `thumb`, `orders`) VALUES
(1, 'Create your own booking page that is branding your business', 'Customise and branding your business to share your booking page with a smart URL which will help you to run your business a smart way.', 'uploads/medium/copywriting-social-media-post-content-marketing-internet-commercial-cartoon-character-writing-text-advertising-promotional-strategy-concept-illustration_335657-2066_medium-600x600.jpg', 'uploads/thumbnail/copywriting-social-media-post-content-marketing-internet-commercial-cartoon-character-writing-text-advertising-promotional-strategy-concept-illustration_335657-2066_thumb-150x150.jpg', 1),
(2, 'Accept bookings from anywhere anytime', 'There are no boundary for your business, Share your booking page URL using any social platform email or others to  booking your services from anywhere in the world.', 'uploads/medium/scheduling-forming-filling-timetable-digital-calendar-time-management-arranging-controlling-optimizing-effective-plans-organization-vector-isolated-concept-metaphor-illustration_335657-2748_medium-600x600.jpg', 'uploads/thumbnail/scheduling-forming-filling-timetable-digital-calendar-time-management-arranging-controlling-optimizing-effective-plans-organization-vector-isolated-concept-metaphor-illustration_335657-2748_thumb-150x150.jpg', 2),
(3, 'Accept Online / Offline Payments from your Customers', 'Easily process your payments online in a secure manner, Select from Payment Processors like PayPal, Stripe and offline. ', 'uploads/medium/finances-management-budget-assessment-financial-literacy-accounting-idea-financier-with-cash-economist-holding-golden-coin-cartoon-character_335657-3538_medium-600x600.jpg', 'uploads/thumbnail/finances-management-budget-assessment-financial-literacy-accounting-idea-financier-with-cash-economist-holding-golden-coin-cartoon-character_335657-3538_thumb-150x150.jpg', 4),
(4, 'Connect with your customers all around the world using zoom meeting', 'Integrate with Zoom, So you can easily manage your Virtual Meetings and Classes right from Aoxio. ', 'uploads/medium/online-meetup-abstract-concept-vector-illustration-conference-call-join-meetup-group-video-call-online-service-distance-communication-informal-meeting-members-networking-abstract-metaphor_335657-2920_medium-600x600.jpg', 'uploads/thumbnail/online-meetup-abstract-concept-vector-illustration-conference-call-join-meetup-group-video-call-online-service-distance-communication-informal-meeting-members-networking-abstract-metaphor_335657-2920_thumb-150x150.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` longtext DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `duration_type` varchar(255) DEFAULT 'minute',
  `price` decimal(10,2) DEFAULT NULL,
  `staffs` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `orders` int(11) DEFAULT 0,
  `zoom_link` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `hero_img` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `footer_about` text DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `pagination_limit` int(11) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `google_analytics` longtext DEFAULT NULL,
  `site_color` varchar(255) DEFAULT NULL,
  `site_font` varchar(255) DEFAULT NULL,
  `layout` int(11) DEFAULT NULL,
  `about_info` mediumtext DEFAULT NULL,
  `ind_code` varchar(255) DEFAULT NULL,
  `purchase_code` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `enable_captcha` int(11) NOT NULL DEFAULT 0,
  `enable_workflow` int(11) NOT NULL DEFAULT 1,
  `enable_feature` int(11) NOT NULL,
  `enable_users` int(11) NOT NULL DEFAULT 1,
  `enable_blog` int(11) NOT NULL,
  `enable_faq` int(11) NOT NULL,
  `enable_registration` int(11) NOT NULL,
  `enable_payment` int(11) NOT NULL,
  `enable_paypal` int(11) NOT NULL DEFAULT 0,
  `enable_email_verify` int(11) NOT NULL,
  `enable_multilingual` int(11) DEFAULT 0,
  `enable_frontend` varchar(155) DEFAULT '1',
  `captcha_type` int(11) DEFAULT NULL,
  `captcha_site_key` varchar(255) DEFAULT NULL,
  `captcha_secret_key` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `paypal_payment` int(11) DEFAULT 0,
  `stripe_payment` int(11) DEFAULT 0,
  `publish_key` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `razorpay_payment` varchar(155) DEFAULT '0',
  `razorpay_key_id` varchar(255) DEFAULT NULL,
  `razorpay_key_secret` varchar(255) DEFAULT NULL,
  `paypal_mode` varchar(255) DEFAULT 'sandbox',
  `twillo_account_sid` varchar(255) DEFAULT NULL,
  `twillo_auth_token` varchar(255) DEFAULT NULL,
  `twillo_number` varchar(255) DEFAULT NULL,
  `enable_sms` varchar(255) NOT NULL DEFAULT '0',
  `enable_offline_payment` varchar(255) DEFAULT '0',
  `offline_details` text DEFAULT NULL,
  `mail_protocol` varchar(255) DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT 'ssl',
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `chart_style` varchar(255) NOT NULL DEFAULT 'style1',
  `num_format` varchar(155) DEFAULT '0',
  `curr_locate` varchar(155) DEFAULT '0',
  `country` int(11) NOT NULL DEFAULT 178,
  `site_info` int(11) DEFAULT NULL,
  `lang` int(11) NOT NULL DEFAULT 1,
  `trial_days` varchar(155) DEFAULT '0',
  `tax_name` varchar(255) DEFAULT NULL,
  `tax_value` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'live',
  `version` varchar(255) NOT NULL DEFAULT 'v1.1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `favicon`, `logo`, `hero_img`, `keywords`, `description`, `footer_about`, `admin_email`, `mobile`, `copyright`, `pagination_limit`, `facebook`, `instagram`, `twitter`, `linkedin`, `google_analytics`, `site_color`, `site_font`, `layout`, `about_info`, `ind_code`, `purchase_code`, `link`, `enable_captcha`, `enable_workflow`, `enable_feature`, `enable_users`, `enable_blog`, `enable_faq`, `enable_registration`, `enable_payment`, `enable_paypal`, `enable_email_verify`, `enable_multilingual`, `enable_frontend`, `captcha_type`, `captcha_site_key`, `captcha_secret_key`, `paypal_email`, `paypal_payment`, `stripe_payment`, `publish_key`, `secret_key`, `razorpay_payment`, `razorpay_key_id`, `razorpay_key_secret`, `paypal_mode`, `twillo_account_sid`, `twillo_auth_token`, `twillo_number`, `enable_sms`, `enable_offline_payment`, `offline_details`, `mail_protocol`, `mail_title`, `mail_host`, `mail_port`, `mail_encryption`, `mail_username`, `mail_password`, `chart_style`, `num_format`, `curr_locate`, `country`, `site_info`, `lang`, `trial_days`, `tax_name`, `tax_value`, `type`, `version`) VALUES
(1, 'appointment pro', 'SaaS Multi-Business Service Booking Software', 'uploads/thumbnail/338dbf6230986ff9e8452a89dba48edb_thumb-128x128.png', 'uploads/medium/8754c6413a66ad54f0459438c88214e3_medium-1000x288.png', 'uploads/medium/imgonline-com-ua-ReplaceColor-0vOUYjkYa25X_big-626x626_medium-626x626.jpg', 'saas,appointment,booking,services', 'Simplifies appointment booking, helping you to manage business  in a smart way.', 'it is a complete SaaS based multi business service booking software, that gives your users the ability to create and manage bookings, staffs, services, customers, etc.', 'admin@admin.com', '', '© 2022 All rights reserved.', 0, 'facebook', 'instagram', 'twitter', 'linkedin', '', '#ddd', 'Alata', 0, 'SW52YWxpZCBMaWNlbnNlIEtleQ==', 'NulledBY-Null-Jung-le9c-nulljungle.com34', 'NulledBY-Null-Jung-le9c-nulljungle.c', 'aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS9hamF4L2xpYnMv', 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, '1', NULL, '6LePpnMbAAAAAF9M3gPZehvReqSKSDzNjwKR2rMg', '6LePpnMbAAAAAJv2VCnkvvF5LTSBWj9BQypWUwRt', 'yourpaypal@gmail.com', 1, 1, 'pk_test_miL3pzy2WRveqVtkSvnAiyEk00TbcdiWmW', 'sk_test_zHkX8tpxqezUjxwKKrOENoKH00i4EnkxdN', '0', 'rzp_test_B61V9Rq0gGmYwP', 'fgbB9V1n0aQ68krnSDUY0JXB', 'live', 'ACe18ba19ed1df9246688a74d6bab688ae', '37d2c4648e2d7ab2dc50d294e22313f7', '+14437207526', '0', '0', '<p style=\"line-height: 1;\">Enter your bank info to receive offline payments</p>', 'mail', '', '', '', 'ssl', 'codericks@mail.com', 'MTIzNDU2Nzg=', 'areaspline', '0', '1', 178, 2, 1, '1000000000000000', 'Subscription Tax', '0', 'live', '1.2');

-- --------------------------------------------------------

--
-- Table structure for table `site_contacts`
--

CREATE TABLE `site_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `service_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'staff',
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `account_type` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT 'registered',
  `trial_expire` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified` int(11) DEFAULT 0,
  `verify_code` varchar(255) DEFAULT NULL,
  `phone_verified` varchar(255) NOT NULL DEFAULT '0',
  `sms_count` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `paypal_payment` int(11) DEFAULT 1,
  `stripe_payment` int(11) DEFAULT 1,
  `paypal_email` varchar(255) DEFAULT NULL,
  `publish_key` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `razorpay_payment` varchar(155) DEFAULT '0',
  `razorpay_key_id` varchar(255) DEFAULT NULL,
  `razorpay_key_secret` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `country` int(11) DEFAULT NULL,
  `currency` varchar(255) DEFAULT 'USD',
  `paypal_mode` varchar(255) DEFAULT 'live',
  `about_me` varchar(5000) DEFAULT NULL,
  `available_days` varchar(255) DEFAULT NULL,
  `google_analytics` text DEFAULT NULL,
  `enable_appointment` int(11) DEFAULT 1,
  `enable_rating` int(11) DEFAULT 1,
  `twillo_account_sid` varchar(255) DEFAULT NULL,
  `twillo_auth_token` varchar(255) DEFAULT NULL,
  `twillo_number` varchar(255) DEFAULT NULL,
  `enable_sms_notify` varchar(255) DEFAULT '0',
  `enable_sms_alert` varchar(255) DEFAULT '0',
  `date_format` varchar(255) DEFAULT 'd M Y',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `slug`, `email`, `user_name`, `password`, `role`, `account_type`, `user_type`, `trial_expire`, `phone`, `address`, `email_verified`, `verify_code`, `phone_verified`, `sms_count`, `image`, `thumb`, `paypal_payment`, `stripe_payment`, `paypal_email`, `publish_key`, `secret_key`, `razorpay_payment`, `razorpay_key_id`, `razorpay_key_secret`, `status`, `country`, `currency`, `paypal_mode`, `about_me`, `available_days`, `google_analytics`, `enable_appointment`, `enable_rating`, `twillo_account_sid`, `twillo_auth_token`, `twillo_number`, `enable_sms_notify`, `enable_sms_alert`, `date_format`, `created_at`) VALUES
(1, 0, NULL, 'admin', 'admin@admin.com', 'admin', '$2y$10$LzJWLpVR.MIagVr4VJgBReVoXCXNkBxKUQW7jVTT6asmNSJ0Td6SK', 'admin', NULL, 'registered', '2022-05-21', NULL, NULL, 1, NULL, '0', '0', NULL, NULL, 1, 1, NULL, NULL, NULL, '0', NULL, NULL, 1, NULL, 'USD', 'live', NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '0', '0', 'd M Y', '2022-05-21 10:18:03'),
(2, 0, 'user1', 'user1', 'user1@gmail.com', 'user1', '$2y$10$4HSPsR0jsTnTbBIfGE4eeus3KVoFxz9gs/6hKIO/GaW.xeYNAyJa.', 'user', NULL, 'registered', '2022-05-21', '+11234567890', NULL, 0, '8746', '0', '0', NULL, 'assets/images/no-photo-sm.png', 0, 0, NULL, NULL, NULL, '0', NULL, NULL, 1, NULL, 'USD', 'live', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '0', '0', 'd M Y', '2022-05-21 16:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `working_time`
--

CREATE TABLE `working_time` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_apply`
--
ALTER TABLE `coupons_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dialing_codes`
--
ALTER TABLE `dialing_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_assaign`
--
ALTER TABLE `feature_assaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_values`
--
ALTER TABLE `lang_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_user`
--
ALTER TABLE `payment_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_contacts`
--
ALTER TABLE `site_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_time`
--
ALTER TABLE `working_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons_apply`
--
ALTER TABLE `coupons_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dialing_codes`
--
ALTER TABLE `dialing_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feature_assaign`
--
ALTER TABLE `feature_assaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lang_values`
--
ALTER TABLE `lang_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=921;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_user`
--
ALTER TABLE `payment_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_contacts`
--
ALTER TABLE `site_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `working_days`
--
ALTER TABLE `working_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_time`
--
ALTER TABLE `working_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
