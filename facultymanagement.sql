-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2026 at 02:46 PM
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
-- Database: `facultymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `f_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `faculty_phone` varchar(20) DEFAULT NULL,
  `faculty_address` varchar(200) DEFAULT NULL,
  `faculty_designation` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty_name`, `gender`, `faculty_phone`, `faculty_address`, `faculty_designation`, `user_id`) VALUES
(61, 'Gita KC', NULL, '9841000004', 'Baneshwor, Kathmandu', 'Lecturer', 38),
(62, 'Shyam Thapa', NULL, '9841000005', 'Pulchowk, Lalitpur', 'Assistant Professor', 39),
(63, 'Nita Sharma', NULL, '9841000006', 'Koteshwor, Kathmandu', 'Lecturer', 40),
(64, 'Bikash Rai', NULL, '9841000007', 'Satdobato, Lalitpur', 'Teaching Assistant', 41),
(65, 'Puja Magar', NULL, '9841000008', 'Thimi, Bhaktapur', 'Lecturer', 42),
(66, 'Sunil Shrestha', NULL, '9841000009', 'Kalanki, Kathmandu', 'Assistant Professor', 43),
(67, 'Kriti Maharjan', NULL, '9841000010', 'Balkhu, Kathmandu', 'Lecturer', 44),
(68, 'Anil Gurung', NULL, '9841000011', 'Jawalakhel, Lalitpur', 'Professor', 45),
(69, 'Suman Joshi', NULL, '9841000012', 'Maharajgunj, Kathmandu', 'Lecturer', 46),
(70, 'Roshni Karki', NULL, '9841000013', 'Suryabinayak, Bhaktapur', 'Teaching Assistant', 47),
(71, 'Dipendra Bista', NULL, '9841000014', 'Chabahil, Kathmandu', 'Assistant Professor', 48),
(72, 'Sabina Gautam', NULL, '9841000015', 'Imadol, Lalitpur', 'Lecturer', 49),
(73, 'Kamal Pandey', NULL, '9841000016', 'Gongabu, Kathmandu', 'Lecturer', 50),
(74, 'Asmita Basnet', NULL, '9841000017', 'Bhaisepati, Lalitpur', 'Teaching Assistant', 51),
(75, 'Rajan Khadka', NULL, '9841000018', 'Tinkune, Kathmandu', 'Assistant Professor', 52),
(76, 'Binita Lama', NULL, '9841000019', 'Bouddha, Kathmandu', 'Lecturer', 53),
(77, 'Suraj Tamang', NULL, '9841000020', 'Kupondole, Lalitpur', 'Professor', 54),
(78, 'Pratima Shahi', NULL, '9841000021', 'Naxal, Kathmandu', 'Lecturer', 55),
(79, 'Kishor Acharya', NULL, '9841000022', 'Sanothimi, Bhaktapur', 'Assistant Professor', 56),
(80, 'Renuka Upadhyay', NULL, '9841000023', 'Lagankhel, Lalitpur', 'Lecturer', 57),
(81, 'Navin Dahal', NULL, '9841000024', 'Maitidevi, Kathmandu', 'Teaching Assistant', 58),
(82, 'Anjali Bhattarai', NULL, '9841000025', 'Sinamangal, Kathmandu', 'Lecturer', 59),
(83, 'kiran', NULL, '9847000000', 'sadkjasdo', 'dsknfsd', 60),
(84, 'milisha', 'Female', '9847000000', 'sadkjasdo', 'dsknfsd', 61);

-- --------------------------------------------------------

--
-- Table structure for table `leaverequest`
--

CREATE TABLE `leaverequest` (
  `id` int(11) NOT NULL,
  `f_id` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'applied',
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaverequest`
--

INSERT INTO `leaverequest` (`id`, `f_id`, `fname`, `date`, `status`, `reason`) VALUES
(1, 84, 'milisha', '2026-03-20', 'approved', 'ssad');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_role`) VALUES
(35, 'admin_ram', 'ram.admin@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(36, 'admin_sita', 'sita.admin@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(37, 'admin_hari', 'hari.admin@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(38, 'gita_kc', 'gita.kc@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(39, 'shyam_thapa', 'shyam.thapa@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(40, 'nita_sharma', 'nita.sharma@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(41, 'bikash_rai', 'bikash.rai@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(42, 'puja_magar', 'puja.magar@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(43, 'sunil_shrestha', 'sunil.shrestha@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(44, 'kriti_maharjan', 'kriti.maharjan@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(45, 'anil_gurung', 'anil.gurung@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(46, 'suman_joshi', 'suman.joshi@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(47, 'roshni_karki', 'roshni.karki@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(48, 'dipendra_bista', 'dipendra.bista@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(49, 'sabina_gautam', 'sabina.gautam@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(50, 'kamal_pandey', 'kamal.pandey@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(51, 'asmita_basnet', 'asmita.basnet@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(52, 'rajan_khadka', 'rajan.khadka@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(53, 'binita_lama', 'binita.lama@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(54, 'suraj_tamang', 'suraj.tamang@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(55, 'pratima_shahi', 'pratima.shahi@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(56, 'kishor_acharya', 'kishor.acharya@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(57, 'renuka_upadhyay', 'renuka.upadhyay@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(58, 'navin_dahal', 'navin.dahal@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(59, 'anjali_bhattarai', 'anjali.bhattarai@tu.edu.np', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user'),
(60, 'kiran', 'kiransah547@gmail.com', '$2y$10$uYhF/sXGyIP2NOQJs8EX2eKc5dKbGtmEywBNpu1YspuvgbkU8iWmu', 'admin'),
(61, 'milisha', 'milishasapkota@kathford.edu.np', '$2y$10$Gmk7pVAo1oRVEotSOGePbO3BrKv9ScqdCondTxXo2XqZgZFoKXawy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `leaverequest`
--
ALTER TABLE `leaverequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD CONSTRAINT `leaverequest_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
