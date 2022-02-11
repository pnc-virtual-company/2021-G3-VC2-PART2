-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 03:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `disciplines`
--

CREATE TABLE `disciplines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disciplines`
--

INSERT INTO `disciplines` (`id`, `reason`, `notice_type`, `icon_type`, `start_date`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'He is better to find', 'Misconduct', 'mdi-cards', '2022-02-18 11:20:00', 6, '2022-02-10 18:20:06', '2022-02-10 18:20:06'),
(2, 'She have many argument with the boy', 'Warning letter', 'mdi-alert', '2022-02-18 08:22:00', 6, '2022-02-10 18:23:11', '2022-02-10 18:23:11'),
(3, 'He is argument with each other', 'Termination', 'mdi-cancel', '2022-02-18 08:24:00', 4, '2022-02-10 18:24:37', '2022-02-10 18:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_17_020558_create_students_table', 1),
(6, '2021_12_22_211755_create_permissions_table', 1),
(7, '2021_12_30_080259_create_disciplines_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `reason`, `description`, `start_date`, `end_date`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Wedding\'s relative', 'He is sick and He can make it warm', '2022-02-10', '2022-02-16', 4, '2022-02-10 18:16:15', '2022-02-10 18:16:15'),
(2, 'Busy', 'He is busy do their work', '2022-02-10', '2022-02-16', 7, '2022-02-10 18:18:31', '2022-02-10 18:18:31'),
(3, 'Funeral', 'She is busy', '2022-02-11', '2022-02-25', 5, '2022-02-10 18:19:32', '2022-02-10 18:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `lastName`, `email`, `class`, `password`, `image`, `gender`, `birthday`, `phone`, `created_at`, `updated_at`) VALUES
(3, 'Molika', 'Heng', 'molika.heng@gmail.com', 'WEB 2021 B', 1234, 'y7smhsztFcweDibpdhzBOdiZgMOlyRDJ9x7qEcNC.jpg', 'Female', '12 Jan 2001', 9283245, '2022-02-10 03:20:13', '2022-02-10 03:20:13'),
(4, 'Kimsak', 'Mean', 'kimsak.mean@gmail.com', 'WEB 2021 A', 1234, 'iC4sney8o33ZFzdGJWOKFGXGOIs8E71DjtqyKI4m.jpg', 'Male', '12 Jan 2001', 97231345, '2022-02-10 03:22:41', '2022-02-10 03:22:41'),
(5, 'Sokthang', 'Brob', 'sothang.brop@gmail.com', 'SNA', 1234, 'v19uiy6nHJu9CziHJ7MWq41yobEJ17TTYYP4lNkg.jpg', 'Male', '12 Jan 2001', 97231345, '2022-02-10 03:23:55', '2022-02-10 03:23:55'),
(6, 'somoun', 'om', 'somounom@gmail.com', 'class-B', 123, 'm5wl4hJuJy9eValtjwU7s6ywFhaJgjLmWgmWReng.jpg', 'Male', '23/5/1998', 90488985, '2022-02-10 08:21:41', '2022-02-10 08:21:41'),
(7, 'Phearak', 'Eng', 'phearak.eng@gmail.com', 'WEB 2021 B', 1234, 'TF4rRVm4FD5GPPV8H4AJtDuktZJxMUH3pzMseOSq.jpg', 'Male', '12 Jan 2021', 972045595, '2022-02-10 17:56:39', '2022-02-10 17:56:39'),
(8, 'Sreyhieb', 'Dy', 'sreyhieb.dy@gmail.com', 'WEB 2021 B', 1234, 'Gd0ZMDJV6MqcKiAFXwMGZPTVNPzGEHwXOSNTCkXj.jpg', 'Female', '12 Jan 2001', 972045595, '2022-02-10 18:02:40', '2022-02-10 18:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `role`, `password`, `gender`, `profile`, `student_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '\'\'', 'admin@gmail.com', 'Admin', '$2y$10$NSMijrAuVPpBVbnlA2/nhOJ7lVzpXc8/c5ol4lg1V1bYeEE7c5PYK', 'Male', 'LCP2FwIeNUpKx4R5oWUF5eoCIcagSveZvZNYg5QI.png', NULL, NULL, NULL, '2022-02-09 18:59:18', '2022-02-09 18:59:18'),
(3, 'Sreyka', 'Eam', 'sreyka@gmail.com', 'Social Affair', '$2y$10$7RNTc9/eFF0WixV59pBGqOcYKfIC/O0cPL4kQjv.Ga7u4Ae79sszW', 'Female', 'fLFvKcqU2yW5n77bZ6YoxBKcY17Ms22Yn5tf4YHe.png', NULL, NULL, NULL, '2022-02-09 19:01:17', '2022-02-09 19:01:17'),
(4, 'Molika', 'Heng', 'molika.heng@gmail.com', 'Student', '$2y$10$L7BFBeuGj90KZWKetTZxy.eJjfio5EkWQhQhN.ndZ9i002Iwbhb0u', 'Female', '67Vzp5o49y5jyJQs8mqwc9D6Jt8LsWM78vmuBLnU.jpg', NULL, NULL, NULL, '2022-02-10 03:16:05', '2022-02-10 03:16:05'),
(5, 'Somoun', 'Om', 'smoun.om@gmail.com', 'Student', '$2y$10$g4s/OzFJh/81045iri0A4Ol2LhN5o0CKW4b1K5Knw01OAf3ooTqz.', 'Male', 'PxBwj92ATa9Iv0BwsZ9EhatvFBdu88vuIH7YBU4x.jpg', 6, NULL, NULL, '2022-02-10 17:54:58', '2022-02-10 17:54:58'),
(6, 'Phearak', 'Eng', 'phearak.eng@gmail.com', 'Student', '$2y$10$XGf8cd0Z7FzpdU7PL0E62eIuLq6J3ik6/m7KcqK3LtxnvudDS1lVi', 'Male', 'cnPIIZKhFQKCuTr1BdQl9cmpf4r3aNuobfBzIqfH.jpg', 7, NULL, NULL, '2022-02-10 17:59:12', '2022-02-10 17:59:12'),
(7, 'Sreyheib', 'Dy', 'sreyheib.dy@gmail.com', 'Student', '$2y$10$fuaOqQFfpteM5g5mKsK86ur7KAddPil8oAG1a4udRUZxiXO559mDG', 'Female', 'IooBg8woKHES7v0IfE7invDbV9bf0P7iTaClbEDa.jpg', 8, NULL, NULL, '2022-02-10 18:04:19', '2022-02-10 18:04:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplines_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_student_id_foreign` (`student_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disciplines`
--
ALTER TABLE `disciplines`
  ADD CONSTRAINT `disciplines_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
