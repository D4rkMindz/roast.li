/*
SQLyog Community
MySQL - 5.7.22 : Database - modul-151_projekt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Data for the table `liked_post` */

insert  into `liked_post`(`id`,`user_id`,`post_id`,`liked_at`) values 
(4,1,11,'2018-11-08 14:29:46'),
(5,1,9,'2018-11-08 16:58:14'),
(6,1,6,'2018-11-08 16:58:20'),
(7,1,5,'2018-11-08 16:58:23'),
(8,1,3,'2018-11-08 16:59:01');

/*Data for the table `post` */

insert  into `post`(`id`,`content`,`created_at`,`created_by`,`modified_at`,`modified_by`,`archived_at`,`archived_by`) values 
(1,'Post Nr. 1','2018-11-08 09:40:46',1,NULL,NULL,NULL,NULL),
(2,'Post Nr. 2','2018-11-08 09:40:52',1,NULL,NULL,NULL,NULL),
(3,'Post Nr. 3','2018-11-08 09:41:01',2,NULL,NULL,NULL,NULL),
(4,'Post Nr. 4','2018-11-08 09:41:09',1,NULL,NULL,NULL,NULL),
(5,'Post Nr. 5','2018-11-08 09:41:15',2,NULL,NULL,NULL,NULL),
(6,'Post Nr. 6','2018-11-08 10:57:56',2,NULL,NULL,NULL,NULL),
(7,'Post Nr. 7','2018-11-08 10:58:05',1,NULL,NULL,NULL,NULL),
(8,'Post Nr. 8','2018-11-08 10:58:12',1,NULL,NULL,NULL,NULL),
(9,'Post Nr. 9','2018-11-08 10:58:24',2,NULL,NULL,NULL,NULL),
(10,'Post Nr. 10','2018-11-08 10:58:35',1,NULL,NULL,NULL,NULL),
(11,'Post Nr. 11','2018-11-08 10:58:42',2,NULL,NULL,NULL,NULL);

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`position`) values 
(1,'Admin','Admin'),
(2,'User','User');

/*Data for the table `user` */

insert  into `user`(`id`,`role_id`,`username`,`email`,`first_name`,`last_name`,`password`,`thumbnail_url`,`created_at`,`created_by`,`modified_at`,`modified_by`,`archived_at`,`archived_by`) values 
(1,1,'bjoern','bjoern@pfoster.ch','Björn','Pfoster','$2y$10$gsXVho.Mwy1FmtxWqbBw6eeztT5AeUUopLfYMz9JB5VizvYAqxyxi',NULL,'2018-11-08 09:39:45',0,NULL,NULL,NULL,NULL),
(2,2,'tekk','marc.wilhelm@example.com','Marc','Wilhelm','$2y$10$zWQqc.W9XDSlrgFWp4qZi.zlbECCF1zl5uxYC0f8R8SdDQR6blcni',NULL,'2018-11-08 09:40:22',0,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
