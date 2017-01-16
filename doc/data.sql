-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pingpong
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `winner_id` int(11) DEFAULT NULL,
  `playerone_id` int(11) DEFAULT NULL,
  `playertwo_id` int(11) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_232B318C5DFCD4B8` (`winner_id`),
  KEY `IDX_232B318CCED059C9` (`playerone_id`),
  KEY `IDX_232B318CA58CBE06` (`playertwo_id`),
  KEY `IDX_232B318C33D1A3E7` (`tournament_id`),
  CONSTRAINT `FK_232B318C33D1A3E7` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`),
  CONSTRAINT `FK_232B318C5DFCD4B8` FOREIGN KEY (`winner_id`) REFERENCES `player` (`id`),
  CONSTRAINT `FK_232B318CA58CBE06` FOREIGN KEY (`playertwo_id`) REFERENCES `player` (`id`),
  CONSTRAINT `FK_232B318CCED059C9` FOREIGN KEY (`playerone_id`) REFERENCES `player` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,4,3,4,1,0,1),(2,11,5,11,1,0,1),(3,4,11,4,1,0,2),(4,31,30,31,2,0,1),(5,32,32,33,2,0,1),(6,32,31,32,2,0,2),(7,37,36,37,3,0,1),(8,38,38,39,3,0,1),(9,NULL,37,38,3,2,2),(10,7,6,7,4,0,1),(11,9,9,10,4,0,1),(12,7,7,9,4,0,2);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `structure` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `privatekey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userstructure` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_98197A65A76ED395` (`user_id`),
  CONSTRAINT `FK_98197A65A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,3,'villard@gmail.com','Hervé','Villard','Dev',2,0,'fcd73b6d42428b919cb2ae834eadca22e368af79','Adfab'),(2,3,'villard@gmail.com','Paul','Henri','Dev',1,0,'1df0bbe576e9e888d36b49874ec80eb73fbd221f','Adfab'),(3,2,'patrice@gmail.com','Patrice','Boreal','Design',1,0,'7c244846572cf8fe8a5631d0c775d81607f71490','Hetic'),(4,2,'maurice@gmail.com','Maurice','Turc','Design',1,0,'82b4f6a0306f83b89f455f5f611ae589314ebf55','Hetic'),(5,2,'bon@gmail.com','Damien','Bon','Design',1,0,'1ac5d6e6efad9e60ca60ad39210645dccfbb0c30','Hetic'),(6,1,'damien.moulin1@gmail.com','Damien','MOULIN','Chef de Projet',1,0,'b74ba2f5c4f250e0818654bece21c8da719b7eda','Hetic'),(7,1,'jean@gmail.com','Jean','Pierre','Chef de Projet',1,0,'36364269d9567d330fcece2a740eaa4c7b76de05','Hetic'),(8,4,'albert@gmail.com','Albert','DUPOUY','designer',1,0,'b09021e55ae0cc674d35249f367dbe788e97fc90','Agency'),(9,1,'chloe@gmail.com','Chloe','Andrault','Chef de Projet',1,0,'c6b87bf5318567f22502514856f8f7702d7ca358','Hetic'),(10,1,'mike@gmail.com','Mike','Tyson','Chef de Projet',1,0,'2a381f448c9e43287141c76daed7f0a6c1262980','Hetic'),(11,2,'michemiche@gmail.com','Jean Michel','PaDchaussure','Design',1,0,'397bc197e0155c5a67f1bdb771856f70d8ca7dd4','Hetic'),(12,5,'damien.moulin1@gmail.com','Damien','MOULIN','Hetic',1,0,'39b3395d330e8ecc59ca7f7269d1928645953550','Admin'),(13,5,'damien.moulin1@gmail.com','Nicolas','moulin','Hetic',1,0,'5ad401af5db005c7519dc3d2741be1cea03c68df','Admin'),(15,5,'kalou@gmail.com','Hervé','Kalou','Hetic',1,0,'0e0741a77363df37dd1917ea53fc2bcd368fe527','Admin'),(16,5,'paul@gmail.com','Paul','Pol','Hetic',1,0,'1a777900f4ce5559ca694decbf3e5431cc6af7f8','Admin'),(17,5,'vianey@gmail.com','Vianey','LeSour','Hetic',1,0,'b8e4a982226374738783bc251cf270083aa5a413','Admin'),(18,5,'walid@gmail.com','Walid','Montenot','Hetic',1,0,'6c718bba049284ad9f55b6346b8ebd547659c2cc','Admin'),(19,5,'claude@gmail.com','Claude','Samperman','Hetic',1,0,'ef54b6bc7d04a87b28d8c5227d9da0f4220360a9','Admin'),(20,5,'alex@gmail.com','Alexandre','Rico','Hetic',1,0,'2d3e355485169be11bcdab6a77b16b290fc04cdf','Admin'),(21,5,'stalone@gmail.com','Stalone','Caillou','Hetic',1,0,'cd5555b1f5e6c6260520ef9f081540aaa649b9ce','Admin'),(22,5,'val@gmail.com','Valentin','Deb','Hetic',1,0,'27c156b936e89931e808c8533e410e3cd671b765','Admin'),(23,5,'thomo@gmail.com','Thomas','Caribou','Hetic',1,0,'a33bad1349853d00025923205c230ee023505bc4','Admin'),(24,5,'pierre@gmail.com','Pierre','AFEU','Hetic',1,0,'7558cdb01e29fe1512be0ab1dfb1cddce51a1761','Admin'),(25,5,'albert@gmail.com','Albert','delamotte','Hetic',1,0,'5153ef87058ebcabc708c60ec1f84cec458e8385','Admin'),(26,5,'evelyne@gmail.com','Evelyne','demonmiraille','Hetic',1,0,'dc0cdc8fe45a8c1dd6413689749f6738d11e070d','Admin'),(27,5,'jose@gmail.com','José','BOVE','Hetic',1,0,'8113de6a488bcab6d4faca6d3c506ab5c159aee9','Admin'),(28,5,'j@gmail.com','Jonathann','JOKO','Hetic',1,0,'a36b46f0816c2f9717906afadc6ab27ae7f68b03','Admin'),(29,5,'valerie@gmail.com','Valerie','TEUSTEUR','Hetic',1,0,'e65db95cee7ad6d1f568f65d759cb1b19328a1e4','Admin'),(30,7,'valerie@gmail.com','Valerie','DAMIDOT','Cdp',1,0,'ed13b8521e9c5e94f204e653ed09d0e922a3c950','Hetic'),(31,7,'paul@gmail.com','Jean','Paul','Cdp',1,0,'d38016410a57e1f8f44adb5995b0197f5868db3a','Hetic'),(32,7,'five@gmail.com','Jackson','Five','Cdp',1,0,'61db6543e1de46480a4d077d770c5ea89c6d871d','Hetic'),(33,7,'jimmy@gmail.com','Jimmy','Gitan','Cdp',1,0,'e62561e6f5ca645acd49c5d80fbe15f36e93a811','Hetic'),(36,6,'pierre@gmail.com','Pierre','Henri','dev',1,0,'3d388e97a0eddb3a361f15c5b82532239fbcd7d1','Valve'),(37,6,'michel@gmail.com','Michel','Patrick','dev',1,0,'bcb0b632981bacb0628abcfb58f0637756305943','Valve'),(38,6,'ed@gmail.com','Edouard','ferry','dev',1,0,'8b890e015ed84b2d66183422c8944f3561ecaf8e','Valve'),(39,6,'paul@gmail.com','Paul','Paulet','dev',1,0,'c5f6580469a72302d360ff25f7329b712524d0ee','Valve'),(40,8,'damien.moulin@hetic.net','Damien','MOULIN','Hetic',1,0,'0e5a5a50dfb60b33ba5c0097333bc15459d5f1e5','Digital expression'),(41,8,'alexa.cuellar@hetic.net','Alexa','CUELLAR','Hetic',1,0,'ed863479c7535eb0edefede89090e7693c206f79','Digital expression'),(42,8,'chloe.andrault@hetic.net','Chloe','ANDRAULT','Hetic',1,0,'0033f49fcc210dd6bed639ad1a789d7d878e3287','Digital expression'),(43,8,'tatiana.jacques@hetic.net','Tatiana','JACQUES','Hetic',2,0,'48b8ee3e2b8ca34a52306c1bc28bd8213af13fca','Digital expression'),(44,8,'noel.billeau@hetic.net','Noel','BILLEAU','Hetic',1,0,'ccc603072b30d1e9c9b0239cd2b716cf61f78a02','Digital expression'),(45,8,'thomas.lescouarnec@hetic.net','Thomas','LESCOUARNEC','Hetic',1,0,'880e414f88cd6fc595f0fde5b7c9a9d5d6c1db5b','Digital expression'),(46,8,'albert.dupouy@hetic.net','Albert','DUPOUY','Hetic',1,0,'7969275923170acdf96ff695b1d293910b223815','Digital expression'),(47,8,'alexandre.rico@gmail.com','Alexandre','RICO','Hetic',1,0,'9b2c0a1d15c562f6091b60d51fb290b57f726203','Digital expression');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `winner_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BD5FB8D95DFCD4B8` (`winner_id`),
  UNIQUE KEY `UNIQ_BD5FB8D9A76ED395` (`user_id`),
  CONSTRAINT `FK_BD5FB8D95DFCD4B8` FOREIGN KEY (`winner_id`) REFERENCES `player` (`id`),
  CONSTRAINT `FK_BD5FB8D9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournament`
--

LOCK TABLES `tournament` WRITE;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;
INSERT INTO `tournament` VALUES (1,4,2,0),(2,32,7,0),(3,NULL,6,1),(4,9,1,0);
/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `structurename` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `structuretype` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `teamname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`),
  UNIQUE KEY `UNIQ_8D93D64933D1A3E7` (`tournament_id`),
  CONSTRAINT `FK_8D93D64933D1A3E7` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'damien.moulin1@gmail.com','damien.moulin1@gmail.com','damien.moulin1@gmail.com','damien.moulin1@gmail.com',1,NULL,'$2y$13$L/FH5LnaLoF2Ya8x7v9xCeGfPZ7S8H52Wayq47EFMbaeH6QomZc.C','2017-01-12 23:44:26',NULL,NULL,'N;','damien','MOULIN','Hetic','École','Bleu','0667883430',4),(2,'noel@gmail.com','noel@gmail.com','noel@gmail.com','noel@gmail.com',1,NULL,'$2y$13$HLiFGIawSZ4rKwbAtdfoGOF0v7pTuRAt6i7zbz7ZFJxxFEHIupYa.','2017-01-11 10:50:46',NULL,NULL,'N;','Noel','Billeau','Hetic','École','Rouge','0160674518',1),(3,'thomas@gmail.com','thomas@gmail.com','thomas@gmail.com','thomas@gmail.com',1,NULL,'$2y$13$zItWKUWAEAjoKD6H1qBRmO3xW3NgtGwGIvfsEM24qjysa48Zui2QK','2017-01-10 15:15:39',NULL,NULL,'N;','Thomas','Lescouarnec','Adfab','Agence','Dev','0160674515',NULL),(4,'albert@gmail.com','albert@gmail.com','albert@gmail.com','albert@gmail.com',1,NULL,'$2y$13$qsocVVmZv8lJTx8hYlpIOOn8KScNMCWchgOBaTZsm1nuqqNlGOXWK','2017-01-10 15:32:21',NULL,NULL,'N;','Albert','DUPOUY','Agency','Agence','Carré','0160636523',NULL),(5,'admin@gmail.com','admin@gmail.com','admin@gmail.com','admin@gmail.com',1,NULL,'$2y$13$7EV92qf8UVykd5fSp5rkqe8JRuzApdI5p2O7rG4aoNxgHnVUoBinS','2017-01-11 12:59:13',NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','Admin','Admin','Admin','École','Admin','0160674518',NULL),(6,'pierro@gmail.com','pierro@gmail.com','pierro@gmail.com','pierro@gmail.com',1,NULL,'$2y$13$yP59/GbJfUPye7nV59bG5.wMnWhk2zKoGy3haVOUJ7QyBg/0eIiqy','2017-01-12 17:42:14',NULL,NULL,'a:0:{}','pierro','MAURE','Valve','Agence','GabenTeam','0160674518',3),(7,'ludo@gmail.com','ludo@gmail.com','ludo@gmail.com','ludo@gmail.com',1,NULL,'$2y$13$B5OYIC6pSq.pW/SL2VjvwOQmmwl5.le838FDuHR0DB..6RO3Um952','2017-01-12 13:16:44',NULL,NULL,'a:0:{}','Ludo','MAUREAUDENT','Hetic','École','Rond','0160674518',2),(8,'chloe.andrault@hetic.net','chloe.andrault@hetic.net','chloe.andrault@hetic.net','chloe.andrault@hetic.net',1,NULL,'$2y$13$34nU.yrKT7Ew8eKmiLQ46.RQSunX8UX.mhDkbC7Cd7CkyU09ycEXq','2017-01-13 10:32:41',NULL,NULL,'a:0:{}','Chloe','Andrault','Digital expression','Agence','Team Chloe','0187658632',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-13 11:27:35
