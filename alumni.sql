-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 04:08 PM
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
-- Database: `alumni`
CREATE DATABASE alumni;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `date_joined` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `email`, `role`, `phoneNumber`, `date_joined`, `address`, `passwords`) VALUES
(1, 'Muhammad Abdullahi Shaaba', 'muhammadshaaba@gmail.com', 'Admin', '09015621510', '', 'Shaaba Compound, Patigi,, Kwara State', 'shaaba');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventsandnews`
--

CREATE TABLE `eventsandnews` (
  `id` int(50) NOT NULL,
  `news_subject` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(40) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` varchar(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventsandnews`
--

INSERT INTO `eventsandnews` (`id`, `news_subject`, `type`, `description`, `date`, `location`, `time`, `date_created`) VALUES
(1, 'Convocation', 'Event', 'gjjksdjk', '2025-10-25', 'Block B Counselling Hall', '233:34:34.000000', '2025-07-16 18:00:45'),
(2, 'MMMMMMF', 'News', 'JHHHFJDKDJK', '2025-08-08', 'AAP HALL', '10:00:00.000000', '2025-07-16 19:06:58'),
(3, 'Convocation', 'News', 'ffhhfds', '2025-08-02', 'werrfr', '10:00:00.000000', '2025-07-16 19:07:46'),
(4, 'MMMMMMF', 'Event', 'hhfdffgyj', '2025-08-05', 'APU', '01:00:00.000000', '2025-07-16 19:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobopp`
--

CREATE TABLE `jobopp` (
  `id` int(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `apply_link` varchar(255) NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobopp`
--

INSERT INTO `jobopp` (`id`, `title`, `company`, `location`, `description`, `job_type`, `apply_link`, `posted_date`) VALUES
(2, 'Front-end Developer', 'WE-SOLVE-IT', 'Mksdjjkdjdsjksd', 'Job Opportunity', 'full-time', 'wwww.jddjkjnkdjkdjkld', '2025-07-18 14:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `job_opportunities`
--

CREATE TABLE `job_opportunities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `posted_date` date NOT NULL,
  `apply_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_opportunities`
--

INSERT INTO `job_opportunities` (`id`, `title`, `company`, `location`, `description`, `job_type`, `posted_date`, `apply_link`) VALUES
(1, 'Senior Software Engineer', 'Tech Solutions Inc.', 'Lagos, Nigeria', 'We are seeking a highly skilled Senior Software Engineer to lead our backend development team. Proficiency in Python/Django and cloud platforms is required.', 'Full-time', '2025-07-10', '#'),
(2, 'Marketing Manager (Digital)', 'Global Brands Ltd.', 'Abuja, Nigeria', 'Exciting opportunity for a Digital Marketing Manager to drive our online presence and campaigns. Experience with SEO, SEM, and social media marketing is essential.', 'Full-time', '2025-07-08', '#'),
(3, 'Financial Analyst', 'Apex Investments', 'Remote', 'Seeking a detail-oriented Financial Analyst to support investment decisions and financial modeling. CFA certification is a plus.', 'Full-time', '2025-07-05', '#'),
(4, 'Lecturer - Computer Science', 'Ahman Pategi University', 'Pategi, Nigeria', 'APU is looking for a passionate lecturer to join our Computer Science department. PhD preferred, strong research background is a plus.', 'Full-time', '2025-07-01', '#');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `graduation_year` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullName`, `file`, `email`, `phoneNumber`, `department`, `graduation_year`, `date_created`) VALUES
(1, 'Abdullahi Shaaba', '', 'asa@gmail.com', '09011224376', 'Cyber Security', '2025', '2025-07-16 16:02:47'),
(2, 'Oniye Abdullahi Masud', '', 'oniyeabdullahi00@gmail.com', '+2349015634519', 'Software Engineering', '2025', '2025-07-16 18:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type_program` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `apply_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `title`, `type_program`, `description`, `category`, `deadline_date`, `apply_link`) VALUES
(1, 'APU Alumni Postgraduate Scholarship', 'For Master\'s & PhD Programs', 'Partial tuition scholarship for APU alumni pursuing postgraduate studies at recognized universities worldwide. Focus on research with societal impact.', 'Postgraduate', '2025-08-30', '#'),
(2, 'Innovation & Entrepreneurship Grant', 'Seed Funding for Alumni Startups', 'A competitive grant providing seed funding and mentorship for APU alumni-led startups with innovative solutions.', 'Entrepreneurship', '2025-09-15', '#'),
(3, 'Continuing Professional Development Fund', 'For Certifications & Short Courses', 'Support for alumni looking to acquire new skills through professional certifications, workshops, or short courses.', 'Professional Dev.', NULL, '#'),
(4, 'Research Grant for Young Scholars', 'Supporting Early Career Researchers', 'A grant designed to support APU alumni who are early-career researchers in their pursuit of impactful academic projects.', 'Research', '2025-10-01', '#'),
(5, 'Gbolagde', 'Post-Graduate', 'hkjhkdjkjkxjkx', 'Full Time', '2025-07-23', 'https:pgs-scholarship-post-graduate.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventsandnews`
--
ALTER TABLE `eventsandnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobopp`
--
ALTER TABLE `jobopp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_opportunities`
--
ALTER TABLE `job_opportunities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventsandnews`
--
ALTER TABLE `eventsandnews`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobopp`
--
ALTER TABLE `jobopp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_opportunities`
--
ALTER TABLE `job_opportunities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
