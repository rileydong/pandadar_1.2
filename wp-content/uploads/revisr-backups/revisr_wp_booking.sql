
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
DROP TABLE IF EXISTS `wp_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_booking` (
  `booking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sync_gid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_new` bigint(10) NOT NULL DEFAULT '1',
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort_date` datetime DEFAULT NULL,
  `modification_date` datetime DEFAULT NULL,
  `form` text COLLATE utf8mb4_unicode_ci,
  `booking_type` bigint(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_booking` WRITE;
/*!40000 ALTER TABLE `wp_booking` DISABLE KEYS */;
INSERT INTO `wp_booking` VALUES (5,'',0,'','2016-01-15 00:00:00','2016-01-01 20:20:24','text^name1^test-student~text^secondname1^6138902361~email^email1^xiaoxi.dong@pandadar.com~select-one^visitors1^2pm - 5pm ~text^phone1^ottawa~textarea^details1^asssd',1),(6,'',0,'','2016-02-29 00:00:00','2016-01-01 20:23:57','text^name1^test-student~text^secondname1^3dgfgsdfg~email^email1^dongxiaoxi@pandadar.com~select-one^visitors1^6am - 9am ~text^phone1^nyc~textarea^details1^',1),(7,'',1,'','2016-02-18 00:00:00','2016-02-12 18:09:34','email^email1^pandadartouch@gmail.com~select-one^visitors1^4pm-5pm~text^phone1^GMT-5',1);
/*!40000 ALTER TABLE `wp_booking` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

