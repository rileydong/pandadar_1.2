
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
DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (2,'simple','simple',0),(6,'Education','education',0),(23,'audio','audio',0),(25,'color','color',0),(26,'company','company',0),(27,'country','country',0),(29,'gallery','gallery',0),(30,'gk','gk',0),(31,'image','image',0),(38,'mm','mm',0),(40,'mp4 video','mp4-video',0),(41,'music','music',0),(44,'river','river',0),(48,'space','space',0),(53,'world','world',0),(59,'Top Menu','top-menu',0),(61,'General links','general-links',0),(62,'Footer Menu','footer-menu',0),(63,'MobileMenu','mobilemenu',0),(64,'Features 1','features-1',0),(65,'Features 2','features-2',0),(66,'Features 3','features-3',0),(72,'Main Menu','main-menu',0),(104,'post-format-image','post-format-image',0),(110,'rileydong','cap-rileydong',0),(120,'beginner','beginner',0),(123,'free','free',0),(124,'private','private',0),(125,'8-class','8-class',0),(126,'24-class','24-class',0),(127,'48-class','48-class',0),(128,'1to2','1to2',0),(129,'1to3','1to3',0),(131,'Main Menu For Teachers','main-menu-for-teachers',0),(132,'Kaijing','cap-kaijing',0),(142,'activity-comment','activity-comment',0),(143,'activity-comment-author','activity-comment-author',0),(144,'activity-at-message','activity-at-message',0),(145,'groups-at-message','groups-at-message',0),(146,'core-user-registration','core-user-registration',0),(147,'core-user-registration-with-blog','core-user-registration-with-blog',0),(148,'friends-request','friends-request',0),(149,'friends-request-accepted','friends-request-accepted',0),(150,'groups-details-updated','groups-details-updated',0),(151,'groups-invitation','groups-invitation',0),(152,'groups-member-promoted','groups-member-promoted',0),(153,'groups-membership-request','groups-membership-request',0),(154,'messages-unread','messages-unread',0),(155,'settings-verify-email-change','settings-verify-email-change',0),(156,'groups-membership-request-accepted','groups-membership-request-accepted',0),(157,'groups-membership-request-rejected','groups-membership-request-rejected',0),(158,'Top Menu for cart and account','top-menu-for-cart-and-account',0),(159,'QiuyingZhou','cap-qiuyingzhou',0),(160,'rileydong','cap-undefined-2',0),(161,'wplms_support','cap-wplms_support',0),(162,'syllable','syllable',0),(163,'Beginner','beginner',0),(164,'qianyu668899','cap-qianyu668899',0),(165,'Tigress','cap-tigress',0),(166,'onsite','onsite',0),(167,'beginner','beginner',0),(168,'cooperative','cooperative',0),(169,'discount','discount',0),(170,'onsite','onsite',0),(171,'huawei','huawei',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

