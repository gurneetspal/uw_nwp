-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 04:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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

CREATE TABLE `abscences` (
  `student_number` int(255) NOT NULL,
  `absence_id` bigint(20) UNSIGNED NOT NULL,
  `abscence_date` date NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_days_missed` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `absence_form_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abscences`
--

INSERT INTO `abscences` (`student_number`, `absence_id`, `abscence_date`, `class_number`, `reason`, `num_days_missed`, `note`, `absence_form_status`, `created_at`, `updated_at`) VALUES
(1216, 9, '2021-11-24', '', 'Not feeling well', 2, 'High fever', 'yes,', '2023-11-21 09:21:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uwin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `first_name`, `last_name`, `status`, `password`, `uwin_email`, `comments`, `created_at`, `updated_at`) VALUES
(4290, 'Andrea', 'Jacob', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'jacob@uwindsor.ca', '', NULL, NULL),
(2904, 'Richard', 'Smith', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'rsmith@uwindsor.ca', 'Inactive till 23 Dec ', NULL, NULL),
(9652, 'Adam ', 'Williams', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'adam@uwindsor.ca', '', NULL, NULL),
(3471, 'Paul', 'Baker', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'pbaker1987@uwindsor.ca', '', NULL, NULL),
(3692, 'Anna', 'Davis', 0, '5f4dcc3b5aa765d61d8327deb882cf99', 'anna12@uwindsor.ca', 'Call for ID verification', NULL, NULL),
(8333, 'Admin', 'Smith', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@uwindsor.ca', '', NULL, NULL),
(4174, 'Johan', 'Williams', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'johan@uwindsor.ca', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(20) NOT NULL,
  `class_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_id`) VALUES
(5, 'A121'),
(6, 'A152'),
(7, 'B521'),
(8, 'C121'),
(9, 'A62');

-- --------------------------------------------------------

--
-- Table structure for table `class_lessons`
--

CREATE TABLE `class_lessons` (
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `class_section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monday` tinyint(1) NOT NULL DEFAULT 0,
  `tuesday` tinyint(1) NOT NULL DEFAULT 0,
  `wednesday` tinyint(1) NOT NULL DEFAULT 0,
  `thursday` tinyint(1) NOT NULL DEFAULT 0,
  `friday` tinyint(1) NOT NULL DEFAULT 0,
  `saturday` tinyint(1) NOT NULL DEFAULT 0,
  `sunday` tinyint(1) NOT NULL DEFAULT 0,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_catalogue_no` int(11) NOT NULL,
  `course_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboadr_tasks`
--

CREATE TABLE `dashboadr_tasks` (
  `id` int(20) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_names`
--

CREATE TABLE `hospital_names` (
  `id` int(255) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_address` varchar(255) NOT NULL,
  `h_department` varchar(255) NOT NULL,
  `h_unit` varchar(255) NOT NULL,
  `student_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_names`
--

INSERT INTO `hospital_names` (`id`, `h_name`, `h_address`, `h_department`, `h_unit`, `student_number`) VALUES
(1, 'Magnolia General Hospital', '1972 St-Jerome Street, St Jerome, Quebec', 'Surgery, General', 'ICU, Nurse', 0),
(2, 'Orlando Hospital', '47 Drake Blvd', 'Surgery, General', 'ICU, Nurse', 0);

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `incident_id` bigint(20) UNSIGNED NOT NULL,
  `student_number` int(11) NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `placement_id` bigint(20) UNSIGNED NOT NULL,
  `incident_comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_occurrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_safety` date NOT NULL,
  `health_safety_record` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`incident_id`, `student_number`, `class_number`, `instructor_id`, `placement_id`, `incident_comments`, `date_occurrence`, `date_safety`, `health_safety_record`, `created_at`, `updated_at`) VALUES
(4, 1216, '', 0, 0, 'IV fail', '2021-11-02', '0000-00-00', 'Air bubble in the iv line blocked the flow of fluid.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `first_name`, `last_name`, `employee_num`, `address`, `city`, `prov_id`, `postal_code`, `instructor_phone1`, `instructor_ext1`, `phone_type1`, `instructor_phone2`, `instructor_ext2`, `phone_type2`, `uwin_email`, `other_email`, `gender`, `highest_degree_completed`, `cno`, `health_status_date`, `tb_test_date`, `immunization_submitted`, `mask_fit_testing_date`, `bls_cpr_expiry_date`, `smg_training`, `extended_police_clearance`, `comments`, `created_at`, `updated_at`) VALUES
(6, 'Sharon', 'Lykins', 9541, '1595 White Point Road', 'Bridgetown', 7, 'B0S 1C0', '902-588-3602', '22', 'Mobile', '902-588-9000', NULL, 'Mobile', 'sharon@uwindsor.ca', NULL, 0, 'Doctorate', '745', '2021-11-03', '2021-11-05', 1, '2021-11-04', '2021-11-26', '2021-11-03', 1, '', '2021-11-16 05:00:00', NULL),
(5, 'Luis ', 'Satterfield', 9875, '3263 Boulevard Cremazie', 'Quebec', 11, 'G1R 1B 8', '418-523-8290', '22', 'Mobile', '418-523-9000', NULL, 'Mobile', 'luis@uwindsor.ca', NULL, 0, 'Doctorate', '231', '2021-11-18', '2021-11-04', 1, '2021-11-02', '2021-11-26', '2021-11-09', 1, '', '2021-11-16 05:00:00', NULL),
(4, 'Abigail', 'Gill', 9125, '3332 Reserve St', 'Apsley', 0, 'K0L 1A0', '705-656-0050', '33', 'Mobile', '705-656-5621', NULL, 'Mobile', 'gill@uwindsor.ca', NULL, 0, 'Masters', '785', '2021-11-01', '2021-11-04', 1, '2021-11-05', '2021-11-26', '2021-11-18', 1, 'Contact Update 1', '2021-11-16 05:00:00', '2021-11-23 05:00:00'),
(7, 'Betty', 'Templeman', 9865, '3540 Eglinton Avenue', 'Toronto', 9, 'M4P 1A6', '416-908-2127', '77', 'Mobile', '416-908-2000', NULL, 'Mobile', 'betty@uwindsor.ca', NULL, 0, 'Doctorate', '763', '2021-11-03', '2021-11-05', 1, '2021-11-03', '2021-11-27', '2021-11-26', 1, '', '2021-11-16 05:00:00', NULL),
(8, 'Kurt', 'Gerst', 9787, '4550 Lynden Road', 'Cookstown', 9, 'L0L 1L0', '705-458-0509', '88', 'Mobile', '705-458-0550', NULL, 'Mobile', 'kurt@uwindsor.ca', NULL, 0, 'Doctorate', '788', '2021-11-11', '2021-11-12', 1, '2021-11-11', '2021-12-10', '2021-11-04', 1, '', '2021-11-16 05:00:00', NULL),
(9, 'Lindsy ', 'Halcomb', 9128, '1574 Township Rd', 'Lloydminster', 1, 'T9V 0L9', '780-808-0548', '40', 'Mobile', '780-808-0560', NULL, 'Mobile', 'lindsy@uwindsor.ca', NULL, 0, 'Doctorate', '769', '2021-11-03', '2021-11-05', 1, '2021-11-04', '2021-11-04', '2021-11-12', 1, '', '2021-11-16 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructor_assignments`
--

CREATE TABLE `instructor_assignments` (
  `ia_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signed_contract` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `placements`
--

CREATE TABLE `placements` (
  `placement_id` bigint(20) UNSIGNED NOT NULL,
  `student_number` int(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `placements`
--

INSERT INTO `placements` (`placement_id`, `student_number`, `name`, `h_name`, `h_department`, `h_unit`, `days`, `start_time`, `end_time`, `instructor`, `address`, `city`, `prov_id`, `postal_code`, `phone`, `ext`, `contact_person`, `contact_person_title`, `status`, `created_at`, `updated_at`, `comments`) VALUES
(14, 1233, '', 'Magnolia General Hospital', ' General', ' Nurse', 'monday,tuesday', '09:10', '15:10', '--Choose an instructor--', '', '', 0, '', '', NULL, '', '', 1, '2023-11-21 09:31:39', NULL, ''),
(13, 1216, '', 'Magnolia General Hospital', ' General', 'ICU', 'monday,tuesday', '09:10', '15:10', 'Sharon Lykins', '', '', 0, '', '', NULL, '', '', 1, '2016-11-21 09:37:14', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `placement_comments`
--

CREATE TABLE `placement_comments` (
  `student_number` int(20) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement_comments`
--

INSERT INTO `placement_comments` (`student_number`, `comments`) VALUES
(1216, 'Ask for ID verification 1'),
(1233, '');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_abbr` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `schools` (
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_abbreviation` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_abbreviation`, `school_address`, `school_city`, `school_postal_code`, `prov_id`, `created_at`, `updated_at`) VALUES
(4, 'University of Windsor', 'UoW', '', 'Windsor', 'N9B 3P4', 9, NULL, NULL),
(5, 'St. Clair', 'St. Clair', '', 'Windsor', 'N9G 3C3', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(20) NOT NULL,
  `section_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_id`) VALUES
(1, '23'),
(2, '65'),
(3, '20'),
(4, '12'),
(5, '10'),
(6, '18'),
(7, '50');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
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
  `year` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `h_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_number`, `first_name`, `last_name`, `middle_name`, `uwin_email`, `school_id`, `home_address`, `home_city`, `prov_id`, `home_postal_code`, `phone1`, `phone2`, `start_term`, `year`, `status`, `comments`, `created_at`, `updated_at`, `h_name`, `h_department`, `h_unit`) VALUES
(1216, 'Sam', 'Davies', '', 'sdavies@uwindsor.ca', 'University of Windsor', '4945 49th Avenue', 'Grise Fiord', 0, 'X0A 0J', '867-980-2248', '', 'Winter 2020', 0, 1, 'Ask for ID verification', NULL, NULL, '', '', ''),
(1233, 'Richard', 'Clark', '', 'richard@uwindsor.ca', 'University of Windsor', '1567 St Jean Baptiste St', 'Forestville', 0, 'G0T 1E', '418-586-4862', '', 'Winter 2020', 0, 1, 'Section not assigned yet', NULL, NULL, '', '', ''),
(1232, 'Lucas', 'Brown', '', 'lucas@uwindsor.ca', 'University of Windsor', '1631 Glen Long Avenue', 'Toronto', 0, 'M6B 1J', '416-781-9381', '', 'Fall 2020', 0, 1, '', NULL, NULL, '', '', ''),
(1254, 'Alison', 'Gibson', '', 'alison@uwindsor.ca', 'University of Windsor', '2649 Islington Ave', 'Toronto', 0, 'M9V 2X', '416-560-6211', '', 'Winter 2020', 0, 1, '', NULL, NULL, '', '', ''),
(561, 'Adam', 'Smith', '', 'adam@uwindsor.ca', 'University of Windsor', '7185 Lancaster Avenue', 'Malton', 0, 'L4T 2L', '6478552233', '', 'Winter 2020', 0, 0, 'hello world', NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students_course_section`
--

CREATE TABLE `students_course_section` (
  `student_number` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_course_section`
--

INSERT INTO `students_course_section` (`student_number`, `class`, `section`, `term`) VALUES
('1213', 'A121', '23', ''),
('1216', 'A152', '10', ''),
('1232', 'A152', '20', ''),
('1233', 'A152', '12', ''),
('1254', 'A152', '50', ''),
('1213', 'A152', '12', ''),
('561', 'A121', '23', '');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_name`, `created_at`, `updated_at`) VALUES
('152', 'Winter 2020', NULL, NULL),
('121', 'Fall 2021', '2021-11-16 05:00:00', '2021-11-16 05:00:00'),
('126', 'Fall 2020', NULL, NULL),
('132', 'Summer 2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 3,
  `instructor_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `type`, `instructor_id`, `admin_id`, `placement_id`, `student_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eunice Doyle', 'roosevelt71@example.com', '2021-10-12 11:12:27', 0, NULL, '1', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hYLHLy9Rdw5gukJSi8QqTPsqAPIwA52lVBoxle0Sbxa7nFYU9nszZl9yyvF9', '2021-10-12 11:12:27', '2021-10-12 11:12:27'),
(2, 'Rogers Oberbrunner', 'bertrand85@example.net', '2021-10-12 11:16:15', 3, NULL, NULL, NULL, '60826124860', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MVgRHHvKuXq3JhSdPZFQQ7kASNDZZ1LHLMjMruIPBZyyfCKjCWhGeGqZg0Ly', '2021-10-12 11:16:15', '2021-10-12 11:16:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abscences`
--
ALTER TABLE `abscences`
  ADD PRIMARY KEY (`absence_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_users_uwin_email_unique` (`uwin_email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_lessons`
--
ALTER TABLE `class_lessons`
  ADD PRIMARY KEY (`class_number`),
  ADD KEY `class_lessons_course_id_foreign` (`course_id`),
  ADD KEY `class_lessons_instructor_id_foreign` (`instructor_id`),
  ADD KEY `class_lessons_placement_id_foreign` (`placement_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `dashboadr_tasks`
--
ALTER TABLE `dashboadr_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_names`
--
ALTER TABLE `hospital_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`incident_id`),
  ADD KEY `incidents_class_number_foreign` (`class_number`),
  ADD KEY `incidents_student_number_foreign` (`student_number`),
  ADD KEY `incidents_instructor_id_foreign` (`instructor_id`),
  ADD KEY `incidents_placement_id_foreign` (`placement_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `instructors_uwin_email_unique` (`uwin_email`),
  ADD KEY `instructors_prov_id_foreign` (`prov_id`);

--
-- Indexes for table `instructor_assignments`
--
ALTER TABLE `instructor_assignments`
  ADD PRIMARY KEY (`ia_id`),
  ADD KEY `instructor_assignments_term_foreign` (`term`),
  ADD KEY `instructor_assignments_instructor_id_foreign` (`instructor_id`),
  ADD KEY `instructor_assignments_class_number_foreign` (`class_number`);

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
-- Indexes for table `placements`
--
ALTER TABLE `placements`
  ADD PRIMARY KEY (`placement_id`),
  ADD KEY `placements_prov_id_foreign` (`prov_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `schools_prov_id_foreign` (`prov_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_number`),
  ADD UNIQUE KEY `students_uwin_email_unique` (`uwin_email`),
  ADD KEY `students_school_id_foreign` (`school_id`),
  ADD KEY `students_prov_id_foreign` (`prov_id`),
  ADD KEY `students_start_term_foreign` (`start_term`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_instructor_id_foreign` (`instructor_id`),
  ADD KEY `users_admin_id_foreign` (`admin_id`),
  ADD KEY `users_placement_id_foreign` (`placement_id`),
  ADD KEY `users_student_number_foreign` (`student_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abscences`
--
ALTER TABLE `abscences`
  MODIFY `absence_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9653;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboadr_tasks`
--
ALTER TABLE `dashboadr_tasks`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_names`
--
ALTER TABLE `hospital_names`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `incident_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instructor_assignments`
--
ALTER TABLE `instructor_assignments`
  MODIFY `ia_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `placements`
--
ALTER TABLE `placements`
  MODIFY `placement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `prov_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
