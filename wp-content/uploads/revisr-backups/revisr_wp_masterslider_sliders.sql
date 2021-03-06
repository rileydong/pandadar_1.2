
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
DROP TABLE IF EXISTS `wp_masterslider_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_masterslider_sliders` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slides_num` smallint(5) unsigned NOT NULL,
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_styles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_fonts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`ID`),
  KEY `date_created` (`date_created`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_masterslider_sliders` WRITE;
/*!40000 ALTER TABLE `wp_masterslider_sliders` DISABLE KEYS */;
INSERT INTO `wp_masterslider_sliders` VALUES (1,'Simple Autoplay Slider','custom',3,'2016-01-12 21:04:39','2016-01-13 00:13:56','eyJtZXRhIjp7IlNldHRpbmdzIWlkcyI6IjEiLCJTZXR0aW5ncyFuZXh0SWQiOjIsIlNsaWRlIWlkcyI6IjE4LDE5LDIwIiwiU2xpZGUhbmV4dElkIjoyMSwiQ29udHJvbCFpZHMiOiI3IiwiQ29udHJvbCFuZXh0SWQiOjh9LCJNU1BhbmVsLlNldHRpbmdzIjp7IjEiOiJ7XCJpZFwiOlwiMVwiLFwic25hcHBpbmdcIjp0cnVlLFwiZGlzYWJsZUNvbnRyb2xzXCI6ZmFsc2UsXCJuYW1lXCI6XCJTaW1wbGUgQXV0b3BsYXkgU2xpZGVyXCIsXCJ3cmFwcGVyV2lkdGhcIjo4MDAsXCJ3cmFwcGVyV2lkdGhVbml0XCI6XCJweFwiLFwiYXV0b0Nyb3BcIjpmYWxzZSxcInR5cGVcIjpcImN1c3RvbVwiLFwic2xpZGVySWRcIjpcIjFcIixcImxheW91dFwiOlwiZnVsbHdpZHRoXCIsXCJhdXRvSGVpZ2h0XCI6ZmFsc2UsXCJ0clZpZXdcIjpcImJhc2ljXCIsXCJzcGVlZFwiOjE1LFwic3BhY2VcIjo1MCxcInN0YXJ0XCI6MSxcImdyYWJDdXJzb3JcIjp0cnVlLFwic3dpcGVcIjp0cnVlLFwibW91c2VcIjp0cnVlLFwid2hlZWxcIjp0cnVlLFwiYXV0b3BsYXlcIjp0cnVlLFwibG9vcFwiOnRydWUsXCJzaHVmZmxlXCI6ZmFsc2UsXCJwcmVsb2FkXCI6XCItMVwiLFwib3ZlclBhdXNlXCI6ZmFsc2UsXCJlbmRQYXVzZVwiOmZhbHNlLFwiaGlkZUxheWVyc1wiOmZhbHNlLFwiZGlyXCI6XCJ2XCIsXCJwYXJhbGxheE1vZGVcIjpcInN3aXBlXCIsXCJ1c2VEZWVwTGlua1wiOmZhbHNlLFwiZGVlcExpbmtUeXBlXCI6XCJwYXRoXCIsXCJzdGFydE9uQXBwZWFyXCI6dHJ1ZSxcInNjcm9sbFBhcmFsbGF4TW92ZVwiOjMwLFwic2Nyb2xsUGFyYWxsYXhCR01vdmVcIjo1MCxcInNjcm9sbFBhcmFsbGF4RmFkZVwiOnRydWUsXCJjZW50ZXJDb250cm9sc1wiOnRydWUsXCJpbnN0YW50U2hvd0xheWVyc1wiOmZhbHNlLFwiY2xhc3NOYW1lXCI6XCJyZXNwb25zaXZlXCIsXCJiZ0NvbG9yXCI6XCJyZ2JhKDAsIDAsIDAsIDApXCIsXCJjdXN0b21TdHlsZVwiOlwiXCIsXCJza2luXCI6XCJtcy1za2luLWxpZ2h0LTNcIixcIm1zVGVtcGxhdGVcIjpcImN1c3RvbVwiLFwibXNUZW1wbGF0ZUNsYXNzXCI6XCJcIixcInVzZWRGb250c1wiOlwiXCJ9In0sIk1TUGFuZWwuU2xpZGUiOnsiMTgiOiJ7XCJpZFwiOjE4LFwidGltZWxpbmVfaFwiOjIwMCxcImJnVGh1bWJcIjpcIi8yMDE2LzAxL3Nsb2dhbjEtMTUweDE1MC5wbmdcIixcIm9yZGVyXCI6MCxcImJnXCI6XCIvMjAxNi8wMS9zbG9nYW4xLnBuZ1wiLFwiZHVyYXRpb25cIjpcIjNcIixcImZpbGxNb2RlXCI6XCJjZW50ZXJcIixcImluZm9cIjpcIjxpbWcgY2xhc3M9XFxcImFsaWdubm9uZSBzaXplLWZ1bGwgd3AtaW1hZ2UtMjQxMFxcXCIgc3JjPVxcXCJodHRwOi8vMTkyLjI0MS4xNzMuMjMyL3dvcmRwcmVzcy93cC1jb250ZW50L3VwbG9hZHMvMjAxNC8wMi9nYXZhdGFyX3lvdS5wbmdcXFwiIGFsdD1cXFwiZ2F2YXRhcl95b3VcXFwiIHdpZHRoPVxcXCIzMzNcXFwiIGhlaWdodD1cXFwiMzM0XFxcIiAvPlwiLFwiYmdDb2xvclwiOlwicmdiYSgxMjQsIDExMywgMTEzLCAwKVwiLFwiYmd2X2ZpbGxtb2RlXCI6XCJmaWxsXCIsXCJiZ3ZfbG9vcFwiOlwiMVwiLFwiYmd2X211dGVcIjpcIjFcIixcImJndl9hdXRvcGF1c2VcIjpcIlwiLFwiY3NzQ2xhc3NcIjpcInJlc3BvbnNpdmVcIixcImJnQWx0XCI6XCJcIixcImxheWVyX2lkc1wiOltdfSIsIjE5Ijoie1wiaWRcIjoxOSxcInRpbWVsaW5lX2hcIjoyMDAsXCJiZ1RodW1iXCI6XCIvMjAxNi8wMS9zbG9nYW4yLTE1MHgxNTAucG5nXCIsXCJvcmRlclwiOjEsXCJiZ1wiOlwiLzIwMTYvMDEvc2xvZ2FuMi5wbmdcIixcImR1cmF0aW9uXCI6XCIzXCIsXCJmaWxsTW9kZVwiOlwiY2VudGVyXCIsXCJiZ0NvbG9yXCI6XCJyZ2JhKDEyNCwgMTEzLCAxMTMsIDApXCIsXCJiZ3ZfZmlsbG1vZGVcIjpcImZpbGxcIixcImJndl9sb29wXCI6XCIxXCIsXCJiZ3ZfbXV0ZVwiOlwiMVwiLFwiYmd2X2F1dG9wYXVzZVwiOlwiXCIsXCJiZ0FsdFwiOlwiXCIsXCJsYXllcl9pZHNcIjpbXX0iLCIyMCI6IntcImlkXCI6MjAsXCJ0aW1lbGluZV9oXCI6MjAwLFwiYmdUaHVtYlwiOlwiLzIwMTYvMDEvc2xvZ2FuMy0xNTB4MTUwLnBuZ1wiLFwib3JkZXJcIjoyLFwiYmdcIjpcIi8yMDE2LzAxL3Nsb2dhbjMucG5nXCIsXCJkdXJhdGlvblwiOjEsXCJmaWxsTW9kZVwiOlwiY2VudGVyXCIsXCJpbmZvXCI6XCJ0ZXh0IHRleHQgdGV4XCIsXCJiZ0NvbG9yXCI6XCJyZ2JhKDEyNCwgMTEzLCAxMTMsIDApXCIsXCJjb2xvck92ZXJsYXlcIjpudWxsLFwiYmd2X2ZpbGxtb2RlXCI6XCJmaWxsXCIsXCJiZ3ZfbG9vcFwiOlwiMVwiLFwiYmd2X211dGVcIjpcIjFcIixcImJndl9hdXRvcGF1c2VcIjpcIlwiLFwiYmdBbHRcIjpcIlwiLFwibGF5ZXJfaWRzXCI6W119In0sIk1TUGFuZWwuQ29udHJvbCI6eyI3Ijoie1wiaWRcIjo3LFwibGFiZWxcIjpcIkJ1bGxldHNcIixcIm5hbWVcIjpcImJ1bGxldHNcIixcImF1dG9IaWRlXCI6dHJ1ZSxcIm92ZXJWaWRlb1wiOnRydWUsXCJtYXJnaW5cIjoxMCxcImRpclwiOlwiaFwiLFwic3BhY2VcIjo2LFwiYWxpZ25cIjpcImJvdHRvbVwiLFwiaW5zZXRcIjp0cnVlLFwiaGlkZVVuZGVyXCI6MTA4MH0ifX0=','','','published');
/*!40000 ALTER TABLE `wp_masterslider_sliders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

