-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2022 at 02:16 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19435639_buksu_guidance_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `apointment_date`
--

CREATE TABLE `apointment_date` (
  `id` int(11) NOT NULL,
  `apointment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apointment_date`
--

INSERT INTO `apointment_date` (`id`, `apointment_date`) VALUES
(116, '2022-09-27'),
(117, '2022-09-28'),
(118, '2022-09-29'),
(119, '2022-09-30'),
(120, '2022-10-01'),
(121, '2022-10-02'),
(122, '2022-10-03'),
(123, '2022-10-23'),
(124, '2022-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `apointment_time`
--

CREATE TABLE `apointment_time` (
  `id` int(11) NOT NULL,
  `apointment_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apointment_time`
--

INSERT INTO `apointment_time` (`id`, `apointment_time`) VALUES
(378, '8:00-8:20 Am'),
(379, '8:30-8:50 Am'),
(380, '9:00-9:20 Am'),
(383, '10:30-10:50 Am'),
(384, '11:00-11:20 Am'),
(385, '1:00-1:20 Pm'),
(386, '1:30-1:50 Pm'),
(387, '2:00-2:20 Pm'),
(389, '3:00-3:20 Pm'),
(390, '3:30-3:50 Pm'),
(391, '4:00-4:20 Pm'),
(392, '4:30-4:50 Pm'),
(393, '8:00-8:20 Am'),
(394, '8:30-8:50 Am'),
(395, '9:00-9:20 Am'),
(398, '10:30-10:50 Am'),
(399, '11:00-11:20 Am'),
(400, '1:00-1:20 Pm'),
(401, '1:30-1:50 Pm'),
(402, '2:00-2:20 Pm'),
(404, '3:00-3:20 Pm'),
(405, '3:30-3:50 Pm'),
(406, '4:00-4:20 Pm'),
(407, '4:30-4:50 Pm'),
(408, '8:30-8:50 Am'),
(409, '9:00-9:20 Am'),
(412, '10:30-10:50 Am'),
(413, '11:00-11:20 Am'),
(414, '1:00-1:20 Pm'),
(415, '1:30-1:50 Pm'),
(416, '2:00-2:20 Pm'),
(418, '3:00-3:20 Pm'),
(419, '3:30-3:50 Pm'),
(420, '4:00-4:20 Pm'),
(421, '8:00-8:20 Am'),
(422, '8:30-8:50 Am'),
(423, '9:00-9:20 Am'),
(426, '10:30-10:50 Am'),
(427, '11:00-11:20 Am'),
(428, '1:00-1:20 Pm'),
(429, '1:30-1:50 Pm'),
(430, '2:00-2:20 Pm'),
(432, '8:00-8:20 Am'),
(433, '8:30-8:50 Am'),
(434, '9:00-9:20 Am'),
(437, '10:30-10:50 Am'),
(438, '11:00-11:20 Am'),
(439, '1:00-1:20 Pm'),
(440, '1:30-1:50 Pm'),
(441, '8:00-8:20 Am'),
(442, '8:30-8:50 Am'),
(443, '9:00-9:20 Am'),
(446, '10:30-10:50 Am'),
(447, '11:00-11:20 Am'),
(448, '8:00-8:20 Am'),
(449, '8:30-8:50 Am'),
(450, '9:00-9:20 Am'),
(453, '8:00-8:20 Am'),
(454, '8:30-8:50 Am'),
(455, '9:00-9:20 Am'),
(456, '9:30-9:50 Am'),
(458, '10:30-10:50 Am'),
(459, '11:00-11:20 Am'),
(460, '1:00-1:20 Pm'),
(461, '1:30-1:50 Pm'),
(462, '2:00-2:20 Pm'),
(463, '2:30-2:50 Pm'),
(464, '8:00-8:20 Am'),
(465, '8:30-8:50 Am'),
(466, '9:00-9:20 Am'),
(467, '9:30-9:50 Am'),
(468, '10:00-10:20 Am'),
(469, '10:30-10:50 Am'),
(470, '11:00-11:20 Am'),
(471, '1:00-1:20 Pm'),
(472, '1:30-1:50 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `college_list`
--

CREATE TABLE `college_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_list`
--

INSERT INTO `college_list` (`id`, `name`, `added_at`) VALUES
(1, 'College of Administration', '0000-00-00'),
(2, 'College of Nursing', '2022-06-05'),
(3, 'College of Business', '2022-06-05'),
(4, 'College of Education', '2022-06-05'),
(5, 'College of Arts and Sciences', '2022-06-05'),
(6, 'College of Technologies', '2022-06-05'),
(7, 'College of Law', '2022-06-05'),
(8, 'NSTP Unit', '2022-06-05'),
(10, 'Doctoral Programs', '2022-07-05'),
(11, 'Masters Degree Programs', '2022-07-05'),
(18, 'Non-Teaching Employee Association', '2022-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `counseling_appointment`
--

CREATE TABLE `counseling_appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college_of` varchar(200) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `preferred_mode` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `facebook_account` varchar(50) NOT NULL,
  `prefered_time` varchar(20) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp(),
  `date_prefer` varchar(50) NOT NULL,
  `room` varchar(100) NOT NULL,
  `catered_by` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL,
  `outcome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counseling_appointment`
--

INSERT INTO `counseling_appointment` (`id`, `name`, `email`, `college_of`, `year_level`, `course`, `age`, `gender`, `preferred_mode`, `phone_number`, `facebook_account`, `prefered_time`, `added_at`, `date_prefer`, `room`, `catered_by`, `status`, `outcome`) VALUES
(129, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in English Language', 24, 'Male', 'Call and Text', '9958474853', '', '9:00-9:30 ', '2022-07-27', '2022-07-19', '', '', 'noaction', ''),
(130, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(131, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(132, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(133, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(134, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(135, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(136, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(137, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(138, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(139, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(140, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(141, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(142, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', 'Room5 - College of FF', 'Nelyn Octaviano', 'Approved', 'Successfully Address'),
(143, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(144, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(145, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(146, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(147, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', 'COE Counselor', 'noaction', ''),
(148, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', '', 'COE Counselor', 'noaction', ''),
(149, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', 'Reject--Emergency', 'Chritzan Sawayan', 'Reject', ''),
(150, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', 'Approved-Room 7 - College of Bagsak', 'counselor', 'Approved', ''),
(151, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 24, 'Male', 'Call and Text', '9958474853', '', '10:00-10:3', '2022-07-28', '2022-07-19', 'Room 5 - Pag-asa bagsak college', 'Chritzan Andaliston Sawayan', 'Done', 'Successfully Address'),
(152, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Philosophy', 24, 'Male', 'Call and Text', '9958474853', '', '8:30-9:00 ', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(153, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Philosophy', 24, 'Male', 'Call and Text', '9958474853', '', '8:30-9:00 ', '2022-07-28', '2022-07-19', '', '', 'noaction', ''),
(154, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'NSTP Unit', '2nd Year', 'Literacy Training Service', 18, 'Male', 'Call and Text', '9958474853', '', '8:30-8:50 ', '2022-07-29', '2022-07-29', '', '', 'noaction', ''),
(155, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in English Language', 24, 'Male', 'Video Call', '9958474853', 'chritzan', '10:00-10:2', '2022-08-02', '2022-07-29', '', '', 'noaction', ''),
(156, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Science in Biology major in Biotechnology', 18, 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(157, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Science in Biology major in Biotechnology', 18, 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(158, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Science in Biology major in Biotechnology', 18, 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(159, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 22, 'Male', 'Face to Face', '', '', '8:00-8:20 Am', '2022-08-22', '2022-07-29', 'Room 7 - College of Chix', 'notset', 'Approved', 'notset'),
(160, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 'College of Education', '4th Year', 'Bachelor of Early Childhood Education', 22, 'Male', 'Face to Face', '', '', '8:30-8:50 Am', '2022-08-22', '2022-07-29', '', 'Chritzan Sawayan', 'Reject', 'notset'),
(161, 'Angelica Maguincol', 'jadmanangel@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 22, 'Female', 'Call and Text', '09678674899', '', '10:00-10:20 Am', '2022-08-23', '2022-08-23', 'Room 8 - College of Lier', 'Chritzan Andaliston Sawayan', 'Done', 'Need to Request Again'),
(162, 'Jdjdjsj', 'Jdjsj@jdjr', 'College of Technologies', '3rd Year', 'Bachelor of Science in Electronics Technology', 21, 'Male', 'Face to Face', '', '', '9:30-9:50 Am', '2022-08-25', '2022-07-29', 'notset', 'notset', 'noaction', 'notset'),
(163, 'Chritzan Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in Filipino', 18, 'Male', 'Video Call', '9958474853', 'chritzan', '8:30-8:50 Am', '2022-08-26', '2022-08-23', 'Counselor Emergency Situation', 'Nelyn Octaviano', 'Done', 'Successfully Address'),
(164, 'Lizel Magtulis', '1801100171@student.buksu.edu.ph', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 22, 'Female', 'Call and Text', '09256484349', '', '9:00-9:20 Am', '2022-08-30', '2022-08-23', 'Approved--Room 4 - College of Bagsak', 'Chritzan Sawayan', 'Done', 'Successfully Address'),
(165, 'Phebe Billones', 'phebebilliones@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 22, 'Female', 'Face to Face', '', '', '8:00-8:20 Am', '2022-08-30', '2022-08-23', 'notset', 'notset', 'noaction', 'notset'),
(166, 'Phebi Billones', 'phebebilliones@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 22, 'Female', 'Call and Text', '09264578234', '', '10:00-10:20 Am', '2022-09-05', '2022-09-15', 'notset', 'notset', 'noaction', 'notset'),
(167, 'Danica P. Octaviano', '1901101091@student.buksu.edu.ph', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in Mathematics', 21, 'Female', 'Call and Text', '09246738221', '', '9:30-9:50 Am', '2022-09-05', '2022-09-15', 'Approved', 'Nelyn Octaviano', 'Approved', 'notset'),
(168, 'ZINAVIE LINOYAN LIBERTAD', 'libertadzinavie@gmail.com', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Arts in English Language', 24, 'Female', 'Face to Face', '', '', '8:00-8:20 Am', '2022-09-05', '2022-09-15', 'notset', 'notset', 'noaction', 'notset'),
(169, 'Yeanelyn P. Ponce', 'yeanelynp06@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', 21, 'Female', 'Face to Face', '', '', '9:00-9:20 Am', '2022-09-07', '2022-09-15', 'notset', 'notset', 'noaction', 'notset'),
(170, 'Mutia Jossie Mae', 'jossiemutia2000@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', 22, 'Female', 'Face to Face', '', '', '8:30-8:50 Am', '2022-09-07', '2022-09-15', 'notset', 'notset', 'noaction', 'notset'),
(171, 'Catian, Ron Francis', '190110464@student.buksu.edu.ph', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Sociology', 21, 'Male', 'Face to Face', '', '', '10:00-10:20 Am', '2022-09-09', '2022-09-14', 'notset', 'notset', 'noaction', 'notset'),
(172, 'Judyjr A. Mericuelo', 'mericuelojr@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Automotive Technology', 21, 'Male', 'Face to Face', '', '', '10:30-10:50 Am', '2022-09-09', '2022-09-13', 'notset', 'notset', 'noaction', 'notset'),
(173, 'Maria Katrina N. Badajos', 'badajosmariakatrina42@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Economics', 21, 'Female', 'Face to Face', '', '', '2:00-2:20 Pm', '2022-09-09', '2022-09-14', 'notset', 'notset', 'noaction', 'notset'),
(174, 'Jeff Neumann D. Saluntao', 'jnoatnulas23@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 22, 'Male', 'Face to Face', '', '', '11:00-11:20 Am', '2022-09-09', '2022-09-11', 'notset', 'notset', 'noaction', 'notset'),
(175, 'Donna Albarracin', 'babeynalbarracin@gmail.com', 'College of Technologies', '1st Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 18, 'Female', 'Call and Text', '09067093583', '', '1:30-1:50 Pm', '2022-09-09', '2022-09-12', 'notset', 'notset', 'noaction', 'notset'),
(176, 'Donna Albarracin', 'babeynalbarracin00@gmail.com', 'College of Technologies', '1st Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 18, 'Female', 'Call and Text', '09067093583', '', '4:00-4:20 Pm', '2022-09-09', '2022-09-14', 'Approved--Room A138 - College of Arts and Sciences Building', 'Chritzan Sawayan', 'Approved', 'notset'),
(177, 'Lizel Casuyon', 'casuyonlizel@gmail.com', 'College of Arts and Sciences', '1st Year', 'Bachelor of Arts in Economics', 19, 'Female', 'Face to Face', '', '', '9:30-9:50 Am', '2022-09-10', '2022-09-14', 'notset', 'notset', 'noaction', 'notset'),
(178, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', '', '', 24, 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', '2022-09-13', '2022-09-12', 'notset', 'notset', 'noaction', 'notset'),
(179, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', 24, 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', '2022-09-13', '2022-09-12', 'notset', 'notset', 'noaction', 'notset'),
(180, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', '', '', 24, 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', '2022-09-13', '2022-09-12', 'notset', 'notset', 'noaction', 'notset'),
(181, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', 24, 'Male', 'Face to Face', '9958474853', '', '1:00-1:20 Pm', '2022-09-13', '2022-09-11', 'notset', 'notset', 'noaction', 'notset'),
(182, 'Chritzan A', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', 23, 'Male', 'Face to Face', '09652158039', '', '2:00-2:20 Pm', '2022-09-16', '2022-09-28', 'notset', 'notset', 'noaction', 'notset'),
(183, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', 24, 'Male', 'Call and Text', '9958474853', '', '1:30-1:50 Pm', '2022-09-17', '2022-09-11', 'notset', 'notset', 'noaction', 'notset'),
(184, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Administration', '2nd Year', 'Bachelor of Public Administration', 24, 'Male', 'Call and Text', '9958474853', '', '9:30-9:50 Am', '2022-10-23', '2022-09-27', 'notset', 'notset', 'noaction', 'notset'),
(185, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Administration', '2nd Year', 'Bachelor of Public Administration', 24, 'Male', 'Call and Text', '9958474853', '', '2:30-2:50 Pm', '2022-10-23', '2022-09-29', 'Approved--Room 5 - College of Magna 9 years', 'COA counselor', 'Approved', 'notset'),
(186, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Administration', '4th Year', 'Bachelor of Public Administration', 24, 'Male', 'Video Call', '9958474853', 'chritzan', '10:00-10:20 Am', '2022-10-23', '2022-09-27', 'Approved--Room 45 - College of Business', 'COA counselor', 'Done', 'Successfully Address');

-- --------------------------------------------------------

--
-- Table structure for table `counselor_user`
--

CREATE TABLE `counselor_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(150) NOT NULL,
  `college` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counselor_user`
--

INSERT INTO `counselor_user` (`id`, `username`, `email`, `password`, `access`, `college`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin01', 'Administrator', 'Guidance Office', 'Active'),
(2, 'COE Counselor', 'coecounselor@gmail.com', 'counselor01', 'Counselor', 'College of Education', 'Active'),
(29, 'CAS Dean', 'casdean@gmail.com', 'dean02', 'Dean', 'College of Arts and Sciences', 'Active'),
(33, 'Chritzan Andaliston Sawayan', 'faculty@gmail.com', 'faculty01', 'Faculty', 'Doctoral Programs', 'Active'),
(34, 'Chritzan Andaliston Sawayan', 'sawayanc@gmail.com', 'chritzan@01', 'Counselor', 'College of Arts and Sciences', 'Active'),
(35, 'Lizel Magtulis', 'lizel@gmail.com', 'lizel123', 'Faculty', 'College of Law', 'Active'),
(39, 'Nelyn Octaviano', 'nelynlibrando29@gmail.com', 'nelyn01', 'Counselor', 'College of Administration', 'Active'),
(40, 'Jaymar Octaviano', 'jaymar@gmail.com', 'jaymar123', 'Administrator', 'Guidance Office', 'Active'),
(43, 'Chritzan Sawayan', 'cotcounselor@gmail.com', 'cotcounselor01', 'Counselor', 'College of Technologies', 'Active'),
(44, 'COE Dean', 'coedean@gmail.com', 'dean01', 'Dean', 'College of Education', 'Active'),
(45, 'Lizel Casuyon', 'lizel@gmail.com', 'caedean01', 'Dean', 'College of Education', 'Active'),
(46, 'Guidance Office Staff', 'guidancestaff@gmail.com', 'guidance01', 'Administrator', 'Guidance Office', 'Active'),
(48, 'COA counselor', 'coacounselor@gmail.com', 'counselor012', 'Counselor', 'College of Administration', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `courses_list`
--

CREATE TABLE `courses_list` (
  `id` int(11) NOT NULL,
  `college` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses_list`
--

INSERT INTO `courses_list` (`id`, `college`, `name`, `added_at`) VALUES
(3, 'College of Administration', 'Bachelor of Public Administration', '2022-06-05'),
(4, 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-06-05'),
(5, 'College of Technologies', 'Bachelor of Science in Information Technology', '2022-06-06'),
(6, 'College of Technologies', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Game Development', '2022-06-06'),
(7, 'College of Education', 'Bachelor of Elementary Education', '2022-06-16'),
(8, 'College of Education', 'Bachelor of Early Childhood Education', '2022-06-16'),
(9, 'College of Education', 'Bachelor of Elementary Education', '2022-06-16'),
(10, 'College of Education', 'Bachelor of Physical Education', '2022-06-16'),
(12, 'College of Education', 'Bachelor of Secondary Education Major in Science', '2022-06-16'),
(13, 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-06-16'),
(14, 'College of Education', 'Bachelor of Secondary Education Major in Filipino', '2022-06-16'),
(15, 'College of Education', 'Bachelor of Secondary Education Major in Social Studies', '2022-06-16'),
(16, 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-06-16'),
(17, 'College of Arts and Sciences', 'Bachelor of Arts in Philosophy', '2022-06-16'),
(18, 'College of Arts and Sciences', 'Bachelor of Arts in Social Science', '2022-06-16'),
(19, 'College of Arts and Sciences', 'Bachelor of Arts in Sociology', '2022-06-16'),
(20, 'College of Arts and Sciences', 'Bachelor of Science in Community Development', '2022-06-16'),
(21, 'College of Arts and Sciences', 'Bachelor of Science in Development Communication', '2022-06-16'),
(22, 'College of Arts and Sciences', 'Bachelor of Science in Mathematics', '2022-06-16'),
(23, 'College of Arts and Sciences', 'Bachelor of Science in Biology major in Biotechnology', '2022-06-16'),
(24, 'College of Arts and Sciences', 'Bachelor of Science in Environmental Science major in Environmental Heritage Studies', '2022-06-16'),
(25, 'College of Business', 'Bachelor of Science in Accountancy', '2022-06-16'),
(26, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '2022-06-16'),
(27, 'College of Business', 'Bachelor of Science in Hospitality Management', '2022-06-16'),
(28, 'College of Technologies', 'Bachelor of Science in Automotive Technology', '2022-06-16'),
(29, 'College of Nursing', 'Bachelor of Science in Nursing', '2022-06-16'),
(31, 'College of Law', 'Bachelor of Science in Law', '2022-06-16'),
(32, 'College of Technologies', 'Bachelor of Science in Electronics Technology', '2022-06-16'),
(33, 'College of Technologies', 'Bachelor of Science in Food Technology', '2022-06-16'),
(34, 'College of Technologies', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', '2022-06-16'),
(35, 'Doctoral Programs', 'Doctor of Philosophy in Education Major in Instructional System Design', '2022-07-05'),
(36, 'Doctoral Programs', 'Doctor of Philosophy in English Language', '2022-07-05'),
(37, 'Doctoral Programs', 'Doctor of Philosophy in in Educational Administration', '2022-07-05'),
(38, 'Doctoral Programs', 'Doctor of Philosophy in Science Education Major in Mathematics', '2022-07-05'),
(39, 'Doctoral Programs', 'Doctor of Philosophy in Science Education Major in Biology', '2022-07-05'),
(40, 'Doctoral Programs', 'Doctor of Public Administration', '2022-07-05'),
(41, 'Masters Degree Programs', 'Master of Arts in Education Major in Educational Administration', '2022-07-05'),
(42, 'Masters Degree Programs', 'Master of Arts in Education Major in English Language Teaching', '2022-07-05'),
(43, 'Masters Degree Programs', 'Master of Arts in Education Major in General Science', '2022-07-05'),
(44, 'Masters Degree Programs', 'Master of Arts in Education Major in Guidance and Counseling', '2022-07-05'),
(45, 'Masters Degree Programs', 'Master of Arts in Education Major in Mathematics Education', '2022-07-05'),
(46, 'Masters Degree Programs', 'Master of Arts in Education Major in Mathematics Teaching', '2022-07-05'),
(47, 'Masters Degree Programs', 'Master of Arts in English Language', '2022-07-05'),
(48, 'Masters Degree Programs', 'Master of Arts in Sociology', '2022-07-05'),
(49, 'Masters Degree Programs', 'Master of Business Administration', '2022-07-05'),
(50, 'Masters Degree Programs', 'Master of Public Administration', '2022-07-05'),
(51, 'NSTP Unit', 'Civic Welfare Training Service', '2022-07-19'),
(52, 'NSTP Unit', 'Literacy Training Service', '2022-07-19'),
(53, 'NSTP Unit', 'Reserve Officers Training Corps', '2022-07-19'),
(62, 'College of Education', 'Bachelor of Secondary Education Major in Mathematics', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `exit_interview`
--

CREATE TABLE `exit_interview` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `college` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `select_date` varchar(100) NOT NULL,
  `best_part` varchar(500) NOT NULL,
  `worst_part` varchar(500) NOT NULL,
  `like_best` varchar(500) NOT NULL,
  `like_least` varchar(500) NOT NULL,
  `immediate_plans` varchar(500) NOT NULL,
  `long_term_goal` varchar(500) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exit_interview`
--

INSERT INTO `exit_interview` (`id`, `name`, `email`, `age`, `gender`, `college`, `course`, `select_date`, `best_part`, `worst_part`, `like_best`, `like_least`, `immediate_plans`, `long_term_goal`, `home_address`, `phone_number`, `added_at`) VALUES
(810, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 23, 'Male', 'College of NSTP', 'Bachelor of Science in NSTP', '2022-07-19', '                  best part is learning               ', 'worst part is failure', 'like best is academic', 'like least is writing', 'immediate plan is life', 'long term foal is future', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-19'),
(811, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(812, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(813, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(814, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(815, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(816, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(817, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(818, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(819, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(820, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(821, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(822, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(823, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(824, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(825, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(826, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(827, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(828, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(829, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(830, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(831, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(832, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(833, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(834, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(835, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(836, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(837, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(838, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(839, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(840, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(841, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(842, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(843, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(844, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(845, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(846, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(847, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(848, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(849, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(850, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(851, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(852, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(853, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(854, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(855, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(856, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(857, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(858, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(859, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(860, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(861, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(862, 'Angelica Maguincol', 'schritzan4@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-07-27', '                       dfhdh          ', 'dfhdh', 'dfhdh', 'dfhhd', 'fdhh', 'dfhdh', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-27'),
(863, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(864, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(865, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(866, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(867, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(868, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(869, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(870, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(871, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(872, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2022-07-28', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-28'),
(873, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Philosophy', '2022-07-29', '                                 learning 3 grade', 'grado bagsak', 'good grade with 3', 'dili graduate 3', 'ceo of bagsak grader', 'business of grade nagsak', 'tres grade zone 5 bagsak ', '9958474853', '2022-07-29'),
(874, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 24, 'Male', 'College of Technologies', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', '2022-08-02', '                     best part lang            ', 'worst part lang', 'liker best lang', 'like least lang', 'immediate plan lang', 'long-term gosl lsng', 'wala lang kasi bagsak', '9958474853', '2022-08-02'),
(875, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 24, 'Male', 'College of Administration', 'Bachelor of Public Administration', '2022-08-19', '                  fdsgsg               ', 'fdhdfh', 'fhdsh', 'fshs', 'sfhh', 'sfhsh', 'wala lang kasi bagsak', '9958474853', '2022-08-19'),
(876, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Philosophy', '2022-08-19', '    function please                            ', 'hahahaha', 'huhuhuhu', 'uwuu', 'sorry na', 'yehey', 'wala lang kasi bagsak', '9958474853', '2022-08-19'),
(877, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Arts and Sciences', 'Bachelor of Science in Biology major in Biotechnology', '2022-08-19', '               qw                  ', 'ewe', 'wew', 'werw', 'rwr', 'wrw', 'wala lang kasi bagsak', '9958474853', '2022-08-19'),
(878, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(879, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(880, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(881, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(882, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(883, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(884, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in English', '2022-08-22', '                    gjgf             ', 'fjgfj', 'ggd', 'nice', 'good', 'better', 'wala lang kasi bagsak', '9958474853', '2022-08-22'),
(885, 'Chritzan Saw ', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Nursing', 'Bachelor of Science in Nursing', '2022-08-22', '                                 Best', 'Least ', 'Like', 'Least ', 'Plan', 'Goal', 'Zone 1', '09652158039', '2022-08-22'),
(886, 'Chritzan Saw ', 'sawayan.chritzan143good@gmail.com', 18, 'Male', 'College of Nursing', 'Bachelor of Science in Nursing', '2022-08-22', '                                 Best', 'Least ', 'Like', 'Least ', 'Plan', 'Goal', 'Zone 1', '09652158039', '2022-08-22'),
(887, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 22, 'Male', 'College of Education', 'Bachelor of Early Childhood Education', '2022-08-22', '                        I learn how to being lazy', 'Ambot ato', 'Daghan chix', 'Daghan bayot uy', 'Teach students how to mythic in 1 week', 'My goal is to become a teacher to help Pakistan', 'Kalasungay', '096626089', '2022-08-22'),
(888, 'Angelica Maguincol', 'jadmanangel@gamil.com', 22, 'Female', 'College of Education', 'Bachelor of Elementary Education', '2022-08-23', '     Everything                            ', 'None', 'Everything', 'None', 'LET Review', 'To work in school', 'Kalasungay Malaybalay City', '09678674899', '2022-08-23'),
(889, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 18, 'Male', 'College of Education', 'Bachelor of Secondary Education Major in Filipino', '2022-08-26', '           What was the best part of your learning experience in BuKSU? Why?                      ', 'What was the worst part of your learning experience in BuKSU? Why?', 'What did you like best about your college/department?', 'What did you like least about your college/department?', 'What are your immediate plans? Employment or continue education? If education, what is your goal?', 'What is your long-term employment goal?', 'wala lang kasi bagsak', '9958474853', '2022-08-26'),
(890, 'Angelica Maguincol', 'schritzan4@gmail.com', 18, 'Female', 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '2022-10-23', '                                 ewsrw', 'ewtwtw', 'wetwt', 'ewt', 'wetw', 'wetwt', 'wala lang kasi bagsak', '9958474853', '2022-10-23'),
(891, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in Philosophy', '2022-10-23', '                                 rtyryu', 'rutru', 'rturu', 'rturu', 'rturu', 'rturu', 'wala lang kasi bagsak', '9958474853', '2022-10-23'),
(892, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 24, 'Male', 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '2022-10-23', '                               rtyr  ', 'yrturu', 'rturu', 'rutru', 'rturu', 'rturu', 'wala lang kasi bagsak', '9958474853', '2022-10-23'),
(893, 'adadadad', 'counselor@gmail.com', 0, 'Male', 'College of Administration', 'Bachelor of Public Administration', '2022-11-04', '          qwdq                       ', 'dqdq', 'dqdq', 'dq', 'dqdq', 'dqd', 'qdqd', '09246738221', '2022-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `exit_interview_download_form`
--

CREATE TABLE `exit_interview_download_form` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college_of` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exit_interview_download_form`
--

INSERT INTO `exit_interview_download_form` (`id`, `name`, `email`, `college_of`, `course`, `added_at`) VALUES
(35, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Law', 'Bachelor of Science in Law', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `google_oauth`
--

CREATE TABLE `google_oauth` (
  `id` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referral_counseling`
--

CREATE TABLE `referral_counseling` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college_of` varchar(100) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `course` varchar(200) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `preferred_mode` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `facebook_name` varchar(30) NOT NULL,
  `preferred_time` varchar(50) NOT NULL,
  `referrer` varchar(50) NOT NULL,
  `reason_for_referral` varchar(200) NOT NULL,
  `other_reason` varchar(100) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp(),
  `date_prefer` varchar(50) NOT NULL,
  `room` varchar(100) NOT NULL,
  `catered_by` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL,
  `outcome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_counseling`
--

INSERT INTO `referral_counseling` (`id`, `name`, `email`, `college_of`, `year_level`, `course`, `age`, `gender`, `preferred_mode`, `phone_number`, `facebook_name`, `preferred_time`, `referrer`, `reason_for_referral`, `other_reason`, `added_at`, `date_prefer`, `room`, `catered_by`, `status`, `outcome`) VALUES
(42, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', '23', 'Male', 'Video Call', '9958474853', 'Chritzan Sawayan', '08:00:00', 'Gil Nicholas Cagande', 'Mauling/Maltreating', '', '2022-07-19', '2022-07-19', '                                                                                Room 8 - College of ', '', 'noaction', 'already been successfully heal'),
(43, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Social Science', '0', 'Female', 'Call and Text', '9958474853', '', '09:30:00', 'Gil Nicholas Cagande', 'Vandalism', '', '2022-07-29', '2022-07-29', '', '', 'noaction', ''),
(44, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '3rd Year', 'Bachelor of Elementary Education', '0', 'Other', 'Video Call', '9958474853', 'Chritzan Sawayan', '10:00:00', 'Gil Nicholas Cagande', 'Chronic Sadness', '', '2022-08-02', '2022-07-29', '', 'Nelyn Octaviano', 'Done', 'Successfully Address'),
(45, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '8:00-8:20 Am', 'Gil Nicholas Cagande', 'Disrespectful', '', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(46, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '8:00-8:20 Am', 'Gil Nicholas Cagande', 'Disrespectful', '', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(47, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '8:00-8:20 Am', 'Gil Nicholas Cagande', 'Disrespectful', '', '2022-08-22', '2022-08-05', 'notset', 'notset', 'noaction', 'notset'),
(48, 'Chritzan Sawayan ', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Game Development', 'notset', 'Male', 'Call and Text', '09652158039', '', '8:30-8:50 Am', 'Gil Nicholas Cagande ', 'Excessive Worrying', '', '2022-08-25', '2022-07-29', 'notset', 'Chritzan Sawayan', 'noaction', 'notset'),
(49, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in English', 'notset', 'Male', 'Face to Face', '9958474853', '', '9:00-9:20 Am', 'Gil Nicholas Cagande', 'Stress', '', '2022-08-26', '2022-08-23', 'Room 7 - College of Buang', 'counselor', 'Done', 'Successfully Address'),
(50, 'Juan Dela Cruz', 'juan_1972@gmail.com', 'College of Arts and Sciences', '2nd Year', 'Bachelor of Arts in Economics', 'notset', 'Other', 'Face to Face', '', '', '11:00-11:20 Am', 'Ian Advincula', 'Absenteeism', '', '2022-09-09', '2022-09-13', 'notset', 'notset', 'noaction', 'notset'),
(51, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Education', '4th Year', 'Bachelor of Physical Education', 'notset', 'Female', 'Video Call', '9958474853', 'Chritzan Sawayan', '2:30-2:50 Pm', 'Chritzan Sawayan', 'Stress', '', '2022-09-16', '2022-09-11', '', 'Nelyn Octaviano', 'Approved', 'notset'),
(52, 'Chritzan Andaliston Sawayan', '1801101459@student.buksu.edu.ph', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '1:30-1:50 Pm', 'Gil Nicholas Cagande', 'Vandalism', '', '2022-09-22', '2022-09-11', 'Room A3201- College of Business Building', 'Chritzan Sawayan', 'Approved', 'notset'),
(53, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Administration', '4th Year', 'Bachelor of Public Administration', 'notset', 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', 'Gil Nicholas Cagande', 'Vandalism', '', '2022-10-23', '2022-09-27', 'Room 5 - Colle of Nursing', 'COA counselor', 'Done', 'Successfully Address');

-- --------------------------------------------------------

--
-- Table structure for table `referral_date`
--

CREATE TABLE `referral_date` (
  `id` int(11) NOT NULL,
  `referral_date` varchar(50) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_date`
--

INSERT INTO `referral_date` (`id`, `referral_date`, `added_at`) VALUES
(47, '2022-09-27', '2022-09-27'),
(48, '2022-09-28', '2022-09-27'),
(49, '2022-09-29', '2022-09-27'),
(50, '2022-09-30', '2022-09-27'),
(51, '2022-10-01', '2022-09-27'),
(52, '2022-10-02', '2022-09-27'),
(53, '2022-10-03', '2022-09-27'),
(54, '2022-10-23', '2022-10-23'),
(55, '2022-10-25', '2022-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `referral_reason_list`
--

CREATE TABLE `referral_reason_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_reason_list`
--

INSERT INTO `referral_reason_list` (`id`, `name`, `added_at`) VALUES
(2, 'Lying', '2022-06-06'),
(3, 'Need of Motivation', '2022-06-06'),
(4, 'Bullying', '2022-06-06'),
(5, 'Absenteeism', '2022-06-06'),
(7, 'Chronic Sadness', '2022-06-06'),
(8, 'Social/Relationship Concerns', '2022-06-06'),
(9, 'Litering', '2022-06-06'),
(10, 'Withdrawn', '2022-06-06'),
(11, 'Vandalism', '2022-06-06'),
(12, 'Family Concerns', '2022-06-06'),
(13, 'Cheating', '2022-06-06'),
(14, 'Disrespectful', '2022-06-06'),
(15, 'Excessive Worrying', '2022-06-06'),
(16, 'Failing Grade/s', '2022-06-06'),
(17, 'Fears', '2022-06-06'),
(18, 'Grief/Loss', '2022-06-06'),
(19, 'Hostility', '2022-06-06'),
(20, 'Inattentive', '2022-06-06'),
(21, 'Influence of Alcohol/Drugs', '2022-06-06'),
(22, 'Mauling/Maltreating', '2022-06-06'),
(23, 'References of Suicide', '2022-06-06'),
(24, 'Stealing', '2022-06-06'),
(25, 'Stress', '2022-06-06'),
(26, 'Late', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `referral_time`
--

CREATE TABLE `referral_time` (
  `id` int(11) NOT NULL,
  `referral_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_time`
--

INSERT INTO `referral_time` (`id`, `referral_time`) VALUES
(320, '8:00-8:20 Am'),
(321, '8:30-8:50 Am'),
(322, '9:00-9:20 Am'),
(323, '9:30-9:50 Am'),
(325, '10:30-10:50 Am'),
(326, '11:00-11:20 Am'),
(327, '1:00-1:20 Pm'),
(328, '1:30-1:50 Pm'),
(329, '2:00-2:20 Pm'),
(330, '2:30-2:50 Pm'),
(331, '3:00-3:20 Pm'),
(332, '3:30-3:50 Pm'),
(333, '4:00-4:20 Pm'),
(334, '4:30-4:50 Pm'),
(335, '8:00-8:20 Am'),
(336, '8:30-8:50 Am'),
(337, '9:00-9:20 Am'),
(338, '9:30-9:50 Am'),
(340, '10:30-10:50 Am'),
(341, '11:00-11:20 Am'),
(342, '1:00-1:20 Pm'),
(343, '1:30-1:50 Pm'),
(344, '2:00-2:20 Pm'),
(345, '2:30-2:50 Pm'),
(346, '3:00-3:20 Pm'),
(347, '3:30-3:50 Pm'),
(348, '4:00-4:20 Pm'),
(349, '4:30-4:50 Pm'),
(350, '8:30-8:50 Am'),
(351, '9:00-9:20 Am'),
(352, '9:30-9:50 Am'),
(354, '10:30-10:50 Am'),
(355, '11:00-11:20 Am'),
(356, '1:00-1:20 Pm'),
(357, '1:30-1:50 Pm'),
(358, '2:00-2:20 Pm'),
(359, '2:30-2:50 Pm'),
(360, '3:00-3:20 Pm'),
(361, '3:30-3:50 Pm'),
(362, '4:00-4:20 Pm'),
(363, '8:00-8:20 Am'),
(364, '8:30-8:50 Am'),
(365, '9:00-9:20 Am'),
(366, '9:30-9:50 Am'),
(368, '10:30-10:50 Am'),
(369, '11:00-11:20 Am'),
(370, '1:00-1:20 Pm'),
(371, '1:30-1:50 Pm'),
(372, '2:00-2:20 Pm'),
(373, '2:30-2:50 Pm'),
(374, '8:00-8:20 Am'),
(375, '8:30-8:50 Am'),
(376, '9:00-9:20 Am'),
(377, '9:30-9:50 Am'),
(379, '10:30-10:50 Am'),
(380, '11:00-11:20 Am'),
(381, '1:00-1:20 Pm'),
(382, '1:30-1:50 Pm'),
(383, '8:00-8:20 Am'),
(384, '8:30-8:50 Am'),
(385, '9:00-9:20 Am'),
(386, '9:30-9:50 Am'),
(388, '10:30-10:50 Am'),
(389, '11:00-11:20 Am'),
(390, '8:00-8:20 Am'),
(391, '8:30-8:50 Am'),
(392, '9:00-9:20 Am'),
(393, '9:30-9:50 Am'),
(395, '8:00-8:20 Am'),
(396, '8:30-8:50 Am'),
(397, '9:00-9:20 Am'),
(398, '9:30-9:50 Am'),
(400, '10:30-10:50 Am'),
(401, '11:00-11:20 Am'),
(402, '1:00-1:20 Pm'),
(403, '1:30-1:50 Pm'),
(404, '2:00-2:20 Pm'),
(405, '2:30-2:50 Pm'),
(406, '8:00-8:20 Am'),
(407, '8:30-8:50 Am'),
(408, '9:00-9:20 Am'),
(409, '9:30-9:50 Am'),
(410, '10:00-10:20 Am'),
(411, '10:30-10:50 Am'),
(412, '11:00-11:20 Am'),
(413, '1:00-1:20 Pm'),
(414, '1:30-1:50 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE `students_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `yearlevel` varchar(50) NOT NULL,
  `course` varchar(200) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `preferredmode` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `preferredtime` varchar(100) NOT NULL,
  `servicerequested` varchar(100) NOT NULL,
  `referreddate` varchar(100) NOT NULL,
  `referrer` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `otherreason` varchar(100) NOT NULL,
  `bestpart` varchar(200) NOT NULL,
  `worstpart` varchar(200) NOT NULL,
  `likebest` varchar(200) NOT NULL,
  `likeleast` varchar(200) NOT NULL,
  `immediateplan` varchar(200) NOT NULL,
  `longtermgoal` varchar(200) NOT NULL,
  `homeaddress` varchar(200) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `newlyhired` varchar(100) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`id`, `name`, `email`, `college`, `yearlevel`, `course`, `age`, `gender`, `preferredmode`, `phonenumber`, `facebook`, `preferredtime`, `servicerequested`, `referreddate`, `referrer`, `reason`, `otherreason`, `bestpart`, `worstpart`, `likebest`, `likeleast`, `immediateplan`, `longtermgoal`, `homeaddress`, `purpose`, `newlyhired`, `added_at`) VALUES
(1, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(2, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(3, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(4, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(5, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(6, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(7, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(8, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(9, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(10, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(11, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(12, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(13, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(14, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(15, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(16, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(17, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(18, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(19, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(20, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(21, 'Chritzan Sawayan', 'tresgrado@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '24', 'Male', 'Call and Text', '9958474853', '', '10:00-10:30 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(22, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(23, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(24, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(25, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(26, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(27, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(28, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(29, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(30, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(31, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(32, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(33, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(34, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(35, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(36, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(37, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(38, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(39, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(40, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(41, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(42, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 'College of Education', '2nd Year', 'Bachelor of Elementary Education', '0', 'Male', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'Employment (Human Resource)', '', '2022-07-28'),
(43, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 'College of Arts and Sciences', '', 'Bachelor of Arts in Economics', '24', 'Male', '', '9958474853', '', '', 'Exit Interview', '', '', '', '', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '', '', '2022-07-28'),
(44, 'Chritzan Andaliston Sawayan', 'wanabagsak@gmail.com', 'College of Arts and Sciences', '', 'Bachelor of Arts in Economics', '24', 'Male', '', '9958474853', '', '', 'Exit Interview', '', '', '', '', '                 jksdkff                ', 'fdaff', 'daffaf', 'dfdf', 'dsfafd', 'sdfafaf', 'tres grade zone 5 bagsak ', '', '', '2022-07-28'),
(45, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Philosophy', '24', 'Male', 'Call and Text', '9958474853', '', '8:30-9:00 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(46, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Philosophy', '24', 'Male', 'Call and Text', '9958474853', '', '8:30-9:00 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(47, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Philosophy', '24', 'Male', 'Call and Text', '9958474853', '', '8:30-9:00 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-28'),
(48, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'NSTP Unit', '2nd Year', 'Literacy Training Service', '18', 'Male', 'Call and Text', '9958474853', '', '8:30-8:50 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-07-29'),
(49, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '', 'Bachelor of Arts in Philosophy', '24', 'Male', '', '9958474853', '', '', 'Exit Interview', '', '', '', '', '                                 learning 3 grade', 'grado bagsak', 'good grade with 3', 'dili graduate 3', 'ceo of bagsak grader', 'business of grade nagsak', 'tres grade zone 5 bagsak ', '', '', '2022-07-29'),
(50, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Social Science', '0', 'Female', 'Call and Text', '9958474853', '', '9:30-9:50 Am', 'Referral Counseling Appointment', '2022-07-29', 'Gil Nicholas Cagande', 'Vandalism', '', '', '', '', '', '', '', '', '', '', '2022-07-29'),
(51, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in English Language', '24', 'Male', 'Video Call', '9958474853', 'chritzan', '10:00-10:20 Am', 'Counseling Appointment', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-08-02'),
(52, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in English Language', '0', 'Female', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'For Scholarship (FDP)', '', '2022-08-02'),
(53, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in English Language', '0', 'Female', '', '', '', '', 'Testing Appointment', '', '', '', '', '', '', '', '', '', '', '', 'For Scholarship (FDP)', '', '2022-08-02'),
(54, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Technologies', '', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', '24', 'Male', '', '9958474853', '', '', 'Exit Interview', '', '', '', '', '                     best part lang            ', 'worst part lang', 'liker best lang', 'like least lang', 'immediate plan lang', 'long-term gosl lsng', 'wala lang kasi bagsak', '', '', '2022-08-02'),
(55, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 'College of Education', '3rd Year', 'Bachelor of Elementary Education', '0', 'Other', 'Video Call', '9958474853', 'Chritzan Sawayan', '10:00-10:20 Am', 'Referral Counseling Appointment', '2022-07-29', 'Gil Nicholas Cagande', 'Chronic Sadness', '', '', '', '', '', '', '', '', '', '', '2022-08-02'),
(56, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Education', 'notset', 'Bachelor of Secondary Education Major in English', '18', 'Male', 'notset', '9958474853', 'notset', 'notset', 'fjgfj', 'notset', 'notset', 'notset', 'notset', 'ggd', 'nice', 'notset', 'notset', 'good', 'better', 'wala lang kasi bagsak', 'Exit Interview', '                    gjgf             ', '2022-08-22'),
(57, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Education', 'notset', 'Bachelor of Secondary Education Major in English', '18', 'Male', 'notset', '9958474853', 'notset', 'notset', 'fjgfj', 'notset', 'notset', 'notset', 'notset', 'ggd', 'nice', 'notset', 'notset', 'good', 'better', 'wala lang kasi bagsak', 'Exit Interview', '                    gjgf             ', '2022-08-22'),
(58, 'Chritzan Saw ', 'sawayan.chritzan143good@gmail.com', 'College of Nursing', 'notset', 'Bachelor of Science in Nursing', '18', 'Male', 'notset', '09652158039', 'notset', 'notset', 'Least ', 'notset', 'notset', 'notset', 'notset', 'Like', 'Least ', 'notset', 'notset', 'Plan', 'Goal', 'Zone 1', 'Exit Interview', '                                 Best', '2022-08-22'),
(59, 'Chritzan Saw ', 'sawayan.chritzan143good@gmail.com', 'College of Nursing', 'notset', 'Bachelor of Science in Nursing', '18', 'Male', 'notset', '09652158039', 'notset', 'notset', 'Least ', 'notset', 'notset', 'notset', 'notset', 'Like', 'Least ', 'notset', 'notset', 'Plan', 'Goal', 'Zone 1', 'Exit Interview', '                                 Best', '2022-08-22'),
(60, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Science in Biology major in Biotechnology', '18', 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-22'),
(61, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', '22', 'Male', 'Face to Face', '', '', '8:00-8:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-22'),
(62, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 'College of Education', '4th Year', 'Bachelor of Early Childhood Education', '22', 'Male', 'Face to Face', '', '', '8:30-8:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-22'),
(63, 'Jun Mark Fruta', 'junmarkfruta303@gmail.com', 'College of Education', 'notset', 'Bachelor of Early Childhood Education', '22', 'Male', 'notset', '096626089', 'notset', 'notset', 'Ambot ato', 'notset', 'notset', 'notset', 'notset', 'Daghan chix', 'Daghan bayot uy', 'notset', 'notset', 'Teach students how to mythic in 1 week', 'My goal is to become a teacher to help Pakistan', 'Kalasungay', 'Exit Interview', '                        I learn how to being lazy', '2022-08-22'),
(64, 'Chritzan Sawayan', 'schritzan4@gmail.com', 'College of Business', '3rd Year', 'Bachelor of Science in Business Administration major in Financial Management', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-08-22'),
(65, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '8:00-8:20 Am', 'Referral Counseling Appointment', '2022-08-05', 'Gil Nicholas Cagande', 'Disrespectful', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-08-22'),
(66, 'Angelica Maguincol', 'jadmanangel@gamil.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', '22', 'Female', 'Call and Text', '09678674899', '', '10:00-10:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-23'),
(67, 'Angelica Maguincol', 'jadmanangel@gamil.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-08-23'),
(68, 'Angelica Maguincol', 'jadmanangel@gamil.com', 'College of Education', 'notset', 'Bachelor of Elementary Education', '22', 'Female', 'notset', '09678674899', 'notset', 'notset', 'None', 'notset', 'notset', 'notset', 'notset', 'Everything', 'None', 'notset', 'notset', 'LET Review', 'To work in school', 'Kalasungay Malaybalay City', 'Exit Interview', '     Everything                            ', '2022-08-23'),
(69, 'Chritzan Sawayan ', 'sawayan.chritzan143good@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Game Development', 'notset', 'Male', 'Call and Text', '09652158039', '', '8:30-8:50 Am', 'Referral Counseling Appointment', '2022-07-29', 'Gil Nicholas Cagande ', 'Excessive Worrying', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-08-25'),
(70, 'Jdjdjsj', 'Jdjsj@jdjr', 'College of Technologies', '3rd Year', 'Bachelor of Science in Electronics Technology', '21', 'Male', 'Face to Face', '', '', '9:30-9:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-25'),
(71, 'Chritzan Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in Filipino', '18', 'Male', 'Video Call', '9958474853', 'chritzan', '8:30-8:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-26'),
(72, 'Chritzan Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in English', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-08-26'),
(73, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', 'notset', 'Bachelor of Secondary Education Major in Filipino', '18', 'Male', 'notset', '9958474853', 'notset', 'notset', 'What was the worst part of your learning experience in BuKSU? Why?', 'notset', 'notset', 'notset', 'notset', 'What did you like best about your college/department?', 'What did you like least about your college/department?', 'notset', 'notset', 'What are your immediate plans? Employment or continue education? If education, what is your goal?', 'What is your long-term employment goal?', 'wala lang kasi bagsak', 'Exit Interview', '           What was the best part of your learning experience in BuKSU? Why?                      ', '2022-08-26'),
(74, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in English', 'notset', 'Male', 'Face to Face', '9958474853', '', '9:00-9:20 Am', 'Referral Counseling Appointment', '2022-08-23', 'Gil Nicholas Cagande', 'Stress', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-08-26'),
(75, 'Lizel Magtulis', '1801100171@student.buksu.edu.ph', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', '22', 'Female', 'Call and Text', '09256484349', '', '9:00-9:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-30'),
(76, 'Justine Singayan', 'reginellacuna1432@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'Pre Deployment (Internship)', '', '2022-08-30'),
(77, 'Phebe Billones', 'phebebilliones@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', '22', 'Female', 'Face to Face', '', '', '8:00-8:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-08-30'),
(78, 'Danica P. Octaviano ', '1901101091@student.buksu.edu.ph', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in Science', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-08-31'),
(79, 'Phebi Billones', 'phebebilliones@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', '22', 'Female', 'Call and Text', '09264578234', '', '10:00-10:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-05'),
(80, 'Danica P. Octaviano', '1901101091@student.buksu.edu.ph', 'College of Education', '4th Year', 'Bachelor of Secondary Education Major in Mathematics', '21', 'Female', 'Call and Text', '09246738221', '', '9:30-9:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-05'),
(81, 'ZINAVIE LINOYAN LIBERTAD', 'libertadzinavie@gmail.com', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Arts in English Language', '24', 'Female', 'Face to Face', '', '', '8:00-8:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-05'),
(82, 'ZINAVIE LINOYAN LIBERTAD', 'libertadzinavie@gmail.com', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Arts in English Language', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-05'),
(83, 'Yeanelyn P. Ponce', 'yeanelynp06@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', '21', 'Female', 'Face to Face', '', '', '9:00-9:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-07'),
(84, 'Mutia Jossie Mae', 'jossiemutia2000@gmail.com', 'College of Business', '4th Year', 'Bachelor of Science in Business Administration major in Financial Management', '22', 'Female', 'Face to Face', '', '', '8:30-8:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-07'),
(85, 'Ron Jacob H. Pagpaguitan', 'ronjacobpagpaguitab23@gmail.com', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Science in Mathematics', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Assessment (Freshmen)', '', '2022-09-07'),
(86, 'Catian, Ron Francis', '190110464@student.buksu.edu.ph', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Sociology', '21', 'Male', 'Face to Face', '', '', '10:00-10:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(87, 'WARLY RODRIGUEZ', '1801104890@student.buksu.edu.ph', 'College of Technologies', '4th Year', 'Bachelor of Science in Electronics Technology', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-09'),
(88, 'minard ;bagnol', 'minaragrabantebagnol@gmail.com', 'College of Technologies', '1st Year', 'Bachelor of Science in Automotive Technology', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-09'),
(89, 'Judyjr A. Mericuelo', 'mericuelojr@gmail.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Automotive Technology', '21', 'Male', 'Face to Face', '', '', '10:30-10:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(90, 'Maria Katrina N. Badajos', 'badajosmariakatrina42@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Economics', '21', 'Female', 'Face to Face', '', '', '2:00-2:20 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(91, 'eguiab christian j', 'christianeguiab@email.com', 'College of Technologies', '3rd Year', 'Bachelor of Science in Electronics Technology', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-09'),
(92, 'Adrian', 'adrianprajes45@gmail.com', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Arts in Social Science', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-09'),
(93, 'Jeff Neumann D. Saluntao', 'jnoatnulas23@gmail.com', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', '22', 'Male', 'Face to Face', '', '', '11:00-11:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(94, 'Juan Dela Cruz', 'juan_1972@gmail.com', 'College of Arts and Sciences', '2nd Year', 'Bachelor of Arts in Economics', 'notset', 'Other', 'Face to Face', '', '', '11:00-11:20 Am', 'Referral Counseling Appointment', '2022-09-13', 'Ian Advincula', 'Absenteeism', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-09-09'),
(95, 'Donna Albarracin', 'babeynalbarracin@gmail.com', 'College of Technologies', '1st Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', '18', 'Female', 'Call and Text', '09067093583', '', '1:30-1:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(96, 'Donna Albarracin', 'babeynalbarracin00@gmail.com', 'College of Technologies', '1st Year', 'Bachelor of Science in Entertainment and Multimedia Computing Major in Digital Animation Technology', '18', 'Female', 'Call and Text', '09067093583', '', '4:00-4:20 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-09'),
(97, 'Lizel Casuyon', 'casuyonlizel@gmail.com', 'College of Arts and Sciences', '1st Year', 'Bachelor of Arts in Economics', '19', 'Female', 'Face to Face', '', '', '9:30-9:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-10'),
(98, 'Daryl Balofinos', 'darylbalofinos@gmail.com', 'College of Education', '1st Year', 'Bachelor of Elementary Education', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-10'),
(99, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', '', '', '24', 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-13'),
(100, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', '24', 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-13'),
(101, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', '', '', '24', 'Male', 'Face to Face', '9958474853', '', '4:30-4:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-13'),
(102, 'Chritzan Andaliston Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', '24', 'Male', 'Face to Face', '9958474853', '', '1:00-1:20 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-13'),
(103, 'Chritzan A', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', '23', 'Male', 'Face to Face', '09652158039', '', '2:00-2:20 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-16'),
(104, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Education', '4th Year', 'Bachelor of Physical Education', 'notset', 'Female', 'Video Call', '9958474853', 'Chritzan Sawayan', '2:30-2:50 Pm', 'Referral Counseling Appointment', '2022-09-11', 'Chritzan Sawayan', 'Stress', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-09-16'),
(105, 'czarina sanchez', 'czarinasanchez98@gmail.com', 'College of Arts and Sciences', '2nd Year', 'Bachelor of Arts in Sociology', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-16'),
(106, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', '', '', '', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'Employment (Human Resource)', '', '2022-09-16'),
(107, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', '', '', '', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'Employment (Human Resource)', '', '2022-09-16'),
(108, 'Chritzan Andaliston Sawayan', 'schritzan4@gmail.com', 'N/A', 'N/A', 'N/A', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'Permanency', '', '2022-09-16'),
(109, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'Non-Teaching Employee Association', 'notset', 'notset', '24', 'Male', 'Call and Text', '9958474853', '', '1:30-1:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-09-17'),
(110, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences(Student)', '3rd Year', 'Bachelor of Arts in English Language', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-22'),
(111, 'Chritzan Andaliston Sawayan(Student)', '1801101459@student.buksu.edu.ph', 'College of Arts and Sciences', '3rd Year', 'Bachelor of Arts in Economics', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-09-22'),
(112, 'Chritzan Andaliston Sawayan', '1801101459@student.buksu.edu.ph', 'College of Technologies', '4th Year', 'Bachelor of Science in Information Technology', 'notset', 'Male', 'Call and Text', '9958474853', '', '1:30-1:50 Pm', 'Referral Counseling Appointment', '2022-09-11', 'Gil Nicholas Cagande', 'Vandalism', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-09-22'),
(113, 'Chritzan Sawayan(Student)', 'sawayan.chritzan143good@gmail.com', 'College of Education', '3rd Year', 'Bachelor of Elementary Education', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-10-06'),
(114, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Administration', '2nd Year', 'Bachelor of Public Administration', '24', 'Male', 'Call and Text', '9958474853', '', '9:30-9:50 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-10-23'),
(115, 'Angelica Maguincol(Student)', 'schritzan4@gmail.com', 'College of Arts and Sciences', '4th Year', 'Bachelor of Arts in Economics', 'notset', 'Female', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'Newly Hired', 'Teaching, Main Campus', '2022-10-23'),
(116, 'Angelica Maguincol', 'schritzan4@gmail.com', 'College of Business', 'notset', 'Bachelor of Science in Business Administration major in Financial Management', '18', 'Female', 'notset', '9958474853', 'notset', 'notset', 'ewtwtw', 'notset', 'notset', 'notset', 'notset', 'wetwt', 'ewt', 'notset', 'notset', 'wetw', 'wetwt', 'wala lang kasi bagsak', 'Exit Interview', '                                 ewsrw', '2022-10-23'),
(117, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Administration', '2nd Year', 'Bachelor of Public Administration', '24', 'Male', 'Call and Text', '9958474853', '', '2:30-2:50 Pm', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-10-23'),
(118, 'Chritzan Andaliston Sawayan(Student)', 'chritzansawayan215@gmail.com', 'College of Arts and Sciences', '2nd Year', 'Bachelor of Arts in Economics', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Assessment (Freshmen)', '', '2022-10-23'),
(119, 'Chritzan Andaliston Sawayan', 'chritzansawayan215@gmail.com', 'College of Arts and Sciences', 'notset', 'Bachelor of Arts in Philosophy', '24', 'Male', 'notset', '9958474853', 'notset', 'notset', 'rutru', 'notset', 'notset', 'notset', 'notset', 'rturu', 'rturu', 'notset', 'notset', 'rturu', 'rturu', 'wala lang kasi bagsak', 'Exit Interview', '                                 rtyryu', '2022-10-23'),
(120, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Administration', '4th Year', 'Bachelor of Public Administration', '24', 'Male', 'Video Call', '9958474853', 'chritzan', '10:00-10:20 Am', 'Counseling Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset;', 'notset', 'notset', 'notset', '2022-10-23'),
(121, 'Chritzan Sawayan(Student)', 'sawayan.chritzan143good@gmail.com', 'College of Education', '4th Year', 'Bachelor of Elementary Education', 'notset', 'Male', 'notset', 'notset', 'notset', 'notset', 'Testing Appointment', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'For Scholarship (FDP)', '', '2022-10-23'),
(122, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Arts and Sciences', 'notset', 'Bachelor of Arts in English Language', '24', 'Male', 'notset', '9958474853', 'notset', 'notset', 'yrturu', 'notset', 'notset', 'notset', 'notset', 'rturu', 'rutru', 'notset', 'notset', 'rturu', 'rturu', 'wala lang kasi bagsak', 'Exit Interview', '                               rtyr  ', '2022-10-23'),
(123, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 'College of Administration', '4th Year', 'Bachelor of Public Administration', 'notset', 'Male', 'Call and Text', '9958474853', '', '10:00-10:20 Am', 'Referral Counseling Appointment', '2022-09-27', 'Gil Nicholas Cagande', 'Vandalism', '', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', 'notset', '2022-10-23'),
(124, 'adadadad', 'counselor@gmail.com', 'College of Administration', 'notset', 'Bachelor of Public Administration', '0', 'Male', 'notset', '09246738221', 'notset', 'notset', 'dqdq', 'notset', 'notset', 'notset', 'notset', 'dqdq', 'dq', 'notset', 'notset', 'dqdq', 'dqd', 'qdqd', 'Exit Interview', '          qwdq                       ', '2022-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `testing_date`
--

CREATE TABLE `testing_date` (
  `id` int(11) NOT NULL,
  `testing_date` varchar(50) NOT NULL,
  `testing_time` varchar(50) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testing_purpose_list`
--

CREATE TABLE `testing_purpose_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_purpose_list`
--

INSERT INTO `testing_purpose_list` (`id`, `name`, `added_at`) VALUES
(1, 'Newly Hired', '2022-06-05'),
(2, 'For Assessment (Freshmen)', '2022-06-06'),
(3, 'Pre Deployment (Internship)', '2022-06-06'),
(4, 'For Scholarship (FDP)', '2022-06-06'),
(5, 'Permanency', '2022-06-06'),
(7, 'Employment (Human Resource)', '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `testing_service`
--

CREATE TABLE `testing_service` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `college_of` varchar(100) NOT NULL,
  `course` varchar(200) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `option_for_newly_hired` varchar(100) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp(),
  `date_prefer` varchar(50) NOT NULL,
  `time_prefer` varchar(50) NOT NULL,
  `room` varchar(100) NOT NULL,
  `catered_by` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL,
  `outcome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_service`
--

INSERT INTO `testing_service` (`id`, `name`, `email`, `age`, `college_of`, `course`, `year_level`, `gender`, `purpose`, `option_for_newly_hired`, `added_at`, `date_prefer`, `time_prefer`, `room`, `catered_by`, `status`, `outcome`) VALUES
(33, 'Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 23, 'College of Education', 'Bachelor of Secondary Education Major in English', '4th Year', 'Male', 'For Scholarship (FDP)', '', '2022-07-19', '2022-09-16', '08:19', 'Room 12 - College of Di', 'Nelyn Octaviano', 'deanrequest', 'Successfully Address'),
(34, 'Chritzan Andaliston Sawayan', 'sawayanc@gmail.com', 23, 'College of Education', 'Bachelor of Elementary Education', '4th Year', 'Male', 'For Scholarship (FDP)', '', '2022-07-27', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(35, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(36, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(37, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(38, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(39, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(40, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(41, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(42, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(43, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(44, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(45, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(46, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(47, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(48, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(49, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(50, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(51, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(52, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(53, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(54, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(55, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(56, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(57, 'Chritzan Andaliston Sawayan', 'dinamograduate@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '2nd Year', 'Male', 'Employment (Human Resource)', '', '2022-07-28', '2022-09-16', '08:19', '', '', 'deanrequest', ''),
(58, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '4th Year', 'Female', 'For Scholarship (FDP)', '', '2022-08-02', '2022-10-26', '13:57', '', '', 'deanrequest', ''),
(59, 'Chritzan Andaliston Sawayan', 'counselor@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '4th Year', 'Female', 'For Scholarship (FDP)', '', '2022-08-02', '2022-10-26', '13:57', '', '', 'deanrequest', ''),
(60, 'Chritzan Sawayan', 'schritzan4@gmail.com', 24, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-08-22', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(61, 'Chritzan Sawayan', 'schritzan4@gmail.com', 24, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-08-22', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(62, 'Chritzan Sawayan', 'schritzan4@gmail.com', 24, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-08-22', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(63, 'Chritzan Sawayan', 'schritzan4@gmail.com', 24, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-08-22', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(64, 'Angelica Maguincol', 'jadmanangel@gamil.com', 22, 'College of Education', 'Bachelor of Elementary Education', '4th Year', 'Female', 'For Scholarship (FDP)', '', '2022-08-23', '2022-09-16', '08:19', 'notset', 'notset', 'deanrequest', 'notset'),
(65, 'Chritzan Sawayan', 'chritzansawayan215@gmail.com', 18, 'College of Education', 'Bachelor of Secondary Education Major in English', '4th Year', 'Male', 'For Scholarship (FDP)', '', '2022-08-26', '2022-09-16', '08:19', 'notset', 'COE Counselor', 'deanrequest', 'notset'),
(66, 'Justine Singayan', 'reginellacuna1432@gmail.com', 23, 'College of Business', 'Bachelor of Science in Business Administration major in Financial Management', '4th Year', 'Male', 'Pre Deployment (Internship)', '', '2022-08-30', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(67, 'Danica P. Octaviano ', '1901101091@student.buksu.edu.ph', 21, 'College of Education', 'Bachelor of Secondary Education Major in Science', '4th Year', 'Female', 'For Scholarship (FDP)', '', '2022-08-31', '2022-09-16', '08:19', 'notset', 'COE Counselor', 'deanrequest', 'notset'),
(68, 'ZINAVIE LINOYAN LIBERTAD', 'libertadzinavie@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in English Language', '3rd Year', 'Female', 'For Scholarship (FDP)', '', '2022-09-05', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(69, 'Ron Jacob H. Pagpaguitan', 'ronjacobpagpaguitab23@gmail.com', 19, 'College of Arts and Sciences', 'Bachelor of Science in Mathematics', '3rd Year', 'Male', 'For Assessment (Freshmen)', '', '2022-09-07', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(70, 'WARLY RODRIGUEZ', '1801104890@student.buksu.edu.ph', 22, 'College of Technologies', 'Bachelor of Science in Electronics Technology', '4th Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-09', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(71, 'minard ;bagnol', 'minaragrabantebagnol@gmail.com', 21, 'College of Technologies', 'Bachelor of Science in Automotive Technology', '1st Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-09', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(72, 'eguiab christian j', 'christianeguiab@email.com', 22, 'College of Technologies', 'Bachelor of Science in Electronics Technology', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-09', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(73, 'Adrian', 'adrianprajes45@gmail.com', 21, 'College of Arts and Sciences', 'Bachelor of Arts in Social Science', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-09', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(74, 'Daryl Balofinos', 'darylbalofinos@gmail.com', 20, 'College of Education', 'Bachelor of Elementary Education', '1st Year', 'Female', 'For Scholarship (FDP)', '', '2022-09-10', '2022-09-16', '08:19', 'Room A1409-COE Building', 'COE Counselor', 'Done', 'Successfully Address'),
(75, 'czarina sanchez', 'czarinasanchez98@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in Sociology', '2nd Year', 'Female', 'For Scholarship (FDP)', '', '2022-09-16', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(76, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 24, '', '', '', 'Male', 'Employment (Human Resource)', '', '2022-09-16', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(77, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 24, '', '', '', 'Male', 'Employment (Human Resource)', '', '2022-09-16', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(78, 'Chritzan Andaliston Sawayan', 'schritzan4@gmail.com', 18, 'N/A', 'N/A', 'N/A', 'Male', 'Permanency', '', '2022-09-16', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(79, 'BSIT4 - Chritzan Sawayan', 'sawayan.chritzan143good@gmail.com', 24, 'College of Arts and Sciences(Student)', 'Bachelor of Arts in English Language', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-22', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(80, 'Chritzan Andaliston Sawayan(Student)', '1801101459@student.buksu.edu.ph', 24, 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-09-22', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(81, 'Chritzan Sawayan(Student)', 'sawayan.chritzan143good@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '3rd Year', 'Male', 'For Scholarship (FDP)', '', '2022-10-06', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset'),
(82, 'Angelica Maguincol(Student)', 'schritzan4@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '4th Year', 'Female', 'Newly Hired', 'Teaching, Main Campus', '2022-10-23', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(83, 'Chritzan Andaliston Sawayan(Student)', 'chritzansawayan215@gmail.com', 24, 'College of Arts and Sciences', 'Bachelor of Arts in Economics', '2nd Year', 'Male', 'For Assessment (Freshmen)', '', '2022-10-23', '2022-10-26', '13:57', 'notset', 'notset', 'deanrequest', 'notset'),
(84, 'Chritzan Sawayan(Student)', 'sawayan.chritzan143good@gmail.com', 24, 'College of Education', 'Bachelor of Elementary Education', '4th Year', 'Male', 'For Scholarship (FDP)', '', '2022-10-23', 'notset', 'notset', 'notset', 'notset', 'noaction', 'notset');

-- --------------------------------------------------------

--
-- Table structure for table `testing_time`
--

CREATE TABLE `testing_time` (
  `id` int(11) NOT NULL,
  `testing_time` varchar(50) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apointment_date`
--
ALTER TABLE `apointment_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apointment_time`
--
ALTER TABLE `apointment_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_list`
--
ALTER TABLE `college_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counseling_appointment`
--
ALTER TABLE `counseling_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselor_user`
--
ALTER TABLE `counselor_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_list`
--
ALTER TABLE `courses_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exit_interview`
--
ALTER TABLE `exit_interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exit_interview_download_form`
--
ALTER TABLE `exit_interview_download_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_oauth`
--
ALTER TABLE `google_oauth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_counseling`
--
ALTER TABLE `referral_counseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_date`
--
ALTER TABLE `referral_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_reason_list`
--
ALTER TABLE `referral_reason_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_time`
--
ALTER TABLE `referral_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_date`
--
ALTER TABLE `testing_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_purpose_list`
--
ALTER TABLE `testing_purpose_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_service`
--
ALTER TABLE `testing_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testing_time`
--
ALTER TABLE `testing_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apointment_date`
--
ALTER TABLE `apointment_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `apointment_time`
--
ALTER TABLE `apointment_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `college_list`
--
ALTER TABLE `college_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `counseling_appointment`
--
ALTER TABLE `counseling_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `counselor_user`
--
ALTER TABLE `counselor_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `courses_list`
--
ALTER TABLE `courses_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `exit_interview`
--
ALTER TABLE `exit_interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894;

--
-- AUTO_INCREMENT for table `exit_interview_download_form`
--
ALTER TABLE `exit_interview_download_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `google_oauth`
--
ALTER TABLE `google_oauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_counseling`
--
ALTER TABLE `referral_counseling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `referral_date`
--
ALTER TABLE `referral_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `referral_reason_list`
--
ALTER TABLE `referral_reason_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `referral_time`
--
ALTER TABLE `referral_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `students_table`
--
ALTER TABLE `students_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `testing_date`
--
ALTER TABLE `testing_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testing_purpose_list`
--
ALTER TABLE `testing_purpose_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testing_service`
--
ALTER TABLE `testing_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `testing_time`
--
ALTER TABLE `testing_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
