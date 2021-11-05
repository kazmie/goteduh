-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: goteduh
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Administrator','admin@myteduh.com','$2y$10$yILNRCc7/KkdDkEHlZcKo.8k/6OtJj4mZLUlMNEgpAGlN2UxBTG82','2019-07-29 00:46:30','2021-03-08 05:07:29');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficiaries`
--

DROP TABLE IF EXISTS `beneficiaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficiaries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_enrollment_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nric` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficiaries`
--

LOCK TABLES `beneficiaries` WRITE;
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
INSERT INTO `beneficiaries` VALUES (40,40,'Siti suriary zakaria','','01121937500','2021-03-18 08:16:16','2021-03-18 08:16:16'),(41,41,'siti suriaty','','01121937500','2021-03-18 08:19:48','2021-03-18 08:19:48'),(42,42,'siti suriaty','','01121937500','2021-03-18 08:22:04','2021-03-18 08:22:04'),(43,43,'khairul azmi','','01121937500','2021-03-18 08:26:49','2021-03-18 08:26:49'),(44,44,'Ziyad','','01121937500','2021-03-19 07:25:54','2021-03-19 07:25:54'),(45,45,'kulailah hassan','','016123456789','2021-03-31 06:18:00','2021-03-31 06:18:00'),(46,46,'nurul huda bt rosli','','0193836803','2021-04-05 04:37:50','2021-04-05 04:37:50'),(47,47,'siti suriaty zakaria','','0122747475','2021-09-05 21:13:24','2021-09-05 21:13:24'),(48,48,'siti suriaty zakaria','','0122747475','2021-09-05 21:48:18','2021-09-05 21:48:18'),(49,49,'siti suriaty zakaria','','0122747475','2021-09-05 21:48:44','2021-09-05 21:48:44'),(50,50,'siti suriaty zakaria','','0122747475','2021-09-05 21:49:44','2021-09-05 21:49:44'),(51,51,'siti suriaty zakaria','','0122747475','2021-09-05 23:39:57','2021-09-05 23:39:57'),(52,52,'siti suriaty zakaria','','0122747475','2021-09-05 23:40:17','2021-09-05 23:40:17'),(53,53,'Farah RoslI','','0103811383','2021-09-13 06:21:50','2021-09-13 06:21:50'),(54,54,'nurul','','0136333135','2021-09-15 02:43:00','2021-09-15 02:43:00'),(55,55,'nor azilah binti mohd aziz','','0193836803','2021-09-15 03:00:12','2021-09-15 03:00:12'),(56,56,'siti suriaty zakaria','','0122747475','2021-09-21 04:38:23','2021-09-21 04:38:23');
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_plans`
--

DROP TABLE IF EXISTS `category_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#1b7ced',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_plans`
--

LOCK TABLES `category_plans` WRITE;
/*!40000 ALTER TABLE `category_plans` DISABLE KEYS */;
INSERT INTO `category_plans` VALUES (1,'Gold',NULL,'2021-09-20 11:11:36','#D9ED1B'),(2,'Silver',NULL,NULL,'#1b7ced');
/*!40000 ALTER TABLE `category_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_document_types`
--

DROP TABLE IF EXISTS `claim_document_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim_document_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `claim_type_id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_document_types`
--

LOCK TABLES `claim_document_types` WRITE;
/*!40000 ALTER TABLE `claim_document_types` DISABLE KEYS */;
INSERT INTO `claim_document_types` VALUES (1,1,'Proof of travel (e.g. Original boarding pass or Air tickets) ',NULL,NULL),(2,1,'Medical report from the attending doctor abroad ',NULL,NULL),(3,1,'Death Certificate',NULL,NULL),(4,1,'Post Mortem Report ',NULL,NULL),(5,1,'Police Report ',NULL,NULL),(6,2,'Medical report from the attending doctor abroad ',NULL,NULL),(7,2,'All original medical invoices and receipts',NULL,NULL),(8,2,'Admission/Discharge Report',NULL,NULL),(9,2,'Original receipts for additional expenses claimed for additional travel and accommodation',NULL,NULL),(10,2,'Regular doctor\'s report on medical story',NULL,NULL),(11,3,'Delayed Baggage report from the Airline',NULL,NULL),(12,3,'A written confirmation/delivery note from the Airline on the date and time of baggage delivery',NULL,NULL),(13,4,'A written confirmation or Report from Airline on duration of delay and reason',NULL,NULL),(14,4,'Original receipts for payment of the tour, if claiming',NULL,NULL),(15,5,'Medical Report',NULL,NULL),(16,5,'Death Certificate & Proof of relationship (if applicable)',NULL,NULL),(17,5,'Original receipts for payment of the tour or prepaid cost of transport cost and accommodation',NULL,NULL),(18,5,'A written confirmation from the attending doctor abroad that it is necessary to return home - If due to hijacking or natural disaster, writtern confirmation from tour operator concerned confirming the incident',NULL,NULL),(19,5,'Boarding pass to confirm the actual date of arrival back to Malaysia',NULL,NULL),(20,6,'A written confirmation from Airline confirming the overbooked or misconnected flight details and when the next alternative transportation is made available',NULL,NULL),(21,7,'Medical Report',NULL,NULL),(22,7,'Death Certificate & Proof of relationship (if applicable)',NULL,NULL),(23,7,'Original receipts for payment of the tour or prepaid cost of transport cost and accommodation',NULL,NULL),(24,7,'Tour operator\'s booking and cancellation/refund invoices, terms & conditions',NULL,NULL),(25,8,'Property Irregularity Report from Airline or damaged report issued by airlines, carrier, hotel manager, stated detail of loss or damage and their expenses - if any',NULL,NULL),(26,8,'Documentation of carrier\'s settlement/rejection of claim for loss of property',NULL,NULL),(27,8,'Police Report lodged at place of incident within 24 hours and detailing the circumstances and list of items stolen.',NULL,NULL),(28,8,'Purchase receipts for all items claimed. If not available, provide description of items and the date, place and price to purchase.',NULL,NULL),(29,8,'Photographs to show extent of damage and original repair invoices. ',NULL,NULL);
/*!40000 ALTER TABLE `claim_document_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_documents`
--

DROP TABLE IF EXISTS `claim_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `claim_document_type_id` int NOT NULL,
  `claim_id` int NOT NULL,
  `original_filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_documents`
--

LOCK TABLES `claim_documents` WRITE;
/*!40000 ALTER TABLE `claim_documents` DISABLE KEYS */;
INSERT INTO `claim_documents` VALUES (41,13,2,NULL,NULL,'2021-09-15 03:03:48','2021-09-15 03:03:48'),(42,14,2,NULL,NULL,'2021-09-15 03:03:48','2021-09-15 03:03:48');
/*!40000 ALTER TABLE `claim_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_types`
--

DROP TABLE IF EXISTS `claim_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_type_id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_types`
--

LOCK TABLES `claim_types` WRITE;
/*!40000 ALTER TABLE `claim_types` DISABLE KEYS */;
INSERT INTO `claim_types` VALUES (1,1,'Personal Accident',NULL,NULL),(2,1,'Medical, Dental, and Other Expenses',NULL,NULL),(3,1,'Baggage Delay ',NULL,NULL),(4,1,'Travel Delay',NULL,NULL),(5,1,'Trip Curtailment',NULL,NULL),(6,1,'Flight misconnection or Travel Overbooked',NULL,NULL),(7,1,'Loss/ Damage to Baggage, Personal Effects & Money',NULL,NULL),(8,1,'Early Return due to emergency purposes','2021-03-31 05:47:26','2021-03-31 05:47:26');
/*!40000 ALTER TABLE `claim_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim_user`
--

DROP TABLE IF EXISTS `claim_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_user`
--

LOCK TABLES `claim_user` WRITE;
/*!40000 ALTER TABLE `claim_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `claim_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claims`
--

DROP TABLE IF EXISTS `claims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claims` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `insurance_enrollment_id` int NOT NULL,
  `reference_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `claim_type_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `accident_date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_account_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claims`
--

LOCK TABLES `claims` WRITE;
/*!40000 ALTER TABLE `claims` DISABLE KEYS */;
INSERT INTO `claims` VALUES (2,5,55,'MCL000002',4,2,'2021-09-23',2000,'stranded 20 hours','3992398000','rosli musa','public bank',NULL,'2021-09-15 03:03:48','2021-09-15 03:04:26');
/*!40000 ALTER TABLE `claims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url_thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Syarikat Takaful Malaysia Keluarga Berhad ​','26th Floor, Annexe Block','Menara Takaful Malaysia','No. 4, Jalan Sultan Sulaiman','50000',NULL,'JOHOR',NULL,'1-300 88 252 385','+603 2274 0237',NULL,NULL,'fileName1632132811.png',NULL,'2019-07-29 06:16:56','2021-09-20 10:13:31'),(2,'AIG Malaysia Insurance Berhad','Menara Worldwide','198 Jalan Bukit Bintang',NULL,'55100',NULL,'JOHOR',NULL,'1800 88 8811','603-26854896',NULL,NULL,'fileName1631674716.png',NULL,'2019-07-29 19:12:58','2021-09-15 02:58:36'),(3,'Company B','Ground Floor','Tower B,Dataran Maybank','No. 1 Jalan Maarof','59000',NULL,'JOHOR',NULL,'+603-2161-0270','03 2297 3800',NULL,NULL,'fileName1631674681.png',NULL,'2019-07-29 19:21:32','2021-09-15 02:58:01');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Afghanistan','AF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Albania','AL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Algeria','DZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'American Samoa','AS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Andorra','AD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Angola','AO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Anguilla','AI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Antarctica','AQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Antigua and/or Barbuda','AG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Arctic Ocean','AO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Argentina','AR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'Armenia','AM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'Aruba','AW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'Ashmore and Cartier Islands','AU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'Atlantic Ocean','AO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'Australia','AU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,'Austria','AT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,'Azerbaijan','AZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,'Bahamas','BS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,'Bahrain','BH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,'Baker Island','BI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,'Bangladesh','BD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,'Barbados','BB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,'Bassas da India','BDI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,'Belarus','BY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,'Belgium','BE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,'Belize','BZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,'Benin','BJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,'Bermuda','BM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,'Bhutan','BT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,'Bolivia','BO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,'Bosnia and Herzegovina','BA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,'Botswana','BW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,'Bouvet Island','BV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,'Brazil','BR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,'British lndian Ocean Territory','IO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,'Brunei Darussalam','BN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,'Bulgaria','BG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,'Burkina Faso','BF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,'Burundi','BI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,'Cambodia','KH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,'Cameroon','CM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,'Canada','CA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,'Cape Verde','CV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,'Cayman Islands','KY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,'Central African Republic','CF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,'Chad','TD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,'Chile','CL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,'China','CN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,'Christmas Island','CX','0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,'Clipperton Island','CP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,'Cocos (Keeling) Islands','CC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,'Colombia','CO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,'Comoros','KM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,'Congo','CG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,'Cook Islands','CK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,'Coral Sea Islands','AQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,'Costa Rica','CR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,'Cote D Ivoire','CI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,'Croatia (Hrvatska)','HR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,'Cuba','CU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,'Cyprus','CY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,'Czech Republic','CZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,'Democratic Republic of Congo','CD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,'Denmark','DK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,'Djibouti','DJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,'Dominica','DM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,'Dominican Republic','DO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,'East Timor','TP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,'Eastern Europe (Eropah Timur)','CEE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,'Ecudaor','EC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,'Egypt','EG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,'El Salvador','SV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,'Equatorial Guinea','GQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,'Eritrea','ER','0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,'Estonia','EE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,'Ethiopia','ET','0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,'Europa Island','EI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,'Europe','EUR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,'Falkland Islands (Malvinas)','FK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,'Faroe Islands','FO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,'Fiji','FJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,'Finland','FI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,'France','FR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,'France, Metropolitan','FX','0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,'French Guiana','GF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,'French Polynesia','PF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,'French Southern Territories','TF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,'Gabon','GA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,'Gambia','GM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,'Gaza Strip','GS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,'Georgia','GE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,'Germany','DE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,'Ghana','GH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,'Gibraltar','GI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,'Glorioso Islands','GI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,'Greece','GR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,'Greenland','GL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,'Grenada','GD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(100,'Guadeloupe','GP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(101,'Guam','GU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,'Guatemala','GT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(103,'Guernsey','GG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(104,'Guinea','GN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(105,'Guinea-Bissau','GW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(106,'Guyana','GY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(107,'Haiti','HT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(108,'Heard and Mc Donald Islands','HM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(109,'Honduras','HN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(110,'Hong Kong','HK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(111,'Howland Island','HI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(112,'Hungary','HU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(113,'Iceland','IS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(114,'India','IN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(115,'Indian Ocean','IO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(116,'Indonesia','ID','0000-00-00 00:00:00','0000-00-00 00:00:00'),(117,'Iran (Islamic Republic of)','IR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(118,'Iraq','IQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(119,'Ireland','IE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(120,'Isle of Man','IOM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(121,'Israel','IL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(122,'Italy','IT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(123,'Ivory Coast','CI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(124,'Jamaica','JM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(125,'Jan Mayen','SJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(126,'Japan','JP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(127,'Jarvis Island','JI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(128,'Jersey','JE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(129,'Johnston Atoll','JA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(130,'Jordan','JO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(131,'Juan de Nova Island','JU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(132,'Kazakhstan','KZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(133,'Kenya','KE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(134,'Kerguelen Archipelago','KA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(135,'Kingman Reef','KR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(136,'Kiribati','KI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(137,'Korea, Democratic People\'s Republic of','KP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(138,'Kuwait','KW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(139,'Kyrgyzstan','KG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(140,'Laos','LA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(141,'Latvia','LV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(142,'Lebanon','LB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(143,'Lesotho','LS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(144,'Liberia','LR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(145,'Libya','LBY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(146,'Libyan Arab Jamahiriya','LY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(147,'Liechtenstein','LI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(148,'Lithuania','LT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(149,'Luxembourg','LU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(150,'Macau','MO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(151,'Macedonia','MK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(152,'Madagascar','MG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(153,'Malawi','MW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(154,'Malaysia','MY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(155,'Maldives','MV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(156,'Mali','ML','0000-00-00 00:00:00','0000-00-00 00:00:00'),(157,'Malta','MT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(158,'Marshall Islands','MH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(159,'Martinique','MQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(160,'Mauritania','MR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(161,'Mauritius','MU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(162,'Mayotte','TY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(163,'Mexico','MX','0000-00-00 00:00:00','0000-00-00 00:00:00'),(164,'Micronesia, Federated States of','FM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(165,'Midway Islands','MQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(166,'Moldova, Republic of','MD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(167,'Monaco','MC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(168,'Mongolia','MN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(169,'Montenegro','ME','0000-00-00 00:00:00','0000-00-00 00:00:00'),(170,'Montserrat','MS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(171,'Morocco','MA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(172,'Mozambique','MZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(173,'Myanmar','MM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(174,'Namibia','NA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(175,'Nauru','NR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(176,'Navassa Island','NI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(177,'Nepal','NP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(178,'Netherlands','NL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(179,'Netherlands Antilles','AN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(180,'New Caledonia','NC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(181,'New Zealand','NZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(182,'Nicaragua','NI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(183,'Niger','NE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(184,'Nigeria','NG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(185,'Niue','NU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(186,'Norfork Island','NF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(187,'Northern Mariana Islands','MP','0000-00-00 00:00:00','0000-00-00 00:00:00'),(188,'Norway','NO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(189,'Oman','OM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(190,'Pacific Ocean','PO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(191,'Pakistan','PK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(192,'Palau','PW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(193,'Palestine','PSE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(194,'Palmyra Atoll','PA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(195,'Panama','PA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(196,'Papua New Guinea','PG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(197,'Paracel Islands','PI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(198,'Paraguay','PY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(199,'Peru','PE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(200,'Philippines','PH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(201,'Pitcairn Islands','PN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(202,'Poland','PL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(203,'Portugal','PT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(204,'Puerto Rico','PR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(205,'Qatar','QA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(206,'Republic of South Sudan','SS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(207,'Reunion','RE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(208,'Romania','RO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(209,'Russian Federation','RU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(210,'Rwanda','RW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(211,'S Georgia and the S Sandwich Is','GS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(212,'Saint Helena','SH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(213,'Saint Kitts and Nevis','KN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(214,'Saint Lucia','LC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(215,'Saint Pierre and Miquelon','PM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(216,'Saint Vincent and the Grenadines','VC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(217,'Samoa','WS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(218,'San Marino','SM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(219,'Sao Tome and Principe','ST','0000-00-00 00:00:00','0000-00-00 00:00:00'),(220,'Saudi Arabia','SA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(221,'Senegal','SN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(222,'Serbia','RS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(223,'Seychelles','SC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(224,'Sierra Leone','SL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(225,'Sikkim','SK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(226,'Singapore','SG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(227,'Slovakia','SK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(228,'Slovenia','SI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(229,'Solomon Islands','SB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(230,'Somalia','SO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(231,'South Africa','ZA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(232,'South Georgia South Sandwich Islands','GS','0000-00-00 00:00:00','0000-00-00 00:00:00'),(233,'South Korea','KR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(234,'Spain','ES','0000-00-00 00:00:00','0000-00-00 00:00:00'),(235,'Spratly Islands','PG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(236,'Sri Lanka','LK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(237,'St. Helena','SH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(238,'St. Pierre and Miquelon','PM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(239,'Sudan','SD','0000-00-00 00:00:00','0000-00-00 00:00:00'),(240,'Suriname','SR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(241,'Svalbard','SJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(242,'Svalbarn and Jan Mayen Islands','SJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(243,'Swaziland','SZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(244,'Sweden','SE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(245,'Switzerland','CH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(246,'Syrian Arab Republic','SY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(247,'Taiwan','TW','0000-00-00 00:00:00','0000-00-00 00:00:00'),(248,'Tajikistan','TJ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(249,'Tanzania, United Republic of','TZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(250,'Thailand','TH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(251,'Tibet','TB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(252,'Timor Leste','TL','0000-00-00 00:00:00','0000-00-00 00:00:00'),(253,'Togo','TG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(254,'Tokelau','TK','0000-00-00 00:00:00','0000-00-00 00:00:00'),(255,'Tonga','TO','0000-00-00 00:00:00','0000-00-00 00:00:00'),(256,'Trinidad and Tobago','TT','0000-00-00 00:00:00','0000-00-00 00:00:00'),(257,'Tromelin Island','TI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(258,'Tunisia','TN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(259,'Turkey','TR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(260,'Turkmenistan','TM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(261,'Turks and Caicos Islands','TC','0000-00-00 00:00:00','0000-00-00 00:00:00'),(262,'Tuvalu','TV','0000-00-00 00:00:00','0000-00-00 00:00:00'),(263,'Uganda','UG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(264,'Ukraine','UA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(265,'United Arab Emirates','AE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(266,'United Kingdom','GB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(267,'United States','US','0000-00-00 00:00:00','0000-00-00 00:00:00'),(268,'United States minor outlying islands','UM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(269,'United States of America','USA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(270,'Uruguay','UY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(271,'Uzbekistan','UZ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(272,'Vanuatu','VU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(273,'Vatican City State','VA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(274,'Venezuela','VE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(275,'Vietnam','VN','0000-00-00 00:00:00','0000-00-00 00:00:00'),(276,'Virgin Islands (British)','VG','0000-00-00 00:00:00','0000-00-00 00:00:00'),(277,'Virgin Islands (U.S.)','VI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(278,'Wake Island','UM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(279,'Wallis and Futuna Islands','WF','0000-00-00 00:00:00','0000-00-00 00:00:00'),(280,'West Bank','WB','0000-00-00 00:00:00','0000-00-00 00:00:00'),(281,'Western Sahara','EH','0000-00-00 00:00:00','0000-00-00 00:00:00'),(282,'Yemen','YE','0000-00-00 00:00:00','0000-00-00 00:00:00'),(283,'Yugoslavia','YU','0000-00-00 00:00:00','0000-00-00 00:00:00'),(284,'Zaire','ZR','0000-00-00 00:00:00','0000-00-00 00:00:00'),(285,'Zambia','ZM','0000-00-00 00:00:00','0000-00-00 00:00:00'),(286,'Zimbabwe','ZW','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_packages`
--

DROP TABLE IF EXISTS `country_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_packages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `package_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_packages`
--

LOCK TABLES `country_packages` WRITE;
/*!40000 ALTER TABLE `country_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `country_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_region`
--

DROP TABLE IF EXISTS `country_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country_region` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int NOT NULL,
  `region_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3297 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_region`
--

LOCK TABLES `country_region` WRITE;
/*!40000 ALTER TABLE `country_region` DISABLE KEYS */;
INSERT INTO `country_region` VALUES (2247,1,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2248,2,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2249,3,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2250,4,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2251,5,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2252,6,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2253,7,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2254,8,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2255,9,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2256,10,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2257,11,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2258,12,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2259,13,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2260,14,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2261,15,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2262,16,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2263,17,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2264,18,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2265,19,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2266,20,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2267,21,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2268,22,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2269,23,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2270,24,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2271,25,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2272,26,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2273,27,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2274,28,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2275,29,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2276,30,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2277,31,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2278,32,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2279,33,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2280,34,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2281,35,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2282,36,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2283,37,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2284,38,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2285,39,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2286,40,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2287,41,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2288,42,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2289,43,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2290,44,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2291,45,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2292,46,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2293,47,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2294,48,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2295,49,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2296,50,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2297,51,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2298,52,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2299,53,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2300,54,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2301,55,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2302,56,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2303,57,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2304,58,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2305,59,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2306,60,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2307,61,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2308,62,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2309,63,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2310,64,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2311,65,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2312,66,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2313,67,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2314,68,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2315,69,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2316,70,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2317,71,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2318,72,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2319,73,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2320,74,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2321,75,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2322,76,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2323,77,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2324,78,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2325,79,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2326,80,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2327,81,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2328,82,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2329,83,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2330,84,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2331,85,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2332,86,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2333,87,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2334,88,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2335,89,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2336,90,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2337,91,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2338,92,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2339,93,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2340,94,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2341,95,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2342,96,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2343,97,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2344,98,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2345,99,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2346,100,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2347,101,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2348,102,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2349,103,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2350,104,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2351,105,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2352,106,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2353,107,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2354,108,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2355,109,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2356,110,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2357,111,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2358,112,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2359,113,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2360,114,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2361,115,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2362,116,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2363,117,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2364,118,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2365,119,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2366,120,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2367,121,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2368,122,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2369,123,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2370,124,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2371,125,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2372,126,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2373,127,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2374,128,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2375,129,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2376,130,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2377,131,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2378,132,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2379,133,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2380,134,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2381,135,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2382,136,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2383,137,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2384,138,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2385,139,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2386,140,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2387,141,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2388,142,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2389,143,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2390,144,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2391,145,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2392,146,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2393,147,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2394,148,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2395,149,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2396,150,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2397,151,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2398,152,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2399,153,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2400,154,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2401,155,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2402,156,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2403,157,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2404,158,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2405,159,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2406,160,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2407,161,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2408,162,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2409,163,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2410,164,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2411,165,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2412,166,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2413,167,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2414,168,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2415,169,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2416,170,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2417,171,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2418,172,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2419,173,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2420,174,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2421,175,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2422,176,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2423,177,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2424,178,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2425,179,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2426,180,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2427,181,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2428,182,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2429,183,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2430,184,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2431,185,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2432,186,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2433,187,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2434,188,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2435,189,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2436,190,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2437,191,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2438,192,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2439,193,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2440,194,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2441,195,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2442,196,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2443,197,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2444,198,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2445,199,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2446,200,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2447,201,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2448,202,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2449,203,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2450,204,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2451,205,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2452,206,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2453,207,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2454,208,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2455,209,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2456,210,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2457,211,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2458,212,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2459,213,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2460,214,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2461,215,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2462,216,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2463,217,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2464,218,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2465,219,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2466,220,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2467,221,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2468,222,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2469,223,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2470,224,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2471,225,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2472,226,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2473,227,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2474,228,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2475,229,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2476,230,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2477,231,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2478,232,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2479,233,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2480,234,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2481,235,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2482,236,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2483,237,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2484,238,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2485,239,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2486,240,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2487,241,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2488,242,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2489,243,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2490,244,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2491,245,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2492,246,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2493,247,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2494,248,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2495,249,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2496,250,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2497,251,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2498,252,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2499,253,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2500,254,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2501,255,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2502,256,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2503,257,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2504,258,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2505,259,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2506,260,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2507,261,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2508,262,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2509,263,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2510,264,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2511,265,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2512,266,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2513,267,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2514,268,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2515,269,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2516,270,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2517,271,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2518,272,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2519,273,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2520,274,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2521,275,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2522,276,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2523,277,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2524,278,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2525,279,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2526,280,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2527,281,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2528,282,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2529,283,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2530,284,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2531,285,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2532,286,179,'2021-03-18 08:24:11','2021-03-18 08:24:11'),(2704,154,185,'2021-09-14 08:00:22','2021-09-14 08:00:22'),(2705,22,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2706,30,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2707,37,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2708,41,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2709,49,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2710,110,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2711,114,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2712,116,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2713,126,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2714,140,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2715,150,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2716,155,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2717,173,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2718,191,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2719,200,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2720,225,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2721,226,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2722,233,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2723,236,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2724,247,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2725,250,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2726,252,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2727,275,180,'2021-09-14 08:05:12','2021-09-14 08:05:12'),(2728,1,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2729,2,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2730,3,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2731,4,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2732,5,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2733,6,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2734,7,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2735,8,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2736,9,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2737,10,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2738,11,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2739,12,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2740,13,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2741,14,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2742,15,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2743,16,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2744,17,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2745,18,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2746,19,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2747,20,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2748,21,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2749,22,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2750,23,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2751,24,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2752,25,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2753,26,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2754,27,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2755,28,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2756,29,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2757,30,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2758,31,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2759,32,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2760,33,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2761,34,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2762,35,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2763,36,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2764,37,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2765,38,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2766,39,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2767,40,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2768,41,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2769,42,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2770,44,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2771,45,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2772,46,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2773,47,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2774,48,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2775,49,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2776,50,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2777,51,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2778,52,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2779,53,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2780,54,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2781,55,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2782,56,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2783,57,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2784,58,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2785,59,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2786,60,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2787,61,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2788,62,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2789,63,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2790,64,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2791,65,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2792,66,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2793,67,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2794,68,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2795,69,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2796,70,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2797,71,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2798,72,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2799,73,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2800,74,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2801,75,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2802,76,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2803,77,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2804,78,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2805,79,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2806,80,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2807,81,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2808,82,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2809,83,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2810,84,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2811,85,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2812,86,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2813,87,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2814,88,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2815,89,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2816,90,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2817,91,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2818,92,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2819,93,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2820,94,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2821,95,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2822,96,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2823,97,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2824,98,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2825,99,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2826,100,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2827,101,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2828,102,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2829,103,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2830,104,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2831,105,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2832,106,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2833,107,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2834,108,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2835,109,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2836,110,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2837,111,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2838,112,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2839,113,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2840,114,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2841,115,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2842,116,181,'2021-09-14 08:06:56','2021-09-14 08:06:56'),(2843,117,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2844,118,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2845,119,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2846,120,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2847,121,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2848,122,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2849,123,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2850,124,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2851,125,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2852,126,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2853,127,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2854,128,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2855,129,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2856,130,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2857,131,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2858,132,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2859,133,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2860,134,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2861,135,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2862,136,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2863,137,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2864,138,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2865,139,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2866,140,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2867,141,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2868,142,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2869,143,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2870,144,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2871,145,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2872,146,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2873,147,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2874,148,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2875,149,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2876,150,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2877,151,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2878,152,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2879,153,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2880,154,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2881,155,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2882,156,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2883,157,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2884,158,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2885,159,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2886,160,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2887,161,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2888,162,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2889,163,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2890,164,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2891,165,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2892,166,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2893,167,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2894,168,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2895,169,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2896,170,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2897,171,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2898,172,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2899,173,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2900,174,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2901,175,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2902,176,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2903,178,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2904,179,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2905,180,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2906,181,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2907,182,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2908,183,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2909,184,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2910,185,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2911,186,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2912,187,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2913,188,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2914,189,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2915,190,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2916,191,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2917,192,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2918,193,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2919,194,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2920,195,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2921,196,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2922,197,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2923,198,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2924,199,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2925,200,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2926,201,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2927,202,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2928,203,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2929,204,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2930,205,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2931,206,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2932,207,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2933,208,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2934,209,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2935,210,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2936,211,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2937,212,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2938,213,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2939,214,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2940,215,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2941,216,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2942,217,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2943,218,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2944,219,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2945,220,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2946,221,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2947,222,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2948,223,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2949,224,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2950,225,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2951,226,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2952,227,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2953,228,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2954,229,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2955,230,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2956,231,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2957,232,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2958,233,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2959,234,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2960,235,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2961,236,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2962,237,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2963,238,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2964,239,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2965,240,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2966,241,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2967,242,181,'2021-09-14 08:06:57','2021-09-14 08:06:57'),(2968,243,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2969,244,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2970,245,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2971,246,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2972,247,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2973,248,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2974,249,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2975,250,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2976,251,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2977,252,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2978,253,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2979,254,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2980,255,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2981,256,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2982,257,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2983,258,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2984,259,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2985,260,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2986,261,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2987,262,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2988,263,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2989,264,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2990,265,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2991,266,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2992,267,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2993,268,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2994,270,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2995,271,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2996,272,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2997,273,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2998,274,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(2999,275,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3000,276,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3001,277,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3002,278,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3003,279,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3004,280,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3005,281,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3006,282,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3007,283,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3008,284,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3009,285,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3010,286,181,'2021-09-14 08:06:58','2021-09-14 08:06:58'),(3011,1,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3012,2,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3013,3,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3014,4,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3015,5,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3016,6,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3017,7,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3018,8,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3019,9,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3020,10,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3021,11,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3022,12,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3023,13,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3024,14,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3025,15,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3026,16,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3027,17,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3028,18,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3029,19,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3030,20,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3031,21,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3032,22,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3033,23,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3034,24,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3035,25,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3036,26,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3037,27,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3038,28,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3039,29,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3040,30,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3041,31,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3042,32,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3043,33,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3044,34,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3045,35,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3046,36,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3047,37,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3048,38,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3049,39,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3050,40,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3051,41,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3052,42,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3053,43,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3054,44,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3055,45,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3056,46,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3057,47,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3058,48,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3059,49,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3060,50,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3061,51,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3062,52,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3063,53,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3064,54,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3065,55,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3066,56,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3067,57,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3068,58,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3069,59,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3070,60,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3071,61,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3072,62,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3073,63,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3074,64,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3075,65,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3076,66,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3077,67,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3078,68,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3079,69,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3080,70,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3081,71,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3082,72,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3083,73,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3084,74,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3085,75,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3086,76,184,'2021-09-14 08:07:05','2021-09-14 08:07:05'),(3087,77,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3088,78,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3089,79,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3090,80,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3091,81,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3092,82,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3093,83,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3094,84,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3095,85,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3096,86,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3097,87,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3098,88,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3099,89,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3100,90,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3101,91,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3102,92,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3103,93,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3104,94,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3105,95,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3106,96,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3107,97,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3108,98,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3109,99,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3110,100,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3111,101,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3112,102,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3113,103,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3114,104,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3115,105,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3116,106,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3117,107,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3118,108,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3119,109,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3120,110,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3121,111,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3122,112,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3123,113,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3124,114,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3125,115,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3126,116,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3127,117,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3128,118,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3129,119,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3130,120,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3131,121,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3132,122,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3133,123,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3134,124,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3135,125,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3136,126,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3137,127,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3138,128,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3139,129,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3140,130,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3141,131,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3142,132,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3143,133,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3144,134,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3145,135,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3146,136,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3147,137,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3148,138,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3149,139,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3150,140,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3151,141,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3152,142,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3153,143,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3154,144,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3155,145,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3156,146,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3157,147,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3158,148,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3159,149,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3160,150,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3161,151,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3162,152,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3163,153,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3164,154,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3165,155,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3166,156,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3167,157,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3168,158,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3169,159,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3170,160,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3171,161,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3172,162,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3173,163,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3174,164,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3175,165,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3176,166,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3177,167,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3178,168,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3179,169,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3180,170,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3181,171,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3182,172,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3183,173,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3184,174,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3185,175,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3186,176,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3187,177,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3188,178,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3189,179,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3190,180,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3191,181,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3192,182,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3193,183,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3194,184,184,'2021-09-14 08:07:06','2021-09-14 08:07:06'),(3195,185,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3196,186,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3197,187,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3198,188,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3199,189,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3200,190,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3201,191,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3202,192,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3203,193,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3204,194,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3205,195,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3206,196,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3207,197,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3208,198,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3209,199,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3210,200,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3211,201,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3212,202,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3213,203,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3214,204,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3215,205,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3216,206,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3217,207,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3218,208,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3219,209,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3220,210,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3221,211,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3222,212,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3223,213,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3224,214,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3225,215,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3226,216,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3227,217,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3228,218,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3229,219,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3230,220,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3231,221,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3232,222,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3233,223,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3234,224,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3235,225,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3236,226,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3237,227,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3238,228,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3239,229,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3240,230,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3241,231,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3242,232,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3243,233,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3244,234,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3245,235,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3246,236,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3247,237,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3248,238,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3249,239,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3250,240,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3251,241,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3252,242,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3253,243,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3254,244,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3255,245,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3256,246,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3257,247,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3258,248,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3259,249,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3260,250,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3261,251,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3262,252,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3263,253,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3264,254,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3265,255,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3266,256,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3267,257,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3268,258,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3269,259,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3270,260,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3271,261,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3272,262,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3273,263,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3274,264,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3275,265,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3276,266,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3277,267,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3278,268,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3279,269,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3280,270,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3281,271,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3282,272,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3283,273,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3284,274,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3285,275,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3286,276,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3287,277,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3288,278,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3289,279,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3290,280,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3291,281,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3292,282,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3293,283,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3294,284,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3295,285,184,'2021-09-14 08:07:07','2021-09-14 08:07:07'),(3296,286,184,'2021-09-14 08:07:07','2021-09-14 08:07:07');
/*!40000 ALTER TABLE `country_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `export_groups`
--

DROP TABLE IF EXISTS `export_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `export_groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_record` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `export_groups`
--

LOCK TABLES `export_groups` WRITE;
/*!40000 ALTER TABLE `export_groups` DISABLE KEYS */;
INSERT INTO `export_groups` VALUES (1,'export 2',2,'2021-09-06 00:34:07','2021-09-06 00:34:07');
/*!40000 ALTER TABLE `export_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_benefit_types`
--

DROP TABLE IF EXISTS `insurance_benefit_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_benefit_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_benefit_types`
--

LOCK TABLES `insurance_benefit_types` WRITE;
/*!40000 ALTER TABLE `insurance_benefit_types` DISABLE KEYS */;
INSERT INTO `insurance_benefit_types` VALUES (17,'Kematian Akibat Kemalangan','2020-02-18 00:42:36','2020-02-18 00:42:36'),(18,'Keilatan Kekal Menyeluruh Akibat Kemalangan','2020-02-18 00:42:53','2020-02-18 00:42:53'),(19,'Dana Pendidikan Anak','2020-02-18 00:43:07','2020-02-18 00:43:07'),(20,'Perbelanjaan Perubatan Luar Negara (Sehingga umur 70 tahun)','2020-02-18 00:43:24','2020-02-18 00:43:24'),(21,'Perbelanjaan Perubatan Luar Negara (umur 70 tahun ke atas)','2020-02-18 00:43:35','2020-02-18 00:43:35'),(22,'Membawa pulang balik Mayat','2021-03-31 05:44:20','2021-03-31 05:44:20'),(23,'Kemalangan yang mengakibat hilang anggota badan (Maximum RM5,000)','2021-03-31 05:44:54','2021-03-31 05:44:54');
/*!40000 ALTER TABLE `insurance_benefit_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_companies`
--

DROP TABLE IF EXISTS `insurance_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url_thumb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_companies`
--

LOCK TABLES `insurance_companies` WRITE;
/*!40000 ALTER TABLE `insurance_companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_enrollment_headcounts`
--

DROP TABLE IF EXISTS `insurance_enrollment_headcounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_enrollment_headcounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_product_enrollment_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nric` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_enrollment_headcounts`
--

LOCK TABLES `insurance_enrollment_headcounts` WRITE;
/*!40000 ALTER TABLE `insurance_enrollment_headcounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_enrollment_headcounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_enrollments`
--

DROP TABLE IF EXISTS `insurance_enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_enrollments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `policy_no` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_no` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_id` int NOT NULL,
  `package_id` int NOT NULL,
  `depart_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(16,2) NOT NULL,
  `country_id` int NOT NULL,
  `region_id` int NOT NULL,
  `plan_coverage` int NOT NULL,
  `journey_type` int NOT NULL,
  `purpose` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exported` int NOT NULL DEFAULT '0',
  `group_id` int DEFAULT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` int NOT NULL DEFAULT '0',
  `auth_code` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `trans_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cc_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cc_no` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `s_bank_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `s_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_enrollments`
--

LOCK TABLES `insurance_enrollments` WRITE;
/*!40000 ALTER TABLE `insurance_enrollments` DISABLE KEYS */;
INSERT INTO `insurance_enrollments` VALUES (42,1,'790618146087-2101','',10,76,'2021-03-19','2021-03-31','2',20.00,0,179,1,2,'2',1,1,'',1,'','','','','','','2021-03-18 08:22:04','2021-09-06 00:34:07'),(43,3,'790618146087-2101','',10,76,'2021-04-01','2021-04-08','2',20.00,0,179,1,2,'2',1,1,'',1,'','','','','','','2021-03-18 08:26:49','2021-09-06 00:34:07'),(45,4,'840216508493-21','',11,77,'2021-04-01','2021-04-04','2',32.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-03-31 06:18:00','2021-03-31 06:18:00'),(46,5,'620521105789-21','',11,78,'2021-04-25','2021-04-29','2',46.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-04-05 04:37:50','2021-04-05 04:37:50'),(47,1,'790618146087-21','',10,76,'2021-09-07','2021-09-14','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-05 21:13:24','2021-09-05 21:13:24'),(48,1,'790618146087-21','',10,76,'2021-09-07','2021-09-14','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-05 21:48:18','2021-09-05 21:48:18'),(49,1,'790618146087-21','',10,76,'2021-09-07','2021-09-14','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-05 21:48:44','2021-09-05 21:48:44'),(50,1,'790618146087-21','',10,76,'2021-09-07','2021-09-14','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-05 21:49:44','2021-09-05 21:49:44'),(51,1,'790618146087-21','',10,76,'2021-09-07','2021-09-09','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-05 23:39:57','2021-09-05 23:39:57'),(52,1,'790618146087-21','',10,76,'2021-09-07','2021-09-09','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','iwhrovkp','','','','','2021-09-05 23:40:17','2021-09-05 23:47:48'),(53,5,'620521105789-21','',11,92,'2021-09-22','2021-09-30','2',76.00,0,179,1,2,'2',0,NULL,'',0,'','sjmv8hgo','','','','','2021-09-13 06:21:50','2021-09-13 06:21:58'),(54,6,'840617105075-21','',11,83,'2021-09-17','2021-09-19','2',46.00,0,179,1,2,'2',0,NULL,'',0,'','zaeij06m','','','','','2021-09-15 02:43:00','2021-09-15 02:46:28'),(55,5,'620521105789-21','',11,84,'2021-09-23','2021-10-01','2',56.00,0,179,1,2,'2',0,NULL,'',0,'','','','','','','2021-09-15 03:00:12','2021-09-15 03:00:12'),(56,1,'790618146087-21','',10,76,'2021-09-23','2021-09-28','2',20.00,0,179,1,2,'2',0,NULL,'',0,'','gks8oi9q','','','','','2021-09-21 04:38:23','2021-09-21 04:39:54');
/*!40000 ALTER TABLE `insurance_enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_product_benefits`
--

DROP TABLE IF EXISTS `insurance_product_benefits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_product_benefits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_id` int NOT NULL,
  `insurance_benefit_type_id` int NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_plan_id` int DEFAULT NULL,
  `plan_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_product_benefits`
--

LOCK TABLES `insurance_product_benefits` WRITE;
/*!40000 ALTER TABLE `insurance_product_benefits` DISABLE KEYS */;
INSERT INTO `insurance_product_benefits` VALUES (5,10,17,'20','2020-03-09 21:56:36','2020-03-09 21:56:36',1,1);
/*!40000 ALTER TABLE `insurance_product_benefits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_types`
--

DROP TABLE IF EXISTS `insurance_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_types`
--

LOCK TABLES `insurance_types` WRITE;
/*!40000 ALTER TABLE `insurance_types` DISABLE KEYS */;
INSERT INTO `insurance_types` VALUES (1,'TRAVEL',NULL,NULL);
/*!40000 ALTER TABLE `insurance_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances`
--

DROP TABLE IF EXISTS `insurances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_type_id` int NOT NULL,
  `company_id` int NOT NULL,
  `takaful` int NOT NULL,
  `product_sheet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances`
--

LOCK TABLES `insurances` WRITE;
/*!40000 ALTER TABLE `insurances` DISABLE KEYS */;
INSERT INTO `insurances` VALUES (10,'Product A','Travel product A','Travel product A',1,1,1,NULL,'Product Disclosure: 1631594128.csv','2020-03-09 21:55:42','2021-09-21 07:53:09',0),(11,'Product B','Travel Product B','Travel Product B',1,3,0,NULL,'Product Disclosure: 1631670566.pdf','2021-03-31 05:27:48','2021-09-15 02:54:08',1),(12,'Product C','Travel Product C','Travel Product C',1,2,1,NULL,'No Product Disclosure Uploaded','2021-09-14 08:14:44','2021-09-21 05:19:59',0);
/*!40000 ALTER TABLE `insurances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_100000_create_password_resets_table',1),(16,'2019_07_29_070946_create_insurance_enrollment_headcounts_table',1),(17,'2019_07_29_070956_create_countries_table',1),(19,'2019_07_29_071142_create_insurance_companies_table',1),(22,'2019_07_29_072351_create_country_region_table',2),(23,'2019_07_29_081624_create_admins_table',3),(26,'2019_07_29_130450_create_companies_table',4),(27,'2019_07_30_065245_create_insurance_product_benefits_table',5),(29,'2019_07_29_071007_create_regions_table',6),(30,'2019_07_31_024817_create_plans_table',7),(40,'2019_08_05_040416_create_insurance_types_table',11),(41,'2019_08_05_040028_create_claim_types_table',12),(42,'2019_08_03_045714_create_claim_document_types_table',13),(44,'2019_08_03_045722_create_claim_documents_table',14),(45,'2019_07_29_071806_create_insurance_benefit_types_table',15),(47,'2019_08_03_022101_create_beneficiaries_table',16),(50,'2019_07_29_070919_create_insurance_enrollments_table',18),(53,'2019_08_03_045638_create_claims_table',19),(55,'2014_10_12_000000_create_users_table',21),(57,'2019_10_30_040328_create_country_package_table',23),(58,'2019_11_20_035024_create_package_prices_table',23),(61,'2019_07_31_030003_create_packages_table',24),(63,'2019_11_20_041554_create_country_package_extras_table',26),(64,'2019_08_30_024111_create_package_extras_table',27),(65,'2019_11_24_055023_create_export_groups_table',28),(66,'2019_07_29_070857_create_insurances_table',29),(67,'2020_01_06_025851_create_sessions_table',30),(68,'2020_01_06_072026_add_product_disclosure_to_insurances_table',30),(69,'2020_01_14_022247_add_group_to_insurance_enrollments',30),(70,'2020_01_14_023303_add_group_to_insurance_enrollments_table',31),(71,'2020_02_07_041638_create_category_plans_table',32),(72,'2020_02_11_031047_create_country_region_table',33);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_extras`
--

DROP TABLE IF EXISTS `package_extras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_extras` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` int NOT NULL,
  `price_extra` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region_id` int DEFAULT NULL,
  `category_plan_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_extras`
--

LOCK TABLES `package_extras` WRITE;
/*!40000 ALTER TABLE `package_extras` DISABLE KEYS */;
INSERT INTO `package_extras` VALUES (1,11,'All Asia Country',1,29.90,'2021-09-21 05:16:26','2021-09-21 05:16:26',180,2),(2,11,'All Asia Country',1,48.75,'2021-09-21 05:34:31','2021-09-21 05:34:31',180,1),(3,11,'All Asia Country',2,38.75,'2021-09-21 07:43:16','2021-09-21 07:43:16',180,2),(4,11,'All Asia Country',2,64.40,'2021-09-21 07:43:42','2021-09-21 07:43:42',180,1),(5,11,'World Wide Except Nepal, USA & Canada',1,39.85,'2021-09-21 07:48:47','2021-09-21 07:48:47',181,2),(6,11,'World Wide Except Nepal, USA & Canada',1,64.95,'2021-09-21 07:50:45','2021-09-21 07:50:45',181,1);
/*!40000 ALTER TABLE `package_extras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_prices`
--

DROP TABLE IF EXISTS `package_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_prices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int NOT NULL,
  `from` int NOT NULL,
  `to` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_prices`
--

LOCK TABLES `package_prices` WRITE;
/*!40000 ALTER TABLE `package_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `package_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `insurance_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_day` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region_id` int DEFAULT NULL,
  `category_plan_id` int DEFAULT NULL,
  `to_day` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (76,10,1,'Europe, Tibet, Nepal, Mongolia and Area 1 countries',2,20.00,'2020-03-09 21:56:04','2020-03-09 21:56:04',179,1,28),(77,11,1,'All Asia Country',1,40.90,'2021-03-31 05:49:55','2021-09-21 05:11:56',180,2,5),(78,11,1,'All Asia Country',6,60.45,'2021-03-31 05:50:35','2021-09-21 05:14:28',180,2,10),(80,11,1,'All Asia Country',19,111.65,'2021-03-31 05:51:30','2021-09-21 05:14:49',180,2,30),(83,11,1,'All Asia Country',1,66.65,'2021-03-31 05:52:40','2021-09-21 05:31:32',180,1,5),(84,11,1,'All Asia Country',6,98.60,'2021-03-31 05:54:38','2021-09-21 05:32:17',180,1,10),(85,11,1,'All Asia Country',11,155.70,'2021-03-31 06:05:14','2021-09-21 05:32:46',180,1,18),(86,11,1,'All Asia Country',19,182.05,'2021-03-31 06:05:46','2021-09-21 05:33:19',180,1,30),(89,11,2,'All Asia Country',1,52.55,'2021-03-31 06:06:40','2021-09-21 07:39:04',180,2,5),(90,11,2,'All Asia Country',1,87.30,'2021-03-31 06:06:58','2021-09-21 07:41:09',180,1,5),(91,11,2,'All Asia Country',6,75.30,'2021-03-31 06:07:20','2021-09-21 07:39:23',180,2,10),(92,11,2,'All Asia Country',6,125.10,'2021-03-31 06:07:37','2021-09-21 07:41:24',180,1,10),(93,11,2,'All Asia Country',11,119.50,'2021-03-31 06:08:01','2021-09-21 07:39:47',180,2,18),(94,11,2,'All Asia Country',11,198.50,'2021-03-31 06:08:18','2021-09-21 07:41:51',180,1,18),(95,11,2,'All Asia Country',19,150.20,'2021-03-31 06:08:35','2021-09-21 07:40:13',180,2,30),(96,11,2,'All Asia Country',19,249.45,'2021-03-31 06:08:54','2021-09-21 07:42:19',180,1,30),(101,11,1,'All Asia Country',11,95.50,'2021-09-21 05:13:01','2021-09-21 05:13:01',180,2,18),(102,11,1,'World Wide Except Nepal, USA & Canada',1,54.50,'2021-09-21 07:46:21','2021-09-21 07:47:18',181,1,5),(103,11,1,'World Wide Except Nepal, USA & Canada',6,80.60,'2021-09-21 07:47:03','2021-09-21 07:47:03',181,2,10),(104,11,1,'World Wide Except Nepal, USA & Canada',11,127.35,'2021-09-21 07:47:53','2021-09-21 07:47:53',181,2,18),(105,11,1,'World Wide Except Nepal, USA & Canada',19,148.85,'2021-09-21 07:48:28','2021-09-21 07:48:28',181,2,30),(106,11,1,'World Wide Except Nepal, USA & Canada',1,88.85,'2021-09-21 07:49:25','2021-09-21 07:49:25',181,1,5),(107,11,1,'World Wide Except Nepal, USA & Canada',6,131.45,'2021-09-21 07:49:44','2021-09-21 07:49:44',181,1,10),(108,11,1,'World Wide Except Nepal, USA & Canada',11,207.60,'2021-09-21 07:50:05','2021-09-21 07:50:05',181,1,18),(109,11,1,'World Wide Except Nepal, USA & Canada',19,242.70,'2021-09-21 07:50:24','2021-09-21 07:50:24',181,1,30);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (1,'Individual',NULL,NULL),(2,'Family',NULL,NULL);
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (180,'Area 2 (All Asia Country)','2021-03-31 05:35:12','2021-09-14 07:57:54'),(181,'Area 3 (Word Wide Except Nepal, USA & Canada)','2021-03-31 05:40:14','2021-09-14 07:58:58'),(184,'Area 4 (Word Wide Including Nepal, USA & Canada)','2021-03-31 05:42:07','2021-09-14 07:59:21'),(185,'Area 1 (Domestic)','2021-09-14 08:00:22','2021-09-14 08:00:22');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nric` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_url_thumb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `company_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'khairul azmi idris','azmi@joompe.com',NULL,'','','790618146087','','1','no 29 jalan tun teja 35/7a','alam impian','shah alam','SELANGOR','40470','01121937500','1979-06-18','','',NULL,'2019-09-04 00:55:29','2019-11-20 18:28:43'),(2,'NUR AZIMAH BINTI ZOLKEFLY','azimahzolkefly53@gmail.com',NULL,'','','971222385156','','2','1O6A, FELDa lasah','1O6A, FELDa lasah','sUNGAI SIPUT (U)','PERAK','31120','+6019-2332596','1997-12-22','','',NULL,'2020-01-06 17:57:25','2020-01-12 19:34:10'),(3,'siti suriaty zakaria','suria@azrb.com',NULL,'','','850927146082','','2','no 29','JALAN TUN TEJA 35/7A','shah alam','SELANGOR','40470','0122747475','1985-09-27','','',NULL,'2021-03-18 08:26:49','2021-03-18 08:26:49'),(4,'ahmad abu ali','ahmadabu@email.com',NULL,'','','840216508493','','1','5-G-05 , GROUND FLOOR, D\'VIDA COMMERCIAL CENTRE, JALAN BAZAR U8/100, BUKIT JELUTONG',NULL,'Shah Alam','SELANGOR','40150','013123456789','2016-02-24','','',NULL,'2021-03-31 06:18:00','2021-03-31 06:18:00'),(5,'ROSLI BIN MUSA','roslimusa.gbsb@gmail.com',NULL,'','','620521105789','','1','16 jalan teratak u8/96j','bukit jelutong','shah alam','SELANGOR','40150','0192133883','1962-05-21','','',NULL,'2021-04-05 04:37:50','2021-09-15 03:00:12'),(6,'muhamad faisal othman','m.faisalothman@gmail.com',NULL,'','','840617105075','','1','no 9','jalan selasih','shah alam','SELANGOR','40170','0136333135','1984-06-17','','',NULL,'2021-09-15 02:43:00','2021-09-15 02:43:00');
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

-- Dump completed on 2021-09-21  9:59:32
