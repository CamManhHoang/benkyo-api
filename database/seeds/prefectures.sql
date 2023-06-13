-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: benkyo-api
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

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
-- Table structure for table `prefectures`
--

DROP TABLE IF EXISTS `prefectures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prefectures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prefectures`
--

LOCK TABLES `prefectures` WRITE;
/*!40000 ALTER TABLE `prefectures` DISABLE KEYS */;
INSERT INTO `prefectures` VALUES (1,'北海道','hokkaido-pref'),(2,'青森県','aomori-pref'),(3,'岩手県','iwate-pref'),(4,'宮城県','miyagi-pref'),(5,'秋田県','akita-pref'),(6,'山形県','yamagata-pref'),(7,'福島県','fukushima-pref'),(8,'茨城県','ibaraki-pref'),(9,'栃木県','tochigi-pref'),(10,'群馬県','gunma-pref'),(11,'埼玉県','saitama-pref'),(12,'千葉県','chiba-pref'),(13,'東京都','tokyo-metropolis'),(14,'神奈川県','kanagawa-pref'),(15,'新潟県','niigata-pref'),(16,'富山県','toyama-pref'),(17,'石川県','ishikawa-pref'),(18,'福井県','fukui-pref'),(19,'山梨県','yamanashi-pref'),(20,'長野県','nagano-pref'),(21,'岐阜県','gifu-pref'),(22,'静岡県','shizuoka-pref'),(23,'愛知県','aichi-pref'),(24,'三重県','mie-pref'),(25,'滋賀県','shiga-pref'),(26,'京都府','kyoto-pref'),(27,'大阪府','osaka-pref'),(28,'兵庫県','hyogo-pref'),(29,'奈良県','nara-pref'),(30,'和歌山県','wakayama-pref'),(31,'鳥取県','tottori-pref'),(32,'島根県','shimane-pref'),(33,'岡山県','okayama-pref'),(34,'広島県','hiroshima-pref'),(35,'山口県','yamaguchi-pref'),(36,'徳島県','tokushima-pref'),(37,'香川県','kagawa-pref'),(38,'愛媛県','ehime-pref'),(39,'高知県','kochi-pref'),(40,'福岡県','fukuoka-pref'),(41,'佐賀県','saga-pref'),(42,'長崎県','nagasaki-pref'),(43,'熊本県','kumamoto-pref'),(44,'大分県','oita-pref'),(45,'宮崎県','miyazaki-pref'),(46,'鹿児島県','kagoshima-pref'),(47,'沖縄県','okinawa-pref');
/*!40000 ALTER TABLE `prefectures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-13 15:14:59
