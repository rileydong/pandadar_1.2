
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
DROP TABLE IF EXISTS `wp_pmpro_memberships_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_pmpro_memberships_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `membership_id` int(11) unsigned NOT NULL,
  `code_id` int(11) unsigned NOT NULL,
  `initial_payment` decimal(10,2) NOT NULL,
  `billing_amount` decimal(10,2) NOT NULL,
  `cycle_number` int(11) NOT NULL,
  `cycle_period` enum('Day','Week','Month','Year') NOT NULL DEFAULT 'Month',
  `billing_limit` int(11) NOT NULL,
  `trial_amount` decimal(10,2) NOT NULL,
  `trial_limit` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `startdate` datetime NOT NULL,
  `enddate` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `membership_id` (`membership_id`),
  KEY `modified` (`modified`),
  KEY `code_id` (`code_id`),
  KEY `enddate` (`enddate`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_pmpro_memberships_users` WRITE;
/*!40000 ALTER TABLE `wp_pmpro_memberships_users` DISABLE KEYS */;
INSERT INTO `wp_pmpro_memberships_users` VALUES (1,1,8,0,0.00,0.00,0,'',0,0.00,0,'inactive','2016-02-10 11:00:33','2016-03-10 20:49:01','2016-03-11 01:49:01'),(2,101,5,0,0.00,0.00,0,'',0,0.00,0,'inactive','2016-02-26 22:06:43','2016-03-10 20:48:45','2016-03-11 01:48:45'),(3,96,3,0,0.00,0.00,0,'',0,0.00,0,'inactive','2016-02-27 09:48:33','2016-03-10 20:48:34','2016-03-11 01:48:34');
/*!40000 ALTER TABLE `wp_pmpro_memberships_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

