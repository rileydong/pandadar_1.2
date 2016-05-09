
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
DROP TABLE IF EXISTS `wp_bp_xprofile_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_bp_xprofile_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) NOT NULL,
  `object_type` varchar(150) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `object_id` (`object_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_bp_xprofile_meta` WRITE;
/*!40000 ALTER TABLE `wp_bp_xprofile_meta` DISABLE KEYS */;
INSERT INTO `wp_bp_xprofile_meta` VALUES (1,2,'field','default_visibility','loggedin'),(2,2,'field','allow_custom_visibility','disabled'),(3,5,'field','default_visibility','public'),(4,5,'field','allow_custom_visibility','allowed'),(5,24,'field','default_visibility','adminsonly'),(6,24,'field','allow_custom_visibility','allowed'),(7,28,'field','default_visibility','adminsonly'),(8,28,'field','allow_custom_visibility','allowed'),(9,34,'field','default_visibility','public'),(10,34,'field','allow_custom_visibility','allowed'),(11,35,'field','default_visibility','public'),(12,35,'field','allow_custom_visibility','allowed'),(13,4,'field','default_visibility','public'),(14,4,'field','allow_custom_visibility','allowed'),(15,46,'field','default_visibility','public'),(16,46,'field','allow_custom_visibility','allowed'),(17,47,'field','default_visibility','public'),(18,47,'field','allow_custom_visibility','allowed'),(19,56,'field','default_visibility','public'),(20,56,'field','allow_custom_visibility','allowed'),(21,59,'field','default_visibility','public'),(22,59,'field','allow_custom_visibility','allowed'),(23,60,'field','default_visibility','public'),(24,60,'field','allow_custom_visibility','allowed'),(25,61,'field','default_visibility','public'),(26,61,'field','allow_custom_visibility','allowed'),(27,65,'field','default_visibility','public'),(28,65,'field','allow_custom_visibility','allowed'),(29,66,'field','default_visibility','public'),(30,66,'field','allow_custom_visibility','allowed'),(31,3,'field','default_visibility','public'),(32,3,'field','allow_custom_visibility','allowed'),(33,78,'field','default_visibility','public'),(34,78,'field','allow_custom_visibility','allowed'),(35,79,'field','default_visibility','public'),(36,79,'field','allow_custom_visibility','allowed'),(37,79,'field','do_autolink','off'),(38,78,'field','do_autolink','off');
/*!40000 ALTER TABLE `wp_bp_xprofile_meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

