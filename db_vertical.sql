-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 04:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vertical`
--

-- --------------------------------------------------------

--
-- Table structure for table `addjobs`
--

CREATE TABLE `addjobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `year` varchar(191) NOT NULL,
  `month` varchar(191) NOT NULL,
  `salary` varchar(191) NOT NULL,
  `deadline` date NOT NULL,
  `company` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addjobs`
--

INSERT INTO `addjobs` (`id`, `title`, `description`, `responsibilities`, `requirements`, `year`, `month`, `salary`, `deadline`, `company`, `status`, `created_at`, `updated_at`) VALUES
(2, 'hgshgvf', 'hgshgvf', 'hgshgvf', 'hgshgvf', '5', '0', '50000', '2023-06-22', 'GALTech School of Technology Pvt Ltd', 1, '2023-06-16 00:25:53', '2023-06-16 00:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `addstaffs`
--

CREATE TABLE `addstaffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone1` varchar(191) NOT NULL,
  `phone2` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `addr` varchar(191) DEFAULT NULL,
  `location` varchar(191) NOT NULL,
  `district_id` int(11) NOT NULL,
  `w_years` int(11) DEFAULT NULL,
  `w_months` int(11) DEFAULT NULL,
  `skills` varchar(191) NOT NULL,
  `cv` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `applied_date` date NOT NULL,
  `exp_sal` varchar(191) DEFAULT NULL,
  `applied_thru` varchar(191) NOT NULL,
  `others` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `offerdetails` varchar(191) NOT NULL,
  `salary` varchar(191) NOT NULL,
  `joiningdate` date NOT NULL,
  `uploadcv` varchar(191) NOT NULL,
  `traingperiod` varchar(191) NOT NULL,
  `trainingnumberofdays` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogins`
--

CREATE TABLE `adminlogins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogins`
--

INSERT INTO `adminlogins` (`id`, `email`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@galtech.com', 'admin2', '$2y$10$d0lZ3rIeE3w.XDrobMc8o.r27H9hELzPDlW2lQTgbe233vXsqBWfq', 1, '2023-04-16 18:30:00', '2023-06-22 19:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `attends`
--

CREATE TABLE `attends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `result` varchar(191) NOT NULL,
  `details` text NOT NULL,
  `expected_salary` varchar(191) NOT NULL,
  `joining_date` varchar(191) NOT NULL,
  `notice_period` varchar(191) NOT NULL,
  `upload_code` varchar(191) DEFAULT NULL,
  `upload_interview_paper` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidateexperiences`
--

CREATE TABLE `candidateexperiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `p_company` varchar(191) DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone1` varchar(191) NOT NULL,
  `phone2` varchar(191) DEFAULT NULL,
  `whatsapp` varchar(191) DEFAULT NULL,
  `addr` varchar(191) DEFAULT NULL,
  `location` varchar(191) NOT NULL,
  `district_id` int(11) NOT NULL,
  `w_years` int(11) DEFAULT NULL,
  `w_months` int(11) DEFAULT NULL,
  `skills` varchar(191) NOT NULL,
  `cv` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `applied_date` date NOT NULL,
  `exp_sal` varchar(191) DEFAULT NULL,
  `applied_thru` varchar(191) NOT NULL,
  `others` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `age`, `gender`, `email`, `phone1`, `phone2`, `whatsapp`, `addr`, `location`, `district_id`, `w_years`, `w_months`, `skills`, `cv`, `photo`, `job_id`, `applied_date`, `exp_sal`, `applied_thru`, `others`, `status`, `created_at`, `updated_at`) VALUES
(6, 'abc', 22, 'Female', 'sherinjose2000@gmail.com', '1234567898', '1234567898', '1234567898', 'thtrissur', 'Thtrissur', 7, 0, 0, 'php', '1687483314.pdf', '1687483314.jpg', 2, '2023-06-23', '50000', 'Infopark Website', NULL, 1, '2023-06-22 19:51:54', '2023-06-22 19:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Thiruvananthapuram', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(2, 'Kollam', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(3, 'Pathanamthitta', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(4, 'Alappuzha', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(5, 'Kottayam', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(6, 'Idukki', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(7, 'Ernakulam', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(8, 'Thrissur', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(9, 'Palakkad', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(10, 'Malappuram', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(11, 'Kozhikode', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(12, 'Wayanad', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(13, 'Kannur', '2023-05-04 18:30:00', '2023-05-04 18:30:00'),
(14, 'Kasargod', '2023-05-04 18:30:00', '2023-05-04 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `email_status` varchar(191) NOT NULL DEFAULT '0',
  `remainder_status` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `candidate_id`, `email_status`, `remainder_status`, `created_at`, `updated_at`) VALUES
(6, 6, '1', '0', '2023-06-22 19:52:09', '2023-06-22 19:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inteviewcandidates`
--

CREATE TABLE `inteviewcandidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `job_title` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(122, '2014_10_12_000000_create_users_table', 1),
(123, '2014_10_12_100000_create_password_resets_table', 1),
(124, '2019_08_19_000000_create_failed_jobs_table', 1),
(125, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(126, '2023_05_05_091141_create_addjobs_table', 1),
(127, '2023_05_05_091907_create_districts_table', 1),
(128, '2023_05_05_103701_create_candidates_table', 1),
(129, '2023_05_08_045245_create_adminlogins_table', 1),
(130, '2023_05_09_032116_create_studentcruds_table', 1),
(131, '2023_05_09_055844_create_attends_table', 1),
(132, '2023_05_09_061621_create_inteviewcandidates_table', 1),
(133, '2023_05_09_062910_create_notattends_table', 1),
(134, '2023_05_09_073303_create_candidateexperiences_table', 1),
(135, '2023_05_09_073707_create_postponeds_table', 1),
(136, '2023_05_10_215422_create_schedules_table (1)', 1),
(137, '2023_05_15_065421_create_addstaffs_table', 1),
(138, '2023_05_24_032820_create_staffexperiences_table', 1),
(139, '2023_06_15_072356_create_emails_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notattends`
--

CREATE TABLE `notattends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `reason` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postponeds`
--

CREATE TABLE `postponeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `date` varchar(191) NOT NULL,
  `reason` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `round` varchar(191) NOT NULL,
  `interview_date` date NOT NULL,
  `type` varchar(191) NOT NULL,
  `question` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT '0',
  `round_result` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `candidate_id`, `round`, `interview_date`, `type`, `question`, `status`, `round_result`, `created_at`, `updated_at`) VALUES
(6, 6, 'First', '2023-06-24', 'offline', 'q', '0', NULL, '2023-06-22 19:52:09', '2023-06-22 19:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `staffexperiences`
--

CREATE TABLE `staffexperiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `p_company` varchar(191) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentcruds`
--

CREATE TABLE `studentcruds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `job_title` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addjobs`
--
ALTER TABLE `addjobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addstaffs`
--
ALTER TABLE `addstaffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addstaffs_candidate_id_unique` (`candidate_id`);

--
-- Indexes for table `adminlogins`
--
ALTER TABLE `adminlogins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminlogins_email_unique` (`email`),
  ADD UNIQUE KEY `adminlogins_username_unique` (`username`),
  ADD UNIQUE KEY `adminlogins_password_unique` (`password`);

--
-- Indexes for table `attends`
--
ALTER TABLE `attends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidateexperiences`
--
ALTER TABLE `candidateexperiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_district_name_unique` (`district_name`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inteviewcandidates`
--
ALTER TABLE `inteviewcandidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notattends`
--
ALTER TABLE `notattends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `postponeds`
--
ALTER TABLE `postponeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffexperiences`
--
ALTER TABLE `staffexperiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcruds`
--
ALTER TABLE `studentcruds`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addjobs`
--
ALTER TABLE `addjobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addstaffs`
--
ALTER TABLE `addstaffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminlogins`
--
ALTER TABLE `adminlogins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attends`
--
ALTER TABLE `attends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidateexperiences`
--
ALTER TABLE `candidateexperiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inteviewcandidates`
--
ALTER TABLE `inteviewcandidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `notattends`
--
ALTER TABLE `notattends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postponeds`
--
ALTER TABLE `postponeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffexperiences`
--
ALTER TABLE `staffexperiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentcruds`
--
ALTER TABLE `studentcruds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
