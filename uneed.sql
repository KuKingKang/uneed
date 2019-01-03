-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 03, 2019 at 07:53 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uneed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'Site Administrator', 'administrator@uneed.test', '$2y$10$F9fgQBmhnbAb.cYoaWQIQ.0ZwG7/7jZWFrQNHe9UZS40Qe1.jguMu', '2019-01-03 10:49:12', '2019-01-03 10:49:12', '8TEG8CcoTMrbniyzB7X1BXdfSrcoj6O2loi56jOVARRsVoNbXr3QyON8qwWi');

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id` int(11) NOT NULL,
  `ID_BANTUAN` int(11) DEFAULT NULL,
  `ID_REQUEST` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id` int(11) NOT NULL,
  `ID_USER` int(10) UNSIGNED NOT NULL,
  `ID_REQUEST` int(11) DEFAULT NULL,
  `DESKRIPSI` text,
  `RATING` int(2) DEFAULT NULL,
  `KOMEN` text,
  `LOKASI` varchar(255) NOT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `STATUS` enum('DIPILIH','DITOLAK','DIGANTUNG') NOT NULL DEFAULT 'DIGANTUNG',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id`, `ID_USER`, `ID_REQUEST`, `DESKRIPSI`, `RATING`, `KOMEN`, `LOKASI`, `FILE`, `HARGA`, `STATUS`, `updated_at`, `created_at`) VALUES
(8, 1, NULL, NULL, NULL, NULL, '[\"-6.923700302184781\",\"107.58152985272729\"]', NULL, NULL, 'DIGANTUNG', '2018-12-25 15:14:12', '2018-12-25 15:14:12'),
(9, 1, NULL, NULL, NULL, NULL, '[\"-6.8974565030182164\",\"107.66462344238026\"]', NULL, NULL, 'DIGANTUNG', '2018-12-25 15:38:17', '2018-12-25 15:38:17'),
(10, 1, 10, '2313sdasda', NULL, NULL, '[\"-6.927449297324298\",\"107.61414923709523\"]', 'avatars/o8PZUaJ0huPsHHBex6cxAjmea9vcarpjYYEVArUT.jpeg', 23131321, 'DIGANTUNG', '2018-12-26 10:34:03', '2018-12-26 10:12:03'),
(11, 1, 9, '32135', NULL, NULL, '[\"-6.874960660382537\",\"107.5437600392487\"]', 'avatars/zdHLKllS5ca6s2Ka44zoYkaTDE2r6ehDrkWPULua.jpeg', 3132132, 'DIPILIH', '2018-12-26 16:22:10', '2018-12-26 16:21:53'),
(12, 1, 9, '646548', NULL, NULL, '[\"-6.915861397925936\",\"107.57019890868374\"]', 'avatars/xc1yKV444pNdZhlRTLg7cnAf8ghf0I9rw1CWr4tl.docx', 656, 'DIPILIH', '2018-12-27 18:30:09', '2018-12-27 18:29:50'),
(13, 1, 9, '465465', NULL, NULL, '[\"-6.922677843794353\",\"107.59183071094874\"]', 'avatars/wtTp2Bxld6EiZSASYv3GHWrj6yS2POw0YMsUzuDI.pdf', 555, 'DIPILIH', '2018-12-27 18:36:17', '2018-12-27 18:36:02'),
(14, 1, 12, 'siap', NULL, NULL, '[\"-6.925745212318305\",\"107.61929966620595\"]', NULL, 5000, 'DIPILIH', '2019-01-03 14:22:23', '2019-01-03 14:21:19'),
(15, 1, 13, 'askqi', NULL, NULL, '[\"-6.922337023838569\",\"107.62202875165525\"]', 'avatars/NtCpwhhS1eUVHWJvhaoDaCU4ZkGciOkNxopcMqNa.png', 1111, 'DITOLAK', '2019-01-03 17:01:20', '2019-01-03 15:49:38'),
(16, 1, 13, '6546545', NULL, NULL, '[\"-6.919269633161684\",\"107.65843550300677\"]', NULL, 457, 'DIPILIH', '2019-01-03 17:01:54', '2019-01-03 16:13:59'),
(17, 1, 14, '46', NULL, NULL, '[\"-6.9066590399900285\",\"107.63817136782056\"]', NULL, 888, 'DIPILIH', '2019-01-03 17:59:22', '2019-01-03 17:59:02'),
(18, 1, 15, '7898', 4, 'yyy', '[\"-6.926426847059551\",\"107.62924140994188\"]', NULL, 6666, 'DIPILIH', '2019-01-03 18:11:51', '2019-01-03 18:00:55'),
(19, 25, 16, '5465456', 5, 'mantul', '[\"-6.926426847059551\",\"107.62134183181844\"]', NULL, 123123, 'DIPILIH', '2019-01-03 18:36:55', '2019-01-03 18:35:12');

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
(6, '2018_07_10_115805_penyesuaian_table_users', 2),
(10, '2018_07_16_020754_create_table_categories', 3),
(25, '2018_07_21_203443_create_books_table', 4),
(26, '2018_07_21_204915_create_book_category_table', 5),
(28, '2018_07_25_075101_create_orders_table', 6),
(29, '2018_07_25_082000_create_book_order_table', 7);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `ID_USER` int(10) UNSIGNED NOT NULL,
  `ID_MANAGER` int(11) DEFAULT NULL,
  `TGL_BAYAR` date NOT NULL,
  `BUKTI_BAYAR` varchar(255) NOT NULL,
  `TIPE_BAYAR` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `ID_USER` int(10) UNSIGNED NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `RATING` int(2) DEFAULT NULL,
  `KOMEN` text,
  `LOKASI` varchar(255) NOT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `STATUS` enum('PROSES','SELESAI') NOT NULL DEFAULT 'PROSES',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `ID_USER`, `DESKRIPSI`, `RATING`, `KOMEN`, `LOKASI`, `FILE`, `STATUS`, `updated_at`, `created_at`) VALUES
(1, 1, 'butuh uang', NULL, NULL, '12930821083908293asdasdad asdsdkajd', 'avatars/vTh5O4hP2644SCV0h4XjRjO2uHh2WyYk1bVvEc9o.jpeg', 'PROSES', '2018-12-23 17:20:51', '2018-12-23 17:20:51'),
(2, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/ak5np5qBOIJOyyRZwFuvxq8xbcUWK2x0zlPJqACr.png', 'PROSES', '2018-12-24 16:47:05', '2018-12-24 16:47:05'),
(3, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/ZoMwsXZ6HaL8KGrGNgBjc2XuDhfd7GhGYVzizpyJ.png', 'PROSES', '2018-12-24 16:52:49', '2018-12-24 16:52:49'),
(4, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/SFD7Q9ogmDcyH8WjjJDmgy3dhIBB7C6QD28WYSgR.png', 'PROSES', '2018-12-24 16:53:45', '2018-12-24 16:53:45'),
(5, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/1AL1Gs3PITTQhge0PaLMa7WMpd6rENkBAvcreIAw.png', 'PROSES', '2018-12-24 16:55:19', '2018-12-24 16:55:19'),
(6, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/pvjrR35pdy7TSaCvEH1ADzcm49oBAHAyW6v3M2OO.png', 'PROSES', '2018-12-24 17:05:11', '2018-12-24 17:05:11'),
(7, 1, 'aldjalsjda', NULL, NULL, '1231548', 'avatars/aykV9hZcURXdk0poE0EPriVpX1aAsYjq0sWpFGBK.png', 'PROSES', '2018-12-24 17:09:19', '2018-12-24 17:09:19'),
(8, 1, 'hkh', NULL, NULL, '132135', 'avatars/UBFWIyLk2R9zo4QfaaxokWXYe9Kz3UkYIVbSUasZ.jpeg', 'PROSES', '2018-12-25 03:52:25', '2018-12-25 03:52:25'),
(9, 1, 'sdasdasdsa', 5, 'mantul', '[\"-6.936587348081715\",\"107.60384837887378\"]', 'avatars/aykV9hZcURXdk0poE0EPriVpX1aAsYjq0sWpFGBK.png', 'PROSES', '2018-12-27 19:50:19', '2018-12-25 10:11:13'),
(10, 1, '5156418', NULL, NULL, '[\"-6.959421048963533\",\"107.63749784906383\"]', NULL, 'PROSES', '2018-12-25 13:16:11', '2018-12-25 13:16:11'),
(11, 1, '46465', NULL, NULL, '[\"-6.912048405611606\",\"107.64642525952239\"]', NULL, 'PROSES', '2018-12-27 19:59:59', '2018-12-27 19:59:59'),
(12, 1, 'butuh print', 5, 'mantul', '[\"-6.9243180363886525\",\"107.6048784646959\"]', 'avatars/eupIKQ6w7YIFSaPMMpXfafa6oRf3VrQM6aL0sZTd.txt', 'PROSES', '2019-01-03 14:23:22', '2019-01-03 14:07:16'),
(13, 1, 'asdqqq', 3, '56', '[\"-6.92534049122462\",\"107.60039077679541\"]', 'avatars/pIRJkcBEdFKlOZUhKUuc8HV0mdaIsW4gtpm6ZXgl.rar', 'SELESAI', '2019-01-03 17:53:45', '2019-01-03 15:49:02'),
(14, 1, '546', 3, 'qwe', '[\"-6.911707577984998\",\"107.57088563256512\"]', NULL, 'SELESAI', '2019-01-03 18:00:30', '2019-01-03 17:58:54'),
(15, 1, 'asdq', NULL, NULL, '[\"-6.878646131879583\",\"107.54272995342653\"]', NULL, 'SELESAI', '2019-01-03 18:10:07', '2019-01-03 18:00:48'),
(16, 1, '54564', 4, '86', '[\"-6.903527641243403\",\"107.61309879377657\"]', NULL, 'SELESAI', '2019-01-03 18:37:51', '2019-01-03 18:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_pin` int(2) DEFAULT '0',
  `rating_helper` int(2) DEFAULT '0',
  `jml_pakai` int(10) DEFAULT NULL,
  `tipe_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `address`, `phone`, `avatar`, `status`, `rating_pin`, `rating_helper`, `jml_pakai`, `tipe_user`, `expired`) VALUES
(1, 'Muhammad Azamuddin', 'administrator@larashop.test', '$2y$10$CaHcu3RjHs2Yr1c.hgFOVeM77aJ2soN7JUBLyLyL1NZGMY2UqY3Vq', '75itjmC4o1JU7VKyDTe4YYuE5s0ALz61xdSzOesb55JwWYaiMvKko2qrxGKr', '2018-07-11 02:44:43', '2018-12-27 18:31:20', 'administrator', '[\"ADMIN\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', 'avatars/PlMAyuzkUQZjqZxpbKqEQjaFtTlU8mJiI7WQXHag.png', 'ACTIVE', 4, 0, 0, '', '0000-00-00'),
(4, 'Muhammad Azamuddin', 'azamuddin@live.com', 'bismillah', NULL, '2018-07-12 09:17:37', '2018-07-15 03:25:08', 'azamuddin91', '[\"ADMIN\",\"CUSTOMER\"]', 'Jalan Haji Sarmili', '0871111111', 'avatars/10o6t1i0mRM2BTNHnTYKrh69mSs68li91EDSmoXs.jpeg', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(7, 'Nadia Nurul Mila', 'nadia@gmail.com', 'bismillah', NULL, '2018-07-13 07:59:30', '2018-07-15 09:13:02', 'nadia', '[\"STAFF\",\"CUSTOMER\"]', NULL, NULL, NULL, 'INACTIVE', 0, 0, 0, '', '0000-00-00'),
(8, 'Muhammad Azamuddin', 'hana@humaira.com', 'bismillah', NULL, '2018-07-14 02:47:08', '2018-10-02 08:42:05', 'hana', '[\"ADMIN\",\"STAFF\"]', 'Jalan Haji Sarmili 34', '87808490517', NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(9, 'User Empat', 'user4@gmail.com', 'bismillah', NULL, '2018-07-14 02:50:04', '2018-07-14 02:50:04', 'user4', '[\"CUSTOMER\"]', NULL, NULL, NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(10, 'User Lima', 'user5@gmail.com', 'bismillah', NULL, '2018-07-14 02:53:48', '2018-07-14 02:53:48', 'user5', '[\"ADMIN\"]', NULL, NULL, NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(11, 'User Enam', 'user6@gmail.com', 'bismillah', NULL, '2018-07-14 02:55:38', '2018-07-14 02:55:38', 'user6', '[\"CUSTOMER\"]', NULL, NULL, NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(12, 'Ridwan Mutaffaq', 'ridwan@gmail.com', 'bismillah', NULL, '2018-07-14 05:38:30', '2018-07-14 05:38:30', 'ridwan', '[\"STAFF\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(15, 'Iqbal Kholis', 'iqbal@gmail.com', 'bismillah', NULL, '2018-07-15 04:10:15', '2018-07-15 04:10:15', 'iqbal', '[\"ADMIN\"]', 'Jl Dr Wahidin No 1. Kompleks Kementerian Keuangan. Gedung Djuand\r\nKel Harapan Mulya, Kec Kemayoran', '85781150352', NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(17, 'User ABC', 'userabc@gmail.com', 'bismillah', NULL, '2018-07-15 10:03:19', '2018-07-15 10:03:19', 'userabc', '[\"STAFF\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(18, 'user def', 'userdef@gmail.com', 'bismillah', NULL, '2018-07-15 10:03:47', '2018-07-15 10:03:47', 'userdef', '[\"ADMIN\",\"STAFF\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', NULL, 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(19, 'User Sepuluh', 'user10@gmail.com', 'bismillah', NULL, '2018-07-31 09:29:52', '2018-07-31 09:29:52', 'user10', '[\"STAFF\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '085781107766', 'avatars/7Rsd6DkvGWqyq2pfYqQTDRIRzpLI74nCKynGU64u.png', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(20, 'User Sebelas', 'user11@gmail.com', '$2y$10$e3uPymGhFeCcv20jzw1gvejgjSbWgMUoByLlV5RmH0lDjNMxD7pMm', '4yNWujTy6VCCXhxFB0SBVMIrHmfzQ44seRgQ0QZbOQedrlHpjmYxqR9qiXxr', '2018-07-31 09:34:57', '2018-07-31 09:34:57', 'user11', '[\"STAFF\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', 'avatars/lIjmJvoWLaIOtihHKQjQhzRlwTCvMmSb0B2WNacy.png', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(21, 'User Biasa', 'userbiasa@gmail.com', '$2y$10$dFe7avNTz6N1aXUWhKUJZ.1HqrrxtCuBKapADehUeQoQpPKYXOkiS', 'A8Ta3nEgHuv135Qc2IeHRPbVaMyPY4f5SoPjWVMngmG0n3MNOLYGHAOfHAJF', '2018-07-31 09:39:11', '2018-07-31 09:39:11', 'userbiasa', '[\"CUSTOMER\"]', 'Jalan Harapan Mulya III no 7\r\nKel Harapan Mulya, Kec Kemayoran', '85781107766', 'avatars/Cvkp78zLjkP7p6uHQCup3a5oU23i64z7ulNHYJYE.png', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(22, 'Dhermaga Surya Wicaksono', 'dhermaga.s@gmail.com', '$2y$10$xm582xQYnHPsGc/.1Mx5/ua43lVk8NAv.vOh06uHlyMFCUCLzU8tG', NULL, '2018-10-02 07:05:11', '2018-10-02 07:05:33', 'dhermaga', '[\"STAFF\"]', 'Jalan Haji Sarmili 34', '87808490517', 'avatars/VpaPN4EUezqp6L2U3S5BQkF7IGCuWhosZxoLUNFZ.png', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(23, 'Danar Gumilang Putera', 'danar.gp@gmail.com', '$2y$10$p56x0qCNOuuYr23XT6PIu.6yWpCdN9nRuw1YTwBDXzyVuUquMicFm', NULL, '2018-10-02 08:41:34', '2018-10-02 08:41:34', 'danar.gp', '[\"STAFF\"]', 'Jalan Haji Sarmili 34', '87808490517', 'avatars/DGjJ39VhPJkGqdx9M04GX4n9fST18ONduodKFzmK.png', 'ACTIVE', 0, 0, 0, '', '0000-00-00'),
(24, 'kulhuallah', 'kudass@gmail.com', '$2y$10$7l.krR6d7g4LN5man7LNOupoKiq26CXKr33H6lo/BKWfN2LrHA89m', NULL, '2019-01-03 13:13:07', '2019-01-03 13:13:07', 'kulhuallah', '[\"CUSTOMER\"]', 'asdasdadkajdklajsdlasjdlajsdljasdlkajkldjsaldklkdjsald', '005156455612', 'avatars/hokVVcJfxL72xnMyrLtm1TPfSfWtAIheb6hlGpnn.png', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Alwan Yassin', 'alwanyassin@gmail.com', '$2y$10$ZZ4J2jVmTu/NgzoKAijjb.pqQZF9IxNR7o.TsiIRjD0LfSI/v8HqK', 'yOBiuwUIXE8gh7fZRmUuN0p3mNT3Jdxn5nN3tJuA2rqtgPfwzGAr9QL9sWJB', '2019-01-03 18:33:57', '2019-01-03 18:33:57', 'alwan', '[\"CUSTOMER\"]', 'as45d64as56d4as6d4sa56d4as65d4as6d4sa56da4a65sd', '005156455612', 'avatars/LTORSUiLogIkPlhqGq409lw8QI8ucdotFCJSQius.png', NULL, NULL, 5, NULL, NULL, NULL),
(26, 'akuaku', 'akuaku@gmail.com', '$2y$10$xoc7.6Ew30J58lh1enGuCeaBc41CM8Sv/voAWDwimSkxz3OQ8snU6', '9UvctxueJ9iodCOy3qN5XhmJUYPZWc6cdF3EJqFsj8KeF84IcJ15TuqOJVAg', '2019-01-03 18:45:38', '2019-01-03 18:45:38', 'akuaku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'oneone', 'oneone@gmail.com', '$2y$10$.Uf1FYEBrDvFW9TPs1STVuRR4ZnQSqlWW/TsPQr6sj0pVDUyq2aMm', NULL, '2019-01-03 18:51:01', '2019-01-03 18:51:01', 'oneone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'twotwo', 'twotwo@gmail.com', '$2y$10$na8vhjLjHLlb8vR37yIR5.CHczGPMmcIjnYzcvDACs226Js1kyROa', NULL, '2019-01-03 19:30:08', '2019-01-03 19:30:08', 'twotwo', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_BANTUAN`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_REQUEST`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_REQUEST`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_USER`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_MANAGER`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_USER`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_USER`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_BANTUAN`) REFERENCES `bantuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_REQUEST`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_REQUEST`) REFERENCES `request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_MANAGER`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
