-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2025 at 09:18 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apar_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `apar_cache`
--

DROP TABLE IF EXISTS `apar_cache`;
CREATE TABLE IF NOT EXISTS `apar_cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_cache_locks`
--

DROP TABLE IF EXISTS `apar_cache_locks`;
CREATE TABLE IF NOT EXISTS `apar_cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_failed_jobs`
--

DROP TABLE IF EXISTS `apar_failed_jobs`;
CREATE TABLE IF NOT EXISTS `apar_failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apar_failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_forms`
--

DROP TABLE IF EXISTS `apar_forms`;
CREATE TABLE IF NOT EXISTS `apar_forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `section_or_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_of_specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_year` year NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','in_progress','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_forms_created_by_status_index` (`created_by`,`status`),
  KEY `apar_forms_report_year_index` (`report_year`),
  KEY `apar_forms_created_at_index` (`created_at`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_forms`
--

INSERT INTO `apar_forms` (`id`, `employee_name`, `designation`, `employee_id`, `date_of_birth`, `section_or_group`, `area_of_specialization`, `date_of_joining`, `email`, `mobile_no`, `report_year`, `department`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tulsiram Kushwah', 'Project Scientist 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025', NULL, 'in_progress', 1, '2025-09-30 23:23:45', '2025-10-01 03:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `apar_form_data`
--

DROP TABLE IF EXISTS `apar_form_data`;
CREATE TABLE IF NOT EXISTS `apar_form_data` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `form_id` bigint UNSIGNED NOT NULL,
  `section` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apar_form_data_form_id_section_field_name_unique` (`form_id`,`section`,`field_name`),
  KEY `apar_form_data_form_id_section_index` (`form_id`,`section`),
  KEY `apar_form_data_section_index` (`section`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_form_data`
--

INSERT INTO `apar_form_data` (`id`, `form_id`, `section`, `field_name`, `field_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'part_3', 'work_planned_reviewing', '5', '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(2, 1, 'part_3', 'scientific_achievements_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(3, 1, 'part_3', 'quality_output_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(4, 1, 'part_3', 'analytical_ability_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(5, 1, 'part_3', 'exceptional_work_reviewing', '2', '2025-10-01 00:40:24', '2025-10-01 01:55:06'),
(6, 1, 'part_3', 'overall_work_output_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(7, 1, 'part_3', 'attitude_work_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(8, 1, 'part_3', 'sense_responsibility_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(9, 1, 'part_3', 'maintenance_discipline_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(10, 1, 'part_3', 'communication_skills_reviewing', '3', '2025-10-01 00:40:24', '2025-10-01 01:55:06'),
(11, 1, 'part_3', 'leadership_qualities_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(12, 1, 'part_3', 'team_spirit_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(13, 1, 'part_3', 'overall_personal_attributes_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(14, 1, 'part_3', 'scientific_capability_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(15, 1, 'part_3', 'st_foresight_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(16, 1, 'part_3', 'decision_making_reviewing', '4', '2025-10-01 00:40:24', '2025-10-01 01:55:06'),
(17, 1, 'part_3', 'innovation_creativity_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(18, 1, 'part_3', 'technical_competence_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(19, 1, 'part_3', 'new_initiative_reviewing', NULL, '2025-10-01 00:40:24', '2025-10-01 00:40:24'),
(20, 1, 'part_3', 'overall_functional_competency_reviewing', '10', '2025-10-01 00:40:24', '2025-10-01 01:55:06'),
(21, 1, 'part_4', 'relation_with_public', 'test', '2025-10-01 00:40:38', '2025-10-01 01:40:42'),
(22, 1, 'part_4', 'training_recommendation', '2', '2025-10-01 00:40:38', '2025-10-01 00:40:38'),
(23, 1, 'part_4', 'state_of_health', 'test', '2025-10-01 00:40:38', '2025-10-01 01:40:42'),
(24, 1, 'part_4', 'integrity_assessment', 'test', '2025-10-01 00:40:38', '2025-10-01 01:40:42'),
(25, 1, 'part_4', 'pen_picture_reporting', 'test', '2025-10-01 00:40:38', '2025-10-01 01:40:42'),
(26, 1, 'part_4', 'overall_numerical_grading', '6', '2025-10-01 00:40:38', '2025-10-01 00:41:19'),
(27, 1, 'part_5', 'reviewing_remarks', 'test', '2025-10-01 00:40:51', '2025-10-01 01:41:13'),
(28, 1, 'part_5', 'disagreement_reason', 'test', '2025-10-01 00:40:51', '2025-10-01 01:41:13'),
(29, 1, 'part_5', 'pen_picture_reviewing', 'test', '2025-10-01 00:40:51', '2025-10-01 01:41:13'),
(30, 1, 'part_5', 'overall_numerical_grading_reviewing', '6', '2025-10-01 00:40:51', '2025-10-01 01:41:13'),
(31, 1, 'part_3', 'work_planned_reporting', '4', '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(32, 1, 'part_3', 'scientific_achievements_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(33, 1, 'part_3', 'quality_output_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(34, 1, 'part_3', 'analytical_ability_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(35, 1, 'part_3', 'exceptional_work_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(36, 1, 'part_3', 'overall_work_output_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(37, 1, 'part_3', 'attitude_work_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(38, 1, 'part_3', 'sense_responsibility_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(39, 1, 'part_3', 'maintenance_discipline_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(40, 1, 'part_3', 'communication_skills_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(41, 1, 'part_3', 'leadership_qualities_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(42, 1, 'part_3', 'team_spirit_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(43, 1, 'part_3', 'overall_personal_attributes_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(44, 1, 'part_3', 'scientific_capability_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(45, 1, 'part_3', 'st_foresight_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(46, 1, 'part_3', 'decision_making_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(47, 1, 'part_3', 'innovation_creativity_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(48, 1, 'part_3', 'technical_competence_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(49, 1, 'part_3', 'new_initiative_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(50, 1, 'part_3', 'overall_functional_competency_reporting', NULL, '2025-10-01 00:41:11', '2025-10-01 00:41:11'),
(51, 1, 'part_b', 'agree_evaluation', 'test', '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(52, 1, 'part_b', 'innovative_summary', 'test', '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(53, 1, 'part_b', 'exceptional_contribution', 'test', '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(54, 1, 'part_b', 'param1_marks', '5', '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(55, 1, 'part_b', 'param1_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(56, 1, 'part_b', 'param2_marks', '4', '2025-10-01 00:41:42', '2025-10-01 02:34:26'),
(57, 1, 'part_b', 'param2_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(58, 1, 'part_b', 'param3_marks', '1', '2025-10-01 00:41:42', '2025-10-01 02:34:26'),
(59, 1, 'part_b', 'param3_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(60, 1, 'part_b', 'param4_marks', '5', '2025-10-01 00:41:42', '2025-10-01 02:34:26'),
(61, 1, 'part_b', 'param4_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(62, 1, 'part_b', 'param5_marks', '5', '2025-10-01 00:41:42', '2025-10-01 02:34:26'),
(63, 1, 'part_b', 'param5_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(64, 1, 'part_b', 'total_marks_obtained', '6', '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(65, 1, 'part_b', 'total_max_marks', NULL, '2025-10-01 00:41:42', '2025-10-01 00:41:42'),
(66, 1, 'part_5', 'agree_with_reporting_officer', 'yes', '2025-10-01 01:41:13', '2025-10-01 01:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `apar_jobs`
--

DROP TABLE IF EXISTS `apar_jobs`;
CREATE TABLE IF NOT EXISTS `apar_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_job_batches`
--

DROP TABLE IF EXISTS `apar_job_batches`;
CREATE TABLE IF NOT EXISTS `apar_job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_migrations`
--

DROP TABLE IF EXISTS `apar_migrations`;
CREATE TABLE IF NOT EXISTS `apar_migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_migrations`
--

INSERT INTO `apar_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_30_111956_create_apar_forms_table', 1),
(5, '2025_09_30_112000_create_apar_roles_table', 1),
(6, '2025_09_30_112005_create_apar_user_roles_table', 1),
(7, '2025_09_30_112009_create_apar_form_data_table', 1),
(8, '2025_10_01_045226_make_optional_fields_nullable_in_apar_forms_table', 2),
(9, '2025_10_01_060329_add_user_relationship_to_apar_forms_table', 3),
(10, '2025_10_01_060344_add_indexes_to_form_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `apar_password_reset_tokens`
--

DROP TABLE IF EXISTS `apar_password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `apar_password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apar_roles`
--

DROP TABLE IF EXISTS `apar_roles`;
CREATE TABLE IF NOT EXISTS `apar_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apar_roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_roles`
--

INSERT INTO `apar_roles` (`id`, `name`, `display_name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'reviewing_officer', 'Reviewing Officer', '[\"create_forms\", \"view_part_3\", \"view_part_4\", \"edit_part_3\", \"edit_part_4\", \"view_part_5\", \"edit_part_5\", \"view_part_b\"]', '2025-09-30 23:15:20', '2025-09-30 23:15:20'),
(2, 'reporting_officer', 'Reporting Officer', '[\"view_part_3\", \"view_part_4\", \"edit_part_3\", \"edit_part_4\", \"view_part_b\", \"edit_part_b\"]', '2025-09-30 23:15:20', '2025-09-30 23:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `apar_sessions`
--

DROP TABLE IF EXISTS `apar_sessions`;
CREATE TABLE IF NOT EXISTS `apar_sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apar_sessions_user_id_index` (`user_id`),
  KEY `apar_sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_sessions`
--

INSERT INTO `apar_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eEKHSKUHVLR9AD0mqXodRs7czx3oUiIEO9vM2unM', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiME5DVUZSN1VXcHpBNnJJeHZrNmJYRVNISTdzVTlKZ0djM3pGTXJDdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1759310269),
('SwKQohCGMCCaK23Mqzmm9YNAlwjZr70haoCtCk29', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicFR4SlpTdlVSWjFma2lTWm9YNmdCaW9oRDJEdDlkQm1pQUZNNU5OQSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1759310222);

-- --------------------------------------------------------

--
-- Table structure for table `apar_users`
--

DROP TABLE IF EXISTS `apar_users`;
CREATE TABLE IF NOT EXISTS `apar_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apar_users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_users`
--

INSERT INTO `apar_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reviewing Officer', 'reviewing.officer@tropmet.res.in', NULL, '$2y$12$lHgHdAMFYTAExmvHBuGcIuHap99pev1U1vZE734G1sFagxPbnDQUK', NULL, '2025-09-30 23:15:21', '2025-09-30 23:15:21'),
(2, 'Reporting Officer', 'reporting.officer@tropmet.res.in', NULL, '$2y$12$iS/i2uUn.gnwFRpPnvJWTuEPFOSOWUoSbDVKUGQ31o.875BulHuI2', NULL, '2025-09-30 23:15:21', '2025-09-30 23:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `apar_user_roles`
--

DROP TABLE IF EXISTS `apar_user_roles`;
CREATE TABLE IF NOT EXISTS `apar_user_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apar_user_roles_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `apar_user_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apar_user_roles`
--

INSERT INTO `apar_user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
