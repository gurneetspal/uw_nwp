-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 14, 2021 at 10:54 AM
-- Server version: 8.0.18
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nps`
--

-- --------------------------------------------------------

--
-- Table structure for table `abscences`
--

DROP TABLE IF EXISTS `abscences`;
CREATE TABLE IF NOT EXISTS `abscences` (
  `absence_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `abscence_date` date NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_days_missed` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `absence_form_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`absence_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `uwin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_users_uwin_email_unique` (`uwin_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `first_name`, `last_name`, `status`, `uwin_email`, `created_at`, `updated_at`) VALUES
(1, 'Eunice', 'Doyle', 1, 'roosevelt71@example.com', '2021-10-12 11:12:10', '2021-10-12 11:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `class_lessons`
--

DROP TABLE IF EXISTS `class_lessons`;
CREATE TABLE IF NOT EXISTS `class_lessons` (
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `class_section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monday` tinyint(1) NOT NULL DEFAULT '0',
  `tuesday` tinyint(1) NOT NULL DEFAULT '0',
  `wednesday` tinyint(1) NOT NULL DEFAULT '0',
  `thursday` tinyint(1) NOT NULL DEFAULT '0',
  `friday` tinyint(1) NOT NULL DEFAULT '0',
  `saturday` tinyint(1) NOT NULL DEFAULT '0',
  `sunday` tinyint(1) NOT NULL DEFAULT '0',
  `mon_time_s` time DEFAULT NULL,
  `mon_time_e` time DEFAULT NULL,
  `tue_time_s` time DEFAULT NULL,
  `tue_time_e` time DEFAULT NULL,
  `wed_time_s` time DEFAULT NULL,
  `wed_time_e` time DEFAULT NULL,
  `thur_time_s` time DEFAULT NULL,
  `thur_time_e` time DEFAULT NULL,
  `fri_time_s` time DEFAULT NULL,
  `fri_time_e` time DEFAULT NULL,
  `sat_time_s` time DEFAULT NULL,
  `sat_time_e` time DEFAULT NULL,
  `sun_time_s` time DEFAULT NULL,
  `sun_time_e` time DEFAULT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `placement_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`class_number`),
  KEY `class_lessons_course_id_foreign` (`course_id`),
  KEY `class_lessons_instructor_id_foreign` (`instructor_id`),
  KEY `class_lessons_placement_id_foreign` (`placement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_catalogue_no` int(11) NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `incident_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_number` int(11) NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `placement_id` bigint(20) UNSIGNED NOT NULL,
  `incident_comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_occurrence` date NOT NULL,
  `date_safety` date NOT NULL,
  `health_safety_record` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`incident_id`),
  KEY `incidents_class_number_foreign` (`class_number`),
  KEY `incidents_student_number_foreign` (`student_number`),
  KEY `incidents_instructor_id_foreign` (`instructor_id`),
  KEY `incidents_placement_id_foreign` (`placement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `instructor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_num` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_phone1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_ext1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_type1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_phone2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructor_ext2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_type2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uwin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `highest_degree_completed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health_status_date` date NOT NULL,
  `tb_test_date` date NOT NULL,
  `immunization_submitted` tinyint(1) NOT NULL,
  `mask_fit_testing_date` date NOT NULL,
  `bls_cpr_expiry_date` date NOT NULL,
  `smg_training` date NOT NULL,
  `extended_police_clearance` tinyint(1) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`instructor_id`),
  UNIQUE KEY `instructors_uwin_email_unique` (`uwin_email`),
  KEY `instructors_prov_id_foreign` (`prov_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_assignments`
--

DROP TABLE IF EXISTS `instructor_assignments`;
CREATE TABLE IF NOT EXISTS `instructor_assignments` (
  `ia_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signed_contract` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ia_id`),
  KEY `instructor_assignments_term_foreign` (`term`),
  KEY `instructor_assignments_instructor_id_foreign` (`instructor_id`),
  KEY `instructor_assignments_class_number_foreign` (`class_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(123, '2014_10_12_000000_create_users_table', 1),
(124, '2014_10_12_100000_create_password_resets_table', 1),
(125, '2019_08_19_000000_create_failed_jobs_table', 1),
(126, '2021_10_07_145855_create_terms_table', 1),
(127, '2021_10_07_150613_create_provinces_table', 1),
(128, '2021_10_07_151007_create_schools_table', 1),
(129, '2021_10_07_151739_create_students_table', 1),
(130, '2021_10_07_155539_create_admin_users_table', 1),
(131, '2021_10_07_160124_create_courses_table', 1),
(132, '2021_10_07_160431_create_placements_table', 1),
(133, '2021_10_07_160917_create_instructors_table', 1),
(134, '2021_10_07_204446_create_class_lessons_table', 1),
(135, '2021_10_07_213116_create_instructor_assignments_table', 1),
(136, '2021_10_07_213615_create_incidents_table', 1),
(137, '2021_10_07_214038_create_abscences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

DROP TABLE IF EXISTS `placements`;
CREATE TABLE IF NOT EXISTS `placements` (
  `placement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`placement_id`),
  KEY `placements_prov_id_foreign` (`prov_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `prov_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_abbr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`prov_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`prov_id`, `province_name`, `province_abbr`, `created_at`, `updated_at`) VALUES
(1, 'Alberta', 'AB', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(2, 'British Columbia', 'BC', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(3, 'Manitoba', 'MB', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(4, 'New Brunswick', 'NB', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(5, 'Newfoundland and Labrador', 'NL', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(6, 'Northwest Territories', 'NT', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(7, 'Nova Scotia', 'NS', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(8, 'Nunavut', 'NU', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(9, 'Ontario', 'ON', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(10, 'Prince Edward Island', 'PE', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(11, 'Quebec', 'QC', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(12, 'Saskatchewan', 'SK', '2021-10-12 10:50:43', '2021-10-12 10:50:43'),
(13, 'Yukon', 'YT', '2021-10-12 10:50:43', '2021-10-12 10:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `school_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`school_id`),
  KEY `schools_prov_id_foreign` (`prov_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_abbreviation`, `school_address`, `school_city`, `school_postal_code`, `prov_id`, `created_at`, `updated_at`) VALUES
(1, 'St. Clair College, Windsor Campus', 'SCC', '2000 Talbot Rd. W.', 'Windsor', 'N9A 6S4', 9, '2021-10-12 11:01:59', '2021-10-12 11:01:59'),
(2, 'University of Windsor', 'UoW', '401 Sunset Avenue', 'Windsor', 'N9B 3P4', 9, '2021-10-12 11:01:59', '2021-10-12 11:01:59'),
(3, 'Blllaa', 'bla', '1 blah blah', 'rewww', 'NWERYYT', 8, '2021-10-13 15:02:52', '2021-10-13 15:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_number` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uwin_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `home_postal_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`student_number`),
  UNIQUE KEY `students_uwin_email_unique` (`uwin_email`),
  KEY `students_school_id_foreign` (`school_id`),
  KEY `students_prov_id_foreign` (`prov_id`),
  KEY `students_start_term_foreign` (`start_term`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_number`, `first_name`, `last_name`, `middle_name`, `uwin_email`, `school_id`, `home_address`, `home_city`, `prov_id`, `home_postal_code`, `phone1`, `phone2`, `start_term`, `year_level`, `status`, `created_at`, `updated_at`) VALUES
(60826124860, 'Rogers', 'Oberbrunner', NULL, 'bertrand85@example.net', '2', '4589 Fadel Hill Suite 794', 'South Dustinside', 6, 'NC6789', '104-6437-379', NULL, 'F2111', 1, 1, '2021-10-12 11:14:20', '2021-10-12 11:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `term_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_name`, `created_at`, `updated_at`) VALUES
('F2111', 'Fall 2021', '2021-10-12 11:19:00', '2021-10-12 11:19:00'),
('W1222', 'Winter 2022', '2021-10-13 14:09:05', '2021-10-13 14:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '3',
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_instructor_id_foreign` (`instructor_id`),
  KEY `users_admin_id_foreign` (`admin_id`),
  KEY `users_placement_id_foreign` (`placement_id`),
  KEY `users_student_number_foreign` (`student_number`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `type`, `instructor_id`, `admin_id`, `placement_id`, `student_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eunice Doyle', 'roosevelt71@example.com', '2021-10-12 11:12:27', 0, NULL, '1', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hYLHLy9Rdw5gukJSi8QqTPsqAPIwA52lVBoxle0Sbxa7nFYU9nszZl9yyvF9', '2021-10-12 11:12:27', '2021-10-12 11:12:27'),
(2, 'Rogers Oberbrunner', 'bertrand85@example.net', '2021-10-12 11:16:15', 3, NULL, NULL, NULL, '60826124860', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MVgRHHvKuXq3JhSdPZFQQ7kASNDZZ1LHLMjMruIPBZyyfCKjCWhGeGqZg0Ly', '2021-10-12 11:16:15', '2021-10-12 11:16:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
