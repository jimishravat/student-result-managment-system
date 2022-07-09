-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 05:48 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `sem_offered` int(10) NOT NULL,
  `dept_offered_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `sem_offered`, `dept_offered_id`) VALUES
('1EL01', 'Basic E', 1, 2),
('1EL02', 'Problem so', 1, 2),
('1EL03', 'Electronic', 1, 2),
('1EL04', 'Network th', 1, 2),
('1EL05', 'Advance Ca', 1, 2),
('3EL02', 'Basic Embe', 3, 2),
('3EL03', ' Analog El', 3, 2),
('3EL04', ' Power Ele', 3, 2),
('3EL05', ' Digital S', 3, 2),
('3EL06', ' Linear Co', 3, 2),
('1CP01', 'Computer Workshop', 1, 1),
('1CP02', 'C Language', 1, 1),
('1CP03', 'Open Sourc', 1, 1),
('1CP04', 'PSS', 1, 1),
('1CP05', 'Environmen', 1, 1),
('3CP201', 'Database M', 3, 1),
('3CP202', 'OOP with C', 3, 1),
('3CP203', 'Digital Lo', 3, 1),
('3CP204', 'Discrete m', 3, 1),
('3CPHS02', 'Economics ', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(10) NOT NULL,
  `dept_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'computer'),
(2, 'electronic');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'jimish', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sem11`
--

CREATE TABLE `sem11` (
  `result_id` int(11) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `ac_year` int(10) NOT NULL,
  `i_1CP01` int(10) NOT NULL,
  `e_1CP01` int(10) NOT NULL,
  `a_1CP01` int(10) NOT NULL,
  `i_1CP02` int(10) NOT NULL,
  `e_1CP02` int(10) NOT NULL,
  `a_1CP02` int(10) NOT NULL,
  `i_1CP03` int(10) NOT NULL,
  `e_1CP03` int(10) NOT NULL,
  `a_1CP03` int(10) NOT NULL,
  `i_1CP04` int(10) NOT NULL,
  `e_1CP04` int(10) NOT NULL,
  `a_1CP04` int(10) NOT NULL,
  `i_1CP05` int(10) NOT NULL,
  `e_1CP05` int(10) NOT NULL,
  `a_1CP05` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem11`
--

INSERT INTO `sem11` (`result_id`, `s_id`, `ac_year`, `i_1CP01`, `e_1CP01`, `a_1CP01`, `i_1CP02`, `e_1CP02`, `a_1CP02`, `i_1CP03`, `e_1CP03`, `a_1CP03`, `i_1CP04`, `e_1CP04`, `a_1CP04`, `i_1CP05`, `e_1CP05`, `a_1CP05`, `total`, `percentage`) VALUES
(1, '21CP12', 2021, 21, 89, 8, 32, 78, 9, 33, 88, 7, 32, 90, 8, 31, 79, 8, 613, 81.7333),
(3, '21CP20', 2021, 33, 78, 8, 34, 79, 8, 34, 79, 9, 24, 80, 9, 34, 80, 9, 598, 79.7333),
(5, '20CP13', 2020, 28, 70, 6, 29, 72, 6, 26, 78, 9, 35, 80, 9, 36, 79, 6, 569, 75.8666);

-- --------------------------------------------------------

--
-- Table structure for table `sem12`
--

CREATE TABLE `sem12` (
  `result_id` int(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `ac_year` varchar(10) NOT NULL,
  `i_1EL01` int(10) NOT NULL,
  `e_1EL01` int(10) NOT NULL,
  `a_1EL01` int(10) NOT NULL,
  `i_1EL02` int(10) NOT NULL,
  `e_1EL02` int(10) NOT NULL,
  `a_1EL02` int(10) NOT NULL,
  `i_1EL03` int(10) NOT NULL,
  `e_1EL03` int(10) NOT NULL,
  `a_1EL03` int(10) NOT NULL,
  `i_1EL04` int(10) NOT NULL,
  `e_1EL04` int(10) NOT NULL,
  `a_1EL04` int(10) NOT NULL,
  `i_1EL05` int(10) NOT NULL,
  `e_1EL05` int(10) NOT NULL,
  `a_1EL05` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem12`
--

INSERT INTO `sem12` (`result_id`, `s_id`, `ac_year`, `i_1EL01`, `e_1EL01`, `a_1EL01`, `i_1EL02`, `e_1EL02`, `a_1EL02`, `i_1EL03`, `e_1EL03`, `a_1EL03`, `i_1EL04`, `e_1EL04`, `a_1EL04`, `i_1EL05`, `e_1EL05`, `a_1EL05`, `total`, `percentage`) VALUES
(0, '21EL51', '2021', 32, 70, 9, 22, 89, 8, 32, 98, 8, 32, 89, 9, 33, 88, 8, 627, 83.6),
(0, '21EL23', '2021', 32, 70, 9, 33, 89, 8, 32, 98, 8, 32, 89, 9, 33, 88, 8, 638, 85.0667);

-- --------------------------------------------------------

--
-- Table structure for table `sem31`
--

CREATE TABLE `sem31` (
  `result_id` int(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `ac_year` int(10) NOT NULL,
  `i_3CP201` int(10) NOT NULL,
  `e_3CP201` int(10) NOT NULL,
  `a_3CP201` int(10) NOT NULL,
  `i_3CP202` int(10) NOT NULL,
  `e_3CP202` int(10) NOT NULL,
  `a_3CP202` int(10) NOT NULL,
  `i_3CP203` int(10) NOT NULL,
  `e_3CP203` int(10) NOT NULL,
  `a_3CP203` int(10) NOT NULL,
  `i_3CP204` int(10) NOT NULL,
  `e_3CP204` int(10) NOT NULL,
  `a_3CP204` int(10) NOT NULL,
  `i_3CPHS02` int(10) NOT NULL,
  `e_3CPHS02` int(10) NOT NULL,
  `a_3CPHS02` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem31`
--

INSERT INTO `sem31` (`result_id`, `s_id`, `ac_year`, `i_3CP201`, `e_3CP201`, `a_3CP201`, `i_3CP202`, `e_3CP202`, `a_3CP202`, `i_3CP203`, `e_3CP203`, `a_3CP203`, `i_3CP204`, `e_3CP204`, `a_3CP204`, `i_3CPHS02`, `e_3CPHS02`, `a_3CPHS02`, `total`, `percentage`) VALUES
(1, '20CP13', 2020, 35, 78, 5, 35, 88, 6, 36, 89, 6, 37, 85, 6, 25, 80, 6, 617, 82.2667);

-- --------------------------------------------------------

--
-- Table structure for table `sem32`
--

CREATE TABLE `sem32` (
  `result_id` int(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `ac_year` int(10) NOT NULL,
  `i_3EL02` int(10) NOT NULL,
  `e_3EL02` int(10) NOT NULL,
  `a_3EL02` int(10) NOT NULL,
  `i_3EL03` int(10) NOT NULL,
  `e_3EL03` int(10) NOT NULL,
  `a_3EL03` int(10) NOT NULL,
  `i_3EL04` int(10) NOT NULL,
  `e_3EL04` int(10) NOT NULL,
  `a_3EL04` int(10) NOT NULL,
  `i_3EL05` int(10) NOT NULL,
  `e_3EL05` int(10) NOT NULL,
  `a_3EL05` int(10) NOT NULL,
  `i_3EL06` int(10) NOT NULL,
  `e_3EL06` int(10) NOT NULL,
  `a_3EL06` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem32`
--

INSERT INTO `sem32` (`result_id`, `s_id`, `ac_year`, `i_3EL02`, `e_3EL02`, `a_3EL02`, `i_3EL03`, `e_3EL03`, `a_3EL03`, `i_3EL04`, `e_3EL04`, `a_3EL04`, `i_3EL05`, `e_3EL05`, `a_3EL05`, `i_3EL06`, `e_3EL06`, `a_3EL06`, `total`, `percentage`) VALUES
(1, '20EL19', 2020, 28, 89, 8, 33, 75, 9, 34, 75, 7, 39, 80, 8, 36, 85, 9, 615, 82);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `s_fname` varchar(20) NOT NULL,
  `s_lname` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `current_sem` int(10) NOT NULL,
  `dept_id` int(10) NOT NULL,
  `admin_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `s_fname`, `s_lname`, `mobile`, `email`, `current_sem`, `dept_id`, `admin_year`) VALUES
('20CP12', 'Vandana', 'Bhat', '7456123874', 'vb@gmail.com', 3, 1, '2020'),
('20CP13', 'Aditiya', 'Tikku', '600658978', 'at@gmail.com', 3, 1, '2020'),
('20CP14', 'Rudra', 'Mehta', '6064589788', 'rm@gmail.com', 3, 1, '2020'),
('20CP15', 'Anusha', 'Raina', '7064554789', 'ar@gmail.com', 3, 1, '2020'),
('20CP16', 'Rekha', 'Koul', '7045554789', 'rk@gmail.com', 3, 1, '2020'),
('20CP17', 'Ram', 'Jogiya', '7000612345', 'rj@gmail.com', 3, 1, '2020'),
('20CP18', 'Sanjay', 'Kar', '6000452147', 'sk@gmail.com', 3, 1, '2020'),
('20CP19', 'Ravi', 'Kumar', '6062452487', 'rk@gmail.com', 3, 1, '2020'),
('20CP20', 'Seema', 'Bhat', '7445834125', 'sb@gmail.com', 3, 1, '2020'),
('20CP21', 'Neha', 'Kataria', '6021448569', 'nk@gmail.com', 3, 1, '2020'),
('21CP11', 'Jimish', 'Ravat', '7897897897', 'jr@gmail.com', 1, 1, '2021'),
('21CP12', 'Rajesh', 'Modi', '8997897897', 'rm@gmail.com', 1, 1, '2021'),
('21CP13', 'Ramesh', 'Vasava', '7897897889', 'rv@gmail.com', 1, 1, '2021'),
('21CP14', 'Daksh', 'Patel', '7898987897', 'dp@gmail.com', 1, 1, '2021'),
('21CP15', 'Pinku', 'Rathwa', '6667897897', 'pr@gmail.com', 1, 1, '2021'),
('21CP16', 'Mahi', 'Patel', '7897899997', 'mp@gmail.com', 1, 1, '2021'),
('21CP17', 'Naina', 'Raina', '9677897897', 'nr@gmail.com', 1, 1, '2021'),
('21CP18', 'Vinay', 'Ladva', '7897865497', 'vl@gmail.com', 1, 1, '2021'),
('21CP19', 'Darshan', 'Jethva', '7897894567', 'dj@gmail.com', 1, 1, '2021'),
('21CP20', 'Kinchit', 'Fataniya', '7567897897', 'kf@gmail.com', 1, 1, '2021'),
('20EL20', 'nehaal', 'vasava', '9457328107', 'nehalv31@gmail.com', 3, 2, '2020'),
('20EL19', 'Rajesh', 'Modi', '8932768634', 'rmodi1@gmail.com', 3, 2, '2020'),
('20EL18', 'Trupti', 'Rajput', '9236478194', 'trupti3@gmail.com', 3, 2, '2020'),
('20EL17', 'Mahir', 'shekh', '8453672187', 'mahir41@gmail.com', 3, 2, '2020'),
('20EL16', 'Alisha', 'Pathan', '7283649126', 'alish1@gmail.com', 3, 2, '2020'),
('20EL15', 'Gaurang', 'Shah', '9127836458', 'shahgaurang@gmail.com', 3, 2, '2020'),
('20EL14', 'Krunal', 'Rana', '7812634085', 'krunal5@gmail.com', 3, 2, '2020'),
('20EL13', 'mahi', 'Thakor', '8973561274', 'thakormahi@gmail.com', 3, 2, '2020'),
('20EL12', 'Ridhdhi', 'Patel', '9473628910', 'ridhdhipatel1@gmail.com', 3, 2, '2020'),
('20EL11', 'Shreya', 'Bariya', '7823910289', 'shreya45@gmail.com', 3, 2, '2020'),
('21EL11', 'Jimish', 'Ravat', '7897897897', 'jr@gmail.com', 1, 2, '2021'),
('21EL51', 'akansha', 'gupta', '7889963423', 'akansha@gmail.com', 1, 2, '2021'),
('21EL42', 'vani', 'gupta', '7873493913', 'vanni@gmail.com', 1, 2, '2021'),
('21CP22', 'viran', 'mahajan', '9858117123', 'vm28@gmail.com', 1, 2, '2021'),
('21EL23', 'athrava', 'sharma', '7051784321', 'athrava@gmail.com', 1, 2, '2021'),
('21EL50', 'rakshit', 'arora', '9858050600', 'rakarora@gmail.com', 1, 2, '2021'),
('21EL66', 'pratha', 'jaswal', '6005184412', 'pratha98@gmail.com', 1, 2, '2021'),
('21EL12', 'parikrama', 'anthal', '6006243836', 'parii11@gmail.com', 1, 2, '2021'),
('21EL31', 'manthan', 'sharma', '6005725632', 'mani12@gmail.com', 1, 2, '2021'),
('21EL46', 'etasha', 'tikku', '7006071986', 'etua@gmail.com', 1, 2, '2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sem11`
--
ALTER TABLE `sem11`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `sem31`
--
ALTER TABLE `sem31`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `sem32`
--
ALTER TABLE `sem32`
  ADD PRIMARY KEY (`result_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sem11`
--
ALTER TABLE `sem11`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sem31`
--
ALTER TABLE `sem31`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sem32`
--
ALTER TABLE `sem32`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
