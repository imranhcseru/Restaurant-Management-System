-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 08:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

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
(1, '2019_01_24_151057_create_tbl_admin_table', 1),
(2, '2019_01_24_162306_create_tbl_category_table', 2),
(3, '2019_01_25_132356_create_tbl_item_table', 3),
(4, '2019_01_26_084423_create_tbl_user_table', 4),
(5, '2019_01_26_084658_create_tbl_user_table', 5),
(6, '2019_01_26_104543_create_tbl_message_table', 6),
(7, '2019_01_26_143817_create_tbl_order_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `added_by` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `date`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Imran', 'imranhosen133@gmail.com', 'Imran133', '2019-01-26', 'Imran', NULL, NULL),
(2, 'Rakib', 'iamrakib1994@gmail.com', '1234', '2019-01-26', 'Imran', NULL, NULL),
(3, 'Muntaz', 'muntaz.servent.creator@gmail.com', '123456', '2019-01-26', 'Imran', NULL, NULL),
(4, 'Ashraful', 'ash@gmail.com', '123', '2019-01-26', 'Imran', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `added_by` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`, `image`, `date`, `added_by`, `created_at`, `updated_at`) VALUES
(17, 'Italian', '1548475673.jpg', '2019-01-26', 'Imran', NULL, NULL),
(18, 'Biriyani', '1548476566.jpg', '2019-01-26', 'Imran', NULL, NULL),
(20, 'Buffet', '1548476600.png', '2019-01-26', 'Imran', NULL, NULL),
(21, 'Burger', '1548476612.jpg', '2019-01-26', 'Imran', NULL, NULL),
(22, 'Chinese', '1548476623.png', '2019-01-26', 'Imran', NULL, NULL),
(25, 'Indian', '1548476702.jpg', '2019-01-26', 'Imran', NULL, NULL),
(27, 'Mexican', '1548476751.png', '2019-01-26', 'Imran', NULL, NULL),
(28, 'Pizzas', '1548476766.png', '2019-01-26', 'Imran', NULL, NULL),
(29, 'SetMenus', '1548476775.png', '2019-01-26', 'Imran', NULL, NULL),
(30, 'shushi', '1548476790.png', '2019-01-26', 'Imran', NULL, NULL),
(31, 'Steak', '1548476804.png', '2019-01-26', 'Imran', NULL, NULL),
(32, 'Thai', '1548476822.jpg', '2019-01-26', 'Imran', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_desc` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `item_name`, `price`, `image`, `item_desc`, `category`, `type`, `added_by`, `create_date`, `publish_date`) VALUES
(4, 'Caprese salad', 250, '1548478354.jpg', 'Caprese salad is a simple Italian salad, made of sliced fresh mozzarella, tomatoes, and sweet basil, seasoned with salt and olive oil; it is usually arranged on a plate in restaurant practice. Like pizza Margherita, it features the colours of the Italian flag: green, white, and red', 'Mexican', 'draft', 'Imran', '2019-01-26', NULL),
(5, 'Bruschetta', 300, '1548478407.jpg', 'Bruschetta is an antipasto from Italy consisting of grilled bread rubbed with garlic and topped with olive oil and salt. Variations may include toppings of tomato, vegetables, beans, cured meat, or cheese.', 'Mexican', 'draft', 'Imran', '2019-01-26', NULL),
(6, 'Panzanella', 500, '1548478464.jpg', 'Panzanella or panmolle is a Tuscan chopped salad of bread and tomatoes that is popular in the summer. It includes chunks of soaked stale bread and tomatoes, sometimes also onions and basil, dressed with olive oil and vinegar. It is also popular in other parts of central Italy.', 'Mexican', 'draft', 'Imran', '2019-01-26', NULL),
(7, 'Bacon Burger', 320, '1548483989.jpg', 'Its Nice and have complete nutrition.', 'Burger', 'published', 'Imran', '2019-01-26', '2019-01-26'),
(8, 'Green chile Burger', 300, '1548484819.jpg', 'it\'s good for vegeterian.', 'Burger', 'published', 'Imran', '2019-01-26', '2019-01-26'),
(9, 'Umami Burger', 300, '1548484937.jpg', 'It\'s good for mutton liker.', 'Burger', 'published', 'Imran', '2019-01-26', '2019-01-26'),
(10, 'Hyderabadi Biryani', 160, '1548500651.jpg', 'Straight from the streets of Hydrebad,get the authentic flavours simmering in your kitchen. One of the most popular biryani recipes, this dish is surely here to win hearts. It\'s nothing but half-boiled rice layered with fried onions, mint, cooked meat and cooked dum style.', 'Biriyani', 'draft', 'Imran', '2019-01-26', NULL),
(11, 'Keema Biryani', 200, '1548500721.jpg', 'Cook up a storm by combining minced lamb with aromatic spices and. Keema biryani is the delicious amalgamation of rice with aromatic spices and minced meat, dry fruits and rose water that is a delight to relish on.', 'Biriyani', 'draft', 'Imran', '2019-01-26', NULL),
(12, 'Chicken Reshmi Biryani', 300, '1548500838.jpg', 'Explore the burst of flavours enrobed in a mix of chicken and rice. A simple recipe, chicken reshmi biryani is everything you need to celebrate Eid.', 'Biriyani', 'draft', 'Imran', '2019-01-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `name`, `email`, `message`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Imran', 'imranhosen133@gmail.com', 'This is a well furnitured restaurant.', '2019-01-15', NULL, NULL),
(2, 'Rakib', 'iamrakib1994@gmail.com', 'This is a nice restaurant.', '2019-01-15', NULL, NULL),
(3, 'Onu', 'onuran133@gmail.com', 'I love it.', '2019-01-26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `item_id`, `item_name`, `quantity`, `name`, `email`, `phone`, `address`, `date`, `type`, `created_at`, `updated_at`) VALUES
(1, 5, 'Bruschetta', 2, 'Rakib', 'iamrakib1994@gmail.com', '01776625226', 'Rajshahi University', '2019-01-26', 'served', NULL, NULL),
(2, 5, 'Bruschetta', 2, 'Rakib', 'iamrakib1994@gmail.com', '01776625226', 'Rajshahi University', '2019-01-26', 'served', NULL, NULL),
(3, 5, 'Bruschetta', 2, 'Rakib', 'iamrakib1994@gmail.com', '01776625226', 'Rajshahi University', '2019-01-26', 'unserved', NULL, NULL),
(4, 7, 'Bacon Burger', 4, 'Imran', 'imranhosen133@gmail.com', '01764968900', 'Golden Shower', '2019-01-26', 'served', NULL, NULL),
(5, 10, 'Hyderabadi Biryani', 3, 'Imran', 'imranhosen133@gmail.com', '01764968900', 'Golden Shower', '2019-01-26', 'unserved', NULL, NULL),
(7, 6, 'Panzanella', 3, 'Imran', 'imranhosen133@gmail.com', '01764968900', 'Rajshahi University', '2019-01-26', 'unserved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Imran', 'imranhosen133@gmail.com', 'Imran133', '2019-01-26', NULL, NULL),
(2, 'Rakib', 'iamrakib1994@gmail.com', '123', '2019-01-26', NULL, NULL),
(3, 'Muntaz', 'muntaz.servent.creator@gmail.com', '12345', '2019-01-26', NULL, NULL),
(4, 'Ashraful', 'ash@gmail.com', '123', '2019-01-26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
