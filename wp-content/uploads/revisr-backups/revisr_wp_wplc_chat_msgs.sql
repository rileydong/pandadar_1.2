
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
DROP TABLE IF EXISTS `wp_wplc_chat_msgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_wplc_chat_msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_sess_id` int(11) NOT NULL,
  `msgfrom` varchar(150) NOT NULL,
  `msg` varchar(700) NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` int(3) NOT NULL,
  `originates` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_wplc_chat_msgs` WRITE;
/*!40000 ALTER TABLE `wp_wplc_chat_msgs` DISABLE KEYS */;
INSERT INTO `wp_wplc_chat_msgs` VALUES (1,2,'Admin','Welcome. How may I help you?','2016-05-02 10:50:27',1,1),(2,2,'abc','I would like to know more about how this works.','2016-05-02 10:50:48',1,2),(3,2,'Admin','great. Pandadar offers online classes with real teacher','2016-05-02 10:51:45',1,1),(4,139,'Admin','Welcome. How may I help you?','2016-05-05 12:39:59',1,1),(5,139,'Admin','你好','2016-05-05 12:40:07',1,1),(6,139,'jaor','hello','2016-05-05 12:40:19',1,2),(7,139,'Admin','hello again','2016-05-05 12:43:12',1,1),(8,139,'Admin','你有什么需要吗？','2016-05-05 12:43:23',1,1);
/*!40000 ALTER TABLE `wp_wplc_chat_msgs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

