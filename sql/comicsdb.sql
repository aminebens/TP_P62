-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2015 at 05:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comicsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `street_num` tinyint(3) unsigned NOT NULL,
  `street` varchar(60) NOT NULL,
  `city` varchar(45) NOT NULL,
  `province` varchar(45) NOT NULL,
  `postal_code` char(7) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `postal_code` (`postal_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `street_num`, `street`, `city`, `province`, `postal_code`) VALUES
(1, 255, 'Boul Maisonneuve', 'Montréal', 'Québec', 'H5G 2Y7'),
(2, 255, 'Rue Frank', 'Montréal', 'Québec', 'H6G 3Y7'),
(3, 45, 'Ave Napolitaine', 'Montréal', 'Québec', 'K3G 2Y6'),
(4, 25, 'Rue Sherbrook', 'Montréal', 'Québec', 'H5G 2Y4'),
(5, 255, 'Rue Florence', 'Ottawa', 'Ontario', 'O5U 2H5'),
(6, 132, 'Che Morison', 'Ottawa', 'Ontario', 'O5R 9U6'),
(7, 255, 'Rue Sachuan', 'Toronto', 'Ontario', 'O6U 5Y6'),
(8, 255, 'Boul Colomb', 'Vancouver', 'British Colombia', 'V5O 3U9'),
(9, 2, 'Rue Laval', 'St Hayenth', 'Québec', 'H1G 2Y9'),
(10, 69, 'Rue Coco', 'Montréal', 'Québec', 'H8G 2W7');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Writer` varchar(45) NOT NULL,
  `Artist` varchar(45) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `Writer`, `Artist`) VALUES
(10, 'Safieddine, Joseph', 'Guyon, Loïc'),
(11, 'Zep', 'Zep'),
(12, 'Bollée, Laurent-Frédéric', 'Nicloux, Philippe'),
(13, 'Robert, Denis', 'Biancarelli, Franck');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'BD'),
(4, 'Comics'),
(2, 'Jeunesse'),
(3, 'Manga');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE IF NOT EXISTS `comics` (
  `comic_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_id` mediumint(8) unsigned NOT NULL,
  `author_id` mediumint(9) unsigned NOT NULL,
  `category_id` tinyint(3) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `rating` float(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cover_img_path` varchar(60) DEFAULT NULL,
  `preview_img_path` varchar(60) DEFAULT NULL,
  `publishing_date` datetime NOT NULL,
  PRIMARY KEY (`comic_id`),
  KEY `title` (`title`),
  KEY `price` (`price`),
  KEY `rating` (`rating`),
  KEY `publisher_id` (`publisher_id`),
  KEY `category_id` (`category_id`),
  KEY `author_id` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`comic_id`, `publisher_id`, `author_id`, `category_id`, `title`, `description`, `isbn`, `rating`, `price`, `cover_img_path`, `preview_img_path`, `publishing_date`) VALUES
(2, 23, 11, 1, 'Titeuf', 'Grandis un peu, Titeuf ! La vie de Titeuf est bien bousculée ! Lui qui avait jusquici lhabitude de se prendre des baffes avec les filles doit maintenant choisir entre deux prétendantes : Nadia ou Ramatou. Une situation à sarracher les cheveux !', '978-2-344-00846-1', 5.00, '10.99', 'images/couv/place_holder.png', NULL, '2015-08-27 00:00:00'),
(3, 24, 10, 1, 'L''enragé du ciel', 'Roger Henrard a été le premier à photographier « Paris vu du ciel » à très basse altitude et pendant plus de vingt ans, de la fin des années 20 aux années 50.', '978-2-84865-828-5', 4.00, '8.99', 'images/couv/place_holder.png', NULL, '2015-09-02 00:00:00'),
(4, 23, 12, 1, 'Matsumoto', '994, dans la petite ville de Matsumoto, Japon. Shoko Asahara est le PDG de Aum Inc., un consortium regroupant plus de trente sociétés dont certaines sont cotées à la Bourse de Tokyo.', '978-2-7234-9958-3', 4.00, '12.99', 'images/couv/place_holder.png', NULL, '2015-09-05 00:00:00'),
(5, 25, 13, 1, 'Circuit Mandelberg (Le)', 'Comment un homme très vieux, très malade et surtout très riche peut-il devenir immortel ? En greffant son cerveau dans le corps d''un jeune athlète poursuivi par la Mafia.', '978-2-205-07498-7', 4.00, '8.99', 'images/couv/place_holder.png', NULL, '2015-09-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comics_genres`
--

CREATE TABLE IF NOT EXISTS `comics_genres` (
  `comic_id` mediumint(8) unsigned NOT NULL,
  `genre_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`comic_id`,`genre_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comics_genres`
--

INSERT INTO `comics_genres` (`comic_id`, `genre_id`) VALUES
(4, 2),
(3, 6),
(4, 6),
(2, 7),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`genre_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(1, 'Aventure'),
(2, 'Conte'),
(3, 'Documentaire'),
(4, 'Fantastique'),
(5, 'Fantasy'),
(6, 'Historique'),
(7, 'Humour'),
(8, 'Inclassable'),
(9, 'Médiéval'),
(11, 'Roman Graphique'),
(12, 'Science-Fiction'),
(10, 'Thriller'),
(13, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `login_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `quantity` (`quantity`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `publisher_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`publisher_id`, `name`) VALUES
(1, 'Les 400 coups'),
(2, 'Udon'),
(3, 'La Pastèque'),
(4, 'Arcana Studio'),
(5, 'Akata'),
(6, 'La Boîte à Bulles'),
(7, 'DC Comics'),
(8, 'Disney Comics'),
(9, 'Marvel Comics'),
(10, 'Delcourt'),
(11, 'Éditions Gallimard'),
(12, 'Soleil Productions'),
(13, 'Kana (Dargaud)'),
(14, 'L''Agrume'),
(15, 'Ki-oon'),
(16, 'Seuil'),
(17, 'Panini Comics'),
(18, 'Akileos'),
(19, 'Cornélius'),
(20, 'Casterman'),
(21, 'Tonkam'),
(22, 'Bamboo'),
(23, 'Glénat'),
(24, 'Sarbacane'),
(25, 'Dargaud');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `address_id` mediumint(8) unsigned NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` char(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `secret_question` varchar(60) NOT NULL,
  `secret_answer` varchar(60) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `registration_date` datetime NOT NULL,
  `usertype` enum('user','admin','staff') DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `login` (`pass`,`email`),
  KEY `address_id` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `address_id`, `first_name`, `last_name`, `email`, `pass`, `phone`, `gender`, `secret_question`, `secret_answer`, `date_of_birth`, `registration_date`, `usertype`) VALUES
(1, 1, 'Amine', 'Bens', 'email@example.com', '6e85af4d9d4827f07fb91fa7ae71d7e5975ffa82', '(514)555-5555', 'M', 'hello?', 'world!', '1982-08-23 20:36:17', '2014-09-05 10:00:00', 'admin'),
(2, 5, 'Nathan', 'Bernard', 'email2@example.com', '34a91f713808846ade4a71577dc7963631ebae14', '(514)111-5555', 'M', 'question?', 'pour un champion!', '1983-10-15 08:05:00', '2014-09-05 10:32:15', 'admin'),
(3, 2, 'Cecil', 'Baron', 'cecilb@spira.com', '547933c58fa5c4701b1378c8769c60be9ff14943', '(438)265-5655', 'M', 'qui est le hero?', 'moi hahaha', '1989-07-15 22:36:17', '2015-08-04 18:15:45', 'user'),
(4, 7, 'Edgar', 'Figaro', 'edgarvii@example.com', 'c0453917f26286af07483599eb4c0c71b2ce387c', '(514)559-5455', 'M', 'King?', 'Edgar!', '1980-01-12 23:36:17', '2015-09-05 10:01:00', 'user'),
(5, 10, 'Tifa', 'Lancelot', 'tf@example2.com', '96bf655406503d96477c30273f5e18b007b610d7', '(416)589-4444', 'F', 'qui est la meilleure?', 'Tifa!', '1988-04-24 15:26:12', '2015-08-15 16:35:12', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comics`
--
ALTER TABLE `comics`
  ADD CONSTRAINT `comics_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comics_genres`
--
ALTER TABLE `comics_genres`
  ADD CONSTRAINT `comics_genres_ibfk_1` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`comic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comics_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
