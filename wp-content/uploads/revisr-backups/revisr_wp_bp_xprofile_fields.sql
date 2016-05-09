
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
DROP TABLE IF EXISTS `wp_bp_xprofile_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_bp_xprofile_fields` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL,
  `type` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT '0',
  `is_default_option` tinyint(1) NOT NULL DEFAULT '0',
  `field_order` bigint(20) NOT NULL DEFAULT '0',
  `option_order` bigint(20) NOT NULL DEFAULT '0',
  `order_by` varchar(15) NOT NULL DEFAULT '',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `parent_id` (`parent_id`),
  KEY `field_order` (`field_order`),
  KEY `can_delete` (`can_delete`),
  KEY `is_required` (`is_required`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_bp_xprofile_fields` WRITE;
/*!40000 ALTER TABLE `wp_bp_xprofile_fields` DISABLE KEYS */;
INSERT INTO `wp_bp_xprofile_fields` VALUES (1,4,0,'textbox','Name','',1,0,2,0,'',0),(3,4,0,'textarea','Bio','',0,0,5,0,'',1),(5,4,0,'checkbox','Hobby And Specialty','Apart from Chinese language, what cool stuff are you interested in or good at?',0,0,3,0,'custom',1),(14,4,5,'option','sport','',0,0,0,1,'',1),(15,4,5,'option','art','',0,0,0,2,'',1),(16,4,5,'option','handcraft','',0,0,0,3,'',1),(17,4,5,'option','industry','',0,0,0,4,'',1),(18,4,5,'option','performing','',0,0,0,5,'',1),(19,4,5,'option','bargain','',0,0,0,6,'',1),(20,4,5,'option','drawing','',0,0,0,7,'',1),(21,4,5,'option','maker','',0,0,0,8,'',1),(22,4,5,'option','engineer','',0,0,0,9,'',1),(23,4,5,'option','Other','',0,0,0,10,'',1),(28,4,0,'datebox','Date of Birth','',1,0,0,0,'custom',1),(47,3,0,'checkbox','Certificate','',0,0,0,0,'custom',1),(52,3,47,'option','TCSOL国际汉语教师资格','',0,0,0,1,'',1),(53,3,47,'option','台湾教育部对外华语师资认证','',0,0,0,2,'',1),(54,3,47,'option','国际汉语教师资格证书','',0,0,0,3,'',1),(55,3,47,'option','Other','',0,0,0,4,'',1),(56,3,0,'checkbox','Specialty','',0,0,1,0,'custom',1),(59,3,0,'textarea','Teaching Experience','',1,0,2,0,'',1),(61,4,0,'radio','Gender','',1,0,1,0,'custom',1),(62,4,61,'option','male','',0,0,0,1,'',1),(63,4,61,'option','female','',0,0,0,2,'',1),(64,4,61,'option','prefer not to tell','',0,1,0,3,'',1),(65,4,0,'textarea','Social Media Links','',0,0,4,0,'',1),(76,3,56,'option','Business Chinese','',0,0,0,1,'',1),(77,3,56,'option','Heritage Chinese','',0,0,0,2,'',1),(78,1,0,'textbox','First Name','',1,0,1,0,'',1),(79,1,0,'textbox','Last Name','',1,0,2,0,'',1);
/*!40000 ALTER TABLE `wp_bp_xprofile_fields` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

