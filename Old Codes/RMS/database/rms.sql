-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 07:27 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `dishId` varchar(11) NOT NULL,
  `dishName` varchar(15000) NOT NULL,
  `ingred` varchar(15000) DEFAULT 'Vegeterian',
  `price` double(255,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`dishId`, `dishName`, `ingred`, `price`) VALUES
('BK1', 'Egg on Toast', 'Vegeterian', 140.00),
('BK2', 'Beans on Toast', 'Vegeterian', 140.00),
('BK3', 'Shenanigans SET', 'Bacon, eggs and toast, eggs cooked to your liking', 150.00),
('BK4', 'All Day Breakfast', '3 breakfast sausages, 2 bacon, black and white pudding, baked beans, mushrooms, hash brown and a choice of toasted or fried bread', 350.00),
('BK5', 'Bacon Irish Soda Bread Sandwich', 'Vegeterian', 175.00),
('BK6', 'Sausage Irish Soda Bread Sandwich', 'Vegeterian', 175.00),
('BK7', 'Egg Soda Bread Sandwich', 'Vegeterian', 195.00),
('EP1', 'Loaded Potato Skins with Cheese, Chives and Bacon', 'Vegeterian', 99.00),
('EP10', 'Larb Moo Tod', 'Vegeterian', 150.00),
('EP11', 'Shenanigans Sharing Feast', 'Honey BBQ drumsticks, onion rings, spring rolls and garlic fries and larb moo tod', 395.00),
('EP2', 'French Fries', 'Vegeterian', 99.00),
('EP3', 'Garlic Fries', 'Vegeterian', 125.00),
('EP4', 'Honey BBQ Chicken Drumsticks', 'Vegeterian', 150.00),
('EP5', 'Battered Onion Rings', 'Vegeterian', 125.00),
('EP6', 'Spring Rolls', 'Vegeterian', 125.00),
('EP7', 'Bruschetta', 'Vegeterian', 195.00),
('EP8', 'Chilli Beef Nachos', 'Vegeterian', 250.00),
('EP9', 'Cheesy Garlic Bread', 'Vegeterian', 150.00),
('GL1', 'Fillet Mignon Steak', '250g, fillet mignon steak, served with a choice of mashed potatoes or chips, mushrooms and French fried onions and peppercorn sauce', 425.00),
('GL2', 'Pork Ribs', '500g, slow cooked pork ribs, slow cooked for 9 hours, smothered in homemade BBQ sauce, served with French fries, potato salad, homemade coleslaw', 450.00),
('GL3', 'Shenanigans Cheese Burger and Fries', 'Premium beef patty, with cheddar cheese and US streaky bacon, with salad dressing, caramelized onions, mayo and BBQ sauce in a brioche bun, served with French fries', 325.00),
('GL4', 'Shenanigans Special Burger and Fries', 'A premium beef patty, topped with cheddar cheese, bacon and garlic mushrooms, with salad and caramelized onions, with chilli mayo, served with French fries', 375.00),
('SL1', 'Classic Caesar Salad', 'Crisp romaine lettuce, croutons, grated parmesan and homemade Caesar dressing', 195.00),
('SL2', 'Tuna Salad', 'Mixed salad with tuna and salad dressing', 175.00),
('SL3', 'Prawn Cocktail Salad', 'Prawns tossed in salad, smothered in marie rose sauce', 275.00),
('SP1', 'Potato and Leek Soup', 'Served with freshly baked bread', 150.00),
('SP2', 'Tomato and Basil Soup', 'Served with freshly baked bread', 150.00),
('SW1', 'Shenanigans Steak Sandwich', 'Sliced prime beef steak, sauteed onions and mushrooms, melted cheese in a freshly baked bun, served with French fries', 295.00),
('SW10', 'Lamb Kebab Meat', 'On chips with melted cheese, mixed salad, garlic mayo and chilli chutney', 350.00),
('SW11', 'Lamb Doner Kebab and Chips', 'Lamb doner meat served in pita bread, with salad on the side, with a serving of chilli chutney and garlic mayo, with a portion of chips', 395.00),
('SW12', 'Chinese Style Curry', 'Served with fried rice and chips', 295.00),
('SW2', 'Shenanigans Club Sandwich', '3 layered sandwich with fillings of grilled chicken breast, bacon, egg, cheddar cheese and mayo, served on freshly baked toasted bread with French fries', 350.00),
('SW3', 'Chicken in Black Bean Sauce', 'Served with fried rice and chips', 295.00),
('SW4', 'Beef in Black Bean Sauce', 'Served with fried rice and chips', 295.00),
('SW5', 'Chicken Balls in Sweet and Sour Sauce', 'Served with fried rice and chips', 295.00),
('SW6', 'Vegetable Chow Mein', 'Vegeterian', 180.00),
('SW7', 'Chinese Takeaway Sharing Dish', 'Chicken balls and sweet and sour sauce, salt and chilli spare ribs, chips and curry sauce, duck pancakes with hoisin sauce', 450.00),
('SW8', 'Chicken Vindaloo', 'Steamed rice, chips and naan bread', 350.00),
('SW9', 'Chicken Madras', 'Steamed rice, chips and naan bread', 350.00),
('TH1', 'Phad Thai', 'Chicken', 100.00),
('TH2', 'Thai Green Curry Chicken', 'Served with steamed rice', 175.00),
('TH3', 'Beef in Oyster Sauce', 'Served with steamed rice', 175.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD UNIQUE KEY `dishId` (`dishId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
