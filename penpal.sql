-- MySQL dump 10.13  Distrib 5.7.12, for osx10.11 (x86_64)
--
-- Host: localhost    Database: penpal_database
-- ------------------------------------------------------
-- Server version	5.7.12

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
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `email_address` varchar(60) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `month` enum('January','February','March','April','May','June','July','August','September','October','November','December') DEFAULT NULL,
  `day` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31') DEFAULT NULL,
  `signup_date` date DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `introduction` varchar(1024) DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `last_profile_change` date DEFAULT NULL,
  `online` enum('yes','no') DEFAULT NULL,
  `native_language_one` varchar(30) DEFAULT NULL,
  `native_language_two` varchar(30) DEFAULT NULL,
  `native_language_three` varchar(30) DEFAULT NULL,
  `native_language_four` varchar(30) DEFAULT NULL,
  `learning_language_one` varchar(30) DEFAULT NULL,
  `learning_language_two` varchar(30) DEFAULT NULL,
  `learning_language_three` varchar(30) DEFAULT NULL,
  `learning_language_four` varchar(30) DEFAULT NULL,
  `learning_language_level_one` enum('','1','2','3','4','5') DEFAULT NULL,
  `learning_language_level_two` enum('','1','2','3','4','5') DEFAULT NULL,
  `learning_language_level_three` enum('','1','2','3','4','5') DEFAULT NULL,
  `learning_language_level_four` enum('','1','2','3','4','5') DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES ('solan1803','6aafb0d96700dc0f7d7fefaf48da090c85c76637','Solan','Mani','Male','solan1803@gmail.com',1996,'March','18','2016-05-29','2016-06-03 14:29:48','HELLO MY Nilyfliflutfuydutd',NULL,NULL,'2016-06-03',NULL,'Akan','Afrikaans','Swahili','Belarusian','Hindi','French','Assyrian','Japanese','4','3','2','5','adrian.jpg'),('adrian95','Master95','adrian','nicol','Male','adrian@gmail.com',2000,NULL,NULL,NULL,'2016-06-02 16:22:10',NULL,NULL,NULL,NULL,NULL,'English','Swahili',NULL,NULL,'German','Korean',NULL,NULL,'3','4',NULL,NULL,'sketch-page-001.jpg');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solan1803_learning_languages`
--

DROP TABLE IF EXISTS `solan1803_learning_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solan1803_learning_languages` (
  `language` varchar(30) DEFAULT NULL,
  `level` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solan1803_learning_languages`
--

LOCK TABLES `solan1803_learning_languages` WRITE;
/*!40000 ALTER TABLE `solan1803_learning_languages` DISABLE KEYS */;
INSERT INTO `solan1803_learning_languages` VALUES ('English','5');
/*!40000 ALTER TABLE `solan1803_learning_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solan1803_native_languages`
--

DROP TABLE IF EXISTS `solan1803_native_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solan1803_native_languages` (
  `language` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solan1803_native_languages`
--

LOCK TABLES `solan1803_native_languages` WRITE;
/*!40000 ALTER TABLE `solan1803_native_languages` DISABLE KEYS */;
INSERT INTO `solan1803_native_languages` VALUES ('English'),('French');
/*!40000 ALTER TABLE `solan1803_native_languages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-03 17:29:02
