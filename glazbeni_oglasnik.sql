-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2017 at 04:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24
CREATE DATABASE /*!32312 IF NOT EXISTS*/`glazbeni_oglasnik` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `glazbeni_oglasnik`;

create user "glazbenioglasnik";
GRANT DELETE, INSERT, SELECT, UPDATE ON `glazbeni_oglasnik`.*
TO 'glazbenioglasnik'@'localhost' IDENTIFIED BY 'zavrsnirad';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glazbeni_oglasnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kategorija` varchar(30) NOT NULL,
  `vrsta_instrumenta` varchar(30) NOT NULL,
  `marka` varchar(25) DEFAULT NULL,
  `model` varchar(25) DEFAULT NULL,
  `god_proizvodnje` varchar(30) DEFAULT NULL,
  `opis` varchar(520) DEFAULT NULL,
  `slika1` varchar(124) DEFAULT NULL,
  `slika2` varchar(124) DEFAULT NULL,
  `slika3` varchar(124) DEFAULT NULL,
  `cijena` varchar(10) DEFAULT NULL,
  `datum_objave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`id`, `user_id`, `kategorija`, `vrsta_instrumenta`, `marka`, `model`, `god_proizvodnje`, `opis`, `slika1`, `slika2`, `slika3`, `cijena`, `datum_objave`) VALUES
(1, 1, 'gitare', 'Električna gitara', 'Fender', 'St14', '1968', 'Gitara je u izvrsnom stanju, svirana svega nekoliko puta, lagana,kvalitetna,prelijepa', '1--300x300.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1500', '2017-01-30 17:12:42'),
(2, 1, 'gitare', 'Električna gitara', 'Fender', 'Gr-12', '1991', 'Odlična gitara za početnike i one koji se tako osječaju,pristupačna cijena,malo svirana,bez ogrebotina,ko nova', '1--$_35.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '2378', '2017-01-30 17:18:36'),
(3, 1, 'gitare', 'Električna gitara', 'Fender', 'Warlock', '1998', 'Pristupačna cijena,malo svirana,bez ogrebotina,dobio na pokon,nikada nisam svirao,ko nova', '1--One-Clue-Crossword-Guitar.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '2783', '2017-01-30 17:18:49'),
(4, 1, 'gitare', 'Električna gitara', 'Fender', 'GT773', '2007', 'Gitara je svirana jako malo,ogrebana je na neck-u,', '1--Boden-6-Custom-Headless-Guitar1-300x300.png', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '783', '2017-01-30 17:19:09'),
(5, 2, 'gitare', 'Električna gitara', 'Fender', 'Martin', '2000', 'Ovo je opis oglasa, zbog nlbr ce biti\r\nnapisana kako sam\r\nhtio da bude napisan\r\n\r\novo je dodatak tekstu12312312312\r\n\r\ne\r\ne\r\ne\r\nr\r\n', '2--Epiphone-G-310-SG-Electric-Guitar-300x300.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1444', '2017-01-30 17:19:43'),
(7, 2, 'gitare', 'Električna gitara', 'Fender', 'ARBiol4', '1989', 'zelio sam promjeniti samo tekst oglasa i mislim da sam to i uspio napraviti\r\n\r\nasodkapkd\r\nasodkaposkdpao\r\napsodkap\r\nadopaskdpokaospdka', '2--Gibson-Les-Paul-Deluxe-2001-30-th-Anniversary-01-Edit-300x300.jpg', '2--Jameson-Full-Size-Black-Electric-Guitar-300x300-300x300.jpg', '2--main-qimg-b5f0e6259039a9dbed60c8aacca5db85-c.jpg', '1100', '2017-01-30 17:20:09'),
(8, 2, 'gitare', 'Električna gitara', 'Fender', 'GoD', '2000', 'lorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsum', '2--ukelele.jpg', '2--ukul.jpg', 'nema_slike_oglasa.jpg', '15565', '2017-01-30 17:20:42'),
(9, 2, 'gitare', 'Električna gitara', 'Fender', 'ARBiol4', '2000', 'lorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsumlorem lorem ipsum dipsum hipsum', '2--unnamed.png', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1444', '2017-01-30 17:21:02'),
(10, 2, 'gitare', 'Električna gitara', 'Cort', 'Corting', '2011', 'treci red da vidimo\r\n', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1750', '2017-01-30 16:25:16'),
(11, 1, 'bubnjevi', 'Akustični bubanj', 'Tama', 'Supreme', '2006', 'Odličan set, pogodan za većinu pjesama, uglavnom metal i heavymetal\r\nzildjijan cinele, dupla bas pedala, \r\nekstra dobijete stolicu,palice i lak za bubnjeve', '1--bubnjevi.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '7000', '2017-01-31 09:19:11'),
(13, 3, 'bubnjevi', 'Električni bubanj', 'Yamaha', 'RZ444', '2009', 'Elektricni bubanj yamaha, jedan od kvalitetnijih\r\n\r\nPogodan za vjezbanje uz slusalice, nema uznemiravanja susjeda,\r\ntih,kvalitetan uz milion zvukova.\r\n\r\nGaranciju posjedujem, prvi vlasnik', '3--yamaha-dtx-522k-elektricni-bubanj-slika-68001924.jpg', '3--slika-584017-57fe48059c610-default.jpg', 'nema_slike_oglasa.jpg', '11000', '2017-01-31 09:26:21'),
(14, 4, 'gudački', 'Violine', 'Stradivari', 'milenijum', '2001', 'polovinka 1/2, sa zaštitnom navlakom , \r\n\r\ndva gudala. rabljeno. \r\n\r\npotrebne su nove žice. pogodno za djecu početnike.\r\n\r\n cijena nije fiksna.- moguce zamjene\r\n', '4--v_stradivari.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '2530', '2017-01-31 09:30:02'),
(15, 5, 'elektronika', 'Pedala', 'Boss', 'Supreme', '2000', 'Prodajem efekt pedalu za akustične instrumente (gitare, mandoline, tambure). Pedala je u vrhunskom stanju, kao nova je i dolazi sa svim pripadajućim kabelima. Cijena 1600. Kn', '5--ppedala.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '650', '2017-01-31 09:36:30'),
(16, 5, 'elektronika', 'Pedala', 'Boss', 'ARBiol4', '2015', 'Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.', '5--ppedala6.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '666', '2017-01-31 09:36:57'),
(17, 5, 'elektronika', 'Pedala', 'Korg', 'Korgy', '2016', 'Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.', '5--ppedala3.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1250', '2017-01-31 09:38:04'),
(18, 5, 'elektronika', 'Pedala', 'Dunlop', 'PedalAway', '2011', 'Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.Prodajem sljedece pedale:\r\nBOSS NS-2, MXR Super Badass distortion\r\n\r\nCijena po dogovoru.', '5--ppedala4.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1125', '2017-01-31 09:39:02'),
(19, 5, 'elektronika', 'Procesor', 'Boss', 'Xxx43', '2007', 'Odličan procesor, preko 200 zvukova, harfe,marfe,polunote i tonovi su super :)\r\n\r\n', '5--ppedala.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '990', '2017-01-31 09:39:23'),
(24, 5, 'bend', 'Pjevač', 'Pop', 'Mark_twain', '1999', '123465489\r\noglas je ovdje\r\nsubstring radi', '5--slika4.jpg', '5--slika3.jpg', 'nema_slike_oglasa.jpg', '111', '2017-02-01 14:03:17'),
(25, 4, 'bend', 'Pjevač', 'Pop', 'metalika', '1987', '_=dfad asdčlaksdčlak s !"\r\n2\r\n3 12\r\n3\r\n 123\r\n\r\n12\r\n 123\r\n', '4--slika2.png', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '12345', '2017-02-01 14:03:58'),
(26, 4, 'gitare', 'Električna gitara', 'Fender', 'Martin', '1999', 'osmi oglas ili deveti', '4--slikaaa.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '12312', '2017-01-31 12:11:17'),
(27, 4, 'gitare', 'Električna gitara', 'Fender', 'novi', '2000', 'najnoviji oglas bez slike', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1555', '2017-02-01 09:00:12'),
(28, 4, 'gitare', 'Ukulele', 'Fender', 'ukuleleStart', '1998', 'Najnoviji oglas ukulele gitare', '4--ukelele.jpg', '4--ukulele ashton.jpg', '4--ukul.jpg', '755', '2017-02-01 10:34:32'),
(29, 4, 'gitare', 'Ukulele', 'Fender', 'ukulele2', '2012', 'najnoviji oglas ukulelea', '4--ukulele2.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '1750', '2017-02-01 10:37:14'),
(30, 3, 'bubnjevi', 'Akustični bubanj', 'Sonor', 'g224', '2006', 'OGLAS \r\n\r\nje ovdje ', '3--sx_809591.1.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '7500', '2017-02-01 11:24:18'),
(31, 6, 'mikrofoni', 'Pojačalo', 'Behringer', 'vTone 9', '2007', 'Vrhunsko tranzistorsko pojačalo\r\n24 kanala\r\n14 pot-ova\r\n7 levela\r\ngain,high gain, no pain no gain\r\n\r\n', '6--pojacalo.jpg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '850', '2017-02-01 14:16:00'),
(33, 6, 'oprema_razno', 'Kofer', 'Izokofer', 'AluProtect', '2009', 'Odličan kofer, malo ogreban, lagan ko perce\r\n\r\nstane dosta drugih stvari unutra osim gitare', '6--kofer.jpeg', 'nema_slike_oglasa.jpg', 'nema_slike_oglasa.jpg', '450', '2017-02-01 14:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(124) NOT NULL,
  `city` varchar(15) DEFAULT NULL,
  `area` varchar(35) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `adress` varchar(45) DEFAULT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `city`, `area`, `postal_code`, `adress`, `mobile_phone`, `gender`) VALUES
(1, 'Gordan', 'Savanović', 'gofgo', 'gofgos@gmail.com', '$2y$10$BoXCqWviWfYG0JJ9CJuFq.QrJPMln8.qD52W8exk.ezluZ.jVRVYm', 'Zagreb', 'Zagrebačka županija', '10000', 'Svetojanska 9', '0989744038', 'Muški'),
(2, 'Danijel', 'horvat', 'danijel', 'danko@dankec.hr', '$2y$10$jvIsHhqQBUhTVU6MzXHrEuWuTcMckODnBJVFKXPRfHPMK0KDlPlnu', 'Glina', 'Ličko-senjska županija', '', '', '', 'Muški'),
(3, 'Siniša', 'Sinković', 'simke', 'sime@sime.hr', '$2y$10$vD6d9/SaBe0rt6rJ4ahHiuI0F7HAUAfkGTVGyYUeRM.CCDdPmtxxa', 'Đakovo', 'Brodsko-posavska', '22354', 'Ulica Dr. Posavca 44', '091256447', 'Muški'),
(4, 'Ivona', 'Mrcinić', 'Ivona', 'Ivona@ivona.hr', '$2y$10$QFcYFpfbDSYGVzLZiZafDOvqhcBv3k603xuidVJFfRO8ZBqBjXEu2', 'Šibenik', 'Splitsko-dalmatinska', '22665', 'Put Tornjaka bb', '0981234567', 'Ženski'),
(5, 'Steve', 'Oglašivač', 'Steve', 'steve@oglasivanje.hr', '$2y$10$LtDwoAdgzxtyEcMtBfQbeOfsfNeVGdrfzsvfJe.dA8.MGVaREU4l2', 'Belišće', 'Bjelovarsko-bilogorska', '123565', 'Dalmatinska ulica 11', '', 'Muški'),
(6, 'Marko', 'Car', 'marko', 'marko@marko.com', '$2y$10$QmvRAM5394TZ69LPbJjC6OhGTmJrMdlQYNCCTAaueCg3hTQRh1wKW', 'Zagreb', 'Zagrebačka županija', '10000', 'ilica 43', '0981234567', 'Muški');

-- --------------------------------------------------------

--
-- Table structure for table `users_photos`
--

CREATE TABLE `users_photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(128) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `size` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_photos`
--

INSERT INTO `users_photos` (`id`, `user_id`, `filename`, `type`, `size`) VALUES
(4, 1, '1slika.jpg', 'image/jpeg', '21166');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_photos`
--
ALTER TABLE `users_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_photos`
--
ALTER TABLE `users_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD CONSTRAINT `oglasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_photos`
--
ALTER TABLE `users_photos`
  ADD CONSTRAINT `users_photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
