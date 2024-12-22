
-- Database: `sumit`

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `price` varchar(250) NOT NULL,
  `image` varchar(300) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number` varchar(200) NOT NULL,
  `method` varchar(250) NOT NULL,
  `flat` varchar(300) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(300) NOT NULL,
  `pin_code` varchar(20) NOT NULL,
  `total_quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `street` varchar(25) NOT NULL,
  `city1` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `price` varchar(250) NOT NULL,
  `image` varchar(300) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `products` (`p_id`, `item_name`, `price`, `image`) VALUES
(3, 'Apple iPhone 15 (Black, 128 GB)', '56000', 'Apple iPhone 15 (Black, 128 GB).webp'),
(4, 'REDMI Note 13 5G (Arctic White, 128 GB)  (6 GB RAM)', '25000', 'REDMI Note 13 5G (Arctic White, 128 GB)  (6 GB RAM).webp'),
(5, 'SAMSUNG Galaxy A14 5G (Dark Red, 128 GB)  (6 GB RAM)', '40000', 'SAMSUNG Galaxy A14 5G (Dark Red, 128 GB)  (6 GB RAM).webp'),
(6, 'rog headphones', '2500', 'Item2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

DROP TABLE IF EXISTS `reg`;
CREATE TABLE IF NOT EXISTS `reg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-------------------------------------------------------

--
-- Table structure for table `user_contact`
--

DROP TABLE IF EXISTS `user_contact`;
CREATE TABLE IF NOT EXISTS `user_contact` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `number` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


