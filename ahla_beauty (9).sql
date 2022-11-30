-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 04:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahla_beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `image_path`, `image_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'http://127.0.0.1:8000/storage/images/16692893660.jpg', NULL, '2022-11-24 06:29:26', '2022-11-24 06:29:26'),
(2, NULL, 'http://127.0.0.1:8000/storage/images/16692893860.jpg', NULL, '2022-11-24 06:29:46', '2022-11-24 06:29:46'),
(3, NULL, 'http://127.0.0.1:8000/storage/images/16692893861.jpg', NULL, '2022-11-24 06:29:46', '2022-11-24 06:29:46'),
(4, NULL, 'http://127.0.0.1:8000/storage/images/16692893950.jpg', NULL, '2022-11-24 06:29:55', '2022-11-24 06:29:55'),
(5, NULL, 'http://127.0.0.1:8000/storage/images/16692893951.jpg', NULL, '2022-11-24 06:29:55', '2022-11-24 06:29:55'),
(6, NULL, 'http://127.0.0.1:8000/storage/images/16692894300.jpg', NULL, '2022-11-24 06:30:30', '2022-11-24 06:30:30'),
(7, NULL, 'http://127.0.0.1:8000/storage/images/16692894301.jpg', NULL, '2022-11-24 06:30:30', '2022-11-24 06:30:30'),
(8, NULL, 'http://127.0.0.1:8000/storage/images/16692895460.jpg', NULL, '2022-11-24 06:32:26', '2022-11-24 06:32:26'),
(9, NULL, 'http://127.0.0.1:8000/storage/images/16692895461.jpg', NULL, '2022-11-24 06:32:26', '2022-11-24 06:32:26'),
(10, NULL, 'http://127.0.0.1:8000/storage/images/16693062320.jpg', NULL, '2022-11-24 11:10:32', '2022-11-24 11:10:32'),
(11, NULL, 'http://127.0.0.1:8000/storage/images/16693062321.jpg', NULL, '2022-11-24 11:10:32', '2022-11-24 11:10:32'),
(12, NULL, 'http://127.0.0.1:8000/storage/images/16693064610.jpg', NULL, '2022-11-24 11:14:22', '2022-11-24 11:14:22'),
(13, NULL, 'http://127.0.0.1:8000/storage/images/16693064621.jpg', NULL, '2022-11-24 11:14:22', '2022-11-24 11:14:22'),
(14, NULL, 'http://127.0.0.1:8000/storage/images/16693064670.jpg', NULL, '2022-11-24 11:14:27', '2022-11-24 11:14:27'),
(15, NULL, 'http://127.0.0.1:8000/storage/images/16693064671.jpg', NULL, '2022-11-24 11:14:27', '2022-11-24 11:14:27'),
(16, NULL, 'http://127.0.0.1:8000/storage/images/16693064790.jpg', NULL, '2022-11-24 11:14:39', '2022-11-24 11:14:39'),
(17, NULL, 'http://127.0.0.1:8000/storage/images/16693064791.jpg', NULL, '2022-11-24 11:14:39', '2022-11-24 11:14:39'),
(18, NULL, 'http://127.0.0.1:8000/storage/images/16693066730.jpg', NULL, '2022-11-24 11:17:53', '2022-11-24 11:17:53'),
(19, NULL, 'http://127.0.0.1:8000/storage/images/16693066731.jpg', NULL, '2022-11-24 11:17:53', '2022-11-24 11:17:53'),
(20, NULL, 'http://127.0.0.1:8000/storage/images/16693066830.jpg', NULL, '2022-11-24 11:18:03', '2022-11-24 11:18:03'),
(21, NULL, 'http://127.0.0.1:8000/storage/images/16693066841.jpg', NULL, '2022-11-24 11:18:04', '2022-11-24 11:18:04'),
(22, NULL, 'http://127.0.0.1:8000/storage/images/16693067020.jpg', NULL, '2022-11-24 11:18:22', '2022-11-24 11:18:22'),
(23, NULL, 'http://127.0.0.1:8000/storage/images/16693067021.jpg', NULL, '2022-11-24 11:18:22', '2022-11-24 11:18:22'),
(24, NULL, 'http://127.0.0.1:8000/storage/images/16693067180.jpg', NULL, '2022-11-24 11:18:38', '2022-11-24 11:18:38'),
(25, NULL, 'http://127.0.0.1:8000/storage/images/16693067181.jpg', NULL, '2022-11-24 11:18:38', '2022-11-24 11:18:38'),
(26, NULL, 'http://127.0.0.1:8000/storage/images/16693067520.jpg', NULL, '2022-11-24 11:19:12', '2022-11-24 11:19:12'),
(27, NULL, 'http://127.0.0.1:8000/storage/images/16693067560.jpg', NULL, '2022-11-24 11:19:16', '2022-11-24 11:19:16'),
(28, NULL, 'http://127.0.0.1:8000/storage/images/16693067630.jpg', NULL, '2022-11-24 11:19:23', '2022-11-24 11:19:23'),
(29, NULL, 'http://127.0.0.1:8000/storage/images/16693067631.jpg', NULL, '2022-11-24 11:19:23', '2022-11-24 11:19:23'),
(30, NULL, 'http://127.0.0.1:8000/storage/images/16693067940.csm_og-image_506cf6a92e.jpg', NULL, '2022-11-24 11:19:54', '2022-11-24 11:19:54'),
(31, NULL, 'http://127.0.0.1:8000/storage/images/16693067941.360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:19:54', '2022-11-24 11:19:54'),
(32, NULL, 'http://127.0.0.1:8000/storage/images/csm_og-image_506cf6a92e.jpg', NULL, '2022-11-24 11:20:16', '2022-11-24 11:20:16'),
(33, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:20:16', '2022-11-24 11:20:16'),
(34, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:27:12', '2022-11-24 11:27:12'),
(35, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:27:40', '2022-11-24 11:27:40'),
(36, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:27:49', '2022-11-24 11:27:49'),
(37, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:28:28', '2022-11-24 11:28:28'),
(38, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:28:41', '2022-11-24 11:28:41'),
(39, NULL, 'http://127.0.0.1:8000/storage/images/360_F_231886636_uDDj731Ren8GAl8t4lZA0oZGQLMWZPOK.jpg', NULL, '2022-11-24 11:29:08', '2022-11-24 11:29:08'),
(40, NULL, 'http://127.0.0.1:8000/storage/images/16693074460.jpg', NULL, '2022-11-24 11:30:46', '2022-11-24 11:30:46'),
(41, NULL, 'http://127.0.0.1:8000/storage/images/16693074461.jpg', NULL, '2022-11-24 11:30:46', '2022-11-24 11:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(529, '2014_10_12_000000_create_users_table', 1),
(530, '2014_10_12_100000_create_password_resets_table', 1),
(531, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(532, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(533, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(534, '2016_06_01_000004_create_oauth_clients_table', 1),
(535, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(536, '2019_08_19_000000_create_failed_jobs_table', 1),
(537, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(538, '2022_10_31_081032_create_categories_table', 1),
(539, '2022_11_03_113643_create_countries_table', 1),
(540, '2022_11_04_061654_create_images_table', 1),
(541, '2022_11_04_094228_create_offers_table', 1),
(543, '2022_11_12_035857_create_cities_table', 1),
(544, '2022_11_13_123055_create_shifts_table', 1),
(545, '2022_11_18_032147_create_locations_table', 1),
(546, '2022_11_18_034536_create_banners_table', 1),
(547, '2022_11_21_084138_create_services_table', 1),
(548, '2022_11_23_004638_create_optionals_table', 1),
(549, '2022_11_23_004645_create_requireds_table', 1),
(550, '2022_11_23_032843_create_other_images_table', 1),
(551, '2022_11_04_103228_create_packages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('8c9109bc204a8a9a440014d8f8db31edbe215d8bc15a42aedcb8f53d1709fd6fbf9a1f5582f5c035', 2, 1, 'API Token', '[]', 0, '2022-11-25 06:58:13', '2022-11-25 06:58:13', '2023-11-25 11:58:13'),
('b36e703c72e31229c1971fa4d4015b9dded0de625d9e65662556022d2ea023aa8baed17f709c73d5', 2, 1, 'API Token', '[]', 0, '2022-11-23 10:21:02', '2022-11-23 10:21:02', '2023-11-23 15:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ahla Beauty Saloon Personal Access Client', '6mEjQph5vwWJJT4fho1tghqwOJ4nlioHYw764JQX', NULL, 'http://localhost', 1, 0, 0, '2022-11-23 10:21:00', '2022-11-23 10:21:00'),
(2, NULL, 'Ahla Beauty Saloon Password Grant Client', 'xMv8LTRZgbpUw6ayd3DVuwqtsw0UzxGEDQ2XAZj0', 'users', 'http://localhost', 0, 1, 0, '2022-11-23 10:21:00', '2022-11-23 10:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-23 10:21:00', '2022-11-23 10:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `optionals`
--

CREATE TABLE `optionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `optionals`
--

INSERT INTO `optionals` (`id`, `package_id`, `service_id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'OK', '121', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(2, NULL, '1', 'OK', '121', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(3, '1', NULL, 'OK', '121', '2022-11-25 06:58:23', '2022-11-25 06:58:23'),
(4, '1', NULL, 'OK', '121', '2022-11-25 06:58:23', '2022-11-25 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `other_images`
--

CREATE TABLE `other_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_images`
--

INSERT INTO `other_images` (`id`, `package_id`, `service_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'OK', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(2, NULL, '1', 'OK', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(3, '1', NULL, 'OK', '2022-11-25 06:58:23', '2022-11-25 06:58:23'),
(4, '1', NULL, 'OK', '2022-11-25 06:58:23', '2022-11-25 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `user_id`, `name`, `price`, `discount`, `description`, `publish_date`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Hair', '121', '33', 'Hello', '11/11/11', '11/11/11', '1', '2022-11-25 06:58:23', '2022-11-25 06:58:23');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requireds`
--

CREATE TABLE `requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requireds`
--

INSERT INTO `requireds` (`id`, `package_id`, `service_id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'OK', '121', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(2, NULL, '1', 'OK', '121', '2022-11-23 10:21:15', '2022-11-23 10:21:15'),
(3, '1', NULL, 'OK', '121', '2022-11-25 06:58:23', '2022-11-25 06:58:23'),
(4, '1', NULL, 'OK', '121', '2022-11-25 06:58:23', '2022-11-25 06:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distance_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availablity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `name`, `date`, `distance_cost`, `availablity`, `category`, `description`, `created_at`, `updated_at`) VALUES
(1, '2', 'Hair', '11/11/11', '33', '11/11/11', '1', 'we awa aeaea', '2022-11-23 10:21:15', '2022-11-23 10:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `salon_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salon_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salon_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_registration_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `average_orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tuesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wednesday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thursday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `friday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `profile_image`, `code`, `password_code`, `account_status`, `email_status`, `salon_id`, `expertise`, `level`, `password`, `role`, `freelancer_license_number`, `salon_name_en`, `salon_name_ar`, `commercial_registration_number`, `certificate`, `category`, `iban`, `country`, `city`, `services_for`, `average_orders`, `service_type`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `shift`, `latitude`, `longitude`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahla Admin', 'admin@ahla.com', '12345678', NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '$2y$10$Vep2QWt6i9rvT/a4SZU4HuzdipYDF4FPgv41CIw7bXK7PM1lPtEve', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 10:20:14', '2022-11-23 10:20:14'),
(2, 'Ahla User', 'User@ahla.com', '12345678', NULL, 'Verified', NULL, '1', '1', NULL, NULL, NULL, '$2y$10$D4wkuoJmM4e/MNyWQ8w4UOoJH2CVluduAR3uEho/xmnYuf6eGG4c6', 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 10:20:14', '2022-11-23 10:20:14'),
(3, 'Ahla Salon', 'Salon@ahla.com', '12345678', NULL, 'Verified', NULL, '1', '1', NULL, NULL, NULL, '$2y$10$k8f8SdvcDRH7Ljogoh4NMeQNtxwU1jT/9uJM2WfJsiTn/jKzFzMMC', 'Salon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 10:20:14', '2022-11-23 10:20:14'),
(4, 'Ahla Staff', 'Staff@ahla.com', '12345678', NULL, 'Verified', NULL, '1', '1', NULL, NULL, NULL, '$2y$10$4uyyJnJqUEI5ae/xkAUFSu7ureQhAkgKil.NjeqhEyvbTk.nft3rm', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-23 10:20:14', '2022-11-23 10:20:14'),
(5, 'Shajahan', 'shahjahanxd78@gmail.com', '12312313s2s', NULL, 'Verified', NULL, '1', '1', NULL, NULL, NULL, '$2y$10$b6Q88s/zgZQiTk/0jZpPS.8h1OeT0daoa9kPq5NsOz7.C.UooZD/G', 'Salon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 04:29:19', '2022-11-24 04:45:38'),
(6, 'Shajahan', 'innocentxd786@gmail.com', '1231231j3s2s', NULL, '480858', NULL, '1', '0', NULL, NULL, NULL, '$2y$10$wAjxVgiWRfQAC2hc31StXuPCWlDoj0l9/yvPz/SBd23j53/MAwFHC', 'User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-24 06:27:30', '2022-11-24 06:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optionals`
--
ALTER TABLE `optionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_images`
--
ALTER TABLE `other_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `requireds`
--
ALTER TABLE `requireds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `optionals`
--
ALTER TABLE `optionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `other_images`
--
ALTER TABLE `other_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requireds`
--
ALTER TABLE `requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
