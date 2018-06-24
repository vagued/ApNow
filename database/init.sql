CREATE USER 'ApNowUser'@'localhost' IDENTIFIED BY 'Apass!@#';
GRANT ALL PRIVILEGES ON apnow.* TO 'ApNowUser'@'localhost';

CREATE DATABASE  IF NOT EXISTS `apnow` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `apnow`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: apnow
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartments` (
  `idapartment` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `extension` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idapartment`),
  KEY `fk_apartments_clients_idx` (`idclient`),
  CONSTRAINT `fk_apartments_clients` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` VALUES (1,1,'Spacious','Athens','Five rooms','2016-06-11','2018-06-28','jpg'),(2,1,'Really cozy','Patras','Fully equiped kitchen','2018-01-03','2018-05-29','jpg'),(3,2,'Modern','Athens','Renovated last month','1990-01-01','2020-01-01','jpg'),(4,2,'Opportunity','Patras','Near mass transport','2015-01-01','2021-01-01','jpg');
/*!40000 ALTER TABLE `apartments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `extension` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclient`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'test','123','John','Doe','test@testdom.com','png'),(2,'mike','321','Mike','Leo','mleo@meail.com','jpg');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentings`
--

DROP TABLE IF EXISTS `rentings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rentings` (
  `idrenting` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `idapartment` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idrenting`),
  KEY `fk_rentings_clients1_idx` (`idclient`),
  KEY `fk_rentings_apartments1_idx` (`idapartment`),
  CONSTRAINT `fk_rentings_apartments1` FOREIGN KEY (`idapartment`) REFERENCES `apartments` (`idapartment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rentings_clients1` FOREIGN KEY (`idclient`) REFERENCES `clients` (`idclient`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentings`
--

LOCK TABLES `rentings` WRITE;
/*!40000 ALTER TABLE `rentings` DISABLE KEYS */;
INSERT INTO `rentings` VALUES (12,1,2,'2018-05-10','2018-05-15',4,'[Really long comment of appreciation]'),(16,2,3,'2018-07-15','2019-01-01',NULL,NULL),(17,2,1,'2017-05-03','2017-05-04',4,NULL),(18,2,2,'2018-01-04','2018-01-05',5,'Excellent'),(19,2,1,'2016-06-12','2018-06-13',1,'Cold and noisy');
/*!40000 ALTER TABLE `rentings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-24 21:10:46
