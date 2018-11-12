# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.3.9-MariaDB)
# Datenbank: modul-151_projekt
# Erstellt am: 2018-11-11 23:36:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Export von Tabelle role
# ------------------------------------------------------------

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;

INSERT INTO `role` (`id`, `name`, `position`)
VALUES
	(1,'Admin','Admin'),
	(2,'User','User'),
	(3,'Anonymous','Anonymous');

/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;


# Export von Tabelle user
# ------------------------------------------------------------

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `role_id`, `username`, `email`, `first_name`, `last_name`, `password`, `thumbnail_url`, `created_at`, `created_by`, `modified_at`, `modified_by`, `archived_at`, `archived_by`)
VALUES
	(1,1,'bjoern','bjoern@pfoster.ch','Björn','Pfoster','$2y$10$gsXVho.Mwy1FmtxWqbBw6eeztT5AeUUopLfYMz9JB5VizvYAqxyxi',NULL,'2018-11-08 09:39:45',0,NULL,NULL,NULL,NULL),
	(2,2,'tekk','marc.wilhelm@example.com','Marc','Wilhelm','$2y$10$zWQqc.W9XDSlrgFWp4qZi.zlbECCF1zl5uxYC0f8R8SdDQR6blcni',NULL,'2018-11-08 09:40:22',0,NULL,NULL,NULL,NULL),
	(12,2,'bjoerna','bjoern@pfoster.chc','Björn','pfoster','$2y$10$n3w6vHt/EhJgCLvcR34uXuekC67OBq2NcL8PvTX2ozLKr2uXXE7oS',NULL,'2018-11-11 16:35:46',0,NULL,NULL,NULL,NULL),
	(13,2,'bjoernaaasdf','bjoern@pfoster.cc','Björn','Pfoster','$2y$10$RdgXNogUK/e303DK.fMq9eYwOkHj3L6D6WnxxuC2EgAuITh7QS1ci',NULL,'2018-11-11 17:33:35',0,NULL,NULL,NULL,NULL),
	(14,2,'bjoernasdf','bjoern@pfoster.cca','Björn','Pfoster','$2y$10$XHm8SHGJHRZsZEc2NWBn/O85FVoWz6tLtWxj3IhHOV0//QWYxg53K',NULL,'2018-11-11 17:34:26',0,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
