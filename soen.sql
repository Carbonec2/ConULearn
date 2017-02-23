-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema soen
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema soen
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soen` DEFAULT CHARACTER SET utf8 ;
USE `soen` ;

-- -----------------------------------------------------
-- Table `soen`.`rights`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soen`.`rights` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Dumping data for table `rights`
--

LOCK TABLES `rights` WRITE;
LOCK TABLES `rights` WRITE;
INSERT INTO `rights` VALUES (1,'teacher'),(2,'student');
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `soen`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soen`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `passwordMD5` VARCHAR(255) NULL DEFAULT NULL,
  `user` VARCHAR(45) NULL DEFAULT NULL,
  `Rights_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `rights_id_idx` (`Rights_id` ASC),
  CONSTRAINT `rights_id`
    FOREIGN KEY (`Rights_id`)
    REFERENCES `soen`.`rights` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `soen`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soen`.`course` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `User_id` INT(11) NULL DEFAULT NULL COMMENT 'Contains the name of the creator of the course',
  PRIMARY KEY (`id`),
  INDEX `fk_Course_User1_idx` (`User_id` ASC),
  CONSTRAINT `fk_Course_User1`
    FOREIGN KEY (`User_id`)
    REFERENCES `soen`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `soen`.`courseuser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soen`.`courseuser` (
  `User_id` INT(11) NOT NULL,
  `Course_id` INT(11) NOT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  INDEX `course_id_idx` (`Course_id` ASC),
  INDEX `id` (`User_id` ASC),
  CONSTRAINT `course_id`
    FOREIGN KEY (`Course_id`)
    REFERENCES `soen`.`course` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `id`
    FOREIGN KEY (`User_id`)
    REFERENCES `soen`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
