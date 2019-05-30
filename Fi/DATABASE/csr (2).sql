-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 12:22 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cin`
--

CREATE TABLE `cin` (
  `CIN` varchar(25) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cin`
--

INSERT INTO `cin` (`CIN`, `Date`) VALUES
('U01224KA1991PTC012218', '2019-03-02 17:57:42'),
('U01224KA1995PTC018567', '2019-03-02 17:57:42'),
('U01224KA2012PTC062627', '2019-03-02 17:57:42'),
('U01225KA1941PTC000282', '2019-03-02 17:57:42'),
('U01225KA1983PTC005538', '2019-03-02 17:57:43'),
('U01225KA1990PTC010808', '2019-03-02 17:57:43'),
('U01225KA1992PTC013127', '2019-03-02 17:57:43'),
('U01225KA1997PTC022938', '2019-03-02 17:57:43'),
('U01229KA1920PLC000081', '2019-03-02 17:57:43'),
('U01229KA1988PTC009634', '2019-03-02 17:57:43'),
('U01229KA1989PTC010624', '2019-03-02 17:57:43'),
('U01229KA1991PLC011819', '2019-03-02 17:57:43'),
('U01229KA1993PTC014312', '2019-03-02 17:57:43'),
('U01229KA1995PLC018298', '2019-03-02 17:57:43'),
('U01229KA1996PTC020615', '2019-03-02 17:57:43'),
('U01229KA1997PTC022289', '2019-03-02 17:57:43'),
('U01229KA1997PTC023026', '2019-03-02 17:57:43'),
('U01229KA2000PTC027586', '2019-03-02 17:57:43'),
('U01229KA2002PTC030542', '2019-03-02 17:57:43'),
('U01229KA2004PTC033625', '2019-03-02 17:57:43'),
('U01229KA2008PTC048397', '2019-03-02 17:57:43'),
('U01229KA2012PTC062552', '2019-03-02 17:57:43'),
('U01300KA1919PLC000077', '2019-03-02 17:57:43'),
('U01300KA1981PLC004370', '2019-03-02 17:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Detail` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CommentStatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentID`, `EventID`, `UserID`, `Detail`, `Date`, `CommentStatus`) VALUES
(4, 2, 1, 'I AL GOING TO DONATE BOOTS AND TEXT BOOKS', '2019-03-01 12:55:14', 1),
(5, 2, 1, 'as', '2019-03-01 03:24:54', 1),
(6, 2, 1, 'jdaj', '2019-03-01 03:24:54', 1),
(14, 1, 1, 'dynamic', '2019-03-01 03:52:28', 1),
(30, 1, 1, 'dddd', '2019-03-01 03:24:54', 1),
(31, 1, 1, 'pppppp', '2019-03-01 03:24:54', 1),
(36, 1, 1, 'asdas', '2019-03-01 03:24:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `ContributionsID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Particular` varchar(60) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`ContributionsID`, `UserID`, `EventID`, `Particular`, `Qty`, `Amount`, `DateTime`) VALUES
(1, 2, 2, 'This us', 11, 0, '2019-03-02 22:58:28'),
(2, 8, 21, 'Helping Staff', 12, 0, '2019-03-02 22:59:57'),
(5, 8, 21, 'Cash', 0, 0, '2019-03-02 23:04:07'),
(6, 8, 21, 'Text books', 0, 0, '2019-03-02 23:04:07'),
(7, 8, 21, 'Helping Staff', 12, 0, '2019-03-02 23:06:09'),
(8, 8, 21, 'Cash', 0, 0, '2019-03-02 23:06:09'),
(9, 8, 21, 'Text books', 0, 0, '2019-03-02 23:09:31'),
(10, 8, 21, 'Helping Staff', 0, 0, '2019-03-02 23:09:31'),
(11, 8, 21, 'Cash', 0, 0, '2019-03-02 23:10:55'),
(12, 8, 21, 'Text books', 0, 0, '2019-03-02 23:10:55'),
(13, 8, 21, 'Helping Staff', 0, 0, '2019-03-02 23:12:02'),
(14, 8, 21, 'Cash', 0, 0, '2019-03-02 23:12:02'),
(15, 8, 21, 'Text books', 0, 0, '2019-03-02 23:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(11) NOT NULL,
  `EventName` text NOT NULL,
  `ProjectTypeID` int(11) NOT NULL DEFAULT '0',
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `UserID` int(11) NOT NULL DEFAULT '0',
  `NGOID` int(11) NOT NULL DEFAULT '0',
  `EventLatitude` decimal(10,6) DEFAULT '0.000000',
  `EventLogitude` decimal(10,6) DEFAULT '0.000000',
  `PinCode` varchar(8) DEFAULT NULL,
  `StateID` int(11) DEFAULT '0',
  `DistrictID` int(11) NOT NULL DEFAULT '0',
  `EventArea` text,
  `EventDetails` text,
  `AmtOutlay` int(11) NOT NULL DEFAULT '0',
  `AmtSpent` int(11) NOT NULL DEFAULT '0',
  `ModeImplementID` int(11) NOT NULL DEFAULT '0',
  `SectorID` int(11) NOT NULL DEFAULT '0',
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JoinUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `EventName`, `ProjectTypeID`, `FromDate`, `ToDate`, `UserID`, `NGOID`, `EventLatitude`, `EventLogitude`, `PinCode`, `StateID`, `DistrictID`, `EventArea`, `EventDetails`, `AmtOutlay`, `AmtSpent`, `ModeImplementID`, `SectorID`, `DateTime`, `JoinUser`) VALUES
(1, 'Cultural acknowledgement', 2, '2019-02-12', '2019-02-20', 1, 0, '0.000000', '0.000000', '586101', 17, 108, 'Near Bustand', 'This event Corporate social responsibility is a broad concept that can take many forms depending on the company and industry. Through CSR programs, philanthropy, and volunteer efforts, businesses can benefit society while boosting their own brands. As important as CSR is for the community, it is equally valuable for a company. CSR activities can help forge a stronger bond between employee and corporation; they can boost morale and can help both employees and employers feel more connected with the world around them.\r\n\r\n', 20000, 1313, 1, 8, '2019-03-02 11:45:55', 10),
(2, 'Empowerment', 6, '2019-03-02', '2019-04-23', 1, 0, '0.000000', '0.000000', '856101', 2, 8, 'Near Iqra school', 'Long before its initial public offering (IPO) in 1992, Starbucks was known for its keen sense of corporate social responsibility, and commitment to sustainability and community welfare. Starbucks has achieved CSR milestones such as reaching 99 percent ethically sourced coffee; creating a global network of farmers; pioneering green building throughout its stores; contributing millions of hours of community service; and creating a groundbreaking college program for its partner/employees. Going forward, Starbucks’ goals include hiring 10,000 refugees across 75 countries; reducing the environmental impact of its cups; and engaging its employees in environmental leadership.', 30000, 3120, 3, 7, '2019-03-02 21:24:45', 11),
(3, 'Education', 1, '2019-03-04', '2019-03-15', 6, 0, '0.000000', '0.000000', '856111', 14, 9, 'Udyambag', 'Responsibility. Unlike other ISO standards, ISO 26000 provides guidance rather than requirements because the nature of CSR is more qualitative than quantitative, and its standards cannot be certified. Instead, ISO 26000 clarifies what social responsibility is and helps organizations translate CSR principles into effective actions. The standard is aimed at all types of organizations regardless of their activity, size, or location. And, because many key stakeholders from around the world contributed to developing ISO 26000, this standard represents an international consensus.', 12312, 123, 1, 7, '2019-03-02 21:24:04', 3),
(20, 'Health awareness', 2, '2019-03-18', '2019-03-23', 5, 0, '0.000000', '0.000000', '590008', 17, 247, 'Lahaore', 'The SEC highlighted the importance of understanding how social and environmental issues impact a companyâ€™s valuation through legislation that requires publicly listed companies to disclosure to the SEC both their due diligence to identify conflict minerals in products they manufacture and also that publicly listed companies must report on their climate change risks.', 50000, 10000, 2, 2, '2019-03-02 18:56:16', 0),
(21, 'Workshop', 1, '2019-03-03', '2019-03-05', 5, 0, '0.000000', '0.000000', '123456', 17, 247, 'udyabmbag', 'A workshop is a period of discussion or practical work on a particular subject in which a group of people share their knowledge or experience.', 20000, 10000, 2, 7, '2019-03-02 21:35:07', 0),
(22, 'Physical education', 2, '2019-03-03', '2019-03-07', 5, 0, '0.000000', '0.000000', '586103', 17, 250, 'ashram', 'supporting students to enhance there hea;th', 40000, 12000, 1, 7, '2019-03-02 21:40:57', 0),
(23, 'Plantation', 2, '2019-03-10', '2019-03-14', 5, 0, '0.000000', '0.000000', '143143', 17, 250, 'tera ghar', 'Some of the problems with plantations come from the fact that they are monocultures, that is there is only one kind of crop that is grown there. This makes them vulnerable to pests, for example. Among the earliest examples of', 40000, 18000, 1, 2, '2019-03-02 22:30:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `joins`
--

CREATE TABLE `joins` (
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joins`
--

INSERT INTO `joins` (`UserID`, `EventID`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `moi`
--

CREATE TABLE `moi` (
  `ID` int(10) NOT NULL DEFAULT '0',
  `ModeName` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moi`
--

INSERT INTO `moi` (`ID`, `ModeName`, `Time`) VALUES
(1, 'self', '2019-02-26 14:45:22'),
(2, 'other implementing Agencies', '2019-02-26 14:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `mst_districts`
--

CREATE TABLE `mst_districts` (
  `DistrictID` int(11) NOT NULL,
  `StateID` int(11) DEFAULT '0',
  `DistrictName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_districts`
--

INSERT INTO `mst_districts` (`DistrictID`, `StateID`, `DistrictName`) VALUES
(1, 1, 'NORTH ANDAMAN'),
(2, 1, 'SOUTH ANDAMAN'),
(3, 1, 'NICOBAR'),
(4, 2, 'ADILABAD'),
(5, 2, 'ANANTAPUR'),
(6, 2, 'CHITTOOR'),
(7, 2, 'EAST GODAVARI'),
(8, 2, 'GUNTUR'),
(9, 2, 'HYDERABAD'),
(10, 2, 'KARIMNAGAR'),
(11, 2, 'KHAMMAM'),
(12, 2, 'KRISHNA'),
(13, 2, 'KURNOOL'),
(14, 2, 'MAHBUBNAGAR'),
(15, 2, 'MEDAK'),
(16, 2, 'NALGONDA'),
(17, 2, 'NIZAMABAD'),
(18, 2, 'PRAKASAM'),
(19, 2, 'RANGA REDDY'),
(20, 2, 'SRIKAKULAM'),
(21, 2, 'SRI POTTI SRI RAMULU NELLORE'),
(22, 2, 'VISHAKHAPATNAM'),
(23, 2, 'VIZIANAGARAM'),
(24, 2, 'WARANGAL'),
(25, 2, 'WEST GODAVARI'),
(26, 2, 'CUDAPPAH'),
(27, 3, 'ANJAW'),
(28, 3, 'CHANGLANG'),
(29, 3, 'EAST SIANG'),
(30, 3, 'EAST KAMENG'),
(31, 3, 'KURUNG KUMEY'),
(32, 3, 'LOHIT'),
(33, 3, 'LOWER DIBANG VALLEY'),
(34, 3, 'LOWER SUBANSIRI'),
(35, 3, 'PAPUM PARE'),
(36, 3, 'TAWANG'),
(37, 3, 'TIRAP'),
(38, 3, 'DIBANG VALLEY'),
(39, 3, 'UPPER SIANG'),
(40, 3, 'UPPER SUBANSIRI'),
(41, 3, 'WEST KAMENG'),
(42, 3, 'WEST SIANG'),
(43, 4, 'BAKSA'),
(44, 4, 'BARPETA'),
(45, 4, 'BONGAIGAON'),
(46, 4, 'CACHAR'),
(47, 4, 'CHIRANG'),
(48, 4, 'DARRANG'),
(49, 4, 'DHEMAJI'),
(50, 4, 'DIMA HASAO'),
(51, 4, 'DHUBRI'),
(52, 4, 'DIBRUGARH'),
(53, 4, 'GOALPARA'),
(54, 4, 'GOLAGHAT'),
(55, 4, 'HAILAKANDI'),
(56, 4, 'JORHAT'),
(57, 4, 'KAMRUP'),
(58, 4, 'KAMRUP METROPOLITAN'),
(59, 4, 'KARBI ANGLONG'),
(60, 4, 'KARIMGANJ'),
(61, 4, 'KOKRAJHAR'),
(62, 4, 'LAKHIMPUR'),
(63, 4, 'MORIGAON'),
(64, 4, 'NAGAON'),
(65, 4, 'NALBARI'),
(66, 4, 'SIVASAGAR'),
(67, 4, 'SONITPUR'),
(68, 4, 'TINSUKIA'),
(69, 4, 'UDALGURI'),
(70, 5, 'ARARIA'),
(71, 5, 'ARWAL'),
(72, 5, 'AURANGABAD'),
(73, 5, 'BANKA'),
(74, 5, 'BEGUSARAI'),
(75, 5, 'BHAGALPUR'),
(76, 5, 'BHOJPUR'),
(77, 5, 'BUXAR'),
(78, 5, 'DARBHANGA'),
(79, 5, 'EAST CHAMPARAN'),
(80, 5, 'GAYA'),
(81, 5, 'GOPALGANJ'),
(82, 5, 'JAMUI'),
(83, 5, 'JEHANABAD'),
(84, 5, 'KAIMUR'),
(85, 5, 'KATIHAR'),
(86, 5, 'KHAGARIA'),
(87, 5, 'KISHANGANJ'),
(88, 5, 'LAKHISARAI'),
(89, 5, 'MADHEPURA'),
(90, 5, 'MADHUBANI'),
(91, 5, 'MUNGER'),
(92, 5, 'MUZAFFARPUR'),
(93, 5, 'NALANDA'),
(94, 5, 'NAWADA'),
(95, 5, 'PATNA'),
(96, 5, 'PURNIA'),
(97, 5, 'ROHTAS'),
(98, 5, 'SAHARSA'),
(99, 5, 'SAMASTIPUR'),
(100, 5, 'SARAN'),
(101, 5, 'SHEIKHPURA'),
(102, 5, 'SHEOHAR'),
(103, 5, 'SITAMARHI'),
(104, 5, 'SIWAN'),
(105, 5, 'SUPAUL'),
(106, 6, 'CHANDIGARH'),
(107, 7, 'BASTAR'),
(108, 7, 'BIJAPUR'),
(109, 7, 'BILASPUR'),
(110, 7, 'DANTEWADA'),
(111, 7, 'DHAMTARI'),
(112, 7, 'DURG'),
(113, 7, 'JASHPUR'),
(114, 7, 'JANJGIR-CHAMPA'),
(115, 7, 'KORBA'),
(116, 7, 'KORIYA'),
(117, 7, 'KANKER'),
(118, 7, 'KABIRDHAM (FORMERLY KAWARDHA)'),
(119, 7, 'MAHASAMUND'),
(120, 7, 'NARAYANPUR'),
(121, 7, 'RAIGARH'),
(122, 7, 'RAJNANDGAON'),
(123, 7, 'RAIPUR'),
(124, 7, 'SURGUJA'),
(125, 8, 'DADRA AND NAGAR HAVELI'),
(126, 9, 'DAMAN'),
(127, 9, 'DIU'),
(128, 10, 'CENTRAL DELHI'),
(129, 10, 'EAST DELHI'),
(130, 10, 'NEW DELHI'),
(131, 10, 'NORTH DELHI'),
(132, 10, 'NORTH EAST DELHI'),
(133, 10, 'NORTH WEST DELHI'),
(134, 10, 'SOUTH DELHI'),
(135, 10, 'SOUTH WEST DELHI'),
(136, 10, 'WEST DELHI'),
(137, 11, 'NORTH GOA'),
(138, 11, 'SOUTH GOA'),
(139, 12, 'AHMEDABAD'),
(140, 12, 'AMRELI DISTRICT'),
(141, 12, 'ANAND'),
(142, 12, 'BANASKANTHA'),
(143, 12, 'BHARUCH'),
(144, 12, 'BHAVNAGAR'),
(145, 12, 'DAHOD'),
(146, 12, 'THE DANGS'),
(147, 12, 'GANDHINAGAR'),
(148, 12, 'JAMNAGAR'),
(149, 12, 'JUNAGADH'),
(150, 12, 'KUTCH'),
(151, 12, 'KHEDA'),
(152, 12, 'MEHSANA'),
(153, 12, 'NARMADA'),
(154, 12, 'NAVSARI'),
(155, 12, 'PATAN'),
(156, 12, 'PANCHMAHAL'),
(157, 12, 'PORBANDAR'),
(158, 12, 'RAJKOT'),
(159, 12, 'SABARKANTHA'),
(160, 12, 'SURENDRANAGAR'),
(161, 12, 'SURAT'),
(162, 12, 'TAPI'),
(163, 12, 'VADODARA'),
(164, 12, 'VALSAD'),
(165, 13, 'AMBALA'),
(166, 13, 'BHIWANI'),
(167, 13, 'FARIDABAD'),
(168, 13, 'FATEHABAD'),
(169, 13, 'GURGAON'),
(170, 13, 'HISSAR'),
(171, 13, 'JHAJJAR'),
(172, 13, 'JIND'),
(173, 13, 'KARNAL'),
(174, 13, 'KAITHAL'),
(175, 13, 'KURUKSHETRA'),
(176, 13, 'MAHENDRAGARH'),
(177, 13, 'MEWAT'),
(178, 13, 'PALWAL'),
(179, 13, 'PANCHKULA'),
(180, 13, 'PANIPAT'),
(181, 13, 'REWARI'),
(182, 13, 'ROHTAK'),
(183, 13, 'SIRSA'),
(184, 13, 'SONIPAT'),
(185, 13, 'YAMUNA NAGAR'),
(186, 14, 'BILASPUR'),
(187, 14, 'CHAMBA'),
(188, 14, 'HAMIRPUR'),
(189, 14, 'KANGRA'),
(190, 14, 'KINNAUR'),
(191, 14, 'KULLU'),
(192, 14, 'LAHAUL AND SPITI'),
(193, 14, 'MANDI'),
(194, 14, 'SHIMLA'),
(195, 14, 'SIRMAUR'),
(196, 14, 'SOLAN'),
(197, 14, 'UNA'),
(198, 15, 'ANANTNAG'),
(199, 15, 'BADGAM'),
(200, 15, 'BANDIPORA'),
(201, 15, 'BARAMULLA'),
(202, 15, 'DODA'),
(203, 15, 'GANDERBAL'),
(204, 15, 'JAMMU'),
(205, 15, 'KARGIL'),
(206, 15, 'KATHUA'),
(207, 15, 'KISHTWAR'),
(208, 15, 'KUPWARA'),
(209, 15, 'KULGAM'),
(210, 15, 'LEH'),
(211, 15, 'POONCH'),
(212, 15, 'PULWAMA'),
(213, 15, 'RAJOURI'),
(214, 15, 'RAMBAN'),
(215, 15, 'REASI'),
(216, 15, 'SAMBA'),
(217, 15, 'SHOPIAN'),
(218, 15, 'SRINAGAR'),
(219, 15, 'UDHAMPUR'),
(220, 16, 'BOKARO'),
(221, 16, 'CHATRA'),
(222, 16, 'DEOGHAR'),
(223, 16, 'DHANBAD'),
(224, 16, 'DUMKA'),
(225, 16, 'EAST SINGHBHUM'),
(226, 16, 'GARHWA'),
(227, 16, 'GIRIDIH'),
(228, 16, 'GODDA'),
(229, 16, 'GUMLA'),
(230, 16, 'HAZARIBAG'),
(231, 16, 'JAMTARA'),
(232, 16, 'KHUNTI'),
(233, 16, 'KODERMA'),
(234, 16, 'LATEHAR'),
(235, 16, 'LOHARDAGA'),
(236, 16, 'PAKUR'),
(237, 16, 'PALAMU'),
(238, 16, 'RAMGARH'),
(239, 16, 'RANCHI'),
(240, 16, 'SAHIBGANJ'),
(241, 16, 'SERAIKELA KHARSAWAN'),
(242, 16, 'SIMDEGA'),
(243, 16, 'WEST SINGHBHUM'),
(244, 17, 'BAGALKOT'),
(245, 17, 'BANGALORE RURAL'),
(246, 17, 'BANGALORE URBAN'),
(247, 17, 'BELGAUM'),
(248, 17, 'BELLARY'),
(249, 17, 'BIDAR'),
(250, 17, 'BIJAPUR'),
(251, 17, 'CHAMARAJNAGAR'),
(252, 17, 'CHIKKAMAGALURU'),
(253, 17, 'CHIKKABALLAPUR'),
(254, 17, 'CHITRADURGA'),
(255, 17, 'DAVANAGERE'),
(256, 17, 'DHARWAD'),
(257, 17, 'DAKSHINA KANNADA'),
(258, 17, 'GADAG'),
(259, 17, 'GULBARGA'),
(260, 17, 'HASSAN'),
(261, 17, 'HAVERI DISTRICT'),
(262, 17, 'KODAGU'),
(263, 17, 'KOLAR'),
(264, 17, 'KOPPAL'),
(265, 17, 'MANDYA'),
(266, 17, 'MYSORE'),
(267, 17, 'RAICHUR'),
(268, 17, 'SHIMOGA'),
(269, 17, 'TUMKUR'),
(270, 17, 'UDUPI'),
(271, 17, 'UTTARA KANNADA'),
(272, 17, 'RAMANAGARA'),
(273, 17, 'YADGIR'),
(274, 18, 'ALAPPUZHA'),
(275, 18, 'ERNAKULAM'),
(276, 18, 'IDUKKI'),
(277, 18, 'KANNUR'),
(278, 18, 'KASARAGOD'),
(279, 18, 'KOLLAM'),
(280, 18, 'KOTTAYAM'),
(281, 18, 'KOZHIKODE'),
(282, 18, 'MALAPPURAM'),
(283, 18, 'PALAKKAD'),
(284, 18, 'PATHANAMTHITTA'),
(285, 18, 'THRISSUR'),
(286, 18, 'THIRUVANANTHAPURAM'),
(287, 18, 'WAYANAD'),
(288, 19, 'LAKSHADWEEP'),
(289, 20, 'AGAR'),
(290, 20, 'ALIRAJPUR'),
(291, 20, 'ANUPPUR'),
(292, 20, 'ASHOK NAGAR'),
(293, 20, 'BALAGHAT'),
(294, 20, 'BARWANI'),
(295, 20, 'BETUL'),
(296, 20, 'BHIND'),
(297, 20, 'BHOPAL'),
(298, 20, 'BURHANPUR'),
(299, 20, 'CHHATARPUR'),
(300, 20, 'CHHINDWARA'),
(301, 20, 'DAMOH'),
(302, 20, 'DATIA'),
(303, 20, 'DEWAS'),
(304, 20, 'DHAR'),
(305, 20, 'DINDORI'),
(306, 20, 'GUNA'),
(307, 20, 'GWALIOR'),
(308, 20, 'HARDA'),
(309, 20, 'HOSHANGABAD'),
(310, 20, 'INDORE'),
(311, 20, 'JABALPUR'),
(312, 20, 'JHABUA'),
(313, 20, 'KATNI'),
(314, 20, 'KHANDWA (EAST NIMAR)'),
(315, 20, 'KHARGONE (WEST NIMAR)'),
(316, 20, 'MANDLA'),
(317, 20, 'MANDSAUR'),
(318, 20, 'MORENA'),
(319, 20, 'NARSINGHPUR'),
(320, 20, 'NEEMUCH'),
(321, 20, 'PANNA'),
(322, 20, 'RAISEN'),
(323, 20, 'RAJGARH'),
(324, 20, 'RATLAM'),
(325, 20, 'REWA'),
(326, 20, 'SAGAR'),
(327, 20, 'SATNA'),
(328, 20, 'SEHORE'),
(329, 20, 'SEONI'),
(330, 20, 'SHAHDOL'),
(331, 20, 'SHAJAPUR'),
(332, 20, 'SHEOPUR'),
(333, 20, 'SHIVPURI'),
(334, 20, 'SIDHI'),
(335, 20, 'SINGRAULI'),
(336, 20, 'TIKAMGARH'),
(337, 20, 'UJJAIN'),
(338, 20, 'UMARIA'),
(339, 20, 'VIDISHA'),
(340, 21, 'AHMEDNAGAR'),
(341, 21, 'AKOLA'),
(342, 21, 'AMRAVATI'),
(343, 21, 'AURANGABAD'),
(344, 21, 'BEED'),
(345, 21, 'BHANDARA'),
(346, 21, 'BULDHANA'),
(347, 21, 'CHANDRAPUR'),
(348, 21, 'DHULE'),
(349, 21, 'GADCHIROLI'),
(350, 21, 'GONDIA'),
(351, 21, 'HINGOLI'),
(352, 21, 'JALGAON'),
(353, 21, 'JALNA'),
(354, 21, 'KOLHAPUR'),
(355, 21, 'LATUR'),
(356, 21, 'MUMBAI CITY'),
(357, 21, 'MUMBAI SUBURBAN'),
(358, 21, 'NANDED'),
(359, 21, 'NANDURBAR'),
(360, 21, 'NAGPUR'),
(361, 21, 'NASHIK'),
(362, 21, 'OSMANABAD'),
(363, 21, 'PARBHANI'),
(364, 21, 'PUNE'),
(365, 21, 'RAIGAD'),
(366, 21, 'RATNAGIRI'),
(367, 21, 'SANGLI'),
(368, 21, 'SATARA'),
(369, 21, 'SINDHUDURG'),
(370, 21, 'SOLAPUR'),
(371, 21, 'THANE'),
(372, 21, 'WARDHA'),
(373, 21, 'WASHIM'),
(374, 21, 'YAVATMAL'),
(375, 22, 'BISHNUPUR'),
(376, 22, 'CHURACHANDPUR'),
(377, 22, 'CHANDEL'),
(378, 22, 'IMPHAL EAST'),
(379, 22, 'SENAPATI'),
(380, 22, 'TAMENGLONG'),
(381, 22, 'THOUBAL'),
(382, 22, 'UKHRUL'),
(383, 22, 'IMPHAL WEST'),
(384, 23, 'EAST GARO HILLS'),
(385, 23, 'EAST KHASI HILLS'),
(386, 23, 'JAINTIA HILLS'),
(387, 23, 'RI BHOI'),
(388, 23, 'SOUTH GARO HILLS'),
(389, 23, 'WEST GARO HILLS'),
(390, 23, 'WEST KHASI HILLS'),
(391, 24, 'AIZAWL'),
(392, 24, 'CHAMPHAI'),
(393, 24, 'KOLASIB'),
(394, 24, 'LAWNGTLAI'),
(395, 24, 'LUNGLEI'),
(396, 24, 'MAMIT'),
(397, 24, 'SAIHA'),
(398, 24, 'SERCHHIP'),
(399, 25, 'DIMAPUR'),
(400, 25, 'KIPHIRE'),
(401, 25, 'KOHIMA'),
(402, 25, 'LONGLENG'),
(403, 25, 'MOKOKCHUNG'),
(404, 25, 'MON'),
(405, 25, 'PEREN'),
(406, 25, 'PHEK'),
(407, 25, 'TUENSANG'),
(408, 25, 'WOKHA'),
(409, 25, 'ZUNHEBOTO'),
(410, 26, 'ANGUL'),
(411, 26, 'BOUDH (BAUDA)'),
(412, 26, 'BHADRAK'),
(413, 26, 'BALANGIR'),
(414, 26, 'BARGARH (BARAGARH)'),
(415, 26, 'BALASORE'),
(416, 26, 'CUTTACK'),
(417, 26, 'DEBAGARH (DEOGARH)'),
(418, 26, 'DHENKANAL'),
(419, 26, 'GANJAM'),
(420, 26, 'GAJAPATI'),
(421, 26, 'JHARSUGUDA'),
(422, 26, 'JAJPUR'),
(423, 26, 'JAGATSINGHPUR'),
(424, 26, 'KHORDHA'),
(425, 26, 'KENDUJHAR (KEONJHAR)'),
(426, 26, 'KALAHANDI'),
(427, 26, 'KANDHAMAL'),
(428, 26, 'KORAPUT'),
(429, 26, 'KENDRAPARA'),
(430, 26, 'MALKANGIRI'),
(431, 26, 'MAYURBHANJ'),
(432, 26, 'NABARANGPUR'),
(433, 26, 'NUAPADA'),
(434, 26, 'NAYAGARH'),
(435, 26, 'PURI'),
(436, 26, 'RAYAGADA'),
(437, 26, 'SAMBALPUR'),
(438, 26, 'SUBARNAPUR (SONEPUR)'),
(439, 26, 'SUNDERGARH'),
(440, 27, 'KARAIKAL'),
(441, 27, 'MAHE'),
(442, 27, 'PONDICHERRY'),
(443, 27, 'YANAM'),
(444, 28, 'AMRITSAR'),
(445, 28, 'BARNALA'),
(446, 28, 'BATHINDA'),
(447, 28, 'FIROZPUR'),
(448, 28, 'FARIDKOT'),
(449, 28, 'FATEHGARH SAHIB'),
(450, 28, 'FAZILKA[6]'),
(451, 28, 'GURDASPUR'),
(452, 28, 'HOSHIARPUR'),
(453, 28, 'JALANDHAR'),
(454, 28, 'KAPURTHALA'),
(455, 28, 'LUDHIANA'),
(456, 28, 'MANSA'),
(457, 28, 'MOGA'),
(458, 28, 'SRI MUKTSAR SAHIB'),
(459, 28, 'PATHANKOT'),
(460, 28, 'PATIALA'),
(461, 28, 'RUPNAGAR'),
(462, 28, 'AJITGARH (MOHALI)'),
(463, 28, 'SANGRUR'),
(464, 28, 'SHAHID BHAGAT SINGH NAGAR'),
(465, 28, 'TARN TARAN'),
(466, 29, 'AJMER'),
(467, 29, 'ALWAR'),
(468, 29, 'BIKANER'),
(469, 29, 'BARMER'),
(470, 29, 'BANSWARA'),
(471, 29, 'BHARATPUR'),
(472, 29, 'BARAN'),
(473, 29, 'BUNDI'),
(474, 29, 'BHILWARA'),
(475, 29, 'CHURU'),
(476, 29, 'CHITTORGARH'),
(477, 29, 'DAUSA'),
(478, 29, 'DHOLPUR'),
(479, 29, 'DUNGAPUR'),
(480, 29, 'GANGANAGAR'),
(481, 29, 'HANUMANGARH'),
(482, 29, 'JHUNJHUNU'),
(483, 29, 'JALORE'),
(484, 29, 'JODHPUR'),
(485, 29, 'JAIPUR'),
(486, 29, 'JAISALMER'),
(487, 29, 'JHALAWAR'),
(488, 29, 'KARAULI'),
(489, 29, 'KOTA'),
(490, 29, 'NAGAUR'),
(491, 29, 'PALI'),
(492, 29, 'PRATAPGARH'),
(493, 29, 'RAJSAMAND'),
(494, 29, 'SIKAR'),
(495, 29, 'SAWAI MADHOPUR'),
(496, 29, 'SIROHI'),
(497, 29, 'TONK'),
(498, 29, 'UDAIPUR'),
(499, 30, 'EAST SIKKIM'),
(500, 30, 'NORTH SIKKIM'),
(501, 30, 'SOUTH SIKKIM'),
(502, 30, 'WEST SIKKIM'),
(503, 31, 'ARIYALUR'),
(504, 31, 'CHENNAI'),
(505, 31, 'COIMBATORE'),
(506, 31, 'CUDDALORE'),
(507, 31, 'DHARMAPURI'),
(508, 31, 'DINDIGUL'),
(509, 31, 'ERODE'),
(510, 31, 'KANCHIPURAM'),
(511, 31, 'KANYAKUMARI'),
(512, 31, 'KARUR'),
(513, 31, 'KRISHNAGIRI'),
(514, 31, 'MADURAI'),
(515, 31, 'NAGAPATTINAM'),
(516, 31, 'NILGIRIS'),
(517, 31, 'NAMAKKAL'),
(518, 31, 'PERAMBALUR'),
(519, 31, 'PUDUKKOTTAI'),
(520, 31, 'RAMANATHAPURAM'),
(521, 31, 'SALEM'),
(522, 31, 'SIVAGANGA'),
(523, 31, 'TIRUPUR'),
(524, 31, 'TIRUCHIRAPPALLI'),
(525, 31, 'THENI'),
(526, 31, 'TIRUNELVELI'),
(527, 31, 'THANJAVUR'),
(528, 31, 'THOOTHUKUDI'),
(529, 31, 'TIRUVALLUR'),
(530, 31, 'TIRUVARUR'),
(531, 31, 'TIRUVANNAMALAI'),
(532, 31, 'VELLORE'),
(533, 31, 'VILUPPURAM'),
(534, 31, 'VIRUDHUNAGAR'),
(535, 32, 'DHALAI'),
(536, 32, 'NORTH TRIPURA'),
(537, 32, 'SOUTH TRIPURA'),
(538, 32, 'KHOWAI[7]'),
(539, 32, 'WEST TRIPURA'),
(540, 33, 'AGRA'),
(541, 33, 'ALIGARH'),
(542, 33, 'ALLAHABAD'),
(543, 33, 'AMBEDKAR NAGAR'),
(544, 33, 'AURAIYA'),
(545, 33, 'AZAMGARH'),
(546, 33, 'BAGPAT'),
(547, 33, 'BAHRAICH'),
(548, 33, 'BALLIA'),
(549, 33, 'BALRAMPUR'),
(550, 33, 'BANDA'),
(551, 33, 'BARABANKI'),
(552, 33, 'BAREILLY'),
(553, 33, 'BASTI'),
(554, 33, 'BIJNOR'),
(555, 33, 'BUDAUN'),
(556, 33, 'BULANDSHAHR'),
(557, 33, 'CHANDAULI'),
(558, 33, 'CHHATRAPATI SHAHUJI MAHARAJ NAGAR[8]'),
(559, 33, 'CHITRAKOOT'),
(560, 33, 'DEORIA'),
(561, 33, 'ETAH'),
(562, 33, 'ETAWAH'),
(563, 33, 'FAIZABAD'),
(564, 33, 'FARRUKHABAD'),
(565, 33, 'FATEHPUR'),
(566, 33, 'FIROZABAD'),
(567, 33, 'GAUTAM BUDDH NAGAR'),
(568, 33, 'GHAZIABAD'),
(569, 33, 'GHAZIPUR'),
(570, 33, 'GONDA'),
(571, 33, 'GORAKHPUR'),
(572, 33, 'HAMIRPUR'),
(573, 33, 'HARDOI'),
(574, 33, 'HATHRAS'),
(575, 33, 'JALAUN'),
(576, 33, 'JAUNPUR DISTRICT'),
(577, 33, 'JHANSI'),
(578, 33, 'JYOTIBA PHULE NAGAR'),
(579, 33, 'KANNAUJ'),
(580, 33, 'KANPUR'),
(581, 33, 'KANSHI RAM NAGAR'),
(582, 33, 'KAUSHAMBI'),
(583, 33, 'KUSHINAGAR'),
(584, 33, 'LAKHIMPUR KHERI'),
(585, 33, 'LALITPUR'),
(586, 33, 'LUCKNOW'),
(587, 33, 'MAHARAJGANJ'),
(588, 33, 'MAHOBA'),
(589, 33, 'MAINPURI'),
(590, 33, 'MATHURA'),
(591, 33, 'MAU'),
(592, 33, 'MEERUT'),
(593, 33, 'MIRZAPUR'),
(594, 33, 'MORADABAD'),
(595, 33, 'MUZAFFARNAGAR'),
(596, 33, 'PANCHSHEEL NAGAR DISTRICT (HAPUR)'),
(597, 33, 'PILIBHIT'),
(598, 33, 'PRATAPGARH'),
(599, 33, 'RAEBARELI'),
(600, 33, 'RAMABAI NAGAR (KANPUR DEHAT)'),
(601, 33, 'RAMPUR'),
(602, 33, 'SAHARANPUR'),
(603, 33, 'SANT KABIR NAGAR'),
(604, 33, 'SANT RAVIDAS NAGAR'),
(605, 33, 'SHAHJAHANPUR'),
(606, 33, 'SHAMLI[9]'),
(607, 33, 'SHRAVASTI'),
(608, 33, 'SIDDHARTHNAGAR'),
(609, 33, 'SITAPUR'),
(610, 33, 'SONBHADRA'),
(611, 33, 'SULTANPUR'),
(612, 33, 'UNNAO'),
(613, 33, 'VARANASI'),
(614, 34, 'ALMORA'),
(615, 34, 'BAGESHWAR'),
(616, 34, 'CHAMOLI'),
(617, 34, 'CHAMPAWAT'),
(618, 34, 'DEHRADUN'),
(619, 34, 'HARIDWAR'),
(620, 34, 'NAINITAL'),
(621, 34, 'PAURI GARHWAL'),
(622, 34, 'PITHORAGARH'),
(623, 34, 'RUDRAPRAYAG'),
(624, 34, 'TEHRI GARHWAL'),
(625, 34, 'UDHAM SINGH NAGAR'),
(626, 34, 'UTTARKASHI'),
(627, 35, 'BANKURA'),
(628, 35, 'BARDHAMAN'),
(629, 35, 'BIRBHUM'),
(630, 35, 'COOCH BEHAR'),
(631, 35, 'DAKSHIN DINAJPUR'),
(632, 35, 'DARJEELING'),
(633, 35, 'HOOGHLY'),
(634, 35, 'HOWRAH'),
(635, 35, 'JALPAIGURI'),
(636, 35, 'KOLKATA'),
(637, 35, 'MALDAH'),
(638, 35, 'MURSHIDABAD'),
(639, 35, 'NADIA'),
(640, 35, 'NORTH 24 PARGANAS'),
(641, 35, 'PASCHIM MEDINIPUR'),
(642, 35, 'PURBA MEDINIPUR'),
(643, 35, 'PURULIA'),
(644, 35, 'SOUTH 24 PARGANAS'),
(645, 35, 'UTTAR DINAJPUR'),
(646, 36, 'CHING-DISTRICT'),
(647, 37, 'GREECE-DISTRICT1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_states`
--

CREATE TABLE `mst_states` (
  `StateID` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_states`
--

INSERT INTO `mst_states` (`StateID`, `StateName`) VALUES
(1, 'ANDAMAN AND NICOBAR (AN)'),
(2, 'ANDHRA PRADESH (AP)'),
(3, 'ARUNACHAL PRADESH (AR)'),
(4, 'ASSAM (AS)'),
(5, 'BIHAR (BR)'),
(6, 'CHANDIGARH (CH)'),
(7, 'CHHATTISGARH (CG)'),
(8, 'DADRA AND NAGAR HAVELI (DN)'),
(9, 'DAMAN AND DIU (DD)'),
(10, 'DELHI (DL)'),
(11, 'GOA (GA)'),
(12, 'GUJARAT (GJ)'),
(13, 'HARYANA (HR)'),
(14, 'HIMACHAL PRADESH (HP)'),
(15, 'JAMMU AND KASHMIR (JK)'),
(16, 'JHARKHAND (JH)'),
(17, 'KARNATAKA (KA)'),
(18, 'KERALA (KL)'),
(19, 'LAKSHDWEEP (LD)'),
(20, 'MADHYA PRADESH (MP)'),
(21, 'MAHARASHTRA (MH)'),
(22, 'MANIPUR (MN)'),
(23, 'MEGHALAYA (ML)'),
(24, 'MIZORAM (MZ)'),
(25, 'NAGALAND (NL)'),
(26, 'ODISHA (OD)'),
(27, 'PUDUCHERRY (PY)'),
(28, 'PUNJAB (PB)'),
(29, 'RAJASTHAN (RJ)'),
(30, 'SIKKIM (SK)'),
(31, 'TAMIL NADU (TN)'),
(32, 'TRIPURA (TR)'),
(33, 'UTTAR PRADESH (UP)'),
(34, 'UTTARAKHAND (UK)'),
(35, 'WEST BENGAL (WB)'),
(36, 'CHANG-CHUN-STATE'),
(37, 'GREECE-STATE1');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationId` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationId`, `EventID`, `UserID`, `Date`) VALUES
(1, 2, 1, '2019-02-21'),
(2, 1, 1, '2019-02-23'),
(3, 2, 1, '2019-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `photos_files`
--

CREATE TABLE `photos_files` (
  `ID` int(11) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos_files`
--

INSERT INTO `photos_files` (`ID`, `FileName`, `Time`) VALUES
(1, '1-12771.jpg', '2019-03-02 11:58:31'),
(2, '2-12771.jpg', '2019-03-02 11:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `projecttype`
--

CREATE TABLE `projecttype` (
  `ID` int(11) NOT NULL,
  `ProjectName` varchar(30) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecttype`
--

INSERT INTO `projecttype` (`ID`, `ProjectName`, `Time`) VALUES
(1, 'Ethical Responsiblity', '2019-02-21 13:55:06'),
(2, 'Other Implement Agencies', '2019-02-27 03:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(11) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Reply` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `CommentID`, `EventID`, `UserID`, `Reply`, `Date`) VALUES
(1, 7, 1, 2, 'Hey You can make it', '2019-02-26 18:30:35'),
(2, 44, 1, 1, 'reply to p', '2019-02-27 03:17:07'),
(3, 36, 1, 1, 'reply to asdasd', '2019-02-27 03:19:41'),
(4, 36, 1, 1, 'reply to a reply', '2019-02-27 03:20:16'),
(5, 36, 1, 1, 'reply to reply to a reply', '2019-02-27 03:23:24'),
(6, 6, 2, 1, 'all do', '2019-02-27 11:19:30'),
(7, 6, 2, 1, 'all do', '2019-02-27 11:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `EventID` int(11) NOT NULL,
  `Particulars` varchar(50) NOT NULL,
  `Qty` bigint(20) NOT NULL,
  `Amount` double NOT NULL,
  `C_Qty` double NOT NULL,
  `C_Amount` int(11) NOT NULL DEFAULT '0',
  `Balance` double NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`EventID`, `Particulars`, `Qty`, `Amount`, `C_Qty`, `C_Amount`, `Balance`, `DateTime`) VALUES
(9, 'doctors', 3, 0, 0, 0, 0, '2019-02-26 11:33:14'),
(11, 'doctors', 3, 0, 0, 0, 0, '2019-02-26 11:38:14'),
(12, 'doctors', 3, 0, 0, 0, 0, '2019-02-26 11:39:40'),
(13, 'doctors', 3, 0, 2, 0, 0, '2019-02-26 15:30:25'),
(13, 'cash', 0, 10000, 0, 2000, 0, '2019-02-26 15:30:25'),
(13, 'labours', 45, 0, 34, 0, 0, '2019-02-26 15:30:26'),
(14, 'doctors', 3, 0, 0, 0, 0, '2019-02-26 12:11:44'),
(14, 'cash', 0, 10000, 0, 0, 0, '2019-02-26 12:11:44'),
(14, 'labours', 45, 0, 0, 0, 0, '2019-02-26 12:11:44'),
(7, 'Doctor', 12, 0, 0, 0, 0, '2019-02-27 06:33:32'),
(7, 'Plu', 2, 0, 0, 0, 0, '2019-02-27 06:33:32'),
(8, 'Doctor', 12, 0, 0, 0, 0, '2019-02-27 06:42:40'),
(8, 'Plu', 2, 0, 0, 0, 0, '2019-02-27 06:42:40'),
(9, 'Doctor', 12, 0, 0, 0, 0, '2019-02-27 07:08:32'),
(9, 'Plu', 2, 0, 0, 0, 0, '2019-02-27 07:08:32'),
(10, 'aa', 10, 0, 7, 0, 0, '2019-02-27 18:10:10'),
(14, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:41:27'),
(14, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:41:27'),
(15, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:42:36'),
(15, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:42:36'),
(16, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:44:05'),
(16, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:44:05'),
(17, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:53:25'),
(17, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:53:25'),
(18, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:56:07'),
(18, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:56:07'),
(19, 'POU', 10, 1, 0, 0, 0, '2019-02-27 18:57:21'),
(19, 'KKD', 11, 1, 0, 0, 0, '2019-02-27 18:57:21'),
(20, 'Books', 10, 0, 0, 0, 0, '2019-03-02 18:56:16'),
(20, 'Pens', 15, 0, 0, 0, 0, '2019-03-02 18:56:16'),
(21, 'Helping staff', 20, 0, 12, 0, 0, '2019-03-02 21:53:18'),
(21, 'Cash', 0, 10000, 0, 0, 0, '2019-03-02 21:35:07'),
(21, 'text books', 30, 0, 0, 0, 0, '2019-03-02 21:35:07'),
(22, 'Voluntres', 20, 0, 0, 0, 0, '2019-03-02 21:40:57'),
(23, 'individuals', 16, 0, 0, 0, 0, '2019-03-02 21:43:28'),
(23, 'plants', 20, 0, 0, 0, 0, '2019-03-02 21:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `SectorID` int(11) NOT NULL,
  `SectorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`SectorID`, `SectorName`) VALUES
(1, 'Economic Development'),
(2, 'Environment Conservatioin'),
(3, 'Socail welfare and Development'),
(4, 'Arts and Cultural Development'),
(5, 'Health'),
(6, 'Agricultural'),
(7, 'Education'),
(8, 'Childrern and Youth');

-- --------------------------------------------------------

--
-- Table structure for table `sector_interest`
--

CREATE TABLE `sector_interest` (
  `SectorID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `SID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `SuggestionTitle` varchar(50) NOT NULL,
  `Suggestions` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`SID`, `UserID`, `SuggestionTitle`, `Suggestions`, `DateTime`) VALUES
(1, 2, 'User Base', 'This to inform the user has registered the given details', '2019-03-02 08:59:37'),
(7, 1, '', 'GThfjhg djhsk', '2019-03-02 12:08:52'),
(8, 1, '', 'This ohg thl al', '2019-03-02 12:09:04'),
(9, 2, '', '', '2019-03-02 12:12:11'),
(10, 2, '', '', '2019-03-02 12:12:57'),
(11, 2, '', 'this is ot m', '2019-03-02 12:15:35'),
(12, 2, '', 'tjigj jgj ljl', '2019-03-02 12:16:36'),
(13, 2, '', 'tjigj jgj ljl', '2019-03-02 12:17:09'),
(14, 2, '', 'tjigj jgj ljl', '2019-03-02 12:17:53'),
(15, 2, '', 'tjigj jgj ljl', '2019-03-02 12:18:54'),
(16, 2, '', 'ddd', '2019-03-02 12:19:43'),
(17, 2, '', 'dkjksd dliaj', '2019-03-02 12:20:51'),
(18, 2, '', 'asDq', '2019-03-02 12:36:07'),
(19, 2, '', 'asDq', '2019-03-02 12:36:34'),
(20, 2, '', 'this is ', '2019-03-02 12:37:51'),
(21, 2, '', 'this', '2019-03-02 12:38:21'),
(22, 2, '', 'gdh', '2019-03-02 12:39:18'),
(23, 2, '', 'cx', '2019-03-02 12:40:07'),
(24, 2, '', 'cx', '2019-03-02 12:41:12'),
(25, 2, '', 'Recovery for flood', '2019-03-02 14:30:51'),
(26, 5, '', 'Hello flood please support us', '2019-03-02 20:47:55'),
(27, 5, '', 'This', '2019-03-02 20:55:59'),
(28, 5, '', 'Thsi', '2019-03-02 20:56:31'),
(29, 5, '', '', '2019-03-02 20:58:44'),
(30, 5, '', '', '2019-03-02 21:00:10'),
(31, 5, '', 'This', '2019-03-02 21:00:48'),
(32, 5, '', 'THis', '2019-03-02 21:13:03'),
(33, 5, '', 'THis', '2019-03-02 21:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `CIN` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Mobile` bigint(10) DEFAULT NULL,
  `Latitude` decimal(10,6) DEFAULT '0.000000',
  `Logitude` decimal(10,6) DEFAULT '0.000000',
  `StateID` varchar(25) DEFAULT NULL,
  `DistrictID` int(11) NOT NULL,
  `EmailID` varchar(50) DEFAULT NULL,
  `UserType` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `CIN`, `Password`, `Address`, `Mobile`, `Latitude`, `Logitude`, `StateID`, `DistrictID`, `EmailID`, `UserType`, `Time`) VALUES
(1, 'Shahinsha Enterprises', '0', 'b907265b7b7bc6d1cbe3feae0e955db0', 'Shimoga', 8090505602, '0.000000', '0.000000', '14', 9, 'mdshoebmeti@gmail.com', 2, '2019-03-02 11:29:48'),
(2, 'Koisour Entterprises', '0', '7815696ecbf1c96e6894b779456d330e', 'Karward', 8090602010, '0.000000', '0.000000', '21', 12, 'nitinbhuyyar@gmail.com', 1, '2019-03-02 11:29:48'),
(3, 'dasd', '123', 'e10adc3949ba59abbe56e057f20f883e', 'jhdsh dasih', 8095933912, '17.341200', '18.321300', '16', 236, 'ksffahk@gmail.com', 1, '2019-03-02 11:29:48'),
(4, 'MARUTHI RESHME BELEGAMARU ABIVRIDDI CENT RE PRIVATE LIMITED', 'U01224KA1991PTC012218', '202cb962ac59075b964b07152d234b70', 'Banglore', 7777777777, '17.341200', '18.321300', '18', 274, 'nitinbhuyyar@gmail1.com', 2, '2019-03-02 18:36:48'),
(5, 'PRAMUKH AQUA FARMS PRIVATE LIMITED', 'U01224KA1995PTC018567', '202cb962ac59075b964b07152d234b70', 'tu hi pechan', 8722001928, '0.000000', '0.000000', '2', 23, 'kuchbi.com', 2, '2019-03-02 18:36:48'),
(6, 'GEE AAR COIR TECH PRIVATE LIMITED', 'U01224KA2012PTC062627', '202cb962ac59075b964b07152d234b70', 'ha ha ha ', 8722001928, '0.000000', '0.000000', '17', 247, 'jabe.com', 2, '2019-03-02 18:36:48'),
(7, 'INDUSTRIAL AND AGRICULTURAL ENGINEERING CO PRIVATE LIMITED', 'U01225KA1941PTC000282', '202cb962ac59075b964b07152d234b70', 'ha haah a', 1234567891, '0.000000', '0.000000', '16', 243, 'tuhihai.com', 2, '2019-03-02 18:36:48'),
(8, 'nisha', '0', '202cb962ac59075b964b07152d234b70', 'ja be  ja', 6767676767, '0.000000', '0.000000', '16', 242, 'npuri@gmail.com', 1, '2019-03-02 18:36:48'),
(9, 'ghanti', '0', '202cb962ac59075b964b07152d234b70', 'bijapur', 1231231231, '0.000000', '0.000000', '241', 16, 'thanthan.com', 3, '2019-03-02 20:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `ID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`ID`, `Name`) VALUES
(1, 'Individual'),
(2, 'Organisation'),
(3, 'NGO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`ContributionsID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `SectorID` (`SectorID`),
  ADD KEY `StateID` (`StateID`),
  ADD KEY `DistrictID` (`DistrictID`);

--
-- Indexes for table `mst_districts`
--
ALTER TABLE `mst_districts`
  ADD PRIMARY KEY (`DistrictID`);

--
-- Indexes for table `mst_states`
--
ALTER TABLE `mst_states`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationId`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`SectorID`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`EmailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `ContributionsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mst_districts`
--
ALTER TABLE `mst_districts`
  MODIFY `DistrictID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;

--
-- AUTO_INCREMENT for table `mst_states`
--
ALTER TABLE `mst_states`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `SectorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`SectorID`) REFERENCES `sectors` (`SectorID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`StateID`) REFERENCES `mst_states` (`StateID`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`DistrictID`) REFERENCES `mst_districts` (`DistrictID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
