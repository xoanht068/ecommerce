-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `counytry_code` varchar(10) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`counytry_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES ('US','United States'),('VN','Việt Nam');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `country_code` varchar(10) NOT NULL,
  `country_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`country_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES ('US','United States'),('VN','Việt Nam');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `order_number` int(6) unsigned NOT NULL,
  `product_id` int(6) NOT NULL,
  `quantity` int(6) DEFAULT NULL,
  PRIMARY KEY (`order_number`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`) ON DELETE CASCADE,
  CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (35,11,5);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_number` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  PRIMARY KEY (`order_number`),
  KEY `user_id` (`user_id`),
  KEY `country_code` (`country_code`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`country_code`) REFERENCES `country` (`country_code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (35,29,'sdsa','sad','a@gmail.com','0343141177','125 ltn','','cmsmart','VN','2022-04-13');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'product 1','This is product 1','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',100,127),(2,'product 2','This is product 2','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',200,127),(3,'product 3','This is product 3','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',300,127),(4,'product 4','This is product 4','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',400,127),(5,'product 5','This is product 5','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',500,127),(6,'product 6','This is product 6','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',600,127),(7,'product 7','This is product 7','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',100,127),(8,'product 8','This is product 8','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',200,127),(9,'product 9','This is product 9','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',300,127),(10,'product 10','This is product 10','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',400,127),(11,'product 11','This is product 11','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',500,127),(12,'product 12','This is product 12','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',600,127),(13,'product 13','This is product 13','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',600,127),(14,'product 14','This is product 14','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',600,127),(15,'product 15','This is product 15','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',600,127),(16,'product 16','This is product 16','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',100,127),(17,'product 17','This is product 17','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',200,127),(18,'product 18','This is product 18','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',300,127),(19,'product 19','This is product 19','https://cdn.pixabay.com/photo/2016/09/21/11/31/youtube-1684601__340.png',400,127);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (28,'default','imcs3.0','','',''),(29,'admin','admin','a@gmail.com','admin','0343141177');
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

-- Dump completed on 2022-04-13 21:28:30
