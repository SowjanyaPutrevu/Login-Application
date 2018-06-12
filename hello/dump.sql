-- MySQL dump 10.13  Distrib 5.7.21, for Win32 (AMD64)
--
-- Host: localhost    Database: userdata
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('AU','Australia',24016400),('BR','Brazil',205722000),('CA','Canada',35985751),('CN','China',1375210000),('DE','Germany',81459000),('FR','France',64513242),('GB','United Kingdom',65097000),('IN','India',1285400000),('RU','Russia',146519759),('US','United States',322976000);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useraddress`
--

DROP TABLE IF EXISTS `useraddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useraddress` (
  `login` varchar(255) DEFAULT NULL,
  `postalcode` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `office_appartment_number` varchar(255) DEFAULT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useraddress`
--

LOCK TABLES `useraddress` WRITE;
/*!40000 ALTER TABLE `useraddress` DISABLE KEYS */;
INSERT INTO `useraddress` VALUES ('Sowjanya',203,'IN','Haarlem','Doctor Schaepmanstraat2032GE','131','125',1),('Nanu',52007,'IN','asdfgh',NULL,'asdfghj','dfghj',2),('Nanu',52007,'IN','asdfgh',NULL,'asdfghj','dfghj',3),('test1',2032,'Netherlands','Haarlem','hgjhbvj','89','134',4),('fjasdflsn',2032,'NL','Haarlem','12121','121','1',5),('12341241',2032,'NL','Haarlem','12121','121','1',6),('asdfghjkl',2032,'NL','Haarlem','12121','121','1',7),('Sowjanya1234',123,'NL','dfa','df','1','',8),('Nanu',52007,'IN','asdfgh',NULL,'asdfghj','dfghj',9),('Nanu',2032,'Netherlands','Haarlem',NULL,'131','125',10),('Souz',2032,'NL','Haarlem','hgjhbvj','1','1',14),('Sowjanya',2032,'Netherlands','Haarlem',NULL,'111','',12),('Sowjanya',121,'NL','nlnlkn',NULL,'12','1',13),('abcd',123,'Ad','cd','ec','fh','123',15),('asdfghjkl',1232123,'IN','afd','fa','v','v',16),('fasdfasdf',123123123,'JK','qsdf','1fas','vs','a',17),('ffff',13,'HJ','asdfa','adf','adfa','vad',18),('test',1,'KL','ergq','gfga','234567','1234567',19),('kittu',12,'SL','djashk','asdfa','22','22',20),('Apricot',2032,'LL','Haarlem','S C  dd','1','1',21);
/*!40000 ALTER TABLE `useraddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` enum('male','female','not available') DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES ('Sowjanya','ssssssss','Sow','Putrevu','putrevusowjanya@gmail.com','2018-06-10 09:15:11','male'),('Souz','sowjanya','Sowji','Putrevu','dfa@mail.com','2018-06-11 09:51:31','female'),('abcd','123456','Ba','Sa','hh@gg.c','2018-06-11 21:02:47','female'),('asdfghjkl','fgasdada','Gddd','Fdd','rr@rr.com','2018-06-11 21:06:31','male'),('fasdfasdf','gadgafgafg','Fff','Gff','fas@fd.c','2018-06-11 21:07:19',NULL),('ffff','33333dddd','Ba','Va','ga@ru.in','2018-06-11 21:08:23','male'),('test','asdfghjk.','Addd','Bcccc','fasdfadfa@fgafg.com','2018-06-12 08:44:23','not available'),('kittu','khf;alskdhfa;s','Kichku','Nsmms','afas@gmaui.com','2018-06-12 12:45:09','female'),('Apricot','faskdjhfakj','Sowjanya Putrevu','Putrevu','ASDFGHJK@GMAIL.COM','2018-06-12 12:46:50','female');
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-12 17:05:58
