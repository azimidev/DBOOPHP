-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2014 at 04:24 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oophp`
--
CREATE DATABASE IF NOT EXISTS `oophp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oophp`;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `yearmade` year(4) NOT NULL,
  `mileage` mediumint(8) unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text,
  PRIMARY KEY (`car_id`),
  KEY `yearmade` (`yearmade`),
  KEY `make_id` (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `make_id`, `yearmade`, `mileage`, `price`, `description`) VALUES
(1, 5, 2007, 113688, '13550.00', 'Green Chrysler 300. Only one owner, very carefully maintained. Top of the line, and beautifully styled, this is an outstanding ride with great performance.'),
(2, 2, 2007, 126570, '7545.00', 'Red Ford Focus. "Great bargain as a family car."'),
(3, 12, 2012, 517, '20755.00', 'Demo model that''s hardly been out on the road, this red Chevrolet Cruze is just a dream, with just about every option you could ask for. Great fuel economy, too.'),
(4, 16, 2010, 116626, '10554.00', 'Red Camry in good running condition. Sound electrics and bodywork. Clean interior, appears never to have been smoked in.'),
(5, 7, 2011, 24694, '26951.00', 'Space grey BMW 3 series with beige leather interior. BMW Factory Certified with a 6 year/100,000 mile warranty from in-service date.'),
(6, 11, 2005, 95496, '8554.00', 'Black Jaguar S-Type in perfect working condition. Good electrics and bodywork. Low mileage. New tires recently fitted.'),
(7, 5, 2004, 75500, '6005.00', 'Black Sebring LX convertible. Very low mileage. Excellent ride. A must-see bargain.'),
(8, 4, 2001, 100145, '9550.00', 'Black SLK-Class convertible. Immaculate interior. Power top and power seats. Runs like new.'),
(9, 2, 1999, 102500, '4550.00', 'Metallic red Mustang convertible. Economy car, very easy on fuel. No negative history. No rust or damage on paintwork.'),
(10, 16, 2002, 173658, '6550.00', 'So much to like about this Silver Toyota 4Runner. Runs well, good paint, tires, nice sound system.'),
(11, 3, 2005, 122250, '11550.00', 'Black Cadillac SRX. Only one owner. Beautiful SUV.'),
(12, 17, 2002, 155500, '4305.00', 'Silver Passat. Only one owner. Leather interior. Rare bargain.'),
(13, 1, 1952, 46383, '22055.00', 'Burgundy Studebaker Roadster with newly rebuilt engine and wide whitewall tires. Three-speed manual transmission. Runs and drives amazingly.'),
(14, 10, 2006, 124209, '9120.00', 'White Santa Fe. Only one owner. Leather interior and bodywork are in great shape.'),
(15, 10, 2012, 9811, '24554.00', 'Silver Genesis with beige leather and wood trim interior. Great handling and comfort. Low, low mileage. Luxury at an affordable price.'),
(16, 14, 2005, 130500, '7505.00', 'Five-speed manual black Civic. Super clean, with 6 CD changer. This one, you must see!'),
(17, 15, 2007, 84947, '14554.00', 'Audi A4 Quattro. Gray with gray leather interior, and glass roof. Excellent value.'),
(18, 6, 1972, 77600, '28055.00', 'Citroen D Super with 5 speed manual transmission in fantastic shape. Extremely well maintained, and has obviously been treasured by its owner. A real European classic.'),
(19, 8, 2012, 19361, '14553.00', 'Yellow Fiat 500 POP. Immaculate interior and bodywork. Electrics in perfect order. Tires only slightly worn.'),
(20, 12, 2002, 160550, '4545.00', 'Blue Impala LS with gray interior. Ideal economical vehicle with good gas mileage. Dependable engine, new tires. Price includes 6 month/8,500 mile warranty.'),
(21, 9, 2005, 94995, '8150.00', 'Gold Pontiac Bonneville with low mileage. Great condition.'),
(22, 5, 2006, 102300, '7105.00', 'Green Town & Country sports van.'),
(23, 8, 2012, 5238, '16050.00', 'Pearl white Fiat 500 sport hatchback. Power glass sunroof and power windows. Only one owner.'),
(24, 17, 2005, 70388, '14055.00', 'Shadow blue Touareg in excellent condition. Heated leather seats, sun roof, and navigation. Really low mileage. '),
(25, 13, 2012, 35000, '15550.00', 'Tan Altima. Low mileage. Excellent condition.'),
(26, 2, 2004, 108694, '10980.00', 'Top of the line black Expedition XLT 5.4 liter 4WD with every conceivable option. A truly exceptional SUV.'),
(27, 2, 2005, 123059, '8000.00', 'Blue Ford Escape. Excellent condition. A real bargain.'),
(28, 13, 2010, 32791, '20505.00', 'Red Pathfinder 4WD. Only one owner. Nicely equipped with just about every feature you could want, including third-row seats.'),
(29, 14, 2002, 124334, '6004.00', 'Silver Accord with sunroof, CD player, and all new tires. Excellent condition.'),
(30, 14, 2011, 27345, '14000.00', 'Dark gray Civic. Only one owner, very low mileage. Great fuel economy.'),
(31, 12, 2011, 34256, '12000.00', 'Dark gray Malibu. Interior and bodywork in good condition. Low mileage.'),
(32, 15, 2003, 93494, '10000.00', 'Silver Audi A6 with tan interior. Two previous owners. Mechanically sound and good bodywork. New tires.'),
(33, 3, 2005, 139534, '11505.00', 'Pearl white Cadillac SRX. Electrics, engine, and bodywork all in excellent condition. Only one owner. Tires have about 3/4 of their life span left.'),
(34, 7, 2011, 33784, '25904.00', 'White 3 Series 328i. Low mileage. Bodywork in mint condition. AM/FM stereo, trip computer, power sunroof.'),
(35, 5, 2012, 7834, '16560.00', 'White Chrysler 200 with black interior. Exceptionally low mileage ');

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

CREATE TABLE IF NOT EXISTS `makes` (
  `make_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(30) NOT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`make_id`, `make`) VALUES
(1, 'Studebaker'),
(2, 'Ford'),
(3, 'Cadillac'),
(4, 'Mercedes Benz'),
(5, 'Chrysler'),
(6, 'Citroen'),
(7, 'BMW'),
(8, 'Fiat'),
(9, 'Pontiac'),
(10, 'Hyundai'),
(11, 'Jaguar'),
(12, 'Chevrolet'),
(13, 'Nissan'),
(14, 'Honda'),
(15, 'Audi'),
(16, 'Toyota'),
(17, 'Volkswagen');

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE IF NOT EXISTS `names` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `meaning` varchar(50) NOT NULL,
  `gender` enum('girl','boy','unisex') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`id`, `name`, `meaning`, `gender`) VALUES
(1, 'Alice', 'noble, light', 'girl'),
(2, 'Aubrey', 'ruler of elves', 'unisex'),
(3, 'Harry', 'power, ruler', 'boy'),
(4, 'Isabella', 'devoted to God', 'girl'),
(5, 'Jack', 'God is gracious', 'boy'),
(6, 'Jesse', 'gift', 'unisex'),
(7, 'Leslie', 'garden of hollies', 'unisex'),
(8, 'Oliver', 'olive tree', 'boy'),
(9, 'Oscar', 'spear of the gods', 'boy'),
(10, 'Sophia', 'wisdom', 'girl');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `name`, `balance`) VALUES
(1, 'John White', '1000.00'),
(2, 'Jane Black', '1000.00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `makes` (`make_id`);
  
  
--
-- User account
--

GRANT USAGE ON *.* TO 'oophp'@'localhost' IDENTIFIED BY PASSWORD '*B807E6B9C07ADD2E3CE3AB0E44003454B3F105BF';
GRANT SELECT, INSERT, UPDATE, DELETE ON `oophp`.* TO 'oophp'@'localhost';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
