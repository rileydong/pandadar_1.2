
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
DROP TABLE IF EXISTS `wp_wcs3_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wcs3_schedule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(20) unsigned NOT NULL,
  `instructor_id` int(20) unsigned NOT NULL,
  `location_id` int(20) unsigned NOT NULL,
  `weekday` int(3) unsigned NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `notes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_wcs3_schedule` WRITE;
/*!40000 ALTER TABLE `wp_wcs3_schedule` DISABLE KEYS */;
INSERT INTO `wp_wcs3_schedule` VALUES (28,4324,4320,4322,6,'22:00:00','22:30:00','America/New_York',1,'<a href=\"https://zoom.us/j/424444981\">Location</a>'),(29,4324,4320,4322,0,'17:00:00','17:30:00','America/New_York',1,'<a href=\"https://zoom.us/j/424444981\">Location</a>'),(30,3922,4328,3865,0,'18:00:00','19:00:00','America/New_York',1,''),(31,3922,4328,3865,3,'18:00:00','19:00:00','America/New_York',1,''),(32,3922,4320,5018,3,'23:30:00','00:00:00','America/New_York',1,''),(35,3922,4320,5018,5,'23:30:00','00:00:00','America/New_York',1,''),(36,5016,4320,5018,5,'18:30:00','19:00:00','America/New_York',1,'');
/*!40000 ALTER TABLE `wp_wcs3_schedule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

