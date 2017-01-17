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
-- Table structure for table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversation` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` varchar(32) DEFAULT NULL,
  `user_two` varchar(32) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`),
  KEY `user_one` (`user_one`),
  KEY `user_two` (`user_two`),
  CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`user_one`) REFERENCES `profiles` (`username`),
  CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`user_two`) REFERENCES `profiles` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation`
--

LOCK TABLES `conversation` WRITE;
/*!40000 ALTER TABLE `conversation` DISABLE KEYS */;
INSERT INTO `conversation` VALUES (1,'solan1803','adrian95','2016-06-09 15:59:38'),(2,'jin55','solan1803','2016-06-09 09:41:26'),(3,'solan1803','aymousse','2016-06-08 09:43:39');
/*!40000 ALTER TABLE `conversation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversation_reply`
--

DROP TABLE IF EXISTS `conversation_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversation_reply` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `reply` text,
  `user_id_fk` varchar(32) NOT NULL,
  `time` time DEFAULT NULL,
  `c_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `user_id_fk` (`user_id_fk`),
  KEY `c_id_fk` (`c_id_fk`),
  CONSTRAINT `conversation_reply_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `profiles` (`username`),
  CONSTRAINT `conversation_reply_ibfk_2` FOREIGN KEY (`c_id_fk`) REFERENCES `conversation` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversation_reply`
--

LOCK TABLES `conversation_reply` WRITE;
/*!40000 ALTER TABLE `conversation_reply` DISABLE KEYS */;
INSERT INTO `conversation_reply` VALUES (1,'hi','solan1803','19:19:16',1),(2,'yo','adrian95','19:30:46',1),(3,'fuck you','solan1803','19:31:05',1),(4,'test','solan1803','21:15:40',1),(5,'err\n','solan1803','22:37:26',1),(6,'jkjkjkj\n','solan1803','22:40:15',1),(7,'donfueck this\n','solan1803','22:53:00',1),(8,'errrasda\n','solan1803','22:55:26',1),(9,'nine errors on three lines of code\n','solan1803','22:56:33',1),(10,'blah blah\n','solan1803','22:58:16',1),(11,'suits starting in one month\n','solan1803','22:59:36',1),(12,'ma homies\n','solan1803','23:05:01',1),(13,'lol','solan1803','00:18:12',1),(14,'im so done ','solan1803','00:18:21',1),(15,'hello','solan1803','00:19:43',1),(16,'i like','solan1803','00:22:45',1),(17,'99/99','solan1803','11:26:00',1),(18,'hi i am jin','jin55','11:37:08',2),(19,'omg','solan1803','11:45:54',2),(20,'haha we did it','solan1803','16:50:18',1),(21,'fuck this guy','solan1803','16:54:15',2),(22,'jin watches game of thrones','solan1803','17:01:11',2),(23,'i watch game of thrones too, the north remembers, lord commander of the nights watch, winter is comi','solan1803','17:02:26',1),(24,'i like buts','solan1803','17:26:16',2),(25,'what you doin','solan1803','17:54:13',1),(26,'bye bye jin','solan1803','17:57:08',2),(27,'oh boy','solan1803','17:57:44',1),(28,'i need a fag','solan1803','17:57:50',1),(29,'gonna ask arjun','solan1803','17:57:53',1),(30,'you done merging','solan1803','18:07:40',2),(31,'yo','solan1803','21:50:04',3),(32,'fuck','solan1803','21:50:12',2),(33,'hello','solan1803','21:50:24',3),(34,'&uuml;','solan1803','10:04:45',3),(35,'&amp;Agrave;','solan1803','10:24:58',2),(36,'&Agrave;','solan1803','10:26:01',1),(37,'&Agrave;','solan1803','10:29:34',3),(38,'&eacute;','solan1803','10:43:39',3),(39,'fuck this','solan1803','11:25:33',2),(40,'so done','solan1803','11:25:45',1),(41,'&ocirc;','solan1803','11:28:42',1),(42,'&ocirc;lajksh;lksjdfahl','solan1803','11:29:00',1),(43,'&agrave;&agrave;&agrave;&agrave;&agrave;&agrave;','solan1803','12:08:09',2),(44,'hi','solan1803','12:08:34',2),(45,'&szlig;','solan1803','12:38:09',1),(46,'hola','solan1803','22:01:39',1),(47,'guten tag','solan1803','22:02:45',1),(48,'bonjour','solan1803','22:07:08',1),(49,'hola','solan1803','22:07:59',1),(50,'peak','solan1803','22:11:29',1),(51,'oh shit','solan1803','22:13:33',1),(52,'come on','solan1803','22:15:05',1),(53,'my god','solan1803','22:17:21',1),(54,'holioughiug','solan1803','22:33:56',1),(55,'','solan1803','22:33:56',1),(56,'\'','solan1803','22:36:55',1),(57,'','solan1803','22:44:07',1),(58,'','solan1803','22:44:29',1),(59,'','solan1803','22:46:03',1),(60,'\'','solan1803','22:51:20',1),(61,'je m\'appelle adrian','solan1803','22:51:39',1),(62,'\"hi\"','solan1803','23:02:33',1),(63,'my friend told me to \"fuck off\"','solan1803','23:06:35',1),(64,'the box isnt going to be big enoughashf;ahefakljefh ldhfalskjhflksjfhlkasj','solan1803','23:12:30',1),(65,'oh hellooo','solan1803','23:12:46',2),(66,'aisdhfaifh','solan1803','23:14:03',1),(67,'envoyer un message','solan1803','10:40:37',2),(68,'ich heiße Jin.','solan1803','10:41:26',2),(69,'hello','solan1803','16:26:26',3),(70,'test','solan1803','16:45:20',1),(71,'heise','solan1803','16:51:34',2),(72,'heiße','solan1803','16:57:14',1),(73,'æææææææ','solan1803','16:59:38',1);
/*!40000 ALTER TABLE `conversation_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `username` varchar(32) NOT NULL,
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
  `profile_pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES ('adrian95','Master95','Adrian','Nicol','Male','adrian@gmail.com',1995,NULL,NULL,NULL,'2016-06-04 13:28:10','Hi I am studying Computing at Imperial College London. I want to improve my German. I can teach you French if you are interested! Please contact me if you want to become language partners!',NULL,NULL,NULL,NULL,'English','French',NULL,NULL,'German','Korean',NULL,NULL,'3','4',NULL,NULL,'adrian.jpg'),('aymousse',NULL,'ayman','moussa',NULL,NULL,2003,NULL,NULL,NULL,'2016-06-07 20:49:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'default.png'),('jin55',NULL,'jin','ha',NULL,NULL,NULL,NULL,NULL,NULL,'2016-06-07 12:01:12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'jin.jpg'),('solan1803','6aafb0d96700dc0f7d7fefaf48da090c85c76637','Solan','Mani','Male','solan1803@gmail.com',1996,'March','18','2016-05-29','2016-06-08 22:20:25','I am interested in many languages so I thought I would try to learn and improve as many as I can!',NULL,NULL,'2016-06-08',NULL,'English','German','','','Hindi','French','','','4','3','','','solan.jpg');
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

-- Dump completed on 2016-06-09 17:40:56
