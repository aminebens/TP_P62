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
(5, 25, 13, 1, 'Circuit Mandelberg (Le)', 'Comment un homme très vieux, très malade et surtout très riche peut-il devenir immortel ? En greffant son cerveau dans le corps d''un jeune athlète poursuivi par la Mafia.', '978-2-205-07498-7', 4.00, '8.99', 'images/couv/place_holder.png', NULL, '2015-09-05 00:00:00'),
(7, 1,10, 3, 'TYLER CROSS TOME 1', 'Tyler Cross vient de braquer 17 kilos d''héroïne pure appartenant à la Mafia. Il a 20 dollars en poche, un fusil à pompe, un Colt à la ceinture, et il est à pied, seul, au fin fond du Texas.', '9782205070064', 8.34, '19.99', 'images/couv/tylercrosstome1.jpg', NULL,'2013-09-17 00:00:00'),
(8, 1, 11, 3, 'TYLER CROSS TOME 2', 'La chance tourne. Ce qui devait être un coup sans risque, garanti sur facture, se transforme en descente aux enfers pour Tyler Cross. ', '9782205072853', 9.00, '19.99', 'images/couv/tylercrosstome2.jpg', '','2013-02-10 00:00:00'),
(9, 2, 12, 4, 'Portugal', 'La vie est grise. Simon Muchat, auteur de bandes dessinées, est en panne d''inspiration et son existence est en perte de sens. \r\nInvité à passer quelques jours au Portugal...', '2800148136', 7.80, '34.99', 'images/couv/Portugal.jpg', NULL,'2013-05-07 00:00:00'),
(10, 3, 13, 1, 'Tintin au Tibet', 'En vacances dans les Alpes, Tintin reçoit une lettre de Tchang dans laquelle il lui annonce sa prochaine visite. Le lendemain, le journal annonce l''écrasement de l''avion dans lequel il prenait place, dans l''Himalaya.', '2203001194 ', 9.50, '12.99', 'images/couv/TintinauTibet.jpg', NULL,'2013-08-07 00:00:00'),
(11, 4, 10, 3, 'Poulet aux prunes', ' Ou comment entrer dans le for intérieur de Nasser Ali Khan, qui a décidé de se laisser mourir car sa femme lui a cassé son Tar, son instrument de musique inégalable…', '2844141595', 7.90, '17.99', 'images/couv/Pouletauxprunes.jpg', NULL,'2013-03-17 00:00:00'),
(12, 1, 11, 4, 'Le Combat ordinaire : Ce qui est précieux', 'Ce qui est précieux voit Marco, confronté au désir de maternité d''Emilie et à la mort de son père. A travers de petites choses, de vieilles photos et des événements sans importance, Larcenet poursuit ses questionnements sur l''âme humaine', '220505791X', 8.60, '7.50', 'images/couv/LeCombatordinaire.jpg', NULL, '0000-00-00 00:00:00'),
(13, 1, 12, 3, 'Le Chat du Rabbin : Jérusalem d''Afrique', 'Le mari de Zlabya a commandé des livres, et voilà que c’est un Russe qui débarque. Tout blond, qui parle en cyrillique, un vrai Russe, sauf qu’il est juif, quand même. Et peintre. Forcément, ça fait des histoires.', '2205058681', 8.80, '13.99', 'images/couv/LeChatduRabbin.jpg', NULL, '2015-07-15 00:00:00'),
(14, 5, 13, 2, 'Chroniques  Birmanes', 'Après la Corée (Pyongyang) et la Chine (Shenzhen) Guy Delisle nous invite ici à découvrir la Birmanie, où il a suivi sa femme pendant 14 mois, alors qu’elle était en mission avec Médecins sans frontières.', '2756009334', 9.10, '21.99', 'images/couv/Chroniquesbirmanes.jpg', NULL, '2013-10-15 00:00:00'),
(15, 5, 10, 2, 'La page blanche', 'Une jeune femme reprend ses esprits sur un banc sans se rappeler ni son nom ni ce qu''elle fait là. Menant l''enquête tant bien que mal, elle tente de retrouver la mémoire et son identité. Mais que va-t-elle découvrir ', '2756026727', 8.40, '23.49', 'images/couv/Lapageblanche.jpg', NULL, '2015-05-20 00:00:00'),
(16, 6, 11, 1, 'Aya de Yopougon, tome 1', 'Côte d''Ivoire, 1978. Aya, dix-neuf ans, vit à Yopougon, un quartier populaire d''Abidjan. Ça sent le début des vacances mais très vite les choses vont commencer à se gâter…', '2070573117', 7.50, '14.99', 'images/couv/AyadeYopougon.jpg', NULL, '2015-02-17 00:00:00'),
(17, 1, 12, 2, 'Là où vont nos pères', 'Pourquoi tant d''hommes et de femmes sont-ils conduits à tout laisser derrière eux pour partir, seuls, vers un pays mystérieux, un endroit sans famille ni amis, où tout est inconnu et l''avenir incertain ?', '220505970X ', 8.60, '15.29', 'images/couv/Laouvontnosperes.jpg', NULL, '2015-05-18 00:00:00'),
(18, 7, 13, 1, 'Astérix et Cléopâtre', 'Nous sommes en 50 avant Jésus-Christ ; toute la Gaule est occupée par les Romains... Toute ? Non ! Car un village peuplé d''irréductibles Gaulois résiste encore et toujours à l''envahisseur. ', '2012101380', 9.40, '18.59', 'images/couv/AsterixetCleopatre.jpg', NULL, '2014-08-19 00:00:00'),
(19, 6, 10, 2, 'Cadavre exquis', 'Zoé travaille comme hôtesse d''accueil dans les salons. Elle s''ennuie et ne supporte plus les sourires forcés et les talons hauts. Le jour où elle rencontre Thomas Rocher, écrivain à succès, elle croit enfin à sa bonne étoile.', '2070627187', 6.90, '17.90', 'images/couv/Cadavreexquis.jpg', NULL, '2014-07-08 00:00:00'),
(20, 8, 11, 4, 'Lulu femme nue, Tome 1', 'Lulu, mère de famille de quarante ans, sans histoire, a disparu depuis plus de deux semaines, abandonnant mari et enfants à ses amis désemparés.\r\nL’un d’eux, Xavier, a retrouvé sa trace. ', '2754801022 ', 8.90, '24.99', 'images/couv/lulufemmenue.jpg', NULL,  '2014-05-13 00:00:00'),
(21, 3, 12, 3, 'Habibi', 'Vendue à un scribe alors qu’elle vient tout juste de quitter l’enfance, puis éduquée par celui-ci, une très jeune femme voit son mari assassiné sous ses yeux par des voleurs. Elle parvient pourtant à leur échapper ', '2203003278', 9.40, '17.89', 'images/couv/Habibi.jpg', NULL, '2015-03-16 00:00:00'),
(22, 9, 13, 3, 'Maus, un survivant raconte', 'Maus raconte la vie de Vladek Spiegelman, rescapé juif des camps nazis, et de son fils, auteur de bandes dessinées, qui cherche un terrain de réconciliation avec son père, sa terrifiante histoire et l''Histoire.', '2080660292', 9.70, '23.29', 'images/couv/Mausunsurvivantraconte.jpg', NULL, '2015-02-07 00:00:00'),
(23, 3, 10, 4, 'Blankets manteau de neige', 'Je voulais le ciel. Et j''ai grandi en m''efforçant d''obtenir de ce monde... un monde éternel.', '2203396083', 7.50, '13.99', 'images/couv/manteaudeneige.jpg', NULL, '2015-09-08 00:00:00'),
(24, 4, 11, 3, 'Persepolis', 'A L’Association, on n’aime pas beaucoup le terme d’intégrale, alors on ne va pas en plus l’écrire sur le livre (certains n’hésitent pas). On préfère parler de monovolume (on ne l’écrira pas dessus non plus). ', '2844142400', 9.80, '21.99', 'images/couv/Persepolis.jpg', NULL, '2015-03-17 00:00:00'),
(25, 10, 12, 2, 'Le bleu est une couleur chaude', '\r\nMon ange de bleu\r\nBleu du ciel\r\nBleu des rivières\r\nSource de vie', '272346783X', 6.80, '17.89', 'images/couv/Lebleuestunecouleurchaude.jpg', NULL, '2015-04-14 00:00:00'),
(26, 8, 13, 2, 'Les ignorants', 'Par un beau temps d''hiver, deux individus, bonnets sur la tête, sécateur en main, taillent une vigne. L''un a le geste et la parole assurés. L''autre, plus emprunté, regarde le premier, cherche à comprendre "ce qui relie ce type à sa vigne"', '2754803823', 8.00, '18.49', 'images/couv/Lesignorants.jpg', NULL, '2015-09-16 00:00:00'),
(27, 11, 10, 2, 'Les Vieux Fourneaux : Ceux qui restent', 'Pierrot, Mimile et Antoine, trois septuagénaires, amis d''enfance, ont bien compris que vieillir est le seul moyen connu de ne pas mourir. Quitte à traîner encore un peu ici-bas, ils sont bien déterminés à le faire avec style', '2505019932', 8.60, '18.99', 'images/couv/lesvieuxfourneaux.jpg', NULL, '2014-04-16 00:00:00'),
(28, 3, 11, 4, 'Polina', 'Très douée pour la danse, la petite Polina Oulinov est sélectionnée pour suivre les cours de Nikita Bojinski, un maître d’une exigence absolue, à la fois redouté et admiré.', '2203026138', 7.90, '20.59', 'images/couv/Polina.jpg', NULL, '2015-04-22 00:00:00');

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
