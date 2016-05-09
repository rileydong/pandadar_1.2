
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
DROP TABLE IF EXISTS `wp_bp_activity_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_bp_activity_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `activity_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `activity_id` (`activity_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_bp_activity_meta` WRITE;
/*!40000 ALTER TABLE `wp_bp_activity_meta` DISABLE KEYS */;
INSERT INTO `wp_bp_activity_meta` VALUES (1,266,'instructor','1'),(2,267,'instructor','1'),(3,268,'instructor','1'),(5,284,'instructor','1'),(6,285,'instructor','1'),(7,286,'instructor','1'),(9,296,'instructor','1'),(11,300,'instructor','1'),(12,303,'instructor','1'),(13,305,'instructor','1'),(14,306,'instructor','1'),(15,307,'instructor','1'),(16,308,'instructor','1'),(17,309,'instructor','1'),(18,329,'instructor','1'),(19,330,'instructor','1'),(23,336,'post_title','Beginner Chinese Pack 1'),(26,409,'post_title','Zui Le 醉了 - Web-Vocabulary 03082016'),(27,409,'post_url','http://pandadar.com/wordpress/?p=4286'),(28,410,'post_title','Praise'),(29,410,'post_url','http://pandadar.com/wordpress/?p=4238'),(30,423,'post_title','An li 安利 - Web-Vocabulary 03102016'),(31,423,'post_url','http://pandadar.com/wordpress/?p=4302'),(32,497,'post_title','Tu Cao 吐槽 - Web-Vocabulary 03172016'),(33,497,'post_url','http://pandadar.com/wordpress/?p=4353'),(34,517,'added_students','99'),(35,541,'post_title','Yan Zhi 颜值 - Web-Vocabulary 03212016'),(36,541,'post_url','http://pandadar.com/wordpress/?p=4387'),(37,361,'post_title','002 Self-Introduction'),(38,486,'post_title','005 Have Tea'),(39,487,'post_title','006 Birthday Gift'),(40,489,'post_title','007 Order Food'),(41,488,'post_title','008 Compliment'),(42,558,'post_title','009 Take Taxi'),(43,363,'post_title','004 Days and Dates'),(44,362,'post_title','003 Weather'),(45,620,'post_title','Tu Hao 土豪 - Web-Vocabulary 03312016'),(46,620,'post_url','http://pandadar.com/wordpress/?p=4827'),(47,627,'post_title','Special Topics - Fandom 1'),(49,360,'post_title','001 Greetings'),(50,360,'post_comment_status','closed'),(51,674,'added_students','173'),(52,684,'added_students','359'),(53,688,'added_students','347'),(54,695,'post_title','Pinyin 拼音'),(55,702,'added_students','346'),(56,703,'bulk_message','346'),(57,704,'bulk_message','346'),(58,705,'instructor','1'),(59,712,'added_students','348'),(60,717,'added_students','362');
/*!40000 ALTER TABLE `wp_bp_activity_meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

