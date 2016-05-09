
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
DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (2,2,'product_type','',0,2),(6,6,'category','All the blog posts about education and stuff',0,6),(23,23,'question-tag','',0,1),(25,25,'question-tag','',0,1),(26,26,'question-tag','',0,1),(27,27,'question-tag','',0,1),(29,29,'question-tag','',0,1),(30,30,'question-tag','',0,3),(31,31,'question-tag','',0,1),(38,38,'question-tag','',0,1),(40,40,'question-tag','',0,1),(41,41,'question-tag','',0,1),(44,44,'question-tag','',0,1),(48,48,'question-tag','',0,1),(53,53,'question-tag','',0,1),(59,59,'nav_menu','',0,4),(61,61,'nav_menu','',0,2),(62,62,'nav_menu','',0,5),(63,63,'nav_menu','',0,7),(64,64,'nav_menu','',0,3),(65,65,'nav_menu','',0,4),(66,66,'nav_menu','',0,2),(72,72,'nav_menu','',0,3),(104,104,'post_format','',0,1),(110,110,'author','rileydong rileydong  rileydong 1 dongxiaoxi@yahoo.com',0,2),(120,120,'module-tag','',0,4),(123,123,'module-tag','',0,4),(124,124,'product_tag','',0,0),(125,125,'product_tag','',0,0),(126,126,'product_tag','',0,0),(127,127,'product_tag','',0,0),(128,128,'product_tag','',0,0),(129,129,'product_tag','',0,0),(131,131,'nav_menu','',0,8),(132,132,'author','kaijing kaijing  Kaijing 108 kli009@uottawa.ca',0,6),(142,142,'bp-email-type','A member has replied to an activity update that the recipient posted.',0,1),(143,143,'bp-email-type','A member has replied to a comment on an activity update that the recipient posted.',0,1),(144,144,'bp-email-type','Recipient was mentioned in an activity update.',0,1),(145,145,'bp-email-type','Recipient was mentioned in a group activity update.',0,1),(146,146,'bp-email-type','Recipient has registered for an account.',0,1),(147,147,'bp-email-type','Recipient has registered for an account and site.',0,1),(148,148,'bp-email-type','A member has sent a friend request to the recipient.',0,1),(149,149,'bp-email-type','Recipient has had a friend request accepted by a member.',0,1),(150,150,'bp-email-type','A group\'s details were updated.',0,1),(151,151,'bp-email-type','A member has sent a group invitation to the recipient.',0,1),(152,152,'bp-email-type','Recipient\'s status within a group has changed.',0,1),(153,153,'bp-email-type','A member has requested permission to join a group.',0,1),(154,154,'bp-email-type','Recipient has received a private message.',0,1),(155,155,'bp-email-type','Recipient has changed their email address.',0,1),(156,156,'bp-email-type','Recipient had requested to join a group, which was accepted.',0,1),(157,157,'bp-email-type','Recipient had requested to join a group, which was rejected.',0,1),(158,158,'nav_menu','',0,3),(159,159,'author','qiuyingzhou qiuyingzhou  QiuyingZhou 112 qiuyingzhou0531@gmail.com',0,0),(160,160,'author','rileydong rileydong  rileydong 1 dongxiaoxi@yahoo.com',0,0),(161,161,'author','wplms_support   wplms_support 51 dongxiaoxi@gmail.com',0,0),(162,162,'course-cat','',0,1),(163,163,'level','',0,1),(164,164,'author','qianyu668899 qianyu668899  qianyu668899 113 jinggeqianyu1991@gmail.com',0,0),(165,165,'author','tigress tigress  Tigress 94 Rowenaxiaoqianliu@gmail.com',0,0),(166,166,'product_tag','',0,0),(167,167,'product_tag','',0,1),(168,168,'product_tag','',0,1),(169,169,'product_cat','',0,1),(170,170,'product_cat','',0,1),(171,171,'product_tag','',0,1);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

