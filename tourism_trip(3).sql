-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 09:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism_trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `name`, `email`, `phone`, `address`, `userid`, `status`, `created_at`) VALUES
(1, 'igiraneza', 'igiraneza@gmail.com', '078898909', '12.0', 2, 0, '2019-10-15 00:00:00'),
(2, 'David', 'ok', 'ok', '12', 12, 1, '2019-10-31 00:00:00'),
(4, 'BIKORIMANA David', 'studio@gmail.com', '0788989087', '12', 0, 0, '2019-10-15 00:00:00'),
(5, 'Alpha Konde', 'konde@gmail.com', '0788765432', 'IKN 345 OK', 0, 0, '2019-10-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `sno` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `encrypted_temp_password` varchar(256) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`sno`, `email`, `encrypted_temp_password`, `salt`, `created_at`) VALUES
(1, 'bikorimanadavid05@gmail.com', '$2y$10$qVpMZ/l9YwN.KpJ4Tjlwbu4xO.yOy8lpFEEfTqKJqIClMaIBELcRm', '77ddb71785', '2019-09-30 21:19:54'),
(2, 'bikorimanadavid05@gmail.com', '$2y$10$qVpMZ/l9YwN.KpJ4Tjlwbu4xO.yOy8lpFEEfTqKJqIClMaIBELcRm', '77ddb71785', '2019-09-30 21:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `planned_trip`
--

CREATE TABLE `planned_trip` (
  `id` int(11) NOT NULL,
  `name` int(30) NOT NULL,
  `descr` text NOT NULL,
  `url` text NOT NULL,
  `status` int(1) NOT NULL,
  `visit_date` date DEFAULT NULL,
  `likes` enum('true','false') NOT NULL DEFAULT 'false',
  `picture` varchar(100) NOT NULL DEFAULT '/pets_picture/visitrwanda.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planned_trip`
--

INSERT INTO `planned_trip` (`id`, `name`, `descr`, `url`, `status`, `visit_date`, `likes`, `picture`) VALUES
(18, 3, 'We will be together,We will be together,We will be together,We will be together', 'http://opengorillatours.rw/spip.php?page=reservation-form', 1, '2019-10-19', 'false', 'http://172.20.10.6/2019/TourismTripPortal/pets_picture/visitrwanda.jpg'),
(19, 1, 'most of job was cancelled because this Journey too! book your place to be with us\r\n\r\nOpen Gorilla tour\r\n\r\nEver', 'http://opengorillatours.rw/spip.php?page=reservation-form', 1, '2019-10-13', 'true', 'http://172.20.10.6/2019/TourismTripPortal/pets_picture/nyugwe.jpg'),
(20, 2, 'Company Name:Open Gorilla,$100 accommodation included,Departure time:9:00am', 'https://www.facebook.com', 1, '2019-11-05', 'true', 'http://172.20.10.6/2019/TourismTripPortal/pets_picture/20.jpeg'),
(32, 4, 'you will never work alone', 'https://www.facebook.com', 1, '2019-10-15', 'false', 'http://172.20.10.6/2019/TourismTripPortal/pets_picture/32.jpeg'),
(33, 6, 'capital Rwanda', 'www.kigali.com', 2, '2019-10-16', 'true', '/pets_picture/visitrwanda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phoneNumber` varchar(200) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `message` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `touristic_site`
--

CREATE TABLE `touristic_site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `site_descr` text NOT NULL,
  `site_location` varchar(100) NOT NULL,
  `site_type` int(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `likes` enum('true','false') NOT NULL DEFAULT 'false',
  `picture` varchar(100) NOT NULL DEFAULT 'pets_picture/visitrwanda.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `touristic_site`
--

INSERT INTO `touristic_site` (`id`, `site_name`, `site_descr`, `site_location`, `site_type`, `created_at`, `likes`, `picture`) VALUES
(1, 'Volcanoes National Park', 'Volcanoes National Park is a national park in northwestern Rwanda.  It covers 160 km2 of rainforest and encompasses five of the eight volcanoes in the Virunga Mountains, namely Karisimbi, Bisoke, Muhabura, Gahinga and Sabyinyo. It borders Virunga National Park in the Democratic Republic of Congo and Mgahinga Gorilla National Park in Uganda. It is home to the mountain gorilla and the golden monkey, and was the base for the primatologist Dian Fossey. ', 'North of Country', 1, '2019-10-23', 'false', 'pets_picture/gorilla.png'),
(2, 'Akagera National Park', 'The relatively warm and low-lying plains of Akagera comprise savannah, woodland, wetland and a dozen lakes. In partnership with African Parks, we aim to transform the National Park into a world-class location to experience a safari.\r\n\r\nAkagera National Park lies in eastern Rwanda, hugging the border with Tanzania. It\'s characterized by woodland, swamps, low mountains and savannah. The varied terrain shelters wildlife including zebras, giraffes, elephants, lions and hundreds of bird species, such as the rare shoebill stork. In the southern part of the park, vast Lake Ihema is home to hippos and crocodiles.', 'Eastern province', 1, '2019-10-24', 'false', 'pets_picture/akagera2.jpg'),
(3, 'Gishwati Mukura National Park', 'Gishwati Forest is a protected reserve in the north western part of Rwanda, not far from Lake Kivu. The reserve  forests were largely intact in 1978, and substantial forest cover still remained in 1986.During the Rwandan Genocide, wave after wave of refugees arrived in Gishwati Forest and began clearing it, often for subsistence farming. By 2001, only a small circular patch of native forest remained, 1,500 acres (6.1 km2) of the forest s original 250,000.In addition to tremendous loss of biodiversity, the region experiences soil erosion and degradation and landslides. Reforestation efforts in the past few years have increased the remnant native forest to about 2,500 acres (10 km2).Large tea estates occupy the central and northern parts of the reserve.', 'Western North of country', 1, '2019-10-03', 'false', 'pets_picture/nyugwe.jpg'),
(4, 'Nyungwe National Park', 'One of the oldest rainforests in Africa, Nyungwe is rich in biodiversity and spectacularly beautiful. The mountainous region is teaming with wildlife, including a small population of chimpanzees as well as 12 other species of primate.Nyungwe National Park lies in southwest Rwanda, partly abutting the Burundi border. It\'s a vast area of mountain rainforest, home to many species of chimpanzees, plus owl-faced and colobus monkeys. The Canopy Walkway, part of the Igishigishigi Trail, is a high suspension bridge with views over the valley and surrounding forests. A trail runs to the Kamiranzovu Marsh, with its birdlife, orchids and waterfall.', 'South West of Country', 1, '2019-10-03', 'false', 'pets_picture/nyungwe.jpg'),
(5, 'Lake Kivu', 'Lake Kivu is one of the African Great Lakes. It lies on the border between the Democratic Republic of the Congo and Rwanda, and is in the Albertine Rift, the western branch of the East African Rift. Lake Kivu empties into the Ruzizi River, which flows southwards into Lake TanganyikaLake Kivu is approximately 90 km (56 mi) long and 50 km (31 mi) at its widest.Its irregular shape makes measuring its precise surface area difficult; it has been estimated to cover a total surface area of some 2,700 km2 (1,040 sq mi), making it Africa s eighth largest lake. The surface of the lake sits at a height of 1,460 metres (4,790 ft) above sea level. This lake has a chance of suffering a limnic eruption every 1000 years. The lake has a maximum depth of 475 m (1,558 ft) and a mean depth of 220 m (722 ft), making it the world\'s eighteenth deepest lake by maximum depth, and the ninth deepest by mean depth.\r\n\r\nSome 1,370 km2 or 58 percent of the lake\'s waters lie within DRC borders.\r\n\r\nThe lake bed sits upon a rift valley that is slowly being pulled apart, causing volcanic activity in the area.\r\n\r\nThe world s tenth-largest island on a lake, Idjwi, lies in Lake Kivu, within the boundaries of Virunga National Park. Settlements on the lake s shore include Bukavu, Kabare, Kalehe, Sake and Goma in Congo, and Gisenyi, Kibuye, and Cyangugu in Rwanda. ', 'Western of country', 1, '2019-10-03', 'false', 'pets_picture/kivu.jpg'),
(6, 'Kigali', 'The capital city is pleasantly low key yet dynamic and progressive. It\\\'s green, clean and safe with meaningful culture and remarkable drive.Kigali is the capital city of Rwanda, roughly in the center of the country. It sprawls across numerous hills, ridges and valleys, and has a vibrant restaurant and nightlife scene. The Kigali Genocide Memorial documents the 1994 mass killings in Rwanda, associated with the country s civil war. The city s Caplaki Crafts Village has stalls selling traditional handicrafts, including woodcarvings and woven baskets.', 'Capital city ', 1, '2019-10-03', 'false', 'pets_picture/kigali.jpg'),
(7, 'Ethnographic Museum', 'A gift from Belgium\\s King Badouin in the late 1980s, the Ethnographic Museum now houses one of Africa\\s finest ethnographic collections.\\r\\n\\r\\n. The Ethnographic Museum, formerly the National Museum of Rwanda, is the national museum of Rwanda. It is located in Butare. It was built with help of the Belgian government. It first opened in 1989 and it is a good source of information on the cultural history of the country and the region.', 'Huye Town, BUTARE', 1, '2019-10-03', 'true', 'pets_picture/inmr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_tin` varchar(9) DEFAULT NULL,
  `company_address` varchar(200) DEFAULT NULL,
  `company_phone` varchar(13) NOT NULL,
  `company_ceo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `encrypted_password` varchar(256) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `unique_id`, `name`, `company_tin`, `company_address`, `company_phone`, `company_ceo`, `status`, `email`, `encrypted_password`, `salt`, `Level`, `created_at`) VALUES
(1, '5d89dcf35d9ac3.90211027', 'BIKORIMANA David', '0', '', '', 'BIKORIMANA David', 0, 'bikorimanadavid05@gmail.com', '$2y$10$0iBTAB2SePje390kq2anKeV0G/2fpLnfZsUmDXyRGZGiBcQuSDDcC', 'b0f4cb2a7d', 'Admin', '2019-09-24 11:08:03'),
(5, '5da463d1e99ea9.70468836', 'GENIUS SOFTWARE Ltd', '1013690', 'Huye', '0788989876', 'BIKORIMANA David', 0, 'genius@gmail.com', '$2y$10$WmcYkC13R0qZF1sB6ntROeFLsG7R9u1DQ8Pl6wCWXzflmzENylSHe', '04c167312f', 'Company', '2019-10-14 14:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `planned_trip`
--
ALTER TABLE `planned_trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `touristic_site`
--
ALTER TABLE `touristic_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planned_trip`
--
ALTER TABLE `planned_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `touristic_site`
--
ALTER TABLE `touristic_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
