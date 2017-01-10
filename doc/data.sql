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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,3,'villard@gmail.com','Hervé','Villard','Dev',2,0,'fcd73b6d42428b919cb2ae834eadca22e368af79','Adfab'),(2,3,'villard@gmail.com','Paul','Henri','Dev',2,0,'1df0bbe576e9e888d36b49874ec80eb73fbd221f','Adfab'),(3,2,'patrice@gmail.com','Patrice','Boreal','Design',2,0,'7c244846572cf8fe8a5631d0c775d81607f71490','Hetic'),(4,2,'maurice@gmail.com','Maurice','Turc','Design',2,0,'82b4f6a0306f83b89f455f5f611ae589314ebf55','Hetic'),(5,2,'bon@gmail.com','Damien','Bon','Design',2,0,'1ac5d6e6efad9e60ca60ad39210645dccfbb0c30','Hetic'),(6,1,'damien.moulin1@gmail.com','Damien','MOULIN','Chef de Projet',2,0,'b74ba2f5c4f250e0818654bece21c8da719b7eda','Hetic'),(7,1,'jean@gmail.com','Jean','Pierre','Chef de Projet',2,0,'36364269d9567d330fcece2a740eaa4c7b76de05','Hetic'),(8,4,'albert@gmail.com','Albert','DUPOUY','designer',2,0,'b09021e55ae0cc674d35249f367dbe788e97fc90','Agency');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'damien.moulin1@gmail.com','damien.moulin1@gmail.com','damien.moulin1@gmail.com','damien.moulin1@gmail.com',1,NULL,'$2y$13$L/FH5LnaLoF2Ya8x7v9xCeGfPZ7S8H52Wayq47EFMbaeH6QomZc.C','2017-01-10 15:29:18',NULL,NULL,'N;','damien','MOULIN','Hetic','École','Bleu','0667883430'),(2,'noel@gmail.com','noel@gmail.com','noel@gmail.com','noel@gmail.com',1,NULL,'$2y$13$HLiFGIawSZ4rKwbAtdfoGOF0v7pTuRAt6i7zbz7ZFJxxFEHIupYa.','2017-01-10 15:27:46',NULL,NULL,'N;','Noel','Billeau','Hetic','École','Rouge','0160674518'),(3,'thomas@gmail.com','thomas@gmail.com','thomas@gmail.com','thomas@gmail.com',1,NULL,'$2y$13$zItWKUWAEAjoKD6H1qBRmO3xW3NgtGwGIvfsEM24qjysa48Zui2QK','2017-01-10 15:15:39',NULL,NULL,'N;','Thomas','Lescouarnec','Adfab','Agence','Dev','0160674515'),(4,'albert@gmail.com','albert@gmail.com','albert@gmail.com','albert@gmail.com',1,NULL,'$2y$13$qsocVVmZv8lJTx8hYlpIOOn8KScNMCWchgOBaTZsm1nuqqNlGOXWK','2017-01-10 15:32:21',NULL,NULL,'N;','Albert','DUPOUY','Agency','Agence','Carré','0160636523');
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

-- Dump completed on 2017-01-10 16:19:31
