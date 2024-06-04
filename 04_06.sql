-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2024 at 10:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_products`
--

CREATE TABLE `cart_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_quantity` smallint(6) NOT NULL,
  `product_price` double NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Aubree Glover', NULL, '2024-05-22 00:18:40', '2024-05-22 00:18:40'),
(2, 'Dr. Madisyn Tremblay V', NULL, '2024-05-22 00:18:40', '2024-05-22 00:18:40'),
(3, 'Prof. Frankie Altenwerth IV', NULL, '2024-05-22 00:18:40', '2024-05-22 00:18:40'),
(4, 'Ms. Naomi Abbott', NULL, '2024-05-22 00:18:40', '2024-05-22 00:18:40'),
(5, 'Declan Hegmann', NULL, '2024-05-22 00:18:40', '2024-05-22 00:18:40'),
(7, 'Asus', 11, '2024-05-22 00:18:40', '2024-05-22 01:53:53'),
(8, 'Dell', 11, '2024-05-22 00:18:40', '2024-05-22 01:53:10'),
(9, 'HP', 11, '2024-05-22 00:18:40', '2024-05-22 01:53:30'),
(11, 'Computer', NULL, '2024-05-22 01:17:55', '2024-05-22 01:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 12, NULL, NULL),
(2, 1, 14, NULL, NULL),
(3, 1, 16, NULL, NULL),
(9, 11, 23, NULL, NULL),
(10, 11, 22, NULL, NULL),
(11, 11, 20, NULL, NULL),
(12, 11, 18, NULL, NULL),
(13, 11, 17, NULL, NULL),
(14, 1, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`, `message`) VALUES
(1, 'tesst', 'test@gmail.com', 987654321, '2024-06-04 02:38:48', '2024-06-04 02:38:48', 'x vcxc'),
(2, 'tesst', 'test@gmail.com', 987654321, '2024-06-04 03:35:19', '2024-06-04 03:35:19', 'xcvcx'),
(3, 'zzz', 'test@gmail.com', 987654321, '2024-06-04 03:37:34', '2024-06-04 03:37:34', 'cvc'),
(4, 'zzz', 'test@gmail.com', 987654321, '2024-06-04 03:37:46', '2024-06-04 03:37:46', 'cvc'),
(5, 'aaa', 'test@gmail.com', 987654321, '2024-06-04 03:39:01', '2024-06-04 03:39:01', 'cvcxv'),
(6, 'aaa', 'test@gmail.com', 987654321, '2024-06-04 03:40:14', '2024-06-04 03:40:14', 'xcvc'),
(7, 'aaa', 'test@gmail.com', 987654321, '2024-06-04 03:40:42', '2024-06-04 03:40:42', 'xcvc'),
(8, 'xxx', 'nqh95014@gmail.com', 909, '2024-06-04 03:41:55', '2024-06-04 03:41:55', 'xxx xxx'),
(9, 'qqq', 'nqh95014@gmail.com', 987654321, '2024-06-04 03:43:43', '2024-06-04 03:43:43', 'qqq qqq');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` double NOT NULL,
  `expery_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `value`, `expery_date`, `created_at`, `updated_at`) VALUES
(1, 'couponProf. Leone Thiel', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(2, 'couponMicheal Ward', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(3, 'couponThelma Funk', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(4, 'couponJacques McKenzie', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(5, 'couponProf. Sam Thompson', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(6, 'couponLaney Goodwin DVM', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(7, 'couponCamille Reynolds', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(8, 'couponJefferey Brekke', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(9, 'couponMateo Weissnat', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(10, 'couponProf. Kylee Hackett', 'money', 20, '2024-05-29 00:17:48', '2024-05-29 00:17:48', '2024-05-29 00:17:48'),
(11, 'tesst', 'money', 12, '2024-05-28 17:00:00', '2024-05-29 00:40:32', '2024-05-29 00:40:32'),
(12, 'aaa', 'money', 34, '2024-05-28 17:00:00', '2024-05-29 00:41:50', '2024-05-29 00:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_users`
--

CREATE TABLE `coupon_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, '1716263531laravel [MConverter.eu].jpg', 5, 'App\\Models\\User', '2024-05-20 20:52:11', '2024-05-20 20:52:11'),
(10, '1716280196laravel[MConverter.eu].jpg', 1, 'App\\Models\\User', '2024-05-21 01:29:56', '2024-05-21 01:29:56'),
(18, '1716438052default.png', 12, 'App\\Models\\Product', '2024-05-22 21:20:54', '2024-05-22 21:20:54'),
(19, '1716438630default.png', 14, 'App\\Models\\Product', '2024-05-22 21:30:31', '2024-05-22 21:30:31'),
(20, '1716438858laravel[MConverter.eu].jpg', 16, 'App\\Models\\Product', '2024-05-22 21:34:19', '2024-05-22 21:34:19'),
(27, '1716450798laravel[MConverter.eu].jpg', 21, 'App\\Models\\Product', '2024-05-23 00:53:18', '2024-05-23 00:53:18'),
(43, '1716461104hp-pavilion-14-dv2073tu-i5-7c0p2pa-thumb-1-600x600.jpg', 22, 'App\\Models\\Product', '2024-05-23 03:45:04', '2024-05-23 03:45:04'),
(44, '1716461136hp-245-g10-r5-8f155pa-glr-thumb-600x600.jpg', 20, 'App\\Models\\Product', '2024-05-23 03:45:36', '2024-05-23 03:45:36'),
(45, '1716461164hp-240-g9-i3-6l1x7pa-thumb-600x600.jpg', 18, 'App\\Models\\Product', '2024-05-23 03:46:04', '2024-05-23 03:46:04'),
(46, '1716461185hp-pavilion-15-eg2081tu-i5-7c0q4pa-thumb-600x600.jpg', 17, 'App\\Models\\Product', '2024-05-23 03:46:25', '2024-05-23 03:46:25'),
(48, '1716285927default.png', 6, 'App\\Models\\User', '2024-05-23 03:51:09', '2024-05-23 03:51:09'),
(50, '1716461524laravel[MConverter.eu].jpg', 2, 'App\\Models\\User', '2024-05-23 03:52:04', '2024-05-23 03:52:04'),
(52, '1716461076hp-15s-fq5229tu-i3-8u237pa-thumb-600x600.png', 23, 'App\\Models\\Product', '2024-05-23 21:34:04', '2024-05-23 21:34:04');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_15_081015_create_permission_tables', 1),
(6, '2024_05_16_072501_create_products_table', 1),
(7, '2024_05_16_080748_create_product_details_table', 1),
(8, '2024_05_17_015824_create_images_table', 1),
(9, '2024_05_17_020214_create_carts_table', 1),
(10, '2024_05_17_021424_create_categories_table', 1),
(11, '2024_05_17_040020_create_cart_products_table', 1),
(12, '2024_05_17_042242_create_coupons_table', 1),
(13, '2024_05_17_042613_create_orders_table', 1),
(14, '2024_05_17_043813_create_product_orders_table', 1),
(15, '2024_05_17_045023_create_coupon_users_table', 1),
(16, '2024_05_20_032111_change_users_table', 1),
(17, '2024_05_22_065922_refactor_field_parent_id_in_categories_table', 2),
(18, '2024_05_23_093912_update_product_details_table', 3),
(19, '2024_05_23_103814_update_products_table', 4),
(20, '2024_05_30_065318_update_cart_product_table', 5),
(21, '2018_12_23_120000_create_shoppingcart_table', 6),
(22, '2024_06_04_080347_create_contact_table', 6),
(23, '2024_06_04_080623_edit_contact_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total` double NOT NULL,
  `tax` double NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `total`, `tax`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `note`, `user_id`, `created_at`, `updated_at`, `payment`) VALUES
(1, NULL, 1.21, 0.21, 'zzz', 'zzz', '123', '123', 'dvbcx', NULL, '2024-06-04 00:40:40', '2024-06-04 00:40:40', 'on'),
(2, NULL, 1.21, 0.21, 'zzz', 'zzz', '123', '123', 'dvbcx', NULL, '2024-06-04 00:41:13', '2024-06-04 00:41:13', 'on'),
(3, NULL, 1.21, 0.21, 'qqq', 'ww', '123', '342', 'dvbcx', NULL, '2024-06-04 00:44:17', '2024-06-04 00:44:17', 'Paypal'),
(4, NULL, 1.21, 0.21, 'ttt', 'rrr', '23', '124', 'dbdbd', NULL, '2024-06-04 00:44:34', '2024-06-04 00:44:34', 'Bank Transfer'),
(5, NULL, 1.21, 0.21, 'ưerwer', 'sdf', '123', '123', 'cvxcv', NULL, '2024-06-04 00:47:43', '2024-06-04 00:47:43', 'Direct Check');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `group` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `group`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-user', 'Create user', 'User', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(2, 'update-user', 'Update user', 'User', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(3, 'show-user', 'Show user', 'User', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(4, 'delete-user', 'Delete user', 'User', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(5, 'create-role', 'Create Role', 'Role', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(6, 'update-role', 'Update Role', 'Role', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(7, 'show-role', 'Show Role', 'Role', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(8, 'delete-role', 'Delete Role', 'Role', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(9, 'create-category', 'Create category', 'category', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(10, 'update-category', 'Update category', 'category', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(11, 'show-category', 'Show category', 'category', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(12, 'delete-category', 'Delete category', 'category', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(13, 'create-product', 'Create product', 'product', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(14, 'update-product', 'Update product', 'product', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(15, 'show-product', 'Show product', 'product', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(16, 'delete-product', 'Delete product', 'product', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(17, 'create-coupon', 'Create coupon', 'coupon', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(18, 'update-coupon', 'Update coupon', 'coupon', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(19, 'show-coupon', 'Show coupon', 'coupon', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(20, 'delete-coupon', 'Delete coupon', 'coupon', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(21, 'list-order', 'list order', 'orders', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(22, 'update-order-status', 'Update order status', 'orders', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sale` double NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `sale`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Kenny Johnson', 'Et id sapiente rerum est modi numquam. Iure et autem id sed accusamus. Inventore et voluptatem commodi dolorem.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(2, 'Lori Rippin', 'Itaque qui veniam dolorum voluptas doloremque. Ipsum qui omnis qui officia. Accusamus et numquam eos officia ipsam voluptatem. Maxime dolores architecto quo ullam rerum dolor.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(3, 'Mrs. Ollie Gleason', 'Velit sit voluptate corporis est rerum incidunt illum. Sint officia dolorem quis totam minima consequatur odio recusandae. Distinctio libero sunt eligendi provident rerum.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(4, 'Forrest Bruen', 'Officia aliquid architecto temporibus aut quo sit. Quam et ut rem non at. Enim a nobis quo esse voluptatibus.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(5, 'Kelly Borer I', 'Qui placeat vel repudiandae atque. Nostrum aut molestiae voluptatem in optio quia architecto. Quae velit rerum quia rerum. Et harum officia culpa deserunt.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(6, 'Dr. Liza Rippin IV', 'Consequatur fugiat facilis consequatur ipsum reprehenderit aperiam nobis. Corporis cupiditate officiis distinctio et consectetur aut. Nisi voluptas et rerum voluptates.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(7, 'Toy McDermott', 'At dolorum sit et a et qui. Labore vel similique voluptatem et aliquid. Explicabo eos cum libero culpa. Enim iste ipsa quis est. Dolore ut aut praesentium doloremque. Quas porro provident et aut.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(8, 'Kay Metz', 'Nulla ab eos aut dolorum possimus commodi. Fugiat rerum inventore impedit dolores voluptatibus omnis fugiat. Occaecati ducimus ex quae aspernatur nemo quis. Quo cumque et ex rerum modi harum.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(9, 'Ricardo Waters', 'Ratione provident minima nesciunt aut non tenetur eveniet. Consectetur voluptas quisquam velit qui. Perferendis sed libero et non. Aut tempore quia amet soluta alias dolores est.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(10, 'Alanna Koch', 'Sequi quas aut quia saepe. Debitis sint ea beatae non non. Nostrum ut consequatur corrupti sunt.', 0, 200000, '2024-05-22 19:31:08', '2024-05-22 19:31:08'),
(11, 'tesst', '<p>dfgdf</p>', 12, 14, '2024-05-22 21:20:52', '2024-05-22 21:20:52'),
(12, 'tesst', '<p>dfgdf</p>', 12, 14, '2024-05-22 21:20:53', '2024-05-22 21:20:53'),
(13, 'aaa', '<p>aaa</p>', 1, 2, '2024-05-22 21:30:30', '2024-05-22 21:30:30'),
(14, 'aaa', '<p>aaa</p>', 1, 2, '2024-05-22 21:30:30', '2024-05-22 21:30:30'),
(15, 'test 1', '<p>gmndfgjdfkjg</p>', 1, 2, '2024-05-22 21:34:18', '2024-05-22 21:34:18'),
(16, 'test 1', '<p>gmndfgjdfkjg</p>', 1, 2, '2024-05-22 21:34:19', '2024-05-22 21:34:19'),
(17, 'HP Pavilion 15 eg2081TU i5 1240P (7C0Q4PA)', '<p>xcsdf</p>', 1, 1, '2024-05-22 21:36:15', '2024-05-23 03:46:25'),
(18, 'HP 240 G9 i3 1215U (6L1X7PA)', '<p>234</p>', 2, 3, '2024-05-22 21:37:29', '2024-05-23 03:46:04'),
(20, 'HP 245 G10 R5 7520U (8F155PA)', '<p>aaaaaaaaaaaa</p>', 1, 1, '2024-05-23 00:09:55', '2024-05-23 03:45:36'),
(22, 'HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA)', '<p>xczvxc</p>', 1, 2, '2024-05-23 02:04:11', '2024-05-23 03:45:04'),
(23, 'HP 15s fq5229TU i3 1215U (8U237PA)', '<p>asfsadf</p>', 8, 10, '2024-05-23 02:50:25', '2024-05-23 19:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `size`, `color`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(9, '30', NULL, 1, 22, NULL, NULL),
(11, 'M', NULL, 1, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_quantity` smallint(6) NOT NULL,
  `product_price` double NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `group` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `group`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'Super Admin', 'system', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(2, 'admin', 'Admin', 'system', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(3, 'employee', 'employee', 'system', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(4, 'manager', 'manager', 'system', 'web', '2024-05-19 21:33:26', '2024-05-19 21:33:26'),
(5, 'user', 'user', 'system', 'web', '2024-05-19 21:33:26', '2024-05-23 03:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`, `gender`) VALUES
(1, 'super-admin', 'super-admin@admin.com', NULL, '$2y$10$mNC0UMI/ebYQXETMWxo5..Ju/9cGgrgcGBuehIuBO/aJK3FAtqzb6', NULL, '2024-05-19 21:32:57', '2024-05-19 21:32:57', 123456789, 'Ha noi', 'male'),
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$mNC0UMI/ebYQXETMWxo5..Ju/9cGgrgcGBuehIuBO/aJK3FAtqzb6', NULL, '2024-05-19 21:32:57', '2024-05-23 03:51:51', 123456789, 'Ha noi', 'female'),
(6, 'member', 'member@gmail.com', NULL, '$2y$10$mNC0UMI/ebYQXETMWxo5..Ju/9cGgrgcGBuehIuBO/aJK3FAtqzb6', NULL, '2024-05-20 21:01:50', '2024-05-23 03:51:09', 987654321, 'hn', 'male'),
(9, 'test', 'test@gmail.com', NULL, '$2y$10$mNC0UMI/ebYQXETMWxo5..Ju/9cGgrgcGBuehIuBO/aJK3FAtqzb6', NULL, '2024-06-01 01:39:53', '2024-06-01 01:39:53', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_products_product_id_foreign` (`product_id`),
  ADD KEY `cart_products_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Indexes for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_users_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_users_user_id_foreign` (`user_id`),
  ADD KEY `coupon_users_order_id_foreign` (`order_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_orders_order_id_foreign` (`order_id`),
  ADD KEY `product_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `coupon_users`
--
ALTER TABLE `coupon_users`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD CONSTRAINT `cart_products_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD CONSTRAINT `coupon_users_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_users_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
