CREATE DATABASE  IF NOT EXISTS `photo_gallery_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `photo_gallery_db`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: photo_gallery_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `photos` (
  `idphoto` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `desphoto` varchar(20) COLLATE utf8_bin NOT NULL,
  `legphoto` varchar(150) COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`idphoto`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'Chapada dos Veadeiros','01ahsufgj.jpg','Parque Nacional','2019-02-09 18:10:55'),(2,'Paisagem Natural','02547ufgj.jpg','Paisagem Natural','2019-02-06 12:23:45'),(4,'Douro Vinhateiro','25c5b0e04.jpg','Marivilhosa produÃ§Ã£o vinÃ­cola','2019-02-08 18:00:33'),(8,'Campos da ConcentraÃ§Ã£o','15c5dbd44.jpg','O espÃ­rito se fa no meio.','2019-02-08 18:32:52'),(9,'CÃ¢nion de Furnas ','75c5dbf10.jpg','Esculpida somente pela natureza','2019-02-08 18:40:32'),(10,'Duna do PÃ´r do Sol','25c5dbf25.jpg','O local faz jus Ã  fama','2019-02-08 18:40:53'),(11,'Dunas de Genipabu','95c5dbf38.jpg','O Parque TurÃ­stico EcolÃ³gico','2019-02-08 18:41:12'),(12,'Gruta do Lago Azul','105c5dbf4.jpg','A aventura na Gruta do Lago Azul','2019-02-08 18:41:30'),(13,'IguaÃ§u','15c5dbf5b.jpg','A cidade de Foz do IguaÃ§u','2019-02-08 18:41:47'),(14,'Parque Estadual do JalapÃ£o','45c5dbf71.jpg','ChapadÃµes e piscinas naturais verde-esmeralda','2019-02-08 18:42:09');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `deslogin` varchar(30) COLLATE utf8_bin NOT NULL,
  `despassword` text COLLATE utf8_bin NOT NULL,
  `desname` varchar(160) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','$2y$12$Y5q6F5ZcPXJqBQnqbKCu1OcPuVsV2oBi0Qh6JqUmgRtwxiYNLJfnW','Nathanael Cruz Alves');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'photo_gallery_db'
--

--
-- Dumping routines for database 'photo_gallery_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-11 13:38:53
