-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2025 at 03:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(1, '1', '12', '5', '2025-01-23 02:56:48', '2025-01-23 05:50:40'),
(3, '1', '17', '2', '2025-01-23 03:59:49', '2025-01-23 05:45:59'),
(4, '1', '8', '1', '2025-01-23 04:00:36', '2025-01-23 04:00:36'),
(5, '1', '9', '3', '2025-01-23 04:00:50', '2025-01-23 05:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `popular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Sun Glasses', 'glasses', 'glasses', '1', '0', '1737530397.jpg', 'glasses', 'glasses', 'glasses', '2025-01-20 06:15:52', '2025-01-22 02:19:57'),
(2, 'Mobile', 'mobile', 'Smart Phone Updated', '1', '0', '1737443383.webp', 'phone', 'phone', 'phone', '2025-01-20 06:18:55', '2025-01-21 02:09:43'),
(3, 'Headsets', 'headsets', 'headsets', '1', '1', '1737530445.jpg', 'headsets', 'headsets', 'headsets', '2025-01-20 06:20:58', '2025-01-22 02:20:45'),
(6, 'Shoes', 'shoes', 'shoes', '1', '1', '1737530501.jpg', 'shoes', 'shoes', 'shoes', '2025-01-20 07:44:28', '2025-01-22 02:21:41'),
(7, 'Watch', 'watch', 'watches', '1', '1', '1737530787.jpg', 'watches', 'watches', 'watches', '2025-01-21 02:02:00', '2025-01-22 02:26:27'),
(8, 'Laptops', 'laptops', 'Laptops', '1', '1', '1737456645.jpg', 'laptops', 'laptops', 'laptops', '2025-01-21 05:50:45', '2025-01-21 05:50:45'),
(9, 'Camera', 'camera', 'camera', '1', '1', '1737530280.jpg', 'camera', 'camera', 'camera', '2025-01-22 02:18:00', '2025-01-22 02:18:00'),
(10, 'Face Washes | Creames', 'face', 'face', '1', '1', '1737531743.jpg', 'face', 'face', 'face', '2025-01-22 02:42:23', '2025-01-22 02:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2025_01_20_074711_create_categories_table', 2),
(6, '2025_01_21_072633_create_products_table', 3),
(7, '2025_01_23_070015_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `tax`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 10, 'Ponds', 'elemis', 'ponds', 'ponds', '490', '500', '1737548346.jpg', '500', '1', 0, 0, 'ponds', 'ponds', 'ponds', '2025-01-21 05:30:29', '2025-01-23 00:33:16'),
(2, 10, 'Ponds', 'derma\'e', 'ponds', 'ponds', '499', '500', '1737548361.jpg', '500', '1', 0, 0, 'ponds', 'ponds', 'ponds', '2025-01-21 05:45:48', '2025-01-23 00:33:37'),
(3, 8, 'Lenovo', 'lenovo', 'lenovo', 'lenovo', '89900', '95000', '1737548241.jpg', '100', '5000', 1, 1, 'lenovo', 'lenovo', 'lenovo', '2025-01-21 05:52:34', '2025-01-22 07:18:05'),
(4, 2, 'Vivo', 'vivo', 'vivo', 'vivo', '34000', '38000', '1737548679.jpg', '1500', '3000', 0, 1, 'vivo', 'vivo', 'vivo', '2025-01-21 05:56:49', '2025-01-22 07:25:11'),
(6, 1, 'Sun Glasses', 'sun-glasses', 'glasses', 'glasses', '1200', '1500', '1737530886.jpg', '300', '200', 0, 0, 'glasses', 'glasses', 'glasses', '2025-01-22 02:28:06', '2025-01-23 00:43:06'),
(7, 2, 'Sun Glasses', 'black-glasses', 'Anim dolor fugit la', 'Ut nemo voluptatum e', '441', '2', '1737531253.jpg', '512', '472', 0, 0, '595', 'Ut nisi accusamus al', 'Consequatur Est ni', '2025-01-22 02:34:13', '2025-01-23 00:42:50'),
(8, 7, 'Rado Watch', 'watches', 'Sit dolor odio natu', 'Sunt ipsum commodi', '253', '194', '1737531312.jpg', '204', '784', 0, 1, '385', 'Illum labore facili', 'Ipsum exercitationem', '2025-01-22 02:35:12', '2025-01-22 06:54:30'),
(9, 7, 'Graiden Perez', 'black-watches', 'Proident aut assume', 'Nemo autem minima in', '145', '991', '1737531360.jpg', '13', '504', 0, 0, '72', 'Sint quo sed dolor', 'Sint voluptas fuga', '2025-01-22 02:36:00', '2025-01-23 00:42:32'),
(10, 7, 'Carissa Ruiz', 'watches', 'Doloremque officiis', 'Dicta omnis quia ea', '727', '18', '1737531406.jpg', '129', '579', 0, 0, '751', 'Sed officia elit vo', 'Maiores dolor accusa', '2025-01-22 02:36:46', '2025-01-22 06:54:43'),
(11, 6, 'Bree Ramsey', 'shoes', 'Quos quisquam assume', 'Cupiditate ut illo i', '871', '559', '1737531453.jpg', '230', '497', 0, 1, '485', 'Eiusmod labore conse', 'Voluptatem officia', '2025-01-22 02:37:33', '2025-01-22 07:11:11'),
(12, 6, 'Cody Butler', 'stylish-shoes', 'A distinctio Deseru', 'Quos rerum cupidatat', '334', '260', '1737531498.jpg', '21', '464', 0, 1, '137', 'Labore velit ipsum e', 'In eos ut irure qui', '2025-01-22 02:38:18', '2025-01-22 06:39:56'),
(13, 6, 'Ignacia Mejia', 'green-shoes', 'Similique illum sin', 'Duis facilis elit r', '866', '557', '1737531523.jpg', '444', '48', 0, 0, '436', 'Consequatur aut rep', 'Quae quia et ut impe', '2025-01-22 02:38:43', '2025-01-22 06:39:39'),
(14, 6, 'Edan Dyer', 'shoes', 'Reprehenderit tenet', 'Placeat est lorem', '554', '567', '1737531562.jpg', '522', '112', 0, 0, '331', 'Voluptatibus molesti', 'Voluptas et ut quide', '2025-01-22 02:39:22', '2025-01-22 23:57:37'),
(15, 3, 'Barry Reid', 'steel-headsets', 'Numquam ut sed offic', 'Quisquam quis eos e', '385', '127', '1737531601.jpg', '792', '544', 0, 0, '869', 'Consectetur qui dis', 'Irure duis officia i', '2025-01-22 02:40:01', '2025-01-23 00:40:38'),
(16, 3, 'Olga Miller', 'black-headsets', 'Eligendi similique i', 'Deserunt cumque qui', '557', '65', '1737531633.jpg', '208', '210', 0, 0, '649', 'Debitis duis aliquip', 'Et pariatur Vero oc', '2025-01-22 02:40:33', '2025-01-23 00:40:23'),
(17, 3, 'Serina Chan', 'pink-headsets', 'Non a autem quidem o', 'Nisi sed omnis tempo', '848', '282', '1737531657.jpg', '588', '542', 0, 0, '365', 'Officiis incidunt e', 'Duis Nam incididunt', '2025-01-22 02:40:57', '2025-01-23 00:40:54'),
(18, 10, 'Kyra Cole', 'curology', 'Cupidatat commodi ac', 'Maxime sint voluptat', '371', '59', '1737531765.jpg', '114', '18', 0, 0, '346', 'Illo sint omnis quib', 'Quas sunt obcaecati', '2025-01-22 02:42:45', '2025-01-23 00:34:00'),
(19, 10, 'Tiger Cortez', 'purple-face', 'Minim omnis aut opti', 'Illum quam rem aut', '153', '627', '1737548380.jpg', '85', '869', 0, 0, '727', 'Quia maxime et amet', 'Et aliquid vel ipsa', '2025-01-22 02:43:06', '2025-01-23 00:42:10'),
(20, 9, 'camera', 'canon', 'camera', 'camera', '35066', '40000', '1737611218.jpg', '50', '4000', 0, 1, 'cam', 'camera', 'camera', '2025-01-23 00:46:58', '2025-01-23 00:46:58'),
(21, 7, 'White', 'white-watch', 'watch', 'watch', '12000', '30000', '1737611306.jpg', '32', '329', 0, 1, 'watch', 'watch', 'watch', '2025-01-23 00:48:26', '2025-01-23 00:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `pincode`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sajid Ali', 'sajidjunejo.muet@gmail.com', NULL, '$2y$10$bKlZvCHGoLgG.OnxVh4D/ORFKiuK6WIcAOuITtO3nXSv/KsMOYPYG', '', '', '', '', '', '', '', '', 0, 'DzwrARtkKKqrl25nXUVVVALReXM7OYpX1oFktRbrN9SDePj4yGdgTYOnqja1', '2025-01-15 23:43:50', '2025-01-15 23:43:50'),
(2, 'Admin', 'admin.muet@gmail.com', NULL, '$2y$10$4NrmnWm4lQQDUX3t2DCKZezq2wwKK6yZzciknX6ELg25OQvHJwq2y', '', '', '', '', '', '', '', '', 1, 'dR95jJRgf7QQpAkcfqq3pl6DpzDPaTwQhXqjQMkjfHlFA2p4cI6XXZBk2iTN', '2025-01-16 08:40:22', '2025-01-16 08:40:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
