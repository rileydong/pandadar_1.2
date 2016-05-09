
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
DROP TABLE IF EXISTS `wp_pmpro_membership_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_pmpro_membership_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `session_id` varchar(64) NOT NULL DEFAULT '',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `membership_id` int(11) unsigned NOT NULL DEFAULT '0',
  `paypal_token` varchar(64) NOT NULL DEFAULT '',
  `billing_name` varchar(128) NOT NULL DEFAULT '',
  `billing_street` varchar(128) NOT NULL DEFAULT '',
  `billing_city` varchar(128) NOT NULL DEFAULT '',
  `billing_state` varchar(32) NOT NULL DEFAULT '',
  `billing_zip` varchar(16) NOT NULL DEFAULT '',
  `billing_country` varchar(128) NOT NULL,
  `billing_phone` varchar(32) NOT NULL,
  `subtotal` varchar(16) NOT NULL DEFAULT '',
  `tax` varchar(16) NOT NULL DEFAULT '',
  `couponamount` varchar(16) NOT NULL DEFAULT '',
  `certificate_id` int(11) NOT NULL DEFAULT '0',
  `certificateamount` varchar(16) NOT NULL DEFAULT '',
  `total` varchar(16) NOT NULL DEFAULT '',
  `payment_type` varchar(64) NOT NULL DEFAULT '',
  `cardtype` varchar(32) NOT NULL DEFAULT '',
  `accountnumber` varchar(32) NOT NULL DEFAULT '',
  `expirationmonth` char(2) NOT NULL DEFAULT '',
  `expirationyear` varchar(4) NOT NULL DEFAULT '',
  `status` varchar(32) NOT NULL DEFAULT '',
  `gateway` varchar(64) NOT NULL,
  `gateway_environment` varchar(64) NOT NULL,
  `payment_transaction_id` varchar(64) NOT NULL,
  `subscription_transaction_id` varchar(32) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `affiliate_id` varchar(32) NOT NULL,
  `affiliate_subid` varchar(32) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `membership_id` (`membership_id`),
  KEY `status` (`status`),
  KEY `timestamp` (`timestamp`),
  KEY `gateway` (`gateway`),
  KEY `gateway_environment` (`gateway_environment`),
  KEY `payment_transaction_id` (`payment_transaction_id`),
  KEY `subscription_transaction_id` (`subscription_transaction_id`),
  KEY `affiliate_id` (`affiliate_id`),
  KEY `affiliate_subid` (`affiliate_subid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_pmpro_membership_orders` WRITE;
/*!40000 ALTER TABLE `wp_pmpro_membership_orders` DISABLE KEYS */;
INSERT INTO `wp_pmpro_membership_orders` VALUES (1,'8A88159C52','jqm8abuugom7tgieag3542lh44',1,8,'','','','','','','','','0','0','',0,'','0','','','','','','','free','sandbox','','','2016-02-10 11:33:00','','',''),(2,'BDF1C9A64A','gokj4l098hbq5q0c6pegtjdk71',101,5,'','','','','','','','','','0','',0,'','0','','','','','','','free','sandbox','','','2016-02-26 17:43:06','','',''),(3,'4FA28CAE92','iqru0n74ilthjvj984qe2vr0l2',96,3,'','','','','','','','','','0','',0,'','0','','','','','','','free','sandbox','','','2016-02-27 04:33:48','','','');
/*!40000 ALTER TABLE `wp_pmpro_membership_orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

