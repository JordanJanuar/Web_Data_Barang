-- MySQL dump 10.13  Distrib 8.1.0, for macos13.3 (arm64)
--
-- Host: localhost    Database: mypos
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (19,'Maya','L','081220684145','Bandung','2020-08-25 18:51:00',NULL);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `p_item`
--

DROP TABLE IF EXISTS `p_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `p_item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `unit_id` varchar(100) NOT NULL,
  `model` varchar(100)  NOT NULL,
  `keterangan` text  NOT NULL,
  `price` int DEFAULT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `qr_code` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `p_item`
--

LOCK TABLES `p_item` WRITE;
/*!40000 ALTER TABLE `p_item` DISABLE KEYS */;
INSERT INTO `p_item` VALUES (53,'123','123','123','123','','',123,0,NULL,'2023-09-12 14:24:05',NULL,''),(55,'12345','Keren','Merek','Ruangan','Model','Keterangan',123,0,NULL,'2023-09-12 14:27:54','2023-09-12 07:30:20',''),(56,'111111','Print','Sumsang','Dukbis','Gacor','Baik',1000000,0,'item-230912-489b7bbc3f.png','2023-09-12 14:39:03',NULL,'');
/*!40000 ALTER TABLE `p_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (26,'cecep','08122029331',' baleendah',' mengirim barang','2020-08-27 12:48:29',NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cart`
--

DROP TABLE IF EXISTS `t_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cart` (
  `cart_id` int NOT NULL,
  `item_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `discount_item` int NOT NULL DEFAULT '0',
  `total` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cart`
--

LOCK TABLES `t_cart` WRITE;
/*!40000 ALTER TABLE `t_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_sale`
--

DROP TABLE IF EXISTS `t_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_sale` (
  `sale_id` int NOT NULL AUTO_INCREMENT,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int DEFAULT NULL,
  `total_price` int NOT NULL,
  `discount` int NOT NULL,
  `final_price` int NOT NULL,
  `cash` int NOT NULL,
  `remaining` int NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int NOT NULL,
  `create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sale_id`),
  KEY `t_sale_ibfk_1` (`customer_id`),
  KEY `t_sale_ibfk_2` (`user_id`),
  CONSTRAINT `t_sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  CONSTRAINT `t_sale_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_sale`
--

LOCK TABLES `t_sale` WRITE;
/*!40000 ALTER TABLE `t_sale` DISABLE KEYS */;
INSERT INTO `t_sale` VALUES (64,'SL2008260001',NULL,120000,0,120000,120000,0,'Lunas','2020-08-26',2,'2020-08-26 10:07:23'),(65,'SL2008260002',NULL,120000,0,120000,120000,0,'','2020-08-26',2,'2020-08-26 10:08:40'),(66,'SL2008260003',19,120000,0,120000,120000,0,'','2020-08-26',2,'2020-08-26 10:09:05'),(67,'SL2008270001',NULL,120000,0,120000,120000,0,'Lunaas','2020-08-27',2,'2020-08-27 09:29:33'),(68,'SL2008270002',NULL,120000,0,120000,120000,0,'Lunas','2020-08-27',2,'2020-08-27 10:13:00'),(69,'SL2008270003',NULL,120000,0,120000,120000,0,'Lunas','2020-08-27',2,'2020-08-27 10:18:24'),(70,'SL2008270004',NULL,120000,0,120000,120000,0,'berhasil','2020-08-27',2,'2020-08-27 10:38:47'),(71,'SL2008270005',NULL,120000,0,120000,130000,10000,'lunas','2020-08-27',2,'2020-08-27 11:46:47');
/*!40000 ALTER TABLE `t_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_sale_detail`
--

DROP TABLE IF EXISTS `t_sale_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_sale_detail` (
  `detail_id` int NOT NULL AUTO_INCREMENT,
  `sale_id` int NOT NULL,
  `item_id` int NOT NULL,
  `price` int NOT NULL,
  `qty` int NOT NULL,
  `discount_item` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82  ;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `t_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int DEFAULT NULL,
  `qty` int NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `item_id` (`item_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_stock`
--

LOCK TABLES `t_stock` WRITE;
/*!40000 ALTER TABLE `t_stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int NOT NULL COMMENT '1:admin, 2:gudang',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Farhan','7e68b707e4245e93487a596df5b95ed018dfa5c4','Farhan','DKI Jakarta',1),(10,'Jordan','1cb5bd5a9e45420321f44c72da5d90d7f0432ffb','Jordan','Cimahi',1),(11,'Haikal','c21b3ad4636fcc88a81c8154ff319be7936e63ae','Haikal','Garut',1);
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

-- Dump completed on 2023-09-12 15:01:58
