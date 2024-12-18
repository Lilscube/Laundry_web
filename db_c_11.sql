-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 04:24 AM
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
-- Database: `db_c_11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_token` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `no_token`, `created_at`, `updated_at`) VALUES
(2, 13456, '2024-12-15 00:20:54', '2024-12-15 00:20:54'),
(3, 220711934, '2024-12-16 22:18:29', '2024-12-16 22:18:29'),
(4, 123456, '2024-12-16 23:08:38', '2024-12-16 23:08:38'),
(5, 98765, '2024-12-17 08:55:26', '2024-12-17 08:55:26'),
(6, 12345, '2024-12-17 09:17:43', '2024-12-17 09:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_karyawan` varchar(255) DEFAULT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `foto_karyawan`, `nama_karyawan`, `no_telp`, `email`, `created_at`, `updated_at`) VALUES
(4, 'https://i.pinimg.com/474x/b9/f0/02/b9f0020960261d1afc063f2ffcaf972a.jpg', 'Nana', '087860919052', 'nana@gmail.com', '2024-12-17 02:18:23', '2024-12-17 02:18:23'),
(6, 'https://i.pinimg.com/736x/75/b0/10/75b010135a771bbaaf3439d478fba6f4.jpg', 'Ronaldo', '123456789', 'ronaldo@gmail.com', '2024-12-17 09:05:12', '2024-12-17 09:05:12'),
(8, 'https://i.pinimg.com/736x/dd/68/b4/dd68b4bd560c824882f14c998de93b28.jpg', 'Messi', '123456789', 'mesi@gmail.com', '2024-12-17 09:36:09', '2024-12-17 09:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `detail_layanan` text NOT NULL,
  `berat` int(11) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `id_user`, `detail_layanan`, `berat`, `durasi`, `harga`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
(18, 14, 'express', 1, '4 Hari', 10000, 'bank_transfer', '2024-12-17 08:17:57', '2024-12-17 08:17:57'),
(19, 15, 'express', 5, '4 Hari', 50000, 'cash_on_delivery', '2024-12-17 09:01:32', '2024-12-17 09:01:32'),
(20, 15, 'reguler', 5, '4 Hari', 25000, 'cash_on_delivery', '2024-12-17 09:02:53', '2024-12-17 09:02:53'),
(21, 16, 'reguler', 6, '2 hari', 50000, 'COD', '2024-12-17 09:21:06', '2024-12-17 09:21:06'),
(22, 18, 'reguler', 2, '2 Hari', 10000, 'cash_on_delivery', '2024-12-17 09:29:54', '2024-12-17 09:29:54'),
(23, 18, 'express', 3, '2 Hari', 30000, 'cash_on_delivery', '2024-12-17 09:31:20', '2024-12-17 09:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_express`
--

CREATE TABLE `layanan_express` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_layanan_exspres` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_expresses`
--

CREATE TABLE `layanan_expresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_layanan_exspres` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan_expresses`
--

INSERT INTO `layanan_expresses` (`id`, `id_layanan_exspres`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
(12, 18, 'bank_transfer', '2024-12-17 08:17:57', '2024-12-17 08:17:57'),
(13, 19, 'cash_on_delivery', '2024-12-17 09:01:32', '2024-12-17 09:01:32'),
(14, 23, 'cash_on_delivery', '2024-12-17 09:31:20', '2024-12-17 09:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_regulers`
--

CREATE TABLE `layanan_regulers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_layanan_reguler` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan_regulers`
--

INSERT INTO `layanan_regulers` (`id`, `metode_pembayaran`, `created_at`, `updated_at`, `id_layanan_reguler`) VALUES
(5, 'cash_on_delivery', '2024-12-17 09:02:53', '2024-12-17 09:02:53', 20),
(6, 'COD', '2024-12-17 09:21:06', '2024-12-17 09:21:06', 21),
(7, 'cash_on_delivery', '2024-12-17 09:29:54', '2024-12-17 09:29:54', 22);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_13_101027_create_personal_access_tokens_table', 1),
(2, '2024_12_13_154824_create_sessions_table', 1),
(3, '2024_12_13_160125_create_users_table', 1),
(4, '2024_12_13_194412_create_layanans_table', 1),
(5, '2024_12_13_194507_create_total_transaksis_table', 1),
(6, '2024_12_13_194544_create_admins_table', 1),
(7, '2024_12_13_194631_create_karyawans_table', 1),
(8, '2024_12_13_194700_create_layanan_express_table', 1),
(9, '2024_12_13_194743_create_layanan_regulers_table', 1),
(10, '2024_12_13_194821_create_orders_table', 1),
(11, '2024_12_13_194851_create_riwayat_transaksis_table', 1),
(12, '2024_12_16_162023_create_layanan_expresses_table', 2),
(13, '2024_12_16_212832_add_status_to_layanans_table', 3),
(14, '2024_12_17_072234_create_karyawans_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_orders` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', 'b951ba3acfa3e36266a848a14d475ca8b7be0d82bab324d17a4fee13c3034eda', '[\"*\"]', '2024-12-14 09:08:42', NULL, '2024-12-14 08:35:55', '2024-12-14 09:08:42'),
(2, 'App\\Models\\User', 2, 'auth_token', '39c084bc94887790202c432c7271a535ecb276df96c0b1122ce4551c796fa28a', '[\"*\"]', '2024-12-15 00:19:48', NULL, '2024-12-15 00:18:57', '2024-12-15 00:19:48'),
(3, 'App\\Models\\User', 2, 'auth_token', '16dbf3ca3ec8eeb58157efca53cf9d7d70d3dc6373d47d204a7958f8b0d0e98f', '[\"*\"]', '2024-12-16 13:01:14', NULL, '2024-12-15 10:42:54', '2024-12-16 13:01:14'),
(4, 'App\\Models\\User', 2, 'auth_token', 'b641ecb3c80cdafa008f062e77e49520e1b69656ca6044cf3623786daa7e5083', '[\"*\"]', NULL, NULL, '2024-12-16 09:05:49', '2024-12-16 09:05:49'),
(5, 'App\\Models\\User', 12, 'auth_token', 'dd919352146c28a0429066f52e01415842fdb39addd0ee62db67d7ca420ab8bf', '[\"*\"]', NULL, NULL, '2024-12-16 10:00:31', '2024-12-16 10:00:31'),
(6, 'App\\Models\\User', 12, 'auth_token', 'df5f73c3af66b9b9523e4980c009d9edb6dbeff58fcc2c3d2748d2a534f62015', '[\"*\"]', '2024-12-16 11:30:31', NULL, '2024-12-16 11:12:01', '2024-12-16 11:30:31'),
(7, 'App\\Models\\User', 12, 'auth_token', 'eebd7d4fc9668e959cc67e96e95e53961ff46476b4ffdd66dbbf4ef994c37e42', '[\"*\"]', '2024-12-16 12:18:24', NULL, '2024-12-16 11:32:04', '2024-12-16 12:18:24'),
(8, 'App\\Models\\User', 4, 'auth_token', '541f7171b9a2f43ee9ad209908dc2313fdfbd4b544b5985499ca5a0b46f77234', '[\"*\"]', '2024-12-16 12:48:26', NULL, '2024-12-16 12:47:52', '2024-12-16 12:48:26'),
(9, 'App\\Models\\User', 2, 'auth_token', '289bc716ef99e598a4801e168e857d1d5d279d5a7242096b8d8c64b8b997efcd', '[\"*\"]', NULL, NULL, '2024-12-16 13:41:06', '2024-12-16 13:41:06'),
(10, 'App\\Models\\User', 2, 'auth_token', 'ea0d5ef3b618cb696db51b1da3508ca436291db24fa940d58f2fbc71d1488b1c', '[\"*\"]', NULL, NULL, '2024-12-16 13:43:07', '2024-12-16 13:43:07'),
(11, 'App\\Models\\User', 2, 'auth_token', 'ae05cefa2a9375163e04468700990d03ec52d1484ff50b7b9404e5a6db497742', '[\"*\"]', '2024-12-16 23:04:47', NULL, '2024-12-16 23:01:28', '2024-12-16 23:04:47'),
(12, 'App\\Models\\User', 5, 'auth_token', '3fdb9435d878ee1c021d5b41935414ad49977b88a6ecc6310715f903a422da7b', '[\"*\"]', '2024-12-17 00:47:51', NULL, '2024-12-17 00:46:05', '2024-12-17 00:47:51'),
(13, 'App\\Models\\User', 2, 'auth_token', '2bd73675d8202634623ce89a308c3dbfd1a1924eba4bc4d87554788b0ab0073d', '[\"*\"]', NULL, NULL, '2024-12-17 02:35:26', '2024-12-17 02:35:26'),
(14, 'App\\Models\\User', 2, 'auth_token', 'e7e3689fa9a4aa7c97cdb6fa22faf4f42c51123f517b9336db9e8bcb2f64f22e', '[\"*\"]', NULL, NULL, '2024-12-17 03:54:46', '2024-12-17 03:54:46'),
(15, 'App\\Models\\User', 2, 'auth_token', 'd86c35c13419b7f7bc271176036990762eefb11daaf15e53a890e9612259d469', '[\"*\"]', NULL, NULL, '2024-12-17 03:56:42', '2024-12-17 03:56:42'),
(16, 'App\\Models\\User', 5, 'auth_token', '68a1f4ee7f21f984f782d714f0d552d1e617a6a9f64a713623e1500184d4c4db', '[\"*\"]', NULL, NULL, '2024-12-17 04:03:50', '2024-12-17 04:03:50'),
(17, 'App\\Models\\User', 13, 'auth_token', '2e37597f7e991167dfe3da6c15922060909b6272b003289f9e0ed4975e2f84ae', '[\"*\"]', NULL, NULL, '2024-12-17 04:05:21', '2024-12-17 04:05:21'),
(18, 'App\\Models\\User', 13, 'auth_token', '653962787d05a9c3e6820f3a01e464e9123bb3c7c3cb8aabebf725d1621330c2', '[\"*\"]', NULL, NULL, '2024-12-17 04:40:18', '2024-12-17 04:40:18'),
(19, 'App\\Models\\User', 13, 'auth_token', '1a20ff08a73ececeabe94fce27a1bc392fe626b91e5ff95bdd474730ae79a5a8', '[\"*\"]', NULL, NULL, '2024-12-17 06:18:37', '2024-12-17 06:18:37'),
(20, 'App\\Models\\User', 14, 'auth_token', '854ff8e81a54aca1be66944bccc9af7da25a5aa8e45643990a0ee1cfa00b4252', '[\"*\"]', NULL, NULL, '2024-12-17 06:56:13', '2024-12-17 06:56:13'),
(21, 'App\\Models\\User', 14, 'auth_token', '3bca29fb893e79d698fdd3c658185ff87cbb72746ae80912ad73781af151a9cf', '[\"*\"]', '2024-12-17 08:17:57', NULL, '2024-12-17 07:26:08', '2024-12-17 08:17:57'),
(22, 'App\\Models\\User', 16, 'auth_token', '3624341434e79fb3c010e80ab8cd8e9927a2ead744e808541bbc85a6e6584e03', '[\"*\"]', '2024-12-17 08:54:52', NULL, '2024-12-17 08:53:44', '2024-12-17 08:54:52'),
(23, 'App\\Models\\User', 15, 'auth_token', 'b78d241dd41b6e8c1df990f2161a9abef922e20b9ce047be79ea64e97304dea3', '[\"*\"]', '2024-12-17 09:02:53', NULL, '2024-12-17 08:58:02', '2024-12-17 09:02:53'),
(24, 'App\\Models\\User', 17, 'auth_token', '6adea4c1b9d1af59c70c6e4fa4556c766d9af9278ad251df5fc6cde87375a9b6', '[\"*\"]', '2024-12-17 09:16:38', NULL, '2024-12-17 09:14:29', '2024-12-17 09:16:38'),
(25, 'App\\Models\\User', 18, 'auth_token', '6bbad10ab46d6286bd6af405f80226557314f083f187776906a9a83e11bbadf5', '[\"*\"]', '2024-12-17 09:31:20', NULL, '2024-12-17 09:27:27', '2024-12-17 09:31:20'),
(26, 'App\\Models\\User', 18, 'auth_token', '13629b5af11d1ab4d9c68ffab8f6b8707c39baff5c185bbe4dc89030d4d7fef2', '[\"*\"]', NULL, NULL, '2024-12-17 09:49:17', '2024-12-17 09:49:17'),
(27, 'App\\Models\\User', 18, 'auth_token', 'cb0013a757ffb8cff8e7ed86881bcdd1a03b1c66c170c6d7a0dbbe4a8993715c', '[\"*\"]', NULL, NULL, '2024-12-17 20:21:27', '2024-12-17 20:21:27'),
(28, 'App\\Models\\User', 18, 'auth_token', 'fa690f12719f63e986d0b850a23ff203a50f8e07b2e5973c3a126885b4421d35', '[\"*\"]', NULL, NULL, '2024-12-17 20:22:04', '2024-12-17 20:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksis`
--

CREATE TABLE `riwayat_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_riwayat` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bL3iPilhXnBytTyYvw2hqadR9vL9aS7tckwoApar', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTW5rd1pla09nQzJGMHVTbjBrZ3NZa3RqVXl6QlZiWjRBNnIzRHJXYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9Vc2VyUGFnZS90ZW50YW5nS2FtaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734492126);

-- --------------------------------------------------------

--
-- Table structure for table `total_transaksis`
--

CREATE TABLE `total_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_layanan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `no_telp`, `alamat`, `username`, `password`, `created_at`, `updated_at`) VALUES
(5, 'Jetro', 'jetro@gmail.com', '087860919052', 'Jogja', 'jetro29', '$2y$12$FFBxI024BKcX3fnxeYji4OV1cvmZLE2vfZEwmheF/fmUQeEn0nu3W', '2024-12-15 10:35:27', '2024-12-15 10:35:27'),
(6, 'pram', 'pram@gmail.com', '1234567890', 'Jogja', 'pram', '$2y$12$W8ALb7seil7RT/k0ia7m8uxwfpnRqqIczKByM4pzniqYnoeNiNOZm', '2024-12-15 10:44:15', '2024-12-15 10:44:15'),
(7, 'Pasha', 'pasha@gmail.com', '123456789', 'Ponti', 'Pasha Ungu', '$2y$12$7TMqY2oP.OySYTddGFyIsOFMdlziStKJEmerEUh0UHVZtZQEvp1fa', '2024-12-15 21:44:53', '2024-12-15 21:44:53'),
(8, 'Gerry', 'gerry@gmail.com', '123456789', 'Jogja', 'Gerry69', '$2y$12$jMyJydduzUzjwuiAW/QlBudPr7U3HKiSBuCxNe0ATAe7k6NLjgX0O', '2024-12-16 06:42:24', '2024-12-16 06:42:24'),
(14, 'anjes', 'anjesvernanda@gmail.com', '087860919052', 'Bali, Badung, abiansemal', 'anjes29', '$2y$12$SozEnbF1XB/djSm2RjEIY.gvwjcR5JoCISl5EWD.D5LFqiO7qEl5W', '2024-12-17 06:55:48', '2024-12-17 06:55:48'),
(15, 'Nana', 'nana@gmail.com', '1234567890', 'Jogja', 'nana29', '$2y$12$1pqwbinmrvuZndgxOgjP7.NejE8yQ5i0Ovm2EG5H2oXWagpraxfFG', '2024-12-17 08:47:37', '2024-12-17 08:47:37'),
(16, 'Lolo', 'lolo@gmail.com', '12345678', 'Bali', 'lolo29', '$2y$12$DN.mBOf.y4O74Jm4xcP5G.GBbUCwgQAMSPBGfeT/PnYdUta3EKX/K', '2024-12-17 08:53:27', '2024-12-17 08:53:27'),
(18, 'ronaldo', 'ronaldo@gmail.com', '087860919052', 'Jogja', 'ronaldo', '$2y$12$AB3EZKNaHtghtktyBNkfUOfWjfpGpkWRiBqdunj/PbqFOzJa9BsWe', '2024-12-17 09:26:37', '2024-12-17 09:26:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawans_email_unique` (`email`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanans_id_user_foreign` (`id_user`);

--
-- Indexes for table `layanan_express`
--
ALTER TABLE `layanan_express`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_express_id_layanan_exspres_foreign` (`id_layanan_exspres`);

--
-- Indexes for table `layanan_expresses`
--
ALTER TABLE `layanan_expresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_expresses_id_layanan_exspres_foreign` (`id_layanan_exspres`);

--
-- Indexes for table `layanan_regulers`
--
ALTER TABLE `layanan_regulers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_regulers_id_layanan_reguler_foreign` (`id_layanan_reguler`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_orders_foreign` (`id_orders`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_transaksis_id_riwayat_foreign` (`id_riwayat`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `total_transaksis`
--
ALTER TABLE `total_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_transaksis_id_user_foreign` (`id_user`),
  ADD KEY `total_transaksis_id_layanan_foreign` (`id_layanan`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `layanan_express`
--
ALTER TABLE `layanan_express`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan_expresses`
--
ALTER TABLE `layanan_expresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `layanan_regulers`
--
ALTER TABLE `layanan_regulers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_transaksis`
--
ALTER TABLE `total_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanans`
--
ALTER TABLE `layanans`
  ADD CONSTRAINT `layanans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `layanan_express`
--
ALTER TABLE `layanan_express`
  ADD CONSTRAINT `layanan_express_id_layanan_exspres_foreign` FOREIGN KEY (`id_layanan_exspres`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `layanan_expresses`
--
ALTER TABLE `layanan_expresses`
  ADD CONSTRAINT `layanan_expresses_id_layanan_exspres_foreign` FOREIGN KEY (`id_layanan_exspres`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `layanan_regulers`
--
ALTER TABLE `layanan_regulers`
  ADD CONSTRAINT `layanan_regulers_id_layanan_reguler_foreign` FOREIGN KEY (`id_layanan_reguler`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_orders_foreign` FOREIGN KEY (`id_orders`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_transaksis`
--
ALTER TABLE `riwayat_transaksis`
  ADD CONSTRAINT `riwayat_transaksis_id_riwayat_foreign` FOREIGN KEY (`id_riwayat`) REFERENCES `layanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `total_transaksis`
--
ALTER TABLE `total_transaksis`
  ADD CONSTRAINT `total_transaksis_id_layanan_foreign` FOREIGN KEY (`id_layanan`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `total_transaksis_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
