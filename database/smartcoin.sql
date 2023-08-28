-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: smartcentsapp
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `account-id` int unsigned NOT NULL AUTO_INCREMENT,
  `user-id` int unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `balance` double NOT NULL,
  `currency` varchar(7) NOT NULL,
  `isactive` tinyint NOT NULL,
  `timedelete` timestamp NULL DEFAULT NULL,
  `userdelete` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`account-id`),
  KEY `user-id` (`user-id`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user-id`) REFERENCES `users` (`user-id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,1,'main',2715,'$',1,NULL,NULL),(2,1,'savings',650,'$',0,NULL,NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category-id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `color` varchar(7) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `timedelete` timestamp NULL DEFAULT NULL,
  `userdelete` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category-id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'paycheck','income','badge.svg','#2a5b15','',NULL,NULL),(2,'food','expenses','lunch_dining.svg','#747225','',NULL,NULL),(3,'gym','expenses','fitness_center.svg','#447731','',NULL,NULL),(4,'clothes','expenses','shopping_bag.svg','#842e2e','',NULL,NULL),(5,'travel','expenses','airplane_ticket.svg','#433772','',NULL,NULL),(6,'gifts','income','approval_delegation.svg','#e83617','',NULL,NULL),(7,'vacation','expenses','beach_access.svg','#abcb3a','',NULL,NULL),(8,'bank','income','casino.svg','#e1adad','',NULL,NULL),(9,'intrests','income','account_balance.svg','#96fa00','',NULL,NULL),(10,'parttime','income','engineering.svg','#38239f','',NULL,NULL),(11,'insetments','income','payments.svg','#2b4e18','',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `transaction-id` int unsigned NOT NULL AUTO_INCREMENT,
  `category-id` int unsigned NOT NULL,
  `account-id` int unsigned NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `timedelete` timestamp NULL DEFAULT NULL,
  `userdelete` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`transaction-id`),
  KEY `category-id` (`category-id`),
  KEY `account-id` (`account-id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`category-id`) REFERENCES `categories` (`category-id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`account-id`) REFERENCES `accounts` (`account-id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,8,1,10,'2023-08-07','testing',NULL,NULL),(2,2,1,7,'2023-07-28','',NULL,NULL),(3,1,1,250,'2023-08-02','',NULL,NULL),(4,3,1,27,'2023-08-08','',NULL,NULL),(5,7,1,61,'2023-08-07','',NULL,NULL),(6,1,1,60,'2023-08-08','',NULL,NULL),(7,2,1,6,'2023-08-08','',NULL,NULL),(8,4,1,26,'2023-08-08','',NULL,NULL),(9,6,1,6,'2023-08-08','',NULL,NULL),(10,1,1,200,'2023-07-13','',NULL,NULL),(11,9,1,60,'2023-07-07','',NULL,NULL),(12,6,1,40,'2023-07-17','',NULL,NULL),(13,5,1,65,'2023-07-13','',NULL,NULL),(14,3,1,26,'2023-07-24','',NULL,NULL),(15,2,1,6,'2023-08-09','',NULL,NULL),(16,8,1,500,'2023-07-09','',NULL,NULL),(17,10,1,400,'2023-08-09','',NULL,NULL),(18,11,1,1000,'2023-08-10','',NULL,NULL),(19,10,1,100,'2023-08-13','',NULL,NULL),(20,10,1,13,'2023-08-09','',NULL,NULL),(21,11,1,100,'2023-08-17','',NULL,NULL),(22,10,1,200,'2023-08-26','',NULL,NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user-id` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(45) NOT NULL,
  `timedeletel` timestamp NULL DEFAULT NULL,
  `userdelete` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user-id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kevin','kevin','kevin','$2y$10$zpKJdPApRMOqVh1UEIAwaulp.nGidIXm0PgnexB3SjMguG/q7TFq2','kevin@gmail.com',NULL,NULL);
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

-- Dump completed on 2023-08-28 19:01:31
