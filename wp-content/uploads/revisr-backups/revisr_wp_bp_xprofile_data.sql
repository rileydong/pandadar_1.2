
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
DROP TABLE IF EXISTS `wp_bp_xprofile_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_bp_xprofile_data` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `field_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `value` longtext NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=877 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_bp_xprofile_data` WRITE;
/*!40000 ALTER TABLE `wp_bp_xprofile_data` DISABLE KEYS */;
INSERT INTO `wp_bp_xprofile_data` VALUES (1,1,1,'rileydong','2016-04-06 20:48:57'),(137,24,1,'Femal','2015-12-31 21:08:51'),(138,28,1,'3-9','2015-12-31 21:08:51'),(139,3,1,'it is snowing as if all the snow is falling in one day but the kids are hyper.\r\nHow about I add a picture here or a video.\r\n[youtube https://www.youtube.com/watch?v=WVbQ-oro7FQ&amp;w=320&amp;h=240 ]','2015-12-31 21:08:51'),(140,2,1,'Ottawa','2015-12-31 21:08:51'),(141,5,1,'a:2:{i:0;s:5:\"sport\";i:1;s:7:\"bargain\";}','2015-12-31 21:08:52'),(142,35,1,'a:3:{i:0;s:29:\"TCSOL国际汉语教师资格\";i:1;s:39:\"台湾教育部对外华语师资认证\";i:2;s:30:\"国际汉语教师资格证书\";}','2016-01-01 20:26:24'),(143,4,1,'Chinese for Kids of Chinese Immigrants','2016-01-01 20:26:24'),(144,34,1,'Snow plowers from Kodiak 591 6078 just came to plow my neighbor on the other side of the street. Unfortunately they have left their car in the drive way so it saved Kodiak guy some 30 seconds to clean half of the drive way. Why do they come at all since the snow fall does not seem to be more than 5cm anyways. Bad I need to clean Chris\\\' driveway again. I am going to only make a pathway for myself this time.','2016-01-01 20:26:24'),(145,46,1,'I cleaned two drive ways and moved the mountain','2016-01-01 20:26:24'),(161,47,1,'a:1:{i:0;s:29:\"TCSOL国际汉语教师资格\";}','2016-01-07 06:10:37'),(162,56,1,'a:1:{i:0;s:16:\"Heritage Chinese\";}','2016-01-07 06:10:37'),(163,59,1,'teaching chinese is not teaching chinese it is teaching  a way of behave and a set of phylosophy to act upon so there is no language learning alone.\r\nbesides who need a new langugae if you only want to translate word to word. use a dictionary. setence to sentence ,google translate. why bother.\r\nit is the subtle jokes and local jewel makes learning language a inspiring journey so do not think you are learning chinese','2016-01-07 06:10:37'),(164,60,1,'you are learning a lot more than that\r\nso be prepared, it is going to be much harder to learn.','2016-01-07 06:10:37'),(203,1,42,'Christine','2016-01-18 19:52:44'),(204,61,42,'female','2016-01-12 03:40:02'),(205,28,42,'1913-07-14 00:00:00','2016-01-12 03:40:02'),(206,66,42,'Beginner','2016-01-12 03:40:02'),(207,2,42,'ottawa','2016-01-12 03:40:02'),(208,1,43,'shan','2016-01-14 19:19:19'),(209,61,43,'female','2016-01-14 19:19:19'),(210,28,43,'2037-01-03 00:00:00','2016-01-14 19:19:19'),(211,66,43,'Beginner','2016-01-14 19:19:19'),(212,2,43,'o','2016-01-14 19:19:19'),(213,5,43,'a:2:{i:0;s:5:\"sport\";i:1;s:3:\"art\";}','2016-01-14 19:19:19'),(221,66,48,'Beginner Level','2016-01-24 14:49:17'),(222,2,48,'AZ','2016-01-24 14:49:17'),(223,1,48,'stephenrminkin','2016-01-24 23:00:45'),(231,1,51,'wplms_support','2016-04-07 03:53:24'),(250,78,61,'gang','2016-01-31 05:28:29'),(251,1,61,'gang','2016-01-31 05:30:04'),(264,78,68,'ffafa','2016-02-02 21:27:07'),(265,1,68,'fafa','2016-03-09 02:16:47'),(274,78,73,'Helen','2016-02-02 22:51:14'),(275,1,73,'helen3110','2016-02-02 22:57:32'),(276,78,74,'new panda','2016-02-03 22:41:46'),(277,1,74,'newpanda','2016-02-04 08:17:54'),(278,78,75,'wawa','2016-02-09 16:12:36'),(279,1,75,'wawa','2016-03-03 00:24:31'),(284,1,79,'claire','2016-04-27 17:05:53'),(295,78,84,'SeanMama','2016-02-24 17:20:41'),(296,1,84,'seanmama','2016-02-24 17:22:33'),(299,78,86,'Sue','2016-02-25 02:17:49'),(300,1,86,'cherish','2016-02-25 02:19:10'),(306,78,90,'xue','2016-02-25 19:47:20'),(307,1,90,'helenxue','2016-02-25 19:49:54'),(315,78,94,'Tigress','2016-02-25 20:18:54'),(316,1,94,'tigress','2016-02-25 20:18:54'),(321,78,97,'Polar_bear','2016-02-26 03:45:05'),(322,1,97,'david-stewart','2016-02-26 03:45:05'),(323,78,98,'Lmcgeko','2016-02-26 23:25:29'),(324,1,98,'lmcgeko','2016-02-26 23:25:29'),(325,78,99,'John','2016-02-27 00:05:10'),(326,1,99,'johnwasteneys','2016-02-27 00:05:10'),(329,78,101,'Fabien','2016-02-27 02:58:47'),(330,1,101,'fabien','2016-02-27 02:58:47'),(337,78,105,'Lily2016','2016-02-29 17:48:16'),(338,1,105,'lily2016','2016-02-29 17:48:16'),(341,78,107,'Ms Ji','2016-03-02 14:32:23'),(342,1,107,'leighji','2016-03-02 14:32:23'),(343,78,108,'Kaijing','2016-03-02 16:15:15'),(344,1,108,'kaijing','2016-03-09 02:59:56'),(345,78,109,'刘老师','2016-03-02 23:12:53'),(346,1,109,'janeliu','2016-03-02 23:12:53'),(351,78,112,'Qiuying Zhou','2016-03-04 03:22:51'),(352,1,112,'qiuyingzhou','2016-04-26 01:45:04'),(353,78,113,'yqian','2016-03-05 17:27:59'),(354,1,113,'qianyu668899','2016-03-05 17:27:59'),(355,78,114,'ZM','2016-03-09 03:19:50'),(356,1,114,'deangelohornun','2016-03-19 13:16:15'),(359,78,116,'Joy','2016-03-09 07:28:35'),(360,1,116,'joyhtang','2016-03-09 07:28:35'),(383,78,128,'OE','2016-03-10 10:54:13'),(384,1,128,'myrnadendy4462','2016-03-10 10:54:13'),(385,78,129,'CO','2016-03-10 17:16:47'),(386,1,129,'judsoncrume758','2016-03-10 17:16:47'),(387,78,130,'YN','2016-03-11 01:20:57'),(388,1,130,'harriettmckedd','2016-03-11 01:20:57'),(391,78,132,'WB','2016-03-11 05:46:29'),(392,1,132,'maritzafink461','2016-03-11 05:46:29'),(403,78,138,'Mark','2016-03-12 16:06:30'),(404,1,138,'bobzl','2016-03-12 16:06:30'),(409,78,141,'QT','2016-03-13 02:23:50'),(410,1,141,'frank982668176','2016-03-13 02:23:50'),(411,78,142,'MY','2016-03-13 02:36:13'),(412,1,142,'christina77105','2016-03-13 02:36:13'),(420,78,147,'AT','2016-03-14 10:41:02'),(421,1,147,'claritaa819325','2016-03-14 10:41:02'),(422,78,148,'HN','2016-03-14 11:42:38'),(423,1,148,'lurleneortega','2016-03-14 11:42:38'),(424,78,149,'DO','2016-03-14 14:38:13'),(425,1,149,'christopherbob','2016-03-14 14:38:14'),(426,78,150,'DB','2016-03-14 17:52:17'),(427,1,150,'mirtasasse1240','2016-03-14 17:52:17'),(428,78,151,'WF','2016-03-14 23:17:27'),(429,1,151,'adelinepirkle','2016-03-14 23:17:27'),(432,78,153,'VP','2016-03-14 23:20:18'),(433,1,153,'mellisabiddell','2016-03-14 23:20:18'),(434,78,154,'UF','2016-03-15 03:29:39'),(435,1,154,'linettewaterfi','2016-03-15 03:29:39'),(436,78,155,'WZ','2016-03-15 04:08:43'),(437,1,155,'jannienanson24','2016-03-15 04:08:43'),(438,78,156,'FS','2016-03-15 11:31:40'),(439,1,156,'lazaroa5606674','2016-03-15 11:31:40'),(440,78,157,'DL','2016-03-15 12:14:59'),(441,1,157,'elvahovell9348','2016-03-15 12:14:59'),(442,78,158,'SI','2016-03-15 12:31:30'),(443,1,158,'robtwhitfeld43','2016-03-15 12:31:30'),(444,78,159,'IT','2016-03-15 13:15:17'),(445,1,159,'aileenranking0','2016-03-15 13:15:17'),(448,78,161,'IZ','2016-03-15 14:11:05'),(449,1,161,'antoinettelist','2016-03-15 14:11:05'),(450,78,162,'OS','2016-03-15 14:49:06'),(451,1,162,'marylyn88y3895','2016-03-15 14:49:06'),(452,78,163,'NY','2016-03-15 15:28:15'),(453,1,163,'davisflaherty1','2016-03-15 15:28:15'),(454,78,164,'US','2016-03-15 15:54:18'),(455,1,164,'luthergreathou','2016-03-15 15:54:18'),(456,78,165,'UQ','2016-03-15 16:17:21'),(457,1,165,'katricemanson','2016-03-15 16:17:21'),(458,78,166,'XG','2016-03-15 16:20:31'),(459,1,166,'jarrodkuykenda','2016-03-15 16:20:31'),(464,78,169,'FG','2016-03-15 17:09:25'),(465,1,169,'olivemclellan','2016-03-15 17:09:25'),(468,78,171,'ME','2016-03-15 17:33:16'),(469,1,171,'marilynn822515','2016-03-15 17:33:16'),(470,78,172,'HH','2016-03-15 18:21:26'),(471,1,172,'alliejudge0799','2016-03-15 18:21:26'),(474,78,174,'EW','2016-03-15 20:17:17'),(475,1,174,'moracuming979','2016-03-15 20:17:17'),(476,78,175,'AV','2016-03-15 20:50:44'),(477,1,175,'mellisaalcanta','2016-03-15 20:50:44'),(478,78,176,'SA','2016-03-15 21:06:33'),(479,1,176,'karla455438534','2016-03-15 21:06:33'),(480,78,177,'IJ','2016-03-15 22:07:37'),(481,1,177,'wendimontalvo7','2016-03-15 22:07:37'),(486,78,180,'VB','2016-03-16 00:18:26'),(487,1,180,'reinatunneclif','2016-03-16 00:18:26'),(488,78,181,'GG','2016-03-16 01:22:49'),(489,1,181,'alfiejefferies','2016-03-16 01:22:49'),(490,78,182,'PB','2016-03-16 01:35:08'),(491,1,182,'tiffinychabril','2016-03-16 01:35:08'),(492,78,183,'EG','2016-03-16 02:17:10'),(493,1,183,'gladysd6948876','2016-03-16 02:17:10'),(496,78,185,'XD','2016-03-16 04:20:46'),(497,1,185,'uaymargart363','2016-03-16 04:20:46'),(504,78,189,'CB','2016-03-16 08:23:37'),(505,1,189,'michell13c8907','2016-03-16 08:23:37'),(506,78,190,'EX','2016-03-16 08:24:01'),(507,1,190,'andramenard502','2016-03-16 08:24:01'),(510,78,192,'YA','2016-03-16 10:56:19'),(511,1,192,'loviemorwood76','2016-03-16 10:56:19'),(512,78,193,'BZ','2016-03-16 11:38:29'),(513,1,193,'judeeck0906954','2016-03-16 11:38:29'),(514,78,194,'DZ','2016-03-16 12:06:42'),(515,1,194,'adriannakater8','2016-03-16 12:06:42'),(516,78,195,'MK','2016-03-16 12:13:01'),(517,1,195,'danelabonte339','2016-03-16 12:13:01'),(520,78,197,'TN','2016-03-16 13:53:19'),(521,1,197,'torywestbrook8','2016-03-16 13:53:19'),(522,78,198,'EA','2016-03-16 14:13:19'),(523,1,198,'shellyblackwel','2016-03-16 14:13:19'),(528,78,201,'TC','2016-03-16 17:37:44'),(529,1,201,'kathipaulk146','2016-03-16 17:37:44'),(530,78,202,'BO','2016-03-16 20:42:41'),(531,1,202,'christelbirkbe','2016-03-16 20:42:41'),(532,78,203,'DE','2016-03-16 22:37:00'),(533,1,203,'magnoliapriest','2016-03-16 22:37:00'),(536,78,205,'FM','2016-03-17 01:28:20'),(537,1,205,'carolyntorr596','2016-03-17 01:28:20'),(540,78,207,'HX','2016-03-17 03:46:45'),(541,1,207,'hyekeenum55387','2016-03-17 03:46:45'),(542,78,208,'VV','2016-03-17 03:52:24'),(543,1,208,'chandacreed027','2016-03-17 03:52:24'),(544,78,209,'ZV','2016-03-17 04:47:57'),(545,1,209,'waldorather794','2016-03-17 04:47:57'),(546,78,210,'DI','2016-03-17 05:56:53'),(547,1,210,'robbywhited649','2016-03-17 05:56:53'),(548,78,211,'HI','2016-03-17 08:49:23'),(549,1,211,'willisbechtel6','2016-03-17 08:49:23'),(550,78,212,'MJ','2016-03-17 08:58:05'),(551,1,212,'margheritafund','2016-03-17 08:58:05'),(552,78,213,'RO','2016-03-17 12:08:23'),(553,1,213,'elizbethsverje','2016-03-17 12:08:23'),(554,78,214,'YG','2016-03-17 13:32:41'),(555,1,214,'jenifer16j5111','2016-03-17 13:32:41'),(556,78,215,'ZU','2016-03-17 17:17:59'),(557,1,215,'perryfenston46','2016-03-17 17:17:59'),(558,78,216,'RG','2016-03-17 18:07:14'),(559,1,216,'ztdvictor64057','2016-03-17 18:07:14'),(560,78,217,'Ming','2016-03-17 19:42:15'),(561,1,217,'popoming','2016-03-17 19:42:15'),(564,78,219,'OL','2016-03-18 14:17:28'),(565,1,219,'juanapalmore98','2016-03-18 14:17:28'),(566,78,220,'HV','2016-03-18 15:23:55'),(567,1,220,'chaumilton3465','2016-03-18 15:23:55'),(572,78,223,'QN','2016-03-18 21:50:32'),(573,1,223,'annisnicastro2','2016-03-18 21:50:32'),(576,78,225,'VR','2016-03-19 02:02:11'),(577,1,225,'thad03q9175222','2016-03-19 02:02:12'),(584,78,229,'VD','2016-03-19 04:43:23'),(585,1,229,'glendasaldivar','2016-03-19 04:43:23'),(586,78,230,'QC','2016-03-19 05:32:39'),(587,1,230,'teddysilvers10','2016-03-19 05:32:39'),(590,78,232,'MJ','2016-03-19 15:09:28'),(591,1,232,'lettie25643542','2016-03-19 15:09:28'),(594,78,234,'MN','2016-03-19 16:51:34'),(595,1,234,'wiltonbottomle','2016-03-19 16:51:34'),(596,78,235,'FF','2016-03-19 16:51:37'),(597,1,235,'jerrygeils4560','2016-03-19 16:51:37'),(606,78,240,'IN','2016-03-19 23:06:05'),(607,1,240,'fredrickhirsch','2016-03-19 23:06:05'),(608,78,241,'WA','2016-03-20 02:36:31'),(609,1,241,'ivanu06624656','2016-03-20 02:36:31'),(612,78,243,'YC','2016-03-20 13:07:29'),(613,1,243,'freda25t577741','2016-03-20 13:07:29'),(614,78,244,'UJ','2016-03-20 17:48:32'),(615,1,244,'morris94122137','2016-03-20 17:48:32'),(616,78,245,'JV','2016-03-20 22:07:28'),(617,1,245,'davidburchett1','2016-03-20 22:07:28'),(620,78,247,'QF','2016-03-21 01:34:47'),(621,1,247,'dorotheaellery','2016-03-21 01:34:47'),(624,78,249,'HD','2016-03-21 06:14:43'),(625,1,249,'bernardodarcy0','2016-03-21 06:14:43'),(628,78,251,'TP','2016-03-21 08:53:52'),(629,1,251,'adriannegreenw','2016-03-21 08:53:52'),(634,78,254,'RL','2016-03-21 14:45:17'),(635,1,254,'bdlavery439717','2016-03-21 14:45:17'),(636,78,255,'YU','2016-03-21 21:12:37'),(637,1,255,'olive49o472806','2016-03-21 21:12:37'),(642,78,258,'FI','2016-03-21 23:58:17'),(643,1,258,'steffenbach13','2016-03-21 23:58:17'),(644,78,259,'DA','2016-03-22 01:12:47'),(645,1,259,'minniemccoy298','2016-03-22 01:12:47'),(646,78,260,'JH','2016-03-22 01:58:17'),(647,1,260,'constanceeberh','2016-03-22 01:58:17'),(648,78,261,'DQ','2016-03-22 02:15:24'),(649,1,261,'friedachave146','2016-03-22 02:15:24'),(650,78,262,'LF','2016-03-22 04:00:27'),(651,1,262,'hildamonti5172','2016-03-22 04:00:27'),(652,78,263,'HW','2016-03-22 11:29:13'),(653,1,263,'giaschurr17381','2016-03-22 11:29:13'),(658,78,266,'FT','2016-03-23 08:29:23'),(659,1,266,'milagroshorsem','2016-03-23 08:29:23'),(660,78,267,'FH','2016-03-23 09:21:07'),(661,1,267,'jamilablair842','2016-03-23 09:21:07'),(668,78,271,'EG','2016-03-23 14:34:26'),(669,1,271,'cokrolando5213','2016-03-23 14:34:26'),(670,78,272,'HO','2016-03-23 16:33:15'),(671,1,272,'luislambrick9','2016-03-23 16:33:15'),(672,78,273,'HS','2016-03-24 03:57:45'),(673,1,273,'ermelindaheath','2016-03-24 03:57:45'),(674,78,274,'FX','2016-03-24 07:29:24'),(675,1,274,'demetriasoward','2016-03-24 07:29:24'),(678,78,276,'OE','2016-03-24 13:16:26'),(679,1,276,'carmenkossak1','2016-03-24 13:16:26'),(680,78,277,'UZ','2016-03-24 13:54:34'),(681,1,277,'melody96735831','2016-03-24 13:54:34'),(684,78,279,'KW','2016-03-24 21:00:43'),(685,1,279,'clemmieochoa8','2016-03-24 21:00:43'),(688,78,281,'ZA','2016-03-25 04:11:04'),(689,1,281,'sheldonmoffet','2016-03-25 04:11:04'),(692,78,283,'EY','2016-03-25 08:14:00'),(693,1,283,'annetta45s5910','2016-03-25 08:14:00'),(694,78,284,'VG','2016-03-25 12:05:29'),(695,1,284,'michelemji511','2016-03-25 12:05:29'),(696,78,285,'RI','2016-03-25 13:40:02'),(697,1,285,'meghanshilling','2016-03-25 13:40:02'),(700,78,287,'PH','2016-03-25 21:59:16'),(701,1,287,'tcrkam18146471','2016-03-25 21:59:16'),(702,78,288,'PO','2016-03-25 22:37:44'),(703,1,288,'joestephen656','2016-03-25 22:37:45'),(708,78,291,'trisapeace','2016-03-26 03:58:39'),(709,1,291,'trisapeacegmail-com','2016-03-26 03:58:39'),(716,78,295,'DQ','2016-03-26 22:56:16'),(717,1,295,'lornaiverson99','2016-03-26 22:56:16'),(718,78,296,'PK','2016-03-27 08:32:56'),(719,1,296,'marisolfilson4','2016-03-27 08:32:56'),(812,78,342,'Jim','2016-04-03 21:00:00'),(813,1,342,'jims','2016-04-03 21:00:00'),(820,78,346,'Darth123','2016-04-21 12:33:32'),(821,1,346,'darth','2016-04-04 20:36:24'),(822,78,347,'sfy','2016-04-05 13:48:36'),(823,1,347,'sfy1','2016-04-05 13:48:36'),(824,78,348,'Chris','2016-04-05 22:15:39'),(825,1,348,'cjanz','2016-04-05 22:15:39'),(826,78,349,'Cora','2016-04-06 07:23:13'),(827,1,349,'coracao1217','2016-04-06 07:23:14'),(828,78,350,'Patty McKale - Huawei','2016-04-06 19:31:01'),(829,1,350,'pmckalehuawei','2016-04-06 19:31:01'),(830,78,351,'yangjeep','2016-04-07 14:55:44'),(831,1,351,'yangjeep','2016-04-07 14:55:44'),(834,78,353,'limon471','2016-04-09 14:50:59'),(835,1,353,'limon666','2016-04-09 14:50:59'),(836,78,354,'Dave','2016-04-10 12:26:40'),(837,1,354,'davidbutt','2016-04-10 12:26:40'),(840,78,357,'Roger','2016-04-12 14:54:14'),(841,1,357,'rsabbagh','2016-04-12 14:54:14'),(842,78,358,'Craig','2016-04-12 17:50:36'),(843,1,358,'cjsheppard','2016-04-12 17:50:36'),(844,1,356,'Christopher','2016-04-13 01:02:01'),(845,78,359,'Larry','2016-04-13 14:35:14'),(846,1,359,'larrym101','2016-04-13 14:35:14'),(847,78,360,'MEMON MUHAMMAD HAMMAD','2016-04-14 18:35:22'),(848,1,360,'memonmuhammadhammad','2016-04-14 18:35:23'),(849,1,361,'xiaocong ji','2016-04-16 20:01:25'),(850,78,362,'Guy','2016-04-20 15:17:15'),(851,1,362,'gkamendje','2016-04-20 15:17:15'),(852,78,363,'Marques','2016-04-20 17:57:13'),(853,1,363,'marques','2016-04-20 17:57:13'),(854,79,346,'Vader234','2016-04-21 12:33:32'),(858,78,365,'Susan','2016-04-21 20:57:28'),(859,79,365,'Echlin','2016-04-21 20:57:28'),(860,1,365,'aisuan','2016-04-21 20:57:28'),(864,78,367,'David','2016-04-27 15:06:54'),(865,79,367,'Carter','2016-04-27 15:06:54'),(866,1,367,'davida-carter','2016-04-27 20:06:00'),(867,78,368,'xiaoxi','2016-04-28 13:52:14'),(868,79,368,'support','2016-04-28 13:52:14'),(869,1,368,'money','2016-04-28 13:52:14'),(870,1,370,'liyu chen','2016-05-03 20:24:02'),(871,78,371,'Mike','2016-05-05 12:05:55'),(872,79,371,'Lee','2016-05-05 12:05:55'),(873,1,371,'mikelee','2016-05-05 12:05:55'),(874,78,372,'Anton','2016-05-05 12:56:34'),(875,79,372,'Agafonov','2016-05-05 12:56:34'),(876,1,372,'anton','2016-05-05 12:56:34');
/*!40000 ALTER TABLE `wp_bp_xprofile_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

