-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 12:22 PM
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
-- Database: `db_bookitfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(6) NOT NULL,
  `admin_hotel_id` int(11) DEFAULT NULL,
  `admin_air_id` int(11) DEFAULT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `admin_type` enum('master','hotel','airline') DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `profile_image_url` varchar(255) DEFAULT 'img/user-avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_hotel_id`, `admin_air_id`, `admin_name`, `admin_email`, `phone`, `admin_type`, `password`, `last_login`, `status`, `permissions`, `notes`, `profile_image_url`) VALUES
('ALK4DF', NULL, 2, 'John Doe', 'john.doe@example.com', '+123456789', 'airline', '$2y$10$QH6QyhOu.PEHdc.bTjwCVuvWF7DSSAKl0Jy4M7aAtqeF97HxLbvdS', '2024-02-25 12:00:00', 'active', 'full_access', 'Demo admin for Hotel 1', 'images/profile/65dc6b35e33e3.webp'),
('BONVXX', NULL, NULL, 'Ishrak', 'ishrak@gmail.com', '154545215458', 'master', '$2y$10$Y5WU2GL010xYjAOgA5cOdu9AogLlGtv5FqtZJjJ.23er2Kz8z/vu6', NULL, 'active', NULL, NULL, 'img/user-avatar.png'),
('CPOP5M', NULL, NULL, 'Sujon Islam', 'sujon@mail.com', '01700000000', 'master', '$2y$10$03KJI3foULNNztq2ESpL4uCzDpg981.rAyWRX1GPS8lyHJNY5clKG', NULL, 'active', NULL, NULL, '/img/user-avatar.png'),
('H4N9BC', 2, NULL, 'Jane Smith', 'jane.smith@example.com', '+987654321', 'hotel', '$2y$10$QH6QyhOu.PEHdc.bTjwCVuvWF7DSSAKl0Jy4M7aAtqeF97HxLbvdS', '2024-02-25 14:30:00', 'active', 'limited_access', 'Demo admin for Airline 2', 'img/user-avatar.png'),
('M6L8JY', NULL, NULL, 'Abu Talha', 'abutalha5896@gmail.com', '01700112233', 'master', '$2y$10$QH6QyhOu.PEHdc.bTjwCVuvWF7DSSAKl0Jy4M7aAtqeF97HxLbvdS', '0000-00-00 00:00:00', 'active', NULL, NULL, 'images/profile/375747.webp');

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `airline_id` int(11) NOT NULL,
  `airline_name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `other_details` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'img/a_temp.webp',
  `maps_link` varchar(255) DEFAULT 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `airline_name`, `address`, `email`, `phone`, `other_details`, `image_url`, `maps_link`) VALUES
(1, 'Airline', '123 Main Street, City A', 'airlineA@example.com', '+123 456 7890', 'Details for Airline A', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(2, 'Airline B', '456 Oak Avenue, City B', 'airlineB@example.com', '+234 567 8901', 'Details for Airline B', 'images/airlines/65dfe416464e2.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(3, 'Airline', '789 Pine Road, City C', 'airlineC@example.com', '+345 678 9012', 'Details for Airline C', 'images/airlines/65de65821ee75.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(4, 'Airline D', '101 Palm Lane, City D', 'airlineD@example.com', '+456 789 0123', 'Details for Airline D', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(5, 'Airline E', '234 Maple Street, City E', 'airlineE@example.com', '+567 890 1234', 'Details for Airline E', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(6, 'Airline F', '567 Cedar Road, City F', 'airlineF@example.com', '+678 901 2345', 'Details for Airline F', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(7, 'Airline G', '789 Oak Lane, City G', 'airlineG@example.com', '+789 012 3456', 'Details for Airline G', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(8, 'Airline H', '101 Pine Avenue, City H', 'airlineH@example.com', '+890 123 4567', 'Details for Airline H', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(9, 'Airline I', '234 Birch Street, City I', 'airlineI@example.com', '+901 234 5678', 'Details for Airline I', 'img/a_temp.webp', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`category_id`, `name`) VALUES
(14, 'Adventure'),
(13, 'Architecture'),
(12, 'Art'),
(11, 'Fashion'),
(1, 'Food'),
(10, 'Lifestyle'),
(9, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `user_id`, `post_id`, `content`, `created_at`) VALUES
(2, 56, 38, 'comment', '2024-02-15 18:54:41'),
(3, 9, 38, 'comment2', '2024-02-15 18:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `blog_images_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `published` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`post_id`, `user_id`, `title`, `content`, `category_id`, `image_url`, `published`, `created_at`, `updated_at`) VALUES
(33, 56, 'sdfds', '<p>sdfsdf</p>', 1, 'images/65cdb2b57bc3f.png', 0, '2024-02-15 12:44:05', '2024-02-28 13:53:42'),
(34, 56, 'sdf', '<p>sdfsdf</p>', 1, 'images/65cdb2e78cb07.png', 0, '2024-02-15 12:44:55', '2024-02-29 02:38:54'),
(35, 56, 'sdf', '<p>dfsdf</p>', 1, 'images/65cdb3b021b35.png', 2, '2024-02-15 12:48:16', '2024-02-28 13:49:08'),
(36, 56, 'sdf', '<p>dfsd</p>', 1, 'images/65cdb3fe3df8c.png', 0, '2024-02-15 12:49:34', '2024-02-29 02:38:55'),
(37, 56, 'sdfs', '<p>sdfsdf</p>', 1, 'images/65cdb4bda03d9.jfif', 0, '2024-02-15 12:52:45', '2024-02-29 02:38:56'),
(38, 56, 'Lorem content : lorem text content for testing', '<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Donec in urna turpis. Quisque id neque auctor, consequat orci sed, rhoncus est. Proin congue ac turpis sed pellentesque. Nunc et leo ante. Praesent orci purus, porttitor eu ex in, rutrum porttitor ex. Curabitur et accumsan ex, non semper nulla. Phasellus dignissim vitae dolor nec feugiat. Maecenas tempus sed arcu eu efficitur. Aenean bibendum tincidunt tellus eu sodales. Donec rutrum justo sit amet lacus vulputate, id efficitur elit volutpat. In in vulputate justo. Suspendisse ut dolor posuere, pharetra sem et, pretium quam. Cras fringilla nisi odio, consequat tincidunt turpis pellentesque quis. Suspendisse rutrum nunc ac tempus bibendum.</p>\n<p>Nulla facilisi. Nam vitae dolor quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse auctor, leo at molestie aliquam, magna turpis cursus elit, non dictum massa neque eu metus. Sed in turpis et nibh mattis condimentum at sed dui. Morbi interdum rhoncus eros. Curabitur rutrum nulla nisl, vel faucibus turpis viverra vel. Nam tincidunt scelerisque ultricies. Phasellus tempus metus elit, ut pellentesque nibh sagittis id. Vivamus mauris lorem, dictum in vehicula in, tristique at purus. Ut malesuada ipsum vel nisl rhoncus porta. Duis efficitur ipsum a lorem volutpat, sed sagittis nisi vulputate. Quisque interdum sem dui, sed egestas sapien rutrum ut. Mauris sapien mauris, consectetur quis nibh sit amet, vulputate sollicitudin ligula.</p>\n<p>Mauris mauris massa, volutpat nec velit a, laoreet aliquam purus. Phasellus aliquet maximus est eu congue. Proin vitae cursus odio. Integer magna urna, lacinia at mollis sit amet, scelerisque quis mauris. Sed vel nulla justo. Maecenas tempor ex at felis tempor vehicula. Pellentesque risus tortor, pellentesque ut ultrices non, elementum sit amet neque. Morbi est quam, venenatis non molestie placerat, fringilla non justo. Vivamus a bibendum tortor. Integer nisi augue, interdum sit amet mollis et, lacinia sit amet risus. Nullam posuere varius finibus. Mauris nec enim ornare, euismod dolor vel, sollicitudin ante. Nunc non massa eu velit finibus commodo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque risus orci, tempus at dolor at, tempor rhoncus arcu.</p>\n<p>Etiam gravida malesuada rutrum. In hac habitasse platea dictumst. Cras in justo justo. Duis viverra, enim bibendum ultricies viverra, elit lacus placerat mi, ullamcorper tincidunt erat augue quis ante. Mauris ut suscipit est. Sed egestas congue erat nec venenatis. Pellentesque rhoncus aliquet posuere. Nunc nec enim scelerisque, convallis dui pulvinar, pharetra massa.</p>\n<p>Vestibulum sollicitudin placerat felis, vitae tincidunt est tempor nec. Nullam luctus quam ex, ut ultricies lorem ullamcorper et. Nam magna metus, dignissim ut rhoncus sit amet, semper at risus. Integer volutpat ligula at turpis ultrices tincidunt. Sed efficitur enim eget tellus mollis aliquam. Ut convallis a nunc ac blandit. Maecenas tempus nulla sit amet nisi fermentum egestas. Donec et elit non lorem facilisis sagittis in quis metus. Pellentesque tristique odio lacus, nec faucibus augue tincidunt id.</p>', 1, 'images/65cdd012396d7.png', 0, '2024-02-15 14:49:22', '2024-02-29 02:38:57'),
(39, 56, 'text ', '<p>asdfasdf</p>', 1, 'images/65ce1d66660fc.png', 0, '2024-02-15 20:19:18', '2024-02-29 02:38:58'),
(40, 56, 'Progressively repurpose cutting-edge models Progressively repurpose cutting-edge models Progressively repurpose cutting-edge models', '<p>lorem 100</p>', 1, 'images/65d574585a8b7.jpg', 0, '2024-02-21 09:56:08', '2024-02-29 02:39:21'),
(41, 56, 'Ridiculously Good Air Fryer Tofu', '<p><strong>Introduction:</strong> In the realm of culinary innovation, the air fryer has emerged as a game-changer, turning mundane ingredients into crispy delights. Today, we\'re diving into the world of plant-based goodness with a recipe that will make your taste buds dance - Ridiculously Good Air Fryer Tofu.</p>\r\n<p><strong>Why Air Fryer Tofu?</strong> Tofu, often the unsung hero of vegetarian and vegan diets, takes center stage in this recipe. The air fryer not only cuts down on cooking time but also transforms tofu into golden nuggets of deliciousness. The result? A crunchy exterior that gives way to a tender, flavorful core.</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>1 block of extra-firm tofu</li>\r\n<li>2 tablespoons soy sauce</li>\r\n<li>1 tablespoon maple syrup</li>\r\n<li>1 tablespoon rice vinegar</li>\r\n<li>1 teaspoon garlic powder</li>\r\n<li>1 teaspoon onion powder</li>\r\n<li>1 teaspoon smoked paprika</li>\r\n<li>1 tablespoon cornstarch</li>\r\n<li>Salt and pepper to taste</li>\r\n<li>Sesame seeds and green onions for garnish</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Press and Prep the Tofu:</strong> Start by pressing the tofu to remove excess water. Slice the block into bite-sized cubes or rectangles, depending on your preference.</p>\r\n<p><strong>2. Marinate the Tofu:</strong> In a bowl, whisk together soy sauce, maple syrup, rice vinegar, garlic powder, onion powder, smoked paprika, salt, and pepper. Add the tofu cubes to the marinade, ensuring each piece is well-coated. Let it marinate for at least 15-30 minutes to allow the flavors to penetrate.</p>\r\n<p><strong>3. Coat with Cornstarch:</strong> Sprinkle cornstarch over the marinated tofu cubes and gently toss to coat evenly. This step is crucial for achieving that irresistibly crispy texture.</p>\r\n<p><strong>4. Preheat the Air Fryer:</strong> Preheat your air fryer to 375&deg;F (190&deg;C). A preheated air fryer ensures even cooking and maximum crispiness.</p>\r\n<p><strong>5. Air Fry to Perfection:</strong> Arrange the tofu cubes in a single layer in the air fryer basket, ensuring they are not overcrowded. Cook for 15-20 minutes, shaking the basket halfway through to promote even cooking. The tofu is ready when it reaches a beautiful golden brown color.</p>\r\n<p><strong>6. Garnish and Serve:</strong> Sprinkle sesame seeds and finely chopped green onions over the hot, crispy tofu. The nutty aroma of sesame and the freshness of green onions add a delightful finishing touch.</p>\r\n<p><strong>7. Dipping Sauce (Optional):</strong> Serve your air-fried tofu with a side of your favorite dipping sauce. Whether it\'s a tangy peanut sauce or a sweet chili dip, the choice is yours.</p>\r\n<p><strong>Conclusion:</strong> Experience the magic of air-fried tofu &ndash; a dish that combines simplicity with an explosion of flavors and textures. Ridiculously Good Air Fryer Tofu is not just a recipe; it\'s a celebration of plant-based deliciousness that will leave both vegans and non-vegans reaching for seconds. Get ready to redefine your tofu experience with this crispy sensation!</p>', 1, 'images/65df99aaeb2f3.jpg', 1, '2024-02-29 02:38:02', '2024-02-29 02:38:02'),
(42, 56, 'Baked Tortellini with Sausage', '<p><strong>Introduction:</strong> In the world of comforting, hearty meals, few dishes compare to the satisfaction of a well-baked pasta. Today, we\'re elevating the classic with our Baked Tortellini with Sausage recipe. Brace yourself for a symphony of flavors as cheesy tortellini, savory sausage, and rich tomato sauce unite in a delightful baked ensemble.</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>1 package (about 20 ounces) refrigerated tortellini (cheese-filled)</li>\r\n<li>1 pound Italian sausage, casings removed</li>\r\n<li>1 onion, finely chopped</li>\r\n<li>3 cloves garlic, minced</li>\r\n<li>1 can (28 ounces) crushed tomatoes</li>\r\n<li>1 teaspoon dried oregano</li>\r\n<li>1 teaspoon dried basil</li>\r\n<li>1/2 teaspoon red pepper flakes (optional for a kick)</li>\r\n<li>Salt and black pepper to taste</li>\r\n<li>2 cups shredded mozzarella cheese</li>\r\n<li>1/2 cup grated Parmesan cheese</li>\r\n<li>Fresh basil or parsley for garnish</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Preheat the Oven:</strong></p>\r\n<ul>\r\n<li>Preheat your oven to 375&deg;F (190&deg;C). Grease a baking dish with cooking spray or a light coating of olive oil.</li>\r\n</ul>\r\n<p><strong>2. Cook the Tortellini:</strong></p>\r\n<ul>\r\n<li>Cook the tortellini according to the package instructions but reduce the cooking time by 1-2 minutes since it will continue cooking in the oven. Drain and set aside.</li>\r\n</ul>\r\n<p><strong>3. Brown the Sausage:</strong></p>\r\n<ul>\r\n<li>In a large skillet, brown the Italian sausage over medium-high heat, breaking it into crumbles as it cooks. Once browned, remove excess grease, leaving about a tablespoon in the pan.</li>\r\n</ul>\r\n<p><strong>4. Saut&eacute; Onions and Garlic:</strong></p>\r\n<ul>\r\n<li>Add chopped onions to the skillet and saut&eacute; until translucent. Add minced garlic and cook for an additional minute, allowing the flavors to meld.</li>\r\n</ul>\r\n<p><strong>5. Tomato Sauce Magic:</strong></p>\r\n<ul>\r\n<li>Pour in the crushed tomatoes, dried oregano, dried basil, red pepper flakes (if using), salt, and black pepper. Let the sauce simmer for 10-15 minutes, allowing it to thicken slightly.</li>\r\n</ul>\r\n<p><strong>6. Combine and Layer:</strong></p>\r\n<ul>\r\n<li>In the prepared baking dish, combine the cooked tortellini and sausage-tomato sauce mixture. Mix well to ensure the tortellini is evenly coated. Top with shredded mozzarella and grated Parmesan cheese.</li>\r\n</ul>\r\n<p><strong>7. Bake to Perfection:</strong></p>\r\n<ul>\r\n<li>Bake in the preheated oven for 20-25 minutes or until the cheese is bubbly and golden brown.</li>\r\n</ul>\r\n<p><strong>8. Garnish and Serve:</strong></p>\r\n<ul>\r\n<li>Remove from the oven and let it rest for a few minutes. Garnish with fresh basil or parsley before serving.</li>\r\n</ul>\r\n<p><strong>Conclusion:</strong> Baked Tortellini with Sausage is a culinary adventure that brings the warmth of Italian flavors straight to your table. This easy-to-make dish is perfect for family dinners, potlucks, or anytime you crave a comforting yet sophisticated meal. Get ready to savor the flavor and make this baked wonder a staple in your recipe repertoire!</p>', 1, 'images/65df9a36eae7e.jpg', 1, '2024-02-29 02:40:22', '2024-02-29 02:40:22'),
(43, 56, 'Butter Cauliflower and Chickpeas with Mint Cilantro Sauce', '<p><strong>Introduction:</strong> Embark on a culinary journey that fuses rich, buttery cauliflower with hearty chickpeas, all dancing harmoniously in a vibrant mint cilantro sauce. This Butter Cauliflower and Chickpeas recipe is a celebration of flavors, textures, and the joy of creating a wholesome, plant-powered dish that satisfies both the palate and the soul.</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<p><em>For the Butter Cauliflower and Chickpeas:</em></p>\r\n<ul>\r\n<li>1 large cauliflower, cut into florets</li>\r\n<li>1 can (15 ounces) chickpeas, drained and rinsed</li>\r\n<li>3 tablespoons unsalted butter</li>\r\n<li>1 large onion, finely chopped</li>\r\n<li>3 cloves garlic, minced</li>\r\n<li>1 teaspoon ginger, grated</li>\r\n<li>1 teaspoon ground turmeric</li>\r\n<li>1 teaspoon ground cumin</li>\r\n<li>1 teaspoon ground coriander</li>\r\n<li>1/2 teaspoon chili powder (adjust to taste)</li>\r\n<li>1 cup tomato puree</li>\r\n<li>1/2 cup heavy cream</li>\r\n<li>Salt and pepper to taste</li>\r\n<li>Fresh cilantro leaves for garnish</li>\r\n</ul>\r\n<p><em>For the Mint Cilantro Sauce:</em></p>\r\n<ul>\r\n<li>1 cup fresh cilantro leaves, packed</li>\r\n<li>1/2 cup fresh mint leaves, packed</li>\r\n<li>1/4 cup plain yogurt</li>\r\n<li>2 tablespoons lemon juice</li>\r\n<li>1 teaspoon honey or maple syrup</li>\r\n<li>Salt to taste</li>\r\n<li>2 tablespoons water (adjust for consistency)</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Preheat the Oven:</strong></p>\r\n<ul>\r\n<li>Preheat your oven to 400&deg;F (200&deg;C).</li>\r\n</ul>\r\n<p><strong>2. Roast Cauliflower and Chickpeas:</strong></p>\r\n<ul>\r\n<li>Toss cauliflower florets and chickpeas with a drizzle of olive oil, salt, and pepper. Roast in the preheated oven for 20-25 minutes or until golden and slightly crispy.</li>\r\n</ul>\r\n<p><strong>3. Prepare the Mint Cilantro Sauce:</strong></p>\r\n<ul>\r\n<li>In a blender, combine cilantro, mint, yogurt, lemon juice, honey or maple syrup, salt, and water. Blend until smooth. Adjust the consistency with more water if needed. Set aside.</li>\r\n</ul>\r\n<p><strong>4. Create the Butter Cauliflower and Chickpeas:</strong></p>\r\n<ul>\r\n<li>In a large skillet, melt butter over medium heat. Add chopped onions and cook until softened. Add minced garlic and grated ginger, saut&eacute;ing for an additional minute.</li>\r\n</ul>\r\n<p><strong>5. Spice Infusion:</strong></p>\r\n<ul>\r\n<li>Stir in ground turmeric, ground cumin, ground coriander, and chili powder. Allow the spices to toast for a minute, releasing their aromatic flavors.</li>\r\n</ul>\r\n<p><strong>6. Tomato Magic:</strong></p>\r\n<ul>\r\n<li>Pour in the tomato puree, stirring to combine. Simmer for 5-7 minutes until the sauce thickens slightly.</li>\r\n</ul>\r\n<p><strong>7. Creamy Bliss:</strong></p>\r\n<ul>\r\n<li>Reduce heat to low and add heavy cream. Stir until the sauce becomes creamy and well-incorporated. Season with salt and pepper.</li>\r\n</ul>\r\n<p><strong>8. Unite Cauliflower and Chickpeas:</strong></p>\r\n<ul>\r\n<li>Gently fold the roasted cauliflower and chickpeas into the creamy tomato sauce, ensuring they are well-coated.</li>\r\n</ul>\r\n<p><strong>9. Serve with Mint Cilantro Sauce:</strong></p>\r\n<ul>\r\n<li>Plate the Butter Cauliflower and Chickpeas, drizzling generous spoonfuls of the Mint Cilantro Sauce over the top. Garnish with fresh cilantro leaves.</li>\r\n</ul>\r\n<p><strong>Conclusion:</strong> Elevate your dining experience with this Butter Cauliflower and Chickpeas dish, where bold spices meet creamy textures, and the refreshing Mint Cilantro Sauce ties it all together. Embrace the joy of creating a restaurant-worthy meal in the comfort of your home, and let the aromatic fusion of flavors leave an everlasting impression on your taste buds. Spice up your plate and savor the goodness!</p>', 1, 'images/65df9a9c6822d.jpg', 1, '2024-02-29 02:42:04', '2024-02-29 02:42:04'),
(44, 56, 'Roasted Mushroom Sandwich with Horseradish Aioli', '<p><strong>Introduction:</strong> For those seeking a taste adventure that marries earthy flavors with a zesty kick, the Roasted Mushroom Sandwich with Horseradish Aioli is a symphony of textures and tastes. Elevate your sandwich game with hearty roasted mushrooms, perfectly seasoned and nestled between slices of bread, all adorned with a tangy horseradish aioli. Get ready for a journey of savory satisfaction!</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<p><em>For the Roasted Mushrooms:</em></p>\r\n<ul>\r\n<li>1 pound assorted mushrooms (cremini, shiitake, or your favorite variety), cleaned and sliced</li>\r\n<li>2 tablespoons olive oil</li>\r\n<li>2 cloves garlic, minced</li>\r\n<li>1 teaspoon thyme leaves, fresh or dried</li>\r\n<li>Salt and black pepper to taste</li>\r\n</ul>\r\n<p><em>For the Horseradish Aioli:</em></p>\r\n<ul>\r\n<li>1/2 cup mayonnaise</li>\r\n<li>1 tablespoon prepared horseradish</li>\r\n<li>1 teaspoon Dijon mustard</li>\r\n<li>1 clove garlic, minced</li>\r\n<li>1 tablespoon lemon juice</li>\r\n<li>Salt and black pepper to taste</li>\r\n</ul>\r\n<p><em>For the Sandwich:</em></p>\r\n<ul>\r\n<li>Ciabatta or your favorite bread</li>\r\n<li>Fresh arugula or spinach leaves</li>\r\n<li>Red onion, thinly sliced</li>\r\n<li>Swiss or provolone cheese (optional)</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Roast the Mushrooms:</strong></p>\r\n<ul>\r\n<li>Preheat your oven to 400&deg;F (200&deg;C).</li>\r\n<li>In a bowl, toss sliced mushrooms with olive oil, minced garlic, thyme, salt, and pepper. Spread them on a baking sheet in a single layer. Roast for 20-25 minutes or until golden brown and slightly crispy.</li>\r\n</ul>\r\n<p><strong>2. Prepare the Horseradish Aioli:</strong></p>\r\n<ul>\r\n<li>In a small bowl, whisk together mayonnaise, prepared horseradish, Dijon mustard, minced garlic, lemon juice, salt, and black pepper. Adjust the horseradish amount to your preferred level of heat.</li>\r\n</ul>\r\n<p><strong>3. Assemble the Sandwich:</strong></p>\r\n<ul>\r\n<li>Toast the ciabatta or bread slices to your liking.</li>\r\n<li>Spread a generous layer of horseradish aioli on both sides of the bread.</li>\r\n<li>Layer the roasted mushrooms on one side of the bread.</li>\r\n<li>Add fresh arugula or spinach leaves on top of the mushrooms.</li>\r\n<li>Optionally, include thinly sliced red onion and a layer of Swiss or provolone cheese.</li>\r\n</ul>\r\n<p><strong>4. Bring it Together:</strong></p>\r\n<ul>\r\n<li>Place the other slice of bread on top, pressing gently to secure the layers.</li>\r\n</ul>\r\n<p><strong>5. Serve and Enjoy:</strong></p>\r\n<ul>\r\n<li>Slice the sandwich in half and serve immediately. Pair it with your favorite side or enjoy it as a standalone delight.</li>\r\n</ul>\r\n<p><strong>Conclusion:</strong> The Roasted Mushroom Sandwich with Horseradish Aioli is a culinary masterpiece, combining the earthy richness of mushrooms with the bold kick of horseradish. Whether you\'re a devoted mushroom enthusiast or a casual sandwich lover, this creation promises a symphony of savory delights that will leave your taste buds singing. Elevate your lunchtime experience and savor the joy of crafting and devouring this flavorful masterpiece!</p>', 1, 'images/65df9ab81ad79.jpg', 1, '2024-02-29 02:42:32', '2024-02-29 02:42:32'),
(45, 56, 'Gnocchi with Creamy Mushroom Sauce', '<p><strong>Introduction:</strong> In the realm of comfort cuisine, few dishes evoke the warmth and indulgence quite like Gnocchi with Creamy Mushroom Sauce. This recipe takes pillowy-soft potato dumplings and bathes them in a luxurious, creamy mushroom sauce. Perfectly balanced, this dish is a celebration of simple ingredients coaxed into extraordinary flavor. Brace yourself for a journey into the heart of comfort, where each forkful is a culinary hug.</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<p><em>For the Gnocchi:</em></p>\r\n<ul>\r\n<li>1 pound store-bought gnocchi (or homemade if you\'re feeling ambitious)</li>\r\n<li>Salted boiling water for cooking</li>\r\n</ul>\r\n<p><em>For the Creamy Mushroom Sauce:</em></p>\r\n<ul>\r\n<li>2 tablespoons unsalted butter</li>\r\n<li>1 tablespoon olive oil</li>\r\n<li>1 pound mixed mushrooms (cremini, shiitake, or wild mushrooms), sliced</li>\r\n<li>3 cloves garlic, minced</li>\r\n<li>1 teaspoon thyme leaves, fresh or dried</li>\r\n<li>1/2 cup dry white wine (optional)</li>\r\n<li>1 cup heavy cream</li>\r\n<li>Salt and black pepper to taste</li>\r\n<li>Grated Parmesan cheese for serving</li>\r\n<li>Fresh parsley, chopped, for garnish</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Cook the Gnocchi:</strong></p>\r\n<ul>\r\n<li>In a large pot of salted boiling water, cook the gnocchi according to the package instructions. Gnocchi is ready when it floats to the surface. Drain and set aside.</li>\r\n</ul>\r\n<p><strong>2. Prepare the Creamy Mushroom Sauce:</strong></p>\r\n<ul>\r\n<li>In a large skillet, melt butter and olive oil over medium heat.</li>\r\n<li>Add sliced mushrooms and saut&eacute; until they release their moisture and turn golden brown.</li>\r\n</ul>\r\n<p><strong>3. Infuse the Aromatics:</strong></p>\r\n<ul>\r\n<li>Stir in minced garlic and thyme leaves. Saut&eacute; for an additional minute, allowing the aromatics to infuse the mushrooms.</li>\r\n</ul>\r\n<p><strong>4. Deglaze with Wine (Optional):</strong></p>\r\n<ul>\r\n<li>Pour in the dry white wine (if using) to deglaze the pan, scraping up any flavorful bits from the bottom. Allow the wine to reduce by half.</li>\r\n</ul>\r\n<p><strong>5. Create the Creamy Base:</strong></p>\r\n<ul>\r\n<li>Lower the heat and pour in the heavy cream. Simmer gently until the sauce thickens, about 3-5 minutes. Season with salt and black pepper to taste.</li>\r\n</ul>\r\n<p><strong>6. Combine Gnocchi and Sauce:</strong></p>\r\n<ul>\r\n<li>Add the cooked gnocchi to the skillet, gently tossing to coat each dumpling in the creamy mushroom goodness.</li>\r\n</ul>\r\n<p><strong>7. Serve and Garnish:</strong></p>\r\n<ul>\r\n<li>Spoon the Gnocchi with Creamy Mushroom Sauce onto plates. Grate Parmesan cheese generously over the top and garnish with freshly chopped parsley.</li>\r\n</ul>\r\n<p><strong>8. Indulge:</strong></p>\r\n<ul>\r\n<li>Dive into the pillowy softness of the gnocchi, each bite enveloped in the rich, creamy mushroom sauce. Let the flavors dance on your palate.</li>\r\n</ul>\r\n<p><strong>Conclusion:</strong> Gnocchi with Creamy Mushroom Sauce is a testament to the art of simplicity and sophistication on a plate. This dish invites you to experience the luxurious blend of tender gnocchi and velvety mushroom sauce &ndash; a timeless combination that transforms any meal into a culinary masterpiece. Treat yourself to this indulgent creation, and savor the satisfaction of a dish crafted with love and elegance.</p>', 1, 'images/65df9bc6440b8.jpg', 1, '2024-02-29 02:47:02', '2024-02-29 02:47:02'),
(46, 56, 'Cream Cheese Frosting', '<p><strong>Introduction:</strong> No cake, cupcake, or cinnamon roll is truly complete without a crown of velvety goodness &ndash; Cream Cheese Frosting. Elevate your desserts to the sublime with this easy-to-make recipe that strikes the perfect balance between sweetness and tang. Whether you\'re a baking enthusiast or a novice in the kitchen, this Cream Cheese Frosting is your ticket to transforming ordinary treats into extraordinary delights.</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>8 ounces (1 block) cream cheese, softened</li>\r\n<li>1/2 cup (1 stick) unsalted butter, softened</li>\r\n<li>4 cups powdered sugar</li>\r\n<li>1 teaspoon vanilla extract</li>\r\n<li>A pinch of salt</li>\r\n</ul>\r\n<p><strong>Instructions:</strong></p>\r\n<p><strong>1. Soften the Cream Cheese and Butter:</strong></p>\r\n<ul>\r\n<li>Allow the cream cheese and unsalted butter to come to room temperature. Softening ensures a smooth and lump-free frosting.</li>\r\n</ul>\r\n<p><strong>2. Beat Cream Cheese and Butter:</strong></p>\r\n<ul>\r\n<li>In a large mixing bowl, using a hand mixer or a stand mixer with the paddle attachment, beat the softened cream cheese and butter until creamy and well combined.</li>\r\n</ul>\r\n<p><strong>3. Add Vanilla Extract and Salt:</strong></p>\r\n<ul>\r\n<li>Pour in the vanilla extract and add a pinch of salt. These ingredients enhance the flavor profile of the frosting.</li>\r\n</ul>\r\n<p><strong>4. Gradually Incorporate Powdered Sugar:</strong></p>\r\n<ul>\r\n<li>With the mixer on low speed, gradually add the powdered sugar, one cup at a time. Allow each addition to incorporate before adding more.</li>\r\n</ul>\r\n<p><strong>5. Whip Until Fluffy:</strong></p>\r\n<ul>\r\n<li>Once all the powdered sugar is added, increase the speed to medium-high and whip the frosting until it becomes light, fluffy, and smooth.</li>\r\n</ul>\r\n<p><strong>6. Taste and Adjust:</strong></p>\r\n<ul>\r\n<li>Taste the frosting and adjust the sweetness or vanilla flavor if needed. If the frosting is too thick, you can add a tablespoon of milk to achieve the desired consistency.</li>\r\n</ul>\r\n<p><strong>7. Refrigerate (Optional):</strong></p>\r\n<ul>\r\n<li>If the frosting is too soft, you can refrigerate it for about 15-30 minutes before using. However, be cautious not to refrigerate for too long as it can become too firm.</li>\r\n</ul>\r\n<p><strong>8. Frost Your Creations:</strong></p>\r\n<ul>\r\n<li>Once your cakes, cupcakes, or pastries are completely cooled, generously spread or pipe the Cream Cheese Frosting over them.</li>\r\n</ul>\r\n<p><strong>9. Get Creative:</strong></p>\r\n<ul>\r\n<li>Customize your frosting by adding lemon zest, orange zest, or a touch of cinnamon for a unique twist.</li>\r\n</ul>\r\n<p><strong>Conclusion:</strong> Homemade Cream Cheese Frosting is the ultimate finishing touch that turns ordinary desserts into extraordinary indulgences. The creamy texture, combined with the perfect blend of sweetness and tang, will make your creations stand out and leave everyone reaching for seconds. Embrace the decadence, and let this simple yet divine recipe become your go-to frosting for every sweet masterpiece you create.</p>', 1, 'images/65df9d7e1398b.jpg', 1, '2024-02-29 02:54:22', '2024-02-29 02:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_type` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `map_link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`contact_id`, `contact_type`, `name`, `phone_number`, `address`, `location`, `map_link`, `created_at`) VALUES
(1, 'Hospital', 'City General Hospital ', '123-456-7890', '123 Medical Street, Cityville', 'Dhaka', 'https://maps.app.goo.gl/kkhSB937fZi7ZXrs6', '2024-02-24 08:26:53'),
(2, 'Hospital', 'County Medical Center', '987-654-3210', '456 Emergency Avenue, Townsville', 'Town C', '', '2024-02-24 08:26:53'),
(3, 'Police Station', 'City Police Department', '555-1234', '789 Law Lane, Cityville', 'City A', '', '2024-02-24 08:26:53'),
(4, 'Police Station', 'Town Police Station', '333-9999', '321 Justice Square, Townsville', 'Town B', '', '2024-02-24 08:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `flight_number` varchar(50) NOT NULL,
  `airline_id` int(11) NOT NULL,
  `airplane_model` varchar(255) DEFAULT NULL,
  `departure_city` varchar(100) NOT NULL,
  `arrival_city` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `discount` int(10) DEFAULT NULL,
  `flight_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `total_business_class_seats` int(11) NOT NULL DEFAULT 40,
  `booked_business_class_seats` int(11) NOT NULL DEFAULT 0,
  `total_economy_class_seats` int(11) NOT NULL DEFAULT 40,
  `booked_economy_class_seats` int(11) NOT NULL DEFAULT 0,
  `bag_cabin` int(11) NOT NULL DEFAULT 7,
  `bag_check_in` int(11) NOT NULL DEFAULT 20,
  `cancelation` varchar(3) NOT NULL DEFAULT 'No',
  `other_flight_details` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `flight_number`, `airline_id`, `airplane_model`, `departure_city`, `arrival_city`, `price`, `discount`, `flight_date`, `departure_time`, `arrival_time`, `total_business_class_seats`, `booked_business_class_seats`, `total_economy_class_seats`, `booked_economy_class_seats`, `bag_cabin`, `bag_check_in`, `cancelation`, `other_flight_details`, `image_url`) VALUES
(16, 'ABC123', 1, 'Boeing 737', 'Dhaka', 'Chittagong', 1500, 5, '2024-03-02', '10:00:00', '13:00:00', 40, 0, 100, 20, 7, 20, 'No', 'Details for Flight ABC123', 'img/a_temp.webp'),
(17, 'XYZ789', 2, 'Airbus A320', 'Chittagong', 'Sylhet', 1220, 2, '2024-02-29', '12:00:00', '15:00:00', 15, 0, 50, 15, 7, 20, 'No', 'Details for Flight XYZ789', 'images/airlines/65dfe416464e2.jpg'),
(18, 'JKL456', 3, 'Boeing 747', 'Sylhet', 'Dhaka', 1000, NULL, '2024-03-03', '14:00:00', '17:00:00', 25, 10, 80, 10, 7, 20, 'No', 'Details for Flight JKL456', 'img/a_temp.webp'),
(19, 'MNO789', 4, 'Airbus A330', 'Dhaka', 'Cox\'s Bazar', 0, NULL, '2024-03-04', '16:00:00', '19:00:00', 40, 0, 90, 18, 7, 20, 'No', 'Details for Flight MNO789', 'img/a_temp.webp'),
(20, 'PQR123', 1, 'Boeing 777', 'Cox\'s Bazar', 'Rajshahi', 0, NULL, '2024-03-05', '18:00:00', '21:00:00', 22, 6, 110, 22, 7, 20, 'No', 'Details for Flight PQR123', 'img/a_temp.webp'),
(21, 'STU456', 6, 'Airbus A380', 'Rajshahi', 'Khulna', 0, NULL, '2024-03-06', '20:00:00', '23:00:00', 30, 12, 150, 30, 7, 20, 'No', 'Details for Flight STU456', 'img/a_temp.webp'),
(22, 'VWX789', 1, 'Boeing 787', 'Khulna', 'Barisal', 0, NULL, '2024-03-07', '22:00:00', '01:00:00', 28, 9, 130, 28, 7, 20, 'No', 'Details for Flight VWX789', 'img/a_temp.webp'),
(23, 'YZA123', 8, 'Airbus A350', 'Barisal', 'Jessore', 0, NULL, '2024-03-08', '08:00:00', '11:00:00', 16, 4, 75, 16, 7, 20, 'No', 'Details for Flight YZA123', 'img/a_temp.webp'),
(24, 'BCD456', 9, 'Boeing 737', 'Jessore', 'Rangpur', 0, NULL, '2024-03-09', '10:00:00', '13:00:00', 24, 7, 120, 24, 7, 20, 'No', 'Details for Flight BCD456', 'img/a_temp.webp'),
(27, 'KLM345', 2, 'Airbus A320', 'Sylhet', 'Dhaka', 0, NULL, '2024-03-12', '16:00:00', '19:00:00', 18, 3, 90, 18, 7, 20, 'No', 'Details for Flight KLM345', 'images/airlines/65dfe416464e2.jpg'),
(28, 'NOP678', 3, 'Boeing 777', 'Dhaka', 'Chittagong', 0, NULL, '2024-03-13', '18:00:00', '21:00:00', 22, 6, 110, 22, 7, 20, 'No', 'Details for Flight NOP678', 'img/a_temp.webp'),
(29, 'QRS901', 4, 'Airbus A380', 'Chittagong', 'Sylhet', 0, NULL, '2024-03-14', '20:00:00', '23:00:00', 30, 12, 150, 30, 7, 20, 'No', 'Details for Flight QRS901', 'img/a_temp.webp'),
(31, 'WZF3LS', 1, 'sdfsdf', 'sdfs', 'sdfsdf', 0, 0, '2024-01-31', '18:52:00', '18:52:00', 40, 0, 40, 0, 0, 0, 'No', NULL, 'img/a_temp.webp'),
(32, 'IVPN0H', 1, 'df', 'df', 'df', 0, 0, '2024-02-09', '20:48:00', '20:48:00', 40, 0, 40, 0, 0, 0, 'Yes', NULL, 'img/a_temp.webp'),
(33, '16G15V', 1, 'sdf', 'sdf', 'sdf', 0, 0, '2024-02-08', '20:51:00', '20:50:00', 40, 0, 40, 0, 0, 0, 'No', NULL, 'img/a_temp.webp'),
(34, '2GI7ZN', 2, 'Boeing A7', 'Dhaka', 'Sylhet', 1500, 2, '2024-02-29', '08:55:00', '10:54:00', 40, 0, 40, 0, 7, 20, 'No', NULL, 'images/airlines/65dfe416464e2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flight_bookings`
--

CREATE TABLE `flight_bookings` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `flight_id` int(11) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `booking_date` datetime DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL,
  `ticket_class` varchar(20) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `other_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_bookings`
--

INSERT INTO `flight_bookings` (`id`, `booking_id`, `user_id`, `flight_id`, `payment_status`, `transaction_id`, `booking_date`, `total_price`, `ticket_class`, `seat_number`, `other_details`) VALUES
(34, 'KVFC4N', 56, 16, 'unpaid', 'Flight_65d260ba3c3d6', '2024-02-19 01:55:38', 1496.25, 'economy_class', 'B08', NULL),
(35, 'OOSB6F', 56, 16, 'unpaid', 'Flight_65d262a096d1e', '2024-02-19 02:03:44', 1496.25, 'economy_class', 'B10', NULL),
(36, 'Q9SAIH', 56, 16, 'unpaid', 'Flight_65d258bf45c44', '2024-02-19 00:00:00', 1496.25, 'economy_class', 'C10', NULL),
(37, 'S636D2', 56, 16, 'unpaid', 'Flight_65d25899bb783', '2024-02-19 00:00:01', 1496.25, 'economy_class', 'C10', NULL),
(38, 'UCXZV0', 56, 16, 'unpaid', 'Flight_65d25b721c20e', '2024-02-19 01:33:06', 1496.25, 'economy_class', 'A01', NULL),
(39, 'YK4SMN', 56, 16, 'unpaid', 'Flight_65d2625d093b5', '2024-02-19 02:02:37', 1496.25, 'economy_class', 'B10', NULL),
(40, 'ZULX1L', 56, 16, 'paid', 'Flight_65d257a7a8992', '2024-02-19 00:00:00', 1496.25, 'economy_class', 'C10', NULL),
(41, 'AUMJ02', 56, 16, 'unpaid', 'Flight_65d265b11456e', '2024-02-19 02:16:49', 1496.25, 'economy_class', 'B10', NULL),
(42, '40Q3EU', 56, 16, 'paid', 'Flight_65d266a35832d', '2024-02-19 02:20:51', 2992.50, 'economy_class', 'C09,D09', NULL),
(43, 'L16IWT', 56, 16, 'paid', 'Flight_65d4a8a9825d5', '2024-02-20 19:27:05', 1496.25, 'economy_class', 'B04', NULL),
(44, 'JL4WFK', 64, 34, 'paid', 'Flight_65dfe4d385307', '2024-02-29 07:58:43', 1543.50, 'economy_class', 'A01', NULL),
(45, '3ZI34P', 56, 34, 'paid', 'Flight_65e02afada214', '2024-02-29 12:58:02', 1543.50, 'economy_class', 'D01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking_details`
--

CREATE TABLE `flight_booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `passport_no` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight_booking_details`
--

INSERT INTO `flight_booking_details` (`id`, `booking_id`, `first_name`, `last_name`, `passport_no`, `contact`) VALUES
(1, 'Q9SAIH', 'sdf', 'sf', 'f', 'sfds'),
(2, 'UCXZV0', 'sdf', 'sdf', 'sdf', 'sdf'),
(3, '4XL6O9', 'sdf', 'sdf', 'sdf', 'sdf'),
(4, 'B9MNY3', 'sdf', 'sdf', 'sdf', 'sdf'),
(5, 'KR1OOX', 'sdf', 'sdfsf', 'sdfsdf', 'sdfsdf'),
(6, 'AMDB3N', 'sdf', 'sdfsf', 'sdfsdf', 'sdfsdf'),
(7, '6MUCHU', 'sdf', 'sdf', 'sfd', 'sdf'),
(8, 'KVFC4N', 'sdf', 'sdf', 'sfd', 'sdf'),
(9, '4LEWUY', 'sdf', 'sdf', 'sfd', 'sdf'),
(10, '51P78Q', 'sdf', 'sf', 'f', 'sfs'),
(11, '33ATDX', 'sdf', 'sf', 'f', 'sfs'),
(12, 'BD7APY', 'sdf', 'sf', 'f', 'sfs'),
(13, '81UO2U', 'sdf', 'sf', 'f', 'sfs'),
(14, 'AEGFAD', 'sdf', 'sf', 'f', 'sfs'),
(15, 'YK4SMN', 'sf', 'sdf', 'sdf', 'sdf'),
(16, 'OOSB6F', 'sf', 'sf', 'sf', 'sf'),
(17, '4NZNZO', 'sdf', 'sf', '0170000', 'sdf'),
(18, 'AUMJ02', 'sdfsf', 'sdfsf', 'a1010', 'asdf'),
(19, '40Q3EU', 'asdfasd', 'asdfa', 'asdfasdf', 'asdfasdf'),
(20, '40Q3EU', 'Abu', 'Talha', '123456789', '01725896314'),
(21, 'L16IWT', 'sdf', 'sdf', 'sdfsdf', 'sdf'),
(22, 'JL4WFK', 'Jahidul', 'Islam', '123456789', '01700000000'),
(23, '3ZI34P', 'Ishrak', 'Ahmed', '2345678', '01792347937');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `caption` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `user_id`, `image_url`, `upload_time`, `caption`) VALUES
(11, 56, 'images/gallery/65c3047508b40.png', '2024-02-07 04:17:57', 'sdf'),
(12, 56, 'images/gallery/65c312dc71b67.jpg', '2024-02-07 05:19:24', 'a'),
(13, 56, 'images/gallery/65c312e4a6709.jpg', '2024-02-07 05:19:32', 'b'),
(14, 56, 'images/gallery/65c31342d3a0d.jpg', '2024-02-07 05:21:06', 'd'),
(15, 56, 'images/gallery/65c313c2824d2.jpg', '2024-02-07 05:23:14', 'e'),
(16, 56, 'images/gallery/65c313db38912.jpg', '2024-02-07 05:23:39', 'f'),
(17, 56, 'images/gallery/65c313e0b7a8e.jpg', '2024-02-07 05:23:44', 'g'),
(18, 56, 'images/gallery/65c313ecd17fc.jpg', '2024-02-07 05:23:56', 'h'),
(19, 56, 'images/gallery/65c313fabf403.jpg', '2024-02-07 05:24:10', 'i'),
(20, 56, 'images/gallery/65c314099e0c4.jpg', '2024-02-07 05:24:25', 'j'),
(21, 56, 'images/gallery/65c3140f0f743.jpg', '2024-02-07 05:24:31', 'k'),
(22, 56, 'images/gallery/65c395eb591f8.jpg', '2024-02-07 14:38:35', 'GG'),
(23, 56, 'images/gallery/65c395f98cfd4.jpg', '2024-02-07 14:38:49', 'HH'),
(24, 56, 'images/gallery/65c3980bc3f5e.jpg', '2024-02-07 14:47:39', 'JJ'),
(25, 56, 'images/gallery/65c3a21106e9c.jpg', '2024-02-07 15:30:25', 'f'),
(26, 56, 'images/gallery/65c3a217ae49a.jpeg', '2024-02-07 15:30:31', 'd'),
(27, 56, 'images/gallery/65c3a2241816c.jpg', '2024-02-07 15:30:44', 'f'),
(28, 56, 'images/gallery/65c3a231c3cdb.jpg', '2024-02-07 15:30:57', 'j'),
(29, 56, 'images/gallery/65c3a2400fcaa.jpg', '2024-02-07 15:31:12', 't'),
(30, 56, 'images/gallery/65c3deb56d946.jpg', '2024-02-07 19:49:09', '11'),
(31, 56, 'images/gallery/65c3defacc487.jpg', '2024-02-07 19:50:18', 'o'),
(32, 56, 'images/gallery/65c3df3b63319.jpg', '2024-02-07 19:51:23', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `star` int(11) DEFAULT 1,
  `facilities` text NOT NULL,
  `popularity` int(11) DEFAULT 0,
  `other_details` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'img/h_temp.jpg',
  `maps_link` varchar(255) DEFAULT 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `location`, `address`, `email`, `phone`, `star`, `facilities`, `popularity`, `other_details`, `image_url`, `maps_link`) VALUES
(1, 'Grand Plaza Hotel', 'Dhaka', '123 Main Street, Cityville', 'grandplaza@example.com', '+1 (555) 123-4567', 3, 'wifi,Grand View', 40, 'Free Wi-Fi, Fitness Center', 'images/hotels/65df9611b8fbe.jpeg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(2, 'Oceanview Resort', 'Beachfront', '456 Beach Road, Coastal City', 'oceanview@example.com', '+1 (555) 987-6543', NULL, '', 4, 'Poolside Bar, Spa Services', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(3, 'Hotel Three Star', 'Downtown', '789 Business Avenue, Metropolis', 'three.star@example.com', '+1 (555) 555-5555', NULL, '', 4, 'Conference Rooms, Parking', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(4, 'Lakeside Inn', 'Lakeview', '101 Serenity Lane, Lakeside Town', 'lakeside@example.com', '+1 (555) 111-2222', NULL, '', 4, 'Boat Rentals, Lakeside Dining', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(5, 'Mountain Retreat Lodge', 'Mountainous Region', '234 Summit Road, Mountain Village', 'retreat@example.com', '+1 (555) 333-4444', 3, 'City View, Wifi', 5, 'Hiking Trails, Scenic Views', 'images/hotels/65df94a7d7e22.avif', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(6, 'Dhaka Star Hotel', 'Dhaka', '789 Gulshan Avenue, Dhaka', 'dhakastar@example.com', '+880 2 1234567', 3, 'wifi,view', 4, 'Business Center, Rooftop Lounge', 'images/hotels/pexels-donald-tong-189296.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(7, 'Cox\'s Bazar Paradise Resort', 'Cox\'s Bazar', '123 Beach Road, Cox\'s Bazar', 'paradiseresort@example.com', '+880 34 7654321', 3, 'Cityscape View, Wifi', 5, 'Private Beach Access, Spa', 'images/hotels/65df93dc4a958.avif', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(8, 'Harbor View Hotel', 'Chittagong', '456 Port Road, Chittagong', 'harborview@example.com', '+880 31 5555555', NULL, '', 4, 'Seafood Restaurant, Gym', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(9, 'Serenity Inn', 'Sylhet', '789 Tea Garden Lane, Sylhet', 'serenityinn@example.com', '+880 821 9876543', NULL, '', 4, 'Mountain View Rooms, Conference Hall', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(10, 'Dhaka Haven Hotel', 'Dhaka', '101 Panthapath, Dhaka', 'dhakahaven@example.com', '+880 2 5556666', 2, '', 4, 'Swimming Pool, Banquet Hall', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(11, 'Sunset Resort', 'Cox\'s Bazar', '234 Sunset Boulevard, Cox\'s Bazar', 'sunsetresort@example.com', '+880 34 3333333', NULL, '', 4, 'Beachfront Cottages, Outdoor Activities', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(12, 'Heights Hotel', 'Chittagong', '567 Hilltop Avenue, Chittagong', 'heightshotel@example.com', '+880 31 7777777', NULL, '', 4, 'City View Rooms, Spa', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(13, 'Valley Retreat', 'Sylhet', '789 Valley Road, Sylhet', 'valleyretreat@example.com', '+880 821 4444444', 4, 'wifi', 4, 'Nature Walks, Cultural Events', 'img/h_temp.jpg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7'),
(14, 'Dhaka Deluxe Hotel', 'Dhaka', '345 Luxury Street, Dhaka', 'dhakadeluxe@example.com', '+880 2 9998888', 1, 'aaaaaaaa', 5, 'Luxury Suites, Fine Dining', 'images/hotels/65df9611b8fbe.jpeg', 'https://maps.app.goo.gl/3wgpSZLBzg4nDyeB7');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_bookings`
--

CREATE TABLE `hotel_bookings` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `other_details` text DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `total_room` int(11) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_bookings`
--

INSERT INTO `hotel_bookings` (`booking_id`, `room_id`, `user_id`, `check_in_date`, `check_out_date`, `total_price`, `other_details`, `person`, `total_room`, `payment_status`, `transaction_id`, `booking_date`) VALUES
(1, 1, 1, '2024-03-01', '2024-03-05', 500.00, 'City view, Free Wi-Fi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(2, 2, 56, '2024-03-05', '2024-03-08', 400.00, 'Balcony, Beachfront, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(3, 6, 3, '2024-02-10', '2024-02-15', 600.00, 'Complimentary Breakfast, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(4, 5, 4, '2024-03-15', '2024-03-20', 800.00, 'Lake View Balcony, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(5, 11, 5, '2024-03-20', '2024-03-25', 700.00, 'Close to Business District, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(6, 14, 9, '2024-03-25', '2024-03-30', 1000.00, 'Private Pool, Ocean View, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(7, 16, 56, '2024-03-01', '2024-03-05', 450.00, 'Mountain View, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(8, 18, 1, '2024-03-05', '2024-03-08', 350.00, 'Cityscape View, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(9, 15, 56, '2024-03-10', '2024-03-15', 550.00, 'Workspace, Wifi', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(11, 10, 56, '2024-02-10', '2024-02-12', 500.00, 'nan', 2, 3, NULL, NULL, '2024-02-18 23:45:00'),
(12, 11, 56, '2024-02-13', '2024-02-14', 162.00, NULL, 2, 3, 'paid', 'Hotel_65c8890104fa4', '2024-02-18 23:45:00'),
(13, 12, 56, '2024-02-13', '2024-02-14', 304.50, NULL, 2, 3, 'paid', 'Hotel_65c88d7daff59', '2024-02-18 23:45:00'),
(14, 16, 56, '2024-02-13', '2024-02-14', 198.00, NULL, 2, 3, 'paid', 'Hotel_65c88ea2dc979', '2024-02-18 23:45:00'),
(15, 21, 56, '2024-02-13', '2024-02-14', 360.00, NULL, 2, 2, 'paid', 'Hotel_65c8981616e10', '2024-02-18 23:45:00'),
(16, 12, 56, '2024-02-12', '2024-02-14', 609.00, NULL, 2, 2, 'paid', 'Hotel_65c8af920fe38', '2024-02-18 23:45:00'),
(18, 11, 56, '2024-02-15', '2024-02-16', 162.00, NULL, 2, 2, 'paid', 'Hotel_65c8c20333367', '2024-02-18 23:45:00'),
(19, 12, 56, '2024-02-15', '2024-02-16', 304.50, NULL, 2, 2, 'paid', 'Hotel_65c8cea022124', '2024-02-18 23:45:00'),
(20, 12, 56, '2024-02-14', '2024-02-15', 304.50, NULL, 2, 2, 'paid', NULL, '2024-02-18 23:45:00'),
(21, 12, 56, '2024-02-16', '2024-02-17', 304.50, NULL, 2, 2, 'paid', 'Hotel_65c8effcda58b', '2024-02-18 23:45:00'),
(22, 11, 56, '2024-02-17', '2024-02-18', 162.00, NULL, 2, 2, 'paid', 'Hotel_65c8f1b608d1c', '2024-02-18 23:45:00'),
(23, 11, 56, '2024-02-23', '2024-02-24', 162.00, NULL, 2, 2, 'paid', 'Hotel_65c8f4ad00f69', '2024-02-18 23:45:00'),
(24, 27, 56, '2024-02-12', '2024-02-17', 13200.00, NULL, 2, 2, 'paid', 'Hotel_65c8f5f314520', '2024-02-18 23:45:00'),
(25, 12, 56, '2024-02-16', '2024-02-23', 2131.50, NULL, 2, 3, 'paid', 'Hotel_65c8fdfbd6aa9', '2024-02-18 23:45:00'),
(26, 16, 56, '2024-02-13', '2024-02-16', 594.00, NULL, 2, 2, 'UNPAID', 'Hotel_65c8fe2b1f2fc', '2024-02-18 23:45:00'),
(31, 22, 56, '2024-02-18', '2024-02-20', 2640.00, NULL, 2, 1, 'unpaid', 'Hotel_65d1d6e5325d9', '2024-02-18 23:45:00'),
(32, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d1dc4dd2d15', '2024-02-18 23:45:00'),
(33, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d1dce5a46d1', '2024-02-18 23:45:00'),
(34, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d1dda47e618', '2024-02-18 23:45:00'),
(35, 11, 56, '2024-02-18', '2024-02-20', 162.00, NULL, 2, 1, 'paid', 'Hotel_65d1de570d702', '2024-02-18 23:45:00'),
(36, 12, 56, '2024-02-18', '2024-02-20', 304.50, NULL, 2, 1, 'paid', 'Hotel_65d1decb02636', '2024-02-18 23:45:00'),
(37, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d1df55c6bf3', '2024-02-18 23:45:00'),
(38, 22, 56, '2024-02-18', '2024-02-20', 2640.00, NULL, 2, 1, 'unpaid', 'Hotel_65d1dfac81d65', '2024-02-18 23:45:00'),
(40, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'unpaid', 'Hotel_65d1e875c73e6', '2024-02-18 23:45:00'),
(41, 16, 56, '2024-02-18', '2024-02-20', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d1f13b7a94b', '2024-02-18 23:45:00'),
(42, 12, 56, '2024-02-18', '2024-02-20', 304.50, NULL, 2, 1, 'paid', 'Hotel_65d1f26038708', '2024-02-18 23:45:00'),
(44, 12, 56, '2024-02-18', '2024-02-20', 304.50, NULL, 2, 1, 'unpaid', 'Hotel_65d1f6d0ae6c3', '2024-02-18 23:45:00'),
(45, 16, 56, '2024-02-23', '2024-02-25', 198.00, NULL, 2, 1, 'paid', 'Hotel_65d88ac8d1d81', '2024-02-23 18:08:40'),
(46, 11, 56, '2024-02-28', '2024-03-01', 162.00, NULL, 2, 1, 'paid', 'Hotel_65debbd4b9ef4', '2024-02-28 10:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `images_hotel`
--

CREATE TABLE `images_hotel` (
  `image_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images_hotel`
--

INSERT INTO `images_hotel` (`image_id`, `hotel_id`, `room_id`, `image_url`) VALUES
(1, 1, NULL, 'images/hotels/pexels-donald-tong-189296.jpg'),
(2, 1, NULL, 'images/hotels/pexels-pixabay-258154.jpg'),
(3, 6, NULL, 'images/hotels/photo-1606186193539-837a478be1aa.jpeg'),
(4, 14, NULL, 'images/hotels/reception.jpg'),
(5, 5, NULL, 'http://example.com/image5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tran_date` varchar(255) DEFAULT NULL,
  `tran_id` varchar(255) DEFAULT NULL,
  `val_id` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `store_amount` varchar(255) DEFAULT NULL,
  `bank_tran_id` varchar(255) DEFAULT NULL,
  `card_type` varchar(255) DEFAULT NULL,
  `emi_instalment` varchar(255) DEFAULT NULL,
  `emi_amount` varchar(255) DEFAULT NULL,
  `emi_description` varchar(255) DEFAULT NULL,
  `emi_issuer` varchar(255) DEFAULT NULL,
  `card_no` varchar(255) DEFAULT NULL,
  `card_issuer` varchar(255) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `card_issuer_country` varchar(255) DEFAULT NULL,
  `card_issuer_country_code` varchar(255) DEFAULT NULL,
  `APIConnect` varchar(255) DEFAULT NULL,
  `validated_on` varchar(255) DEFAULT NULL,
  `gw_version` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `status`, `tran_date`, `tran_id`, `val_id`, `amount`, `store_amount`, `bank_tran_id`, `card_type`, `emi_instalment`, `emi_amount`, `emi_description`, `emi_issuer`, `card_no`, `card_issuer`, `card_brand`, `card_issuer_country`, `card_issuer_country_code`, `APIConnect`, `validated_on`, `gw_version`) VALUES
(1, 'VALID', '2024-02-18 16:33:09', 'Hotel_65d1dce5a46d1', NULL, '198.00', '193.05', '2402181633120RthlIRaKdiFDyk', 'IBBL-Islami Bank', '0', '0.00', '', 'Islami Bank Bangladesh Limited', '', 'Islami Bank Bangladesh Limited', 'IB', 'Bangladesh', 'BD', 'DONE', '2024-02-18 16:33:12', ''),
(3, 'VALID', '2024-02-18 16:36:20', 'Hotel_65d1dda47e618', NULL, '198.00', '193.05', '2402181636220udnYDiNffe9Xhx', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-18 16:36:23', ''),
(4, 'VALID', '2024-02-18 16:39:18', 'Hotel_65d1de570d702', NULL, '162.00', '157.95', '240218163922wGrFtAvMPLs6Lw5', 'DBBLMOBILEB-Dbbl Mobile Banking', '0', '0.00', '', 'DBBL Mobile Banking', '', 'DBBL Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-18 16:39:22', ''),
(5, 'VALID', '2024-02-18 16:41:14', 'Hotel_65d1decb02636', NULL, '304.50', '296.89', '2402181641200gsXR41A0ZaJjEM', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-18 16:41:20', ''),
(6, 'VALID', '2024-02-18 16:43:33', 'Hotel_65d1df55c6bf3', NULL, '198.00', '193.05', '2402181643370HaVmYsmxpy3e8L', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-18 16:43:37', ''),
(7, 'VALID', '2024-02-18 17:59:55', 'Hotel_65d1f13b7a94b', NULL, '198.00', '193.05', '240218180052b1evrKH69z3GrUH', 'IBBL-Islami Bank', '0', '0.00', '', 'Islami Bank Bangladesh Limited', '', 'Islami Bank Bangladesh Limited', 'IB', 'Bangladesh', 'BD', 'DONE', '2024-02-18 18:00:52', ''),
(8, 'VALID', '2024-02-18 18:04:48', 'Hotel_65d1f26038708', NULL, '304.50', '296.89', '24021818045317bNG44JR2lszXr', 'VISA-Dutch Bangla', '0', '0.00', '', 'STANDARD CHARTERED BANK', '432155XXXXXX7491', 'STANDARD CHARTERED BANK', 'VISA', 'Bangladesh', 'BD', 'DONE', '2024-02-18 18:04:53', ''),
(9, 'VALID', '2024-02-19 02:03:44', 'Flight_65d262a096d1e', NULL, '1496.25', '1458.84', '240219205300wE1QYdzQUpkPAL', 'QCASH-ITCL', '0', '0.00', '', 'QCASH', '', 'QCASH', 'QCASH', 'Bangladesh', 'BD', 'DONE', '2024-02-19 02:05:31', ''),
(10, 'VALID', '2024-02-19 02:06:03', 'Flight_65d2632be7583', NULL, '1496.25', '1458.84', '240219206091fZnFgXIBzpBJuV', 'BANKASIA-Bank Asia Internet Banking', '0', '0.00', '', 'Bank Asia Limited', '', 'Bank Asia Limited', 'IB', 'Bangladesh', 'BD', 'DONE', '2024-02-19 02:06:09', ''),
(11, 'VALID', '2024-02-19 02:16:49', 'Flight_65d265b11456e', NULL, '1496.25', '1458.84', '24021921655rFP0HwVgFJc03im', 'VISA-Dutch Bangla', '0', '0.00', '', 'STANDARD CHARTERED BANK', '455445XXXXXX4326', 'STANDARD CHARTERED BANK', 'VISA', 'Bangladesh', 'BD', 'DONE', '2024-02-19 02:16:55', ''),
(12, 'VALID', '2024-02-19 02:20:51', 'Flight_65d266a35832d', NULL, '2992.50', '2917.69', '240219220551UVo2VjrcoHYobb', 'IBBL-Islami Bank', '0', '0.00', '', 'Islami Bank Bangladesh Limited', '', 'Islami Bank Bangladesh Limited', 'IB', 'Bangladesh', 'BD', 'DONE', '2024-02-19 02:20:55', ''),
(13, 'VALID', '2024-02-20 19:27:05', 'Flight_65d4a8a9825d5', NULL, '1496.25', '1458.84', '240220192709qPWjQGQyqflgRDy', 'BANKASIA-Bank Asia Internet Banking', '0', '0.00', '', 'Bank Asia Limited', '', 'Bank Asia Limited', 'IB', 'Bangladesh', 'BD', 'DONE', '2024-02-20 19:27:09', ''),
(14, 'VALID', '2024-02-23 18:08:39', 'Hotel_65d88ac8d1d81', NULL, '198.00', '193.05', '2402231808430Ujn8Yn92Kt0rOQ', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-23 18:08:43', ''),
(15, 'VALID', '2024-02-24 17:26:59', 'Hotel_65d9d28056b19', NULL, '198.00', '193.05', '2402241727051kx1Y9GhPTh5Zrf', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-24 17:27:05', ''),
(16, 'VALID', '2024-02-28 10:51:33', 'Hotel_65debbd4b9ef4', NULL, '162.00', '157.95', '2402281051380j7LIFnAHkuNIot', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-28 10:51:38', ''),
(17, 'VALID', '2024-02-29 07:58:44', 'Flight_65dfe4d385307', NULL, '1543.50', '1504.91', '24022975849inI2GnqTfr68Sub', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-29 07:58:50', ''),
(18, 'VALID', '2024-02-29 12:58:03', 'Flight_65e02afada214', NULL, '1543.50', '1504.91', '240229125811046NWOeehNHfSlq', 'BKASH-BKash', '0', '0.00', '', 'BKash Mobile Banking', '', 'BKash Mobile Banking', 'MOBILEBANKING', 'Bangladesh', 'BD', 'DONE', '2024-02-29 12:58:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `comment`, `rating`, `created_at`) VALUES
(1, 56, 'Smooth booking process, user-friendly interface, and instant confirmations make this site my go-to for trip planning.', 4, '2024-02-23 16:25:44'),
(2, 9, 'Optimize mobile responsiveness, add more filter options, and consider a feature for saving favorite listings to enhance the overall user experience.', 2, '2024-02-23 16:25:44'),
(3, 64, 'Impressed with prompt and helpful customer support – a reassuring factor when using this booking site.', 3, '2024-02-29 01:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_type` varchar(50) NOT NULL,
  `bed_type` varchar(50) DEFAULT NULL,
  `facility` varchar(255) DEFAULT NULL,
  `price_per_night` int(10) NOT NULL DEFAULT 0,
  `discount` int(5) DEFAULT 0,
  `smoking` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast` tinyint(4) NOT NULL DEFAULT 0,
  `capacity` int(11) NOT NULL,
  `is_booked` tinyint(1) DEFAULT 0,
  `other_details` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT 'img/r_temp.png',
  `total_rooms` int(11) NOT NULL,
  `available_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `hotel_id`, `room_type`, `bed_type`, `facility`, `price_per_night`, `discount`, `smoking`, `breakfast`, `capacity`, `is_booked`, `other_details`, `image_url`, `total_rooms`, `available_rooms`) VALUES
(1, 1, 'Standard Room', 'Double Bed', 'City view, Wifi', 100, 10, 0, 0, 6, 0, 'Some additional details', 'http://example.com/room1.jpg', 10, 8),
(2, 1, 'Deluxe Suite', 'King Bed', 'Spacious, Mini-bar', 200, 15, 0, 0, 4, 0, 'Some additional details', 'img/r_temp.png', 5, 4),
(3, 2, 'Ocean View Room', 'Queen Bed', 'Balcony, Beachfront, Wifi', 150, 12, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 8, 7),
(4, 2, 'Beach Cottage', 'King Bed', 'Private Beach Access, Wifi', 250, 20, 0, 0, 4, 0, 'Some additional details', 'img/r_temp.png', 3, 2),
(5, 3, 'Business Suite', 'King Bed', 'Workspace, High-speed Internet', 180, 18, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 6, 5),
(6, 3, 'Standard Room', 'Double Bed', 'Complimentary Breakfast, Wifi', 120, 10, 0, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 10, 9),
(7, 4, 'Lakeside View Room', 'Queen Bed', 'Lake View Balcony, Wifi', 130, 15, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 7, 6),
(8, 4, 'Family Cabin', 'Double and Single Beds', 'Family-friendly, Fireplace, Wifi', 220, 20, 0, 0, 5, 0, 'Some additional details', 'img/r_temp.png', 4, 3),
(9, 5, 'Mountain View Suite', 'King Bed', 'Panoramic Mountain Views, Wifi', 220, 18, 0, 0, 4, 0, 'Some additional details', 'img/r_temp.png', 8, 8),
(10, 5, 'Hiker\'s Lodge', 'Bunk Beds', 'Perfect for Groups, Wifi', 80, 8, 0, 0, 6, 0, 'Some additional details', 'img/r_temp.png', 5, 5),
(11, 6, 'City View Room', 'Double Bed', 'Close to Business District, Wifi', 90, 10, 0, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 12, 3),
(12, 6, 'Executive Suite', 'King Bed', 'Executive Lounge Access, Wifi', 175, 13, 0, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 6, 15),
(13, 7, 'Seaside Villa', 'King Bed', 'Private Pool, Ocean View, Wifi', 300, 25, 0, 0, 4, 0, 'Some additional details', 'img/r_temp.png', 3, 3),
(14, 7, 'Beachfront Bungalow', 'Queen Bed', 'Direct Beach Access, Wifi', 180, 20, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 5, 4),
(15, 8, 'Deluxe Room', 'Double Bed', 'Harbor View, Mini-fridge, Wifi', 120, 12, 0, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 8, 7),
(16, 1, 'Standard Twin', 'Twin Beds', 'Mountain View, Wifi', 110, 10, 1, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 9, 5),
(17, 2, 'Executive Suite', 'King Bed', 'Cityscape View, Wifi', 230, 20, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 10, 6),
(18, 3, 'Business Room', 'Queen Bed', 'Workspace, Wifi', 160, 15, 0, 0, 2, 0, 'Some additional details', 'img/r_temp.png', 12, 11),
(19, 4, 'Family Suite', 'Double and Single Beds', 'Family-friendly, Wifi', 200, 18, 0, 0, 4, 0, 'Some additional details', 'img/r_temp.png', 5, 4),
(20, 5, 'Panoramic View Suite', 'King Bed', 'Panoramic Views, Wifi', 250, 25, 0, 0, 3, 0, 'Some additional details', 'img/r_temp.png', 6, 5),
(21, 14, 'City View Suite', 'King Bed', 'Cityscape View, Wifi', 200, 10, 0, 0, 2, 0, 'Luxury suite with city view', 'images/rooms/h3.jpg', 5, 0),
(22, 1, 'Big room', 'Double', 'wifi', 1500, 12, 0, 1, 2, 0, NULL, 'img/r_temp.png', 12, 2),
(27, 1, 'City View Room', 'Double', 'wifi', 1500, 12, 0, 1, 2, 0, 'd', 'img/r_temp.png', 12, 3),
(28, 2, 'sdf', 'sdf', 'sdfsdf', 0, 0, 0, 0, 0, 0, 'sdfsdf', 'img/r_temp.png', 0, 0),
(29, 2, 'dfg', 'sdf', 'sdf', 0, 0, 1, 0, 0, 0, 'sdf', 'img/r_temp.png', 0, 0),
(30, 2, 'df', 'sdf', 'sdf', 0, 0, 0, 1, 0, 0, 'sdf', 'images/rooms/65df6663472b3.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_image_url` varchar(255) NOT NULL DEFAULT 'img/user-avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `phone_number`, `password`, `first_name`, `last_name`, `dob`, `nid`, `gender`, `marital_status`, `passport`, `country`, `religion`, `role`, `status`, `is_verified`, `verification_token`, `remember_token`, `password_reset_token`, `created_at`, `updated_at`, `profile_image_url`) VALUES
(1, 'sujon@gmail.com', NULL, '$2y$10$4aTR4/ruod74wGminnDKN.Osh1ikLnjPqDsKTqDfuFfhB9n7I37j.', 'Sujon ', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blocked', 0, NULL, '', NULL, '2024-01-30 08:13:11', '2024-02-29 01:48:17', 'img/user-avatar.png'),
(2, 'jahidul@gmail.com', NULL, '$2y$10$llVl743SccBFJzoeP0ElteXyC4hZMINvkpArxPAAgr..VOVMrQBU6', 'Jahidul', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blocked', 0, NULL, '', NULL, '2024-01-30 10:12:59', '2024-02-29 01:48:49', 'img/user-avatar.png'),
(3, 'sabbir@gmail.com', NULL, '$2y$10$fcaBBPct7DoYIBbtMHu0qeACBATA7QSRBiuYhMj2XilDZqJQDixDm', 'Sabbir', 'Rahman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blocked', 0, NULL, '', NULL, '2024-01-30 10:13:16', '2024-02-29 01:49:14', 'img/user-avatar.png'),
(4, 'ABUTALHA5896a@GMAIL.COM', NULL, '$2y$10$KyBrrkrAgwNpiJCDfJiROeAUD0dS/Mwrp/EYHc2VrMZqFWtR.fiuq', 'Abu', 'Talha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '65c3e83c87f9a', 'f28eaccc4921e2eafa2f30abdd1382c961061acf236f0ace1c63d81924879e99', NULL, '2024-02-07 20:29:48', '2024-02-29 01:49:23', 'img/user-avatar.png'),
(5, 'dawnpass007@gmail.com', NULL, '$2y$10$S4HEMaH5hDyPRTkdGCx/teVd7stUiSwULfi2tAtNHB1PWl6L59Ace', 'Ariful', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'blocked', NULL, '65bd3b835a583', '1291568038e0bd6c45103873ff6366b541afa7856b0d4e15cc6aec54bf6f27d0', NULL, '2024-02-02 18:59:15', '2024-02-29 01:50:25', 'img/user-avatar.png'),
(9, 'asadul@gmail.com', NULL, '$2y$10$G340kcpiKiyyH2nsEh.ojOb12LnJnTfUk79Qe55U0u3lgj58q/mbe', 'Asadul', 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '', NULL, '2024-01-30 10:08:24', '2024-02-29 01:48:26', 'img/user-avatar.png'),
(56, 'ABUTALHA5896@GMAIL.COM', '01792865896', '$2y$10$wRAE6od1U/NUHFwt7kJiGub1Knn9b4HJj1nDO.hpDFJUFiLtK1q3q', 'Md. Abu', 'Talha', '2000-12-21', '9164309842', 'male', 'single', '00000000', 'Bangladesh', 'Islam', NULL, 'active', 1, '65bb709b9a4b9', 'f13aea1679f893361c6cead059ecd121e7311e1b0d701f3817b44a68c10c33eb', '65bf02e8cfa23', '2024-02-01 10:21:15', '2024-02-28 20:10:46', 'images/profile/65d8d0b43e4b1.jpg'),
(64, 'ABUTALHA5896b@GMAIL.COM', '01792865896', '$2y$10$Mpxdg9D10Z6U0EUej51MeOIcgyfi/vnHazRrQK15zoMfBxKWw9FLm', 'Md. Abu', 'Talha', '2024-02-01', '55614997', 'male', 'single', '1111111111', 'Bangladesh', 'Islam', NULL, 'active', 1, '65dfd77fc4f44', '2a39fc41a0a61443736530acc4393ae135dc86dcc1408106771701c8708e3f94', NULL, '2024-02-29 01:01:51', '2024-02-29 01:06:21', 'images/profile/65dfd88d3b8ed.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk_admin_hotel` (`admin_hotel_id`),
  ADD KEY `fk_admin_airline` (`admin_air_id`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`blog_images_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_id`),
  ADD KEY `fk_airline_flights` (`airline_id`);

--
-- Indexes for table `flight_bookings`
--
ALTER TABLE `flight_bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_id` (`booking_id`) USING BTREE,
  ADD KEY `fk_user_flight_bookings` (`user_id`),
  ADD KEY `fk_flight_flight_bookings` (`flight_id`);

--
-- Indexes for table `flight_booking_details`
--
ALTER TABLE `flight_booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `fk_user_images` (`user_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_room_bookings` (`room_id`),
  ADD KEY `fk_user_bookings` (`user_id`);

--
-- Indexes for table `images_hotel`
--
ALTER TABLE `images_hotel`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tran_id` (`tran_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_hotel_rooms` (`hotel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `blog_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `flight_bookings`
--
ALTER TABLE `flight_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `flight_booking_details`
--
ALTER TABLE `flight_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `images_hotel`
--
ALTER TABLE `images_hotel`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk_admin_airline` FOREIGN KEY (`admin_air_id`) REFERENCES `airlines` (`airline_id`),
  ADD CONSTRAINT `fk_admin_hotel` FOREIGN KEY (`admin_hotel_id`) REFERENCES `hotels` (`hotel_id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `blog_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`post_id`);

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`post_id`);

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `blog_posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`category_id`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `fk_airline_flights` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`airline_id`);

--
-- Constraints for table `flight_bookings`
--
ALTER TABLE `flight_bookings`
  ADD CONSTRAINT `fk_flight_flight_bookings` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `fk_user_flight_bookings` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `flight_booking_details`
--
ALTER TABLE `flight_booking_details`
  ADD CONSTRAINT `flight_booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `flight_bookings` (`booking_id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_user_images` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `hotel_bookings`
--
ALTER TABLE `hotel_bookings`
  ADD CONSTRAINT `fk_room_bookings` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `fk_user_bookings` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `images_hotel`
--
ALTER TABLE `images_hotel`
  ADD CONSTRAINT `images_hotel_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`),
  ADD CONSTRAINT `images_hotel_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_hotel_rooms` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
