
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
DROP TABLE IF EXISTS `wp_woocommerce_order_itemmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_item_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `order_item_id` (`order_item_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_woocommerce_order_itemmeta` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_order_itemmeta` DISABLE KEYS */;
INSERT INTO `wp_woocommerce_order_itemmeta` VALUES (19,3,'_qty','1'),(20,3,'_tax_class',''),(21,3,'_product_id','4313'),(22,3,'_variation_id','0'),(23,3,'_line_subtotal','225'),(24,3,'_line_total','225'),(25,3,'_line_subtotal_tax','0'),(26,3,'_line_tax','0'),(27,3,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(28,4,'_qty','1'),(29,4,'_tax_class',''),(30,4,'_product_id','4313'),(31,4,'_variation_id','0'),(32,4,'_line_subtotal','225'),(33,4,'_line_total','225'),(34,4,'_line_subtotal_tax','0'),(35,4,'_line_tax','0'),(36,4,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(37,3,'commission1','157.5'),(38,4,'commission1','157.5'),(39,5,'_qty','2'),(40,5,'_tax_class',''),(41,5,'_product_id','4313'),(42,5,'_variation_id','0'),(43,5,'_line_subtotal','450'),(44,5,'_line_total','450'),(45,5,'_line_subtotal_tax','0'),(46,5,'_line_tax','0'),(47,5,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(57,7,'_qty','1'),(58,7,'_tax_class',''),(59,7,'_product_id','4313'),(60,7,'_variation_id','0'),(61,7,'_line_subtotal','225'),(62,7,'_line_total','225'),(63,7,'_line_subtotal_tax','0'),(64,7,'_line_tax','0'),(65,7,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(66,8,'_qty','1'),(67,8,'_tax_class',''),(68,8,'_product_id','4313'),(69,8,'_variation_id','0'),(70,8,'_line_subtotal','225'),(71,8,'_line_total','225'),(72,8,'_line_subtotal_tax','0'),(73,8,'_line_tax','0'),(74,8,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(75,9,'_qty','1'),(76,9,'_tax_class',''),(77,9,'_product_id','4095'),(78,9,'_variation_id','0'),(79,9,'_line_subtotal','72'),(80,9,'_line_total','72'),(81,9,'_line_subtotal_tax','0'),(82,9,'_line_tax','0'),(83,9,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(84,10,'_qty','1'),(85,10,'_tax_class',''),(86,10,'_product_id','4095'),(87,10,'_variation_id','0'),(88,10,'_line_subtotal','72'),(89,10,'_line_total','72'),(90,10,'_line_subtotal_tax','0'),(91,10,'_line_tax','0'),(92,10,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(93,11,'_qty','1'),(94,11,'_tax_class',''),(95,11,'_product_id','4094'),(96,11,'_variation_id','0'),(97,11,'_line_subtotal','96'),(98,11,'_line_total','96'),(99,11,'_line_subtotal_tax','0'),(100,11,'_line_tax','0'),(101,11,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(102,12,'_qty','1'),(103,12,'_tax_class',''),(104,12,'_product_id','4089'),(105,12,'_variation_id','0'),(106,12,'_line_subtotal','128'),(107,12,'_line_total','128'),(108,12,'_line_subtotal_tax','0'),(109,12,'_line_tax','0'),(110,12,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(111,13,'_qty','1'),(112,13,'_tax_class',''),(113,13,'_product_id','4093'),(114,13,'_variation_id','0'),(115,13,'_line_subtotal','265'),(116,13,'_line_total','265'),(117,13,'_line_subtotal_tax','0'),(118,13,'_line_tax','0'),(119,13,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(120,14,'_qty','1'),(121,14,'_tax_class',''),(122,14,'_product_id','4868'),(123,14,'_variation_id','0'),(124,14,'_line_subtotal','288'),(125,14,'_line_total','288'),(126,14,'_line_subtotal_tax','0'),(127,14,'_line_tax','0'),(128,14,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(129,15,'_qty','1'),(130,15,'_tax_class',''),(131,15,'_product_id','5131'),(132,15,'_variation_id','0'),(133,15,'_line_subtotal','180'),(134,15,'_line_total','180'),(135,15,'_line_subtotal_tax','0'),(136,15,'_line_tax','0'),(137,15,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}'),(138,16,'_qty','1'),(139,16,'_tax_class',''),(140,16,'_product_id','5131'),(141,16,'_variation_id','0'),(142,16,'_line_subtotal','192'),(143,16,'_line_total','192'),(144,16,'_line_subtotal_tax','0'),(145,16,'_line_tax','0'),(146,16,'_line_tax_data','a:2:{s:5:\"total\";a:0:{}s:8:\"subtotal\";a:0:{}}');
/*!40000 ALTER TABLE `wp_woocommerce_order_itemmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

