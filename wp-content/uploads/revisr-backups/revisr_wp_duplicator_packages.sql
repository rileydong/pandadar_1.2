
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
DROP TABLE IF EXISTS `wp_duplicator_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_duplicator_packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner` varchar(60) NOT NULL,
  `package` mediumblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_duplicator_packages` WRITE;
/*!40000 ALTER TABLE `wp_duplicator_packages` DISABLE KEYS */;
INSERT INTO `wp_duplicator_packages` VALUES (1,'20160402_pandadar','572b7c7a25fec6294160505130146',100,'2016-05-05 17:02:43','rileydong','O:11:\"DUP_Package\":21:{s:2:\"ID\";i:1;s:4:\"Name\";s:17:\"20160402_pandadar\";s:4:\"Hash\";s:29:\"572b7c7a25fec6294160505130146\";s:8:\"NameHash\";s:47:\"20160402_pandadar_572b7c7a25fec6294160505130146\";s:7:\"Version\";s:5:\"1.1.6\";s:9:\"VersionWP\";s:5:\"4.4.2\";s:9:\"VersionDB\";s:23:\"5.6.30-0ubuntu0.14.04.1\";s:10:\"VersionPHP\";s:17:\"5.5.9-1ubuntu4.16\";s:4:\"Type\";i:0;s:5:\"Notes\";s:0:\"\";s:9:\"StorePath\";s:40:\"/var/www/html/wordpress/wp-snapshots/tmp\";s:8:\"StoreURL\";s:44:\"https://pandadar.com/wordpress/wp-snapshots/\";s:8:\"ScanFile\";s:57:\"20160402_pandadar_572b7c7a25fec6294160505130146_scan.json\";s:7:\"Runtime\";s:11:\"213.16 sec.\";s:7:\"ExeSize\";s:8:\"319.25KB\";s:7:\"ZipSize\";s:6:\"1.85GB\";s:6:\"Status\";N;s:6:\"WPUser\";s:9:\"rileydong\";s:7:\"Archive\";O:11:\"DUP_Archive\":13:{s:10:\"FilterDirs\";s:0:\"\";s:10:\"FilterExts\";s:0:\"\";s:13:\"FilterDirsAll\";a:0:{}s:13:\"FilterExtsAll\";a:0:{}s:8:\"FilterOn\";i:0;s:4:\"File\";s:59:\"20160402_pandadar_572b7c7a25fec6294160505130146_archive.zip\";s:6:\"Format\";s:3:\"ZIP\";s:7:\"PackDir\";s:23:\"/var/www/html/wordpress\";s:4:\"Size\";i:1987427299;s:4:\"Dirs\";a:0:{}s:5:\"Files\";a:0:{}s:10:\"FilterInfo\";O:23:\"DUP_Archive_Filter_Info\":6:{s:4:\"Dirs\";O:34:\"DUP_Archive_Filter_Scope_Directory\":4:{s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:5:\"Files\";O:29:\"DUP_Archive_Filter_Scope_File\":5:{s:4:\"Size\";a:0:{}s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:4:\"Exts\";O:29:\"DUP_Archive_Filter_Scope_Base\":2:{s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:9:\"UDirCount\";i:0;s:10:\"UFileCount\";i:0;s:9:\"UExtCount\";i:0;}s:10:\"\0*\0Package\";r:1;}s:9:\"Installer\";O:13:\"DUP_Installer\":12:{s:4:\"File\";s:61:\"20160402_pandadar_572b7c7a25fec6294160505130146_installer.php\";s:4:\"Size\";i:326917;s:10:\"OptsDBHost\";s:0:\"\";s:10:\"OptsDBPort\";s:0:\"\";s:10:\"OptsDBName\";s:0:\"\";s:10:\"OptsDBUser\";s:0:\"\";s:12:\"OptsSSLAdmin\";i:0;s:12:\"OptsSSLLogin\";i:0;s:11:\"OptsCacheWP\";i:0;s:13:\"OptsCachePath\";i:0;s:10:\"OptsURLNew\";s:0:\"\";s:10:\"\0*\0Package\";r:1;}s:8:\"Database\";O:12:\"DUP_Database\":12:{s:4:\"Type\";s:5:\"MySQL\";s:4:\"Size\";i:6967821;s:4:\"File\";s:60:\"20160402_pandadar_572b7c7a25fec6294160505130146_database.sql\";s:4:\"Path\";N;s:12:\"FilterTables\";s:0:\"\";s:8:\"FilterOn\";i:0;s:4:\"Name\";N;s:10:\"Compatible\";s:0:\"\";s:10:\"\0*\0Package\";r:1;s:25:\"\0DUP_Database\0dbStorePath\";s:101:\"/var/www/html/wordpress/wp-snapshots/tmp/20160402_pandadar_572b7c7a25fec6294160505130146_database.sql\";s:23:\"\0DUP_Database\0EOFMarker\";s:0:\"\";s:26:\"\0DUP_Database\0networkFlush\";b:0;}}'),(2,'20160402_pandadar','572b7e6dde5262275160505131005',100,'2016-05-05 17:10:20','liyu','O:11:\"DUP_Package\":21:{s:2:\"ID\";i:2;s:4:\"Name\";s:17:\"20160402_pandadar\";s:4:\"Hash\";s:29:\"572b7e6dde5262275160505131005\";s:8:\"NameHash\";s:47:\"20160402_pandadar_572b7e6dde5262275160505131005\";s:7:\"Version\";s:5:\"1.1.6\";s:9:\"VersionWP\";s:5:\"4.4.2\";s:9:\"VersionDB\";s:23:\"5.6.30-0ubuntu0.14.04.1\";s:10:\"VersionPHP\";s:17:\"5.5.9-1ubuntu4.16\";s:4:\"Type\";i:0;s:5:\"Notes\";s:0:\"\";s:9:\"StorePath\";s:40:\"/var/www/html/wordpress/wp-snapshots/tmp\";s:8:\"StoreURL\";s:44:\"https://pandadar.com/wordpress/wp-snapshots/\";s:8:\"ScanFile\";s:57:\"20160402_pandadar_572b7e6dde5262275160505131005_scan.json\";s:7:\"Runtime\";s:11:\"211.02 sec.\";s:7:\"ExeSize\";s:8:\"319.25KB\";s:7:\"ZipSize\";s:6:\"1.85GB\";s:6:\"Status\";N;s:6:\"WPUser\";s:4:\"liyu\";s:7:\"Archive\";O:11:\"DUP_Archive\":13:{s:10:\"FilterDirs\";s:0:\"\";s:10:\"FilterExts\";s:0:\"\";s:13:\"FilterDirsAll\";a:0:{}s:13:\"FilterExtsAll\";a:0:{}s:8:\"FilterOn\";i:0;s:4:\"File\";s:59:\"20160402_pandadar_572b7e6dde5262275160505131005_archive.zip\";s:6:\"Format\";s:3:\"ZIP\";s:7:\"PackDir\";s:23:\"/var/www/html/wordpress\";s:4:\"Size\";i:1987428237;s:4:\"Dirs\";a:0:{}s:5:\"Files\";a:0:{}s:10:\"FilterInfo\";O:23:\"DUP_Archive_Filter_Info\":6:{s:4:\"Dirs\";O:34:\"DUP_Archive_Filter_Scope_Directory\":4:{s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:5:\"Files\";O:29:\"DUP_Archive_Filter_Scope_File\":5:{s:4:\"Size\";a:0:{}s:7:\"Warning\";a:0:{}s:10:\"Unreadable\";a:0:{}s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:4:\"Exts\";O:29:\"DUP_Archive_Filter_Scope_Base\":2:{s:4:\"Core\";a:0:{}s:8:\"Instance\";a:0:{}}s:9:\"UDirCount\";i:0;s:10:\"UFileCount\";i:0;s:9:\"UExtCount\";i:0;}s:10:\"\0*\0Package\";r:1;}s:9:\"Installer\";O:13:\"DUP_Installer\":12:{s:4:\"File\";s:61:\"20160402_pandadar_572b7e6dde5262275160505131005_installer.php\";s:4:\"Size\";i:326917;s:10:\"OptsDBHost\";s:0:\"\";s:10:\"OptsDBPort\";s:0:\"\";s:10:\"OptsDBName\";s:0:\"\";s:10:\"OptsDBUser\";s:0:\"\";s:12:\"OptsSSLAdmin\";i:0;s:12:\"OptsSSLLogin\";i:0;s:11:\"OptsCacheWP\";i:0;s:13:\"OptsCachePath\";i:0;s:10:\"OptsURLNew\";s:0:\"\";s:10:\"\0*\0Package\";r:1;}s:8:\"Database\";O:12:\"DUP_Database\":12:{s:4:\"Type\";s:5:\"MySQL\";s:4:\"Size\";i:6989555;s:4:\"File\";s:60:\"20160402_pandadar_572b7e6dde5262275160505131005_database.sql\";s:4:\"Path\";N;s:12:\"FilterTables\";s:0:\"\";s:8:\"FilterOn\";i:0;s:4:\"Name\";N;s:10:\"Compatible\";s:0:\"\";s:10:\"\0*\0Package\";r:1;s:25:\"\0DUP_Database\0dbStorePath\";s:101:\"/var/www/html/wordpress/wp-snapshots/tmp/20160402_pandadar_572b7e6dde5262275160505131005_database.sql\";s:23:\"\0DUP_Database\0EOFMarker\";s:0:\"\";s:26:\"\0DUP_Database\0networkFlush\";b:0;}}');
/*!40000 ALTER TABLE `wp_duplicator_packages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

