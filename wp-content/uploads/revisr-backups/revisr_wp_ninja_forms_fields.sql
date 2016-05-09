
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
DROP TABLE IF EXISTS `wp_ninja_forms_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_ninja_forms_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `data` longtext NOT NULL,
  `fav_id` int(11) DEFAULT NULL,
  `def_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_ninja_forms_fields` WRITE;
/*!40000 ALTER TABLE `wp_ninja_forms_fields` DISABLE KEYS */;
INSERT INTO `wp_ninja_forms_fields` VALUES (1,1,'_text',0,'a:36:{s:5:\"label\";s:4:\"Name\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:0:\"\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:0:\"\";s:14:\"user_address_2\";s:0:\"\";s:9:\"user_city\";s:0:\"\";s:8:\"user_zip\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:21:\"user_info_field_group\";s:0:\"\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";}',0,0),(2,1,'_text',1,'a:38:{s:5:\"label\";s:5:\"Email\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:0:\"\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"1\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"0\";s:10:\"user_email\";s:1:\"1\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";}',0,14),(3,1,'_textarea',2,'a:19:{s:5:\"label\";s:7:\"Message\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:0:\"\";s:12:\"textarea_rte\";s:1:\"0\";s:14:\"textarea_media\";s:1:\"0\";s:18:\"disable_rte_mobile\";s:1:\"0\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";}',0,0),(5,1,'_submit',3,'a:7:{s:5:\"label\";s:4:\"Send\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',0,0),(7,6,'_submit',10,'a:8:{s:5:\"label\";s:6:\"Submit\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(9,6,'_text',2,'a:40:{s:5:\"label\";s:5:\"Email\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:11:\"_user_email\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"1\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"0\";s:10:\"user_email\";s:1:\"1\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"1\";s:9:\"help_text\";s:70:\"We will contact you about the result, contract and etc via this email.\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:11:\"_user_email\";s:11:\"admin_label\";s:17:\"instructor_signup\";s:26:\"user_info_field_group_name\";s:6:\"custom\";s:28:\"user_info_field_group_custom\";s:6:\"Career\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,14),(11,6,'_textarea',7,'a:19:{s:5:\"label\";s:16:\"Bio 个人简历\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:63:\"Please introduce yourself here.\r\n请在此简单介绍自己。\";s:12:\"textarea_rte\";s:1:\"0\";s:14:\"textarea_media\";s:1:\"0\";s:18:\"disable_rte_mobile\";s:1:\"0\";s:3:\"req\";s:1:\"1\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:17:\"calc_auto_include\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(14,6,'_text',0,'a:40:{s:5:\"label\";s:9:\"Last Name\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:14:\"_user_lastname\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"1\";s:9:\"from_name\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:14:\"user_address_1\";s:0:\"\";s:14:\"user_address_2\";s:0:\"\";s:9:\"user_city\";s:0:\"\";s:8:\"user_zip\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:14:\"_user_lastname\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,7),(15,6,'_text',1,'a:40:{s:5:\"label\";s:10:\"First Name\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:15:\"_user_firstname\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"1\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:14:\"user_address_1\";s:0:\"\";s:14:\"user_address_2\";s:0:\"\";s:9:\"user_city\";s:0:\"\";s:8:\"user_zip\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:15:\"_user_firstname\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,6),(16,6,'_country',4,'a:20:{s:5:\"label\";s:7:\"Country\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:2:\"US\";s:21:\"user_info_field_group\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:24:\"country_use_custom_first\";s:1:\"1\";s:20:\"country_custom_first\";s:6:\"Canada\";s:3:\"req\";s:1:\"1\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,13),(17,6,'_text',3,'a:40:{s:5:\"label\";s:5:\"Phone\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:0:\"\";s:4:\"mask\";s:14:\"(999) 999-9999\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"1\";s:10:\"user_email\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"0\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,15),(18,6,'_text',5,'a:40:{s:5:\"label\";s:4:\"City\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:0:\"\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"1\";s:8:\"user_zip\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"0\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,10),(41,6,'_list',6,'a:19:{s:5:\"label\";s:8:\"Category\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:4:\"left\";s:9:\"list_type\";s:8:\"checkbox\";s:10:\"multi_size\";s:1:\"6\";s:15:\"list_show_value\";s:1:\"0\";s:4:\"list\";a:1:{s:7:\"options\";a:6:{i:0;a:4:{s:5:\"label\";s:6:\"儿童\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:1;a:4:{s:5:\"label\";s:12:\"商务活动\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:2;a:4:{s:5:\"label\";s:18:\"专业领域英语\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:3;a:4:{s:5:\"label\";s:12:\"华裔家庭\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:4;a:4:{s:5:\"label\";s:18:\"汉语等级考试\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:5;a:4:{s:5:\"label\";s:12:\"普通汉语\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}}}s:21:\"user_info_field_group\";s:0:\"\";s:3:\"req\";s:1:\"0\";s:17:\"calc_auto_include\";s:1:\"0\";s:10:\"user_state\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(42,6,'_desc',8,'a:8:{s:5:\"label\";s:45:\"Internet speed reminder 请测试你的网速\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:13:\"default_value\";s:143:\"Please test your computer with <a href=\"http://www.speedtest.net/\">http://www.speedtest.net/</a>. Your upload speed should be higher than 1MB.\";s:7:\"desc_el\";s:3:\"div\";s:5:\"class\";s:12:\"v_text_block\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(43,6,'_checkbox',9,'a:15:{s:5:\"label\";s:83:\"I have required equiptment to host a class. 我有设备进行网络课堂教学。\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:5:\"right\";s:13:\"default_value\";s:9:\"unchecked\";s:3:\"req\";s:1:\"1\";s:10:\"calc_value\";a:2:{s:7:\"checked\";s:1:\"0\";s:9:\"unchecked\";s:1:\"0\";}s:17:\"calc_auto_include\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:12:\"v_text_block\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(46,12,'_text',1,'a:40:{s:5:\"label\";s:5:\"Email\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:11:\"_user_email\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"1\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"0\";s:10:\"user_email\";s:1:\"1\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"1\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:11:\"_user_email\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,14),(47,12,'_submit',5,'a:8:{s:5:\"label\";s:6:\"Submit\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(48,12,'_textarea',2,'a:19:{s:5:\"label\";s:5:\"Issue\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:42:\"Please describe the issue you encountered.\";s:12:\"textarea_rte\";s:1:\"1\";s:14:\"textarea_media\";s:1:\"0\";s:18:\"disable_rte_mobile\";s:1:\"0\";s:3:\"req\";s:1:\"1\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:17:\"calc_auto_include\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(49,12,'_desc',4,'a:8:{s:5:\"label\";s:19:\"Urgent Support Note\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:13:\"default_value\";s:85:\"For urgent support issue, please leave your telephone number so we can call you back.\";s:7:\"desc_el\";s:3:\"div\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(50,12,'_text',3,'a:40:{s:5:\"label\";s:5:\"Phone\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:0:\"\";s:4:\"mask\";s:14:\"(999) 999-9999\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"1\";s:10:\"user_email\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"0\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,15),(51,12,'_text',0,'a:40:{s:5:\"label\";s:4:\"Name\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:18:\"_user_display_name\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"0\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"1\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"0\";s:5:\"class\";s:16:\"ninja_form_class\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:14:\"user_address_1\";s:0:\"\";s:14:\"user_address_2\";s:0:\"\";s:9:\"user_city\";s:0:\"\";s:8:\"user_zip\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:18:\"_user_display_name\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,6),(52,22,'_submit',7,'a:8:{s:5:\"label\";s:6:\"Submit\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(55,22,'_text',1,'a:35:{s:5:\"label\";s:4:\"Name\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:4:\"left\";s:11:\"placeholder\";s:0:\"\";s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:14:\"user_address_1\";s:0:\"\";s:14:\"user_address_2\";s:0:\"\";s:9:\"user_city\";s:0:\"\";s:8:\"user_zip\";s:0:\"\";s:10:\"user_phone\";s:0:\"\";s:10:\"user_email\";s:0:\"\";s:21:\"user_info_field_group\";s:1:\"1\";s:5:\"email\";s:1:\"0\";s:13:\"disable_input\";s:1:\"0\";s:3:\"req\";s:1:\"0\";s:4:\"mask\";s:0:\"\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:17:\"calc_auto_include\";s:1:\"0\";s:10:\"datepicker\";s:1:\"0\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:18:\"_user_display_name\";s:13:\"default_value\";s:18:\"_user_display_name\";s:11:\"admin_label\";s:10:\"class_user\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(59,22,'_list',5,'a:19:{s:5:\"label\";s:18:\"Virtual Classroom \";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:4:\"left\";s:9:\"list_type\";s:8:\"dropdown\";s:10:\"multi_size\";s:1:\"5\";s:15:\"list_show_value\";s:1:\"0\";s:4:\"list\";a:1:{s:7:\"options\";a:6:{i:0;a:4:{s:5:\"label\";s:16:\"Smooth and clear\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"1\";}i:1;a:4:{s:5:\"label\";s:26:\"The audio quality is poor.\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:2;a:4:{s:5:\"label\";s:26:\"The video quality is poor.\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:3;a:4:{s:5:\"label\";s:55:\"The network was interrupted in the middle of the class.\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:4;a:4:{s:5:\"label\";s:36:\"I can not join the classroom at all.\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:5;a:4:{s:5:\"label\";s:57:\"The session ends before the teacher wrapped up the class.\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}}}s:21:\"user_info_field_group\";s:0:\"\";s:3:\"req\";s:1:\"1\";s:17:\"calc_auto_include\";s:1:\"0\";s:10:\"user_state\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(61,22,'_text',2,'a:40:{s:5:\"label\";s:5:\"Email\";s:9:\"label_pos\";s:4:\"left\";s:13:\"default_value\";s:11:\"_user_email\";s:4:\"mask\";s:0:\"\";s:10:\"datepicker\";s:1:\"0\";s:5:\"email\";s:1:\"1\";s:10:\"send_email\";s:1:\"0\";s:10:\"from_email\";s:1:\"0\";s:10:\"first_name\";s:1:\"0\";s:9:\"last_name\";s:1:\"0\";s:9:\"from_name\";s:1:\"0\";s:14:\"user_address_1\";s:1:\"0\";s:14:\"user_address_2\";s:1:\"0\";s:9:\"user_city\";s:1:\"0\";s:8:\"user_zip\";s:1:\"0\";s:10:\"user_phone\";s:1:\"0\";s:10:\"user_email\";s:1:\"1\";s:21:\"user_info_field_group\";s:1:\"1\";s:3:\"req\";s:1:\"0\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:17:\"calc_auto_include\";s:1:\"0\";s:11:\"calc_option\";s:1:\"0\";s:11:\"conditional\";s:0:\"\";s:11:\"placeholder\";s:0:\"\";s:13:\"disable_input\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:15:\"input_limit_msg\";s:0:\"\";s:10:\"user_state\";s:1:\"0\";s:16:\"autocomplete_off\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:18:\"default_value_type\";s:11:\"_user_email\";s:11:\"admin_label\";s:0:\"\";s:26:\"user_info_field_group_name\";s:0:\"\";s:28:\"user_info_field_group_custom\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,14),(63,22,'_textarea',6,'a:19:{s:5:\"label\";s:8:\"Comments\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:5:\"above\";s:13:\"default_value\";s:0:\"\";s:12:\"textarea_rte\";s:1:\"0\";s:14:\"textarea_media\";s:1:\"0\";s:18:\"disable_rte_mobile\";s:1:\"0\";s:3:\"req\";s:1:\"0\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:4:\"char\";s:17:\"calc_auto_include\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(64,22,'_hr',0,'a:6:{s:5:\"label\";s:2:\"hr\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:5:\"class\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(66,22,'_list',3,'a:19:{s:5:\"label\";s:14:\"Overall Rating\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:4:\"left\";s:9:\"list_type\";s:5:\"radio\";s:10:\"multi_size\";s:1:\"5\";s:15:\"list_show_value\";s:1:\"0\";s:4:\"list\";a:1:{s:7:\"options\";a:5:{i:0;a:4:{s:5:\"label\";s:23:\"I\'d recommend to others\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:1;a:4:{s:5:\"label\";s:17:\"I liked the class\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:2;a:4:{s:5:\"label\";s:15:\"The class is OK\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:3;a:4:{s:8:\"selected\";s:1:\"0\";s:5:\"label\";s:36:\"The class is not as good as expected\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";}i:4;a:4:{s:8:\"selected\";s:1:\"0\";s:5:\"label\";s:19:\"I dislike the class\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";}}}s:21:\"user_info_field_group\";s:0:\"\";s:3:\"req\";s:1:\"0\";s:17:\"calc_auto_include\";s:1:\"0\";s:10:\"user_state\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL),(67,22,'_list',4,'a:19:{s:5:\"label\";s:23:\"The teacher was on time\";s:15:\"input_limit_msg\";s:17:\"character(s) left\";s:9:\"label_pos\";s:4:\"left\";s:9:\"list_type\";s:5:\"radio\";s:10:\"multi_size\";s:1:\"5\";s:15:\"list_show_value\";s:1:\"0\";s:4:\"list\";a:1:{s:7:\"options\";a:3:{i:0;a:4:{s:5:\"label\";s:13:\"On Time/Early\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:1;a:4:{s:5:\"label\";s:4:\"Late\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}i:2;a:4:{s:5:\"label\";s:15:\"Did not show up\";s:5:\"value\";s:0:\"\";s:4:\"calc\";s:0:\"\";s:8:\"selected\";s:1:\"0\";}}}s:21:\"user_info_field_group\";s:0:\"\";s:3:\"req\";s:1:\"0\";s:17:\"calc_auto_include\";s:1:\"0\";s:10:\"user_state\";s:1:\"0\";s:8:\"num_sort\";s:1:\"0\";s:11:\"admin_label\";s:0:\"\";s:5:\"class\";s:0:\"\";s:9:\"show_help\";s:1:\"0\";s:9:\"help_text\";s:0:\"\";s:9:\"show_desc\";s:1:\"0\";s:8:\"desc_pos\";s:4:\"none\";s:9:\"desc_text\";s:0:\"\";}',NULL,NULL);
/*!40000 ALTER TABLE `wp_ninja_forms_fields` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
