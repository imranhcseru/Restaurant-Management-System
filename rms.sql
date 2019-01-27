-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 01:18 PM
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
  `available` int(11) NOT NULL,
  `type` varchar(99) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `item_name`, `price`, `image`, `item_desc`, `category`, `available`, `type`, `added_by`, `create_date`, `update_date`, `publish_date`) VALUES
(13, 'Panzanella', 500, '1548578009.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Panzanella or panmolle is a Tuscan chopped salad of bread and tomatoes that is popular in the summer. It includes chunks of soaked stale bread and tomatoes, sometimes also onions and basil, dressed with olive oil and vinegar. It is also popular in other parts of central Italy</span>', 'Italian', 5, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(14, 'Bruschetta', 450, '1548578070.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Bruschetta is an antipasto from Italy consisting of grilled bread rubbed with garlic and topped with olive oil and salt. Variations may include toppings of tomato, vegetables, beans, cured meat, or cheese.</span>', 'Italian', 10, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(15, 'Caprese salad', 300, '1548578182.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">Caprese salad is a simple Italian salad, made of sliced fresh mozzarella, tomatoes, and sweet basil, seasoned with salt and olive oil; it is usually arranged on a plate in restaurant practice. Like pizza Margherita, it features the colours of the Italian flag: green, white, and red.</span>', 'Italian', 2, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(16, 'Keema Biryani', 120, '1548578535.jpg', '<span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Cook up a storm by combining minced lamb with aromatic spices and&nbsp;</span><a href=\"https://food.ndtv.com/health/why-these-nuts-are-a-superfood-704205\" style=\"text-decoration-line: none; font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); color: rgb(45, 144, 0) !important;\">crunchy nuts</a><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">. Keema biryani is the delicious amalgamation of rice with aromatic spices and minced meat, dry fruits and rose water that is a delight to relish on.&nbsp;</span>', 'Biriyani', 2, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(17, 'Hyderabadi Biryani', 150, '1548578618.jpg', '<span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Straight from the streets of&nbsp;</span><a href=\"https://food.ndtv.com/opinions/from-the-kitchens-of-hyderabads-nizams-haleem-biryani-and-more-1274937\" target=\"_blank\" style=\"text-decoration-line: none; font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); color: rgb(45, 144, 0) !important;\">Hyderabad</a><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">, get the authentic flavours simmering in your kitchen. One of the most popular biryani recipes, this dish is surely here to win hearts. It\'s nothing but half-boiled rice layered with fried onions, mint, cooked meat and cooked dum style.</span>', 'Biriyani', 5, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(18, 'Awadhi Mutton Biryani', 200, '1548578699.jpg', '<span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">What\'s a biryani not cooked in a royal style. A classic from the royal Awadhi kitchen.&nbsp;</span><a href=\"https://food.ndtv.com/lists/10-best-indian-mutton-recipes-693521\" style=\"text-decoration-line: none; font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255); color: rgb(45, 144, 0) !important;\">Mutton</a><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;pieces are cooked to perfection amid fragrant rice. Succulent, marinated mutton, slow-cooked in a melange of roasted spices to make a spicy Awadhi biryani.</span>', 'Biriyani', 5, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(19, 'Hot Water Crust Pastry Hand Raised Chicken and Ham Pie', 1000, '1548578892.jpg', '<p style=\"box-sizing: border-box; margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Lato, Arial; vertical-align: baseline; color: rgb(56, 58, 60);\">This hot water crust hand raised chicken and ham pie is full of warming familiar flavours – from thickly sliced ham to fragrant ground nutmeg, lovely mellow pistachios and sour cranberries, it’s unmistakeably British. This recipe is quite involved, as you will have to make your own pastry, but the steps are incredibly easy to follow and you’ll really impress if you serve this homemade pie up to all your closest friends and family.</p><p style=\"box-sizing: border-box; margin: 0px 0px 1.5em; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Lato, Arial; vertical-align: baseline; color: rgb(56, 58, 60);\">Go to the extra effort and make this chicken and ham pie – it’s got the most buttery pastry and the filling is incredibly comforting and it feels incredibly special. It’s ideal for&nbsp;<a href=\"https://www.womanandhome.com/recipes/christmas\" target=\"_blank\" rel=\"noopener\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(250, 2, 73); outline: 0px; text-decoration-line: none;\">Christmas</a>&nbsp;as it’s incredibly special and it’s usually a time when we have a little more time to make something a bit more elaborate like this pie. The trick with this is to get your filling ready before you make the pastry, as it needs to be handled while warm and pliable.</p>', 'Buffet', 12, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(20, 'Honey Glazed Ham', 200, '1548579022.jpg', '<span style=\"color: rgb(56, 58, 60); font-family: Lato, Arial; font-size: 18px;\">Honey glazed ham makes a delicious centrepiece to a family get together or party. The ham itself is relatively easy to cook, and then you just want to finish it off with a beautiful honey and mustard glaze to give it the classically sweet, sharp and sticky finish that makes it so tasty. Finally you want to add cloves to perfume the meat and to draw the eye to your diamond pattern on the skin of your honey glazed ham. We love to serve our ham hot one evening, with mashed potatoes, crunchy veg and plenty of gravy and then cut it up cold the next evening to put into sandwiches, salads and quiches</span>', 'Buffet', 2, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(21, 'Fattoush salad', 600, '1548579110.jpg', '<span style=\"color: rgb(56, 58, 60); font-family: Lato, Arial; font-size: 18px;\">Fattoush is a&nbsp;</span><a href=\"https://www.womanandhome.com/recipes/tag/middle-eastern/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Lato, Arial; vertical-align: baseline; color: rgb(250, 2, 73); outline: 0px; text-decoration-line: none;\">Middle Eastern</a><span style=\"color: rgb(56, 58, 60); font-family: Lato, Arial; font-size: 18px;\">&nbsp;bread salad that is packed with flavourful fresh herbs. It’s a great way to use up any stale pitta or flatbreads you might have in the bread bin. Fattoush is best when made in advance and left so that the bread soaks up all the flavour of the dressing. This summery&nbsp;</span><a href=\"https://www.womanandhome.com/recipes/tag/salad/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Lato, Arial; vertical-align: baseline; color: rgb(250, 2, 73); outline: 0px; text-decoration-line: none;\">salad</a><span style=\"color: rgb(56, 58, 60); font-family: Lato, Arial; font-size: 18px;\">&nbsp;is perfect for buffets and&nbsp;</span><a href=\"https://www.womanandhome.com/recipes/tag/barbecue/\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Lato, Arial; vertical-align: baseline; color: rgb(250, 2, 73); outline: 0px; text-decoration-line: none;\">barbecues</a><span style=\"color: rgb(56, 58, 60); font-family: Lato, Arial; font-size: 18px;\">, and is also a great lunchbox filler. Cool cucumber, crunchy radish and juicy tomatoes make this salad so light and refreshing. A perfect feed-a-crowd dish for summer entertaining.</span>', 'Buffet', 4, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(22, 'Bacon Burgers', 150, '1548579237.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Pan-Grilled&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Bacon Burgers</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">. Combine ground beef, onion,&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">bacon</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">, Worcestershire sauce, breadcrumbs, egg, salt, and pepper. Mix with hands until blended. Shape the ground beef mixture into 4 to 6&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">burgers</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">and dust them lightly with the flour. Heat 2 tablespoons of vegetable oil in a large skillet over medium heat.</span>', 'Burger', 20, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(23, 'Green Chili Burgers', 120, '1548579360.jpg', '<ul class=\"recipe-directions__list\" style=\"box-sizing: inherit; padding: 0px; margin: 0px 0px 28px 40px; counter-reset: a 0; color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\"><li class=\"recipe-directions__item\" style=\"box-sizing: inherit; list-style-type: disc; display: flex; margin-bottom: 20px;\">In a large bowl, combine bread crumbs, egg, salt and pepper. Add beef; mix lightly but thoroughly. Shape into four 1/2-in.-thick patties. Press a shallow indentation in the center of each with your thumb. Brush both sides of patties with oil.</li><li class=\"recipe-directions__item\" style=\"box-sizing: inherit; list-style-type: disc; display: flex; margin-bottom: 20px;\">Grill burgers, covered, over medium heat or broil 4 in. from heat 4-5 minutes on each side or until a thermometer reads 160°. Top burgers with cheese and chilies; grill 30 seconds longer or until cheese is melted. Serve on buns.</li></ul>', 'Burger', 15, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(24, 'Classic Burger', 100, '1548579526.jpeg', '<span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: FranklinGothicURW-Dem, Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(28, 28, 28); background-color: rgb(255, 255, 255);\">Classic</span><span style=\"color: rgb(28, 28, 28); font-family: FranklinGothicURW-Boo, Helvetica, Arial, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);\">&nbsp;Lightly mix 6 ounces ground beef chuck with a big pinch of kosher salt. Form into a ball, then into a 3/4-inch-thick patty; make an indentation in the center. Heat a cast-iron skillet over medium-high heat; sprinkle the skillet with salt. Cook the burger 4 to 5 minutes per side. Serve on a soft bun.</span>', 'Burger', 30, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(25, 'General Tso\'s chicken', 250, '1548579622.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: small; background-color: rgb(255, 255, 255);\">General Tso\'s chicken is a sweet deep-fried chicken dish that is served in North American Chinese restaurants. The dish is named after Zuo Zongtang, a Qing dynasty statesman and military leader, although there is no recorded connection to him nor is the dish known in Hunan, Zuo\'s home province.</span>', 'Chinese', 12, 'published', 'Imran', '2019-01-27', '2019-01-27', '2019-01-27'),
(26, 'Chicken Chow Mein', 350, '1548579762.jpg', '<ol class=\"X5LH0c\" style=\"margin: 0px; padding: 0px; border: 0px; color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\"><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style: inherit;\">Cook&nbsp;<b>chow mein</b>&nbsp;noodles according to package instructions and drain.</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style: inherit;\">In a large skillet over medium-high heat, heat oil. ...</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style: inherit;\">Meanwhile, make sauce: In a medium bowl, whisk together broth, soy sauce, and oyster sauce.</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style: inherit;\">Pour sauce over skillet and add cooked noodles, tossing to combine.</li></ol>', 'Chinese', 4, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(27, 'Kung Pao Chicken', 300, '1548579897.jpg', '<b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Kung Pao Chicken</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;is stir-fried in a wok or skillet. First, you cook the ginger and garlic with hot oil, then you add the dried red chilies to bring out the spiciness. Add the&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">chicken</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">, peanuts and the&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Kung Pao</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;Sauce and stir fry until the&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">chicken</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;is cooked. My&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">Kung Pao Chicken</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px; background-color: rgb(255, 255, 255);\">&nbsp;recipe is easy, authentic and delicious.</span>', 'Chinese', 5, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(28, 'Butter chicken', 240, '1548580120.jpg', 'Butter chicken or murgh makhani is a dish, originating from the Indian subcontinent, of chicken in a mildly spiced tomato sauce.', 'Indian', 5, 'published', 'Imran', '2019-01-27', NULL, '2019-01-27'),
(29, 'Curry Stand Chicken Tikka Masala', 150, '1548580210.jpg', '1 (14 ounce) can tomato sauce.</li><li class=\"TrT0Xe\" style=\"margin: 0px 0px 4px; padding: 0px; border: 0px; list-style: inherit;\">1 cup heavy whipping cream.2 teaspoons paprika.1 tablespoon white sugar.1 tablespoon vegetable oil.4 skinless, bonelessbreast halves, cut into bite-size pieces.1/2 teaspoon&nbsp;<b>curry</b>&nbsp;powder.', 'Indian', 4, 'draft', 'Imran', '2019-01-27', NULL, NULL),
(30, 'Spicy Vegan Potato Curry', 60, '1548580286.jpg', 'Stir in the onion and garlic; cook and stir until the onion has softened and turned translucent, about 5 minutes. Season with cumin, cayenne pepper,currypowder, garam masala, ginger, and salt; cook for 2 minutes more. Add the tomatoes, garbanzo beans, peas, and', 'Indian', 5, 'draft', 'Imran', '2019-01-27', NULL, NULL),
(31, 'Chicken Tostadas', 250, '1548580381.jpg', 'Crispy Tortillas: Vegetable oil for frying. 6 white corn tortillas. ...Chicken 1/3 cup freshly squeezed lime juice. ...: Refried Beans, warm, recipe follows. ...Refried Beans: 2 tablespoons olive oil. ...Salsa Cruda: 2 ripe tomatoes or 4 plum tomatoes, cored and roughly chopped.', 'Mexican', 4, 'draft', 'Imran', '2019-01-27', NULL, NULL);

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
(3, 5, 'Bruschetta', 2, 'Rakib', 'iamrakib1994@gmail.com', '01776625226', 'Rajshahi University', '2019-01-26', 'served', NULL, NULL),
(4, 7, 'Bacon Burger', 4, 'Imran', 'imranhosen133@gmail.com', '01764968900', 'Golden Shower', '2019-01-26', 'served', NULL, NULL),
(5, 10, 'Hyderabadi Biryani', 53, 'Imran', 'imranhosen133@gmail.com', '01764968900', 'Golden Shower', '2019-01-26', 'unserved', NULL, NULL),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
