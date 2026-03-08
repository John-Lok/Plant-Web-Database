-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2026 at 02:07 AM
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
-- Database: `plant_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration_route`
--

CREATE TABLE `administration_route` (
  `specific_use_id` int(10) UNSIGNED NOT NULL,
  `administration` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administration_route`
--

INSERT INTO `administration_route` (`specific_use_id`, `administration`) VALUES
(5, 'Visual indicator'),
(6, 'Dermal'),
(3, 'Superficial');

-- --------------------------------------------------------

--
-- Table structure for table `location_area`
--

CREATE TABLE `location_area` (
  `location_area_id` int(10) UNSIGNED NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `community` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_area`
--

INSERT INTO `location_area` (`location_area_id`, `area_name`, `community`, `address`) VALUES
(1, 'Kampung Kuala Boh', 'Semai', 'CFMV+HV, Brinchang, Cameron Highlands, 39000, Pahang\r\n'),
(2, 'Kampung Leryar\r\n', 'Semai', 'CGF9+W7, Brinchang, Cameron Highlands, 39000, Pahang\r\n'),
(3, 'Kampung Panggen\r\n', 'Semai', 'CFR7+72, Ringlet, Cameron Highlands, 39000, Pahang\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `plant_english_name`
--

CREATE TABLE `plant_english_name` (
  `plant_species_id` varchar(12) NOT NULL,
  `english_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_english_name`
--

INSERT INTO `plant_english_name` (`plant_species_id`, `english_name`) VALUES
('P1', 'Hances tanbark'),
('P2', 'Shell gingers'),
('P3', 'Common tumeric'),
('P4', 'Malaysian ginger'),
('P5', 'Edible banana'),
('P6', 'Lemongrass'),
('P7', 'Chempedak'),
('P8', 'Giant cane'),
('P9', 'Mother-in-law plant'),
('P9', 'Poison arum'),
('P10', 'Goosegrass'),
('P3', 'X-ray plant');

-- --------------------------------------------------------

--
-- Table structure for table `plant_family`
--

CREATE TABLE `plant_family` (
  `plant_family_id` int(10) UNSIGNED NOT NULL,
  `family_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_family`
--

INSERT INTO `plant_family` (`plant_family_id`, `family_name`) VALUES
(1, 'Fagaceae'),
(2, 'Zingiberaceae\r\n'),
(3, 'Musaceae\r\n'),
(4, 'Poaceae\r\n'),
(5, 'Moraceae\r\n'),
(6, 'Araceae\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `plant_local_name`
--

CREATE TABLE `plant_local_name` (
  `plant_record_id` int(10) UNSIGNED NOT NULL,
  `local_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_local_name`
--

INSERT INTO `plant_local_name` (`plant_record_id`, `local_name`) VALUES
(1, 'Pokok kees'),
(2, 'Santak'),
(3, 'Takbir'),
(4, 'Bengong'),
(5, 'Bengong'),
(6, 'Berduck'),
(7, 'Bunga Santak'),
(8, 'Jerangau'),
(9, 'Pisang Habuk'),
(10, 'Pisang Goreng');

-- --------------------------------------------------------

--
-- Table structure for table `plant_part`
--

CREATE TABLE `plant_part` (
  `plant_part_id` int(10) UNSIGNED NOT NULL,
  `part_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_part`
--

INSERT INTO `plant_part` (`plant_part_id`, `part_name`) VALUES
(1, 'Branch'),
(2, 'Bulb'),
(3, 'Panicle'),
(4, 'Flower'),
(5, 'Fruit'),
(6, 'Leaf'),
(7, 'Root'),
(8, 'Tuberous root'),
(9, 'Rhizome'),
(10, 'Seed'),
(11, 'Stem'),
(12, 'Tuber'),
(13, 'Trunk'),
(14, 'Twig'),
(15, 'Whole plant'),
(16, 'Young shoot');

-- --------------------------------------------------------

--
-- Table structure for table `plant_photo`
--

CREATE TABLE `plant_photo` (
  `plant_species_id` varchar(12) NOT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_record`
--

CREATE TABLE `plant_record` (
  `plant_record_id` int(10) UNSIGNED NOT NULL,
  `plant_species_id` varchar(12) NOT NULL,
  `location_area_id` int(10) UNSIGNED NOT NULL,
  `elevation` int(4) DEFAULT NULL,
  `coordinate` varchar(25) DEFAULT NULL,
  `collection_date` date NOT NULL,
  `informant` varchar(35) NOT NULL,
  `other_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_record`
--

INSERT INTO `plant_record` (`plant_record_id`, `plant_species_id`, `location_area_id`, `elevation`, `coordinate`, `collection_date`, `informant`, `other_notes`) VALUES
(1, 'P1', 3, 555, 'N04.42494⁰, E101.52016⁰', '2023-10-20', 'Nadia, Diyana', NULL),
(2, 'P2', 3, 1013, 'N04.44039⁰, E101.46371⁰', '2024-05-26', 'Amran', NULL),
(3, 'P2', 3, 983, 'N04.44038⁰, E101.46615⁰', '2024-11-24', 'Paleng, Amran', NULL),
(4, 'P3', 1, 680, 'N04.43461⁰, E101.49582⁰', '2024-02-28', 'Tok Batin Masnan', NULL),
(5, 'P3', 2, NULL, 'N04.42587⁰, E101.52020⁰', '2023-10-19', 'Jamal Bah Ubi and Ramli ', NULL),
(6, 'P3', 2, NULL, NULL, '2023-10-19', 'Jamal Bah Ubi and Ramli ', NULL),
(7, 'P3', 3, 1031, 'N04.44223⁰, E101.46415⁰', '2023-10-20', 'Siti', NULL),
(8, 'P4', 3, 1030, 'N04.44233⁰, E101.46420⁰', '2023-10-20', 'Tok Batin Masnan', NULL),
(9, 'P5', 1, 690, 'N04.43479⁰, E101.49665⁰', '2024-05-27', 'Tok Batin Masnan', NULL),
(10, 'P5', 3, 1006, 'N04.44060⁰, E101.46348⁰', '2024-05-26', 'Amran', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plant_species`
--

CREATE TABLE `plant_species` (
  `plant_species_id` varchar(12) NOT NULL,
  `plant_family_id` int(10) UNSIGNED NOT NULL,
  `scientific_name` varchar(100) NOT NULL,
  `vegetation_type` varchar(50) NOT NULL,
  `soil` varchar(50) NOT NULL,
  `height` varchar(30) DEFAULT NULL,
  `diameter` varchar(30) DEFAULT NULL,
  `flowering_season` varchar(30) DEFAULT NULL,
  `fruiting_season` varchar(30) DEFAULT NULL,
  `flowering_desc` text DEFAULT NULL,
  `fruiting_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant_species`
--

INSERT INTO `plant_species` (`plant_species_id`, `plant_family_id`, `scientific_name`, `vegetation_type`, `soil`, `height`, `diameter`, `flowering_season`, `fruiting_season`, `flowering_desc`, `fruiting_desc`) VALUES
('P1', 1, 'Lithocarpus hancei', 'Tree', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P10', 4, 'Eleusine indica', 'Grass', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P2', 2, 'Alpinia zerumbet', 'Herb', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P3', 2, 'Curcuma longa', 'Herb', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P4', 2, 'Zingiber ottensii', 'Herb', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P5', 3, 'Musa acuminata', 'Herb', 'Loam', '3.8', NULL, NULL, NULL, NULL, NULL),
('P6', 4, 'Cymbopogan citratus', 'Herb', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P7', 5, 'Artocarpus integer', 'Tree', 'Loam', '40.0', NULL, NULL, NULL, NULL, NULL),
('P8', 4, 'Arundinaria gigantea', 'Tree', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL),
('P9', 6, 'Dieffenbachia seguine\r\n', 'Herb', 'Loam', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specific_use`
--

CREATE TABLE `specific_use` (
  `specific_use_id` int(10) UNSIGNED NOT NULL,
  `plant_species_id` varchar(12) NOT NULL,
  `use_category_id` int(10) UNSIGNED NOT NULL,
  `specific_use_desc` varchar(100) NOT NULL,
  `prep_method_1` text DEFAULT NULL,
  `prep_method_2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specific_use`
--

INSERT INTO `specific_use` (`specific_use_id`, `plant_species_id`, `use_category_id`, `specific_use_desc`, `prep_method_1`, `prep_method_2`) VALUES
(1, 'P1', 5, 'Firewood', NULL, NULL),
(2, 'P2', 3, 'Exorcism and Funeral', 'Add water to the plant. After that, do prayers and then sprinkle the water on the people as protection.  ', NULL),
(3, 'P2', 2, 'Treat sickliness believed to be from supernatural origin. ', 'The leaves are tied in a bundle. It is then waved at the possessed patient while the priest says incantations. ', NULL),
(4, 'P3', 1, 'Food', 'Blender and cooked together with meat. ', NULL),
(5, 'P3', 2, 'To detect whether someone has sickness within. ', 'If the person has sickness, then leaves will move in a certain manner and produce a certain sound. ', NULL),
(6, 'P3', 2, 'To treat miscellaneous sickness. ', 'Crush the leaves, add water and sprinkle the plant water to the patient. ', NULL),
(7, 'P3', 3, 'Exorcism  ', 'Crush and grade the roots. Then add water. Sprinkle the product onto the possesed patient. ', NULL),
(8, 'P4', 3, 'Exorcism', 'Crush and grade the roots. Then add water. Sprinkle the product onto the possesed patient. ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specific_use_part`
--

CREATE TABLE `specific_use_part` (
  `specific_use_id` int(10) UNSIGNED NOT NULL,
  `plant_part_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specific_use_part`
--

INSERT INTO `specific_use_part` (`specific_use_id`, `plant_part_id`) VALUES
(1, 1),
(1, 14),
(1, 13),
(2, 6),
(2, 7),
(4, 6),
(5, 15),
(6, 6),
(7, 7),
(3, 6),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `ic_number` int(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `use_category`
--

CREATE TABLE `use_category` (
  `use_category_id` int(10) UNSIGNED NOT NULL,
  `use_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `use_category`
--

INSERT INTO `use_category` (`use_category_id`, `use_category`) VALUES
(1, 'Food'),
(2, 'Medicine'),
(3, 'Spiritual'),
(4, 'Recreational'),
(5, 'Utility'),
(6, 'Construction'),
(7, 'Hunting & Fishing'),
(8, 'Cosmetic'),
(9, 'Decoration');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration_route`
--
ALTER TABLE `administration_route`
  ADD KEY `fk_specific_use_admin_route` (`specific_use_id`);

--
-- Indexes for table `location_area`
--
ALTER TABLE `location_area`
  ADD PRIMARY KEY (`location_area_id`);

--
-- Indexes for table `plant_english_name`
--
ALTER TABLE `plant_english_name`
  ADD KEY `fk_species_eng_name` (`plant_species_id`);

--
-- Indexes for table `plant_family`
--
ALTER TABLE `plant_family`
  ADD PRIMARY KEY (`plant_family_id`);

--
-- Indexes for table `plant_local_name`
--
ALTER TABLE `plant_local_name`
  ADD KEY `fk_rec_local_name` (`plant_record_id`);

--
-- Indexes for table `plant_part`
--
ALTER TABLE `plant_part`
  ADD PRIMARY KEY (`plant_part_id`);

--
-- Indexes for table `plant_photo`
--
ALTER TABLE `plant_photo`
  ADD KEY `fk_species_photo` (`plant_species_id`);

--
-- Indexes for table `plant_record`
--
ALTER TABLE `plant_record`
  ADD PRIMARY KEY (`plant_record_id`),
  ADD KEY `fk_species_record` (`plant_species_id`),
  ADD KEY `fk_location_area_plant_record` (`location_area_id`);

--
-- Indexes for table `plant_species`
--
ALTER TABLE `plant_species`
  ADD PRIMARY KEY (`plant_species_id`),
  ADD KEY `fk_family_species` (`plant_family_id`);

--
-- Indexes for table `specific_use`
--
ALTER TABLE `specific_use`
  ADD PRIMARY KEY (`specific_use_id`),
  ADD KEY `fk_species_specific_use` (`plant_species_id`),
  ADD KEY `fk_use_category_specific_use` (`use_category_id`);

--
-- Indexes for table `specific_use_part`
--
ALTER TABLE `specific_use_part`
  ADD KEY `fk_specific_use` (`specific_use_id`),
  ADD KEY `fk_plant_part` (`plant_part_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `use_category`
--
ALTER TABLE `use_category`
  ADD PRIMARY KEY (`use_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration_route`
--
ALTER TABLE `administration_route`
  MODIFY `specific_use_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location_area`
--
ALTER TABLE `location_area`
  MODIFY `location_area_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plant_family`
--
ALTER TABLE `plant_family`
  MODIFY `plant_family_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plant_local_name`
--
ALTER TABLE `plant_local_name`
  MODIFY `plant_record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plant_part`
--
ALTER TABLE `plant_part`
  MODIFY `plant_part_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `plant_record`
--
ALTER TABLE `plant_record`
  MODIFY `plant_record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plant_species`
--
ALTER TABLE `plant_species`
  MODIFY `plant_family_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specific_use`
--
ALTER TABLE `specific_use`
  MODIFY `specific_use_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `use_category`
--
ALTER TABLE `use_category`
  MODIFY `use_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administration_route`
--
ALTER TABLE `administration_route`
  ADD CONSTRAINT `fk_specific_use_admin_route` FOREIGN KEY (`specific_use_id`) REFERENCES `specific_use` (`specific_use_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_english_name`
--
ALTER TABLE `plant_english_name`
  ADD CONSTRAINT `fk_species_eng_name` FOREIGN KEY (`plant_species_id`) REFERENCES `plant_species` (`plant_species_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_local_name`
--
ALTER TABLE `plant_local_name`
  ADD CONSTRAINT `fk_rec_local_name` FOREIGN KEY (`plant_record_id`) REFERENCES `plant_record` (`plant_record_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_photo`
--
ALTER TABLE `plant_photo`
  ADD CONSTRAINT `fk_species_photo` FOREIGN KEY (`plant_species_id`) REFERENCES `plant_species` (`plant_species_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_record`
--
ALTER TABLE `plant_record`
  ADD CONSTRAINT `fk_location_area_plant_record` FOREIGN KEY (`location_area_id`) REFERENCES `location_area` (`location_area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_species_record` FOREIGN KEY (`plant_species_id`) REFERENCES `plant_species` (`plant_species_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plant_species`
--
ALTER TABLE `plant_species`
  ADD CONSTRAINT `fk_family_species` FOREIGN KEY (`plant_family_id`) REFERENCES `plant_family` (`plant_family_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specific_use`
--
ALTER TABLE `specific_use`
  ADD CONSTRAINT `fk_species_specific_use` FOREIGN KEY (`plant_species_id`) REFERENCES `plant_species` (`plant_species_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_use_category_specific_use` FOREIGN KEY (`use_category_id`) REFERENCES `use_category` (`use_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specific_use_part`
--
ALTER TABLE `specific_use_part`
  ADD CONSTRAINT `fk_plant_part` FOREIGN KEY (`plant_part_id`) REFERENCES `plant_part` (`plant_part_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_specific_use` FOREIGN KEY (`specific_use_id`) REFERENCES `specific_use` (`specific_use_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
