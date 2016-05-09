
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
DROP TABLE IF EXISTS `wp_pmpro_discount_codes_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_pmpro_discount_codes_levels` (
  `code_id` int(11) unsigned NOT NULL,
  `level_id` int(11) unsigned NOT NULL,
  `initial_payment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `billing_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cycle_number` int(11) NOT NULL DEFAULT '0',
  `cycle_period` enum('Day','Week','Month','Year') DEFAULT 'Month',
  `billing_limit` int(11) NOT NULL COMMENT 'After how many cycles should billing stop?',
  `trial_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `trial_limit` int(11) NOT NULL DEFAULT '0',
  `expiration_number` int(10) unsigned NOT NULL,
  `expiration_period` enum('Day','Week','Month','Year') NOT NULL,
  PRIMARY KEY (`code_id`,`level_id`),
  KEY `initial_payment` (`initial_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_pmpro_discount_codes_levels` WRITE;
/*!40000 ALTER TABLE `wp_pmpro_discount_codes_levels` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_pmpro_discount_codes_levels` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

