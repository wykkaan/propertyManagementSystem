-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 08:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `propertylisting_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `user_id`, `propertylisting_id`) VALUES
(78, 105, 1862),
(79, 105, 1870),
(80, 105, 1848),
(81, 105, 1880),
(83, 106, 1784),
(84, 107, 1785),
(85, 107, 1786),
(86, 108, 1787),
(87, 108, 1788),
(88, 109, 1789),
(89, 109, 1790),
(90, 110, 1791),
(91, 110, 1792),
(92, 111, 1793),
(93, 111, 1794),
(94, 112, 1795),
(95, 112, 1796),
(96, 113, 1797),
(97, 113, 1798),
(98, 114, 1799),
(99, 114, 1800),
(100, 115, 1801),
(101, 115, 1802),
(102, 116, 1803),
(103, 116, 1804),
(104, 117, 1805),
(105, 117, 1806),
(106, 118, 1807),
(107, 118, 1808),
(108, 119, 1809),
(109, 119, 1810),
(110, 120, 1811),
(111, 120, 1812),
(112, 121, 1813),
(113, 121, 1814),
(114, 122, 1815),
(115, 122, 1816),
(116, 123, 1817),
(117, 123, 1818),
(118, 124, 1819),
(119, 124, 1820),
(120, 125, 1821),
(121, 125, 1822),
(122, 126, 1823),
(123, 126, 1824),
(124, 127, 1825),
(125, 127, 1826),
(126, 128, 1827),
(127, 128, 1828),
(128, 129, 1829),
(129, 129, 1830),
(130, 130, 1831),
(131, 130, 1832),
(132, 131, 1833),
(133, 131, 1834),
(134, 132, 1835),
(135, 132, 1836),
(136, 133, 1837),
(137, 133, 1838),
(138, 134, 1839),
(139, 134, 1840),
(140, 135, 1841),
(141, 135, 1842),
(142, 136, 1843),
(143, 136, 1844),
(144, 137, 1845),
(145, 137, 1846),
(146, 138, 1847),
(147, 138, 1848),
(148, 139, 1849),
(149, 139, 1850),
(150, 140, 1851),
(151, 140, 1852),
(152, 141, 1853),
(153, 141, 1854),
(154, 142, 1855),
(155, 142, 1856),
(156, 143, 1857),
(157, 143, 1858),
(158, 144, 1859),
(159, 144, 1860),
(160, 145, 1861),
(161, 145, 1862),
(162, 146, 1863),
(163, 146, 1864),
(164, 147, 1865),
(165, 147, 1866),
(166, 148, 1867),
(167, 148, 1868),
(168, 149, 1869),
(169, 149, 1870),
(170, 150, 1871),
(171, 150, 1872),
(172, 151, 1873),
(173, 151, 1874),
(174, 152, 1875),
(175, 152, 1876),
(176, 153, 1877),
(177, 153, 1878),
(178, 154, 1879),
(179, 154, 1880),
(180, 155, 1881),
(181, 155, 1882),
(182, 156, 1883),
(183, 156, 1884),
(184, 157, 1885),
(185, 157, 1886),
(186, 158, 1887),
(187, 158, 1888),
(188, 159, 1889),
(189, 159, 1890),
(190, 160, 1891),
(191, 160, 1892),
(192, 161, 1893),
(193, 161, 1894),
(194, 162, 1895),
(195, 162, 1896),
(196, 163, 1897),
(197, 163, 1898),
(198, 164, 1899),
(199, 164, 1900),
(200, 165, 1901),
(201, 165, 1902),
(202, 166, 1903),
(203, 166, 1904),
(204, 167, 1905),
(205, 167, 1906),
(206, 168, 1907),
(207, 168, 1908),
(208, 169, 1909),
(209, 169, 1910),
(210, 170, 1911),
(211, 170, 1912),
(212, 171, 1913),
(213, 171, 1914),
(214, 172, 1915),
(215, 172, 1916),
(216, 173, 1917),
(217, 173, 1918),
(218, 174, 1919),
(219, 174, 1920),
(220, 175, 1921),
(221, 175, 1922),
(222, 176, 1923),
(223, 176, 1924),
(224, 177, 1925),
(225, 177, 1926),
(226, 178, 1927),
(227, 178, 1928),
(228, 179, 1929),
(229, 179, 1930),
(230, 180, 1931),
(231, 180, 1932),
(232, 181, 1933),
(233, 181, 1934),
(234, 182, 1935),
(235, 182, 1936),
(236, 183, 1937),
(237, 183, 1938),
(238, 184, 1939),
(239, 184, 1940),
(240, 185, 1941),
(241, 185, 1942),
(242, 186, 1943),
(243, 186, 1944),
(244, 187, 1945),
(245, 187, 1946),
(246, 188, 1947),
(247, 188, 1948),
(248, 189, 1949),
(249, 189, 1950),
(250, 190, 1951),
(251, 190, 1952),
(252, 191, 1953),
(253, 191, 1954),
(254, 192, 1955),
(255, 192, 1956),
(256, 193, 1957),
(257, 193, 1958),
(258, 194, 1959),
(259, 194, 1960),
(260, 195, 1961),
(261, 195, 1962),
(262, 196, 1963),
(263, 196, 1964),
(264, 197, 1965),
(265, 197, 1966),
(266, 198, 1967),
(267, 198, 1968),
(268, 199, 1969),
(269, 199, 1970),
(270, 200, 1971),
(271, 200, 1972),
(272, 201, 1973),
(273, 201, 1974),
(274, 202, 1975),
(275, 202, 1976),
(276, 203, 1977),
(277, 203, 1978);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `propertylisting_id` int(11) NOT NULL,
  `list_status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `user_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `view_count` int(11) NOT NULL,
  `interest_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `propertylisting_id`, `list_status`, `user_id`, `agent_id`, `view_count`, `interest_count`) VALUES
(1668, 1783, 'PENDING', 114, NULL, 33, 0),
(1669, 1784, 'PENDING', 112, NULL, 62, 15),
(1670, 1785, 'PENDING', 3, NULL, 47, 36),
(1671, 1786, 'PENDING', 112, NULL, 54, 44),
(1672, 1787, 'PENDING', 111, NULL, 12, 27),
(1673, 1788, 'SOLD', 108, NULL, 11, 29),
(1674, 1789, 'PENDING', 113, NULL, 78, 36),
(1675, 1790, 'PENDING', 114, NULL, 4, 2),
(1676, 1791, 'PENDING', 2, NULL, 30, 5),
(1677, 1792, 'PENDING', 2, NULL, 27, 40),
(1678, 1793, 'SOLD', 3, NULL, 50, 35),
(1679, 1794, 'SOLD', 115, NULL, 70, 12),
(1680, 1795, 'PENDING', 112, NULL, 98, 0),
(1681, 1796, 'PENDING', 2, NULL, 57, 42),
(1682, 1797, 'PENDING', 113, NULL, 23, 24),
(1683, 1798, 'PENDING', 107, NULL, 7, 37),
(1684, 1799, 'PENDING', 113, NULL, 0, 36),
(1685, 1800, 'PENDING', 111, NULL, 20, 31),
(1686, 1801, 'PENDING', 3, NULL, 67, 36),
(1687, 1802, 'PENDING', 115, NULL, 49, 36),
(1688, 1803, 'SOLD', 108, NULL, 36, 6),
(1689, 1804, 'PENDING', 111, NULL, 85, 42),
(1690, 1805, 'SOLD', 3, NULL, 2, 16),
(1691, 1806, 'PENDING', 111, NULL, 35, 14),
(1692, 1807, 'PENDING', 2, NULL, 83, 31),
(1693, 1808, 'SOLD', 115, NULL, 87, 14),
(1694, 1809, 'PENDING', 108, NULL, 0, 28),
(1695, 1810, 'PENDING', 107, NULL, 37, 5),
(1696, 1811, 'PENDING', 113, NULL, 42, 37),
(1697, 1812, 'SOLD', 115, NULL, 80, 17),
(1698, 1813, 'PENDING', 111, NULL, 29, 10),
(1699, 1814, 'PENDING', 115, NULL, 60, 11),
(1700, 1815, 'SOLD', 111, NULL, 49, 46),
(1701, 1816, 'PENDING', 3, NULL, 13, 43),
(1702, 1817, 'PENDING', 108, NULL, 48, 25),
(1703, 1818, 'SOLD', 111, NULL, 58, 43),
(1704, 1819, 'PENDING', 111, NULL, 71, 8),
(1705, 1820, 'PENDING', 115, NULL, 25, 34),
(1706, 1821, 'PENDING', 111, NULL, 43, 30),
(1707, 1822, 'PENDING', 112, NULL, 74, 7),
(1708, 1823, 'PENDING', 115, NULL, 44, 38),
(1709, 1824, 'SOLD', 2, NULL, 30, 44),
(1710, 1825, 'PENDING', 2, NULL, 91, 42),
(1711, 1826, 'PENDING', 113, NULL, 56, 39),
(1712, 1827, 'PENDING', 111, NULL, 26, 17),
(1713, 1828, 'PENDING', 3, NULL, 34, 50),
(1714, 1829, 'PENDING', 112, NULL, 58, 40),
(1715, 1830, 'PENDING', 108, NULL, 39, 5),
(1716, 1831, 'PENDING', 3, NULL, 55, 11),
(1717, 1832, 'PENDING', 113, NULL, 52, 17),
(1718, 1833, 'PENDING', 114, NULL, 83, 12),
(1719, 1834, 'PENDING', 112, NULL, 79, 5),
(1720, 1835, 'PENDING', 108, NULL, 3, 33),
(1721, 1836, 'PENDING', 108, NULL, 24, 6),
(1722, 1837, 'PENDING', 3, NULL, 53, 31),
(1723, 1838, 'PENDING', 3, NULL, 89, 25),
(1724, 1839, 'PENDING', 111, NULL, 29, 14),
(1725, 1840, 'SOLD', 2, NULL, 28, 43),
(1726, 1841, 'PENDING', 108, NULL, 68, 20),
(1727, 1842, 'SOLD', 111, NULL, 72, 28),
(1728, 1843, 'PENDING', 111, NULL, 50, 23),
(1729, 1844, 'PENDING', 107, NULL, 8, 12),
(1730, 1845, 'PENDING', 113, NULL, 35, 10),
(1731, 1846, 'SOLD', 112, NULL, 29, 29),
(1732, 1847, 'PENDING', 113, NULL, 57, 17),
(1733, 1848, 'PENDING', 3, NULL, 80, 81),
(1734, 1849, 'SOLD', 3, NULL, 47, 25),
(1735, 1850, 'PENDING', 113, NULL, 95, 38),
(1736, 1851, 'PENDING', 115, NULL, 89, 34),
(1737, 1852, 'PENDING', 108, NULL, 98, 45),
(1738, 1853, 'PENDING', 111, NULL, 35, 19),
(1739, 1854, 'SOLD', 113, NULL, 53, 12),
(1740, 1855, 'SOLD', 108, NULL, 65, 7),
(1741, 1856, 'PENDING', 111, NULL, 37, 42),
(1742, 1857, 'PENDING', 107, NULL, 1, 36),
(1743, 1858, 'PENDING', 112, NULL, 29, 32),
(1744, 1859, 'PENDING', 115, NULL, 20, 31),
(1745, 1860, 'PENDING', 111, NULL, 24, 5),
(1746, 1861, 'PENDING', 112, NULL, 95, 0),
(1747, 1862, 'PENDING', 113, NULL, 18, 19),
(1748, 1863, 'PENDING', 107, NULL, 82, 24),
(1749, 1864, 'PENDING', 3, NULL, 26, 44),
(1750, 1865, 'SOLD', 115, NULL, 15, 37),
(1751, 1866, 'PENDING', 108, NULL, 44, 12),
(1752, 1867, 'SOLD', 111, NULL, 23, 20),
(1753, 1868, 'PENDING', 113, NULL, 36, 1),
(1754, 1869, 'SOLD', 108, NULL, 92, 6),
(1755, 1870, 'PENDING', 107, NULL, 1, 2),
(1756, 1871, 'PENDING', 115, NULL, 49, 27),
(1757, 1872, 'SOLD', 107, NULL, 49, 9),
(1758, 1873, 'PENDING', 108, NULL, 54, 45),
(1759, 1874, 'PENDING', 3, NULL, 66, 9),
(1760, 1875, 'PENDING', 114, NULL, 65, 2),
(1761, 1876, 'PENDING', 115, NULL, 52, 28),
(1762, 1877, 'PENDING', 112, NULL, 27, 50),
(1763, 1878, 'PENDING', 3, NULL, 17, 2),
(1764, 1879, 'PENDING', 108, NULL, 97, 8),
(1765, 1880, 'PENDING', 115, NULL, 80, 81),
(1766, 1881, 'PENDING', 107, NULL, 0, 24),
(1767, 1882, 'PENDING', 114, NULL, 5, 31);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `userprofile_id` int(10) NOT NULL,
  `profilename` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`userprofile_id`, `profilename`, `status`) VALUES
(1, 'Real Estate Agent', 'Active'),
(2, 'Seller', 'Active'),
(3, 'System Admin', 'Active'),
(4, 'Buyer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertylisting_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `property_price` int(20) NOT NULL,
  `property_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertylisting_id`, `seller_id`, `seller_name`, `property_name`, `property_price`, `property_description`) VALUES
(1783, 114, 'CharlieSell', 'Woodlands 808 Park', 811598, '5-room'),
(1784, 112, 'PaulSell', 'Choa Chu Kang 101 Heights', 527335, '3-room'),
(1785, 3, 'SteveSell', 'Tampines 220 Meadows', 479831, '5-room'),
(1786, 112, 'HarrySell', 'Woodlands 330 Grove', 412108, '5-room'),
(1787, 111, 'NinaSell', 'Choa Chu Kang 440 Residence', 793485, '4-room'),
(1788, 108, 'LunaSell', 'Punggol 909 Vista', 460052, '4-room'),
(1789, 113, 'KennySell', 'Ang Mo Kio 707 Garden', 488987, '5-room'),
(1790, 114, 'PeterSell', 'Jurong 202 Grove', 689320, '5-room'),
(1791, 2, 'KennySell', 'Yishun 220 Palms', 927092, '5-room'),
(1792, 2, 'VictoriaSell', 'Tampines 505 Garden', 938189, 'Shoebox'),
(1793, 3, 'CharlieSell', 'Punggol 505 Grove', 715650, 'Shoebox'),
(1794, 115, 'AliceSell', 'Hougang 660 Heights', 825917, 'Shoebox'),
(1795, 112, 'CharlieSell', 'Tampines 220 Grove', 594060, '4-room'),
(1796, 2, 'LarrySell', 'Tampines 404 Garden', 719370, '5-room'),
(1797, 113, 'JohanSell', 'Punggol 101 Terrace', 564146, '3-room'),
(1798, 107, 'QuincySell', 'Bedok 303 Park', 951691, '3-room'),
(1799, 113, 'LarrySell', 'Bedok 101 Garden', 305779, '5-room'),
(1800, 111, 'OliverSell', 'Punggol 505 Park', 632740, '4-room'),
(1801, 3, 'sell2', 'Bukit Batok 404 Garden', 911185, 'Shoebox'),
(1802, 115, 'ScarlettSell', 'Hougang 220 View', 363383, 'Shoebox'),
(1803, 108, 'LunaSell', 'Bukit Batok 550 Palms', 836164, '3-room'),
(1804, 111, 'FrankSell', 'Hougang 505 Palms', 505547, '5-room'),
(1805, 3, 'BarrySell', 'Tampines 808 Terrace', 323733, '3-room'),
(1806, 111, 'sell2', 'Yishun 909 Vista', 529828, '3-room'),
(1807, 2, 'sell1', 'Yishun 909 Palms', 494170, '3-room'),
(1808, 115, 'RachelSell', 'Punggol 909 Palms', 621061, '4-room'),
(1809, 108, 'IsaacSell', 'Bedok 606 Garden', 994243, 'Shoebox'),
(1810, 107, 'NinaSell', 'Woodlands 220 Heights', 845410, '4-room'),
(1811, 113, 'ScarlettSell', 'Woodlands 660 Park', 755594, '4-room'),
(1812, 115, 'CharlieSell', 'Ang Mo Kio 404 Vista', 308560, '4-room'),
(1813, 111, 'SteveSell', 'Woodlands 707 Palms', 778359, '3-room'),
(1814, 115, 'ScarlettSell', 'Punggol 110 Meadows', 819882, '4-room'),
(1815, 111, 'IsaacSell', 'Hougang 440 Residence', 325663, 'Shoebox'),
(1816, 3, 'VictoriaSell', 'Hougang 606 Grove', 766127, '5-room'),
(1817, 108, 'LarrySell', 'Bedok 101 Park', 459645, '4-room'),
(1818, 111, 'sell1', 'Choa Chu Kang 440 Park', 560389, '5-room'),
(1819, 111, 'DavidSell', 'Bedok 303 Meadows', 405884, '5-room'),
(1820, 115, 'OliverSell', 'Hougang 808 Garden', 411001, '5-room'),
(1821, 111, 'OliverSell', 'Bukit Batok 101 Park', 617551, '3-room'),
(1822, 112, 'LunaSell', 'Jurong 202 Meadows', 483045, '4-room'),
(1823, 115, 'MonaSell', 'Bedok 202 Heights', 991783, '4-room'),
(1824, 2, 'SteveSell', 'Bukit Batok 808 Heights', 869170, '4-room'),
(1825, 2, 'QuincySell', 'Choa Chu Kang 220 Meadows', 603313, '3-room'),
(1826, 113, 'AliceSell', 'Woodlands 220 View', 534249, 'Shoebox'),
(1827, 111, 'EveSell', 'Choa Chu Kang 101 Vista', 929711, '5-room'),
(1828, 3, 'AliceSell', 'Ang Mo Kio 550 Meadows', 894504, '4-room'),
(1829, 112, 'EveSell', 'Yishun 101 Grove', 532509, '3-room'),
(1830, 108, 'QuincySell', 'Bukit Batok 707 Terrace', 669111, '3-room'),
(1831, 3, 'HannahSell', 'Punggol 404 View', 786400, 'Shoebox'),
(1832, 113, 'KennySell', 'Bedok 404 Garden', 784849, '4-room'),
(1833, 114, 'sell1', 'Bukit Batok 440 Vista', 941523, '4-room'),
(1834, 112, 'HannahSell', 'Hougang 606 Meadows', 864796, '5-room'),
(1835, 108, 'CharlieSell', 'Bedok 330 Park', 382475, '4-room'),
(1836, 108, 'QuincySell', 'Woodlands 110 Heights', 653252, '5-room'),
(1837, 3, 'VictoriaSell', 'Bukit Batok 505 Park', 555070, 'Shoebox'),
(1838, 3, 'ScarlettSell', 'Tampines 660 Residence', 536059, '3-room'),
(1839, 111, 'JohanSell', 'Tampines 202 Residence', 734285, '3-room'),
(1840, 2, 'sell1', 'Hougang 909 Garden', 445713, '4-room'),
(1841, 108, 'IsaacSell', 'Tampines 505 Palms', 684009, 'Shoebox'),
(1842, 111, 'RachelSell', 'Tampines 550 Garden', 711199, '3-room'),
(1843, 111, 'RachelSell', 'Woodlands 550 View', 900532, '4-room'),
(1844, 107, 'JackSell', 'Tampines 660 Garden', 565195, '4-room'),
(1845, 113, 'BobSell', 'Bukit Batok 909 Vista', 436070, '4-room'),
(1846, 112, 'SteveSell', 'Jurong 909 Heights', 911050, 'Shoebox'),
(1847, 113, 'AliceSell', 'Woodlands 303 View', 957825, '3-room'),
(1848, 3, 'LunaSell', 'Ang Mo Kio 404 Meadows', 870728, '3-room'),
(1849, 3, 'NinaSell', 'Jurong 505 Heights', 886283, '3-room'),
(1850, 113, 'LauraSell', 'Yishun 110 View', 929221, '5-room'),
(1851, 115, 'KennySell', 'Tampines 550 Garden', 895125, '3-room'),
(1852, 108, 'TinaSell', 'Bukit Batok 660 Grove', 519248, '5-room'),
(1853, 111, 'EveSell', 'Bedok 404 Meadows', 735846, '4-room'),
(1854, 113, 'BobSell', 'Yishun 220 Meadows', 721678, 'Shoebox'),
(1855, 108, 'RachelSell', 'Woodlands 404 Residence', 554398, '4-room'),
(1856, 111, 'LauraSell', 'Jurong 808 Park', 804451, 'Shoebox'),
(1857, 107, 'RachelSell', 'Choa Chu Kang 550 Vista', 785747, 'Shoebox'),
(1858, 112, 'LarrySell', 'Hougang 550 Park', 835197, '5-room'),
(1859, 115, 'sell1', 'Woodlands 606 Grove', 693062, '4-room'),
(1860, 111, 'EveSell', 'Hougang 808 Park', 653720, '4-room'),
(1861, 112, 'JackSell', 'Yishun 202 Grove', 603345, 'Shoebox'),
(1862, 113, 'ScarlettSell', 'Ang Mo Kio 202 Heights', 599546, 'Shoebox'),
(1863, 107, 'ScarlettSell', 'Punggol 808 Garden', 498648, '5-room'),
(1864, 3, 'ScarlettSell', 'Hougang 330 Garden', 928801, '4-room'),
(1865, 115, 'TinaSell', 'Tampines 707 Heights', 876870, 'Shoebox'),
(1866, 108, 'HannahSell', 'Punggol 202 Terrace', 358552, '3-room'),
(1867, 111, 'JackSell', 'Hougang 404 Terrace', 894814, '5-room'),
(1868, 113, 'DavidSell', 'Choa Chu Kang 660 Terrace', 302520, '5-room'),
(1869, 108, 'AliceSell', 'Yishun 808 Grove', 650346, '3-room'),
(1870, 107, 'LunaSell', 'Ang Mo Kio 303 Park', 875250, '3-room'),
(1871, 115, 'PaulSell', 'Choa Chu Kang 220 Heights', 616181, '4-room'),
(1872, 107, 'HannahSell', 'Choa Chu Kang 110 Residence', 982130, 'Shoebox'),
(1873, 108, 'TinaSell', 'Punggol 707 Vista', 326968, 'Shoebox'),
(1874, 3, 'JackSell', 'Ang Mo Kio 808 Park', 326947, '5-room'),
(1875, 114, 'ScarlettSell', 'Yishun 330 Grove', 586431, '4-room'),
(1876, 115, 'sell1', 'Punggol 404 Meadows', 588622, '3-room'),
(1877, 112, 'TinaSell', 'Bedok 707 View', 902263, '4-room'),
(1878, 3, 'ScarlettSell', 'Bedok 505 Garden', 671105, '4-room'),
(1879, 108, 'GraceSell', 'Bedok 220 Palms', 818193, '5-room'),
(1880, 115, 'AliceSell', 'Ang Mo Kio 101 Grove', 787597, '5-room'),
(1881, 107, 'sell2', 'Tampines 440 Garden', 795124, 'Shoebox'),
(1882, 114, 'AliceSell', 'Punggol 909 Grove', 781603, '4-room');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `realestate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_rating` varchar(6) NOT NULL,
  `review_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `realestate_id`, `user_id`, `review_rating`, `review_description`) VALUES
(68, 113, 144, '3', 'Negative experience'),
(69, 113, 153, '4', 'Negative experience'),
(70, 108, 216, '3', 'Negative experience'),
(71, 3, 209, '5', 'Negative experience'),
(72, 112, 213, '4', 'Negative experience'),
(73, 107, 157, '4', 'Positive experience'),
(74, 111, 166, '4', 'Negative experience'),
(75, 112, 160, '5', 'Negative experience'),
(76, 111, 201, '5', 'Positive experience'),
(77, 108, 121, '3', 'Negative experience'),
(78, 113, 104, '2', 'Positive experience'),
(79, 108, 143, '5', 'Negative experience'),
(80, 113, 146, '5', 'Negative experience'),
(81, 112, 173, '5', 'Positive experience'),
(82, 107, 176, '4', 'Positive experience'),
(83, 111, 209, '2', 'Positive experience'),
(84, 113, 138, '3', 'Negative experience'),
(85, 107, 154, '1', 'Negative experience'),
(86, 2, 128, '1', 'Positive experience'),
(87, 107, 163, '5', 'Negative experience'),
(88, 112, 207, '1', 'Negative experience'),
(89, 3, 195, '4', 'Positive experience'),
(90, 114, 122, '1', 'Positive experience'),
(91, 108, 189, '4', 'Negative experience'),
(92, 114, 190, '4', 'Positive experience'),
(93, 108, 151, '3', 'Positive experience'),
(94, 111, 154, '4', 'Negative experience'),
(95, 112, 189, '1', 'Negative experience'),
(96, 113, 165, '3', 'Positive experience'),
(97, 3, 122, '3', 'Positive experience'),
(98, 2, 119, '3', 'Negative experience'),
(99, 114, 188, '5', 'Negative experience'),
(100, 113, 145, '2', 'Negative experience'),
(101, 2, 199, '4', 'Negative experience'),
(102, 114, 132, '2', 'Positive experience'),
(103, 113, 123, '5', 'Positive experience'),
(104, 113, 163, '1', 'Negative experience'),
(105, 2, 144, '4', 'Positive experience'),
(106, 114, 214, '5', 'Positive experience'),
(107, 2, 147, '5', 'Positive experience'),
(108, 115, 214, '5', 'Negative experience'),
(109, 114, 118, '2', 'Positive experience'),
(110, 3, 150, '4', 'Negative experience'),
(111, 2, 104, '2', 'Positive experience'),
(112, 114, 176, '4', 'Negative experience'),
(113, 2, 200, '3', 'Positive experience'),
(114, 107, 165, '5', 'Positive experience'),
(115, 108, 201, '3', 'Positive experience'),
(116, 2, 103, '2', 'Positive experience'),
(117, 108, 198, '5', 'Positive experience'),
(118, 107, 136, '1', 'Negative experience'),
(119, 115, 154, '5', 'Negative experience'),
(120, 114, 194, '5', 'Negative experience'),
(121, 112, 217, '3', 'Negative experience'),
(122, 112, 175, '1', 'Positive experience'),
(123, 112, 215, '3', 'Negative experience'),
(124, 115, 157, '3', 'Negative experience'),
(125, 115, 176, '4', 'Negative experience'),
(126, 114, 199, '1', 'Positive experience'),
(127, 113, 150, '4', 'Positive experience'),
(128, 3, 173, '2', 'Negative experience'),
(129, 111, 103, '4', 'Positive experience'),
(130, 115, 163, '2', 'Negative experience'),
(131, 107, 185, '5', 'Positive experience'),
(132, 111, 199, '2', 'Negative experience'),
(133, 115, 156, '2', 'Positive experience'),
(134, 114, 217, '2', 'Positive experience'),
(135, 115, 199, '2', 'Positive experience'),
(136, 114, 216, '5', 'Negative experience'),
(137, 112, 206, '5', 'Negative experience'),
(138, 108, 172, '4', 'Negative experience'),
(139, 112, 198, '2', 'Positive experience'),
(140, 112, 122, '2', 'Positive experience'),
(141, 111, 183, '3', 'Positive experience'),
(142, 3, 167, '1', 'Negative experience'),
(143, 113, 173, '4', 'Negative experience'),
(144, 115, 142, '5', 'Negative experience'),
(145, 112, 195, '1', 'Positive experience'),
(146, 3, 131, '2', 'Positive experience'),
(147, 111, 146, '3', 'Positive experience'),
(148, 111, 142, '2', 'Negative experience'),
(149, 111, 188, '3', 'Negative experience'),
(150, 2, 155, '2', 'Positive experience'),
(151, 107, 187, '3', 'Negative experience'),
(152, 107, 116, '5', 'Positive experience'),
(153, 2, 206, '3', 'Positive experience'),
(154, 113, 218, '2', 'Positive experience'),
(155, 114, 135, '4', 'Negative experience'),
(156, 111, 145, '3', 'Negative experience'),
(157, 2, 198, '3', 'Positive experience'),
(158, 113, 131, '4', 'Negative experience'),
(159, 2, 178, '4', 'Negative experience'),
(160, 107, 148, '2', 'Positive experience'),
(161, 111, 138, '3', 'Negative experience'),
(162, 112, 168, '4', 'Positive experience'),
(163, 115, 129, '1', 'Negative experience'),
(164, 113, 161, '4', 'Positive experience'),
(165, 114, 104, '1', 'Positive experience'),
(166, 107, 140, '4', 'Positive experience'),
(167, 112, 136, '3', 'Positive experience');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_status` varchar(50) NOT NULL DEFAULT 'Active',
  `user_profile` varchar(100) NOT NULL DEFAULT 'System Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `username`, `password`, `user_status`, `user_profile`) VALUES
(1, 'jean', 'jean', '123456', 'Active', 'System Admin'),
(2, 'John', 'John', '654321', 'Active', 'Real Estate Agent'),
(3, 'Jon', 'Jon', '142536', 'Active', 'Real Estate Agent'),
(103, 'sell1', 'sell1', 'sell1', 'Active', 'Seller'),
(104, 'sell2', 'sell2', 'sell2', 'Active', 'Seller'),
(105, 'buy1', 'buy1', 'buy1', 'Active', 'Buyer'),
(106, 'buy2', 'buy2', 'buy2', 'Active', 'Buyer'),
(107, 'rea1', 'rea1', 'rea1', 'Active', 'Real Estate Agent'),
(108, 'rea2', 'rea2', 'rea2', 'Active', 'Real Estate Agent'),
(109, 'sa1', 'sa1', 'sa1', 'Active', 'System Admin'),
(110, 'sa2', 'sa2', 'sa2', 'Active', 'System Admin'),
(111, 'GeorgeREA', 'GeorgeREA', 'GeorgeREA', 'Active', 'Real Estate Agent'),
(112, 'LewisREA', 'LewisREA', 'LewisREA', 'Active', 'Real Estate Agent'),
(113, 'KamalaREA', 'KamalaREA', 'KamalaREA', 'Active', 'Real Estate Agent'),
(114, 'JaneREA', 'JaneREA', 'JaneRea', 'Active', 'Real Estate Agent'),
(115, 'DexterREA', 'DexterREA', 'DexterRea', 'Active', 'Real Estate Agent'),
(116, 'LarrySell', 'LarrySell', 'LarrySell', 'Active', 'Seller'),
(117, 'HarrySell', 'HarrySell', 'HarrySell', 'Active', 'Seller'),
(118, 'PaulSell', 'PaulSell', 'PaulSell', 'Active', 'Seller'),
(119, 'JohanSell', 'JohanSell', 'JohanSell', 'Active', 'Seller'),
(120, 'VictoriaSell', 'VictoriaSell', 'VictoriaSell', 'Active', 'Seller'),
(121, 'BarrySell', 'BarrySell', 'BarrySell', 'Active', 'Seller'),
(122, 'LunaSell', 'LunaSell', 'LunaSell', 'Active', 'Seller'),
(123, 'ScarlettSell', 'ScarlettSell', 'ScarlettSell', 'Active', 'Seller'),
(124, 'OverlordSA', 'OverlordSA', 'OverlordSA', 'Active', 'System Admin'),
(125, 'Darkstar', 'DarkstarSA', 'DarkstarSA', 'Active', 'System Admin'),
(126, 'AliceSell', 'AliceSell', 'AliceSell', 'Active', 'Seller'),
(127, 'BobSell', 'BobSell', 'BobSell', 'Active', 'Seller'),
(128, 'CharlieSell', 'CharlieSell', 'CharlieSell', 'Active', 'Seller'),
(129, 'DavidSell', 'DavidSell', 'DavidSell', 'Active', 'Seller'),
(130, 'EveSell', 'EveSell', 'EveSell', 'Active', 'Seller'),
(131, 'FrankSell', 'FrankSell', 'FrankSell', 'Active', 'Seller'),
(132, 'GraceSell', 'GraceSell', 'GraceSell', 'Active', 'Seller'),
(133, 'HannahSell', 'HannahSell', 'HannahSell', 'Active', 'Seller'),
(134, 'IsaacSell', 'IsaacSell', 'IsaacSell', 'Active', 'Seller'),
(135, 'JackSell', 'JackSell', 'JackSell', 'Active', 'Seller'),
(136, 'KennySell', 'KennySell', 'KennySell', 'Active', 'Seller'),
(137, 'LauraSell', 'LauraSell', 'LauraSell', 'Active', 'Seller'),
(138, 'MonaSell', 'MonaSell', 'MonaSell', 'Active', 'Seller'),
(139, 'NinaSell', 'NinaSell', 'NinaSell', 'Active', 'Seller'),
(140, 'OliverSell', 'OliverSell', 'OliverSell', 'Active', 'Seller'),
(141, 'PeterSell', 'PeterSell', 'PeterSell', 'Active', 'Seller'),
(142, 'QuincySell', 'QuincySell', 'QuincySell', 'Active', 'Seller'),
(143, 'RachelSell', 'RachelSell', 'RachelSell', 'Active', 'Seller'),
(144, 'SteveSell', 'SteveSell', 'SteveSell', 'Active', 'Seller'),
(145, 'TinaSell', 'TinaSell', 'TinaSell', 'Active', 'Seller'),
(146, 'AlexBuy', 'AlexBuy', 'AlexBuy', 'Active', 'Buyer'),
(147, 'BettyBuy', 'BettyBuy', 'BettyBuy', 'Active', 'Buyer'),
(148, 'CarlBuy', 'CarlBuy', 'CarlBuy', 'Active', 'Buyer'),
(149, 'DianeBuy', 'DianeBuy', 'DianeBuy', 'Active', 'Buyer'),
(150, 'EthanBuy', 'EthanBuy', 'EthanBuy', 'Active', 'Buyer'),
(151, 'FionaBuy', 'FionaBuy', 'FionaBuy', 'Active', 'Buyer'),
(152, 'GeorgeBuy', 'GeorgeBuy', 'GeorgeBuy', 'Active', 'Buyer'),
(153, 'HelenBuy', 'HelenBuy', 'HelenBuy', 'Active', 'Buyer'),
(154, 'IanBuy', 'IanBuy', 'IanBuy', 'Active', 'Buyer'),
(155, 'JanetBuy', 'JanetBuy', 'JanetBuy', 'Active', 'Buyer'),
(156, 'KarlBuy', 'KarlBuy', 'KarlBuy', 'Active', 'Buyer'),
(157, 'LilyBuy', 'LilyBuy', 'LilyBuy', 'Active', 'Buyer'),
(158, 'MikeBuy', 'MikeBuy', 'MikeBuy', 'Active', 'Buyer'),
(159, 'NoraBuy', 'NoraBuy', 'NoraBuy', 'Active', 'Buyer'),
(160, 'OscarBuy', 'OscarBuy', 'OscarBuy', 'Active', 'Buyer'),
(161, 'PaulaBuy', 'PaulaBuy', 'PaulaBuy', 'Active', 'Buyer'),
(162, 'QuinnBuy', 'QuinnBuy', 'QuinnBuy', 'Active', 'Buyer'),
(163, 'RitaBuy', 'RitaBuy', 'RitaBuy', 'Active', 'Buyer'),
(164, 'SamBuy', 'SamBuy', 'SamBuy', 'Active', 'Buyer'),
(165, 'TaraBuy', 'TaraBuy', 'TaraBuy', 'Active', 'Buyer'),
(166, 'UmaBuy', 'UmaBuy', 'UmaBuy', 'Active', 'Buyer'),
(167, 'VinceBuy', 'VinceBuy', 'VinceBuy', 'Active', 'Buyer'),
(168, 'WendyBuy', 'WendyBuy', 'WendyBuy', 'Active', 'Buyer'),
(169, 'XanderBuy', 'XanderBuy', 'XanderBuy', 'Active', 'Buyer'),
(170, 'YvonneBuy', 'YvonneBuy', 'YvonneBuy', 'Active', 'Buyer'),
(171, 'ZackBuy', 'ZackBuy', 'ZackBuy', 'Active', 'Buyer'),
(172, 'AdamBuy', 'AdamBuy', 'AdamBuy', 'Active', 'Buyer'),
(173, 'BellaBuy', 'BellaBuy', 'BellaBuy', 'Active', 'Buyer'),
(174, 'CathyBuy', 'CathyBuy', 'CathyBuy', 'Active', 'Buyer'),
(175, 'DerekBuy', 'DerekBuy', 'DerekBuy', 'Active', 'Buyer'),
(176, 'EliBuy', 'EliBuy', 'EliBuy', 'Active', 'Buyer'),
(177, 'FaithBuy', 'FaithBuy', 'FaithBuy', 'Active', 'Buyer'),
(178, 'GarryBuy', 'GarryBuy', 'GarryBuy', 'Active', 'Buyer'),
(179, 'HollyBuy', 'HollyBuy', 'HollyBuy', 'Active', 'Buyer'),
(180, 'IvyBuy', 'IvyBuy', 'IvyBuy', 'Active', 'Buyer'),
(181, 'JakeBuy', 'JakeBuy', 'JakeBuy', 'Active', 'Buyer'),
(182, 'KaraBuy', 'KaraBuy', 'KaraBuy', 'Active', 'Buyer'),
(183, 'LiamBuy', 'LiamBuy', 'LiamBuy', 'Active', 'Buyer'),
(184, 'MilaBuy', 'MilaBuy', 'MilaBuy', 'Active', 'Buyer'),
(185, 'NoahBuy', 'NoahBuy', 'NoahBuy', 'Active', 'Buyer'),
(186, 'OwenBuy', 'OwenBuy', 'OwenBuy', 'Active', 'Buyer'),
(187, 'PennyBuy', 'PennyBuy', 'PennyBuy', 'Active', 'Buyer'),
(188, 'QuincyBuy', 'QuincyBuy', 'QuincyBuy', 'Active', 'Buyer'),
(189, 'RubyBuy', 'RubyBuy', 'RubyBuy', 'Active', 'Buyer'),
(190, 'SethBuy', 'SethBuy', 'SethBuy', 'Active', 'Buyer'),
(191, 'TinaBuy', 'TinaBuy', 'TinaBuy', 'Active', 'Buyer'),
(192, 'UrsulaBuy', 'UrsulaBuy', 'UrsulaBuy', 'Active', 'Buyer'),
(193, 'VictorBuy', 'VictorBuy', 'VictorBuy', 'Active', 'Buyer'),
(194, 'WillaBuy', 'WillaBuy', 'WillaBuy', 'Active', 'Buyer'),
(195, 'XenaBuy', 'XenaBuy', 'XenaBuy', 'Active', 'Buyer'),
(196, 'YaraBuy', 'YaraBuy', 'YaraBuy', 'Active', 'Buyer'),
(197, 'ZaneBuy', 'ZaneBuy', 'ZaneBuy', 'Active', 'Buyer'),
(198, 'AmberBuy', 'AmberBuy', 'AmberBuy', 'Active', 'Buyer'),
(199, 'BlakeBuy', 'BlakeBuy', 'BlakeBuy', 'Active', 'Buyer'),
(200, 'CaraBuy', 'CaraBuy', 'CaraBuy', 'Active', 'Buyer'),
(201, 'DeanBuy', 'DeanBuy', 'DeanBuy', 'Active', 'Buyer'),
(202, 'EllaBuy', 'EllaBuy', 'EllaBuy', 'Active', 'Buyer'),
(203, 'FelixBuy', 'FelixBuy', 'FelixBuy', 'Active', 'Buyer'),
(204, 'GinaBuy', 'GinaBuy', 'GinaBuy', 'Active', 'Buyer'),
(205, 'HarryBuy', 'HarryBuy', 'HarryBuy', 'Active', 'Buyer'),
(206, 'IslaBuy', 'IslaBuy', 'IslaBuy', 'Active', 'Buyer'),
(207, 'JohnBuy', 'JohnBuy', 'JohnBuy', 'Active', 'Buyer'),
(208, 'KylieBuy', 'KylieBuy', 'KylieBuy', 'Active', 'Buyer'),
(209, 'LeoBuy', 'LeoBuy', 'LeoBuy', 'Active', 'Buyer'),
(210, 'MiaBuy', 'MiaBuy', 'MiaBuy', 'Active', 'Buyer'),
(211, 'NinaBuy', 'NinaBuy', 'NinaBuy', 'Active', 'Buyer'),
(212, 'OllieBuy', 'OllieBuy', 'OllieBuy', 'Active', 'Buyer'),
(213, 'PaulaBuy', 'PaulaBuy', 'PaulaBuy', 'Active', 'Buyer'),
(214, 'QuinnBuy', 'QuinnBuy', 'QuinnBuy', 'Active', 'Buyer'),
(215, 'RosaBuy', 'RosaBuy', 'RosaBuy', 'Active', 'Buyer'),
(216, 'SimonBuy', 'SimonBuy', 'SimonBuy', 'Active', 'Buyer'),
(217, 'TaraBuy', 'TaraBuy', 'TaraBuy', 'Active', 'Buyer'),
(218, 'UriBuy', 'UriBuy', 'UriBuy', 'Active', 'Buyer'),
(219, 'VeraBuy', 'VeraBuy', 'VeraBuy', 'Active', 'Buyer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `propertylisting_id` (`propertylisting_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`userprofile_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertylisting_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `realestate_id` (`realestate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1768;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertylisting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1883;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`propertylisting_id`) REFERENCES `property` (`propertylisting_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_ibfk_4` FOREIGN KEY (`agent_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`realestate_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
