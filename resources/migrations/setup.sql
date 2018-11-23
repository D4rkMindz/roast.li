-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Table `modul-151_projekt`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modul-151_projekt`.`post` ;

CREATE TABLE IF NOT EXISTS `modul-151_projekt`.`post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(1000) NOT NULL,
  `created_at` DATETIME NOT NULL,
  `created_by` INT(11) NOT NULL,
  `modified_at` DATETIME NULL DEFAULT NULL,
  `modified_by` INT(11) NULL DEFAULT NULL,
  `archived_at` DATETIME NULL DEFAULT NULL,
  `archived_by` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `modul-151_projekt`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modul-151_projekt`.`role` ;

CREATE TABLE IF NOT EXISTS `modul-151_projekt`.`role` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `position` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `modul-151_projekt`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modul-151_projekt`.`user` ;

CREATE TABLE IF NOT EXISTS `modul-151_projekt`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `role_id` INT(11) NOT NULL,
  `username` VARCHAR(80) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(80) NOT NULL,
  `last_name` VARCHAR(80) NOT NULL,
  `password` VARCHAR(80) NOT NULL,
  `thumbnail_url` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `created_by` INT(11) NOT NULL,
  `modified_at` DATETIME NULL DEFAULT NULL,
  `modified_by` INT(11) NULL DEFAULT NULL,
  `archived_at` DATETIME NULL DEFAULT NULL,
  `archived_by` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `modul-151_projekt`.`liked_post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `modul-151_projekt`.`liked_post` ;

CREATE TABLE IF NOT EXISTS `modul-151_projekt`.`liked_post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `post_id` INT(11) NOT NULL,
  `liked_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
