-- MySQL dump 10.13  Distrib 5.7.4-m14, for Win64 (x86_64)
--
-- Host: localhost    Database: ly
-- ------------------------------------------------------
-- Server version	5.7.4-m14

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
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `ID` mediumint(8) unsigned NOT NULL,
  `XZ` char(3) NOT NULL,
  `wantgo` varchar(30) NOT NULL,
  `going` varchar(30) NOT NULL,
  `tour` varchar(20) NOT NULL,
  `personal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'1','1','1','1','1'),(2,'天蝎座','爱琴海','毛里求斯','独自去旅行','大家好，我是本网站的创作者之一，很感谢大家对于网站的喜爱'),(0,'0','0','0','0','0'),(3,'3','3','3','3','3'),(5,'暂无','暂无','暂无','暂无','暂无'),(6,'暂无','暂无','暂无','暂无','暂无'),(7,'巨蟹座','暂无','暂无','暂无','暂无');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi`
--

DROP TABLE IF EXISTS `pi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi` (
  `ID` int(11) DEFAULT NULL,
  `love` varchar(30) DEFAULT NULL,
  `img` varchar(30) DEFAULT NULL,
  `loveplace` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi`
--

LOCK TABLES `pi` WRITE;
/*!40000 ALTER TABLE `pi` DISABLE KEYS */;
INSERT INTO `pi` VALUES (1,'1','1','1'),(2,'./txt/2-love.txt','./image/solojoe4.png','./txt/2-loveplace.txt'),(3,'3','3','3'),(5,'./txt/5-love.txt','./image/Jack1.png','./txt/5-loveplace.txt'),(6,'./txt/6-love.txt','./images/h6.png','./txt/6-loveplace.txt'),(7,'./txt/7-love.txt','./images/h6.png','./txt/7-loveplace.txt');
/*!40000 ALTER TABLE `pi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `name` varchar(20) NOT NULL,
  `img` varchar(20) NOT NULL,
  `txt` varchar(20) NOT NULL,
  `love` int(10) unsigned NOT NULL,
  `lx` varchar(200) NOT NULL,
  `PJ` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES ('卡尼岛','./images/kani.png','./txt/kani.txt',2,'./txt/kanilx.txt','./txt/kaniPJ.txt'),('袁家界','./images/yjj.png','./txt/yjj.txt',0,'./txt/yjjlx.txt','./txt/yjjPJ.txt'),('新西兰','./images/NZ.png','./txt/NZ.txt',0,'./txt/NZlx.txt','./txt/NZPJ.txt');
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placelove`
--

DROP TABLE IF EXISTS `placelove`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placelove` (
  `name` varchar(20) DEFAULT NULL,
  `loveperson` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placelove`
--

LOCK TABLES `placelove` WRITE;
/*!40000 ALTER TABLE `placelove` DISABLE KEYS */;
INSERT INTO `placelove` VALUES ('卡尼岛','./txt/kanilove.txt'),('袁家界','./txt/yjjlove.txt'),('新西兰','./txt/NZlove.txt');
/*!40000 ALTER TABLE `placelove` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` char(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` varchar(2) NOT NULL,
  `school` varchar(12) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','1','1','1','1','1','1'),(2,'solojoe','19941017','924389934@qq.com','20','哈尔滨工业大学','1234567','男'),(3,'shkdjkkjk','123456789','8276373888@163.com','20','HIT','6887989','男'),(5,'Jack','19941017','44834289@qq.con','20','哈尔滨工业大学','1234567','男'),(6,'听风的人','19941017','26736899@qq.com','19','哈尔滨工业大学','6887989','女'),(7,'他他他','7654321','44834289@qq.con','20','哈尔滨工业大学','84374840','女');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-24 16:23:17
