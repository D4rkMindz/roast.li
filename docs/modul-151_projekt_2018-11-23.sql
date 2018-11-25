# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.3.9-MariaDB)
# Datenbank: modul-151_projekt
# Erstellt am: 2018-11-23 09:29:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle liked_post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liked_post`;

CREATE TABLE `liked_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_liked_post_post1` (`post_id`),
  KEY `fk_liked_post_user` (`user_id`),
  CONSTRAINT `fk_liked_post_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_liked_post_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `liked_post` WRITE;
/*!40000 ALTER TABLE `liked_post` DISABLE KEYS */;

INSERT INTO `liked_post` (`id`, `user_id`, `post_id`, `liked_at`)
VALUES
	(34,16,64,'2018-11-21 14:59:58');

/*!40000 ALTER TABLE `liked_post` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;

INSERT INTO `post` (`id`, `content`, `created_at`, `created_by`, `modified_at`, `modified_by`, `archived_at`, `archived_by`)
VALUES
	(1,'Post Nr. 1','2018-11-08 09:40:46',1,NULL,NULL,'2018-11-11 22:10:04',1),
	(2,'Post Nr. 2','2018-11-08 09:40:52',1,NULL,NULL,'2018-11-20 08:36:49',1),
	(3,'Post Nr. 3','2018-11-08 09:41:01',2,NULL,NULL,'2018-11-20 10:30:38',1),
	(4,'Post Nr. 4','2018-11-08 09:41:09',1,NULL,NULL,'2018-11-20 07:58:28',1),
	(5,'Post Nr. 5','2018-11-08 09:41:15',2,NULL,NULL,'2018-11-20 08:32:18',1),
	(6,'Post Nr. 6','2018-11-08 10:57:56',2,NULL,NULL,'2018-11-20 08:32:57',1),
	(7,'Post Nr. 7','2018-11-08 10:58:05',1,NULL,NULL,'2018-11-11 22:06:25',1),
	(8,'Post Nr. 8','2018-11-08 10:58:12',1,NULL,NULL,'2018-11-11 22:06:21',1),
	(9,'Post Nr. 9','2018-11-08 10:58:24',2,NULL,NULL,'2018-11-20 08:35:24',1),
	(10,'Post Nr. 10','2018-11-08 10:58:35',1,NULL,NULL,'2018-11-11 22:06:13',1),
	(11,'Post Nr. 11','2018-11-08 10:58:42',2,NULL,NULL,'2018-11-20 08:38:14',1),
	(12,'Post Nr. 12','2018-11-11 20:54:32',1,NULL,NULL,'2018-11-11 22:06:09',1),
	(13,'Post Nr 13.','2018-11-11 21:07:57',1,NULL,NULL,'2018-11-11 22:05:40',1),
	(14,'Post Nr. 14','2018-11-11 21:17:34',1,NULL,NULL,'2018-11-11 22:05:33',1),
	(15,'Post Nr. 15','2018-11-11 21:18:22',1,NULL,NULL,'2018-11-11 22:04:42',1),
	(16,'Post Nr. 16','2018-11-11 21:27:05',1,NULL,NULL,'2018-11-11 22:04:22',1),
	(17,'Post Nr. 17','2018-11-11 21:57:37',1,NULL,NULL,'2018-11-11 22:08:13',1),
	(18,'Post Nr. 18\n','2018-11-11 21:57:47',1,NULL,NULL,'2018-11-11 22:07:48',1),
	(19,'Test','2018-11-20 08:03:30',1,NULL,NULL,'2018-11-20 10:30:33',1),
	(20,'Test','2018-11-20 08:03:30',1,NULL,NULL,'2018-11-20 10:30:43',1),
	(21,'testtt','2018-11-20 08:04:18',1,NULL,NULL,'2018-11-20 08:05:00',1),
	(22,'testtt','2018-11-20 08:04:20',1,NULL,NULL,'2018-11-20 08:04:56',1),
	(23,'testx','2018-11-20 08:04:33',1,NULL,NULL,'2018-11-20 08:04:58',1),
	(24,'testx','2018-11-20 08:04:33',1,NULL,NULL,'2018-11-20 08:04:48',1),
	(25,'New POst 1.','2018-11-20 10:31:12',1,NULL,NULL,'2018-11-21 14:51:01',1),
	(26,'New POst 1.','2018-11-20 10:31:13',1,NULL,NULL,'2018-11-20 14:20:36',1),
	(27,'https://pornhub.com','2018-11-20 13:47:34',1,NULL,NULL,'2018-11-20 14:17:11',1),
	(28,'https://pornhub.com','2018-11-20 13:47:36',1,NULL,NULL,'2018-11-20 14:07:12',1),
	(29,'https://pornhub.com','2018-11-20 13:47:36',1,NULL,NULL,'2018-11-20 14:07:34',1),
	(30,'https://pornhub.com','2018-11-20 13:47:36',1,NULL,NULL,'2018-11-20 14:16:23',1),
	(31,'&lt;script&gt;alert(1)&lt;/script&gt;','2018-11-20 14:08:05',1,NULL,NULL,'2018-11-20 14:08:09',1),
	(32,'&lt;script&gt;alert(1)&lt;/script&gt;','2018-11-20 14:08:05',1,NULL,NULL,'2018-11-20 14:08:49',1),
	(33,'https://github.com/portn','2018-11-20 14:20:53',1,NULL,NULL,'2018-11-20 14:37:35',1),
	(34,'https://github.com/portn','2018-11-20 14:20:53',1,NULL,NULL,'2018-11-20 14:37:59',1),
	(35,'post','2018-11-20 14:38:28',1,NULL,NULL,'2018-11-21 14:02:58',1),
	(36,'post','2018-11-20 14:38:28',1,NULL,NULL,'2018-11-21 14:03:16',1),
	(37,'new post','2018-11-20 14:48:16',1,NULL,NULL,'2018-11-21 14:02:51',1),
	(38,'new post','2018-11-20 14:48:16',1,NULL,NULL,'2018-11-21 13:11:53',1),
	(39,'test','2018-11-20 14:51:14',1,NULL,NULL,'2018-11-20 14:51:34',1),
	(40,'test','2018-11-20 14:51:15',1,NULL,NULL,'2018-11-21 13:11:56',1),
	(41,'post','2018-11-20 14:54:28',1,NULL,NULL,'2018-11-20 15:01:49',1),
	(42,'post','2018-11-20 14:54:28',1,NULL,NULL,'2018-11-21 06:48:43',1),
	(43,'POSTS','2018-11-20 14:57:38',1,NULL,NULL,'2018-11-20 15:01:09',1),
	(44,'POSTS','2018-11-20 14:57:38',1,NULL,NULL,'2018-11-20 15:01:22',1),
	(45,'ASFDASDF','2018-11-20 14:57:56',1,NULL,NULL,'2018-11-20 15:00:22',1),
	(46,'ASFDASDF','2018-11-20 14:57:57',1,NULL,NULL,'2018-11-20 15:00:19',1),
	(47,'Ne wPost\n','2018-11-21 13:58:47',1,NULL,NULL,'2018-11-21 14:02:37',1),
	(48,'penis post','2018-11-21 13:58:56',1,NULL,NULL,'2018-11-21 13:58:59',1),
	(49,'penis post','2018-11-21 14:02:07',1,NULL,NULL,'2018-11-21 14:02:10',1),
	(50,'asdf','2018-11-21 14:03:29',1,NULL,NULL,'2018-11-21 14:05:33',1),
	(51,'asdfsadfa\n','2018-11-21 14:05:40',1,NULL,NULL,'2018-11-21 14:13:12',1),
	(52,'sadfjkdsöaljföa','2018-11-21 14:05:45',1,NULL,NULL,'2018-11-21 14:13:04',1),
	(53,'askldöflaskjdföasfd','2018-11-21 14:05:47',1,NULL,NULL,'2018-11-21 14:06:17',1),
	(54,'asdöflkasdflasödf','2018-11-21 14:05:51',1,NULL,NULL,'2018-11-21 14:05:54',1),
	(55,'jaslöfasdfaölf','2018-11-21 14:13:34',1,NULL,NULL,'2018-11-21 14:32:57',1),
	(56,'asöldfköasdfjalsöfd','2018-11-21 14:13:37',1,NULL,NULL,'2018-11-21 14:30:36',1),
	(57,'ajsldöfösafadf','2018-11-21 14:13:41',1,NULL,NULL,'2018-11-21 14:28:05',1),
	(58,'alsjfösakfdöasdföalsdjkf\n','2018-11-21 14:13:45',1,NULL,NULL,'2018-11-21 14:13:48',1),
	(59,'asdf','2018-11-21 14:44:33',1,NULL,NULL,'2018-11-21 14:50:59',1),
	(60,'asdf1','2018-11-21 14:44:37',1,NULL,NULL,'2018-11-21 14:50:58',1),
	(61,'asdf2','2018-11-21 14:44:43',1,NULL,NULL,'2018-11-21 14:50:41',1),
	(62,'asdf3','2018-11-21 14:44:47',1,NULL,NULL,'2018-11-21 14:49:55',1),
	(63,'asdf4','2018-11-21 14:44:50',1,NULL,NULL,'2018-11-21 14:45:01',1),
	(64,'New Penis Post','2018-11-21 14:51:09',1,NULL,NULL,NULL,NULL),
	(65,'New Penis Post1','2018-11-21 14:51:13',1,NULL,NULL,'2018-11-21 14:54:54',1),
	(66,'New Penis Post2','2018-11-21 14:51:17',1,NULL,NULL,'2018-11-21 14:54:53',1),
	(67,'New Penis Post3','2018-11-21 14:51:20',1,NULL,NULL,'2018-11-21 14:53:46',1);

/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `position` varchar(80) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`, `position`, `level`)
VALUES
	(1,'Administrator','ROLE_ADMIN',32),
	(2,'User','ROLE_USER',16),
	(3,'Anonymous','ROLE_ANONYMOUS',0),
	(4,'Super Administrator','ROLE_SUPER_ADMIN',64),
	(5,'Guest','ROLE_GUEST',8);

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `archived_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_role1` (`role_id`),
  CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `role_id`, `username`, `email`, `first_name`, `last_name`, `password`, `thumbnail_url`, `created_at`, `created_by`, `modified_at`, `modified_by`, `archived_at`, `archived_by`)
VALUES
	(1,4,'bjoern','bjoern@pfoster.ch','Björn','Pfoster','$2y$10$gsXVho.Mwy1FmtxWqbBw6eeztT5AeUUopLfYMz9JB5VizvYAqxyxi',NULL,'2018-11-08 09:39:45',0,NULL,NULL,NULL,NULL),
	(2,2,'tekk','marc.wilhelm@example.com','Marc','Wilhelm','$2y$10$zWQqc.W9XDSlrgFWp4qZi.zlbECCF1zl5uxYC0f8R8SdDQR6blcni',NULL,'2018-11-08 09:40:22',0,NULL,NULL,NULL,NULL),
	(12,2,'bjoerna','bjoern@pfoster.chc','Björn','pfoster','$2y$10$n3w6vHt/EhJgCLvcR34uXuekC67OBq2NcL8PvTX2ozLKr2uXXE7oS',NULL,'2018-11-11 16:35:46',0,NULL,NULL,NULL,NULL),
	(13,2,'bjoernaaasdf','bjoern@pfoster.cc','Björn','Pfoster','$2y$10$RdgXNogUK/e303DK.fMq9eYwOkHj3L6D6WnxxuC2EgAuITh7QS1ci',NULL,'2018-11-11 17:33:35',0,NULL,NULL,NULL,NULL),
	(14,2,'bjoernasdf','bjoern@pfoster.cca','Björn','Pfoster','$2y$10$XHm8SHGJHRZsZEc2NWBn/O85FVoWz6tLtWxj3IhHOV0//QWYxg53K',NULL,'2018-11-11 17:34:26',0,NULL,NULL,NULL,NULL),
	(15,2,'asdf','sdf@asdf.c','sadf','asdf','$2y$10$59ICxkGBa/LghV2crgYF4OvZZOT8DVw/K37V6jIM/v8QW5H3boZ3m',NULL,'2018-11-21 14:59:24',0,NULL,NULL,NULL,NULL),
	(16,2,'asdfa','sdf@asdf.ca','sadf','asdf','$2y$10$uJg.eqjqQ/oeEijB1i/bfe36ptNQybkhlFoDc28r6rpQx/00JvR8i',NULL,'2018-11-21 14:59:54',0,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
