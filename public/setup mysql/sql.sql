-- Moram postaviti UTF-8 nekako
-- Table structure for table `users`
-- sifra za gofgo je test123

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(30),
  `last_name` varchar(30) ,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(124) NOT NULL,
  `city` varchar(15) ,
  `area` varchar(35) ,
  `postal_code` varchar(10) ,
  `adress` varchar(45) ,
  `mobile_phone` varchar(20) ,
  `gender` varchar(8) ,
  
  PRIMARY KEY  (`id`)
) AUTO_INCREMENT=2;

--
-- Dumping data for table `users`
--
INSERT INTO `users` VALUES (1,'Gordan','Savanoviæ','gofgo','gofgos@gmail.com','$2y$10$BoXCqWviWfYG0JJ9CJuFq.QrJPMln8.qD52W8exk.ezluZ.jVRVYm','Zagreb','Zagrebaèka županija','10000','Svetojanska 9','0989744038','Muški');


DROP TABLE IF EXISTS `users_photos`;
CREATE TABLE `users_photos` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11),
  `filename` varchar(128) ,
  `type` varchar(25) NOT NULL,
  `size` varchar(30) NOT NULL,
   
  PRIMARY KEY  (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) AUTO_INCREMENT=2;
--
-- Dumping data for table `users`
--
INSERT INTO `users_photos` VALUES (1,'1','database_test.jpg','image/jpeg','455568');

DROP TABLE IF EXISTS `oglasi`;
CREATE TABLE `oglasi` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) ,
  `kategorija` varchar(30) NOT NULL,
  `vrsta_instrumenta` varchar(30) NOT NULL,
  `marka` varchar(25) ,
  `model` varchar(25) ,
  `god_proizvodnje` varchar(30) ,
  `opis` varchar(520) ,
  `slika1` varchar(124) ,
  `slika2` varchar(124) ,
  `slika3` varchar(124) ,
  `cijena` varchar(10) ,
  `datum_objave` varchar(45) ,
  
  PRIMARY KEY  (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
) AUTO_INCREMENT=2;
--
-- Dumping data for table `oglasi`
--
INSERT INTO `oglasi` VALUES (1,'1','gitare','Elektrièna gitara','Fender','St14','1968','Gitara je u izvrsnom stanju','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','1500','2017-02-24 20:28:48');
INSERT INTO `oglasi` VALUES (2,'1','gitare','Elektrièna gitara','Ibanez','Gr-12','1991','Odlièna gitara za poèetnike i one koji se tako osjeèaju,pristupaèna cijena,malo svirana,bez ogrebotina,ko nova','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','2783','2017-02-23 20:28:48');
INSERT INTO `oglasi` VALUES (3,'1','gitare','Elektrièna gitara','B.C.Rich','Warlock','1998','Pristupaèna cijena,malo svirana,bez ogrebotina,dobio na pokon,nikada nisam svirao,ko nova','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','2783','2017-02-23 20:28:48');
INSERT INTO `oglasi` VALUES (4,'1','gitare','Elektrièna gitara','Les Paul','GT773','2007','Gitara je svirana jako malo,ogrebana je na neck-u,','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','nema_slike_oglasa.jpg','783','2017-02-22 20:28:48');



